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
        // Solo actualiza la contraseña si se proporciona una nueva
        $sql = "UPDATE colaborador SET ";
        $sql .= "nombre = '" . $this->nombre . "', ";
        $sql .= "correo = '" . $this->correo . "', ";
        if (!empty($this->clave)) {
            $sql .= "contrasena = '" . md5($this->clave) . "', ";
        }
        $sql .= "direccion_oficina = '" . $this->direccionOficina . "', ";
        $sql .= "telefono = '" . $this->telefono . "', ";
        $sql .= "domicilio = '" . $this->domicilio . "' ";
        $sql .= "WHERE id = '" . $this->id . "'";
        return $sql;
    }

}