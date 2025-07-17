<?php
// eliminar.php - Eliminar Mascota
include_once '../../Config/Config.php';

$conexion = new mysqli('localhost', 'root', '', 'DENDB');

if ($conexion->connect_error) {
    die("Connection failed: " . $conexion->connect_error);
}

$id = $_GET['id'] ?? null;

if (!$id || !is_numeric($id)) {
    die("ID no válido.");
}

$stmt = $conexion->prepare("DELETE FROM mascota WHERE id = ?");
$stmt->bind_param("i", $id);

if ($stmt->execute()) {
    header("Location: index.php");
    exit;
} else {
    echo "Error al eliminar la mascota.";
}

$stmt->close();
$conexion->close();
?>
