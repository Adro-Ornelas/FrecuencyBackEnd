<?php 
    include("../connection.php");
    $con=connection();

    // Recuper ambas claves de la relación
    $playlist = $_GET['playlist'];
    $cancion = $_GET['cancion'];

    $sql="SELECT * FROM playlist_cancion
    WHERE ID_playlist='$playlist' 
    AND ID_cancion='$cancion'";
    $query=mysqli_query($con, $sql);
    $row=mysqli_fetch_array($query);
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="../CSS/style.css" rel="stylesheet">
        <title>Editar playlist-cancion</title>
        
    </head>
    <body>
        <div class="users-form">
            <form action="actualizar.php" method="POST">
                Playlist:
                <select name="playlist">
				<?php
                // Lista dinámica de playlist
                $playlists = $con->query("SELECT ID_playlist,
                Nombre FROM playlist"); 
                foreach($playlists as $tupla){
                echo "<option value='".$tupla['ID_playlist']."'";
                // Preselecciona playlist 
                if($tupla['ID_playlist'] == $playlist)
                    echo ' selected';
                echo ">".$tupla['Nombre']."</option>";
				}	
				?>
				</select>

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
