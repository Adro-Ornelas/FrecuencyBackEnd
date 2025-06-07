<?php

include("../connection.php");
$con = connection();

$id=$_GET["id"];

$sql="DELETE FROM escucha WHERE ID_usr_cancion='$id'";
$query = mysqli_query($con, $sql);

if($query){
    Header("Location: index.php");
}else{

}

?>
