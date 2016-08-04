<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require_once(APPPATH.'libraries/Sanitize.php');
require(APPPATH.'libraries/UploadHandler.php');


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
	//	print_r( $sessionUser );
		
		$movimientosCandidatosRH = $this->RecursoshumanosModel->obtenerMovimientosCandidatos();
		
		
		$dataContent = array(
				"isRRHH" => $isRRHH,
				"accionesRRHH" => $accionesRRHH,
				"entrevistasRealizar" => $entrevistasRealizar,
				"entrevistasRealizarSegundaParte" => $entrevistasRealizarSegundaParte,
				"movimientos" => $movimientosCandidatosRH
		);

		
		//print_r($movimientosCandidatosRH);
		
		$this->load->view('includes/header' , $dataHeader);
		$this->load->view('eaf/recursoshumanos/index' , $dataContent);
		$this->load->view('includes/footer');

	}

	public function candidato(){
		$dataHeader = array(
				"titulo" => "FDP Candidato"
		);
		$idCandidatoFDP = $this->Sanitize->clean_string($_REQUEST["idCandidatoFDP"]);

		//if( $idCandidatoFDP == "" ):
		//redirect("panel");
		//endif;

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
		redirect("eaf/RecursosHumanos/candidato_rh/?idCandidatoFDP=".$idCandidatoFDP."&registroRH=1");
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

//print_r($peticionesVacantes);

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
		$catDepartamentos=$this->RecursoshumanosModel->obtenerDepartamentos();
		$candidatoFDP = $this->RecursoshumanosModel->obtenerCandidatoFDP($idCandidatoFDP);
		$Plazas = $this->RecursoshumanosModel->obtenerPlazas();
		$Oficinas = $this->RecursoshumanosModel->obtenerOficinas();
		$Sueldos = $this->RecursoshumanosModel->obtenerSueldos();

		//if( empty( $candidatoFDP ) || $candidatoFDP["idVacantesPeticiones"] == 0 ||  $candidatoFDP["idReclutamientoFDP"] == 0 ||  $candidatoFDP["idUsuariosAprobacionGerente"] == 0):
		//redirect("panel");
		//endif;


		$idCandidato = array();
		$idCandidato['idCandidatoFDP'] = $idCandidatoFDP;
		
		
		
		$this->SessionL->validarSesion();
		
		
		$error_campos = array();
		$error_campos[] = "nombre_candidato";
		$error_campos[] = "apellido_paterno_candidato";
		$error_campos[] = "apellido_materno_candidato";
		$error_campos[] = "gerente_autoriza";
		$error_campos[] = "empresa_contrata";
		$error_campos[] = "corporativo";
		$error_campos[] = "oficina";
		$error_campos[] = "plaza";
		$error_campos[] = "fechaIngreso";
		$error_campos[] = "sueldoNOI";
		$error_campos[] = "puesto";
		$error_campos[] = "descripcionDepartamento";
		$error_campos[] = "turno";
		$error_campos[] = "descanso";
		
		
		

				
		$dataContent["formArray"] = (!empty($resultado))?($resultado):"";

		$dataContent["error_campos"] = $error_campos;
		$dataContent["idCandidatoFDP"] = $idCandidato;
		$dataContent["formArrayCandidato"] = $candidatoFDP;
		$dataContent["catalogos"] = new Catalogos();
		$dataContent["Empresas"] = $catEmpresas;
		$dataContent["Departamentos"] = $catDepartamentos;
		$dataContent["Plazas"] = $Plazas;
		$dataContent["Oficinas"] = $Oficinas;
		$dataContent["Sueldos"] = $Sueldos;

			//echo "<pre>";print_r($error_campos);
		//echo "<pre>";print_r($dataContent);
		//echo "<pre>";print_r($resultado);
		//	echo "<pre>";print_r($formArray);

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
	
	
	public function SolicitarCuentaBancaria(){
	
		$id = $this->input->post('id');
		
		$SolicitarCuenta = $this->RecursoshumanosModel->solicitarCuenta($id);
		
		if ($SolicitarCuenta)
			
		{
			?>
			
			<label style="font-weight: bold; text-align: center;font-size: 13pt; color: #00db05">Solicitud enviada correctamente</label>
			
			<?php 
			
		}
		else
		{
			?>
			<label>Error, intentelo nuevamente</label>
			
			<?php 
			
		}
		
	}
	
	
	
	
	
	public function GuardarUsuario(){




      
	
		$dataHeader = array(
				"titulo" => "Alta de Usuario"
		);
	
		
	
		$idCandidatoFDP=$this->Sanitize->clean_string($_POST["idCandidato"]);
		$catEmpresas=$this->RecursoshumanosModel->obtenerEmpresas();
		$catDepartamentos=$this->RecursoshumanosModel->obtenerDepartamentos();
		$candidatoFDP = $this->RecursoshumanosModel->obtenerCandidatoFDP($idCandidatoFDP);
	
		//if( empty( $candidatoFDP ) || $candidatoFDP["idVacantesPeticiones"] == 0 ||  $candidatoFDP["idReclutamientoFDP"] == 0 ||  $candidatoFDP["idUsuariosAprobacionGerente"] == 0):
		//redirect("panel");
		//endif;
	
	
		$this->SessionL->validarSesion();
		
		
		$resultado = array(
				"step_current" => $this->Sanitize->clean_string($_POST["step_current"]),
				"btn_fire" => $this->Sanitize->clean_string($_POST["btn_fire"]),
				"estatus" => "Activo",
				"nombre_candidato" => $this->Sanitize->clean_string($_POST["nombre_candidato"]),
				"apellido_paterno_candidato" => $this->Sanitize->clean_string($_POST["apellido_paterno_candidato"]),
				"apellido_materno_candidato" => $this->Sanitize->clean_string($_POST["apellido_materno_candidato"]),
				"fechaIngreso" => $_POST["fechaIngreso"],
				"gerente_autoriza" => $this->Sanitize->clean_string($_POST["gerente_autoriza"]),
				"empresa_contrata" => $this->Sanitize->clean_string($_POST["empresa_contrata"]),
				"corporativo" => $this->Sanitize->clean_string($_POST["corporativo"]),
				"pagoExterno" => $this->Sanitize->clean_string($_POST["pagoExterno"]),
				"oficina" => $this->Sanitize->clean_string($_POST["oficina"]),
				"plaza" => $this->Sanitize->clean_string($_POST["plaza"]),
				"sueldoNOI" => $this->Sanitize->clean_string($_POST["sueldoNOI"]),
				"puesto" => $this->Sanitize->clean_string($_POST["puesto"]),
				"descripcionDepartamento" => $this->Sanitize->clean_string($_POST["descripcionDepartamento"]),
				"turno" => $this->Sanitize->clean_string($_POST["turno"]),
				"descanso" => $this->Sanitize->clean_string($_POST["descanso"]),
				"cuentaNomina" => $this->Sanitize->clean_string($_POST["cuentaNomina"]),
				"clabeInterbancaria" => $this->Sanitize->clean_string($_POST["clabeInterbancaria"]),
				"email" => $_POST["email"],
				"rfc" => $this->Sanitize->clean_string($_POST["rfc"]),
				"curp" => $this->Sanitize->clean_string($_POST["curp"]),
				"carta_curp" => $_POST["carta_curp"],
				"actanacimiento" => $_POST["actanacimiento"],
				"comprobantedomicilio" => $_POST["comprobantedomicilio"],
				"carta_rfc" => $_POST["carta_rfc"],
				"imss" => $_POST["imss"],
				"antecedentespenales" => $_POST["antecedentespenales"],
				"burocredito" => $_POST["burocredito"],
				"identificacionoficial" => $_POST["identificacionoficial"],
				"comprobanteEstudios" => $_POST["comprobanteEstudios"],
				"tokenVacante" => $_POST["token"],
                "idPadre" => $_POST["idPadre"],
				"banco" => $_POST["banco"],
				"fotoCandidato" => $_POST["fotoCandidato"],
		
		
		);
		
	



$token = $this->input->post('token');

$ValidarToken = $this->RecursoshumanosModel->ValidarToken($token);


if($ValidarToken)
{
	
	$dataContent["registro"] = "yaregistrado";
	$dataContent["formArray"] = $formArray;
}
else
{

$fechaRegistro = date('Y-m-d H:i:s');
$nombre=$resultado['apellido_paterno_candidato']." ".$resultado['apellido_materno_candidato']." ".$resultado['nombre_candidato'];

$sqlInsertCandidato = "INSERT INTO Usuarios (
				nombreUsuario,
				correoUsuario,
				contraseniaUsuario,
				estatusUsuario,
				fechaRegistro,
				RFC
				) VALUES (
				'".$nombre."',
						'".$resultado['email']."',
								md5('2016'),
								'Activo',
								'".$fechaRegistro."',
										'".$resultado['rfc']."');";
	
	
	
	
$insertCandidao = $this->db->query($sqlInsertCandidato);

$candidatoInsertID = $this->db->insert_id();








if( file_exists(FCPATH.'tempFDP/files/'.$resultado["carta_curp"]) ):
if( rename( FCPATH.'tempFDP/files/'.$resultado["carta_curp"] , FCPATH.'documentosUsuarios/'.$resultado["carta_curp"])):
$sqlInsertArchivo = 'INSERT INTO DocumentosUsuarios (idUsuarios , nombreDocumento , prefijoDocumento) VALUES( '.$candidatoInsertID.' , \''.$resultado["carta_curp"].'\' , \'carta_curp\');';
$this->db->query( $sqlInsertArchivo );
unlink( FCPATH.'tempFDP/files/'.$resultado["carta_curp"] );
unlink( FCPATH.'tempFDP/files/thumbnail/'.$resultado["carta_curp"] );
endif;
endif;

if( file_exists(FCPATH.'tempFDP/files/'.$resultado["actanacimiento"]) ):
if( rename( FCPATH.'tempFDP/files/'.$resultado["actanacimiento"] , FCPATH.'documentosUsuarios/'.$resultado["actanacimiento"])):
$sqlInsertArchivo = 'INSERT INTO DocumentosUsuarios (idUsuarios , nombreDocumento , prefijoDocumento) VALUES( '.$candidatoInsertID.' , \''.$resultado["actanacimiento"].'\' , \'actanacimiento\');';
$this->db->query( $sqlInsertArchivo );
unlink( FCPATH.'tempFDP/files/'.$resultado["actanacimiento"] );
unlink( FCPATH.'tempFDP/files/thumbnail/'.$resultado["actanacimiento"] );
endif;
endif;

if( file_exists(FCPATH.'tempFDP/files/'.$resultado["comprobantedomicilio"]) ):
if( rename( FCPATH.'tempFDP/files/'.$resultado["comprobantedomicilio"] , FCPATH.'documentosUsuarios/'.$resultado["comprobantedomicilio"])):
$sqlInsertArchivo = 'INSERT INTO DocumentosUsuarios (idUsuarios , nombreDocumento , prefijoDocumento) VALUES( '.$candidatoInsertID.' , \''.$resultado["comprobantedomicilio"].'\' , \'comprobantedomicilio\');';
$this->db->query( $sqlInsertArchivo );
unlink( FCPATH.'tempFDP/files/'.$resultado["comprobantedomicilio"] );
unlink( FCPATH.'tempFDP/files/thumbnail/'.$resultado["comprobantedomicilio"] );
endif;
endif;

if( file_exists(FCPATH.'tempFDP/files/'.$resultado["carta_rfc"]) ):
if( rename( FCPATH.'tempFDP/files/'.$resultado["carta_rfc"] , FCPATH.'documentosUsuarios/'.$resultado["carta_rfc"])):
$sqlInsertArchivo = 'INSERT INTO DocumentosUsuarios (idUsuarios , nombreDocumento , prefijoDocumento) VALUES( '.$candidatoInsertID.' , \''.$resultado["carta_rfc"].'\' , \'carta_rfc\');';
$this->db->query( $sqlInsertArchivo );
unlink( FCPATH.'tempFDP/files/'.$resultado["carta_rfc"] );
unlink( FCPATH.'tempFDP/files/thumbnail/'.$resultado["carta_rfc"] );
endif;
endif;

if( file_exists(FCPATH.'tempFDP/files/'.$resultado["imss"]) ):
if( rename( FCPATH.'tempFDP/files/'.$resultado["imss"] , FCPATH.'documentosUsuarios/'.$resultado["imss"])):
$sqlInsertArchivo = 'INSERT INTO DocumentosUsuarios (idUsuarios , nombreDocumento , prefijoDocumento) VALUES( '.$candidatoInsertID.' , \''.$resultado["imss"].'\' , \'imss\');';
$this->db->query( $sqlInsertArchivo );
unlink( FCPATH.'tempFDP/files/'.$resultado["imss"] );
unlink( FCPATH.'tempFDP/files/thumbnail/'.$resultado["imss"] );
endif;
endif;

if( file_exists(FCPATH.'tempFDP/files/'.$resultado["antecedentespenales"]) ):
if( rename( FCPATH.'tempFDP/files/'.$resultado["antecedentespenales"] , FCPATH.'documentosUsuarios/'.$resultado["antecedentespenales"])):
$sqlInsertArchivo = 'INSERT INTO DocumentosUsuarios (idUsuarios , nombreDocumento , prefijoDocumento) VALUES( '.$candidatoInsertID.' , \''.$resultado["antecedentespenales"].'\' , \'antecedentespenales\');';
$this->db->query( $sqlInsertArchivo );
unlink( FCPATH.'tempFDP/files/'.$resultado["antecedentespenales"] );
unlink( FCPATH.'tempFDP/files/thumbnail/'.$resultado["antecedentespenales"] );
endif;
endif;

if( file_exists(FCPATH.'tempFDP/files/'.$resultado["burocredito"]) ):
if( rename( FCPATH.'tempFDP/files/'.$resultado["burocredito"] , FCPATH.'documentosUsuarios/'.$resultado["burocredito"])):
$sqlInsertArchivo = 'INSERT INTO DocumentosUsuarios (idUsuarios , nombreDocumento , prefijoDocumento) VALUES( '.$candidatoInsertID.' , \''.$resultado["burocredito"].'\' , \'burocredito\');';
$this->db->query( $sqlInsertArchivo );
unlink( FCPATH.'tempFDP/files/'.$resultado["burocredito"] );
unlink( FCPATH.'tempFDP/files/thumbnail/'.$resultado["burocredito"] );
endif;
endif;

if( file_exists(FCPATH.'tempFDP/files/'.$resultado["identificacionoficial"]) ):
if( rename( FCPATH.'tempFDP/files/'.$resultado["identificacionoficial"] , FCPATH.'documentosUsuarios/'.$resultado["identificacionoficial"])):
$sqlInsertArchivo = 'INSERT INTO DocumentosUsuarios (idUsuarios , nombreDocumento , prefijoDocumento) VALUES( '.$candidatoInsertID.' , \''.$resultado["identificacionoficial"].'\' , \'identificacionoficial\');';
$this->db->query( $sqlInsertArchivo );
unlink( FCPATH.'tempFDP/files/'.$resultado["identificacionoficial"] );
unlink( FCPATH.'tempFDP/files/thumbnail/'.$resultado["identificacionoficial"] );
endif;
endif;

if( file_exists(FCPATH.'tempFDP/files/'.$resultado["comprobanteEstudios"]) ):
if( rename( FCPATH.'tempFDP/files/'.$resultado["comprobanteEstudios"] , FCPATH.'documentosUsuarios/'.$resultado["comprobanteEstudios"])):
$sqlInsertArchivo = 'INSERT INTO DocumentosUsuarios (idUsuarios , nombreDocumento , prefijoDocumento) VALUES( '.$candidatoInsertID.' , \''.$resultado["comprobanteEstudios"].'\' , \'comprobanteEstudios\');';
$this->db->query( $sqlInsertArchivo );
unlink( FCPATH.'tempFDP/files/'.$resultado["comprobanteEstudios"] );
unlink( FCPATH.'tempFDP/files/thumbnail/'.$resultado["comprobanteEstudios"] );
endif;
endif;

if( file_exists(FCPATH.'tempFDP/files/'.$resultado["fotoCandidato"]) ):
if( rename( FCPATH.'tempFDP/files/'.$resultado["fotoCandidato"] , FCPATH.'documentosUsuarios/'.$resultado["fotoCandidato"])):
$sqlInsertArchivo = 'INSERT INTO DocumentosUsuarios (idUsuarios , nombreDocumento , prefijoDocumento) VALUES( '.$candidatoInsertID.' , \''.$resultado["fotoCandidato"].'\' , \'fotoCandidato\');';
$this->db->query( $sqlInsertArchivo );
unlink( FCPATH.'tempFDP/files/'.$resultado["fotoCandidato"] );
unlink( FCPATH.'tempFDP/files/thumbnail/'.$resultado["fotoCandidato"] );
endif;
endif;


unset( $resultado["step_current"] );
unset( $resultado["btn_fire"] );
unset( $resultado["nombre_candidato"] );
unset( $resultado["apellido_paterno_candidato"] );
unset( $resultado["apellido_materno_candidato"] );
unset( $resultado["carta_curp"] );
unset( $resultado["actanacimiento"] );
unset( $resultado["comprobantedomicilio"] );
unset( $resultado["carta_rfc"] );
unset( $resultado["imss"] );
unset( $resultado["antecedentespenales"] );
unset( $resultado["burocredito"] );
unset( $resultado["identificacionoficial"] );
unset( $resultado["comprobanteEstudios"] );
unset( $resultado["fotoCandidato"] );



$sqlHash = "SELECT idDepartamentos FROM departamentos where nombreDepartamento='".$resultado["descripcionDepartamento"]."';";
$selectHash = $this->db->query( $sqlHash );
	
if( $selectHash->num_rows() > 0 ):
$resultHash = $selectHash->result();

$resultado["idDepartamento"] = $resultHash[0]->idDepartamentos;

else:

$resultado["idDepartamento"]=0;

endif;


$sqlHash = "SELECT idPuestos FROM Puestos where nombrePuesto='".$resultado["puesto"]."';";
$selectHash = $this->db->query( $sqlHash );
	
if( $selectHash->num_rows() > 0 ):
$resultHash = $selectHash->result();

$resultado["idPuesto"] = $resultHash[0]->idPuestos;

else:

$resultado["idPuesto"]=0;

endif;


$sqlHash = "SELECT sdi FROM Sueldos where idSueldos=".$resultado["sueldoNOI"].";";
$selectHash = $this->db->query( $sqlHash );

if( $selectHash->num_rows() > 0 ):
$resultHash = $selectHash->result();

$resultado["Sdi"] = $resultHash[0]->sdi;

else:

$resultado["Sdi"]=0;

endif;



$sqlHash = "SELECT max(valorMetaDatos) as noEmpleado FROM UsuariosMetaDatos where prefijoMetaDatos='noEmpleado';";
$selectHash = $this->db->query( $sqlHash );
	
if( $selectHash->num_rows() > 0 ):
$resultHash = $selectHash->result();

$resultado["noEmpleado"] = $resultHash[0]->noEmpleado+1;

else:

$resultado["noEmpleado"]=0;

endif;


if ($resultado["corporativo"]=='Si')

{
	$resultado["corporativo"]='CORPORATIVO';

}
else
{
	$resultado["corporativo"]='';
}


if ($resultado["pagoExterno"]=='')

{
	$resultado["despagoExterno"]='';

}
else
{
	$resultado["despagoExterno"]='SINERGIA';
}


$sqlHash = "SELECT profundidad FROM TaxPuestoUsuario where idUsuarios =" .$resultado['idPadre'].";";
$selectHash = $this->db->query( $sqlHash );

if( $selectHash->num_rows() > 0 ):
$resultHash = $selectHash->result();

$resultado["profundidad"] = $resultHash[0]->profundidad+1;

else:

$resultado["profundidad"]=0;

endif;




$resultado["idEmpleado"] = $candidatoInsertID;
$resultado["fechaAlta"] = date("Y-m-d");



$sqlInsertCandidato = "INSERT INTO TaxPuestoUsuario (
				idPuestos,
				fechaMovimiento,
				idUsuarios,
				idUsuariosAdministra,
				idUsuariosPadre,
				profundidad,
				idRoles
				) VALUES (
				".$resultado['idPuesto'].",
						'".$resultado['fechaAlta']."',
								".$candidatoInsertID.",
								1,
								".$resultado['idPadre'].",
				                   ".$resultado['profundidad'].",
										10);";




$insertTaxtPuestos = $this->db->query($sqlInsertCandidato);



$sqlUpdateUsuario = "UPDATE RecursosHumanosFDP set altaUsuario=1 , fechaAlta = now(), idUsuarios= $candidatoInsertID where idCandidatoFDP= $idCandidatoFDP";




$UpdateUsuario = $this->db->query($sqlUpdateUsuario);


foreach( $resultado as $key => $res ):

$sqlInsertMetaDatos = 'INSERT INTO UsuariosMetaDatos ( prefijoMetaDatos , valorMetaDatos , idUsuarios ) VALUES( \''.$key.'\' , \''.$res.'\' , '.$candidatoInsertID.' );';
$this->db->query( $sqlInsertMetaDatos );

endforeach;

$dataContent["registro"] = "registro";
$dataContent["formArray"] = $formArray;

}



