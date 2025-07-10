<?php
class donarModel extends Query{

    public function __construct()
    {
        parent::__construct();
    }


    public function insertDonation($monto, $nombre ,$correo,$usuario_id, $metodo) {
       $sql = "INSERT INTO donacion (monto, nombre,correo,fecha,  usuario_id, metodo)
            VALUES (?, ?,?,NOW(), ?,  ?)";
    $datos = [$monto,$nombre,$correo, $usuario_id, $metodo];
    return $this->insertar($sql, $datos);
    }
}?>

