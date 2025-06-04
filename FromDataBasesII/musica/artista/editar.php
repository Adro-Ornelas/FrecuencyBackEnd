<?php 
    include("../connection.php");
    $con=connection();

    $id=$_GET['id'];

    $sql="SELECT * FROM artista WHERE ID_artista='$id'";
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
				<input type="hidden" required name="id" value="<?= $row["ID_artista"]?>">
				Nombre artístico:
                <input type="text" required name="nombreA" value="<?= $row["Nombre_artistico"]?>">
				Nombre real:
                <input type="text" required name="nombre" value="<?= $row["Nombre"]?>">
			    Apellido paterno:
                <input type="text" required name="apep" value="<?= $row["Apellido_Paterno"]?>">
			    Apellido materno:
                <input type="text" required name="apem" value="<?= $row["Apellido_Materno"]?>">
            <input type="submit" value="Actualizar">
            </form>
        </div>
    </body>
</html>
