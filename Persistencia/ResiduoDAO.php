<?php
class ResiduoDAO {
    private $id;
    private $nombre;
    private $descripcion;
    private $categoriaId;

    public function __construct($id = 0, $nombre = "", $descripcion = "", $categoriaId = 0) {
        $this->id = $id;
        $this->nombre = $nombre;
        $this->descripcion = $descripcion;
        $this->categoriaId = $categoriaId;
    }

    public function consultar() {
        return "SELECT r.id, r.nombre, r.descripcion, c.nombre AS categoria FROM residuo r JOIN categoria_residuo c ON r.categoria_id = c.id WHERE r.id = '" . $this->id . "'";
    }

    public function buscar($filtro) {
        return "SELECT r.id, r.nombre, r.descripcion FROM residuo r WHERE r.nombre LIKE '%" . $filtro . "%'";
    }
}