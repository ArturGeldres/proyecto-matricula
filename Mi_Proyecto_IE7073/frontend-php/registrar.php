<?php
session_start();
require_once "db.php"; // Conexión a la BD

$error = '';
$success = '';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre = trim($_POST['nombre']);
    $usuario = trim($_POST['usuario']);
    $password = trim($_POST['password']);
    $confirm_password = trim($_POST['confirm_password']);

    // Validar campos vacíos
    if (empty($nombre) || empty($usuario) || empty($password) || empty($confirm_password)) {
        $error = "Todos los campos son obligatorios.";
    } elseif ($password !== $confirm_password) {
        $error = "Las contraseñas no coinciden.";
    } else {
        // Revisar si usuario ya existe
        $stmt = $conn->prepare("SELECT id FROM usuarios WHERE usuario = ?");
        $stmt->bind_param("s", $usuario);
        $stmt->execute();
        $stmt->store_result();
        if ($stmt->num_rows > 0) {
            $error = "El usuario ya existe. Elige otro.";
        } else {
            // Crear usuario con rol = 2 (usuario normal/padre)
            $hashed_password = password_hash($password, PASSWORD_DEFAULT);
            $rol = 2;
            $stmt_insert = $conn->prepare("INSERT INTO usuarios (nombre, usuario, password, rol) VALUES (?, ?, ?, ?)");
            $stmt_insert->bind_param("sssi", $nombre, $usuario, $hashed_password, $rol);
            if ($stmt_insert->execute()) {
                $success = "Usuario registrado correctamente. Ahora puedes iniciar sesión.";
            } else {
                $error = "Error al registrar el usuario. Intenta nuevamente.";
            }
            $stmt_insert->close();
        }
        $stmt->close();
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Registrar - I.E. 7073 Santa Rosa de Lima</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
<style>
body {
    background: linear-gradient(to right, #1b4332, #2d6a4f);
    font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    min-height: 100vh;
}
.register-card {
    max-width: 400px;
    margin: auto;
    margin-top: 8%;
    padding: 2rem;
    border-radius: 15px;
    box-shadow: 0px 8px 20px rgba(0,0,0,0.3);
    background-color: #fdfcf7;
}
.header {
    text-align: center;
    margin-bottom: 1.5rem;
}
.header h2 {
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
.alert-msg {
    text-align: center;
    margin-bottom: 1rem;
}
</style>
</head>
<body>

<div class="register-card">
    <div class="header">
        <img src="https://cdn-icons-png.flaticon.com/512/3135/3135755.png" width="70" alt="logo"><br>
        <h2>Registro</h2>
        <p class="text-muted">I.E. 7073 Santa Rosa de Lima</p>
    </div>

    <?php if(!empty($error)): ?>
        <div class="alert alert-danger alert-msg"><?= $error ?></div>
    <?php endif; ?>
    <?php if(!empty($success)): ?>
        <div class="alert alert-success alert-msg"><?= $success ?></div>
    <?php endif; ?>

    <form method="POST" action="">
        <div class="mb-3">
            <label for="nombre" class="form-label">Nombre completo</label>
            <input type="text" class="form-control" id="nombre" name="nombre" placeholder="Juan Pérez" required>
        </div>
        <div class="mb-3">
            <label for="usuario" class="form-label">Usuario</label>
            <input type="text" class="form-control" id="usuario" name="usuario" placeholder="juan123" required>
        </div>
        <div class="mb-3">
            <label for="password" class="form-label">Contraseña</label>
            <input type="password" class="form-control" id="password" name="password" placeholder="********" required>
        </div>
        <div class="mb-3">
            <label for="confirm_password" class="form-label">Confirmar Contraseña</label>
            <input type="password" class="form-control" id="confirm_password" name="confirm_password" placeholder="********" required>
        </div>
        <button type="submit" class="btn btn-custom w-100">Registrar</button>
    </form>

    <div class="text-center mt-3">
        <p>¿Ya tienes cuenta? <a href="login.php">Inicia sesión</a></p>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>