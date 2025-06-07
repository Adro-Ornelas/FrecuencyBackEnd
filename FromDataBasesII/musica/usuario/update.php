<?php 
    include("../connection.php");
    $con=connection();

    $id=$_GET['id'];

    $sql="SELECT * FROM usuario WHERE ID_usuario='$id'";
    $query=mysqli_query($con, $sql);

    $row=mysqli_fetch_array($query);
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="../CSS/style.css" rel="stylesheet">
        <title>Editar usuarios</title>
        
    </head>
    <body>
        <a href="index.php" class="btn-back">Atrás</a>
        <div class="users-form">
            <form action="edit_user.php" method="POST">
				<input type="hidden" required name="id" value="<?= $row["id_usuario"]?>">
                Nombre(s):<input type="text" required name="nombre" placeholder="Nombre(s)" value="<?= $row['Nombre']?>">
				Apellido Paterno:<input type="text" required name="apellidop" placeholder="Apellido Paterno" value="<?= $row['Apellido_Paterno']?>">
                Apellido Materno:<input type="text" required name="apellidom" placeholder="Apellido Materno" value="<?= $row['Apellido_Materno']?>">
                E-mail:<input type="text" required name="email" placeholder="Email" value="<?= $row['Email']?>">
                Contraseña (dejar en blanco para mantener contraseña anterior):
                <input type="text" name="password" placeholder="Password" value="">
                <!-- Contraseña vieja: -->
                <input type="hidden" required name="password_old" value="<?= $row['Password']?>">
                <input type="submit" value="Actualizar">
            </form>
        </div>
    </body>
</html>
