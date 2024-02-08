<?php

class SocioDTO implements JsonSerializable{

    protected $nombre;
    protected $edad;
    protected $nivel;
    protected $id;
    protected $antiguedad;

    function __construct($nombre, $edad, $nivel, $id, $antiguedad){
        $this->nombre = $nombre;
        $this->edad = $edad;
        $this->nivel = $nivel;
        $this->id = $id;
        $this->antiguedad = $antiguedad;
    }

    public function getNivel(){
        return $this->nivel;
    }

    public function getNombre(){
        return $this->nombre;
    }

    public function getEdad(){
        return $this->edad;
    }

    public function getId(){
        return $this->id;
    }

    public function getAntiguedad(){
        return $this->antiguedad;
    }

    public function jsonSerialize() {
        $jugador = get_object_vars( $this );
        return $jugador;
    }

}
?>