<?php
class PublicacionDAO {
    private $id;
    private $colaboradorId;
    private $titulo;
    private $descripcion;
    private $enlace;
    private $fechaPublicacion;
    private $tipo;

    public function __construct($id = 0, $colaboradorId = 0, $titulo = "", $descripcion = "", $enlace = "", $fechaPublicacion = "", $tipo = "noticia") {
        $this->id = $id;
        $this->colaboradorId = $colaboradorId;
        $this->titulo = $titulo;
        $this->descripcion = $descripcion;
        $this->enlace = $enlace;
        $this->fechaPublicacion = $fechaPublicacion;
        $this->tipo = $tipo;
    }

    public function consultar() {
        return "SELECT * FROM publicacion WHERE id = '" . $this->id . "'";
    }

    public function buscar($filtro) {
        return "SELECT id, titulo, tipo FROM publicacion WHERE titulo LIKE '%" . $filtro . "%'";
    }
}
