<?php

include("../connection.php");
$con = connection();

// Si no se definió usuario, nada que hacer

// ID_discografia es AUTO INCREMENT
$nombre = $_POST["nombre"];
$logo = $_POST["logo"];

$sql = "INSERT INTO discografia VALUES(null,'$nombre', '$logo')";

$query = mysqli_query($con, $sql);

if($query){
    Header("Location: index.php");
}else{

}

?>
