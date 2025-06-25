<?php
class CategoriaResiduoDAO {
    private $id;
    private $nombre;
    private $descripcion;

    public function __construct($id = 0, $nombre = "", $descripcion = "") {
        $this->id = $id;
        $this->nombre = $nombre;
        $this->descripcion = $descripcion;
    }

    public function consultar() {
        return "SELECT id, nombre, descripcion FROM categoria_residuo WHERE id = '" . $this->id . "'";
    }

    public function buscar($filtro) {
        return "SELECT id, nombre FROM categoria_residuo WHERE nombre LIKE '%" . $filtro . "%'";
    }
}