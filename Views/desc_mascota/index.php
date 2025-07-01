
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Perfil Mascota - Magie</title>
  <link rel="stylesheet" href="<?php echo BASE_URL; ?>assets/css/descripcion.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
</head>
<body>
 <?php 
  
    // 1. Get the pet ID from the URL
    $petId = isset($_GET['id']) ? (int)$_GET['id'] : null;
    $mascota = $data['mascotas'] ?? null;
    
 
 
 include_once(__DIR__ . '/../Templates/header.php');
 
 
 ?>
  <div class="pet-profile">
    <!-- Header -->
    <div class="header-section">
      <div class="pet-header">
        <img class="pet-avatar" src="<?php echo BASE_URL; ?>assets/images/shiba.jpg" alt="Magie">
        <div class="pet-data">
          <h1>Hi Human!</h1>
          <h2><?= htmlspecialchars($mascota['nombre']) ?></h2>
          <p class="pet-id">Pet ID: <strong><?= htmlspecialchars($mascota['id']) ?></strong></p>
          <p class="pet-location"><i class="fa-solid fa-location-dot"></i> <?= htmlspecialchars($mascota['estado']) ?> </p>
        </div>
      </div>
    </div>

    <!-- Gallery + Story -->
    <div class="gallery-story">
      <div class="gallery">
        <img id="mainImage" src="<?php echo BASE_URL; ?>assets/images/shiba.jpg" alt="Main image">
        <div class="thumbnails">
          <img src="<?php echo BASE_URL; ?>assets/images/shiba.jpg" onclick="changeImage(this)">
          <img src="<?php echo BASE_URL; ?>assets/images/shiba.jpg" onclick="changeImage(this)">
          <img src="<?php echo BASE_URL; ?>assets/images/shiba.jpg" onclick="changeImage(this)">
          <img src="<?php echo BASE_URL; ?>assets/images/shiba.jpg" onclick="changeImage(this)">
        </div>
        <div class="pet-tags">
          <div class="tag"><?= ($mascota['genero'] == 1) ? 'Male' : 'Female'; ?></div>
          <div class="tag"><?= htmlspecialchars($mascota['nombre_raza']) ?></div>
          <div class="tag">14 months</div>
          <div class="tag"><?= htmlspecialchars($mascota['color']) ?></div>
          <div class="tag"><?= htmlspecialchars($mascota['peso']) ?></div>
          <div class="tag"><?= htmlspecialchars($mascota['altura']) ?></div>
        </div>
      </div>
      <div class="story">
        <h3><?= htmlspecialchars($mascota['nombre']) ?> Story</h3>
        <p><?= htmlspecialchars($mascota['descripcion']) ?></p>
        <ul>
          <li><i class="fa-solid fa-child"></i> Can live with other children of any age</li>
          <li><i class="fa-solid fa-syringe"></i> Vaccinated</li>
          <li><i class="fa-solid fa-house"></i> House Trained</li>
          <li><i class="fa-solid fa-scissors"></i> Neutered</li>
          <li><i class="fa-solid fa-check"></i> Shots up to date</li>
          <li><i class="fa-solid fa-microchip"></i> Microchipped</li>
        </ul>
      </div>
    </div>

    <!-- Vaccination Table -->

      <div class="adopt-box">
        <p>If you're interested to adopt</p>
        <a href="#" class="btn-adopt">Get Started</a>
      </div>
    </div>

    <!-- Similar Pets -->
    <div class="similar-section">
      <h2>Similar Pets</h2>
      <div class="similar-pets">
        <?php
        $pets = [
          ['name' => 'Lisa', 'gender' => 'Female', 'img' => 'shiba.jpg'],
          ['name' => 'Bella', 'gender' => 'Male', 'img' => 'shiba.jpg'],
          ['name' => 'Lucy', 'gender' => 'Female', 'img' => 'shiba.jpg'],
          ['name' => 'Stella', 'gender' => 'Female', 'img' => 'shiba.jpg']
        ];
        foreach ($pets as $pet): ?>
          <div class="pet-card">
            <img src="<?php echo BASE_URL; ?>assets/images/<?php echo $pet['img']; ?>" alt="<?php echo $pet['name']; ?>">
            <h4><?php echo $pet['name']; ?></h4>
            <p><?php echo $pet['gender']; ?></p>
            <a href="#" class="btn-more">More Info</a>
          </div>
        <?php endforeach; ?>
      </div>
    </div>
  </div>

<?php include_once(__DIR__ . '/../Templates/footer.php'); ?>

  <script>
    function changeImage(img) {
      document.getElementById('mainImage').src = img.src;
    }
  </script>
</body>
</html>