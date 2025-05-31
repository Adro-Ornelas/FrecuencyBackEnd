<?php
    require_once "based.php";

    $bd = new BaseDeDatos();
    $canciones = $bd->nombrarCanciones();
    foreach ($canciones as $cion) {
        //echo "". $cion ."<br/><br/><br/><br/>";
        echo json_encode($cion);
    }
?>
