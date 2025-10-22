<?php
// dashboard_user.php (corregido y robusto)
error_reporting(E_ALL);
ini_set('display_errors', 1);
session_start();

// conectar BD
require_once "db.php"; // asegúrate que en db.php la variable de conexión es $conn

// --- validación de rol (acepta varias formas: 'rol'='user' | 'usuario' | 'user' como texto o rol_id==2) ---
$hasAccess = false;
if (isset($_SESSION['rol']) && in_array((string)$_SESSION['rol'], ['user','usuario','2','2'])) $hasAccess = true;
if (isset($_SESSION['rol_id']) && (int)$_SESSION['rol_id'] === 2) $hasAccess = true;
// también permitir si rol literal es 'user'
if (!$hasAccess) {
    header("Location: login.php");
    exit();
}

// --- obtener id de usuario con varias opciones ---
$id_usuario = null;
if (isset($_SESSION['id_usuario'])) {
    $id_usuario = (int) $_SESSION['id_usuario'];
} elseif (isset($_SESSION['id'])) {
    $id_usuario = (int) $_SESSION['id'];
} elseif (isset($_SESSION['usuario'])) {
    // buscar id por nombre de usuario
    if (!isset($conn)) {
        // Si no hay conexión, forzar salida
        session_destroy();
        header("Location: login.php");
        exit();
    }
    $sqlu = "SELECT id FROM usuarios WHERE usuario = ? LIMIT 1";
    $stmtu = $conn->prepare($sqlu);
    if ($stmtu) {
        $stmtu->bind_param("s", $_SESSION['usuario']);
        $stmtu->execute();
        $resu = $stmtu->get_result();
        if ($rowu = $resu->fetch_assoc()) {
            $id_usuario = (int) $rowu['id'];
        }
        $stmtu->close();
    }
}

if (empty($id_usuario)) {
    // no hay id => cerrar sesión y redirigir
    session_destroy();
    header("Location: login.php");
    exit();
}

// --- obtener datos del usuario desde BD de forma segura ---
if (!isset($conn)) {
    die("Error: no hay conexión a la base de datos. Revisa db.php");
}

$sql = "SELECT id, nombre, usuario, rol FROM usuarios WHERE id = ?";
$stmt = $conn->prepare($sql);
if ($stmt === false) {
    die("Error al preparar consulta: " . $conn->error);
}
$stmt->bind_param("i", $id_usuario);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows !== 1) {
    // usuario no encontrado -> terminar sesión
    $stmt->close();
    session_destroy();
    header("Location: login.php");
    exit();
}

$usuario = $result->fetch_assoc();
$stmt->close();
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Dashboard Usuario - I.E. 7073</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background: linear-gradient(135deg, #1b4332, #2d6a4f);
            font-family: 'Segoe UI', sans-serif;
        }
        .dashboard {
            background: #fff;
            border-radius: 20px;
            padding: 40px;
            margin-top: 40px;
            box-shadow: 0 8px 20px rgba(0,0,0,0.2);
        }
        .card-option {
            background: #d8f3dc;
            border: none;
            border-radius: 15px;
            transition: 0.3s;
        }
        .card-option:hover {
            transform: translateY(-5px);
            background: #b7e4c7;
        }
        .card-option h5 {
            color: #1b4332;
        }
        .logout-btn {
            background: #1b4332;
            color: #fff;
            border-radius: 25px;
            padding: 10px 20px;
        }
        .logout-btn:hover {
            background: #14532d;
            color: #fff;
        }
    </style>
</head>
<body>
    <div class="container dashboard text-center">
        <img src="img/insignia.jpg" width="80" class="mb-3" alt="Logo">
        <h2 class="fw-bold text-success">I.E. 7073</h2>
        <p class="text-muted">Santa Rosa de Lima - Panel del Estudiante</p>
        
        <h5 class="mb-4">Bienvenido <span class="text-success fw-bold"><?= htmlspecialchars($usuario['nombre'] ?? $usuario['usuario']) ?></span> 👋</h5>

        <div class="row g-4">
            <!-- Perfil -->
            <div class="col-md-6">
                <div class="card card-option p-3 shadow-sm">
                    <h5>Mi Perfil</h5>
                    <p>Ver y actualizar tus datos personales</p>
                    <button class="btn btn-success btn-sm" data-bs-toggle="modal" data-bs-target="#perfilModal">Abrir</button>
                </div>
            </div>

            <!-- Consultas -->
            <div class="col-md-6">
                <div class="card card-option p-3 shadow-sm">
                    <h5>Consultas</h5>
                    <p>Accede a tus matrículas, notas y más</p>
                    <button class="btn btn-success btn-sm" data-bs-toggle="modal" data-bs-target="#consultasModal">Abrir</button>
                </div>
            </div>
        </div>

        <div class="mt-4">
            <a href="logout.php" class="btn logout-btn">Cerrar Sesión</a>
        </div>
    </div>

    <!-- Modal Perfil -->
    <div class="modal fade" id="perfilModal" tabindex="-1" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
          <form action="actualizar_perfil.php" method="POST">
            <div class="modal-header">
              <h5 class="modal-title">Mi Perfil</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Cerrar"></button>
            </div>
            <div class="modal-body">
                <input type="hidden" name="id" value="<?= htmlspecialchars($usuario['id']) ?>">
                <div class="mb-3">
                    <label>Nombre</label>
                    <input type="text" name="nombre" class="form-control" value="<?= htmlspecialchars($usuario['nombre']) ?>" required>
                </div>
                <div class="mb-3">
                    <label>Usuario</label>
                    <input type="text" name="usuario" class="form-control" value="<?= htmlspecialchars($usuario['usuario']) ?>" required>
                </div>
                <div class="mb-3">
                    <label>Contraseña</label>
                    <input type="password" name="password" class="form-control" placeholder="Dejar vacío para no cambiar">
                    <small class="text-muted">Déjalo vacío si no deseas cambiarla.</small>
                </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
              <button type="submit" class="btn btn-success">Guardar cambios</button>
            </div>
          </form>
        </div>
      </div>
    </div>

    <!-- Modal Consultas -->
    <div class="modal fade" id="consultasModal" tabindex="-1" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title">Consultas</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Cerrar"></button>
          </div>
          <div class="modal-body">
            <ul class="list-group">
              <li class="list-group-item">
                <a href="seguimiento.php" class="text-success">🔎 Seguimiento de Matrícula</a>
              </li>
              <li class="list-group-item">
                <a href="matricula.php" class="text-success">📝 Matrícula</a>
              </li>
              <li class="list-group-item">
                <a href="info_academica.php" class="text-success">📚 Información Académica</a>
              </li>
            </ul>
          </div>
        </div>
      </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>