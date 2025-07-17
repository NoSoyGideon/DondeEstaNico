<?php
// crear.php - Registrar Nuevo Usuario
include_once '../../Config/Config.php';

?><!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrar Usuario - Admin</title>
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

<?php
$conexion = new mysqli('localhost', 'root', '', 'DENDB');

if ($conexion->connect_error) {
    die("Connection failed: " . $conexion->connect_error);
}

$errores = [];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nombre = trim($_POST['nombre']);
    $correo = trim($_POST['correo']);
    $admin = isset($_POST['admin']) ? 1 : 0;

    if ($nombre === '' || strlen($nombre) < 2) {
        $errores[] = "El nombre es obligatorio y debe tener al menos 2 caracteres.";
    }

    if (!filter_var($correo, FILTER_VALIDATE_EMAIL)) {
        $errores[] = "Correo no válido.";
    }

    if (empty($errores)) {
        $stmt = $conexion->prepare("INSERT INTO usuario (nombre, correo, admin) VALUES (?, ?, ?)");
        $stmt->bind_param("ssi", $nombre, $correo, $admin);

        if ($stmt->execute()) {
            header("Location: index.php");
            exit;
        } else {
            $errores[] = "Error al guardar el usuario.";
        }

        $stmt->close();
    }
}
?>

<div class="flex-1 p-8">
    <h2 class="text-3xl font-bold text-purple-main mb-6">Registrar Nuevo Usuario</h2>

    <?php if (!empty($errores)): ?>
        <div class="bg-red-100 text-red-700 p-4 rounded mb-4">
            <?php foreach ($errores as $error): ?>
                <p><?= htmlspecialchars($error) ?></p>
            <?php endforeach; ?>
        </div>
    <?php endif; ?>

    <form method="POST" class="bg-white p-6 rounded shadow max-w-lg space-y-4">
        <input name="nombre" maxlength="100" class="w-full p-2 border rounded" placeholder="Nombre" required value="<?= htmlspecialchars($_POST['nombre'] ?? '') ?>">
        <input name="correo" type="email" class="w-full p-2 border rounded" placeholder="Correo" required value="<?= htmlspecialchars($_POST['correo'] ?? '') ?>">

        <label class="flex items-center space-x-2">
            <input type="checkbox" name="admin" <?= isset($_POST['admin']) ? 'checked' : '' ?> class="w-4 h-4">
            <span class="text-sm">Administrador</span>
        </label>

        <button class="bg-green-main text-white py-2 px-4 rounded hover:bg-green-700">Guardar</button>
    </form>
</div>

<?php $conexion->close(); ?>

</body>
</html>