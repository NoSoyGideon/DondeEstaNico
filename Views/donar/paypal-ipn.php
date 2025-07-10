<?php
/**
 * PayPal IPN (Instant Payment Notification) Handler
 * Este archivo verifica automáticamente los pagos con PayPal
 */

// Load configuration and database
$config = include __DIR__ . '/config.php';
require_once __DIR__ . '/database.php';
require_once __DIR__ . '/logger.php';

// Initialize database and logger
$db = new DonationDatabase();
$logger = Logger::getInstance();

// Enable logging
error_reporting(E_ALL);
ini_set('log_errors', 1);
ini_set('error_log', 'paypal_ipn.log');

// Verify IPN came from PayPal
function verifyIPN($data, $config) {
    $req = 'cmd=_notify-validate';
    
    foreach ($data as $key => $value) {
        $value = urlencode(stripslashes($value));
        $req .= "&$key=$value";
    }
    
    // Post back to PayPal for verification
    $paypalURL = ($config['paypal']['mode'] === 'sandbox') 
        ? 'https://ipnpb.sandbox.paypal.com/cgi-bin/webscr'
        : 'https://ipnpb.paypal.com/cgi-bin/webscr';
    
    $ch = curl_init($paypalURL);
    curl_setopt($ch, CURLOPT_HTTP_VERSION, CURL_HTTP_VERSION_1_1);
    curl_setopt($ch, CURLOPT_POST, 1);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $req);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 1);
    curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 2);
    curl_setopt($ch, CURLOPT_FORBID_REUSE, 1);
    curl_setopt($ch, CURLOPT_HTTPHEADER, array('Connection: Close'));
    
    $res = curl_exec($ch);
    
    if (!$res) {
        error_log('CURL Error: ' . curl_error($ch));
        curl_close($ch);
        return false;
    }
    
    curl_close($ch);
    
    return $res === 'VERIFIED';
}

// Log IPN data
function logIPN($data, $status) {
    $logger = Logger::getInstance();
    $logger->paypal("IPN $status", ['data' => $data]);
    
    // Also log to old file for compatibility
    $logEntry = date('Y-m-d H:i:s') . " - IPN $status: " . json_encode($data) . "\n";
    file_put_contents('paypal_ipn.log', $logEntry, FILE_APPEND | LOCK_EX);
}

// Process IPN
if ($_POST) {
    // Log received IPN
    logIPN($_POST, 'RECEIVED');
    
    // Verify IPN with PayPal
    if (verifyIPN($_POST, $config)) {
        logIPN($_POST, 'VERIFIED');
        
        // Extract data
        $paymentStatus = $_POST['payment_status'] ?? '';
        $receiverEmail = $_POST['receiver_email'] ?? '';
        $amount = $_POST['mc_gross'] ?? '';
        $currency = $_POST['mc_currency'] ?? '';
        $txnId = $_POST['txn_id'] ?? '';
        $custom = $_POST['custom'] ?? '';
        $payerEmail = $_POST['payer_email'] ?? '';
        
        // Parse custom data
        $customData = json_decode($custom, true);
        $donationId = $customData['donation_id'] ?? '';
        $transactionId = $customData['transaction_id'] ?? '';
        $donorEmail = $customData['donor_email'] ?? '';
        
        // Log IPN data to database
        $ipnLogId = $db->insertIpnLog($txnId, $paymentStatus, $amount, $payerEmail, json_encode($_POST));
        
        $logger->paypal('IPN data logged to database', [
            'ipn_log_id' => $ipnLogId,
            'txn_id' => $txnId,
            'payment_status' => $paymentStatus,
            'amount' => $amount,
            'payer_email' => $payerEmail
        ]);
        
        // Update donation status based on payment status (not just 'Completed')
        if ($transactionId) {
            $status = 'pending'; // Default status
            
            switch ($paymentStatus) {
                case 'Completed':
                    $status = 'completed';
                    break;
                case 'Pending':
                    $status = 'pending';
                    break;
                case 'Failed':
                case 'Denied':
                case 'Expired':
                    $status = 'failed';
                    break;
                case 'Refunded':
                case 'Reversed':
                    $status = 'refunded';
                    break;
            }
            
            $updated = $db->updateDonationStatus($transactionId, $status);
            
            $logger->paypal('Donation status updated', [
                'transaction_id' => $transactionId,
                'old_status' => 'pending',
                'new_status' => $status,
                'paypal_status' => $paymentStatus,
                'updated' => $updated
            ]);
            
            $logEntry = date('Y-m-d H:i:s') . " - Status updated: $transactionId -> $status (PayPal: $paymentStatus)\n";
            file_put_contents('donations.log', $logEntry, FILE_APPEND | LOCK_EX);
        } else {
            $logger->warning('No transaction ID found in IPN custom data', [
                'custom_data' => $customData,
                'txn_id' => $txnId
            ]);
        }
        
        // Verify payment details for completion
        if ($paymentStatus === 'Completed' && 
            $receiverEmail === $config['paypal']['business_email'] &&
            $currency === $config['paypal']['currency']) {
            
            $logger->success('Payment completed and verified', [
                'donation_id' => $donationId,
                'txn_id' => $txnId,
                'amount' => $amount,
                'receiver_email' => $receiverEmail,
                'currency' => $currency
            ]);
            
            $logEntry = date('Y-m-d H:i:s') . " - PAYMENT COMPLETED: $donationId - $txnId - $$amount\n";
            file_put_contents('donations_completed.log', $logEntry, FILE_APPEND | LOCK_EX);
            
            // Send confirmation email (optional)
            if ($donorEmail) {
                sendConfirmationEmail($donorEmail, $amount, $txnId, $donationId);
            }
            
            logIPN($_POST, 'PROCESSED_SUCCESS');
        } else {
            logIPN($_POST, 'PAYMENT_INVALID');
        }
        
    } else {
        logIPN($_POST, 'VERIFICATION_FAILED');
    }
    
    // Respond to PayPal
    http_response_code(200);
    echo "OK";
} else {
    http_response_code(400);
    echo "No POST data received";
}

/**
 * Send confirmation email to donor
 */
function sendConfirmationEmail($donorEmail, $amount, $txnId, $donationId) {
    $subject = '¡Gracias por tu Donación! - AdoptBuddies';
    $message = "
    ¡Hola!
    
    ¡Gracias por tu generosa donación de $$amount a AdoptBuddies!
    
    Detalles de tu donación:
    - ID de Donación: $donationId
    - ID de Transacción PayPal: $txnId
    - Cantidad: $$amount USD
    - Fecha: " . date('d/m/Y H:i:s') . "
    
    Tu apoyo nos ayuda a seguir rescatando y cuidando animales necesitados.
    Recibirás un recibo oficial de PayPal por separado.
    
    Con mucho amor y gratitud,
    El equipo de AdoptBuddies
    
    ---
    Si tienes preguntas, contáctanos en info@adoptbuddies.com
    ";
    
    $headers = array(
        'From: AdoptBuddies <noreply@adoptbuddies.com>',
        'Reply-To: info@adoptbuddies.com',
        'X-Mailer: PHP/' . phpversion(),
        'Content-Type: text/plain; charset=UTF-8'
    );
    
    $result = mail($donorEmail, $subject, $message, implode("\r\n", $headers));
    
    if ($result) {
        error_log("Confirmation email sent to: $donorEmail");
    } else {
        error_log("Failed to send confirmation email to: $donorEmail");
    }
    
    return $result;
}
?>
