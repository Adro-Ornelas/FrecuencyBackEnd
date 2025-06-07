<?php 
    include("../connection.php");
    $con=connection();

    $id=$_GET['id'];

    $sql="SELECT * FROM escucha WHERE ID_usr_cancion='$id'";
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
        <a href="index.php" class="btn-back">Atrás</a>
        <div class="users-form">
            <form action="actualizar.php" method="POST">
                Usuario escuchador:                
                <select name="usuario">
				<?php
					// Lista dinámica 		
				$usuarios = $con->query("SELECT ID_usuario, Nombre,
							Apellido_Paterno, Apellido_Materno FROM usuario"); 
				foreach($usuarios as $valores){
					echo "<option value='".$valores['ID_usuario']."'";
					// Preselecciona el usuario ya registrado como creador de playlist
					if($row['ID_usuario']==$valores['ID_usuario'])
                        echo ' selected';
					echo ">".$valores['Nombre']." ".$valores['Apellido_Paterno'].
					" ".$valores['Apellido_Materno']."</option>";
				}	
				?>
				</select>
                Canción a escuchada:
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
                        ( ($tupla['ID_cancion'] != $row['ID_cancion']) ? :'selected').
                        ">".$tupla['Titulo']." - ".$tupla['Nombre_artistico'].
                        "</option>";
                }	
                ?>
                </select>
			    Fecha y hora de escucha:
                <input type="datetime-local" required name="apem" value="<?= $row["Fecha"]?>">
            <input type="submit" value="Actualizar">
            </form>
        </div>
    </body>
</html>
