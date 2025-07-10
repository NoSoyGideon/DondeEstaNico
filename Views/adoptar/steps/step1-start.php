<?php
// Step 1: Start - Initial step with pet info and user data
$stepData = [
    'stepName' => 'start',
    'stepTitle' => 'Start Your Adoption',
    'stepNumber' => 1
];
?>

<!-- Horizontal Layout Card -->
<div class="bg-white rounded-2xl shadow-lg overflow-hidden">
    <!-- Main Content - Horizontal Layout -->
    <div class="grid grid-cols-1 lg:grid-cols-2 gap-8 p-8">
        <!-- Left Side - Pet Information -->
        <div class="flex flex-col items-center justify-center space-y-6">
            <div class="w-48 h-48 bg-gray-200 rounded-2xl overflow-hidden shadow-lg">
                <?php if(!empty($mascota['foto'])): ?>
                    <img src="../assets/images/mascotas/<?= htmlspecialchars($mascota['foto']) ?>" 
                         alt="<?= htmlspecialchars($mascota['nombre']) ?>"
                         class="w-full h-full object-cover">
                <?php else: ?>
                    <div class="w-full h-full flex items-center justify-center bg-gray-300">
                        <i class="fas fa-dog text-6xl text-gray-500"></i>
                    </div>
                <?php endif; ?>
            </div>
            
            <div class="text-center">
                <h3 class="text-2xl font-bold text-gray-900 mb-2"><?= htmlspecialchars($mascota['nombre']) ?></h3>
                <p class="text-gray-600 text-lg"><?= htmlspecialchars($mascota['nombre_raza']) ?></p>
                <p class="text-gray-500"><?= ($mascota['genero'] == 1) ? 'Male' : 'Female' ?></p>
            </div>
        </div>

        <!-- Right Side - User Information -->
        <div class="space-y-6">
            <div>
                <h4 class="text-xl font-semibold text-gray-900 mb-4">Your Information</h4>
                
                <div class="space-y-4">
                    <div>
                        <label class="block text-sm font-semibold text-gray-700 mb-2">Email</label>
                        <div class="bg-gray-50 border border-gray-200 rounded-lg p-3 text-gray-900">
                            <?= $usuario ? htmlspecialchars($usuario['correo']) : 'Not available' ?>
                        </div>
                    </div>
                    
                    <div>
                        <label class="block text-sm font-semibold text-gray-700 mb-2">Full Name</label>
                        <div class="bg-gray-50 border border-gray-200 rounded-lg p-3 text-gray-900">
                            <?= $usuario ? htmlspecialchars($usuario['nombre']) : 'Not available' ?>
                        </div>
                    </div>
                </div>
            </div>

            <div class="bg-blue-50 border border-blue-200 rounded-xl p-4">
                <div class="flex items-start space-x-3">
                    <i class="fas fa-info-circle text-blue-500 mt-1"></i>
                    <div>
                        <p class="text-sm text-blue-800 font-medium mb-1">Ready to start?</p>
                        <p class="text-sm text-blue-700">
                            We'll guide you through a few simple steps to complete your adoption application.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Terms and Conditions - Centered at bottom -->
    <div class="bg-gray-50 border-t border-gray-200 p-6">
        <div class="max-w-2xl mx-auto">
            <div class="bg-blue-50 border border-blue-200 rounded-xl p-6">
                <div class="flex items-start space-x-3 mb-4">
                    <input type="checkbox" id="terms-checkbox" required class="mt-1 w-4 h-4 text-primary border-gray-300 rounded focus:ring-primary">
                    <label for="terms-checkbox" class="text-sm text-gray-700 cursor-pointer">
                        I have read and agree to the <a href="#" class="text-primary font-medium hover:underline">Terms and Privacy Policy</a>
                    </label>
                </div>
                
                <p class="text-sm text-gray-600 leading-relaxed mb-4">
                    To apply for <strong>adopting <?= htmlspecialchars($mascota['nombre']) ?></strong>, you need to complete some fields. This process helps us ensure the best match between pets and families.
                </p>
                
                <div class="flex justify-center">
                    <button class="bg-primary hover:bg-indigo-700 text-white font-semibold py-3 px-8 rounded-lg transition-colors duration-200 transform hover:scale-105" onclick="nextStep('address')">
                        <i class="fas fa-arrow-right mr-2"></i>
                        Start Application
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>
