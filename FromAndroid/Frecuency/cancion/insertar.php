<?php

include("../connection.php");
$con = connection();

// Si no se definió usuario, nada que hacer
if(! (isset($_POST['album']) && isset($_POST['genero'])))
    die("Datos incompletos");

// ID_playlist es AUTO INCREMENT
$titulo = $_POST["titulo"];
$genero = $_POST["genero"];
$album = $_POST["album"];
$letra = $_POST["letra"];
$duracion = $_POST["duracion"];
$fecha = $_POST["fecha"];
$mp3 = $_POST['mp3'];

$sql = "INSERT INTO cancion
        VALUES(null, '$genero','$album', '$titulo', '$letra',
        '$duracion', '$fecha', '$mp3')";
$query = mysqli_query($con, $sql);

if($query){
    Header("Location: index.php");
}else{

}

?>
