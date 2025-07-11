<?php
// Objeto Cancion
class Cancion {
    public $id_cancion;
    public $id_genero;
    public $id_album;
    public $titulo;
    public $duracion;
    public $fecha;
    public $artista;
    public $letra;
    public $audio;

    public function __toString() {  // Imprimir como string
        return  "id_cancion: $this->id_cancion, id_genero: $this->id_genero, id_album: $this->id_album,
                titulo: $this->titulo, duracion: $this->duracion, fecha: $this->fecha,
                letra: $this->letra, artista: $this->artista, audio: $this->audio\n";
    }
}
?>