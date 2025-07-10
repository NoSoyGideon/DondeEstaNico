<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $data['title'] ?></title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        primary: '#6366f1',
                        success: '#10b981',
                        gray: {
                            50: '#f9fafb',
                            100: '#f3f4f6',
                            200: '#e5e7eb',
                            300: '#d1d5db',
                            400: '#9ca3af',
                            500: '#6b7280',
                            600: '#4b5563',
                            700: '#374151',
                            800: '#1f2937',
                            900: '#111827'
                        }
                    }
                }
            }
        }
    </script>
</head>
<body class="bg-gray-50">
<?php 
    include_once(__DIR__ . '/../Templates/header.php');
    $mascota = $data['mascota'];
    $usuario = $data['usuario'];
    $step = $data['step'];
    $mascota_id = $data['mascota_id'];
    $show_login_modal = $data['show_login_modal'] ?? false;
?>

<!-- Login/Register Modal -->
<?php if($show_login_modal): ?>
<div id="loginModal" class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center z-50">
    <div class="bg-white rounded-2xl p-8 max-w-md w-full mx-4 transform transition-all">
        <div class="text-center mb-6">
            <div class="w-16 h-16 bg-primary rounded-full flex items-center justify-center mx-auto mb-4">
                <i class="fas fa-heart text-white text-2xl"></i>
            </div>
            <h2 class="text-2xl font-bold text-gray-900 mb-2">Inicia tu Proceso de Adopción</h2>
            <p class="text-gray-600">Por favor inicia sesión o crea una cuenta para continuar adoptando a <strong><?= htmlspecialchars($mascota['nombre']) ?></strong></p>
        </div>

        <!-- Login/Register Tabs -->
        <div class="flex border-b border-gray-200 mb-6">
            <button class="flex-1 py-2 px-4 text-center font-medium text-primary border-b-2 border-primary" id="loginTab" onclick="showLoginForm()">
                Iniciar Sesión
            </button>
            <button class="flex-1 py-2 px-4 text-center font-medium text-gray-500" id="registerTab" onclick="showRegisterForm()">
                Registrarse
            </button>
        </div>

        <!-- Login Form -->
        <div id="loginForm" class="space-y-4">
            <form action="<?= BASE_URL ?>login/authenticate" method="POST" class="space-y-4">
                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-2">Correo Electrónico</label>
                    <input type="email" name="email" required class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary focus:border-transparent transition-colors">
                </div>
                
                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-2">Contraseña</label>
                    <input type="password" name="password" required class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary focus:border-transparent transition-colors">
                </div>
                
                <input type="hidden" name="redirect_url" value="<?= BASE_URL ?>adoptar/proceso?id=<?= $mascota_id ?>&step=<?= $step ?>">
                
                <button type="submit" class="w-full bg-primary hover:bg-indigo-700 text-white font-semibold py-3 rounded-lg transition-colors duration-200">
                    Iniciar Sesión y Continuar Adopción
                </button>
            </form>
        </div>

        <!-- Register Form -->
        <div id="registerForm" class="space-y-4 hidden">
            <form action="<?= BASE_URL ?>login/register" method="POST" class="space-y-4">
                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-2">Nombre Completo</label>
                    <input type="text" name="nombre" required class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary focus:border-transparent transition-colors">
                </div>
                
                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-2">Correo Electrónico</label>
                    <input type="email" name="correo" required class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary focus:border-transparent transition-colors">
                </div>
                
                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-2">Contraseña</label>
                    <input type="password" name="clave" required class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary focus:border-transparent transition-colors">
                </div>
                
                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-2">Confirmar Contraseña</label>
                    <input type="password" name="confirm_password" required class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary focus:border-transparent transition-colors">
                </div>
                
                <input type="hidden" name="redirect_url" value="<?= BASE_URL ?>adoptar/proceso?id=<?= $mascota_id ?>&step=<?= $step ?>">
                
                <button type="submit" class="w-full bg-success hover:bg-green-700 text-white font-semibold py-3 rounded-lg transition-colors duration-200">
                    Crear Cuenta e Iniciar Adopción
                </button>
            </form>
        </div>

        <div class="mt-6 text-center">
            <button onclick="closeModal()" class="text-gray-500 hover:text-gray-700 text-sm font-medium">
                Cerrar y regresar
            </button>
        </div>
    </div>
</div>
<?php endif; ?>

