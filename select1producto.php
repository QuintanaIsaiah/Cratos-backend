<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: access");
header("Access-Control-Allow-Methods: POST");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-Width");
header("Access-Control-Allow-Origin: http://localhost:3000");

//Recogemos la información que nos pasen por POST 
$inputRecibido = json_decode(file_get_contents('php://input'));

$p_id = $inputRecibido;

include("connection.php");

//Creamos consulta select para recoger toda info del id pasado por input
$consulta = 'SELECT * FROM productos WHERE id = '.$p_id.';';

$result = mysqli_query($conexion,$consulta);
            
    while($lista = mysqli_fetch_all($result)){
        extract($lista);
            
            echo json_encode($lista);
    }

?>