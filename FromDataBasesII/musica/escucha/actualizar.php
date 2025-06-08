<?php

include("../connection.php");
$con = connection();

$id= $_POST["id"];
$usuario = $_POST["usuario"];
$cancion = $_POST["cancion"];
$fecha = $_POST["fecha"];

$sql=  "UPDATE escucha SET ID_usuario='$usuario', ID_cancion='$cancion',
        Fecha='$fecha'
        WHERE ID_usr_cancion='$id'";
$query = mysqli_query($con, $sql);

if($query){
    Header("Location: index.php");
}else{

}

?>