$dataContent["error_campos"] = $error_campos;


$dataContent["formArrayCandidato"] = $candidatoFDP;
$dataContent["catalogos"] = new Catalogos();
$dataContent["Empresas"] = $catEmpresas;
$dataContent["Departamentos"] = $catDepartamentos;

//echo "<pre>";print_r($error_campos);
//	echo "<pre>";print_r($dataContent);
//echo "<pre>";print_r($resultado);
	//echo "<pre>";print_r($formArray);

$this->load->view('includes/header' , $dataHeader);
$this->load->view('eaf/recursoshumanos/alta_usuario',$dataContent );
$this->load->view('includes/footer');



	}
	
	
	public function ValidarCuentaBancaria(){
	
		$id = $this->input->post('id');
		
		//$id = 6;
	
		$ValidarCuenta = $this->RecursoshumanosModel->validarCuenta($id);
	
		if ($ValidarCuenta)
				
		{
			echo "correcto";
				
			}
			else
			{
				echo "error"; 
				
			}
			
		}

function correo()
		{
			 
		
			$config=array(
		
					'protocol' => 'smtp',
					'smtp_host' => 'ssl://smtp.gmail.com',
					'smtp_port' => 465,
					'smtp_user' => 'salesfxxib01@gmail.com',
					'smtp_pass' => 'SFORCEB01',
					'smtp_timeout' => '60',
					'charset'    => 'utf-8',
					'newline'    => "\r\n",
					'mailtype' => 'html', // or html
					'validation' => TRUE, // bool whether to validate email or not
		
		
			);
			 
				
				
		    $email="ferma_3@live.com.mx";
		
			$ci = get_instance();
		
		
			$ci->load->library('email',$config);
			$ci->email->initialize($config);
		
		
			$ci->email->from('salesfxxib01@gmail.com','Prueba');
			$ci->email->reply_to('salesfxxib01@gmail.com','Prueba');
			$ci->email->subject('Prueba');
		
			 
		
			$ci->email->to($email);
			$ci->email->message("<?xml version='1.0' encoding='iso-8859-1'?>
<!DOCTYPE html PUBLIC '-//W3C//DTD XHTML 1.0 Transitional//EN'
   'http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd'>
<html xmlns='http://www.w3.org/1999/xhtml'>
<head>
<title></title>
</head>
<body><table >
		<tr>
		<td>Si usted no visualiza bien este mensaje, haga:
		
		</tr>
	</table>
		
	</body>
</html>");
		
		
		
			$ci->email->send()
		
		
			/* liberar el conjunto de resultados */
		
		
			?>
			    		    			<br>
			    		    				<?php
			    		
			    		var_dump($ci->email->print_debugger());
			    		
			    		
			    		    				
			    		    		
			    		    	}

			    		    	function puerto()
			    		    	{
			    		    	
			    		    		$dominio = "ssl://smtp.begroup.com.mx"; // Dominio a comprobar
			    		    		$puerto = 465; // Puerto a comprobar
			    		    	
			    		    	
			    		    	
			    		    		$fp = fsockopen($dominio, $puerto, $errno, $errstr);
			    		    		if(!$fp)
			    		    	
			    		    			echo "Fallo, el puerto ",$puerto," no esta abierto<br />El error ha sido: ",$errno;
			    		    		else {
			    		    			echo "El puerto ",$puerto," esta abierto correctamente";
			    		    			
			    		    		var_dump(curl_version());	
			    		    			
			    		    			fclose($fp);
			    		    		}
			    		    	
			    		    	
			    		    	}
			    		    	
			    		    	function AprobarVacante(){
			    		    	
			    		    		$usuario = $this->getUserFromSession();
			    		    		$data['usuario'] = $usuario;
			    		    	
			    		    	
			    		    		$id =  $this->input->post('id');
			    		    		 
			    		    	
			    		    		if($this->Analista->AprobarVacante($id)):
			    		    	
			    		    		$resultado = array(
			    		    				"codigo" => 200,
			    		    				"exito" => true,
			    		    				"mensaje" => "Perfil de puesto aprobado correctamente."
			    		    		);
			    		    	
			    		    	
			    		    		else:
			    		    		$resultado = array(
			    		    				"codigo" => 400,
			    		    				"exito" => false,
			    		    				"mensaje" => "No es posible aprobar el perfil, vuelva a intentarlo."
			    		    		);
			    		    		endif;
			    		    	
			    		    		ob_clean();
			    		    		echo json_encode($resultado);
			    		    		exit;
			    		    	
			    		    	}
			    		    	
			    		    	public function correos(){
			    		    	
			    		    	
			    		    	
			    		    		/*	$config=array(
			    		    	
			    		    		'protocol' => 'smtp',
			    		    		'smtp_host' => 'smtp.begroup.com.mx',
			    		    		'smtp_port' => 465,
			    		    		'smtp_user' => 'postulacion@begroup.com.mx',
			    		    		'smtp_pass' => 'pos.2016',
			    		    		'smtp_timeout' => '7',
			    		    		'charset'    => 'utf-8',
			    		    		'newline'    => "\r\n",
			    		    		'smtp_crypto' => 'ssl',
			    		    		'mailtype' => 'html', // or html
			    		    		'validation' => TRUE, // bool whether to validate email or not
			    		    	
			    		    		); */
			    		    	
			    		    			
			    		    		$config=array(
			    		    	
			    		    				'protocol' => 'smtp',
			    		    				'smtp_host' => 'ssl://smtp.gmail.com',
			    		    				'smtp_port' => 465,
			    		    				'smtp_user' => 'salesfxxib01@gmail.com',
			    		    				'smtp_pass' => 'SFORCEB01',
			    		    				'smtp_timeout' => '7',
			    		    				'charset'    => 'utf-8',
			    		    				'newline'    => "\r\n",
			    		    					
			    		    				'mailtype' => 'html', // or html
			    		    				'validation' => TRUE, // bool whether to validate email or not
			    		    	
			    		    		);
			    		    	
			    		    	
			    		    	
			    		    	
			    		    		$ci = get_instance();
			    		    	
			    		    	
			    		    		$ci->load->library('Email',$config);
			    		    		$ci->email->initialize($config);
			    		    	
			    		    	
			    		    		$ci->email->from('postulacion@begroup.com.mx','Be Group');
			    		    		$ci->email->to('ferma_3@live.com.mx');
			    		    		$ci->email->subject('Registro de publicacion');
			    		    		$ci->email->message("
			    		    	
		<hr>
			    		    	
			    		    	
			    		    	
		<hr>
			    		    	
			    		    	
			    		    	
		<table width='100%' border='0' cellspacing='0' cellpadding='0'>
		<tr>
			    		    	
		<td style='background-color: #505050 ; padding-top:25px; '><center>
		<a href='http://localhost/CodeIgniter/index.php' ><FONT FACE='Century Gothic' size=2 color=white>www.begroup.com.mx</FONT></a>
		</center>
			    		    	
		</td>
		</tr>
			    		    	
		<tr>
			    		    	
		<td style='background-color: #505050;  padding-bottom:25px;' ><center>
		<FONT FACE='Century Gothic'  color=white size=2>Be Group 2015</FONT>
		</center>
			    		    	
		</td>
		</tr>
			    		    	
		</table>
		");
			    		    	
			    		    		$ci->email->send();
			    		    	
			    		    	
			    		    		var_dump($ci->email->print_debugger());
			    		    	
			    		    	
			    		    	}
			    		    	
			    		    	
			    		    	public function Contrato($id){
			    		    			
			    		    			
			    		    			
			    		    		$this->load->library('Pdf');
			    		    			
			    		    			
			    		    		$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
			    		    		
			    		    		
			    		    		// set default monospaced font
			    		    		$pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);
			    		    		
			    		    		// set margins
			    		    		$pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
			    		    		$pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
			    		    		$pdf->SetFooterMargin(PDF_MARGIN_FOOTER);
			    		    		
			    		    		// set auto page breaks
			    		    		$pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);
			    		    		
			    		    		// set image scale factor
			    		    		$pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);
			    		    		
			    		    		// set some language-dependent strings (optional)
			    		    		if (@file_exists(dirname(__FILE__).'/lang/eng.php')) {
			    		    			require_once(dirname(__FILE__).'/lang/eng.php');
			    		    			$pdf->setLanguageArray($l);
			    		    		}
			    		    		
			    		    		// ---------------------------------------------------------
			    		    		
			    		    		// set default font subsetting mode
			    		    		$pdf->setFontSubsetting(true);
			    		    		
			    		    		// Set font
			    		    		// dejavusans is a UTF-8 Unicode font, if you only need to
			    		    		// print standard ASCII chars, you can use core fonts like
			    		    		// helvetica or times to reduce file size.
			    		    		$pdf->SetFont('dejavusans', '', 12, '', true);
			    		    		
			    		    		// Add a page
			    		    		// This method has several options, check the source code documentation for more information.
			    		    		$pdf->AddPage();
			    		    		
			    		    		// set text shadow effect
			    		    		$pdf->setTextShadow(array('enabled'=>true, 'depth_w'=>0.2, 'depth_h'=>0.2, 'color'=>array(196,196,196), 'opacity'=>1, 'blend_mode'=>'Normal'));
			    		    		
			    		    		// Set some content to print
			    		    		$html = <<<EOD

