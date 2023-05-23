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
$r_imagen = $inputRecibido[5];

/*
// Directorio de destino para guardar las imágenes
$directorioDestino = 'C:\xampp\htdocs\Cratos-backend\prueba';
echo($directorioDestino."|");

// Genera un nombre de archivo único para evitar conflictos
$nombreArchivo = 11 . '.png';
echo($nombreArchivo."|");

// Ruta completa del archivo de destino
$rutaDestino = $directorioDestino . $nombreArchivo;
echo($rutaDestino."|");

// Guarda el contenido de la imagen en el archivo de destino
if (file_put_contents($rutaDestino, base64_decode($r_imagen))) {
  // El archivo se guardó correctamente
  // Puedes hacer cualquier otra operación necesaria aquí
  echo 'Imagen guardada correctamente.';
} else {
  // Error al guardar el archivo
  echo 'Error al guardar la imagen.';
}
*/

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