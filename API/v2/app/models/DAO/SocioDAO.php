<?php

class SocioDAO{

    private $db;

    public function __construct() {
        $this->db = DatabaseSingleton::getInstance();
    }

    public function getSocioById($id){
        $connection = $this->db->getConnection();
        $query = "SELECT * FROM socios WHERE id_socio = ".$id;
        $statement = $connection->query($query);
        $result = $statement->fetchAll(PDO::FETCH_ASSOC);        
    }

}
?>