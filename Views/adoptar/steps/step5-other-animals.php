<?php
// Step 5: Other Animals - Information about other pets
$stepData = [
    'stepName' => 'other_animals',
    'stepTitle' => 'Otras Mascotas',
    'stepNumber' => 5
];
?>

<div class="space-y-6">
    <h2 class="text-2xl font-bold text-gray-900 mb-6">Otras Mascotas</h2>
    <form id="otherAnimalsForm" class="space-y-6">
        <div>
            <label class="block text-sm font-semibold text-gray-700 mb-3">¿Alguien en el hogar tiene alergias a las mascotas? *</label>
            <textarea id="allergies" name="allergies" rows="4" 
                      class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary focus:border-transparent transition-colors"
                      placeholder="Por favor describe cualquier alergia a mascotas en tu hogar, o escribe 'Ninguna' si no existen alergias"></textarea>
        </div>

        <div>
            <label class="block text-sm font-semibold text-gray-700 mb-3">¿Hay otras mascotas en tu hogar? *</label>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <label class="flex items-center p-4 border border-gray-300 rounded-lg cursor-pointer hover:bg-gray-50">
                    <input type="radio" name="has_other_animals" value="yes" required class="w-4 h-4 text-primary border-gray-300 focus:ring-primary">
                    <span class="ml-3 text-gray-700">Sí</span>
                </label>
                <label class="flex items-center p-4 border border-gray-300 rounded-lg cursor-pointer hover:bg-gray-50">
                    <input type="radio" name="has_other_animals" value="no" required class="w-4 h-4 text-primary border-gray-300 focus:ring-primary">
                    <span class="ml-3 text-gray-700">No</span>
                </label>
            </div>
        </div>

        <div id="animal_details_section">
            <div>
                <label for="animal_details" class="block text-sm font-semibold text-gray-700 mb-2">Si es así, por favor indica su especie, edad y género</label>
                <textarea id="animal_details" name="animal_details" rows="4" 
                          class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary focus:border-transparent transition-colors"
                          placeholder="Ejemplo: Perro, 3 años, Hembra - Golden Retriever; Gato, 2 años, Macho - Doméstico de pelo corto"></textarea>
            </div>

            <div>
                <label class="block text-sm font-semibold text-gray-700 mb-3">Si es así, ¿están esterilizados? *</label>
                <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                    <label class="flex items-center p-4 border border-gray-300 rounded-lg cursor-pointer hover:bg-gray-50">
                        <input type="radio" name="are_neutered" value="yes" class="w-4 h-4 text-primary border-gray-300 focus:ring-primary">
                        <span class="ml-3 text-gray-700">Sí</span>
                    </label>
                    <label class="flex items-center p-4 border border-gray-300 rounded-lg cursor-pointer hover:bg-gray-50">
                        <input type="radio" name="are_neutered" value="no" class="w-4 h-4 text-primary border-gray-300 focus:ring-primary">
                        <span class="ml-3 text-gray-700">No</span>
                    </label>
                    <label class="flex items-center p-4 border border-gray-300 rounded-lg cursor-pointer hover:bg-gray-50">
                        <input type="radio" name="are_neutered" value="not_applicable" class="w-4 h-4 text-primary border-gray-300 focus:ring-primary">
                        <span class="ml-3 text-gray-700">No Aplica</span>
                    </label>
                </div>
            </div>

            <div>
                <label class="block text-sm font-semibold text-gray-700 mb-3">Si es así, ¿han sido vacunados en los últimos 12 meses? *</label>
                <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                    <label class="flex items-center p-4 border border-gray-300 rounded-lg cursor-pointer hover:bg-gray-50">
                        <input type="radio" name="are_vaccinated" value="yes" class="w-4 h-4 text-primary border-gray-300 focus:ring-primary">
                        <span class="ml-3 text-gray-700">Sí</span>
                    </label>
                    <label class="flex items-center p-4 border border-gray-300 rounded-lg cursor-pointer hover:bg-gray-50">
                        <input type="radio" name="are_vaccinated" value="no" class="w-4 h-4 text-primary border-gray-300 focus:ring-primary">
                        <span class="ml-3 text-gray-700">No</span>
                    </label>
                    <label class="flex items-center p-4 border border-gray-300 rounded-lg cursor-pointer hover:bg-gray-50">
                    </label>
                </div>
            </div>
        </div>

        <div>
            <label for="pet_experience" class="block text-sm font-semibold text-gray-700 mb-2">Por favor describe tu experiencia con mascotas anteriores y cuéntanos sobre el tipo de hogar que planeas ofrecer a tu nueva mascota</label>
            <textarea id="pet_experience" name="pet_experience" rows="5" 
                      class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary focus:border-transparent transition-colors"
                      placeholder="Cuéntanos sobre tu experiencia previa con mascotas, cómo planeas cuidar a tu nueva mascota, rutina diaria, planes de ejercicio, etc."></textarea>
        </div>
    </form>
    
    <div class="flex justify-between pt-6">
        <button class="bg-gray-200 hover:bg-gray-300 text-gray-700 font-semibold py-3 px-8 rounded-lg transition-colors duration-200" onclick="previousStep('roommate')">
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
    
    // Validate allergies field
    const allergies = document.getElementById('allergies');
    if (!allergies.value.trim()) {
        isValid = false;
    }
    
    // Validate has other animals
    const hasOtherAnimals = document.querySelector('input[name="has_other_animals"]:checked');
    if (!hasOtherAnimals) {
        isValid = false;
    }
    
    // If has other animals, validate additional fields
    if (hasOtherAnimals && hasOtherAnimals.value === 'yes') {
        const areNeutered = document.querySelector('input[name="are_neutered"]:checked');
        const areVaccinated = document.querySelector('input[name="are_vaccinated"]:checked');
        
        if (!areNeutered || !areVaccinated) {
            isValid = false;
        }
    }
    
    // Validate pet experience
    const petExperience = document.getElementById('pet_experience');
    if (!petExperience.value.trim()) {
        isValid = false;
    }
    
    return isValid;
}

