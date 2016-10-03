<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require_once(APPPATH.'libraries/Sanitize.php');


class Administrador extends CI_Controller {
	
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
        $this->load->model('AdministradorModel');
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
    
    public function Catalogos() {
    
    
    
    	$data['Catalogos']=$this->AdministradorModel->Catalogos();
    	 
    	$dataHeader = array(
    			"titulo" => "Catalogos"
    	);
    	$this->load->view('includes/header' , $dataHeader);
    	 
    
    	$this->load->view('administrador/ListaCatalogos',$data);
    	 
    	$this->load->view('includes/footer');
    }
    
    public function VerCatalogo($id) {
    
    	 
    	 
    
    	$dataHeader = array(
    			"titulo" => "Catalogos"
    	);
    	$this->load->view('includes/header' , $dataHeader);
    
    	
    	
    	$sqlVista = "select vista from catalogos where id =$id";
    	
    	$queryVista = $this->db->query( $sqlVista );
    	
    	if(  $queryVista->num_rows() > 0 ):
    	$resultadoVista = $queryVista->result();
    	foreach($resultadoVista as $valor):
    	
    			$vista= $valor->vista;
    	
    	
    	endforeach;
    	endif;
    	
    		 
    		$data['Facturacion']=$this->AdministradorModel->Facturacion();
    		 
    		$data['Productos']=$this->AdministradorModel->Productos();
    
    		$data['CatFac']=$this->AdministradorModel->CatFac($id);
    		 
    		$data['Clientes']=$this->AdministradorModel->Clientes();
    		 
    		$data['Catalogos']=$this->AdministradorModel->CatalogosDetalle($id);
    		
    		$data['Puestos']=$this->AdministradorModel->CatalogosPuesto();
    		
    		$data['Empresas']=$this->AdministradorModel->CatEmpresas();
    		
    		$data['Cursos']=$this->AdministradorModel->CatCursos();
    		
    		$data['ConceptosFiniquito']=$this->AdministradorModel->CatConceptosFiniquito();
    		
    		$data['Sueldos']=$this->AdministradorModel->CatSueldos();
    		
    		$data['Temas']=$this->AdministradorModel->CatTemasCurso();
    		
    		$data['Cartera']=$this->AdministradorModel->CatCartera();
    		
    		$data['Oficinas']=$this->AdministradorModel->CatOficinas();
    		
    		$data['Plazas']=$this->AdministradorModel->CatPlazas();
    		
    		$data['Departamentos']=$this->AdministradorModel->CatDepartamentos();
    		
    		$data['Salas']=$this->AdministradorModel->CatSalas();
    		
    		
    		 
    		$data['idCatalogo']=$id;
    		
    		//print_r($data);
    
    	
    		$this->load->view("administrador/$vista",$data);
    
    		 
    	
    
    	$this->load->view('includes/footer');
    	 
    	//print_r($data);
         
    }
    
    public function EliminaCatalogoItem(){
    
    	 
    
    	$estatus = $this->input->post('Estatus');
    	$id_item = $this->input->post('bajaDNI');
    	
    	$resultado = array();
    
    	if ($this->AdministradorModel->eliminaItem($id_item,$estatus))
    	{
    		$resultado = array(
    				"codigo" => 200,
    				"unique" => true,
    				"mensaje" => "Operaci�n realizada correctamente."
    		);
    	}
    	else
    	{
    		 
    		 
    		$resultado = array(
    				"codigo" => 400,
    				"unique" => false,
    				"mensaje" => "No se logro guardar la informaci�n."
    		);
    		 
    	}
    
    	ob_clean();
    	echo json_encode($resultado);
    
    
    
    }
    
