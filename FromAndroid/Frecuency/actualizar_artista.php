<?php
    include "based.php";

    error_reporting(E_ALL);
    ini_set('display_errors', 1);

    if (isset($_POST['id']) && isset($_POST['nombre_art']) && isset($_POST['nombre_real']) &&
        isset($_POST['apep']) && isset($_POST['apem']) && isset($_POST['tel']) &&
        isset($_POST['fecha_nac']) && isset($_POST['ciudad_show']) &&
        isset($_POST['hora_inicio']) && isset($_POST['hora_final'])) {
        $id             = $_POST['id'];
        $nombre_art     = $_POST['nombre_art'];
        $nombre_real    = $_POST['nombre_real'];
        $apep           = $_POST['apep'];
        $apem           = $_POST['apem'];
        $tel            = $_POST['tel'];
        $fecha_nac      = $_POST['fecha_nac'];
        $ciudad_show    = $_POST['ciudad_show'];
        $hora_inicio    = $_POST['hora_inicio'];
        $hora_final     = $_POST['hora_final'];

       /* echo "INSERT INTO artista(ID_artista, Nombre_artistico, 
        Nombre, Apellido_Paterno, Apellido_Materno, num_tel, fecha_nac, 
        ciudad_show, hora_inicio, hora_final) VALUES(NULL, $nombre_art, $nombre_real, $apep, $apem,
        $tel, $fecha_nac, $ciudad_show, $hora_inicio, $hora_final);";
*/
        $bd = new BaseDeDatos();  // <- Aquí debe crearse sin error
        $res = $bd->actualizarArtista($id,$nombre_art, $nombre_real, 
                        $apep, $apem,
                        $tel,  $fecha_nac, $ciudad_show,
                        $hora_inicio, $hora_final);

        echo json_encode(['usr' => $res]);
    }
?>