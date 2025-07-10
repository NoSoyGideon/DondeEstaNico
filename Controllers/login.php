<?php
require_once 'Config/Config.php';
require_once 'Config/Helpers.php';


class login extends Controller {
    public function __construct() {
        parent::__construct();
        session_start();
        
    }

    public function index() {
            if (isset($_SESSION['id_usuario'])) {
        header('Location: ' . BASE_URL . 'home');
        return;
    }
        $this->views->getView('login', 'index');
    }

    public function registro() {
        $this->views->getView('login', 'registro');
    }

    public function validar() {
        header('Content-Type: application/json');
        $correo = $_POST['correo'] ?? '';
        $password = $_POST['password'] ?? '';
        $errores = [];

        if (!filter_var($correo, FILTER_VALIDATE_EMAIL))
            $errores[] = "Correo no válido.";
        if (empty($password))
            $errores[] = "Ingresa tu contraseña.";

        if ($user = $this->model->getUsuarioPorCorreo($correo)) {
            if (!password_verify($password, $user['clave'])) {
                $errores[] = "Contraseña incorrecta.";
            }
        } else {
            $errores[] = "El usuario no existe.";
        }

        if ($errores) {
            echo json_encode(['success' => false, 'errores' => $errores]);
            return;
        }

        iniciarSesion($user);

        echo json_encode(['success' => true]);
    }

     public function validarAdmin() {
        header('Content-Type: application/json');
        $correo = $_POST['correo'] ?? '';
        $password = $_POST['password'] ?? '';
        $errores = [];

        if (!filter_var($correo, FILTER_VALIDATE_EMAIL))
            $errores[] = "Correo no válido.";
        if (empty($password))
            $errores[] = "Ingresa tu contraseña.";

        if ($user = $this->model->getUsuarioPorCorreo($correo)) {
            if (!password_verify($password, $user['clave'])) {
                $errores[] = "Contraseña incorrecta.";
            }
            if ($user['admin'] !== 1) {
                $errores[] = "No tienes permisos de administrador.";
            }
        } else {
            $errores[] = "El usuario no existe.";
        }
        

        if ($errores) {
            echo json_encode(['success' => false, 'errores' => $errores]);
            return;
        }

        iniciarSesion($user);

        echo json_encode(['success' => true]);
    }


    public function guardar()
{   
    header('Content-Type: application/json');

    $nombre = $_POST['nombre'] ?? null;
    $correo = $_POST['correo'] ?? null;
    $clave = $_POST['clave'] ?? null;
    $errores = [];

    // Validaciones
    if (!preg_match('/^[a-zA-Z\s]+$/', $nombre)) {
        $errores[] = "Nombre inválido";
    }

    if (!filter_var($correo, FILTER_VALIDATE_EMAIL)) {
        $errores[] = "Correo inválido";
    }

    if (strlen($clave) < 8 || !preg_match('/[A-Z]/', $clave) || !preg_match('/[0-9]/', $clave)) {
        $errores[] = "Contraseña insegura";
    }
// Verificar si el usuario ya existe
$existe = $this->model->getUsuarioPorCorreo($correo);
if ($existe) {
    $errores[] = "Este correo ya está registrado";
}

if (!empty($errores)) {
    echo json_encode(["success" => false, "errores" => $errores]);
    return;
}

// Guardar si todo está bien
$claveHash = password_hash($clave, PASSWORD_DEFAULT);
$this->model->crearUsuario($nombre, $claveHash, $correo);

// Obtener al nuevo usuario
$user = $this->model->getUsuarioPorCorreo($correo);


    iniciarSesion($user);

echo json_encode(["success" => true]);

}


    public function logout() {
        
    cerrarSesion();
    // Volver a la página anterior
    $back = $_SERVER['HTTP_REFERER'] ?? BASE_URL . 'home';
    header("Location: $back");
    }
}
