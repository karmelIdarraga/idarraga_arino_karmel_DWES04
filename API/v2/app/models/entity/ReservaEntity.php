<?php

class ReservaEntity{

    private $id;
    private $pista;
    private $fecha;
    private $hora_inicio;
    private $hora_fin;
    private $cliente;
    private $estado;
    private $jugador2_nombre;
    private $jugador2_edad;
    private $jugador2_nivel;
    private $jugador3_nombre;
    private $jugador3_edad;
    private $jugador3_nivel;
    private $jugador4_nombre;
    private $jugador4_edad;
    private $jugador4_nivel;
    private $fecha_alta;
    private $fecha_confirmacion;

    function __construct($id, $pista,$fecha, $hora_inicio, $hora_fin, $cliente, $estado, $jugador2_nombre, $jugador2_edad, $jugador2_nivel, $jugador3_nombre, $jugador3_edad, $jugador3_nivel,$jugador4_nombre, $jugador4_edad, $jugador4_nivel, $fecha_alta, $fecha_confirmacion){
        $this->id = $id;
        $this->pista = $pista;
        $this->fecha = $fecha;
        $this->hora_inicio = $hora_inicio;
        $this->hora_fin = $hora_fin;
        $this->cliente = $cliente;
        $this->estado = $estado;
        $this->jugador2_nombre = $jugador2_nombre;
        $this->jugador2_edad = $jugador2_edad;
        $this->jugador2_nivel = $jugador2_nivel;
        $this->jugador3_nombre = $jugador3_nombre;
        $this->jugador3_edad = $jugador3_edad;
        $this->jugador3_nivel = $jugador3_nivel; 
        $this->jugador4_nombre = $jugador4_nombre;
        $this->jugador4_edad = $jugador4_edad;
        $this->jugador4_nivel = $jugador4_nivel; 
        $this->fecha_alta = $fecha_alta;
        $this->fecha_confirmacion = $fecha_confirmacion;     
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
     * Get the value of pista
     */
    public function getPista()
    {
        return $this->pista;
    }

    /**
     * Set the value of pista
     */
    public function setPista($pista): self
    {
        $this->pista = $pista;

        return $this;
    }

    /**
     * Get the value of fecha
     */
    public function getFecha()
    {
        return $this->fecha;
    }

    /**
     * Set the value of fecha
     */
    public function setFecha($fecha): self
    {
        $this->fecha = $fecha;

        return $this;
    }

    /**
     * Get the value of hora_inicio
     */
    public function getHoraInicio()
    {
        return $this->hora_inicio;
    }

    /**
     * Set the value of hora_inicio
     */
    public function setHoraInicio($hora_inicio): self
    {
        $this->hora_inicio = $hora_inicio;

        return $this;
    }

    /**
     * Get the value of hora_fin
     */
    public function getHoraFin()
    {
        return $this->hora_fin;
    }

    /**
     * Set the value of hora_fin
     */
    public function setHoraFin($hora_fin): self
    {
        $this->hora_fin = $hora_fin;

        return $this;
    }

    /**
     * Get the value of cliente
     */
    public function getCliente()
    {
        return $this->cliente;
    }

    /**
     * Set the value of cliente
     */
    public function setCliente($cliente): self
    {
        $this->cliente = $cliente;

        return $this;
    }

    /**
     * Get the value of estado
     */
    public function getEstado()
    {
        return $this->estado;
    }

    /**
     * Set the value of estado
     */
    public function setEstado($estado): self
    {
        $this->estado = $estado;

        return $this;
    }

    /**
     * Get the value of jugador2_nombre
     */
    public function getJugador2Nombre()
    {
        return $this->jugador2_nombre;
    }

    /**
     * Set the value of jugador2_nombre
     */
    public function setJugador2Nombre($jugador2_nombre): self
    {
        $this->jugador2_nombre = $jugador2_nombre;

        return $this;
    }

    /**
     * Get the value of jugador2_edad
     */
    public function getJugador2Edad()
    {
        return $this->jugador2_edad;
    }

    /**
     * Set the value of jugador2_edad
     */
    public function setJugador2Edad($jugador2_edad): self
    {
        $this->jugador2_edad = $jugador2_edad;

        return $this;
    }

    /**
     * Get the value of jugador2_nivel
     */
    public function getJugador2Nivel()
    {
        return $this->jugador2_nivel;
    }

    /**
     * Set the value of jugador2_nivel
     */
    public function setJugador2Nivel($jugador2_nivel): self
    {
        $this->jugador2_nivel = $jugador2_nivel;

        return $this;
    }

    /**
     * Get the value of jugador3_nombre
     */
    public function getJugador3Nombre()
    {
        return $this->jugador3_nombre;
    }

    /**
     * Set the value of jugador3_nombre
     */
    public function setJugador3Nombre($jugador3_nombre): self
    {
        $this->jugador3_nombre = $jugador3_nombre;

        return $this;
    }

    /**
     * Get the value of jugador3_edad
     */
    public function getJugador3Edad()
    {
        return $this->jugador3_edad;
    }

    /**
     * Set the value of jugador3_edad
     */
    public function setJugador3Edad($jugador3_edad): self
    {
        $this->jugador3_edad = $jugador3_edad;

        return $this;
    }

    /**
     * Get the value of jugador3_nivel
     */
    public function getJugador3Nivel()
    {
        return $this->jugador3_nivel;
    }

    /**
     * Set the value of jugador3_nivel
     */
    public function setJugador3Nivel($jugador3_nivel): self
    {
        $this->jugador3_nivel = $jugador3_nivel;

        return $this;
    }

    /**
     * Get the value of jugador4_nombre
     * 
     */
    public function getJugador4Nombre()
    {
        return $this->jugador4_nombre;
    }

    /**
     * Set the value of jugador4_nombre
     */
    public function setJugador4Nombre($jugador4_nombre): self
    {
        $this->jugador4_nombre = $jugador4_nombre;

        return $this;
    }

    /**
     * Get the value of jugador4_edad
     */
    public function getJugador4Edad()
    {
        return $this->jugador4_edad;
    }

    /**
     * Set the value of jugador4_edad
     */
    public function setJugador4Edad($jugador4_edad): self
    {
        $this->jugador4_edad = $jugador4_edad;

        return $this;
    }

    /**
     * Get the value of jugador4_nivel
     */
    public function getJugador4Nivel()
    {
        return $this->jugador4_nivel;
    }

    /**
     * Set the value of jugador4_nivel
     */
    public function setJugador4Nivel($jugador4_nivel): self
    {
        $this->jugador4_nivel = $jugador4_nivel;

        return $this;
    }

    /**
     * Get the value of fecha_confirmacion
     */
    public function getFechaConfirmacion()
    {
        return $this->fecha_confirmacion;
    }

    /**
     * Set the value of fecha_confirmacion
     */
    public function setFechaConfirmacion($fecha_confirmacion): self
    {
        $this->fecha_confirmacion = $fecha_confirmacion;

        return $this;
    }

    /**
     * Get the value of fecha_alta
     */
    public function getFechaAlta()
    {
        return $this->fecha_alta;
    }

    /**
     * Set the value of fecha_alta
     */
    public function setFechaAlta($fecha_alta): self
    {
        $this->fecha_alta = $fecha_alta;

        return $this;
    }
}

?>