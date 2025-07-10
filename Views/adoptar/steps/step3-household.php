<?php
// Step 3: Household - Household information
$stepData = [
    'stepName' => 'home',
    'stepTitle' => 'Información del Hogar',
    'stepNumber' => 3
];
?>

<div class="space-y-6">
    <h2 class="text-2xl font-bold text-gray-900 mb-6">Información del Hogar</h2>
    <form id="householdForm" class="space-y-6">
        <div>
            <label class="block text-sm font-semibold text-gray-700 mb-3">Tipo de Vivienda *</label>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                <label class="flex items-center p-4 border border-gray-300 rounded-lg cursor-pointer hover:bg-gray-50">
                    <input type="radio" name="housing_type" value="house" required class="w-4 h-4 text-primary border-gray-300 focus:ring-primary">
                    <span class="ml-3 text-gray-700">Casa</span>
                </label>
                <label class="flex items-center p-4 border border-gray-300 rounded-lg cursor-pointer hover:bg-gray-50">
                    <input type="radio" name="housing_type" value="apartment" required class="w-4 h-4 text-primary border-gray-300 focus:ring-primary">
                    <span class="ml-3 text-gray-700">Apartamento</span>
                </label>
                <label class="flex items-center p-4 border border-gray-300 rounded-lg cursor-pointer hover:bg-gray-50">
                    <input type="radio" name="housing_type" value="condo" required class="w-4 h-4 text-primary border-gray-300 focus:ring-primary">
                    <span class="ml-3 text-gray-700">Condominio</span>
                </label>
            </div>
        </div>

        <div>
            <label class="block text-sm font-semibold text-gray-700 mb-3">¿Es propietario o alquila? *</label>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <label class="flex items-center p-4 border border-gray-300 rounded-lg cursor-pointer hover:bg-gray-50">
                    <input type="radio" name="ownership" value="own" required class="w-4 h-4 text-primary border-gray-300 focus:ring-primary">
                    <span class="ml-3 text-gray-700">Propio</span>
                </label>
                <label class="flex items-center p-4 border border-gray-300 rounded-lg cursor-pointer hover:bg-gray-50">
                    <input type="radio" name="ownership" value="rent" required class="w-4 h-4 text-primary border-gray-300 focus:ring-primary">
                    <span class="ml-3 text-gray-700">Alquilado</span>
                </label>
            </div>
        </div>

        <div>
            <label class="block text-sm font-semibold text-gray-700 mb-3">¿Tiene jardín? *</label>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <label class="flex items-center p-4 border border-gray-300 rounded-lg cursor-pointer hover:bg-gray-50">
                    <input type="radio" name="has_garden" value="yes" required class="w-4 h-4 text-primary border-gray-300 focus:ring-primary">
                    <span class="ml-3 text-gray-700">Sí</span>
                </label>
                <label class="flex items-center p-4 border border-gray-300 rounded-lg cursor-pointer hover:bg-gray-50">
                    <input type="radio" name="has_garden" value="no" required class="w-4 h-4 text-primary border-gray-300 focus:ring-primary">
                    <span class="ml-3 text-gray-700">No</span>
                </label>
            </div>
        </div>

        <div>
            <label for="activity_level" class="block text-sm font-semibold text-gray-700 mb-2">Por favor describe tu situación de vivienda/hogar *</label>
            <select id="activity_level" name="activity_level" required 
                    class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary focus:border-transparent transition-colors">
                <option value="">Por favor selecciona</option>
                <option value="very_quiet">Muy tranquilo - Mínima actividad, ambiente pacífico</option>
                <option value="quiet">Tranquilo - Poca actividad, hogar calmado</option>
                <option value="moderate">Moderado - Actividades diarias regulares, estilo de vida equilibrado</option>
                <option value="active">Activo - Hogar ocupado con actividades regulares</option>
                <option value="very_active">Muy activo - Alta energía, mucho movimiento y actividad</option>
            </select>
        </div>

        <div>
            <label for="household_setting" class="block text-sm font-semibold text-gray-700 mb-2">¿Puedes describir el entorno de tu hogar? *</label>
            <select id="household_setting" name="household_setting" required 
                    class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary focus:border-transparent transition-colors">
                <option value="">Por favor selecciona</option>
                <option value="urban">Urbano - Ambiente de ciudad, área de alta densidad</option>
                <option value="suburban">Suburbano - Barrio residencial, densidad media</option>
                <option value="rural">Rural - Campo, baja densidad, mucho espacio</option>
                <option value="mixed">Mixto - Combinación de características urbanas y suburbanas</option>
            </select>
        </div>

        <div>
            <label for="household_activity" class="block text-sm font-semibold text-gray-700 mb-2">¿Puedes describir el nivel de actividad típico del hogar? *</label>
            <select id="household_activity" name="household_activity" required 
                    class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary focus:border-transparent transition-colors">
                <option value="">Por favor selecciona</option>
                <option value="low">Baja actividad - Principalmente en interiores, estilo de vida sedentario</option>
                <option value="moderate">Actividad moderada - Algunas actividades al aire libre, rutina equilibrada</option>
                <option value="high">Alta actividad - Ejercicio regular, aventuras al aire libre</option>
                <option value="very_high">Actividad muy alta - Deportes diarios, senderismo, estilo de vida muy activo</option>
            </select>
        </div>
    </form>
    
    <div class="flex justify-between pt-6">
        <button class="bg-gray-200 hover:bg-gray-300 text-gray-700 font-semibold py-3 px-8 rounded-lg transition-colors duration-200" onclick="previousStep('address')">
            <i class="fas fa-arrow-left mr-2"></i>
            Anterior
        </button>
        <button type="button" class="bg-primary hover:bg-indigo-700 text-white font-semibold py-3 px-8 rounded-lg transition-colors duration-200 transform hover:scale-105" onclick="validateAndContinue()">
            Continuar
            <i class="fas fa-arrow-right ml-2"></i>
        </button>
    </div>
