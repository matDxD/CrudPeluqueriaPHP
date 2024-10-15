<?php
include('../class/classP.php');
//crear el objeto de la clase Peluquero
$pelu = new Peluqueros();
//enviar los datos al metodo insertar
if (isset($_POST['cedulaP'], $_POST['nombreP'], $_POST['Correo'], $_POST['Fecha'])) {
    $cedulaP = $_POST['cedulaP'];
    $nombreP = $_POST['nombreP'];
    $Correo = $_POST['Correo'];
    $Fecha = $_POST['Fecha'];
    
   

    $pelu->insertaPelu($cedulaP, $nombreP, $Correo, $Fecha);
} else {
    echo "No se han recibido los datos esperados.";
}
?>