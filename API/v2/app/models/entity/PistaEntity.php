<?php

class PistaEntity {
    private $id;
    private $nombre;
    private $tipo;
    private $disponibilidad;

    function  __construct($id, $nombre, $tipo, $disponibilidad){
        $this->id = $id;
        $this->nombre = $nombre;
        $this->tipo = $tipo;
        $this->disponibilidad = $disponibilidad;
    }


    /**
     * Get the value of id
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set the value of id
     */
    public function setId($id): self
    {
        $this->id = $id;

        return $this;
    }

    /**
     * Get the value of nombre
     */
    public function getNombre()
    {
        return $this->nombre;
    }

    /**
     * Set the value of nombre
     */
    public function setNombre($nombre): self
    {
        $this->nombre = $nombre;

        return $this;
    }

    /**
     * Get the value of tipo
     */
    public function getTipo()
    {
        return $this->tipo;
    }

    /**
     * Set the value of tipo
     */
    public function setTipo($tipo): self
    {
        $this->tipo = $tipo;

        return $this;
    }

    /**
     * Get the value of disponibilidad
     */
    public function getDisponibilidad()
    {
        return $this->disponibilidad;
    }

    /**
     * Set the value of disponibilidad
     */
    public function setDisponibilidad($disponibilidad): self
    {
        $this->disponibilidad = $disponibilidad;

        return $this;
    }
}
?>