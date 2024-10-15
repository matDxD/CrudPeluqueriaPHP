<?php

$inn = 500;
if(isset($_SESSION['timeout'])){
    $_session_life = time() - $_SESSION['timeout'];
    if($_session_life > $inn){
        session_destroy();
        header("location:./index.php");
    }
}
$_SESSION['timeout'] = time();
include('../class/classCi.php');

if($_SESSION['usuario']) {
    $id = $_GET['id'];// id_Corte
    ?>
    <!doctype html>
    <html lang="es">

    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- Bootstrap CSS -->
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
    <h2 class="titulo-principal">SELECCIONE PELUQUERO</h2>
        <?php
        //crear el objeto de la clas cort$cortqueros
        $cort = new Cortes();
        $cit = new Citas();
        $alu = new Alumnos();
        $pelu = new Peluqueros();
        $correo = $_SESSION['usuario'];
        $cedulaC = $alu->Obtenercedula($correo);

        $reg = $pelu->veralu();
        ?>
  <div class="table-responsive">
    <form method="POST" action="./insertCi.php">
        <table id="pelu" class="table table-bordered table-striped">
            <thead>
                <tr align="center">
                    <th>NOMBRE</th>
                    <th>ACCIONES</th>
                </tr>
            </thead>
            <tbody>
                <?php
                for ($i = 0; $i < count($reg); $i++) {
                    $cedulaP = $reg[$i]['cedulaP']; // Obtener cedulaP
                    ?>
                    <tr>
                        <td><?php echo $reg[$i]['nombreP']; ?></td>
                        <td align='center'>
                            <button type="submit" name="cedulaP" value="<?php echo $reg[$i]['cedulaP']; ?>" class="btn btn-warning">
                                <span class="material-symbols-outlined">edit_square</span>
                            </button>
                           
                            <input type="hidden" name="id" value="<?php echo $id; ?>">
                        </td>
                    </tr>
                <?php
                }
                ?>
            </tbody>
        </table>
        <input type="hidden" name="cedulaC" value="<?php echo $cedulaC; ?>">
    </form>
</div>
<?php
    /*  function ingresardatos($cedulaP) {
        ?> <h1> Ingreso a datos</h1> <?php
        $alu = new Alumnos(); // Crear instancia de la clase Alumnos
        $cit = new Citas(); // Crear instancia de la clase Citas
        if(isset($_POST['grabar']) && $_POST['grabar'] == "si") {
        
            $correo = $_SESSION['correo'];
            $cedulaC = $alu->Obtenercedula($correo);
            $id = $_GET['id'];
            $cit->insertCita($cedulaC, $cedulaP, $id);
            exit();
        }
    
            
    }  */    

          
                    ?>
                </tbody>
            </table>
        </div>
        <!-- Resto del código HTML y scripts -->
        </section>
    </main>
    <footer>
   
            <img src="../imagenes/logo-blanco.png" alt="Logo de la Barberia Alura">
            <p class="copyright">&copy Copyright Barberia Alura - 2020</p>
        </footer>
    </body>
    </html>
    <?php
} else {
    $_SESSION['usuario'] = NULL;
    echo "
    <script type='text/javascript'>
    Swal.fire({
        icon : 'error',
        title : 'ERROR!!',
        text :  'Debe iniciar sesión en el sistema'
    }).then((result) => {
        if(result.isConfirmed){
            window.location='./index.php';
        }
    });
    </script>";
}
?>
