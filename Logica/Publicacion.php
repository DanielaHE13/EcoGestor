<?php
require_once("persistencia/Conexion.php");
require_once("persistencia/PublicacionDAO.php");

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

    // Getters
    public function getId() { return $this->id; }
    public function getColaboradorId() { return $this->colaboradorId; }
    public function getTitulo() { return $this->titulo; }
    public function getDescripcion() { return $this->descripcion; }
    public function getEnlace() { return $this->enlace; }
    public function getFechaPublicacion() { return $this->fechaPublicacion; }
    public function getTipo() { return $this->tipo; }

    // Setters
    public function setId($id) { $this->id = $id; }
    public function setColaboradorId($colaboradorId) { $this->colaboradorId = $colaboradorId; }
    public function setTitulo($titulo) { $this->titulo = $titulo; }
    public function setDescripcion($descripcion) { $this->descripcion = $descripcion; }
    public function setEnlace($enlace) { $this->enlace = $enlace; }
    public function setFechaPublicacion($fechaPublicacion) { $this->fechaPublicacion = $fechaPublicacion; }
    public function setTipo($tipo) { $this->tipo = $tipo; }

    // 🔍 Consultar una publicación específica
    public function consultar() {
        $conexion = new Conexion();
        $publicacionDAO = new PublicacionDAO($this->id);
        $conexion->abrir();
        $conexion->ejecutar($publicacionDAO->consultar());
        if ($conexion->filas() > 0) {
            $datos = $conexion->registro();
            $this->colaboradorId = $datos[1];
            $this->titulo = $datos[2];
            $this->descripcion = $datos[3];
            $this->enlace = $datos[4];
            $this->fechaPublicacion = $datos[5];
            $this->tipo = $datos[6];
        }
        $conexion->cerrar();
    }

    // 🔍 Buscar publicaciones por filtro
    public static function buscar($filtro) {
        $conexion = new Conexion();
        $publicacionDAO = new PublicacionDAO();
        $conexion->abrir();
        $conexion->ejecutar($publicacionDAO->buscar($filtro));
        $publicaciones = array();

        while ($registro = $conexion->registro()) {
            $publicacion = new Publicacion($registro[0], "", $registro[1], "", "", "", $registro[2]);
            array_push($publicaciones, $publicacion);
        }

        $conexion->cerrar();
        return $publicaciones;
    }
}
?>