</div>

<script>
function validateForm() {
    let isValid = true;
    
    // Validate housing type
    const housingType = document.querySelector('input[name="housing_type"]:checked');
    if (!housingType) {
        isValid = false;
    }
    
    // Validate ownership
    const ownership = document.querySelector('input[name="ownership"]:checked');
    if (!ownership) {
        isValid = false;
    }
    
    // Validate garden
    const garden = document.querySelector('input[name="has_garden"]:checked');
    if (!garden) {
        isValid = false;
    }
    
    // Validate activity level
    const activityLevel = document.getElementById('activity_level');
    if (!activityLevel.value) {
        isValid = false;
    }
    
    // Validate household setting
    const householdSetting = document.getElementById('household_setting');
    if (!householdSetting.value) {
        isValid = false;
    }
    
    // Validate household activity
    const householdActivity = document.getElementById('household_activity');
    if (!householdActivity.value) {
        isValid = false;
    }
    
    return isValid;
}

function validateAndContinue() {
    if (validateForm()) {
        // Store form data in localStorage for later use
        const formData = {
            housing_type: document.querySelector('input[name="housing_type"]:checked')?.value,
            ownership: document.querySelector('input[name="ownership"]:checked')?.value,
            has_garden: document.querySelector('input[name="has_garden"]:checked')?.value,
            activity_level: document.getElementById('activity_level').value,
            household_setting: document.getElementById('household_setting').value,
            household_activity: document.getElementById('household_activity').value
        };
        localStorage.setItem('adoptionHouseholdData', JSON.stringify(formData));
        
        // Show success message
        showSuccessMessage();
        
        // Continue to next step
        setTimeout(() => {
            nextStep('roommate');
        }, 1000);
    } else {
        // Show error message
        showErrorMessage();
    }
}

function showSuccessMessage() {
    const successDiv = document.createElement('div');
    successDiv.className = 'fixed top-4 right-4 bg-green-500 text-white px-6 py-3 rounded-lg shadow-lg z-50 transition-all duration-300';
    successDiv.innerHTML = '<i class="fas fa-check mr-2"></i>Información del hogar guardada exitosamente!';
    document.body.appendChild(successDiv);
    
    setTimeout(() => {
        successDiv.remove();
    }, 3000);
}

function showErrorMessage() {
    const errorDiv = document.createElement('div');
    errorDiv.className = 'fixed top-4 right-4 bg-red-500 text-white px-6 py-3 rounded-lg shadow-lg z-50 transition-all duration-300';
    errorDiv.innerHTML = '<i class="fas fa-exclamation-triangle mr-2"></i>Por favor completa todos los campos requeridos';
    document.body.appendChild(errorDiv);
    
    setTimeout(() => {
        errorDiv.remove();
    }, 3000);
}

// Load saved data when page loads
document.addEventListener('DOMContentLoaded', function() {
    const savedData = localStorage.getItem('adoptionHouseholdData');
    if (savedData) {
        const data = JSON.parse(savedData);
        
        if (data.housing_type) {
            document.querySelector(`input[name="housing_type"][value="${data.housing_type}"]`).checked = true;
        }
        if (data.ownership) {
            document.querySelector(`input[name="ownership"][value="${data.ownership}"]`).checked = true;
        }
        if (data.has_garden) {
            document.querySelector(`input[name="has_garden"][value="${data.has_garden}"]`).checked = true;
        }
        if (data.activity_level) {
            document.getElementById('activity_level').value = data.activity_level;
        }
        if (data.household_setting) {
            document.getElementById('household_setting').value = data.household_setting;
        }
        if (data.household_activity) {
            document.getElementById('household_activity').value = data.household_activity;
        }
    }
});
</script>