<?php if(!$show_login_modal): ?>
<div class="max-w-4xl mx-auto p-6">
    <!-- Progress Steps -->
    <div class="mb-12 p-4">
        <div class="flex items-center justify-between max-w-5xl mx-auto">
            <!-- Start Step -->
            <div class="flex flex-col items-center text-center relative">
                <img src="../assets/images/home/graydog.svg" alt="gray dog icon" 
                     class="absolute -top-8 left-1/2 transform -translate-x-1/2 w-8 h-8 transition-all duration-500 <?= $step == 'start' ? 'opacity-100' : 'opacity-0' ?>"
                     id="dogIcon-start">
                <div class="w-16 h-16 rounded-full flex items-center justify-center mb-2 transition-all duration-300 relative 
                     <?= $step == 'start' ? 'bg-green-500' : (in_array($step, ['address', 'household', 'roommate', 'other_animals', 'review']) ? 'bg-purple-500' : 'bg-gray-300') ?>">
                    <i class="fas fa-play text-sm text-white"></i>
                </div>
                <span class="text-xs font-medium <?= $step == 'start' ? 'text-green-600' : (in_array($step, ['address', 'household', 'roommate', 'other_animals', 'review']) ? 'text-purple-600' : 'text-gray-500') ?>">Inicio</span>
            </div>
            
            <!-- Progress Line -->
            <div class="flex-1 h-1 mx-4 <?= in_array($step, ['address', 'household', 'roommate', 'other_animals', 'review']) ? 'bg-purple-500' : 'bg-gray-200' ?> rounded"></div>
            
            <!-- Address Step -->
            <div class="flex flex-col items-center text-center relative">
                <img src="../assets/images/home/graydog.svg" alt="gray dog icon" 
                     class="absolute -top-8 left-1/2 transform -translate-x-1/2 w-8 h-8 transition-all duration-500 <?= $step == 'address' ? 'opacity-100' : 'opacity-0' ?>"
                     id="dogIcon-address">
                <div class="w-16 h-16 rounded-full flex items-center justify-center mb-2 transition-all duration-300 relative 
                     <?= $step == 'address' ? 'bg-green-500' : (in_array($step, ['household', 'roommate', 'other_animals', 'review']) ? 'bg-purple-500' : 'bg-gray-300') ?>">
                    <i class="fas fa-map-marker-alt text-sm text-white"></i>
                </div>
                <span class="text-xs font-medium <?= $step == 'address' ? 'text-green-600' : (in_array($step, ['household', 'roommate', 'other_animals', 'review']) ? 'text-purple-600' : 'text-gray-500') ?>">Dirección</span>
            </div>
            
            <!-- Progress Line -->
            <div class="flex-1 h-1 mx-4 <?= in_array($step, ['household', 'roommate', 'other_animals', 'review']) ? 'bg-purple-500' : 'bg-gray-200' ?> rounded"></div>
            
            <!-- Household Step -->
            <div class="flex flex-col items-center text-center relative">
                <img src="../assets/images/home/graydog.svg" alt="gray dog icon" 
                     class="absolute -top-8 left-1/2 transform -translate-x-1/2 w-8 h-8 transition-all duration-500 <?= $step == 'household' ? 'opacity-100' : 'opacity-0' ?>"
                     id="dogIcon-household">
                <div class="w-16 h-16 rounded-full flex items-center justify-center mb-2 transition-all duration-300 relative 
                     <?= $step == 'household' ? 'bg-green-500' : (in_array($step, ['roommate', 'other_animals', 'review']) ? 'bg-purple-500' : 'bg-gray-300') ?>">
                    <i class="fas fa-home text-sm text-white"></i>
                </div>
                <span class="text-xs font-medium <?= $step == 'household' ? 'text-green-600' : (in_array($step, ['roommate', 'other_animals', 'review']) ? 'text-purple-600' : 'text-gray-500') ?>">Hogar</span>
            </div>
            
            <!-- Progress Line -->
            <div class="flex-1 h-1 mx-4 <?= in_array($step, ['roommate', 'other_animals', 'review']) ? 'bg-purple-500' : 'bg-gray-200' ?> rounded"></div>
            
            <!-- Roommate Step -->
            <div class="flex flex-col items-center text-center relative">
                <img src="../assets/images/home/graydog.svg" alt="gray dog icon" 
                     class="absolute -top-8 left-1/2 transform -translate-x-1/2 w-8 h-8 transition-all duration-500 <?= $step == 'roommate' ? 'opacity-100' : 'opacity-0' ?>"
                     id="dogIcon-roommate">
                <div class="w-16 h-16 rounded-full flex items-center justify-center mb-2 transition-all duration-300 relative 
                     <?= $step == 'roommate' ? 'bg-green-500' : (in_array($step, ['other_animals', 'review']) ? 'bg-purple-500' : 'bg-gray-300') ?>">
                    <i class="fas fa-users text-sm text-white"></i>
                </div>
                <span class="text-xs font-medium <?= $step == 'roommate' ? 'text-green-600' : (in_array($step, ['other_animals', 'review']) ? 'text-purple-600' : 'text-gray-500') ?>">Compañeros</span>
            </div>
            
            <!-- Progress Line -->
            <div class="flex-1 h-1 mx-4 <?= in_array($step, ['other_animals', 'review']) ? 'bg-purple-500' : 'bg-gray-200' ?> rounded"></div>
            
            <!-- Other Animals Step -->
            <div class="flex flex-col items-center text-center relative">
                <img src="../assets/images/home/graydog.svg" alt="gray dog icon" 
                     class="absolute -top-8 left-1/2 transform -translate-x-1/2 w-8 h-8 transition-all duration-500 <?= $step == 'other_animals' ? 'opacity-100' : 'opacity-0' ?>"
                     id="dogIcon-other_animals">
                <div class="w-16 h-16 rounded-full flex items-center justify-center mb-2 transition-all duration-300 relative 
                     <?= $step == 'other_animals' ? 'bg-green-500' : ($step == 'review' ? 'bg-purple-500' : 'bg-gray-300') ?>">
                    <i class="fas fa-paw text-sm text-white"></i>
                </div>
                <span class="text-xs font-medium <?= $step == 'other_animals' ? 'text-green-600' : ($step == 'review' ? 'text-purple-600' : 'text-gray-500') ?>">Otras Mascotas</span>
            </div>
            
            <!-- Progress Line -->
            <div class="flex-1 h-1 mx-4 <?= $step == 'review' ? 'bg-purple-500' : 'bg-gray-200' ?> rounded"></div>
            
            <!-- Review Step -->
            <div class="flex flex-col items-center text-center relative">
                <img src="../assets/images/home/graydog.svg" alt="gray dog icon" 
                     class="absolute -top-8 left-1/2 transform -translate-x-1/2 w-8 h-8 transition-all duration-500 <?= $step == 'review' ? 'opacity-100' : 'opacity-0' ?>"
                     id="dogIcon-review">
                <div class="w-16 h-16 rounded-full flex items-center justify-center mb-2 transition-all duration-300 relative 
                     <?= $step == 'review' ? 'bg-green-500' : 'bg-gray-300' ?>">
                    <i class="fas fa-check text-sm text-white"></i>
                </div>
                <span class="text-xs font-medium <?= $step == 'review' ? 'text-green-600' : 'text-gray-500' ?>">Confirmar</span>
            </div>
        </div>
    </div>

    <!-- Main Content Card -->
    <div class="bg-white rounded-3xl shadow-xl overflow-hidden">
        <!-- Pet Information Header (Horizontal Layout) -->
        <div class="bg-gradient-to-r from-blue-50 to-indigo-50 p-8">
            <div class="flex items-center space-x-6">
                <!-- Pet Image -->
                <div class="flex-shrink-0">
                    <div class="w-32 h-32 bg-gray-200 rounded-2xl overflow-hidden">
                        <?php if(!empty($mascota['foto'])): ?>
                            <img src="../assets/images/mascotas/<?= htmlspecialchars($mascota['foto']) ?>" 
                                 alt="<?= htmlspecialchars($mascota['nombre']) ?>"
                                 class="w-full h-full object-cover">
                        <?php else: ?>
                            <div class="w-full h-full flex items-center justify-center bg-gray-300">
                                <i class="fas fa-dog text-4xl text-gray-500"></i>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>
                
                <!-- Pet Details -->
                <div class="flex-grow">
                    <h1 class="text-3xl font-bold text-gray-900 mb-2"><?= htmlspecialchars($mascota['nombre']) ?></h1>
                    <p class="text-gray-600 text-lg"><?= htmlspecialchars($mascota['nombre_raza']) ?> • <?= ($mascota['genero'] == 1) ? 'Male' : 'Female' ?></p>
                    <?php if(!empty($mascota['edad'])): ?>
                        <p class="text-gray-500">Age: <?= htmlspecialchars($mascota['edad']) ?> years old</p>
                    <?php endif; ?>
                </div>
            </div>
        </div>

        <!-- Step Content -->
        <div class="p-8">
            <?php
            // Define step mapping
            $stepFiles = [
                'start' => 'step1-start.php',
                'address' => 'step2-address.php',
                'household' => 'step3-household.php',
                'roommate' => 'step4-roommate.php',
                'other_animals' => 'step5-other-animals.php',
                'review' => 'step6-review.php'
            ];

            // Include the appropriate step file
            if (isset($stepFiles[$step]) && file_exists(__DIR__ . '/steps/' . $stepFiles[$step])) {
                include __DIR__ . '/steps/' . $stepFiles[$step];
            } else {
                // Fallback to start step
                include __DIR__ . '/steps/step1-start.php';
            }
            ?>
        </div>
    </div>
