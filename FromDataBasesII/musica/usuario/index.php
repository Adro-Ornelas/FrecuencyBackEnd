<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

include("../connection.php");
$con = connection();

$sql = "SELECT * FROM usuario";
$query = mysqli_query($con, $sql);
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="../CSS/style.css" rel="stylesheet">
    <title>Usuarios</title>
</head>

<body>
    <div class="users-form">
        <h1>Usuarios</h1>
        <form action="insert_user.php" method="POST">
            <input type="text" name="nombre" placeholder="Nombre(s)">
            <input type="text" name="apellidop" placeholder="Apellido paterno">
            <input type="text" name="apellidom" placeholder="Apellido materno">
            <input type="email" name="email" placeholder="Email">
            <input type="password" name="password" placeholder="Password">

            <input type="submit" value="Agregar">
        </form>
    </div>

    <div class="users-table">
        <h2>Usuarios registrados</h2>
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nombre(s)</th>
                    <th>Apellido paterno</th>
                    <th>Apellido materno</th>
                    <th>Email</th>
                    <th>Password</th>
                    <th></th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                <?php while ($row = mysqli_fetch_array($query)): ?>
                    <tr>
                        <th><?= $row['id_usuario'] ?></th>
                        <th><?= $row['Nombre'] ?></th>
                        <th><?= $row['Apellido_Paterno'] ?></th>
                        <th><?= $row['Apellido_Materno'] ?></th>
                        <th><?= $row['Email'] ?></th>
                        <th><?= $row["Password"] ?></th>
                        <th><a href="update.php?id=<?= $row['id_usuario'] ?>" class="users-table--edit">Editar</a></th>
                        <th><a href="delete_user.php?id=<?= $row['id_usuario'] ?>" class="users-table--delete" >Eliminar</a></th>
                    </tr>
                <?php endwhile; ?>
            </tbody>
        </table>
    </div>

</body>

</html>
