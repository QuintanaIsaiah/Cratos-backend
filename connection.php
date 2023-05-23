<?php

    header("Access-Control_Allow-Origin: *");
    header("Access-Control-Allow-Origin: *");
    header("Access-Control-Allow-Headers: access");
    header("Access-Control-Allow-Methods: POST");
    header("Content-Type: application/json; charset=UTF-8");
    header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

    include './Log/CratosLog.php';

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
                    
                    $consulta3_1 = 'INSERT INTO usuarios(nombre, correo, edad, contrasenya, admin) VALUES("admin","admin@gmail.com", 0, "admin", true);';

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
        porcentaje_oferta int,
        imagen BLOB
    );';
    
    $res4 = mysqli_query($conexion,$consulta4);
        //echo($res4);

        
        //Creamos funcion para insertar productos, y si ya existen que no los cree

        function insertarProductos($nombre,$categoria,$descripcion,$precio,$porcentaje_precio,$imagen){

            $conexion = $GLOBALS["conexion"];

            $consulta99 = 'SELECT * FROM productos WHERE nombre = "'.$nombre.'" ;';
            $result = mysqli_query($conexion,$consulta99);
            
            if(mysqli_num_rows($result) > 0){
                //echo("Ya existe ");
            }
            else{
                $consulta22 = 'INSERT INTO productos(nombre,categoria,descripcion,precio,porcentaje_oferta,imagen) VALUES ("'.$nombre.'","'.$categoria.'","'.$descripcion.'",'.$precio.','.$porcentaje_precio.',"'.$imagen.'");';
                $result2 = mysqli_query($conexion,$consulta22);
                //echo($result2);
            }
        }
        
        //Para que no se vuelvan a crear cuando los eliminemos hay que comentar los "insertarProductos"
        //Productos
        

        include("imagen.php");

        

        insertarProductos("producto1","montanya","lorem",48,0,$b);
        insertarProductos("producto2","natacion","lorem",60,0,$b);
        insertarProductos("producto3","tierra","lorem",35,20,$b);
        insertarProductos("producto4","tierra","lorem",32,0,$l);
        insertarProductos("producto5","montanya","lorem",30,0,$l);
        insertarProductos("producto6","natacion","lorem",70,50,$n);
        insertarProductos("producto7","natacion","lorem",90,0,$n);
        insertarProductos("producto8","tierra","lorem",52,0,$n);
        insertarProductos("Corrector de brazada","Natacion","Corrector de brazada Finis Forearm Fulcrum Senior amarillo",31,30,$l);
        insertarProductos("fgfdgfdgdf","Natacion","kdskfkdskfdksfk",10,50,$n);

        
    
    //Creamos tabla carro
    $consulta_c = 'CREATE TABLE IF NOT EXISTS carro (
        id int auto_increment primary key,
        nombre varchar(255),
        categoria varchar(255),
        descripcion varchar(255),
        precio int,
        porcentaje_oferta int,
        imagen BLOB,
        id_nombre int,
        constraint fk_usuarios FOREIGN KEY (id_nombre) REFERENCES Usuarios (id)
    );';

    $result_c = mysqli_query($conexion,$consulta_c);
    






?>