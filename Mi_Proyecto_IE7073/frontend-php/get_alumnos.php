<?php
// get_alumnos.php

$host = "localhost";
$user = "root";
$pass = "";
$db = "sistemaie7073";

// Conexión
$conn = new mysqli($host, $user, $pass, $db);
if ($conn->connect_error) {
    die(json_encode([]));
}

// Recibir datos POST
$grado = isset($_POST['grado']) ? $_POST['grado'] : '';
$seccion = isset($_POST['seccion']) ? $_POST['seccion'] : '';
$nivel = isset($_POST['nivel']) ? $_POST['nivel'] : 'Inicial';

// Construir SQL dinámico
$sql = "SELECT DNI, NOMBRES, APELLIDOS, GRADO, SECCION FROM alumnos WHERE NIVEL=? ";
$params = [];
$types = "s";
$params[] = $nivel;

if(!empty($grado)){
    $sql .= " AND GRADO=? ";
    $types .= "s";
    $params[] = $grado;
}
if(!empty($seccion)){
    $sql .= " AND SECCION=? ";
    $types .= "s";
    $params[] = $seccion;
}

$stmt = $conn->prepare($sql);
$stmt->bind_param($types, ...$params);
$stmt->execute();
$result = $stmt->get_result();

$alumnos = [];
while($row = $result->fetch_assoc()){
    $alumnos[] = $row;
}

$stmt->close();
$conn->close();

// Devolver JSON
header('Content-Type: application/json');
echo json_encode($alumnos);
