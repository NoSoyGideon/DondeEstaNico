<?php
require_once 'Config/Config.php';

class login extends Controller {
    public function __construct() {
        parent::__construct();
        session_start();
    }

    public function index() {
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
            $_SESSION['usuario'] = $user['usuario'];
            header('Location: ' . BASE_URL . 'home');
        } else {
            $data['error'] = "Credenciales inválidas";
            $this->views->getView('login', 'error', $data);
        }
    }

    public function guardar() {
        
        $usuario = $_POST['nombre'];
        $clave = password_hash($_POST['clave'], PASSWORD_DEFAULT);
        $correo = $_POST['correo'];
        $this->model->crearUsuario($usuario, $clave, $correo);
        header('Location: ' . BASE_URL . 'donar');
    }

    public function logout() {
        session_destroy();
        header('Location: ' . BASE_URL . 'login');
    }
}
