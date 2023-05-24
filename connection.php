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

        

        insertarProductos("Arnés acuatico","natacion","Tiene correas ajustables que se colocan alrededor del cuerpo del usuario para asegurar un ajuste cómodo y seguro. Estas correas están hechas de materiales resistentes al agua, como nylon o poliéster, que son duraderos y capaces de soportar el peso del usuario en el agua.",58,0,$arnes);
        insertarProductos("Grua B540 pool","natacion","Capacidad de girar o desplazarse horizontalmente a lo largo del borde de la piscina. Esto permite una mayor versatilidad al posicionar la grúa en el lugar óptimo para realizar la transferencia de manera eficiente y segura.",460,0,$gruaPiscina);
        insertarProductos("Protesis ","natacion","La prótesis de pierna acuática se construye con materiales resistentes al agua y a la corrosión, lo que garantiza su durabilidad y rendimiento en entornos acuáticos. Su diseño se adapta a la anatomía del usuario, proporcionando un ajuste seguro y cómodo.",185,50,$protesis1);
        insertarProductos("Silla de L33 Pool","natacion","La silla acuática cuenta con un diseño resistente al agua y a la corrosión, utilizando materiales duraderos y de alta calidad que garantizan su longevidad y funcionamiento óptimo en ambientes acuáticos. Está construida con una estructura robusta y estable que brinda un soporte seguro durante el uso.",88,0,$sillaPiscina);

        insertarProductos("Tabla de Surf","surf","La tabla de surf adaptada cuenta con características que la hacen accesible y segura. Puede tener una plataforma más amplia y estable para proporcionar un mayor equilibrio, especialmente para aquellos con dificultades de movilidad.",210,0,$tablaSurf);
        insertarProductos("Asiento pra tabla","surf","La silla proporciona un asiento cómodo con respaldo y apoyabrazos, ofreciendo soporte y estabilidad al usuario mientras surfea. Puede tener correas de seguridad y sujetadores ajustables para garantizar que el usuario esté bien sujeto a la silla y evite caídas o deslizamientos.",45,50,$sillaSurf);
        insertarProductos("Silla para la arena","surf","La silla adaptada para la playa es un dispositivo diseñado para brindar accesibilidad y comodidad a las personas con discapacidades al disfrutar de la playa y sus alrededores. Esta silla está especialmente diseñada para navegar sobre arena suelta y terrenos irregulares, permitiendo a los usuarios moverse con facilidad y seguridad.",90,0,$sillaPlaya);
        insertarProductos("Traje Neopreno","surf","El diseño del traje de neopreno puede incluir aberturas estratégicamente ubicadas, cierres ajustables o velcros para facilitar la colocación y la extracción del traje, incluso para aquellos con dificultades para mover ciertas partes del cuerpo. ",52,0,$trajeSurf);

        insertarProductos("Esqui HG503 ADT","esqui","Es un equipo diseñado para brindar accesibilidad, estabilidad y comodidad a aquellos con movilidad reducida, permitiéndoles disfrutar de la emoción y la experiencia del esquí acuático de manera segura y satisfactoria.",986,0,$esquiPro);
        insertarProductos("Esqui MonKit","esqui","Es un equipo diseñado para deslizarse sobre el agua mientras es arrastrado por una embarcación a motor. Esta tabla combina características del snowboard y el surf, ofreciendo una emocionante experiencia de deslizamiento sobre el agua.",600,0,$esquiMon);
        insertarProductos("Esqui DuoGe","esqui","Equipo diseñado para aclope de silla, u tipo de sijecció para todo tipo adaptabilidad de buenos material resistentes al agua",360,0,$esquiDuo);
        insertarProductos("Cuerdas y asas","esqui","Equipo necesario para poder aclopar la tabla con un embarque a motor o vela para disfritar la velocidad y seguridad",70,0,$esquiCuerda);

        
    
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