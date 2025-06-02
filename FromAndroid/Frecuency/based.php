<?php
// Objetos de cada tabla:
require_once 'Cancion.php';

// Objeto para conectar y CRUD:
class BaseDeDatos
{
    private $con;
    public function __construct()
    {
        try {
            $this->con = new PDO('mysql:host=localhost;dbname=bd_musica', 'root', '');
            $this->con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            die("Error de conexión: " . $e->getMessage());
        }
    }

    public function registrar($nombre, $apeP, $apeM, $email, $pass)
    {
        // Verificar si el email ya existe
        $check = $this->con->prepare("SELECT COUNT(*) FROM usuario WHERE Email = ?");
        $check->execute([$email]);
        $count = $check->fetchColumn();

        if ($count > 0) {
            return -1; // Indicamos que el usuario ya existe
        }

        // Si no existe, proceder con el registro
        $sql = $this->con->prepare("INSERT INTO `usuario` (`id_usuario`, `Nombre`, `Apellido_Paterno`, `Apellido_Materno`, `Email`, `Contraseña`) 
                                VALUES (NULL, ?, ?, ?, ?, ?);");
        $resultado = $sql->execute([$nombre, $apeP, $apeM, $email, $pass]);

        if ($resultado) {
            return 1;
        } else {
            return 0;
        }
    }

    public function ingreso($usr, $pass)
    {
        $sql = $this->con->prepare("SELECT * FROM usuario WHERE BINARY `Email` = ? AND BINARY `Contraseña` = ?");
        $sql->execute([$usr, $pass]);
        $res = $sql->fetchAll();

        if (count($res) > 0) {
            return $res[0]['id_usuario'];
        }
        return -1;
    }

    public function tablasNombre()
    {
        $sql = $this->con->prepare("SHOW TABLES WHERE NOT Tables_in_bd_musica = 'usuario' 
	                                        AND NOT Tables_in_bd_musica = 'album_artista'
                                            AND NOT Tables_in_bd_musica = 'albums2007_2017'
                                            AND NOT Tables_in_bd_musica = 'playlist_cancion'
                                            AND NOT Tables_in_bd_musica = 'playlistconrock';");
        $sql->execute();
        $res = $sql->fetchAll(PDO::FETCH_NUM); // obtenemos solo los nombres en un array plano
        $tablas = [];

        foreach ($res as $fila) {
            $tablas[] = $fila[0];
        }

        return $tablas;
    }
    public function nombrarCanciones()
    {
        $sql = $this->con->prepare("SELECT cancion.*, artista.Nombre_artistico FROM cancion 
	                                            INNER JOIN album_artista ON (cancion.ID_album = album_artista.ID_album) 
                                                INNER JOIN artista ON (artista.ID_artista = album_artista.ID_artista);");
        $sql->execute();
        $res = $sql->fetchAll();
        $arreglo = array();
        foreach ($res as $fila) {
            $cancion = new Cancion();
            $cancion->id_cancion = $fila['ID_cancion'];
            $cancion->id_genero = $fila['ID_genero'];
            $cancion->id_album = $fila['ID_album'];
            $cancion->titulo = $fila['Titulo'];
            $cancion->duracion = $fila['Duracion'];
            $cancion->fecha = $fila['Fecha'];
            $cancion->letra = $fila['Letra'];
            $cancion->audio = $fila['Audio'];
            // Columna nueva a partir de búsqueda:
            $cancion->artista = $fila['Nombre_artistico'];

            array_push($arreglo, $cancion);
        }
        return $arreglo;
    }
    public function verPlaylists($id_usuario)
    {
        $sql = $this->con->prepare("SELECT *FROM playlist WHERE (ID_usuario = ?);");
        $sql->execute([$id_usuario]);
        $res = $sql->fetchAll(PDO::FETCH_NUM);
        return $res;
    }
    public function verAlbum()
    {
        $sql = $this->con->prepare("SELECT * FROM album;");
         $sql->execute();
         $res = $sql->fetchAll(PDO::FETCH_NUM);
         return $res;
    }
}
?>