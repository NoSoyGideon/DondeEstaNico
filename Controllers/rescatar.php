<?php
require_once __DIR__ . '/../Config/RazaHelper.php'; 
class rescatar extends Controller {
  protected $model;

  public function __construct() {
    parent::__construct();
    session_start();
    // Carga tu modelo
    require_once "Models/rescatarModel.php";
    $this->model = new rescatarModel();
  }

  public function index() {
  $ETIQUETAS_LISTA = $this->model->getEtiquetas();
  $ETIQUETAS = [];

  foreach ($ETIQUETAS_LISTA as $etiqueta) {
// Asegúrate de que 'etiqueta' y 'id' existen en el array
    $ETIQUETAS[$etiqueta['etiqueta']] = $etiqueta['id'];
  }
  $data['razasGato'] = obtenerRazasDeGatos();
  $data['razasPerro'] = obtenerRazasDePerros();
  $data['etiquetas'] = $ETIQUETAS;
  $data['title'] = 'Rescatar una mascota';
  $this->views->getView('rescatar', 'index', $data);
  }





  public function guardar() {
    echo "Guardando mascota...";

    $usuario_id = $_SESSION['id_usuario'];

   

  }
public function quepedo() {
    
      $ids = isset($_POST['etiquetas']) ? explode(',', $_POST['etiquetas']) : [];
print_r($ids);

   
  }

  public function cargar() {

    echo isset($_POST['etiquetas']) ? explode(',', $_POST['etiquetas']) : [];
    $nombre = $_POST['nombre'];
    $tipo = $_POST['tipo'];
    $genero = $_POST['genero'];
    $peso = $_POST['peso'];
    $altura = $_POST['altura'];
    $color = $_POST['color'];
    $raza = $this->model->getRazaIdByNombre($_POST['Raza']  );
    $estado = $_POST['estado'];
    $descripcion = $_POST['descripcion'];
    $direccion = $_POST['direccion'];
    $usuario_id = $_SESSION['id_usuario'];
    
    if (!empty($_POST['fecha-nacimiento'])) {
    $fecha = $_POST['fecha-nacimiento'];
    $edad_minima = null;
    $edad_maxima = null;
    // Procesar la fecha
    } else {
      $fecha = null;  // O manejar el caso donde no se ingresa una fecha
      $edad_maxima = $_POST['edad-max'];
      $edad_minima = $_POST['edad-min'];
        // El usuario no ingresó una fecha
    }




    $ruta1 = $this->cargarIMG($_FILES['main']);
    $ruta2 = $this->cargarIMG($_FILES['file-2']);
    $ruta3 = $this->cargarIMG($_FILES['file-3']);
    $ruta4 = $this->cargarIMG($_FILES['file-4']);
    echo "Cargando datos de la mascota...";
    echo $raza." ";

      $sql = "INSERT INTO mascota (nombre, especie, genero, 	fecha_nacimiento,edad_minima, edad_maxima, descripcion, estatus, estado, altura, peso, color, raza_id,direccion)
            VALUES (?, ?, ?, ?, ?, ?, ?,'rescatada', ?, ?, ?, ?, ?, ?)";
      $this->model->insertar($sql, [
      $nombre,$tipo ,$genero, $fecha, $edad_minima, $edad_maxima,
      $descripcion, $estado, $altura, $peso, $color, $raza, $direccion
    ]);


$idMascota = $this->model->lastInsertId();

 $sqlFoto = "INSERT INTO mascota_fotos (mascota_id, url_foto, orden) VALUES (?, ?, ?)";
        
 $sqlEtiquetas = "INSERT INTO mascota_etiquetas (mascota_id, etiqueta_id) VALUES (?, ?)";
         $ids = isset($_POST['etiquetas']) ? explode(',', $_POST['etiquetas']) : [];
        foreach ($ids as $idEtiqueta) {
          echo "Guardando etiqueta: $idEtiqueta para mascota ID: $idMascota"; 
            $this->model->insertar($sqlEtiquetas, [$idMascota, $idEtiqueta]);
        }
 $this->model->insertar($sqlFoto, [$idMascota, $ruta1, 1]);
        $this->model->insertar($sqlFoto, [$idMascota, $ruta2, 2]);
        $this->model->insertar($sqlFoto, [$idMascota, $ruta3, 3]);
        $this->model->insertar($sqlFoto, [$idMascota, $ruta4, 4]);


        

  }

  


public function cargarIMG($archivo) {
    if ($archivo['error'] === UPLOAD_ERR_OK) {
        $nombreTmp = $archivo['tmp_name'];
        $nombreOriginal = basename($archivo['name']);

        // Carpeta donde guardar las imágenes
        $carpetaDestino = __DIR__ . "/../Assets/images/mascotas/";

        // Crear un nombre único
        $nombreNuevo = uniqid() . '-' . $nombreOriginal;

        // Mover el archivo
        if (move_uploaded_file($nombreTmp, $carpetaDestino . $nombreNuevo)) {
            // Retornar la ruta relativa o absoluta (dependiendo del uso)
            return "Assets/images/mascotas/" . $nombreNuevo;
        } else {
            return null; // o puedes lanzar una excepción
        }
    } else {
        return null;
    }
}

}
