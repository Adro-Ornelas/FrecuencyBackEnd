<?php

include("../connection.php");
$con = connection();

$sql = "SELECT * FROM playlist_cancion";
$query = mysqli_query($con, $sql);
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="../CSS/style.css" rel="stylesheet">
    <title>Playlist-Canción</title>
</head>

<body>
    <a href="../index.php" class="btn-back">Atrás</a>
    <div class="users-form">
        <h1>Agregar canciones a playlist</h1>
        <form action="insertar.php" method="POST">
			
            <select name="playlist">
				<option selected disabled hidden>Seleccionar playlist</option>
			<?php
				// Lista dinámica, muestra nombre de playlist	
			$playlists = $con->query("SELECT ID_playlist,
            Nombre FROM playlist");
			foreach($playlists as $playlist){
				echo "<option value='".$playlist['ID_playlist']."'>".
					$playlist['Nombre'].
					"</option>";
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
			foreach($canciones as $cancion){
				echo "<option value='".$cancion['ID_cancion']."'>".
					$cancion['Titulo']." - ".$cancion['Nombre_artistico'].
					"</option>";
			}	
			?>
			</select>

            <input type="submit" value="Agregar">
        </form>
    </div>

    <div class="users-table">
        <h2>Playlist registradas</h2>
        <table>
            <thead>
                <tr>
                    <th>ID_playlist</th>
                    <th>ID_cancion</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($row = mysqli_fetch_array($query)): ?>
                    <tr>
                        <th><?= $row['ID_playlist'] ?></th>
                        <th><?= $row['ID_cancion'] ?></th>
                        <th><a href="editar.php?playlist=<?= $row['ID_playlist'] ?>&cancion=<?= $row['ID_cancion'] ?>"
                        class="users-table--edit">Editar</a></th>
						<th><a href="eliminar.php?playlist=<?= $row['ID_playlist'] ?>&cancion=<?= $row['ID_cancion'] ?>"
                        class="users-table--delete" >Eliminar</a></th>
                    </tr>
                <?php endwhile; ?>
            </tbody>
        </table>
    </div>

</body>

</html>
