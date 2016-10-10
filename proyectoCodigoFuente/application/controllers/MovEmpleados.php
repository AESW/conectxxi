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
        $this->load->model('MovimientosModel');
       // $this->load->model('Sepomex' , 'sepomex');
    }
    
    public function index()
    {
    
    	$dataHeader = array(
    			"titulo" => "Empleado"
    	);
    
    	$sessionUser = $this->session->userdata('logged_in');
    	//echo "<pre>";
    	//print_r( $sessionUser );die;
    	$idUsuario=$sessionUser["usuario"]["idUsuarios"];
    	
    	$movimientosEmpleados = $this->MovimientosModel->obtenerMovimientosEmpleados($idUsuario);
    	
    	
    	$dataContent = array(
    			
    			"movimientos" => $movimientosEmpleados,
    			"idUsuario" => $idUsuario,
    	);
    	
    	//print_r($dataContent);
    	
    	
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
	
		
		$sessionUser = $this->session->userdata('logged_in');
		//echo "<pre>";
		//print_r( $sessionUser );die;
		$idUsuario=$sessionUser["usuario"]["idUsuarios"];
			
		$sqlturno = "select * from UsuariosMetaDatos where idUsuarios=$idUsuario and prefijoMetaDatos='turno'";
		$queryturno = $this->db->query($sqlturno);
		$dataContent["turno"] = $queryturno->result();
			
		
		
		$sqlCatalogos = 'SELECT * from catalogos left outer join cat_detalle on catalogos.id=cat_detalle.id_catalogo
    left outer join ObjetosCatalogo
    on catalogos.id=ObjetosCatalogo.idCatalogo where cat_detalle.estatus=1';
		$queryCatalogos = $this->db->query($sqlCatalogos);
		$dataContent["Catalogos"] = $queryCatalogos->result();
		
		
		
	//	print_r($dataContent["turno"]);
		
		$this->load->view('includes/header' , $dataHeader);
		$this->load->view('empleados/solicitud_cambio_turno' , $dataContent);
		$this->load->view('includes/footer');
	
	}
	
	public function solicitud_cambio_descanso()
	{
		$dataHeader = array(
				"titulo" => "Cambio de dia de descanso"
		);
	
		
		$sessionUser = $this->session->userdata('logged_in');
		//echo "<pre>";
		//print_r( $sessionUser );die;
		$idUsuario=$sessionUser["usuario"]["idUsuarios"];
		 
		$movimientosDescanso = $this->MovimientosModel->obtenerMovimientosDescanso($idUsuario);
		 
		 
		$dataContent = array(
				 
				"descanso" => $movimientosDescanso,
		);
		
		
		//print_r($dataContent);
	
		$this->load->view('includes/header' , $dataHeader);
		$this->load->view('empleados/solicitud_cambio_descanso' , $dataContent);
		$this->load->view('includes/footer');
	
	}
	
	public function solicitud_vacaciones()
	{
		$dataHeader = array(
				"titulo" => "Solicitud Vacaciones"
		);
	
			
		$idUsuario = $this->Sanitize->clean_string ( $_REQUEST ["idUsuario"] );
		
		
		
		$vacacionesEmpleados = $this->MovimientosModel->obtenervacacionesEmpleados($idUsuario);
		 
		 
		$dataContent = array(
				 
				"vacaciones" => $vacacionesEmpleados,
		);
		 
		//print_r($dataContent);
		
		
		
		
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
	
	public function informacion_biografica()
	{
		$dataHeader = array(
				"titulo" => "Actualizacion de datos"
		);
	
		
		$id = $this->Sanitize->clean_string ( $_REQUEST ["idUsuario"] );
		
		
		
		$formArray = $this->MovimientosModel->obtenerDatosBiografia($id);
			
			
		$sqlCatalogos = 'SELECT * from catalogos left outer join cat_detalle on catalogos.id=cat_detalle.id_catalogo
    left outer join ObjetosCatalogo
    on catalogos.id=ObjetosCatalogo.idCatalogo where cat_detalle.estatus=1';
		$queryCatalogos = $this->db->query($sqlCatalogos);
		
		
		$dataContent["formArray"]=$formArray;
		
		$dataContent["Catalogos"]=$queryCatalogos->result();
		
		
		
	//	print_r($dataContent);
		
		$this->load->view('includes/header' , $dataHeader);
		$this->load->view('empleados/informacion_biografica' , $dataContent);
		$this->load->view('includes/footer');
	
	}
	
	
	
	function GuardaBiografia() {
	
		$sessionUser = $this->session->userdata('logged_in');
			
		$idUsuario=$sessionUser["usuario"]["idUsuarios"];
	
		
		$idCandidato=$this->input->post('idCandidato');
		$nivel_educativo=$this->input->post('nivel_educativo_candidato');
		$estado_civil=$this->input->post('estado_civil_candidato');
		
		
		
		
		
		$arrayFormPart = array(
		"calle_no_candidato"=>$this->input->post('calle_no_candidato'),
		"cp_candidato"=>$this->input->post('cp_candidato'),
		"estado_domicilio_candidato"=>$this->input->post('estado_domicilio_candidato'),
		"ciudad_domicilio_candidato"=>$this->input->post('ciudad_domicilio_candidato'),
		"delegacion_domicilio_candidato"=>$this->input->post('delegacion_domicilio_candidato'),
		"colonia_domicilio_candidato"=>$this->input->post('colonia_domicilio_candidato'),
		"telefono_casa_candidato"=>$this->input->post('telefono_casa_candidato'),
		"telefono_movil_candidato"=>$this->input->post('telefono_movil_candidato'),
		"telefono_otro_candidato"=>$this->input->post('telefono_otro_candidato'),
		"correo_electronico_candidato"=>$this->input->post('correo_electronico_candidato'),
		"nombre_contacto_emergencia_candidato"=>$this->input->post('nombre_contacto_emergencia_candidato'),
		"parentesco_contacto_emergencia_candidato"=>$this->input->post('parentesco_contacto_emergencia_candidato'),
		"telefono_casa_emergencia_candidato"=>$this->input->post('telefono_casa_emergencia_candidato'),
		"telefono_movil_emergencia_candidato"=>$this->input->post('telefono_movil_emergencia_candidato'),);
		
		
		$resultado =  $arrayFormPart;
		
		$metasCandidato=$resultado;
		
		foreach( $metasCandidato as $key => $res ):
		
		$sqlInsertMetaDatos = "Update MetaDatosCandidatoFDP set  valorMetaDatos = '$res' where prefijoMetaDatos='$key' and idCandidatoFDP=$idCandidato";
		$this->db->query( $sqlInsertMetaDatos );
		
		endforeach;
	
		
	
		$sqlQuery = "update CandidatoFDP set nivelEducativo='$nivel_educativo',estadoCivil= '$estado_civil' where idCandidatoFDP=$idCandidato" ;
		$queryGrupo = $this->db->query($sqlQuery);
		

		
		if ($queryGrupo)
		{
			$resultado = array (
					"codigo" => 200,
					"exito" => true,
					"mensaje" => "Informacion guardada correctamente."
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
	
	
	
	public function ConsultaIncapacidades()
	{
	
		$dataHeader = array(
				"titulo" => "Incapacidades"
		);
	
		$sessionUser = $this->session->userdata('logged_in');
		//echo "<pre>";
		//print_r( $sessionUser );die;
		$idUsuario=$sessionUser["usuario"]["idUsuarios"];
		 
		$incapacidadesEmpleados = $this->MovimientosModel->obtenerIncapacidadesEmpleados($idUsuario);
		 
		 
		$dataContent = array(
				 
				"incapacidades" => $incapacidadesEmpleados,
		);
		 
		//print_r($incapacidadesEmpleados);
		 
		 
		$this->load->view('includes/header' , $dataHeader);
		$this->load->view('empleados/consultaIncapacidades' , $dataContent);
		$this->load->view('includes/footer');
	
	
	
	}
	
	
	public function ConsultaBonos()
	{
	
		$dataHeader = array(
				"titulo" => "Bonos"
		);
	
		$sessionUser = $this->session->userdata('logged_in');
		//echo "<pre>";
		//print_r( $sessionUser );die;
		$idUsuario=$sessionUser["usuario"]["idUsuarios"];
			
		$bonosEmpleados = $this->MovimientosModel->obtenerBonosEmpleados($idUsuario);
			
			
		$dataContent = array(
					
				"abonos" => $bonosEmpleados,
		);
			
		//print_r($dataContent);
			
			
		$this->load->view('includes/header' , $dataHeader);
		$this->load->view('empleados/consultaBonos' , $dataContent);
		$this->load->view('includes/footer');
	
	
	
	}
	
	public function ConsultaDescuentos()
	{
	
		$dataHeader = array(
				"titulo" => "Descuentos"
		);
	
		$sessionUser = $this->session->userdata('logged_in');
		//echo "<pre>";
		//print_r( $sessionUser );die;
		$idUsuario=$sessionUser["usuario"]["idUsuarios"];
			
		$descuentosEmpleados = $this->MovimientosModel->obtenerDescuentosEmpleados($idUsuario);
			
			
		$dataContent = array(
					
				"descuentos" => $descuentosEmpleados,
		);
			
		//print_r($dataContent);
			
			
		$this->load->view('includes/header' , $dataHeader);
		$this->load->view('empleados/consultaDescuentos' , $dataContent);
		$this->load->view('includes/footer');
	
	
	
	}

	
	public function ConsultaAsistencia()
	{
	
		$dataHeader = array(
				"titulo" => "Asistencia"
		);
	
		$sessionUser = $this->session->userdata('logged_in');
		//echo "<pre>";
		//print_r( $sessionUser );die;
		$idUsuario=$sessionUser["usuario"]["idUsuarios"];
			
		$asistenciaEmpleados = $this->MovimientosModel->obtenerAsistenciaEmpleados($idUsuario);
			
			
		$dataContent = array(
					
				"asistencia" => $asistenciaEmpleados,
		);
			
		//print_r($dataContent);
			
			
		$this->load->view('includes/header' , $dataHeader);
		$this->load->view('empleados/consultaAsistencia' , $dataContent);
		$this->load->view('includes/footer');
	
	
	
	}
	
	
	public function ConsultaCapacitacion()
	{
	
		$dataHeader = array(
				"titulo" => "Capacitación"
		);
	
		$sessionUser = $this->session->userdata('logged_in');
		//echo "<pre>";
		//print_r( $sessionUser );die;
		$idUsuario=$sessionUser["usuario"]["idUsuarios"];
			
		$capacitacion = $this->MovimientosModel->obtenerCapacitacionEmpleados($idUsuario);
			
			
		$dataContent = array(
					
				"capacitacion" => $capacitacion,
		);
			
		//print_r($dataContent);
			
			
		$this->load->view('includes/header' , $dataHeader);
		$this->load->view('empleados/consultaCapacitacion' , $dataContent);
		$this->load->view('includes/footer');
	
	
	
	}
	
}






