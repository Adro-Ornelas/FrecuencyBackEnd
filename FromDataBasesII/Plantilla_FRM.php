<?php 
  // Verifica conexión a bd
  $connect = new mysqli("localhost", "root", "", "bd_ceti_6a") or die("Fallo en la conexión de la BD"); 
?> 
<HTML>
  <BODY>
    <header>
    <meta charset="UTF-8">
    <title>ADRO - 22300918</title>
    </header>
    <p>ADRO - 22300918</p>
  
    <FORM ACTION = "Alumno.php" METHOD = "POST">
    <fieldset>
    <legend>INFORMACIÓN DE ALUMNO</legend>
      <br/><br/>
      Registro: <INPUT TYPE = "text" NAME = "registro" VALUE = "" SIZE="20">
      Nombre: <INPUT TYPE = "text" NAME = "nombre" VALUE = "" SIZE="20">
      <br/><br/>
      Apellido(s): <INPUT TYPE = "text" NAME = "ape" VALUE = "" SIZE="20">
      Celular: <INPUT TYPE = "text" NAME = "celular" VALUE = "" SIZE="20">
      <br/><br/>
      Sexo: <INPUT TYPE = "radio" NAME = "sexo" VALUE = "M" CHECKED> Mujer
            <INPUT TYPE = "radio" NAME = "sexo" VALUE = "H" CHECKED> Hombre
      <br/><br/>
      Domicilio: <INPUT TYPE = "text" NAME = "domicilio" VALUE = "" SIZE="150">
      <br/><br/>
      Colonia: <INPUT TYPE = "text" NAME = "colonia" VALUE = "" SIZE="30">
      <br/><br/>          

      Selecciona un municipio:
      <select name="municipio"> 
        <option value="0">Municipio</option> 
        <?php 
          // Lista municipios
          $query = $connect->query("SELECT * FROM municipio"); 
          while ($valores = mysqli_fetch_array($query)) { 
            echo "<option value='".$valores["PK_Mun"]."'>".$valores["Nombre"]."</option>"; 
          } 
        ?> 
      </select> 
      <br/><br/>
      Selecciona una carrera:
      <select name="carrera">
        <option value="0">Carrera</option>
        <?php
          // Lista carreras
          $query = $connect->query("SELECT * FROM CARRERA");
          while ($valores = mysqli_fetch_array($query)) {
            echo "<option value='".$valores["Clave"]."'>".$valores["Nombre"]."</option>";
          }
          
          // Cerrar conexión
          $connect->close();
        ?>

      </select>
      <br/><br/>
      Hobbies: <select multiple size="6" name = "hobbies[]">
        <option value="Yoga"> Yoga
        <option value="Basquetball"> Basquetball
        <option value="Voleyball"> Voleyball
        <option value="Ajedrez"> Ajedrez
        <option value="Cubo Rubik"> Cubo Rubik
        <option value="Dibujar"> Dibujar
        <option value="Leer"> Leer
        <option value="Escuchar Música"> Escuchar Música
        <option value="Series"> Ver series
        <option value="Peliculas"> Ver películas
        <option value="Anime"> Ver anime
        <option value="Videojuegos"> Videojuegos
        <option value="Deporte"> Deporte
      </select>
      <br/><br/><br/>
      <INPUT TYPE = "submit" NAME = "BOTON" VALUE = "ENVIAR">
    </fieldset>
   </FORM>
  </BODY>
</HTML>