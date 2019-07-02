<?php  
if ( ! defined('BASEPATH')) exit('No direct script access allowed');  
  
class Login extends CI_Controller {  
function __construct()  
{  
    parent::__construct();  
    $this->load->helper('url');//you can autoload this functions by configuring autoload.php in config directory  
    $this->load->library('session');  
    $this->load->model('mlogin');  
}  
public function index(){  
    $this->load->view('login');  
}  
public function check_login(){  
     
    $data['cedula']=htmlspecialchars($_POST['cedula']);  
    $data['password']=htmlspecialchars($_POST['password']);  
    $res=$this->mlogin->islogin($data);  
    switch($res) 
    {
        case 1:
            echo base_url()."Admin";
            break;
        case 2:
            echo base_url()."Deportista";
            break;
        case 3:
            echo base_url()."Reserva";
            break;
        default:
            echo "El usuario no existe";
            break;

    }
}  
public function logout(){  
    $this->session->set_userdata('logged_in', FALSE);
    $this->session->sess_destroy();  
    //$this->load->view('login');
    header('location:'.base_url()."Login/".$this->index());  
      
}  
}  