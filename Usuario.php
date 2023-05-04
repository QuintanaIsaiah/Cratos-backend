<?php
header("Access-Control_Allow-Origin: *");
header("Access-Control-Allow-Headers: access");
header("Access-Control-Allow-Methods: POST");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-Width");
header("Access-Control-Allow-Origin: http://localhost:3000");


//$inputRecibido = json_decode(file_get_contents('php://input'));
$inputRecibido = "David";

if($inputRecibido){
    print_r($inputRecibido);
}
else{
    print_r("");
}

if($inputRecibido == null){
    
}
else if($inputRecibido){
    
    include("connection.php");

    //Creamos tabla carro_user
    $consulta_c = 'CREATE TABLE IF NOT EXISTS carro_'.$inputRecibido.' (
        id int auto_increment primary key,
        nombre varchar(255),
        categoria varchar(255),
        descripcion varchar(255),
        precio int,
        porcentaje_oferta int    
    );';

    $result_c = mysqli_query($conexion,$consulta_c);
    //echo($result_c);



}
else{
    echo("ERROR");
}

    
?>