    public function AddCatalogo(){
    
    	 
    
    	$valor = $this->input->post('CatValor');
    	$id_cat = $this->input->post('clabe');
    	$parametro = $this->input->post('CatAgrupa');
    	
    	
    	$resultado = array ("comprobanteEstudios"=>$_POST ["comprobanteEstudios"]);
    	
    	
    	
    	if (file_exists ( FCPATH . 'tempFDP/files/' . $resultado ["comprobanteEstudios"] )) :
    	if (rename ( FCPATH . 'tempFDP/files/' . $resultado ["comprobanteEstudios"], FCPATH . 'documentosUsuarios/' . $resultado ["comprobanteEstudios"] )) :
    
    	unlink ( FCPATH . 'tempFDP/files/' . $resultado ["comprobanteEstudios"] );
    	unlink ( FCPATH . 'tempFDP/files/thumbnail/' . $resultado ["comprobanteEstudios"] );
    	
    	endif;
    		
    	endif;
    
    
    	$resultado = array();
    
    	if ($this->AdministradorModel->guardaritem($valor,$id_cat,$parametro))
    	{
    		$resultado = array(
    				"codigo" => 200,
    				"unique" => true,
    				"mensaje" => "Guardado correctamente."
    		);
    	}
    	else
    	{
    		 
    		 
    		$resultado = array(
    				"codigo" => 400,
    				"unique" => false,
    				"mensaje" => "No se logro guardar la informaci�n."
    		);
    		 
    	}
    	
    	ob_clean();
    
    	echo json_encode($resultado);
    
    
    
    }
    
