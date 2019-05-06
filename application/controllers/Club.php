<?php

class Club extends CI_controller {
    function __construct() {
        parent::__construct();
    }
    public function index()
    {
        // $data["deportistas_data"] = $this->mdeportista->lista();
        // $this->carga_layout("lista_deportistas",$data);
        $this->carga_layout("lista_club");
    }
    
    public function carga_layout($template) 
    {
        $this->load->view('header');
        $this->load->view('nav');
        $this->load->view($template);
    }   

    public function Crear() {
        $this->carga_layout("crear_club.php");
    }

    public function addClub() {
        $this->load->database();
        $data = array(
            'nombre' => $this->input->post('nombre'),
            'deporte_entrenamiento'  => $this->input->post('deporte'),
            'fecha_registro'=> $this->input->post('fecha_registro'),
            'cupo' => $this->input->post('cupo'),
            'estado' => $this->input->post('estado'),
            'entrenador_cedula' => $this->input->post('entrenador')
        );
        $this->db->insert('club', $data);
    }

    public function lista() {
        $this->load->database();
        $query = $this->db->get("club");
        echo json_encode($query->result());
    }
}