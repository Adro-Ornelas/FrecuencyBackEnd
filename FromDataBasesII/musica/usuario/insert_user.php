<?php


ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);


include("../connection.php");
$con = connection();

$id = null;
$nombre = $_POST['nombre'];
$apep = $_POST['apellidop'];
$apem = $_POST['apellidom'];
$email = $_POST['email'];
$password = $_POST['password'];
//BCRYPT es el algoritmo de encriptacion, devuelve cadena de 60 caracteres
$passwordHash = password_hash($contraseña, PASSWORD_BCRYPT);

$sql = "INSERT INTO usuario(Nombre, Apellido_Paterno, Apellido_Materno, Email, Password) VALUES('$nombre','$apep','$apem','$email','$passwordHash')";

$query = mysqli_query($con, $sql);

if($query){
    Header("Location: index.php");
}else{

}

?>
