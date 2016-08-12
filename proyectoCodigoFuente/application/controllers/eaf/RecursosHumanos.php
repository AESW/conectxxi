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
					    		  
<span style="text-align:justify;">
<div style="page-break-after: always;"><p>CONTRATO INDIVIDUAL DE TRABAJO POR TIEMPO DETERMINADO QUE CELEBRAN POR UNA PARTE <b>SOLUCIONES MASIVAS S.A. DE C.V,</b> A QUIEN EN LO SUCESIVO DE ESTE CONTRATO SE LE DENOMINARÁ EL “PATRÓN”, Y POR LA OTRA, <b>DUCKER MORALES PAULINA ANDREA</b>
POR SU PROPIO DERECHO, A QUIEN EN ADELANTE SE LE DENOMINARÁ EL (LA) “TRABAJADOR” (A), DE ACUERDO CON LAS SIGUIENTES DECLARACIONES Y CLÁUSULAS:</p>
<p></p>
<p align="center">D E C L A R A C I O N E S </p>
<p>
<OL TYPE="I">
<li>Declaran los contratantes tener la debida capacidad para celebrar el presente contrato, en tal virtud lo celebran de común acuerdo de conformidad al artículo 25 de la Ley Federal del Trabajo.</li>
<br>
<li>El “Trabajador” por sus generales manifiesta llamarse como ha quedado escrito, con domicilio en <b>CALLE CALZ TLALPAN No. 1000 DEP 8 COL. NATIVITAS DEL. BENITO JUAREZ DF C.P. 03500;</b> de<b> 22 AÑOS 8 MESES</b>de edad, sexo: <b>FEMENINO</b>, estado civil: <b>SOLTERO,</b> nacionalidad: <b>Mexicana.</b></li>
<br>
<li>El “Patrón” tiene su domicilio en Calzada de Tlalpan No. 938 Col. Nativitas, Delegación Benito Juárez, C.P. 03500, México, D.F.</li>
<br>
<li>El “Trabajador” declara contar con buen estado de salud, estar física y profesionalmente apto, contar con los conocimientos, habilidades, requisitos y documentos necesarios para desempeñar la categoría con que se le contrata.</li>
</OL>
Las partes de común acuerdo suscriben el presente contrato individual de trabajo por tiempo determinado, de conformidad a las siguientes: </li>
<p></p>
<p align="center"><b>CLAUSULAS</b></p>

<p><b>PRIMERA.-</b> Este contrato se celebra por tiempo determinado, por un período contado a partir de la fecha del presente contrato y con vencimiento al día <b>07 de agosto de 2016.</b> </p>

<p><b>SEGUNDA</b>.- El presente contrato se celebra por tiempo determinado, en virtud de que existe una Asignación específica de Cartera Vencida.</p>

<p><b>TERCERA</b>.- El “Trabajador” prestará sus servicios personales para el “Patrón” con la categoría<b> GESTOR DE COBRANZA </b>sobre la asignación específica de la Cartera mencionada en la cláusula precedente y realizará las actividades inherentes a su categoría.</p>

<p><b>CUARTA</b>.- El “Trabajador” prestará sus servicios en el domicilio del “Patrón” o en cualquier otro domicilio o lugar que éste designe, dentro de la República Mexicana, por lo que está de acuerdo y otorga expresamente su consentimiento para ser removido de lugar de prestación de servicios e incluso, para cambiar de labores, sin perjuicio del salario percibido.</p>

<p><b>QUINTA.</b>- El “Trabajador” prestará sus servicios para el “Patrón” dentro de un horario de labores de las <b>15:00 </b>a las<b> 22:00</b>, disfrutando diariamente de treinta minutos, para descansar y tomar alimentos fuera del centro de trabajo, durante seis días a la semana, descansando uno, preferentemente los días domingo; horario y día de descanso que podrá ser cambiado conforme a las necesidades de la producción del servicio, sin perjuicio de la jornada diaria máxima legal. El tiempo de descanso y comida no se computa como tiempo de trabajo.</p>

<p><b>QUINTA</b>.- El “Trabajador” a cambio del salario percibido, laborará la jornada máxima legal de 48 horas efectivas de trabajo a la semana, en la jornada diurna; 45 horas a la semana; en la jornada mixta y 42 horas a la semana, en la jornada nocturna, según sea el horario de labores asignado. El “Trabajador” tiene estrictamente prohibido laborar horas extras, sin previa autorización escrita del “Patrón”, en la que se anotará el número de horas extras que deban laborarse, a partir de qué momento inician y terminan; así como la fecha en que deberá realizarse el trabajo extraordinario. Las horas extras que esporádicamente se lleguen a laborar, serán contabilizadas y retribuidas de conformidad a las disposiciones aplicables de la Ley Federal de Trabajo.</p>

