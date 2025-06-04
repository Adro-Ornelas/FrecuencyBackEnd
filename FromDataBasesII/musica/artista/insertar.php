<?php

include("../connection.php");
$con = connection();

// Si no se definió usuario, nada que hacer

// ID_playlist es AUTO INCREMENT
$nombreA = $_POST["nombreA"];
$nombre = $_POST["nombre"];
$apep = $_POST["apep"];
$apem = $_POST["apem"];

$sql = "INSERT INTO artista VALUES(null,'$nombreA', '$nombre',
        '$apep', '$apem')";

$query = mysqli_query($con, $sql);

if($query){
    Header("Location: index.php");
}else{

}

?>
