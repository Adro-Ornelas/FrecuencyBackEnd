<?php 
    include("../../connection.php");
    $con=connection();

    // Recupera playlist
    $playlist = $_GET['playlist'];
    
    // Recupera nombre de la playlist
    $nombrePlaylist = $con->query("SELECT Nombre
    FROM playlist WHERE ID_playlist='$playlist'");
    $nombrePlaylist = mysqli_fetch_array($nombrePlaylist);
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="../../CSS/style.css" rel="stylesheet">
        <title>Editar playlist-cancion</title>
        
    </head>
    <body>
        <div class="users-form">
            <h1>Playlist: <?= $nombrePlaylist['Nombre'] ?></h1>
            <form action="evento_insertar.php" method="POST">            
                <input type="hidden" name="playlist" value="<?= $playlist ?>">
                Canción a añadir:
                <select name="cancion">
                    <option selected disabled hidden>Seleccionar canción</option>
                <?php
                    // Lista dinámica, regresa todo nombre de canción y su artista
                $canciones = $con->query("SELECT cancion.ID_cancion,
                cancion.Titulo, artista.Nombre_artistico FROM cancion INNER JOIN
                album ON cancion.ID_album=album.ID_album INNER JOIN
                album_artista ON album.ID_album=album_artista.ID_album INNER JOIN
                artista ON album_artista.ID_artista=artista.ID_artista"); 

                foreach($canciones as $tupla){
                    // Si la canción ya estaba en playlist, la muestra preseleccionada
                    echo "<option value='".$tupla['ID_cancion']."'".
                        ( ($tupla['ID_cancion'] != $cancion) ? :'selected').
                        ">".$tupla['Titulo']." - ".$tupla['Nombre_artistico'].
                        "</option>";
                }	
                ?>
                </select>

                <input type="submit" value="Actualizar">
            </form>
        </div>
    </body>
</html>