</div>
<?php endif; ?>

<!-- JavaScript -->
<script>
// Modal functions
function showLoginForm() {
    document.getElementById('loginForm').classList.remove('hidden');
    document.getElementById('registerForm').classList.add('hidden');
    document.getElementById('loginTab').classList.add('text-primary', 'border-b-2', 'border-primary');
    document.getElementById('loginTab').classList.remove('text-gray-500');
    document.getElementById('registerTab').classList.remove('text-primary', 'border-b-2', 'border-primary');
    document.getElementById('registerTab').classList.add('text-gray-500');
}

function showRegisterForm() {
    document.getElementById('registerForm').classList.remove('hidden');
    document.getElementById('loginForm').classList.add('hidden');
    document.getElementById('registerTab').classList.add('text-primary', 'border-b-2', 'border-primary');
    document.getElementById('registerTab').classList.remove('text-gray-500');
    document.getElementById('loginTab').classList.remove('text-primary', 'border-b-2', 'border-primary');
    document.getElementById('loginTab').classList.add('text-gray-500');
}

function closeModal() {
    window.history.back();
}

// Step navigation functions
function nextStep(step) {
    const currentUrl = new URL(window.location);
    currentUrl.searchParams.set('step', step);
    window.location.href = currentUrl.toString();
}

