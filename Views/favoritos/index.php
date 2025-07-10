
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
     <link rel="stylesheet" href="<?php echo BASE_URL; ?>assets/css/favoritos.css">
     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
     <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet">

</head>
<?php include_once(__DIR__ . '/../Templates/header.php'); ?>  
<body>
<section class="favoritos-hero">
  <div class="hero-content">
    <div class="text-section">
      <h1>Tus Favoritos</h1>
      <p>Aquí verás las mascotas que guardaste con amor para adoptar más tarde.</p>
    </div>
    <div class="image-section">
      <img src="<?php echo BASE_URL; ?>Assets/images/favoritos/favoritos.png" alt="Ilustración mascotas" />
    </div>
  </div>

  <div class="buscador">
    <input type="text" placeholder="Buscar por nombre..." />
    <button>Filtrar</button>
  </div>
</section>


<section class="max-w-7xl mx-auto mt-20 px-4">
      <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6 " id="lista-mascotas">
         <?php 
       foreach ($data['mascotas'] as $m): 

      

    
      ?>

 
<!-- CARD MASCOTA -->
   <div class="p-4 card-mascota" data-nombre="<?= strtolower(htmlspecialchars($m['nombre'])) ?>">


<script defer src="<?php echo BASE_URL; ?>Assets/js/cardMascota.js"></script>
<div class="bg-white rounded-lg shadow-md overflow-hidden">
    <div class="relative">
        <div class="w-full h-48 bg-gray-200 flex items-center justify-center">
            <img class="w-full h-full object-cover" src="<?php echo BASE_URL; ?><?php echo $m['url_foto']; ?>" alt="Shiba Inu">
        </div>


<!-- Estrella FAVORITO -->
<div class="absolute top-3 left-3 p-1 rounded cursor-pointer"
     data-pet-id="123"
     data-is-favorite="1"
     onclick="toggleFavorite(this)">
    <svg class="w-5 h-5 transition-colors duration-200"
         fill="currentColor"
         viewBox="0 0 20 20">
        <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/>
    </svg>
</div>





    </div>
    <div class="p-4">

    
               <?php
        $especie = strtolower(trim($m['especie']));
        if ($especie === 'perro') {
            // Icono de perro
            echo '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-dog-icon lucide-dog"><path d="M11.25 16.25h1.5L12 17z"/><path d="M16 14v.5"/><path d="M4.42 11.247A13.152 13.152 0 0 0 4 14.556C4 18.728 7.582 21 12 21s8-2.272 8-6.444a11.702 11.702 0 0 0-.493-3.309"/><path d="M8 14v.5"/><path d="M8.5 8.5c-.384 1.05-1.083 2.028-2.344 2.5-1.931.722-3.576-.297-3.656-1-.113-.994 1.177-6.53 4-7 1.923-.321 3.651.845 3.651 2.235A7.497 7.497 0 0 1 14 5.277c0-1.39 1.844-2.598 3.767-2.277 2.823.47 4.113 6.006 4 7-.08.703-1.725 1.722-3.656 1-1.261-.472-1.855-1.45-2.239-2.5"/></svg>';
        } elseif ($especie === 'gato') {
            // Icono de gato
            echo '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-cat-icon lucide-cat"><path d="M12 5c.67 0 1.35.09 2 .26 1.78-2 5.03-2.84 6.42-2.26 1.4.58-.42 7-.42 7 .57 1.07 1 2.24 1 3.44C21 17.9 16.97 21 12 21s-9-3-9-7.56c0-1.25.5-2.4 1-3.44 0 0-1.89-6.42-.5-7 1.39-.58 4.72.23 6.5 2.23A9.04 9.04 0 0 1 12 5Z"/><path d="M8 14v.5"/><path d="M16 14v.5"/><path d="M11.25 16.25h1.5L12 17l-.75-.75Z"/></svg>';
        } else {
            // Default o desconocido
            echo '<svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M12 4v16m8-8H4" />
            </svg>';
        }
        ?>
     <h3 class="text-lg font-semibold text-gray-900"><?= htmlspecialchars($m['nombre']) ?></h3>
        
     
     
     <div class="flex items-center text-sm text-gray-600 mb-3">
           <svg class="w-4 h-4 mr-1" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M5.05 4.05a7 7 0 119.9 9.9L10 18.9l-4.95-4.95a7 7 0 010-9.9zM10 11a2 2 0 100-4 2 2 0 000 4z" clip-rule="evenodd"/>
            </svg>
            <?= htmlspecialchars($m['estado']) ?>   , <?= htmlspecialchars(strlen($m['direccion']) > 25 ? substr($m['direccion'], 0, 25) . '...' : $m['direccion']) ?>  <!--  Aquí va el estado y direccion de la mascota -->
        </div>

        <div class="space-y-2 mb-4">
            <div class="flex justify-between">
                <span class="text-sm text-gray-600">Gender:</span>
                <span class="text-sm <?= getColorClass('gender', $m['genero']) ?> px-2 py-1 rounded"><?= ($m['genero'] == 1) ? 'Male' : 'Female'; ?></span>
            </div>
            <div class="flex justify-between">
                <span class="text-sm text-gray-600">Breed:</span>
                <span class="text-sm <?= buscarColorPorRaza($data['razasConColor'], $m['nombre_raza']) ?> px-2 py-1 rounded"><?= $m['nombre_raza'] ?></span>
            </div>
            <div class="flex justify-between">
                <span class="text-sm text-gray-600">Age:</span>
                <span class="text-sm bg-purple-light text-purple-dark px-2 py-1 rounded"><?= procesarFechaYValores($m['fecha_nacimiento'], $m['edad_minima'], $m['edad_maxima']) ?></span>
            </div>
            <div class="flex justify-between">
                <span class="text-sm text-gray-600">Size:</span>
                <span class="text-sm <?= getColorClass('size', $m['altura']) ?> px-2 py-1 rounded"><?= $m['altura'] ?> cm</span>
            </div>
        </div>

        <p class="text-sm text-gray-600 mb-4">
            <?= htmlspecialchars(strlen($m['descripcion']) > 74 ? substr($m['descripcion'], 0, 74) . '...' : $m['descripcion']) ?>
        </p>


        <a href="<?php echo BASE_URL; ?>desc_mascota?id=<?php echo $m['id']; ?>" class=" items-center w-full bg-white border border-purple-main text-purple-main py-2 px-6 rounded hover:bg-purple-light transition-colors">
            Más información
        </a>
        <p class="text-sm text-gray-600 mb-4">
               
        </p>
    </div>




</div>


</div>

          
      <?php endforeach; ?>

</section>

<?php include_once(__DIR__ . '/../Templates/footer.php'); ?>

<script>
document.addEventListener("DOMContentLoaded", function() {
    const input = document.querySelector(".buscador input");
    const button = document.querySelector(".buscador button");
    const cards = document.querySelectorAll(".card-mascota");

    button.addEventListener("click", function() {
        const searchTerm = input.value.trim().toLowerCase();

        cards.forEach(card => {
            const nombre = card.getAttribute("data-nombre");
            if (nombre.includes(searchTerm)) {
                card.style.display = "block";
            } else {
                card.style.display = "none";
            }
        });
    });
});
</script>




    
</body>
</html>