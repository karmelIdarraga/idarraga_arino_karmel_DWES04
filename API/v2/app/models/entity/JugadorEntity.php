<?php

class JugadorEntity{

    protected $nombre;
    protected $edad;
    protected $nivel;

    function __construct($nombre, $edad, $nivel){
        $this->nombre = $nombre;
        $this->edad = $edad;
        $this->nivel = $nivel;

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

}
?>