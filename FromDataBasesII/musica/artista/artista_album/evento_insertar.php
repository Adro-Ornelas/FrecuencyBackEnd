<?php

include("../../connection.php");
$con = connection();

// ID_album es AUTO INCREMENT
$artista = $_POST['artista'];
$album = $_POST['album'];

$sql = "INSERT INTO album_artista VALUES(null, '$artista', '$album')";

$query = mysqli_query($con, $sql);

if($query){
    Header("Location: ver_albumes.php?artista=$artista");
}else{

}

?>
