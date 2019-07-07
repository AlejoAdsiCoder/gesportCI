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
        $this->load->model('mclub');
        
        
        
        //$this->load->model("excel_export_model");
    }
    public function index()
    {
        if(isset($_SESSION['e_nombre'])) {
            $datases["usu"] = $_SESSION['e_nombre'];
        } elseif(isset($_SESSION['a_nombre'])) {
            $datases["usu"] = $_SESSION['a_nombre'];
        } elseif(isset($_SESSION['d_nombre'])) {
            $datases["usu"] = $_SESSION['d_nombre'];
        }
        
        // $data["deportistas_data"] = $this->mdeportista->lista();
        // $this->carga_layout("lista_deportistas",$data);
        
        $data["listclub"] = $this->mclub->listclub();
        $data["listesc"] = $this->mescenario->lista();
        $this->carga_layout("lista_reservas", $datases, $data);
    }

    public function lista($esc) {
        $data = $this->mreserva->gethorarios($esc);
        echo json_encode($data);
    }

    public function edit($id)
    {
        $this->load->database();
        $q = $this->db->get_where('reserva', array('id' => $id));
        echo json_encode($q->row());
    }

    public function update($id)
    {
        $this->load->database();

        $data = array(
            'club_id' => $this->input->post('club'),
            'escenario_id'  => $this->input->post('escenario'),
            'descripcion'=> $this->input->post('descripcion'),
            'fecha_hora_inicio' => $this->input->post('fh_inicio'),
            'fecha_hora_fin' => $this->input->post('fh_fin'),
            'estado' => $this->input->post('estado')
        );
        $this->db->where('id', $id);
        $this->db->update('reserva', $data);
        $q = $this->db->get_where('reserva', array('id' => $id));


        echo json_encode($q->row());
    }

    public function upState($id)
    {
        $this->load->database();
        $data = array(
            'estado' => $this->input->post('status')
        );

        $this->db->where('id', $id);
        $this->db->update('reserva', $data);
        $q = $this->db->get_where('reserva', array('id' => $id));

        echo json_encode($q->row());
    }

    public function crearReserva() {
        if(isset($_SESSION['e_nombre'])) {
            $datases["usu"] = $_SESSION['e_nombre'];
        } elseif(isset($_SESSION['a_nombre'])) {
            $datases["usu"] = $_SESSION['a_nombre'];
        } elseif(isset($_SESSION['d_nombre'])) {
            $datases["usu"] = $_SESSION['d_nombre'];
        }
        
        $data["listclub"] = $this->mclub->listclub();
        $data["listesc"] = $this->mescenario->lista();
        $this->carga_layout("crear_reserva", $datases, $data);
    }

    public function listSolicitudes() {
        if(isset($_SESSION['e_nombre'])) {
            $datases["usu"] = $_SESSION['e_nombre'];
        } elseif(isset($_SESSION['a_nombre'])) {
            $datases["usu"] = $_SESSION['a_nombre'];
            
        }/* elseif(isset($_SESSION['d_id'])) {
            header('location:'.base_url()."Login/".$this->index());  
        }*/

        $data["listclub"] = $this->mclub->listclub();
        $data["listesc"] = $this->mescenario->lista();
        $this->carga_layout("solicitudes", $datases, $data);
    }

    public function nuevo() {
        /*
        $this->load->database();

        $insert = $this->input->post();
        $result = $this->db->insert('club', $insert);
        */
        
        $this->mreserva->add();
        echo base_url()."Reserva";
    }

    public function carga_layout($template, $datases = '', $data = '') 
    {
        $this->load->view('header');
        if(isset($_SESSION['e_nombre'])) {
            $this->load->view('layouts/entrenador/nav', $datases);
        } elseif(isset($_SESSION['a_nombre'])) {
            $this->load->view('layouts/admin/nav', $datases);
        } elseif(isset($_SESSION['d_id'])) {
            $this->load->view('layouts/dep/nav', $datases);
        }
        $this->load->view($template, $data);
    }

    public function getReserva() {
        if(isset($_SESSION['e_id'])) {
            $query = $this->mreserva->getReservas($_SESSION['e_id']);
        } else {
            $query = $this->mreserva->getReservas();
        }
        echo json_encode($query);
    }

    public function getCheckclubes() {
        $query = $this->mreserva->getReservas();
        echo json_encode($query);
    }

    public function getResDate() {
        $text = $this->input->post('text');
        $resultado = $this->mreserva->getResDate($text);
        echo json_encode($resultado);
    } 

    public function getEscReserva($id) {
        $res = $this->mreserva->getEscReserva($id);
        echo json_encode($res);
    } 

    public function getClubReserva($id) {
        $res = $this->mreserva->getClubReserva($id);
        echo json_encode($res);
    } 

    public function res_data() {
        $datos = $this->mreserva->lista();
        echo json_encode($datos);
    }

    function delete() {
        $data=$this->mreserva->delete();
        echo json_encode($data);
    }
}