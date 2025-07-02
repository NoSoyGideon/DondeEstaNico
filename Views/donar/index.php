

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="<?php echo BASE_URL; ?>assets/css/donar.css">
    <script defer src="<?php echo BASE_URL; ?>Assets/js/adopcion.js"></script>
    <style>
    :root {
      --primary: #41349D;
      --light: #EAE8F7;
      --white: #fff;
    }
    * { box-sizing: border-box; margin:0; padding:0; }
    body {
      font-family: Arial, sans-serif;
      background: var(--light);
      color: #333;
      
    }
    .container {
      display: flex;
      gap: 20px;
      flex-wrap: wrap;
    }
    .block {
      background: var(--white);
      border: 1px solid #ddd;
      border-radius: 16px;
      padding: 24px;
      flex: 1;
      min-width:300px;
    }
    .left h2 {
      color: var(--primary);
      font-size: 1.8rem;
      margin-bottom: 12px;
      font-weight: bold;
    }
    .left p.intro {
      font-size: 1rem;
      margin-bottom: 20px;
    }
    .buttons {
      display: flex;
      gap: 10px;
      margin-bottom: 16px;
    }
    .buttons button {
      flex:1;
      padding: 12px;
      border: 2px solid var(--primary);
      border-radius: 8px;
      background: var(--white);
      color: var(--primary);
      font-weight: bold;
      font-size: 1rem;
      cursor: pointer;
      position: relative;
      transition: all 0.2s ease;
    }
    .buttons button.selected {
      background: var(--primary);
      color: var(--white);
    }
    .buttons button.selected::after {
      content: '';
      position: absolute;
      bottom: -8px;
      left: 50%;
      transform: translateX(-50%);
      width: 0;
      height: 0;
      border-left: 8px solid transparent;
      border-right: 8px solid transparent;
      border-top: 8px solid var(--primary);
    }
    .description {
      margin-bottom: 20px;
      font-size: 0.95rem;
      min-height: 48px;
    }
    .other-amount {
      margin-bottom: 20px;
    }
    .other-amount label {
      display: block;
      font-weight: bold;
      margin-bottom: 6px;
    }
    .other-amount .input-wrapper {
      position: relative;
    }
    .other-amount input {
      width:100%;
      padding: 10px 36px 10px 12px;
      border-radius: 8px;
      border: 2px solid #ccc;
      font-size: 1rem;
    }
    .other-amount .dollar-icon {
      position: absolute;
      right: 12px;
      top: 50%;
      transform: translateY(-50%);
      font-size: 1.2rem;
      color: #666;
    }
    .donate-btn {
      display: block;
      width: 100%;
      padding: 12px;
      background: var(--primary);
      color: var(--white);
      border: none;
      border-radius: 8px;
      font-size: 1.1rem;
      font-weight: bold;
      cursor: pointer;
      transition: background 0.2s ease;
    }
    .donate-btn:hover {
      background: #342a7a;
    }
    .right img {
      max-width: 100%;
      border-radius: 16px;
      object-fit: cover;
    }
    .bottom-banner {
      margin-top: 30px;
      padding: 20px;
      background: var(--primary);
      color: white;
      border-radius: 12px;
      text-align: center;
      font-size: 1.1rem;
    }
  </style>

</head>
<?php include_once(__DIR__ . '/../Templates/header.php'); ?>
<body>


  <div class="container">
    <!-- Bloque izquierdo -->
    <div class="block left">
      <h2>Donate today</h2>
      <p class="intro">Your donation will make a difference. Together, we can save lives.</p>

      <div class="buttons">
        <button data-value="10">$10</button>
        <button data-value="50">$50</button>
        <button data-value="100">$100</button>
      </div>

      <div class="description" id="desc">
        <!-- Texto según selección -->
        $10 could help provide specialist food and supplements to bring animals back to health.
      </div>

      <div class="other-amount">
        <label for="other">Other amount</label>
        <div class="input-wrapper">
          <input type="number" id="other" placeholder="Enter amount in USD">
          <span class="dollar-icon">$</span>
        </div>
      </div>

      <button class="donate-btn" id="donateBtn">Donate $10 now</button>
    </div>

    <!-- Bloque derecho con imagen -->
    <div class="block right">
      <img src="https://images.unsplash.com/photo-1543852786-1cf6624b9987?auto=format&fit=crop&w=600&q=80" alt="Pets rescue">
    </div>
  </div>

  <div class="bottom-banner">
    Thank you for supporting our cause! 🐾
  </div>

  <script>
    const buttons = document.querySelectorAll('.buttons button');
    const desc = document.getElementById('desc');
    const otherInput = document.getElementById('other');
    const donateBtn = document.getElementById('donateBtn');

    const descriptions = {
      10: '$10 could help provide specialist food and supplements to bring animals back to health.',
      50: '$50 could cover vaccinations and basic medical treatment for a rescued pet.',
      100: '$100 could sponsor a full check-up and microchip implantation for a rescued animal.'
    };

    let selected = 10;

    function updateUI() {
      buttons.forEach(b => {
        b.classList.toggle('selected', b.dataset.value == selected);
      });
      if (otherInput.value.trim() === '') {
        desc.textContent = descriptions[selected];
      }
      donateBtn.textContent = `Donate $${ otherInput.value.trim() || selected } now`;
    }

    buttons.forEach(btn => {
      btn.addEventListener('click', () => {
        selected = btn.dataset.value;
        otherInput.value = '';
        updateUI();
      });
    });

    otherInput.addEventListener('input', () => {
      donateBtn.textContent = `Donate $${otherInput.value || selected} now`;
      if (otherInput.value.trim() !== '') {
        desc.textContent = '';
      } else {
        desc.textContent = descriptions[selected];
      }
    });

    // inicializa
    updateUI();

    donateBtn.addEventListener('click', () => {
      alert(`¡Gracias por donar $${otherInput.value.trim() || selected}!`);
    });
  </script>
  <?php include_once(__DIR__ . '/../Templates/footer.php'); ?>


</body>
</html>