<?php

include("../connection.php");
$con = connection();

$id= $_POST['id'];
$usuario = $_POST['usuario'];
$nombre = $_POST['nombre'];
$fecha = $_POST['fecha'];

$sql="UPDATE playlist SET ID_usuario='$usuario', Nombre='$nombre', Fecha_creacion='$fecha'
      WHERE ID_playlist='$id'";
$query = mysqli_query($con, $sql);

if($query){
    Header("Location: index.php");
}else{

}

?>
