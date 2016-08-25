<?php
defined ( 'BASEPATH' ) or exit ( 'No direct script access allowed' );

require_once (APPPATH . 'libraries/Sanitize.php');
require (APPPATH . 'libraries/UploadHandler.php');
class Recursoshumanos extends CI_Controller {
	function __construct() {
		// Call the Model constructor
		parent::__construct ();
		/* Necesario para validaciones de formulario, sanitizar variables $_POST y $_GET */
		$this->load->helper ( 'email' );
		$this->load->library ( 'form_validation' );
		$this->load->library ( 'Catalogos' );
		$this->Sanitize = new Sanitize ();
		
		/* Mandar llamar modelos que requieran de actividades de BD */
		$this->load->model ( 'ReclutamientoModel' );
		$this->load->model ( 'RecursoshumanosModel' );
		$this->SessionL->validarSesion ();
	}
	public function index() {
		$dataHeader = array (
				"titulo" => "Recursos Humanos" 
		);
		/* Obtener datos de usuario, roles, modulos , permisos */
		$sessionUser = $this->session->userdata ( 'logged_in' );
		// echo "<pre>";
		// print_r( $sessionUser );die;
		
		$isRRHH = 0;
		$accionesRRHH = array ();
		if (isset ( $sessionUser ["puesto"] ["permisos"] )) :
			foreach ( $sessionUser ["puesto"] ["permisos"] as $permisos ) :
				if ($permisos ["prefijoModulos"] == "recursos_humanos") :
					$isRRHH = 1;
					$accionesRRHH [] = $permisos ["accionPermisos"];
				
		endif;
			endforeach
			;
		 else :
			redirect ( "panel" );
		endif;
		
		if ($isRRHH == 0) :
			redirect ( "panel" );
		
		endif;
		
		/* Entrevistas por realizar */
		$entrevistasRealizar = $this->ReclutamientoModel->obtenerEntrevistasRealizarPrimeraParte ();
		/* Entrevistas por realizar */
		
		/* Segundas entrevistas */
		$entrevistasRealizarSegundaParte = $this->ReclutamientoModel->obtenerEntrevistasRealizarSegundaParte ();
		/* Segundas entrevistas */
		// print_r( $sessionUser );
		
		$movimientosCandidatosRH = $this->RecursoshumanosModel->obtenerMovimientosCandidatos ();
		
	
		
		$dataContent = array (
				"isRRHH" => $isRRHH,
				"accionesRRHH" => $accionesRRHH,
				"entrevistasRealizar" => $entrevistasRealizar,
				"entrevistasRealizarSegundaParte" => $entrevistasRealizarSegundaParte,
				"movimientos" => $movimientosCandidatosRH
				
		);
		
		// print_r($movimientosCandidatosRH);
		
		$this->load->view ( 'includes/header', $dataHeader );
		$this->load->view ( 'eaf/recursoshumanos/index', $dataContent );
		$this->load->view ( 'includes/footer' );
	}
	public function candidato() {
		$dataHeader = array (
				"titulo" => "FDP Candidato" 
		);
		$idCandidatoFDP = $this->Sanitize->clean_string ( $_REQUEST ["idCandidatoFDP"] );
		
		// if( $idCandidatoFDP == "" ):
		// redirect("panel");
		// endif;
		
		/* Obtener datos de usuario, roles, modulos , permisos */
		$sessionUser = $this->session->userdata ( 'logged_in' );
		$isRRHH = 0;
		$accionesRRHH = array ();
		if (isset ( $sessionUser ["puesto"] ["permisos"] )) :
			foreach ( $sessionUser ["puesto"] ["permisos"] as $permisos ) :
				if ($permisos ["prefijoModulos"] == "recursos_humanos") :
					$isRRHH = 1;
					$accionesRRHH [] = $permisos ["accionPermisos"];
				
		endif;
			endforeach
			;
		 else :
			redirect ( "panel" );
		endif;
		
		if ($isRRHH == 0) :
			redirect ( "panel" );
		
		endif;
		/* Obtener datos de usuario, roles, modulos , permisos */
		$candidatoFDP = $this->ReclutamientoModel->obtenerCandidatoFDP ( $idCandidatoFDP );
		
		$reclutamientoFDP = $this->ReclutamientoModel->obtenerPrimerEntrevista ( $idCandidatoFDP );
		
		/* Validar que sea valido el candidato */
		if (empty ( $candidatoFDP ) || $candidatoFDP ["idVacantesPeticiones"] == 0) :
			redirect ( "panel" );
		
		endif;
		/* Validar que sea valido el candidato */
		
		/* POST */
		// perfil_candidato_reclutamiento
		
		if (isset ( $_POST ["perfil_candidato_reclutamiento"] )) :
			
			$perfilCandidato = $this->Sanitize->clean_string ( $_POST ["perfil_candidato_reclutamiento"] );
			$evaluacionRazonamiento = $this->Sanitize->clean_string ( $_POST ["evaluacion_candidato_reclutamiento"] );
			$puntajeEvaluacionRazonamiento = $this->Sanitize->clean_string ( $_POST ["valores_evaluacion_candidato_reclutamiento"] );
			$escalaValoresEvaluacionRazonamiento = $this->Sanitize->clean_string ( $_POST ["escala_evaluacion_candidato_reclutamiento"] );
			$comentariosReclutador = $this->Sanitize->clean_string ( $_POST ["comentarios_candidato_reclutamiento"] );
			$estatusReclutamientoFDP = $this->Sanitize->clean_string ( $_POST ["aprobar_rechazar"] );
			$idUsuarioCrea = $sessionUser ["usuario"] ["idUsuarios"];
			$fechaEntrevista = $_POST ["fecha_entrevista_candidato_reclutamiento"];
			
			$estatusAprobacion = ($estatusReclutamientoFDP == "aprobar") ? "aprobado" : "rechazado";
			
			$this->ReclutamientoModel->setIdCandidatoFDP ( $idCandidatoFDP )->setPerfilCandidato ( $perfilCandidato )->setEvaluacionRazonamiento ( $evaluacionRazonamiento )->setPuntajeEvaluacionRazonamiento ( $puntajeEvaluacionRazonamiento )->setEscalaValoresEvaluacionRazonamiento ( $escalaValoresEvaluacionRazonamiento )->setComentariosReclutador ( $comentariosReclutador )->setIdUsuarioCrea ( $idUsuarioCrea )->setEstatusReclutamientoFDP ( $estatusAprobacion )->setFechaEntrevista ( $fechaEntrevista )->setIdVacantesPeticiones ( $candidatoFDP ["idVacantesPeticiones"] );
			
			$sql = $this->ReclutamientoModel->guardarPrimerEntrevistaCandidatoFDP ();
			if ($sql == "insertado") :
				redirect ( "eaf/reclutamiento/candidato/?idCandidatoFDP=" . $idCandidatoFDP . "&reclutamiento=true" );
			 else :
				$dataContent ["error_reclutamiento"] = "Por favor de llenar los campos vacÃ­os.";
			endif;
		
		//echo "<pre>";print_r($candidatoFDP);
			
		endif;
		/* POST */
		
		$dataContent ["formArray"] = $candidatoFDP;
		$dataContent ["catalogos"] = new Catalogos ();
		$dataContent ["reclutamientoFDP"] = $reclutamientoFDP;
		/* Obtener datos de usuario, roles, modulos , permisos */
		
		$this->load->view ( 'includes/header', $dataHeader );
		$this->load->view ( 'eaf/reclutamiento/fdp', $dataContent );
		$this->load->view ( 'includes/footer' );
	}
	public function candidato_rh() {
		$dataHeader = array (
				"titulo" => "FDP Candidato" 
		);
		$idCandidatoFDP = $this->Sanitize->clean_string ( $_REQUEST ["idCandidatoFDP"] );
		
		if ($idCandidatoFDP == "") :
			redirect ( "panel" );
		
		endif;
		
		/* Obtener datos de usuario, roles, modulos , permisos */
		$sessionUser = $this->session->userdata ( 'logged_in' );
		
		$isRRHH = 0;
		$accionesRRHH = array ();
		if (isset ( $sessionUser ["puesto"] ["permisos"] )) :
			foreach ( $sessionUser ["puesto"] ["permisos"] as $permisos ) :
				if ($permisos ["prefijoModulos"] == "recursos_humanos") :
					$isRRHH = 1;
					$accionesRRHH [] = $permisos ["accionPermisos"];
				
		endif;
			endforeach
			;
		 else :
			redirect ( "panel" );
		endif;
		
		if ($isRRHH == 0) :
			redirect ( "panel" );
		
		endif;
		/* Obtener datos de usuario, roles, modulos , permisos */
		$candidatoFDP = $this->ReclutamientoModel->obtenerCandidatoFDP ( $idCandidatoFDP );
		$idReclutamientoFDP = $candidatoFDP ["idReclutamientoFDP"];
		$reclutamientoFDP = $this->ReclutamientoModel->obtenerPrimerEntrevista ( $idCandidatoFDP );
		
		$nombreUsuarioAprueba = (isset ( $reclutamientoFDP ["idUsuarioCrea"] )) ? $this->ReclutamientoModel->obtenerNombrePorIdUsuarios ( $reclutamientoFDP ["idUsuarioCrea"] ) : "Desconocido";
		
		$nombreGerente = (isset ( $candidatoFDP ["idUsuariosPeticion"] )) ? $this->ReclutamientoModel->obtenerNombrePorIdUsuarios ( $candidatoFDP ["idUsuariosPeticion"] ) : "Desconocido";
		
		$peticionesVacantes = $this->ReclutamientoModel->obtenerPeticionesVacantes ();
		
		/* Validar que sea valido el candidato */
		if (empty ( $candidatoFDP ) || $candidatoFDP ["idVacantesPeticiones"] == 0) :
			redirect ( "panel" );
		
		endif;
		/* Validar que sea valido el candidato */
		
		$obtenerAprobacionRH = $this->ReclutamientoModel->obtenerAprobacionRH ( $idCandidatoFDP, $idReclutamientoFDP );
		$obtenerAprobacionDirector = $this->ReclutamientoModel->obtenerAprobacionDirector ( $idCandidatoFDP, $idReclutamientoFDP );
		$obtenerMetaRH = $this->RecursoshumanosModel->obtenerMetaRH ( $idCandidatoFDP, $idReclutamientoFDP );
		
		$obtenerGerentes = $this->ReclutamientoModel->obtenerGerentes ();
		
		$arrayFields = $obtenerMetaRH;
		$arrayErrorFields = array ();
		
		if (isset ( $_POST ["aprobar_rechazar_rh"] )) :
			if ($sessionUser ["puesto"] ["accionRol"] == "recursos_humanos") :
				// Solo estos dos Roles pueden aprobar el candidato para el siguiente paso de alta.
				
				$arrayFields = array (
						"imagen_fisica_rh_candidato" => $_POST ["imagen_fisica_rh_candidato"],
						"forma_entrar_sentarse_rh_candidato" => $_POST ["forma_entrar_sentarse_rh_candidato"],
						"cuidado_personal_rh_candidato" => $_POST ["cuidado_personal_rh_candidato"],
						"contacto_visual_rh_candidato" => $_POST ["contacto_visual_rh_candidato"],
						"forma_saludar_rh_candidato" => $_POST ["forma_saludar_rh_candidato"],
						"tono_volumen_rh_candidato" => $_POST ["tono_volumen_rh_candidato"],
						"forma_sentarse_rh_candidato" => $_POST ["forma_sentarse_rh_candidato"],
						"forma_moverse_rh_candidato" => $_POST ["forma_moverse_rh_candidato"],
						"gesticulacion_rh_candidato" => $_POST ["gesticulacion_rh_candidato"],
						"movimientos_brazos_rh_candidato" => $_POST ["movimientos_brazos_rh_candidato"],
						"fluidez_verbal_rh_candidato" => $_POST ["fluidez_verbal_rh_candidato"],
						"riqueza_vocabulario_rh_candidato" => $_POST ["riqueza_vocabulario_rh_candidato"],
						"precision_comunicacion_rh_candidato" => $_POST ["precision_comunicacion_rh_candidato"],
						"capacidad_sentimientos_rh_candidato" => $_POST ["capacidad_sentimientos_rh_candidato"],
						"atencion_cliente_rh_candidato" => $_POST ["atencion_cliente_rh_candidato"],
						"influencia_negociacion_rh_candidato" => $_POST ["influencia_negociacion_rh_candidato"],
						"persuasivo_rh_candidato" => $_POST ["persuasivo_rh_candidato"],
						"comunicacion_eficaz_rh_candidato" => $_POST ["comunicacion_eficaz_rh_candidato"],
						"trabajo_equipo_rh_candidato" => $_POST ["trabajo_equipo_rh_candidato"],
						"cierre_acuerdos_rh_candidato" => $_POST ["cierre_acuerdos_rh_candidato"],
						"aprobar_rechazar_rh" => $_POST ["aprobar_rechazar_rh"],
						"fecha_entrevista_rh_fdp" => $_POST ["fecha_entrevista_rh_fdp"],
						"aprobacion_gerente_rh_fdp" => $_POST ["aprobacion_gerente_rh_fdp"] 
				);
				
				foreach ( $arrayFields as $key => $po ) :
					if ($po == "") :
						$arrayErrorFields [] = $key;
					
		endif;
				endforeach
				;
				
				if ($sessionUser ["puesto"] ["accionRol"] == "recursos_humanos") :
					
					if (empty ( $arrayErrorFields )) :
						
						$aprobarRH = $this->RecursoshumanosModel->insertarEvaluacionRecursosHumanosFDP ( $arrayFields, $sessionUser ["usuario"] ["idUsuarios"], $idCandidatoFDP, $idReclutamientoFDP );
						
						if ($aprobarRH) :
							redirect ( "eaf/RecursosHumanos/candidato_rh/?idCandidatoFDP=" . $idCandidatoFDP . "&registroRH=1" );
						 else :
							$errorMensajes [] = "No fue posible guardar la informaciÃ³n. Contacte con el administrador.";
						endif;
					 

					else :
						$errorMensajes [] = "Favor de seleccionar todos los campos de la evaluaciÃ³n.";
					endif;
				
		endif;
			 

			else :
			

			endif;
		
			
		endif;
		
		
		$sqlCatPuestos = 'SELECT * from Puestos order by nombrePuesto asc';
		
		$queryCatPuestos = $this->db->query($sqlCatPuestos);
		
		$dataContent["CatPuestos"] = $queryCatPuestos->result();
		
		$dataContent ["formArray"] = $candidatoFDP;
		$dataContent ["catalogos"] = new Catalogos ();
		$dataContent ["reclutamientoFDP"] = $reclutamientoFDP;
		$dataContent ["nombreUsuarioAprueba"] = $nombreUsuarioAprueba;
		$dataContent ["nombreGerente"] = $nombreGerente;
		
		$dataContent ["aprobacionRH"] = $obtenerAprobacionRH;
		$dataContent ["aprobacionDirector"] = $obtenerAprobacionDirector;
		$dataContent ["accionRol"] = $sessionUser ["puesto"] ["accionRol"];
		$dataContent ["arrayFields"] = $arrayFields;
		$dataContent ["errorMensajes"] = $errorMensajes;
		$dataContent ["arrayErrorFields"] = $arrayErrorFields;
		
		$dataContent ["peticionesVacantes"] = $peticionesVacantes;
		$dataContent ["gerentesSegundaEntrevista"] = $obtenerGerentes;
		
		/* Obtener datos de usuario, roles, modulos , permisos */
		
		// print_r($dataContent);
		
		$this->load->view ( 'includes/header', $dataHeader );
		$this->load->view ( 'eaf/recursoshumanos/fdp_rh', $dataContent );
		$this->load->view ( 'includes/footer' );
	}
	public function altausuario() {
		$dataHeader = array (
				"titulo" => "Alta de Usuario" 
		);
		
		$idCandidatoFDP = $this->input->get ( 'idCandidatoFDP' );
		$catEmpresas = $this->RecursoshumanosModel->obtenerEmpresas ();
		$catDepartamentos = $this->RecursoshumanosModel->obtenerDepartamentos ();
		$candidatoFDP = $this->RecursoshumanosModel->obtenerCandidatoFDP ( $idCandidatoFDP );
		$Plazas = $this->RecursoshumanosModel->obtenerPlazas ();
		$Oficinas = $this->RecursoshumanosModel->obtenerOficinas ();
		$Sueldos = $this->RecursoshumanosModel->obtenerSueldos ();
		
		// if( empty( $candidatoFDP ) || $candidatoFDP["idVacantesPeticiones"] == 0 || $candidatoFDP["idReclutamientoFDP"] == 0 || $candidatoFDP["idUsuariosAprobacionGerente"] == 0):
		// redirect("panel");
		// endif;
		
		$idCandidato = array ();
		$idCandidato ['idCandidatoFDP'] = $idCandidatoFDP;
		
		$this->SessionL->validarSesion ();
		
		$error_campos = array ();
		$error_campos [] = "nombre_candidato";
		$error_campos [] = "apellido_paterno_candidato";
		$error_campos [] = "apellido_materno_candidato";
		$error_campos [] = "gerente_autoriza";
		$error_campos [] = "empresa_contrata";
		$error_campos [] = "corporativo";
		$error_campos [] = "oficina";
		$error_campos [] = "plaza";
		$error_campos [] = "fechaIngreso";
		$error_campos [] = "sueldoNOI";
		$error_campos [] = "puesto";
		$error_campos [] = "descripcionDepartamento";
		$error_campos [] = "turno";
		$error_campos [] = "descanso";
		
		$dataContent ["formArray"] = (! empty ( $resultado )) ? ($resultado) : "";
		
		$dataContent ["error_campos"] = $error_campos;
		$dataContent ["idCandidatoFDP"] = $idCandidato;
		$dataContent ["formArrayCandidato"] = $candidatoFDP;
		$dataContent ["catalogos"] = new Catalogos ();
		$dataContent ["Empresas"] = $catEmpresas;
		$dataContent ["Departamentos"] = $catDepartamentos;
		$dataContent ["Plazas"] = $Plazas;
		$dataContent ["Oficinas"] = $Oficinas;
		$dataContent ["Sueldos"] = $Sueldos;
		
		// echo "<pre>";print_r($error_campos);
		// echo "<pre>";print_r($dataContent);
		// echo "<pre>";print_r($resultado);
		// echo "<pre>";print_r($formArray);
		
		$this->load->view ( 'includes/header', $dataHeader );
		$this->load->view ( 'eaf/recursoshumanos/alta_usuario', $dataContent );
		$this->load->view ( 'includes/footer' );
	}
	public function server() {
		error_reporting ( E_ALL | E_STRICT );
		
		$upload_handler = new UploadHandler ( array (
				'accept_file_types' => '/\.(gif|jpe?g|png|pdf|doc|docx)$/i' 
		) );
	}
	public function SolicitarCuentaBancaria() {
		$id = $this->input->post ( 'id' );
		
		$SolicitarCuenta = $this->RecursoshumanosModel->solicitarCuenta ( $id );
		
		if ($SolicitarCuenta) 

		{
			?>

<label
	style="font-weight: bold; text-align: center; font-size: 13pt; color: #00db05">Solicitud
	enviada correctamente</label>

<?php
		} else {
			?>
<label>Error, intentelo nuevamente</label>

<?php
		}
	}
	public function GuardarUsuario() {
		$dataHeader = array (
				"titulo" => "Alta de Usuario" 
		);
		
		$idCandidatoFDP = $this->Sanitize->clean_string ( $_POST ["idCandidato"] );
		$catEmpresas = $this->RecursoshumanosModel->obtenerEmpresas ();
		$catDepartamentos = $this->RecursoshumanosModel->obtenerDepartamentos ();
		$candidatoFDP = $this->RecursoshumanosModel->obtenerCandidatoFDP ( $idCandidatoFDP );
		
		// if( empty( $candidatoFDP ) || $candidatoFDP["idVacantesPeticiones"] == 0 || $candidatoFDP["idReclutamientoFDP"] == 0 || $candidatoFDP["idUsuariosAprobacionGerente"] == 0):
		// redirect("panel");
		// endif;
		
		$this->SessionL->validarSesion ();
		
		$resultado = array (
				"step_current" => $this->Sanitize->clean_string ( $_POST ["step_current"] ),
				"btn_fire" => $this->Sanitize->clean_string ( $_POST ["btn_fire"] ),
				"estatus" => "Activo",
				"nombre_candidato" => $this->Sanitize->clean_string ( $_POST ["nombre_candidato"] ),
				"apellido_paterno_candidato" => $this->Sanitize->clean_string ( $_POST ["apellido_paterno_candidato"] ),
				"apellido_materno_candidato" => $this->Sanitize->clean_string ( $_POST ["apellido_materno_candidato"] ),
				"fechaIngreso" => $_POST ["fechaIngreso"],
				"gerente_autoriza" => $this->Sanitize->clean_string ( $_POST ["gerente_autoriza"] ),
				"empresa_contrata" => $this->Sanitize->clean_string ( $_POST ["empresa_contrata"] ),
				"corporativo" => $this->Sanitize->clean_string ( $_POST ["corporativo"] ),
				"pagoExterno" => $this->Sanitize->clean_string ( $_POST ["pagoExterno"] ),
				"oficina" => $this->Sanitize->clean_string ( $_POST ["oficina"] ),
				"plaza" => $this->Sanitize->clean_string ( $_POST ["plaza"] ),
				"sueldoNOI" => $this->Sanitize->clean_string ( $_POST ["sueldoNOI"] ),
				"puesto" => $this->Sanitize->clean_string ( $_POST ["puesto"] ),
				"descripcionDepartamento" => $this->Sanitize->clean_string ( $_POST ["descripcionDepartamento"] ),
				"turno" => $this->Sanitize->clean_string ( $_POST ["turno"] ),
				"descanso" => $this->Sanitize->clean_string ( $_POST ["descanso"] ),
				"cuentaNomina" => $this->Sanitize->clean_string ( $_POST ["cuentaNomina"] ),
				"clabeInterbancaria" => $this->Sanitize->clean_string ( $_POST ["clabeInterbancaria"] ),
				"email" => $_POST ["email"],
				"rfc" => $this->Sanitize->clean_string ( $_POST ["rfc"] ),
				"curp" => $this->Sanitize->clean_string ( $_POST ["curp"] ),
				"carta_curp" => $_POST ["carta_curp"],
				"actanacimiento" => $_POST ["actanacimiento"],
				"comprobantedomicilio" => $_POST ["comprobantedomicilio"],
				"carta_rfc" => $_POST ["carta_rfc"],
				"imss" => $_POST ["imss"],
				"antecedentespenales" => $_POST ["antecedentespenales"],
				"burocredito" => $_POST ["burocredito"],
				"identificacionoficial" => $_POST ["identificacionoficial"],
				"comprobanteEstudios" => $_POST ["comprobanteEstudios"],
				"tokenVacante" => $_POST ["token"],
				"idPadre" => $_POST ["idPadre"],
				"banco" => $_POST ["banco"],
				"fotoCandidato" => $_POST ["fotoCandidato"] 
		)
		;
		
		$token = $this->input->post ( 'token' );
		
		$ValidarToken = $this->RecursoshumanosModel->ValidarToken ( $token );
		
		if ($ValidarToken) {
			
			$dataContent ["registro"] = "yaregistrado";
			$dataContent ["formArray"] = $formArray;
		} else {
			
			$fechaRegistro = date ( 'Y-m-d H:i:s' );
			$nombre = $resultado ['apellido_paterno_candidato'] . " " . $resultado ['apellido_materno_candidato'] . " " . $resultado ['nombre_candidato'];
			
			$sqlInsertCandidato = "INSERT INTO Usuarios (
				nombreUsuario,
				correoUsuario,
				contraseniaUsuario,
				estatusUsuario,
				fechaRegistro,
				RFC
				) VALUES (
				'" . $nombre . "',
						'" . $resultado ['email'] . "',
								md5('2016'),
								'Activo',
								'" . $fechaRegistro . "',
										'" . $resultado ['rfc'] . "');";
			
			$insertCandidao = $this->db->query ( $sqlInsertCandidato );
			
			$candidatoInsertID = $this->db->insert_id ();
			
			if (file_exists ( FCPATH . 'tempFDP/files/' . $resultado ["carta_curp"] )) :
				if (rename ( FCPATH . 'tempFDP/files/' . $resultado ["carta_curp"], FCPATH . 'documentosUsuarios/' . $resultado ["carta_curp"] )) :
					$sqlInsertArchivo = 'INSERT INTO DocumentosUsuarios (idUsuarios , nombreDocumento , prefijoDocumento) VALUES( ' . $candidatoInsertID . ' , \'' . $resultado ["carta_curp"] . '\' , \'carta_curp\');';
					$this->db->query ( $sqlInsertArchivo );
					unlink ( FCPATH . 'tempFDP/files/' . $resultado ["carta_curp"] );
					unlink ( FCPATH . 'tempFDP/files/thumbnail/' . $resultado ["carta_curp"] );
				
endif;
			
endif;
			
			if (file_exists ( FCPATH . 'tempFDP/files/' . $resultado ["actanacimiento"] )) :
				if (rename ( FCPATH . 'tempFDP/files/' . $resultado ["actanacimiento"], FCPATH . 'documentosUsuarios/' . $resultado ["actanacimiento"] )) :
					$sqlInsertArchivo = 'INSERT INTO DocumentosUsuarios (idUsuarios , nombreDocumento , prefijoDocumento) VALUES( ' . $candidatoInsertID . ' , \'' . $resultado ["actanacimiento"] . '\' , \'actanacimiento\');';
					$this->db->query ( $sqlInsertArchivo );
					unlink ( FCPATH . 'tempFDP/files/' . $resultado ["actanacimiento"] );
					unlink ( FCPATH . 'tempFDP/files/thumbnail/' . $resultado ["actanacimiento"] );
				
endif;
			
endif;
			
			if (file_exists ( FCPATH . 'tempFDP/files/' . $resultado ["comprobantedomicilio"] )) :
				if (rename ( FCPATH . 'tempFDP/files/' . $resultado ["comprobantedomicilio"], FCPATH . 'documentosUsuarios/' . $resultado ["comprobantedomicilio"] )) :
					$sqlInsertArchivo = 'INSERT INTO DocumentosUsuarios (idUsuarios , nombreDocumento , prefijoDocumento) VALUES( ' . $candidatoInsertID . ' , \'' . $resultado ["comprobantedomicilio"] . '\' , \'comprobantedomicilio\');';
					$this->db->query ( $sqlInsertArchivo );
					unlink ( FCPATH . 'tempFDP/files/' . $resultado ["comprobantedomicilio"] );
					unlink ( FCPATH . 'tempFDP/files/thumbnail/' . $resultado ["comprobantedomicilio"] );
				
endif;
			
endif;
			
			if (file_exists ( FCPATH . 'tempFDP/files/' . $resultado ["carta_rfc"] )) :
				if (rename ( FCPATH . 'tempFDP/files/' . $resultado ["carta_rfc"], FCPATH . 'documentosUsuarios/' . $resultado ["carta_rfc"] )) :
					$sqlInsertArchivo = 'INSERT INTO DocumentosUsuarios (idUsuarios , nombreDocumento , prefijoDocumento) VALUES( ' . $candidatoInsertID . ' , \'' . $resultado ["carta_rfc"] . '\' , \'carta_rfc\');';
					$this->db->query ( $sqlInsertArchivo );
					unlink ( FCPATH . 'tempFDP/files/' . $resultado ["carta_rfc"] );
					unlink ( FCPATH . 'tempFDP/files/thumbnail/' . $resultado ["carta_rfc"] );
				
endif;
			
endif;
			
			if (file_exists ( FCPATH . 'tempFDP/files/' . $resultado ["imss"] )) :
				if (rename ( FCPATH . 'tempFDP/files/' . $resultado ["imss"], FCPATH . 'documentosUsuarios/' . $resultado ["imss"] )) :
					$sqlInsertArchivo = 'INSERT INTO DocumentosUsuarios (idUsuarios , nombreDocumento , prefijoDocumento) VALUES( ' . $candidatoInsertID . ' , \'' . $resultado ["imss"] . '\' , \'imss\');';
					$this->db->query ( $sqlInsertArchivo );
					unlink ( FCPATH . 'tempFDP/files/' . $resultado ["imss"] );
					unlink ( FCPATH . 'tempFDP/files/thumbnail/' . $resultado ["imss"] );
				
endif;
			
endif;
			
			if (file_exists ( FCPATH . 'tempFDP/files/' . $resultado ["antecedentespenales"] )) :
				if (rename ( FCPATH . 'tempFDP/files/' . $resultado ["antecedentespenales"], FCPATH . 'documentosUsuarios/' . $resultado ["antecedentespenales"] )) :
					$sqlInsertArchivo = 'INSERT INTO DocumentosUsuarios (idUsuarios , nombreDocumento , prefijoDocumento) VALUES( ' . $candidatoInsertID . ' , \'' . $resultado ["antecedentespenales"] . '\' , \'antecedentespenales\');';
					$this->db->query ( $sqlInsertArchivo );
					unlink ( FCPATH . 'tempFDP/files/' . $resultado ["antecedentespenales"] );
					unlink ( FCPATH . 'tempFDP/files/thumbnail/' . $resultado ["antecedentespenales"] );
				
endif;
			
endif;
			
			if (file_exists ( FCPATH . 'tempFDP/files/' . $resultado ["burocredito"] )) :
				if (rename ( FCPATH . 'tempFDP/files/' . $resultado ["burocredito"], FCPATH . 'documentosUsuarios/' . $resultado ["burocredito"] )) :
					$sqlInsertArchivo = 'INSERT INTO DocumentosUsuarios (idUsuarios , nombreDocumento , prefijoDocumento) VALUES( ' . $candidatoInsertID . ' , \'' . $resultado ["burocredito"] . '\' , \'burocredito\');';
					$this->db->query ( $sqlInsertArchivo );
					unlink ( FCPATH . 'tempFDP/files/' . $resultado ["burocredito"] );
					unlink ( FCPATH . 'tempFDP/files/thumbnail/' . $resultado ["burocredito"] );
				
endif;
			
endif;
			
			if (file_exists ( FCPATH . 'tempFDP/files/' . $resultado ["identificacionoficial"] )) :
				if (rename ( FCPATH . 'tempFDP/files/' . $resultado ["identificacionoficial"], FCPATH . 'documentosUsuarios/' . $resultado ["identificacionoficial"] )) :
					$sqlInsertArchivo = 'INSERT INTO DocumentosUsuarios (idUsuarios , nombreDocumento , prefijoDocumento) VALUES( ' . $candidatoInsertID . ' , \'' . $resultado ["identificacionoficial"] . '\' , \'identificacionoficial\');';
					$this->db->query ( $sqlInsertArchivo );
					unlink ( FCPATH . 'tempFDP/files/' . $resultado ["identificacionoficial"] );
					unlink ( FCPATH . 'tempFDP/files/thumbnail/' . $resultado ["identificacionoficial"] );
				
endif;
			
endif;
			
			if (file_exists ( FCPATH . 'tempFDP/files/' . $resultado ["comprobanteEstudios"] )) :
				if (rename ( FCPATH . 'tempFDP/files/' . $resultado ["comprobanteEstudios"], FCPATH . 'documentosUsuarios/' . $resultado ["comprobanteEstudios"] )) :
					$sqlInsertArchivo = 'INSERT INTO DocumentosUsuarios (idUsuarios , nombreDocumento , prefijoDocumento) VALUES( ' . $candidatoInsertID . ' , \'' . $resultado ["comprobanteEstudios"] . '\' , \'comprobanteEstudios\');';
					$this->db->query ( $sqlInsertArchivo );
					unlink ( FCPATH . 'tempFDP/files/' . $resultado ["comprobanteEstudios"] );
					unlink ( FCPATH . 'tempFDP/files/thumbnail/' . $resultado ["comprobanteEstudios"] );
				
endif;
			
endif;
			
			if (file_exists ( FCPATH . 'tempFDP/files/' . $resultado ["fotoCandidato"] )) :
				if (rename ( FCPATH . 'tempFDP/files/' . $resultado ["fotoCandidato"], FCPATH . 'documentosUsuarios/' . $resultado ["fotoCandidato"] )) :
					$sqlInsertArchivo = 'INSERT INTO DocumentosUsuarios (idUsuarios , nombreDocumento , prefijoDocumento) VALUES( ' . $candidatoInsertID . ' , \'' . $resultado ["fotoCandidato"] . '\' , \'fotoCandidato\');';
					$this->db->query ( $sqlInsertArchivo );
					unlink ( FCPATH . 'tempFDP/files/' . $resultado ["fotoCandidato"] );
					unlink ( FCPATH . 'tempFDP/files/thumbnail/' . $resultado ["fotoCandidato"] );
				
endif;
			
endif;
			
			unset ( $resultado ["step_current"] );
			unset ( $resultado ["btn_fire"] );
			unset ( $resultado ["nombre_candidato"] );
			unset ( $resultado ["apellido_paterno_candidato"] );
			unset ( $resultado ["apellido_materno_candidato"] );
			unset ( $resultado ["carta_curp"] );
			unset ( $resultado ["actanacimiento"] );
			unset ( $resultado ["comprobantedomicilio"] );
			unset ( $resultado ["carta_rfc"] );
			unset ( $resultado ["imss"] );
			unset ( $resultado ["antecedentespenales"] );
			unset ( $resultado ["burocredito"] );
			unset ( $resultado ["identificacionoficial"] );
			unset ( $resultado ["comprobanteEstudios"] );
			unset ( $resultado ["fotoCandidato"] );
			
			$sqlHash = "SELECT idDepartamentos FROM departamentos where nombreDepartamento='" . $resultado ["descripcionDepartamento"] . "';";
			$selectHash = $this->db->query ( $sqlHash );
			
			if ($selectHash->num_rows () > 0) :
				$resultHash = $selectHash->result ();
				
				$resultado ["idDepartamento"] = $resultHash [0]->idDepartamentos;
			 

			else :
				
				$resultado ["idDepartamento"] = 0;
			

			endif;
			
			$sqlHash = "SELECT idPuestos FROM Puestos where nombrePuesto='" . $resultado ["puesto"] . "';";
			$selectHash = $this->db->query ( $sqlHash );
			
			if ($selectHash->num_rows () > 0) :
				$resultHash = $selectHash->result ();
				
				$resultado ["idPuesto"] = $resultHash [0]->idPuestos;
			 

			else :
				
				$resultado ["idPuesto"] = 0;
			

			endif;
			
			$sqlHash = "SELECT sdi FROM Sueldos where idSueldos=" . $resultado ["sueldoNOI"] . ";";
			$selectHash = $this->db->query ( $sqlHash );
			
			if ($selectHash->num_rows () > 0) :
				$resultHash = $selectHash->result ();
				
				$resultado ["Sdi"] = $resultHash [0]->sdi;
			 

			else :
				
				$resultado ["Sdi"] = 0;
			

			endif;
			
			$sqlHash = "SELECT max(valorMetaDatos) as noEmpleado FROM UsuariosMetaDatos where prefijoMetaDatos='noEmpleado';";
			$selectHash = $this->db->query ( $sqlHash );
			
			if ($selectHash->num_rows () > 0) :
				$resultHash = $selectHash->result ();
				
				$resultado ["noEmpleado"] = $resultHash [0]->noEmpleado + 1;
			 

			else :
				
				$resultado ["noEmpleado"] = 0;
			

			endif;
			
			if ($resultado ["corporativo"] == 'Si') 

			{
				$resultado ["corporativo"] = 'CORPORATIVO';
			} else {
				$resultado ["corporativo"] = '';
			}
			
			if ($resultado ["pagoExterno"] == '') 

			{
				$resultado ["despagoExterno"] = '';
			} else {
				$resultado ["despagoExterno"] = 'SINERGIA';
			}
			
			$sqlHash = "SELECT profundidad FROM TaxPuestoUsuario where idUsuarios =" . $resultado ['idPadre'] . ";";
			$selectHash = $this->db->query ( $sqlHash );
			
			if ($selectHash->num_rows () > 0) :
				$resultHash = $selectHash->result ();
				
				$resultado ["profundidad"] = $resultHash [0]->profundidad + 1;
			 

			else :
				
				$resultado ["profundidad"] = 0;
			

			endif;
			
			$resultado ["idEmpleado"] = $candidatoInsertID;
			$resultado ["fechaAlta"] = date ( "Y-m-d" );
			
			$sqlInsertCandidato = "INSERT INTO TaxPuestoUsuario (
				idPuestos,
				fechaMovimiento,
				idUsuarios,
				idUsuariosAdministra,
				idUsuariosPadre,
				profundidad,
				idRoles
				) VALUES (
				" . $resultado ['idPuesto'] . ",
						'" . $resultado ['fechaAlta'] . "',
								" . $candidatoInsertID . ",
								1,
								" . $resultado ['idPadre'] . ",
				                   " . $resultado ['profundidad'] . ",
										10);";
			
