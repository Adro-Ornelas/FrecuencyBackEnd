<?php

include("../connection.php");
$con = connection();

// Si no se definió usuario, nada que hacer
if( !( isset($_POST["usuario"]) && isset($_POST["cancion"]) ) )
    die("Datos incompletos");

// ID_playlist es AUTO INCREMENT
$usuario = $_POST["usuario"];
$cancion = $_POST["cancion"];
$fecha = $_POST["fecha"];

$sql = "INSERT INTO escucha VALUES(null,'$usuario', '$cancion', '$fecha')";

$query = mysqli_query($con, $sql);

if($query){
    Header("Location: index.php");
}else{

}

?>
