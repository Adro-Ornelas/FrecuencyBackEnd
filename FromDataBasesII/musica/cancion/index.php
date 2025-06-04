<?php

include("../connection.php");
$con = connection();

$sql = "SELECT * FROM cancion";
$query = mysqli_query($con, $sql);
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="../CSS/style.css" rel="stylesheet">
    <title>Canción</title>
</head>

<body>
    <div class="users-form">
        <h1>Canción</h1>
        <form action="insertar.php" method="POST">
            <input type="text" required name="titulo" placeholder="Título de canción">
            <select name="album">
				<option value="0" selected disabled hidden>Seleccionar álbum</option>
                <?php
                    // Lista dinámica, muestra titulo y artista
                $album = $con->query("SELECT a.ID_album, a.Titulo,
                    art.Nombre_artistico FROM album AS a INNER JOIN album_artista ON
                    a.ID_album=album_artista.ID_album INNER JOIN artista AS art ON
                    album_artista.ID_artista=art.ID_artista"); 
                foreach($album as $valores){
                    echo "<option value='".$valores['ID_album']."'>".
                        $valores['Titulo']." - ".$valores['Nombre_artistico']."</option>";
                }	
                ?>
			</select>
			<select name="genero">
				<option value="0" selected disabled hidden>Seleccionar género</option>
                <?php
                    // Lista dinámica 		
                $generos = $con->query("SELECT ID_genero, Nombre FROM genero"); 
                foreach($generos as $valores){
                    echo "<option value='".$valores['ID_genero']."'>".
                        $valores['Nombre']."</option>";
                }	
                ?>
			</select>
            
			<input type="text" required name="fecha" placeholder="Fecha de creación" 
					value ="<?= date("Y-m-d"); ?>">
            <input type="submit" value="Agregar">
        </form>
    </div>

    <div class="users-table">
        <h2>Canción registradas</h2>
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>ID_usuario</th>
                    <th>Nombre</th>
                    <th>Fecha creación</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($row = mysqli_fetch_array($query)): ?>
                    <tr>
                        <th><?= $row['ID_canción'] ?></th>
                        <th><?= $row['ID_usuario'] ?></th>
                        <th><?= $row['Nombre'] ?></th>
                        <th><?= $row['Fecha_creacion'] ?></th>
                        <th><a href="editar.php?id=<?= $row['ID_canción'] ?>" class="users-table--edit">Editar</a></th>
						<th><a href="eliminar.php?id=<?= $row['ID_canción'] ?>" class="users-table--delete" >Eliminar</a></th>
                    </tr>
                <?php endwhile; ?>
            </tbody>
        </table>
    </div>

</body>

</html>
