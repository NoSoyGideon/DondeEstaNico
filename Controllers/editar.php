<?php
require_once __DIR__ . '/../Config/RazaHelper.php'; 
class editar extends Controller {
  protected $model;

  public function __construct() {
    parent::__construct();
    session_start();
    // Carga tu modelo
    require_once "Models/editarModel.php";
    $this->model = new editarModel();
  }

  public function index() {
  $ETIQUETAS_LISTA = $this->model->getEtiquetas();
  $ETIQUETAS = [];

  foreach ($ETIQUETAS_LISTA as $etiqueta) {
// Asegúrate de que 'etiqueta' y 'id' existen en el array
    $ETIQUETAS[$etiqueta['etiqueta']] = $etiqueta['id'];
  }

    $mascotas = $this->model->getMascota($id_mascota = $_GET['id'] ?? null);
    $fotos = $this->model->getFotosMascota($id_mascota= $_GET['id'] ?? null);
    $etiquetas = $this->model->getEtiquetasMascota($id_mascota = $_GET['id'] ?? null);

  $data['mascotas'] = $mascotas;
  $data['fotos'] = $fotos;
  $data['etiquetasSelecionadas'] = $etiquetas;
  $data['razasGato'] = obtenerRazasDeGatos();
  $data['razasPerro'] = obtenerRazasDePerros();
  $data['etiquetas'] = $ETIQUETAS;
  $data['title'] = 'Editar una mascota';
  $this->views->getView('editar', 'index', $data);
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

     $sql = "INSERT INTO mascota (nombre, especie, genero, 	fecha_nacimiento,edad_minima, edad_maxima, descripcion, estatus, estado, altura, peso, color, usuario_origen_id, raza_id,direccion)
            VALUES (?, ?, ?, ?, ?, ?, ?,'adopcion', ?, ?, ?, ?, ?, ?, ?)";
     $this->model->insertar($sql, [
      $nombre,$tipo ,$genero, $fecha, $edad_minima, $edad_maxima,
      $descripcion, $estado, $altura, $peso, $color, $usuario_id, $raza, $direccion
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
  echo "Cargando imagen...";
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
              echo "  Assets/images/mascotas/" . $nombreNuevo;
            return "Assets/images/mascotas/" . $nombreNuevo;
        } else {
            return null; // o puedes lanzar una excepción
        }
    } else {
        return null;
    }
}

public function editar() {

    $nombre = $_POST['nombre'];
    $id = $_POST['id_mascota'];
    $tipo = $_POST['tipo'];
    $genero = $_POST['genero'];
    $peso = $_POST['peso'];
    $altura = $_POST['altura'];
    $color = $_POST['color'];
    $raza = $this->model->getRazaIdByNombre($_POST['Raza']);
    $estado = $_POST['estado'];
    $descripcion = $_POST['descripcion'];
    $direccion = $_POST['direccion'];
    $usuario_id = $_SESSION['id_usuario'];

    if (!empty($_POST['fecha-nacimiento'])) {
        $fecha = $_POST['fecha-nacimiento'];
        $edad_minima = null;
        $edad_maxima = null;
    } else {
        $fecha = null;
        $edad_maxima = $_POST['edad-max'];
        $edad_minima = $_POST['edad-min'];
    }
    
    // Actualizar mascota
    $sql = "UPDATE mascota SET 
        nombre = ?, 
        especie = ?, 
        genero = ?, 
        fecha_nacimiento = ?, 
        edad_minima = ?, 
        edad_maxima = ?, 
        descripcion = ?, 
        estado = ?, 
        altura = ?, 
        peso = ?, 
        color = ?, 
        usuario_origen_id = ?, 
        raza_id = ?, 
        direccion = ?
        WHERE id = ?";

    $this->model->insertar($sql, [
        $nombre, $tipo, $genero, $fecha, $edad_minima, $edad_maxima,
        $descripcion, $estado, $altura, $peso, $color, $usuario_id, $raza, $direccion,
        $id
    ]);

    // Etiquetas: eliminar existentes y volver a insertar
    $this->model->eliminar("DELETE FROM mascota_etiquetas WHERE mascota_id = ?", [$id]);

    $sqlEtiquetas = "INSERT INTO mascota_etiquetas (mascota_id, etiqueta_id) VALUES (?, ?)";
    $ids = isset($_POST['etiquetas']) ? explode(',', $_POST['etiquetas']) : [];

    foreach ($ids as $idEtiqueta) {
        $this->model->insertar($sqlEtiquetas, [$id, $idEtiqueta]);
    }
    $fotos = $this->model->getFotosMascota($id_mascota= $id ?? null);

    $foto = $fotos[0]['url_foto'] ?? null;
    $foto2 = $fotos[1]['url_foto'] ?? null;
    $foto3 = $fotos[2]['url_foto'] ?? null;
    $foto4 = $fotos[3]['url_foto'] ?? null;
    print_r($_FILES['file-4']);

$ruta1 = $this->cargarIMG($_FILES['main'])   ?? $foto;
$ruta2 = $this->cargarIMG($_FILES['file-2']) ?? $foto2;
$ruta3 = $this->cargarIMG($_FILES['file-3']) ?? $foto3;
$ruta4 = $this->cargarIMG($_FILES['file-4']) ?? $foto4;

$rutas = [$ruta1, $ruta2, $ruta3, $ruta4];

    // Eliminar fotos actuales
    $this->model->eliminar("DELETE FROM mascota_fotos WHERE mascota_id = ?", [$id]);

    $sqlFoto = "INSERT INTO mascota_fotos (mascota_id, url_foto, orden) VALUES (?, ?, ?)";
    foreach ($rutas as $i => $ruta) {
        if ($ruta !== null) {
            $this->model->insertar($sqlFoto, [$id, $ruta, $i + 1]);
        }
    }

    echo "Mascota actualizada correctamente.";
}




}
