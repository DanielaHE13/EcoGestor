<?php
require_once 'Persona.php';

class Usuario extends Persona {
    private $nickname;
    private $telefono;
    private $direccion;

    public function __construct($id = "", $nombre = "", $apellido = "", $correo = "", $clave = "", $nickname = "", $telefono = "", $direccion = "") {
        parent::__construct($id, $nombre, $apellido, $correo, $clave);
        $this->nickname = $nickname;
        $this->telefono = $telefono;
        $this->direccion = $direccion;
    }

    public function getNickname() {
        return $this->nickname;
    }

    public function getTelefono() {
        return $this->telefono;
    }

    public function getDireccion() {
        return $this->direccion;
    }

    public function setNickname($nickname) {
        $this->nickname = $nickname;
    }

    public function setTelefono($telefono) {
        $this->telefono = $telefono;
    }

    public function setDireccion($direccion) {
        $this->direccion = $direccion;
    }
}
?>
