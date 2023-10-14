<?php

// Incluye la clase 'mysql' para la gestión de la base de datos
require 'dbo/cnn.php';

// Crea una instancia de la clase 'mysql' para la conexión a la base de datos
$cnn = new mysql('localhost', 'root', '', 'apiweb');

// Establece el encabezado de la respuesta como JSON
header("Content-Type: application/json");

// Obtiene el método HTTP utilizado (GET, POST, DELETE, PUT, PATCH)
$method = $_SERVER['REQUEST_METHOD'];

// Obtiene la ruta de la solicitud (PATH_INFO)
$path = isset($_SERVER['PATH_INFO']) ? $_SERVER['PATH_INFO'] : '/';

// Divide la ruta en segmentos y obtiene el último segmento como ID
$findId = explode('/', $path);
$id = ($path !== '/') ? end($findId) : NULL;

// Realiza una acción basada en el método HTTP
switch ($method) {
    case 'GET':
        // Realiza una consulta SELECT si el método es GET
        $cnn->selectQuery($id);
        break;

    case 'POST':
        // Realiza una consulta de inserción si el método es POST
        $cnn->insertQuery();
        break;

    case 'DELETE':
        // Realiza una consulta de eliminación si el método es DELETE
        $cnn->deleteQuery($id);
        break;

    case 'PUT':
        // Realiza una consulta de actualización si el método es PUT
        $cnn->updateQuery($id);
        break;

    default:
        // Maneja cualquier otro método HTTP
        echo 'ERROR';
        break;
}

// Cierra la conexión a la base de datos
$cnn->close();
