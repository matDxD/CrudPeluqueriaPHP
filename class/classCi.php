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
    <script type="text/javascript" language="Javascript" src="../js/funciones.js"></script>
   
    <title>Citas</title>
</head>

<body>
    <?php
    include('../class/class_log.php');
/*class Conectar{
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
}*/



            
    

class Cortes{
    private $cort;
   
    public function __construct(){
       $this->cort = array();
    }
   
    public function veralu(){
       $sql="select * from cortes";
       $res = mysqli_query(Conectar::conec(), $sql) or die("ERROR en la Consulta $sql: " .mysqli_error());
   
       //recorrer la tabla de cortes
       while($row=mysqli_fetch_assoc($res)){
           $this->cort[]= $row;
       }
       return $this->cort;       
    }
}

class Peluqueros{
    private $pelu;
   
    public function __construct(){
       $this->pelu = array();
    }
   
    public function veralu(){
       $sql="select * from peluquero";
       $res = mysqli_query(Conectar::conec(), $sql) or die("ERROR en la Consulta $sql: " .mysqli_error());
   
       //recorrer la tabla Peluqueros
       while($row=mysqli_fetch_assoc($res)){
           $this->pelu[]= $row;
       }
       return $this->pelu;       
    }
}
class AlumnosC{
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
     
        if ($row = mysqli_fetch_assoc($res)) {
            $cedulaC = intval($row['cedulaC']); // Convertir a entero
            return $cedulaC;
        } else {
            return $correo; // Manejar el caso de que no se encuentre la cédula
        }
     }
     
}
class Citas {
    private $cit;

    public function __construct() {
        $this->cit = array();
    }

 

 

 public function veralu(){
    $sql="select * from citas";
    $res = mysqli_query(Conectar::conec(), $sql) or die("ERROR en la Consulta $sql: " .mysqli_error());

    //recorrer la tabla de citas
    while($row=mysqli_fetch_assoc($res)){
        $this->cit[]= $row;
    }
    return $this->cit;       
 }
 public function get_ida($id_Corte){
    $sql="select * from cortes where id_Corte='$id_Corte'";
    $res=mysqli_query(Conectar::conec(),$sql);
    if($row=mysqli_fetch_assoc($res)){
        $this->cort[]=$row;
    }
    return $this->cort;
 }


 public function insertCita($cedulaC, $cedulaP, $id_Corte) {
    $sql = "INSERT INTO citas (cedulaC, cedulaP, id_Corte) VALUES ($cedulaC, $cedulaP, $id_Corte)";
    $res = mysqli_query(Conectar::conec(), $sql);
    if (!$res) {
        echo "Error en la consulta: " . mysqli_error(Conectar::conec());
    } else {
        echo "
        <script type='text/javascript'>
        Swal.fire({
           icon : 'success',
           title : 'Operacion Exitosa!!',
           text :  'Cita insertado Correctamente'
        }).then((result) => {
            if(result.isConfirmed){
                window.location='./Citas/menuCi.php';
            }
        });
        </script>";
    }
}

}



  
 //metodo editar
/*
public function editara($cedulaC, $cedulaP, $id_Corte) {
    $sql = "UPDATE citas SET cedulaC='$cedulaC', cedulaP='$cedulaP', id_Corte='$id_Corte' WHERE ...";
    $res = mysqli_query(Conectar::conec(), $sql);
    if (!$res) {
        echo "Error en la consulta: " . mysqli_error(Conectar::conec());
    } else {
        echo "
        <script type='text/javascript'>
        Swal.fire({
           icon: 'success',
           title: 'Operacion Exitosa!!',
           text: 'Datos editados Correctamente'
        }).then((result) => {
           if(result.isConfirmed) {
               window.location='./Citas/menuCor.php';
           }
        });
        </script>";
    }
}



 //metodo para trar el id del corte

 public function get_ida($id_Corte){
    $sql="select * from cortes where id_Corte='$id_Corte'";
    $res=mysqli_query(Conectar::conec(),$sql);
    if($row=mysqli_fetch_assoc($res)){
        $this->cort[]=$row;
    }
    return $this->cort;
 }


 //metodo eliminar
 /*
 public function eliminara(
    $sql="delete from citas where;
    $res=mysqli_query(Conectar::conec(),$sql);
    echo "
   <script type='text/javascript'>
   Swal.fire({
      icon : 'success',
      title : 'Operacion Exitosa!!',
      text :  'El corte con id ue eliminado Correctamente'
   }).then((result) => {
       if(result.isConfirmed){
           window.location='./citas/menuCor.php';
       }
   }); </script>
   ";

 } */
 
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