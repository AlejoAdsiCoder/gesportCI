<?php
    class Mreserva extends CI_Model {

        public function getReservas() {
            $this->db->select('id, club_id club, escenario_id escenario, descripcion title, fecha_hora_inicio start, fecha_hora_fin end');
            $this->db->from('reserva');
    
            return $this->db->get()->result();
        }
    }

