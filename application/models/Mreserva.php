<?php
    class Mreserva extends CI_Model {

        public function getReservas() {
            $this->db->select('id, club_id club, escenario_id escenario, descripcion title, fecha_hora_inicio start, fecha_hora_fin end');
            $this->db->from('reserva');
    
            return $this->db->get()->result();
        }

        /*
        public function getReservas() {
            $this->db->select('id, c.nombre AS club, e.nombre AS escenario, descripcion title, fecha_hora_inicio start, fecha_hora_fin end');
            $this->db->from('reserva');
            $this->db->join('club AS c', 'reserva.club_id = c.id');
            $this->db->join('escenario AS e', 'reserva.escenario_id = e.id');
            return $this->db->get()->result();
        }
        */
    }

