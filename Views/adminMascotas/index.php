<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listado de Mascotas - Admin</title>

    <!-- Tailwind CSS -->
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

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
</head>

<body class="font-['Inter','Arial','Helvetica',sans-serif'] bg-purple-light min-h-screen flex">

<?php
// index.php - Listar Mascotas



$conexion = new mysqli('localhost', 'root', '', 'DENDB');

if ($conexion->connect_error) {
    die("Connection failed: " . $conexion->connect_error);
}

$query = $conexion->query("SELECT id, nombre, especie, estado, fecha_ingreso FROM mascota ORDER BY fecha_ingreso DESC");

if (!$query) {
    die("Error en la consulta: " . $conexion->error);
}
?>
<?php include_once(__DIR__ . '/../Templates/sidebar.php'); ?>
<div class="flex-1 p-8">
    <h2 class="text-3xl font-bold text-purple-main mb-6">Listado de Mascotas</h2>

    <a href="<?php echo BASE_URL; ?>rescatar" class="inline-block bg-green-main text-white px-4 py-2 rounded hover:bg-green-700 mb-6">Registrar Mascota Rescatada</a>

    <div class="overflow-x-auto">
        <table class="min-w-full bg-white rounded-lg shadow">
            <thead class="bg-purple-main text-white">
                <tr>
                    <th class="py-3 px-4">ID</th>
                    <th class="py-3 px-4">Nombre</th>
                    <th class="py-3 px-4">Especie</th>
                    <th class="py-3 px-4">Estado</th>
                    <th class="py-3 px-4">Fecha Ingreso</th>
                    <th class="py-3 px-4">Acciones</th>
                </tr>
            </thead>
            <tbody class="text-gray-700">
                <?php while($row = $query->fetch_assoc()): ?>
                <tr class="border-t hover:bg-purple-light">
                    <td class="py-2 px-4 text-purple-dark font-semibold">#<?= str_pad($row['id'], 5, '0', STR_PAD_LEFT) ?></td>
                    <td class="py-2 px-4"><?= htmlspecialchars($row['nombre']) ?></td>
                    <td class="py-2 px-4 capitalize"><?= htmlspecialchars($row['especie']) ?></td>
                    <td class="py-2 px-4 capitalize"><?= htmlspecialchars($row['estado']) ?></td>
                    <td class="py-2 px-4"><?= htmlspecialchars($row['fecha_ingreso']) ?></td>
                    <td class="py-2 px-4">
                        <a href="editar.php?id=<?= $row['id'] ?>" class="text-blue-500 hover:underline mr-2">Editar</a>
                        <a href="eliminar.php?id=<?= $row['id'] ?>" class="text-red-500 hover:underline" onclick="return confirm('¿Eliminar esta mascota?')">Eliminar</a>
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
