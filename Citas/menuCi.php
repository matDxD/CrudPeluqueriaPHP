<?php

$inn=500;
if(isset($_SESSION['timeout'])){
    $_session_life = time() - $_SESSION['timeout'];
     if($_session_life > $inn){
        session_destroy();
        header("location:./index.php");
     }
}
$_SESSION['timeout']=time();
include('../class/classCi.php');

if($_SESSION['usuario']){
?>
<!doctype html>
<html lang="es">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <!--<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">-->
    <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="../sw/dist/sweetalert2.min.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,400,0,0" />
    <script type="text/javascript" language="Javascript" src="../js/funciones.js"></script>
    <link rel="stylesheet" href="../css/reset.css">
    <link rel="stylesheet" href="../css/style.css">
    <link href="https://fonts.googleapis.com/css2?family-Montserrat:wght@3008display-swap" rel="stylesheet">
    <title>REGISTRO DE CITAS</title>
</head>

<body onload="limpiar();">
<header>
            <div class="caja">
                <h1><img src="../imagenes/logo.png"></h1>
                <nav>
                    <ul class="navegacion">
                        <li><a href=../index.php>Home</a></li>
                        <li><a href=../Cortes/menuCiA.php>Agendar</a></li>
                    </ul>
                </nav>
            </div>
        </header>
    <main>
    <section class="diferenciales">
    <div class="container">
    <h2 class="titulo-principal">SELECCIONE CORTE</h2>
<?php
//crear el objeto de la clas cort$cortqueros
$cort = new Cortes();
$cit = new Citas();
$alu = new Alumnos();
$correo = $_SESSION['usuario'];
$cedulaC = $alu->Obtenercedula($correo);

$reg=$cort->veralu();
?>
<div class="table-responsive">
    <table id="cort" class="table table-bordered table-striped">
        <thead>
            <tr align="center">
         
                <th>Nombre</th>
                <th>Precio</th>
                <th>Descripcion</th>
                <th>SELECCIONAR</th>
  
                </tr>
</thead>
<tbody>
    <?php
    for($i=0;$i<count($reg);$i++){

       echo "<tr>
       
        <td>".$reg[$i]['nombre']."</td>
        <td>".$reg[$i]['precio']."</td>
        <td>".$reg[$i]['Descripcion']."</td>";
        ?>
        <td align='center'>
        <button class='btn btn-warning' onclick=window.location="./PeluqueroCi.php?id=<?php echo $reg[$i]['id_Corte'];?>">

      

        
        <span class="material-symbols-outlined">edit_square</span>
    <!--    <button class='btn btn-primary' onclick="eliminar('eliminarCor.php?id=<?php echo $reg[$i]['id_Corte'];?>')">
        <span class="material-symbols-outlined">delete_sweep</span>
    -->
        </td>
        
        </tr>
    <?php
    }
    ?>
</tbody>
</table>

</div>
    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <!--<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>-->
    <script src="../bootstrap/js/bootstrap.min.js"></script>
    <script src="../sw/dist/sweetalert2.min.js"></script>
    <script src="../js/jquery-3.6.1.min.js"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
    -->
</section>
    </main>
    <footer>
   
            <img src="../imagenes/logo-blanco.png" alt="Logo de la Barberia Alura">
            <p class="copyright">&copy Copyright Barberia Alura - 2020</p>
        </footer>
</body>
</html>
<?php
}else{
    $_SESSION['usuario']=NULL;
    echo "
    <script type='text/javascript'>
     Swal.fire({
     icon : 'error',
    title : 'ERROR!!',
     text :  ' Debe iniciar Session en el Sistema'
    }).then((result) => {
         if(result.isConfirmed){
         window.location='./index.php';
        }
    }); </script>";
}
?>