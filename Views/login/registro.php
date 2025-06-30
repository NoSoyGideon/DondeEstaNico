<?php
/**
 * Componente de Modal de Registro
 * 
 * Este archivo contiene el formulario de registro que se muestra en el modal de autenticación.
 */
?>

<!-- Formulario de registro -->
<form class="space-y-4" action="<?= BASE_URL ?>login/guardar"  method="post">
  <!-- Nombre Completo -->
  <div class="relative">
    <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
      <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zm-4 7a7 7 0 00-7 7h14a7 7 0 00-7-7z"/>
      </svg>
    </div>
    <input type="text" name="nombre" placeholder="Nombre completo" class="w-full pl-10 pr-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-purple-main focus:border-transparent outline-none">
    
  </div>

  <!-- Correo electrónico -->
  <div class="relative">
    <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
      <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 12a4 4 0 10-8 0 4 4 0 008 0zm0 0v1.5a2.5 2.5 0 005 0V12a9 9 0 10-9 9m4.5-1.206a8.959 8.959 0 01-4.5 1.207"/>
      </svg>
    </div>
    <input type="email" name="correo" placeholder="Correo electrónico" class="w-full pl-10 pr-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-purple-main focus:border-transparent outline-none">
  </div>

  <!-- Contraseña -->
  <div class="relative">
    <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
      <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"/>
      </svg>
    </div>
    <input type="password" name="clave" placeholder="Contraseña" class="w-full pl-10 pr-12 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-purple-main focus:border-transparent outline-none password-input">
    <div class="absolute inset-y-0 right-0 pr-3 flex items-center">
      <button type="button" class="text-gray-400 hover:text-gray-600 toggle-password">
        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/>
        </svg>
      </button>
    </div>
  </div>

  <!-- Opción de organización/rescatista -->
  <div class="bg-gray-50 p-4 rounded-lg border border-gray-200 my-4">
    <div class="flex items-center justify-between">
      <div>
        <h3 class="text-sm font-medium text-gray-800">Soy organización o rescatista</h3>
        <p class="text-xs text-gray-500 mt-1">Habilita esta opción si representas a una organización de rescate animal</p>
      </div>
      <label class="relative inline-flex items-center cursor-pointer">
        <input type="checkbox" id="rescueCenterToggle" class="sr-only peer">
        <div class="w-11 h-6 bg-gray-200 peer-focus:outline-none peer-focus:ring-2 peer-focus:ring-purple-main rounded-full peer peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all peer-checked:bg-purple-main"></div>
      </label>
    </div>
    <div id="rescueCenterFields" class="mt-3 hidden">
      <input type="text" placeholder="Nombre de la organización" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-purple-main focus:border-transparent outline-none text-sm">
    </div>
  </div>

  <!-- Términos y condiciones -->
  <div class="flex items-center mt-2">
    <input type="checkbox" id="termsCheckbox" class="w-4 h-4 text-purple-main border-gray-300 rounded focus:ring-purple-main">
    <label for="termsCheckbox" class="ml-2 text-sm text-gray-600">
      Acepto los <a href="#" class="text-purple-main hover:underline">Términos y Condiciones</a>
    </label>
  </div>

  <!-- Botón de registro -->
  <button type="submit" class="w-full bg-purple-main hover:bg-purple-dark text-white py-3 rounded-lg font-semibold transition-colors mt-4">
    Crear Cuenta
  </button>

  <!-- Divisor - Comentado para ahorrar espacio y evitar que el contenido quede cortado -->
  <!--
  <div class="relative mt-6">
    <div class="absolute inset-0 flex items-center">
      <div class="w-full border-t border-gray-300"></div>
    </div>
    <div class="relative flex justify-center text-sm">
      <span class="px-2 bg-white text-gray-500">O Regístrate con</span>
    </div>
  </div>
  -->

  <!-- Botones de redes sociales (ocultos) -->
  <div class="hidden">
    <!-- Contenido de botones sociales oculto -->
  </div>
</form>

<!-- Script para mostrar/ocultar campos de organización -->
<script>
document.addEventListener('DOMContentLoaded', function() {
  const rescueCenterToggle = document.getElementById('rescueCenterToggle');
  const rescueCenterFields = document.getElementById('rescueCenterFields');

  rescueCenterToggle.addEventListener('change', function() {
    if(this.checked) {
      rescueCenterFields.classList.remove('hidden');
    } else {
      rescueCenterFields.classList.add('hidden');
    }
  });
});
</script>
