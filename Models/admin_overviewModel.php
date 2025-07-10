<?php
class admin_overviewModel extends Query{
 
    public function __construct()
    {
        parent::__construct();
    }
    public function getUser($id) {
        $sql = "SELECT * FROM usuario WHERE id = ? ";
        return $this->select($sql, [$id]);
    }
    public function cambiarPerfil($usuario, $correo, $telefono, $estado, $direccion) {
        $sql = "UPDATE usuario SET nombre = ?, correo = ?, telefono = ?, estado = ?, direccion = ? WHERE id = ?";
        return $this->update($sql, [$usuario, $correo, $telefono, $estado, $direccion, $_SESSION['id_usuario']]);
    }
    public function cambiarPassword($password) {
        $sql = "UPDATE usuario SET clave = ? WHERE id = ?";
        return $this->update($sql, [password_hash($password, PASSWORD_DEFAULT), $_SESSION['id_usuario']]);
    }

}
 
?>