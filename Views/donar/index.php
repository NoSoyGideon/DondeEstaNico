<?php
<<<<<<< Updated upstream

require_once '../../Config/Config.php';
// paginación simulada
$page = isset($_GET['page']) ? intval($_GET['page']) : 1;
$totalPages = 3;
?>
=======
// index.php - Página principal de donaciones
require_once __DIR__ . '/config.php';
require_once __DIR__ . '/database.php';

// Inicializar la base de datos
$db = new DonationDatabase();
>>>>>>> Stashed changes

// Obtener estadísticas para mostrar en la página
$stats = $db->getDonationStats();
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
<<<<<<< Updated upstream
    <title>Document</title>
    <link rel="stylesheet" href="<?php echo BASE_URL; ?>assets/css/donar.css">
    <script defer src="<?php echo BASE_URL; ?>Assets/js/adopcion.js"></script>

</head>
<body>

  <?php include_once '../Templates/header.php'; ?>
<div class="donation-container">
  <h1>RESCUES</h1>
  <p class="subtitle">Find out more about the rescues and shelters using PetMatch and the amazing work they do.</p>
  <div class="divider"></div>

  <div class="filters">
    <select name="state">
      <option value="">Todos los estados</option>
      <option value="tx">Texas</option>
      <option value="ca">California</option>
    </select>
    <button>Filtrar</button>
  </div>

  <?php include 'rescue_list.php'; ?>

  <div class="pagination">
    <?php for($i=1; $i<= $totalPages; $i++): ?>
      <button class="<?= $i==$page?'active':'' ?>"><?= $i ?></button>
    <?php endfor; ?>
    <button>Last</button>
  </div>
  </div>

 <?php include_once '../Templates/footer.php'; ?>

