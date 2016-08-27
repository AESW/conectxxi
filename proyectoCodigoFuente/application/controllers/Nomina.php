<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require_once(APPPATH.'libraries/Sanitize.php');
require_once(APPPATH.'libraries/noi.php');


class Nomina extends CI_Controller {
	
	function __construct()
    {
        // Call the Model constructor
        parent::__construct();
        /*Necesario para validaciones de formulario, sanitizar variables $_POST y $_GET*/
        $this->load->helper('email');
        $this->load->library('form_validation');
        $this->Sanitize = new Sanitize();
        $this->noi = new noi();
        
        /*Mandar llamar modelos que requieran de actividades de BD*/
        $this->load->model('User');
        $this->load->model('NominaModel');
        $this->SessionL->validarSesion();
    }
    
	public function index()
	{
		$dataHeader = array(
			"titulo" => "N&oacute;mina"
		);
		
		
		$AltasUsuario = $this->NominaModel->obtenerAltasUsuario();
		
		$BajasUsuario = $this->NominaModel->obtenerBajasUsuario();
		
			
		$dataContent = array(
				"Altas" => $AltasUsuario,
				"Bajas" => $BajasUsuario
				
		);
		
		
		$this->load->view('includes/header' , $dataHeader);
		$this->load->view('nomina/nominas' , $dataContent);
		$this->load->view('includes/footer');
		
	}
	
	public function captura_mov_emp()
	{
		$dataHeader = array(
			"titulo" => "N&oacute;mina"
		);
		
			
		$dataContent = array();
		$this->load->view('includes/header' , $dataHeader);
		$this->load->view('nomina/captura_mov_emp' , $dataContent);
		$this->load->view('includes/footer');
		
	}	
        public function captura_mov_emp2()
	{
		$dataHeader = array(
			"titulo" => "N&oacute;mina"
		);
		
			
		$dataContent = array();
		$this->load->view('includes/header' , $dataHeader);
		$this->load->view('nomina/captura_mov_emp2' , $dataContent);
		$this->load->view('includes/footer');
		
	}	
        public function aclaracion_mov_emp()
	{
		$dataHeader = array(
			"titulo" => "N&oacute;mina"
		);
		
			
		$dataContent = array();
		$this->load->view('includes/header' , $dataHeader);
		$this->load->view('nomina/aclaracion_mov_emp' , $dataContent);
		$this->load->view('includes/footer');
		
	}	
       
        public function nomina_a_pagar()
	{
		$dataHeader = array(
			"titulo" => "N&oacute;mina"
		);
		
			
		$dataContent = array();
		$this->load->view('includes/header' , $dataHeader);
		$this->load->view('nomina/nomina_a_pagar' , $dataContent);
		$this->load->view('includes/footer');
		
	}	
	
	
	
	public function AltaUsuario()
	{
		$dataHeader = array(
				"titulo" => "Alta de Usuario - NOI"
		);
		/*Obtener datos de usuario, roles, modulos , permisos*/
		$sessionUser = $this->session->userdata('logged_in');
		
		$isReclutamiento = 0;
		$accionesReclutamiento = array();
		if( isset( $sessionUser["puesto"]["permisos"] ) ):
		foreach( $sessionUser["puesto"]["permisos"] as $permisos ):
		if( $permisos["prefijoModulos"] == "nomina"):
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
			
		
		$catEmpresas=$this->NominaModel->obtenerEmpresas();
//		$AltasUsuarios=$this->NominaModel->AltaUsuarios();
		
		$dataContent["Empresas"] = $catEmpresas;
	//	$dataContent["DatosUsuario"] = $AltasUsuarios;
		
		
		//print_r($AltasUsuarios);
		
		$this->load->view('includes/header' , $dataHeader);
		$this->load->view('nomina/control_personal' , $dataContent);
		$this->load->view('includes/footer');
	
	}
        
	function exportar() {
	
		 
	//	$this->load->library('noi');
		 
		
		$Usuarios=$this->input->post('AltaUsuario');
		$idEmpres=$this->input->post('empresa_contrata');
		
		
		if($idEmpres=="")
		{
			$empresa="";
			
		}
		else 
		{
		$sqlEmpresa = "SELECT nombreCorto FROM Empresas
				where idEmpresas = $idEmpres";
		
		$queryEmpresa = $this->db->query( $sqlEmpresa );
		
		$resultadoEmpresa = $queryEmpresa->result();
		
			
		foreach( $resultadoEmpresa as $entre):
	
				$empresa= $entre->nombreCorto;
		
		
		endforeach;
			
		
		}
		
		
		
		$table = $this->NominaModel->query($Usuarios);
		
		
	//	print_r($table);
	
		$this->noi->export($table,$empresa);
		
			
		
		//$this->load->view("Reportes");
	
	}
	
