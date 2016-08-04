<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require_once(APPPATH.'libraries/Sanitize.php');


class Supervisor extends CI_Controller {
	
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
        $this->SessionL->validarSesion();
    }
    
	public function index()
	{
		$dataHeader = array(
			"titulo" => "Supervisor"
		);
		
			
		$dataContent = array();
		$this->load->view('includes/header' , $dataHeader);
		$this->load->view('supervisor/tablero_movimientos' , $dataContent);
		$this->load->view('includes/footer');
		
	}
        
        public function control_personal()
	{
		$dataHeader = array(
			"titulo" => "Supervisor"
		);
		
			
		$dataContent = array();
		$this->load->view('includes/header' , $dataHeader);
		$this->load->view('supervisor/control_personal' , $dataContent);
		$this->load->view('includes/footer');
		
	}
        
        public function reporte_asistencia()
	{
		$dataHeader = array(
			"titulo" => "Reportes Supervisor"
		);
		
			
		$dataContent = array();
		$this->load->view('includes/header' , $dataHeader);
		$this->load->view('supervisor/reporte_asistencia' , $dataContent);
		$this->load->view('includes/footer');
		
	}
	
	
       
        
}
