<?php
/**
 * Componente de Modal de Inicio de Sesión
 * 
 * Este archivo contiene el formulario de inicio de sesión que se muestra en el modal de autenticación.
 */
?>

<!-- Formulario de inicio de sesión -->
<form  id="formLogin" class="space-y-4">

  <div id="login-errors" class="hidden bg-red-100 text-red-700 p-4 rounded mb-4 text-sm"></div>
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
  <!-- Icono del candado a la izquierda -->
  <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
    <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
        d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z" />
    </svg>
  </div>

  <!-- Campo de contraseña -->
  <input id="passwordInput" type="password" name="password" placeholder="Contraseña"
    class="w-full pl-10 pr-12 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-purple-main focus:border-transparent outline-none password-input">

  <!-- Botón para mostrar/ocultar contraseña -->
  <div class="absolute inset-y-0 right-0 pr-3 flex items-center">
    <button type="button" class="text-gray-400 hover:text-gray-600 toggle-password" id="togglePasswordBtn">
      <!-- Icono del ojo -->
      <svg id="eyeIcon" class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
          d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
          d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
      </svg>
    </button>
  </div>
</div>

   <!-- Opción de organización/rescatista -->
  <div class="bg-gray-50 p-4 rounded-lg border border-gray-200 my-4">
    <div class="flex items-center justify-between">
      <div>
        <h3 class="text-sm font-medium text-gray-800">Soy Administrador</h3>
        <p class="text-xs text-gray-500 mt-1">Habilita esta opción si tiene derechos de admin y quiere entrar en el panel</p>
      </div>
      <label class="relative inline-flex items-center cursor-pointer">
        <input type="checkbox" id="rescueCenterToggle" class="sr-only peer">
        <div class="w-11 h-6 bg-gray-200 peer-focus:outline-none peer-focus:ring-2 peer-focus:ring-purple-main rounded-full peer peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all peer-checked:bg-purple-main"></div>
      </label>
    </div>

  </div>

  <!-- Olvidaste contraseña -->
  <div class="text-right">
    <a href="#" class="text-sm text-purple-main hover:underline">¿Olvidaste tu contraseña?</a>
  </div>



  <!-- Botón de inicio de sesión -->
  <button type="submit" class="w-full bg-purple-main hover:bg-purple-dark text-white py-3 rounded-lg font-semibold transition-colors">
    Iniciar Sesión
  </button>

  <!-- Divisor -->
  <div class="relative my-6">
    <div class="absolute inset-0 flex items-center">
      <div class="w-full border-t border-gray-300"></div>
    </div>
    <div class="relative flex justify-center text-sm">
      <span class="px-2 bg-white text-gray-500">O Inicia sesión con</span>
    </div>
  </div>

  <!-- Botones de redes sociales (ocultos por ahora) -->
  <div class="flex space-x-4 hidden">
    <button type="button" class="flex-1 flex items-center justify-center py-3 border border-gray-300 rounded-lg hover:bg-gray-50 transition-colors">
      <svg class="w-5 h-5 text-red-500" viewBox="0 0 24 24">
        <path fill="currentColor" d="M22.56 12.25c0-.78-.07-1.53-.2-2.25H12v4.26h5.92c-.26 1.37-1.04 2.53-2.21 3.31v2.77h3.57c2.08-1.92 3.28-4.74 3.28-8.09z"/>
        <path fill="currentColor" d="M12 23c2.97 0 5.46-.98 7.28-2.66l-3.57-2.77c-.98.66-2.23 1.06-3.71 1.06-2.86 0-5.29-1.93-6.16-4.53H2.18v2.84C3.99 20.53 7.7 23 12 23z"/>
        <path fill="currentColor" d="M5.84 14.09c-.22-.66-.35-1.36-.35-2.09s.13-1.43.35-2.09V7.07H2.18C1.43 8.55 1 10.22 1 12s.43 3.45 1.18 4.93l2.85-2.22.81-.62z"/>
        <path fill="currentColor" d="M12 5.38c1.62 0 3.06.56 4.21 1.64l3.15-3.15C17.45 2.09 14.97 1 12 1 7.7 1 3.99 3.47 2.18 7.07l3.66 2.84c.87-2.6 3.3-4.53 6.16-4.53z"/>
      </svg>
    </button>
    <button type="button" class="flex-1 flex items-center justify-center py-3 border border-gray-300 rounded-lg hover:bg-gray-50 transition-colors">
      <svg class="w-5 h-5 text-blue-600" fill="currentColor" viewBox="0 0 24 24">
        <path d="M24 12.073c0-6.627-5.373-12-12-12s-12 5.373-12 12c0 5.99 4.388 10.954 10.125 11.854v-8.385H7.078v-3.47h3.047V9.43c0-3.007 1.792-4.669 4.533-4.669 1.312 0 2.686.235 2.686.235v2.953H15.83c-1.491 0-1.956.925-1.956 1.874v2.25h3.328l-.532 3.47h-2.796v8.385C19.612 23.027 24 18.062 24 12.073z"/>
      </svg>
    </button>
  </div>
