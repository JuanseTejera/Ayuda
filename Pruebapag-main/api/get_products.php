<?php
// api/get_products.php

require_once 'db.php';

// Establecer el encabezado para indicar que la respuesta es JSON
header('Content-Type: application/json');

// Inicializar el array de productos
$products = [];

// Usar un bloque try-catch para un manejo de errores más robusto
try {
    // Consulta SQL para obtener los productos
    $sql = "SELECT id, name, category, price, currency, stock, status, img, details FROM products ORDER BY id DESC";

    // Verificar si la conexión es válida antes de ejecutar la consulta
    if (!$conn) {
        throw new Exception("Error: La conexión a la base de datos no es válida.");
    }

    $result = $conn->query($sql);

    // Si la consulta falló, lanzar una excepción
    if ($result === false) {
        throw new Exception("Error en la consulta SQL: " . $conn->error);
    }

    // Verificar si se obtuvieron resultados
    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            // Asegurarse de que los tipos de datos son correctos para JSON
            // json_encode maneja los tipos de datos correctamente, pero la conversión explícita
            // es una buena práctica para asegurar que el frontend reciba los tipos esperados.
            $row['id'] = (int)$row['id'];
            $row['price'] = (float)$row['price'];
            $row['stock'] = (int)$row['stock'];

            $products[] = $row;
        }
    }

    // Preparar la respuesta exitosa
    $response = [
        'success' => true,
        'total_products' => count($products),
        'data' => $products
    ];

    // Codificar el array en formato JSON
    echo json_encode($response, JSON_PRETTY_PRINT);

} catch (Exception $e) {
    // Capturar cualquier error y enviar una respuesta JSON de error
    http_response_code(500); // Código de error interno del servidor
    echo json_encode([
        'success' => false,
        'message' => $e->getMessage()
    ]);
} finally {
    // Cerrar la conexión si existe
    if ($conn) {
        $conn->close();
    }
}

?>
