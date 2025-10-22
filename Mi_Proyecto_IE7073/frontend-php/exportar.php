<?php
require 'db.php';


// Obtener grados y secciones únicos
$grados = [];
$secciones = [];

$res = $conn->query("SELECT DISTINCT grado FROM matriculas WHERE estado='aprobado'");
while ($row = $res->fetch_assoc())
    $grados[] = $row['grado'];

$res = $conn->query("SELECT DISTINCT seccion FROM matriculas WHERE estado='aprobado'");
while ($row = $res->fetch_assoc())
    $secciones[] = $row['seccion'];

// Si el usuario filtra
$alumnos = [];
if (isset($_POST['grado']) && isset($_POST['seccion'])) {
    $grado = $conn->real_escape_string($_POST['grado']);
    $seccion = $conn->real_escape_string($_POST['seccion']);

    $sql = "SELECT apellido_paterno, apellido_materno, nombres, genero, grado, seccion
            FROM matriculas
            WHERE estado='aprobado'
              AND grado='$grado'
              AND seccion='$seccion'";

    $res = $conn->query($sql);
    if (!$res) {
        die("Error en la consulta: " . $conn->error . "<br>SQL: " . $sql);
    }

    while ($row = $res->fetch_assoc()) {
        $alumnos[] = $row;
    }
}
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Reportes - Director</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
    <style>
        body {
            background-color: #f8f9fa;
        }

        .app-header {
            background-color: #2d6a4f;
            color: #fff;
            padding: 10px 20px;
        }

        .content {
            padding: 20px;
        }

        table {
            background: #fff;
        }

        th {
            background: #2d6a4f;
            color: #fff;
        }
    </style>
    <!-- jsPDF + AutoTable -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.5.1/jspdf.umd.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf-autotable/3.5.28/jspdf.plugin.autotable.min.js"></script>

    <!-- SheetJS para Excel -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/xlsx/0.18.5/xlsx.full.min.js"></script>
</head>

<body>
    <!-- Header -->
    <header class="app-header">
        <h4>📊 Reportes de Estudiantes</h4>
    </header>

    <div class="container content">
        <!-- 3. Formulario de filtros -->
        <form method="POST" class="row g-3 mb-4">
            <div class="col-md-4">
                <label for="grado" class="form-label">Grado</label>
                <select name="grado" id="grado" class="form-select" required>
                    <option value="">Seleccione</option>
                    <?php foreach ($grados as $g): ?>
                        <option value="<?= $g ?>" <?= (isset($_POST['grado']) && $_POST['grado'] == $g) ? 'selected' : '' ?>>
                            <?= $g ?>
                        </option>
                    <?php endforeach; ?>
                </select>
            </div>
            <div class="col-md-4">
                <label for="seccion" class="form-label">Sección</label>
                <select name="seccion" id="seccion" class="form-select" required>
                    <option value="">Seleccione</option>
                    <?php foreach ($secciones as $s): ?>
                        <option value="<?= $s ?>" <?= (isset($_POST['seccion']) && $_POST['seccion'] == $s) ? 'selected' : '' ?>>
                            <?= $s ?>
                        </option>
                    <?php endforeach; ?>
                </select>
            </div>
            <div class="col-md-4 d-flex align-items-end">
                <button type="submit" class="btn btn-success w-100">Generar Lista</button>
            </div>
        </form>

        <!-- 4. Tabla de resultados -->
        <?php if (!empty($alumnos)): ?>
            <h5>Lista de estudiantes - Grado <?= $_POST['grado'] ?> / Sección <?= $_POST['seccion'] ?></h5>
            <div class="table-responsive">
                <table class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Apellido Paterno</th>
                            <th>Apellido Materno</th>
                            <th>Nombres</th>
                            <th>Género</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($alumnos as $i => $al): ?>
                            <tr>
                                <td><?= $i + 1 ?></td>
                                <td><?= $al['apellido_paterno'] ?></td>
                                <td><?= $al['apellido_materno'] ?></td>
                                <td><?= $al['nombres'] ?></td>
                                <td><?= $al['genero'] ?></td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        <?php elseif ($_SERVER['REQUEST_METHOD'] == 'POST'): ?>
            <div class="alert alert-warning">No se encontraron estudiantes en ese grado/sección.</div>
        <?php endif; ?>
        <div class="mt-3">
    <a href="#" id="exportarExcelBtn" class="btn btn-outline-success">📗 Exportar a Excel</a>
    
    <button type="button" onclick="exportToPDF()" class="btn btn-outline-danger">📕 Exportar a PDF</button>
