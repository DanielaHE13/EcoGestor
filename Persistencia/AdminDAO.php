<?php

class AdministradorDAO {
    private $id;
    private $nombre;
    private $apellido;
    private $correo;
    private $contrasena;

    public function __construct($id = 0, $nombre = "", $apellido = "", $correo = "", $contrasena = "") {
        $this->id = $id;
        $this->nombre = $nombre;
        $this->apellido = $apellido;
        $this->correo = $correo;
        $this->contrasena = $contrasena;
    }

    public function autenticar() {
        return "SELECT id FROM administrador WHERE correo = '" . $this->correo . "' AND contrasena = '" . md5($this->contrasena) . "'";
    }

    public function consultar() {
        return "SELECT nombre, apellido, correo FROM administrador WHERE id = '" . $this->id . "'";
    }

   public function buscar($filtro) {
        return "SELECT id, nombre, correo, nickname FROM usuario WHERE nombre LIKE '%" . $filtro . "%' OR nickname LIKE '%" . $filtro . "%'";
    }
}
?>