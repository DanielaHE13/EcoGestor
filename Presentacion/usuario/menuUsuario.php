<nav class="navbar navbar-expand-lg navbar-light" style="background-color: #a4d4ae;">
  <div class="container-fluid">
    <a class="navbar-brand fw-bold" href="?pid=<?php echo base64_encode('Presentacion/usuario/inicioUsuario.php'); ?>">
      <i class="fas fa-leaf text-success me-2"></i>EcoGestor - Usuario
    </a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#menuUsuario">
      <span class="navbar-toggler-icon"></span>
    </button>
    
    <div class="collapse navbar-collapse" id="menuUsuario">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">

        <li class="nav-item">
          <a class="nav-link" href="?pid=<?php echo base64_encode('Presentacion/usuario/listarPublicaciones.php'); ?>">
            <i class="fas fa-bullhorn me-1"></i>Publicaciones
          </a>
        </li>

        <li class="nav-item">
          <a class="nav-link" href="?pid=<?php echo base64_encode('Presentacion/usuario/solicitarRecoleccion.php'); ?>">
            <i class="fas fa-recycle me-1"></i>Solicitar Recolección
          </a>
        </li>

        <li class="nav-item">
          <a class="nav-link" href="?pid=<?php echo base64_encode('Presentacion/usuario/perfil.php'); ?>">
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
