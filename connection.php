<?php

    $server = "localhost";
    $user = "root";
    $pass = "";
    $db_name = "cratos_db";

    //Conectamos con el servidor
    $conexion = mysqli_connect($server,$user,$pass);

    //Creamos la base de datos
    $consulta = 'CREATE DATABASE IF NOT EXISTS '.$db_name.';';
    $result = mysqli_query($conexion,$consulta);

    $consulta = 'SET SQL_SAFE_UPDATES = 0;';
    $result = mysqli_query($conexion,$consulta);

    //Conectamos con la base de datos
    $consulta = 'USE '.$db_name.';';
    $result = mysqli_query($conexion,$consulta);
        //echo($result);

    //Creamos la tabla Usuarios si no existe
    $consulta = 'CREATE TABLE IF NOT EXISTS Usuarios(
        id int primary key auto_increment,
        nombre varchar(255),
        correo varchar(255),
        edad int,
        contrasenya varchar(255)
    );';
    $result = mysqli_query($conexion,$consulta);
        //echo($result);

        //Creamos un usuario admin
            //Creamos un contador para hacer una exceptcion

            $contador = "";
                
            //Seleccionamos en la tabla usuarios si existe un usuaio admin
            $consulta_admin = 'SELECT * FROm usuarios WHERE nombre = "admin";';

            $result_admin = mysqli_query($conexion,$consulta_admin);

                while($lista = mysqli_fetch_array($result_admin)){
                    
                    //Si existe , al contador le pone un 1
                    if ($lista){
                        $contador = 1;
                    }
                }

                //si el contador esta vacio, no hay usuaior y lo inserta
                if($contador == ""){
                    
                    $consulta3_1 = 'INSERT INTO usuarios(nombre,contrasenya) VALUES("admin","admin");';

                    $res3_1 = mysqli_query($conexion,$consulta3_1);

                    $contador == 1;

                }
    //Creamos tabla productos
    $consulta4 = 'CREATE TABLE IF NOT EXISTS productos(
        id int auto_increment primary key,
        nombre varchar(255),
        categoria varchar(255),
        descripcion varchar(255),
        precio int,
        porcentaje_oferta int
    );';
    
    $res4 = mysqli_query($conexion,$consulta4);
        //echo($res4);

?>