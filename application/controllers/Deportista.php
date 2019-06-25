<?php
class Deportista extends CI_Controller {
    function __construct() {
        parent::__construct();

        $this->load->helper(array('form', 'url'));        
        // Libreria para iniciar sesión
        //$this->load->library('session');
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
            $this->carga_layout("lista_deportistas");
        }

        public function dep_data() {
            $datos = $this->mdeportista->lista();
            echo json_encode($datos);
        }

        public function carga_layout($template) 
        {
            $this->load->view('layouts/headerf');
            
            $this->load->view('nav');
            $this->load->view($template);
            /*
            if(isset($_SESSION['a_nombre'])) {
            }*/
        }

        public function crearDeportista() {
            $this->carga_layout("deportistas/crear_deportista");
        }

        public function nuevoDeportista() {
            $this->mdeportista->add_deportista();
           // redirect('/paciente');
        }

        public function getDepbyName() {
            $text = $this->input->post('text');
            $resultado = $this->mdeportista->getDepbyName($text);
            echo json_encode($resultado);
        }

        public function edit($cedula)
        {
            $this->load->database();
            $q = $this->db->get_where('deportista', array('cedula' => $cedula));
            echo json_encode($q->row());
        }

        public function update($cedula)
        {
            $this->load->database();

            $insert = $this->input->post();
            $this->db->where('cedula', $cedula);
            $this->db->update('deportista', $insert);
            $q = $this->db->get_where('deportista', array('cedula' => $cedula));


            echo json_encode($q->row());
        }

        function delete() {
            $data=$this->mdeportista->borrar_user();
            echo json_encode($data);
        }

}