<p><b>SEXTA.</b>- El “Trabajador” está de acuerdo con el “Patrón” en que el día de descanso semanal, con goce de sueldo, preferentemente será el día domingo, o cualquier otro día de la semana, conforme a las necesidades de la prestación del servicio.</p>

<p><b>SÉPTIMA</b>.- El “Trabajador” percibirá un salario diario de $<b>73.85 (Setenta y Tres Pesos 85/100 M. N.),</b> incluyendo en esta cantidad la parte proporcional del séptimo día y será pagado los días 15 y último de cada mes; cuando resulten inhábiles, se pagará el día hábil anterior, en moneda de curso legal en el domicilio del “Patrón”, en el centro de trabajo y dentro del horario de labores, debiendo firmar el “Trabajador” el recibo de pago correspondiente. El “Trabajador”, mediante este acto, también solicita y autoriza al “Patrón” para que el pago de sus percepciones quincenales, puedan realizarse mediante depósito o transferencia electrónica a la cuenta a su nombre, en el Banco que la tenga aperturada; en este caso, la forma que acredite el depósito o la transferencia, demostrará el pago quincenal. Toda inconformidad con el pago de las prestaciones quincenales deberá expresarse en el acto o dentro de las 48 horas posteriores al pago, de no hacerlo, es evidencia de que se han pagado en la forma y términos acordados y que la relación laboral se ha desarrollado conforme a lo pactado.</p>

<p><b>OCTAVA.</b>- El “Trabajador”, cuando se lleve en el centro de trabajo, registrará su asistencia y las entradas y salidas del centro de labores, mediante el sistema de registro que, en su caso, lleve el “Patrón”, por lo que el incumplimiento de esta disposición, evidenciará la falta injustificada a sus labores. </p>

<p><b>NOVENA.-</b> Por cada seis días consecutivos de trabajo, el “Trabajador” disfrutará de un día de descanso, estableciendo de común acuerdo con goce de sueldo íntegro. Cuando así lo permita la necesidad de producción del servicio, el “Patrón”, podrá conceder como día de descanso semanal, preferentemente y de común acuerdo, el día domingo. Si el “Trabajador” no labora los seis días, recibirá una sexta parte de su salario por cada día que hubiese trabajado. Las inasistencias injustificadas al centro de trabajo, serán deducibles del período de prestación de servicios, computables para el disfrute de las prestaciones a que tenga derecho. </p>

<p><b>DÉCIMA.-</b> El “Trabajador” disfrutará de los días de descanso obligatorio, establecidos por el artículo 74 de la Ley Federal del Trabajo, con goce de sueldo íntegro: 1 de enero, primer lunes de febrero en conmemoración al 5 de febrero, tercer lunes de marzo, en conmemoración al 21 de marzo, 1 de mayo, 16 de septiembre, tercer lunes de noviembre, en conmemoración al 20 de noviembre, el primero de diciembre de cada seis años, cuando corresponda a la transmisión del Poder Ejecutivo Federal y 25 de diciembre. Las que determinen las Leyes Federales y Locales Electorales en caso de Elecciones Ordinarias, para ejecutar la Jornada Electoral.</p>

<p><b>DÉCIMA PRIMERA.-</b> El “Trabajador”, después de haber cumplido un año de servicios, disfrutará de un período de vacaciones de seis días laborables. Dicho período se incrementará en dos días por cada año de servicios, hasta el cuarto año de antigüedad; posteriormente el período vacacional se incrementará en dos días por cada cinco años de prestación de servicios, de conformidad al artículo 76 de la Ley Federal del Trabajo. </p>

<p>El período vacacional se disfrutará en días continuos y dentro de los seis meses siguientes a la fecha de aniversario de prestación de servicios, según lo determinen las necesidades de la producción o de la prestación del servicio. También percibirá la parte proporcional correspondiente al tiempo laborado, cuando no haya cumplido un año de servicios. Previo al inicio del disfrute del período vacacional, el “Trabajador” percibirá una prima vacacional de 25%. </p>

<p><b>DÉCIMA SEGUNDA</b>.- El “Trabajador” percibirá un aguinaldo anual equivalente a 15 días de salario, cuando haya laborado un año completo, o la proporción del tiempo laborado; mismo que se pagará antes del día 20 del mes de diciembre. </p>

<p><b>DÉCIMA TERCERA.-</b> Las partes contratantes están de acuerdo en que el “Patrón” queda facultado a deducir del salario del “TRABAJADOR” las cantidades a que se refiere al artículo 110 de la Ley Federal del Trabajo: pensión alimenticia decretada por la autoridad correspondiente, deudas contraídas con el “Patrón” y en general las deudas de pago a que se refiere esta disposición legal. </p>

<p><b>DÉCIMA CUARTA</b>.- El “Trabajador” expresamente se obliga a cumplir, respetar y observar las disposiciones legales, contractuales y reglamentarias, así como aquellas disposiciones nuevas de carácter transitorio y permanente que sean establecidas por el “Patrón”. Particularmente a observar y cumplir el Reglamento Interior de Trabajo del “PATRÓN”, mismo que en éste acto ha leído detenidamente, conoce y firma de recibido un ejemplar. </p>

