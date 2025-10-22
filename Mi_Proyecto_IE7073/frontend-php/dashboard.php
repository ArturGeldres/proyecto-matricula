<?php
session_start();
if (!isset($_SESSION['usuario']) || $_SESSION['rol_id'] != 1) {
    header("Location: login.php");
    exit();
}
require 'db.php';
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Dashboard Director</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
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
        margin-bottom: 40px; /* Agregado para igualar el espacio inferior */
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
        <p class="text-muted">Santa Rosa de Lima - Panel Principal</p>
        
        <h5 class="mb-4">Bienvenido <span class="text-success fw-bold">Director</span> 👋</h5>

        <div class="row g-4">
            <!-- Gestión de Usuarios -->
            <div class="col-md-4">
                <div class="card card-option p-3 shadow-sm">
                    <h5>Usuarios</h5>
                    <p>Gestiona docentes, estudiantes y administrativos</p>
                    <a href="usuarios.php" class="btn btn-success btn-sm">Ir</a>
                </div>
            </div>

            <!-- Matrículas -->
            <div class="col-md-4">
                <div class="card card-option p-3 shadow-sm">
                    <h5>Matrículas</h5>
                    <p>Registro y seguimiento de matrículas</p>
                    <button class="btn btn-success btn-sm" data-bs-toggle="modal" data-bs-target="#modalMatriculas">Ver Pendientes</button>
                </div>
            </div>

            <!-- Reportes -->
            <div class="col-md-4">
                <div class="card card-option p-3 shadow-sm">
                    <h5>Reportes</h5>
                    <p>Estadísticas y reportes de gestión</p>
                    <a href="resumen_general.php" class="btn btn-success btn-sm">Ir</a>
                </div>
            </div>

            <!-- Asistencia -->
            <div class="col-md-4">
                <div class="card card-option p-3 shadow-sm">
                    <h5>Asistencias</h5>
                    <p>Control y registro de asistencias</p>
                    <a href="asistencias.php" class="btn btn-success btn-sm">Ir</a>
                </div>
            </div>

            <!-- Horarios -->
            <div class="col-md-4">
                <div class="card card-option p-3 shadow-sm">
                    <h5>Horarios</h5>
                    <p>Organización de horarios académicos</p>
                    <a href="horarios.php" class="btn btn-success btn-sm">Ir</a>
                </div>
            </div>

            <!-- Notas -->
            <div class="col-md-4">
                <div class="card card-option p-3 shadow-sm">
                    <h5>Notas</h5>
                    <p>Gestión y visualización de calificaciones</p>
                    <a href="notas.php" class="btn btn-success btn-sm">Ir</a>
                </div>
            </div>

            <!-- Infraestructura -->
            <div class="col-md-4">
                <div class="card card-option p-3 shadow-sm">
                    <h5>Infraestructura</h5>
                    <p>Mantenimiento y gestión de recursos</p>
                    <a href="infraestructura.php" class="btn btn-success btn-sm">Ir</a>
                </div>
            </div>

            <!-- Comunicados -->
            <div class="col-md-4">
                <div class="card card-option p-3 shadow-sm">
                    <h5>Comunicados</h5>
                    <p>Publicación de noticias y avisos</p>
                    <a href="comunicados.php" class="btn btn-success btn-sm">Ir</a>
                </div>
            </div>
        </div>

        <div class="mt-4">
            <a href="logout.php" class="btn logout-btn">Cerrar Sesión</a>
        </div>
    </div>

    <!-- Modal de Matrículas Pendientes -->
    <div class="modal fade" id="modalMatriculas" tabindex="-1" aria-hidden="true">
      <div class="modal-dialog modal-lg">
        <div class="modal-content">
          <div class="modal-header bg-success text-white">
            <h5 class="modal-title">Matrículas Pendientes</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
          </div>
          <div class="modal-body">
            <?php
            $result = $conn->query("SELECT id, dni, apellido_paterno, apellido_materno, nombres, grado, seccion, estado 
                                    FROM matriculas WHERE estado='pendiente'");
            if ($result->num_rows > 0) {
                echo "<table class='table table-bordered table-hover' id='tablaMatriculas'>";
                echo "<thead><tr>
                        <th>DNI</th><th>Apellidos</th><th>Nombres</th>
                        <th>Grado</th><th>Sección</th><th>Acciones</th>
                      </tr></thead><tbody>";
                while ($row = $result->fetch_assoc()) {
                    echo "<tr id='fila{$row['id']}'>
                            <td>{$row['dni']}</td>
                            <td>{$row['apellido_paterno']} {$row['apellido_materno']}</td>
                            <td>{$row['nombres']}</td>
                            <td>{$row['grado']}</td>
                            <td>{$row['seccion']}</td>
                            <td>
                                <button class='btn btn-success btn-sm btn-estado' data-id='{$row['id']}' data-estado='aprobado'>Aprobar</button>
                                <button class='btn btn-danger btn-sm btn-estado' data-id='{$row['id']}' data-estado='rechazado'>Rechazar</button>
                            </td>
                          </tr>";
                }
                echo "</tbody></table>";
            } else {
                echo "<p class='text-muted'>✅ No hay matrículas pendientes.</p>";
            }
            ?>
          </div>
        </div>
      </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
    $(document).on("click", ".btn-estado", function() {
        let id = $(this).data("id");
        let estado = $(this).data("estado");

        $.post("update_matricula_ajax.php", { id: id, estado: estado }, function(response) {
            if (response === "ok") {
                $("#fila" + id).fadeOut(500, function(){ $(this).remove(); });

                // Si ya no quedan filas, cerrar modal
                if ($("#tablaMatriculas tbody tr").length === 1) {
                    $("#modalMatriculas").modal('hide');
                }
            } else {
                alert("❌ Error al actualizar matrícula.");
            }
        });
    });
    </script>
</body>
</html>