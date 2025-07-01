<?php
class Desc_Mascota extends Controller {
  protected $model;

  public function __construct() {
    parent::__construct();
    session_start();
    // Carga tu modelo
    require_once "Models/desc_mascota.php";
    $this->model = new DescMascotaModel();
  }

  public function index() {
    $mascotas = $this->model->getMascota($id_mascota = $_GET['id'] ?? null);
    $data['mascotas'] = $mascotas;
    $data['title'] = 'Descripción de la mascota';
    $this->views->getView('desc_mascota', 'index', $data);
  }
}
