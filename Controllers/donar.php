<?php
 
class donar extends Controller
{
    public function __construct() {
        parent::__construct();
        session_start();
          require_once "Models/donarModel.php";
    $this->model = new donarModel();

    }
    public function index()
    {
        $data['title'] = 'Pagina Principal';
        $this->views->getView('donar', "index", $data);
    }
    public function donar(){

  $config =include __DIR__ . '/../Views/donar/config.php';
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
 if(!isset($_SESSION['nombre'])){
 $errors[] = 'Seccion no iniciada';
}
if (!empty($errors)) {
 
    echo json_encode(['error' => 'Datos inválidos', 'details' => $errors]);
    exit;
}

$this->model->insertDonation($amount,$donorName,$donorEmail,$_SESSION['id'],'paypal');
$idDonacion = $this->model->lastInsertId();

$donation = [
    'id' => $idDonacion,
    'donor_name' => $donorName,
    'donor_email' => $donorEmail,
    'amount' => $amount,
    'message' => $message,
    'created_at' => date('Y-m-d H:i:s'),
    'status' => 'pending'
];

// Save to session for PayPal processing
$_SESSION['pending_donation'] = $donation;

$paypalData = [
    'business' => $config['paypal']['business_email'], // Use sandbox business email
    'item_name' => 'Donación para AdoptBuddies',
    'item_number' => $donation['id'],
    'amount' => $amount,
    'currency_code' => $config['paypal']['currency'],
    'return' => $config['paypal']['return_url'],
    'cancel_return' => $config['paypal']['cancel_return_url'],
    'notify_url' => $config['paypal']['notify_url'],
    'custom' => json_encode([
        'donation_id' => $donation['id'],
        'transaction_id' => $idDonacion,
        'donor_email' => $donorEmail
    ])
];
  $paypalData['cmd'] = '_xclick';

  $response = [
    'success' => true,
    'donation_id' => $donation['id'],
    'transaction_id' => $idDonacion,
    'paypal_url' => $this->generatePayPalURL($paypalData,$config),
    'message' => 'Donación preparada exitosamente'
];
echo json_encode($response);



    

    }
    public function generatePayPalURL($data,$config) {

    
    // Use sandbox URL for testing
    $paypalURL = $config['paypal']['sandbox_url'];
    // For production, uncomment the line below and comment the line above
    // $paypalURL = $config['paypal']['live_url'];
    
    $params = http_build_query($data);
    return $paypalURL . '?' . $params;
}
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



}