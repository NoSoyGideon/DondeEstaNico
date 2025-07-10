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
  m.color,
  m.peso,
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

    public function getMascotasConFavoritos($usuario_id) {
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
      m.color,
      m.peso,
      m.altura,
      m.genero,
      r.nombre_raza,
      m.estado,
      mf.url_foto,
      CASE WHEN f.mascota_id IS NOT NULL THEN 1 ELSE 0 END AS es_favorita
    FROM mascota AS m
    JOIN razas AS r ON m.raza_id = r.id
    JOIN fotos_ordenadas AS mf ON m.id = mf.mascota_id AND mf.rn = 1
    LEFT JOIN favoritos AS f ON f.mascota_id = m.id AND f.usuario_id = ?
    WHERE m.estatus != 'adoptada';";

    return $this->selectAll($sql, [$usuario_id]);
}

   public function toggleFavorito($usuario_id, $mascota_id) {
        // Verificamos si existe
        $sqlCheck = "SELECT COUNT(*) FROM favoritos WHERE usuario_id = ? AND mascota_id = ?";
        $existe = $this->select($sqlCheck, [$usuario_id, $mascota_id]);
        echo $existe['COUNT(*)'];

        if ($existe['COUNT(*)'] > 0) {
            // Elimina
            $sqlDelete = "DELETE FROM favoritos WHERE usuario_id = ? AND mascota_id = ?";
            $this->eliminar($sqlDelete, [$usuario_id, $mascota_id]);
            echo $sqlDelete;
            return "Favorito eliminado";
        } else {
            // Inserta
            $sqlInsert = "INSERT INTO favoritos (usuario_id, mascota_id, fecha_agregado) VALUES (?, ?, NOW())";
            $this->insertar($sqlInsert, [$usuario_id, $mascota_id]);
            echo $sqlInsert;
            return "Favorito agregado";
        }
    }


}?>

