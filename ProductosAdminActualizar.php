<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: access");
header("Access-Control-Allow-Methods: POST");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-Width");
header("Access-Control-Allow-Origin: http://localhost:3000");

//Recogemos la información que nos pasen por POST 
$inputRecibido = json_decode(file_get_contents('php://input'));

$p_nombre = $inputRecibido[0];
$p_categoria = $inputRecibido[1];
$p_descripcion = $inputRecibido[2];
$p_precio = $inputRecibido[3];
$p_porcentaje_precio = $inputRecibido[4];
$p_id = $inputRecibido[5];

include("connection.php");

//Creamos consulta select para recoger toda info del id pasado por input
$consulta = 'UPDATE productos SET nombre = "'.$p_nombre.'",categoria = "'.$p_categoria.'",descripcion = "'.$p_descripcion.'",precio = '.$p_precio.', porcentaje_oferta = '.$p_porcentaje_precio.' WHERE id= '.$p_id.' ;';
//$sql = "UPDATE productos SET nombre = '$nombre', categoria = '$categoria', descripcion = '$descripcion', precio = '$precio' WHERE id = '$idProducto'";
$result = mysqli_query($conexion,$consulta);
            
echo($result);

?>