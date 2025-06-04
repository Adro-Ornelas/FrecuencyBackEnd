<?php

include("../connection.php");
$con = connection();

$id=$_GET["id"];

$sql="DELETE FROM cancion WHERE ID_cancion='$id'";
$query = mysqli_query($con, $sql);

if($query){
    Header("Location: index.php");
}else{

}

?>