    public function ActualizaCatalogoItem(){
    
    
    
    	$valor = $this->input->post('editaValor');
    	$id_cat = $this->input->post('editaDNI');
    	$parametro = $this->input->post('editaParametro');
    
    
    	$resultado = array();
    
    	if ($this->AdministradorModel->actualizarItem($valor,$id_cat,$parametro))
    	{
    		$resultado = array(
    				"codigo" => 200,
    				"unique" => true,
    				"mensaje" => "Guardado correctamente."
    		);
    	}
    	else
    	{
    		 
    		 
    		$resultado = array(
    				"codigo" => 400,
    				"unique" => false,
    				"mensaje" => "No se logro guardar la informaci�n."
    		);
    		 
    	}
    	 
    	ob_clean();
    
    	echo json_encode($resultado);
    
    
    
    }
    
    
    public function AddPuestos(){
    
    
    
    	$valor = $this->input->post('CatValor');
    	//$id_cat = $this->input->post('clabe');
    	$idEmpresa = $this->input->post('empresa');
    	 
    	 
    	$resultado = array ("comprobanteEstudios"=>$_POST ["comprobanteEstudios"]);
    	 
    	 
    	 
    	if (file_exists ( FCPATH . 'tempFDP/files/' . $resultado ["comprobanteEstudios"] )) :
    	if (rename ( FCPATH . 'tempFDP/files/' . $resultado ["comprobanteEstudios"], FCPATH . 'documentosUsuarios/' . $resultado ["comprobanteEstudios"] )) :
    
    	unlink ( FCPATH . 'tempFDP/files/' . $resultado ["comprobanteEstudios"] );
    	unlink ( FCPATH . 'tempFDP/files/thumbnail/' . $resultado ["comprobanteEstudios"] );
    	 
    	endif;
    
    	endif;
    
    
    	$resultado = array();
    
    	if ($this->AdministradorModel->guardarPuesto($valor,$idEmpresa))
    	{
    		$resultado = array(
    				"codigo" => 200,
    				"unique" => true,
    				"mensaje" => "Guardado correctamente."
    		);
    	}
    	else
    	{
    		 
    		 
    		$resultado = array(
    				"codigo" => 400,
    				"unique" => false,
    				"mensaje" => "No se logro guardar la informaci�n."
    		);
    		 
    	}
    	 
    	ob_clean();
    
    	echo json_encode($resultado);
    
    
    
    }
    
    
    public function AddCurso(){
    
    
    
    	$valor = $this->input->post('CatValor');
    	
    	
    	$resultado = array();
    
    	if ($this->AdministradorModel->guardarCurso($valor))
    	{
    		$resultado = array(
    				"codigo" => 200,
    				"unique" => true,
    				"mensaje" => "Guardado correctamente."
    		);
    	}
    	else
    	{
    		 
    		 
    		$resultado = array(
    				"codigo" => 400,
    				"unique" => false,
    				"mensaje" => "No se logro guardar la informaci�n."
    		);
    		 
    	}
    	 
    	ob_clean();
    
    	echo json_encode($resultado);
    
    
    
    }
    
    
    public function ActualizaCatalogoCursos(){
    
    
    
    	$valor = $this->input->post('editaValor');
    	$id_cat = $this->input->post('editaDNI');
    	
    
    
    	$resultado = array();
    
    	if ($this->AdministradorModel->actualizarCatCursos($valor,$id_cat))
    	{
    		$resultado = array(
    				"codigo" => 200,
    				"unique" => true,
    				"mensaje" => "Guardado correctamente."
    		);
    	}
    	else
    	{
    		 
    		 
    		$resultado = array(
    				"codigo" => 400,
    				"unique" => false,
    				"mensaje" => "No se logro guardar la informaci�n."
    		);
    		 
    	}
    
    	ob_clean();
    
    	echo json_encode($resultado);
    
    
    
    }
    
    
    public function AddCatConceptos(){
    
    
    
    	$valor = $this->input->post('CatValor');
    	$id_cat = $this->input->post('clabe');
    	$parametro = $this->input->post('CatAgrupa');
    	 
    	
    
    	$resultado = array();
    
    	if ($this->AdministradorModel->guardarCatConceptos($valor,$id_cat,$parametro))
    	{
    		$resultado = array(
    				"codigo" => 200,
    				"unique" => true,
    				"mensaje" => "Guardado correctamente."
    		);
    	}
    	else
    	{
    		 
    		 
    		$resultado = array(
    				"codigo" => 400,
    				"unique" => false,
    				"mensaje" => "No se logro guardar la informaci�n."
    		);
    		 
    	}
    	 
    	ob_clean();
    
    	echo json_encode($resultado);
    
    
    
    }
    
    
    public function ActualizaCatalogoPuestos(){
    
    
    
    	$valor = $this->input->post('editaValor');
    	$id_cat = $this->input->post('editaDNI');
    	$parametro = $this->input->post('Editempresa');
    
    	$resultado = array ("comprobanteEstudios"=>$_POST ["comprobanteEstudios"]);
    	 
    	 
    	 
    	if (file_exists ( FCPATH . 'tempFDP/files/' . $resultado ["comprobanteEstudios"] )) :
    	if (rename ( FCPATH . 'tempFDP/files/' . $resultado ["comprobanteEstudios"], FCPATH . 'documentosUsuarios/' . $resultado ["comprobanteEstudios"] )) :
    	
    	unlink ( FCPATH . 'tempFDP/files/' . $resultado ["comprobanteEstudios"] );
    	unlink ( FCPATH . 'tempFDP/files/thumbnail/' . $resultado ["comprobanteEstudios"] );
    	 
    	endif;
    	
    	endif;
    	
    	
    	$resultado = array();
    
    	if ($this->AdministradorModel->actualizarItemPuesto($valor,$id_cat,$parametro))
    	{
    		$resultado = array(
    				"codigo" => 200,
    				"unique" => true,
    				"mensaje" => "Guardado correctamente."
    		);
    	}
    	else
    	{
    		 
    		 
    		$resultado = array(
    				"codigo" => 400,
    				"unique" => false,
    				"mensaje" => "No se logro guardar la informaci�n."
    		);
    		 
    	}
    
    	ob_clean();
    
    	echo json_encode($resultado);
    
    
    
    }
    
    
    public function EstatusCatalogoCursos(){
    
    
    
    	 
    	$id_item = $this->input->post('bajaDNI');
    	$estatus = $this->input->post('Estatus');
    	 
    	$resultado = array();
    
    	if ($this->AdministradorModel->estatusCursos($id_item,$estatus))
    	{
    		$resultado = array(
    				"codigo" => 200,
    				"unique" => true,
    				"mensaje" => "Operación realizada correctamente."
    		);
    	}
    	else
    	{
    		 
    		 
    		$resultado = array(
    				"codigo" => 400,
    				"unique" => false,
    				"mensaje" => "No se logro guardar la informaci�n."
    		);
    		 
    	}
    
    	ob_clean();
    	echo json_encode($resultado);
    
    
    
    }
    
