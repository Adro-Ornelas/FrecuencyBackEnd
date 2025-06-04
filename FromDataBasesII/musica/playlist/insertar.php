<?php

include("../connection.php");
$con = connection();

// Si no se definió usuario, nada que hacer
if(!isset(($_POST['usuario'])))
	die("Usuario invalido");

// ID_playlist es AUTO INCREMENT
$usuario = $_POST['usuario'];
$nombre = $_POST['nombre'];
$fecha = $_POST['fecha'];

$sql = "INSERT INTO playlist(ID_usuario, Nombre, Fecha_creacion)
        VALUES('$usuario','$nombre','$fecha')";

$query = mysqli_query($con, $sql);

if($query){
    Header("Location: index.php");
}else{

}

?>
