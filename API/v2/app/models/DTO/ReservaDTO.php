<?php

class ReservaDTO implements JsonSerializable{

    private $id;
    private $pista;
    private $fecha;
    private $hora_inicio;
    private $hora_fin;
    private $nombreCliente;
    private $estado;
    private $jugador2;
    private $jugador3;
    private $jugador4;

    function __construct($id, $pista,$fecha, $hora_inicio, $hora_fin, $nombreCliente, $estado, $jugador2, $jugador3, $jugador4){
        $this->id = $id;
        $this->pista = $pista;
        $this->fecha = $fecha;
        $this->hora_inicio = $hora_inicio;
        $this->hora_fin = $hora_fin;
        $this->nombreCliente = $nombreCliente;
        $this->estado = $estado;
        $this->jugador2 = $jugador2;
        $this->jugador3 = $jugador3;
        $this->jugador4 = $jugador4;      
    }
   


    /**
     * Get the value of id
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Get the value of pista
     */
    public function getPista()
    {
        return $this->pista;
    }

    /**
     * Get the value of fecha
     */
    public function getFecha()
    {
        return $this->fecha;
    }

    /**
     * Get the value of hora_inicio
     */
    public function getHoraInicio()
    {
        return $this->hora_inicio;
    }

    /**
     * Get the value of hora_fin
     */
    public function getHoraFin()
    {
        return $this->hora_fin;
    }

    /**
     * Get the value of nombreCliente
     */
    public function getNombreCliente()
    {
        return $this->nombreCliente;
    }

    /**
     * Get the value of estado
     */
    public function getEstado()
    {
        return $this->estado;
    }

    /**
     * Get the value of jugador2
     */
    public function getJugador2()
    {
        return $this->jugador2;
    }

    /**
     * Get the value of jugador3
     */
    public function getJugador3()
    {
        return $this->jugador3;
    }

    /**
     * Get the value of jugador4
     */
    public function getJugador4()
    {
        return $this->jugador4;
    }

    public function jsonSerialize() {
        $reserva = get_object_vars( $this );
        return $reserva;
    }
}

?>