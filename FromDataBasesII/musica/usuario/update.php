<?php 
    include("../connection.php");
    $con=connection();

    $id=$_GET['id'];

    $sql="SELECT * FROM usuario WHERE id_usuario='$id'";
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
        <div class="users-form">
            <form action="edit_user.php" method="POST">
				<input type="hidden" name="id" value="<?= $row["id_usuario"]?>">
                Nombre(s):<input type="text" name="nombre" placeholder="Nombre(s)" value="<?= $row['Nombre']?>">
				Apellido Paterno:<input type="text" name="apellidop" placeholder="Apellido Paterno" value="<?= $row['Apellido_Paterno']?>">
                Apellido Materno:<input type="text" name="apellidom" placeholder="Apellido Materno" value="<?= $row['Apellido_Materno']?>">
                E-mail:<input type="text" name="email" placeholder="Email" value="<?= $row['Email']?>">
                Contraseña:<input type="text" name="password" placeholder="Password" value="<?= $row['Password']?>">
                <input type="submit" value="Actualizar">
            </form>
        </div>
    </body>
</html>
