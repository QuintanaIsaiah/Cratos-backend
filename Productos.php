<?php
header("Access-Control_Allow-Origin: *");
header("Access-Control-Allow-Headers: access");
header("Access-Control-Allow-Methods: POST");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-Width");
header("Access-Control-Allow-Origin: http://localhost:3000");


include("connection.php");

    //Creamos funcion para insertar productos, y si ya existen que no los cree
    
    function insertarProductos($nombre,$categoria,$descripcion,$precio,$porcentaje_precio){
        include("connection.php");

        $conexion = $GLOBALS["conexion"];

        $consulta = 'SELECT * FROM productos WHERE nombre = "'.$nombre.'" ;';
        $result = mysqli_query($conexion,$consulta);
        
        if(mysqli_num_rows($result) > 0){
            //echo("Ya existe ");
        }
        else{
            $consulta2 = 'INSERT INTO productos(nombre,categoria,descripcion,precio,porcentaje_oferta) VALUES ("'.$nombre.'","'.$categoria.'","'.$descripcion.'",'.$precio.','.$porcentaje_precio.');';
            $result2 = mysqli_query($conexion,$consulta2);
            //echo($result2);
        }
    }

    //Productos
    insertarProductos("producto1","montaña","lorem",3,4);
    insertarProductos("producto2","natacion","lorem",3,4);
    insertarProductos("producto3","tierra","lorem",3,4);
    insertarProductos("producto4","tierra","lorem",3,4);
    insertarProductos("producto5","montaña","lorem",3,4);
    insertarProductos("producto7","natacion","lorem",3,4);

    //Hacemos consulta para mostrar todos los productos

    $conexion = $GLOBALS["conexion"];

    $consulta3 = 'SELECT * FROM productos;';
    $result3 = mysqli_query($conexion,$consulta3);

    while($lista = mysqli_fetch_array($result3)){
        
        extract($lista);

            $listado = [];
            $listado[0] = $nombre;
            $listado[1] = $categoria;
            $listado[2] = $descripcion;
            $listado[3] = $precio;
            $listado[4] = $porcentaje_oferta;

            echo(json_encode($listado));
    }

?>