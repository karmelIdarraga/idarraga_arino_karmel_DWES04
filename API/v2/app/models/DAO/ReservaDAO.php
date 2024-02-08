<?php

class ReservaDAO{

    private $db;

    public function __construct() {
        $this->db = DatabaseSingleton::getInstance();
    }

    public function getAllReservas(){
        $connection = $this->db->getConnection();
        $query = "SELECT * FROM reservas r JOIN socios s ON r.id_socio = s.id_socio";
        $statement = $connection->query($query);
        $result = $statement->fetchAll(PDO::FETCH_ASSOC);

        $listaReservas = array();

        foreach ($result as $reserva){
            $jugador2 = null;
            $jugador3 = null;
            $jugador4 = null;
            if (!empty($reserva['jugador2_nombre'])) {
                $jugador2 = new JugadorDTO($reserva['jugador2_nombre'], $reserva['jugador2_edad'], $reserva['jugador2_nivel']);
            }
            if (!empty($reserva['jugador3_nombre'])) {
                $jugador3 = new JugadorDTO($reserva['jugador3_nombre'], $reserva['jugador3_edad'], $reserva['jugador3_nivel']);
            }
            if (!empty($reserva['jugador4_nombre'])) {
                $jugador4 = new JugadorDTO($reserva['jugador4_nombre'], $reserva['jugador4_edad'], $reserva['jugador4_nivel']);
            }
            array_push($listaReservas, new ReservaDTO($reserva['id_reserva'], $reserva['id_pista'],$reserva['fecha_reserva'], $reserva['hora_inicio'], $reserva['hora_fin'], $reserva['nombre'], $reserva['estado'], $jugador2, $jugador3, $jugador4));
        }
        return $listaReservas;
    }

    public function getReservaById ($id){
        $connection = $this->db->getConnection();
        $query = "SELECT * FROM reservas r JOIN socios s ON r.id_socio = s.id_socio WHERE id_reserva = ".$id;
        $statement = $connection->query($query);
        $result = $statement->fetchAll(PDO::FETCH_ASSOC);

        $res = null;

        foreach ($result as $reserva){
            $jugador2 = null;
            $jugador3 = null;
            $jugador4 = null;
            if (!empty($reserva['jugador2_nombre'])) {
                $jugador2 = new JugadorDTO($reserva['jugador2_nombre'], $reserva['jugador2_edad'], $reserva['jugador2_nivel']);
            }
            if (!empty($reserva['jugador3_nombre'])) {
                $jugador3 = new JugadorDTO($reserva['jugador3_nombre'], $reserva['jugador3_edad'], $reserva['jugador3_nivel']);
            }
            if (!empty($reserva['jugador4_nombre'])) {
                $jugador4 = new JugadorDTO($reserva['jugador4_nombre'], $reserva['jugador4_edad'], $reserva['jugador4_nivel']);
            }
            $res = new ReservaDTO($reserva['id_reserva'], $reserva['id_pista'],$reserva['fecha_reserva'], $reserva['hora_inicio'], $reserva['hora_fin'], $reserva['nombre'], $reserva['estado'], $jugador2, $jugador3, $jugador4);
        }
        return $res;
    }

    public function addReserva($reserva){
        $connection = $this->db->getConnection();
        $query = "INSERT INTO reservas (id_pista, id_socio, fecha_reserva, hora_inicio, hora_fin, estado, jugador2_nombre, jugador2_edad, jugador2_nivel, jugador3_nombre, jugador3_edad, jugador3_nivel, jugador4_nombre, jugador4_edad, jugador4_nivel) 
        VALUES (:id_pista, :id_socio, :fec_reserva, :horainicio, :hora_fin, :estado, :jugador2_nombre, :jugador2_edad, :jugador2_nivel, :jugador3_nombre, :jugador3_edad, :jugador3_nivel, :jugador4_nombre, :jugador4_edad, :jugador4_nivel);";
        $statement = $connection->prepare($query);
        $statement->bindValue(':id_pista', $reserva->getPista());
        $statement->bindValue(':id_socio',$reserva->getCliente());
        $statement->bindValue(':fec_reserva',$reserva->getFecha());
        $statement->bindValue(':horainicio',$reserva->getHoraInicio());
        $statement->bindValue(':hora_fin',$reserva->getHoraFin());
        $statement->bindValue(':estado',$reserva->getEstado());
        $statement->bindValue(':jugador2_nombre',$reserva->getJugador2Nombre());
        $statement->bindValue(':jugador2_edad',$reserva->getJugador2Edad());
        $statement->bindValue(':jugador2_nivel',$reserva->getJugador2Nivel());
        $statement->bindValue(':jugador3_nombre',$reserva->getJugador3Nombre());
        $statement->bindValue(':jugador3_edad',$reserva->getJugador3Edad());
        $statement->bindValue(':jugador3_nivel',$reserva->getJugador3Nivel());
        $statement->bindValue(':jugador4_nombre',$reserva->getJugador4Nombre());
        $statement->bindValue(':jugador4_edad',$reserva->getJugador4Edad());
        $statement->bindValue(':jugador4_nivel',$reserva->getJugador4Nivel());

        $statement->execute();
        $result = $connection->lastInsertId();

        return $result;
    }

