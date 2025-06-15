<?php

include("../connection.php");
$con = connection();

$id= $_POST["id"];
$titulo = $_POST["titulo"];
$genero = $_POST["genero"];
$album = $_POST["album"];
$letra = $_POST["letra"];
$duracion = $_POST["duracion"];
$fecha = $_POST["fecha"];

$sql=  "UPDATE cancion SET Titulo='$titulo', ID_genero='$genero',
        ID_album='$album', Letra='$letra', Duracion='$duracion',
        Fecha='$fecha'
        WHERE ID_cancion='$id'";
$query = mysqli_query($con, $sql);

if($query){
    Header("Location: index.php");
}else{

}

?>
