<?php
require_once("persistencia/Conexion.php");
require_once("persistencia/CategoriaResiduoDAO.php");

class CategoriaResiduo {
    private $id;
    private $nombre;
    private $descripcion;

    public function __construct($id = "", $nombre = "", $descripcion = "") {
        $this->id = $id;
        $this->nombre = $nombre;
        $this->descripcion = $descripcion;
    }

    public function consultar() {
        $conexion = new Conexion();
        $categoriaDAO = new CategoriaResiduoDAO($this->id);
        $conexion->abrir();
        $conexion->ejecutar($categoriaDAO->consultar());
        if ($conexion->filas() > 0) {
            $datos = $conexion->registro();
            $this->nombre = $datos[1];
            $this->descripcion = $datos[2];
        }
        $conexion->cerrar();
    }

    public static function buscar($filtro) {
        $conexion = new Conexion();
        $categoriaDAO = new CategoriaResiduoDAO();
        $conexion->abrir();
        $conexion->ejecutar($categoriaDAO->buscar($filtro));
        $categorias = array();

        while ($registro = $conexion->registro()) {
            $categoria = new CategoriaResiduo($registro[0], $registro[1]);
            array_push($categorias, $categoria);
        }

        $conexion->cerrar();
        return $categorias;
    }

    // Getters
    public function getId() { return $this->id; }
    public function getNombre() { return $this->nombre; }
    public function getDescripcion() { return $this->descripcion; }

    // Setters
    public function setId($id) { $this->id = $id; }
    public function setNombre($nombre) { $this->nombre = $nombre; }
    public function setDescripcion($descripcion) { $this->descripcion = $descripcion; }
}