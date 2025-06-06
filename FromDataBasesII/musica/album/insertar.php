<?php

include("../connection.php");
$con = connection();

// Si no se definió usuario, nada que hacer

// ID_album es AUTO INCREMENT
$fecha = $_POST["fecha"];
$disc = $_POST["disc"];
$titulo = $_POST["titulo"];
$imagen = $_POST["imagen"];

$sql = "INSERT INTO album VALUES(null,'$disc', '$titulo', '$fecha', '$imagen')";

$query = mysqli_query($con, $sql);

if($query){
   Header("Location: index.php");
}else{

}

?>
