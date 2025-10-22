<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
session_start();
// require_once "db.php"; // Ya no necesitamos la conexión a BD aquí

$error = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $usuario = trim($_POST["usuario"]);
    $password = trim($_POST["password"]);

    if (!empty($usuario) && !empty($password)) {
        
        // --- INICIO DE CAMBIO A MICROSERVICIO ---

        // 1. Preparar datos para Java
        $data = json_encode(['usuario' => $usuario, 'password' => $password]);

        // 2. Llamar al microservicio de Java (corriendo en puerto 8081)
        $ch = curl_init('http://localhost:8081/api/auth/login');
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
        curl_setopt($ch, CURLOPT_HTTPHEADER, [
            'Content-Type: application/json',
            'Content-Length: ' . strlen($data)
        ]);
        // Para depurar si cURL no puede conectarse
        curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 10);

        $responseJson = curl_exec($ch);
        
        // Verificación de errores de cURL (ej. si no se puede conectar al puerto 8081)
        if (curl_errno($ch)) {
            $error = 'Error de cURL: ' . curl_error($ch) . ' (¿Está el servicio de Java corriendo en el puerto 8081?)';
        } else {
            $httpcode = curl_getinfo($ch, CURLINFO_HTTP_CODE); // Obtener el código de estado
            $response = json_decode($responseJson, true);

            // 3. Interpretar la respuesta de Java
            if ($httpcode == 200) { // 200 = OK (Login exitoso)
                // Guardar sesión
                // Usamos los datos que nos devolvió el servicio de Java
                $_SESSION["id_usuario"] = null; 
                $_SESSION["usuario"] = $usuario;
                $_SESSION["nombre"] = $response["nombre"];
                $_SESSION["rol_id"] = $response["rol"];

                // Redirigir por rol
                if ($response["rol"] == 1) {
                    header("Location: dashboard.php"); // admin
                    exit;
                } else {
                    header("Location: dashboard_user.php"); // usuario normal
                    exit;
                }
            } else {
                // Hubo un error (401, 404, etc.)
                $error = "❌ " . ($response['mensaje'] ?? "Error desconocido. Código: $httpcode");
            }
        }
        curl_close($ch);
        
        // --- FIN DE CAMBIO A MICROSERVICIO ---

    } else {
        $error = "⚠️ Completa todos los campos.";
    }
}
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - I.E. 7073 Santa Rosa de Lima</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background: linear-gradient(to right, #1b4332, #2d6a4f);
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        .login-card {
            max-width: 400px;
            margin: auto;
            margin-top: 8%;
            padding: 2rem;
            border-radius: 15px;
            box-shadow: 0px 8px 20px rgba(0, 0, 0, 0.3);
            background-color: #fdfcf7;
        }

        .school-header {
            text-align: center;
            margin-bottom: 1.5rem;
        }

        .school-header h2 {
            color: #1b4332;
            font-weight: bold;
        }

        .btn-custom {
            background-color: #1b4332;
            color: #fdfcf7;
            border: none;
        }

        .btn-custom:hover {
            background-color: #2d6a4f;
        }
    </style>
</head>

<body>

    <div class="login-card">
        <div class="school-header">
            <img src="https://cdn-icons-png.flaticon.com/512/3135/3135755.png" width="70" alt="logo"><br>
            <h2>I.E. 7073</h2>
            <p class="text-muted">Santa Rosa de Lima</p>
        </div>

        <?php if (!empty($error)): ?>
            <div class="alert alert-danger py-2"><?= $error ?></div>
        <?php endif; ?>

        <form method="POST" action="">
            <div class="mb-3">
                <label for="usuario" class="form-label">Usuario</label>
                <input type="text" class="form-control" id="usuario" name="usuario" placeholder="user1" required>
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Contraseña</label>
                <input type="password" class="form-control" id="password" name="password" placeholder="********"
                    required>
            </div>
            <button type="submit" name="ingresar" class="btn btn-custom w-100">Ingresar</button>
        </form>
        <div class="extra text-center mt-3">
            <p>¿No tienes cuenta? <a href="registrar.php">Regístrate</a></p>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>