<?php 
    include("../connection.php");
    $con=connection();

    $id=$_GET['id'];

    $sql="SELECT * FROM cancion WHERE ID_cancion='$id'";
    $query=mysqli_query($con, $sql);
    $row=mysqli_fetch_array($query);
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="../CSS/style.css" rel="stylesheet">
        <title>Editar canción</title>
        
    </head>
    <body>
        <div class="users-form">
            <form action="actualizar.php" method="POST">
				<input type="hidden" required name="id" value="<?= $row["ID_cancion"]?>">
				Titulo:
                <input type="text" required name="titulo" value="<?= $row["Titulo"]?>">
                Álbum:
                <select name="album">
				    <option value="0" selected disabled hidden>Seleccionar álbum</option>
                    <?php
                        // Lista dinámica, muestra titulo y artista
                    $albumes = $con->query("SELECT a.ID_album, a.Titulo,
                        art.Nombre_artistico FROM album AS a INNER JOIN album_artista ON
                        a.ID_album=album_artista.ID_album INNER JOIN artista AS art ON
                        album_artista.ID_artista=art.ID_artista"); 
                    foreach($albumes as $album){
                        echo "<option value='".$album['ID_album']."'";
                        // Preselecciona el album al que ya pertenece
                        if($row['ID_album']==$album['ID_album'])
                            echo ' selected';
                        echo ">".$album['Titulo']." - ".$album['Nombre_artistico']."</option>";
                    }	
                    ?>
                    </select>
			    Género:
                <select name="genero">
				<option value="0" selected disabled hidden>Seleccionar género</option>
                <?php
                    // Lista dinámica, muestra género
                $generos = $con->query("SELECT ID_genero, Nombre FROM genero"); 
                foreach($generos as $genero){
                    echo "<option value='".$genero['ID_genero']."'";
                    // Preselecciona la canción a la que ya pertenece
                    if($row['ID_genero']==$genero['ID_genero'])
                        echo ' selected';
                    echo ">".$genero['Nombre']."</option>";
                }	
                ?>
			    </select>
            Ruta de letra(lyrics):
            <textarea rows="10" cols="10" required name="letra" 
            placeholder="Ruta de letra (lyrics) de la canción"
                ><?= $row['Letra'] ?></textarea>
            Duración:
            <input type="text" required name="duracion" placeholder="Duración"
            value="<?= $row['Duracion'] ?>">
			Fecha de creación:
            <input type="date" required name="fecha" value="<?= $row['Fecha']?>">
            <input type="submit" value="Actualizar">
            </form>
        </div>
    </body>
</html>
