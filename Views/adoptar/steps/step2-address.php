<?php
// Step 2: Address - Address information
$stepData = [
    'stepName' => 'address',
    'stepTitle' => 'Información de Dirección',
    'stepNumber' => 2
];
?>

<div class="space-y-6">
    <h2 class="text-2xl font-bold text-gray-900 mb-6">Información de Dirección</h2>
    <form id="addressForm" class="space-y-6">
        <div>
            <label for="street" class="block text-sm font-semibold text-gray-700 mb-2">Dirección de la Calle *</label>
            <input type="text" id="street" name="street" required 
                   class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary focus:border-transparent transition-colors"
                   placeholder="Av. Francisco de Miranda, Torre Empresarial...">
            <span class="text-red-500 text-sm hidden" id="street-error">Por favor ingresa tu dirección</span>
        </div>
        
        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
            <div>
                <label for="city" class="block text-sm font-semibold text-gray-700 mb-2">Ciudad *</label>
                <input type="text" id="city" name="city" required 
                       class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary focus:border-transparent transition-colors"
                       placeholder="Maracay, Maracaibo, Valencia...">
                <span class="text-red-500 text-sm hidden" id="city-error">Por favor ingresa tu ciudad</span>
            </div>
            <div>
                <label for="state" class="block text-sm font-semibold text-gray-700 mb-2">Estado *</label>
                <select id="state" name="state" required 
                        class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary focus:border-transparent transition-colors">
                    <option value="">Selecciona tu estado</option>
                    <option value="Amazonas">Amazonas</option>
                    <option value="Anzoátegui">Anzoátegui</option>
                    <option value="Apure">Apure</option>
                    <option value="Aragua">Aragua</option>
                    <option value="Barinas">Barinas</option>
                    <option value="Bolívar">Bolívar</option>
                    <option value="Carabobo">Carabobo</option>
                    <option value="Cojedes">Cojedes</option>
                    <option value="Delta Amacuro">Delta Amacuro</option>
                    <option value="Distrito Capital">Distrito Capital</option>
                    <option value="Falcón">Falcón</option>
                    <option value="Guárico">Guárico</option>
                    <option value="Lara">Lara</option>
                    <option value="Mérida">Mérida</option>
                    <option value="Miranda">Miranda</option>
                    <option value="Monagas">Monagas</option>
                    <option value="Nueva Esparta">Nueva Esparta</option>
                    <option value="Portuguesa">Portuguesa</option>
                    <option value="Sucre">Sucre</option>
                    <option value="Táchira">Táchira</option>
                    <option value="Trujillo">Trujillo</option>
                    <option value="Vargas">Vargas</option>
                    <option value="Yaracuy">Yaracuy</option>
                    <option value="Zulia">Zulia</option>
                </select>
                <span class="text-red-500 text-sm hidden" id="state-error">Por favor selecciona tu estado</span>
            </div>
        </div>
        
        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
            <div>
                <label for="zip" class="block text-sm font-semibold text-gray-700 mb-2">Código Postal *</label>
                <input type="text" id="zip" name="zip" required 
                       pattern="[0-9]{4,5}" 
                       maxlength="5"
                       class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary focus:border-transparent transition-colors"
                       placeholder="1010, 2001, 3001..."
                       oninput="validateZipCode(this)">
                <span class="text-red-500 text-sm hidden" id="zip-error">Por favor ingresa un código postal válido (solo números, 4-5 dígitos)</span>
            </div>
        </div>
    </form>
    
    <div class="flex justify-between pt-6">
        <button class="bg-gray-200 hover:bg-gray-300 text-gray-700 font-semibold py-3 px-8 rounded-lg transition-colors duration-200" onclick="previousStep('start')">
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
function validateZipCode(input) {
    // Remove any non-numeric characters
    input.value = input.value.replace(/[^0-9]/g, '');
    
    // Clear error if valid
    const errorElement = document.getElementById('zip-error');
    if (input.value.length >= 4 && input.value.length <= 5) {
        errorElement.classList.add('hidden');
        input.classList.remove('border-red-500');
        input.classList.add('border-gray-300');
    }
}

