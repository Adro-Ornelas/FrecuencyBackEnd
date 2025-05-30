<html>
  <body>
  <header>
  <meta charset="UTF-8">
  <title>ADRO - 22300918</title>
  </header>
  <p>ADRO - 22300918</p>
  <?php
    // Conexión a la base de datos
    $connect = new mysqli("localhost", "root", "", "bd_ceti_6a");

    // Verificar conexión
    if($connect->connect_error)
        die("Error en la conexión<br/>");

    // Si el progama llegó a aquí si hay conexión
    echo "Conexión exitosa<br/>";

    //Recibe información del formulario
    $calificacion = $_REQUEST["calif"];
    $periodo = $_REQUEST["periodo"];
    $alumnoReg = $_REQUEST["alumnoReg"];
    $profesor = $_REQUEST["profesor"];
    $asignatura = $_REQUEST["asignatura"];
    
    // Consulta INSERT preparada
    $stmt = $connect->prepare("INSERT INTO calificacion(Calificacion, Periodo, Alumno, Profesor, Asignatura)
                                VALUES (?, ?, ?, ?, ?)");
    $stmt->bind_param("sssss", $calificacion, $periodo, $alumnoReg, $profesor, $asignatura);

     // Ejecutar la consulta
    if ($stmt->execute()) {
        echo "Nuevo registro insertado correctamente";
    } else {
        echo "Error: " . $stmt->error;
    }
    $stmt->close();     // Cerrar declaración
    echo "<br/>";
    
    // Imprimo información
    print("El alumno tiene:<br>
    Calificación: $calificacion <br>
    Periodo: $periodo <br>");
        
    print("Registro: $alumnoReg");
    // Realiza búsqueda de FK 1 (registro)
    $nombreFila = $connect->query("SELECT Nombre FROM alumno where Registro='$alumnoReg'");
    $soloNombre = $nombreFila->fetch_assoc();
    echo " (".$soloNombre["Nombre"].")<br/>";
    
    print("Profesor: $profesor");
    // Realiza búsqueda de FK 2 (profesor)
    $nombreFila = $connect->query("SELECT Nombre FROM profesor where Nomina='$profesor'");
    $soloNombre = $nombreFila->fetch_assoc();
    echo " (".$soloNombre["Nombre"].")<br/>";

    print("Asignatura: $asignatura");
    // Realiza búsqueda de FK 3 (asignatura)
    $nombreFila = $connect->query("SELECT Nombre FROM asignatura where Codigo='$asignatura'");
    $soloNombre = $nombreFila->fetch_assoc();
    echo " (".$soloNombre["Nombre"].")<br/>";
    
    // Cerrar conexión
    $connect->close();

    ?>
  </body>
</html>