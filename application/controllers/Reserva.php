<?php
class Reserva extends CI_Controller {
    function __construct() {
        parent::__construct();

        $this->load->helper(array('form', 'url'));        
        // Libreria para iniciar sesión
        $this->load->library('session');
        //Carga la libreria
        // $this->load->library("excel");
        //$this->load->library('html2pdf');

        //Carga del Modelo
        $this->load->model('mreserva');
        $this->load->model('mescenario');
        
        
        
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
        $this->carga_layout("lista_reservas", $datases);
    }

    public function data() {
        $this->db->order_by("razon_social", "ASC");
        $query = $this->db->get("empresa");
        return $query->result();
    }

    public function carga_layout($template, $datases) 
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

    public function getReserva() {
        if(isset($_SESSION['e_id'])) {
            $query = $this->mreserva->getReservas($_SESSION['e_id']);
        } else {
            $query = $this->mreserva->getReservas();
        }
        echo json_encode($query);
    }
}