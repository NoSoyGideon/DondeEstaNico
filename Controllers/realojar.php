<?php
require_once __DIR__ . '/../Config/RazaHelper.php'; 
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
  $ETIQUETAS_LISTA = $this->model->getEtiquetas();
  $ETIQUETAS = [];

  foreach ($ETIQUETAS_LISTA as $etiqueta) {
// Asegúrate de que 'etiqueta' y 'id' existen en el array
    $ETIQUETAS[$etiqueta['etiqueta']] = $etiqueta['id'];
  }
  $data['razasGato'] = obtenerRazasDeGatos();
  $data['razasPerro'] = obtenerRazasDePerros();
  $data['etiquetas'] = $ETIQUETAS;
  $data['title'] = 'Realojar una mascota';
  $this->views->getView('realojar', 'index', $data);
  }





  public function guardar() {
    echo "Guardando mascota...";

    $usuario_id = $_SESSION['id_usuario'];

   

  }





  public function cargarIMG() {
     $archivo = $_FILES['foto'];
         if ($archivo['error'] === UPLOAD_ERR_OK) {
        $nombreTmp = $archivo['tmp_name'];
        $nombreOriginal = basename($archivo['name']);
        
        // Carpeta donde guardar las imágenes (debe existir y tener permisos de escritura)
        $carpetaDestino = __DIR__ . "/../Assets/images/mascotas/";

        // Puedes crear un nombre único para evitar sobreescritura
        $nombreNuevo = uniqid() . '-' . $nombreOriginal;

        // Mover el archivo desde temporal a la carpeta destino
        if (move_uploaded_file($nombreTmp, $carpetaDestino . $nombreNuevo)) {
            echo "La imagen se ha subido correctamente.";
            // Aquí puedes guardar $nombreNuevo en base de datos para asociarlo al usuario
        } else {
            echo "Error al mover la imagen.";
        }
    } else {
        echo "Error en la subida del archivo.";
    }
  
  }
}