<p><b>DÉCIMA QUINTA</b>.- El “Trabajador” fue recomendado para la categoría que va a desempeñar, por lo que las partes acuerdan a que estará obligado a demostrar su capacidad, aptitudes y habilidades en el período contratado, quedando sujetas las partes a la decisión del área de Recursos Humanos, a quien las partes le reconocen capacidad para opinar, sometiéndose a su fallo en relación a la capacidad, aptitudes y habilidades del “Trabajador”. </p>

<p><b>DÉCIMA SEXTA</b>.- El “Trabajador” se obliga a cumplir y a someterse a los planes y programas de capacitación y adiestramiento que establezca el “Patrón”, o bien a participar como instructor en dichos planes y programas, como parte del trabajo contratado.</p>

<p><b>DÉCIMA SEPTIMA</b>.- Todo lo no expresamente establecido en el presente contrato se sujetará a las disposiciones que señala el apartado “A” del artículo 123 de la Constitución Federal, a las disposiciones de la Ley Federal del Trabajo y al Reglamento Interior de Trabajo de el “Patrón”.</p>

<p><b>DÉCIMA OCTAVA</b>.- Las partes convienen que al vencimiento del término a que se refiere la cláusula primera de este contrato, quedará terminado, sin necesidad de dar aviso y cesarán todos sus efectos, de acuerdo con la fracción III del artículo 53 de la Ley Federal del Trabajo.</p>

<p>Las partes contratantes firman de común acuerdo el presente contrato, sabedoras de su contenido y alcance de las obligaciones que al suscribirlo, contraen recíprocamente, así como las que la ley les impone. Lo firman por duplicado en la ciudad de México DF siendo el día<b> 10 de julio de 2016</b></p>
<p></p>
<p></p>
<table cellspacing="0" cellpadding="0" > 
<tbody>
<tr>
<td align="center" ><p><b>" EL TRABAJADOR "</b></p>

<p><b>___________________________________</b></p>

<p><b>DUCKER MORALES PAULINA ANDREA</b></p></td>
<td align="center" ><p><b>" EL PATRON"</b></p>

<p><b>_____________________________________</b></p>

<p>SOLUCIONES MASIVAS S.A. DE C.V</p></td>
</tr>

</tbody>
</table>
</div>
<div style="page-break-after: always;">
<p align="center"><b>CÓDIGO DE ÉTICA<br>DE LAS OBLIGACIONES PARA CON LOS<br>DEUDORES Y PÚBLICO EN GENERAL<sup>1</sup></b></p>
<p></p>
<p><b>ARTÍCULO PRIMERO (34).- </b>Identificarse plenamente al momento de realizar la cobranza, o bien, al corroborar u obtener información sobre la localización del deudor. No se realizará requerimiento de pago con menores de edad o personas de la tercera edad. </p>

<p><b>ARTÍCULO SEGUNDO (35).- </b>Cobrar una deuda es un derecho legítimo, como lo es también el respeto mutuo a la dignidad entre deudores, acreedores y sus representantes. </p>

<p><b>ARTÍCULO TERCERO (36).- </b>No establecer contacto con los deudores en horarios y lugares que resulten inadecuados para el cobro. Se consideran adecuadas las comunicaciones que ocurran a partir de las 6:00 a.m. hasta las 11.00 p.m., hora local del domicilio del deudor. </p>

<p><b>ARTÍCULO CUARTO (37).- </b>En el ejercicio del derecho al cobro, se evitará hacer uso de lenguaje obsceno o de palabras altisonantes al establecer comunicación con el deudor, sus familiares, amigos o compañeros de trabajo. </p>

<p>Las comunicaciones telefónicas deberán hacerse con la finalidad de negociar el pago de las deudas y no con la intención de molestar o amenazar a los deudores o a las personas que atiendan dichas llamadas. </p>

<p><b>ARTÍCULO QUINTO (38).- </b>No se podrán hacer publicaciones, tales como “lista negra de deudores” y tampoco establecer registros especiales, distintos a los que prescriben las leyes, para hacer del conocimiento general la negativa de pago de los deudores. </p>

<p><b>ARTÍCULO SEXTO (39).- </b>Las empresas de cobranza o sus colaboradores, bajo ninguna circunstancia, deberán ostentarse como representantes de órgano jurisdiccional u otra autoridad, o como parte de un consorcio legal, si no es el caso. </p>

<p><b>ARTÍCULO SÉPTIMO (40).- </b>No engañar al deudor con el argumento de que al no pagar su deuda, comete delito sancionado con privación de la libertad, ni hacerle creer con falsos escritos de demanda o de notificaciones judiciales, que se ha iniciado un juicio en su contra.</p>

