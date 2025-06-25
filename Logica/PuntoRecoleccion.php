<?php
class PuntoRecoleccion {
    private $id;
    private $colaboradorId;
    private $direccion;
    private $latitud;
    private $longitud;
    private $estado;

    public function __construct($id = "", $colaboradorId = "", $direccion = "", $latitud = "", $longitud = "", $estado = "activo") {
        $this->id = $id;
        $this->colaboradorId = $colaboradorId;
        $this->direccion = $direccion;
        $this->latitud = $latitud;
        $this->longitud = $longitud;
        $this->estado = $estado;
    }

    public function getId() { return $this->id; }
    public function getColaboradorId() { return $this->colaboradorId; }
    public function getDireccion() { return $this->direccion; }
    public function getLatitud() { return $this->latitud; }
    public function getLongitud() { return $this->longitud; }
    public function getEstado() { return $this->estado; }

    public function setId($id) { $this->id = $id; }
    public function setColaboradorId($colaboradorId) { $this->colaboradorId = $colaboradorId; }
    public function setDireccion($direccion) { $this->direccion = $direccion; }
    public function setLatitud($latitud) { $this->latitud = $latitud; }
    public function setLongitud($longitud) { $this->longitud = $longitud; }
    public function setEstado($estado) { $this->estado = $estado; }
};
?>