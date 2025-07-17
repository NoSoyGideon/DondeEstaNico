
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listado de Usuarios - Admin</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
      tailwind.config = {
        theme: {
          extend: {
            colors: {
              'purple-main': '#675BC8',
              'purple-dark': '#2E256F',
              'purple-light': '#f3f0ff',
              'purple-text': '#3d3477',
              'black': '#0C0C0C',
              'green-main': '#0A453A'
            }
          }
        }
      }
    </script>
    <style>
        .switch {
  position: relative;
  display: inline-block;
  width: 48px;
  height: 26px;
}

.switch input {
  opacity: 0;
  width: 0;
  height: 0;
}

.slider {
  position: absolute;
  cursor: pointer;
  background-color: #ccc;
  border-radius: 34px;
  top: 0; left: 0; right: 0; bottom: 0;
  transition: 0.4s;
}

.slider:before {
  content: "";
  height: 20px;
  width: 20px;
  border-radius: 50%;
  position: absolute;
  left: 3px;
  bottom: 3px;
  background-color: white;
  transition: 0.4s;
}

input:checked + .slider {
  background-color: var(--primary);
}

input:checked + .slider:before {
  transform: translateX(22px);
}
    </style>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
</head>

<body class="font-['Inter','Arial','Helvetica',sans-serif'] bg-purple-light min-h-screen flex">
<?php include_once(__DIR__ . '/../Templates/sidebar.php'); ?>

<?php
$conexion = new mysqli('localhost', 'root', '', 'DENDB');

if ($conexion->connect_error) {
    die("Connection failed: " . $conexion->connect_error);
}

$query = $conexion->query("SELECT id, nombre, correo, admin, bloqueado, fecha_registro FROM usuario ORDER BY fecha_registro DESC");

if (!$query) {
    die("Error en la consulta: " . $conexion->error);
}
?>

<div class="flex-1 p-8">
    <h2 class="text-3xl font-bold text-purple-main mb-6">Listado de Usuarios</h2>

<div class="overflow-x-auto">
  <table class="min-w-full bg-white rounded-lg shadow">
    <thead class="bg-purple-main text-white">
      <tr>
        <th class="py-3 px-4">ID</th>
        <th class="py-3 px-4">Nombre</th>
        <th class="py-3 px-4">Correo</th>
        <th class="py-3 px-4">Fecha Registro</th>
        <th class="py-3 px-4">Bloquear</th>
        <th class="py-3 px-4">Activo</th> <!-- Switch -->
      </tr>
    </thead>
    <tbody class="text-gray-700">
      <?php while($row = $query->fetch_assoc()): ?>
      <tr class="border-t hover:bg-purple-light">
        <td class="py-2 px-4">#<?= str_pad($row['id'], 4, '0', STR_PAD_LEFT) ?></td>
        <td class="py-2 px-4"><?= htmlspecialchars($row['nombre']) ?></td>
        <td class="py-2 px-4"><?= htmlspecialchars($row['correo']) ?></td>
        <td class="py-2 px-4"><?= htmlspecialchars($row['fecha_registro']) ?></td>

        <!-- Botón Bloquear -->
            <td class="py-2 px-4">
        <?php if ($row['bloqueado'] == 1): ?>
            <button class="bg-green-500 hover:bg-green-600 text-white font-semibold py-2 px-4 rounded shadow"
                    onclick="toggleBloqueo(<?= $row['id'] ?>, false)">
            Desbloquear
            </button>
        <?php else: ?>
            <button class="bg-red-500 hover:bg-red-600 text-white font-semibold py-2 px-4 rounded shadow"
                    onclick="toggleBloqueo(<?= $row['id'] ?>, true)">
            Bloquear
            </button>
        <?php endif; ?>
        </td>

        <!-- Switch de Activar/Desactivar -->
       <td class="py-2 px-4 text-center">
  <label class="switch">
    <input 
      type="checkbox" 
      onchange="toggleAdmin(<?= $row['id'] ?>, this.checked)" 
      <?= $row['admin'] == 1 ? 'checked' : '' ?>>
    <span class="slider"></span>
  </label>
</td>
      </tr>
      <?php endwhile; ?>
    </tbody>
  </table>
</div>

</div>

<?php $conexion->close(); ?>

</body>
</html>

<script>
  function confirmDelete(id) {
    if (confirm("¿Estás seguro de que deseas bloquear este usuario?")) {
      fetch(`controlador/eliminar.php?id=${id}`, { method: 'GET' })
        .then(res => {
          if (res.ok) location.reload();
          else alert("Error al bloquear");
        });
    }
  }

    function toggleAdmin(id, isAdmin) {
        fetch(`controlador/toggle_admin.php`, {
    method: 'POST',
    headers: { 'Content-Type': 'application/json' },
    body: JSON.stringify({ id, admin: isAdmin })
  })
  .then(res => res.json())
  .then(data => {
    if (!data.ok) {
      alert("Error al cambiar el rol de administrador");
    }
  });
}
</script>