</form>

<script>
document.getElementById('formLogin').addEventListener('submit', function(e) {
  e.preventDefault();

  const form = e.target;
  const correo = form.correo.value.trim();
  const password = form.password.value;
  const errorsDiv = document.getElementById('login-errors');
  const checkbox = document.getElementById('rescueCenterToggle');

  let errores = [];
  if (!/\S+@\S+\.\S+/.test(correo)) errores.push("Correo no válido.");
  if (password.length === 0) errores.push("Ingresa tu contraseña.");

  if (errores.length) {
    errorsDiv.innerHTML = `<ul class="list-disc pl-5">${errores.map(e => `<li>${e}</li>`).join('')}</ul>`;
    errorsDiv.classList.remove('hidden');
    return;
  }
  errorsDiv.classList.add('hidden');
  if (checkbox.checked) {
fetch('<?= BASE_URL ?>login/validarAdmin', {
    method: 'POST',
    headers: {'Accept': 'application/json'},
    body: new FormData(form)
    })
  .then(res => res.json())
  .then(data => {
    if (data.success) {
      window.location.href = "<?php echo BASE_URL; ?>admin"; // redirige al panel de administrador
    } else {
      errorsDiv.innerHTML = `<ul class="list-disc pl-5">${data.errores.map(e => `<li>${e}</li>`).join('')}</ul>`;
      errorsDiv.classList.remove('hidden');
    }
  })
  .catch(() => {
    errorsDiv.innerHTML = "❌ Error al comunicarse con el servidor.";
    errorsDiv.classList.remove('hidden');
  });




  }else{
    fetch('<?= BASE_URL ?>login/validar', {
    method: 'POST',
    headers: {'Accept': 'application/json'},
    body: new FormData(form)
    })
  .then(res => res.json())
  .then(data => {
    if (data.success) {
      window.location.reload(); // recarga para actualizar header en la misma página
    } else {
      errorsDiv.innerHTML = `<ul class="list-disc pl-5">${data.errores.map(e => `<li>${e}</li>`).join('')}</ul>`;
      errorsDiv.classList.remove('hidden');
    }
  })
  .catch(() => {
    errorsDiv.innerHTML = "❌ Error al comunicarse con el servidor.";
    errorsDiv.classList.remove('hidden');
  });
}
});

  const toggleBtn1 = document.getElementById("togglePasswordBtn");
  const passwordInput2 = document.getElementById("passwordInput");
  const eyeIcon3 = document.getElementById("eyeIcon");

  toggleBtn1.addEventListener("click", () => {
    const isPassword = passwordInput2.type === "password";
    passwordInput2.type = isPassword ? "text" : "password";

    // Cambiar el color del ícono como feedback visual (opcional)
    eyeIcon3.classList.toggle("text-purple-600", isPassword);
    eyeIcon3.classList.toggle("text-gray-400", !isPassword);
  });
</script>

