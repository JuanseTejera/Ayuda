<?php
// api/manage_product.php

require_once 'db.php';

header('Content-Type: application/json');

// Obtener los datos JSON enviados desde el frontend
$data = json_decode(file_get_contents('php://input'), true);

// Validar datos básicos (puedes añadir más validaciones)
if (empty($data['name']) || empty($data['category']) || !isset($data['price'])) {
    echo json_encode(['status' => 'error', 'message' => 'Faltan datos requeridos.']);
    $conn->close();
    exit();
}

// Extraer datos
$id = $data['id'] ?? null;
$name = $data['name'];
$category = $data['category'];
$status = $data['status'];
$price = $data['price'];
$currency = $data['currency'];
$stock = $data['stock'];
$img = $data['img'];
$details = $data['details'];

// Usamos sentencias preparadas para evitar inyección SQL
if ($id) {
    // Si hay un ID, es una ACTUALIZACIÓN (UPDATE)
    $stmt = $conn->prepare("UPDATE products SET name=?, category=?, status=?, price=?, currency=?, stock=?, img=?, details=? WHERE id=?");
    // "ssssdsisi" define los tipos de datos: s=string, d=double, i=integer
    $stmt->bind_param("ssssdsisi", $name, $category, $status, $price, $currency, $stock, $img, $details, $id);
} else {
    // Si no hay ID, es una CREACIÓN (INSERT)
    $stmt = $conn->prepare("INSERT INTO products (name, category, status, price, currency, stock, img, details) VALUES (?, ?, ?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("ssssdsis", $name, $category, $status, $price, $currency, $stock, $img, $details);
}

if ($stmt->execute()) {
    echo json_encode(['status' => 'success']);
} else {
    echo json_encode(['status' => 'error', 'message' => $stmt->error]);
}

$stmt->close();
$conn->close();
?>