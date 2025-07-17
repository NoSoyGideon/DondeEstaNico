<?php
// editar.php - Editar Mascota
include_once '../../Config/Config.php';
include_once '../template/sidebar.php';

$conexion = new mysqli('localhost', 'root', '', 'DENDB');

if ($conexion->connect_error) {
    die("Connection failed: " . $conexion->connect_error);
}

$id = $_GET['id'] ?? null;
if (!$id) {
    die("ID no válido.");
}

$result = $conexion->query("SELECT * FROM mascota WHERE id = " . (int)$id);
$mascota = $result->fetch_assoc();

if (!$mascota) {
    die("Mascota no encontrada.");
}

$errores = [];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nombre = trim($_POST['nombre']);
    $especie = trim($_POST['especie']);
    $estado = trim($_POST['estado']);

    if ($nombre === '' || strlen($nombre) < 2) {
        $errores[] = "El nombre es obligatorio y debe tener al menos 2 caracteres.";
    }

    if (!in_array($especie, ['perro', 'gato'])) {
        $errores[] = "Especie no válida.";
    }

    if (!in_array($estado, ['adopcion', 'adoptada', 'rescatada'])) {
        $errores[] = "Estado no válido.";
    }

    if (empty($errores)) {
        $stmt = $conexion->prepare("UPDATE mascota SET nombre = ?, especie = ?, estado = ? WHERE id = ?");
        $stmt->bind_param("sssi", $nombre, $especie, $estado, $id);

        if ($stmt->execute()) {
            header("Location: index.php");
            exit;
        } else {
            $errores[] = "Error al actualizar la mascota.";
        }

        $stmt->close();
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Mascota - Admin</title>
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

<?php include_once '../template/sidebar.php'; ?>

<div class="flex-1 p-8">
    <h2 class="text-3xl font-bold text-purple-main mb-6">Editar Mascota</h2>

    <?php if (!empty($errores)): ?>
        <div class="bg-red-100 text-red-700 p-4 rounded mb-4">
            <?php foreach ($errores as $error): ?>
                <p><?= htmlspecialchars($error) ?></p>
            <?php endforeach; ?>
        </div>
    <?php endif; ?>

    <form method="POST" class="bg-white p-6 rounded shadow max-w-lg space-y-4">
        <label for="nombre" class="block text-sm font-medium text-gray-700">Nombre</label>
        <input name="nombre" id="nombre" maxlength="50" class="w-full p-2 border rounded" placeholder="Nombre" required value="<?= htmlspecialchars($_POST['nombre'] ?? $mascota['nombre']) ?>">

        <label for="especie" class="block text-sm font-medium text-gray-700">Especie</label>
        <select name="especie" id="especie" class="w-full p-2 border rounded" required>
            <option value="" disabled <?= empty($_POST['especie']) && empty($mascota['especie']) ? 'selected' : '' ?>>Selecciona especie</option>
            <option value="perro" <?= (($mascota['especie'] ?? '') === 'perro') ? 'selected' : '' ?>>Perro</option>
            <option value="gato" <?= (($mascota['especie'] ?? '') === 'gato') ? 'selected' : '' ?>>Gato</option>
        </select>

        <label for="estado" class="block text-sm font-medium text-gray-700">Estado</label>
        <select name="estado" id="estado" class="w-full p-2 border rounded" required>
            <option value="" disabled <?= empty($_POST['estado']) && empty($mascota['estado']) ? 'selected' : '' ?>>Selecciona estado</option>
            <option value="adopcion" <?= (($mascota['estado'] ?? '') === 'adopcion') ? 'selected' : '' ?>>Adopción</option>
            <option value="adoptada" <?= (($mascota['estado'] ?? '') === 'adoptada') ? 'selected' : '' ?>>Adoptada</option>
            <option value="rescatada" <?= (($mascota['estado'] ?? '') === 'rescatada') ? 'selected' : '' ?>>Rescatada</option>
        </select>

        <button class="bg-purple-main text-white py-2 px-4 rounded hover:bg-purple-dark">Actualizar</button>
    </form>
</div>

<?php $conexion->close(); ?>

</body>
</html>
