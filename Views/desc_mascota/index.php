
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Perfil Mascota - Magie</title>
  <link rel="stylesheet" href="<?php echo BASE_URL; ?>assets/css/descripcion.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
  <script src="https://cdn.tailwindcss.com"></script>
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
          <h1>HOLA humano!</h1>
          <h2><?= htmlspecialchars($mascota['nombre']) ?></h2>
          <p class="pet-id">ID de la mascota: <strong><?= htmlspecialchars($mascota['id']) ?></strong></p>
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
          <div class="tag"><?= procesarFechaYValores($mascota['fecha_nacimiento'], $mascota['edad_minima'], $mascota['edad_maxima']) ?></div>
          <div class="tag"><?= htmlspecialchars($mascota['color']) ?></div>
          <div class="tag"><?= htmlspecialchars($mascota['peso']) ?></div>
          <div class="tag"><?= htmlspecialchars($mascota['altura']) ?></div>
        </div>
      </div>
      <div class="story">
        <h3>Un poco de <?= htmlspecialchars($mascota['nombre']) ?> </h3>
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
        <p>Si estás interesado en adoptar</p>
        <?php if(isset($_SESSION['id'])): ?>
          <a href="<?= BASE_URL ?>adoptar/proceso?id=<?= $mascota['id'] ?>" class="btn-adopt">Comenzar</a>
        <?php else: ?>
          <a onclick="openLoginModal()" class="btn-adopt">Comenzar</a>
        <?php endif; ?>
      </div>
    </div>

    <!-- Similar Pets -->
</section>
    <!-- section cartas mascota -->
    <section class="py-16 px-8 bg-gray-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <!-- titulo section -->
        <div class="text-center mb-12">
            <h2 class="text-3xl font-bold text-gray-900">
               Mascotas <span class="text-purple-main">Similares</span>
            </h2>
        </div>

      <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
        <?php

        foreach ($data['lista'] as $m): ?>

         
<!-- CARD MASCOTA -->


  <script defer src="<?php echo BASE_URL; ?>Assets/js/cardMascota.js"></script>
  <div class="bg-white rounded-lg shadow-md overflow-hidden w-[300px] h-[580px] flex flex-col"> 
    <div class="relative">
        <div class="w-full h-48 bg-gray-200 flex items-center justify-center">
           <img class="w-full h-full object-cover" src="<?php echo BASE_URL; ?><?php echo $m['url_foto']; ?>" alt="Shiba Inu">
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
                <span class="text-sm text-gray-600">Genero:</span>
                <span class="text-sm <?= getColorClass('gender', $m['genero']) ?> px-2 py-1 rounded"><?= ($m['genero'] == 1) ? 'Male' : 'Female'; ?></span>
            </div>
            <div class="flex justify-between">
                <span class="text-sm text-gray-600">Raza:</span>
                <span class="text-sm bg-purple-light text-purple-dark px-2 py-1 rounded"><?= $m['nombre_raza'] ?></span>
            </div>
            <div class="flex justify-between">
                <span class="text-sm text-gray-600">Edad:</span>
                <span class="text-sm bg-purple-light text-purple-dark px-2 py-1 rounded"><?= procesarFechaYValores($m['fecha_nacimiento'], $m['edad_minima'], $m['edad_maxima']) ?></span>
            </div>
            <div class="flex justify-between">
                <span class="text-sm text-gray-600">Tamaño:</span>
                <span class="text-sm <?= getColorClass('size', $m['altura']) ?> px-2 py-1 rounded"><?= $m['altura'] ?> cm</span>
            </div>
        </div>

        <p class="text-sm text-gray-600 mb-4">
            <?= htmlspecialchars(strlen($m['descripcion']) > 74 ? substr($m['descripcion'], 0, 74) . '...' : $m['descripcion']) ?>
        </p>


        <a href="<?php echo BASE_URL; ?>desc_mascota?id=<?php echo $m['id']; ?>" class=" items-center w-full bg-white border border-purple-main text-purple-main py-2 px-6 rounded hover:bg-purple-light transition-colors">
            Más información
        </a>
    </div>
</div>



        <?php endforeach; ?>
      </div>
          </div>
    </section>

  </div>

