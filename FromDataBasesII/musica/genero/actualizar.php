<?php

include("../connection.php");
$con = connection();

$id = $_POST["id"];
$nombre = $_POST["nombre"];;

$sql=  "UPDATE genero
        SET Nombre='$nombre'
        WHERE ID_genero='$id'";
$query = mysqli_query($con, $sql);

if($query){
    Header("Location: index.php");
}else{

}
?>
