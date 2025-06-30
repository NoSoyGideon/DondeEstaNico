

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="<?php echo BASE_URL; ?>assets/css/adopcion.css">
    <script defer src="<?php echo BASE_URL; ?>Assets/js/adopcion.js"></script>

</head>
<body>

<?php include_once(__DIR__ . '/../Templates/header.php'); ?>

<main class="adopcion-container">





  <!-- FILTROS -->
  <aside class="filtro-section">
    
    <!-- Botones superiores -->
    <div class="filtro-header">
      <div class="toggle-buttons">
        <button id="btn-chuchubot" class="toggle-btn active">ChuchuBot</button>
        <button id="btn-filtros" class="toggle-btn">Filtros</button>
      </div>
      <button class="reset-btn">Reset</button>
    </div>

    <hr class="divider">

    <!-- Sección Chuchubot/Filtros dinámicos -->
    <div id="filtro-content">
      <!-- Empieza vacío, JS mostrará contenido según el botón activo -->
    </div>
  </aside>





  <!-- RESULTADOS DE MASCOTAS -->
  <section class="mascotas-section">
    <div class="mascotas-grid">
      <!-- Temporal: mascotas de ejemplo -->
      <?php for ($i = 1; $i <= 9; $i++): ?>
         <div class="mascota-card">
          <img src="<?php echo BASE_URL; ?>assets/images/dieta.jpg" alt="Mascota <?= $i ?>">
        </div>
      <?php endfor; ?>
    </div>
  </section>
</main>

 <?php include_once '../Templates/footer.php'; ?>



</body>
</html>