    public function EstatusCatalogoPuestos(){
    
    
    
    
    	$id_item = $this->input->post('bajaDNI');
    	$estatus = $this->input->post('Estatus');
    
    	$resultado = array();
    
    	if ($this->AdministradorModel->estatusPuestos($id_item,$estatus))
    	{
    		$resultado = array(
    				"codigo" => 200,
    				"unique" => true,
    				"mensaje" => "Operación realizada correctamente."
    		);
    	}
    	else
    	{
    		 
    		 
    		$resultado = array(
    				"codigo" => 400,
    				"unique" => false,
    				"mensaje" => "No se logro guardar la informaci�n."
    		);
    		 
    	}
    
    	ob_clean();
    	echo json_encode($resultado);
    
    
    
    }
    
    public function ActualizaCatalogoConceptos(){
    
    
    
    	$valor = $this->input->post('editaValor');
    	$id_cat = $this->input->post('editaDNI');
    	$parametro = $this->input->post('editaParametro');
    
    
    	$resultado = array();
    
    	if ($this->AdministradorModel->actualizarItemConceptos($valor,$id_cat,$parametro))
    	{
    		$resultado = array(
    				"codigo" => 200,
    				"unique" => true,
    				"mensaje" => "Guardado correctamente."
    		);
    	}
    	else
    	{
    		 
    		 
    		$resultado = array(
    				"codigo" => 400,
    				"unique" => false,
    				"mensaje" => "No se logro guardar la informaci�n."
    		);
    		 
    	}
    
    	ob_clean();
    
    	echo json_encode($resultado);
    
    
    
    }
    
    public function EstatusCatalogoConceptos(){
    
    
    
    
    	$id_item = $this->input->post('bajaDNI');
    	$estatus = $this->input->post('Estatus');
    
    	$resultado = array();
    
    	if ($this->AdministradorModel->estatusConceptos($id_item,$estatus))
    	{
    		$resultado = array(
    				"codigo" => 200,
    				"unique" => true,
    				"mensaje" => "Operación realizada correctamente."
    		);
    	}
    	else
    	{
    		 
    		 
    		$resultado = array(
    				"codigo" => 400,
    				"unique" => false,
    				"mensaje" => "No se logro guardar la informaci�n."
    		);
    		 
    	}
    
    	ob_clean();
    	echo json_encode($resultado);
    
    
    
    }
    
    public function AddSueldo(){
    
    
    
    	$sueldo = $this->input->post('CatValor');
    	$año = $this->input->post('fecha');
    	$sdi = $this->input->post('sdi');
    
    
    
    	$resultado = array();
    
    	if ($this->AdministradorModel->guardarSueldo($sueldo,$año,$sdi))
    	{
    		$resultado = array(
    				"codigo" => 200,
    				"unique" => true,
    				"mensaje" => "Guardado correctamente."
    		);
    	}
    	else
    	{
    		 
    		 
    		$resultado = array(
    				"codigo" => 400,
    				"unique" => false,
    				"mensaje" => "No se logro guardar la informaci�n."
    		);
    		 
    	}
    
    	ob_clean();
    
    	echo json_encode($resultado);
    
    
    
    }
    
    public function EstatusCatalogoSueldos(){
    
    
    
    
    	$id_item = $this->input->post('bajaDNI');
    	$estatus = $this->input->post('Estatus');
    
    	$resultado = array();
    
    	if ($this->AdministradorModel->estatusSueldos($id_item,$estatus))
    	{
    		$resultado = array(
    				"codigo" => 200,
    				"unique" => true,
    				"mensaje" => "Operación realizada correctamente."
    		);
    	}
    	else
    	{
    		 
    		 
    		$resultado = array(
    				"codigo" => 400,
    				"unique" => false,
    				"mensaje" => "No se logro guardar la informaci�n."
    		);
    		 
    	}
    
    	ob_clean();
    	echo json_encode($resultado);
    
    
    
    }
    
    public function ActualizaCatalogoSueldos(){
    
    
    
    	$sueldo = $this->input->post('editaValor');
    	$año = $this->input->post('editarfecha');
    	$sdi = $this->input->post('editarsdi');
    	
    	$id_cat = $this->input->post('editaDNI');
    
    
    	$resultado = array();
    
    	if ($this->AdministradorModel->actualizarItemSueldos($id_cat,$sueldo,$año,$sdi))
    	{
    		$resultado = array(
    				"codigo" => 200,
    				"unique" => true,
    				"mensaje" => "Guardado correctamente."
    		);
    	}
    	else
    	{
    		 
    		 
    		$resultado = array(
    				"codigo" => 400,
    				"unique" => false,
    				"mensaje" => "No se logro guardar la informaci�n."
    		);
    		 
    	}
    
    	ob_clean();
    
    	echo json_encode($resultado);
    
    
    
    }
    
