<?php
session_start();
include('classC.php');




class Login {

   
   
    public function validar($user, $pass, $captcha) {
        // Validar el CAPTCHA ingresado por el usuario
        $_SESSION['correo'] =$user;
        if ($captcha !== $captcha) {
            echo 
            "<script type='text/javascript'>
            Swal.fire({
                icon: 'error',
                title: 'ERROR!!',
                text: 'El texto del CAPTCHA es incorrecto. El valor ingresado es: 
                if (result.isConfirmed) {
                    window.location='./index.php';
                }
            });
        </script>";
        return;
    }

        // Validar si el usuario existe o no
        $sql = "SELECT * FROM clientes WHERE Correo='$user'";
        $res = mysqli_query(Conectar::conec(), $sql);

        if ($row = mysqli_fetch_array($res)) {
            $sql1 = "SELECT * FROM clientes WHERE Correo='$user' AND Pass='$pass'";
            $Rol = $row['Rol'];
            $res1 = mysqli_query(Conectar::conec(), $sql1);

            if ($row1 = mysqli_fetch_array($res1)) {
                if ($Rol == '1') {
                    // Se crea la variable de SESIÓN
                    $_SESSION['correo'] =$user;
                    $_SESSION['usuario'] = $row1['nombreC'];
                    echo "
                    <script type='text/javascript'>
                     Swal.fire({
                     icon : 'success',
                    title : 'BIENVENIDO',
                     text :  ' $_SESSION[usuario] al Sistema'
                    }).then((result) => {
                         if(result.isConfirmed){
                         window.location='./menua.php';
                        }
                    }); </script>";
                } elseif ($Rol == '0') {
                    $_SESSION['correo'] =$user;
                    $_SESSION['usuario'] = $row1['nombreC'];
                    echo "
                    <script type='text/javascript'>
                     Swal.fire({
                     icon : 'success',
                    title : 'BIENVENIDO',
                     text :  ' $_SESSION[usuario] al Sistema'
                    }).then((result) => {
                         if(result.isConfirmed){
                         window.location='./Citas/menuCi.php';
                        }
                    }); </script>";
                }
            } else {
                $_SESSION['correo'] =$user;
                $_SESSION['usuario'] = NULL;
                echo "
                <script type='text/javascript'>
                 Swal.fire({
                 icon : 'error',
                title : 'ERROR!!',
                 text :  'El usuario $user o contraseña no son correctos'
                }).then((result) => {
                     if(result.isConfirmed){
                     window.location='./index.php';
                    }
                }); </script>";
             }
        } else {
            $_SESSION['correo'] =$user;
            echo "
                <script type='text/javascript'>
                 Swal.fire({
                 icon : 'error',
                title : 'ERROR!!',
                 text :  'El usuario $user no existe en el sistema'
                }).then((result) => {
                     if(result.isConfirmed){
                     window.location='./index.php';
                    }
                }); </script>";
        }
    }
}

/*$log = new Login();

$user = $_POST['user'];
$pass = $_POST['passw'];
$captcha = $_POST['captcha'];
$log->validar($user, $pass, $captcha);
$_SESSION['correo'] = $user;*/
?>
