<?php

include("../connection.php");
$con = connection();

$sql = "SELECT * FROM playlist";
$query = mysqli_query($con, $sql);
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="../CSS/style.css" rel="stylesheet">
    <title>Playlist</title>
</head>

<body>
    <div class="users-form">
        <h1>Playlist</h1>
        <form action="insertar.php" method="POST">
			<select name="usuario">
				<option value="0" selected disabled hidden>Seleccionar usuario</option>
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
            <input type="text" required name="nombre" placeholder="Nombre de la playlist">
			<input type="date" required name="fecha" placeholder="Fecha de creación" 
					value ="<?= date("Y-m-d"); ?>">
            <input type="submit" value="Agregar">
        </form>
    </div>

    <div class="users-table">
        <h2>Playlist registradas</h2>
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
                        <th><?= $row['ID_playlist'] ?></th>
                        <th><?= $row['ID_usuario'] ?></th>
                        <th><?= $row['Nombre'] ?></th>
                        <th><?= $row['Fecha_creacion'] ?></th>
                        <th><a href="editar.php?id=<?= $row['ID_playlist'] ?>" class="users-table--edit">Editar</a></th>
						<th><a href="eliminar.php?id=<?= $row['ID_playlist'] ?>" class="users-table--delete" >Eliminar</a></th>
                    </tr>
                <?php endwhile; ?>
            </tbody>
        </table>
    </div>

</body>

</html>
