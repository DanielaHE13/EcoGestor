<?php
class SolicitudRecoleccion {
    private $id;
    private $usuarioId;
    private $residuoId;
    private $colaboradorId;
    private $direccion;
    private $fechaSolicitud;
    private $fechaProgramada;
    private $estado;

    public function __construct($id = "", $usuarioId = "", $residuoId = "", $colaboradorId = "", $direccion = "", $fechaSolicitud = "", $fechaProgramada = "", $estado = "pendiente") {
        $this->id = $id;
        $this->usuarioId = $usuarioId;
        $this->residuoId = $residuoId;
        $this->colaboradorId = $colaboradorId;
        $this->direccion = $direccion;
        $this->fechaSolicitud = $fechaSolicitud;
        $this->fechaProgramada = $fechaProgramada;
        $this->estado = $estado;
    }

    public function getId() { return $this->id; }
    public function getUsuarioId() { return $this->usuarioId; }
    public function getResiduoId() { return $this->residuoId; }
    public function getColaboradorId() { return $this->colaboradorId; }
    public function getDireccion() { return $this->direccion; }
    public function getFechaSolicitud() { return $this->fechaSolicitud; }
    public function getFechaProgramada() { return $this->fechaProgramada; }
    public function getEstado() { return $this->estado; }

    public function setId($id) { $this->id = $id; }
    public function setUsuarioId($usuarioId) { $this->usuarioId = $usuarioId; }
    public function setResiduoId($residuoId) { $this->residuoId = $residuoId; }
    public function setColaboradorId($colaboradorId) { $this->colaboradorId = $colaboradorId; }
    public function setDireccion($direccion) { $this->direccion = $direccion; }
    public function setFechaSolicitud($fechaSolicitud) { $this->fechaSolicitud = $fechaSolicitud; }
    public function setFechaProgramada($fechaProgramada) { $this->fechaProgramada = $fechaProgramada; }
    public function setEstado($estado) { $this->estado = $estado; }
}