function validateForm() {
    let isValid = true;
    const errors = [];
    
    // Validate street address
    const street = document.getElementById('street');
    const streetError = document.getElementById('street-error');
    if (!street.value.trim()) {
        streetError.classList.remove('hidden');
        street.classList.add('border-red-500');
        isValid = false;
    } else {
        streetError.classList.add('hidden');
        street.classList.remove('border-red-500');
    }
    
    // Validate city
    const city = document.getElementById('city');
    const cityError = document.getElementById('city-error');
    if (!city.value.trim()) {
        cityError.classList.remove('hidden');
        city.classList.add('border-red-500');
        isValid = false;
    } else {
        cityError.classList.add('hidden');
        city.classList.remove('border-red-500');
    }
    
    // Validate state
    const state = document.getElementById('state');
    const stateError = document.getElementById('state-error');
    if (!state.value) {
        stateError.classList.remove('hidden');
        state.classList.add('border-red-500');
        isValid = false;
    } else {
        stateError.classList.add('hidden');
        state.classList.remove('border-red-500');
    }
    
    // Validate ZIP code
    const zip = document.getElementById('zip');
    const zipError = document.getElementById('zip-error');
    if (!zip.value.trim() || zip.value.length < 4 || zip.value.length > 5 || !/^\d+$/.test(zip.value)) {
        zipError.classList.remove('hidden');
        zip.classList.add('border-red-500');
        isValid = false;
    } else {
        zipError.classList.add('hidden');
        zip.classList.remove('border-red-500');
    }
    
    return isValid;
}

function validateAndContinue() {
    if (validateForm()) {
        // Store form data in localStorage for later use
        const formData = {
            street: document.getElementById('street').value,
            city: document.getElementById('city').value,
            state: document.getElementById('state').value,
            zip: document.getElementById('zip').value,
        };
        localStorage.setItem('adoptionAddressData', JSON.stringify(formData));
        
        // Show success message
        showSuccessMessage();
        
        // Continue to next step
        setTimeout(() => {
            nextStep('household');
        }, 1000);
    } else {
        // Show error message
        showErrorMessage();
    }
}

function showSuccessMessage() {
    // Create a temporary success message
    const successDiv = document.createElement('div');
    successDiv.className = 'fixed top-4 right-4 bg-green-500 text-white px-6 py-3 rounded-lg shadow-lg z-50 transition-all duration-300';
    successDiv.innerHTML = '<i class="fas fa-check mr-2"></i>Información de dirección guardada exitosamente!';
    document.body.appendChild(successDiv);
    
    // Remove after 3 seconds
    setTimeout(() => {
        successDiv.remove();
    }, 3000);
}

function showErrorMessage() {
    // Create a temporary error message
    const errorDiv = document.createElement('div');
    errorDiv.className = 'fixed top-4 right-4 bg-red-500 text-white px-6 py-3 rounded-lg shadow-lg z-50 transition-all duration-300';
    errorDiv.innerHTML = '<i class="fas fa-exclamation-triangle mr-2"></i>Por favor completa todos los campos requeridos correctamente';
    document.body.appendChild(errorDiv);
    
    // Remove after 3 seconds
    setTimeout(() => {
        errorDiv.remove();
    }, 3000);
}

// Load saved data when page loads
document.addEventListener('DOMContentLoaded', function() {
    const savedData = localStorage.getItem('adoptionAddressData');
    if (savedData) {
        const data = JSON.parse(savedData);
        document.getElementById('street').value = data.street || '';
        document.getElementById('city').value = data.city || '';
        document.getElementById('state').value = data.state || '';
        document.getElementById('zip').value = data.zip || '';
    }
});
</script>