<p><b>ARTÍCULO OCTAVO (41).- </b>No se deberán hacer ofrecimientos tales como quitas, descuentos o cancelación de intereses o comisiones, con la finalidad de obtener el pago de la deuda, de no estar debidamente autorizado por el acreedor, o hacerle creer al deudor que podrá gozar de dichos beneficios, de no existir dicha posibilidad</p>

<p><b>ARTÍCULO NOVENO (42).- </b>En los casos en que, como resultado de las gestiones de cobranza, el deudor acceda al pago de la deuda, las empresas de cobranza deberán documentar por escrito los compromisos adquiridos, cuando lo requiera el acreditado o lo considere pertinente la empresa, debiendo constar la rúbrica de ambas partes. El representante de la empresa acreditará tal carácter con la documentación en que se le faculte para llevar a cabo la recuperación del adeudo. </p>

<p><b><sup>1 </sup>El Código de Ética se encuentra inserto en el Capítulo IV de los Estatutos Sociales de la Asociación de Profesionales en Cobranza y Servicios Jurídicos, A.C., los números en paréntesis corresponden a los artículos de los citados estatutos.</b></p>

<p><b>ARTÍCULO DÉCIMO (43).- </b>Las empresas de cobranza deberán estipular en los convenios de pago que celebren con los deudores, los compromisos adquiridos en la negociación que se acuerde, señalando los términos y condiciones en que se llevarán a cabo los pagos, obligándose a proporcionar escrito de finiquito o de liquidación de adeudo, en caso de condonación o quita, al cumplirse la obligación. Dichos documentos deberán suscribirse por persona facultada por el acreedor. </p>

<p><b>ARTÍCULO DÉCIMO PRIMERO (44).- </b>Hacer todo aquello que pueda ayudar a los deudores a encontrar la solución a su problemática financiera, para el cumplimiento de su adeudo, dentro de los márgenes de negociación autorizados por los clientes. </p>

<p><b>ARTÍCULO DÉCIMO SEGUNDO (45).- </b>No incrementar las deudas con cargos no autorizados por la legislación vigente o por el contrato celebrado entre el deudor, el otorgante de crédito o el acreedor. </p>

<p><b>ARTÍCULO DÉCIMO TERCERO (46).- </b>No utilizar formas o papelería que simulen instrumentos legales. Los gestores no deben hacerse pasar por representantes legales si no lo son y tampoco utilizar nombres falsos. </p>

<p><b>ARTÍCULO DÉCIMO CUARTO (47).- </b>No enviar correspondencia a los deudores con leyendas exteriores que mencionen que el comunicado trata específicamente de una cobranza. Lo anterior no obliga a las empresas a omitir mencionar su nombre o razón social, en su calidad de remitente.</p>

<p>Evitar el envío de cartas o cualquier medio escrito que den motivo a descalificar la actuación de las empresas de cobranza en las que se efectúen manifestaciones que por su contenido, constituyan excesos que no se apeguen a la verdad, a la ley, a las buenas costumbres o que sean contrarias a la ética profesional</p>

<p>No utilizar cartelones, anuncios o cualquier medio impreso en lugares públicos, o en el exterior de los domicilios de los deudores, en los que se haga referencia a su adeudo.</p>

<p><b>ARTÍCULO DÉCIMO QUINTO (48).- </b>No contactar por cualquier motivo o medio, a deudores cuyos asuntos hayan sido retirados de la asignación de las empresas de cobranza.</p>

<p><b>ARTÍCULO DÉCIMO SEXTO (49).- </b>Las empresas de cobranza, por conducto de quienes gestionen el cobro, deberán proporcionar al deudor, de requerirlo, toda la información disponible sobre la integración de su saldo.</p>

<p><b>ARTÍCULO DÉCIMO SÉPTIMO (50).- </b>Las empresas de cobranza deberán ser receptoras de las quejas, comentarios o sugerencias de los deudores. Para tal efecto, dispondrán de los medios necesarios para darles trámite y en su caso, solución, informando del resultado cuando proceda, al interesado. </p>

<p><b>ARTÍCULO DÉCIMO OCTAVO (51).- </b>Las empresas de cobranza que sean propietarias de carteras que por su naturaleza, deban reportarse a las Sociedades de Información Crediticia, lo efectuarán conforme a las leyes aplicables a dichas sociedades, con la finalidad de que se actualice la información respecto de los deudores que hayan cumplido con sus pagos. </p>

