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

}
