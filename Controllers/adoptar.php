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
    $mascotas = $this->model->getMascotas();
    $data['mascotas'] = $mascotas;

    $data['razasPerros'] = RazaHelper::getRazasPerros();
    $data['razasGatos'] = RazaHelper::getRazasGatos();

    $data['title'] = 'Adoptar una mascota';
    $this->views->getView('adoptar', 'index', $data);
  }
}