</div>

<script>
        // --- INICIO DE LA SOLUCIÓN ---

        function actualizarLinkExcel() {
            const grado = document.getElementById('grado').value;
            const seccion = document.getElementById('seccion').value;
            const excelBtn = document.getElementById('exportarExcelBtn');

            if (grado && seccion) {
                // Construimos la URL del microservicio de Java (en puerto 8081)
                excelBtn.href = `http://localhost:8081/api/reportes/alumnos/excel?grado=${grado}&seccion=${seccion}`;
            } else {
                excelBtn.href = "#"; // Deshabilitamos si no hay selección
            }
        }

        // 1. Llama a la función cada vez que cambien los filtros
        document.getElementById('grado').addEventListener('change', actualizarLinkExcel);
        document.getElementById('seccion').addEventListener('change', actualizarLinkExcel);
        
        // 2. [LÍNEA AÑADIDA] Llama a la función una vez al cargar la página,
        //    para que tome los valores que PHP ya seleccionó.
        document.addEventListener('DOMContentLoaded', actualizarLinkExcel);

        // --- FIN DE LA SOLUCIÓN ---


        // Tu función de exportar a PDF (esta se queda igual que antes)
        async function exportToPDF() {
            let table = document.querySelector("table");
            if (!table) {
                alert("No hay datos para exportar");
                return;
            }
            // ... (el resto de tu función de PDF) ...
        }
    </script>
    </div>
    <script>
        // Exportar a PDF
        async function exportToPDF() {
            let table = document.querySelector("table");
            if (!table) {
                alert("No hay datos para exportar");
                return;
            }

            const { jsPDF } = window.jspdf;
            const doc = new jsPDF();

            // Función que genera el PDF
            function generarPDF(conLogo = false, img = null, grado = "", seccion = "") {
                const { jsPDF } = window.jspdf;
                const doc = new jsPDF();

                if (conLogo && img) {
                    doc.addImage(img, "PNG", 10, 10, 20, 20); // logo a la izquierda
                }

                let pageWidth = doc.internal.pageSize.getWidth();
                let centerX = pageWidth / 2;

                // --- Título ---
                doc.setFontSize(16);
                doc.setFont("helvetica", "bold");
                doc.text("IE 7073 Santa Rosa de Lima - Reporte de Estudiantes", centerX, 20, { align: "center" });

                // --- Subtítulo (Grado y Sección) ---
                doc.setFontSize(12);
                doc.setFont("helvetica", "normal");
                doc.text(`Grado: ${grado}   |   Sección: ${seccion}`, centerX, 28, { align: "center" });


                // Tabla
                doc.autoTable({
                    html: "table",
                    startY: 40,
                    styles: { fontSize: 10 },
                    headStyles: { fillColor: [45, 106, 79] },
                });

                doc.save("Lista_Estudiantes.pdf");
            }

            // Intentar cargar el logo
            let img = new Image();
            img.src = "img/insignia.jpg"; // ⚠️ cambia según tu ruta real

            img.onload = function () {
                generarPDF(true, img); // con logo
            };

            img.onerror = function () {
                generarPDF(); // sin logo
            };
        }
    </script>


    </div>
</body>

</html>