    public function updateReserva($reserva){
        $connection = $this->db->getConnection();
        
        $query = "UPDATE reservas SET id_pista=:id_pista, id_socio=:id_socio, fecha_reserva=:fec_reserva, hora_inicio=:horainicio, hora_fin=:hora_fin, estado=:estado, jugador2_nombre=:jugador2_nombre, jugador2_edad=:jugador2_edad, jugador2_nivel=:jugador2_nivel, jugador3_nombre=:jugador3_nombre, jugador3_edad=:jugador3_edad, jugador3_nivel=:jugador3_nivel, jugador4_nombre=:jugador4_nombre, jugador4_edad=:jugador4_edad, jugador4_nivel=:jugador4_nivel,fecha_confirmacion = :fecha_confirmacion  WHERE (id_reserva = :id_reserva)"; 
        $statement = $connection->prepare($query);
        $statement->bindValue(':id_reserva', $reserva->getId());
        $statement->bindValue(':id_pista', $reserva->getPista());
        $statement->bindValue(':id_socio',$reserva->getCliente());
        $statement->bindValue(':fec_reserva',$reserva->getFecha());
        $statement->bindValue(':horainicio',$reserva->getHoraInicio());
        $statement->bindValue(':hora_fin',$reserva->getHoraFin());
        $statement->bindValue(':estado',$reserva->getEstado());
        $statement->bindValue(':jugador2_nombre',$reserva->getJugador2Nombre());
        $statement->bindValue(':jugador2_edad',$reserva->getJugador2Edad());
        $statement->bindValue(':jugador2_nivel',$reserva->getJugador2Nivel());
        $statement->bindValue(':jugador3_nombre',$reserva->getJugador3Nombre());
        $statement->bindValue(':jugador3_edad',$reserva->getJugador3Edad());
        $statement->bindValue(':jugador3_nivel',$reserva->getJugador3Nivel());
        $statement->bindValue(':jugador4_nombre',$reserva->getJugador4Nombre());
        $statement->bindValue(':jugador4_edad',$reserva->getJugador4Edad());
        $statement->bindValue(':jugador4_nivel',$reserva->getJugador4Nivel());
        $statement->bindValue(':fecha_confirmacion',$reserva->getFechaConfirmacion());

        $statement->execute();
        $result = $connection->lastInsertId();

        return $result;
    }

    public function confirmarReserva($reserva){
        $connection = $this->db->getConnection();
        
        $query = "UPDATE reservas SET estado=:estado, jugador2_nombre=:jugador2_nombre, jugador2_edad=:jugador2_edad, jugador2_nivel=:jugador2_nivel, jugador3_nombre=:jugador3_nombre, jugador3_edad=:jugador3_edad, jugador3_nivel=:jugador3_nivel, jugador4_nombre=:jugador4_nombre, jugador4_edad=:jugador4_edad, jugador4_nivel=:jugador4_nivel,fecha_confirmacion = CURRENT_TIMESTAMP()  WHERE (id_reserva = :id_reserva)"; 
        $statement = $connection->prepare($query);
        $statement->bindValue(':id_reserva', $reserva->getId());
        $statement->bindValue(':estado',$reserva->getEstado());
        $statement->bindValue(':jugador2_nombre',$reserva->getJugador2Nombre());
        $statement->bindValue(':jugador2_edad',$reserva->getJugador2Edad());
        $statement->bindValue(':jugador2_nivel',$reserva->getJugador2Nivel());
        $statement->bindValue(':jugador3_nombre',$reserva->getJugador3Nombre());
        $statement->bindValue(':jugador3_edad',$reserva->getJugador3Edad());
        $statement->bindValue(':jugador3_nivel',$reserva->getJugador3Nivel());
        $statement->bindValue(':jugador4_nombre',$reserva->getJugador4Nombre());
        $statement->bindValue(':jugador4_edad',$reserva->getJugador4Edad());
        $statement->bindValue(':jugador4_nivel',$reserva->getJugador4Nivel());
       

        $statement->execute();
        $result = $statement->rowCount() == 1;

        return $result;
    }

    public function deleteReserva($id){
        $connection = $this->db->getConnection();
        $res = $connection->exec("DELETE FROM reservas WHERE (id_reserva = ".$id.")");
        return $res == 1;
    }
}
?>