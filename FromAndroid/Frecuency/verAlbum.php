<?php
    require_once "based.php";
    $bd = new BaseDeDatos();
    $album = $bd->verAlbum();
    echo json_encode($album);
?>