<p>
    CONTRATO INDIVIDUAL DE TRABAJO POR TIEMPO DETERMINADO QUE CELEBRAN POR UNA PARTE <strong>SOLUCIONES MASIVAS S.A. DE C.V,</strong> A QUIEN EN LO SUCESIVO DE
    ESTE CONTRATO SE LE DENOMINAR� EL �PATR�N�, Y POR LA OTRA, <strong>DUCKER MORALES PAULINA ANDREA</strong> POR SU PROPIO DERECHO, A QUIEN EN ADELANTE SE LE
    DENOMINAR� EL (LA) �TRABAJADOR� (A), DE ACUERDO CON LAS SIGUIENTES DECLARACIONES Y CL�USULAS:
</p>
<p align="center">
    D E C L A R A C I O N E S
</p>
<p>
    I. Declaran los contratantes tener la debida capacidad para celebrar el presente contrato, en tal virtud lo celebran de com�n acuerdo de conformidad al
    art�culo 25 de la Ley Federal del Trabajo.
</p>
<p>
II. El �Trabajador� por sus generales manifiesta llamarse como ha quedado escrito, con domicilio en<strong>CALLE CALZ TLALPAN No. 1000 DEP 8 COL. NATIVITAS DEL. BENITO JUAREZ DF C.P. 03500</strong><strong>;</strong> de<strong> </strong><strong>22 A�OS 8 MESES</strong> de edad, sexo: <strong>FEMENINO</strong>, estado civil: <strong>SOLTERO</strong><strong>,</strong> nacionalidad:    <strong>Mexicana.</strong>
</p>
<p>
    III. El �Patr�n� tiene su domicilio en Calzada de Tlalpan No. 938 Col. Nativitas, Delegaci�n Benito Ju�rez, C.P. 03500, M�xico, D.F.
