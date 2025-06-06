<?php

include("../connection.php");
$con = connection();

$playlist = $_POST['playlist'];
$cancion = $_POST['cancion'];

// Solo actualiza la cancion
$sql="UPDATE playlist_cancion SET ID_cancion='$cancion'
      WHERE ID_playlist='$playlist'";
$query = mysqli_query($con, $sql);

if($query){
   Header("Location: index.php");
}else{

}

?>
