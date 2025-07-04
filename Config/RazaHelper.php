<?php
// Asegúrate de que las constantes de configuración sean accesibles
require_once __DIR__ . '/Config.php'; // Ajusta la ruta según tu estructura
require_once __DIR__ . '/../Models/razas.php'; // Asegúrate de que la ruta a tu clase de conexión sea correcta

class RazaHelper {

    private static $razasPerros = [];
    private static $razasGatos = [];

    /**
     * Carga las razas desde la base de datos y les asigna un color.
     * Esta función debe ser llamada una vez al inicio de la aplicación.
     */
    public static function cargarRazasConColores() {
    
        try {
            $razasDB = (new razas())->getRaza();
            if (empty($razasDB)) {
                error_log("No se encontraron razas en la base de datos.");
                return;
            }

            $colorIndexPerro = 0;
            $colorIndexGato = 0;
            $paletteSize = count(COLOR_PALETTE);

            foreach ($razasDB as $raza) {
                $nombreRaza = $raza['nombre_raza'];
                $especie = strtolower($raza['especie']); // Normalizar a minúsculas

                if ($especie === 'perro') {
                    self::$razasPerros[$nombreRaza] = COLOR_PALETTE[$colorIndexPerro % $paletteSize];
                    $colorIndexPerro++;
                } elseif ($especie === 'gato') {
                    self::$razasGatos[$nombreRaza] = COLOR_PALETTE[$colorIndexGato % $paletteSize];
                    $colorIndexGato++;
                }
            }
        } catch (PDOException $e) {
            error_log("Error al cargar las razas desde la base de datos: " . $e->getMessage());
        }
    }

    /**
     * Obtiene el array de razas de perros con sus colores.
     * @return array Un array asociativo donde la clave es el nombre de la raza y el valor es la clase CSS.
     */
    public static function getRazasPerros() {
        return self::$razasPerros;
    }

    /**
     * Obtiene el array de razas de gatos con sus colores.
     * @return array Un array asociativo donde la clave es el nombre de la raza y el valor es la clase CSS.
     */
    public static function getRazasGatos() {
        return self::$razasGatos;
    }

    /**
     * Obtiene la clase CSS de color para una raza específica y especie.
     * @param string $nombreRaza El nombre de la raza.
     * @param string $especie La especie ('perro' o 'gato').
     * @return string La clase CSS de color o una cadena vacía si no se encuentra.
     */
    public static function getColorPorRaza($nombreRaza, $especie) {
        $especie = strtolower($especie);
        if ($especie === 'perro' && isset(self::$razasPerros[$nombreRaza])) {
            return self::$razasPerros[$nombreRaza];
        } elseif ($especie === 'gato' && isset(self::$razasGatos[$nombreRaza])) {
            return self::$razasGatos[$nombreRaza];
        }
        return ""; // Retorna vacío si no encuentra la raza o especie
    }
}