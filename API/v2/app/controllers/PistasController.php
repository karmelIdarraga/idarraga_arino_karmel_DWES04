<?php

class PistasController {

    private $pistasDAO;
    
    function __construct(){
        $this->pistasDAO = new PistaDAO();
    }

    public function getAll(){
        $pistas = $this->pistasDAO->getAllPistas();
        if (!empty($pistas)){
            header(CodigosRespuesta::httpHeaderFor(CodigosRespuesta::HTTP_OK));
            $response = new Response(CodigosRespuesta::HTTP_OK, $pistas);
            echo json_encode ($response);
        }else{
            header(CodigosRespuesta::httpHeaderFor(CodigosRespuesta::HTTP_NO_CONTENT));
            $response = new Response(CodigosRespuesta::HTTP_NO_CONTENT, "No se han encontrado pistas");
            echo json_encode ($response);
        }        
    }

    public function getPistaById($id){
        $pista = $this->pistasDAO->getPistaById($id);       
        if ($pista != null){
            header(CodigosRespuesta::httpHeaderFor(CodigosRespuesta::HTTP_OK));
            $response = new Response(CodigosRespuesta::HTTP_OK, $pista );
            echo json_encode ($response);
        }else{
            header(CodigosRespuesta::httpHeaderFor(CodigosRespuesta::HTTP_OK));
            $response = new Response(CodigosRespuesta::HTTP_NO_CONTENT, "No se ha encontrado pista con id ". $id);
            echo json_encode ($response);
        }
    }
}

?>