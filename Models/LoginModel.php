<?php
class LoginModel extends Query {
    public function getUsuario($id) {
        $sql = "SELECT * FROM usuario WHERE id = ?";
        return $this->select($sql, [$id]);
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
