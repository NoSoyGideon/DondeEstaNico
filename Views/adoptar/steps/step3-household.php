<?php
// Step 3: Household - Household information
$stepData = [
    'stepName' => 'home',
    'stepTitle' => 'Household Information',
    'stepNumber' => 3
];
?>

<div class="space-y-6">
    <h2 class="text-2xl font-bold text-gray-900 mb-6">Household Information</h2>
    <form class="space-y-6">
        <div>
            <label class="block text-sm font-semibold text-gray-700 mb-3">Housing Type *</label>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                <label class="flex items-center p-4 border border-gray-300 rounded-lg cursor-pointer hover:bg-gray-50">
                    <input type="radio" name="housing_type" value="house" required class="w-4 h-4 text-primary border-gray-300 focus:ring-primary">
                    <span class="ml-3 text-gray-700">House</span>
                </label>
                <label class="flex items-center p-4 border border-gray-300 rounded-lg cursor-pointer hover:bg-gray-50">
                    <input type="radio" name="housing_type" value="apartment" required class="w-4 h-4 text-primary border-gray-300 focus:ring-primary">
                    <span class="ml-3 text-gray-700">Apartment</span>
                </label>
                <label class="flex items-center p-4 border border-gray-300 rounded-lg cursor-pointer hover:bg-gray-50">
                    <input type="radio" name="housing_type" value="condo" required class="w-4 h-4 text-primary border-gray-300 focus:ring-primary">
                    <span class="ml-3 text-gray-700">Condo</span>
                </label>
            </div>
        </div>

        <div>
            <label class="block text-sm font-semibold text-gray-700 mb-3">Do you own or rent? *</label>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <label class="flex items-center p-4 border border-gray-300 rounded-lg cursor-pointer hover:bg-gray-50">
                    <input type="radio" name="ownership" value="own" required class="w-4 h-4 text-primary border-gray-300 focus:ring-primary">
                    <span class="ml-3 text-gray-700">Own</span>
                </label>
                <label class="flex items-center p-4 border border-gray-300 rounded-lg cursor-pointer hover:bg-gray-50">
                    <input type="radio" name="ownership" value="rent" required class="w-4 h-4 text-primary border-gray-300 focus:ring-primary">
                    <span class="ml-3 text-gray-700">Rent</span>
                </label>
            </div>
        </div>

        <div>
            <label for="household_members" class="block text-sm font-semibold text-gray-700 mb-2">Number of people in household *</label>
            <input type="number" id="household_members" name="household_members" min="1" required class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary focus:border-transparent transition-colors">
        </div>

        <div>
            <label class="block text-sm font-semibold text-gray-700 mb-3">Do you have other pets? *</label>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <label class="flex items-center p-4 border border-gray-300 rounded-lg cursor-pointer hover:bg-gray-50">
                    <input type="radio" name="other_pets" value="yes" required class="w-4 h-4 text-primary border-gray-300 focus:ring-primary">
                    <span class="ml-3 text-gray-700">Yes</span>
                </label>
                <label class="flex items-center p-4 border border-gray-300 rounded-lg cursor-pointer hover:bg-gray-50">
                    <input type="radio" name="other_pets" value="no" required class="w-4 h-4 text-primary border-gray-300 focus:ring-primary">
                    <span class="ml-3 text-gray-700">No</span>
                </label>
            </div>
        </div>
    </form>
    
    <div class="flex justify-between pt-6">
        <button class="bg-gray-200 hover:bg-gray-300 text-gray-700 font-semibold py-3 px-8 rounded-lg transition-colors duration-200" onclick="previousStep('address')">
            Previous
        </button>
        <button class="bg-primary hover:bg-indigo-700 text-white font-semibold py-3 px-8 rounded-lg transition-colors duration-200 transform hover:scale-105" onclick="nextStep('experience')">
            Continue
        </button>
    </div>
</div>
