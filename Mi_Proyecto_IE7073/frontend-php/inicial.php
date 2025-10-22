<?php
// inicial.php
require 'db.php';

// Docentes Nivel Inicial
$sqlDocentes = "SELECT DNI, NOMBRES, APELLIDOS, NIVEL, `CURSO/ESPECIALIDAD` FROM docentes WHERE NIVEL='Inicial'";
$resDocentes = $conn->query($sqlDocentes);
if (!$resDocentes)
    die("Error en consulta docentes: " . $conn->error);

// Grados y Secciones de alumnos Nivel Inicial
$sqlGrados = "SELECT DISTINCT GRADO, SECCION FROM alumnos WHERE NIVEL='Inicial' ORDER BY GRADO, SECCION";
$resGrados = $conn->query($sqlGrados);
$grados = [];
$secciones = [];
if ($resGrados && $resGrados->num_rows > 0) {
    while ($row = $resGrados->fetch_assoc()) {
        $grados[] = $row['GRADO'];
        $secciones[] = $row['SECCION'];
    }
    $grados = array_unique($grados);
    sort($grados);
    $secciones = array_unique($secciones);
    sort($secciones);
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nivel Inicial - I.E. 7073</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/dataTables.bootstrap5.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.4.1/css/buttons.bootstrap5.min.css">
    <style>
        body {
            font-family: 'Montserrat', sans-serif;
            background: linear-gradient(120deg, #e9f5ec 0%, #f8fafc 100%);
        }

        header {
            background-color: #1b4332;
            color: white;
            position: sticky;
            top: 0;
            z-index: 1030;
            box-shadow: 0 2px 8px rgba(27, 67, 50, 0.2);
        }

        header h4 {
            margin: 0;
        }

        h1,
        h3 {
            color: #1b4332;
            font-weight: 700;
        }

        h3 {
            border-left: 6px solid #bfa14a;
            padding-left: 14px;
            margin-top: 30px;
        }

        .table thead {
            background: #1b4332;
            color: #fff;
        }

        .table {
            background: #fff;
            border-radius: 12px;
            box-shadow: 0 4px 24px rgba(27, 67, 50, 0.10);
        }

        .btn-custom {
            background-color: #1b4332;
            color: white;
            border-radius: 25px;
            font-weight: 600;
            border: none;
            transition: 0.3s;
        }

        .btn-custom:hover {
            background-color: #14532d;
            transform: translateY(-2px) scale(1.03);
        }

        .form-select {
            border-radius: 25px;
            border: 2px solid #bfa14a;
        }

        footer {
            background: #1b4332;
            color: white;
            text-align: center;
            padding: 22px 0 10px 0;
            margin-top: 40px;
            font-size: 1rem;
            letter-spacing: 1px;
        }
    </style>
</head>

<body>
    <div class="container mt-4">

        <!-- Header -->
        <header class="py-3 text-center">
            <h4>Nivel Inicial - I.E. 7073 "Santa Rosa de Lima"</h4>
        </header>

        <!-- Tabla Docentes -->
        <h3>Docentes Nivel Inicial</h3>
        <table id="docentesTabla" class="table table-striped table-bordered">
            <thead>
                <tr>
                    <th>DNI</th>
                    <th>Nombres</th>
                    <th>Apellidos</th>
                    <th>Nivel</th>
                    <th>Curso/Especialidad</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($row = $resDocentes->fetch_assoc()): ?>
                    <tr>
                        <td><?= $row['DNI'] ?></td>
                        <td><?= $row['NOMBRES'] ?></td>
                        <td><?= $row['APELLIDOS'] ?></td>
                        <td><?= $row['NIVEL'] ?></td>
                        <td><?= $row['CURSO/ESPECIALIDAD'] ?></td>
                    </tr>
                <?php endwhile; ?>
            </tbody>
        </table>

        <!-- Filtros -->
        <h3>Alumnos por Aula</h3>
        <div class="row mb-3">
            <div class="col-md-3">
                <label for="gradoFiltro" class="form-label">Grado</label>
                <select id="gradoFiltro" class="form-select">
                    <option value="">Todos</option>
                    <?php foreach ($grados as $g)
                        echo "<option value='$g'>$g</option>"; ?>
                </select>
            </div>
            <div class="col-md-3">
                <label for="seccionFiltro" class="form-label">Sección</label>
                <select id="seccionFiltro" class="form-select">
                    <option value="">Todas</option>
                    <?php foreach ($secciones as $s)
                        echo "<option value='$s'>$s</option>"; ?>
                </select>
            </div>
            <div class="col-md-3 align-self-end">
                <button id="filtrarBtn" class="btn btn-custom mt-2">Generar Tabla</button>
            </div>
        </div>

        <!-- Tabla Alumnos -->
        <table id="alumnosTabla" class="table table-striped table-bordered">
            <thead>
                <tr>
                    <th>DNI</th>
                    <th>Nombres</th>
                    <th>Apellidos</th>
                    <th>Grado</th>
                    <th>Sección</th>
                </tr>
            </thead>
            <tbody></tbody>
        </table>

    </div>

    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/dataTables.bootstrap5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.4.1/js/dataTables.buttons.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.4.1/js/buttons.bootstrap5.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.10.1/jszip.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/pdfmake.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/vfs_fonts.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.4.1/js/buttons.html5.min.js"></script>

    <script>
        $(document).ready(function () {
            var alumnosTable = $('#alumnosTabla').DataTable({
                dom: 'Bfrtip',
                buttons: ['excel', 'pdf']
            });

            $('#filtrarBtn').click(function () {
                var grado = $('#gradoFiltro').val();
                var seccion = $('#seccionFiltro').val();

                $.ajax({
                    url: 'get_alumnos.php',
                    type: 'POST',
                    data: { grado: grado, seccion: seccion, nivel: 'Inicial' },
                    dataType: 'json',
                    success: function (data) {
                        alumnosTable.clear();
                        data.forEach(function (alumno) {
                            alumnosTable.row.add([
                                alumno.DNI,
                                alumno.NOMBRES,
                                alumno.APELLIDOS,
                                alumno.GRADO,
                                alumno.SECCION
                            ]);
                        });
                        alumnosTable.draw();
                    }
                });
            });
        });
    </script>
    

    <!-- Footer -->
    <footer>
        <p>&copy; 2025 IE.7073 . Todos los derechos reservados.</p>
    </footer>
</body>

</html>