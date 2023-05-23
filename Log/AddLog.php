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
$database = "CratosLog";

// Conectamos con el servidor de base de datos
$conexion = mysqli_connect($server, $user, $pass);

if (!$conexion) {
    die("Error al conectar al servidor de base de datos: " . mysqli_connect_error());
}

// Seleccionamos la base de datos
if (!mysqli_select_db($conexion, $database)) {
    die("Error al seleccionar la base de datos: " . mysqli_error($conexion));
}

// Recibimos el objeto con usuario y acción
$inputRecibido = json_decode(file_get_contents('php://input'));

$usuario = $inputRecibido->usuario;
$accion = $inputRecibido->accion;

if ($usuario) {
// Insertamos el registro en la tabla Log
$consulta = 'INSERT INTO Log (user, action) VALUES ("'.$usuario.'", "'.$accion.'");';
$result = mysqli_query($conexion, $consulta);
}



mysqli_close($conexion);
?>