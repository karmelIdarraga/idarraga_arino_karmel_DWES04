<?php

class ReservasController {

    private $reservasDAO;

    function __construct(){
        $this->reservasDAO = new ReservaDAO();
    }


    public function getAll(){
        $reservas = $this->reservasDAO->getAllReservas();
        if (!empty($reservas)){
            header(CodigosRespuesta::httpHeaderFor(CodigosRespuesta::HTTP_OK));
            $response = new Response(CodigosRespuesta::HTTP_OK, $reservas );
            echo json_encode ($response);
        }else{
            header(CodigosRespuesta::httpHeaderFor(CodigosRespuesta::HTTP_NO_CONTENT));
            $response = new Response(CodigosRespuesta::HTTP_NO_CONTENT, "No se han encontrado reservas");
            echo json_encode ($response);
        }        
    }

    public function addReserva ($reserva){
        $reservaObj = new ReservaEntity(null, $reserva['id_pista'],$reserva['fecha'], $reserva['hora_inicio'], $reserva['hora_fin'], $reserva['cliente'], "pendiente", null, null, null, null, null, null, null, null, null, null, null);
        // Al crear una nueva reserva se crea en estado pendiente y sin jugadores más allá del cliente que la realiza
        $id_reserva = $this->reservasDAO->addReserva($reservaObj);
        $reservaGuardada = $this->reservasDAO->getReservaById($id_reserva);

        header(CodigosRespuesta::httpHeaderFor(CodigosRespuesta::HTTP_CREATED));
        $response = new Response(CodigosRespuesta::HTTP_CREATED, $reservaGuardada);
        echo json_encode ($response);
    }

    public function confirmarReserva ($id, $datos){

        $reservaGuardada = $this->reservasDAO->getReservaById($id);
        if ($reservaGuardada!=null){
            if ($reservaGuardada->getEstado()=='pendiente'){
                $jugador2 = null;
                $jugador3 = null;
                $jugador4 = null;                
                if (!empty($datos['jugador2'])) {
                    $jugador2 = new JugadorEntity($datos['jugador2']['nombre'], $datos['jugador2']['edad'], $datos['jugador2']['nivel']);
                }
                if (!empty($datos['jugador3'])) {
                    $jugador3 = new JugadorEntity($datos['jugador3']['nombre'], $datos['jugador3']['edad'], $datos['jugador3']['nivel']);
                   
                }
                if (!empty($datos['jugador4'])) {
                    $jugador4 = new JugadorEntity($datos['jugador4']['nombre'], $datos['jugador4']['edad'], $datos['jugador4']['nivel']);
                   
                }
                $reservaEntity = new ReservaEntity($id, $reservaGuardada->getPista(),$reservaGuardada->getFecha(),$reservaGuardada->getHoraInicio(), $reservaGuardada->getHoraFin(), $reservaGuardada->getNombreCliente(), 'Confirmada', $jugador2->getNombre(), $jugador2->getEdad(), $jugador2->getNivel(), $jugador3->getNombre(), $jugador3->getEdad(), $jugador3->getNivel(), $jugador4->getNombre(), $jugador4->getEdad(), $jugador4->getNivel(),null, null );
                $this->reservasDAO->confirmarReserva($reservaEntity);
                $reservaGuardada = $this->reservasDAO->getReservaById($id);
                header(CodigosRespuesta::httpHeaderFor(CodigosRespuesta::HTTP_ACCEPTED));
                $response = new Response(CodigosRespuesta::HTTP_ACCEPTED, $reservaGuardada);
                echo json_encode ($response);
            }else{
                header(CodigosRespuesta::httpHeaderFor(CodigosRespuesta::HTTP_NOT_ACCEPTABLE));
                $response = new Response(CodigosRespuesta::HTTP_NOT_ACCEPTABLE, "La reserva con id ". $id . " ya esta confirmada por lo que no se puede confirmar");
                echo json_encode ($response);
            }
        }else{
            header(CodigosRespuesta::httpHeaderFor(CodigosRespuesta::HTTP_ACCEPTED));
            $response = new Response(CodigosRespuesta::HTTP_NO_CONTENT, "No se ha encontrado ninguna reserva con id ". $id);
            echo json_encode ($response);
        }
    }

    public function deleteReserva($id){
        if ($this->reservasDAO->deleteReserva($id)){
            header(CodigosRespuesta::httpHeaderFor(CodigosRespuesta::HTTP_OK));
            $response = new Response(CodigosRespuesta::HTTP_OK,"Se ha eliminado de la lista la reserva con id ". $id);
            echo json_encode ($response);
        }else{
            header(CodigosRespuesta::httpHeaderFor(CodigosRespuesta::HTTP_ACCEPTED));
            $response = new Response(CodigosRespuesta::HTTP_NO_CONTENT, "No se ha encontrado ninguna reserva con id ". $id);
            echo json_encode ($response);
        }   
    }
}

?>