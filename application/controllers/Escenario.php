<?php
class Escenario extends CI_Controller {
    function __construct() {
        parent::__construct();

        $this->load->helper(array('form', 'url'));        
        // Libreria para iniciar sesión
        $this->load->library('session');
        //Carga la libreria
        // $this->load->library("excel");
        //$this->load->library('html2pdf');

        //Carga del Modelo
        $this->load->model('mescenario');
        
        
        //$this->load->model("excel_export_model");
    }

    public function index()
    {
        $datases["usu"] = $_SESSION['a_nombre'];
        // $data["deportistas_data"] = $this->mdeportista->lista();
        // $this->carga_layout("lista_deportistas",$data);
        $this->carga_layout("lista_escenario", $datases);
    }

    public function carga_layout($template, $datases) 
    {
        $this->load->view('header');
        if(isset($_SESSION['a_nombre'])) {
            $this->load->view('layouts/admin/nav', $datases);
            $this->load->view($template);
        }
    }

    public function nuevoEsc() {
        $con=mysqli_connect("localhost","root","","gesport") or die("Problemas con la conexión");

        $target = base_url()."assets/img/".basename($_FILES['foto']['name']);

        $nombre = $this->input->post('nombre');
        $deporte = $this->input->post('deporte');
        $descripcion = $this->input->post('desc');
        $disponibilidad = $this->input->post('disponible');
        $direccion = $this->input->post('direccion');
        $foto = "assets/img/".$_FILES['foto']['name'];

        $sql = "INSERT INTO escenario(nombre,deporte,descripcion,disponibilidad,direccion,foto) VALUES ('$nombre','$deporte','$descripcion','$disponibilidad','$direccion','$foto')";
        mysqli_query($con, $sql) or die("Problemas en el select:".mysqli_error($con));

        /*
        if(move_uploaded_file($_FILES['foto']['tmp_name'], $target))
		{
			echo "Imagen subida correctamente";
		}
		else {
			echo "No se ha podido subir correctamente";
		}
        */
    }

    public function edit($id)
    {
        $this->load->database();
        $q = $this->db->get_where('escenario', array('id' => $id));
        echo json_encode($q->row());
    }

    public function update($id) {
        $this->load->database();

        $data = array(
            'nombre' => $this->input->post('nombre'),
            'deporte'  => $this->input->post('deporte'),
            'descripcion'=> $this->input->post('desc'),
            'disponibilidad' => $this->input->post('dis'),
            'direccion' => $this->input->post('dir')
        );
        $this->db->where('id', $id);
        $this->db->update('escenario', $data);
        $q = $this->db->get_where('escenario', array('id' => $id));


        echo json_encode($q->row());
    }

    public function lista() {
        $data = $this->mescenario->lista();
        echo json_encode($data);
    }

    public function delete() {
        $data=$this->mescenario->del_esc();
        echo json_encode($data);
    }
}