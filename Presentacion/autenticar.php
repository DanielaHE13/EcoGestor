<?php


if (isset($_GET["sesion"]) && $_GET["sesion"] == "false") {
    session_destroy();
}

$error = false;

if (isset($_POST["autenticar"])) {
    require_once("Logica/Usuario.php");
    require_once("Logica/Colaborador.php");

    $correo = $_POST["correo"];
    $clave = $_POST["clave"];

    $usuario = new Usuario("", "", "", $correo, $clave);
    if ($usuario->autenticar()) {
        $_SESSION["id"] = $usuario->getId();
        $_SESSION["rol"] = "usuario";
        header("Location: ?pid=" . base64_encode("Presentacion/usuario/sesionUsuario.php"));
        exit;
    }

    $colaborador = new Colaborador("", "", "", $correo, $clave);
    if ($colaborador->autenticar()) {
        $_SESSION["id"] = $colaborador->getId();
        $_SESSION["rol"] = "colaborador";
        header("Location: ?pid=" . base64_encode("Presentacion/colaborador/sesionColaborador.php"));
        exit;
    }

    $error = true;
}
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Iniciar sesión - EcoGestor</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            font-family: 'Segoe UI', sans-serif;
            height: 100vh;
            background: linear-gradient(to bottom, #d0f5d8, #b2eabb);
            overflow: hidden;
        }

        .login-reg-panel {
            position: relative;
            top: 50%;
            transform: translateY(-50%);
            width: 80%;
            margin: auto;
            height: 450px;
            background-color: rgba(255, 255, 255, 0.8);
            border-radius: 20px;
            box-shadow: 0 8px 30px rgba(0, 0, 0, 0.15);
        }

        .white-panel {
            background-color: #ffffff;
            min-height: 600px;
            max-height: 90vh;
            overflow-y: auto;
            position: absolute;
            top: -40px;
            width: 50%;
            right: calc(50% - 50px);
            transition: 0.3s ease-in-out;
            z-index: 0;
            box-shadow: 0 4px 20px rgba(76, 175, 80, 0.2);
            border-radius: 20px;
            padding-bottom: 20px;
        }


        .right-log {
            right: 50px !important;
        }

        .login-info-box,
        .register-info-box {
            width: 30%;
            padding: 0 50px;
            top: 20%;
            position: absolute;
            text-align: left;
            color: #2e7d32;
        }

        .login-info-box {
            left: 0;
        }

        .register-info-box {
            right: 0;
        }

        .login-reg-panel input[type="radio"] {
            display: none;
        }

        .login-reg-panel #label-login,
        .login-reg-panel #label-register {
            background-color: #4caf50;
            color: white;
            padding: 8px 10px;
            border-radius: 12px;
            display: block;
            text-align: center;
            cursor: pointer;
            font-weight: bold;
            font-size: 16px;
            margin: 10px auto;
        }

        .login-show,
        .register-show {
            z-index: 1;
            display: none;
            opacity: 0;
            transition: 0.3s ease-in-out;
            color: #2e7d32;
            text-align: left;
            padding: 50px;
            font-size: 16px;
        }

        .show-log-panel {
            display: block;
            opacity: 0.95;
        }

        .btn-green {
            background-color: #4caf50;
            color: white;
            border-radius: 12px;
            padding: 10px 20px;
            font-weight: bold;
        }

        .btn-green:hover {
            background-color: #388e3c;
        }

        a {
            text-decoration: none;
            color: #388e3c;
        }
    </style>
</head>