</p>
<p>
    IV. El �Trabajador� declara contar con buen estado de salud, estar f�sica y profesionalmente apto, contar con los conocimientos, habilidades, requisitos y
    documentos necesarios para desempe�ar la categor�a con que se le contrata.
</p>
<p>
    Las partes de com�n acuerdo suscriben el presente contrato individual de trabajo por tiempo determinado, de conformidad a las siguientes:
</p>
<p align="center">
    <strong>CLAUSULAS</strong>
</p>
<p align="center">
    <strong> </strong>
</p>
<p>
    <strong>PRIMERA.-</strong>
Este contrato se celebra por tiempo determinado, por un per�odo contado a partir de la fecha del presente contrato y con vencimiento al d�a    <strong>07 de agosto de 2016</strong> <strong>.</strong>
</p>
<p>
    <strong>SEGUNDA</strong>
    .- El presente contrato se celebra por tiempo determinado, en virtud de que existe una Asignaci�n espec�fica de Cartera Vencida.
</p>
<p>
    <strong>TERCERA</strong>
.- El �Trabajador� prestar� sus servicios personales para el �Patr�n� con la categor�a<strong> </strong><strong>GESTOR DE COBRANZA</strong>    <strong> </strong>sobre la asignaci�n espec�fica de la Cartera mencionada en la cl�usula precedente y realizar� las actividades inherentes a su categor�a.
</p>
<p>
    <strong>CUARTA</strong>
    .- El �Trabajador� prestar� sus servicios en el domicilio del �Patr�n� o en cualquier otro domicilio o lugar que �ste designe, dentro de la Rep�blica
    Mexicana, por lo que est� de acuerdo y otorga expresamente su consentimiento para ser removido de lugar de prestaci�n de servicios e incluso, para cambiar
    de labores, sin perjuicio del salario percibido.
</p>
<p>
    <strong>QUINTA.</strong>
- El �Trabajador� prestar� sus servicios para el �Patr�n� dentro de un horario de labores de las <strong>15:00</strong><strong> </strong>a las    <strong> </strong><strong>22:00</strong>, disfrutando diariamente de treinta minutos, para descansar y tomar alimentos fuera del centro de trabajo, durante
    seis d�as a la semana, descansando uno, preferentemente los d�as domingo; horario y d�a de descanso que podr� ser cambiado conforme a las necesidades de la
    producci�n del servicio, sin perjuicio de la jornada diaria m�xima legal. El tiempo de descanso y comida no se computa como tiempo de trabajo.
</p>
<p>
    <strong>QUINTA</strong>
    .- El �Trabajador� a cambio del salario percibido, laborar� la jornada m�xima legal de 48 horas efectivas de trabajo a la semana, en la jornada diurna; 45
    horas a la semana; en la jornada mixta y 42 horas a la semana, en la jornada nocturna, seg�n sea el horario de labores asignado. El �Trabajador� tiene
    estrictamente prohibido laborar horas extras, sin previa autorizaci�n escrita del �Patr�n�, en la que se anotar� el n�mero de horas extras que deban
    laborarse, a partir de qu� momento inician y terminan; as� como la fecha en que deber� realizarse el trabajo extraordinario. Las horas extras que
    espor�dicamente se lleguen a laborar, ser�n contabilizadas y retribuidas de conformidad a las disposiciones aplicables de la Ley Federal de Trabajo.
</p>
<p>
    <strong>SEXTA.</strong>
    - El �Trabajador� est� de acuerdo con el �Patr�n� en que el d�a de descanso semanal, con goce de sueldo, preferentemente ser� el d�a domingo, o cualquier
    otro d�a de la semana, conforme a las necesidades de la prestaci�n del servicio.
</p>
<p>
    <strong>S�PTIMA</strong>
.- El �Trabajador� percibir� un salario diario de $<strong>73.85</strong><strong> (</strong><strong>Setenta y Tres Pesos 85/100 M. N.</strong>    <strong>),</strong> incluyendo en esta cantidad la parte proporcional del s�ptimo d�a y ser� pagado los d�as 15 y �ltimo de cada mes; cuando resulten
    inh�biles, se pagar� el d�a h�bil anterior, en moneda de curso legal en el domicilio del �Patr�n�, en el centro de trabajo y dentro del horario de labores,
    debiendo firmar el �Trabajador� el recibo de pago correspondiente. El �Trabajador�, mediante este acto, tambi�n solicita y autoriza al �Patr�n� para que el
    pago de sus percepciones quincenales, puedan realizarse mediante dep�sito o transferencia electr�nica a la cuenta a su nombre, en el Banco que la tenga
    aperturada; en este caso, la forma que acredite el dep�sito o la transferencia, demostrar� el pago quincenal. Toda inconformidad con el pago de las
    prestaciones quincenales deber� expresarse en el acto o dentro de las 48 horas posteriores al pago, de no hacerlo, es evidencia de que se han pagado en la
    forma y t�rminos acordados y que la relaci�n laboral se ha desarrollado conforme a lo pactado.
</p>
<p>
    <strong>OCTAVA.</strong>
    - El �Trabajador�, cuando se lleve en el centro de trabajo, registrar� su asistencia y las entradas y salidas del centro de labores, mediante el sistema de
    registro que, en su caso, lleve el �Patr�n�, por lo que el incumplimiento de esta disposici�n, evidenciar� la falta injustificada a sus labores.
</p>
<p>
    <strong>NOVENA.-</strong>
    Por cada seis d�as consecutivos de trabajo, el �Trabajador� disfrutar� de un d�a de descanso, estableciendo de com�n acuerdo con goce de sueldo �ntegro.
    Cuando as� lo permita la necesidad de producci�n del servicio, el �Patr�n�, podr� conceder como d�a de descanso semanal, preferentemente y de com�n
    acuerdo, el d�a domingo. Si el �Trabajador� no labora los seis d�as, recibir� una sexta parte de su salario por cada d�a que hubiese trabajado. Las
    inasistencias injustificadas al centro de trabajo, ser�n deducibles del per�odo de prestaci�n de servicios, computables para el disfrute de las
    prestaciones a que tenga derecho.
</p>
<p>
    <strong>D�CIMA.-</strong>
    El �Trabajador� disfrutar� de los d�as de descanso obligatorio, establecidos por el art�culo 74 de la Ley Federal del Trabajo, con goce de sueldo �ntegro:
    1 de enero, primer lunes de febrero en conmemoraci�n al 5 de febrero, tercer lunes de marzo, en conmemoraci�n al 21 de marzo, 1 de mayo, 16 de septiembre,
    tercer lunes de noviembre, en conmemoraci�n al 20 de noviembre, el primero de diciembre de cada seis a�os, cuando corresponda a la transmisi�n del Poder
    Ejecutivo Federal y 25 de diciembre. Las que determinen las Leyes Federales y Locales Electorales en caso de Elecciones Ordinarias, para ejecutar la
    Jornada Electoral.