function previousStep(step) {
    const currentUrl = new URL(window.location);
    currentUrl.searchParams.set('step', step);
    window.location.href = currentUrl.toString();
}

function submitApplication() {
    // Verificar que el checkbox de confirmación esté marcado si estamos en el paso de review
    const finalConfirmation = document.getElementById('final-confirmation');
    if (finalConfirmation && !finalConfirmation.checked) {
        alert('Por favor confirma que la información proporcionada es correcta.');
        return;
    }
    
    // Aquí normalmente enviarías los datos del formulario
    alert('¡Solicitud enviada exitosamente! Recibirás un correo de confirmación en breve.');
    // Redirigir a una página de éxito o de vuelta al listado de mascotas
    window.location.href = '<?= BASE_URL ?>adoptar';
}

// Función para animar el progreso del perro
function animateDogProgress() {
    const currentStep = '<?= $step ?>';
    const allDogs = document.querySelectorAll('[id^="dogIcon-"]');
    
    // Ocultar todos los perros primero
    allDogs.forEach(dog => {
        dog.style.opacity = '0';
        dog.style.transform = 'translateX(-50%) scale(0.8)';
    });
    
    // Mostrar el perro en el paso actual con animación
    setTimeout(() => {
        const currentDog = document.getElementById(`dogIcon-${currentStep}`);
        if (currentDog) {
            currentDog.style.opacity = '1';
            currentDog.style.transform = 'translateX(-50%) scale(1)';
            currentDog.style.transition = 'all 0.5s ease-in-out';
            
            // Agregar un pequeño rebote al perro
            setTimeout(() => {
                currentDog.style.transform = 'translateX(-50%) scale(1.1)';
                setTimeout(() => {
                    currentDog.style.transform = 'translateX(-50%) scale(1)';
                }, 150);
            }, 200);
        }
    }, 100);
}

// Ejecutar la animación cuando la página cargue
document.addEventListener('DOMContentLoaded', function() {
    animateDogProgress();
});

// Close modal on outside click
document.addEventListener('click', function(event) {
    const modal = document.getElementById('loginModal');
    if (modal && event.target === modal) {
        closeModal();
    }
});

// Close modal on escape key
document.addEventListener('keydown', function(event) {
    if (event.key === 'Escape') {
        const modal = document.getElementById('loginModal');
        if (modal) {
            closeModal();
        }
    }
});
</script>

<?php include_once(__DIR__ . '/../Templates/footer.php'); ?>
</body>
</html>
