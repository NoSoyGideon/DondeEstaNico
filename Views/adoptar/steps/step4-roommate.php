<?php
// Step 4: Roommate - Roommate information
$stepData = [
    'stepName' => 'roommate',
    'stepTitle' => 'Información de Compañeros de Casa',
    'stepNumber' => 4
];
?>

<div class="space-y-6">
    <h2 class="text-2xl font-bold text-gray-900 mb-6">Información de Compañeros de Casa</h2>
    <form id="roommateForm" class="space-y-6">
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            <div>
                <label for="num_adults" class="block text-sm font-semibold text-gray-700 mb-2">Número de adultos</label>
                <select id="num_adults" name="num_adults" required 
                        class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary focus:border-transparent transition-colors">
                    <option value="0">0</option>
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                    <option value="5+">5+</option>
                </select>
                <p class="text-xs text-gray-500 mt-1">Al menos un adulto debe vivir en tu hogar</p>
            </div>

            <div>
                <label for="num_children" class="block text-sm font-semibold text-gray-700 mb-2">Número de niños *</label>
                <select id="num_children" name="num_children" required 
                        class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary focus:border-transparent transition-colors">
                    <option value="0">0</option>
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                    <option value="5+">5+</option>
                </select>
            </div>

            <div>
                <label for="youngest_age" class="block text-sm font-semibold text-gray-700 mb-2">Edad del niño más pequeño</label>
                <select id="youngest_age" name="youngest_age" 
                        class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary focus:border-transparent transition-colors">
                    <option value="">Selecciona una opción</option>
                    <option value="0-2">0-2 años</option>
                    <option value="3-5">3-5 años</option>
                    <option value="6-10">6-10 años</option>
                    <option value="11-15">11-15 años</option>
                    <option value="16+">16+ años</option>
                </select>
            </div>
        </div>

        <div>
            <label class="block text-sm font-semibold text-gray-700 mb-3">¿Reciben niños de visita?</label>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <label class="flex items-center p-4 border border-gray-300 rounded-lg cursor-pointer hover:bg-gray-50">
                    <input type="radio" name="visiting_children" value="yes" class="w-4 h-4 text-primary border-gray-300 focus:ring-primary">
                    <span class="ml-3 text-gray-700">Sí</span>
                </label>
                <label class="flex items-center p-4 border border-gray-300 rounded-lg cursor-pointer hover:bg-gray-50">
                    <input type="radio" name="visiting_children" value="no" class="w-4 h-4 text-primary border-gray-300 focus:ring-primary">
                    <span class="ml-3 text-gray-700">No</span>
                </label>
            </div>
        </div>

        <div>
            <label for="visiting_ages" class="block text-sm font-semibold text-gray-700 mb-2">Edades de los niños que visitan</label>
            <select id="visiting_ages" name="visiting_ages" 
                    class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary focus:border-transparent transition-colors">
                <option value="">Por favor selecciona</option>
                <option value="0-2">0-2 años</option>
                <option value="3-5">3-5 años</option>
                <option value="6-10">6-10 años</option>
                <option value="11-15">11-15 años</option>
                <option value="16+">16+ años</option>
                <option value="mixed">Edades mixtas</option>
            </select>
        </div>

        <div>
            <label class="block text-sm font-semibold text-gray-700 mb-3">¿Tienes compañeros de piso o inquilinos?</label>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <label class="flex items-center p-4 border border-gray-300 rounded-lg cursor-pointer hover:bg-gray-50">
                    <input type="radio" name="flatmates" value="yes" class="w-4 h-4 text-primary border-gray-300 focus:ring-primary">
                    <span class="ml-3 text-gray-700">Sí</span>
                </label>
                <label class="flex items-center p-4 border border-gray-300 rounded-lg cursor-pointer hover:bg-gray-50">
                    <input type="radio" name="flatmates" value="no" class="w-4 h-4 text-primary border-gray-300 focus:ring-primary">
                    <span class="ml-3 text-gray-700">No</span>
                </label>
            </div>
        </div>
    </form>
    
    <div class="flex justify-between pt-6">
        <button class="bg-gray-200 hover:bg-gray-300 text-gray-700 font-semibold py-3 px-8 rounded-lg transition-colors duration-200" onclick="previousStep('household')">
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
    
    // Validate number of adults
    const numAdults = document.getElementById('num_adults');
    if (!numAdults.value) {
        isValid = false;
    }
    
    // Validate number of children
    const numChildren = document.getElementById('num_children');
    if (!numChildren.value) {
        isValid = false;
    }
    
    // If children > 0, youngest age should be selected
    if (numChildren.value !== "0") {
        const youngestAge = document.getElementById('youngest_age');
        if (!youngestAge.value) {
            isValid = false;
        }
    }
    
    return isValid;
}

function validateAndContinue() {
    if (validateForm()) {
        // Store form data in localStorage for later use
        const formData = {
            num_adults: document.getElementById('num_adults').value,
            num_children: document.getElementById('num_children').value,
            youngest_age: document.getElementById('youngest_age').value,
            visiting_children: document.querySelector('input[name="visiting_children"]:checked')?.value,
            visiting_ages: document.getElementById('visiting_ages').value,
            flatmates: document.querySelector('input[name="flatmates"]:checked')?.value
        };
        localStorage.setItem('adoptionRoommateData', JSON.stringify(formData));
        
        // Show success message
        showSuccessMessage();
        
        // Continue to next step
        setTimeout(() => {
            nextStep('other_animals');
        }, 1000);
    } else {
        // Show error message
        showErrorMessage();
    }
}

function showSuccessMessage() {
    const successDiv = document.createElement('div');
    successDiv.className = 'fixed top-4 right-4 bg-green-500 text-white px-6 py-3 rounded-lg shadow-lg z-50 transition-all duration-300';
    successDiv.innerHTML = '<i class="fas fa-check mr-2"></i>Información de compañeros de casa guardada exitosamente!';
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

// Handle children count change
document.addEventListener('DOMContentLoaded', function() {
    const numChildren = document.getElementById('num_children');
    const youngestAge = document.getElementById('youngest_age');
    
    numChildren.addEventListener('change', function() {
        if (this.value === "0") {
            youngestAge.value = "";
            youngestAge.disabled = true;
            youngestAge.classList.add('bg-gray-100');
        } else {
            youngestAge.disabled = false;
            youngestAge.classList.remove('bg-gray-100');
        }
    });
    
    // Load saved data
    const savedData = localStorage.getItem('adoptionRoommateData');
    if (savedData) {
        const data = JSON.parse(savedData);
        
        if (data.num_adults) {
            document.getElementById('num_adults').value = data.num_adults;
        }
        if (data.num_children) {
            document.getElementById('num_children').value = data.num_children;
        }
        if (data.youngest_age) {
            document.getElementById('youngest_age').value = data.youngest_age;
        }
        if (data.visiting_children) {
            document.querySelector(`input[name="visiting_children"][value="${data.visiting_children}"]`).checked = true;
        }
        if (data.visiting_ages) {
            document.getElementById('visiting_ages').value = data.visiting_ages;
        }
        if (data.flatmates) {
            document.querySelector(`input[name="flatmates"][value="${data.flatmates}"]`).checked = true;
        }
    }
});
</script>
