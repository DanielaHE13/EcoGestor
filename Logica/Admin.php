<?php
require_once("persistencia/Conexion.php");
require_once("persistencia/AdministradorDAO.php");

class Administrador {
    private $id;
    private $nombre;
    private $apellido;
    private $correo;
    private $contrasena;

    public function __construct($id = "", $nombre = "", $apellido = "", $correo = "", $contrasena = "") {
        $this->id = $id;
        $this->nombre = $nombre;
        $this->apellido = $apellido;
        $this->correo = $correo;
        $this->contrasena = $contrasena;
    }

    // Getters
    public function getId() { return $this->id; }
    public function getNombre() { return $this->nombre; }
    public function getApellido() { return $this->apellido; }
    public function getCorreo() { return $this->correo; }
    public function getContrasena() { return $this->contrasena; }

    // Setters
    public function setId($id) { $this->id = $id; }
    public function setNombre($nombre) { $this->nombre = $nombre; }
    public function setApellido($apellido) { $this->apellido = $apellido; }
    public function setCorreo($correo) { $this->correo = $correo; }
    public function setContrasena($contrasena) { $this->contrasena = $contrasena; }

    // Función para autenticar el login del administrador
    public function autenticar() {
        $conexion = new Conexion();
        $adminDAO = new AdministradorDAO(0, "", "", $this->correo, $this->contrasena);
        $conexion->abrir();
        $conexion->ejecutar($adminDAO->autenticar());
        if ($conexion->filas() == 1) {
            $this->id = $conexion->registro()[0];
            $conexion->cerrar();
            return true;
        } else {
            $conexion->cerrar();
            return false;
        }
    }

    // Consultar información del administrador
    public function consultar() {
        $conexion = new Conexion();
        $adminDAO = new AdministradorDAO($this->id);
        $conexion->abrir();
        $conexion->ejecutar($adminDAO->consultar());
        $datos = $conexion->registro();
        $this->nombre = $datos[0];
        $this->apellido = $datos[1];
        $this->correo = $datos[2];
        $conexion->cerrar();
    }

    // Buscar administradores por nombre o correo
    public static function buscar($filtro) {
        $conexion = new Conexion();
        $adminDAO = new AdministradorDAO();
        $conexion->abrir();
        $conexion->ejecutar($adminDAO->buscar($filtro));
        $resultados = [];

        while ($fila = $conexion->registro()) {
            $admin = new Administrador($fila[0], $fila[1], "", $fila[2]);
            $resultados[] = $admin;
        }

        $conexion->cerrar();
        return $resultados;
    }
}
?>
