<?php
    header("Access-Control_Allow-Origin: *");
    header("Access-Control-Allow-Origin: *");
    header("Access-Control-Allow-Headers: access");
    header("Access-Control-Allow-Methods: POST");
    header("Content-Type: application/json; charset=UTF-8");
    header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");
    
    include("connection.php");

    //Guardamos en una variable el contenido decodificado (parseado) de JSON a Objeto
    $inputRecibido = json_decode(file_get_contents('php://input'));

    //Guardamos en variables la información dentro del objeto
    $nombre = $inputRecibido -> usuario;
    $contrasenya = $inputRecibido -> contrasenya;
    $encontrado = false;

    session_start();
    $_SESSION["usuario"] = $nombre;
    
    $conexion = $GLOBALS["conexion"];

    $consulta = 'SELECT * FROM usuarios WHERE nombre = "'.$nombre.'" AND contrasenya = "'.$contrasenya.'";';

    $result = mysqli_query($conexion,$consulta);

    $response = array();

    while ($resultList = mysqli_fetch_array($result)) {
        extract($resultList);
        $response["resultado"] = $result;
        $response["code"] = 0;
        $response["message"] = "Usuario encontrado";
        
    }
    
    // if(mysqli_num_rows($result) > 0){
    //     $response["code"] = 0;
    //     $response["message"] = "Usuario encontrado";
    // }
    // else{
    //     $response["code"] = 1;
    //     $response["message"] = "Usuario no encontrado";
    // }

    echo json_encode($response);
?>