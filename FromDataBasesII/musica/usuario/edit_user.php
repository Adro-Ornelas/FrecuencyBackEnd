<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

include("../connection.php");
$con = connection();

$id=$_POST['id'];
$nombre = $_POST['nombre'];
$apep = $_POST['apellidop'];
$apem = $_POST['apellidom'];
$email = $_POST['email'];
$password = $_POST['password'];


$sql="UPDATE usuario SET Nombre='$nombre', Apellido_Paterno='$apep', Apellido_Materno='$apem', Password='$password', Email='$email' WHERE id_usuario='$id'";
$query = mysqli_query($con, $sql);

if($query){
    Header("Location: index.php");
}else{

}

?>