<p><b>ARTÍCULO DÉCIMO NOVENO (52).- </b>En los casos de procedimientos judiciales en que se hayan embargado bienes y que hayan concluido en pago del adeudo, se deberá dar aviso por los conductos legales correspondientes.</p>
</div>
<div style="page-break-after: always;">
<table border="1" cellspacing="0" cellpadding="0" > 
<tbody>
<tr>
<td> </td>
<td><i><u>Soluciones Masivas S.A. de C.V.</u></i></td>
<td> </td>
</tr>
</tbody>
</table>
<p></p>
<p align="center"><b>POR DISPOSICIONES GENERALES DE LA EMPRESA, ESTAS SON LAS REGLAS<br> INTERNAS<br> QUE EL PERSONAL DEBE DE CUMPLIR SIN EXCEPCION ALGUNA</b></p>
<p></p>
<p>Las siguientes políticas de piso, tienen como finalidad establecer orden y control dentro del piso de operaciones, serán de aplicación general para todo el personal de Soluciones Masivas S.A de C.V. y Personal de nuestras diferentes firmas y otras compañías, que por sus funciones, deban estar dentro del piso de operaciones del Centro de Contactos Tlalpan.</p>

<p><b>De la hora de entrada y acceso al edificio.</b></p>

<ul>
<li>La hora de entrada deberá ser de manera puntual de acuerdo a lo que te informo tu supervisor <b>no existiendo tolerancia</b>, salvo en casos especiales y que se puedan justificar de manera excepcional, estos casos los autorizara bajo su propia responsabilidad, el Gerente o Supervisor del área.</li>
</ul>

<ul>
<li>Queda estrictamente prohibido ingresar a el área de operación bolsas, mochilas, comida y/o medios de almacenamientos electrónicos, los cuales serán resguardados en los lokers ubicados en P.B </li>
</ul>

<ul>
<li>El acceso siempre deberá ser de manera ordenada considerando que el uso del elevador está restringido.</li>
</ul>

<ul>
<li>Todos los Asesores deberán checar su entrada y salida de labores por cualquier medio destinado para ello (Electrónico, Físico) aceptando que de no hacerlo se le considerara como falta.</li>
</ul>

<p><b>Del uso de equipos electrónicos propios, revistas, libros, etc.:</b></p>

<p><b>Queda estrictamente prohibido utilizar en el área de operaciones:</b></p>

<ul>
<li>Equipos celulares, palms, PC pockets video juegos portátiles.</li>
</ul>

<ul>
<li>Reproductores de Mp3, Walk man, disc man, radios portátiles con o sin audífonos.</li>
</ul>

<ul>
<li>Libros, revistas, gacetas, impresiones, copias o publicaciones que no estén referenciadas a tu trabajo (no puedes leer o hacer trabajos de escuela). </li>
</ul>

<ul>
<li>Deberás mantener tu lugar limpio de basura, papeles inservibles, fotos posters, revistas periódicos y cualquier otro objeto.</li>
</ul>

<ul>
<li>Queda prohibido hacer o recibir llamadas por celular incluyendo envió de SMS si necesitan localizarte o requieres hacer una llamada urgente deberá ser por la Ext. de tu supervisor.</li>
</ul>

<p><b>De los alimentos y bebidas:</b></p>
<ul>
<li>Puedes mantener en tu lugar bebidas (Agua, café o refresco) solo en envase de taparosca y termos del mismo tipo.</li>
</ul>
<ul>
<li><b><u>Se prohíbe estrictamente consumir cualquier tipo de alimento en tu área de trabajo</u></b></li>
</ul>
<ul>
<li>El consumo de este tipo de alimentos solo se podrá hacer en el área destinada para ello, cocineta 4to piso, o el lugar que a futuro se designe</li>
</ul>

<ul>
<li>En las áreas de descanso está prohibido realizar reuniones ruidosas que interfieran la operación telefónica.</li>
</ul>

<ul>
<li>Está prohibido fumar dentro del Edificio incluyendo, comedor, elevadores baños, pasillos, y zonas comunes del edificio.</li>
</ul>

<ul>
<li>Queda prohibido la compra-venta o cobranza de cualquier tipo de producto dentro de las instalaciones.</li>
</ul>

<p><b>Del código de vestimenta y otros puntos de Recursos Humanos.</b></p>
<ul>
<li><b>Hombres:</b> cabello corto, no pintado de colores extraños (no peinados estrafalarios), <b>los tenis solo se permiten los días Sábados y Domingos</b> los Pants, gorras, shorts, aretes en cualquier parte visible del cuerpo, incluyendo la lengua, no se permiten ningún día de la semana.</li>
</ul>
<ul>
<li>Mujeres: <b>los tenis solo se permiten los días Sábados y Domingos</b> los Pants, gorras, shorts, telas transparentes, blusas ombligueras, piercings en cualquier parte visible del cuerpo, incluyendo la lengua, no se permiten ningún día de la semana.</li>
</ul>
<ul>
<li>Deberán identificarte con el gafete de la empresa al momento e ingresar al edificio y portarlo en lugar visible durante todo el tiempo que permanezcas dentro del edificio.</li>
</ul>
<ul>
<li>No existe faltas justificadas, lo que tenemos son permisos sin goce, lo cuales se otorgan por algún asunto extraordinario comprobable y deben de solicitarse a tu supervisor o Gerente en el caso de asuntos escolares deberá de comprobarse con un documento membretado, firmado, sellado y que incluya teléfonos. Si existe algún evento de emergencia, se someterá a evaluación.</li>
</ul>

