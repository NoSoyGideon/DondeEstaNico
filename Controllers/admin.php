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


    


    $datos = $this->model->getDatos();
    $adopcionesMensuales = $this->model->getAdopcionesMensuales();
    $regresion = $this->model->getRegresion();
    $mascotas = $this->model->getMascotas();  

    $X = []; // donaciones
    $Y = []; // adopciones
    $regresion = [
    ['total_donado' => 100.0, 'total_adopciones' => 5],
    ['total_donado' => 200.0, 'total_adopciones' => 8],
    ['total_donado' => 150.0, 'total_adopciones' => 6],
    ['total_donado' => 300.0, 'total_adopciones' => 12],
    ['total_donado' => 250.0, 'total_adopciones' => 10],
];
       foreach ($regresion as $fila) {
        $X[] = (float) $fila['total_donado'];
        $Y[] = (int) $fila['total_adopciones'];
    }
   
    $mediaX = array_sum($X) / count($X);
    $mediaY = array_sum($Y) / count($Y);
    $numerador = 0;
    $denominador = 0;
    for ($i = 0; $i < count($X); $i++) {
        $numerador += ($X[$i] - $mediaX) * ($Y[$i] - $mediaY);
        $denominador += pow(($X[$i] - $mediaX), 2);
    }
    $a = $denominador != 0 ? $numerador / $denominador : 0;
    $b = $mediaY - $a * $mediaX;

    // Preparar puntos reales
    $puntos = [];
    foreach ($regresion as $fila) {
        $puntos[] = [
            'x' => (float)$fila['total_donado'],
            'y' => (int)$fila['total_adopciones']
        ];
    }

    // Línea de regresión (usamos rango basado en min y max de X)
    $minX = min($X);
    $maxX = max($X);
    $linea = [
        ['x' => $minX, 'y' => $a * $minX + $b],
        ['x' => $maxX, 'y' => $a * $maxX + $b]
    ];
    $formulaStr = 'Y = ' . round($a, 4) . 'X + ' . round($b, 2);

    $resultado = [
        'coef_a' => $a,
        'coef_b' => $b,
        'puntos' => $puntos,
        'linea' => $linea,
        'formula' => $formulaStr
    ];



    $data['title'] = 'admin';
    $data['datos'] = $datos;
    $data['mascotas'] = $mascotas;
    $data['adopciones_mensuales'] = $adopcionesMensuales;
    $data['regresion'] = $resultado;
    $this->views->getView('admin', 'index', $data);
  }


}