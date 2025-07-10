<?php

require_once __DIR__ . '/../Config/RazaHelper.php'; 
class favoritos extends Controller {
  protected $model;

  public function __construct() {
    parent::__construct();
    session_start();
    if (!isset($_SESSION['id_usuario'])) {
    header('Location: ' . BASE_URL . 'home');
    exit();
}
    // Carga tu modelo
    require_once "Models/favoritosModel.php";
    $this->model = new favoritosModel();
  }

  public function index() {
    $mascotas = $this->model->getMascotas($_SESSION['id_usuario']);
    $data['mascotas'] = $mascotas;
    // Carga las razas con colores al inicio
    $data['razasConColor'] = obtenerRazasConColor();
    

    $data['title'] = 'Favoritos';
    $this->views->getView('favoritos', 'index', $data);
  }
}