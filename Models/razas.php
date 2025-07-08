<?php
class razas extends Query {
    public function getRaza() {
        $sql = "SELECT nombre_raza, especie FROM razas ORDER BY especie, nombre_raza ASC";
        return $this->selectAll($sql);
    }


}
