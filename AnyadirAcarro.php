<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: access");
header("Access-Control-Allow-Methods: POST");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-Width");
header("Access-Control-Allow-Origin: http://localhost:3000");

//Recogemos la información que nos pasen por POST 
$inputRecibido = json_decode(file_get_contents('php://input'));

$userInput = $inputRecibido[0];
$id = $inputRecibido[1];

//print_r("php nos retorna idproducto: " . $id);

//print_r("php nos retorna nombre: " . $userInput);


include("connection.php");

//Creamos consulta select para recoger toda info del id pasado por input
$conasulta = 'SELECT * FROM productos WHERE id = ' . $id;

$resp = mysqli_query($conexion, $conasulta);

while ($lista = mysqli_fetch_assoc($resp)) {
    extract($lista);

    //print_r("".$userInput);

    //Creamos consulta para hacer el insert
    $subconsulta = 'INSERT INTO carro(nombre,categoria,descripcion,precio,porcentaje_oferta,id_nombre) VALUES ("' . $nombre . '","' . $categoria . '","' . $descripcion . '",' . $precio . ',' . $porcentaje_oferta . ','.$userInput.')';

    $result_sub = mysqli_query($conexion, $subconsulta);
    echo $result_sub;
}
?>