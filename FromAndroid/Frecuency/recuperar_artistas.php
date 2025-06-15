<?php
    require_once "based.php";

    $bd = new BaseDeDatos();
    $artistas = $bd->recuperar_artistas();
    echo "[";
    foreach ($artistas as $cion) {
        echo json_encode($cion);
        echo ",";
    }
    echo "]";
?>