function validateAndContinue() {
    if (validateForm()) {
        // Store form data in localStorage for later use
        const formData = {
            allergies: document.getElementById('allergies').value,
            has_other_animals: document.querySelector('input[name="has_other_animals"]:checked')?.value,
            animal_details: document.getElementById('animal_details').value,
            are_neutered: document.querySelector('input[name="are_neutered"]:checked')?.value,
            are_vaccinated: document.querySelector('input[name="are_vaccinated"]:checked')?.value,
            pet_experience: document.getElementById('pet_experience').value
        };
        localStorage.setItem('adoptionOtherAnimalsData', JSON.stringify(formData));
        
        // Show success message
        showSuccessMessage();
        
        // Continue to next step
        setTimeout(() => {
            nextStep('review');
        }, 1000);
    } else {
        // Show error message
        showErrorMessage();
    }
}

function showSuccessMessage() {
    const successDiv = document.createElement('div');
    successDiv.className = 'fixed top-4 right-4 bg-green-500 text-white px-6 py-3 rounded-lg shadow-lg z-50 transition-all duration-300';
    successDiv.innerHTML = '<i class="fas fa-check mr-2"></i>Información de otras mascotas guardada exitosamente!';
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

// Handle other animals visibility
document.addEventListener('DOMContentLoaded', function() {
    const hasOtherAnimals = document.querySelectorAll('input[name="has_other_animals"]');
    const animalDetailsSection = document.getElementById('animal_details_section');
    
    hasOtherAnimals.forEach(radio => {
        radio.addEventListener('change', function() {
            if (this.value === 'yes') {
                animalDetailsSection.style.display = 'block';
            } else {
                animalDetailsSection.style.display = 'none';
                // Clear the fields when hiding
                document.getElementById('animal_details').value = '';
                document.querySelectorAll('input[name="are_neutered"]').forEach(r => r.checked = false);
                document.querySelectorAll('input[name="are_vaccinated"]').forEach(r => r.checked = false);
            }
        });
    });
    
    // Load saved data
    const savedData = localStorage.getItem('adoptionOtherAnimalsData');
    if (savedData) {
        const data = JSON.parse(savedData);
        
        if (data.allergies) {
            document.getElementById('allergies').value = data.allergies;
        }
        if (data.has_other_animals) {
            document.querySelector(`input[name="has_other_animals"][value="${data.has_other_animals}"]`).checked = true;
            
            // Show/hide animal details section
            if (data.has_other_animals === 'yes') {
                animalDetailsSection.style.display = 'block';
            } else {
                animalDetailsSection.style.display = 'none';
            }
        }
        if (data.animal_details) {
            document.getElementById('animal_details').value = data.animal_details;
        }
        if (data.are_neutered) {
            document.querySelector(`input[name="are_neutered"][value="${data.are_neutered}"]`).checked = true;
        }
        if (data.are_vaccinated) {
            document.querySelector(`input[name="are_vaccinated"][value="${data.are_vaccinated}"]`).checked = true;
        }
        if (data.pet_experience) {
            document.getElementById('pet_experience').value = data.pet_experience;
        }
    }
});
</script>
