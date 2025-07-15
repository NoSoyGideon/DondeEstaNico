<?php
class editarModel extends Query {
    public function getUsuario($usuario) {
        $sql = "SELECT * FROM usuario WHERE usuario = ?";
        return $this->select($sql, [$usuario]);
    }

    public function crearUsuario($usuario, $clave,$correo) {
        $sql = "INSERT INTO usuario (nombre, clave,correo) VALUES (?, ?,?)";
        return $this->insertar($sql, [$usuario, $clave,$correo]);
    }
    public function getUsuarioPorCorreo($correo) {
    $sql = "SELECT * FROM usuario WHERE correo = ?";
    return $this->select($sql, [$correo]);
    }
    public function getRazaIdByNombre($nombre) {
    $sql = "SELECT id FROM razas WHERE nombre_raza = ?";
    $raza = $this->select($sql, [$nombre]);
    return $raza ? $raza['id'] : null;
  }


    public function getEtiquetas() {
    $sql = "SELECT * FROM etiquetas order by id;";
    return $this->selectAll($sql);
  }

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
