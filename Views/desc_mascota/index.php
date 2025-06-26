<?php

require_once '../../Config/Config.php';
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pet Description</title>
    <link rel="stylesheet" href="<?php echo BASE_URL; ?>assets/css/descripcion.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    
</head>
<body>
  <?php include_once '../Templates/header.php'; ?>

  <div class="pet-profile">
    <div class="pet-header">
      <h1>Hi Human!</h1>
      <h2>Magie</h2>
      <p>Pet ID: 80638810</p>
      <div class="location">
        <i class="fa-solid fa-location-dot"></i>
        <span>United States Of America, California (12 Km away)</span>
      </div>
    </div>

    <div class="pet-images">
      <img src="<?php echo BASE_URL; ?>assets/images/dieta.jpg" alt="Magie" class="main-image">
      <div class="thumbnail-images">
        <img src="<?php echo BASE_URL; ?>assets/images/dieta.jpg" alt="Thumbnail 1">
        <img src="<?php echo BASE_URL; ?>assets/images/dieta.jpg" alt="Thumbnail 2">
        <img src="<?php echo BASE_URL; ?>assets/images/dieta.jpg" alt="Thumbnail 3">
      </div>
    </div>

    <div class="pet-story">
      <h3>Magie Story</h3>
      <p>We have had Magie since she was able to leave her mum as a puppy at 8 weeks old...</p>
      <ul class="pet-details">
        <li><i class="fa-solid fa-check"></i> Can live with other children of any age</li>
        <li><i class="fa-solid fa-check"></i> Vaccinated</li>
        <li><i class="fa-solid fa-check"></i> House-Trained</li>
        <li><i class="fa-solid fa-check"></i> Neutered</li>
        <li><i class="fa-solid fa-check"></i> Shots up to date</li>
        <li><i class="fa-solid fa-check"></i> Microchipped</li>
      </ul>
    </div>

    <div class="similar-pets">
      <h3>Similar Pets</h3>
      <div class="pet-card">
        <img src="<?php echo BASE_URL; ?>assets/images/dieta.jpg" alt="Lisa">
        <p>Lisa</p>
        <p>Female, Shiba Inu</p>
        <button>More Info</button>
      </div>
      <div class="pet-card">
        <img src="<?php echo BASE_URL; ?>assets/images/dieta.jpg" alt="Bella">
        <p>Bella</p>
        <p>Male, Shiba Inu</p>
        <button>More Info</button>
      </div>
      <div class="pet-card">
        <img src="<?php echo BASE_URL; ?>assets/images/dieta.jpg" alt="Lucy">
        <p>Lucy</p>
        <p>Female, Shiba Inu</p>
        <button>More Info</button>
      </div>
      <div class="pet-card">
        <img src="<?php echo BASE_URL; ?>assets/images/dieta.jpg" alt="Stella">
        <p>Stella</p>
        <p>Female, Shiba Inu</p>
        <button>More Info</button>
      </div>
    </div>
  </div>



  
  <?php include_once '../Templates/footer.php'; ?>
</body>
</html>