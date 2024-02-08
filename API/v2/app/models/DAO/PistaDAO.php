<?php

class PistaDAO{

    private $db;

    public function __construct() {
        $this->db = DatabaseSingleton::getInstance();
    }

    public function getAllPistas(){
        $connection = $this->db->getConnection();
        $query = "SELECT * FROM pistas";
        $statement = $connection->query($query);
        $result = $statement->fetchAll(PDO::FETCH_ASSOC);
        
        $listaPistas = array();

        foreach ($result as $pista){
            array_push($listaPistas, new PistaDTO($pista['id_pista'], $pista['nombre'], $pista['tipo'], $pista['disponibilidad']=='1'));
        }
        return $listaPistas;
    }

    public function getPistaById($id){
        $connection = $this->db->getConnection();
        $query = "SELECT * FROM pistas WHERE id_pista=".$id;
        $statement = $connection->query($query);
        $result = $statement->fetchAll(PDO::FETCH_ASSOC);
        $pistaDTO = null;
        foreach ($result as $pista){
            $pistaDTO = new PistaDTO($pista['id_pista'], $pista['nombre'], $pista['tipo'], $pista['disponibilidad']=='1');
        }
        return $pistaDTO;
    }

}
?>