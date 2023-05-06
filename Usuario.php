<?php
header("Access-Control_Allow-Origin: *");
header("Access-Control-Allow-Headers: access");
header("Access-Control-Allow-Methods: POST");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-Width");
header("Access-Control-Allow-Origin: http://localhost:3000");


$inputRecibido = json_decode(file_get_contents('php://input'));

//$inputRecibido2 = "";

if($inputRecibido){
    print_r($inputRecibido->usuario);
}
else{
    print_r("Pedro");
}

/*
$inputRecibido = json_decode(file_get_contents('php://input'));

$inputRecibido2 = "Pedro";
*/

/*if($inputRecibido2){
    //print_r($inputRecibido);
    echo json_encode($inputRecibido2);
}
else{
    print_r("");
}*/

/*
if($inputRecibido2){
    echo json_encode($inputRecibido2);
}
else if ($inputRecibido2 == null) {
    print_r("");
}
else(
    print_r("ERROR")
)
*/ 
?>