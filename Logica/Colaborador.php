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
}
?>
