<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require_once(APPPATH.'libraries/Sanitize.php');


class Capacitacion extends CI_Controller {
	
	function __construct()
    {
        // Call the Model constructor
        parent::__construct();
        /*Necesario para validaciones de formulario, sanitizar variables $_POST y $_GET*/
        $this->load->helper('email');
        $this->load->library('form_validation');
        $this->Sanitize = new Sanitize();
        $this->load->model('CapacitacionModel');
		        /*Mandar llamar modelos que requieran de actividades de BD*/
		        $this->load->model('User');
        $this->SessionL->validarSesion();
    }
    
	public function index()
	{
		$dataHeader = array(
			"titulo" => "Capacitaci&oacute;n"
		);
		
			
		$usuariosActivos = $this->CapacitacionModel->obtenerUsuariosActivos();
		
		
		$dataContent = array(
				"usuariosActivos" => $usuariosActivos
		);
		
		
		
		
		$this->load->view('includes/header' , $dataHeader);
		$this->load->view('capacitacion/index' , $dataContent);
		$this->load->view('includes/footer');
		
	}
	
	public function programarCurso()
	{
		$dataHeader = array(
			"titulo" => "Capacitaci&oacute;n"
		);
		
		$Cursos = $this->CapacitacionModel->Cursos();
		
		
		$dataContent = array(
				"Cursos" => $Cursos
		);
		
		$this->load->view('includes/header' , $dataHeader);
		$this->load->view('capacitacion/programarCurso' , $dataContent);
		$this->load->view('includes/footer');
		
	}	
        public function programacionCursos($id)
	{
		$dataHeader = array(
			"titulo" => "Capacitaci&oacute;n"
		);
		
			
		$Curso = $this->CapacitacionModel->Curso($id);
		$FechaCurso = $this->CapacitacionModel->FechaCurso($id);
		$Duracion = $this->CapacitacionModel->Duracion($id);
		$Lugar = $this->CapacitacionModel->Lugar($id);
		$facilitador = $this->CapacitacionModel->facilitador();
		
		$dataContent = array(
				"Curso" => $Curso,
				"FechaCurso" => $FechaCurso,
				"Lugar" => $Lugar,
				"Duracion" => $Duracion,
				"facilitador" => $facilitador
		);
		
		
		
		
		$this->load->view('includes/header' , $dataHeader);
		$this->load->view('capacitacion/programacionCursos' , $dataContent);
		$this->load->view('includes/footer');
		
	}	
        public function cursosPorEvaluar()
	{
		$dataHeader = array(
			"titulo" => "Capacitaci&oacute;n"
		);
		
			
		$dataContent = array();
		$this->load->view('includes/header' , $dataHeader);
		$this->load->view('capacitacion/cursosPorEvaluar' , $dataContent);
		$this->load->view('includes/footer');
		
	}	
        
          public function evaluacionCursos()
	{
		$dataHeader = array(
			"titulo" => "Capacitaci&oacute;n"
		);
		
			
		$dataContent = array();
		$this->load->view('includes/header' , $dataHeader);
		$this->load->view('capacitacion/evaluacionCursos' , $dataContent);
		$this->load->view('includes/footer');
		
	}	
         public function evaluarCursos()
	{
		$dataHeader = array(
			"titulo" => "Capacitaci&oacute;n"
		);
		
			
		$dataContent = array();
		$this->load->view('includes/header' , $dataHeader);
		$this->load->view('capacitacion/evaluarCursos' , $dataContent);
		$this->load->view('includes/footer');
		
	}
	
	
	
}