    public function AddCartera(){
    
    
    
    	$valor = $this->input->post('CatValor');
    	//$id_cat = $this->input->post('clabe');
    	
    
    	$resultado = array();
    
    	if ($this->AdministradorModel->guardarCartera($valor))
    	{
    		$resultado = array(
    				"codigo" => 200,
    				"unique" => true,
    				"mensaje" => "Guardado correctamente."
    		);
    	}
    	else
    	{
    		 
    		 
    		$resultado = array(
    				"codigo" => 400,
    				"unique" => false,
    				"mensaje" => "No se logro guardar la informaci�n."
    		);
    		 
    	}
    
    	ob_clean();
    
    	echo json_encode($resultado);
    
    
    
    }
    
    
    public function EstatusCatalogoCartera(){
    
    
    
    
    	$id_item = $this->input->post('bajaDNI');
    	$estatus = $this->input->post('Estatus');
    
    	$resultado = array();
    
    	if ($this->AdministradorModel->estatusCarteras($id_item,$estatus))
    	{
    		$resultado = array(
    				"codigo" => 200,
    				"unique" => true,
    				"mensaje" => "Operación realizada correctamente."
    		);
    	}
    	else
    	{
    		 
    		 
    		$resultado = array(
    				"codigo" => 400,
    				"unique" => false,
    				"mensaje" => "No se logro guardar la informaci�n."
    		);
    		 
    	}
    
    	ob_clean();
    	echo json_encode($resultado);
    
    
    
    }
    
    public function ActualizaCatalogoCartera(){
    
    	$valor = $this->input->post('editaValor');
    	$id_cat = $this->input->post('editaDNI');
    
    	$resultado = array();
    	
    	if ($this->AdministradorModel->actualizarItemCartera($valor,$id_cat))
    	{
    		$resultado = array(
    				"codigo" => 200,
    				"unique" => true,
    				"mensaje" => "Guardado correctamente."
    		);
    	}
    	else
    	{
    		 
    		 
    		$resultado = array(
    				"codigo" => 400,
    				"unique" => false,
    				"mensaje" => "No se logro guardar la informaci�n."
    		);
    		 
    	}
    	
    	ob_clean();
    	
    	echo json_encode($resultado);
    }
    
    
    public function AddProducto(){
    
    
    
    	$valor = $this->input->post('CatValor');
    	$cartera = $this->input->post('cartera');
    	
    
    
    
    	$resultado = array();
    
    	if ($this->AdministradorModel->guardarProducto($valor,$cartera))
    	{
    		$resultado = array(
    				"codigo" => 200,
    				"unique" => true,
    				"mensaje" => "Guardado correctamente."
    		);
    	}
    	else
    	{
    		 
    		 
    		$resultado = array(
    				"codigo" => 400,
    				"unique" => false,
    				"mensaje" => "No se logro guardar la informaci�n."
    		);
    		 
    	}
    
    	ob_clean();
    
    	echo json_encode($resultado);
    
    
    
    }
    
    
    public function EstatusCatalogoProductos(){
    
    
    
    
    	$id_item = $this->input->post('bajaDNI');
    	$estatus = $this->input->post('Estatus');
    
    	$resultado = array();
    
    	if ($this->AdministradorModel->estatusProductos($id_item,$estatus))
    	{
    		$resultado = array(
    				"codigo" => 200,
    				"unique" => true,
    				"mensaje" => "Operación realizada correctamente."
    		);
    	}
    	else
    	{
    		 
    		 
    		$resultado = array(
    				"codigo" => 400,
    				"unique" => false,
    				"mensaje" => "No se logro guardar la informaci�n."
    		);
    		 
    	}
    
    	ob_clean();
    	echo json_encode($resultado);
    
    
    
    }
    
