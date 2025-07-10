<?php


class admin extends Controller {
  protected $model;

  public function __construct() {
    parent::__construct();
    session_start();
    if (!isset($_SESSION['id_usuario'])) {
    header('Location: ' . BASE_URL . 'home');
    exit();
}
    // Carga tu modelo
    require_once "Models/adminModel.php";
    $this->model = new adminModel();
  }

  public function index() {
 

    $data['title'] = 'admin';
    $this->views->getView('admin', 'index', $data);
  }
}