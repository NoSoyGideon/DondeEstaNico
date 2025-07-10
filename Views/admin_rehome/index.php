
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin</title>
     <link rel="stylesheet" href="<?php echo BASE_URL; ?>assets/css/admin.css">

      
    </head>
<body>
<?php include_once(__DIR__ . '/../Templates/header.php');
$_SESSION['setting'] = 1; ?>  


<div class="admin">
 <div class="sidebar">
<?php include_once(__DIR__ . '/../Templates/menu.php'); ?>

</div>


 <div class="main-content">
    <div class="card">
      <h1>Welcome</h1>
      <p class="subheading">Desde aquí puedes gestionar tu perfil de administrador. Cambia tu información personal y actualiza tu contraseña.</p>

      <!-- Perfil Form -->
      <div class="section-title">Información personal</div>
      <form id="perfil-form">
        <div class="grid-2col">
          <div class="form-group">
            <label for="usuario">Usuario</label>
            <input type="text" id="usuario" value="juan_admin">
          </div>
          <div class="form-group">
            <label for="correo">Correo electrónico</label>
            <input type="email" id="correo" value="juan@example.com">
          </div>
          <div class="form-group">
            <label for="telefono">Teléfono</label>
            <input type="tel" id="telefono" value="0414-1234567">
          </div>
          <div class="form-group">
            <label for="estado">Estado</label>
            <select id="estado">
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
            </select>
          </div>
        </div>

        <div class="form-group">
          <label for="direccion">Dirección</label>
          <input type="text" id="direccion" value="Av. Bolívar, edificio #20">
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
            <input type="password" id="new-password">
          </div>
          <div class="form-group">
            <label for="confirm-password">Confirmar contraseña</label>
            <input type="password" id="confirm-password">
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

