<?php
header("Access-Control_Allow-Origin: *");
header("Access-Control-Allow-Headers: access");
header("Access-Control-Allow-Methods: POST");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-Width");
header("Access-Control-Allow-Origin: http://localhost:3000");


$inputRecibido = json_decode(file_get_contents('php://input'));

$valor = $inputRecibido;


include("connection.php");
    
    //Hacemos consulta para mostrar todos los productos
    $conexion = $GLOBALS["conexion"];

    $consulta = 'DELETE FROM Usuarios WHERE id = '.$valor.';';
    $result = mysqli_query($conexion,$consulta);

    print_r($result);
    
?>