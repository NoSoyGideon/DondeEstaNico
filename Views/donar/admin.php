<?php
// admin.php - Panel de administración de donaciones
require_once __DIR__ . 'config.php';
require_once __DIR__ . 'database.php';

// Inicializar la base de datos
$db = new DonationDatabase();

// Obtener estadísticas
$stats = $db->getDonationStats();
$recentDonations = $db->getAllDonations(20, 0);
$recentIpnLogs = $db->getIpnLogs(10, 0);

// Paginación
$page = isset($_GET['page']) ? max(1, intval($_GET['page'])) : 1;
$limit = 10;
$offset = ($page - 1) * $limit;
$donations = $db->getAllDonations($limit, $offset);
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Panel de Administración - AdoptBuddies</title>
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
<body class="bg-gray-100 min-h-screen">
    <div class="container mx-auto px-4 py-8">
        <!-- Header -->
        <div class="bg-white rounded-lg shadow-lg p-6 mb-8">
            <div class="flex justify-between items-center">
                <h1 class="text-3xl font-bold text-purple-primary">
                    <i class="fas fa-chart-bar mr-3"></i>
                    Panel de Donaciones - AdoptBuddies
                </h1>
                <a href="index.php" class="bg-purple-primary hover:bg-purple-light text-white px-4 py-2 rounded-lg transition-colors">
                    <i class="fas fa-home mr-2"></i>Ir a Donaciones
                </a>
            </div>
        </div>
        
        <!-- Stats Cards -->
        <div class="grid md:grid-cols-4 gap-6 mb-8">
            <div class="bg-white rounded-lg shadow-lg p-6 text-center">
                <div class="bg-purple-lightest rounded-full w-12 h-12 flex items-center justify-center mx-auto mb-4">
                    <i class="fas fa-dollar-sign text-purple-primary text-xl"></i>
                </div>
                <h3 class="text-lg font-semibold text-gray-800 mb-2">Total Recaudado</h3>
                <p class="text-2xl font-bold text-purple-primary">$<?php echo number_format($stats['total_amount'] ?? 0, 2); ?></p>
            </div>
            <div class="bg-white rounded-lg shadow-lg p-6 text-center">
                <div class="bg-green-100 rounded-full w-12 h-12 flex items-center justify-center mx-auto mb-4">
                    <i class="fas fa-check-circle text-green-600 text-xl"></i>
                </div>
                <h3 class="text-lg font-semibold text-gray-800 mb-2">Completadas</h3>
                <p class="text-2xl font-bold text-green-600"><?php echo $stats['completed_donations'] ?? 0; ?></p>
            </div>
            <div class="bg-white rounded-lg shadow-lg p-6 text-center">
                <div class="bg-yellow-100 rounded-full w-12 h-12 flex items-center justify-center mx-auto mb-4">
                    <i class="fas fa-clock text-yellow-600 text-xl"></i>
                </div>
                <h3 class="text-lg font-semibold text-gray-800 mb-2">Pendientes</h3>
                <p class="text-2xl font-bold text-yellow-600"><?php echo $stats['pending_donations'] ?? 0; ?></p>
            </div>
            <div class="bg-white rounded-lg shadow-lg p-6 text-center">
                <div class="bg-blue-100 rounded-full w-12 h-12 flex items-center justify-center mx-auto mb-4">
                    <i class="fas fa-chart-line text-blue-600 text-xl"></i>
                </div>
                <h3 class="text-lg font-semibold text-gray-800 mb-2">Promedio</h3>
                <p class="text-2xl font-bold text-blue-600">$<?php echo number_format($stats['avg_amount'] ?? 0, 2); ?></p>
            </div>
        </div>

        <!-- Donations Table -->
        <div class="bg-white rounded-lg shadow-lg p-6 mb-8">
            <div class="flex justify-between items-center mb-6">
                <h2 class="text-2xl font-semibold text-gray-800">
                    <i class="fas fa-table mr-2"></i>
                    Donaciones Recientes
                </h2>
                <button onclick="location.reload()" class="bg-purple-primary hover:bg-purple-light text-white px-4 py-2 rounded-lg transition-colors">
                    <i class="fas fa-refresh mr-2"></i>Actualizar
                </button>
            </div>
            
            <?php if (empty($donations)): ?>
                <div class="text-center py-8">
                    <i class="fas fa-inbox text-gray-400 text-4xl mb-4"></i>
                    <p class="text-gray-500 text-lg">No hay donaciones registradas aún</p>
                </div>
            <?php else: ?>
                <div class="overflow-x-auto">
                    <table class="w-full table-auto">
                        <thead>
                            <tr class="bg-gray-50">
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">ID</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Donante</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Email</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Cantidad</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Estado</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Fecha</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Transacción</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">
                            <?php foreach ($donations as $donation): ?>
                                <tr class="hover:bg-gray-50">
                                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
                                        #<?php echo $donation['id']; ?>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                                        <div class="flex items-center">
                                            <div class="bg-purple-lightest rounded-full w-8 h-8 flex items-center justify-center mr-3">
                                                <i class="fas fa-user text-purple-primary text-xs"></i>
                                            </div>
                                            <?php echo htmlspecialchars($donation['donor_name']); ?>
                                        </div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                        <?php echo htmlspecialchars($donation['donor_email']); ?>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm font-bold text-purple-primary">
                                        $<?php echo number_format($donation['amount'], 2); ?>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <?php
                                        $statusClass = '';
                                        $statusIcon = '';
                                        switch ($donation['status']) {
                                            case 'completed':
                                                $statusClass = 'bg-green-100 text-green-800';
                                                $statusIcon = 'fas fa-check-circle';
                                                break;
                                            case 'pending':
                                                $statusClass = 'bg-yellow-100 text-yellow-800';
                                                $statusIcon = 'fas fa-clock';
                                                break;
                                            case 'failed':
                                                $statusClass = 'bg-red-100 text-red-800';
                                                $statusIcon = 'fas fa-times-circle';
                                                break;
                                            default:
                                                $statusClass = 'bg-gray-100 text-gray-800';
                                                $statusIcon = 'fas fa-question-circle';
                                        }
                                        ?>
                                        <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium <?php echo $statusClass; ?>">
                                            <i class="<?php echo $statusIcon; ?> mr-1"></i>
                                            <?php echo ucfirst($donation['status']); ?>
                                        </span>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                        <?php echo date('d/m/Y H:i', strtotime($donation['created_at'])); ?>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500 font-mono">
                                        <?php echo $donation['transaction_id'] ? substr($donation['transaction_id'], 0, 12) . '...' : 'N/A'; ?>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            <?php endif; ?>
        </div>

        <!-- IPN Logs -->
        <div class="bg-white rounded-lg shadow-lg p-6 mb-8">
            <h2 class="text-2xl font-semibold text-gray-800 mb-6">
                <i class="fas fa-exchange-alt mr-2"></i>
                Logs de PayPal IPN
            </h2>
            
            <?php if (empty($recentIpnLogs)): ?>
                <div class="text-center py-8">
                    <i class="fas fa-inbox text-gray-400 text-4xl mb-4"></i>
                    <p class="text-gray-500 text-lg">No hay logs de IPN registrados</p>
                </div>
            <?php else: ?>
                <div class="overflow-x-auto">
                    <table class="w-full table-auto">
                        <thead>
                            <tr class="bg-gray-50">
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">ID Transacción</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Estado</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Cantidad</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Email</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Fecha</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">
                            <?php foreach ($recentIpnLogs as $log): ?>
                                <tr class="hover:bg-gray-50">
                                    <td class="px-6 py-4 whitespace-nowrap text-sm font-mono text-gray-900">
                                        <?php echo htmlspecialchars($log['transaction_id'] ?? 'N/A'); ?>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                                        <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-blue-100 text-blue-800">
                                            <?php echo htmlspecialchars($log['payment_status'] ?? 'N/A'); ?>
                                        </span>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm font-bold text-purple-primary">
                                        $<?php echo number_format($log['amount'] ?? 0, 2); ?>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                        <?php echo htmlspecialchars($log['payer_email'] ?? 'N/A'); ?>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                        <?php echo date('d/m/Y H:i', strtotime($log['created_at'])); ?>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            <?php endif; ?>
        </div>

        <!-- Testing Section -->
        <div class="bg-yellow-50 border border-yellow-200 rounded-lg p-6">
            <h2 class="text-2xl font-semibold text-gray-800 mb-4">
                <i class="fas fa-flask text-yellow-600 mr-2"></i>
                Modo de Pruebas - PayPal Sandbox
            </h2>
            <div class="grid md:grid-cols-2 gap-6">
                <div>
                    <h3 class="font-semibold text-gray-700 mb-2">Datos de Prueba PayPal:</h3>
                    <div class="bg-white rounded p-4 text-sm">
                        <p><strong>Tarjeta Visa:</strong> 4111 1111 1111 1111</p>
                        <p><strong>CVV:</strong> 123</p>
                        <p><strong>Fecha:</strong> 12/2030</p>
                        <p><strong>Nombre:</strong> Test User</p>
                    </div>
                </div>
                <div>                        <h3 class="font-semibold text-gray-700 mb-2">Enlaces Útiles:</h3>
                        <div class="space-y-2">
                            <a href="https://developer.paypal.com/" target="_blank" class="block text-blue-600 hover:text-blue-800 transition-colors">
                                <i class="fas fa-external-link-alt mr-1"></i>PayPal Developer Dashboard
                            </a>
                            <a href="https://www.sandbox.paypal.com/" target="_blank" class="block text-blue-600 hover:text-blue-800 transition-colors">
                                <i class="fas fa-external-link-alt mr-1"></i>PayPal Sandbox
                            </a>
                            <a href="index.php" class="block text-purple-600 hover:text-purple-800 transition-colors">
                                <i class="fas fa-donate mr-1"></i>Ir a Página de Donaciones
                            </a>
                            <a href="logs_viewer.php" class="block text-green-600 hover:text-green-800 transition-colors">
                                <i class="fas fa-file-alt mr-1"></i>Visor de Logs
                            </a>
                            <a href="debug.php" class="block text-yellow-600 hover:text-yellow-800 transition-colors">
                                <i class="fas fa-bug mr-1"></i>Info de Debug
                            </a>
                            <a href="test_system.php" class="block text-red-600 hover:text-red-800 transition-colors">
                                <i class="fas fa-vial mr-1"></i>Test del Sistema
                            </a>
                        </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        // Function to refresh data
        function refreshData() {
            console.log('Refreshing data...');
            location.reload();
        }
        
        // Auto-refresh every 15 seconds
        setInterval(refreshData, 15000);
        
        // Manual refresh button
        function manualRefresh() {
            refreshData();
        }
        
        // Add loading indicator
        function showLoading() {
            const buttons = document.querySelectorAll('button');
            buttons.forEach(btn => {
                if (btn.textContent.includes('Actualizar')) {
                    btn.innerHTML = '<i class="fas fa-spinner fa-spin mr-2"></i>Actualizando...';
                    btn.disabled = true;
                }
            });
        }
        
        // Show notification
        function showNotification(message, type = 'info') {
            const notification = document.createElement('div');
            notification.className = `fixed top-4 right-4 p-4 rounded-lg shadow-lg z-50 ${
                type === 'success' ? 'bg-green-500 text-white' : 
                type === 'error' ? 'bg-red-500 text-white' : 
                'bg-blue-500 text-white'
            }`;
            notification.innerHTML = `
                <div class="flex items-center">
                    <i class="fas fa-${type === 'success' ? 'check' : type === 'error' ? 'times' : 'info'} mr-2"></i>
                    ${message}
                </div>
            `;
            document.body.appendChild(notification);
            
            setTimeout(() => {
                notification.remove();
            }, 3000);
        }
        
        // Check for new donations
        let lastDonationCount = <?php echo count($donations); ?>;
        
        function checkForUpdates() {
            fetch('api.php?action=stats')
                .then(response => response.json())
                .then(data => {
                    if (data.success) {
                        const currentCount = data.data.total_donations;
                        if (currentCount > lastDonationCount) {
                            showNotification('¡Nueva donación recibida!', 'success');
                            lastDonationCount = currentCount;
                        }
                    }
                })
                .catch(error => {
                    console.error('Error checking updates:', error);
                });
        }
        
        // Check for updates every 10 seconds
        setInterval(checkForUpdates, 10000);
        
        // Page load event
        document.addEventListener('DOMContentLoaded', function() {
            showNotification('Panel de administración cargado', 'info');
        });
    </script>
</body>
</html>
