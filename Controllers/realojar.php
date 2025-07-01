<?php
class Realojar extends Controller {
  protected $model;

  public function __construct() {
    parent::__construct();
    session_start();
    // Carga tu modelo
    require_once "Models/realojarModel.php";
    $this->model = new RealojarModel();
  }

  public function index() {
   
   
    $data['title'] = 'Adoptar una mascota';
    $this->views->getView('realojar', 'index', $data);
  }
}
