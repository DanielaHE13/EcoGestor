<?php
if ($_SESSION["rol"] != "colaborador") {
    header("Location: ?pid=" . base64_encode("Presentacion/noAutorizado.php"));
    exit;
}

require_once("Logica/Colaborador.php");

$id = $_SESSION["id"];
$colaborador = new Colaborador($id);
$colaborador->consultar();

$mensaje = "";
$alerta = "";

if (isset($_POST["actualizar"])) {
    // Recoge todos los campos del formulario
    $nombre = $_POST["nombre"];
    $correo = $_POST["correo"];
    $clave = $_POST["clave"];
    $telefono = $_POST["telefono"];
    $direccionOficina = $_POST["direccion_oficina"];
    $domicilio = isset($_POST["domicilio"]) ? 1 : 0;
    $colaborador = new Colaborador($id, $nombre, "", $correo, $clave, $direccionOficina, $telefono, $domicilio);
    $resultado = $colaborador->actualizar();

    if ($resultado) {
        $mensaje = "Perfil actualizado correctamente.";
        $alerta = "success";
    } else {
        $mensaje = "Hubo un error al actualizar tu perfil.";
        $alerta = "danger";
    }
    $colaborador->consultar(); // Actualizar datos en pantalla
}

include("Presentacion/encabezado.php");
include("Presentacion/colaborador/menuColaborador.php");
?>

<div class="container mt-5">
    <?php if ($mensaje): ?>
        <div class="alert alert-<?php echo $alerta; ?> text-center"><?php echo $mensaje; ?></div>
    <?php endif; ?>

    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card shadow" style="border-radius: 20px;">
                <div class="card-header bg-success text-white text-center" style="border-top-left-radius: 20px; border-top-right-radius: 20px;">
                    <h4>Mi Perfil</h4>
                </div>
                <div class="card-body">
                    <p><strong>Nombre:</strong> <?php echo $colaborador->getNombre(); ?></p>
                    <p><strong>Correo:</strong> <?php echo $colaborador->getCorreo(); ?></p>
                    <p><strong>Teléfono:</strong> <?php echo $colaborador->getTelefono(); ?></p>
                    <p><strong>Dirección oficina:</strong> <?php echo $colaborador->getDireccionOficina(); ?></p>
                    <p><strong>¿Ofrece servicio a domicilio?:</strong> <?php echo $colaborador->getDomicilio() ? 'Sí' : 'No'; ?></p>

                    <div class="text-center mt-4">
                        <button class="btn btn-outline-success px-4" data-bs-toggle="modal" data-bs-target="#modalEditarPerfil">
                            Editar Información
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Modal para edición -->
<div class="modal fade" id="modalEditarPerfil" tabindex="-1" aria-labelledby="modalEditarPerfilLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content" style="border-radius: 20px;">
            <div class="modal-header bg-success text-white" style="border-top-left-radius: 20px; border-top-right-radius: 20px;">
                <h5 class="modal-title" id="modalEditarPerfilLabel">Editar Perfil</h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Cerrar"></button>
            </div>
            <form method="post" action="">
                <div class="modal-body">
                    <div class="mb-3">
                        <label class="form-label">Nombre</label>
                        <input type="text" name="nombre" class="form-control" value="<?php echo $colaborador->getNombre(); ?>" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Correo</label>
                        <input type="email" name="correo" class="form-control" value="<?php echo $colaborador->getCorreo(); ?>" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Contraseña</label>
                        <input type="password" name="clave" class="form-control" placeholder="••••••••" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Teléfono</label>
                        <input type="text" name="telefono" class="form-control" value="<?php echo $colaborador->getTelefono(); ?>" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Dirección oficina</label>
                        <input type="text" name="direccion_oficina" class="form-control" value="<?php echo $colaborador->getDireccionOficina(); ?>">
                    </div>
                    <div class="mb-3 form-check">
                        <input type="checkbox" class="form-check-input" id="domicilio" name="domicilio" value="1" <?php if($colaborador->getDomicilio()) echo 'checked'; ?>>
                        <label class="form-check-label" for="domicilio">¿Ofrece servicio a domicilio?</label>
                    </div>
                </div>
                <div class="modal-footer justify-content-center">
                    <button type="submit" name="actualizar" class="btn btn-success px-4">Guardar Cambios</button>
                    <button type="button" class="btn btn-secondary px-4" data-bs-dismiss="modal">Cancelar</button>
                </div>
            </form>
        </div>
    </div>
</div>

<style>
    body {
        background: linear-gradient(to bottom, #d0f5d8, #b2eabb);
        font-family: 'Segoe UI', sans-serif;
        min-height: 100vh;
    }
</style>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
