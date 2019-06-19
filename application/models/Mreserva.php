<?php
    class Mreserva extends CI_Model {

        public function getReservas($ent = '') {
            $con=mysqli_connect("localhost","root","","gesport") or die("Problemas con la conexión");
            if($ent == null) {
                $registros = mysqli_query($con, "select reserva.id AS id, c.nombre AS club, e.nombre AS escenario, reserva.descripcion AS title, fecha_hora_inicio AS start, fecha_hora_fin AS end FROM reserva INNER JOIN club AS c ON reserva.club_id = c.id INNER JOIN escenario AS e ON reserva.escenario_id = e.id") or
                die("Problemas en el select:".mysqli_error($con));
            }
            else {
                $registros = mysqli_query($con, "select reserva.id AS id, c.nombre AS club, e.nombre AS escenario, reserva.descripcion AS title, fecha_hora_inicio AS start, fecha_hora_fin AS end FROM reserva INNER JOIN club AS c ON reserva.club_id = c.id INNER JOIN escenario AS e ON reserva.escenario_id = e.id WHERE c.entrenador_cedula = '$ent'") or
                die("Problemas en el select:".mysqli_error($con));
            }
            

            $data = array();
            while($rows = mysqli_fetch_assoc($registros)) {
                $data[] = $rows;
            }
            return $data;
           
            /*
            $this->db->select('id, club_id club, escenario_id escenario, descripcion title, fecha_hora_inicio start, fecha_hora_fin end');
            $this->db->from('reserva');
    
            return $this->db->get()->result();
            */
        }

        
    }

