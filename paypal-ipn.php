<?php
/**
 * PayPal IPN (Instant Payment Notification) Handler
 * Este archivo verifica automáticamente los pagos con PayPal
 */

// Load configuration and database
$config = include __DIR__ . '/config.php';

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
