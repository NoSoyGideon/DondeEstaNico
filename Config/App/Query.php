<?php
class Query extends Conexion{
    private $pdo, $con, $sql, $datos;
    public function __construct() {
        $this->pdo = new Conexion();
        $this->con = $this->pdo->conect();
    }
public function select(string $sql, array $datos = [])
{
    $this->sql = $sql;
    $this->datos = $datos;
    $resul = $this->con->prepare($this->sql);
    $resul->execute($this->datos);
    $data = $resul->fetch(PDO::FETCH_ASSOC);
    return $data;
}

    public function selectAll(string $sql,array $datos = [])
    {
        $this->sql = $sql;
        $this->datos = $datos;
        $resul = $this->con->prepare($this->sql);
        $resul->execute($this->datos);
        $data = $resul->fetchAll(PDO::FETCH_ASSOC);
        return $data;
    }
    public function save(string $sql, array $datos)
    {
        $this->sql = $sql;
        $this->datos = $datos;
        $insert = $this->con->prepare($this->sql);
        $data = $insert->execute($this->datos);
        if ($data) {
            $res = 1;
        }else{
            $res = 0;
        }
        return $res;
    }
    public function insertar(string $sql, array $datos)
    {
        $this->sql = $sql;
        $this->datos = $datos;
        $insert = $this->con->prepare($this->sql);
        $data = $insert->execute($this->datos);
        if ($data) {
            $res = $this->con->lastInsertId();
        } else {
            $res = 0;
        }
        return $res;
    }
    public function lastInsertId() {
    return $this->con->lastInsertId();
}


public function eliminar(string $sql, array $datos)
{
    $this->sql = $sql;
    $this->datos = $datos;
    $delete = $this->con->prepare($this->sql);
    $data = $delete->execute($this->datos);
    if ($data) {
        return 1;
    } else {
        return 0;
    }
}
}
?>