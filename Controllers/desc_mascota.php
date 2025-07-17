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
     $listaMascotas = $this->model->getMascotas();
    $mascotas = $this->model->getMascota($id_mascota = $_GET['id'] ?? null);
    $fotos = $this->model->getFotosMascota($id_mascota= $_GET['id'] ?? null);
    $etiquetas = $this->model->getEtiquetasMascota($id_mascota = $_GET['id'] ?? null);
    $data['lista'] = $listaMascotas;
    $data['mascotas'] = $mascotas;
    $data['fotos'] = $fotos;
    $data['etiquetas'] = $etiquetas;
    $data['title'] = 'Descripción de la mascota';
    $this->views->getView('desc_mascota', 'index', $data);
  }
}
