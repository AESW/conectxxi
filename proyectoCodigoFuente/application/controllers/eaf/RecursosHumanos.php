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


	public function altausuario(){

		$dataHeader = array(
				"titulo" => "Alta de Usuario"
		);


		$idCandidatoFDP=$this->input->get('idCandidatoFDP');
		$catEmpresas=$this->RecursoshumanosModel->obtenerEmpresas();
		$catDepartamentos=$this->RecursoshumanosModel->obtenerDepartamentos();
		$candidatoFDP = $this->RecursoshumanosModel->obtenerCandidatoFDP($idCandidatoFDP);

		//if( empty( $candidatoFDP ) || $candidatoFDP["idVacantesPeticiones"] == 0 ||  $candidatoFDP["idReclutamientoFDP"] == 0 ||  $candidatoFDP["idUsuariosAprobacionGerente"] == 0):
		//redirect("panel");
		//endif;


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

		$dataContent["formArrayCandidato"] = $candidatoFDP;
		$dataContent["catalogos"] = new Catalogos();
		$dataContent["Empresas"] = $catEmpresas;
		$dataContent["Departamentos"] = $catDepartamentos;

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
	
	
		$idCandidatoFDP=$this->input->get('idCandidatoFDP');
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

$sqlInsertCandidato = "INSERT INTO usuarios (
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
$sqlInsertArchivo = 'INSERT INTO documentosusuarios (idUsuarios , nombreDocumento , prefijoDocumento) VALUES( '.$candidatoInsertID.' , \''.$resultado["carta_curp"].'\' , \'carta_curp\');';
$this->db->query( $sqlInsertArchivo );
unlink( FCPATH.'tempFDP/files/'.$resultado["carta_curp"] );
unlink( FCPATH.'tempFDP/files/thumbnail/'.$resultado["carta_curp"] );
endif;
endif;

if( file_exists(FCPATH.'tempFDP/files/'.$resultado["actanacimiento"]) ):
if( rename( FCPATH.'tempFDP/files/'.$resultado["actanacimiento"] , FCPATH.'documentosUsuarios/'.$resultado["actanacimiento"])):
$sqlInsertArchivo = 'INSERT INTO documentosusuarios (idUsuarios , nombreDocumento , prefijoDocumento) VALUES( '.$candidatoInsertID.' , \''.$resultado["actanacimiento"].'\' , \'actanacimiento\');';
$this->db->query( $sqlInsertArchivo );
unlink( FCPATH.'tempFDP/files/'.$resultado["actanacimiento"] );
unlink( FCPATH.'tempFDP/files/thumbnail/'.$resultado["actanacimiento"] );
endif;
endif;

if( file_exists(FCPATH.'tempFDP/files/'.$resultado["comprobantedomicilio"]) ):
if( rename( FCPATH.'tempFDP/files/'.$resultado["comprobantedomicilio"] , FCPATH.'documentosUsuarios/'.$resultado["comprobantedomicilio"])):
$sqlInsertArchivo = 'INSERT INTO documentosusuarios (idUsuarios , nombreDocumento , prefijoDocumento) VALUES( '.$candidatoInsertID.' , \''.$resultado["comprobantedomicilio"].'\' , \'comprobantedomicilio\');';
$this->db->query( $sqlInsertArchivo );
unlink( FCPATH.'tempFDP/files/'.$resultado["comprobantedomicilio"] );
unlink( FCPATH.'tempFDP/files/thumbnail/'.$resultado["comprobantedomicilio"] );
endif;
endif;

if( file_exists(FCPATH.'tempFDP/files/'.$resultado["carta_rfc"]) ):
if( rename( FCPATH.'tempFDP/files/'.$resultado["carta_rfc"] , FCPATH.'documentosUsuarios/'.$resultado["carta_rfc"])):
$sqlInsertArchivo = 'INSERT INTO documentosusuarios (idUsuarios , nombreDocumento , prefijoDocumento) VALUES( '.$candidatoInsertID.' , \''.$resultado["carta_rfc"].'\' , \'carta_rfc\');';
$this->db->query( $sqlInsertArchivo );
unlink( FCPATH.'tempFDP/files/'.$resultado["carta_rfc"] );
unlink( FCPATH.'tempFDP/files/thumbnail/'.$resultado["carta_rfc"] );
endif;
endif;

if( file_exists(FCPATH.'tempFDP/files/'.$resultado["imss"]) ):
if( rename( FCPATH.'tempFDP/files/'.$resultado["imss"] , FCPATH.'documentosUsuarios/'.$resultado["imss"])):
$sqlInsertArchivo = 'INSERT INTO documentosusuarios (idUsuarios , nombreDocumento , prefijoDocumento) VALUES( '.$candidatoInsertID.' , \''.$resultado["imss"].'\' , \'imss\');';
$this->db->query( $sqlInsertArchivo );
unlink( FCPATH.'tempFDP/files/'.$resultado["imss"] );
unlink( FCPATH.'tempFDP/files/thumbnail/'.$resultado["imss"] );
endif;
endif;

if( file_exists(FCPATH.'tempFDP/files/'.$resultado["antecedentespenales"]) ):
if( rename( FCPATH.'tempFDP/files/'.$resultado["antecedentespenales"] , FCPATH.'documentosUsuarios/'.$resultado["antecedentespenales"])):
$sqlInsertArchivo = 'INSERT INTO documentosusuarios (idUsuarios , nombreDocumento , prefijoDocumento) VALUES( '.$candidatoInsertID.' , \''.$resultado["antecedentespenales"].'\' , \'antecedentespenales\');';
$this->db->query( $sqlInsertArchivo );
unlink( FCPATH.'tempFDP/files/'.$resultado["antecedentespenales"] );
unlink( FCPATH.'tempFDP/files/thumbnail/'.$resultado["antecedentespenales"] );
endif;
endif;

if( file_exists(FCPATH.'tempFDP/files/'.$resultado["burocredito"]) ):
if( rename( FCPATH.'tempFDP/files/'.$resultado["burocredito"] , FCPATH.'documentosUsuarios/'.$resultado["burocredito"])):
$sqlInsertArchivo = 'INSERT INTO documentosusuarios (idUsuarios , nombreDocumento , prefijoDocumento) VALUES( '.$candidatoInsertID.' , \''.$resultado["burocredito"].'\' , \'burocredito\');';
$this->db->query( $sqlInsertArchivo );
unlink( FCPATH.'tempFDP/files/'.$resultado["burocredito"] );
unlink( FCPATH.'tempFDP/files/thumbnail/'.$resultado["burocredito"] );
endif;
endif;

if( file_exists(FCPATH.'tempFDP/files/'.$resultado["identificacionoficial"]) ):
if( rename( FCPATH.'tempFDP/files/'.$resultado["identificacionoficial"] , FCPATH.'documentosUsuarios/'.$resultado["identificacionoficial"])):
$sqlInsertArchivo = 'INSERT INTO documentosusuarios (idUsuarios , nombreDocumento , prefijoDocumento) VALUES( '.$candidatoInsertID.' , \''.$resultado["identificacionoficial"].'\' , \'identificacionoficial\');';
$this->db->query( $sqlInsertArchivo );
unlink( FCPATH.'tempFDP/files/'.$resultado["identificacionoficial"] );
unlink( FCPATH.'tempFDP/files/thumbnail/'.$resultado["identificacionoficial"] );
endif;
endif;

if( file_exists(FCPATH.'tempFDP/files/'.$resultado["comprobanteEstudios"]) ):
if( rename( FCPATH.'tempFDP/files/'.$resultado["comprobanteEstudios"] , FCPATH.'documentosUsuarios/'.$resultado["comprobanteEstudios"])):
$sqlInsertArchivo = 'INSERT INTO documentosusuarios (idUsuarios , nombreDocumento , prefijoDocumento) VALUES( '.$candidatoInsertID.' , \''.$resultado["comprobanteEstudios"].'\' , \'comprobanteEstudios\');';
$this->db->query( $sqlInsertArchivo );
unlink( FCPATH.'tempFDP/files/'.$resultado["comprobanteEstudios"] );
unlink( FCPATH.'tempFDP/files/thumbnail/'.$resultado["comprobanteEstudios"] );
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



$sqlHash = "SELECT idDepartamentos FROM departamentos where nombreDepartamento='".$resultado["descripcionDepartamento"]."';";
$selectHash = $this->db->query( $sqlHash );
	
if( $selectHash->num_rows() > 0 ):
$resultHash = $selectHash->result();

$resultado["idDepartamento"] = $resultHash[0]->idDepartamentos;

else:

$resultado["idDepartamento"]=0;

endif;


$sqlHash = "SELECT idPuestos FROM puestos where nombrePuesto='".$resultado["puesto"]."';";
$selectHash = $this->db->query( $sqlHash );
	
if( $selectHash->num_rows() > 0 ):
$resultHash = $selectHash->result();

$resultado["idPuesto"] = $resultHash[0]->idPuestos;

else:

$resultado["idPuesto"]=0;

endif;



$sqlHash = "SELECT max(valorMetaDatos) as noEmpleado FROM usuariosmetadatos where prefijoMetaDatos='noEmpleado';";
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


$sqlHash = "SELECT profundidad FROM taxpuestousuario where idUsuarios =" .$resultado['idPadre'].";";
$selectHash = $this->db->query( $sqlHash );

if( $selectHash->num_rows() > 0 ):
$resultHash = $selectHash->result();

$resultado["profundidad"] = $resultHash[0]->profundidad+1;

else:

$resultado["profundidad"]=0;

endif;




$resultado["idEmpleado"] = $candidatoInsertID;
$resultado["fechaAlta"] = date("Y-m-d");



$sqlInsertCandidato = "INSERT INTO taxpuestousuario (
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


foreach( $resultado as $key => $res ):

$sqlInsertMetaDatos = 'INSERT INTO usuariosmetadatos ( prefijoMetaDatos , valorMetaDatos , idUsuarios ) VALUES( \''.$key.'\' , \''.$res.'\' , '.$candidatoInsertID.' );';
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




}
