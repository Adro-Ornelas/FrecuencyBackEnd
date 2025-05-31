<?php
    include "based.php";

    error_reporting(E_ALL);
    ini_set('display_errors', 1);

    if (isset($_GET['nombre']) && isset($_GET['apeP']) && isset($_GET['apeM']) && isset($_GET['email']) && isset($_GET['pass'])) {
        $nombre = $_GET['nombre'];
        $apeP = $_GET['apeP'];
        $apeM = $_GET['apeM'];
        $email = $_GET['email'];
        $pass = $_GET['pass'];

        $bd = new BaseDeDatos();  // <- Aquí debe crearse sin error
        $res = $bd->registrar($nombre, $apeP, $apeM, $email, $pass);

        echo json_encode(['usr' => $res]);
    } else {
        echo json_encode(['usr' => -1]);
    }
?>