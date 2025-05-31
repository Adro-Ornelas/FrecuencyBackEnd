<?php
    require_once "based.php";

    $bd = new BaseDeDatos();
    $tablas = $bd->tablasNombre();
    echo json_encode($tablas);
?>
