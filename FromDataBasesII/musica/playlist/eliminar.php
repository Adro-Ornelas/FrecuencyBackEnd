<?php

include("../connection.php");
$con = connection();

$id=$_GET["id"];

$sql="DELETE FROM playlist WHERE id_playlist='$id'";
$query = mysqli_query($con, $sql);

if($query){
    Header("Location: index.php");
}else{

}

?>
