// Donation functionality
document.addEventListener('DOMContentLoaded', function() {
    const donationAmountButtons = document.querySelectorAll('.donation-amount');
    const customAmountDiv = document.getElementById('custom-amount');
    const customAmountInput = document.getElementById('custom-amount-input');
    const donationAmountHidden = document.getElementById('donation-amount');
    const donateButton = document.getElementById('donate-button');
    const donationForm = document.getElementById('donation-form');

    let selectedAmount = 0;

    // Handle donation amount selection
    donationAmountButtons.forEach(button => {
        button.addEventListener('click', function() {
            // Remove active class from all buttons
            donationAmountButtons.forEach(btn => {
                btn.classList.remove('bg-purple-primary', 'text-white');
                btn.classList.add('bg-purple-lightest');
            });

            // Add active class to clicked button
            this.classList.add('bg-purple-primary', 'text-white');
            this.classList.remove('bg-purple-lightest');

            const amount = this.getAttribute('data-amount');
            
            if (amount === 'custom') {
                customAmountDiv.classList.remove('hidden');
                customAmountInput.focus();
                selectedAmount = 0;
                updateDonateButton();
            } else {
                customAmountDiv.classList.add('hidden');
                selectedAmount = parseInt(amount);
                donationAmountHidden.value = selectedAmount;
                updateDonateButton();
            }
        });
    });

    // Handle custom amount input
    customAmountInput.addEventListener('input', function() {
        const customAmount = parseFloat(this.value);
        if (customAmount && customAmount > 0) {
            selectedAmount = customAmount;
            donationAmountHidden.value = selectedAmount;
        } else {
            selectedAmount = 0;
        }
        updateDonateButton();
    });

    // Update donate button text and state
    function updateDonateButton() {
        if (selectedAmount > 0) {
            donateButton.textContent = `Donar $${selectedAmount} con PayPal`;
            donateButton.disabled = false;
            donateButton.innerHTML = `<i class="fas fa-heart mr-2"></i>Donar $${selectedAmount} con PayPal`;
        } else {
            donateButton.innerHTML = `<i class="fas fa-heart mr-2"></i>Selecciona una cantidad`;
            donateButton.disabled = true;
        }
    }

    // Handle form submission
    donationForm.addEventListener('submit', function(e) {
        e.preventDefault();
        
        if (selectedAmount <= 0) {
            alert('Por favor selecciona una cantidad para donar.');
            return;
        }

        // Get form data
        const formData = new FormData(this);
        formData.set('amount', selectedAmount);

        // Show loading state
        donateButton.innerHTML = '<i class="fas fa-spinner fa-spin mr-2"></i>Procesando...';
        donateButton.disabled = true;

        // Submit to PayPal processing
        submitToPayPal(formData);
    });

    // Submit to PayPal (this will redirect to PayPal for processing)
    function submitToPayPal(formData) {
        // Convert FormData to regular object
        const data = {};
        formData.forEach((value, key) => {
            data[key] = value;
        });

        console.log('Enviando donación:', data);
        
        // Store amount for success page
        localStorage.setItem('donationAmount', selectedAmount);
        
        // Submit form to process_donation.php
        fetch('process_donation.php', {
            method: 'POST',
            body: formData
        })
        .then(response => {
            console.log('Response status:', response.status);
            console.log('Response headers:', response.headers);
            
            if (!response.ok) {
                throw new Error(`HTTP error! status: ${response.status}`);
            }
            
            return response.text().then(text => {
                console.log('Raw response:', text);
                try {
                    return JSON.parse(text);
                } catch (e) {
                    console.error('JSON parse error:', e);
                    console.error('Response text:', text);
                    throw new Error('Respuesta inválida del servidor');
                }
            });
        })
        .then(result => {
            console.log('Parsed result:', result);
            if (result.success) {
                // Redirect to PayPal
                console.log('Redirigiendo a PayPal Sandbox:', result.paypal_url);
                window.location.href = result.paypal_url;
            } else {
                throw new Error(result.error || 'Error al procesar la donación');
            }
        })
        .catch(error => {
            console.error('Error:', error);
            alert('Error al procesar la donación: ' + error.message);
            
            // Reset button
            donateButton.innerHTML = '<i class="fas fa-heart mr-2"></i>Donar con PayPal';
            donateButton.disabled = false;
        });
    }

    // Initialize button state
    updateDonateButton();

    // Add smooth scroll for anchor links
    document.querySelectorAll('a[href^="#"]').forEach(anchor => {
        anchor.addEventListener('click', function (e) {
            e.preventDefault();
            const target = document.querySelector(this.getAttribute('href'));
            if (target) {
                target.scrollIntoView({
                    behavior: 'smooth',
                    block: 'start'
                });
            }
        });
    });

    // Add hover effects for cards
    const cards = document.querySelectorAll('.shadow-lg');
    cards.forEach(card => {
        card.addEventListener('mouseenter', function() {
            this.classList.add('transform', 'scale-105', 'transition-transform', 'duration-300');
        });
        
        card.addEventListener('mouseleave', function() {
            this.classList.remove('transform', 'scale-105');
        });
    });
});
