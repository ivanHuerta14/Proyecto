<?php
header('Content-Type: application/json'); // Asegura que el contenido siempre sea JSON

$servername = "mysql.railway.internal"; // Dirección del servidor
$username = "root"; // Usuario de la base de datos
$password = "oITCyqdDrKLahVSiokoCVBgxAJkwZoXW"; // Contraseña de la base de datos
$dbname = "railway"; // Nombre de la base de datos

try {
    // Intenta establecer la conexión
    $conn = new PDO("mysql:host=$servername;dbname=$dbname;charset=utf8mb4", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
    // Mensaje de depuración
    error_log("Conexión exitosa a la base de datos");
    
    // Prueba una consulta básica para asegurarte de que puedes interactuar con la base
    $stmt = $conn->query("SELECT 1");
    if ($stmt) {
        echo json_encode(['status' => 'success', 'message' => 'Conexión y consulta básica exitosa']);
    } else {
        echo json_encode(['status' => 'error', 'message' => 'Consulta básica fallida']);
    }
    
} catch (PDOException $e) {
    // Si hay un error, registra y muestra el mensaje
    error_log("Error de conexión: " . $e->getMessage());
    echo json_encode(['status' => 'error', 'message' => 'Error de conexión: ' . $e->getMessage()]);
    exit(); // Termina la ejecución
}
?>

