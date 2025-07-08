<?php
/**
 * AdoptBuddies Donation Processing
 * This file will handle the donation form submission and prepare data for PayPal integration
 */

// Start session
session_start();

// Load configuration and database
$config = include __DIR__ . '/config.php';
require_once __DIR__ . '/database.php';
require_once __DIR__ . '/logger.php';

// Initialize database and logger
$db = new DonationDatabase();
$logger = Logger::getInstance();

// Enable error reporting for development (remove in production)
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Set content type for JSON response
header('Content-Type: application/json');

// Enable CORS if needed
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: POST');
header('Access-Control-Allow-Headers: Content-Type');

// Check if request is POST
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    http_response_code(405);
    $logger->error('Invalid request method', ['method' => $_SERVER['REQUEST_METHOD']]);
    echo json_encode(['error' => 'Method not allowed', 'method' => $_SERVER['REQUEST_METHOD']]);
    exit;
}

// Log the incoming request
$logger->info('Donation request received', [
    'post_data' => $_POST,
    'remote_addr' => $_SERVER['REMOTE_ADDR'] ?? 'unknown',
    'user_agent' => $_SERVER['HTTP_USER_AGENT'] ?? 'unknown'
]);

// Check if config loaded correctly
if (!$config) {
    http_response_code(500);
    $logger->error('Configuration file could not be loaded');
    echo json_encode(['error' => 'Configuration file could not be loaded']);
    exit;
}

try {
    // Validate and sanitize input data
    function sanitizeInput($data) {
        return htmlspecialchars(strip_tags(trim($data)));
    }

    function validateEmail($email) {
        return filter_var($email, FILTER_VALIDATE_EMAIL);
    }

    function validateAmount($amount) {
        return is_numeric($amount) && $amount > 0 && $amount <= 10000; // Max $10,000
    }

// Get form data
$donorName = isset($_POST['donor_name']) ? sanitizeInput($_POST['donor_name']) : '';
$donorEmail = isset($_POST['donor_email']) ? sanitizeInput($_POST['donor_email']) : '';
$amount = isset($_POST['amount']) ? floatval($_POST['amount']) : 0;
$message = isset($_POST['message']) ? sanitizeInput($_POST['message']) : '';
$monthlyDonation = isset($_POST['monthly_donation']) ? true : false;

// Validation
$errors = [];

if (empty($donorName)) {
    $errors[] = 'El nombre es requerido';
}

if (empty($donorEmail) || !validateEmail($donorEmail)) {
    $errors[] = 'Email válido es requerido';
}

if (!validateAmount($amount)) {
    $errors[] = 'Cantidad de donación inválida';
}

// If there are validation errors, return them
if (!empty($errors)) {
    http_response_code(400);
    $logger->warning('Donation validation failed', [
        'errors' => $errors,
        'donor_email' => $donorEmail,
        'amount' => $amount
    ]);
    echo json_encode(['error' => 'Datos inválidos', 'details' => $errors]);
    exit;
}

// Create donation record
$transactionId = uniqid('donation_', true);
$donationId = $db->insertDonation($donorName, $donorEmail, $amount, 'paypal', $transactionId);

if (!$donationId) {
    http_response_code(500);
    $logger->error('Failed to create donation record in database', [
        'donor_name' => $donorName,
        'donor_email' => $donorEmail,
        'amount' => $amount,
        'transaction_id' => $transactionId
    ]);
    echo json_encode(['error' => 'Error al crear registro de donación']);
    exit;
}

$logger->success('Donation record created successfully', [
    'donation_id' => $donationId,
    'transaction_id' => $transactionId,
    'donor_name' => $donorName,
    'donor_email' => $donorEmail,
    'amount' => $amount
]);

$donation = [
    'id' => $donationId,
    'transaction_id' => $transactionId,
    'donor_name' => $donorName,
    'donor_email' => $donorEmail,
    'amount' => $amount,
    'message' => $message,
    'monthly_donation' => $monthlyDonation,
    'created_at' => date('Y-m-d H:i:s'),
    'status' => 'pending'
];

// Save to session for PayPal processing
$_SESSION['pending_donation'] = $donation;

// Log donation attempt
$logger->donation('Donation initiated', [
    'donation_id' => $donationId,
    'transaction_id' => $transactionId,
    'donor_name' => $donorName,
    'donor_email' => $donorEmail,
    'amount' => $amount,
    'monthly_donation' => $monthlyDonation
]);

// Also log to old file for compatibility
$logEntry = date('Y-m-d H:i:s') . " - Donation attempt: {$donorName} ({$donorEmail}) - $" . number_format($amount, 2) . " - DB ID: {$donationId}\n";
file_put_contents('donations.log', $logEntry, FILE_APPEND | LOCK_EX);

// Prepare PayPal data
$paypalData = [
    'business' => $config['paypal']['business_email'], // Use sandbox business email
    'item_name' => 'Donación para AdoptBuddies',
    'item_number' => $donation['transaction_id'],
    'amount' => $amount,
    'currency_code' => $config['paypal']['currency'],
    'return' => $config['paypal']['return_url'],
    'cancel_return' => $config['paypal']['cancel_return_url'],
    'notify_url' => $config['paypal']['notify_url'],
    'custom' => json_encode([
        'donation_id' => $donation['id'],
        'transaction_id' => $transactionId,
        'donor_email' => $donorEmail
    ])
];

// Add recurring payment parameters if monthly donation
if ($monthlyDonation) {
    $paypalData['cmd'] = '_xclick-subscriptions';
    $paypalData['a3'] = $amount; // Monthly amount
    $paypalData['p3'] = 1; // Period
    $paypalData['t3'] = 'M'; // Time unit (M = months)
    $paypalData['src'] = 1; // Recurring payments
    $paypalData['sra'] = 1; // Auto-recurring
} else {
    $paypalData['cmd'] = '_xclick';
}

// Return success response with PayPal URL
$response = [
    'success' => true,
    'donation_id' => $donation['id'],
    'transaction_id' => $transactionId,
    'paypal_url' => generatePayPalURL($paypalData),
    'message' => 'Donación preparada exitosamente'
];

echo json_encode($response);

} catch (Exception $e) {
    // Catch any errors and return JSON error response
    error_log("Error in process_donation.php: " . $e->getMessage());
    http_response_code(500);
    echo json_encode([
        'success' => false,
        'error' => 'Error interno del servidor: ' . $e->getMessage()
    ]);
}

/**
 * Generate PayPal URL with parameters
 */
function generatePayPalURL($data) {
    global $config;
    
    // Use sandbox URL for testing
    $paypalURL = $config['paypal']['sandbox_url'];
    // For production, uncomment the line below and comment the line above
    // $paypalURL = $config['paypal']['live_url'];
    
    $params = http_build_query($data);
    return $paypalURL . '?' . $params;
}

/**
 * Send confirmation email (optional)
 */
function sendConfirmationEmail($donorEmail, $donorName, $amount, $donationId) {
    $subject = 'Confirmación de Donación - AdoptBuddies';
    $message = "
    Hola {$donorName},
    
    ¡Gracias por tu generosa donación de $" . number_format($amount, 2) . " a AdoptBuddies!
    
    ID de donación: {$donationId}
    
    Tu apoyo nos ayuda a seguir rescatando y cuidando animales necesitados.
    
    Con amor,
    El equipo de AdoptBuddies
    ";
    
    $headers = 'From: noreply@adoptbuddies.com' . "\r\n" .
               'Reply-To: info@adoptbuddies.com' . "\r\n" .
               'X-Mailer: PHP/' . phpversion();
    
    return mail($donorEmail, $subject, $message, $headers);
}
?>
