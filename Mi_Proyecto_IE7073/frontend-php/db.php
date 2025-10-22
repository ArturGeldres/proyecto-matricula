<?php
$servername = "localhost";   // Servidor local
$username   = "root";        // Usuario por defecto en XAMPP
$password   = "";            // En XAMPP no hay contraseña por defecto
$database   = "sistemaie7073"; // Nombre de tu base de datos

// Crear conexión
$conn = new mysqli($servername, $username, $password, $database);

// Verificar conexión
if ($conn->connect_error) {
    die("Error en la conexión: " . $conn->connect_error);
}
?>