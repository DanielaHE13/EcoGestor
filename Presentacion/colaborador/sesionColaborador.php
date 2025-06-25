<?php
if ($_SESSION["rol"] != "colaborador") {
    header("Location: ?pid=" . base64_encode("Presentacion/noAutorizado.php"));
    exit;
}
$id = $_SESSION["id"];
$colaborador = new Colaborador($id);
$colaborador->consultar();
?>

<body style="background: linear-gradient(to bottom, #e1f7e7, #c3f0cd); min-height: 100vh; font-family: 'Segoe UI', sans-serif;">
    <?php
    include("Presentacion/encabezado.php");
    include("Presentacion/menuColaborador.php");
    ?>

    <div class="container mt-5">
        <div class="row justify-content-center text-center">
            <div class="col-12 col-md-10 col-lg-8 bg-white p-4 shadow rounded-4">
                <h2 class="fw-bold mb-3 text-success">
                    ¡Bienvenido/a <?php echo $colaborador->getNombre(); ?>! 🌿
                </h2>

                <p class="fs-5">
                    Gracias por ser parte de <strong>EcoGestor</strong>. Como colaborador ambiental puedes:
                </p>

                <ul class="list-unstyled fs-5 text-start mt-4">
                    <li>📌 Publicar campañas, eventos y contenido educativo.</li>
                    <li>📍 Gestionar tus puntos de recolección.</li>
                    <li>📬 Ver solicitudes de recolección asignadas.</li>
                </ul>

                <div class="mt-4">
                    <a href="?pid=<?php echo base64_encode('Presentacion/colaborador/publicarContenido.php'); ?>" class="btn btn-success me-2 mb-2 px-4">Publicar Contenido</a>
                    <a href="?pid=<?php echo base64_encode('Presentacion/colaborador/gestionarPuntos.php'); ?>" class="btn btn-outline-success me-2 mb-2 px-4">Gestionar Puntos</a>
                    <a href="?pid=<?php echo base64_encode('Presentacion/colaborador/verSolicitudes.php'); ?>" class="btn btn-outline-success mb-2 px-4">Ver Solicitudes</a>
                </div>
            </div>

            <div class="text-center mt-4">
                <dotlottie-player src="https://lottie.host/6173de39-313c-46b0-b2dc-24f4a71aa083/a3RibzCkNS.lottie" background="transparent" speed="1" style="width: 300px; height: 300px;" loop autoplay></dotlottie-player>
            </div>
        </div>
    </div>

    <script src="https://unpkg.com/@dotlottie/player-component@2.7.12/dist/dotlottie-player.mjs" type="module"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
