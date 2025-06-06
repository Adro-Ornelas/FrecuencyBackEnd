<?php

include("../connection.php");
$con = connection();

$id = $_POST["id"];
$titulo = $_POST["titulo"];
$disc = $_POST["disc"];
$imagen = $_POST["imagen"];
$fecha = $_POST["fecha"];

$sql=  "UPDATE album
        SET Titulo='$titulo', Imagen='$imagen', ID_discografia='$disc',
        Fecha='$fecha'
        WHERE ID_album='$id'";
$query = mysqli_query($con, $sql);

if($query){
    Header("Location: index.php");
}else{

}

?>