<ul>
<li><b>SIN EXCEPCION ALGUNA, las faltas por INCAPACIDADES DEL SEGURO SOCIAL son las únicas justificables, no aplican recetas o incapacidades de médicos particulares, ni recetas expedidas por el IMSS.</b></li>
</ul>

<p><b> De la Utilización de equipos, sistemas e inmobiliario del Centro de Contactos.</b></p>

<ul>
<li>Una vez entregadas las contraseñas de acceso al sistema de operación es tu responsabilidad cambiar la contraseña y memorizarla, con la finalidad de evitar en la estación de trabajo el uso de plumas. Lápiz o cualquier otro medio de almacenamiento en los cuales se encuentre tu contraseña registrada.</li>
</ul>

<ul>
<li>Es tu responsabilidad, el buen uso de la diadema, o teléfono y equipo de cómputo, mobiliario como sillas, mamparas y demás equipo necesario para la realización de tus actividades.</li>
</ul>

<ul>
<li>Es responsabilidad del Asesor la correcta utilización de los auxiliares asignados para la medición de sus tiempos en el caso que trabaje con predictivo.</li>
</ul>

<ul>
<li><b>Queda prohibido el acceso a Internet desde cualquier PC o estar jugando con los diferentes programas así como cargar cualquier tipo de paquetería en la computadora, de acuerdo a lo establecido en la carta responsiva de confidencialidad y uso de equipos que firmaste al ingresar.</b></li>
</ul>

<ul>
<li>Todos los equipos deben de mantener el fondo y protector de pantalla autorizada por la Empresa y por ningún motivo deben de cambiarse.</li>
</ul>

<ul>
<li>Se prohíbe realizar llamadas personales desde tu equipo telefónico, solo podrás utilizar el teléfono del supervisor con previa autorización.</li>
</ul>

<p><b>De las tareas y actividades del Asesor</b></p>

<ul>
<li>El Asesor no podrá levantarse de su lugar a menos que el supervisor lo solicite para darle retroalimentación o bajar alguna información o en su defecto tenga que ir al baño, comida o su hora de salida debiendo de hacerlo de manera rápida y ordenada (evitar saludos y despedidas prolongadas en el piso).</li>
</ul>

<ul>
<li>Queda prohibido levantarse para solicitar apoyo en algún proceso de gestión, deberá levantar la mano para que el supervisor acuda a su lugar.</li>
</ul>

<ul>
<li>Queda prohibido salir de las instalaciones dentro de su jornada, solo podrá salir cuando le toque su comida y en casos excepcionales podrá hacerlo previa autorización del Supervisor, Coordinador, Gerente o del área de Recursos Humanos.</li>
</ul>

<ul>
<li>Por cuestiones de seguridad, no se permite permanecer sobre la Calz. de Tlalpan en ningún momento. </li>
</ul>

<p><b>De los operativos y fines de semana</b></p>

<ul>
<li>Cuando se realicen operativos nocturnos o los asesores que laboran los fines de semana y / o días de asueto estarán bajo la responsabilidad del supervisor en turno designado, por lo tanto deberán atender las indicaciones del mismo.</li>
</ul>

<p align="center"><b>RECORDEMOS QUE SOMOS UNA COMPAÑIA DE SERVICIO Y ATENCION AL <br>CLIENTE<br> Y LA IMAGEN DE LA EMPRESA DEPENDE DE NOSOTROS.</b></p>

<p align="center"><b>Atentamente,</b></p>

<p align="center"><b>Dirección de Operaciones</b></p>
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

<p>En la presente se enuncian las directivas de uso y manejo de Software, Hardware, clave de acceso telefónico e información de los clientes, que derivada de la operación se consideran de carácter confidencial. Quedando en conformidad y haciendo del conocimiento estas cláusulas de uso u manejo de los equipos y todo lo relacionado con ello a los usuarios.</p>

<p>Durante el período que permanezca laborando en Soluciones Masivas S.A de C.V. el empleado deberá observar las siguientes indicaciones:</p>

<p>1. El equipo esta acondicionado de manera que todas y cada una de sus partes funciona correctamente al igual que está sujeto a un control de mantenimiento y se considera que cualquiera de los componentes está sujeto a un mal funcionamiento causado por el término del periodo de vida útil de trabajo: se hace notar que cualquier avería o desperfecto causado por un uso inadecuado, será responsabilidad de la persona que esté operando bajo estas condiciones de mal uso.</p>

<p>2. Cuando el equipo sufra algún tipo de falla en cualquiera de sus partes físicas monitor, teclado, ratón, y otros dispositivos conectados a la computadora, o en el software contenido, se deberá de notificar al personal autorizado con el fin de proceder de forma inmediata. De manera que queda prohibido al usuario intentar reparar cualquier desperfecto del equipo.</p>