	public function UsuariosEmpresa()
	{
		
		
		
		
		if($this->input->post('empresa'))
		{
			$id = $this->input->post('empresa');
		
				
			$AltasUsuarios=$this->NominaModel->AltaUsuarios($id);
			?>
				
				
				<tr>
                <th>PATERNO</th>
                <th>MATERNO</th>
                <th>NOMBRE</th>
                <th>SDI</th>
                <th>PUESTO</th>
                <th>FECHA NACIMIENTO</th>
                <th>REG. PATRONAL</th>
                <th>OFICINA</th>
                <th>SELECCIONAR</th>      
</tr>

 <?php
			
					
					foreach($AltasUsuarios as $fila)
					{
						?>
						
			                 <tr> 			  	           
                <td><?php echo $fila->apeliidoPaterno; ?></td>
                <td><?php echo $fila->apellidoMaterno; ?></td>
                <td><?php echo $fila->nombre; ?></td>
                <td><?php echo $fila->sdi; ?></td>
                <td><?php echo $fila->puesto; ?></td>
                <td><?php echo $fila->fechaNacimiento; ?></td>
                <td><?php echo $fila->patronal; ?></td>
                <td><?php echo $fila->oficina; ?></td>
                <td><center> <input type="checkbox" name="AltaUsuario[]" value="<?php echo $fila->idCandidatoFDP; ?>" checked></center></td>
                  </tr>  
			            <?php
			            }
			        	
			        	
			        	 
			        }
		
	}
	
	public function BajaUsuario()
	{
		$dataHeader = array(
				"titulo" => "Baja de Usuario - NOI"
		);
		/*Obtener datos de usuario, roles, modulos , permisos*/
		$sessionUser = $this->session->userdata('logged_in');
	
		$isReclutamiento = 0;
		$accionesReclutamiento = array();
		if( isset( $sessionUser["puesto"]["permisos"] ) ):
		foreach( $sessionUser["puesto"]["permisos"] as $permisos ):
		if( $permisos["prefijoModulos"] == "nomina"):
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
			
	
		$catEmpresas=$this->NominaModel->obtenerEmpresas();
		//		$AltasUsuarios=$this->NominaModel->AltaUsuarios();
	
		$dataContent["Empresas"] = $catEmpresas;
		//	$dataContent["DatosUsuario"] = $AltasUsuarios;
	
	
		//print_r($AltasUsuarios);
	
		$this->load->view('includes/header' , $dataHeader);
		$this->load->view('nomina/baja_personal' , $dataContent);
		$this->load->view('includes/footer');
	
	}
	
	public function UsuariosEmpresaBaja()
	{
	
	
	
	
		if($this->input->post('empresa'))
		{
			$id = $this->input->post('empresa');
	
	
			$AltasUsuarios=$this->NominaModel->BajaUsuarios($id);
			?>
					
					
					<tr>
	                <th>PATERNO</th>
	                <th>MATERNO</th>
	                <th>NOMBRE</th>
	                <th>SDI</th>
	                <th>PUESTO</th>
	                <th>FECHA NACIMIENTO</th>
	                <th>REG. PATRONAL</th>
	                <th>OFICINA</th>
	                <th>SELECCIONAR</th>      
	</tr>
	
	 <?php
				
						
						foreach($AltasUsuarios as $fila)
						{
							?>
							
				                 <tr> 			  	           
	                <td><?php echo $fila->apeliidoPaterno; ?></td>
	                <td><?php echo $fila->apellidoMaterno; ?></td>
	                <td><?php echo $fila->nombre; ?></td>
	                <td><?php echo $fila->sdi; ?></td>
	                <td><?php echo $fila->puesto; ?></td>
	                <td><?php echo $fila->fechaNacimiento; ?></td>
	                <td><?php echo $fila->patronal; ?></td>
	                <td><?php echo $fila->oficina; ?></td>
	                <td><center> <input type="checkbox" name="AltaUsuario[]" value="<?php echo $fila->idCandidatoFDP; ?>" checked></center></td>
	                  </tr>  
				            <?php
				            }
				        	
				        	
				        	 
				        }
			
		}
	
}
