<?php

include("../../connection.php");
$con = connection();

// Estas variables contienen los ID de cada entidad
$playlist = $_POST['playlist'];
$cancion = $_POST['cancion'];

// Inserta relación
$sql = "INSERT INTO playlist_cancion
        VALUES('$playlist','$cancion')";
        
$query = mysqli_query($con, $sql);

if($query){
    Header("Location: ver_canciones.php?playlist=$playlist");
}else{

}

?>
