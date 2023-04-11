<?php
    session_start();

    $_SESSION["prueba2"] = 1;

    header("Access-Control_Allow-Origin: *");
    header("Access-Control-Allow-Origin: *");
    header("Access-Control-Allow-Headers: access");
    header("Access-Control-Allow-Methods: POST");
    header("Content-Type: application/json; charset=UTF-8");
    header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-Width");

    //Guardamos en una variable el contenido decodificado (parseado) de JSON a Objeto
    $inputRecibido = json_decode(file_get_contents('php://input'));

    //Guardamos en variables la información dentro del objeto
    $nombre = $inputRecibido -> nombre;
        //print_r($nombre);
    $contrasenya = $inputRecibido -> contrasenya;
        //print_r($contrasenya);


    include("conexion.php");

    $conexion = $GLOBALS["conexion"];

    $consulta = 'SELECT * FROM usuarios WHERE nombre = "'.$nombre.'" AND contrasenya = "'.$contrasenya.'";';

    $result = mysqli_query($conexion,$consulta);

        while($list = mysqli_fetch_array($result)){
            extract($list);
                //print_r("El nombre del usuario es :".$nombre);

            if($nombre == "admin" || $contrasenya == "admin"){
                print_r(1);
            }
            else if($nombre){
                print_r(2);
            }
            else{
                print_r(0);
            }
        }
    
    /*
    include("conexion.php");

    $conexion = $GLOBALS["conexion"];

    $consulta = 'INSERT INTO usuarios(nombre,apellidos,edad,correo,contrasenya) VALUES("'.$nombre.'","'.$apellidos.'",'.$edad.',"'.$correo.'","'.$contrasenya.'");';

    $res = mysqli_query($conexion,$consulta);
        print_r($res);
    */
    
   
?>