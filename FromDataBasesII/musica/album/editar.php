<?php 
    include("../connection.php");
    $con=connection();

    $id=$_GET['id'];

    $sql="SELECT * FROM album WHERE ID_album='$id'";
    $query=mysqli_query($con, $sql);
    $row=mysqli_fetch_array($query);
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="../CSS/style.css" rel="stylesheet">
        <title>Editar álbum</title>
        
    </head>
    <body>
        <div class="users-form">
            <form action="actualizar.php" method="POST">
     		<input type="hidden" required name="id" value="<?= $row["ID_album"]?>">
            Título:
            <input type="text" required name="titulo" placeholder="Título de álbum"
            value="<?= $row["Titulo"]?>">
            <select name="disc">
				<option value="0" selected disabled hidden>Seleccionar discografía</option>
                <?php
                    // Lista dinámica, muestra discografía y preselccion
                $discografias = $con->query("SELECT ID_discografia, Nombre FROM discografia"); 
                foreach($discografias as $discog){
                    echo "<option value='".$discog['ID_discografia']."'".
                        ($row["ID_discografia"]!=($discog["ID_discografia"]) ? :" selected").
                        ">".$discog['Nombre']."</option>";
                }	
                ?>
			</select>
            <textarea rows="10" cols="100" required name="imagen"><?= $row["Imagen"]?>
            </textarea>
			<input type="date" required name="fecha" placeholder="Fecha de creación"
            value="<?= $row["Fecha"]?>">
			    
            <input type="submit" value="Actualizar">
            </form>
        </div>
    </body>
</html>
