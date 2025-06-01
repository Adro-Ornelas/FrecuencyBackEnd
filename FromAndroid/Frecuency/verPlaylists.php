<?php
    require_once "based.php";
    if (isset($_GET['usr'])) {
        $id_usuario = $_GET['usr'];
        $bd = new BaseDeDatos();
        $playlists = $bd->verPlaylists($id_usuario);

        echo json_encode($playlists);
    } else {
        echo json_encode(['usr' => -1]);
    }
?>