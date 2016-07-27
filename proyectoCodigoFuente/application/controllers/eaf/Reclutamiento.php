<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require_once(APPPATH.'libraries/Sanitize.php');


class Reclutamiento extends CI_Controller {
	
	function __construct()
    {
        // Call the Model constructor
        parent::__construct();
        /*Necesario para validaciones de formulario, sanitizar variables $_POST y $_GET*/
        $this->load->helper('email');
        $this->load->library('form_validation');
        $this->load->library('Catalogos');
        $this->Sanitize = new Sanitize();
        
        /*Mandar llamar modelos que requieran de actividades de BD*/
        $this->load->model('ReclutamientoModel');
        $this->load->model();
        $this->SessionL->validarSesion();
        
    }
    
	public function index()
	{
		$dataHeader = array(
			"titulo" => "Reclutamiento"
		);
		/*Obtener datos de usuario, roles, modulos , permisos*/
		$sessionUser = $this->session->userdata('logged_in');
		
		$isReclutamiento = 0;
		$accionesReclutamiento = array();
		if( isset( $sessionUser["puesto"]["permisos"] ) ):
			foreach( $sessionUser["puesto"]["permisos"] as $permisos ):
				if( $permisos["prefijoModulos"] == "reclutamiento"):
					$isReclutamiento = 1;
					$accionesReclutamiento[] = $permisos["accionPermisos"];
				endif;
			endforeach;
		else:
			redirect("panel");
		endif;
		 
		if( $isReclutamiento == 0 ):
			redirect("panel");
		endif;
		/*Obtener datos de usuario, roles, modulos , permisos
			
			
		*/
		
		
		/*Vacantes que cubrir*/
		$peticionesVacantes = $this->ReclutamientoModel->obtenerPeticionesVacantes();
		/*Vacantes que cubrir*/
		
		/*Entrevistas por realizar*/
		$entrevistasRealizar = $this->ReclutamientoModel->obtenerEntrevistasRealizarPrimeraParte();
		/*Entrevistas por realizar*/
		
		$candidatosRechazadosReclutador = $this->ReclutamientoModel->candidatosRechazadosReclutador();
		$candidatosAceptadosReclutador = $this->ReclutamientoModel->candidatosAceptadosReclutador();
		
		$dataContent = array(
			"isReclutamiento" => $isReclutamiento,
			"accionesReclutamiento" => $accionesReclutamiento,
			"peticionesVacantes" => $peticionesVacantes,
			"entrevistasRealizar" => $entrevistasRealizar
		);
		$dataContent["candidatosRechazadosReclutador"] = $candidatosRechazadosReclutador;
		$dataContent["candidatosAceptadosReclutador"] = $candidatosAceptadosReclutador;
		
		
		//print_r($dataContent);
		
		$this->load->view('includes/header' , $dataHeader);
		$this->load->view('eaf/reclutamiento/index' , $dataContent);
		$this->load->view('includes/footer');
		
	}
	
