<?php
// Encabezado para indicar que devolverá JSON
header('Content-Type: application/json');

$servername = "mysql.railway.internal"; // Cambia si el host es diferente
$username = "root";
$password = "oITCyqdDrKLahVSiokoCVBgxAJkwZoXW";
$dbname = "railway";

try {
    // Establece la conexión con PDO
    $conn = new PDO("mysql:host=$servername;dbname=$dbname;charset=utf8mb4", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Mensaje de éxito para la conexión
    error_log("Conexión exitosa a la base de datos");

    // Realiza una consulta básica
    $query = "SELECT * FROM registros LIMIT 5"; // Ajusta el nombre de la tabla
    $stmt = $conn->query($query);

    // Obtiene los resultados de la consulta
    $results = $stmt->fetchAll(PDO::FETCH_ASSOC);

    // Devuelve los resultados como JSON
    echo json_encode([
        'status' => 'success',
        'message' => 'Conexión y consulta exitosa',
        'data' => $results
    ]);

} catch (PDOException $e) {
    // Devuelve el error en caso de fallo
    error_log("Error en la base de datos: " . $e->getMessage());
    echo json_encode([
        'status' => 'error',
        'message' => 'Error en la conexión: ' . $e->getMessage()
    ]);
    exit();
}
