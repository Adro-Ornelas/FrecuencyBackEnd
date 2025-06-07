<?php

include("../connection.php");
$con = connection();

// Busca información de artista
$sql = "SELECT * FROM artista";
$query = mysqli_query($con, $sql);
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="../CSS/style.css" rel="stylesheet">
    <title>Artista</title>
</head>

<body>
    <div class="users-form">
        <h1>Artista</h1>
        <form action="insertar.php" method="POST">
            <input type="text" required name="nombreA" placeholder="Nombre artistíco">
            <input type="text" required name="nombre" placeholder="Nombre real">
            <input type="text" required name="apep" placeholder="Apellido paterno">
            <input type="text" required name="apem" placeholder="Apellido materno">
            <input type="submit" value="Agregar">
        </form>
    </div>
    <div class="users-table">
        <h2>Artistas registrados</h2>
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nombe</br>artístico</th>
                    <th>Nombre real</th>
                    <th>Apellido</br>paterno</th>
                    <th>Apellido</br>materno</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($row = mysqli_fetch_array($query)): ?>
                    <tr>
                        <th><?= $row['ID_artista'] ?></th>
                        <th><?= $row['Nombre_artistico'] ?></th>
                        <th><?= $row['Nombre'] ?></th>
                        <th><?= $row['Apellido_Paterno'] ?></th>
                        <th><?= $row['Apellido_Materno'] ?></th>
                        <th><a href="editar.php?id=<?= $row['ID_artista'] ?>" class="users-table--edit">Editar</a></th>
                        <th><a href="./artista_album/ver_albumes.php?artista=<?= $row['ID_artista'] ?>" class="users-table--edit">Ver álbumes</a></th>
						<th><a href="eliminar.php?id=<?= $row['ID_artista'] ?>" class="users-table--delete" >Eliminar</a></th>
                    </tr>
                <?php endwhile; ?>
            </tbody>
        </table>
    </div>

</body>

</html>
