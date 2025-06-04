<?php

include("../connection.php");
$con = connection();

// Si no se definió usuario, nada que hacer

// ID_discografia es AUTO INCREMENT
$nombre = $_POST["nombre"];

$sql = "INSERT INTO genero VALUES(null,'$nombre')";

$query = mysqli_query($con, $sql);

if($query){
    Header("Location: index.php");
}else{

}

?>
