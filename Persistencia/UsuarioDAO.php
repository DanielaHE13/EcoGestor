<?php
class UsuarioDAO {
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

    public function autenticar() {
        return "SELECT id FROM usuario WHERE correo = '" . $this->correo . "' AND contrasena = '" . md5($this->clave) . "'";
    }

    public function consultar() {
    return "SELECT nombre, correo, nickname, telefono, direccion FROM usuario WHERE id = '" . $this->id . "'";
}



    public function buscar($filtro) {
        return "SELECT id, nombre, correo, nickname FROM usuario WHERE nombre LIKE '%" . $filtro . "%' OR nickname LIKE '%" . $filtro . "%'";
    }
    public function actualizar() {
    return "UPDATE usuario SET 
                nombre = '" . $this->nombre . "',
                telefono = '" . $this->telefono . "',
                nickname = '" . $this->nickname . "',
                correo = '" . $this->correo . "',
                clave = '" . $this->clave . "'
            WHERE id = '" . $this->id . "'";
}




};

