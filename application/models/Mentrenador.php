<?php

class Mentrenador extends CI_Model {

    function __construct() {
        parent::__construct();
        $this->load->database();
        $this->load->helper('date');
        date_default_timezone_set("america/bogota");
    }

    public function add_entrenador() {
        $data = array(
            'cedula' => $this->input->post('cedula'),
            'tipo_documento' => $this->input->post('tipodoc'),
            'nombre' => $this->input->post('nombres'),
            'apellidos' => $this->input->post('apellidos'),
            'email' => $this->input->post('email'),
            'telefono' => $this->input->post('tel'),
            'celular' => $this->input->post('cel'),
            'fecha_nacimiento' => $this->input->post('fechanac'),
            'barrio' => $this->input->post('barrio'),
            'direccion' => $this->input->post('direccion'),
            'deporte' => $this->input->post('deporte'),
            'password' => $this->input->post('pass')
            //'fecha_registro' => $this->input->post('fecha_registro');
        );
        $this->db->insert('entrenador', $data);
    }


    public function lista() {
        $query = $this->db->get("entrenador");
        return $query->result();
    }
}