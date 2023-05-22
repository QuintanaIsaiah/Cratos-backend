<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: access");
header("Access-Control-Allow-Methods: POST");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-Width");
header("Access-Control-Allow-Origin: http://localhost:3000");

//Recogemos la información que nos pasen por POST 
$inputRecibido = json_decode(file_get_contents('php://input'));

$u_nombre = $inputRecibido[0];
$u_correo = $inputRecibido[1];
$u_edad = $inputRecibido[2];
$u_contrasenya = $inputRecibido[3];
$u_is_admin = $inputRecibido[4];

include("connection.php");

//Creamos consulta select para recoger toda info del id pasado por input
$consulta = 'SELECT * FROM usuarios WHERE nombre = "'.$u_nombre.'" ;';
$result = mysqli_query($conexion,$consulta);
            
if(mysqli_num_rows($result) > 0){
    echo("Ya existe ");
} else{
     $consulta2 = 'INSERT INTO usuarios(nombre, correo, edad, contrasenya, admin) 
                   VALUES ("'.$u_nombre.'", "'.$u_correo.'", "'.$u_edad.'", "'.$u_contrasenya.'", '.$u_is_admin.');';
    
    $result2 = mysqli_query($conexion,$consulta2);
    echo($result2);
}
?>