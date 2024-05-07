<?php
$servername = "localhost";
$username = "root"; // Por defecto, el nombre de usuario de MySQL en XAMPP es 'root'
$password = ""; // Por defecto, no hay contraseña en XAMPP
$database = "FOOD_TEC1"; // Nombre de la base de datos que deseas utilizar

// Crear conexión
$conn = new mysqli($servername, $username, $password);

// Verificar la conexión
if ($conn->connect_error) {
    die("La conexión falló: " . $conn->connect_error);
} 

// Crear la base de datos
$sql_create_db = "CREATE DATABASE IF NOT EXISTS $database";
if ($conn->query($sql_create_db) === TRUE) {
    echo "Base de datos creada o encontrada exitosamente.";
} else {
    echo "Error al crear la base de datos: " . $conn->error;
}

// Seleccionar la base de datos
$conn->select_db($database);

// Crear tabla de desayunos
$sql_create_desayunos = "CREATE TABLE IF NOT EXISTS desayunos (
    ID_DESAYUNO INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    NOMBRE_DESAYUNO VARCHAR(100) NOT NULL,
    PRECIO_DESAYUNO DECIMAL(10,2) NOT NULL,
    DISPONIBILIDAD ENUM('Disponible', 'No disponible') NOT NULL,
    CANTIDAD INT(6) NOT NULL
)";

if ($conn->query($sql_create_desayunos) === TRUE) {
    echo "Tabla 'desayunos' creada exitosamente.";
} else {
    echo "Error al crear la tabla 'desayunos': " . $conn->error;
}

// Cerrar conexión
$conn->close();
?>