<p>3. Además de las partes físicas del equipo mencionadas en el punto anterior, el contenido de programas, aplicaciones e información contenida como bases de datos y/o documentos son propiedad de Soluciones Masivas S.A de C.V , por lo cual queda prohibido extraer información y datos de cualquier índole y por cualquier medio sin previa autorización por parte de la empresa, esto obliga al usuario a que, para poder imprimir y/o utilizar las unidades de disquete y unidades de CD, deberá obtener la autorización previa de la empresa, además de que todas las operaciones de extracción e inclusión de datos a la computadora por todos los medios posibles serán únicamente cuando la actividad que se realice así lo requiera y con la autorización mencionada.</p>

<p>4. En el caso de la información que se conozca, en relación a los usuarios de servicios de nuestros clientes como son, Numero de Cuenta, Saldos, Domicilios, Solvencia Moral y Económica, así como cualquier otra que, derivado de las diferentes gestiones, se llegaran a conocer y que se consideran de carácter confidencial, se utilizarán única y exclusivamente para los fines de las actividades que se realicen en Soluciones Masivas S.A de C.V.</p>

<p>5. El equipo de computo tiene instalado y configurado los paquetes y las aplicaciones suficientes para el desempeño de las labores que la empresa requiere, por lo cual queda prohibido para el usuario, modificar y/o instalar cualquier tipo de programas, aplicación o información ajena a la actividad laboral , (música, juegos, protectores de pantalla, imágenes y/o documentos ajenos a la empresa); de ser necesario incluir algún programa o aplicación al contenido de la computadora que se requiera para el desempeño de labores propias del trabajo, se deberá acudir al personal autorizado, quedando reservado para la empresa y el personal autorizado el derecho de modificación, instalación, desinstalación y configuración de programas y cualquier contenido de todos y cada uno de los equipos propiedad de la empresa.</p>

<p>6. Así mismo el usuario se hace responsable del uso que se le dé a las claves de:</p>
<ul>
<li>Acceso para llamadas telefónicas locales y de larga distancia</li>
</ul>
<ul>
<li>Clave de ingreso a la red</li>
</ul>
<ul>
<li>Clave de acceso al Sistema Interno de Cobranza GESCOB</li>
</ul>
<p>Que se le asignarán para sus actividades y que se identifican al final de la presente, y está consciente de que las mismas son única y exclusivamente para uso de las tareas que la Cartera _________________________________ le encomiende, haciéndose responsable del uso que se le pueda dar a las mismas y autoriza a la empresa que en el caso de hacer mal uso de ellas se hará acreedor a la sanción que corresponda.</p>

<p>Clave de acceso telefónico xxxxxxxxxx</p>

<p>Clave de ingreso a la red xxxxxxxxxx</p>

<p>Clave de acceso al Sistema Interno de Cobranza GESCOB xxxxxxxxxx</p>

<p>El incumplimiento parcial o total de alguna de las directivas antes mencionadas por mi parte, ocasionará una sanción que será determinada por la empresa que irá de acuerdo a la gravedad y trascendencia de la misma, las cuales pueden ir desde un acta administrativa, hasta la sanciones legales que puedan aplicar. </p>
<p></p>
<p></p>
<p align="center">_____________________________________________<br>

<b>DUCKER MORALES PAULINA ANDREA<br>Acepto los lineamientos que aquí se describen</b></p>
</div>
<div style="page-break-after: always;">
<p align="center"><b>CARTA DE CONFIDENCIALIDAD DE LA INFORMACIÓN <br>Y RESPONSIVA EN LA GESTIÓN DEL PROCESO DE COBRANZA.</b></p>
<p></p>
<p></p>
<p align="rigth">México, D.F. a _____ de _____________________ del _______.</p>
<p></p>

<p>EL SUSCRITO presta sus servicios para <b>Soluciones Masivas, S.A. de C.V.</b>, con la categoría de _____________________________________, consistiendo mi actividad en realizar gestiones de cobranza, por lo que me obligo a guardar en absoluta confidencialidad y a no divulgar a terceros, ni utilizar en beneficio propio, todos aquellos datos, informes, nombres, domicilios, números de cuenta, saldos, quitas, políticas, procedimientos, instrucciones y en general cualquier diseño, arancel, dibujo, software, data prototipos, planes de negocios, análisis de mercado o cualquier otra información técnica o de negocios, que tenga conocimiento con motivo de mi trabajo, respecto de la relación contractual con los clientes de la empresa para quien presto mis servicios. Información que no podré copiar, reproducir, ni revelar en forma alguna y que utilizaré exclusivamente durante el desempeño de mis servicios. Haciéndome responsable de los daños y perjuicios causados a la empresa o a los clientes de ésta, por la divulgación de la información a terceras personas obligándome a devolver toda la información que hubiese obtenido con motivo de la relación contractual.</p>

