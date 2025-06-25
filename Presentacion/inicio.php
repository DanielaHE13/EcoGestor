<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>EcoGestor</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://use.fontawesome.com/releases/v6.4.0/css/all.css" rel="stylesheet">
  <style>
    body {
      font-family: 'Segoe UI', sans-serif;
      background: linear-gradient(to bottom, #e1f7e7, #c3f0cd);
      color: #2e5530;
    }
    .navbar {
      background-color: #a4d4ae;
    }
    .navbar-brand, .nav-link, .btn-green {
      color: #2e5530;
    }
    .btn-green {
      background-color: #4caf50;
      color: white;
      border-radius: 12px;
    }
    .btn-green:hover {
      background-color: #45a049;
    }
    .hero-panel {
      background-color: rgba(255, 255, 255, 0.6);
      padding: 40px;
      border-radius: 30px;
      box-shadow: 0 8px 25px rgba(0, 0, 0, 0.1);
    }
    .section-bg {
      background: linear-gradient(to bottom, #e1f7e7 0%, #c3f0cd 50%, #a4d4ae 100%);
    }
  </style>
</head>
<body>

<nav class="navbar navbar-expand-lg shadow-sm">
  <div class="container-fluid">
    <a class="navbar-brand fw-bold" href="#">
      <img src="img/logo.jpeg" alt="Logo" width="50" class="me-2">
      EcoGestor
    </a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav">
        <li class="nav-item"><a class="nav-link" href="#inicio">Inicio</a></li>
        <li class="nav-item"><a class="nav-link" href="#servicios">Servicios</a></li>
        <li class="nav-item"><a class="nav-link" href="#impacto">Impacto</a></li>
        <li class="nav-item"><a class="nav-link" href="#contacto">Contacto</a></li>
      </ul>
      <ul class="navbar-nav ms-auto">
        <li class="nav-item">
          <a class="nav-link" href="?pid=<?php echo base64_encode('Presentacion/registroUsuario.php'); ?>">Registrarse</a>
        </li>
        <li class="nav-item">
          <a href="?pid=<?php echo base64_encode('Presentacion/autenticar.php'); ?>" class="btn btn-green fw-semibold px-3 py-2">Iniciar Sesión</a>
        </li>
      </ul>
    </div>
  </div>
</nav>

<section id="inicio" class="section-bg py-5">
  <div class="container">
    <div class="row align-items-center text-center">
      <div class="col-md-6 hero-panel mx-auto">
        <h2 class="fw-bold">¡Haz parte del cambio ecológico!</h2>
        <p class="fs-5">Con EcoGestor podrás solicitar y ofrecer servicios de recolección de residuos de forma segura, organizada y sostenible ♻️</p>
        <a href="?pid=<?php echo base64_encode('Presentacion/autenticar.php'); ?>" class="btn btn-green px-4 py-2 mt-3">Acceder a la plataforma</a>
      </div>
    </div>
  </div>
</section>

<section id="servicios" class="py-5 bg-white">
  <div class="container">
    <h3 class="fw-bold text-center mb-4">Nuestros Servicios</h3>
    <div class="row text-center">
      <div class="col-md-4">
        <i class="fas fa-recycle fa-3x mb-3 text-success"></i>
        <h5 class="fw-bold">Recolección de Residuos</h5>
        <p>Solicita la recolección de tus residuos tecnológicos, eléctricos y electrónicos.</p>
      </div>
      <div class="col-md-4">
        <i class="fas fa-hand-holding-heart fa-3x mb-3 text-success"></i>
        <h5 class="fw-bold">Colaboradores Verificados</h5>
        <p>Aliados confiables y responsables con el medio ambiente.</p>
      </div>
      <div class="col-md-4">
        <i class="fas fa-leaf fa-3x mb-3 text-success"></i>
        <h5 class="fw-bold">Educación Ambiental</h5>
        <p>Campañas, eventos y publicaciones educativas para una cultura sostenible.</p>
      </div>
    </div>
  </div>
</section>

<section id="impacto" class="py-5 section-bg">
  <div class="container">
    <h3 class="fw-bold text-center mb-4">Nuestro Impacto</h3>
    <p class="text-center fs-5">EcoGestor conecta ciudadanos con gestores ambientales para optimizar la recolección de residuos y reducir el impacto ecológico. 🌱</p>
  </div>
</section>

<section id="contacto" class="py-5 bg-light">
  <div class="container">
    <h4 class="fw-bold text-center mb-3">Contáctanos</h4>
    <div class="d-flex justify-content-center">
      <ul class="list-unstyled text-start">
        <li><strong>📍 Dirección:</strong> Carrera 12 #34-56, Bogotá</li>
        <li><strong>📞 Teléfono:</strong> +57 320 456 7890</li>
        <li><strong>📧 Email:</strong> contacto@ecogestor.com</li>
        <li><strong>🕒 Horario:</strong> Lunes a Viernes, 9:00am – 6:00pm</li>
      </ul>
    </div>
  </div>
</section>

<footer class="text-white text-center py-3" style="background-color: #4caf50;">
  <small>&copy; 2025 EcoGestor – Todos los derechos reservados.</small>
</footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