    public function ActualizaCatalogoProductos(){
    
    		$valor = $this->input->post('editaValor');
    	$cartera = $this->input->post('Editcartera');
    	
    	$id_cat = $this->input->post('editaDNI');
    
    	$resultado = array();
    	 
    	if ($this->AdministradorModel->actualizarItemProductos($valor,$id_cat,$cartera))
    	{
    		$resultado = array(
    				"codigo" => 200,
    				"unique" => true,
    				"mensaje" => "Guardado correctamente."
    		);
    	}
    	else
    	{
    		 
    		 
    		$resultado = array(
    				"codigo" => 400,
    				"unique" => false,
    				"mensaje" => "No se logro guardar la informaci�n."
    		);
    		 
    	}
    	 
    	ob_clean();
    	 
    	echo json_encode($resultado);
    }
    
    public function AddEmpresa(){
    
    
    
    	$valor = $this->input->post('CatValor');
    	$corto = $this->input->post('CatAgrupa');
    	 
    
    
    
    	$resultado = array();
    
    	if ($this->AdministradorModel->guardarEmpresa($valor,$corto))
    	{
    		$resultado = array(
    				"codigo" => 200,
    				"unique" => true,
    				"mensaje" => "Guardado correctamente."
    		);
    	}
    	else
    	{
    		 
    		 
    		$resultado = array(
    				"codigo" => 400,
    				"unique" => false,
    				"mensaje" => "No se logro guardar la informaci�n."
    		);
    		 
    	}
    
    	ob_clean();
    
    	echo json_encode($resultado);
    
    
    
    }
    
    public function EstatusCatalogoEmpresa(){
    
    
    
    
    	$id_item = $this->input->post('bajaDNI');
    	$estatus = $this->input->post('Estatus');
    
    	$resultado = array();
    
    	if ($this->AdministradorModel->estatusEmpresa($id_item,$estatus))
    	{
    		$resultado = array(
    				"codigo" => 200,
    				"unique" => true,
    				"mensaje" => "Operación realizada correctamente."
    		);
    	}
    	else
    	{
    		 
    		 
    		$resultado = array(
    				"codigo" => 400,
    				"unique" => false,
    				"mensaje" => "No se logro guardar la informaci�n."
    		);
    		 
    	}
    
    	ob_clean();
    	echo json_encode($resultado);
    
    
    
    }
    
    public function ActualizaCatalogoEmpresa(){
    
    	$valor = $this->input->post('editaValor');
    	$corto = $this->input->post('editaParametro');
    	 
    	$id_cat = $this->input->post('editaDNI');
    
    	$resultado = array();
    
    	if ($this->AdministradorModel->actualizarItemEmpresa($valor,$id_cat,$corto))
    	{
    		$resultado = array(
    				"codigo" => 200,
    				"unique" => true,
    				"mensaje" => "Guardado correctamente."
    		);
    	}
    	else
    	{
    		 
    		 
    		$resultado = array(
    				"codigo" => 400,
    				"unique" => false,
    				"mensaje" => "No se logro guardar la informaci�n."
    		);
    		 
    	}
    
    	ob_clean();
    
    	echo json_encode($resultado);
    }
    
    public function AddOficina(){
    
    
    
    	$valor = $this->input->post('CatValor');
    	//$id_cat = $this->input->post('clabe');
    	$idOficina = $this->input->post('CatAgrupa');
    
    
    	$resultado = array();
    
    	if ($this->AdministradorModel->guardarOficina($valor,$idOficina))
    	{
    		$resultado = array(
    				"codigo" => 200,
    				"unique" => true,
    				"mensaje" => "Guardado correctamente."
    		);
    	}
    	else
    	{
    		 
    		 
    		$resultado = array(
    				"codigo" => 400,
    				"unique" => false,
    				"mensaje" => "No se logro guardar la informaci�n."
    		);
    		 
    	}
    
    	ob_clean();
    
    	echo json_encode($resultado);
    
    
    
    }
    
    
    public function EstatusCatalogoOficina(){
    
    
    
    
    	$id_item = $this->input->post('bajaDNI');
    	$estatus = $this->input->post('Estatus');
    
    	$resultado = array();
    
    	if ($this->AdministradorModel->estatusOficina($id_item,$estatus))
    	{
    		$resultado = array(
    				"codigo" => 200,
    				"unique" => true,
    				"mensaje" => "Operación realizada correctamente."
    		);
    	}
    	else
    	{
    		 
    		 
    		$resultado = array(
    				"codigo" => 400,
    				"unique" => false,
    				"mensaje" => "No se logro guardar la informaci�n."
    		);
    		 
    	}
    
    	ob_clean();
    	echo json_encode($resultado);
    
    
    
    }
    
