<?php

include("../connection.php");
$con = connection();

$playlist = $_GET['playlist'];
$cancion = $_GET['cancion'];

// Elimina la relación (verificando ambas columnas)
$sql="DELETE FROM playlist_cancion
      WHERE ID_playlist='$playlist'
      AND ID_cancion='$cancion'";
$query = mysqli_query($con, $sql);

if($query){
    Header("Location: index.php");
}else{

}

?>
