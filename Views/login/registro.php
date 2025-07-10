<div id="form-errors" class="hidden bg-red-100 text-red-700 p-4 rounded mb-4 text-sm"></div>

<!-- Formulario de registro -->
<form id="formRegistro" class="space-y-4">

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
  <!-- Icono del candado a la izquierda -->
  <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
    <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
        d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z" />
    </svg>
  </div>

  <!-- Campo de contraseña -->
  <input id="passwordInput2" type="password" name="clave" placeholder="Contraseña"
    class="w-full pl-10 pr-12 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-purple-main focus:border-transparent outline-none password-input">

  <!-- Botón para mostrar/ocultar contraseña -->
  <div class="absolute inset-y-0 right-0 pr-3 flex items-center">
    <button type="button" class="text-gray-400 hover:text-gray-600 toggle-password" id="togglePasswordBtn2">
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
document.addEventListener('DOMContentLoaded', function () {

  const rescueCenterFields = document.getElementById('rescueCenterFields');
  const termsCheckbox = document.getElementById('termsCheckbox');



  document.getElementById('formRegistro').addEventListener('submit', function (e) {
    e.preventDefault();

    const nombre = document.querySelector('input[name="nombre"]').value.trim();
    const correo = document.querySelector('input[name="correo"]').value.trim();
    const clave = document.querySelector('input[name="clave"]').value.trim();
    const errorDiv = document.getElementById('form-errors');

    let errores = [];

    if (!/^[a-zA-Z\s]+$/.test(nombre)) {
      errores.push("El nombre solo puede contener letras y espacios.");
    }

    if (!/\S+@\S+\.\S+/.test(correo)) {
      errores.push("El correo electrónico no es válido.");
    }

    if (clave.length < 8 || clave.length > 20) {
      errores.push("La contraseña debe tener entre 8 y 20 caracteres.");
    }
    if (!/[A-Z]/.test(clave)) {
      errores.push("Debe contener al menos una letra mayúscula.");
    }
    if (!/[0-9]/.test(clave)) {
      errores.push("Debe contener al menos un número.");
    }

    if (errores.length > 0) {
      errorDiv.innerHTML = `
        <ul class="list-disc pl-5 space-y-1">
          ${errores.map(err => `<li>${err}</li>`).join('')}
        </ul>
      `;
      errorDiv.classList.remove('hidden');
      return;
    }

    errorDiv.classList.add('hidden');

    const formData = new FormData(e.target);



if (!termsCheckbox.checked) {
      errorDiv.innerHTML = "❌ Debes aceptar los términos y condiciones.";
      errorDiv.classList.remove('hidden');
      return;
    }
    fetch('<?= BASE_URL ?>login/guardar', {
      method: 'POST',
      body: formData
    })
      .then(res => res.json())
      .then(data => {
        if (data.success) {
           window.location.reload();
        } else {
          errorDiv.innerHTML = `
            <ul class="list-disc pl-5 space-y-1">
              ${data.errores.map(err => `<li>${err}</li>`).join('')}
            </ul>
          `;
          errorDiv.classList.remove('hidden');
        }
      })
      .catch(err => {
        console.error(err);
        errorDiv.innerHTML = "❌ Error al comunicarse con el servidor.";
        errorDiv.classList.remove('hidden');
      });
  });
});

  const toggleBtn = document.getElementById("togglePasswordBtn2");
  const passwordInput = document.getElementById("passwordInput2");
  const eyeIcon = document.getElementById("eyeIcon");

  toggleBtn.addEventListener("click", () => {
    const isPassword = passwordInput.type === "password";
    passwordInput.type = isPassword ? "text" : "password";

    // Cambiar el color del ícono como feedback visual (opcional)
    eyeIcon.classList.toggle("text-purple-600", isPassword);
    eyeIcon.classList.toggle("text-gray-400", !isPassword);
  });
</script>

