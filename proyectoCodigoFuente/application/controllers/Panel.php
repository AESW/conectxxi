<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require_once(APPPATH.'libraries/Sanitize.php');


class Panel extends CI_Controller {
	
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
			"titulo" => "Panel de usuario"
		);
		
			
		$dataContent = array();
		$this->load->view('includes/header' , $dataHeader);
		$this->load->view('panel/panel' , $dataContent);
		$this->load->view('includes/footer');
		
	}
	
	
		public function Inicio()
	{
		$sessionUser = $this->session->userdata('logged_in');
		
		$isReclutamiento = 0;
		$accionesReclutamiento = array();
		if( isset( $sessionUser["puesto"]["permisos"] ) ):
			foreach( $sessionUser["puesto"]["permisos"] as $permisos ):
				
				
				if( $permisos["prefijoModulos"] == "reclutamiento"):
					
					redirect("eaf/Reclutamiento");
				endif;
				
				if( $permisos["prefijoModulos"] == "recursos_humanos"):
					
					redirect("eaf/RecursosHumanos/");
				endif;
				if( $permisos["prefijoModulos"] == "gerente"):
					
					redirect("Gerente/");
				endif;
				
				if( $permisos["prefijoModulos"] == "director"):
					
					redirect("Direccion/");
				endif;
				
				if( $permisos["prefijoModulos"] == "supervisor"):
					
				redirect("Supervisor/");
				endif;
				
				
				if( $permisos["prefijoModulos"] == "nomina"):
					
				redirect("Nomina/");
				endif;
				
				
			endforeach;
		else:
			redirect("panel");
		endif;
		 
		if( $isReclutamiento == 0 ):
			redirect("panel");
		endif;
		
	}
	
	
		
}
