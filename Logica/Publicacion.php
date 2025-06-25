<?php
class Publicacion {
private $id;
    private $colaboradorId;
    private $titulo;
    private $descripcion;
    private $enlace;
    private $fechaPublicacion;
    private $tipo;

    public function __construct($id = "", $colaboradorId = "", $titulo = "", $descripcion = "", $enlace = "", $fechaPublicacion = "", $tipo = "noticia") {
        $this->id = $id;
        $this->colaboradorId = $colaboradorId;
        $this->titulo = $titulo;
        $this->descripcion = $descripcion;
        $this->enlace = $enlace;
        $this->fechaPublicacion = $fechaPublicacion;
        $this->tipo = $tipo;
    }

    public function getId() { return $this->id; }
    public function getColaboradorId() { return $this->colaboradorId; }
    public function getTitulo() { return $this->titulo; }
    public function getDescripcion() { return $this->descripcion; }
    public function getEnlace() { return $this->enlace; }
    public function getFechaPublicacion() { return $this->fechaPublicacion; }
    public function getTipo() { return $this->tipo; }

    public function setId($id) { $this->id = $id; }
    public function setColaboradorId($colaboradorId) { $this->colaboradorId = $colaboradorId; }
    public function setTitulo($titulo) { $this->titulo = $titulo; }
    public function setDescripcion($descripcion) { $this->descripcion = $descripcion; }
    public function setEnlace($enlace) { $this->enlace = $enlace; }
    public function setFechaPublicacion($fechaPublicacion) { $this->fechaPublicacion = $fechaPublicacion; }
    public function setTipo($tipo) { $this->tipo = $tipo; }
};

?>
