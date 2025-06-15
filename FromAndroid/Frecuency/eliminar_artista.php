<?php

    include("based.php");

    
    error_reporting(E_ALL);
    ini_set('display_errors', 1);

    if(isset($_GET['id_artista'])){

        $id_artista = $_GET['id_artista'];
        $bd = new BaseDeDatos();
        $res = $bd->eliminar_artista($id_artista);
        echo json_encode(['success' => $res]);

    }

?>