</p>
<p>
    <strong>D�CIMA PRIMERA.-</strong>
    El �Trabajador�, despu�s de haber cumplido un a�o de servicios, disfrutar� de un per�odo de vacaciones de seis d�as laborables. Dicho per�odo se
    incrementar� en dos d�as por cada a�o de servicios, hasta el cuarto a�o de antig�edad; posteriormente el per�odo vacacional se incrementar� en dos d�as por
    cada cinco a�os de prestaci�n de servicios, de conformidad al art�culo 76 de la Ley Federal del Trabajo.
</p>
<p>
    El per�odo vacacional se disfrutar� en d�as continuos y dentro de los seis meses siguientes a la fecha de aniversario de prestaci�n de servicios, seg�n lo
    determinen las necesidades de la producci�n o de la prestaci�n del servicio. Tambi�n percibir� la parte proporcional correspondiente al tiempo laborado,
    cuando no haya cumplido un a�o de servicios. Previo al inicio del disfrute del per�odo vacacional, el �Trabajador� percibir� una prima vacacional de 25%.
</p>
<p>
    <strong>D�CIMA SEGUNDA</strong>
    .- El �Trabajador� percibir� un aguinaldo anual equivalente a 15 d�as de salario, cuando haya laborado un a�o completo, o la proporci�n del tiempo
    laborado; mismo que se pagar� antes del d�a 20 del mes de diciembre.
</p>
<p>
    <strong>D�CIMA TERCERA.-</strong>
    Las partes contratantes est�n de acuerdo en que el �Patr�n� queda facultado a deducir del salario del �TRABAJADOR� las cantidades a que se refiere al
    art�culo 110 de la Ley Federal del Trabajo: pensi�n alimenticia decretada por la autoridad correspondiente, deudas contra�das con el �Patr�n� y en general
    las deudas de pago a que se refiere esta disposici�n legal.
</p>
<p>
    <strong>D�CIMA CUARTA</strong>
    .- El �Trabajador� expresamente se obliga a cumplir, respetar y observar las disposiciones legales, contractuales y reglamentarias, as� como aquellas
    disposiciones nuevas de car�cter transitorio y permanente que sean establecidas por el �Patr�n�. Particularmente a observar y cumplir el Reglamento
    Interior de Trabajo del �PATR�N�, mismo que en �ste acto ha le�do detenidamente, conoce y firma de recibido un ejemplar.
</p>
<p>
    <strong>D�CIMA QUINTA</strong>
    .- El �Trabajador� fue recomendado para la categor�a que va a desempe�ar, por lo que las partes acuerdan a que estar� obligado a demostrar su capacidad,
    aptitudes y habilidades en el per�odo contratado, quedando sujetas las partes a la decisi�n del �rea de Recursos Humanos, a quien las partes le reconocen
    capacidad para opinar, someti�ndose a su fallo en relaci�n a la capacidad, aptitudes y habilidades del �Trabajador�.
</p>
<p>
    <strong>D�CIMA SEXTA</strong>
    .- El �Trabajador� se obliga a cumplir y a someterse a los planes y programas de capacitaci�n y adiestramiento que establezca el �Patr�n�, o bien a
    participar como instructor en dichos planes y programas, como parte del trabajo contratado.
</p>
<p>
    <strong>D�CIMA SEPTIMA</strong>
    .- Todo lo no expresamente establecido en el presente contrato se sujetar� a las disposiciones que se�ala el apartado �A� del art�culo 123 de la
    Constituci�n Federal, a las disposiciones de la Ley Federal del Trabajo y al Reglamento Interior de Trabajo de el �Patr�n�.
</p>
<p>
    <strong>D�CIMA OCTAVA</strong>
    .- Las partes convienen que al vencimiento del t�rmino a que se refiere la cl�usula primera de este contrato, quedar� terminado, sin necesidad de dar aviso
    y cesar�n todos sus efectos, de acuerdo con la fracci�n III del art�culo 53 de la Ley Federal del Trabajo.
</p>
<p>
    Las partes contratantes firman de com�n acuerdo el presente contrato, sabedoras de su contenido y alcance de las obligaciones que al suscribirlo, contraen
rec�procamente, as� como las que la ley les impone. Lo firman por duplicado en la ciudad de M�xico DF siendo el d�a<strong> </strong>    <strong>10 de julio de 2016</strong>
</p>
<table border="0" cellspacing="0" cellpadding="0">
    <tbody>
        <tr>
            <td width="297" valign="top">
                <p align="center">
                    <strong>" EL TRABAJADOR "</strong>
                </p>
                <p align="center">
                    <strong>___________________________________</strong>
                </p>
                <p align="center">
                    <strong>DUCKER MORALES PAULINA ANDREA</strong>
                    <strong></strong>
                </p>
            </td>
            <td width="329" valign="top">
                <p align="center">
                    <strong>" EL PATRON"</strong>
                </p>
                <p align="center">
                    <strong>_____________________________________</strong>
                </p>
                <p align="center">
                    SOLUCIONES MASIVAS S.A. DE C.V
                </p>
            </td>
        </tr>
    </tbody>
</table>
<p>
    <strong> </strong>
</p>
<p>
    <strong> </strong>
</p>
<p>
    <strong></strong>
</p>
<p align="center">
    <strong>C�DIGO DE �TICA</strong>
</p>
<p align="center">
    <strong>DE LAS OBLIGACIONES PARA CON LOS </strong>
</p>
<p align="center">
    <strong>DEUDORES Y P�BLICO EN GENERAL</strong>
    <strong><sup>1</sup></strong>
    <strong><sup> </sup></strong>
</p>
<p>
    <strong>ART�CULO PRIMERO (34).- </strong>
    Identificarse plenamente al momento de realizar la cobranza, o bien, al corroborar u obtener informaci�n sobre la localizaci�n del deudor. No se realizar�
    requerimiento de pago con menores de edad o personas de la tercera edad.
</p>
<p>
    <strong>ART�CULO SEGUNDO (35).- </strong>
    Cobrar una deuda es un derecho leg�timo, como lo es tambi�n el respeto mutuo a la dignidad entre deudores, acreedores y sus representantes.
</p>
<p>
    <strong>ART�CULO TERCERO (36).- </strong>
    No establecer contacto con los deudores en horarios y lugares que resulten inadecuados para el cobro. Se consideran adecuadas las comunicaciones que
    ocurran a partir de las 6:00 a.m. hasta las 11.00 p.m., hora local del domicilio del deudor.
</p>
<p>
    <strong>ART�CULO CUARTO (37).- </strong>
    En el ejercicio del derecho al cobro, se evitar� hacer uso de lenguaje obsceno o de palabras altisonantes al establecer comunicaci�n con el deudor, sus
    familiares, amigos o compa�eros de trabajo.
</p>
<p>
    Las comunicaciones telef�nicas deber�n hacerse con la finalidad de negociar el pago de las deudas y no con la intenci�n de molestar o amenazar a los
    deudores o a las personas que atiendan dichas llamadas.
</p>
<p>
    <strong>ART�CULO QUINTO (38).- </strong>
    No se podr�n hacer publicaciones, tales como �lista negra de deudores� y tampoco establecer registros especiales, distintos a los que prescriben las leyes,
    para hacer del conocimiento general la negativa de pago de los deudores.
</p>
<p>
    <strong>ART�CULO SEXTO (39).- </strong>
    Las empresas de cobranza o sus colaboradores, bajo ninguna circunstancia, deber�n ostentarse como representantes de �rgano jurisdiccional u otra autoridad,
    o como parte de un consorcio legal, si no es el caso.
</p>
<p>
    <strong>ART�CULO S�PTIMO (40).- </strong>
    No enga�ar al deudor con el argumento de que al no pagar su deuda, comete delito sancionado con privaci�n de la libertad, ni hacerle creer con falsos
    escritos de demanda o de notificaciones judiciales, que se ha iniciado un juicio en su contra.
</p>
<p>
    <strong> </strong>
</p>
<p>
    <strong>ART�CULO OCTAVO (41).- </strong>
    No se deber�n hacer ofrecimientos tales como quitas, descuentos o cancelaci�n de intereses o comisiones, con la finalidad de obtener el pago de la deuda,
    de no estar debidamente autorizado por el acreedor, o hacerle creer al deudor que podr� gozar de dichos beneficios, de no existir dicha posibilidad
</p>
<p>
    <strong> </strong>
</p>
<p>
    <strong>ART�CULO NOVENO (42).- </strong>
    En los casos en que, como resultado de las gestiones de cobranza, el deudor acceda al pago de la deuda, las empresas de cobranza deber�n documentar por
    escrito los compromisos adquiridos, cuando lo requiera el acreditado o lo considere pertinente la empresa, debiendo constar la r�brica de ambas partes. El
    representante de la empresa acreditar� tal car�cter con la documentaci�n en que se le faculte para llevar a cabo la recuperaci�n del adeudo.
</p>
<p>
    <strong><sup>1 </sup></strong>
    <strong>
        El C�digo de �tica se encuentra inserto en el Cap�tulo IV de los Estatutos Sociales de la Asociaci�n de Profesionales en Cobranza y Servicios
        Jur�dicos, A.C., los n�meros en par�ntesis corresponden a los art�culos de los citados estatutos.
    </strong>
</p>
<p>
    <strong>ART�CULO D�CIMO (43).- </strong>
    Las empresas de cobranza deber�n estipular en los convenios de pago que celebren con los deudores, los compromisos adquiridos en la negociaci�n que se
    acuerde, se�alando los t�rminos y condiciones en que se llevar�n a cabo los pagos, oblig�ndose a proporcionar escrito de finiquito o de liquidaci�n de
    adeudo, en caso de condonaci�n o quita, al cumplirse la obligaci�n. Dichos documentos deber�n suscribirse por persona facultada por el acreedor.
</p>
<p>
    <strong>ART�CULO D�CIMO PRIMERO (44).- </strong>
    Hacer todo aquello que pueda ayudar a los deudores a encontrar la soluci�n a su problem�tica financiera, para el cumplimiento de su adeudo, dentro de los
    m�rgenes de negociaci�n autorizados por los clientes.
