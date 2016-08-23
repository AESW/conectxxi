<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require_once(APPPATH.'libraries/Sanitize.php');


class Movimientos extends CI_Controller {
	
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
    
   // 	$movimientosCandidatosRH = $this->RecursoshumanosModel->obtenerMovimientosCandidatos();
    
    
   // 	$dataContent = array(
   // 			"isRRHH" => $isRRHH,
    //			"accionesRRHH" => $accionesRRHH,
    	//		"entrevistasRealizar" => $entrevistasRealizar,
    		//	"entrevistasRealizarSegundaParte" => $entrevistasRealizarSegundaParte,
   // 			"movimientos" => $movimientosCandidatosRH
    //	);
    
    	$this->load->view('includes/header' , $dataHeader);
    	$this->load->view('gerente/index' );
    	$this->load->view('includes/footer');
    
    }	
    
    public function NuevoPersonal()
    {
    	$dataHeader = array(
    			"titulo" => "Nuevo Personal"
    	);
    	/*Obtener datos de usuario, roles, modulos , permisos*/
    	$sessionUser = $this->session->userdata('logged_in');
    	//echo "<pre>";
    	//print_r( $sessionUser );die;
    
    	$DatosUsuario=$sessionUser['usuario']['nombreUsuario'];
    	
    	
    	$CatPuestos=$this->MovimientosModel->CatPuestos();
    	$CatCartera=$this->MovimientosModel->CatCartera();
    	$CatProductos=$this->MovimientosModel->CatProductos();
    	
    	
    	 	$dataContent = array(
    	 			"CatPuestos" => $CatPuestos,
    	 			"catalogos" => new Catalogos(),
    	 			"CatProductos" => $CatProductos,
    	 			"CatCartera" => $CatCartera,
    	 			"DatosUsuario" => $DatosUsuario
    		);
        
    	 	
    	 //	print_r($sessionUser);
    	 	
    	$this->load->view('includes/header' , $dataHeader);
    	$this->load->view('movimientos/NuevoPersonal',$dataContent );
    	$this->load->view('includes/footer');
    
    }
    
    public function GuardaVacante()
    {
    	
    	/*Obtener datos de usuario, roles, modulos , permisos*/
    	$sessionUser = $this->session->userdata('logged_in');
    	//echo "<pre>";
    	//print_r( $sessionUser );die;
    
    	$IdUsuario=$sessionUser['usuario']['idUsuarios'];
    	 
    	$error_campos = array();
    	
    	
    	$Cartera=$this->Sanitize->clean_string($_POST["Cartera"]);
    	$nomGerente=$this->Sanitize->clean_string($_POST["nomGerente"]);
    	$Producto=$this->Sanitize->clean_string($_POST["Producto"]);
    	$NumVacantes=$this->Sanitize->clean_string($_POST["NumVacantes"]);
    	$puestoSolicitado=$this->Sanitize->clean_string($_POST["puestoSolicitado"]);
    	$comentarios=$this->Sanitize->clean_string($_POST["comentarios"]);
    	$Motivo=$this->Sanitize->clean_string($_POST["Motivo"]);
    	
    	
    	if( $Cartera == "" ):
    	$error_campos[] = "Cartera";
    	endif;
    	if( $nomGerente == "" ):
    	$error_campos[] = "nomGerente";
    	endif;
    	
    	if( $Producto == "" ):
    	$error_campos[] = "Producto";
    	endif;
    	
    	if( $NumVacantes == "" ):
    	$error_campos[] = "NumVacantes";
    	endif;
    	if( $puestoSolicitado == "" ):
    	$error_campos[] = "puestoSolicitado";
    	endif;
    	if( $Motivo == "" ):
    	$error_campos[] = "Motivo";
    	endif;
    
    	
    	if( empty( $error_campos ) )
    	{
    	
   
    	$token=md5(time());
    	
    	 
    	$GuardaVacante=$this->MovimientosModel->GuardaVacante($Cartera,$nomGerente,$Producto,$NumVacantes,$puestoSolicitado,$comentarios,$Motivo,$IdUsuario,$token);
    	
    	if($GuardaVacante)
    	{
    	
    	$resultado = array(
    			"codigo" => 400,
    			"unique" => false,
    			"mensaje" => "Vacante Solicita Correctamente"
    	);
    	}
    	else 
    		
    	{
    		$resultado = array(
    				"codigo" => 200,
    				"unique" => false
    		);
    		
    		
    	}
    	}
    	else
    	{
    	
    		$resultado = array(
    				"codigo" => 200,
    				"unique" => false
    				
    		);
    	
    	
    	}
    	ob_clean();
    	
    	echo json_encode($resultado);
    	}
    	 
    	public function l_productos()
    	{
    		
    	
    	
    		if($this->input->post('Cartera'))
    		{
    			$id = $this->input->post('Cartera');
    	
    			
    			$clientes = $this->MovimientosModel->Productos($id);
    				
    				
    			?>
    					    		           			<option >Seleccionar Producto</option>
    					    		           			
    					    		           			 <?php
    				
    				foreach($clientes as $fila)
    				{
    					?>
    					
    		                <option value="<?php echo $fila->idProductos ?>"><?php echo $fila->nombreProducto ?></option>
    		            <?php
    		            }
    		        	
    		        	
    		        	 
    		        }
    		    }
    
}
