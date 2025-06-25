<?php
if ($_SESSION["rol"] != "usuario") {
    header("Location: ?pid=" . base64_encode("Presentacion/noAutorizado.php"));
    exit;
}

require_once("Logica/Usuario.php");

$id = $_SESSION["id"];
$usuario = new Usuario($_SESSION["id"]);
$usuario->consultar();

$mensaje = "";
$alerta = "";

if (isset($_POST["actualizar"])) {
    $usuario = new Usuario($id, $_POST["nombre"], $_POST["telefono"], $_POST["nickname"], $_POST["correo"], $_POST["clave"]);
    $resultado = $usuario->actualizar();
    if ($resultado) {
        $mensaje = "Perfil actualizado correctamente.";
        $alerta = "success";
    } else {
        $mensaje = "Hubo un error al actualizar tu perfil.";
        $alerta = "danger";
    }
    $usuario->consultar(); // Refrescar datos actualizados
}

include("Presentacion/encabezado.php");
include("Presentacion/usuario/menuUsuario.php");
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
                    <p><strong>Nombre:</strong> <?php echo $usuario->getNombre(); ?></p>
                    <p><strong>Correo:</strong> <?php echo $usuario->getCorreo(); ?></p>
                    <p><strong>Nickname:</strong> <?php echo $usuario->getNickname(); ?></p>
                    <p><strong>Teléfono:</strong> <?php echo $usuario->getTelefono(); ?></p>

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
            <form method="post" action="?pid=<?php echo base64_encode("Presentacion/usuario/editarPerfilUsuario.php"); ?>">
                <div class="modal-body">
                    <div class="mb-3">
                        <label class="form-label">Nombre</label>
                        <input type="text" name="nombre" class="form-control" value="<?php echo $usuario->getNombre(); ?>" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Correo</label>
                        <input type="email" name="correo" class="form-control" value="<?php echo $usuario->getCorreo(); ?>" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Nickname</label>
                        <input type="text" name="nickname" class="form-control" value="<?php echo $usuario->getNickname(); ?>" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Contraseña</label>
                        <input type="password" name="clave" class="form-control" placeholder="••••••••" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Teléfono</label>
                        <input type="text" name="telefono" class="form-control" value="<?php echo $usuario->getTelefono(); ?>" required>
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
        background: linear-gradient(to bottom, #d0f5d8, #b2eabb); /* Verde claro degradado */
        font-family: 'Segoe UI', sans-serif;
        min-height: 100vh;
    }
</style>

<!-- Bootstrap JS (si no lo tienes ya incluido) -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
