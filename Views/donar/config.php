<?php
/**
 * AdoptBuddies Configuration File
 * Configure your donation settings here
 */

return [
    // PayPal Configuration
    'paypal' => [
        'mode' => 'sandbox', // 'sandbox' for testing, 'live' for production
        'business_email' => 'adoptbuddies-business@test.com', // Reemplaza con el email que PayPal generó
        'sandbox_url' => 'https://www.sandbox.paypal.com/cgi-bin/webscr',
        'live_url' => 'https://www.paypal.com/cgi-bin/webscr',
        'currency' => 'USD',
        
        // Return URLs - URLs a las que PayPal redirige después del pago
        'return_url' => 'http://localhost:3000/donation-success.php',     // Pago exitoso
        'cancel_return_url' => 'http://localhost:3000/donation-cancel.php', // Pago cancelado
        'notify_url' => 'http://localhost:3000/paypal-ipn.php',             // IPN notifications
        
        // Test accounts for PayPal Sandbox
        'test_accounts' => [
            'business' => 'sb-adoptbuddies@business.example.com',
            'buyer' => 'adoptbuddies-personal@test.com',
            'buyer_password' => 'test123456'
        ]
    ],
    
    // Site Configuration
    'site' => [
        'name' => 'AdoptBuddies',
        'url' => 'http://localhost:3000', // Updated to correct port
        'email' => 'info@adoptbuddies.com',
        'phone' => '(555) 123-4567',
    ],
    
    // Donation Settings
    'donations' => [
        'predefined_amounts' => [25, 50, 100], // Predefined donation amounts
        'min_amount' => 1,
        'max_amount' => 10000,
        'default_currency' => 'USD',
        'enable_recurring' => true,
    ],
    
    // Email Configuration (for sending confirmation emails)
    'email' => [
        'from' => 'noreply@adoptbuddies.com',
        'reply_to' => 'info@adoptbuddies.com',
        'smtp_host' => '', // Leave empty to use PHP mail() function
        'smtp_port' => 587,
        'smtp_username' => '',
        'smtp_password' => '',
        'use_smtp' => false,
    ],
    
    // Database Configuration (if you want to store donations)
    'database' => [
        'enabled' => false,
        'host' => 'localhost',
        'dbname' => 'adoptbuddies',
        'username' => '',
        'password' => '',
        'charset' => 'utf8mb4',
    ],
    
    // Logging
    'logging' => [
        'enabled' => true,
        'file' => 'donations.log',
        'level' => 'info', // debug, info, warning, error
    ],
    
    // Security Settings
    'security' => [
        'enable_csrf' => false, // Set to true in production
        'session_timeout' => 3600, // 1 hour
        'max_donation_attempts' => 5, // per hour
    ],
];

/**
 * Helper function to get the correct PayPal URL based on mode
 */
function getPayPalURL($config) {
    return $config['paypal']['mode'] === 'sandbox' 
        ? $config['paypal']['sandbox_url'] 
        : $config['paypal']['live_url'];
}

/**
 * Helper function to build return URLs dynamically
 */
function buildReturnURLs($baseURL) {
    return [
        'return_url' => $baseURL . '/donation-success.php',
        'cancel_return_url' => $baseURL . '/donation-cancel.php',
        'notify_url' => $baseURL . '/paypal-ipn.php',
    ];
}

/**
 * Helper function to validate configuration
 */
function validateConfig($config) {
    $errors = [];
    
    if (empty($config['paypal']['business_email'])) {
        $errors[] = 'PayPal business email is required';
    }
    
    if (empty($config['site']['url'])) {
        $errors[] = 'Site URL is required';
    }
    
    if (!filter_var($config['paypal']['return_url'], FILTER_VALIDATE_URL)) {
        $errors[] = 'Invalid return URL';
    }
    
    if (!filter_var($config['paypal']['cancel_return_url'], FILTER_VALIDATE_URL)) {
        $errors[] = 'Invalid cancel return URL';
    }
    
    if (!filter_var($config['paypal']['notify_url'], FILTER_VALIDATE_URL)) {
        $errors[] = 'Invalid IPN notify URL';
    }
    
    return $errors;
}
?>
