<?php

include("../connection.php");
$con = connection();

$id= $_POST["id"];
$nombreA = $_POST["nombreA"];
$nombre = $_POST["nombre"];
$apep = $_POST["apep"];
$apem = $_POST["apem"];

$sql=  "UPDATE artista SET Nombre_artistico='$nombreA', Nombre='$nombre',
        Apellido_Paterno='$apep', Apellido_Materno='$apem'
        WHERE ID_artista='$id'";
$query = mysqli_query($con, $sql);

if($query){
    Header("Location: index.php");
}else{

}

?>
