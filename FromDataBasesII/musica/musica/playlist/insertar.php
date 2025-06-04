<?php

include("../connection.php");
$con = connection();


// ID_playlist es AUTO INCREMENT
$usuario = $_POST['usuario'];
$nombre = $_POST['nombre'];
$fecha = $_POST['fecha'];

if($usuario == 0)
	die("Usuario invalido");

$sql = "INSERT INTO playlist(ID_usuario, Nombre, Fecha_creacion) VALUES('$usuario','$nombre','$fecha')";

$query = mysqli_query($con, $sql);

if($query){
    Header("Location: index.php");
}else{

}

?>