<!-- Login/Register Modal -->
<div id="loginModal" class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center z-50 hidden">
    <div class="bg-white rounded-2xl p-8 max-w-md w-full mx-4 transform transition-all scale-95 opacity-0" id="modalContent">
        <div class="text-center mb-6">
            <div class="w-16 h-16 bg-gradient-to-br from-purple-500 to-indigo-600 rounded-full flex items-center justify-center mx-auto mb-4">
                <i class="fas fa-heart text-white text-2xl"></i>
            </div>
            <h2 class="text-2xl font-bold text-gray-900 mb-2">Comienza tu viaje de adopción</h2>
            <p class="text-gray-600">Por favor inicia sesión o crea una cuenta para continuar con la adopción de <strong><?= htmlspecialchars($mascota['nombre']) ?></strong></p>
        </div>

        <!-- Login/Register Tabs -->
        <div class="flex border-b border-gray-200 mb-6">
            <button class="flex-1 py-2 px-4 text-center font-medium text-purple-600 border-b-2 border-purple-600" id="loginTab" onclick="showLoginForm()">
                Login
            </button>
            <button class="flex-1 py-2 px-4 text-center font-medium text-gray-500" id="registerTab" onclick="showRegisterForm()">
                Register
            </button>
        </div>

        <!-- Login Form -->
        <div id="loginForm" class="space-y-4">
            <form action="<?= BASE_URL ?>login/authenticate" method="POST" class="space-y-4">
                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-2">Email</label>
                    <input type="email" name="correo" required class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-purple-500 focus:border-transparent transition-colors">
                </div>
                
                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-2">Password</label>
                    <input type="password" name="clave" required class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-purple-500 focus:border-transparent transition-colors">
                </div>
                
                <input type="hidden" name="redirect_url" value="<?= BASE_URL ?>adoptar/proceso?id=<?= $mascota['id'] ?>&step=start">
                
                <button type="submit" class="w-full bg-purple-600 hover:bg-purple-700 text-white font-semibold py-3 rounded-lg transition-colors duration-200">
                    Login & Continue Adoption
                </button>
            </form>
        </div>

        <!-- Register Form -->
        <div id="registerForm" class="space-y-4 hidden">
            <form action="<?= BASE_URL ?>login/register" method="POST" class="space-y-4">
                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-2">Full Name</label>
                    <input type="text" name="nombre" required class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-purple-500 focus:border-transparent transition-colors">
                </div>
                
                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-2">Email</label>
                    <input type="email" name="correo" required class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-purple-500 focus:border-transparent transition-colors">
                </div>
                
                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-2">Password</label>
                    <input type="password" name="clave" required class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-purple-500 focus:border-transparent transition-colors">
                </div>
                
                <input type="hidden" name="redirect_url" value="<?= BASE_URL ?>adoptar/proceso?id=<?= $mascota['id'] ?>&step=start">
                
                <button type="submit" class="w-full bg-green-600 hover:bg-green-700 text-white font-semibold py-3 rounded-lg transition-colors duration-200">
                    Create Account & Start Adoption
                </button>
            </form>
        </div>

        <div class="mt-6 text-center">
            <button onclick="closeLoginModal()" class="text-gray-500 hover:text-gray-700 text-sm font-medium">
                Close
            </button>
        </div>
    </div>
</div>

<?php include_once(__DIR__ . '/../Templates/footer.php'); ?>

  <script>
    function changeImage(img) {
      document.getElementById('mainImage').src = img.src;
    }

    // Modal functions
    function showLoginModal() {
      const modal = document.getElementById('loginModal');
      const modalContent = document.getElementById('modalContent');
      
      modal.classList.remove('hidden');
      
      // Animate modal appearance
      setTimeout(() => {
        modalContent.classList.remove('scale-95', 'opacity-0');
        modalContent.classList.add('scale-100', 'opacity-100');
      }, 10);
    }

    function closeLoginModal() {
      const modal = document.getElementById('loginModal');
      const modalContent = document.getElementById('modalContent');
      
      // Animate modal disappearance
      modalContent.classList.remove('scale-100', 'opacity-100');
      modalContent.classList.add('scale-95', 'opacity-0');
      
      setTimeout(() => {
        modal.classList.add('hidden');
      }, 200);
    }

    function showLoginForm() {
      document.getElementById('loginForm').classList.remove('hidden');
      document.getElementById('registerForm').classList.add('hidden');
      document.getElementById('loginTab').classList.add('text-purple-600', 'border-b-2', 'border-purple-600');
      document.getElementById('loginTab').classList.remove('text-gray-500');
      document.getElementById('registerTab').classList.remove('text-purple-600', 'border-b-2', 'border-purple-600');
      document.getElementById('registerTab').classList.add('text-gray-500');
    }

    function showRegisterForm() {
      document.getElementById('registerForm').classList.remove('hidden');
      document.getElementById('loginForm').classList.add('hidden');
      document.getElementById('registerTab').classList.add('text-purple-600', 'border-b-2', 'border-purple-600');
      document.getElementById('registerTab').classList.remove('text-gray-500');
      document.getElementById('loginTab').classList.remove('text-purple-600', 'border-b-2', 'border-purple-600');
      document.getElementById('loginTab').classList.add('text-gray-500');
    }

    // Close modal when clicking outside
    document.getElementById('loginModal').addEventListener('click', function(e) {
      if (e.target === this) {
        closeLoginModal();
      }
    });

    // Close modal with Escape key
    document.addEventListener('keydown', function(e) {
      if (e.key === 'Escape') {
        closeLoginModal();
      }
    });
  </script>
</body>
</html>