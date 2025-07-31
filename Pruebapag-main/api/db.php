<?php
// api/db.php

$servername = "localhost";
$username = "root";       // Usuario por defecto en XAMPP
$password = "";           // Contraseña por defecto en XAMPP
$dbname = "tatophones_db";

// Crear conexión
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar conexión
if ($conn->connect_error) {
    // Detiene la ejecución y muestra un error si la conexión falla.
    header('Content-Type: application/json');
    echo json_encode(['status' => 'error', 'message' => 'Connection failed: ' . $conn->connect_error]);
    die();
}

// Asegurarse de que la conexión use UTF-8
$conn->set_charset("utf8mb4");
?>