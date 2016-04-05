<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require_once(APPPATH.'libraries/Sanitize.php');
require(APPPATH.'libraries/UploadHandler.php');

class Candidatos extends CI_Controller {
	
	function __construct()
    {
        // Call the Model constructor
        parent::__construct();
        /*Necesario para validaciones de formulario, sanitizar variables $_POST y $_GET*/
        $this->load->helper('email');
        $this->load->library('form_validation');
        $this->Sanitize = new Sanitize();
        
        /*Mandar llamar modelos que requieran de actividades de BD*/
        $this->load->model('User');
        
    }
    
	public function index()
	{
		$this->SessionL->validarSesionHome();
		$dataHeader = array(
			"titulo" => "Formato de datos personales"
		);
		$this->load->view('includes/header' , $dataHeader);
		$this->load->view('fdp/fdp');
		$this->load->view('includes/footer');
	}
	
	public function server(){
		error_reporting(E_ALL | E_STRICT);
		
		$upload_handler = new UploadHandler(array(
													'accept_file_types' => '/\.(gif|jpe?g|png|pdf|doc|docx)$/i'
												 )
										    );
	}
	
}
