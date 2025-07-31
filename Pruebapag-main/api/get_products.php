<?php
// api/get_products.php

require_once 'db.php';

header('Content-Type: application/json');

$sql = "SELECT id, name, category, price, currency, stock, status, img, details FROM products ORDER BY id DESC";
$result = $conn->query($sql);

$products = [];
if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        // Asegurarse de que los tipos de datos son correctos para JSON
        $row['id'] = (int)$row['id'];
        $row['price'] = (float)$row['price'];
        $row['stock'] = (int)$row['stock'];
        $products[] = $row;
    }
}

echo json_encode($products);

$conn->close();
?>