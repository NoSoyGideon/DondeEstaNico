<?php

require_once __DIR__ . '/../Config/RazaHelper.php'; 
class Adoptar extends Controller {
  protected $model;

  public function __construct() {
    parent::__construct();
    session_start();
    // Carga tu modelo
    require_once "Models/AdoptarModel.php";
    $this->model = new AdoptarModel();
  }

  public function index() {
    if(!isset($_SESSION['id'])) {
      $mascotas = $this->model->getMascotas();
    }else {
      $usuario_id = $_SESSION['id'];
      $mascotas = $this->model->getMascotasConFavoritos($usuario_id);
    }
   
    $data['mascotas'] = $mascotas;
    // Carga las razas con colores al inicio
    $data['razasConColor'] = obtenerRazasConColor();
    

    $data['title'] = 'Adoptar una mascota';
    $this->views->getView('adoptar', 'index', $data);
  }

  public function favoritos(){
    if(!isset($_SESSION['id'])) {
  
      return;
    }

    $usuario_id = $_SESSION['id'];
    echo $_POST['id'];

    $this->model->toggleFavorito($usuario_id, $_POST['id']);
  }

  public function proceso($params) {
    $mascota_id = isset($_GET['id']) ? (int)$_GET['id'] : null;
    $step = isset($_GET['step']) ? $_GET['step'] : 'start';
    
    if (!$mascota_id) {
      header('Location: ' . BASE_URL . 'adoptar');
      exit;
    }

    // Obtener información de la mascota
    $mascota = $this->model->getMascotaById($mascota_id);
    if (!$mascota) {
      header('Location: ' . BASE_URL . 'adoptar');
      exit;
    }

    $data['mascota'] = $mascota;
    $data['step'] = $step;
    $data['mascota_id'] = $mascota_id;
    $data['title'] = 'Proceso de Adopción - ' . $mascota['nombre'];
    
    // Verificar si el usuario está logueado
    if(!isset($_SESSION['id'])) {
      $data['show_login_modal'] = true;
      $data['usuario'] = null;
    } else {
      // Obtener información del usuario
      require_once "Models/LoginModel.php";
      $loginModel = new LoginModel();
      $usuario = $loginModel->getUsuario($_SESSION['id']);
      $data['usuario'] = $usuario;
      $data['show_login_modal'] = false;
    }
    
    $this->views->getView('adoptar', 'proceso', $data);
  }
}