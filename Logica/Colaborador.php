<?php
require_once 'Persona.php';

class Colaborador extends Persona {
    private $direccionOficina;
    private $telefono;
    private $domicilio; // booleano 1 o 0

    public function __construct($id = "", $nombre = "", $apellido = "", $correo = "", $clave = "", $direccionOficina = "", $telefono = "", $domicilio = 0) {
        parent::__construct($id, $nombre, $apellido, $correo, $clave);
        $this->direccionOficina = $direccionOficina;
        $this->telefono = $telefono;
        $this->domicilio = $domicilio;
    }

    public function getDireccionOficina() {
        return $this->direccionOficina;
    }

    public function getTelefono() {
        return $this->telefono;
    }

    public function getDomicilio() {
        return $this->domicilio;
    }

    public function setDireccionOficina($direccionOficina) {
        $this->direccionOficina = $direccionOficina;
    }

    public function setTelefono($telefono) {
        $this->telefono = $telefono;
    }

    public function setDomicilio($domicilio) {
        $this->domicilio = $domicilio;
    }

    public function autenticar() {
    $conexion = new Conexion();
    $conexion->abrir();
    $colaboradorDAO = new ColaboradorDAO($this->id, $this->nombre, $this->correo, $this->clave, "", "", 0);
    $conexion->ejecutar($colaboradorDAO->autenticar());

    if ($conexion->filas() == 0) {
        $conexion->cerrar();
        return 0; // Colaborador no encontrado
    } else {
        $registro = $conexion->registro();
        if ($registro[1] == 0) {
            $conexion->cerrar();
            return 2; // Inactivo (si lo implementas más adelante)
        } else {
            $this->id = $registro[0];
            $conexion->cerrar();
            return 1; // Autenticado correctamente
        }
    }
}

}
?>
