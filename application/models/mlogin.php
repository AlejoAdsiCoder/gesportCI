<?php  
class Mlogin extends CI_Model {  
function __construct()  
    {  
        parent::__construct();  
        $this->load->database();  
    }  
  
    public function islogin($data){  
        // Consultando credenciales para admin
        $query=$this->db->get_where('admin',array('nombre'=>$data['cedula'],'pass'=>$data['password']));  
        
        if($query->num_rows() == 0) {
            // Consultando credenciales para entrenador
            $query2 = $this->db->get_where('entrenador',array('cedula'=>$data['cedula'],'password'=>$data['password']));
            if(!($query2->num_rows() == 1)) {
                // Consultando credenciales para deportista
                $query3 = $this->db->get_where('deportista',array('cedula'=>$data['cedula'],'password'=>$data['password']));
                $rd = $query3->row();
                $dep_usu = array(
                    'd_id' => $rd->cedula,
                    'd_nombre' => $rd->nombre . " " . $rd->apellidos
                );
                $this->session->set_userdata($dep_usu);
                return 2;
            }
            else {
                $re = $query2->row();
                $ent_usu = array(
                    'e_id' => $re->cedula,
                    'e_nombre' => $re->nombre . " " . $re->apellidos
                );
                $this->session->set_userdata($ent_usu);
                return 3;
            }
        }  
        else {
             // Consultando credenciales para admin
            $radmin = $query->row();
            $ad_usu = array(
                'a_nombre' => $radmin->nombre
            );
            $this->session->set_userdata($ad_usu);
            return 1;
        }
    }
}  