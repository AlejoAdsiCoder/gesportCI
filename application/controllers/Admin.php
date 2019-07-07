<?php
    class Admin extends CI_controller {
        function __construct() {
            parent::__construct();            
            $this->load->helper(array('form', 'url'));        
            // Libreria para iniciar sesión
            $this->load->library('session');
            //Carga del Modelo
             $this->load->model('mreserva');
                                                           
        }

        public function index()
        {
            $datases["usu"] = $_SESSION['a_nombre'];
            // $this->carga_layout("lista_deportistas",$data);
            $this->carga_layout('list_notificaciones', $datases);
        }

        public function carga_layout($template, $datases) 
        {
            $this->load->view('header');
            // si existe la sesión admin
            if(isset($_SESSION['a_nombre'])) {
                // Cargar un layout y la vista
                $this->load->view('layouts/admin/nav', $datases);
                $this->load->view($template);
            }
        }
    }