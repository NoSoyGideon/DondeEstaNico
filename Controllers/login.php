<?php
require_once 'Config/Config.php';

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
        $usuario = $_POST['usuario'];
        $password = $_POST['password'];
        $user = $this->model->getUsuario($usuario);

        if ($user && password_verify($password, $user['clave'])) {
            $_SESSION['id_usuario'] = $user['id'];
            $_SESSION['nombre'] = $user['nombre'];
            header('Location: ' . BASE_URL . 'home');
        } else {
            $data['error'] = "Credenciales inválidas";
            $this->views->getView('login', 'error', $data);
        }
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
    echo json_encode(["success" => true]);
}


    public function logout() {
        session_destroy();
        header('Location: ' . BASE_URL . 'login');
    }
}