=======
    <title>Donaciones - AdoptBuddies</title>
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
<?php include_once(__DIR__ . '/../Templates/header.php'); ?>
<body class="bg-gradient-to-br from-purple-lightest to-white min-h-screen">

    <!-- Main Content -->
    <main class="container mx-auto px-4 py-8">
        <!-- Hero Section -->
        <div class="text-center mb-12">
            <h2 class="text-4xl font-bold text-gray-800 mb-4">
                Ayuda a Salvar Vidas Peludas
                <i class="fas fa-heart text-red-500 ml-2"></i>
            </h2>
            <p class="text-xl text-gray-600 max-w-3xl mx-auto">
                Tu donación hace la diferencia en la vida de animales que necesitan una segunda oportunidad. 
                Cada contribución nos ayuda a proporcionar comida, cuidado médico y amor a nuestros amigos peludos.
            </p>
        </div>

        <!-- Statistics Section -->
        <div class="grid md:grid-cols-3 gap-6 mb-12">
            <div class="bg-white rounded-2xl shadow-lg p-6 text-center">
                <div class="bg-purple-lightest rounded-full w-16 h-16 flex items-center justify-center mx-auto mb-4">
                    <i class="fas fa-dog text-purple-primary text-2xl"></i>
                </div>
                <h3 class="text-3xl font-bold text-purple-primary mb-2">250+</h3>
                <p class="text-gray-600">Animales Rescatados</p>
            </div>
            <div class="bg-white rounded-2xl shadow-lg p-6 text-center">
                <div class="bg-purple-lightest rounded-full w-16 h-16 flex items-center justify-center mx-auto mb-4">
                    <i class="fas fa-home text-purple-primary text-2xl"></i>
                </div>
                <h3 class="text-3xl font-bold text-purple-primary mb-2">180+</h3>
                <p class="text-gray-600">Adopciones Exitosas</p>
            </div>
            <div class="bg-white rounded-2xl shadow-lg p-6 text-center">
                <div class="bg-purple-lightest rounded-full w-16 h-16 flex items-center justify-center mx-auto mb-4">
                    <i class="fas fa-heart text-purple-primary text-2xl"></i>
                </div>
                <h3 class="text-3xl font-bold text-purple-primary mb-2">
                    $<?php echo number_format($stats['total_amount'] ?? 0, 0); ?>
                </h3>
                <p class="text-gray-600">Total Donado</p>
            </div>
        </div>

        <!-- Donation Options -->
        <div class="max-w-4xl mx-auto">
            <h3 class="text-3xl font-bold text-center text-gray-800 mb-8">Elige tu Forma de Ayudar</h3>
            
            <div class="bg-white rounded-2xl shadow-lg p-0 mb-8 overflow-hidden flex flex-col md:flex-row">
                <!-- Imagen de mascotas -->
                <div class="md:w-1/2 w-full flex items-center justify-center bg-purple-lightest">
                    <img src="<?php echo BASE_URL; ?>Assets/images/donateAnimals.jpg" alt="Familia con mascotas" class="object-cover w-full h-80 md:h-full md:rounded-l-2xl fade-in" loading="lazy">
                </div>
                <!-- Formulario de donación -->
                <div class="md:w-1/2 w-full p-8">
                    <h4 class="text-2xl font-semibold text-gray-800 mb-6 text-center">Donación Rápida</h4>
                    <div class="grid grid-cols-2 md:grid-cols-4 gap-4 mb-6">
                        <button class="donation-amount bg-purple-lightest hover:bg-purple-light hover:text-white border-2 border-purple-light rounded-xl p-4 text-center transition-all duration-300" data-amount="25">
                            <div class="text-2xl font-bold">$25</div>
                        </button>
                        <button class="donation-amount bg-purple-lightest hover:bg-purple-light hover:text-white border-2 border-purple-light rounded-xl p-4 text-center transition-all duration-300" data-amount="50">
                            <div class="text-2xl font-bold">$50</div>
                        </button>
                        <button class="donation-amount bg-purple-lightest hover:bg-purple-light hover:text-white border-2 border-purple-light rounded-xl p-4 text-center transition-all duration-300" data-amount="100">
                            <div class="text-2xl font-bold">$100</div>
                        </button>
                        <button class="donation-amount bg-purple-lightest hover:bg-purple-light hover:text-white border-2 border-purple-light rounded-xl p-4 text-center transition-all duration-300" data-amount="custom">
                            <div class="text-2xl font-bold">
                                <i class="fas fa-edit"></i>
                            </div>
                        </button>
                    </div>
                    
                    <!-- Custom Amount Input -->
                    <div id="custom-amount" class="hidden mb-6">
                        <label class="block text-gray-700 font-semibold mb-2">Cantidad personalizada:</label>
                        <div class="flex items-center">
                            <span class="bg-gray-100 border border-gray-300 rounded-l-lg px-3 py-2 text-gray-700">$</span>
                            <input type="number" id="custom-amount-input" class="flex-1 border border-gray-300 rounded-r-lg px-3 py-2 focus:outline-none focus:ring-2 focus:ring-purple-primary" placeholder="0.00" min="1" step="0.01">
                        </div>
                    </div>

                    <!-- Donation Form -->
                    <form id="donation-form" action="process_donation.php" method="POST">
                        <input type="hidden" id="donation-amount" name="amount" value="">
                        
                        <div class="grid md:grid-cols-2 gap-6 mb-6">
                            <div>
                                <label class="block text-gray-700 font-semibold mb-2">Nombre completo *</label>
                                <input type="text" name="donor_name" required class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:outline-none focus:ring-2 focus:ring-purple-primary">
                            </div>
                            <div>
                                <label class="block text-gray-700 font-semibold mb-2">Email *</label>
                                <input type="email" name="donor_email" required class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:outline-none focus:ring-2 focus:ring-purple-primary">
                            </div>
                        </div>
                        
                        <div class="mb-6">
                            <label class="block text-gray-700 font-semibold mb-2">Mensaje opcional</label>
                            <textarea name="message" rows="3" class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:outline-none focus:ring-2 focus:ring-purple-primary" placeholder="Deja un mensaje de apoyo para nuestros amigos peludos..."></textarea>
                        </div>
                        
                        <div class="mb-6">
                            <label class="flex items-center">
                                <input type="checkbox" name="monthly_donation" class="mr-2 text-purple-primary focus:ring-purple-primary">
                                <span class="text-gray-700">Hacer de esta una donación mensual recurrente</span>
                            </label>
                        </div>
                        
                        <button type="submit" id="donate-button" class="w-full bg-purple-primary hover:bg-purple-light text-white font-bold py-4 px-6 rounded-xl transition-colors duration-300 text-lg disabled:opacity-50 disabled:cursor-not-allowed">
                            <i class="fas fa-heart mr-2"></i>
                            Donar con PayPal
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </main>

    <script src="<?php echo BASE_URL; ?>Assets/js/donations.js"></script>
  <?php include_once(__DIR__ . '/../Templates/footer.php'); ?>
>>>>>>> Stashed changes


</body>
</html>