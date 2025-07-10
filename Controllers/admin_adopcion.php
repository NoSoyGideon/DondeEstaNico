<?php


class admin_adopcion extends Controller {
  protected $model;

  public function __construct() {
    parent::__construct();
    session_start();
    if (!isset($_SESSION['id_usuario'])) {
    header('Location: ' . BASE_URL . 'home');
    exit();
}
    // Carga tu modelo
    require_once "Models/admin_adopcionModel.php";
    $this->model = new admin_adopcionModel();
  }

  public function index() {
 

    $data['title'] = 'admin';
    $this->views->getView('admin_adopcion', 'index', $data);
  }
}