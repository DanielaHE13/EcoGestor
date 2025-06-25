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
          <a class="nav-link" href="?pid=<?php echo base64_encode('Presentacion/colaborador/perfil.php'); ?>">
            <i class="fas fa-user me-1"></i>Perfil
          </a>
        </li>

      </ul>
      <ul class="navbar-nav">
        <li class="nav-item">
          <a href="index.php?sesion=false" class="nav-link text-danger fw-semibold">
            <i class="fas fa-sign-out-alt me-1"></i>Cerrar sesión
          </a>
        </li>
      </ul>
    </div>
  </div>
</nav>
