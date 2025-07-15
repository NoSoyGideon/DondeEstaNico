
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
          <div class="tag">14 months</div>
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
            <a href="#" class="btn-more">Más información</a>
          </div>
        <?php endforeach; ?>
      </div>
    </div>
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