<?php  
class Mlogin extends CI_Model {  
function __construct()  
    {  
        parent::__construct();  
        $this->load->database();  
    }  
  
    public function islogin($data){  
        $query=$this->db->get_where('deportista',array('cedula'=>$data['cedula'],'password'=>$data['password']));  
        
        if($query->num_rows() == 0) {
            $query2 = $this->db->get_where('entrenador',array('cedula'=>$data['cedula'],'password'=>$data['password']));
            return 1;
        }  
        else {
            return 2;
        }
    }
}  