<?php
    
    

    $_SESSION["prueba2"] = 1;

    header("Access-Control_Allow-Origin: *");
    header("Access-Control-Allow-Origin: *");
    header("Access-Control-Allow-Headers: access");
    header("Access-Control-Allow-Methods: POST");
    header("Content-Type: application/json; charset=UTF-8");
    header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

    session_start();
    include("connection.php");

    //Guardamos en una variable el contenido decodificado (parseado) de JSON a Objeto
    $inputRecibido = json_decode(file_get_contents('php://input'));

    //Guardamos en variables la información dentro del objeto
    $nombre = $inputRecibido -> usuario;
    $contrasenya = $inputRecibido -> contrasenya;

    
    $conexion = $GLOBALS["conexion"];

    $consulta = 'SELECT * FROM usuarios WHERE nombre = "'.$nombre.'" AND contrasenya = "'.$contrasenya.'";';

    $result = mysqli_query($conexion,$consulta);

    $response = array();
    
    if(mysqli_num_rows($result) > 0){
        $response["code"] = 0;
        $response["message"] = "Usuario encontrado";
    }
    else{
        $response["code"] = 1;
        $response["message"] = "Usuario no encontrado";
    }

    echo json_encode($response);
?>