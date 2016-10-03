<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require_once(APPPATH.'libraries/Sanitize.php');


class Gerente extends CI_Controller {
	
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
        $this->load->model('GerenteModel');
        $this->SessionL->validarSesion();
    }
    

    public function index()
    {
    	$dataHeader = array(
    			"titulo" => "Gerente"
    	);
    	/*Obtener datos de usuario, roles, modulos , permisos*/
    	$sessionUser = $this->session->userdata('logged_in');
    	//echo "<pre>";
    	//print_r( $sessionUser );die;
    	$idUsuario=$sessionUser["usuario"]["idUsuarios"];
    
    	$isRRHH = 0;
    	$accionesRRHH = array();
    	if( isset( $sessionUser["puesto"]["permisos"] ) ):
    	foreach( $sessionUser["puesto"]["permisos"] as $permisos ):
    	if( $permisos["prefijoModulos"] == "gerente"):
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
    //	$entrevistasRealizar = $this->ReclutamientoModel->obtenerEntrevistasRealizarPrimeraParte();
    	/*Entrevistas por realizar*/
    
    	/*Segundas entrevistas*/
   // 	$entrevistasRealizarSegundaParte = $this->ReclutamientoModel->obtenerEntrevistasRealizarSegundaParte();
    	/*Segundas entrevistas*/
    	//print_r( $entrevistasRealizarSegundaParte );
    
    	$autorizacionesGerente = $this->GerenteModel->obtenerAutorizacionesGerente($idUsuario);
    
    
    	$dataContent = array(
   // 			"isRRHH" => $isRRHH,
    //			"accionesRRHH" => $accionesRRHH,
    	//		"entrevistasRealizar" => $entrevistasRealizar,
    		//	"entrevistasRealizarSegundaParte" => $entrevistasRealizarSegundaParte,
    			"autorizaciones" => $autorizacionesGerente
    	);
    	
    	
    //	print_r( $dataContent );
    
    	$this->load->view('includes/header' , $dataHeader);
    	$this->load->view('gerente/index',$dataContent );
    	$this->load->view('includes/footer');
    
    }	
    
    public function BajaPersonal($id)
    {
    	$dataHeader = array(
    			"titulo" => "Solicitud de Baja de Personal"
    	);
    	/*Obtener datos de usuario, roles, modulos , permisos*/
    	$sessionUser = $this->session->userdata('logged_in');
    	//echo "<pre>";
    	//print_r( $sessionUser );die;
    	
    	
    	$idUsuario=$sessionUser["usuario"]["idUsuarios"];
    
    	$isRRHH = 0;
    	$accionesRRHH = array();
    	if( isset( $sessionUser["puesto"]["permisos"] ) ):
    	foreach( $sessionUser["puesto"]["permisos"] as $permisos ):
    	if( $permisos["prefijoModulos"] == "gerente"):
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
    	
    	
    	
    	if($id=="")
    	{
    	$datos="";	
    	}
    	else
    	{
    		$datos = $this->GerenteModel->personalBaja($id);
    	}
    	
    	
  //  	$idUsuario=245;
    
    	$personal = $this->GerenteModel->personalIncapacidad($idUsuario);
    	//$empresas = $this->GerenteModel->empresas();
    	//$puestos = $this->GerenteModel->puestos();
    //	$oficina = $this->GerenteModel->oficina();
    //	$sueldo = $this->GerenteModel->sueldo();
    	 
    	$sqlCatalogos = 'SELECT * from catalogos left outer join cat_detalle on catalogos.id=cat_detalle.id_catalogo
    left outer join ObjetosCatalogo
    on catalogos.id=ObjetosCatalogo.idCatalogo where cat_detalle.estatus=1';
		$queryCatalogos = $this->db->query($sqlCatalogos);
		
    	
    	
    	$dataContent = array(
    			"personal" => $personal,
    			"Catalogos"=>$queryCatalogos->result(),
    				
    			"datos" => $datos
    	
    	);
    //	print_r($datos);
    
    	$this->load->view('includes/header' , $dataHeader);
    	$this->load->view('gerente/bajaPersonal',$dataContent );
    	$this->load->view('includes/footer');
    
    }
    
    public function incapacidad()
    {
    	$dataHeader = array(
    			"titulo" => "Alta de incapacidades empleados"
    	);
    	 
		 
		 	$sessionUser = $this->session->userdata('logged_in');
			$idUsuario=$sessionUser["usuario"]["idUsuarios"];
		 
		 
    		$personal = $this->GerenteModel->personalIncapacidad($idUsuario);
    	
    	
    	 	$dataContent = array(
    	 			"personal" => $personal
    
    		);
    
    	$this->load->view('includes/header' , $dataHeader);
    	$this->load->view('gerente/incapacidad',$dataContent );
    	$this->load->view('includes/footer');
    
    }
    
    function AltaIncapacidad() {
    
    
    	$selecEmp=$this->input->post('selecEmp');
    	$incap=$this->input->post('incap');
    	$inicio=$this->input->post('fecha_inicio_incapacidad');
    	$fin=$this->input->post('fecha_fin_incapacidad');
    	$observaciones=$this->input->post('observaciones');
    
    
    
    	$sqlAlta = "insert into Incapacidades (incapacidad,inicio,fin,idUsuarios,aprobada,observaciones) values ('$incap','$inicio','$fin',$selecEmp,0,'$observaciones')" ;
    
    
    
    	$queryGrupo = $this->db->query($sqlAlta);
    
    	if ($queryGrupo)
    	{
    		$resultado = array (
    				"codigo" => 200,
    				"exito" => true,
    				"mensaje" => "Incapacidad guardada correctamente."
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
    
    function SolicitudBajaPersonal() {
    
    	
    	$sessionUser = $this->session->userdata('logged_in');
    	$selecSolicita=$sessionUser["usuario"]["idUsuarios"];
    
    	$selecUsuario=$this->input->post('selecUsuario');
    	$selecEmp=$this->input->post('selecEmp');
    	$selecPuesto=$this->input->post('selecPuesto');
    	$fecha_ingreso=$this->input->post('fecha_ingreso');
    	$selecOficina=$this->input->post('selecOficina');
    	$descanso=$this->input->post('descanso');
    	$selecMotivo=$this->input->post('selecMotivo');
    //	$selecSolicita=$this->input->post('selecSolicita');
    	$fecha_efectiva=$this->input->post('fecha_efectiva');
    	$selecSueldo=$this->input->post('selecSueldo');
    	$horario=$this->input->post('horario');
    	$fecha_fin_Contrato=$this->input->post('fecha_fin_Contrato');
    	$comentGerente=$this->input->post('comentGerente');
    	
    
    
    	$sqlAlta = "insert into SolBajasPersonal ( motivoBaja, fechaEfectiva, horario, fechaIngreso, diaDescanso, finContrato, comentarios, idUsuarios, Empresa, Puesto, Oficina, sdi, idUsuariosSolicita,cheque,finiquito,bajaUsuario,bajaUsuarioNOI
    	) values ('$selecMotivo','$fecha_efectiva','$horario','$fecha_ingreso','$descanso','$fecha_fin_Contrato','$comentGerente',$selecUsuario,'$selecEmp','$selecPuesto','$selecOficina','$selecSueldo',$selecSolicita,0,0,0,0)" ;
    
    
    
    	$queryGrupo = $this->db->query($sqlAlta);
    
    	if ($queryGrupo)
    	{
    		$resultado = array (
    				"codigo" => 200,
    				"exito" => true,
    				"mensaje" => "Solicitud guardada correctamente.."
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
    
    
    public function Permiso() {
    	$dataHeader = array (
    			"titulo" => "Autorizacion de Permiso"
    	);
    
    	$idPermiso = $this->input->get ( 'idPermiso' );
    	$Datosusuarios = $this->GerenteModel->DatosusuariosPermiso($idPermiso);
    
    
    
    
    	$dataContent ["Datosusuarios"] = $Datosusuarios;
    
    	// echo "<pre>";print_r($error_campos);
    	//	echo "<pre>";print_r($dataContent);
    	//// echo "<pre>";print_r($resultado);
    	// echo "<pre>";print_r($formArray);
    
    	$this->load->view ( 'includes/header', $dataHeader );
    	$this->load->view ( 'gerente/Autoriza_permiso', $dataContent );
    	$this->load->view ( 'includes/footer' );
    }
    
    public function AutorizaPermiso() {
    	$dataHeader = array (
    			"titulo" => "Autorizacion de Permiso"
    	);
    
    	$idPermiso = $this->Sanitize->clean_string ( $_POST ["idPermiso"] );
    
    	//	$finiquito = $this->Sanitize->clean_string ( $_POST ["finiquito"] );
    	//	$cheque = $this->Sanitize->clean_string ( $_POST ["cheque"] );
    
    
    
    	$sqlUpdateUsuario = "UPDATE SolPermisos set  aprobado= 1 , fecha_aprobacion=now() where IdPermiso= $idPermiso";
    
    	$UpdateUsuario = $this->db->query ( $sqlUpdateUsuario );
    
    
    	if ($UpdateUsuario)
    	{
    		$resultado = array (
    				"codigo" => 200,
    				"exito" => true,
    				"mensaje" => "Permiso Autorizado correctamente."
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
    
    public function Descanso() {
    	$dataHeader = array (
    			"titulo" => "Autorizacion de dia de descanso"
    	);
    
    	$idDescanso = $this->input->get ( 'idDescanso' );
    	$Datosusuarios = $this->GerenteModel->DatosusuariosDescanso($idDescanso);
    
    
    
    
    	$dataContent ["Datosusuarios"] = $Datosusuarios;
    
    	
    
    	$this->load->view ( 'includes/header', $dataHeader );
    	$this->load->view ( 'gerente/autoriza_cambio_descanso', $dataContent );
    	$this->load->view ( 'includes/footer' );
    }
    
    
    public function AutorizaDescanso() {
    	$dataHeader = array (
    			"titulo" => "Autorizacion de dia de descanso"
    	);
    
    	$idDescanso = $this->Sanitize->clean_string ( $_POST ["idDescanso"] );
    
    	//	$finiquito = $this->Sanitize->clean_string ( $_POST ["finiquito"] );
    	//	$cheque = $this->Sanitize->clean_string ( $_POST ["cheque"] );
    
    
    
    	$sqlUpdateUsuario = "UPDATE SolDiaDescanso set  aprobado= 1 , fecha_aprobacion=now() where idSolDiaDescanso= $idDescanso";
    
    	$UpdateUsuario = $this->db->query ( $sqlUpdateUsuario );
    
    
    	if ($UpdateUsuario)
    	{
    		$resultado = array (
    				"codigo" => 200,
    				"exito" => true,
    				"mensaje" => "Solicitud Autorizada correctamente."
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
    
    
    public function Turno() {
    	$dataHeader = array (
    			"titulo" => "Autorizacion de cambio de turno"
    	);
    
    	$idTurno = $this->input->get ( 'idTurno' );
    	$Datosusuarios = $this->GerenteModel->DatosusuariosCambioTurno($idTurno);
    
    
    
    
    	$dataContent ["Datosusuarios"] = $Datosusuarios;
    
    	 
    
    	$this->load->view ( 'includes/header', $dataHeader );
    	$this->load->view ( 'gerente/autoriza_cambio_turno', $dataContent );
    	$this->load->view ( 'includes/footer' );
    }
    
    
    public function AutorizaTurno() {
    	$dataHeader = array (
    			"titulo" => "Autorizacion de cambio de turno"
    	);
    
    	$idTurno = $this->Sanitize->clean_string ( $_POST ["idTurno"] );
    
    	//	$finiquito = $this->Sanitize->clean_string ( $_POST ["finiquito"] );
    	//	$cheque = $this->Sanitize->clean_string ( $_POST ["cheque"] );
    
    
    
    	$sqlUpdateUsuario = "UPDATE SolCambioTurno set  aprobado= 1 , fecha_aprobacion=now() where idSolCambioTurno= 	$idTurno";
    
    	$UpdateUsuario = $this->db->query ( $sqlUpdateUsuario );
    
    
    	if ($UpdateUsuario)
    	{
    		$resultado = array (
    				"codigo" => 200,
    				"exito" => true,
    				"mensaje" => "Solicitud Autorizada correctamente."
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
}
