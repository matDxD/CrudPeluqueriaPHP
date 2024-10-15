<?php
include('../class/classC.php');
// crear el objeto de la clase Alumnos
$alu = new Alumnos();

// enviar los datos al método insertalum
if (isset($_POST['cedulaC'], $_POST['nombreC'], $_POST['Correo'], $_POST['Numero'])) {
    $cedulaC = $_POST['cedulaC'];
    $nombreC = $_POST['nombreC'];
    $Numero = $_POST['Numero'];
    $Correo = $_POST['Correo'];
   

    $alu->insertalum($cedulaC, $nombreC, $Correo, $Numero);
} else {
    echo "No se han recibido los datos esperados.";
}
?>
