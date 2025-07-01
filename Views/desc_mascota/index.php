<?php

require_once '../../Config/Config.php';
?>
<?php include_once '../Templates/header.php'; ?>

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
  <div class="pet-profile">
    <!-- Header -->
    <div class="header-section">
      <div class="pet-header">
        <img class="pet-avatar" src="<?php echo BASE_URL; ?>assets/images/shiba.jpg" alt="Magie">
        <div class="pet-data">
          <h1>Hi Human!</h1>
          <h2>Magie</h2>
          <p class="pet-id">Pet ID: <strong>80638810</strong></p>
          <p class="pet-location"><i class="fa-solid fa-location-dot"></i> United States Of America - California (12 Km away)</p>
        </div>
      </div>
    </div>

    <!-- Gallery + Story -->
    <div class="gallery-story">
      <div class="gallery">
        <img id="mainImage" src="<?php echo BASE_URL; ?>assets/images/shiba.jpg" alt="Main image" style="width: 1000px; height: 400px;">
        <div class="thumbnails">  
          <img src="<?php echo BASE_URL; ?>assets/images/shiba.jpg" onclick="changeImage(this)">
          <img src="<?php echo BASE_URL; ?>assets/images/shiba3.jpg" onclick="changeImage(this)">
          <img src="<?php echo BASE_URL; ?>assets/images/shiba4.jpg" onclick="changeImage(this)">
          <img src="<?php echo BASE_URL; ?>assets/images/shiba5.jpg" onclick="changeImage(this)">
        </div>
        <div class="pet-tags">
          <div class="tag">Female</div>
          <div class="tag">Shiba Inu</div>
          <div class="tag">14 months</div>
          <div class="tag">Red</div>
          <div class="tag">12.1 kg</div>
          <div class="tag">51 cm</div>
        </div>
      </div>
      <div class="story">
        <h3>Magie Story</h3>
        <p>We have had Magie since she was able to leave her mum as a puppy at 8 weeks old. She currently lives with children and other animals. Magie is playful, loving, and ready to meet her new family!</p>
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
    <div class="vaccination-section">
      <table>
        <thead>
          <tr>
            <th>Age</th>
            <th>8th Week</th>
            <th>14th Week</th>
            <th>22nd Week</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td>Vaccinated</td>
            <td>Bordetella<br>Match<br>Leptospirosis</td>
            <td>Bordetella, Canine Antivirus<br>Match<br>Leptospirosis</td>
            <td>Bordetella, Canine Antivirus<br>Match<br>Leptospirosis</td>
          </tr>
        </tbody>
      </table>
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

  <?php include_once '../Templates/footer.php'; ?>

  <script>
    function changeImage(img) {
      document.getElementById('mainImage').src = img.src;
    }
  </script>
</body>
</html>