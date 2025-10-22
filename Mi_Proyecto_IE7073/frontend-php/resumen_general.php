<?php
require 'db.php'; // Conexión a la base de datos 

// Contar alumnos
$result = $conn->query("SELECT COUNT(*) AS total FROM alumnos");
$row = $result->fetch_assoc();
$alumnos = $row['total'];

// Contar docentes
$result = $conn->query("SELECT COUNT(*) AS total FROM docentes");
$row = $result->fetch_assoc();
$docentes = $row['total'];

// Grados y secciones únicos desde alumnos
$grados = [];
$secciones = [];

$res = $conn->query("SELECT DISTINCT grado FROM alumnos");
while ($row = $res->fetch_assoc()) $grados[] = $row['grado'];

$res = $conn->query("SELECT DISTINCT seccion FROM alumnos");
while ($row = $res->fetch_assoc()) $secciones[] = $row['seccion'];

// 1. Total hombres/mujeres por grado y sección
$generoPorGradoSeccion = [];
$res = $conn->query("SELECT grado, seccion, genero, COUNT(*) as total 
                     FROM alumnos 
                     GROUP BY grado, seccion, genero");
while ($row = $res->fetch_assoc()) {
    $generoPorGradoSeccion[$row['grado']][$row['seccion']][$row['genero']] = $row['total'];
}

// 2. Total estudiantes por grado y sección
$alumnosPorGradoSeccion = [];
$res = $conn->query("SELECT grado, seccion, COUNT(*) as total 
                     FROM alumnos 
                     GROUP BY grado, seccion");
while ($row = $res->fetch_assoc()) {
    $alumnosPorGradoSeccion[$row['grado']][$row['seccion']] = $row['total'];
}
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Dashboard - Director</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"> <!-- Bootstrap -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
    <!-- Estilos personalizados -->
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f8f9fa;
        }

        .app-header {
            background-color: #2d6a4f;
            color: #fff;
            padding: 10px 20px;
        }

        .app-sidebar {
            background-color: #1b4332;
            min-height: 100vh;
            color: #fff;
            padding-top: 20px;
        }

        .app-sidebar a {
            color: #95d5b2;
            display: block;
            padding: 10px 15px;
            text-decoration: none;
        }

        .app-sidebar a:hover {
            background-color: #40916c;
            color: #fff;
        }

        .content {
            padding: 20px;
        }

        .card {
            border-left: 5px solid #2d6a4f;
        }

        .card-title {
            color: #2d6a4f;
        }

        .tile {
            border-radius: 18px;
            box-shadow: 0 4px 24px rgba(27, 67, 50, 0.10);
            border: 1.5px solid #bfa14a;
            min-height: 350px;
            margin-bottom: 20px;
        }

        .tile-title {
            font-weight: 700;
            color: #1b4332;
            border-left: 5px solid #bfa14a;
            padding-left: 10px;
        }

        .tile-body {
            padding-top: 20px;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            min-height: 320px;
        }

        .tile-body canvas {
            width: 100% !important;
            max-width: 350px;
            height: 250px !important;
            max-height: 250px;
        }

        .form-select {
            max-width: 200px;
            display: inline-block;
            border-radius: 8px;
            border: 1px solid #bfa14a;
        }

        .submenu {
            display: none;
            padding-left: 15px;
        }
    </style>
</head>

<body> <!-- Header -->
    <header class="app-header d-flex justify-content-between align-items-center">
        <h4>Sistema Educativo</h4> <span>Usuario: Director</span>
    </header>
    <div class="container-fluid">
        <div class="row"> <!-- Sidebar -->
            <nav class="col-md-2 app-sidebar"> <a href="resumen_general.php" id="btnDashboard">🏠 Resumen General</a>
                <a href="exportar.php" id="btnReportes">📊 Reportes</a>
                <a href="#" id="btnDocentes">👩‍🏫 Docentes</a>
                <a href="#" id="btnEstudiantes">🎓 Estudiantes</a>
                <a href="#" id="btnNiveles">📚 Niveles ▾</a>
                <div class="submenu" id="submenuNiveles">
                    <a href="#" class="nivel-link" data-nivel="Inicial">Nivel Inicial</a>
                    <a href="#" class="nivel-link" data-nivel="Primaria">Nivel Primaria</a>
                    <a href="#" class="nivel-link" data-nivel="Secundaria">Nivel Secundaria</a>
                </div>
                <a href="#">⚙️ Configuración</a>
            </nav>
            <script>
                document.getElementById('btnNiveles').addEventListener('click', function (e) {
                    e.preventDefault(); // evita que el <a href="#"> recargue la página
                    let submenu = document.getElementById('submenuNiveles');
                    submenu.style.display = (submenu.style.display === 'block') ? 'none' : 'block';
                });
            </script>
            
            <!-- Main content -->
            <main class="col-md-10 content">
                <h3>Resumen General</h3>
                <div class="row">
                    <div class="col-md-4">
                        <div class="card p-3 mb-3 shadow-sm">
                            <h5 class="card-title">Alumnos</h5>
                            <p class="fs-4"><?= $alumnos ?></p>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card p-3 mb-3 shadow-sm">
                            <h5 class="card-title">Docentes</h5>
                            <p class="fs-4"><?= $docentes ?></p>
                        </div>
                    </div>
                </div> <!-- NUEVA ZONA DE 4 GRÁFICOS -->
                <div class="row"> <!-- Fila 1 -->
                    <div class="col-md-6 mb-4">
                        <div class="tile p-3">
                            <h5 class="tile-title">Hombres/Mujeres</h5>
                            <div class="tile-body"> <select id="filtroGrado1" class="form-select mb-2">
                                    <option value="">Grado</option> <?php foreach ($grados as $g): ?>
                                        <option value="<?= $g ?>"><?= $g ?></option> <?php endforeach; ?>
                                </select> <select id="filtroSeccion1" class="form-select mb-2">
                                    <option value="">Sección</option> <?php foreach ($secciones as $s): ?>
                                        <option value="<?= $s ?>"><?= $s ?></option> <?php endforeach; ?>
                                </select> <canvas id="graficoGenero"></canvas> </div>
                        </div>
                    </div>
                    <div class="col-md-6 mb-4">
                        <div class="tile p-3">
                            <h5 class="tile-title">Total por Grado/Sección</h5>
                            <div class="tile-body"> <select id="filtroGrado2" class="form-select mb-2">
                                    <option value="">Grado</option> <?php foreach ($grados as $g): ?>
                                        <option value="<?= $g ?>"><?= $g ?></option> <?php endforeach; ?>
                                </select> <select id="filtroSeccion2" class="form-select mb-2">
                                    <option value="">Sección</option> <?php foreach ($secciones as $s): ?>
                                        <option value="<?= $s ?>"><?= $s ?></option> <?php endforeach; ?>
                                </select> <canvas id="graficoTotal"></canvas> </div>
                        </div>
                    </div>
                </div>
                <div class="row"> <!-- Fila 2 -->
                    <div class="col-md-6 mb-4">
                        <div class="tile p-3">
                            <h5 class="tile-title">Gráfico 3</h5>
                            <div class="tile-body"> <canvas id="grafico3"></canvas> </div>
                        </div>
                    </div>
                    <div class="col-md-6 mb-4">
                        <div class="tile p-3">
                            <h5 class="tile-title">Gráfico 4</h5>
                            <div class="tile-body"> <canvas id="grafico4"></canvas> </div>
                        </div>
                    </div>
                </div>
            </main>
        </div>
    </div> <!-- Chart.js -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script> // Datos desde PHP const generoPorGradoSeccion = <?php echo json_encode($generoPorGradoSeccion); ?>; const alumnosPorGradoSeccion = <?php echo json_encode($alumnosPorGradoSeccion); ?>; // Gráfico 1: Hombres/Mujeres filtrable function actualizarGraficoGenero() { const grado = document.getElementById('filtroGrado1').value; const seccion = document.getElementById('filtroSeccion1').value; let hombres = 0, mujeres = 0; if (generoPorGradoSeccion[grado] && generoPorGradoSeccion[grado][seccion]) { hombres = generoPorGradoSeccion[grado][seccion]['Masculino'] || 0; mujeres = generoPorGradoSeccion[grado][seccion]['Femenino'] || 0; } generoChart.data.datasets[0].data = [hombres, mujeres]; generoChart.update(); } const generoChart = new Chart(document.getElementById('graficoGenero'), { type: 'doughnut', data: { labels: ['Hombres', 'Mujeres'], datasets: [{ data: [0, 0], backgroundColor: ['#2d6a4f', '#bfa14a'] }] } }); document.getElementById('filtroGrado1').addEventListener('change', actualizarGraficoGenero); document.getElementById('filtroSeccion1').addEventListener('change', actualizarGraficoGenero); // Gráfico 2: Total por grado y sección function actualizarGraficoTotal() { const grado = document.getElementById('filtroGrado2').value; const seccion = document.getElementById('filtroSeccion2').value; let total = 0; if (alumnosPorGradoSeccion[grado] && alumnosPorGradoSeccion[grado][seccion]) { total = alumnosPorGradoSeccion[grado][seccion]; } totalChart.data.datasets[0].data = [total]; totalChart.data.labels = [grado + ' ' + seccion]; totalChart.update(); } const totalChart = new Chart(document.getElementById('graficoTotal'), { type: 'bar', data: { labels: [], datasets: [{ label: 'Total', data: [], backgroundColor: '#40916c' }] }, options: { plugins: { legend: { display: false } } } }); document.getElementById('filtroGrado2').addEventListener('change', actualizarGraficoTotal); document.getElementById('filtroSeccion2').addEventListener('change', actualizarGraficoTotal); </script>
</body>

</html>