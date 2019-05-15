<?php
class Reserva extends CI_Controller {
    function __construct() {
        parent::__construct();

        $this->load->helper(array('form', 'url'));        
        // Libreria para iniciar sesión
        // $this->load->library('session');
        //Carga la libreria
        // $this->load->library("excel");
        //$this->load->library('html2pdf');

        //Carga del Modelo
        $this->load->model('mdeportista');
        
        
        //$this->load->model("excel_export_model");
    }
    public function index()
    {
        // $data["deportistas_data"] = $this->mdeportista->lista();
        // $this->carga_layout("lista_deportistas",$data);
        $this->carga_layout("lista_reservas");
    }

    public function carga_layout($template) 
    {
        $this->load->view('nav');
        $this->load->view($template);
    }

    public function getReservas() {
        $this->load->database();
        $query = $this->db->get('reserva');
        echo json_encode($query->result());
    }
}