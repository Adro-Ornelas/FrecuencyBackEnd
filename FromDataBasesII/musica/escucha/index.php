<?php

include("../connection.php");
$con = connection();

// Busca información de escucha
$sql = "SELECT * FROM escucha";
$query = mysqli_query($con, $sql);
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="../CSS/style.css" rel="stylesheet">
    <title>escucha</title>
</head>

<body>
    <div class="users-form">
        <h1>escucha</h1>
        <form action="insertar.php" method="POST">
            
			<select name="usuario">
				<option selected disabled hidden>Seleccionar usuario</option>
			<?php
				// Lista dinámica 		
			    $usuarios = $con->query("SELECT id_usuario, Nombre,
	            Apellido_Paterno, Apellido_Materno FROM usuario"); 
		    	foreach($usuarios as $valores){
				    echo "<option value='".$valores['id_usuario']."'>".
					$valores['Nombre']." ".$valores['Apellido_Paterno'].
					" ".$valores['Apellido_Materno']."</option>";
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
                echo "<option value='".$tupla['ID_cancion']."'>".
                $tupla['Titulo']." - ".$tupla['Nombre_artistico']."</option>";
            }	
            ?>
            </select>
                
			<input type="datetime-local"  required name="fecha" placeholder="Fecha de creación">

            <input type="submit" value="Agregar">
        </form>
    </div>
    <div class="users-table">
        <h2>Escuchas registrados</h2>
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Usuario</th>
                    <th>Cancion</th>
                    <th>Fecha</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($row = mysqli_fetch_array($query)): ?>
                    <tr>
                        <th><?= $row['ID_usr_cancion'] ?></th>
                        <th><?= $row['ID_usuario'] ?></th>
                        <th><?= $row['ID_cancion'] ?></th>
                        <th><?= $row['Fecha'] ?></th>
                        <th><a href="editar.php?id=<?= $row['ID_usr_cancion'] ?>" class="users-table--edit">Editar</a></th>
						<th><a href="eliminar.php?id=<?= $row['ID_usr_cancion'] ?>" class="users-table--delete" >Eliminar</a></th>
                    </tr>
                <?php endwhile; ?>
            </tbody>
        </table>
    </div>

</body>

</html>
