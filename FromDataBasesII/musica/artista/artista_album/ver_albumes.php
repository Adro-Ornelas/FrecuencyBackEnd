<?php 
    include("../../connection.php");
    $con=connection();

    // Recupera artista
    $artista = $_GET['artista'];

    // Selecciona todos los álbumes del artista
    $sql="SELECT al.ID_album, al.Titulo, ar.ID_artista
        FROM album AS al
        INNER JOIN album_artista AS ar
        ON al.ID_album=ar.ID_album
        WHERE ar.ID_artista='$artista'";
    $query=mysqli_query($con, $sql);
    
    // Recupera nombre del artista
    $nombreartista = $con->query("SELECT Nombre_artistico
    FROM artista WHERE ID_artista='$artista'");
    $nombreartista = mysqli_fetch_array($nombreartista);
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="http://localhost/musica/CSS/style.css" rel="stylesheet">
        <title>albumes de artista</title>
        
    </head>
    <body>
        <h1>
        Álbumes de artista: <?= $nombreartista['Nombre_artistico'] ?>
        </h1>
<!-- AQUÍ VA EL FORM EN TABLAS PRINCIPALES-->
        <div class="users-table">
        <h2>Álbumes registrados</h2>
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Album</th>
                    <th><a href="insertar_album.php?artista=<?= $artista ?>"
                    class="users-table--edit">+</a></th>
                </tr>
            </thead>
            
            <tbody>
                <?php while ($row = mysqli_fetch_array($query)): ?>
                    <tr>
                        <th><?= $row['ID_album'] ?></h>
                        <th><?= $row['Titulo'] ?></h>
                        <th><a href="eliminar_album.php?artista=<?= $artista ?>&album=<?= $row['ID_album'] ?>"
                        class="users-table--delete">Eliminar</a></th>
                    </tr>
                <?php endwhile; ?>
            </tbody>
        </table>
        </div>
    </body>
</html>
