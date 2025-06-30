<?php
// Archivo componente de la barra de navegación - navbar.php
// Este archivo está diseñado para ser incluido en otras páginas
?>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <link rel="icon" href="<?php echo BASE_URL; ?>assets/images/home/iconWeb.svg" type="image/x-icon">
    <script src="https://cdn.tailwindcss.com"></script>
    <!-- Configuración personalizada de Tailwind para colores específicos -->
    <script>
      tailwind.config = {
        theme: {
          extend: {
            colors: {
              'purple-main': '#675BC8',
              'purple-dark': '#2E256F',
              'purple-light': '#f3f0ff',
              'purple-text': '#3d3477',
              'black':'#0C0C0C',
              'green-main': '#0A453A'
            }
          }
        }
      }
    </script>
      <?php include_once(__DIR__ . '/../Login/index.php'); ?>


<nav class="flex items-center justify-between py-2 px-8 bg-white border-b border-gray-100">
    <div class="flex items-center gap-2 relative ml-10">
        <div class="w-12 h-12 rounded-full flex items-center justify-center">
            <img src="<?php echo BASE_URL; ?>assets/images/home/iconWeb.svg" alt="Logo" class="w-8 h-8">
        </div>
        <div class="text-purple-main font-bold text-xl leading-tight">
            Adopt Buddies
        </div>
        <div class="flex items-center ml-3">
            <img src="<?php echo BASE_URL; ?>assets/images/home/HuellaNav.png" class="w-7 h-7 transition-opacity duration-200 opacity-80" alt="huella">
            <img src="<?php echo BASE_URL; ?>assets/images/home/HuellaNav.png" class="w-7 h-7 transition-opacity duration-200 opacity-60 -ml-2" alt="huella">
            <img src="<?php echo BASE_URL; ?>assets/images/home/HuellaNav.png" class="w-7 h-7 transition-opacity duration-200 opacity-50 -ml-2" alt="huella">
            <img src="<?php echo BASE_URL; ?>assets/images/home/HuellaNav.png" class="w-7 h-7 transition-opacity duration-200 opacity-40 -ml-2" alt="huella">
        </div>
    </div>
    <div class="flex gap-8 ml-8">
        <a href="<?php echo BASE_URL; ?>home" class="text-purple-text font-medium text-base hover:text-purple-main transition-colors duration-200">Inicio</a>
        <a href="<?php echo BASE_URL; ?>adoptar" class="text-purple-text font-medium text-base hover:text-purple-main transition-colors duration-200">Adoptar</a>
        <a href="<?php echo BASE_URL; ?>donar" class="text-purple-text font-medium text-base hover:text-purple-main transition-colors duration-200">Donar</a>
        <a href="<?php echo BASE_URL; ?>contacto" class="text-purple-text font-medium text-base hover:text-purple-main transition-colors duration-200">Contact us</a>
        <a href="<?php echo BASE_URL; ?>admin_overview" class="text-purple-text font-medium text-base hover:text-purple-main transition-colors duration-200">Overview</a>
    </div>
    <div class="flex items-center gap-4">
        <button class="border-[1.5px] border-purple-main rounded-lg py-[0.3rem] px-[0.6rem] bg-white text-purple-main text-lg flex items-center cursor-pointer hover:bg-purple-light transition-colors duration-200" title="Notifications">
            <!-- Campana SVG -->
            <svg width="20" height="20" fill="none" stroke="#6c55e0" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" viewBox="0 0 24 24"><path d="M18 16v-5a6 6 0 10-12 0v5a2 2 0 01-2 2h16a2 2 0 01-2-2z"/><path d="M13.73 21a2 2 0 01-3.46 0"/></svg>
        </button>
        <button onclick="openLoginModal()" class="border-[1.5px] border-purple-main rounded-full py-[0.3rem] px-[1.2rem] bg-white text-purple-main text-base flex items-center gap-2 cursor-pointer transition-colors duration-200 hover:bg-purple-light font-medium">
            <span class="text-lg">
                <!-- Usuario SVG -->
                <svg width="18" height="18" fill="none" stroke="#6c55e0" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" viewBox="0 0 24 24"><circle cx="12" cy="7" r="4"/><path d="M5.5 21a8.38 8.38 0 0113 0"/></svg>
            </span>
            Iniciar sesión
        </button>
        <button onclick="openRegisterModal()" class="border-[1.5px] border-purple-main rounded-full py-[0.3rem] px-[1.2rem] bg-purple-main text-white text-base flex items-center gap-2 cursor-pointer transition-colors duration-200 hover:bg-purple-dark font-medium">Registrarse</button>
    </div>
</nav>