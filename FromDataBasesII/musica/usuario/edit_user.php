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
$password_old = $_POST['password_old'];

// Si contraseña nueva es null, se mantiene la anterior
if($password == null)
    $password = $password_old;

//BCRYPT es el algoritmo de encriptacion, devuelve cadena de 60 caracteres
$passwordHash = password_hash($password, PASSWORD_BCRYPT);

$sql="UPDATE usuario SET Nombre='$nombre', Apellido_Paterno='$apep',
      Apellido_Materno='$apem', Password='$passwordHash', Email='$email'
      WHERE id_usuario='$id'";
$query = mysqli_query($con, $sql);

if($query){
    Header("Location: index.php");
}else{

}

?>
