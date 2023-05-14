<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: access");
header("Access-Control-Allow-Methods: POST");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-Width");
header("Access-Control-Allow-Origin: http://localhost:3000");

//Recogemos la información que nos pasen por POST 
$inputRecibido = json_decode(file_get_contents('php://input'));

$r_nombre = $inputRecibido[0];
$r_categoria = $inputRecibido[1];
$r_descripcion = $inputRecibido[2];
$r_precio = $inputRecibido[3];
$r_porcentaje_precio = $inputRecibido[4];


if(isset($_FILES['imagen'])){
    $nombreArchivo = $_FILES['file']['name']; // Obtener el nombre del archivo subido
    $rutaTemporal = $_FILES['file']['tmp_name']; // Obtener la ubicación temporal del archivo subido

    // Ruta de destino donde quieres guardar la imagen
    $rutaDestino = 'C:\Users\Alex\Desktop\cratoss-proyecto\Cratos-tfg\src\Main\img\\' . $nombreArchivo;

    // Mover el archivo a la ubicación deseada
    if (move_uploaded_file($rutaTemporal, $rutaDestino)) {
        // Archivo movido exitosamente
        echo 'Archivo subido y guardado correctamente.';
    } else {
        // Error al mover el archivo
        echo 'Error al mover el archivo.';
}
}

include("connection.php");

//Creamos consulta select para recoger toda info del id pasado por input
$consulta99 = 'SELECT * FROM productos WHERE nombre = "'.$r_nombre.'" ;';
            $result = mysqli_query($conexion,$consulta99);
            
            if(mysqli_num_rows($result) > 0){
                echo("Ya existe ");
            }
            else{
                $consulta22 = 'INSERT INTO productos(nombre,categoria,descripcion,precio,porcentaje_oferta) VALUES ("'.$r_nombre.'","'.$r_categoria.'","'.$r_descripcion.'",'.$r_precio.','.$r_porcentaje_precio.');';
                $result2 = mysqli_query($conexion,$consulta22);
                echo($result2);
            }
?>