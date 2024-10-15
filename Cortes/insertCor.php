<?php
include('../class/classCor.php');
//crear el objeto de la clase   
$cort = new Cortes();
//enviar los datos al metodo insertar
if (isset($_POST['id_Corte'], $_POST['nombre'], $_POST['precio'], $_POST['Descripcion'])) {
    $id_Corte = $_POST['id_Corte'];
    $nombre = $_POST['nombre'];
    $precio = $_POST['precio'];
    $Descripcion = $_POST['Descripcion'];
    
   

    $cort->insertCorte($id_Corte, $nombre, $precio, $Descripcion);
} else {
    echo "No se han recibido los datos esperados.";
}
?>