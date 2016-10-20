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
		
		
		//print_r($peticionesVacantes);
		
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
    			
    			$email = $_POST["correo_electronico_candidato"];
    			$nombre = $_POST["nombre_candidato"];
    			$paterno = $_POST["apellido_paterno_candidato"];
    			$materno = $_POST["apellido_materno_candidato"];
    			
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
				
				
				//envio correo
				
				
				
				if ($estatusReclutamientoFDP == "aprobar")
				{
					
					$mensaje="<p>Apreciable candidato, Hemos recibido, en caso de que seas llamado a entrevista favor de traer los siguientes documentos originales:</p>
						<p>CURP</p>
		<p>Acta de nacimiento</p>
		<p>Comprobante de domicilio</p>
		<p>RFC</p>
		<p>IMSS</p>
		<p>Antecedentes No Penales</p>
		<p>Buró de Crédito</p>
		<p>Identificación Oficial</p>
		<p>Comprobante de Estudios</p>
		<p>Foto digital reciente de frente y fondo blanco</p>";
					
				}
				
				if ($estatusReclutamientoFDP == "rechazar")
				{
						
					$mensaje="<p>Estimado candidato, lamentablemente la vacante de tu inter�s ha sido cubierto, en caso de que exista alguna oportunidad nos comunicaremos contigo, gracias por participar.</p>";
						
				}
				
				
				$to   = trim( $email);
				
				$config = array (
				
						'protocol' => 'smtp',
						'smtp_host' => 'ssl://a2plcpnl0742.prod.iad2.secureserver.net',
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
				
				$ci->email->from ( 'reclutamiento@solumas.com.mx', 'SOLUMAS' );
				$ci->email->to ( $to );
				$ci->email->subject ( 'Confirmación de datos personales para candidatos.' );
				$ci->email->message ('<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td style="background-color: #05406B; padding-top:25px; padding-bottom:25px; font-family: Arial;color:#ffffff; font-size:60px;""><center>
      FDP
    </center></td>
  </tr>
</table>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td style="background-color: #F4F6F8; padding-top:25px; padding-bottom:25px; font-family: Arial;color:#05406B; font-size:30px;"><center>
    Termina el proceso de registro
    </center>
    </td>
    </tr>
    </table>
  <table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td style="background-color: #fff; padding-top:25px; padding-bottom:135px; padding-left:10px; padding-right:10px; font-family: Arial;color: #7F7F7F; font-size:15px;"><center>
     <p style="font-weight:bold;color:#26313c;">Apreciable '.$nombre.' '.$paterno.' '.$materno.',</p>
   		'.$mensaje.'
        </center>
    </td>
    </tr>
    </table>
     <table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td style="background-color:#F4F6F8; padding-top:20px; padding-bottom:20px; font-family: Arial;color:#7F7F7F; font-size:15px;"><center>
    &copy; 2016 ConnectXXI
    </center>
    </td>
    </tr>
    </table>');
				
				$ci->email->send ();
				
				
				
					redirect("eaf/reclutamiento/candidato/?idCandidatoFDP=".$idCandidatoFDP."&reclutamiento=true");
				else:
					$dataContent["error_reclutamiento"] = "Por favor de llenar los campos vacíos.";
				endif;
    			//echo "<pre>";print_r($candidatoFDP);
    			
			endif;
		/*POST*/
		
		
		$dataContent["formArray"] = $candidatoFDP;
		
		$dataContent["reclutamientoFDP"] = $reclutamientoFDP;
		$dataContent["peticionesVacantes"] = $peticionesVacantes;
		
		$sqlCatPuestos = 'SELECT * from Puestos where estatusPuesto=1 order by nombrePuesto asc';
		$queryCatPuestos = $this->db->query($sqlCatPuestos);
		$dataContent["CatPuestos"] = $queryCatPuestos->result();
		
		
		$sqlCatalogos = 'SELECT * from catalogos left outer join cat_detalle on catalogos.id=cat_detalle.id_catalogo
    left outer join ObjetosCatalogo
    on catalogos.id=ObjetosCatalogo.idCatalogo where cat_detalle.estatus=1';
		$queryCatalogos = $this->db->query($sqlCatalogos);
		$dataContent["Catalogos"] = $queryCatalogos->result();
		
		
		//echo "<pre>";print_r($dataContent);
		
		/*Obtener datos de usuario, roles, modulos , permisos*/
		
		$this->load->view('includes/header' , $dataHeader);
		$this->load->view('eaf/reclutamiento/fdp' , $dataContent);
		$this->load->view('includes/footer');
		
	}
	
		
}
