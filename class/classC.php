<!doctype html>
<html lang="es">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <!--<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">-->
    <link rel="stylesheet" href="./bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="./sw/dist/sweetalert2.min.css">
    <script type="text/javascript" language="Javascript" src="./js/funciones.js"></script>
   
    <title>ALUMNOS</title>
</head>

<body>
    <?php
class Conectar{
    public static function conec(){
        $servername = "localhost";
        $username = "root";
        $password = "";
        $database = "PeluqueriaBD";
        //conectarnos a la BD
        $link=$conexion = new mysqli($servername,$username,$password,$database)
         or die ("ERROR Al conectar la BD".mysqli_error($link));
         //seleccionar la BD
         mysqli_select_db($link,$database) 
          or die ("ERROR Al seleccionar la BD".mysqli_error($link));
          return $link;
    }   
}
class Alumnos{
 private $alum;

 public function __construct(){
    $this->alum = array();
 }

 public function veralu(){
    $sql="select * from clientes";
    $res = mysqli_query(Conectar::conec(), $sql) or die("ERROR en la Consulta $sql: " .mysqli_error());

    //recorrer la tabla alumnos
    while($row=mysqli_fetch_assoc($res)){
        $this->alum[]= $row;
    }
    return $this->alum;       
 }

 public function Obtenercedula($correo){
    $sql = "SELECT cedulaC FROM clientes WHERE Correo ='$correo'";
    $res = mysqli_query(Conectar::conec(), $sql) or die("ERROR en la Consulta $sql: " . mysqli_error());
    return $res;
}

 public function insertalum($cedulaC, $nombreC, $Correo, $Numero) {
    $sql = "INSERT INTO clientes VALUES ('$cedulaC', '$nombreC', '$Correo', '$Numero', '123')";
    $res = mysqli_query(Conectar::conec(), $sql);
    if (!$res) {
        echo "Error en la consulta: " . mysqli_error(Conectar::conec());
    } else {
        echo "
        <script type='text/javascript'>
        Swal.fire({
           icon : 'success',
           title : 'Operacion Exitosa!!',
           text :  'Alumno insertado Correctamente'
        }).then((result) => {
            if(result.isConfirmed){
                window.location='./Clientes/menuc.php';
            }
        });
        </script>";
    }
}


  
 //metodo editar
 public function editara($cedulaC,$nombreC,$Correo,$Numero){
  $sql="update clientes set nombreC='$nombreC',Correo='$Correo',Numero='$Numero' where cedulaC='$cedulaC'";
   $res=mysqli_query(Conectar::conec(),$sql);
   echo "
   <script type='text/javascript'>
   Swal.fire({
      icon : 'success',
      title : 'Operacion Exitosa!!',
      text :  'Datos editados Correctamente'
   }).then((result) => {
       if(result.isConfirmed){
           window.location='./Clientes/menuc.php';
       }
   });
   </script>";

 }

 //metodo para trar el id del alumno

 public function get_ida($cedulaC){
    $sql="select * from clientes where cedulaC='$cedulaC'";
    $res=mysqli_query(Conectar::conec(),$sql);
    if($row=mysqli_fetch_assoc($res)){
        $this->alum[]=$row;
    }
    return $this->alum;
 }

 //metodo eliminar
 public function eliminara($cedulaC){
    $sql="delete from clientes where cedulaC='$cedulaC'";
    $res=mysqli_query(Conectar::conec(),$sql);
    echo "
   <script type='text/javascript'>
   Swal.fire({
      icon : 'success',
      title : 'Operacion Exitosa!!',
      text :  'El cliente con cedula $cedulaC fue eliminado Correctamente'
   }).then((result) => {
       if(result.isConfirmed){
           window.location='./Clientes/menuc.php';
       }
   }); </script>
   ";

 }
}
?>
<!--  -->
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
</body>

</html>