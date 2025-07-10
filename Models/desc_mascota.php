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
   



}
