<?php
/**
 * Componente Modal de Autenticación
 * 
 * Este componente crea modales para inicio de sesión y registro
 * con efecto de desenfoque en el fondo cuando se activa.
 */
?>

<!-- Modal de Registro -->
<div id="registerModal" class="hidden fixed inset-0 z-50 bg-black bg-opacity-50 backdrop-filter backdrop-blur-sm items-center justify-center p-4">
  <div class="bg-white rounded-2xl shadow-2xl max-w-4xl w-full overflow-hidden">
    <div class="flex flex-col md:flex-row">
      <!-- Lado izquierdo - Ilustración -->
      <div class="md:w-1/2 bg-gradient-to-br from-purple-50 to-pink-50 p-8 flex flex-col items-center justify-center relative">
        <div class="text-center">
          <div class="flex items-center justify-center mb-6">
            <div class="w-12 h-12 bg-purple-main rounded-full flex items-center justify-center mr-3">
              <img src="../assets/iconWeb.svg" alt="Logo" class="w-8 h-8">
            </div>
            <div>
              <h3 class="text-xl font-bold text-purple-main">Adopt</h3>
              <h3 class="text-xl font-bold text-gray-800">Buddies</h3>
            </div>
          </div>
          
          <!-- Imagen de la mascota -->
          <div class="mb-4">
            <img src="../assets/registroCachorro.webp" alt="Puppy" class="w-48 h-48 object-cover rounded-lg">
          </div>
          
          <h4 class="text-lg font-semibold text-gray-800 mb-2">Regístrate Ahora</h4>
          <div class="w-16 h-8 bg-purple-light rounded-full mx-auto flex items-center justify-center">
            <span class="text-purple-main">🦴</span>
          </div>
        </div>
      </div>

      <!-- Lado derecho - Formulario -->
      <div class="md:w-1/2 p-8 overflow-y-auto max-h-[90vh]">
        <div class="flex justify-between items-center mb-6">
          <h2 class="text-2xl font-bold text-gray-800" id="registerModalTitle">Crear tu cuenta</h2>
          <button type="button" id="closeRegisterModal" class="text-gray-400 hover:text-gray-600 text-2xl">×</button>
        </div>

        <!-- Formulario de registro -->
        <?php include_once 'modals/register-modal.php'; ?>
        
        <!-- Enlace para iniciar sesión -->
        <p class="text-center text-sm text-gray-600 mt-6">
          ¿Ya tienes una cuenta? <button id="switchToLogin" class="text-purple-main hover:underline font-semibold">Inicia sesión</button>
        </p>
      </div>
    </div>
  </div>
</div>

<!-- Modal de Inicio de Sesión -->
<div id="loginModal" class="hidden fixed inset-0 z-50 bg-black bg-opacity-50 backdrop-filter backdrop-blur-sm items-center justify-center p-4">
  <div class="bg-white rounded-2xl shadow-2xl max-w-4xl w-full overflow-hidden">
    <div class="flex flex-col md:flex-row-reverse">
      <!-- Lado izquierdo - Formulario -->
      <div class="md:w-1/2 p-8 overflow-y-auto max-h-[90vh]">
        <div class="flex justify-between items-center mb-6">
          <h2 class="text-2xl font-bold text-gray-800" id="loginModalTitle">Iniciar sesión</h2>
          <button type="button" id="closeLoginModal" class="text-gray-400 hover:text-gray-600 text-2xl">×</button>
        </div>
        
        <!-- Formulario de login -->
        <?php include_once 'modals/login-modal.php'; ?>
        
        <!-- Enlace para registrarse -->
        <p class="text-center text-sm text-gray-600 mt-6">
          ¿No tienes una cuenta? <button id="switchToRegister" class="text-purple-main hover:underline font-semibold">Regístrate</button>
        </p>
      </div>

      <!-- Lado derecho - Ilustración -->
      <div class="md:w-1/2 bg-gradient-to-br from-purple-50 to-pink-50 p-8 flex flex-col items-center justify-center relative">
        <div class="text-center">
          <div class="flex items-center justify-center mb-6">
            <div class="w-12 h-12 bg-purple-main rounded-full flex items-center justify-center mr-3">
              <img src="../assets/iconWeb.svg" alt="Logo" class="w-8 h-8">
            </div>
            <div>
              <h3 class="text-xl font-bold text-purple-main">Adopt</h3>
              <h3 class="text-xl font-bold text-gray-800">Buddies</h3>
            </div>
          </div>
          
          <!-- Imagen de la mascota (diferente para el login) -->
          <div class="mb-4">
            <img src="../assets/registroCachorro.webp" alt="Cat" class="w-48 h-48 object-cover rounded-lg">
            <!-- Nota: Recomendado añadir una imagen gato-login.webp en la carpeta assets para el modal de inicio de sesión -->
          </div>
          
          <h4 class="text-lg font-semibold text-gray-800 mb-2">Inicia sesión ahora</h4>
          <div class="w-16 h-8 bg-purple-light rounded-full mx-auto flex items-center justify-center">
            <span class="text-purple-main">🐾</span>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<!-- Script para los modales de autenticación -->
