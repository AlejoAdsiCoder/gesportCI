<?php
class Deportista extends CI_Controller {


        public function index()
        {
            // $data["entrenador_data"] = $this->mempresa->obtener_datos();
            $this->carga_layout("lista_deportistas");
        }

        public function carga_layout($template) 
        {
            $this->load->view('header');
            $this->load->view('nav');
            $this->load->view($template);
        }
}