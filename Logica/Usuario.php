<?php
require_once 'persistencia/Conexion.php';
require_once 'persistencia/UsuarioDAO.php';

class Usuario {
    private $id;
    private $nombre;
    private $apellido;
    private $correo;
    private $clave;
    private $nickname;
    private $telefono;
    private $direccion;

    public function __construct($id = 0, $nombre = "", $apellido = "", $correo = "", $clave = "", $nickname = "", $telefono = "", $direccion = "") {
        $this->id = $id;
        $this->nombre = $nombre;
        $this->apellido = $apellido;
        $this->correo = $correo;
        $this->clave = $clave;
        $this->nickname = $nickname;
        $this->telefono = $telefono;
        $this->direccion = $direccion;
    }

    
    public function getId() { return $this->id; }
    public function getNombre() { return $this->nombre; }
    public function getApellido() { return $this->apellido; }
    public function getCorreo() { return $this->correo; }
    public function getClave() { return $this->clave; }
    public function getNickname() { return $this->nickname; }
    public function getTelefono() { return $this->telefono; }
    public function getDireccion() { return $this->direccion; }

    public function setId($id) { $this->id = $id; }
    public function setNombre($nombre) { $this->nombre = $nombre; }
    public function setApellido($apellido) { $this->apellido = $apellido; }
    public function setCorreo($correo) { $this->correo = $correo; }
    public function setClave($clave) { $this->clave = $clave; }
    public function setNickname($nickname) { $this->nickname = $nickname; }
    public function setTelefono($telefono) { $this->telefono = $telefono; }
    public function setDireccion($direccion) { $this->direccion = $direccion; }

   
    public function consultar() {
    $conexion = new Conexion();
    $usuarioDAO = new UsuarioDAO($this->id);
    $conexion->abrir();
    $conexion->ejecutar($usuarioDAO->consultar());
    $datos = $conexion->registro();

    echo "<pre>";
    var_dump($datos);
    echo "</pre>";

    if ($datos) {
        $this->nombre = $datos[0];
        $this->correo = $datos[1];
        $this->nickname = $datos[2];
        $this->telefono = $datos[3];
        $this->direccion = $datos[4];
    }
    $conexion->cerrar();
}




    
    public static function buscar($filtro) {
        $conexion = new Conexion();
        $usuarioDAO = new UsuarioDAO();
        $conexion->abrir();
        $conexion->ejecutar($usuarioDAO->buscar($filtro));
        $resultados = [];
        while (($registro = $conexion->registro()) != null) {
            $usuario = new Usuario($registro[0], $registro[1], "", $registro[2], "", $registro[3]);
            array_push($resultados, $usuario);
        }
        $conexion->cerrar();
        return $resultados;
    }

    public function autenticar() {
    $conexion = new Conexion();
    $conexion->abrir();
    $usuarioDAO = new UsuarioDAO(0, "", "", $this->correo, $this->clave, "", "", "");
    $conexion->ejecutar($usuarioDAO->autenticar());

    if ($conexion->filas() == 0) {
        $conexion->cerrar();
        return 0; // Usuario no encontrado
    } else {
        $registro = $conexion->registro();
        if ($registro[1] == 0) {
            $conexion->cerrar();
            return 2; // Usuario inactivo (opcional, si se implementa luego)
        } else {
            $this->id = $registro[0];
            $conexion->cerrar();
            return 1; // Autenticación correcta
        }
    }
}
public function actualizar() {
    require_once("Persistencia/Conexion.php");
    require_once("Persistencia/UsuarioDAO.php");

    $conexion = new Conexion();
    $conexion->abrir();

    $usuarioDAO = new UsuarioDAO($this->id, $this->nombre, $this->telefono, $this->nickname, $this->correo, $this->clave);

    $conexion->ejecutar($usuarioDAO->actualizar());

    $conexion->cerrar();
    return $exito;
}



}
?>
