<?php
if ($_SESSION["rol"] != "usuario") {
    header("Location: ?pid=" . base64_encode("Presentacion/noAutorizado.php"));
    exit;
}
$id = $_SESSION["id"];
$usuario = new Usuario($id);
$usuario->consultar();
?>

<body style="background: linear-gradient(to bottom, #e1f7e7, #c3f0cd); min-height: 100vh; font-family: 'Segoe UI', sans-serif;">
    <?php
    include("Presentacion/encabezado.php");
    include("Presentacion/menuUsuario.php");
    ?>

    <div class="container mt-5">
        <div class="row justify-content-center text-center">
            <div class="col-12 col-md-10 col-lg-8 bg-white p-4 shadow rounded-4">
                <h2 class="fw-bold mb-3 text-success">
                    ¡Hola <?php echo $usuario->getNombre(); ?>! 🌱
                </h2>

                <p class="fs-5">
                    Bienvenid@ a <strong>EcoGestor</strong>, la plataforma para ciudadanos responsables con el planeta. Desde aquí puedes:
                </p>

                <ul class="list-unstyled fs-5 text-start mt-4">
                    <li>✅ Ver publicaciones educativas, campañas y eventos ambientales.</li>
                    <li>♻️ Solicitar la recolección de residuos desde tu hogar.</li>
                    <li>👥 Contactar con colaboradores ambientales verificados.</li>
                </ul>

                <div class="mt-4">
                    <a href="?pid=<?php echo base64_encode('Presentacion/usuario/listarPublicaciones.php'); ?>" class="btn btn-success me-2 mb-2 px-4">Ver Publicaciones</a>
                    <a href="?pid=<?php echo base64_encode('Presentacion/usuario/solicitarRecoleccion.php'); ?>" class="btn btn-outline-success mb-2 px-4">Solicitar Recolección</a>
                </div>
            </div>

            <div class="text-center mt-4">
                <dotlottie-player src="https://lottie.host/b3c94fd8-5a8e-438e-8e79-1c7f96f6ad5f/E7MdPxjIBV.lottie" background="transparent" speed="1" style="width: 300px; height: 300px;" loop autoplay></dotlottie-player>
            </div>
        </div>
    </div>

    <script src="https://unpkg.com/@dotlottie/player-component@2.7.12/dist/dotlottie-player.mjs" type="module"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
