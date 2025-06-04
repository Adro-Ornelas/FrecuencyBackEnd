<?php 
    include("../connection.php");
    $con=connection();

    $id=$_GET['id'];

    $sql="SELECT * FROM discografia WHERE ID_discografia='$id'";
    $query=mysqli_query($con, $sql);
    $row=mysqli_fetch_array($query);
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="../CSS/style.css" rel="stylesheet">
        <title>Editar discográfica</title>
        
    </head>
    <body>
        <div class="users-form">
            <form action="actualizar.php" method="POST">
				<input type="hidden" required name="id" value="<?= $row["ID_discografia"]?>">
				Nombre:
                <input type="text" required name="nombre" value="<?= $row["Nombre"]?>">
			    Logo:
                <textarea rows="10" cols="100" required name="logo">
                <?= $row["Logo"] ?>
                </textarea>
			    
            <input type="submit" value="Actualizar">
            </form>
        </div>
    </body>
</html>
