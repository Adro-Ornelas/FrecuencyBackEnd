<?php 
    include("../../connection.php");
    $con=connection();

    // Recupera playlist
    $playlist = $_GET['playlist'];

    // Selecciona todas las ID de las canciones contenidas en playlist
    $sql="SELECT c.ID_cancion, c.Titulo, pc.ID_playlist FROM cancion AS c
        INNER JOIN playlist_cancion AS pc
        ON c.ID_cancion=pc.ID_cancion
        WHERE pc.ID_playlist='$playlist'";
    $query=mysqli_query($con, $sql);
    // Desempaca resultados en arreglo
    $row=mysqli_fetch_array($query);
    
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
        <link href="http://localhost/musica/CSS/style.css" rel="stylesheet">
        <title>Canciones de playlist</title>
        
    </head>
    <body>
        <h1>
        Canciones de playlist (<?= $nombrePlaylist['Nombre'] ?>)
        </h1>
        <div class="users-form">
            <form action="actualizar.php" method="POST">
            </form>
        </div>

        <div class="users-table">
        <h2>Canciones registradas</h2>
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Cancion</th>
                    <th><a href="insertar_cancion.php?playlist=<?= $playlist ?>"
                    class="users-table--edit">+</a></th>
                </tr>
            </thead>
            <tbody>
                <?php while ($row = mysqli_fetch_array($query)): ?>
                    <tr>
                        <th><?= $row['ID_cancion'] ?></h>
                        <th><?= $row['Titulo'] ?></h>
                        <th><a href="eliminar_cancion.php?playlist=<?= $row['ID_playlist'] ?>&cancion=<?= $row['ID_cancion'] ?>"
                        class="users-table--delete">Eliminar</a></th>
                    </tr>
                <?php endwhile; ?>
            </tbody>
        </table>
        </div>
    </body>
</html>
