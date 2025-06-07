<?php 
    include("../connection.php");
    $con=connection();

    $id=$_GET['id'];

    $sql="SELECT * FROM playlist WHERE ID_playlist='$id'";
    $query=mysqli_query($con, $sql);
    $row=mysqli_fetch_array($query);
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="../CSS/style.css" rel="stylesheet">
        <title>Editar playlist</title>
        
    </head>
    <body>
        <a href="index.php" class="btn-back">Atrás</a>
        <div class="users-form">
            <form action="actualizar.php" method="POST">
				<input type="hidden" required name="id" value="<?= $row["ID_playlist"]?>">
                Usuario creador:                
                <select name="usuario">
				<?php
					// Lista dinámica 		
				$usuarios = $con->query("SELECT ID_usuario, Nombre,
							Apellido_Paterno, Apellido_Materno FROM usuario"); 
				foreach($usuarios as $valores){
					echo "<option value='".$valores['ID_usuario']."'";
					// Preselecciona el usuario ya registrado como creador de playlist
					if($row['ID_usuario']==$valores['ID_usuario'])
                        echo ' selected';
					echo ">".$valores['Nombre']." ".$valores['Apellido_Paterno'].
					" ".$valores['Apellido_Materno']."</option>";
				}	
				?>
				</select>
				Nombre de playlist:<input type="text" required name="nombre" value="<?= $row['Nombre']?>">
				Fecha de creación:<input type="text" required name="fecha" value="<?= $row['Fecha_creacion']?>">
                <input type="submit" value="Actualizar">
            </form>
        </div>
    </body>
</html>
