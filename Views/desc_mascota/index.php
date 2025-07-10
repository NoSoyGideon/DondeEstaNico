
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
    $foto = $data['fotos'][0]['url_foto'] ?? null;
    $foto2 = $data['fotos'][1]['url_foto'] ?? null;
    $foto3 = $data['fotos'][2]['url_foto'] ?? null;
    $foto4 = $data['fotos'][3]['url_foto'] ?? null;

    include_once(__DIR__ . '/../Templates/header.php');

 
 ?>
  <div class="pet-profile">
    <!-- Header -->
    <div class="header-section">
      <div class="pet-header">
        <img class="pet-avatar" src="<?= BASE_URL . $foto ?>" alt="Magie">
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
        <img id="mainImage" src="<?= BASE_URL . $foto ?>" alt="Main image">
        <div class="thumbnails">
          <img src="<?php echo BASE_URL. $foto; ?>" onclick="changeImage(this)">

          <?php if ($foto2): ?>
          <img src="<?php echo BASE_URL. $foto2; ?>" onclick="changeImage(this)">
          <?php endif; ?>
          <?php if ($foto3): ?>
          <img src="<?php echo BASE_URL. $foto3; ?>" onclick="changeImage(this)">
          <?php endif; ?>
          <?php if ($foto4): ?>
          <img src="<?php echo BASE_URL. $foto4; ?>" onclick="changeImage(this)">
          <?php endif; ?>
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
          <?php
          if (!empty($data['etiquetas'])): 
            foreach ($data['etiquetas'] as $etiqueta): ?>
         <li class="inline-flex items-center justify-center gap-1 px-2 py-[2px] bg-[#EFECFF] text-[#5D4FC4] border border-[#5D4FC4] rounded-md text-sm w-fit">
 
  <?= htmlspecialchars($etiqueta['etiqueta']) ?>
</li>


            <?php endforeach; ?>
          <?php else: ?>
            <li>No tags available</li>
          <?php endif; ?>
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