<body>
    <div class="login-reg-panel">

        <div class="login-info-box">
            <h3>¿Ya tienes cuenta?</h3>
            <p>Inicia sesión para gestionar residuos o ver publicaciones ambientales.</p>
            <label id="label-register" for="log-reg-show">Iniciar sesión</label>
            <input type="radio" name="active-log-panel" id="log-reg-show" checked="checked">
        </div>

        <div class="register-info-box">
            <h3>¿Eres nuevo?</h3>
            <p>Regístrate como ciudadano o colaborador ambiental para empezar a transformar tu entorno.</p>
            <label id="label-login" for="log-login-show">Registrarse</label>
            <input type="radio" name="active-log-panel" id="log-login-show">
        </div>

        <div class="white-panel">
            <div class="login-show">
                <div class="text-center">
                    <h2 class="mt-1 mb-4 text-success fw-bold">Iniciar sesión</h2>
                </div>
                <form action="?pid=<?php echo base64_encode('Presentacion/autenticar.php') ?>" method="post">
                    <div class="mb-3">
                        <label for="correo" class="form-label">Correo</label>
                        <input type="email" id="correo" name="correo" class="form-control" required />
                    </div>

                    <div class="mb-3">
                        <label for="clave" class="form-label">Contraseña</label>
                        <input type="password" id="clave" name="clave" class="form-control" required />
                    </div>

                    <div class="text-center mb-4">
                        <button type="submit" class="btn btn-green" name="autenticar">Iniciar sesión</button>
                        <div class="mt-3">
                            <a href="?">Volver al inicio</a>
                        </div>
                    </div>
                </form>

                <?php if ($error): ?>
                    <div class="alert alert-danger mt-3" role="alert">Credenciales incorrectas</div>
                <?php endif; ?>
            </div>

            <div class="register-show">
                <div class="text-center">
                    <h2 class="mt-1 mb-4 text-success fw-bold">Registro</h2>
                </div>

                <form id="formRegistro" method="post">
                    <div class="mb-3">
                        <label for="nombre" class="form-label">Nombre</label>
                        <input type="text" id="nombre" name="nombre" class="form-control" required />
                    </div>

                    <div class="mb-3">
                        <label for="correoRegistro" class="form-label">Correo</label>
                        <input type="email" id="correoRegistro" name="correo" class="form-control" required />
                    </div>

                    <div class="mb-3">
                        <label for="nickname" class="form-label">Nickname</label>
                        <input type="text" id="nickname" name="nickname" class="form-control" required />
                    </div>

                    <div class="mb-3">
                        <label for="claveRegistro" class="form-label">Contraseña</label>
                        <input type="password" id="claveRegistro" name="clave" class="form-control" required />
                    </div>

                    <div class="mb-3">
                        <label for="telefono" class="form-label">Teléfono</label>
                        <input type="text" id="telefono" name="telefono" class="form-control" required />
                    </div>

                    <div class="mb-3">
                        <label for="tipo" class="form-label">Tipo de registro</label>
                        <select id="tipo" name="tipo" class="form-select" required>
                            <option value="">Selecciona tu rol</option>
                            <option value="usuario">Usuario</option>
                            <option value="colaborador">Colaborador</option>
                        </select>
                    </div>

                    <div class="text-center mb-4">
                        <button type="submit" class="btn btn-green">Registrarme</button>
                    </div>
                </form>
            </div>

            <script>
                document.getElementById("formRegistro").addEventListener("submit", function(e) {
                    e.preventDefault();

                    const tipo = document.getElementById("tipo").value;

                    if (tipo === "usuario") {
                        window.location.href = "?pid=<?php echo base64_encode('Presentacion/sesionUsuario.php'); ?>";
                    } else if (tipo === "colaborador") {
                        window.location.href = "?pid=<?php echo base64_encode('Presentacion/sesionColaborador.php'); ?>";
                    } else {
                        alert("Por favor selecciona si eres usuario o colaborador.");
                    }
                });
            </script>


        </div>
    </div>

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            document.querySelector('.login-info-box').style.display = 'none';
            document.querySelector('.login-show').classList.add('show-log-panel');
        });

        document.querySelectorAll('.login-reg-panel input[type="radio"]').forEach(radio => {
            radio.addEventListener('change', function() {
                if (document.getElementById('log-login-show').checked) {
                    document.querySelector('.register-info-box').style.display = 'none';
                    document.querySelector('.login-info-box').style.display = 'block';
                    document.querySelector('.white-panel').classList.add('right-log');
                    document.querySelector('.register-show').classList.add('show-log-panel');
                    document.querySelector('.login-show').classList.remove('show-log-panel');
                } else {
                    document.querySelector('.register-info-box').style.display = 'block';
                    document.querySelector('.login-info-box').style.display = 'none';
                    document.querySelector('.white-panel').classList.remove('right-log');
                    document.querySelector('.login-show').classList.add('show-log-panel');
                    document.querySelector('.register-show').classList.remove('show-log-panel');
                }
            });
        });
    </script>
</body>

</html>