			$insertTaxtPuestos = $this->db->query ( $sqlInsertCandidato );
			
			$sqlUpdateUsuario = "UPDATE RecursosHumanosFDP set altaUsuario=1 , fechaAlta = now(), idUsuarios= $candidatoInsertID where idCandidatoFDP= $idCandidatoFDP";
			
			$UpdateUsuario = $this->db->query ( $sqlUpdateUsuario );
			
			foreach ( $resultado as $key => $res ) :
				
				$sqlInsertMetaDatos = 'INSERT INTO UsuariosMetaDatos ( prefijoMetaDatos , valorMetaDatos , idUsuarios ) VALUES( \'' . $key . '\' , \'' . $res . '\' , ' . $candidatoInsertID . ' );';
				$this->db->query ( $sqlInsertMetaDatos );
			endforeach
			;
			
			$dataContent ["registro"] = "registro";
			$dataContent ["formArray"] = $formArray;
		}
		
		$dataContent ["error_campos"] = $error_campos;
		$idCandidato = array ();
		$idCandidato ['idCandidatoFDP'] = $idCandidatoFDP;
		$dataContent ["idCandidatoFDP"] = $idCandidato;
		$dataContent ["formArrayCandidato"] = $candidatoFDP;
		$dataContent ["catalogos"] = new Catalogos ();
		$dataContent ["Empresas"] = $catEmpresas;
		$dataContent ["Departamentos"] = $catDepartamentos;
		
		// echo "<pre>";print_r($error_campos);
		// echo "<pre>";print_r($dataContent);
		// echo "<pre>";print_r($resultado);
	//	echo "<pre>";print_r($dataContent);
		
		$this->load->view ( 'includes/header', $dataHeader );
		$this->load->view ( 'eaf/recursoshumanos/alta_usuario', $dataContent );
		$this->load->view ( 'includes/footer' );
	}
	
	public function ValidarCuentaBancaria() {
		$id = $this->input->post ( 'id' );
		
		// $id = 6;
		
		$ValidarCuenta = $this->RecursoshumanosModel->validarCuenta ( $id );
		
		if ($ValidarCuenta) 

		{
			echo "correcto";
		} else {
			echo "error";
		}
	}
	function puerto() {
		$dominio = "mail.almeriasa.com.mx"; // Dominio a comprobar
		$puerto = 465; // Puerto a comprobar
		
		$fp = fsockopen ( $dominio, $puerto, $errno, $errstr );
		if (! $fp)
			
			echo "Fallo, el puerto ", $puerto, " no esta abierto<br />El error ha sido: ", $errno;
		else {
			echo "El puerto ", $puerto, " esta abierto correctamente";
			
			var_dump ( curl_version () );
			
			fclose ( $fp );
		}
	}
	function AprobarVacante() {
		$usuario = $this->getUserFromSession ();
		$data ['usuario'] = $usuario;
		
		$id = $this->input->post ( 'id' );
		
		if ($this->Analista->AprobarVacante ( $id )) :
			
			$resultado = array (
					"codigo" => 200,
					"exito" => true,
					"mensaje" => "Perfil de puesto aprobado correctamente." 
			);
		 

		else :
			$resultado = array (
					"codigo" => 400,
					"exito" => false,
					"mensaje" => "No es posible aprobar el perfil, vuelva a intentarlo." 
			);
		endif;
		
		ob_clean ();
		echo json_encode ( $resultado );
		exit ();
	}
	public function correos() {
		$config = array (
						
								'protocol' => 'smtp',
								'smtp_host' => 'ssl://mail.solumas.com.mx',
								'smtp_port' => 465,
								'smtp_user' => 'reclutamiento@solumas.com.mx',
								'smtp_pass' => 'Agosto2013',
								'smtp_timeout' => '7',
								'charset' => 'utf-8',
								'newline' => "\r\n",
						
								'mailtype' => 'html', // or html
								'validation' => TRUE
						) // bool whether to validate email or not
						
						;
		
		$ci = get_instance ();
		
		$ci->load->library ( 'Email', $config );
		$ci->email->initialize ( $config );
		
		$ci->email->from ( 'reclutamiento@solumas.com.mx', 'Prueba' );
		$ci->email->to ( 'ferma_3@live.com.mx' );
		$ci->email->subject ( 'Registro de publicacion' );
		$ci->email->message ( "
			    		    	
		<hr>
			    		    	
			    		    	
			    		    	
		<hr>
			    		    	
			 hola   		    	
			    		    	
		
		" );
		
		$ci->email->send ();
		
		var_dump ( $ci->email->print_debugger () );
	}
	
	public function Contrato($id) {
		$this->load->library ( 'Pdf' );
		
		$contrato = $this->RecursoshumanosModel->ContratoUsuarios ( $id );
		
		foreach ( $contrato as $fila ) {
			$nombre = strtoupper($fila->nombre);
			$paterno = strtoupper($fila->apeliidoPaterno);
			$materno = strtoupper($fila->apellidoMaterno);
			$empresa = strtoupper($fila->empresa);
			$calle = strtoupper($fila->calle);
			$colonia = strtoupper($fila->colonia);
			$ciudad = strtoupper($fila->ciudad);
			$municipio = strtoupper($fila->municipio);
			$estado = strtoupper($fila->estado);
			$cp = strtoupper($fila->cp);
			$civil = strtoupper($fila->estadoCivil);
			$genero = strtoupper($fila->genero);
			$nacionalidad = strtoupper($fila->paisNacimiento);
			$puesto = strtoupper($fila->puesto);
			$Sdi = $fila->Sdi;
			$fechaNacimiento = $fila->fechaNacimiento;
		}
		
		$arrayMeses = array('Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio',
				'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre');
		
		$arrayDias = array('Domingo' ,	'Lunes', 'Martes',
				'Miercoles', 'Jueves', 'Viernes', 'Sabado');
		 
		$hoy= $arrayDias[date('w')].", ".date('d')." de ".$arrayMeses[date('m')-1]." de ".date('Y');
		/*
		 Resultado, (fecha actual 21/09/2012):	
		 Viernes, 21 de Septiembre de 2012
		 */
		
		
		
		$cantidad=$this->num_to_letras($Sdi);
		
		$fecha_de_nacimiento = trim($fechaNacimiento);
		$fecha_actual = date ("Y-m-d");
		
		// separamos en partes las fechas
		$array_nacimiento = explode ( "-", $fecha_de_nacimiento );
		$array_actual = explode ( "-", $fecha_actual );
		
		$anos =  $array_actual[0] - $array_nacimiento[0]; // calculamos a�os
		$meses = $array_actual[1] - $array_nacimiento[1]; // calculamos meses
		$dias =  $array_actual[2] - $array_nacimiento[2]; // calculamos d�as
		
		//ajuste de posible negativo en $d�as
		if ($dias < 0)
		{
			--$meses;
		
			//ahora hay que sumar a $dias los dias que tiene el mes anterior de la fecha actual
			switch ($array_actual[1]) {
				case 1:     $dias_mes_anterior=31; break;
				case 2:     $dias_mes_anterior=31; break;
				case 3:
					if (bisiesto($array_actual[0]))
					{
						$dias_mes_anterior=29; break;
					} else {
						$dias_mes_anterior=28; break;
					}
				case 4:     $dias_mes_anterior=31; break;
				case 5:     $dias_mes_anterior=30; break;
				case 6:     $dias_mes_anterior=31; break;
				case 7:     $dias_mes_anterior=30; break;
				case 8:     $dias_mes_anterior=31; break;
				case 9:     $dias_mes_anterior=31; break;
				case 10:     $dias_mes_anterior=30; break;
				case 11:     $dias_mes_anterior=31; break;
				case 12:     $dias_mes_anterior=30; break;
			}
		
			$dias=$dias + $dias_mes_anterior;
		}
		
		//ajuste de posible negativo en $meses
		if ($meses < 0)
		{
			--$anos;
			$meses=$meses + 12;
		}
		
		
		$nuevafecha = strtotime ( '+28 day' , strtotime ( $fecha_actual ) ) ;
		$nuevafecha = date ( 'Y-m-j' , $nuevafecha );
		
		
		$pdf = new TCPDF ( PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false );
		
		// set default monospaced font
		$pdf->SetDefaultMonospacedFont ( PDF_FONT_MONOSPACED );
		
		// set margins
		$pdf->SetMargins ( PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT );
		$pdf->SetHeaderMargin ( PDF_MARGIN_HEADER );
		$pdf->SetFooterMargin ( PDF_MARGIN_FOOTER );
		
		// set auto page breaks
		$pdf->SetAutoPageBreak ( TRUE, PDF_MARGIN_BOTTOM );
		
		// set image scale factor
		$pdf->setImageScale ( PDF_IMAGE_SCALE_RATIO );
		
		// set some language-dependent strings (optional)
		if (@file_exists ( dirname ( __FILE__ ) . '/lang/eng.php' )) {
			require_once (dirname ( __FILE__ ) . '/lang/eng.php');
			$pdf->setLanguageArray ( $l );
		}
		
		// ---------------------------------------------------------
		
		// set default font subsetting mode
		$pdf->setFontSubsetting ( true );
		
		// Set font
		// dejavusans is a UTF-8 Unicode font, if you only need to
		// print standard ASCII chars, you can use core fonts like
		// helvetica or times to reduce file size.
		$pdf->SetFont ( 'dejavusans', '', 12, '', true );
		
		// Add a page
		// This method has several options, check the source code documentation for more information.
		$pdf->AddPage ();
		
		// set text shadow effect
		$pdf->setTextShadow ( array (
				'enabled' => true,
				'depth_w' => 0.2,
				'depth_h' => 0.2,
				'color' => array (
						196,
						196,
						196 
				),
				'opacity' => 1,
				'blend_mode' => 'Normal' 
		) );
		
		// Set some content to print
		$html = <<<EOD
					    		  

<div style='text-align:justify'><p>CONTRATO INDIVIDUAL DE TRABAJO POR TIEMPO DETERMINADO QUE CELEBRAN POR UNA PARTE <b>$empresa,</b> A QUIEN EN LO SUCESIVO DE ESTE CONTRATO SE LE DENOMINARÃ� EL "PATRÃ“N", Y POR LA OTRA, <b>$paterno $materno $nombre</b>
POR SU PROPIO DERECHO, A QUIEN EN ADELANTE SE LE DENOMINARÃ� EL (LA) "TRABAJADOR" (A), DE ACUERDO CON LAS SIGUIENTES DECLARACIONES Y CLÃ�USULAS:</p>
<p></p>
<p align="center">D E C L A R A C I O N E S</p>
<p>
<OL TYPE="I">
<li>Declaran los contratantes tener la debida capacidad para celebrar el presente contrato, en tal virtud lo celebran de comÃºn acuerdo de conformidad al artÃ­culo 25 de la Ley Federal del Trabajo.</li>
<br>
<li>El "Trabajador" por sus generales manifiesta llamarse como ha quedado escrito, con domicilio en <b>$calle col.$colonia $municipio $ciudad $estado C.P. $cp</b> de<b> $anos AÃ‘OS $meses MESES</b> de edad, sexo: <b>$genero</b>, estado civil: <b>$civil,</b> nacionalidad: <b>$nacionalidad.</b></li>
<br>
<li>El "PatrÃ³n" tiene su domicilio en Calzada de Tlalpan No. 938 Col. Nativitas, DelegaciÃ³n Benito JuÃ¡rez, C.P. 03500, MÃ©xico, D.F.</li>
<br>
<li>El "Trabajador" declara contar con buen estado de salud, estar fÃ­sica y profesionalmente apto, contar con los conocimientos, habilidades, requisitos y documentos necesarios para desempeÃ±ar la categorÃ­a con que se le contrata.</li>
</OL>
Las partes de comÃºn acuerdo suscriben el presente contrato individual de trabajo por tiempo determinado, de conformidad a las siguientes: </li>
<p></p>
<p align="center"><b>CLAUSULAS</b></p>

<p><b>PRIMERA.-</b> Este contrato se celebra por tiempo determinado, por un perÃ­odo contado a partir de la fecha del presente contrato y con vencimiento al dÃ­a <b>$nuevafecha.</b> </p>

<p><b>SEGUNDA</b>.- El presente contrato se celebra por tiempo determinado, en virtud de que existe una AsignaciÃ³n especÃ­fica de Cartera Vencida.</p>

<p><b>TERCERA</b>.- El "Trabajador" prestarÃ¡ sus servicios personales para el "PatrÃ³n" con la categorÃ­a<b> $puesto </b>sobre la asignaciÃ³n especÃ­fica de la Cartera mencionada en la clÃ¡usula precedente y realizarÃ¡ las actividades inherentes a su categorÃ­a.</p>

<p><b>CUARTA</b>.- El "Trabajador" prestarÃ¡ sus servicios en el domicilio del "PatrÃ³n" o en cualquier otro domicilio o lugar que Ã©ste designe, dentro de la RepÃºblica Mexicana, por lo que estÃ¡ de acuerdo y otorga expresamente su consentimiento para ser removido de lugar de prestaciÃ³n de servicios e incluso, para cambiar de labores, sin perjuicio del salario percibido.</p>

<p><b>QUINTA.</b>- El "Trabajador" prestarÃ¡ sus servicios para el "PatrÃ³n" dentro de un horario de labores de las <b>15:00 </b>a las<b> 22:00</b>, disfrutando diariamente de treinta minutos, para descansar y tomar alimentos fuera del centro de trabajo, durante seis dÃ­as a la semana, descansando uno, preferentemente los dÃ­as domingo; horario y dÃ­a de descanso que podrÃ¡ ser cambiado conforme a las necesidades de la producciÃ³n del servicio, sin perjuicio de la jornada diaria mÃ¡xima legal. El tiempo de descanso y comida no se computa como tiempo de trabajo.</p>

<p><b>QUINTA</b>.- El "Trabajador" a cambio del salario percibido, laborarÃ¡ la jornada mÃ¡xima legal de 48 horas efectivas de trabajo a la semana, en la jornada diurna; 45 horas a la semana; en la jornada mixta y 42 horas a la semana, en la jornada nocturna, segÃºn sea el horario de labores asignado. El "Trabajador" tiene estrictamente prohibido laborar horas extras, sin previa autorizaciÃ³n escrita del "PatrÃ³n", en la que se anotarÃ¡ el nÃºmero de horas extras que deban laborarse, a partir de quÃ© momento inician y terminan; asÃ­ como la fecha en que deberÃ¡ realizarse el trabajo extraordinario. Las horas extras que esporÃ¡dicamente se lleguen a laborar, serÃ¡n contabilizadas y retribuidas de conformidad a las disposiciones aplicables de la Ley Federal de Trabajo.</p>

<p><b>SEXTA.</b>- El "Trabajador" estÃ¡ de acuerdo con el "PatrÃ³n" en que el dÃ­a de descanso semanal, con goce de sueldo, preferentemente serÃ¡ el dÃ­a domingo, o cualquier otro dÃ­a de la semana, conforme a las necesidades de la prestaciÃ³n del servicio.</p>

<p><b>SÃ‰PTIMA</b>.- El "Trabajador" percibirÃ¡ un salario diario de $<b>$Sdi ($cantidad),</b> incluyendo en esta cantidad la parte proporcional del sÃ©ptimo dÃ­a y serÃ¡ pagado los dÃ­as 15 y Ãºltimo de cada mes; cuando resulten inhÃ¡biles, se pagarÃ¡ el dÃ­a hÃ¡bil anterior, en moneda de curso legal en el domicilio del "PatrÃ³n", en el centro de trabajo y dentro del horario de labores, debiendo firmar el "Trabajador" el recibo de pago correspondiente. El "Trabajador", mediante este acto, tambiÃ©n solicita y autoriza al "PatrÃ³n" para que el pago de sus percepciones quincenales, puedan realizarse mediante depÃ³sito o transferencia electrÃ³nica a la cuenta a su nombre, en el Banco que la tenga aperturada; en este caso, la forma que acredite el depÃ³sito o la transferencia, demostrarÃ¡ el pago quincenal. Toda inconformidad con el pago de las prestaciones quincenales deberÃ¡ expresarse en el acto o dentro de las 48 horas posteriores al pago, de no hacerlo, es evidencia de que se han pagado en la forma y tÃ©rminos acordados y que la relaciÃ³n laboral se ha desarrollado conforme a lo pactado.</p>

<p><b>OCTAVA.</b>- El "Trabajador", cuando se lleve en el centro de trabajo, registrarÃ¡ su asistencia y las entradas y salidas del centro de labores, mediante el sistema de registro que, en su caso, lleve el "PatrÃ³n", por lo que el incumplimiento de esta disposiciÃ³n, evidenciarÃ¡ la falta injustificada a sus labores. </p>

<p><b>NOVENA.-</b> Por cada seis dÃ­as consecutivos de trabajo, el "Trabajador" disfrutarÃ¡ de un dÃ­a de descanso, estableciendo de comÃºn acuerdo con goce de sueldo Ã­ntegro. Cuando asÃ­ lo permita la necesidad de producciÃ³n del servicio, el "PatrÃ³n", podrÃ¡ conceder como dÃ­a de descanso semanal, preferentemente y de comÃºn acuerdo, el dÃ­a domingo. Si el "Trabajador" no labora los seis dÃ­as, recibirÃ¡ una sexta parte de su salario por cada dÃ­a que hubiese trabajado. Las inasistencias injustificadas al centro de trabajo, serÃ¡n deducibles del perÃ­odo de prestaciÃ³n de servicios, computables para el disfrute de las prestaciones a que tenga derecho. </p>

<p><b>DÃ‰CIMA.-</b> El "Trabajador" disfrutarÃ¡ de los dÃ­as de descanso obligatorio, establecidos por el artÃ­culo 74 de la Ley Federal del Trabajo, con goce de sueldo Ã­ntegro: 1 de enero, primer lunes de febrero en conmemoraciÃ³n al 5 de febrero, tercer lunes de marzo, en conmemoraciÃ³n al 21 de marzo, 1 de mayo, 16 de septiembre, tercer lunes de noviembre, en conmemoraciÃ³n al 20 de noviembre, el primero de diciembre de cada seis aÃ±os, cuando corresponda a la transmisiÃ³n del Poder Ejecutivo Federal y 25 de diciembre. Las que determinen las Leyes Federales y Locales Electorales en caso de Elecciones Ordinarias, para ejecutar la Jornada Electoral.</p>

<p><b>DÃ‰CIMA PRIMERA.-</b> El "Trabajador", despuÃ©s de haber cumplido un aÃ±o de servicios, disfrutarÃ¡ de un perÃ­odo de vacaciones de seis dÃ­as laborables. Dicho perÃ­odo se incrementarÃ¡ en dos dÃ­as por cada aÃ±o de servicios, hasta el cuarto aÃ±o de antigÃƒÂ¼edad; posteriormente el perÃ­odo vacacional se incrementarÃ¡ en dos dÃ­as por cada cinco aÃ±os de prestaciÃ³n de servicios, de conformidad al artÃ­culo 76 de la Ley Federal del Trabajo. </p>

<p>El perÃ­odo vacacional se disfrutarÃ¡ en dÃ­as continuos y dentro de los seis meses siguientes a la fecha de aniversario de prestaciÃ³n de servicios, segÃºn lo determinen las necesidades de la producciÃ³n o de la prestaciÃ³n del servicio. TambiÃ©n percibirÃ¡ la parte proporcional correspondiente al tiempo laborado, cuando no haya cumplido un aÃ±o de servicios. Previo al inicio del disfrute del perÃ­odo vacacional, el "Trabajador" percibirÃ¡ una prima vacacional de 25%. </p>

<p><b>DÃ‰CIMA SEGUNDA</b>.- El "Trabajador" percibirÃ¡ un aguinaldo anual equivalente a 15 dÃ­as de salario, cuando haya laborado un aÃ±o completo, o la proporciÃ³n del tiempo laborado; mismo que se pagarÃ¡ antes del dÃ­a 20 del mes de diciembre. </p>

<p><b>DÃ‰CIMA TERCERA.-</b> Las partes contratantes estÃ¡n de acuerdo en que el "PatrÃ³n" queda facultado a deducir del salario del "TRABAJADOR" las cantidades a que se refiere al artÃ­culo 110 de la Ley Federal del Trabajo: pensiÃ³n alimenticia decretada por la autoridad correspondiente, deudas contraÃ­das con el "PatrÃ³n" y en general las deudas de pago a que se refiere esta disposiciÃ³n legal. </p>

<p><b>DÃ‰CIMA CUARTA</b>.- El "Trabajador" expresamente se obliga a cumplir, respetar y observar las disposiciones legales, contractuales y reglamentarias, asÃ­ como aquellas disposiciones nuevas de carÃ¡cter transitorio y permanente que sean establecidas por el "PatrÃ³n". Particularmente a observar y cumplir el Reglamento Interior de Trabajo del "PATRÃ“N", mismo que en Ã©ste acto ha leÃ­do detenidamente, conoce y firma de recibido un ejemplar. </p>

<p><b>DÃ‰CIMA QUINTA</b>.- El "Trabajador" fue recomendado para la categorÃ­a que va a desempeÃ±ar, por lo que las partes acuerdan a que estarÃ¡ obligado a demostrar su capacidad, aptitudes y habilidades en el perÃ­odo contratado, quedando sujetas las partes a la decisiÃ³n del Ã¡rea de Recursos Humanos, a quien las partes le reconocen capacidad para opinar, sometiÃ©ndose a su fallo en relaciÃ³n a la capacidad, aptitudes y habilidades del "Trabajador". </p>

<p><b>DÃ‰CIMA SEXTA</b>.- El "Trabajador" se obliga a cumplir y a someterse a los planes y programas de capacitaciÃ³n y adiestramiento que establezca el "PatrÃ³n", o bien a participar como instructor en dichos planes y programas, como parte del trabajo contratado.</p>

<p><b>DÃ‰CIMA SEPTIMA</b>.- Todo lo no expresamente establecido en el presente contrato se sujetarÃ¡ a las disposiciones que seÃ±ala el apartado "A" del artÃ­culo 123 de la ConstituciÃ³n Federal, a las disposiciones de la Ley Federal del Trabajo y al Reglamento Interior de Trabajo de el "PatrÃ³n".</p>

<p><b>DÃ‰CIMA OCTAVA</b>.- Las partes convienen que al vencimiento del tÃ©rmino a que se refiere la clÃ¡usula primera de este contrato, quedarÃ¡ terminado, sin necesidad de dar aviso y cesarÃ¡n todos sus efectos, de acuerdo con la fracciÃ³n III del artÃ­culo 53 de la Ley Federal del Trabajo.</p>

<p>Las partes contratantes firman de comÃºn acuerdo el presente contrato, sabedoras de su contenido y alcance de las obligaciones que al suscribirlo, contraen recÃ­procamente, asÃ­ como las que la ley les impone. Lo firman por duplicado en la ciudad de MÃ©xico DF siendo el dÃ­a<b> $hoy</b></p>
<p></p>
<p></p>
<table cellspacing="0" cellpadding="0" > 
<tbody>
<tr>
<td align="center" ><p><b>" EL TRABAJADOR "</b></p>

<p><b>___________________________________</b></p>

<p><b>$paterno $materno $nombre</b></p></td>
<td align="center" ><p><b>" EL PATRON"</b></p>

<p><b>_____________________________________</b></p>

<p>$empresa</p></td>
</tr>

</tbody>
</table>
</div>
<div style="page-break-after: always;">
<p align="center"><b>CÃ“DIGO DE Ã‰TICA<br>DE LAS OBLIGACIONES PARA CON LOS<br>DEUDORES Y PÃšBLICO EN GENERAL<sup>1</sup></b></p>
<p></p>
<p><b>ARTÃ�CULO PRIMERO (34).- </b>Identificarse plenamente al momento de realizar la cobranza, o bien, al corroborar u obtener informaciÃ³n sobre la localizaciÃ³n del deudor. No se realizarÃ¡ requerimiento de pago con menores de edad o personas de la tercera edad. </p>

<p><b>ARTÃ�CULO SEGUNDO (35).- </b>Cobrar una deuda es un derecho legÃ­timo, como lo es tambiÃ©n el respeto mutuo a la dignidad entre deudores, acreedores y sus representantes. </p>

<p><b>ARTÃ�CULO TERCERO (36).- </b>No establecer contacto con los deudores en horarios y lugares que resulten inadecuados para el cobro. Se consideran adecuadas las comunicaciones que ocurran a partir de las 6:00 a.m. hasta las 11.00 p.m., hora local del domicilio del deudor. </p>

<p><b>ARTÃ�CULO CUARTO (37).- </b>En el ejercicio del derecho al cobro, se evitarÃ¡ hacer uso de lenguaje obsceno o de palabras altisonantes al establecer comunicaciÃ³n con el deudor, sus familiares, amigos o compaÃ±eros de trabajo. </p>

<p>Las comunicaciones telefÃ³nicas deberÃ¡n hacerse con la finalidad de negociar el pago de las deudas y no con la intenciÃ³n de molestar o amenazar a los deudores o a las personas que atiendan dichas llamadas. </p>

<p><b>ARTÃ�CULO QUINTO (38).- </b>No se podrÃ¡n hacer publicaciones, tales como "lista negra de deudores" y tampoco establecer registros especiales, distintos a los que prescriben las leyes, para hacer del conocimiento general la negativa de pago de los deudores. </p>

<p><b>ARTÃ�CULO SEXTO (39).- </b>Las empresas de cobranza o sus colaboradores, bajo ninguna circunstancia, deberÃ¡n ostentarse como representantes de Ã³rgano jurisdiccional u otra autoridad, o como parte de un consorcio legal, si no es el caso. </p>

<p><b>ARTÃ�CULO SÃ‰PTIMO (40).- </b>No engaÃ±ar al deudor con el argumento de que al no pagar su deuda, comete delito sancionado con privaciÃ³n de la libertad, ni hacerle creer con falsos escritos de demanda o de notificaciones judiciales, que se ha iniciado un juicio en su contra.</p>

<p><b>ARTÃ�CULO OCTAVO (41).- </b>No se deberÃ¡n hacer ofrecimientos tales como quitas, descuentos o cancelaciÃ³n de intereses o comisiones, con la finalidad de obtener el pago de la deuda, de no estar debidamente autorizado por el acreedor, o hacerle creer al deudor que podrÃ¡ gozar de dichos beneficios, de no existir dicha posibilidad</p>

<p><b>ARTÃ�CULO NOVENO (42).- </b>En los casos en que, como resultado de las gestiones de cobranza, el deudor acceda al pago de la deuda, las empresas de cobranza deberÃ¡n documentar por escrito los compromisos adquiridos, cuando lo requiera el acreditado o lo considere pertinente la empresa, debiendo constar la rÃºbrica de ambas partes. El representante de la empresa acreditarÃ¡ tal carÃ¡cter con la documentaciÃ³n en que se le faculte para llevar a cabo la recuperaciÃ³n del adeudo. </p>

<p><b><sup>1 </sup>El CÃ³digo de Ã‰tica se encuentra inserto en el CapÃ­tulo IV de los Estatutos Sociales de la AsociaciÃ³n de Profesionales en Cobranza y Servicios JurÃ­dicos, A.C., los nÃºmeros en parÃ©ntesis corresponden a los artÃ­culos de los citados estatutos.</b></p>

<p><b>ARTÃ�CULO DÃ‰CIMO (43).- </b>Las empresas de cobranza deberÃ¡n estipular en los convenios de pago que celebren con los deudores, los compromisos adquiridos en la negociaciÃ³n que se acuerde, seÃ±alando los tÃ©rminos y condiciones en que se llevarÃ¡n a cabo los pagos, obligÃ¡ndose a proporcionar escrito de finiquito o de liquidaciÃ³n de adeudo, en caso de condonaciÃ³n o quita, al cumplirse la obligaciÃ³n. Dichos documentos deberÃ¡n suscribirse por persona facultada por el acreedor. </p>

<p><b>ARTÃ�CULO DÃ‰CIMO PRIMERO (44).- </b>Hacer todo aquello que pueda ayudar a los deudores a encontrar la soluciÃ³n a su problemÃ¡tica financiera, para el cumplimiento de su adeudo, dentro de los mÃ¡rgenes de negociaciÃ³n autorizados por los clientes. </p>

<p><b>ARTÃ�CULO DÃ‰CIMO SEGUNDO (45).- </b>No incrementar las deudas con cargos no autorizados por la legislaciÃ³n vigente o por el contrato celebrado entre el deudor, el otorgante de crÃ©dito o el acreedor. </p>

<p><b>ARTÃ�CULO DÃ‰CIMO TERCERO (46).- </b>No utilizar formas o papelerÃ­a que simulen instrumentos legales. Los gestores no deben hacerse pasar por representantes legales si no lo son y tampoco utilizar nombres falsos. </p>

<p><b>ARTÃ�CULO DÃ‰CIMO CUARTO (47).- </b>No enviar correspondencia a los deudores con leyendas exteriores que mencionen que el comunicado trata especÃ­ficamente de una cobranza. Lo anterior no obliga a las empresas a omitir mencionar su nombre o razÃ³n social, en su calidad de remitente.</p>

<p>Evitar el envÃ­o de cartas o cualquier medio escrito que den motivo a descalificar la actuaciÃ³n de las empresas de cobranza en las que se efectÃºen manifestaciones que por su contenido, constituyan excesos que no se apeguen a la verdad, a la ley, a las buenas costumbres o que sean contrarias a la Ã©tica profesional</p>

<p>No utilizar cartelones, anuncios o cualquier medio impreso en lugares pÃºblicos, o en el exterior de los domicilios de los deudores, en los que se haga referencia a su adeudo.</p>

<p><b>ARTÃ�CULO DÃ‰CIMO QUINTO (48).- </b>No contactar por cualquier motivo o medio, a deudores cuyos asuntos hayan sido retirados de la asignaciÃ³n de las empresas de cobranza.</p>

<p><b>ARTÃ�CULO DÃ‰CIMO SEXTO (49).- </b>Las empresas de cobranza, por conducto de quienes gestionen el cobro, deberÃ¡n proporcionar al deudor, de requerirlo, toda la informaciÃ³n disponible sobre la integraciÃ³n de su saldo.</p>

<p><b>ARTÃ�CULO DÃ‰CIMO SÃ‰PTIMO (50).- </b>Las empresas de cobranza deberÃ¡n ser receptoras de las quejas, comentarios o sugerencias de los deudores. Para tal efecto, dispondrÃ¡n de los medios necesarios para darles trÃ¡mite y en su caso, soluciÃ³n, informando del resultado cuando proceda, al interesado. </p>

<p><b>ARTÃ�CULO DÃ‰CIMO OCTAVO (51).- </b>Las empresas de cobranza que sean propietarias de carteras que por su naturaleza, deban reportarse a las Sociedades de InformaciÃ³n Crediticia, lo efectuarÃ¡n conforme a las leyes aplicables a dichas sociedades, con la finalidad de que se actualice la informaciÃ³n respecto de los deudores que hayan cumplido con sus pagos. </p>

<p><b>ARTÃ�CULO DÃ‰CIMO NOVENO (52).- </b>En los casos de procedimientos judiciales en que se hayan embargado bienes y que hayan concluido en pago del adeudo, se deberÃ¡ dar aviso por los conductos legales correspondientes.</p>
</div>
<div style="page-break-after: always;">
<table border="1" cellspacing="0" cellpadding="0" > 
<tbody>
<tr>
<td> </td>
<td><i><u>$empresa</u></i></td>
<td> </td>
</tr>
</tbody>
</table>
<p></p>
<p align="center"><b>POR DISPOSICIONES GENERALES DE LA EMPRESA, ESTAS SON LAS REGLAS<br> INTERNAS<br> QUE EL PERSONAL DEBE DE CUMPLIR SIN EXCEPCION ALGUNA</b></p>
<p></p>
<p>Las siguientes polÃ­ticas de piso, tienen como finalidad establecer orden y control dentro del piso de operaciones, serÃ¡n de aplicaciÃ³n general para todo el personal de $empresa y Personal de nuestras diferentes firmas y otras compaÃ±Ã­as, que por sus funciones, deban estar dentro del piso de operaciones del Centro de Contactos Tlalpan.</p>

<p><b>De la hora de entrada y acceso al edificio.</b></p>

<ul>
<li>La hora de entrada deberÃ¡ ser de manera puntual de acuerdo a lo que te informo tu supervisor <b>no existiendo tolerancia</b>, salvo en casos especiales y que se puedan justificar de manera excepcional, estos casos los autorizara bajo su propia responsabilidad, el Gerente o Supervisor del Ã¡rea.</li>
</ul>

<ul>
<li>Queda estrictamente prohibido ingresar a el Ã¡rea de operaciÃ³n bolsas, mochilas, comida y/o medios de almacenamientos electrÃ³nicos, los cuales serÃ¡n resguardados en los lokers ubicados en P.B </li>
</ul>

<ul>
<li>El acceso siempre deberÃ¡ ser de manera ordenada considerando que el uso del elevador estÃ¡ restringido.</li>
</ul>

<ul>
<li>Todos los Asesores deberÃ¡n checar su entrada y salida de labores por cualquier medio destinado para ello (ElectrÃ³nico, FÃ­sico) aceptando que de no hacerlo se le considerara como falta.</li>
</ul>

<p><b>Del uso de equipos electrÃ³nicos propios, revistas, libros, etc.:</b></p>

<p><b>Queda estrictamente prohibido utilizar en el Ã¡rea de operaciones:</b></p>

<ul>
<li>Equipos celulares, palms, PC pockets video juegos portÃ¡tiles.</li>
</ul>

<ul>
<li>Reproductores de Mp3, Walk man, disc man, radios portÃ¡tiles con o sin audÃ­fonos.</li>
</ul>

<ul>
<li>Libros, revistas, gacetas, impresiones, copias o publicaciones que no estÃ©n referenciadas a tu trabajo (no puedes leer o hacer trabajos de escuela). </li>
</ul>

<ul>
<li>DeberÃ¡s mantener tu lugar limpio de basura, papeles inservibles, fotos posters, revistas periÃ³dicos y cualquier otro objeto.</li>
</ul>

<ul>
<li>Queda prohibido hacer o recibir llamadas por celular incluyendo enviÃ³ de SMS si necesitan localizarte o requieres hacer una llamada urgente deberÃ¡ ser por la Ext. de tu supervisor.</li>
</ul>

<p><b>De los alimentos y bebidas:</b></p>
<ul>
<li>Puedes mantener en tu lugar bebidas (Agua, cafÃ© o refresco) solo en envase de taparosca y termos del mismo tipo.</li>
</ul>
<ul>
<li><b><u>Se prohÃ­be estrictamente consumir cualquier tipo de alimento en tu Ã¡rea de trabajo</u></b></li>
</ul>
<ul>
<li>El consumo de este tipo de alimentos solo se podrÃ¡ hacer en el Ã¡rea destinada para ello, cocineta 4to piso, o el lugar que a futuro se designe</li>
</ul>

<ul>
<li>En las Ã¡reas de descanso estÃ¡ prohibido realizar reuniones ruidosas que interfieran la operaciÃ³n telefÃ³nica.</li>
</ul>

<ul>
<li>EstÃ¡ prohibido fumar dentro del Edificio incluyendo, comedor, elevadores baÃ±os, pasillos, y zonas comunes del edificio.</li>
</ul>

<ul>
<li>Queda prohibido la compra-venta o cobranza de cualquier tipo de producto dentro de las instalaciones.</li>
</ul>

<p><b>Del cÃ³digo de vestimenta y otros puntos de Recursos Humanos.</b></p>
<ul>
<li><b>Hombres:</b> cabello corto, no pintado de colores extraÃ±os (no peinados estrafalarios), <b>los tenis solo se permiten los dÃ­as SÃ¡bados y Domingos</b> los Pants, gorras, shorts, aretes en cualquier parte visible del cuerpo, incluyendo la lengua, no se permiten ningÃºn dÃ­a de la semana.</li>
</ul>
<ul>
<li>Mujeres: <b>los tenis solo se permiten los dÃ­as SÃ¡bados y Domingos</b> los Pants, gorras, shorts, telas transparentes, blusas ombligueras, piercings en cualquier parte visible del cuerpo, incluyendo la lengua, no se permiten ningÃºn dÃ­a de la semana.</li>
</ul>
<ul>
<li>DeberÃ¡n identificarte con el gafete de la empresa al momento e ingresar al edificio y portarlo en lugar visible durante todo el tiempo que permanezcas dentro del edificio.</li>
</ul>
<ul>
<li>No existe faltas justificadas, lo que tenemos son permisos sin goce, lo cuales se otorgan por algÃºn asunto extraordinario comprobable y deben de solicitarse a tu supervisor o Gerente en el caso de asuntos escolares deberÃ¡ de comprobarse con un documento membretado, firmado, sellado y que incluya telÃ©fonos. Si existe algÃºn evento de emergencia, se someterÃ¡ a evaluaciÃ³n.</li>
</ul>

<ul>
<li><b>SIN EXCEPCION ALGUNA, las faltas por INCAPACIDADES DEL SEGURO SOCIAL son las Ãºnicas justificables, no aplican recetas o incapacidades de mÃ©dicos particulares, ni recetas expedidas por el IMSS.</b></li>
</ul>

<p><b> De la UtilizaciÃ³n de equipos, sistemas e inmobiliario del Centro de Contactos.</b></p>

<ul>
<li>Una vez entregadas las contraseÃ±as de acceso al sistema de operaciÃ³n es tu responsabilidad cambiar la contraseÃ±a y memorizarla, con la finalidad de evitar en la estaciÃ³n de trabajo el uso de plumas. LÃ¡piz o cualquier otro medio de almacenamiento en los cuales se encuentre tu contraseÃ±a registrada.</li>
</ul>

<ul>
<li>Es tu responsabilidad, el buen uso de la diadema, o telÃ©fono y equipo de cÃ³mputo, mobiliario como sillas, mamparas y demÃ¡s equipo necesario para la realizaciÃ³n de tus actividades.</li>
</ul>

<ul>
<li>Es responsabilidad del Asesor la correcta utilizaciÃ³n de los auxiliares asignados para la mediciÃ³n de sus tiempos en el caso que trabaje con predictivo.</li>
</ul>

<ul>
<li><b>Queda prohibido el acceso a Internet desde cualquier PC o estar jugando con los diferentes programas asÃ­ como cargar cualquier tipo de paqueterÃ­a en la computadora, de acuerdo a lo establecido en la carta responsiva de confidencialidad y uso de equipos que firmaste al ingresar.</b></li>
</ul>

<ul>
<li>Todos los equipos deben de mantener el fondo y protector de pantalla autorizada por la Empresa y por ningÃºn motivo deben de cambiarse.</li>
</ul>

<ul>
<li>Se prohÃ­be realizar llamadas personales desde tu equipo telefÃ³nico, solo podrÃ¡s utilizar el telÃ©fono del supervisor con previa autorizaciÃ³n.</li>
</ul>

<p><b>De las tareas y actividades del Asesor</b></p>

<ul>
<li>El Asesor no podrÃ¡ levantarse de su lugar a menos que el supervisor lo solicite para darle retroalimentaciÃ³n o bajar alguna informaciÃ³n o en su defecto tenga que ir al baÃ±o, comida o su hora de salida debiendo de hacerlo de manera rÃ¡pida y ordenada (evitar saludos y despedidas prolongadas en el piso).</li>
</ul>

<ul>
<li>Queda prohibido levantarse para solicitar apoyo en algÃºn proceso de gestiÃ³n, deberÃ¡ levantar la mano para que el supervisor acuda a su lugar.</li>
</ul>

<ul>
<li>Queda prohibido salir de las instalaciones dentro de su jornada, solo podrÃ¡ salir cuando le toque su comida y en casos excepcionales podrÃ¡ hacerlo previa autorizaciÃ³n del Supervisor, Coordinador, Gerente o del Ã¡rea de Recursos Humanos.</li>
</ul>

<ul>
<li>Por cuestiones de seguridad, no se permite permanecer sobre la Calz. de Tlalpan en ningÃºn momento. </li>
</ul>

<p><b>De los operativos y fines de semana</b></p>

<ul>
<li>Cuando se realicen operativos nocturnos o los asesores que laboran los fines de semana y / o dÃ­as de asueto estarÃ¡n bajo la responsabilidad del supervisor en turno designado, por lo tanto deberÃ¡n atender las indicaciones del mismo.</li>
</ul>

<p align="center"><b>RECORDEMOS QUE SOMOS UNA COMPAÃ‘IA DE SERVICIO Y ATENCION AL <br>CLIENTE<br> Y LA IMAGEN DE LA EMPRESA DEPENDE DE NOSOTROS.</b></p>

<p align="center"><b>Atentamente,</b></p>

<p align="center"><b>DirecciÃ³n de Operaciones</b></p>
</div>
<div style="page-break-after: always;">
<table border="1" cellspacing="0" cellpadding="0" > 
<tbody>
<tr>


<td align="center" ><p><i><u>CARTA RESPONSIVA DE CONFIDENCIALIDAD</u></i></p>

<p><i><u>DE INFORMACION Y USO DE EQUIPOS</u></i></p>

<p><i><u>CA-RES-RH-00</u></i></p></td>
</tr>

</tbody>
</table>

<p>En la presente se enuncian las directivas de uso y manejo de Software, Hardware, clave de acceso telefÃ³nico e informaciÃ³n de los clientes, que derivada de la operaciÃ³n se consideran de carÃ¡cter confidencial. Quedando en conformidad y haciendo del conocimiento estas clÃ¡usulas de uso u manejo de los equipos y todo lo relacionado con ello a los usuarios.</p>

<p>Durante el perÃ­odo que permanezca laborando en $empresa el empleado deberÃ¡ observar las siguientes indicaciones:</p>

<p>1. El equipo esta acondicionado de manera que todas y cada una de sus partes funciona correctamente al igual que estÃ¡ sujeto a un control de mantenimiento y se considera que cualquiera de los componentes estÃ¡ sujeto a un mal funcionamiento causado por el tÃ©rmino del periodo de vida Ãºtil de trabajo: se hace notar que cualquier averÃ­a o desperfecto causado por un uso inadecuado, serÃ¡ responsabilidad de la persona que estÃ© operando bajo estas condiciones de mal uso.</p>

<p>2. Cuando el equipo sufra algÃºn tipo de falla en cualquiera de sus partes fÃ­sicas monitor, teclado, ratÃ³n, y otros dispositivos conectados a la computadora, o en el software contenido, se deberÃ¡ de notificar al personal autorizado con el fin de proceder de forma inmediata. De manera que queda prohibido al usuario intentar reparar cualquier desperfecto del equipo.</p>

<p>3. AdemÃ¡s de las partes fÃ­sicas del equipo mencionadas en el punto anterior, el contenido de programas, aplicaciones e informaciÃ³n contenida como bases de datos y/o documentos son propiedad de $empresa , por lo cual queda prohibido extraer informaciÃ³n y datos de cualquier Ã­ndole y por cualquier medio sin previa autorizaciÃ³n por parte de la empresa, esto obliga al usuario a que, para poder imprimir y/o utilizar las unidades de disquete y unidades de CD, deberÃ¡ obtener la autorizaciÃ³n previa de la empresa, ademÃ¡s de que todas las operaciones de extracciÃ³n e inclusiÃ³n de datos a la computadora por todos los medios posibles serÃ¡n Ãºnicamente cuando la actividad que se realice asÃ­ lo requiera y con la autorizaciÃ³n mencionada.</p>

<p>4. En el caso de la informaciÃ³n que se conozca, en relaciÃ³n a los usuarios de servicios de nuestros clientes como son, Numero de Cuenta, Saldos, Domicilios, Solvencia Moral y EconÃ³mica, asÃ­ como cualquier otra que, derivado de las diferentes gestiones, se llegaran a conocer y que se consideran de carÃ¡cter confidencial, se utilizarÃ¡n Ãºnica y exclusivamente para los fines de las actividades que se realicen en $empresa</p>

<p>5. El equipo de computo tiene instalado y configurado los paquetes y las aplicaciones suficientes para el desempeÃ±o de las labores que la empresa requiere, por lo cual queda prohibido para el usuario, modificar y/o instalar cualquier tipo de programas, aplicaciÃ³n o informaciÃ³n ajena a la actividad laboral , (mÃºsica, juegos, protectores de pantalla, imÃ¡genes y/o documentos ajenos a la empresa); de ser necesario incluir algÃºn programa o aplicaciÃ³n al contenido de la computadora que se requiera para el desempeÃ±o de labores propias del trabajo, se deberÃ¡ acudir al personal autorizado, quedando reservado para la empresa y el personal autorizado el derecho de modificaciÃ³n, instalaciÃ³n, desinstalaciÃ³n y configuraciÃ³n de programas y cualquier contenido de todos y cada uno de los equipos propiedad de la empresa.</p>

<p>6. AsÃ­ mismo el usuario se hace responsable del uso que se le dÃ© a las claves de:</p>
<ul>
<li>Acceso para llamadas telefÃ³nicas locales y de larga distancia</li>
</ul>
<ul>
<li>Clave de ingreso a la red</li>
</ul>
<ul>
<li>Clave de acceso al Sistema Interno de Cobranza GESCOB</li>
</ul>
<p>Que se le asignarÃ¡n para sus actividades y que se identifican al final de la presente, y estÃ¡ consciente de que las mismas son Ãºnica y exclusivamente para uso de las tareas que la Cartera _________________________________ le encomiende, haciÃ©ndose responsable del uso que se le pueda dar a las mismas y autoriza a la empresa que en el caso de hacer mal uso de ellas se harÃ¡ acreedor a la sanciÃ³n que corresponda.</p>

<p>Clave de acceso telefÃ³nico xxxxxxxxxx</p>

<p>Clave de ingreso a la red xxxxxxxxxx</p>

<p>Clave de acceso al Sistema Interno de Cobranza GESCOB xxxxxxxxxx</p>

<p>El incumplimiento parcial o total de alguna de las directivas antes mencionadas por mi parte, ocasionarÃ¡ una sanciÃ³n que serÃ¡ determinada por la empresa que irÃ¡ de acuerdo a la gravedad y trascendencia de la misma, las cuales pueden ir desde un acta administrativa, hasta la sanciones legales que puedan aplicar. </p>
<p></p>
<p></p>
<p align="center">_____________________________________________<br>

<b>$paterno $materno $nombre<br>Acepto los lineamientos que aquÃ­ se describen</b></p>
</div>
<div style="page-break-after: always;">
<p align="center"><b>CARTA DE CONFIDENCIALIDAD DE LA INFORMACIÃ“N <br>Y RESPONSIVA EN LA GESTIÃ“N DEL PROCESO DE COBRANZA.</b></p>
<p></p>
<p></p>
<p align="rigth">MÃ©xico, D.F. a _____ de _____________________ del _______.</p>
<p></p>

<p>EL SUSCRITO presta sus servicios para <b>$empresa</b>, con la categorÃ­a de _____________________________________, consistiendo mi actividad en realizar gestiones de cobranza, por lo que me obligo a guardar en absoluta confidencialidad y a no divulgar a terceros, ni utilizar en beneficio propio, todos aquellos datos, informes, nombres, domicilios, nÃºmeros de cuenta, saldos, quitas, polÃ­ticas, procedimientos, instrucciones y en general cualquier diseÃ±o, arancel, dibujo, software, data prototipos, planes de negocios, anÃ¡lisis de mercado o cualquier otra informaciÃ³n tÃ©cnica o de negocios, que tenga conocimiento con motivo de mi trabajo, respecto de la relaciÃ³n contractual con los clientes de la empresa para quien presto mis servicios. InformaciÃ³n que no podrÃ© copiar, reproducir, ni revelar en forma alguna y que utilizarÃ© exclusivamente durante el desempeÃ±o de mis servicios. HaciÃ©ndome responsable de los daÃ±os y perjuicios causados a la empresa o a los clientes de Ã©sta, por la divulgaciÃ³n de la informaciÃ³n a terceras personas obligÃ¡ndome a devolver toda la informaciÃ³n que hubiese obtenido con motivo de la relaciÃ³n contractual.</p>

<p>En caso de que EL SUSCRITO falte a la confidencialidad, serÃ¡ responsable de los daÃ±os y perjuicios que pudiera causarle a la empresa o a sus clientes con motivo de mi indiscreciÃ³n e infidelidad con la informaciÃ³n de la que tenga conocimiento. Independientemente de las acciones penales, mercantiles, administrativas y civiles a que se haga acreedor derivadas del incumplimiento</p>

<p>Asimismo el que suscribe conoce y estÃ¡ obligado a desarrollar su trabajo, conforme al CÃ³digo de Ã‰tica que regula el proceso de cobranza. Asimismo, se me ha capacitado y conozco lo establecido por el artÃ­culo 209 Bis del CÃ³digo Penal para el Distrito Federal que tipifica como delito: "Al que con la intenciÃ³n de requerir el pago de una deuda, ya sea propia del deudor o de quien funge como referente o aval, utilice medios ilÃ­citos, efectuÃ© actos de hostigamiento e intimidaciÃ³n, se le impondrÃ¡ prisiÃ³n de 6 meses a 2 aÃ±os y una multa de 150 a 300 dÃ­as de salario mÃ­nimo. AsÃ­ como las sanciones que correspondan si para tal efecto se emplearan documentaciÃ³n, sellos falsos o se usurparan funciones pÃºblicas o de profesiÃ³n, mientras que para lo dispuesto de reparaciÃ³n del daÃ±o cometido, se estarÃ¡ en lo dispuesto en el propio CÃ³digo Penal."</p>

<p>Por ello, me hago responsable de mis acciones llevadas a cabo en el proceso de cobranza que se aparten del cÃ³digo de Ã©tica, de las buenas prÃ¡cticas profesionales y del respeto a la dignidad del deudor y, en su caso, me harÃ© acreedor de las sanciones a que se refiere la citada disposiciÃ³n legal. </p>

<p>Por su parte la empresa mencionada asumirÃ¡ la responsabilidad que le corresponda, en el supuesto de que el empleado realice una cobranza ilegal y tipifique el supuesto a que se refiere la mencionada disposiciÃ³n legal, excepto que demuestre que el operario fue capacitado. </p>

<p align="center">__________________________________________________<br>$paterno $materno $nombre</b></p>
</div>
<div style="page-break-after: always;">
<p align="center"><u><h1>$empresa</h1>
<h3>RFC SMA-110405-V2A</h3></u></p>
<p></p>
<p></p>
<p><h2 align="center">CARTA RESPONSIVA</h2></p>
<p></p>
<p align="rigth">MÃ©xico, D.F. a _____ de _____________________ del _______.</p>
<p></p>
<p>Mediante la presente yo hago constar que la informaciÃ³n proporcionada a $empresa en mi solicitud de empleo es verÃ­dica incluyendo la de NO TENER ADEUDOS con alguna InstituciÃ³n Bancaria o Financiera.</p>

<p>Enterado y de conformidad que al encontrarse alguna falsedad u omisiÃ³n en la informaciÃ³n proporcionada serÃ© acreedor a la sanciÃ³n que la empresa considere de acuerdo a la gravedad del asunto.</p>
<p></p>
<p></p>
<p align="center">Atentamente</p>

<p align="center">_____________________________________________<br>

<b>$paterno $materno $nombre</b></p>
</div>
<div>
<p>$empresa</p>

<p>Por la presente, hago constar que con esta fecha y por convenir asÃ­ a mis intereses, renuncio en forma espontÃ¡nea y voluntaria al puesto que desempeÃ±Ã© para esa empresa hasta el dÃ­a de hoy en que doy por terminado de mutuo acuerdo el contrato o relaciÃ³n de trabajo que existiÃ³ con ustedes, con fundamento en la fracciÃ³n I del artÃ­culo 53 de la Ley Federal del Trabajo.</p>

<p>Asimismo, le manifiesto que hasta la fecha, siempre he recibido el pago puntual y oportuno de todas las prestaciones a las que he tenido derecho, no adeudÃ¡ndoseme cantidad alguna por concepto de salarios devengados, tiempo extraordinario, vacaciones, premios, comisiones, bonos, incentivos, sÃ©ptimos dÃ­as y los de descanso obligatorio, ni por ningÃºn otro concepto que se derive de mi contrato individual de trabajo previstas por la propia Ley Federal del Trabajo.</p>

<p>TambiÃ©n hago constar que la empresa aportÃ³ las cuotas correspondientes al INFONAVIT, no haber sufrido accidente o enfermedad de carÃ¡cter profesional o de trabajo, estando siempre inscrito ante el Instituto Mexicano del Seguro Social.</p>

<p>Por lo tanto otorgo a la empresa $empresa, el mÃ¡s amplio finiquito que en derecho sea procedente y aprovecho la oportunidad para agradecer las atenciones que hasta el dÃ­a de hoy tuvieron para conmigo.</p>
<p></p>
<p align="center">Atentamente</p>

<p align="center">_____________________________________________<br>

<b>$paterno $materno $nombre</b></p>
</div>

EOD;
		
		// Print text using writeHTMLCell()
		$pdf->writeHTMLCell ( 0, 0, '', '', $html, 0, 1, 0, true, '', true );
		
		// ---------------------------------------------------------
		
		// Close and output PDF document
		// This method has several options, check the source code documentation for more information.
		
		// ---------------------------------------------------------
		
		ob_clean ();
		
		$pdf->Output ( 'Contrato.pdf', 'I' );
	}
	function arbol() {
		$menu = new RecursoshumanosModel ();
		$menu_array = $menu->menu_array ();
		echo $menu->show_menu_array ( $menu_array );
	}
	
	function num_to_letras($numero, $moneda = 'PESO', $subfijo = 'M.N.')
{
    $xarray = array(
        0 => 'Cero'
        , 1 => 'UN', 'DOS', 'TRES', 'CUATRO', 'CINCO', 'SEIS', 'SIETE', 'OCHO', 'NUEVE'
        , 'DIEZ', 'ONCE', 'DOCE', 'TRECE', 'CATORCE', 'QUINCE', 'DIECISEIS', 'DIECISIETE', 'DIECIOCHO', 'DIECINUEVE'
        , 'VEINTI', 30 => 'TREINTA', 40 => 'CUARENTA', 50 => 'CINCUENTA'
        , 60 => 'SESENTA', 70 => 'SETENTA', 80 => 'OCHENTA', 90 => 'NOVENTA'
        , 100 => 'CIENTO', 200 => 'DOSCIENTOS', 300 => 'TRESCIENTOS', 400 => 'CUATROCIENTOS', 500 => 'QUINIENTOS'
        , 600 => 'SEISCIENTOS', 700 => 'SETECIENTOS', 800 => 'OCHOCIENTOS', 900 => 'NOVECIENTOS'
    );
 
    $numero = trim($numero);
    $xpos_punto = strpos($numero, '.');
    $xaux_int = $numero;
    $xdecimales = '00';
    if (!($xpos_punto === false)) {
        if ($xpos_punto == 0) {
            $numero = '0' . $numero;
            $xpos_punto = strpos($numero, '.');
        }
        $xaux_int = substr($numero, 0, $xpos_punto); // obtengo el entero de la cifra a covertir
        $xdecimales = substr($numero . '00', $xpos_punto + 1, 2); // obtengo los valores decimales
    }
 
    $XAUX = str_pad($xaux_int, 18, ' ', STR_PAD_LEFT); // ajusto la longitud de la cifra, para que sea divisible por centenas de miles (grupos de 6)
    $xcadena = '';
    for ($xz = 0; $xz < 3; $xz++) {
        $xaux = substr($XAUX, $xz * 6, 6);
        $xi = 0;
        $xlimite = 6; // inicializo el contador de centenas xi y establezco el límite a 6 dígitos en la parte entera
        $xexit = true; // bandera para controlar el ciclo del While
        while ($xexit) {
            if ($xi == $xlimite) { // si ya llegó al límite máximo de enteros
                break; // termina el ciclo
            }
 
            $x3digitos = ($xlimite - $xi) * -1; // comienzo con los tres primeros digitos de la cifra, comenzando por la izquierda
            $xaux = substr($xaux, $x3digitos, abs($x3digitos)); // obtengo la centena (los tres dígitos)
            for ($xy = 1; $xy < 4; $xy++) { // ciclo para revisar centenas, decenas y unidades, en ese orden
                switch ($xy) {
                    case 1: // checa las centenas
                        $key = (int) substr($xaux, 0, 3);
                        if (100 > $key) { // si el grupo de tres dígitos es menor a una centena ( < 99) no hace nada y pasa a revisar las decenas
                            /* do nothing */
                        } else {
                            if (TRUE === array_key_exists($key, $xarray)) {  // busco si la centena es número redondo (100, 200, 300, 400, etc..)
                                $xseek = $xarray[$key];
                                $xsub = $this->subfijo($xaux); // devuelve el subfijo correspondiente (Millón, Millones, Mil o nada)
                                if (100 == $key) {
                                    $xcadena = ' ' . $xcadena . ' CIEN ' . $xsub;
                                } else {
                                    $xcadena = ' ' . $xcadena . ' ' . $xseek . ' ' . $xsub;
                                }
                                $xy = 3; // la centena fue redonda, entonces termino el ciclo del for y ya no reviso decenas ni unidades
                            } else { // entra aquí si la centena no fue numero redondo (101, 253, 120, 980, etc.)
                                $key = (int) substr($xaux, 0, 1) * 100;
                                $xseek = $xarray[$key]; // toma el primer caracter de la centena y lo multiplica por cien y lo busca en el arreglo (para que busque 100,200,300, etc)
                                $xcadena = ' ' . $xcadena . ' ' . $xseek;
                            } // ENDIF ($xseek)
                        } // ENDIF (substr($xaux, 0, 3) < 100)
                        break;
                    case 2: // checa las decenas (con la misma lógica que las centenas)
                        $key = (int) substr($xaux, 1, 2);
                        if (10 > $key) {
                            /* do nothing */
                        } else {
                            if (TRUE === array_key_exists($key, $xarray)) {
                                $xseek = $xarray[$key];
                                $xsub = $this->subfijo($xaux);
                                if (20 == $key) {
                                    $xcadena = ' ' . $xcadena . ' VEINTE ' . $xsub;
                                } else {
                                    $xcadena = ' ' . $xcadena . ' ' . $xseek . ' ' . $xsub;
                                }
                                $xy = 3;
                            } else {
                                $key = (int) substr($xaux, 1, 1) * 10;
                                $xseek = $xarray[$key];
                                if (20 == $key)
                                    $xcadena = ' ' . $xcadena . ' ' . $xseek;
                                else
                                    $xcadena = ' ' . $xcadena . ' ' . $xseek . ' Y ';
                            } // ENDIF ($xseek)
                        } // ENDIF (substr($xaux, 1, 2) < 10)
                        break;
                    case 3: // checa las unidades
                        $key = (int) substr($xaux, 2, 1);
                        if (1 > $key) { // si la unidad es cero, ya no hace nada
                            /* do nothing */
                        } else {
                            $xseek = $xarray[$key]; // obtengo directamente el valor de la unidad (del uno al nueve)
                            $xsub = $this->subfijo($xaux);
                            $xcadena = ' ' . $xcadena . ' ' . $xseek . ' ' . $xsub;
                        } // ENDIF (substr($xaux, 2, 1) < 1)
                        break;
                } // END SWITCH
            } // END FOR
            $xi = $xi + 3;
        } // ENDDO
        # si la cadena obtenida termina en MILLON o BILLON, entonces le agrega al final la conjuncion DE
        if ('ILLON' == substr(trim($xcadena), -5, 5)) {
            $xcadena.= ' DE';
        }
 
        # si la cadena obtenida en MILLONES o BILLONES, entonces le agrega al final la conjuncion DE
        if ('ILLONES' == substr(trim($xcadena), -7, 7)) {
            $xcadena.= ' DE';
        }
 
        # depurar leyendas finales
        if ('' != trim($xaux)) {
            switch ($xz) {
                case 0:
                    if ('1' == trim(substr($XAUX, $xz * 6, 6))) {
                        $xcadena.= 'UN BILLON ';
                    } else {
                        $xcadena.= ' BILLONES ';
                    }
                    break;
                case 1:
                    if ('1' == trim(substr($XAUX, $xz * 6, 6))) {
                        $xcadena.= 'UN MILLON ';
                    } else {
                        $xcadena.= ' MILLONES ';
                    }
                    break;
                case 2:
                    if (1 > $numero) {
                        $xcadena = "CERO {$moneda}S {$xdecimales}/100 {$subfijo}";
                    }
                    if ($numero >= 1 && $numero < 2) {
                        $xcadena = "UN {$moneda} {$xdecimales}/100 {$subfijo}";
                    }
                    if ($numero >= 2) {
                        $xcadena.= " {$moneda}S {$xdecimales}/100 {$subfijo}"; //
                    }
                    break;
            } // endswitch ($xz)
        } // ENDIF (trim($xaux) != "")
 
        $xcadena = str_replace('VEINTI ', 'VEINTI', $xcadena); // quito el espacio para el VEINTI, para que quede: VEINTICUATRO, VEINTIUN, VEINTIDOS, etc
        $xcadena = str_replace('  ', ' ', $xcadena); // quito espacios dobles
        $xcadena = str_replace('UN UN', 'UN', $xcadena); // quito la duplicidad
        $xcadena = str_replace('  ', ' ', $xcadena); // quito espacios dobles
        $xcadena = str_replace('BILLON DE MILLONES', 'BILLON DE', $xcadena); // corrigo la leyenda
        $xcadena = str_replace('BILLONES DE MILLONES', 'BILLONES DE', $xcadena); // corrigo la leyenda
        $xcadena = str_replace('DE UN', 'UN', $xcadena); // corrigo la leyenda
    } // ENDFOR ($xz)
    return trim($xcadena);
}
 
/**
 * Esta función regresa un subfijo para la cifra
 * 
 * @author Ultiminio Ramos Galán <contacto@ultiminioramos.com>
 * @param string $cifras La cifra a medir su longitud
 */
function subfijo($cifras)
{
    $cifras = trim($cifras);
    $strlen = strlen($cifras);
    $_sub = '';
    if (4 <= $strlen && 6 >= $strlen) {
        $_sub = 'MIL';
    }
 
    return $_sub;
}

function bisiesto($anio_actual){
	$bisiesto=false;
	//probamos si el mes de febrero del a�o actual tiene 29 d�as
	if (checkdate(2,29,$anio_actual))
	{
		$bisiesto=true;
	}
	return $bisiesto;
}
}
