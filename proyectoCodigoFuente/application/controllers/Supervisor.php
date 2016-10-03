<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require_once(APPPATH.'libraries/Sanitize.php');


class Supervisor extends CI_Controller {
	
	function __construct()
    {
        // Call the Model constructor
        parent::__construct();
        /*Necesario para validaciones de formulario, sanitizar variables $_POST y $_GET*/
        $this->load->helper('email');
        $this->load->library('form_validation');
        $this->Sanitize = new Sanitize();
        $this->load->model('SupervisorModel');
        
        /*Mandar llamar modelos que requieran de actividades de BD*/
        $this->load->model('User');
        $this->SessionL->validarSesion();
    }
    
	public function index()
	{
		$dataHeader = array(
			"titulo" => "Supervisor"
		);
		
			
		$dataContent = array();
		$this->load->view('includes/header' , $dataHeader);
		$this->load->view('supervisor/tablero_movimientos' , $dataContent);
		$this->load->view('includes/footer');
		
	}
        
        public function control_personal()
	{
		$dataHeader = array(
			"titulo" => "Supervisor"
		);
		
			
		$dataContent = array();
		$this->load->view('includes/header' , $dataHeader);
		$this->load->view('supervisor/control_personal' , $dataContent);
		$this->load->view('includes/footer');
		
	}
        
        public function reporte_asistencia()
	{
		$dataHeader = array(
			"titulo" => "Reportes Supervisor"
		);
		
			
	
		
		
		$this->load->view('includes/header' , $dataHeader);
		$this->load->view('supervisor/reporte_asistencia' , $dataContent);
		$this->load->view('includes/footer');
		
	}
	
	
	public function Asistencia()
	{
		$dataHeader = array(
				"titulo" => "Control de Personal"
		);
		/*Obtener datos de usuario, roles, modulos , permisos*/
		$sessionUser = $this->session->userdata('logged_in');
		
		$isReclutamiento = 0;
		$accionesReclutamiento = array();
		if( isset( $sessionUser["puesto"]["permisos"] ) ):
		foreach( $sessionUser["puesto"]["permisos"] as $permisos ):
		if( $permisos["prefijoModulos"] == "supervisor"):
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
			
		
			$sqlCatalogos = 'SELECT * from catalogos left outer join cat_detalle on catalogos.id=cat_detalle.id_catalogo
    left outer join ObjetosCatalogo
    on catalogos.id=ObjetosCatalogo.idCatalogo where cat_detalle.estatus=1';
		$queryCatalogos = $this->db->query($sqlCatalogos);
		$dataContent["Catalogos"] = $queryCatalogos->result();
		
		
	//	print_r($sessionUser);
		
		$this->load->view('includes/header' , $dataHeader);
		$this->load->view('supervisor/asistencia' , $dataContent);
		$this->load->view('includes/footer');
	}
       
	
	public function Personal()
	{
	
	
	
	
		if($this->input->post('empresa'))
		{
			$id = $this->input->post('empresa');
	
			$sessionUser = $this->session->userdata('logged_in');
			$idUsuario=$sessionUser["usuario"]["idUsuarios"];
			
			$AltasUsuarios=$this->SupervisorModel->obtenerPersonal($id,$idUsuario);
			?>
					
					
					<tr>
	              
	              
	               
	                <th style="text-align:right;">CONTROL</th>
	                	                <th>NOMBRE</th>
	                      
	</tr>
	
	 <?php
				
						
						foreach($AltasUsuarios as $fila)
						{
							?>
							
				                 <tr> 			  	           
	              
	            
	                <td style="text-align:right;"> <input style="margin-right:10px;" type="checkbox" name="AltaUsuario[]" value="<?php echo $fila->idUsuarios; ?>" checked></td>
	                  <td><?php echo $fila->nombreUsuario; ?></td>
	                  </tr>  
				            <?php
				            }
				        	
				        	
				        	 
				        }
			
			
			
			
		
		
		
		}
	
		function AltaAsistencia() {
		
		
				
		
			$Usuarios=$this->input->post('AltaUsuario');
			$idturno=$this->input->post('turno');
		
			$sessionUser = $this->session->userdata('logged_in');
			$idUsuario=$sessionUser["usuario"]["idUsuarios"];
			
			
		
			foreach ($Usuarios as $record)
			{
			
				
				
				$sqlAsistencia = "Insert into Asistencia (turno,fechaAsistencia,Usuarios_idUsuarios,idUsuariosPadre) values ('$idturno',now(),$record,$idUsuario)" ;
				
			
				
				$queryAsistencia = $this->db->query($sqlAsistencia);
				
				
			}
			$dataHeader = array(
					"titulo" => "Control de Usuario"
			);
		
			
			$dataContent["mensaje"] = true;
			
			$this->load->view('includes/header' , $dataHeader);
			$this->load->view('supervisor/asistencia', $dataContent);
			$this->load->view('includes/footer');
				
		
			//$this->load->view("Reportes");
		
		} 
}