	public function candidato(){
		$dataHeader = array(
			"titulo" => "FDP Candidato"
		);
		$idCandidatoFDP = $this->Sanitize->clean_string($_REQUEST["idCandidatoFDP"]);
		
		if( $idCandidatoFDP == "" ):
			redirect("panel");
		endif;
		
		/*Obtener datos de usuario, roles, modulos , permisos*/
		$sessionUser = $this->session->userdata('logged_in');
		$isReclutamiento = 0;
		$accionesReclutamiento = array();
		if( isset( $sessionUser["puesto"]["permisos"] ) ):
			foreach( $sessionUser["puesto"]["permisos"] as $permisos ):
				if( $permisos["prefijoModulos"] == "reclutamiento"):
					$isReclutamiento = 1;
					$accionesReclutamiento[] = $permisos["accionPermisos"];
				endif;
			endforeach;
		else:
			redirect("panel");
		endif;
		
		$peticionesVacantes = $this->ReclutamientoModel->obtenerPeticionesVacantes();
		
		/*Obtener datos de usuario, roles, modulos , permisos*/
		$candidatoFDP = $this->ReclutamientoModel->obtenerCandidatoFDP($idCandidatoFDP);
		
		$reclutamientoFDP = $this->ReclutamientoModel->obtenerPrimerEntrevista($idCandidatoFDP);
		
		/*Validar que sea valido el candidato*/
		if( empty( $candidatoFDP ) ):
			redirect("panel");
		endif;
		/*Validar que sea valido el candidato*/
		
		/*POST*/
			//perfil_candidato_reclutamiento
			
			if( isset($_POST["perfil_candidato_reclutamiento"]) ):
				
    			$perfilCandidato = $this->Sanitize->clean_string($_POST["perfil_candidato_reclutamiento"]);
    			$evaluacionRazonamiento = $this->Sanitize->clean_string($_POST["evaluacion_candidato_reclutamiento"]);
    			$puntajeEvaluacionRazonamiento = $this->Sanitize->clean_string($_POST["valores_evaluacion_candidato_reclutamiento"]);
    			$escalaValoresEvaluacionRazonamiento = $this->Sanitize->clean_string($_POST["escala_evaluacion_candidato_reclutamiento"]);
    			$comentariosReclutador = $this->Sanitize->clean_string($_POST["comentarios_candidato_reclutamiento"]);
    			$estatusReclutamientoFDP = $this->Sanitize->clean_string($_POST["aprobar_rechazar"]);
    			$idVacantesPeticiones = $_POST["vacante_participar"];
    			
    			$idUsuarioCrea = $sessionUser["usuario"]["idUsuarios"];
    			$fechaEntrevista = $_POST["fecha_entrevista_candidato_reclutamiento"];
    			
				
				$estatusAprobacion = ( $estatusReclutamientoFDP == "aprobar" )?"aprobado":"rechazado";
				
    			$this->ReclutamientoModel->setIdCandidatoFDP($idCandidatoFDP)
    									 ->setPerfilCandidato($perfilCandidato)
    									 ->setEvaluacionRazonamiento($evaluacionRazonamiento)
    									 ->setPuntajeEvaluacionRazonamiento($puntajeEvaluacionRazonamiento)
    									 ->setEscalaValoresEvaluacionRazonamiento($escalaValoresEvaluacionRazonamiento)
    									 ->setComentariosReclutador($comentariosReclutador)
    									 ->setIdUsuarioCrea($idUsuarioCrea)
    									 ->setEstatusReclutamientoFDP($estatusAprobacion)
    									 ->setFechaEntrevista($fechaEntrevista)
    									 ->setIdVacantesPeticiones($idVacantesPeticiones);
				
				
				$sql = $this->ReclutamientoModel->guardarPrimerEntrevistaCandidatoFDP();
				
				if( $sql == "insertado" ):
					redirect("eaf/reclutamiento/candidato/?idCandidatoFDP=".$idCandidatoFDP."&reclutamiento=true");
				else:
					$dataContent["error_reclutamiento"] = "Por favor de llenar los campos vacíos.";
				endif;
    			//echo "<pre>";print_r($candidatoFDP);
    			
			endif;
		/*POST*/
		
		
		$dataContent["formArray"] = $candidatoFDP;
		$dataContent["catalogos"] = new Catalogos();
		$dataContent["reclutamientoFDP"] = $reclutamientoFDP;
		$dataContent["peticionesVacantes"] = $peticionesVacantes;
		
		
	//	echo "<pre>";print_r($dataContent);
		
		/*Obtener datos de usuario, roles, modulos , permisos*/
		
		$this->load->view('includes/header' , $dataHeader);
		$this->load->view('eaf/reclutamiento/fdp' , $dataContent);
		$this->load->view('includes/footer');
		
	}
	
		
}
