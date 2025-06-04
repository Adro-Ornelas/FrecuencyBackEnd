<?php

include("../connection.php");
$con = connection();

// Busca información de genero
$sql = "SELECT * FROM genero";
$query = mysqli_query($con, $sql);
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="../CSS/style.css" rel="stylesheet">
    <title>Género</title>
</head>

<body>
    <div class="users-form">
        <h1>Género</h1>
        <form action="insertar.php" method="POST">
            <input type="text" required name="nombre" placeholder="Género musical">
            <input type="submit" value="Agregar">
        </form>
    </div>
    <div class="users-table">
        <h2>Géneros registrados</h2>
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nombe</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($row = mysqli_fetch_array($query)): ?>
                    <tr>
                        <th><?= $row['ID_genero'] ?></th>
                        <th><?= $row['Nombre'] ?></th>
                        <th><a href="editar.php?id=<?= $row['ID_genero'] ?>" class="users-table--edit">Editar</a></th>
						<th><a href="eliminar.php?id=<?= $row['ID_genero'] ?>" class="users-table--delete" >Eliminar</a></th>
                    </tr>
                <?php endwhile; ?>
            </tbody>
        </table>
    </div>
</body>
</html>
