<?php
// Start session and load dependencies
session_start();
require_once __DIR__ . '/config.php';
require_once __DIR__ . '/database.php';
require_once __DIR__ . '/logger.php';

// Initialize database and logger
$db = new DonationDatabase();
$logger = Logger::getInstance();

// Get PayPal return parameters
$paypalTxnId = $_GET['tx'] ?? null;          // PayPal transaction ID
$paypalAmount = $_GET['amt'] ?? null;        // Amount paid
$paypalCurrency = $_GET['cc'] ?? null;       // Currency code
$paypalStatus = $_GET['st'] ?? null;         // Payment status
$paypalCustom = $_GET['cm'] ?? null;         // Custom data

// Check if we have donation data in session
$donation = $_SESSION['pending_donation'] ?? null;

// Log the return from PayPal with detailed info
$logger->paypalSuccess('PayPal return received', [
    'paypal_tx' => $paypalTxnId,
    'paypal_amount' => $paypalAmount,
    'paypal_currency' => $paypalCurrency,
    'paypal_status' => $paypalStatus,
    'session_donation' => $donation ? $donation['id'] : null,
    'get_params' => $_GET
]);

// Also log to old file for compatibility
$logEntry = date('Y-m-d H:i:s') . " - PayPal return: tx=$paypalTxnId, amt=$paypalAmount, st=$paypalStatus\n";
file_put_contents('donations.log', $logEntry, FILE_APPEND | LOCK_EX);

// If we have a PayPal transaction ID and session donation data
if ($paypalTxnId && $donation) {
    // Update donation status to completed
    $updated = $db->updateDonationStatus($donation['transaction_id'], 'completed');
    
    if ($updated) {
        $logger->success('Donation status updated to completed', [
            'donation_id' => $donation['id'],
            'transaction_id' => $donation['transaction_id'],
            'paypal_tx' => $paypalTxnId,
            'amount' => $donation['amount']
        ]);
    } else {
        $logger->warning('Failed to update donation status', [
            'donation_id' => $donation['id'],
            'transaction_id' => $donation['transaction_id'],
            'paypal_tx' => $paypalTxnId
        ]);
    }
    
    // Log the completion
    $logEntry = date('Y-m-d H:i:s') . " - Donation completed via return: {$donation['transaction_id']} -> PayPal TX: $paypalTxnId\n";
    file_put_contents('donations_completed.log', $logEntry, FILE_APPEND | LOCK_EX);
}

// If we don't have session data but have PayPal params, try to find the donation
if (!$donation && $paypalTxnId) {
    $logger->warning('No session data found but PayPal return received', [
        'paypal_tx' => $paypalTxnId,
        'paypal_amount' => $paypalAmount,
        'paypal_status' => $paypalStatus
    ]);
    
    // Try to find donation by PayPal transaction ID or other means
    $logEntry = date('Y-m-d H:i:s') . " - No session data, PayPal TX: $paypalTxnId\n";
    file_put_contents('donations.log', $logEntry, FILE_APPEND | LOCK_EX);
    
    // Create a basic donation object for display
    $donation = [
        'transaction_id' => $paypalTxnId,
        'amount' => $paypalAmount ?: 0,
        'donor_name' => 'Donante',
        'donor_email' => '',
        'created_at' => date('Y-m-d H:i:s')
    ];
}

// If we still don't have donation data, create a minimal one
if (!$donation) {
    $logger->error('No donation data available for success page', [
        'paypal_tx' => $paypalTxnId,
        'get_params' => $_GET,
        'session_keys' => array_keys($_SESSION)
    ]);
    
    $donation = [
        'transaction_id' => $paypalTxnId ?: 'unknown',
        'amount' => $paypalAmount ?: 0,
        'donor_name' => 'Donante Anónimo',
        'donor_email' => '',
        'created_at' => date('Y-m-d H:i:s')
    ];
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>¡Donación Exitosa! - AdoptBuddies</title>
    
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        'purple-primary': '#8B5CF6',
                        'purple-light': '#A78BFA',
                        'purple-lighter': '#C4B5FD',
                        'purple-lightest': '#EDE9FE',
                    }
                }
            }
        }
    </script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
