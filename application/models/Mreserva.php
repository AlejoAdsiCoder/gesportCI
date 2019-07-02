<?php
    class Mreserva extends CI_Model {

        public function getReservas($ent = '') {
            $con=mysqli_connect("localhost","root","","gesport") or die("Problemas con la conexión");
            if($ent == null) {
                $registros = mysqli_query($con, "select reserva.id AS id, c.nombre AS club, e.nombre AS escenario, reserva.descripcion AS title, fecha_hora_inicio AS start, fecha_hora_fin AS end, reserva.estado AS state FROM reserva INNER JOIN club AS c ON reserva.club_id = c.id INNER JOIN escenario AS e ON reserva.escenario_id = e.id") or
                die("Problemas en el select:".mysqli_error($con));
            }
            else {
                $registros = mysqli_query($con, "select reserva.id AS id, c.nombre AS club, e.nombre AS escenario, reserva.descripcion AS title, fecha_hora_inicio AS start, fecha_hora_fin AS end, reserva.estado AS state FROM reserva INNER JOIN club AS c ON reserva.club_id = c.id INNER JOIN escenario AS e ON reserva.escenario_id = e.id WHERE c.entrenador_cedula = '$ent'") or
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

        public function getResDate($text) {
            $con=mysqli_connect("localhost","root","","gesport") or die("Problemas con la conexión");
           
                $registros = mysqli_query($con, "select reserva.id AS id, c.nombre AS club, e.nombre AS escenario, reserva.descripcion AS title, fecha_hora_inicio AS start, fecha_hora_fin AS end, reserva.estado AS state FROM reserva INNER JOIN club AS c ON reserva.club_id = c.id INNER JOIN escenario AS e ON reserva.escenario_id = e.id WHERE DATE(fecha_hora_inicio) = '$text'") or
                die("Problemas en el select:".mysqli_error($con));
            
            

            $data = array();
            while($rows = mysqli_fetch_assoc($registros)) {
                $data[] = $rows;
            }
            return $data;
        }

        public function getEscReserva($id) {
            $con=mysqli_connect("localhost","root","","gesport") or die("Problemas con la conexión");
           
                $registros = mysqli_query($con, "select reserva.id AS id, c.nombre AS club, e.nombre AS escenario, reserva.descripcion AS title, fecha_hora_inicio AS start, fecha_hora_fin AS end, reserva.estado AS state FROM reserva INNER JOIN club AS c ON reserva.club_id = c.id INNER JOIN escenario AS e ON reserva.escenario_id = e.id WHERE escenario_id = '$id'") or
                die("Problemas en el select:".mysqli_error($con));
            
            

            $data = array();
            while($rows = mysqli_fetch_assoc($registros)) {
                $data[] = $rows;
            }
            return $data;
        }

        public function getClubReserva($id) {
            $con=mysqli_connect("localhost","root","","gesport") or die("Problemas con la conexión");
           
                $registros = mysqli_query($con, "select reserva.id AS id, c.nombre AS club, e.nombre AS escenario, reserva.descripcion AS title, fecha_hora_inicio AS start, fecha_hora_fin AS end, reserva.estado AS state FROM reserva INNER JOIN club AS c ON reserva.club_id = c.id INNER JOIN escenario AS e ON reserva.escenario_id = e.id WHERE club_id = '$id'") or
                die("Problemas en el select:".mysqli_error($con));
            
            

            $data = array();
            while($rows = mysqli_fetch_assoc($registros)) {
                $data[] = $rows;
            }
            return $data;
        }

        public function lista() {
            $con=mysqli_connect("localhost","root","","gesport") or die("Problemas con la conexión");
           
                $registros = mysqli_query($con, "select reserva.id AS id, c.nombre AS club, e.nombre AS escenario, reserva.descripcion AS title, fecha_hora_inicio AS start, fecha_hora_fin AS end, reserva.estado AS estado, reserva.estado AS state FROM reserva INNER JOIN club AS c ON reserva.club_id = c.id INNER JOIN escenario AS e ON reserva.escenario_id = e.id") or
                die("Problemas en el select:".mysqli_error($con));
            
            

            $data = array();
            while($rows = mysqli_fetch_assoc($registros)) {
                $data[] = $rows;
            }
            return $data;
        }
        
/*
        public function getCheckclubes() {
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
        }
*/
        public function gethorarios($esc = '') {
            $this->db->select('*');
            $this->db->from('escenario');
            $this->db->join('horario', 'escenario.id = horario.escenario_id');
            $this->db->where('escenario.id', $esc);
            $query = $this->db->get();
            return $query->result();
        }

        public function add() {
            $data = array(
                'club_id' => $this->input->post('club'),
                'escenario_id' => $this->input->post('escenario'),
                'descripcion' => $this->input->post('descripcion'),
                'fecha_hora_inicio' => $this->input->post('fh_inicio'),
                'fecha_hora_fin' => $this->input->post('fh_fin'),
                'estado' => $this->input->post('estado')
                //'fecha_registro' => $this->input->post('fecha_registro');
            );
            $result = $this->db->insert('reserva', $data);
            return $result;
        }

        public function delete() {
            $id = $this->input->post('id');
            $this->db->where('id', $id);
            $result=$this->db->delete('reserva');
            return $result;
        }
    }

