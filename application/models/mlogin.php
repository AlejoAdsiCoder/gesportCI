<?php  
class Mlogin extends CI_Model {  
function __construct()  
    {  
        parent::__construct();  
        $this->load->database();  
    }  
  
    public function islogin($data){  
        $query=$this->db->get_where('deportista',array('cedula'=>$data['username'],'password'=>$data['password']));  
        return $query->num_rows();  
    }
}  