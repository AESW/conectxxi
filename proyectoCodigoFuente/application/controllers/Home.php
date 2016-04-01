<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require_once(APPPATH.'libraries/Sanitize.php');


class Home extends CI_Controller {
	
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
		/*
			Llamada de métodos de modelo
			
			$this->User->consultasSQLSELECT();
			Generar el modelo en Workbench.
			Formulario de datos personales. (Candidatos)
			Listado de candidatos, buena presentación.
			
			Datos de viviendo, retomar puntaje AMAI.
			Cambiar relación familiar por parentezco.
			Limitar a 10 los dependientes económicos.
			Formulario con coockies. 
			Archivos temporales para poder verlo antes de enviar.
			
			Mas tardar Lunes.
		*/
		echo HOME_URL;
		$proceso = ( isset( $_GET["proceso"] ) )?$this->Sanitize->clean_string($_GET["proceso"]);
		
		$this->load->view('login/login');
		
	}
}
