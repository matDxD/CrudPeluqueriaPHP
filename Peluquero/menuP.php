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
include('../class/classP.php');

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
    <title>REGISTRO DE PELUQUEEO</title>
</head>

<body>
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
        <h2 class="titulo-principal">GESTION DE PELUQUERO</h2>
        <div class="card-body">
                <form name="form" action="insertP.php" method="post">
                    <div class="row">
                        <div class="col-md-6">
                            <label for="cedula">cedula</label>
                            <input type="number" name="cedulaP" class="input-padron" placeholder="DIGITE LA CEDULA">
                        </div>
                        <div class="col-md-6">
                            <label for="nom">NOMBRE</label>
                            <input type="text" name="nombreP" class="input-padron" placeholder="DIGITE EL NOMBRE">
                        </div>
           
                        <div class="col-md-6">
                            <label for="em">CORREO</label>
                            <input type="email" name="Correo" class="input-padron" placeholder="DIGITE EL CORREO">
                      </div>
                       <div class="col-md-6">
                            <label for="Fecha">FECHA CONTRATO.</label>
                            <input type="date" name="Fecha" class="input-padron">
                        </div> 
                        <div class="col-md-12">
                            <br>
                            <input type="submit" class="enviar" value="REGISTRAR CLIENTE">
                        </div>
                </form>
            </div>
            <?php
//crear el objeto de la clas Peluqueros
$pelu = new Peluqueros();
$reg=$pelu->veralu();
?>
<div class="table-responsive">
    <table id="pelu" class="table table-bordered table-striped">
        <thead>
            <tr align="center">
                <th>CEDULA</th>
                <th>NOMBRE</th>
                <th>DIRECCION</th>
                <th>FECHACONTRATO</th>
                <th>ACCIONES</th>
  
                </tr>
</thead>
<tbody>
    <?php
    for($i=0;$i<count($reg);$i++){

       echo "<tr>
        <td>".$reg[$i]['cedulaP']."</td>
        <td>".$reg[$i]['nombreP']."</td>
        <td>".$reg[$i]['Direccion']."</td>
        <td>".$reg[$i]['Fechacontratacion']."</td>";
        ?>
        <td align='center'>
        <button class='btn btn-warning' onclick=window.location="./editarP.php?id=<?php echo $reg[$i]['cedulaP'];?>">

      

        
        <span class="material-symbols-outlined">edit_square</span>
        <button class='btn btn-primary' onclick="eliminar('eliminarP.php?id=<?php echo $reg[$i]['cedulaP'];?>')">
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