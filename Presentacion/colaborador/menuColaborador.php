<nav class="navbar navbar-expand-lg navbar-light" style="background-color: #a4d4ae;">
  <div class="container-fluid">
    <a class="navbar-brand fw-bold" href="?pid=<?php echo base64_encode('Presentacion/colaborador/inicioColaborador.php'); ?>">
      <i class="fas fa-recycle text-success me-2"></i>EcoGestor - Colaborador
    </a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#menuColaborador">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="menuColaborador">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">

        <li class="nav-item">
          <a class="nav-link" href="?pid=<?php echo base64_encode('Presentacion/colaborador/publicarContenido.php'); ?>">
            <i class="fas fa-bullhorn me-1"></i>Publicar Contenido
          </a>
        </li>

        <li class="nav-item">
          <a class="nav-link" href="?pid=<?php echo base64_encode('Presentacion/colaborador/gestionarPuntos.php'); ?>">
            <i class="fas fa-map-marker-alt me-1"></i>Gestionar Puntos
          </a>
        </li>

        <li class="nav-item">
          <a class="nav-link" href="?pid=<?php echo base64_encode('Presentacion/colaborador/verSolicitudes.php'); ?>">
            <i class="fas fa-inbox me-1"></i>Solicitudes de Recolección
          </a>
        </li>

        <li class="nav-item">
          <a class="nav-link" href="?pid=<?php echo base64_encode('Presentacion/colaborador/perfilC.php'); ?>">
            <i class="fas fa-user me-1"></i>Perfil
          </a>
        </li>

      </ul>
      <ul class="navbar-nav">
        <li class="nav-item">
          <!-- Botón que abre el modal de cerrar sesión -->
          <a href="#" class="btn text-white fw-bold px-4 py-2"
            style="background-color: #4caf50; border-radius: 12px;"
            data-bs-toggle="modal" data-bs-target="#modalCerrarSesion">
            <i class="fa-solid fa-right-from-bracket me-2 fa-lg"></i>Salir
          </a>

          <!-- Modal de Confirmación de Cierre de Sesión -->
          <div class="modal fade" id="modalCerrarSesion" tabindex="-1" aria-labelledby="modalCerrarSesionLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
              <div class="modal-content" style="border-radius: 20px; background-color: #e8f5e9;">

                <div class="modal-header text-white" style="background-color: #4caf50; border-top-left-radius: 20px; border-top-right-radius: 20px;">
                  <h5 class="modal-title" id="modalCerrarSesionLabel">
                    <i class="fa-solid fa-circle-exclamation me-2"></i>¿Cerrar sesión?
                  </h5>
                  <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Cerrar"></button>
                </div>

                <div class="modal-body text-center">
                  <p class="fs-5 mt-3" style="color: #2e7d32;">¿Estás segur@ de que deseas salir de EcoGestor?</p>
                </div>

                <div class="modal-footer justify-content-center">
                  <a href="index.php?sesion=false" class="btn text-white fw-bold px-4" style="background-color: #4caf50; border-radius: 12px;">
                    <i class="fa-solid fa-door-open me-2"></i> Sí, cerrar sesión
                  </a>
                  <button type="button" class="btn text-white fw-bold px-4" style="background-color: #81c784; border-radius: 12px;" data-bs-dismiss="modal">
                    Cancelar
                  </button>
                </div>

              </div>
            </div>
          </div>

        </li>
      </ul>
    </div>
  </div>
</nav>