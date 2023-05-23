<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: access");
header("Access-Control-Allow-Methods: POST");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-Width");
header("Access-Control-Allow-Origin: http://localhost:3000");

$server = "localhost";
$user = "root";
$pass = "";

// Conectamos con el servidor
$conexion = mysqli_connect($server, $user, $pass);

if (!$conexion) {
    die("Error al conectar al servidor de base de datos: " . mysqli_connect_error());
}

// Creamos la base de datos
$consulta = 'CREATE DATABASE IF NOT EXISTS CratosLog;';
$result = mysqli_query($conexion, $consulta);

// Conectamos con la base de datos
$database = "CratosLog";
if (!mysqli_select_db($conexion, $database)) {
    die("Error al seleccionar la base de datos: " . mysqli_error($conexion));
}

// Creamos la tabla Log
$consulta = 'CREATE TABLE IF NOT EXISTS Log (
    id INT AUTO_INCREMENT PRIMARY KEY,
    user VARCHAR(255),
    action VARCHAR(255)
);';

$result = mysqli_query($conexion, $consulta);

mysqli_close($conexion);

?>