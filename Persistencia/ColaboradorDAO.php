<?php

class ColaboradorDAO {
    private $id;
    private $nombre;
    private $correo;
    private $clave;
    private $direccionOficina;
    private $telefono;
    private $domicilio;

    public function __construct($id = 0, $nombre = "", $correo = "", $clave = "", $direccionOficina = "", $telefono = "", $domicilio = 0) {
        $this->id = $id;
        $this->nombre = $nombre;
        $this->correo = $correo;
        $this->clave = $clave;
        $this->direccionOficina = $direccionOficina;
        $this->telefono = $telefono;
        $this->domicilio = $domicilio;
    }

    public function autenticar() {
        return "SELECT id FROM colaborador WHERE correo = '" . $this->correo . "' AND contrasena = '" . md5($this->clave) . "'";
    }

    public function consultar() {
        return "SELECT nombre, correo, direccion_oficina, telefono, domicilio FROM colaborador WHERE id = '" . $this->id . "'";
    }

    public function buscar($filtro) {
        return "SELECT id, nombre, correo FROM colaborador WHERE nombre LIKE '%" . $filtro . "%' OR correo LIKE '%" . $filtro . "%'";
    }

    public function actualizar() {
        return "UPDATE colaborador SET 
                    nombre = '" . $this->nombre . "',
                    correo = '" . $this->correo . "',
                    contrasena = '" . md5($this->clave) . "',
                    direccion_oficina = '" . $this->direccionOficina . "',
                    telefono = '" . $this->telefono . "',
                    domicilio = '" . $this->domicilio . "'
                WHERE id = '" . $this->id . "'";
    }

}