</p>
<p>
    <strong>ART�CULO D�CIMO SEGUNDO (45).- </strong>
    No incrementar las deudas con cargos no autorizados por la legislaci�n vigente o por el contrato celebrado entre el deudor, el otorgante de cr�dito o el
    acreedor.
</p>
<p>
    <strong>ART�CULO D�CIMO TERCERO (46).- </strong>
    No utilizar formas o papeler�a que simulen instrumentos legales. Los gestores no deben hacerse pasar por representantes legales si no lo son y tampoco
    utilizar nombres falsos.
</p>
<p>
    <strong>ART�CULO D�CIMO CUARTO (47).- </strong>
    No enviar correspondencia a los deudores con leyendas exteriores que mencionen que el comunicado trata espec�ficamente de una cobranza. Lo anterior no
    obliga a las empresas a omitir mencionar su nombre o raz�n social, en su calidad de remitente.
</p>
<p>
    Evitar el env�o de cartas o cualquier medio escrito que den motivo a descalificar la actuaci�n de las empresas de cobranza en las que se efect�en
    manifestaciones que por su contenido, constituyan excesos que no se apeguen a la verdad, a la ley, a las buenas costumbres o que sean contrarias a la �tica
    profesional
</p>
<p>
    No utilizar cartelones, anuncios o cualquier medio impreso en lugares p�blicos, o en el exterior de los domicilios de los deudores, en los que se haga
    referencia a su adeudo.
</p>
<p>
    <strong>ART�CULO D�CIMO QUINTO (48).- </strong>
    No contactar por cualquier motivo o medio, a deudores cuyos asuntos hayan sido retirados de la asignaci�n de las empresas de cobranza.
</p>
<p>
    <strong>ART�CULO D�CIMO SEXTO (49).- </strong>
    Las empresas de cobranza, por conducto de quienes gestionen el cobro, deber�n proporcionar al deudor, de requerirlo, toda la informaci�n disponible sobre
    la integraci�n de su saldo.
</p>
<p>
    <strong>ART�CULO D�CIMO S�PTIMO (50).- </strong>
    Las empresas de cobranza deber�n ser receptoras de las quejas, comentarios o sugerencias de los deudores. Para tal efecto, dispondr�n de los medios
    necesarios para darles tr�mite y en su caso, soluci�n, informando del resultado cuando proceda, al interesado.
</p>
<p>
    <strong>ART�CULO D�CIMO OCTAVO (51).- </strong>
    Las empresas de cobranza que sean propietarias de carteras que por su naturaleza, deban reportarse a las Sociedades de Informaci�n Crediticia, lo
    efectuar�n conforme a las leyes aplicables a dichas sociedades, con la finalidad de que se actualice la informaci�n respecto de los deudores que hayan
    cumplido con sus pagos.
</p>
<p>
    <strong>ART�CULO D�CIMO NOVENO (52).- </strong>
    En los casos de procedimientos judiciales en que se hayan embargado bienes y que hayan concluido en pago del adeudo, se deber� dar aviso por los conductos
    legales correspondientes.
</p>
<table border="0" cellspacing="0" cellpadding="0" width="650">
    <tbody>
        <tr>
            <td width="128">
            </td>
            <td width="436">
                <p align="center">
                    <em><u>Soluciones Masivas S.A. de C.V.</u></em>
                </p>
            </td>
            <td width="86">
            </td>
        </tr>
    </tbody>
</table>
<p align="center">
    <strong>POR DISPOSICIONES GENERALES DE LA EMPRESA, ESTAS SON LAS REGLAS INTERNAS </strong>
</p>
<p align="center">
    <strong>QUE EL PERSONAL DEBE DE CUMPLIR SIN EXCEPCION ALGUNA</strong>
</p>
<p>
    Las siguientes pol�ticas de piso, tienen como finalidad establecer orden y control dentro del piso de operaciones, ser�n de aplicaci�n general para todo el
    personal de Soluciones Masivas S.A de C.V. y Personal de nuestras diferentes firmas y otras compa��as, que por sus funciones, deban estar dentro del piso
    de operaciones del Centro de Contactos Tlalpan.
</p>
<p>
    <strong>De la hora de entrada y acceso al edificio.</strong>
</p>
<p>
    <strong> </strong>
</p>
<ul type="disc">
    <li>
        La hora de entrada deber� ser de manera puntual de acuerdo a lo que te informo tu supervisor <strong><u>no existiendo tolerancia</u></strong>, salvo en
        casos especiales y que se puedan justificar de manera excepcional, estos casos los autorizara bajo su propia responsabilidad, el Gerente o Supervisor
        del �rea.
    </li>
</ul>
<ul type="disc">
    <li>
        Queda estrictamente prohibido ingresar a el �rea de operaci�n bolsas, mochilas, comida y/o medios de almacenamientos electr�nicos, los cuales ser�n
        resguardados en los lokers ubicados en P.B
    </li>
</ul>
<ul type="disc">
    <li>
        El acceso siempre deber� ser de manera ordenada considerando que el uso del elevador est� restringido.
    </li>
</ul>
<ul type="disc">
    <li>
        Todos los Asesores deber�n checar su entrada y salida de labores por cualquier medio destinado para ello (Electr�nico, F�sico) aceptando que de no
        hacerlo se le considerara como falta.
    </li>
</ul>
<p>
    <strong>Del uso de equipos electr�nicos propios, revistas, libros, etc.:</strong>
</p>
<p>
    <strong> </strong>
</p>
<p>
    <strong>Queda estrictamente prohibido utilizar en el �rea de operaciones:</strong>
</p>
<p>
    <strong> </strong>
</p>
<ul type="disc">
    <li>
        Equipos celulares, palms, PC pockets video juegos port�tiles.
    </li>
</ul>
<ul type="disc">
    <li>
        Reproductores de Mp3, Walk man, disc man, radios port�tiles con o sin aud�fonos.
    </li>
</ul>
<ul type="disc">
    <li>
        Libros, revistas, gacetas, impresiones, copias o publicaciones que no est�n referenciadas a tu trabajo (no puedes leer o hacer trabajos de escuela).
    </li>
</ul>
<ul type="disc">
    <li>
        Deber�s mantener tu lugar limpio de basura, papeles inservibles, fotos posters, revistas peri�dicos y cualquier otro objeto.
    </li>
</ul>
<ul type="disc">
    <li>
        Queda prohibido hacer o recibir llamadas por celular incluyendo envi� de SMS si necesitan localizarte o requieres hacer una llamada urgente deber� ser
        por la Ext. de tu supervisor.
    </li>
</ul>
<p>
    <strong>De los alimentos y bebidas:</strong>
</p>
<p>
    <strong> </strong>
</p>
<p>
    � Puedes mantener en tu lugar bebidas (Agua, caf� o refresco) solo en envase de taparosca y termos del mismo tipo.
</p>
<ul>
    <li>
        <strong><u>Se proh�be estrictamente consumir cualquier tipo de alimento en tu �rea de trabajo</u></strong>
    </li>
</ul>
<p>
    <strong><u> </u></strong>
</p>
<ul type="disc">
    <li>
        El consumo de este tipo de alimentos solo se podr� hacer en el �rea destinada para ello, cocineta 4to piso, o el lugar que a futuro se designe
    </li>
</ul>
<ul type="disc">
    <li>
        En las �reas de descanso est� prohibido realizar reuniones ruidosas que interfieran la operaci�n telef�nica.
    </li>
</ul>
<ul type="disc">
    <li>
        Est� prohibido fumar dentro del Edificio incluyendo, comedor, elevadores ba�os, pasillos, y zonas comunes del edificio.
    </li>
</ul>
<ul type="disc">
    <li>
        Queda prohibido la compra-venta o cobranza de cualquier tipo de producto dentro de las instalaciones.
    </li>
</ul>
<p>
    <strong> </strong>
</p>
<h1>
    Del c�digo de vestimenta y otros puntos de Recursos Humanos.
</h1>
<p>
    <strong> </strong>
</p>
<ul>
    <li>
        <strong><u>Hombres:</u></strong>
cabello corto, no pintado de colores extra�os (no peinados estrafalarios),        <strong><u>los tenis solo se permiten los d�as S�bados y Domingos</u></strong> los Pants, gorras, shorts, aretes en cualquier parte visible del cuerpo,
        incluyendo la lengua, no se permiten ning�n d�a de la semana.
    </li>
    <li>
        Mujeres: <strong><u>los tenis solo se permiten los d�as S�bados y Domingos</u></strong> los Pants, gorras, shorts, telas transparentes, blusas
        ombligueras, piercings en cualquier parte visible del cuerpo, incluyendo la lengua, no se permiten ning�n d�a de la semana.
    </li>
</ul>
<p>
    � Deber�n identificarte con el gafete de la empresa al momento e ingresar al edificio y portarlo en lugar visible durante todo el tiempo que permanezcas
    dentro del edificio.
</p>
<ul type="disc">
    <li>
        No existe faltas justificadas, lo que tenemos son permisos sin goce, lo cuales se otorgan por alg�n asunto extraordinario comprobable y deben de
        solicitarse a tu supervisor o Gerente en el caso de asuntos escolares deber� de comprobarse con un documento membretado, firmado, sellado y que incluya
        tel�fonos. Si existe alg�n evento de emergencia, se someter� a evaluaci�n.
    </li>
</ul>
<ul type="disc">
    <li>
        <strong><u>SIN EXCEPCION ALGUNA,</u></strong>
        <strong>
            las faltas por INCAPACIDADES DEL SEGURO SOCIAL son las �nicas justificables, no aplican recetas o incapacidades de m�dicos particulares, ni recetas
            expedidas por el IMSS.
        </strong>
    </li>
</ul>
<p>
    <strong></strong>
