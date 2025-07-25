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
          <a href="<?php echo BASE_URL; ?>realojar" class="text-purple-text font-medium text-base hover:text-purple-main transition-colors duration-200">Realojar</a>
        <a href="<?php echo BASE_URL; ?>donar" class="text-purple-text font-medium text-base hover:text-purple-main transition-colors duration-200">Donar</a>
        <a href="<?php echo BASE_URL; ?>contacto" class="text-purple-text font-medium text-base hover:text-purple-main transition-colors duration-200">Contact us</a>
      
    </div>
<div class="flex items-center gap-4 relative">

    <!-- Corazón SVG fijo -->
    

    <?php if (isset($_SESSION['nombre'])): ?>
        <a href="<?php echo BASE_URL; ?>favoritos"class="border-[1.5px] border-purple-main rounded-lg py-[0.3rem] px-[0.6rem] bg-white text-purple-main text-lg flex items-center cursor-pointer hover:bg-purple-light transition-colors duration-200" title="Favoritos">
        <svg width="20" height="20" fill="none" stroke="#6c55e0" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" viewBox="0 0 24 24">
            <path d="M20.84 4.61a5.5 5.5 0 00-7.78 0L12 5.67l-1.06-1.06a5.5 5.5 0 00-7.78 7.78l1.06 1.06L12 21.23l7.72-7.72 1.06-1.06a5.5 5.5 0 000-7.84z"/>
        </svg>
    </a>


        <!-- Usuario logueado: botón con nombre + menú -->
        <div class="relative">
            <button id="userMenuBtn" class="border-[1.5px] border-purple-main rounded-full py-[0.3rem] px-[1.2rem] bg-white text-purple-main text-base flex items-center gap-2 cursor-pointer transition-colors duration-200 hover:bg-purple-light font-medium">
                <?= htmlspecialchars($_SESSION['nombre']) ?>
                <!-- Flecha para indicar dropdown -->
                <svg class="w-4 h-4" fill="none" stroke="#6c55e0" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" viewBox="0 0 24 24">
                    <path d="M6 9l6 6 6-6"/>
                </svg>
            </button>

            <!-- Menú desplegable -->
            <div id="userDropdownMenu" class="hidden absolute right-0 mt-2 w-40 bg-white rounded-lg border border-[#DFDFDF] shadow-lg z-10">
                <ul class="flex flex-col">
                    <li>
                        <a href="<?php echo BASE_URL; ?>admin_overview" class="flex items-center gap-2 px-4 py-2 text-[#675BC8] hover:bg-purple-light cursor-pointer">
                            <!-- Icono Overview (ejemplo: casa) -->
                            <svg class="w-5 h-5" fill="none" stroke="#675BC8" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" viewBox="0 0 24 24">
                                <path d="M3 9l9-7 9 7v11a2 2 0 01-2 2h-4a2 2 0 01-2-2v-4H9v4a2 2 0 01-2 2H3a2 2 0 01-2-2z"/>
                            </svg>
                            Overview
                        </a>
                    </li>
                    <li>
                        <a href="/profile" class="flex items-center gap-2 px-4 py-2 text-[#675BC8] hover:bg-purple-light cursor-pointer">
                            <!-- Icono Profile (ejemplo: usuario) -->
                            <svg class="w-5 h-5" fill="none" stroke="#675BC8" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" viewBox="0 0 24 24">
                                <circle cx="12" cy="7" r="4"/>
                                <path d="M5.5 21a8.38 8.38 0 0113 0"/>
                            </svg>
                            Profile
                        </a>
                    </li>
                    <li>
                        <a href="/favorites" class="flex items-center gap-2 px-4 py-2 text-[#675BC8] hover:bg-purple-light cursor-pointer">
                            <!-- Icono Favorites (corazón pequeño) -->
                            <svg class="w-5 h-5" fill="none" stroke="#675BC8" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" viewBox="0 0 24 24">
                                <path d="M20.84 4.61a5.5 5.5 0 00-7.78 0L12 5.67l-1.06-1.06a5.5 5.5 0 00-7.78 7.78l1.06 1.06L12 21.23l7.72-7.72 1.06-1.06a5.5 5.5 0 000-7.84z"/>
                            </svg>
                            Favorites
                        </a>
                    </li>

                    <!-- Divider -->
                    <li>
                        <hr class="border-t border-gray-300 my-1 mx-2" />
                    </li>

                    <li>
                        <a href="<?= BASE_URL ?>login/logout" class="flex items-center gap-2 px-4 py-2 text-[#675BC8] hover:bg-purple-light cursor-pointer">
                            <!-- Icono Logout (puerta con flecha) -->
                            <svg class="w-5 h-5" fill="none" stroke="#675BC8" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" viewBox="0 0 24 24">
                                <path d="M16 17l5-5-5-5"/>
                                <path d="M21 12H9"/>
                                <path d="M13 17v1a2 2 0 01-2 2H7a2 2 0 01-2-2V6a2 2 0 012-2h4a2 2 0 012 2v1"/>
                            </svg>
                            Log Out
                        </a>
                    </li>
                </ul>
            </div>
        </div>

    <?php else: ?>
        <!-- Usuario no logueado: botones Iniciar sesión y Registrarse -->
        <button onclick="openLoginModal()" class="border-[1.5px] border-purple-main rounded-full py-[0.3rem] px-[1.2rem] bg-white text-purple-main text-base flex items-center gap-2 cursor-pointer transition-colors duration-200 hover:bg-purple-light font-medium">
            <span class="text-lg">
                <!-- Usuario SVG -->
                <svg width="18" height="18" fill="none" stroke="#6c55e0" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" viewBox="0 0 24 24"><circle cx="12" cy="7" r="4"/><path d="M5.5 21a8.38 8.38 0 0113 0"/></svg>
            </span>
            Iniciar sesión
        </button>
        <button onclick="openRegisterModal()" class="border-[1.5px] border-purple-main rounded-full py-[0.3rem] px-[1.2rem] bg-purple-main text-white text-base flex items-center gap-2 cursor-pointer transition-colors duration-200 hover:bg-purple-dark font-medium">Registrarse</button>
    <?php endif; ?>
</div>

<script>
    // Toggle menú al hacer click en el botón usuario
    document.addEventListener('DOMContentLoaded', () => {
        const btn = document.getElementById('userMenuBtn');
        const menu = document.getElementById('userDropdownMenu');
        if(btn && menu){
            btn.addEventListener('click', () => {
                menu.classList.toggle('hidden');
            });
            // Cerrar menú si haces click fuera
            document.addEventListener('click', (e) => {
                if (!btn.contains(e.target) && !menu.contains(e.target)) {
                    menu.classList.add('hidden');
                }
            });
        }
    });
</script>

</nav>