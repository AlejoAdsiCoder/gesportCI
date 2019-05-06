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
            'tipo_documento' => $this->input->post('tipo_documento'),
            'nombre' => $this->input->post('nombre'),
            'apellidos' => $this->input->post('apellidos'),
            'email' => $this->input->post('email'),
            'telefono' => $this->input->post('telefono'),
            'celular' => $this->input->post('celular'),
            'fecha_nacimiento' => $this->input->post('fechanac'),
            'barrio' => $this->input->post('barrio'),
            'direccion' => $this->input->post('direccion'),
            'deporte' => $this->input->post('deporte'),
            'password' => $this->input->post('pass')
            //'fecha_registro' => $this->input->post('fecha_registro');
        );
        $result = $this->db->insert('entrenador', $data);
        return $result;
    }


    public function lista() {
        $query = $this->db->get("entrenador");
        return $query->result();
    }

    public function borrar_user() {
        $id = $this->input->post('cedula');
        $this->db->where('cedula', $id);
        $result=$this->db->delete('entrenador');
        return $result;
    }
}