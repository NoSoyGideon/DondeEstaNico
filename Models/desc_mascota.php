<?php
class DescMascotaModel extends Query {
    public function getMascota($id_mascota) {
        $sql = "SELECT m.*, r.nombre_raza AS nombre_raza FROM mascota AS m
                JOIN razas AS r ON m.raza_id = r.id WHERE m.id = ?";
        return $this->select($sql, [$id_mascota]);
    }
    
    public function getFotosMascota($id_mascota) {
        $sql = "SELECT * FROM mascota_fotos 
                WHERE mascota_id = ? 
                ORDER BY orden ASC";
        return $this->selectAll($sql, [$id_mascota]);
    }
    
    public function getEtiquetasMascota($id_mascota) {
        $sql = "SELECT e.etiqueta FROM mascota_etiquetas AS me
                JOIN etiquetas AS e ON me.etiqueta_id = e.id 
                WHERE mascota_id = ? 
                ";
        return $this->selectAll($sql, [$id_mascota]);
    }
       public function getMascotas() {
        $sql = "SELECT m.*, mf.url_foto, r.nombre_raza FROM mascota AS m JOIN mascota_fotos AS mf ON m.id = mf.mascota_id JOIN razas AS r ON m.raza_id = r.id WHERE mf.orden = 1 AND m.estatus != 'adoptada' ORDER BY m.fecha_ingreso DESC LIMIT 4";
        return $this->selectAll($sql);
    }
       public function registrarAdopcion($usuario_id, $mascota_id, $confirmar = 0) {
        $sql = "INSERT INTO adopcion (usuario_id, mascota_id, confirmar) VALUES (?, ?, ?)";
        $datos = [$usuario_id, $mascota_id, $confirmar];
        return $this->insertar($sql, $datos);
    }





}
