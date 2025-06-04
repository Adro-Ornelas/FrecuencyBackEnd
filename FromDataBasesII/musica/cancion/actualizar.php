<?php

include("../connection.php");
$con = connection();

// ID_playlist es AUTO INCREMENT
$usuario = $_POST['usuario'];
$nombre = $_POST['nombre'];
$fecha = $_POST['fecha'];

$sql="UPDATE usuario SET Nombre='$nombre', Apellido_Paterno='$apep', Apellido_Materno='$apem', Password='$password', Email='$email' WHERE id_usuario='$id'";
$query = mysqli_query($con, $sql);

if($query){
    Header("Location: index.php");
}else{

}

?>
