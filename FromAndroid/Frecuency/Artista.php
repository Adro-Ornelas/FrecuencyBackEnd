<?php
// Objeto Artista
class Artista {
    public $id_artista;
    public $nombre_art;
    public $nombre_real;
    public $apep;
    public $apem;
    public $tel;
    public $fecha_show;
    public $ciudad_show;
    public $hora_inicio;
    public $hora_final;

    public function __toString() {  // Imprimir como string
        return  "id_artista: $this->id_artista, nombre_art: $this->nombre_art,
        nombre_real: $this->nombre_real, apep: $this->apep, apem: $this->apem,
        tel: $this->tel, fecha_show: $this->fecha_show, ciudad_show: $this->ciudad_show, 
        hora_inicio: $this->hora_inicio, hora_final: $this->hora_final\n";
    }
}
?>