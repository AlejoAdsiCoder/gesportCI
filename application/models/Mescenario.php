<?php

class Mescenario extends CI_Model {

    function __construct() {
        parent::__construct();
        $this->load->database();
        $this->load->helper('date');
        date_default_timezone_set("america/bogota");
    }

    public function lista() {
        $this->db->order_by("nombre", "ASC");
        $query = $this->db->get("escenario");
        return $query->result();
    }

    public function del_esc() {
        $id = $this->input->post('id');
        $this->db->where('id', $id);
        $result=$this->db->delete('escenario');
        return $result;
    }
}