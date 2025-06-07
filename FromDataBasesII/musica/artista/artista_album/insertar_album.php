<?php 
    include("../../connection.php");
    $con=connection();

    // Recupera artista
    $artista = $_GET['artista'];
    
    // Recupera nombre de la artista
    $nombreArtista = $con->query("SELECT Nombre_artistico
    FROM artista WHERE ID_artista='$artista'");
    $nombreArtista = mysqli_fetch_array($nombreArtista);
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="../../CSS/style.css" rel="stylesheet">
        <title>Editar artista-album</title>
        
    </head>
    <body>
        
        <div class="users-form">
            <h1>Añadir álbum a <?= $nombreArtista['Nombre_artistico'] ?> </h1>
            <form action="evento_insertar.php" method="POST">            
                
                <input type="hidden" name="artista" value="<?= $artista ?>">
                Álbum a añadir:
                <select name="album">
				<option value="0" selected disabled hidden>Seleccionar álbum</option>
                <?php
                    // Lista dinámica, muestra titulo de álbumes y discografía
                $album = $con->query("SELECT a.ID_album, a.Titulo,
                    d.Nombre FROM album AS a INNER JOIN discografia AS d
                    ON a.ID_discografia=d.ID_discografia"); 
                foreach($album as $valores){
                    echo "<option value='".$valores['ID_album']."'>".
                        $valores['Titulo']." - ".$valores['Nombre']."</option>";
                }	
                ?>
			</select>

                <input type="submit" value="Agregar">
            </form>
        </div>
    </body>
</html>