</p>
<p>
    <strong> </strong>
</p>
<h1>
    De la Utilizaci�n de equipos, sistemas e inmobiliario del Centro de Contactos.
</h1>
<ul type="disc">
    <li>
        Una vez entregadas las contrase�as de acceso al sistema de operaci�n es tu responsabilidad cambiar la contrase�a y memorizarla, con la finalidad de
        evitar en la estaci�n de trabajo el uso de plumas. L�piz o cualquier otro medio de almacenamiento en los cuales se encuentre tu contrase�a registrada.
    </li>
</ul>
<ul type="disc">
    <li>
        Es tu responsabilidad, el buen uso de la diadema, o tel�fono y equipo de c�mputo, mobiliario como sillas, mamparas y dem�s equipo necesario para la
        realizaci�n de tus actividades.
    </li>
</ul>
<ul type="disc">
    <li>
        Es responsabilidad del Asesor la correcta utilizaci�n de los auxiliares asignados para la medici�n de sus tiempos en el caso que trabaje con
        predictivo.
    </li>
</ul>
<ul type="disc">
    <li>
        <strong>
            <u>
                Queda prohibido el acceso a Internet desde cualquier PC o estar jugando con los diferentes programas as� como cargar cualquier tipo de
                paqueter�a en la computadora, de acuerdo a lo establecido en la carta responsiva de confidencialidad y uso de equipos que firmaste al ingresar.
            </u>
        </strong>
    </li>
</ul>
<p>
    <strong><u> </u></strong>
</p>
<ul type="disc">
    <li>
        Todos los equipos deben de mantener el fondo y protector de pantalla autorizada por la Empresa y por ning�n motivo deben de cambiarse.
    </li>
</ul>
<ul type="disc">
    <li>
        Se proh�be realizar llamadas personales desde tu equipo telef�nico, solo podr�s utilizar el tel�fono del supervisor con previa autorizaci�n.
    </li>
</ul>
<p>
    <strong> </strong>
</p>
<h2>
</h2>
<h2>
    De las tareas y actividades del Asesor
</h2>
<p>
    <strong> </strong>
</p>
<ul type="disc">
    <li>
        El Asesor no podr� levantarse de su lugar a menos que el supervisor lo solicite para darle retroalimentaci�n o bajar alguna informaci�n o en su defecto
        tenga que ir al ba�o, comida o su hora de salida debiendo de hacerlo de manera r�pida y ordenada (evitar saludos y despedidas prolongadas en el piso).
    </li>
</ul>
<p>
    <strong> </strong>
</p>
<ul type="disc">
    <li>
        Queda prohibido levantarse para solicitar apoyo en alg�n proceso de gesti�n, deber� levantar la mano para que el supervisor acuda a su lugar.
    </li>
</ul>
<ul type="disc">
    <li>
        Queda prohibido salir de las instalaciones dentro de su jornada, solo podr� salir cuando le toque su comida y en casos excepcionales podr� hacerlo
        previa autorizaci�n del Supervisor, Coordinador, Gerente o del �rea de Recursos Humanos.
    </li>
</ul>
<ul type="disc">
    <li>
        Por cuestiones de seguridad, no se permite permanecer sobre la Calz. de Tlalpan en ning�n momento.
    </li>
</ul>
<p>
    <strong> </strong>
</p>
<h2>
    De los operativos y fines de semana
</h2>
<ul type="disc">
    <li>
        Cuando se realicen operativos nocturnos o los asesores que laboran los fines de semana y / o d�as de asueto estar�n bajo la responsabilidad del
        supervisor en turno designado, por lo tanto deber�n atender las indicaciones del mismo.
    </li>
</ul>
<p>
    <strong> </strong>
</p>
<p align="center">
    <strong>RECORDEMOS QUE SOMOS UNA COMPA�IA DE SERVICIO Y ATENCION AL CLIENTE</strong>
</p>
<p align="center">
    <strong>Y LA IMAGEN DE LA EMPRESA DEPENDE DE NOSOTROS.</strong>
</p>
<p>
    <strong> </strong>
</p>
<p>
    <strong> </strong>
</p>
<p align="center">
    <strong>Atentamente,</strong>
</p>
<p>
    <strong> </strong>
</p>
<p align="center">
    <strong>Direcci�n de Operaciones</strong>
</p>
<p>
    <strong> </strong>
</p>
<p align="center">
    <strong> </strong>
</p>
<table border="1" cellspacing="0" cellpadding="0" width="684">
    <tbody>
        <tr>
            <td width="684" valign="top">
                <p align="center">
                    <em><u>CARTA RESPONSIVA DE CONFIDENCIALIDAD</u></em>
                </p>
                <p align="center">
                    <em><u>DE INFORMACION Y USO DE EQUIPOS</u></em>
                </p>
                <p align="center">
                    <em><u>CA-RES-RH-00</u></em>
                    <strong></strong>
                </p>
            </td>
        </tr>
    </tbody>
</table>
<p>
    En la presente se enuncian las directivas de uso y manejo de Software, Hardware, clave de acceso telef�nico e informaci�n de los clientes, que derivada de
    la operaci�n se consideran de car�cter confidencial. Quedando en conformidad y haciendo del conocimiento estas cl�usulas de uso u manejo de los equipos y
    todo lo relacionado con ello a los usuarios.
</p>
<p>
    Durante el per�odo que permanezca laborando en Soluciones Masivas S.A de C.V. el empleado deber� observar las siguientes indicaciones:
</p>
<p>
    1. El equipo esta acondicionado de manera que todas y cada una de sus partes funciona correctamente al igual que est� sujeto a un control de mantenimiento
    y se considera que cualquiera de los componentes est� sujeto a un mal funcionamiento causado por el t�rmino del periodo de vida �til de trabajo: se hace
    notar que cualquier aver�a o desperfecto causado por un uso inadecuado, ser� responsabilidad de la persona que est� operando bajo estas condiciones de mal
    uso.
</p>
<p>
    2. Cuando el equipo sufra alg�n tipo de falla en cualquiera de sus partes f�sicas monitor, teclado, rat�n, y otros dispositivos conectados a la
    computadora, o en el software contenido, se deber� de notificar al personal autorizado con el fin de proceder de forma inmediata. De manera que queda
    prohibido al usuario intentar reparar cualquier desperfecto del equipo.
</p>
<p>
    3. Adem�s de las partes f�sicas del equipo mencionadas en el punto anterior, el contenido de programas, aplicaciones e informaci�n contenida como bases de
    datos y/o documentos son propiedad de Soluciones Masivas S.A de C.V , por lo cual queda prohibido extraer informaci�n y datos de cualquier �ndole y por
    cualquier medio sin previa autorizaci�n por parte de la empresa, esto obliga al usuario a que, para poder imprimir y/o utilizar las unidades de disquete y
    unidades de CD, deber� obtener la autorizaci�n previa de la empresa, adem�s de que todas las operaciones de extracci�n e inclusi�n de datos a la
    computadora por todos los medios posibles ser�n �nicamente cuando la actividad que se realice as� lo requiera y con la autorizaci�n mencionada.
</p>
<p>
    4. En el caso de la informaci�n que se conozca, en relaci�n a los usuarios de servicios de nuestros clientes como son, Numero de Cuenta, Saldos,
    Domicilios, Solvencia Moral y Econ�mica, as� como cualquier otra que, derivado de las diferentes gestiones, se llegaran a conocer y que se consideran de
    car�cter confidencial, se utilizar�n �nica y exclusivamente para los fines de las actividades que se realicen en Soluciones Masivas S.A de C.V.
</p>
<p>
    5. El equipo de computo tiene instalado y configurado los paquetes y las aplicaciones suficientes para el desempe�o de las labores que la empresa requiere,
    por lo cual queda prohibido para el usuario, modificar y/o instalar cualquier tipo de programas, aplicaci�n o informaci�n ajena a la actividad laboral ,
    (m�sica, juegos, protectores de pantalla, im�genes y/o documentos ajenos a la empresa); de ser necesario incluir alg�n programa o aplicaci�n al contenido
    de la computadora que se requiera para el desempe�o de labores propias del trabajo, se deber� acudir al personal autorizado, quedando reservado para la
    empresa y el personal autorizado el derecho de modificaci�n, instalaci�n, desinstalaci�n y configuraci�n de programas y cualquier contenido de todos y cada
    uno de los equipos propiedad de la empresa.
</p>
<p>
    6. As� mismo el usuario se hace responsable del uso que se le d� a las claves de:
</p>
<p>
    � Acceso para llamadas telef�nicas locales y de larga distancia
</p>
<p>
    � Clave de ingreso a la red
</p>
<p>
    � Clave de acceso al Sistema Interno de Cobranza GESCOB
</p>
<p>
    Que se le asignar�n para sus actividades y que se identifican al final de la presente, y est� consciente de que las mismas son �nica y exclusivamente para
    uso de las tareas que la Cartera _________________________________ le encomiende, haci�ndose responsable del uso que se le pueda dar a las mismas y
    autoriza a la empresa que en el caso de hacer mal uso de ellas se har� acreedor a la sanci�n que corresponda.
</p>
<p>
    Clave de acceso telef�nico xxxxxxxxxx
</p>
<p>
    Clave de ingreso a la red xxxxxxxxxx
</p>
<p>
    Clave de acceso al Sistema Interno de Cobranza GESCOB xxxxxxxxxx
</p>
<p>
    El incumplimiento parcial o total de alguna de las directivas antes mencionadas por mi parte, ocasionar� una sanci�n que ser� determinada por la empresa
    que ir� de acuerdo a la gravedad y trascendencia de la misma, las cuales pueden ir desde un acta administrativa, hasta la sanciones legales que puedan
    aplicar.
</p>
<p align="center">
    _____________________________________________
</p>
<p align="center">
    <strong>DUCKER MORALES PAULINA ANDREA</strong>
    <strong></strong>
