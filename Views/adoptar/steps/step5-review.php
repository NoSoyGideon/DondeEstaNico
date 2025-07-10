<?php
// Step 5: Review - Final review and submission
$stepData = [
    'stepName' => 'review',
    'stepTitle' => 'Review & Submit',
    'stepNumber' => 5
];
?>

<div class="space-y-6">
    <h2 class="text-2xl font-bold text-gray-900 mb-6">Review Your Application</h2>
    
    <div class="bg-green-50 border border-green-200 rounded-xl p-6">
        <div class="flex items-center space-x-3 mb-4">
            <div class="w-8 h-8 bg-green-100 rounded-full flex items-center justify-center">
                <svg class="w-5 h-5 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                </svg>
            </div>
            <h3 class="text-lg font-semibold text-green-800">Almost Done!</h3>
        </div>
        <p class="text-green-700">Please review all the information below before submitting your adoption application.</p>
    </div>

    <!-- Application Summary -->
    <div class="bg-white border border-gray-200 rounded-xl p-6 space-y-6">
        <div>
            <h4 class="font-semibold text-gray-900 mb-3">Pet Information</h4>
            <div class="bg-gray-50 rounded-lg p-4">
                <p class="text-gray-700">Pet: <span class="font-medium"><?= htmlspecialchars($mascota['nombre']) ?></span></p>
                <p class="text-gray-700">Breed: <span class="font-medium"><?= htmlspecialchars($mascota['nombre_raza']) ?></span></p>
                <p class="text-gray-700">Gender: <span class="font-medium"><?= ($mascota['genero'] == 1) ? 'Male' : 'Female' ?></span></p>
            </div>
        </div>

        <div>
            <h4 class="font-semibold text-gray-900 mb-3">Contact Information</h4>
            <div class="bg-gray-50 rounded-lg p-4">
                <p class="text-gray-700">Name: <span class="font-medium"><?= $usuario ? htmlspecialchars($usuario['nombre']) : 'Not available' ?></span></p>
                <p class="text-gray-700">Email: <span class="font-medium"><?= $usuario ? htmlspecialchars($usuario['correo']) : 'Not available' ?></span></p>
            </div>
        </div>

        <div>
            <h4 class="font-semibold text-gray-900 mb-3">Next Steps</h4>
            <div class="bg-blue-50 rounded-lg p-4">
                <ul class="text-blue-700 space-y-2">
                    <li class="flex items-start space-x-2">
                        <span class="text-blue-500 mt-1">•</span>
                        <span>We will review your application within 2-3 business days</span>
                    </li>
                    <li class="flex items-start space-x-2">
                        <span class="text-blue-500 mt-1">•</span>
                        <span>You will receive an email confirmation shortly</span>
                    </li>
                    <li class="flex items-start space-x-2">
                        <span class="text-blue-500 mt-1">•</span>
                        <span>Our team may contact you for additional information or to schedule a meet-and-greet</span>
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
                I confirm that all the information provided is accurate and complete. I understand that providing false information may result in the rejection of my application.
            </label>
        </div>
    </div>
    
    <div class="flex justify-between pt-6">
        <button class="bg-gray-200 hover:bg-gray-300 text-gray-700 font-semibold py-3 px-8 rounded-lg transition-colors duration-200" onclick="previousStep('experience')">
            Previous
        </button>
        <button class="bg-green-600 hover:bg-green-700 text-white font-semibold py-3 px-8 rounded-lg transition-colors duration-200 transform hover:scale-105" onclick="submitApplication()">
            Submit Application
        </button>
    </div>
</div>
