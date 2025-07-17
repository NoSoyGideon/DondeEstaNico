<?php
class adminModel extends Query{

    public function __construct()
    {
        parent::__construct();
    }
    public function getDatos() {
        $sql = "SELECT
  -- Total de mascotas disponibles para adopción
  (SELECT COUNT(*) FROM mascota WHERE estatus = 'adopcion') AS total_mascotas_adopcion,

  -- Total de adopciones esta semana (últimos 7 días)
  (SELECT COUNT(*) 
   FROM adopcion 
   WHERE fecha >= DATE_SUB(NOW(), INTERVAL 7 DAY)) AS adopciones_ultima_semana,

  -- Total de donaciones este mes
  (SELECT SUM(monto) 
   FROM donacion 
   WHERE MONTH(fecha) = MONTH(NOW()) AND YEAR(fecha) = YEAR(NOW())) AS total_donaciones_mes,

  -- Nueva métrica 🔥: nombre de la mascota más favorita
  (SELECT nombre 
   FROM mascota 
   WHERE id = (
     SELECT mascota_id 
     FROM favoritos 
     GROUP BY mascota_id 
     ORDER BY COUNT(*) DESC 
     LIMIT 1
   )
  ) AS mascota_mas_favorita;";      
        return $this->select($sql);
    }


    public function getAdopcionesMensuales() {
        $sql = "SELECT
                YEAR(fecha) AS anio,
                MONTH(fecha) AS mes,
                COUNT(*) AS total_donaciones
            FROM donacion
            GROUP BY anio, mes
            ORDER BY anio, mes
        ";
        return $this->selectAll($sql);
    }
    public function getRegresion() {
        $sql = "SELECT
  YEAR(a.fecha) AS anio,
  MONTH(a.fecha) AS mes,
  COUNT(*) AS total_adopciones,
  (
    SELECT SUM(d.monto)
    FROM donacion d
    WHERE YEAR(d.fecha) = YEAR(a.fecha)
      AND MONTH(d.fecha) = MONTH(a.fecha)
  ) AS total_donado
FROM adopcion a
GROUP BY anio, mes
ORDER BY anio, mes;
        ";
        return $this->selectAll($sql);
    }

    public function getMascotas() {
        $sql = "SELECT m.*, r.nombre_raza FROM mascota AS m JOIN razas AS r ON m.raza_id = r.id WHERE m.estatus != 'adoptada' ORDER BY m.fecha_ingreso DESC ";
        return $this->selectAll($sql);
    }


}?>

