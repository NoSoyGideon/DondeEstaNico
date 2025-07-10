<?php
class admin_overviewModel extends Query{
 
    public function __construct()
    {
        parent::__construct();
    }
    public function getMascotas() {
        $sql = "SELECT m.*, mf.url_foto, r.nombre_raza FROM mascota AS m JOIN mascota_fotos AS mf ON m.id = mf.mascota_id JOIN razas AS r ON m.raza_id = r.id WHERE mf.orden = 1 AND m.estatus != 'adoptada' ORDER BY m.fecha_ingreso DESC LIMIT 4";
        return $this->selectAll($sql);
    }

}
 
?>