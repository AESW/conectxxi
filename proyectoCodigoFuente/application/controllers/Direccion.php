<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require_once(APPPATH.'libraries/Sanitize.php');


class Direccion extends CI_Controller {
	
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
        $this->load->model('DireccionModel');
        $this->SessionL->validarSesion();
    }
    

    public function index()
    {
    	$dataHeader = array(
    			"titulo" => "Director"
    	);
    	/*Obtener datos de usuario, roles, modulos , permisos*/
    	$sessionUser = $this->session->userdata('logged_in');
    	//echo "<pre>";
    	//print_r( $sessionUser );die;
    
    	$isRRHH = 0;
    	$accionesRRHH = array();
    	if( isset( $sessionUser["puesto"]["permisos"] ) ):
    	foreach( $sessionUser["puesto"]["permisos"] as $permisos ):
    	if( $permisos["prefijoModulos"] == "director"):
    	$isRRHH = 1;
    	$accionesRRHH[] = $permisos["accionPermisos"];
    	endif;
    	endforeach;
    	else:
    	redirect("panel");
    	endif;
    		
    	if( $isRRHH == 0 ):
    	redirect("panel");
    	endif;
    
      	/*Solicitud de Personal*/
     	$SolicitudPersonal = $this->DireccionModel->obtenerSolciitudesPersonal();
    	/*Entrevistas por realizar*/
    
    	/*Segundas entrevistas*/
   // 	$entrevistasRealizarSegundaParte = $this->ReclutamientoModel->obtenerEntrevistasRealizarSegundaParte();
    	/*Segundas entrevistas*/
    	//print_r( $entrevistasRealizarSegundaParte );
    
   // 	$movimientosCandidatosRH = $this->RecursoshumanosModel->obtenerMovimientosCandidatos();
    
    
    	$dataContent = array(
    		 "SolicitudPersonal" => $SolicitudPersonal
    	//		"entrevistasRealizar" => $entrevistasRealizar,
    		//	"entrevistasRealizarSegundaParte" => $entrevistasRealizarSegundaParte,
   // 			"movimientos" => $movimientosCandidatosRH
    	);
    
    	
    	//print_r( $dataContent );
    	
    	
    	$this->load->view('includes/header' , $dataHeader);
    	$this->load->view('direccion/index',$dataContent );
    	$this->load->view('includes/footer');
    
    }	
    
    
    public function VacanteDetalle()
    {
    	$dataHeader = array(
    			"titulo" => "Solcitud Nuevo Personal"
    	);
    	
    	
    	$idVacante = $this->Sanitize->clean_string($_REQUEST["idVacante"]);
    	
    	if( $idVacante == "" ):
    	redirect("panel");
    	endif;
    	
    	
    	/*Obtener datos de usuario, roles, modulos , permisos*/
    	$sessionUser = $this->session->userdata('logged_in');
    	//echo "<pre>";
    	//print_r( $sessionUser );die;
    
    	$DatosUsuario=$sessionUser['usuario']['nombreUsuario'];
    	 
    	 
    	$VacanteDetalle=$this->DireccionModel->VacanteDetalle($idVacante);
  
    	 
    	 
    	$dataContent = array(
    			"VacanteDetalle" => $VacanteDetalle,
    			
    	);
    
    	 
    	//	print_r($dataContent);
    	 
    	$this->load->view('includes/header' , $dataHeader);
    	$this->load->view('direccion/NuevoPersonal',$dataContent );
    	$this->load->view('includes/footer');
    
    }
    
    
    public function AprobarVacante()
    {
    	 
    	/*Obtener datos de usuario, roles, modulos , permisos*/
    	$sessionUser = $this->session->userdata('logged_in');
    	//echo "<pre>";
    	//print_r( $sessionUser );die;
    
    	$IdUsuario=$sessionUser['usuario']['idUsuarios'];
    
    

    	$Comentarios=$this->Sanitize->clean_string($_POST["comentariosDireccion"]);
    	$Id=$this->Sanitize->clean_string($_POST["id"]);
    	 
    	 
  
    
    		$AprobarVacante=$this->DireccionModel->AprobarVacante($Comentarios,$Id,$IdUsuario);
    		 
    		if($AprobarVacante)
    		{
    			 
    			$resultado = array(
    					"codigo" => 400,
    					"unique" => false,
    					"mensaje" => "Vacante Aprobada Correctamente"
    			);
    		}
    		else
    
    		{
    			$resultado = array(
    					"codigo" => 200,
    					"unique" => false
    			);
    
    
    		}
    	
    	ob_clean();
    	 
    	echo json_encode($resultado);
    }
    
    public function RechazarVacante()
    {
    
    	/*Obtener datos de usuario, roles, modulos , permisos*/
    	$sessionUser = $this->session->userdata('logged_in');
    	//echo "<pre>";
    	//print_r( $sessionUser );die;
    
    	$IdUsuario=$sessionUser['usuario']['idUsuarios'];
    
    
    
    	$Comentarios=$this->Sanitize->clean_string($_POST["comentariosDireccion"]);
    	$Id=$this->Sanitize->clean_string($_POST["id"]);
    
    
    
    
    	$AprobarVacante=$this->DireccionModel->RechazarVacante($Comentarios,$Id,$IdUsuario);
    	 
    	if($AprobarVacante)
    	{
    
    		$resultado = array(
    				"codigo" => 400,
    				"unique" => false,
    				"mensaje" => "Vacante Rechazada Correctamente"
    		);
    	}
    	else
    
    	{
    		$resultado = array(
    				"codigo" => 200,
    				"unique" => false
    		);
    
    
    	}
    	 
    	ob_clean();
    
    	echo json_encode($resultado);
    }
    
    
}
