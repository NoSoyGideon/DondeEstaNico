<?php
// Step 5: Review - Final review and submission
$stepData = [
    'stepName' => 'review',
    'stepTitle' => 'Revisar y Enviar',
    'stepNumber' => 5
];
?>

<div class="space-y-6">
    <h2 class="text-2xl font-bold text-gray-900 mb-6">Revisa tu Solicitud</h2>
    
    <div class="bg-green-50 border border-green-200 rounded-xl p-6">
        <div class="flex items-center space-x-3 mb-4">
            <div class="w-8 h-8 bg-green-100 rounded-full flex items-center justify-center">
                <svg class="w-5 h-5 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                </svg>
            </div>
            <h3 class="text-lg font-semibold text-green-800">¡Casi Terminado!</h3>
        </div>
        <p class="text-green-700">Por favor revisa toda la información a continuación antes de enviar tu solicitud de adopción.</p>
    </div>

    <!-- Application Summary -->
    <div class="bg-white border border-gray-200 rounded-xl p-6 space-y-6">
        <div>
            <h4 class="font-semibold text-gray-900 mb-3">Información de la Mascota</h4>
            <div class="bg-gray-50 rounded-lg p-4">
                <p class="text-gray-700">Mascota: <span class="font-medium"><?= htmlspecialchars($mascota['nombre']) ?></span></p>
                <p class="text-gray-700">Raza: <span class="font-medium"><?= htmlspecialchars($mascota['nombre_raza']) ?></span></p>
                <p class="text-gray-700">Género: <span class="font-medium"><?= ($mascota['genero'] == 1) ? 'Macho' : 'Hembra' ?></span></p>
            </div>
        </div>

        <div>
            <h4 class="font-semibold text-gray-900 mb-3">Información de Contacto</h4>
            <div class="bg-gray-50 rounded-lg p-4">
                <p class="text-gray-700">Nombre: <span class="font-medium"><?= $usuario ? htmlspecialchars($usuario['nombre']) : 'No disponible' ?></span></p>
                <p class="text-gray-700">Correo: <span class="font-medium"><?= $usuario ? htmlspecialchars($usuario['correo']) : 'No disponible' ?></span></p>
            </div>
        </div>

        <div>
            <h4 class="font-semibold text-gray-900 mb-3">Próximos Pasos</h4>
            <div class="bg-blue-50 rounded-lg p-4">
                <ul class="text-blue-700 space-y-2">
                    <li class="flex items-start space-x-2">
                        <span class="text-blue-500 mt-1">•</span>
                        <span>Revisaremos tu solicitud dentro de 2-3 días hábiles</span>
                    </li>
                    <li class="flex items-start space-x-2">
                        <span class="text-blue-500 mt-1">•</span>
                        <span>Recibirás un correo de confirmación en breve</span>
                    </li>
                    <li class="flex items-start space-x-2">
                        <span class="text-blue-500 mt-1">•</span>
                        <span>Nuestro equipo puede contactarte para información adicional o para programar una cita</span>
                    </li>
                </ul>
            </div>
        </div>
    </div>

    <!-- Final confirmation -->
    <div class="bg-amber-50 border border-amber-200 rounded-xl p-6">
        <div class="flex items-start space-x-3">
            <input type="checkbox" id="final-confirmation" required class="mt-1 w-4 h-4 text-primary border-gray-300 rounded focus:ring-primary">
            <label for="final-confirmation" class="text-sm text-amber-800 cursor-pointer">
                Confirmo que toda la información proporcionada es precisa y completa. Entiendo que proporcionar información falsa puede resultar en el rechazo de mi solicitud.
            </label>
        </div>
    </div>
    
    <div class="flex justify-between pt-6">
        <button class="bg-gray-200 hover:bg-gray-300 text-gray-700 font-semibold py-3 px-8 rounded-lg transition-colors duration-200" onclick="previousStep('other_animals')">
            Anterior
        </button>
        <button class="bg-green-600 hover:bg-green-700 text-white font-semibold py-3 px-8 rounded-lg transition-colors duration-200 transform hover:scale-105" onclick="submitApplication()">
            Enviar Solicitud
        </button>
    </div>
</div>
