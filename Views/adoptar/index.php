

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




  <section class="mascotas-section">
    <div class="mascotas-grid">
      <?php 

      function getColorClass($type, $value) {
    $map = [
        "breed" => [
            "Shiba Inu" => "bg-yellow-100 text-yellow-800",
            "Labrador" => "bg-green-100 text-green-800"
        ],
        "gender" => [
            1 => "bg-blue-100 text-blue-800",
            0=> "bg-pink-100 text-pink-800"
        ],
        "size" => [
            "Small" => "bg-gray-100 text-gray-700",
            "Medium" => "bg-blue-100 text-blue-800",
            "Large" => "bg-red-100 text-red-800"
        ]
    ];
    return $map[$type][$value] ?? "bg-gray-100 text-gray-600";
}
      foreach ($data['mascotas'] as $m): 

      $claseColorParaMostrar = RazaHelper::getColorPorRaza($m['nombre_raza'], $m['especie']);

    
      ?>
    
<div class="bg-white rounded-lg shadow-md overflow-hidden">
    <div class="relative">
        <div class="w-full h-48 bg-gray-200 flex items-center justify-center">
            <span class="text-gray-500 text-sm"><?= htmlspecialchars($m['nombre']) ?></span>
        </div>
        <div class="absolute top-3 left-3 bg-purple-main text-white p-1 rounded">
            <!-- Static star icon -->
            <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                <path d="..."/>
            </svg>
        </div>
    </div>
    <div class="p-4">
     

        <div class="flex items-center text-sm text-gray-600 mb-3">
            <svg class="w-4 h-4 mr-1" fill="currentColor" viewBox="0 0 20 20">
                <path fill-rule="evenodd" d="..." clip-rule="evenodd"/>
            </svg>
            <?= htmlspecialchars($m['estado']) ?>
        </div>

        <div class="space-y-2 mb-4">
            <div class="flex justify-between">
                <span class="text-sm text-gray-600">Gender:</span>
                <span class="text-sm <?= getColorClass('gender', $m['genero']) ?> px-2 py-1 rounded"><?= ($m['genero'] == 1) ? 'Male' : 'Female'; ?></span>
            </div>
            <div class="flex justify-between">
                <span class="text-sm text-gray-600">Breed:</span>
                <span class="text-sm <?= $claseColorParaMostrar ?> px-2 py-1 rounded"><?= $m['nombre_raza'] ?></span>
            </div>
            <div class="flex justify-between">
                <span class="text-sm text-gray-600">Age:</span>
                <span class="text-sm bg-green-100 text-green-800 px-2 py-1 rounded"><?= $m['edad_maxima'] ?></span>
            </div>
            <div class="flex justify-between">
                <span class="text-sm text-gray-600">Size:</span>
                <span class="text-sm <?= getColorClass('size', "Small") ?> px-2 py-1 rounded"><?= $m['altura'] ?></span>
            </div>
        </div>

        <p class="text-sm text-gray-600 mb-4">
            <?= htmlspecialchars($m['descripcion']) ?>
        </p>

        <a href="<?php echo BASE_URL; ?>desc_mascota?id=<?php echo $m['id']; ?>" class="w-full bg-white border border-purple-main text-purple-main py-2 px-4 rounded hover:bg-purple-light transition-colors">
            Más información
      </a>
    </div>
</div>



          
      <?php endforeach; ?>
    </div>
  </section>
</main>

<?php include_once(__DIR__ . '/../Templates/footer.php'); ?>



</body>
</html>