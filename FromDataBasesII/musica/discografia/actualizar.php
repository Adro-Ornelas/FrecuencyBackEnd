<?php

include("../connection.php");
$con = connection();

$id = $_POST["id"];
$nombre = $_POST["nombre"];
$logo = $_POST["logo"];

$sql=  "UPDATE discografia
        SET Nombre='$nombre', Logo='$logo'
        WHERE ID_discografia='$id'";
$query = mysqli_query($con, $sql);

if($query){
    Header("Location: index.php");
}else{

}

?>
