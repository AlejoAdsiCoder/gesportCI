<?php

class Mdeportista extends CI_Model {

function __construct() {
    parent::__construct();
    $this->load->database();
    $this->load->helper('date');
    date_default_timezone_set("america/bogota");
}

public function add_deportista() {
    $data = array(
        'cedula' => $this->input->post('cedula'),
        'tipo_documento' => $this->input->post('tipodoc'),
        'nombre' => $this->input->post('nombres'),
        'apellidos' => $this->input->post('apellidos'),
        'telefono' => $this->input->post('tel'),
        'celular' => $this->input->post('cel'),
        'email' => $this->input->post('email'),
        'fecha_nacimiento' => $this->input->post('fechanac'),
        'barrio' => $this->input->post('barrio'),
        'direccion' => $this->input->post('direccion'),
        'estatura' => $this->input->post('estatura'),
        'peso' => $this->input->post('peso'),
        'deporte' => $this->input->post('deporte'),
        'password' => $this->input->post('pass')
        //'fecha_registro' => $this->input->post('fecha_registro');
    );
    $this->db->insert('deportista', $data);
}

public function lista() {
    $query = $this->db->get("deportista");
    return $query->result();
}

public function borrar_user() {
    $id = $this->input->post('cedula');
    $this->db->where('cedula', $id);
    $result=$this->db->delete('deportista');
    return $result;
}

}