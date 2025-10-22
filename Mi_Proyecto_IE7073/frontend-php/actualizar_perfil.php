<?php
session_start();
require_once "db.php"; // conexión a la BD

// Verificar que haya sesión iniciada
if (!isset($_SESSION['id_usuario'])) {
    header("Location: login.php");
    exit();
}

$id = (int) $_POST['id'];
$nombre = trim($_POST['nombre']);
$usuario = trim($_POST['usuario']);
$password = $_POST['password'];

// Si la contraseña no está vacía, actualizamos también la contraseña
if (!empty($password)) {
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);
    $sql = "UPDATE usuarios SET nombre = ?, usuario = ?, password = ? WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sssi", $nombre, $usuario, $hashed_password, $id);
} else {
    // Si la contraseña está vacía, no la tocamos
    $sql = "UPDATE usuarios SET nombre = ?, usuario = ? WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssi", $nombre, $usuario, $id);
}

if ($stmt->execute()) {
    // Actualizamos también la sesión para que se reflejen los cambios
    $_SESSION['nombre'] = $nombre;
    $_SESSION['usuario'] = $usuario;
    header("Location: dashboard_user.php?msg=perfil_actualizado");
} else {
    echo "Error al actualizar perfil: " . $stmt->error;
}

$stmt->close();
$conn->close();