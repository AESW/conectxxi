<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require_once(APPPATH.'libraries/Sanitize.php');
require(APPPATH.'libraries/UploadHandlerRH.php');


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
		
		
		$movimientosCandidatosRH = $this->RecursoshumanosModel->obtenerMovimientosCandidatos();
		
		$dataContent = array(
			"isRRHH" => $isRRHH,
			"accionesRRHH" => $accionesRRHH,
			"entrevistasRealizar" => $entrevistasRealizar,
			"entrevistasRealizarSegundaParte" => $entrevistasRealizarSegundaParte,
			"movimientos" => $movimientosCandidatosRH
		);
		
		$this->load->view('includes/header' , $dataHeader);
		$this->load->view('eaf/recursoshumanos/index' , $dataContent);
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
		
		$peticionesVacantes = $this->ReclutamientoModel->obtenerPeticionesVacantes();
		
		/*Validar que sea valido el candidato*/
		if( empty( $candidatoFDP ) || $candidatoFDP["idVacantesPeticiones"] == 0 ):
			redirect("panel");
		endif;
		/*Validar que sea valido el candidato*/
		
		
		$obtenerAprobacionRH = $this->ReclutamientoModel->obtenerAprobacionRH($idCandidatoFDP , $idReclutamientoFDP);
		$obtenerAprobacionDirector = $this->ReclutamientoModel->obtenerAprobacionDirector($idCandidatoFDP , $idReclutamientoFDP);
		$obtenerMetaRH = $this->RecursoshumanosModel->obtenerMetaRH($idCandidatoFDP , $idReclutamientoFDP);
		
		
		$obtenerGerentes = $this->ReclutamientoModel->obtenerGerentes();
		
		$arrayFields = $obtenerMetaRH;
		$arrayErrorFields = array();
		
		
		
		if( isset($_POST["aprobar_rechazar_rh"]) ):
			if( $sessionUser["puesto"]["accionRol"] == "recursos_humanos" ):
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
					"fecha_entrevista_rh_fdp" => $_POST["fecha_entrevista_rh_fdp"],
					"aprobacion_gerente_rh_fdp" => $_POST["aprobacion_gerente_rh_fdp"]
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
		$dataContent["peticionesVacantes"] = $peticionesVacantes;
		$dataContent["gerentesSegundaEntrevista"] = $obtenerGerentes;
		/*Obtener datos de usuario, roles, modulos , permisos*/
		
	
		
		$this->load->view('includes/header' , $dataHeader);
		$this->load->view('eaf/recursoshumanos/fdp_rh' , $dataContent);
		$this->load->view('includes/footer');
		
	}
	
	
	public function altausuario(){
		
		$dataHeader = array(
				"titulo" => "Alta de Usuario"
		);
		
		
		$idCandidatoFDP=$this->input->get('idCandidatoFDP');
		$catEmpresas=$this->RecursoshumanosModel->obtenerEmpresas();
		$candidatoFDP = $this->RecursoshumanosModel->obtenerCandidatoFDP($idCandidatoFDP);
		
		
		if( empty( $candidatoFDP ) || $candidatoFDP["idVacantesPeticiones"] == 0 ||  $candidatoFDP["idReclutamientoFDP"] == 0 ||  $candidatoFDP["idUsuariosAprobacionGerente"] == 0):
		redirect("panel");
		endif;
		
		$dataContent["formArray"] = $candidatoFDP;
		$dataContent["catalogos"] = new Catalogos();
		$dataContent["Empresas"] = $catEmpresas;
		
		//echo "<pre>";print_r($dataContent);
		
		$this->load->view('includes/header' , $dataHeader);
		$this->load->view('eaf/recursoshumanos/alta_usuario',$dataContent );
		$this->load->view('includes/footer');
		
	}
	
	
	public function server(){
		error_reporting(E_ALL | E_STRICT);
	
		$upload_handler = new UploadHandler(array(
				'accept_file_types' => '/\.(gif|jpe?g|png|pdf|doc|docx)$/i'
		)
		);
	}
	
	
	public function GuardaAltaUsuario(){
	
		
		$email = $this->Sanitize->clean_string($_POST["email"]);
		$rfc = $this->Sanitize->clean_string($_POST["rfc"]);
		
		$nombre_candidato = $this->Sanitize->clean_string($_POST["nombre_candidato"]);
		$apellido_paterno_candidato = $this->Sanitize->clean_string($_POST["apellido_paterno_candidato"]);
		$apellido_materno_candidato = $this->Sanitize->clean_string($_POST["apellido_materno_candidato"]);
		
		
		$altaUsuario= $this->RecursoshumanosModel->insertarUsuario($nombre_candidato,$apellido_paterno_candidato,$apellido_materno_candidato,$email,$rfc);
		
		
	
$resultado = array(
					"codigo" => 200,
					"unique" => true,
					"mensaje" => "Actualizado correctamente."
			);
	
echo json_encode($resultado);

	}
		
}
