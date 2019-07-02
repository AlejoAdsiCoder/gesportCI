<?php
class Deportista extends CI_Controller {
    function __construct() {
        parent::__construct();

        $this->load->helper(array('form', 'url'));        
        // Libreria para iniciar sesión
        $this->load->library('session');
        //Carga la libreria
        // $this->load->library("excel");
        //$this->load->library('html2pdf');

        //Carga del Modelo
        $this->load->model('mdeportista');
        
        
        //$this->load->model("excel_export_model");
    }

        public function index()
        {
           
            if(isset($_SESSION['e_id'])) {
                $datases["usu"] = $_SESSION['e_id'];
            } elseif(isset($_SESSION['a_nombre'])) {
                $datases["usu"] = $_SESSION['a_nombre'];
            } elseif(isset($_SESSION['d_id'])) {
                $datases["usu"] = $_SESSION['d_id'];
            }
            // $data["deportistas_data"] = $this->mdeportista->lista();
            // $this->carga_layout("lista_deportistas",$data);
            $this->carga_layout("lista_deportistas", $datases);
        }

        public function dep_data() {
            $datos = $this->mdeportista->lista();
            echo json_encode($datos);
        }

        public function carga_layout($template, $datases) 
        {
            $this->load->view('header');
            if(isset($_SESSION['a_nombre'])) {
                $this->load->view('layouts/admin/nav', $datases);
                $this->load->view($template);
            }
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

