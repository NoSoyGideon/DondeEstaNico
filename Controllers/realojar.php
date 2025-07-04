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
  public function guardar() {
    echo "Guardando mascota...";
    $nombre = $_POST['nombre'];
    $edad   = intval($_POST['edad']);
    $altura = floatval($_POST['height']);
    $peso   = floatval($_POST['weight']);
    $genero = $_POST['gender'] === 'Hombre' ? 1 : 0;
    $color  = $_POST['color'];
    $estado = $_POST['state'];
    $raza_id = $this->model->getRazaIdByNombre($_POST['breed']);
    $descripcion = $_POST['notes'] ?? '';
    $direccion = $_POST['address'] ?? '';
    $usuario_id = $_SESSION['id_usuario'];

    // Insertar mascota
    $sql = "INSERT INTO mascota (nombre, especie, genero, edad_minima, edad_maxima, descripcion, estatus, estado, altura, peso, color, usuario_origen_id, raza_id)
            VALUES (?, 'perro', ?, ?, ?, ?, 'adopcion', ?, ?, ?, ?, ?, ?)";
    $edad_min = max(0, $edad - 1);
    $edad_max = $edad + 1;
    $this->model->insertar($sql, [
      $nombre, $genero, $edad_min, $edad_max,
      $descripcion, $estado, $altura, $peso, $color, $usuario_id, $raza_id
    ]);

    // Obtener ID
    $idMascota = $this->model->lastInsertId();
    

    // Subir fotos
   for ($i = 1; $i <= 4; $i++) {
  if (!empty($_FILES["photo$i"]["name"])) {
    $nombreOriginal = basename($_FILES["photo$i"]["name"]);
    $nombreFinal = uniqid("mascota_") . "_" . $nombreOriginal;

    // Ruta relativa a guardar en BD
    $rutaRelativa = "Assets/images/mascotas/" . $nombreFinal;

    // Ruta absoluta para mover el archivo
    $rutaFisica = __DIR__ . "/../../" . $rutaRelativa;

    // Mover archivo al destino
    if (move_uploaded_file($_FILES["photo$i"]["tmp_name"], $rutaFisica)) {
      // Guardar ruta en base de datos
      $sql = "INSERT INTO mascota_fotos (mascota_id, url_foto, orden) VALUES (?, ?, ?)";
      $this->model->insertar($sql, [$idMascota, $rutaRelativa, $i]);
    }
  }
}


    header("Location: " . BASE_URL . "adoptar");
  }
}
