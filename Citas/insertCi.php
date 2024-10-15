<?php
include('../class/classCi.php');
// crear el objeto de la clase
$cit = new Citas();
$alu = new AlumnosC();

// enviar los datos al metodo insertar
//if(isset($_POST['grabar']) && $_POST['grabar'] == "si") {
    if(isset($_POST['cedulaP']) && isset($_POST['id'])) {
        $cedulaP = $_POST['cedulaP'];
        $correo = $_SESSION['correo'];
        $cedulaC = $alu->Obtenercedula($correo);
        $id = $_POST['id'];
        $cit->insertCita($cedulaC, $cedulaP, $id);
        exit();
    } else {
        echo "Faltan datos necesarios para procesar la solicitud.";
    }
//} else {
  //  echo "No se han recibido los datos esperados. cedulaP: " . $cedulaP . ", cedulaC: " . $cedulaC . ", id: " . $id;

//}
?>
