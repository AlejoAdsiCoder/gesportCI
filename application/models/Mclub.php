<?php 
 class Mclub extends CI_Model {

    function __construct() {
        parent::__construct();
        $this->load->database();
        $this->load->helper('date');
        date_default_timezone_set("america/bogota");
    }

    public function add() {
        $data = array(
            'nombre' => $this->input->post('nombre'),
            'deporte_entrenamiento'  => $this->input->post('deporte'),
            'fecha_registro'=> $this->input->post('fecha_registro'),
            'cupo' => $this->input->post('cupo'),
            'estado' => $this->input->post('estado'),
            'entrenador_cedula' => $this->input->post('entrenador')
        );
        $result = $this->db->insert('club',$data);
        return $result;
    }

    public function lista() {
        $query = $this->db->get("club");
        return $query->result();
    }

    public function borrar() {
        $id = $this->input->post('id');
        $this->db->where('id', $id);
        $result=$this->db->delete('club');
        return $result;
    }
}