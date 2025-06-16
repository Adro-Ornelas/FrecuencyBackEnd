<?php
// Objetos de cada tabla:
require_once 'Cancion.php';
require_once 'Artista.php';
// Objeto para conectar y CRUD:
class BaseDeDatos
{
    private $con;
    public function __construct()
    {
        try {
            $this->con = new PDO('mysql:host=localhost;dbname=frecuency', 'root', '');
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
    public function insertar_artista(
        $nombre_art,
        $nombre_real,
        $apep,
        $apem,
        $tel,
        $fecha_show,
        $ciudad_show,
        $hora_inicio,
        $hora_final
    ) {
        // Insertar
        $sql = $this->con->prepare("INSERT INTO artista(ID_artista, Nombre_artistico, 
        Nombre, Apellido_Paterno, Apellido_Materno, num_tel, fecha_show, 
        ciudad_show, hora_inicio, hora_final) 
        VALUES (NULL, ?, ?, ?, ?, ?, ?, ?, ?, ?);");
        $resultado = $sql->execute([
            $nombre_art,
            $nombre_real,
            $apep,
            $apem,
            $tel,
            $fecha_show,
            $ciudad_show,
            $hora_inicio,
            $hora_final
        ]);

        if ($resultado) {
            return 1;
        } else {
            return 0;
        }
    }
    public function recuperar_artistas()
    {
        $sql = $this->con->prepare("SELECT * FROM artista");
        $sql->execute();
        $res = $sql->fetchAll();
        $arreglo = array();
        foreach ($res as $fila) {
            $artista = new Artista();
            $artista->id_artista = $fila['ID_artista'];
            $artista->nombre_art = $fila['Nombre_artistico'];
            $artista->nombre_real = $fila['Nombre'];
            $artista->apep = $fila['Apellido_Paterno'];
            $artista->apem = $fila['Apellido_Materno'];
            $artista->tel = $fila['num_tel'];
            $artista->fecha_show = $fila['fecha_show'];
            $artista->ciudad_show = $fila['ciudad_show'];
            $artista->hora_inicio = $fila['hora_inicio'];
            $artista->hora_final = $fila['hora_final'];

            array_push($arreglo, $artista);
        }
        return $arreglo;
    }
    public function eliminar_artista($id_artista)
    {
        // Elimina artista, devuelve 1 si exitoso 0 si no
        $sql = $this->con->prepare("DELETE FROM artista
        WHERE ID_artista=?;");
        $res = $sql->execute([$id_artista]);

        if ($res)
            return 1;
        else
            return 0;
    }
    public function actualizarArtista(
        $id,
        $nombre_art,
        $nombre_real,
        $apep,
        $apem,
        $tel,
        $fecha_show,
        $ciudad_show,
        $hora_inicio,
        $hora_final
    ) {
        $sql = $this->con->prepare("UPDATE artista SET 
        Nombre_artistico = ?, 
        Nombre = ?, 
        Apellido_Paterno = ?, 
        Apellido_Materno = ?, 
        num_tel = ?, 
        fecha_show = ?, 
        ciudad_show = ?, 
        hora_inicio = ?, 
        hora_final = ? 
        WHERE ID_artista = ?");

        $resultado = $sql->execute([
            $nombre_art,
            $nombre_real,
            $apep,
            $apem,
            $tel,
            $fecha_show,
            $ciudad_show,
            $hora_inicio,
            $hora_final,
            $id
        ]);

        return $resultado ? 1 : 0;
    }

}
?>