</head>
<body class="bg-gradient-to-br from-purple-lightest to-white min-h-screen">
    <div class="container mx-auto px-4 py-16">
        <div class="max-w-2xl mx-auto text-center">
            <!-- Success Icon -->
            <div class="bg-green-100 rounded-full w-24 h-24 flex items-center justify-center mx-auto mb-8">
                <i class="fas fa-check text-green-600 text-4xl"></i>
            </div>
            
            <!-- Success Message -->
            <h1 class="text-4xl font-bold text-gray-800 mb-4">
                ¡Gracias por tu Donación!
            </h1>
            <p class="text-xl text-gray-600 mb-8">
                Tu generosidad hace una diferencia real en la vida de nuestros amigos peludos. 
                Hemos recibido tu donación exitosamente.
            </p>
            
            <!-- Donation Details Card -->
            <div class="bg-white rounded-2xl shadow-lg p-8 mb-8">
                <h2 class="text-2xl font-semibold text-gray-800 mb-6">Detalles de tu Donación</h2>
                <div class="space-y-4 text-left">
                    <div class="flex justify-between">
                        <span class="text-gray-600">ID de Transacción PayPal:</span>
                        <span class="font-semibold font-mono text-sm"><?php echo htmlspecialchars($paypalTxnId ?: 'N/A'); ?></span>
                    </div>
                    <div class="flex justify-between">
                        <span class="text-gray-600">Cantidad:</span>
                        <span class="font-semibold text-green-600">$<?php echo number_format($donation['amount'] ?? 0, 2); ?></span>
                    </div>
                    <div class="flex justify-between">
                        <span class="text-gray-600">Donante:</span>
                        <span class="font-semibold"><?php echo htmlspecialchars($donation['donor_name'] ?? 'N/A'); ?></span>
                    </div>
                    <div class="flex justify-between">
                        <span class="text-gray-600">Fecha:</span>
                        <span class="font-semibold"><?php echo date('d/m/Y H:i'); ?></span>
                    </div>
                    <div class="flex justify-between">
                        <span class="text-gray-600">Estado:</span>
                        <span class="font-semibold text-green-600">
                            <i class="fas fa-check-circle mr-1"></i>
                            Completado
                        </span>
                    </div>
                </div>
            </div>
            
            <!-- Impact Message -->
            <div class="bg-purple-lightest rounded-2xl p-8 mb-8">
                <h3 class="text-2xl font-semibold text-purple-primary mb-4">
                    <i class="fas fa-heart mr-2"></i>
                    Tu Impacto
                </h3>
                <p class="text-gray-700 mb-4">
                    Con tu donación de $<?php echo number_format($donation['amount'] ?? 0, 2); ?> podemos proporcionar cuidado médico, comida y amor a nuestros animales rescatados.
                </p>
                <div class="grid grid-cols-3 gap-4 text-center">
                    <div class="bg-white rounded-lg p-4">
                        <i class="fas fa-utensils text-purple-primary text-2xl mb-2"></i>
                        <div class="text-sm text-gray-600">Comidas</div>
                    </div>
                    <div class="bg-white rounded-lg p-4">
                        <i class="fas fa-syringe text-purple-primary text-2xl mb-2"></i>
                        <div class="text-sm text-gray-600">Cuidado Médico</div>
                    </div>
                    <div class="bg-white rounded-lg p-4">
                        <i class="fas fa-home text-purple-primary text-2xl mb-2"></i>
                        <div class="text-sm text-gray-600">Refugio Seguro</div>
                    </div>
                </div>
            </div>
            
            <!-- Next Steps -->
            <div class="bg-white rounded-2xl shadow-lg p-8 mb-8">
                <h3 class="text-2xl font-semibold text-gray-800 mb-4">¿Qué sigue?</h3>
                <div class="space-y-4 text-left">
                    <div class="flex items-start">
                        <i class="fas fa-envelope text-purple-primary mt-1 mr-3"></i>
                        <div>
                            <strong>Confirmación por Email:</strong> Recibirás un recibo detallado en tu correo electrónico.
                        </div>
                    </div>
                    <div class="flex items-start">
                        <i class="fas fa-newspaper text-purple-primary mt-1 mr-3"></i>
                        <div>
                            <strong>Actualizaciones:</strong> Te mantendremos informado sobre cómo tu donación está ayudando.
                        </div>
                    </div>
                    <div class="flex items-start">
                        <i class="fas fa-star text-purple-primary mt-1 mr-3"></i>
                        <div>
                            <strong>Únete a nuestra comunidad:</strong> Síguenos en redes sociales para ver historias de éxito.
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- Action Buttons -->
            <div class="flex flex-col md:flex-row gap-4 justify-center">
                <a href="index.php" class="bg-purple-primary hover:bg-purple-light text-white font-bold py-3 px-8 rounded-xl transition-colors duration-300">
                    <i class="fas fa-home mr-2"></i>
                    Volver al Inicio
                </a>
                <a href="#" class="bg-white hover:bg-gray-50 text-purple-primary font-bold py-3 px-8 rounded-xl border-2 border-purple-primary transition-colors duration-300">
                    <i class="fas fa-share mr-2"></i>
                    Compartir mi Donación
                </a>
            </div>
        </div>
    </div>

<?php
// Clear the session donation data after displaying
unset($_SESSION['pending_donation']);
?>

    <script>
        // Get URL parameters to display donation details
        const urlParams = new URLSearchParams(window.location.search);
        const transactionId = urlParams.get('tx') || urlParams.get('txn_id') || 'TXN' + Math.random().toString(36).substr(2, 9).toUpperCase();
        const amount = urlParams.get('amt') || urlParams.get('mc_gross') || localStorage.getItem('donationAmount');
        
        // Update display with actual values
        document.getElementById('transaction-id').textContent = transactionId;
        
        if (amount) {
            document.getElementById('donation-amount').textContent = '$' + parseFloat(amount).toFixed(2);
            updateImpactMessage(parseFloat(amount));
        }
        
        function updateImpactMessage(amount) {
            let message = '';
            if (amount >= 100) {
                message = 'Tu generosa donación puede cubrir una esterilización completa, ayudando a controlar la población de animales sin hogar.';
            } else if (amount >= 50) {
                message = 'Con tu donación podemos proporcionar todas las vacunas básicas necesarias para mantener saludable a un animal rescatado.';
            } else if (amount >= 25) {
                message = 'Tu donación puede alimentar a un animal rescatado durante una semana completa.';
            } else {
                message = 'Cada donación, sin importar el monto, marca una diferencia en la vida de nuestros amigos peludos.';
            }
            document.getElementById('impact-message').textContent = message;
        }
        
        // Clear stored donation amount
        localStorage.removeItem('donationAmount');
    </script>
</body>
</html>
