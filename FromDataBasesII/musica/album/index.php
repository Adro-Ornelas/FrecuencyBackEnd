<?php

include("../connection.php");
$con = connection();

// Busca información de album
$sql = "SELECT a.*, d.Nombre AS ndisco FROM album AS a
        INNER JOIN discografia AS d
        ON a.ID_discografia=d.ID_discografia";
$query = mysqli_query($con, $sql);
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="../CSS/style.css" rel="stylesheet">
    <title>Álbum</title>
</head>

<body>
    <a href="../index.php" class="btn-back">Atrás</a>
    <div class="users-form">
        <h1>Álbum</h1>
        <form action="insertar.php" method="POST">
            <input type="text" required name="titulo" placeholder="Título de álbum">
            <select name="disc">
				<option value="0" selected disabled hidden>Seleccionar discografía</option>
                <?php
                    // Lista dinámica, muestra discografía
                $discografias = $con->query("SELECT ID_discografia, Nombre FROM discografia"); 
                foreach($discografias as $discog){
                    echo "<option value='".$discog['ID_discografia']."'>".
                        $discog['Nombre']."</option>";
                }	
                ?>
			</select>
            <textarea rows="10" cols="100" required name="imagen">Imagen del álbum
            </textarea>
			<input type="date" required name="fecha" placeholder="Fecha de creación">
            <input type="submit" value="Agregar">
        </form>
    </div>
    <div class="users-table">
        <h2>Álbumes registrados</h2>
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Título</th>
                    <th>Discografía</th>
                    <th>Imagen</th>
                    <th>Fecha</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($row = mysqli_fetch_array($query)): ?>
                    <tr>
                        <th><?= $row['ID_album'] ?></th>
                        <th><?= $row['Titulo'] ?></th>
                        <th><?= $row['ID_discografia']." - ".$row['ndisco'] ?></th>
                        <th><?= $row['Imagen'] ?></th>
                        <th><?= $row['Fecha'] ?></th>
                        <th><a href="editar.php?id=<?= $row['ID_album'] ?>" class="users-table--edit">Editar</a></th>
						<th><a href="eliminar.php?id=<?= $row['ID_album'] ?>" class="users-table--delete" >Eliminar</a></th>
                    </tr>
                <?php endwhile; ?>
            </tbody>
        </table>
    </div>

</body>

</html>
