<?php
class Deportista extends CI_Controller {
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
            $data["deportistas_data"] = $this->mdeportista->lista();
            $this->carga_layout("lista_deportistas",$data);
        }

        public function carga_layout($template, $data = '') 
        {
            $this->load->view('header');
            $this->load->view('nav');
            $this->load->view($template, $data);
        }

        public function crearDeportista() {
            $this->carga_layout("deportistas/crear_deportista");
        }

        public function nuevoDeportista() {
            $this->mdeportista->add_deportista();
           // redirect('/paciente');
        }

}