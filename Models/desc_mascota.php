<?php
class DescMascotaModel extends Query {
    public function getMascota($id_mascota) {
        $sql = "SELECT m.*, r.nombre_raza AS nombre_raza FROM mascota AS m
JOIN razas AS r ON m.raza_id = r.id WHERE m.id = ?";
        return $this->select($sql, [$id_mascota]);
    }



}
