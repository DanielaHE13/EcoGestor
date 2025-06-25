<?php
require_once("persistencia/Conexion.php");
require_once("persistencia/ColaboradorDAO.php");
require_once("logica/Persona.php");

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

    // Getters
    public function getDireccionOficina() { return $this->direccionOficina; }
    public function getTelefono() { return $this->telefono; }
    public function getDomicilio() { return $this->domicilio; }

    // Setters
    public function setDireccionOficina($direccionOficina) { $this->direccionOficina = $direccionOficina; }
    public function setTelefono($telefono) { $this->telefono = $telefono; }
    public function setDomicilio($domicilio) { $this->domicilio = $domicilio; }


    public function consultar() {
        $conexion = new Conexion();
        $colaboradorDAO = new ColaboradorDAO($this->id);
        $conexion->abrir();
        $conexion->ejecutar($colaboradorDAO->consultar());
        $datos = $conexion->registro();
        if ($datos) {
            $this->nombre = $datos[0];
            $this->correo = $datos[1];
            $this->direccionOficina = $datos[2];
            $this->telefono = $datos[3];
            $this->domicilio = $datos[4];
        }
        $conexion->cerrar();
    }

    public static function buscar($filtro) {
        $conexion = new Conexion();
        $colaboradorDAO = new ColaboradorDAO();
        $conexion->abrir();
        $conexion->ejecutar($colaboradorDAO->buscar($filtro));
        $colaboradores = array();

        while ($registro = $conexion->registro()) {
            $colaborador = new Colaborador($registro[0], $registro[1], "", $registro[2]);
            array_push($colaboradores, $colaborador);
        }

        $conexion->cerrar();
        return $colaboradores;
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
            if (is_array($registro) && isset($registro[1]) && $registro[1] == 0) {
                $conexion->cerrar();
                return 2; // Inactivo (si lo implementas más adelante)
            } else {
                $this->id = isset($registro[0]) ? $registro[0] : $this->id;
                $conexion->cerrar();
                return 1; // Autenticado correctamente
            }
        }
    }

    public function actualizar() {
        $conexion = new Conexion();
        $conexion->abrir();
        // Si la clave está vacía, no la actualices
        $claveParaActualizar = isset($this->clave) ? trim($this->clave) : "";
        $colaboradorDAO = new ColaboradorDAO(
            $this->id,
            $this->nombre,
            $this->correo,
            $claveParaActualizar, // Solo se actualizará si no está vacía
            $this->direccionOficina,
            $this->telefono,
            $this->domicilio
        );
        $exito = $conexion->ejecutar($colaboradorDAO->actualizar());
        $conexion->cerrar();
        return $exito;
    }
}
?>
