<?php
function iniciarSesion(array $usuario) {
    if (session_status() !== PHP_SESSION_ACTIVE) {
        session_start();
    }

    foreach ($usuario as $clave => $valor) {
        $_SESSION[$clave] = $valor;
    }

    // Alias adicional si querés usarlo para validación
    $_SESSION['id_usuario']     = $usuario['id'];
    $_SESSION['nombre']         = $usuario['nombre'];
    $_SESSION['telefono']       = $usuario['telefono'] ?? null;
    $_SESSION['correo']         = $usuario['correo'];
   // $_SESSION['clave']          = $usuario['clave']; // ⚠️ solo si necesitás, idealmente no guardar
    $_SESSION['admin']          = $usuario['admin'];
    $_SESSION['redes']          = $usuario['redes'] ?? null;
    $_SESSION['fecha_registro'] = $usuario['fecha_registro'];
    $_SESSION['estado']         = $usuario['estado'] ?? null;
    $_SESSION['descripcion']    = $usuario['descripcion'] ?? null;
    $_SESSION['direccion']      = $usuario['direccion'] ?? null;
}

function cerrarSesion() {
    if (session_status() !== PHP_SESSION_ACTIVE) {
        session_start();
    }
    session_unset();
    session_destroy();
}





?>