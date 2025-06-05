<?php

include("../connection.php");
$con = connection();

// Si no se definió usuario, nada que hacer
if(! (isset($_POST['playlist']) && isset($_POST['cancion'])) )
	die("Datos incompletos");

// Estas variables contienen los ID de cada entidad
$playlist = $_POST['playlist'];
$cancion = $_POST['cancion'];

$sql = "INSERT INTO playlist_cancion
        VALUES('$playlist','$cancion')";
        
$query = mysqli_query($con, $sql);

if($query){
    Header("Location: index.php");
}else{

}

?>
