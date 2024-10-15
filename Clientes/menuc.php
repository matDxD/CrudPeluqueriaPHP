<?php
session_start();
$inn=500;
if(isset($_SESSION['timeout'])){
    $_session_life = time() - $_SESSION['timeout'];
     if($_session_life > $inn){
        session_destroy();
        header("location:./index.php");
     }
}
$_SESSION['timeout']=time();
include('../class/classC.php');

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
    <title>REGISTRO DE CLIENTE</title>
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
                        <li><a href=../Citas/menuCiA.php>Citas</a></li>
                        <li><a href=../salir.php>Salida</a></li>
                    </ul>
                </nav>
            </div>
        </header>
        <main>
        <section class="diferenciales">
        <h2 class="titulo-principal">GESTION DE CLIENTE</h2>
        <div class="card-body">
            <form name="form" action="insert.php" method="post">
  <div class="row">
    <div class="col-md-6">
      <label for="cedula">Cédula</label>
      <input type="number" id="cedulaC" name="cedulaC" class="input-padron" placeholder="DIGITE LA CÉDULA">
    </div>
    <div class="col-md-6">
      <label for="nom">Nombre</label>
      <input type="text" id="nombreC" name="nombreC" class="input-padron" placeholder="DIGITE EL NOMBRE">
    </div>
    <div class="col-md-6">
      <label for="em">Telefono</label>
      <input type="number" id="Correo" name="Correo" class="input-padron" placeholder="DIGITE EL TELEFONO">
    </div>
    <div class="col-md-6">
      <label for="tel">Correo</label>
      <input type="email" id="Numero" name="Numero" class="input-padron" placeholder="DIGITE EL CORREO">
    </div>
  </div>
  <br>
  <input type="submit" class="enviar" value="REGISTRAR CLIENTE" onclick="window.location='./menuc.php'" >
</form>
<?php
//crear el objeto de la clas Alumnos
$alu = new Alumnos();
$reg=$alu->veralu();
?>
<div class="table-responsive">
    <table id="alu" class="table table-bordered table-striped">
        <thead>
            <tr align="center">
                <th>ID</th>
                <th>NOMBRE</th>
                <th>CORREO</th>
                <th>TELEFONO</th>
                <th>ACCIONES</th>
  
                </tr>
</thead>
<tbody>
    <?php
    for($i=0;$i<count($reg);$i++){

       echo "<tr>
        <td>".$reg[$i]['cedulaC']."</td>
        <td>".$reg[$i]['nombreC']."</td>
        <td>".$reg[$i]['Correo']."</td>
        <td>".$reg[$i]['Numero']."</td>";
        ?>
        <td align='center'>
        <button class='btn btn-warning' onclick=window.location="./editar.php?id=<?php echo $reg[$i]['cedulaC'];?>">

      

        
        <span class="material-symbols-outlined">edit_square</span>
        <button class='btn btn-primary' onclick="eliminar('eliminar.php?id=<?php echo $reg[$i]['cedulaC'];?>')">
        <span class="material-symbols-outlined">delete_sweep</span>
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
    <footer>
   
   <img src="../imagenes/logo-blanco.png" alt="Logo de la Barberia Alura">
   <p class="copyright">&copy Copyright Barberia Alura - 2020</p>
</footer>


                        </div>
    </section>
    </main>

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