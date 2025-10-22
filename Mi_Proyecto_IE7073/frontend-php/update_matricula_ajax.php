<?php
// require 'db.php'; // Ya no se usa la BD

if (isset($_POST['id'], $_POST['estado'])) {
    $id = intval($_POST['id']);
    $estado = $_POST['estado']; // 'aprobado' o 'rechazado'

    // 1. Preparar datos para Java
    $data = json_encode(['estado' => $estado]);

    // 2. Llamar al microservicio
    // Usamos el método PUT como definimos en el controlador de Java
    $ch = curl_init("http://localhost:8081/api/matriculas/estado/" . $id);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "PUT"); // Método PUT
    curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
    curl_setopt($ch, CURLOPT_HTTPHEADER, [
        'Content-Type: application/json',
        'Content-Length: ' . strlen($data)
    ]);

    $responseJson = curl_exec($ch);
    $httpcode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
    curl_close($ch);

    // 3. Devolver respuesta al AJAX
    if ($httpcode == 200) {
        echo "ok"; // Tu script de dashboard.php espera un "ok"
    } else {
        echo "error";
    }
}
?>