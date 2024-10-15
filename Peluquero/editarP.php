<?php
include('../class/classP.php');
//creamos el objeto de la clase Peluqueros
$pelu= new Peluqueros();
if(isset($_POST['grabar']) && $_POST['grabar']=="si"){
    $pelu->editara($_POST['id'], $_POST['nombreP'], $_POST['Direccion'], $_POST['FechaCon']);
    exit();
}
$reg=$pelu->get_ida($_GET['id']);
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
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,400,0,0" />
    <script type="text/javascript" language="Javascript" src="../js/funciones.js"></script>
    <link rel="stylesheet" href="../css/reset.css">
    <link rel="stylesheet" href="../css/style.css">
    <link href="https://fonts.googleapis.com/css2?family-Montserrat:wght@3008display-swap" rel="stylesheet">
    <title>REGISTRO DE PELUQUERO</title>
</head>

<body onload="limpiar();">
<header>
            <div class="caja">
                <h1><img src="../imagenes/logo.png"></h1>
                <nav>
                    <ul class="navegacion">
                        <li><a href=../index.php>Home</a></li>
                        <li><a href=../Cortes/menuCor.php>Cortes</a></li>
                        <li><a href=../Peluquero/menuP.php>Peluquero</a></li>
                        <li><a href=../Clientes/menuc.php>Cliente</a></li>
                        <li><a href=../salir.php>Salida</a></li>
                    </ul>
                </nav>
            </div>
        </header>
    <main>
        <section class="diferenciales">
        <h2 class="titulo-principal">GESTION DE PELUQUERO</h2>
        <div class="card-body">
                <form name="form" action="editarP.php" method="post">
                    <div class="row">
                        <div class="col-md-6">
                            <label for="id">CEDULA</label>
                            <input type="hidden"  name="grabar" value="si">
                            <input type="number" name="id" class="input-padron" value ="<?php echo $_GET['id'];?>" readonly>
                        </div>
                        <div class="col-md-6">
                            <label for="nombreP">NOMBRE</label>
                            <input type="text" name="nombreP" class="input-padron" value="<?php echo $reg[0]['nombreP'];?>">
                        </div>
                        <div class="col-md-6">
                            <label for="Direccion">DIRECCION</label>
                            <input type="text" name="Direccion" class="input-padron" value="<?php echo $reg[0]['Direccion'];?>">
                        </div>
                        <div class="col-md-6">
                            <label for="FechaCon">FECHACONTRATO</label>
                            <input type="date" name="FechaCon" class="input-padron" value="<?php echo $reg[0]['Fechacontratacion'];?>">
                        </div>

                        <div class="col-md-12">
                            <br>
                            <input type="button" class="enviar" value="VOLVER" onclick="window.location='../Peluquero/menuP.php'">
                            <input type="submit" class="enviar" value="EDITAR" onclick="window.location='../Peluquero/menuP.php'">
                        </div>
                </form>
            </div>
        </section>
    </main>

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <!--<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>-->
    <script src="./bootstrap/js/bootstrap.min.js"></script>
    <script src="./sw/dist/sweetalert2.min.js"></script>
    <script src="./js/jquery-3.6.1.min.js"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
    -->
    <footer>
   
            <img src="../imagenes/logo-blanco.png" alt="Logo de la Barberia Alura">
            <p class="copyright">&copy Copyright Barberia Alura - 2020</p>
        </footer>
</body>

</html>