<?php
header("Access-Control_Allow-Origin: *");
header("Access-Control-Allow-Headers: access");
header("Access-Control-Allow-Methods: POST");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-Width");
header("Access-Control-Allow-Origin: http://localhost:3000");


//Recogemos la información que nos pasen por POST 
$inputRecibido = json_decode(file_get_contents('php://input'));

$id = $inputRecibido[0];
$usuario = $inputRecibido[1];

include("connection.php");

    //Creamos consulta select para recoger toda info del id pasado por input
    $conasulta = 'SELECT * FROM productos WHERE id = '.$id.';';

    $resp = mysqli_query($conexion,$conasulta);

        while($lista = mysqli_fetch_assoc($resp)){
            extract($lista);

                //Creamos consulta para hacer el insert
                $subconsulta = 'INSERT INTO carro(nombre,categoria,descripcion,precio,porcentaje_oferta) VALUES ("'.$nombre.'","'.$categoria.'","'.$descripcion.'",'.$precio.','.$porcentaje_oferta.');';

                $result_sub = mysqli_query($conexion,$subconsulta);
                echo($result_sub);
        }  
?>