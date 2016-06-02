<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require_once(APPPATH.'libraries/Sanitize.php');


class Recursoshumanos extends CI_Controller {
	
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
        $this->load->model('RecursoshumanosModel');
        $this->SessionL->validarSesion();
        
    }
    
	public function index()
	{
		$dataHeader = array(
			"titulo" => "Recursos Humanos"
		);
		/*Obtener datos de usuario, roles, modulos , permisos*/
		$sessionUser = $this->session->userdata('logged_in');
		//echo "<pre>";
		//print_r( $sessionUser );die;
		
		$isRRHH = 0;
		$accionesRRHH = array();
		if( isset( $sessionUser["puesto"]["permisos"] ) ):
			foreach( $sessionUser["puesto"]["permisos"] as $permisos ):
				if( $permisos["prefijoModulos"] == "recursos_humanos"):
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
		
		/*Entrevistas por realizar*/
		$entrevistasRealizar = $this->ReclutamientoModel->obtenerEntrevistasRealizarPrimeraParte();
		/*Entrevistas por realizar*/
		
		/*Segundas entrevistas*/
		$entrevistasRealizarSegundaParte = $this->ReclutamientoModel->obtenerEntrevistasRealizarSegundaParte();
		/*Segundas entrevistas*/
		print_r( $entrevistasRealizarSegundaParte );
		$dataContent = array(
			"isRRHH" => $isRRHH,
			"accionesRRHH" => $accionesRRHH,
			"entrevistasRealizar" => $entrevistasRealizar,
			"entrevistasRealizarSegundaParte" => $entrevistasRealizarSegundaParte
		);
		
		$this->load->view('includes/header' , $dataHeader);
		$this->load->view('eaf/recursoshumanos/index' , $dataContent);
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
		$isRRHH = 0;
		$accionesRRHH = array();
		if( isset( $sessionUser["puesto"]["permisos"] ) ):
			foreach( $sessionUser["puesto"]["permisos"] as $permisos ):
				if( $permisos["prefijoModulos"] == "recursos_humanos"):
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
		/*Obtener datos de usuario, roles, modulos , permisos*/
		$candidatoFDP = $this->ReclutamientoModel->obtenerCandidatoFDP($idCandidatoFDP);
		
		$reclutamientoFDP = $this->ReclutamientoModel->obtenerPrimerEntrevista($idCandidatoFDP);
		
		/*Validar que sea valido el candidato*/
		if( empty( $candidatoFDP ) || $candidatoFDP["idVacantesPeticiones"] == 0 ):
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
    									 ->setIdVacantesPeticiones($candidatoFDP["idVacantesPeticiones"]);
				
				
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
		/*Obtener datos de usuario, roles, modulos , permisos*/
		
		$this->load->view('includes/header' , $dataHeader);
		$this->load->view('eaf/reclutamiento/fdp' , $dataContent);
		$this->load->view('includes/footer');
		
	}
	
	public function candidato_rh(){
		$dataHeader = array(
			"titulo" => "FDP Candidato"
		);
		$idCandidatoFDP = $this->Sanitize->clean_string($_REQUEST["idCandidatoFDP"]);
		
		if( $idCandidatoFDP == "" ):
			redirect("panel");
		endif;
		
		/*Obtener datos de usuario, roles, modulos , permisos*/
		$sessionUser = $this->session->userdata('logged_in');
		
		
		$isRRHH = 0;
		$accionesRRHH = array();
		if( isset( $sessionUser["puesto"]["permisos"] ) ):
			foreach( $sessionUser["puesto"]["permisos"] as $permisos ):
				if( $permisos["prefijoModulos"] == "recursos_humanos"):
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
		/*Obtener datos de usuario, roles, modulos , permisos*/
		$candidatoFDP = $this->ReclutamientoModel->obtenerCandidatoFDP($idCandidatoFDP);
		$idReclutamientoFDP = $candidatoFDP["idReclutamientoFDP"];
		$reclutamientoFDP = $this->ReclutamientoModel->obtenerPrimerEntrevista($idCandidatoFDP);
		
		$nombreUsuarioAprueba = ( isset( $reclutamientoFDP["idUsuarioCrea"] ) )?$this->ReclutamientoModel->obtenerNombrePorIdUsuarios($reclutamientoFDP["idUsuarioCrea"]):"Desconocido";
		
		
		$nombreGerente = ( isset( $candidatoFDP["idUsuariosPeticion"] ) )?$this->ReclutamientoModel->obtenerNombrePorIdUsuarios($candidatoFDP["idUsuariosPeticion"]):"Desconocido";
		/*Validar que sea valido el candidato*/
		if( empty( $candidatoFDP ) || $candidatoFDP["idVacantesPeticiones"] == 0 ):
			redirect("panel");
		endif;
		/*Validar que sea valido el candidato*/
		
		
		$obtenerAprobacionRH = $this->ReclutamientoModel->obtenerAprobacionRH($idCandidatoFDP , $idReclutamientoFDP);
		$obtenerAprobacionDirector = $this->ReclutamientoModel->obtenerAprobacionDirector($idCandidatoFDP , $idReclutamientoFDP);
		$obtenerMetaRH = $this->RecursoshumanosModel->obtenerMetaRH($idCandidatoFDP , $idReclutamientoFDP);
		
		
		
		$arrayFields = $obtenerMetaRH;
		$arrayErrorFields = array();
		
		
		
		if( isset($_POST["aprobar_rechazar_rh"]) ):
			if( $sessionUser["puesto"]["accionRol"] == "gerente" || $sessionUser["puesto"]["accionRol"] == "recursos_humanos" ):
				//Solo estos dos Roles pueden aprobar el candidato para el siguiente paso de alta.
				
				
				
				$arrayFields = array(
					"imagen_fisica_rh_candidato" => $_POST["imagen_fisica_rh_candidato"],
					"forma_entrar_sentarse_rh_candidato" => $_POST["forma_entrar_sentarse_rh_candidato"],
					"cuidado_personal_rh_candidato" => $_POST["cuidado_personal_rh_candidato"],
					"contacto_visual_rh_candidato" => $_POST["contacto_visual_rh_candidato"],
					"forma_saludar_rh_candidato" => $_POST["forma_saludar_rh_candidato"],
					"tono_volumen_rh_candidato" => $_POST["tono_volumen_rh_candidato"],
					"forma_sentarse_rh_candidato" => $_POST["forma_sentarse_rh_candidato"],
					"forma_moverse_rh_candidato" => $_POST["forma_moverse_rh_candidato"],
					"gesticulacion_rh_candidato" => $_POST["gesticulacion_rh_candidato"],
					"movimientos_brazos_rh_candidato" => $_POST["movimientos_brazos_rh_candidato"],
					"fluidez_verbal_rh_candidato" => $_POST["fluidez_verbal_rh_candidato"],
					"riqueza_vocabulario_rh_candidato" => $_POST["riqueza_vocabulario_rh_candidato"],
					"precision_comunicacion_rh_candidato" => $_POST["precision_comunicacion_rh_candidato"],
					"capacidad_sentimientos_rh_candidato" => $_POST["capacidad_sentimientos_rh_candidato"],
					"atencion_cliente_rh_candidato" => $_POST["atencion_cliente_rh_candidato"],
					"influencia_negociacion_rh_candidato" => $_POST["influencia_negociacion_rh_candidato"],
					"persuasivo_rh_candidato" => $_POST["persuasivo_rh_candidato"],
					"comunicacion_eficaz_rh_candidato" => $_POST["comunicacion_eficaz_rh_candidato"],
					"trabajo_equipo_rh_candidato" => $_POST["trabajo_equipo_rh_candidato"],
					"cierre_acuerdos_rh_candidato" => $_POST["cierre_acuerdos_rh_candidato"],
					"aprobar_rechazar_rh" => $_POST["aprobar_rechazar_rh"],
					"fecha_entrevista_rh_fdp" => $_POST["fecha_entrevista_rh_fdp"]
				);
				
				
				foreach( $arrayFields as $key => $po ):
					if( $po == ""):
						$arrayErrorFields[] = $key;
					endif;
				endforeach;
				
				if( $sessionUser["puesto"]["accionRol"] == "recursos_humanos"):
					
					if( empty($arrayErrorFields) ):
						
						$aprobarRH = $this->RecursoshumanosModel->insertarEvaluacionRecursosHumanosFDP($arrayFields , $sessionUser["usuario"]["idUsuarios"] , $idCandidatoFDP , $idReclutamientoFDP);
						
						if( $aprobarRH ):
							redirect("eaf/recursoshumanos/candidato_rh/?idCandidatoFDP=".$idCandidatoFDP."&registroRH=1");
						else:
							$errorMensajes[] = "No fue posible guardar la información. Contacte con el administrador.";
						endif;
						
						
					else:
						$errorMensajes[] = "Favor de seleccionar todos los campos de la evaluación.";
					endif;
				endif;
				
				if( $sessionUser["puesto"]["accionRol"] == "gerente"):
					
					if( !empty($obtenerAprobacionRH) ):
						$aprobarGerente = $this->RecursoshumanosModel->insertarEvaluacionGerenteFDP($arrayFields , $sessionUser["usuario"]["idUsuarios"] , $idCandidatoFDP , $idReclutamientoFDP);
						
						if( $aprobarGerente ):
							redirect("eaf/recursoshumanos/candidato_rh/?idCandidatoFDP=".$idCandidatoFDP."&registroRH=1");
						else:
							$errorMensajes[] = "No fue posible guardar la información. Contacte con el administrador.";
						endif;
						
					else:
						$errorMensajes[] = "No es posible aprobar o rechazar hasta que Recursos Humanos seleccione la evaluación.";
					endif;
					
				endif;
				
			else:
				
			endif;
			
		endif;
		
		
		
		$dataContent["formArray"] = $candidatoFDP;
		$dataContent["catalogos"] = new Catalogos();
		$dataContent["reclutamientoFDP"] = $reclutamientoFDP;
		$dataContent["nombreUsuarioAprueba"] = $nombreUsuarioAprueba;
		$dataContent["nombreGerente"] = $nombreGerente;
		
		$dataContent["aprobacionRH"] = $obtenerAprobacionRH;
		$dataContent["aprobacionDirector"] = $obtenerAprobacionDirector;
		$dataContent["accionRol"] = $sessionUser["puesto"]["accionRol"];
		$dataContent["arrayFields"] = $arrayFields;
		$dataContent["errorMensajes"] = $errorMensajes;
		$dataContent["arrayErrorFields"] = $arrayErrorFields;
		
		/*Obtener datos de usuario, roles, modulos , permisos*/
		
		$this->load->view('includes/header' , $dataHeader);
		$this->load->view('eaf/recursoshumanos/fdp_rh' , $dataContent);
		$this->load->view('includes/footer');
		
	}
		
}
