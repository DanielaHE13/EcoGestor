<?php
class Residuo {
    private $id;
    private $nombre;
    private $descripcion;
    private $categoriaId;

    public function __construct($id = "", $nombre = "", $descripcion = "", $categoriaId = "") {
        $this->id = $id;
        $this->nombre = $nombre;
        $this->descripcion = $descripcion;
        $this->categoriaId = $categoriaId;
    }

    public function getId() { return $this->id; }
    public function getNombre() { return $this->nombre; }
    public function getDescripcion() { return $this->descripcion; }
    public function getCategoriaId() { return $this->categoriaId; }

    public function setId($id) { $this->id = $id; }
    public function setNombre($nombre) { $this->nombre = $nombre; }
    public function setDescripcion($descripcion) { $this->descripcion = $descripcion; }
    public function setCategoriaId($categoriaId) { $this->categoriaId = $categoriaId; }
}
?>