    public function ActualizaCatalogoOficina(){
    
    	$valor = $this->input->post('editaValor');
    	$corto = $this->input->post('editaParametro');
    
    	$id_cat = $this->input->post('editaDNI');
    
    	$resultado = array();
    
    	if ($this->AdministradorModel->actualizarItemOficinas($valor,$id_cat,$corto))
    	{
    		$resultado = array(
    				"codigo" => 200,
    				"unique" => true,
    				"mensaje" => "Guardado correctamente."
    		);
    	}
    	else
    	{
    		 
    		 
    		$resultado = array(
    				"codigo" => 400,
    				"unique" => false,
    				"mensaje" => "No se logro guardar la informaci�n."
    		);
    		 
    	}
    
    	ob_clean();
    
    	echo json_encode($resultado);
    }
    
    public function AddPlaza(){
    
    
    
    	$valor = $this->input->post('CatValor');
    
    	
    
    	$resultado = array();
    
    	if ($this->AdministradorModel->guardarPlaza($valor))
    	{
    		$resultado = array(
    				"codigo" => 200,
    				"unique" => true,
    				"mensaje" => "Guardado correctamente."
    		);
    	}
    	else
    	{
    		 
    		 
    		$resultado = array(
    				"codigo" => 400,
    				"unique" => false,
    				"mensaje" => "No se logro guardar la informaci�n."
    		);
    		 
    	}
    
    	ob_clean();
    
    	echo json_encode($resultado);
    
    
    }
    
    
    public function EstatusCatalogoPlaza(){
    
    
    
    
    	$id_item = $this->input->post('bajaDNI');
    	$estatus = $this->input->post('Estatus');
    
    	$resultado = array();
    
    	if ($this->AdministradorModel->estatusPlaza($id_item,$estatus))
    	{
    		$resultado = array(
    				"codigo" => 200,
    				"unique" => true,
    				"mensaje" => "Operación realizada correctamente."
    		);
    	}
    	else
    	{
    		 
    		 
    		$resultado = array(
    				"codigo" => 400,
    				"unique" => false,
    				"mensaje" => "No se logro guardar la informaci�n."
    		);
    		 
    	}
    
    	ob_clean();
    	echo json_encode($resultado);
    
    
    }
    
    
    public function ActualizaCatalogoPlaza(){
    
    	$valor = $this->input->post('editaValor');
    	
    	$id_cat = $this->input->post('editaDNI');
    
    	$resultado = array();
    
    	if ($this->AdministradorModel->actualizarItemPlaza($valor,$id_cat))
    	{
    		$resultado = array(
    				"codigo" => 200,
    				"unique" => true,
    				"mensaje" => "Guardado correctamente."
    		);
    	}
    	else
    	{
    		 
    		 
    		$resultado = array(
    				"codigo" => 400,
    				"unique" => false,
    				"mensaje" => "No se logro guardar la informaci�n."
    		);
    		 
    	}
    
    	ob_clean();
    
    	echo json_encode($resultado);
    }
    
    public function AddDepartamento(){
    
    
    
    	$valor = $this->input->post('CatValor');
    	$empresa = $this->input->post('empresa');
    
    
    
    
    	$resultado = array();
    
    	if ($this->AdministradorModel->guardarDepartamento($valor,$empresa))
    	{
    		$resultado = array(
    				"codigo" => 200,
    				"unique" => true,
    				"mensaje" => "Guardado correctamente."
    		);
    	}
    	else
    	{
    		 
    		 
    		$resultado = array(
    				"codigo" => 400,
    				"unique" => false,
    				"mensaje" => "No se logro guardar la informaci�n."
    		);
    		 
    	}
    
    	ob_clean();
    
    	echo json_encode($resultado);
    
    
    
    }
    
