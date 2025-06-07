<?php

include("../../connection.php");
$con = connection();

$artista = $_GET['artista'];
$album = $_GET['album'];

// Elimina la relación (verificando ambas columnas)
$sql="DELETE FROM album_artista
      WHERE ID_album='$album'
      AND ID_artista='$artista'";
$query = mysqli_query($con, $sql);

if($query){
    Header("Location: ver_albumes.php?artista=$artista");
}else{

}

?>
