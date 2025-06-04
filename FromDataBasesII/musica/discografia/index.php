<?php

include("../connection.php");
$con = connection();

// Busca información de discografia
$sql = "SELECT * FROM discografia";
$query = mysqli_query($con, $sql);
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="../CSS/style.css" rel="stylesheet">
    <title>Discografía</title>
</head>

<body>
    <div class="users-form">
        <h1>Discografía</h1>
        <form action="insertar.php" method="POST">
            <input type="text" required name="nombre" placeholder="Nombre de discografía">
            <textarea rows="10" cols="10" required name="logo">Logo de la discografía
            </textarea>
            <input type="submit" value="Agregar">
        </form>
    </div>
    <div class="users-table">
        <h2>Discografias registradas</h2>
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nombe</th>
                    <th>Logo</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($row = mysqli_fetch_array($query)): ?>
                    <tr>
                        <th><?= $row['ID_discografia'] ?></th>
                        <th><?= $row['Nombre'] ?></th>
                        <th><?= $row['Logo'] ?></th>
                        <th><a href="editar.php?id=<?= $row['ID_discografia'] ?>" class="users-table--edit">Editar</a></th>
						<th><a href="eliminar.php?id=<?= $row['ID_discografia'] ?>" class="users-table--delete" >Eliminar</a></th>
                    </tr>
                <?php endwhile; ?>
            </tbody>
        </table>
    </div>

</body>

</html>
