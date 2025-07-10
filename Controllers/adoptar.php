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
}