<?php


class perfil_adopcion extends Controller {
  protected $model;

  public function __construct() {
    parent::__construct();
    session_start();
    if (!isset($_SESSION['id_usuario'])) {
    header('Location: ' . BASE_URL . 'home');
    exit();
}
    // Carga tu modelo
    require_once "Models/perfil_adopcionModel.php";
    $this->model = new perfil_adopcionModel();
  }

  public function index() {
       $mascotas = $this->model->getMascotas($_SESSION['id_usuario']);

    $data['title'] = 'Perfil';
    $data['mascotas'] = $mascotas;
    $this->views->getView('perfil_adopcion', 'index', $data);
  }
}