<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require_once(APPPATH.'libraries/Sanitize.php');
require(APPPATH.'libraries/UploadHandler.php');
require_once(APPPATH.'libraries/class.phpmailer.php');

class MovEmpleados extends CI_Controller {
	
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
       // $this->load->model('Sepomex' , 'sepomex');
    }
    
    public function index()
    {
    
    	$dataHeader = array(
    			"titulo" => "Empleado"
    	);
    
    		
    	$dataContent = array();
    	$this->load->view('includes/header' , $dataHeader);
    	$this->load->view('empleados/movimientos' , $dataContent);
    	$this->load->view('includes/footer');
    
    
    
    }
	
	
	public function SolPermiso()
	{
		$dataHeader = array(
				"titulo" => "Solicitud de Permiso"
		);
		/*Obtener datos de usuario, roles, modulos , permisos*/
		$sessionUser = $this->session->userdata('logged_in');
		//echo "<pre>";
		//print_r( $sessionUser );die;
	
		$DatosUsuario=$sessionUser['usuario']['nombreUsuario'];
		 
		 
		
		 
		$dataContent = array(
				
				"DatosUsuario" => $DatosUsuario
		);
	
		 
		//	print_r($sessionUser);
		 
		$this->load->view('includes/header' , $dataHeader);
		$this->load->view('empleados/permiso',$dataContent );
		$this->load->view('includes/footer');
	
	}
	
	
	function GuardaPermiso() {
	
		$sessionUser = $this->session->userdata('logged_in');
		 
		$idUsuario=$sessionUser["usuario"]["idUsuarios"];
		
		$fecha_inicio=$this->input->post('fecha_inicio');
		$fecha_fin=$this->input->post('fecha_fin');
		$comentarios=$this->input->post('comentarios');
		
	
	
		$sqlGrupo = "Insert into SolPermisos (fecha_inicio,fecha_fin,observaciones,idUsuarios,aprobado) values ('$fecha_inicio','$fecha_fin','$comentarios',$idUsuario,0)" ;
	
	
	
		$queryGrupo = $this->db->query($sqlGrupo);
			
		if ($queryGrupo)
		{
			$resultado = array (
					"codigo" => 200,
					"exito" => true,
					"mensaje" => "Permiso guardado correctamente."
			);
		}
		else {
			$resultado = array (
					"codigo" => 400,
					"exito" => false,
					"mensaje" => "Error, vuelva a intentarlo."
			);
		}
	
		ob_clean ();
		echo json_encode ( $resultado );
		exit ();
	}
	
	
	public function solicitud_cambio_turno()
	{
		$dataHeader = array(
				"titulo" => "Cambio de turno"
		);
	
			
		$dataContent = array();
		$this->load->view('includes/header' , $dataHeader);
		$this->load->view('empleados/solicitud_cambio_turno' , $dataContent);
		$this->load->view('includes/footer');
	
	}
	
	public function solicitud_cambio_descanso()
	{
		$dataHeader = array(
				"titulo" => "Cambio de dia de descanso"
		);
	
			
		$dataContent = array();
		$this->load->view('includes/header' , $dataHeader);
		$this->load->view('empleados/solicitud_cambio_descanso' , $dataContent);
		$this->load->view('includes/footer');
	
	}
	
	public function solicitud_vacaciones()
	{
		$dataHeader = array(
				"titulo" => "Solicitud Vacaciones"
		);
	
			
		$dataContent = array();
		$this->load->view('includes/header' , $dataHeader);
		$this->load->view('empleados/informacion_vacaciones' , $dataContent);
		$this->load->view('includes/footer');
	
	}
	
	
	function GuardaDescanso() {
	
		$sessionUser = $this->session->userdata('logged_in');
			
		$idUsuario=$sessionUser["usuario"]["idUsuarios"];
	
		$dia=$this->input->post('dia');
	
		$comentarios=$this->input->post('observaciones');
	
	
	
		$sqlGrupo = "Insert into SolDiaDescanso (dia,observaciones,idUsuarios,aprobado) values ('$dia','$comentarios',$idUsuario,0)" ;
	
	
	
		$queryGrupo = $this->db->query($sqlGrupo);
			
		if ($queryGrupo)
		{
			$resultado = array (
					"codigo" => 200,
					"exito" => true,
					"mensaje" => "Solicitud guardada correctamente."
			);
		}
		else {
			$resultado = array (
					"codigo" => 400,
					"exito" => false,
					"mensaje" => "Error, vuelva a intentarlo."
			);
		}
	
		ob_clean ();
		echo json_encode ( $resultado );
		exit ();
	}
	
	
	function GuardaTurno() {
	
		$sessionUser = $this->session->userdata('logged_in');
			
		$idUsuario=$sessionUser["usuario"]["idUsuarios"];
	
		$fecha_inicio=$this->input->post('fecha_inicio');
		$turno=$this->input->post('turno');
		$comentarios=$this->input->post('observaciones');
	
	
	
		$sqlGrupo = "Insert into SolCambioTurno (fechaAplicacion,turno,observaciones,idUsuarios,aprobado) values ('$fecha_inicio','$turno','$comentarios',$idUsuario,0)" ;
	
	
	
		$queryGrupo = $this->db->query($sqlGrupo);
			
		if ($queryGrupo)
		{
			$resultado = array (
					"codigo" => 200,
					"exito" => true,
					"mensaje" => "Solicitud guardada correctamente."
			);
		}
		else {
			$resultado = array (
					"codigo" => 400,
					"exito" => false,
					"mensaje" => "Error, vuelva a intentarlo."
			);
		}
	
		ob_clean ();
		echo json_encode ( $resultado );
		exit ();
	}
	
	
	
}