<p>En caso de que EL SUSCRITO falte a la confidencialidad, será responsable de los daños y perjuicios que pudiera causarle a la empresa o a sus clientes con motivo de mi indiscreción e infidelidad con la información de la que tenga conocimiento. Independientemente de las acciones penales, mercantiles, administrativas y civiles a que se haga acreedor derivadas del incumplimiento</p>

<p>Asimismo el que suscribe conoce y está obligado a desarrollar su trabajo, conforme al Código de Ética que regula el proceso de cobranza. Asimismo, se me ha capacitado y conozco lo establecido por el artículo 209 Bis del Código Penal para el Distrito Federal que tipifica como delito: “Al que con la intención de requerir el pago de una deuda, ya sea propia del deudor o de quien funge como referente o aval, utilice medios ilícitos, efectué actos de hostigamiento e intimidación, se le impondrá prisión de 6 meses a 2 años y una multa de 150 a 300 días de salario mínimo. Así como las sanciones que correspondan si para tal efecto se emplearan documentación, sellos falsos o se usurparan funciones públicas o de profesión, mientras que para lo dispuesto de reparación del daño cometido, se estará en lo dispuesto en el propio Código Penal.”</p>

<p>Por ello, me hago responsable de mis acciones llevadas a cabo en el proceso de cobranza que se aparten del código de ética, de las buenas prácticas profesionales y del respeto a la dignidad del deudor y, en su caso, me haré acreedor de las sanciones a que se refiere la citada disposición legal. </p>

<p>Por su parte la empresa mencionada asumirá la responsabilidad que le corresponda, en el supuesto de que el empleado realice una cobranza ilegal y tipifique el supuesto a que se refiere la mencionada disposición legal, excepto que demuestre que el operario fue capacitado. </p>

<p align="center">__________________________________________________<br>DUCKER MORALES PAULINA ANDREA</b></p>
</div>
<div style="page-break-after: always;">
<p align="center"><u><h1>SOLUCIONES MASIVAS S.A. DE C.V.</h1>
<h3>RFC SMA-110405-V2A</h3></u></p>
<p></p>
<p></p>
<p><h2 align="center">CARTA RESPONSIVA</h2></p>
<p></p>
<p align="rigth">México, D.F. a _____ de _____________________ del _______.</p>
<p></p>
<p>Mediante la presente yo hago constar que la información proporcionada a Soluciones Masivas S.A. de C.V. en mi solicitud de empleo es verídica incluyendo la de NO TENER ADEUDOS con alguna Institución Bancaria o Financiera.</p>

<p>Enterado y de conformidad que al encontrarse alguna falsedad u omisión en la información proporcionada seré acreedor a la sanción que la empresa considere de acuerdo a la gravedad del asunto.</p>
<p></p>
<p></p>
<p align="center">Atentamente</p>

<p align="center">_____________________________________________<br>

<b>DUCKER MORALES PAULINA ANDREA</b></p>
</div>
<div>
<p>SOLUCIONES MASIVAS S.A. DE C.V.</p>

<p>Por la presente, hago constar que con esta fecha y por convenir así a mis intereses, renuncio en forma espontánea y voluntaria al puesto que desempeñé para esa empresa hasta el día de hoy en que doy por terminado de mutuo acuerdo el contrato o relación de trabajo que existió con ustedes, con fundamento en la fracción I del artículo 53 de la Ley Federal del Trabajo.</p>

<p>Asimismo, le manifiesto que hasta la fecha, siempre he recibido el pago puntual y oportuno de todas las prestaciones a las que he tenido derecho, no adeudándoseme cantidad alguna por concepto de salarios devengados, tiempo extraordinario, vacaciones, premios, comisiones, bonos, incentivos, séptimos días y los de descanso obligatorio, ni por ningún otro concepto que se derive de mi contrato individual de trabajo previstas por la propia Ley Federal del Trabajo.</p>

<p>También hago constar que la empresa aportó las cuotas correspondientes al INFONAVIT, no haber sufrido accidente o enfermedad de carácter profesional o de trabajo, estando siempre inscrito ante el Instituto Mexicano del Seguro Social.</p>

<p>Por lo tanto otorgo a la empresa Soluciones Masivas S.A. de C.V., el más amplio finiquito que en derecho sea procedente y aprovecho la oportunidad para agradecer las atenciones que hasta el día de hoy tuvieron para conmigo.</p>
<p></p>
<p align="center">Atentamente</p>

<p align="center">_____________________________________________<br>

<b>DUCKER MORALES PAULINA ANDREA</b></p>
</div>
</span>
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
			    		    	
			    		    	
			    		    	function arbol()
			    		    	{
			    		    		
			    		    		$menu = new RecursoshumanosModel();
			    		    		$menu_array = $menu->menu_array();
			    		    		echo $menu->show_menu_array($menu_array);
			    		    		
			    		    	}
			    		    	
			    		    	


}
