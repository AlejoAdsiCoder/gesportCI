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
    if($res==1){     
        //header('location:'.base_url()."Deportista");
        //$this->session->set_userdata('id',$data['username']);   
        echo base_url()."Entrenador";  
    }  
    else{  
        echo base_url()."Deportista";  
    }   
}  
public function logout(){  
    $this->session->sess_destroy();  
    header('location:'.base_url()."login/".$this->index());  
      
}  
}  