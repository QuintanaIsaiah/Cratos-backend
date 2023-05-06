<?php

    header("Access-Control_Allow-Origin: *");
    header("Access-Control-Allow-Origin: *");
    header("Access-Control-Allow-Headers: access");
    header("Access-Control-Allow-Methods: POST");
    header("Content-Type: application/json; charset=UTF-8");
    header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

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
        contrasenya varchar(255),
        admin boolean default false
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
                    
                    $consulta3_1 = 'INSERT INTO usuarios(nombre,contrasenya, admin) VALUES("admin","admin", true);';

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

        
        //Creamos funcion para insertar productos, y si ya existen que no los cree

        function insertarProductos($nombre,$categoria,$descripcion,$precio,$porcentaje_precio){

            $conexion = $GLOBALS["conexion"];

            $consulta99 = 'SELECT * FROM productos WHERE nombre = "'.$nombre.'" ;';
            $result = mysqli_query($conexion,$consulta99);
            
            if(mysqli_num_rows($result) > 0){
                //echo("Ya existe ");
            }
            else{
                $consulta22 = 'INSERT INTO productos(nombre,categoria,descripcion,precio,porcentaje_oferta) VALUES ("'.$nombre.'","'.$categoria.'","'.$descripcion.'",'.$precio.','.$porcentaje_precio.');';
                $result2 = mysqli_query($conexion,$consulta22);
                //echo($result2);
            }
        }

        //Productos
        insertarProductos("producto1","montanya","lorem",48,0);
        insertarProductos("producto2","natacion","lorem",60,0);
        insertarProductos("producto3","tierra","lorem",35,20);
        insertarProductos("producto4","tierra","lorem",32,0);
        insertarProductos("producto5","montanya","lorem",30,0);
        insertarProductos("producto6","natacion","lorem",70,50);
        insertarProductos("producto7","natacion","lorem",90,0);
        insertarProductos("producto8","tierra","lorem",52,0);

    
    //Creamos tabla carro
    $consulta_c = 'CREATE TABLE IF NOT EXISTS carro (
        id int auto_increment primary key,
        nombre varchar(255),
        categoria varchar(255),
        descripcion varchar(255),
        precio int,
        porcentaje_oferta int,
        id_nombre int,
        constraint fk_usuarios FOREIGN KEY (id_nombre) REFERENCES Usuarios (id)
    );';

    $result_c = mysqli_query($conexion,$consulta_c);
    






?>