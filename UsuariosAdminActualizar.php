<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: access");
header("Access-Control-Allow-Methods: POST");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-Width");
header("Access-Control-Allow-Origin: http://localhost:3000");

//Recogemos la información que nos pasen por POST 
$inputRecibido = json_decode(file_get_contents('php://input'));

$u_id = $inputRecibido[0];
$u_nombre = $inputRecibido[1];
$u_correo = $inputRecibido[2];
$u_edad = $inputRecibido[3];
$u_contrasenya = $inputRecibido[4];
$u_is_admin = $inputRecibido[5];

include("connection.php");

//Creamos consulta select para recoger toda info del id pasado por input
$consulta = 'UPDATE usuarios SET nombre = "'.$u_nombre.'",correo = "'.$u_correo.'",edad = "'.$u_edad.'",contrasenya = '.$u_contrasenya.', u_is_admin = '.$u_is_admin.' WHERE id= '.$u_id.' ;';
//$sql = "UPDATE productos SET nombre = '$nombre', categoria = '$categoria', descripcion = '$descripcion', precio = '$precio' WHERE id = '$idProducto'";
$result = mysqli_query($conexion,$consulta);
            
echo($result);

?>