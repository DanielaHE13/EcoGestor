<?php 
session_start();
require_once("Logica/Usuario.php");
require_once("Logica/Colaborador.php");
require_once("Logica/Residuo.php");
require_once("Logica/Publicacion.php");
require_once("Logica/SolicitudRecoleccion.php");
require_once("Logica/PuntoRecoleccion.php");
require_once("Logica/CategoriaResiduo.php");

?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EcoGestor - Gestión de Residuos</title>

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- FontAwesome -->
    <link href="https://use.fontawesome.com/releases/v6.4.0/css/all.css" rel="stylesheet">

    <!-- jQuery + Bootstrap JS -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>
<?php

$paginas_sin_autenticacion = array(
    "Presentacion/inicio.php",
    "Presentacion/autenticar.php",
    "Presentacion/noAutorizado.php"
);

$paginas_con_autenticacion = array(
    "Presentacion/usuario/sesionUsuario.php",
    "Presentacion/colaborador/sesionColaborador.php",
    "Presentacion/colaborador/menuColaborador.php",
    "Presentacion/usuario/menuUsuario.php",
    'Presentacion/usuario/perfilU.php',
    'Presentacion/colaborador/perfilC.php'
    
);

// Lógica para mostrar páginas
if (!isset($_GET["pid"])) {
    include("Presentacion/inicio.php");
} else {
    $pid = base64_decode($_GET["pid"]);

    if (in_array($pid, $paginas_sin_autenticacion)) {
        include($pid);
    } else if (in_array($pid, $paginas_con_autenticacion)) {
        if (!isset($_SESSION["id"])) {
            include("Presentacion/autenticar.php");
        } else {
            include($pid);
        }
    } else {
        echo "<div class='container mt-5'><h2>Error 404 - Página no encontrada</h2></div>";
    }
}
?>
</body>
</html>