<script>
document.addEventListener('DOMContentLoaded', function() {
  // Elementos del DOM para el modal de registro
  const registerModal = document.getElementById('registerModal');
  const closeRegisterModalBtn = document.getElementById('closeRegisterModal');
  
  // Elementos del DOM para el modal de login
  const loginModal = document.getElementById('loginModal');
  const closeLoginModalBtn = document.getElementById('closeLoginModal');
  
  // Botones para cambiar entre modales
  const switchToLoginBtn = document.getElementById('switchToLogin');
  const switchToRegisterBtn = document.getElementById('switchToRegister');
  
  // Botones de alternar visibilidad de contraseña
  const togglePasswordBtns = document.querySelectorAll('.toggle-password');
  console.log("Botones de visibilidad encontrados:", togglePasswordBtns.length);
  
  // Función para abrir el modal de registro
  window.openRegisterModal = function() {
    registerModal.classList.remove('hidden');
    registerModal.classList.add('flex');
    document.body.classList.add('overflow-hidden'); // Prevenir scroll
    // Configurar botones de contraseña después de que se muestre el modal
    setTimeout(setupTogglePasswordButtons, 100);
  }
  
  // Función para cerrar el modal de registro
  function closeRegisterModal() {
    registerModal.classList.add('hidden');
    registerModal.classList.remove('flex');
    document.body.classList.remove('overflow-hidden'); // Permitir scroll de nuevo
  }
  
  // Función para abrir el modal de login
  window.openLoginModal = function() {
    loginModal.classList.remove('hidden');
    loginModal.classList.add('flex');
    document.body.classList.add('overflow-hidden'); // Prevenir scroll
    // Configurar botones de contraseña después de que se muestre el modal
    setTimeout(setupTogglePasswordButtons, 100);
  }
  
  // Función para cerrar el modal de login
  function closeLoginModal() {
    loginModal.classList.add('hidden');
    loginModal.classList.remove('flex');
    document.body.classList.remove('overflow-hidden'); // Permitir scroll de nuevo
  }
  
  // Función para cambiar de registro a login
  function switchToLogin() {
    closeRegisterModal();
    setTimeout(() => {
      openLoginModal();
      // Reconfigurar botones después de que se muestre el modal
      setTimeout(setupTogglePasswordButtons, 100);
    }, 300); // Pequeño delay para mejor transición
  }
  
  // Función para cambiar de login a registro
  function switchToRegister() {
    closeLoginModal();
    setTimeout(() => {
      openRegisterModal();
      // Reconfigurar botones después de que se muestre el modal
      setTimeout(setupTogglePasswordButtons, 100);
    }, 300); // Pequeño delay para mejor transición
  }
  
  // Event Listeners
  if (closeRegisterModalBtn) closeRegisterModalBtn.addEventListener('click', closeRegisterModal);
  if (closeLoginModalBtn) closeLoginModalBtn.addEventListener('click', closeLoginModal);
  
  if (switchToLoginBtn) switchToLoginBtn.addEventListener('click', switchToLogin);
  if (switchToRegisterBtn) switchToRegisterBtn.addEventListener('click', switchToRegister);
  
  // Cerrar modal al hacer clic fuera
  registerModal.addEventListener('click', function(e) {
    if (e.target === this) {
      closeRegisterModal();
    }
  });
  
  loginModal.addEventListener('click', function(e) {
    if (e.target === this) {
      closeLoginModal();
    }
  });
  
  // Cerrar modal con tecla Escape
  document.addEventListener('keydown', function(e) {
    if (e.key === 'Escape') {
      closeRegisterModal();
      closeLoginModal();
    }
  });
  
  // Toggle contraseña visible/oculta
  // Configurar manejadores de eventos para botones de visibilidad de contraseña
  function setupTogglePasswordButtons() {
    const togglePasswordBtns = document.querySelectorAll('.toggle-password');
    console.log("Configurando", togglePasswordBtns.length, "botones de visibilidad");
    
    togglePasswordBtns.forEach(btn => {
      btn.addEventListener('click', function() {
        // Buscar el input de contraseña más cercano (primero buscar por hermano previo, luego por clase)
        const input = this.closest('.relative').querySelector('.password-input');
        console.log("Botón de visibilidad clickeado, input tipo:", input.type);
        
        if (input.type === 'password') {
          input.type = 'text';
          this.innerHTML = `
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13.875 18.825A10.05 10.05 0 0112 19c-4.478 0-8.268-2.943-9.543-7a9.97 9.97 0 011.563-3.029m5.858.908a3 3 0 114.243 4.243M9.878 9.878l4.242 4.242M9.88 9.88l-3.29-3.29m7.532 7.532l3.29 3.29M3 3l3.59 3.59m0 0A9.953 9.953 0 0112 5c4.478 0 8.268 2.943 9.543 7a10.025 10.025 0 01-4.132 5.411m0 0L21 21" />
            </svg>
          `;
        } else {
          input.type = 'password';
          this.innerHTML = `
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/>
            </svg>
          `;
        }
      });
    });
  }
  
  // Ejecutar la configuración inicial
  setupTogglePasswordButtons();
});
</script>
