<?php
require_once 'persistencia/Conexion.php';
require_once 'persistencia/ResiduoDAO.php';

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

    // Método consultar
    public function consultar() {
        $conexion = new Conexion();
        $residuoDAO = new ResiduoDAO($this->id);
        $conexion->abrir();
        $conexion->ejecutar($residuoDAO->consultar());
        $datos = $conexion->registro();
        $this->nombre = $datos[1];
        $this->descripcion = $datos[2];
        $this->categoriaId = $datos[3]; // nombre de la categoría
        $conexion->cerrar();
    }

    // Método buscar
    public static function buscar($filtro) {
        $conexion = new Conexion();
        $residuoDAO = new ResiduoDAO();
        $conexion->abrir();
        $conexion->ejecutar($residuoDAO->buscar($filtro));
        $resultados = [];
        while (($registro = $conexion->registro()) != null) {
            $residuo = new Residuo($registro[0], $registro[1], $registro[2]);
            array_push($resultados, $residuo);
        }
        $conexion->cerrar();
        return $resultados;
    }
}
?>
