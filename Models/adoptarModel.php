<?php
class adoptarModel extends Query{

    public function __construct()
    {
        parent::__construct();
    }

    public function getMascotas() {
        $sql = "WITH fotos_ordenadas AS (
  SELECT *,
    ROW_NUMBER() OVER (PARTITION BY mascota_id ORDER BY id ASC) AS rn
  FROM mascota_fotos
)
SELECT 
  m.id,
  m.nombre,
  m.especie,
  m.fecha_nacimiento, 
  m.edad_maxima,
  m.edad_minima,
  m.descripcion,
  m.direccion,
  m.altura,
  m.genero,
  r.nombre_raza,
  m.estado,
  mf.url_foto
FROM mascota AS m
JOIN razas AS r ON m.raza_id = r.id
JOIN fotos_ordenadas AS mf ON m.id = mf.mascota_id AND mf.rn = 1
WHERE m.estatus != 'adoptada';";
        return $this->selectAll($sql);
    }
}?>