<?php

class Club extends CI_controller {
    function __construct() {
        parent::__construct();            
        $this->load->helper(array('form', 'url'));        
        // Libreria para iniciar sesión
        $this->load->library('session');
        //Carga la libreria
        // $this->load->library("excel");
        //$this->load->library('html2pdf');

        //Carga del Modelo
        $this->load->model('mclub');                                                              
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
        $this->carga_layout("lista_club", $datases);
    }
    
    public function carga_layout($template, $datases = '') 
    {
        
        $this->load->view('header');
        if(isset($_SESSION['e_id'])) {
            $this->load->view('layouts/entrenador/nav');
        } elseif(isset($_SESSION['a_nombre'])) {
            $this->load->view('layouts/admin/nav', $datases);
        } elseif(isset($_SESSION['d_id'])) {
            $this->load->view('nav');
        }
        $this->load->view($template);
    }   

    public function Crear() {
        $this->carga_layout("crear_club.php");
    }

    public function nuevo() {
        /*
        $this->load->database();

        $insert = $this->input->post();
        $result = $this->db->insert('club', $insert);
        */
        
        $insert = $this->mclub->add();
        echo json_encode($insert);
    }

    public function edit($id)
    {
        $this->load->database();
        $q = $this->db->get_where('club', array('id' => $id));
        echo json_encode($q->row());
    }

    public function update($id)
    {
        $this->load->database();

        $insert = $this->input->post();
        $this->db->where('id', $id);
        $this->db->update('club', $insert);
        $q = $this->db->get_where('club', array('id' => $id));


        echo json_encode($q->row());
    }

    function delete() {
        $data=$this->mclub->borrar_club();
        echo json_encode($data);
    }
    

    public function lista() {
        $data = $this->mclub->listclub();
        echo json_encode($data);
    }
}