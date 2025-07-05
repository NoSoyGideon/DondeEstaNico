<?php
class RealojarModel extends Query {
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


}
