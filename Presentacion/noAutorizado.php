<?php
session_start();
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Acceso no autorizado - EcoGestor</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://unpkg.com/@lottiefiles/lottie-player@latest/dist/lottie-player.js"></script>
    <style>
        body {
            background: linear-gradient(to bottom, #d0f5d8, #b2eabb);
            font-family: 'Segoe UI', sans-serif;
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .card {
            background-color: #ffffffcc;
            border-radius: 20px;
            padding: 30px;
            text-align: center;
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.1);
            max-width: 600px;
            width: 90%;
        }

        h1 {
            color: #2e7d32;
            font-weight: bold;
        }

        p {
            font-size: 1.1rem;
            color: #388e3c;
        }

        .btn-green {
            background-color: #4caf50;
            color: white;
            border-radius: 12px;
            font-weight: bold;
            padding: 10px 20px;
            text-decoration: none;
        }

        .btn-green:hover {
            background-color: #388e3c;
            color: white;
        }
    </style>
</head>

<body>
    <div class="card">
        <div class="d-flex justify-content-center">
            <dotlottie-player src="https://lottie.host/66cfb41a-c93c-42ab-a360-e6e2510a9fa1/ZF72RAwncI.lottie"
                background="transparent" speed="1" style="width: 300px; height: 300px" loop autoplay>
            </dotlottie-player>
        </div>
        <h1>🔒 Acceso restringido</h1>
        <p>Lo sentimos, no tienes permisos para acceder a esta sección del sistema.</p>

        <a href="?pid=<?php echo base64_encode('Presentacion/login.php'); ?>" class="btn btn-green mt-3">
            Volver al inicio de sesión
        </a>
    </div>
</body>

</html>