</p>
<p align="center">
    Acepto los lineamientos que aqu� se describen
</p>
<p align="center">
    <strong> </strong>
</p>
<p align="center">
    <strong> </strong>
</p>
<p align="center">
    <strong>CARTA DE CONFIDENCIALIDAD DE LA INFORMACI�N </strong>
</p>
<p align="center">
    <strong>Y RESPONSIVA EN LA GESTI�N DEL PROCESO DE COBRANZA</strong>
    <strong>.</strong>
</p>
<p>
    <strong><u> </u></strong>
</p>
<p>
    <strong><u> </u></strong>
</p>
<p align="right">
    M�xico, D.F. a _____ de _____________________ del _______.
</p>
<p>
    <strong><u> </u></strong>
</p>
<p>
    <strong><u> </u></strong>
</p>
<p>
    <strong><u> </u></strong>
</p>
<p>
    EL SUSCRITO presta sus servicios para <strong>Soluciones Masivas, S.A. de C.V.</strong>, con la categor�a de _____________________________________,
    consistiendo mi actividad en realizar gestiones de cobranza, por lo que me obligo a guardar en absoluta confidencialidad y a no divulgar a terceros, ni
    utilizar en beneficio propio, todos aquellos datos, informes, nombres, domicilios, n�meros de cuenta, saldos, quitas, pol�ticas, procedimientos,
    instrucciones y en general cualquier dise�o, arancel, dibujo, software, data prototipos, planes de negocios, an�lisis de mercado o cualquier otra
    informaci�n t�cnica o de negocios, que tenga conocimiento con motivo de mi trabajo, respecto de la relaci�n contractual con los clientes de la empresa para
    quien presto mis servicios. Informaci�n que no podr� copiar, reproducir, ni revelar en forma alguna y que utilizar� exclusivamente durante el desempe�o de
    mis servicios. Haci�ndome responsable de los da�os y perjuicios causados a la empresa o a los clientes de �sta, por la divulgaci�n de la informaci�n a
    terceras personas oblig�ndome a devolver toda la informaci�n que hubiese obtenido con motivo de la relaci�n contractual.
</p>
<p>
    En caso de que EL SUSCRITO falte a la confidencialidad, ser� responsable de los da�os y perjuicios que pudiera causarle a la empresa o a sus clientes con
    motivo de mi indiscreci�n e infidelidad con la informaci�n de la que tenga conocimiento. Independientemente de las acciones penales, mercantiles,
    administrativas y civiles a que se haga acreedor derivadas del incumplimiento
</p>
<p>
    Asimismo el que suscribe conoce y est� obligado a desarrollar su trabajo, conforme al C�digo de �tica que regula el proceso de cobranza. Asimismo, se me ha
    capacitado y conozco lo establecido por el art�culo 209 Bis del C�digo Penal para el Distrito Federal que tipifica como delito: �Al que con la intenci�n de
    requerir el pago de una deuda, ya sea propia del deudor o de quien funge como referente o aval, utilice medios il�citos, efectu� actos de hostigamiento e
    intimidaci�n, se le impondr� prisi�n de 6 meses a 2 a�os y una multa de 150 a 300 d�as de salario m�nimo. As� como las sanciones que correspondan si para
    tal efecto se emplearan documentaci�n, sellos falsos o se usurparan funciones p�blicas o de profesi�n, mientras que para lo dispuesto de reparaci�n del
    da�o cometido, se estar� en lo dispuesto en el propio C�digo Penal.�
</p>
<p>
    Por ello, me hago responsable de mis acciones llevadas a cabo en el proceso de cobranza que se aparten del c�digo de �tica, de las buenas pr�cticas
    profesionales y del respeto a la dignidad del deudor y, en su caso, me har� acreedor de las sanciones a que se refiere la citada disposici�n legal.
</p>
<p>
    Por su parte la empresa mencionada asumir� la responsabilidad que le corresponda, en el supuesto de que el empleado realice una cobranza ilegal y tipifique
    el supuesto a que se refiere la mencionada disposici�n legal, excepto que demuestre que el operario fue capacitado.
</p>
<p align="center">
    __________________________________________________
</p>
<p align="center">
    <strong>DUCKER MORALES PAULINA ANDREA</strong>
</p>
<p align="center">
    <strong></strong>
</p>
<p align="center">
    <strong><u>SOLUCIONES MASIVAS S.A. DE C.V.</u></strong>
</p>
<p align="center">
    <u>RFC <a name="OLE_LINK1">SMA-110405-V2A</a></u>
</p>
<p align="center">
    <strong>CARTA RESPONSIVA</strong>
</p>
<p>
    <strong> </strong>
</p>
<p>
    <strong> </strong>
</p>
<p>
    <strong> </strong>
</p>
<p>
    <strong> </strong>
</p>
<p align="center">
    <strong> </strong>
</p>
<p align="right">
    M�xico, D.F. a _____ de _____________________ del _______.
</p>
<p>
    <strong><u> </u></strong>
</p>
<p align="center">
    <strong><u> </u></strong>
</p>
<p>
    Mediante la presente yo hago constar que la informaci�n proporcionada a Soluciones Masivas S.A. de C.V. en mi solicitud de empleo es ver�dica incluyendo la
    de NO TENER ADEUDOS con alguna Instituci�n Bancaria o Financiera.
</p>
<p>
    Enterado y de conformidad que al encontrarse alguna falsedad u omisi�n en la informaci�n proporcionada ser� acreedor a la sanci�n que la empresa considere
    de acuerdo a la gravedad del asunto.
</p>
<p align="center">
    Atentamente
</p>
<p align="center">
    _____________________________________________
</p>
<p align="center">
    <strong>DUCKER MORALES PAULINA ANDREA</strong>
    <strong></strong>
</p>
<p>
    SOLUCIONES MASIVAS S.A. DE C.V.
</p>
<p>
    Por la presente, hago constar que con esta fecha y por convenir as� a mis intereses, renuncio en forma espont�nea y voluntaria al puesto que desempe�� para
    esa empresa hasta el d�a de hoy en que doy por terminado de mutuo acuerdo el contrato o relaci�n de trabajo que existi� con ustedes, con fundamento en la
    fracci�n I del art�culo 53 de la Ley Federal del Trabajo.
</p>
<p>
    Asimismo, le manifiesto que hasta la fecha, siempre he recibido el pago puntual y oportuno de todas las prestaciones a las que he tenido derecho, no
    adeud�ndoseme cantidad alguna por concepto de salarios devengados, tiempo extraordinario, vacaciones, premios, comisiones, bonos, incentivos, s�ptimos d�as
    y los de descanso obligatorio, ni por ning�n otro concepto que se derive de mi contrato individual de trabajo previstas por la propia Ley Federal del
    Trabajo.
</p>
<p>
    Tambi�n hago constar que la empresa aport� las cuotas correspondientes al INFONAVIT, no haber sufrido accidente o enfermedad de car�cter profesional o de
    trabajo, estando siempre inscrito ante el Instituto Mexicano del Seguro Social.
</p>
<p>
    Por lo tanto otorgo a la empresa Soluciones Masivas S.A. de C.V., el m�s amplio finiquito que en derecho sea procedente y aprovecho la oportunidad para
    agradecer las atenciones que hasta el d�a de hoy tuvieron para conmigo.
</p>
<p align="center">
    Atentamente
</p>
<p align="center">
    _____________________________________________
</p>
<p align="center">
    <strong>DUCKER MORALES PAULINA ANDREA</strong>
    <strong></strong>
</p>
<p>
    SOLUCIONES MASIVAS S.A. DE C.V.
</p>
<p>
    Por la presente, hago constar que con esta fecha y por convenir as� a mis intereses, renuncio en forma espont�nea y voluntaria al puesto que desempe�� para
    esa empresa hasta el d�a de hoy en que doy por terminado de mutuo acuerdo el contrato o relaci�n de trabajo que existi� con ustedes, con fundamento en la
    fracci�n I del art�culo 53 de la Ley Federal del Trabajo.
</p>
<p>
    Asimismo, le manifiesto que hasta la fecha, siempre he recibido el pago puntual y oportuno de todas las prestaciones a las que he tenido derecho, no
    adeud�ndoseme cantidad alguna por concepto de salarios devengados, tiempo extraordinario, vacaciones, premios, comisiones, bonos, incentivos, s�ptimos d�as
    y los de descanso obligatorio, ni por ning�n otro concepto que se derive de mi contrato individual de trabajo previstas por la propia Ley Federal del
    Trabajo.
</p>
<p>
    Tambi�n hago constar que la empresa aport� las cuotas correspondientes al INFONAVIT, no haber sufrido accidente o enfermedad de car�cter profesional o de
    trabajo, estando siempre inscrito ante el Instituto Mexicano del Seguro Social.
</p>
<p>
    Por lo tanto otorgo a la empresa Soluciones Masivas S.A. de C.V., el m�s amplio finiquito que en derecho sea procedente y aprovecho la oportunidad para
    agradecer las atenciones que hasta el d�a de hoy tuvieron para conmigo.
</p>
<p align="center">
    Atentamente
</p>
<p align="center">
    _____________________________________________
</p>
<p align="center">
    <strong>DUCKER MORALES PAULINA ANDREA</strong>
    <strong></strong>
</p>
EOD;
			    		    		
			    		    		// Print text using writeHTMLCell()
			    		    		$pdf->writeHTMLCell(0, 0, '', '', $html, 0, 1, 0, true, '', true);
			    		    		
			    		    		// ---------------------------------------------------------
			    		    		
			    		    		// Close and output PDF document
			    		    		// This method has several options, check the source code documentation for more information.
			    		    	
			    		    			
			    		    	
			    		    			
			    		    		// ---------------------------------------------------------
			    		    			
			    		    			
			    		    		ob_clean();
			    		    			
			    		    		$pdf->Output('example_001.pdf', 'I');
			    		    			
			    		    	}


}
