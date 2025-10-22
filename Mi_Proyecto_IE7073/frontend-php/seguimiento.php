<?php
require_once "db.php";

$matricula = null;
$error = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $dni = trim($_POST["dni"]);

    if (!empty($dni)) {
        $sql = "SELECT * FROM matriculas WHERE dni = ? LIMIT 1";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("s", $dni);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows == 1) {
            $matricula = $result->fetch_assoc();
        } else {
            $error = "❌ No se encontró matrícula con ese DNI.";
        }
        $stmt->close();
    } else {
        $error = "⚠️ Ingrese un DNI.";
    }
}
$conn->close();
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Seguimiento de Matrícula</title>
    <style>
        body {
            background: linear-gradient(to right, #1b4332, #2d6a4f);
            font-family: 'Segoe UI', sans-serif;
            min-height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            margin: 0;
        }

        .container {
            width: 700px;
            background: #fdfcf7;
            padding: 25px;
            border-radius: 15px;
            box-shadow: 0px 6px 18px rgba(0, 0, 0, 0.3);
        }

        h2 {
            text-align: center;
            color: #1b4332;
            margin-bottom: 20px;
        }

        label {
            font-weight: bold;
            color: #333;
            display: block;
            margin-bottom: 5px;
        }

        input {
            width: 100%;
            padding: 8px;
            margin-bottom: 15px;
            border: 1px solid #bbb;
            border-radius: 8px;
        }

        button {
            width: 100%;
            padding: 12px;
            background: #1b4332;
            color: white;
            border: none;
            border-radius: 8px;
            font-size: 16px;
            font-weight: bold;
            cursor: pointer;
        }

        button:hover {
            background: #2d6a4f;
        }

        .error {
            color: red;
            text-align: center;
            margin-bottom: 15px;
        }

        .resultado {
            margin-top: 20px;
            padding: 15px;
            border-radius: 10px;
            background: #f1f1f1;
        }

        .estado {
            font-size: 18px;
            font-weight: bold;
            padding: 10px;
            border-radius: 8px;
            text-align: center;
        }

        .pendiente {
            background: #fff3cd;
            color: #856404;
        }

        .aprobado {
            background: #d4edda;
            color: #155724;
        }

        .rechazado {
            background: #f8d7da;
            color: #721c24;
        }
    </style>
</head>

<body>
    <div class="container">
        <h2>Seguimiento de Matrícula</h2>
        <form method="POST" action="">
            <label for="dni">Ingrese su DNI</label>
            <input type="text" name="dni" id="dni" placeholder="Ejemplo: 12345678" required>
            <button type="submit">Consultar</button>
        </form>

        <?php if (!empty($error)): ?>
            <div class="error"><?= $error ?></div>
        <?php endif; ?>

        <?php if ($matricula): ?>
            <div class="resultado">
                <p><strong>Alumno:</strong>
                    <?= $matricula['nombres'] . " " . $matricula['apellido_paterno'] . " " . $matricula['apellido_materno'] ?>
                </p>
                <p><strong>Nivel:</strong> <?= $matricula['nivel'] ?> - <strong>Grado:</strong> <?= $matricula['grado'] ?> -
                    <strong>Sección:</strong> <?= $matricula['seccion'] ?></p>
                <p><strong>Apoderado:</strong> <?= $matricula['nombre_apoderado'] ?> (<?= $matricula['parentesco'] ?>)</p>
                <p><strong>Fecha de matrícula:</strong> <?= $matricula['fecha_matricula'] ?></p>
                <div class="estado <?= strtolower($matricula['estado']) ?>">
                    Estado: <?= strtoupper($matricula['estado']) ?>
                </div>
            </div>
        <?php endif; ?>
    </div>
</body>

</html>