    public function EstatusCatalogoDepartamento(){
    
    
    
    
    	$id_item = $this->input->post('bajaDNI');
    	$estatus = $this->input->post('Estatus');
    
    	$resultado = array();
    
    	if ($this->AdministradorModel->estatusDepartamento($id_item,$estatus))
    	{
    		$resultado = array(
    				"codigo" => 200,
    				"unique" => true,
    				"mensaje" => "Operación realizada correctamente."
    		);
    	}
    	else
    	{
    		 
    		 
    		$resultado = array(
    				"codigo" => 400,
    				"unique" => false,
    				"mensaje" => "No se logro guardar la informaci�n."
    		);
    		 
    	}
    
    	ob_clean();
    	echo json_encode($resultado);
    
    
    }
    
    
    
    public function ActualizaCatalogoDepartamento(){
    
    	$valor = $this->input->post('editaValor');
    	 
    	$empresa = $this->input->post('Editempresa');
    	
    	$id_cat = $this->input->post('editaDNI');
    
    	$resultado = array();
    
    	if ($this->AdministradorModel->actualizarItemDepartamento($valor,$id_cat,$empresa))
    	{
    		$resultado = array(
    				"codigo" => 200,
    				"unique" => true,
    				"mensaje" => "Guardado correctamente."
    		);
    	}
    	else
    	{
    		 
    		 
    		$resultado = array(
    				"codigo" => 400,
    				"unique" => false,
    				"mensaje" => "No se logro guardar la informaci�n."
    		);
    		 
    	}
    
    	ob_clean();
    
    	echo json_encode($resultado);
    }
    
    public function AddSala(){
    
    
    
    	$valor = $this->input->post('CatValor');
    	$direccion = $this->input->post('CatDireccion');
    	$capacidad = $this->input->post('CatCapacidad');
    	$oficina = $this->input->post('cartera');
    
    	 
    
    	$resultado = array();
    
    	if ($this->AdministradorModel->guardarSala($valor,$direccion,$capacidad,$oficina))
    	{
    		$resultado = array(
    				"codigo" => 200,
    				"unique" => true,
    				"mensaje" => "Guardado correctamente."
    		);
    	}
    	else
    	{
    		 
    		 
    		$resultado = array(
    				"codigo" => 400,
    				"unique" => false,
    				"mensaje" => "No se logro guardar la informaci�n."
    		);
    		 
    	}
    
    	ob_clean();
    
    	echo json_encode($resultado);
    
    
    }
    
    public function ActualizaCatalogoSalas(){
    
    	$valor = $this->input->post('editaValor');
    	$oficina = $this->input->post('Editcartera');
    	$direccion = $this->input->post('editDireccion');
    	$capacidad = $this->input->post('editCapacidad');
    	 
    	$id_cat = $this->input->post('editaDNI');
    
    	$resultado = array();
    
    	if ($this->AdministradorModel->actualizarItemSala($id_cat,$valor,$direccion,$capacidad,$oficina))
    	{
    		$resultado = array(
    				"codigo" => 200,
    				"unique" => true,
    				"mensaje" => "Guardado correctamente."
    		);
    	}
    	else
    	{
    		 
    		 
    		$resultado = array(
    				"codigo" => 400,
    				"unique" => false,
    				"mensaje" => "No se logro guardar la informaci�n."
    		);
    		 
    	}
    
    	ob_clean();
    
    	echo json_encode($resultado);
    }
    
    public function EstatusCatalogoSalas(){
    
    
    
    
    	$id_item = $this->input->post('bajaDNI');
    	$estatus = $this->input->post('Estatus');
    
    	$resultado = array();
    
    	if ($this->AdministradorModel->estatusSala($id_item,$estatus))
    	{
    		$resultado = array(
    				"codigo" => 200,
    				"unique" => true,
    				"mensaje" => "Operación realizada correctamente."
    		);
    	}
    	else
    	{
    		 
    		 
    		$resultado = array(
    				"codigo" => 400,
    				"unique" => false,
    				"mensaje" => "No se logro guardar la informaci�n."
    		);
    		 
    	}
    
    	ob_clean();
    	echo json_encode($resultado);
    
    
    }
    
    
    
}
