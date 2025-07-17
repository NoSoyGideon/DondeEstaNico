<?php
class adminUsuario extends Controller
{
    public function __construct()
    {
        parent::__construct();
          session_start();
          require_once "Models/perfilModel.php";
    $this->model = new perfilModel();
    }


    
    public function index()
    {
        if (!isset($_SESSION['id_usuario'])) {
            header('Location: ' . BASE_URL . 'home');
            exit();
        }
        $data['usuario'] = $this->model->getUser($_SESSION['id']);
        $data['title'] = 'Mi perfil';

        $this->views->getView('adminUsuario', "index", $data );
    }
    public function cambiar()
    {

        $usuario = $_POST['usuario'] ?? '';
        $correo = $_POST['correo'] ?? '';
        $telefono = $_POST['telefono'] ?? '';
        $estado = $_POST['estado'] ?? '';
        $direccion = $_POST['direccion'] ?? '';


        if (!$usuario || !$correo || !$telefono || !$estado || !$direccion) {
        
            return;
        }

        if (!filter_var($correo, FILTER_VALIDATE_EMAIL)) {
         
            return;
        }

        if ($this->model->cambiarPerfil($usuario, $correo, $telefono, $estado, $direccion)) {
            echo json_encode(['success' => true, 'message' => 'Cambios guardados correctamente']);
        } else {
        
        }


    }

    public function cambiarPassword()
    {
        $newPassword = $_POST['new-password'] ?? '';
        $confirmPassword = $_POST['confirm-password'] ?? '';

        if (!$newPassword || !$confirmPassword) {
            echo json_encode(['success' => false, 'message' => 'Por favor completa ambos campos de contraseña.']);
            return;
        }

        if ($newPassword !== $confirmPassword) {
            echo json_encode(['success' => false, 'message' => 'Las contraseñas no coinciden.']);
            return;
        }

        if (strlen($newPassword) < 6) {
            echo json_encode(['success' => false, 'message' => 'La contraseña debe tener al menos 6 caracteres.']);
            return;
        }

        if ($this->model->cambiarPassword($newPassword)) {
            echo json_encode(['success' => true, 'message' => 'Contraseña actualizada correctamente']);
        } else {
            echo json_encode(['success' => false, 'message' => 'Error al actualizar la contraseña']);
        }
    }   
}