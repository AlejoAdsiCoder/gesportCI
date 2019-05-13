<?php
class Entrenador extends CI_Controller {
    function __construct() {
        parent::__construct();

        $this->load->helper(array('form', 'url'));        
        // Libreria para iniciar sesión
        // $this->load->library('session');
        //Carga la libreria
        // $this->load->library("excel");
        //$this->load->library('html2pdf');

        //Carga del Modelo
        $this->load->model('mentrenador');
        
        
        //$this->load->model("excel_export_model");
    }

    public function index()
    {
        // $data["deportistas_data"] = $this->mdeportista->lista();
        // $this->carga_layout("lista_deportistas",$data);
        $this->carga_layout("lista_entrenador");
    }


    public function carga_layout($template) 
    {
        $this->load->view('header');
        $this->load->view('nav');
        $this->load->view($template);
    }   

    public function ent_data() {
        $datos = $this->mentrenador->lista();
        echo json_encode($datos);
    }

    public function crearEntrenador() {
        $this->carga_layout("crear_entrenador");
     }

     /*
    public function nuevoEntrenador() {
        $data = $this->mentrenador->add_entrenador();
        echo json_encode($data);
    } */

    public function edit($cedula)
    {
        $this->load->database();
        $q = $this->db->get_where('entrenador', array('cedula' => $cedula));
        echo json_encode($q->row());
    }

    public function update($cedula)
    {
        $this->load->database();

        $insert = $this->input->post();
        $this->db->where('cedula', $cedula);
        $this->db->update('entrenador', $insert);
        $q = $this->db->get_where('entrenador', array('cedula' => $cedula));


        echo json_encode($q->row());
    }

    public function nuevoEntrenador() {
        $this->load->database();

        $insert = $this->input->post();
        $result = $this->db->insert('entrenador', $insert);
        
        echo json_encode($result);
    }

    function delete() {
        $data=$this->mentrenador->borrar_user();
        echo json_encode($data);
    }
}