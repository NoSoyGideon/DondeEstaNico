<?php
// Step 4: Experience - Pet experience
$stepData = [
    'stepName' => 'experience',
    'stepTitle' => 'Pet Experience',
    'stepNumber' => 4
];
?>

<div class="space-y-6">
    <h2 class="text-2xl font-bold text-gray-900 mb-6">Pet Experience</h2>
    <form class="space-y-6">
        <div>
            <label class="block text-sm font-semibold text-gray-700 mb-3">Have you owned pets before? *</label>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <label class="flex items-center p-4 border border-gray-300 rounded-lg cursor-pointer hover:bg-gray-50">
                    <input type="radio" name="pet_experience" value="yes" required class="w-4 h-4 text-primary border-gray-300 focus:ring-primary">
                    <span class="ml-3 text-gray-700">Yes</span>
                </label>
                <label class="flex items-center p-4 border border-gray-300 rounded-lg cursor-pointer hover:bg-gray-50">
                    <input type="radio" name="pet_experience" value="no" required class="w-4 h-4 text-primary border-gray-300 focus:ring-primary">
                    <span class="ml-3 text-gray-700">No</span>
                </label>
            </div>
        </div>

        <div>
            <label for="experience_details" class="block text-sm font-semibold text-gray-700 mb-2">Tell us about your experience with pets</label>
            <textarea id="experience_details" name="experience_details" rows="4" class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary focus:border-transparent transition-colors" placeholder="Describe your experience with pets, training, care, etc."></textarea>
        </div>

        <div>
            <label for="why_adopt" class="block text-sm font-semibold text-gray-700 mb-2">Why do you want to adopt this pet? *</label>
            <textarea id="why_adopt" name="why_adopt" rows="4" required class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary focus:border-transparent transition-colors" placeholder="Tell us why you want to adopt this specific pet"></textarea>
        </div>

        <div>
            <label for="availability" class="block text-sm font-semibold text-gray-700 mb-2">How many hours per day can you dedicate to your pet? *</label>
            <select id="availability" name="availability" required class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary focus:border-transparent transition-colors">
                <option value="">Select hours</option>
                <option value="1-2">1-2 hours</option>
                <option value="3-4">3-4 hours</option>
                <option value="5-6">5-6 hours</option>
                <option value="7+">7+ hours</option>
                <option value="all-day">All day</option>
            </select>
        </div>
    </form>
    
    <div class="flex justify-between pt-6">
        <button class="bg-gray-200 hover:bg-gray-300 text-gray-700 font-semibold py-3 px-8 rounded-lg transition-colors duration-200" onclick="previousStep('household')">
            Previous
        </button>
        <button class="bg-primary hover:bg-indigo-700 text-white font-semibold py-3 px-8 rounded-lg transition-colors duration-200 transform hover:scale-105" onclick="nextStep('review')">
            Continue
        </button>
    </div>
</div>
