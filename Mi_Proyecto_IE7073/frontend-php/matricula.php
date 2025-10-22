<?php
session_start();
// require_once "db.php"; // Ya no se usa la BD directamente

// Solo usuarios logueados (rol_id = 2, estudiantes) pueden matricularse
if (!isset($_SESSION['usuario']) || $_SESSION['rol_id'] != 2) {
    header("Location: login.php");
    exit();
}

$mensaje = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    // 1. Recolectar todos los datos del formulario
    // Asegúrate de que los nombres en Java (ej. 'apellidoPaterno') coincidan
    $datosMatricula = [
        'dni' => $_POST['dni'],
        'apellidoPaterno' => $_POST['apellido_paterno'],
        'apellidoMaterno' => $_POST['apellido_materno'],
        'nombres' => $_POST['nombres'],
        'fechaNacimiento' => $_POST['fecha_nacimiento'],
        'genero' => $_POST['genero'],
        'direccion' => $_POST['direccion'],
        'telefono' => $_POST['telefono'],
        'correo' => $_POST['correo'],
        'nivel' => $_POST['nivel'],
        'grado' => $_POST['grado'],
        'seccion' => $_POST['seccion'],
        'dniApoderado' => $_POST['dni_apoderado'],
        'nombreApoderado' => $_POST['nombre_apoderado'],
        'telefonoApoderado' => $_POST['telefono_apoderado'],
        'correoApoderado' => $_POST['correo_apoderado'],
        'parentesco' => $_POST['parentesco']
    ];

    // --- INICIO DE CAMBIO A MICROSERVICIO ---

    // 2. Convertir a JSON
    $jsonData = json_encode($datosMatricula);

    // 3. Llamar al microservicio de Java (en puerto 8081)
    $ch = curl_init('http://localhost:8081/api/matriculas/registrar');
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
    curl_setopt($ch, CURLOPT_POSTFIELDS, $jsonData);
    curl_setopt($ch, CURLOPT_HTTPHEADER, [
        'Content-Type: application/json',
        'Content-Length: ' . strlen($jsonData)
    ]);
    curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 10); // Timeout

    $responseJson = curl_exec($ch);

    // Verificación de errores de cURL
    if (curl_errno($ch)) {
        $mensaje = 'Error de cURL: ' . curl_error($ch) . ' (¿Servicio de Java en puerto 8081 está activo?)';
    } else {
        $httpcode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        $response = json_decode($responseJson, true);

        // 4. Interpretar respuesta
        if ($httpcode == 201) { // 201 = Creado (Éxito)
            $mensaje = "✅ " . ($response['mensaje'] ?? "Matrícula registrada con éxito.");
        } else {
            // Error (ej. 409 - Conflicto/DNI duplicado)
            $mensaje = "❌ " . ($response['mensaje'] ?? "Error desconocido al registrar. Código: $httpcode");
        }
    }
    curl_close($ch);
    
    // --- FIN DE CAMBIO A MICROSERVICIO ---
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Matrícula - I.E. 7073</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background: linear-gradient(to right, #1b4332, #2d6a4f);
            font-family: 'Segoe UI', sans-serif;
        }
        .container {
            max-width: 900px;
            background: #fdfcf7;
            margin-top: 30px;
            margin-bottom: 30px; /* Añadido para que no pegue con el footer */
            padding: 30px;
            border-radius: 15px;
            box-shadow: 0px 6px 18px rgba(0,0,0,0.3);
        }
        h2 {
            color: #1b4332;
            font-weight: bold;
            margin-bottom: 20px;
        }
        .btn-custom {
            background: #1b4332;
            color: #fff;
        }
        .btn-custom:hover {
            background: #2d6a4f;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2 class="text-center">📌 Formulario de Matrícula</h2>
        <p class="text-center text-muted">I.E. 7073 Santa Rosa de Lima</p>

        <?php if (!empty($mensaje)): ?>
            <div class="alert <?= strpos($mensaje, '✅') !== false ? 'alert-success' : 'alert-danger' ?>">
                <?= htmlspecialchars($mensaje) ?>
            </div>
        <?php endif; ?>

        <form method="POST">
            <h5 class="text-success">Datos del Estudiante</h5>
            <div class="row">
                <div class="col-md-4 mb-3">
                    <label>DNI</label>
                    <input type="text" name="dni" class="form-control" required>
                </div>
                <div class="col-md-4 mb-3">
                    <label>Apellido Paterno</label>
                    <input type="text" name="apellido_paterno" class="form-control" required>
                </div>
                <div class="col-md-4 mb-3">
                    <label>Apellido Materno</label>
                    <input type="text" name="apellido_materno" class="form-control" required>
                </div>
                <div class="col-md-6 mb-3">
                    <label>Nombres</label>
                    <input type="text" name="nombres" class="form-control" required>
                </div>
                <div class="col-md-6 mb-3">
                    <label>Fecha de Nacimiento</label>
                    <input type="date" name="fecha_nacimiento" class="form-control" required>
                </div>
                <div class="col-md-4 mb-3">
                    <label>Genero</label>
                    <select name="genero" class="form-select" required>
                        <option value="">Seleccionar</option>
                        <option value="Masculino">Masculino</option>
                        <option value="Femenino">Femenino</option>
                    </select>
                </div>
                <div class="col-md-12 mb-3">
                    <label>Dirección</label>
                    <input type="text" name="direccion" class="form-control" required>
                </div>
                <div class="col-md-6 mb-3">
                    <label>Teléfono</label>
                    <input type="text" name="telefono" class="form-control">
                </div>
                <div class="col-md-6 mb-3">
                    <label>Correo</label>
                    <input type="email" name="correo" class="form-control">
                </div>
            </div>

            <h5 class="text-success">Información Académica</h5>
            <div class="row">
                <div class="col-md-4 mb-3">
                    <label>Nivel</label>
                    <select name="nivel" class="form-select" required>
                        <option value="">Seleccionar</Voption>
                        <option value="Inicial">Inicial</option>
                        <option value="Primaria">Primaria</option>
                        <option value="Secundaria">Secundaria</option>
                    </select>
                </div>
                <div class="col-md-4 mb-3">
                    <label>Grado</label>
                    <input type="text" name="grado" class="form-control" required>
                </div>
                <div class="col-md-4 mb-3">
                    <label>Sección</label>
                    <input type="text" name="seccion" class="form-control" required>
                </div>
            </div>

            <h5 class="text-success">Datos del Apoderado</h5>
            <div class="row">
                <div class="col-md-4 mb-3">
                    <label>DNI Apoderado</label>
                    <input type="text" name="dni_apoderado" class="form-control" required>
                </div>
                <div class="col-md-8 mb-3">
                    <label>Nombre Apoderado</label>
                    <input type="text" name="nombre_apoderado" class="form-control" required>
                </div>
                <div class="col-md-6 mb-3">
                    <label>Teléfono Apoderado</label>
                    <input type="text" name="telefono_apoderado" class="form-control">
                </div>
                <div class="col-md-6 mb-3">
                    <label>Correo Apoderado</label>
                    <input type="email" name="correo_apoderado" class="form-control">
                </div>
                <div class="col-md-12 mb-3">
                    <label>Parentesco</label>
                    <input type="text" name="parentesco" class="form-control" required>
                </div>
            </div>

            <div class="text-center">
                <button type="submit" class="btn btn-custom">Registrar Matrícula</button>
            </div>
        </form>
    </div>
</body>
</html>