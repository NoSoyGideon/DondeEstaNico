
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin</title>
     <link rel="stylesheet" href="<?php echo BASE_URL; ?>assets/css/admin.css">

      
    </head>


    <script>
document.addEventListener('DOMContentLoaded', () => {

  // Perfil form
  const perfilForm = document.getElementById('perfil-form');
  perfilForm.addEventListener('submit', async (e) => {
    e.preventDefault();

    const usuario = document.getElementById('usuario').value.trim();
    const correo = document.getElementById('correo').value.trim();
    const telefono = document.getElementById('telefono').value.trim();
    const estado = document.getElementById('estado').value.trim();
    const direccion = document.getElementById('direccion').value.trim();

    if (!usuario || !correo || !telefono || !estado || !direccion) {
      mostrarMensaje('Por favor completa todos los campos del perfil.');
      return;
    }

    if (!/^\S+@\S+\.\S+$/.test(correo)) {
      mostrarMensaje('Correo no válido.');
      return;
    }

 const formData = new FormData(e.target);
    // Aquí iría el fetch si todo está bien
    try {
      const response = await fetch('<?= BASE_URL ?>admin_overview/cambiar', {
        method: 'POST',
        body: formData
      
      });

      const result = await response.json();
      mostrarMensaje(result.message || 'Cambios guardados correctamente');

    } catch (error) {
      console.error(error);
      mostrarMensaje('Error al guardar los datos.');
    }
  });

  // Password form
  const passwordForm = document.getElementById('password-form');
  passwordForm.addEventListener('submit', async (e) => {
    e.preventDefault();

    const newPassword = document.getElementById('new-password').value.trim();
    const confirmPassword = document.getElementById('confirm-password').value.trim();

    if (!newPassword || !confirmPassword) {
      alert('Por favor completa ambos campos de contraseña.');
      return;
    }

    if (newPassword !== confirmPassword) {
      mostrarMensaje('Las contraseñas no coinciden.');
      return;
    }

    if (newPassword.length < 6) {
      mostrarMensaje('La contraseña debe tener al menos 6 caracteres.');
      return;
    }
    const formData2 = new FormData(e.target);

    // Aquí iría el fetch si todo está bien
    try {
      const response = await fetch('<?= BASE_URL ?>admin_overview/cambiarPassword', {
        method: 'POST',
      body: formData2
      });

      const result = await response.json();
      mostrarMensaje(result.message || 'Contraseña actualizada correctamente');

    } catch (error) {
      console.error(error);
      mostrarMensaje    ('Error al cambiar la contraseña.');
    }
  });
});

function mostrarMensaje(texto, color = '#5D4FC4') {
  const mensaje = document.getElementById('mensaje');
  mensaje.style.backgroundColor = color;
  mensaje.textContent = texto;
  mensaje.style.display = 'block';

  setTimeout(() => {
    mensaje.style.display = 'none';
  }, 3500);
}
</script>

<body>
<?php include_once(__DIR__ . '/../Templates/header.php');
$_SESSION['setting'] = 1;
$usuario = $data['usuario'] ?? [];
?>  


<div class="admin">
 <div class="sidebar">
<?php include_once(__DIR__ . '/../Templates/menu.php'); ?>

</div>


 <div class="main-content">
    <div id="mensaje" class="mensaje" style="display: none;"></div>
    <div class="card">
      <h1>Welcome, <?php echo $usuario['nombre'] ?? 'Usuario'; ?></h1>
      <p class="subheading">Desde aquí puedes gestionar tu perfil de administrador. Cambia tu información personal y actualiza tu contraseña.</p>

      <!-- Perfil Form -->
      <div class="section-title">Información personal</div>
      <form id="perfil-form">
        <div class="grid-2col">
          <div class="form-group">
            <label for="usuario">Usuario</label>
            <input type="text" id="usuario" value=" <?php echo $usuario['nombre'] ?>" name="usuario">
          </div>
          <div class="form-group">
            <label for="correo">Correo electrónico</label>
            <input type="email" id="correo" value="<?php echo $usuario['correo'] ?>" name="correo">
          </div>
          <div class="form-group">
            <label for="telefono">Teléfono</label>
            <input type="tel" id="telefono" value="<?php echo $usuario['telefono']?? '' ?>" name="telefono">
          </div>
          <div class="form-group">
            <label for="estado">Estado</label>
            <select id="estado" name="estado">
              <option>Amazonas</option>
              <option>Anzoátegui</option>
              <option>Apure</option>
              <option>Aragua</option>
              <option>Barinas</option>
              <option>Bolívar</option>
              <option>Carabobo</option>
              <option>Cojedes</option>
              <option>Delta Amacuro</option>
              <option>Distrito Capital</option>
              <option>Falcón</option>
              <option>Guárico</option>
              <option>Lara</option>
              <option>Mérida</option>
              <option>Miranda</option>
              <option>Monagas</option>
              <option>Nueva Esparta</option>
              <option>Portuguesa</option>
              <option>Sucre</option>
              <option>Táchira</option>
              <option>Trujillo</option>
              <option>Vargas</option>
              <option>Yaracuy</option>
              <option>Zulia</option>
              <?php if (!empty($usuario['estado'])): ?>
              <option selected><?php echo $usuario['estado']; ?></option>
                <?php endif; ?>
            </select>
          </div>
        </div>

        <div class="form-group">
          <label for="direccion">Dirección</label>
          <input type="text" id="direccion" value="<?php echo $usuario['direccion']?? '' ?>" name="direccion">
        </div>

        <button type="submit">Guardar cambios</button>
      </form>

      <hr>

      <!-- Contraseña Form -->
      <div class="section-title">Seguridad</div>
      <form id="password-form">
        <div class="grid-2col">
          <div class="form-group">
            <label for="new-password">Nueva contraseña</label>
            <input type="password" id="new-password" name="new-password">
          </div>
          <div class="form-group">
            <label for="confirm-password">Confirmar contraseña</label>
            <input type="password" id="confirm-password" name ="confirm-password">
          </div>
        </div>

        <button type="submit">Cambiar contraseña</button>
      </form>
    </div>
  </div>

</div>
<?php include_once(__DIR__ . '/../Templates/footer.php'); ?>





    
</body>
</html>

