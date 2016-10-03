<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require_once(APPPATH.'libraries/Sanitize.php');
require_once(APPPATH.'libraries/noi.php');
require_once(APPPATH.'libraries/PHPExcel/IOFactory.php');


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
		
		$BajasDatos = $this->NominaModel->obtenerBajasDatos();
		
			
		$dataContent = array(
				"Altas" => $AltasUsuario,
				"Bajas" => $BajasUsuario,
				"BajasDatos" => $BajasDatos
				
		);
		
		//print_r($dataContent);
		
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
	
		
		$accion="ALTA";
	
		$this->noi->export($table,$empresa,$accion);
		
			
		
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
	              
	                <th>NOMBRE</th>
	              
	                <th>PUESTO</th>
	             
	                <th>REG. PATRONAL</th>
	                <th>OFICINA</th>
	                <th>SELECCIONAR</th>      
	</tr>
	
	 <?php
				
						
						foreach($AltasUsuarios as $fila)
						{
							?>
							
				                 <tr> 			  	           
	               
	                <td><?php echo $fila->nombreUsuario; ?></td>
	              
	                <td><?php echo $fila->Puesto; ?></td>
	              
	                <td><?php echo $fila->Empresa; ?></td>
	                <td><?php echo $fila->Oficina; ?></td>
	                <td><center> <input type="checkbox" name="AltaUsuario[]" value="<?php echo $fila->idUsuarios; ?>" checked></center></td>
	                  </tr>  
				            <?php
				            }
				        	
				        	
				        	 
				        }
			
		}
		
		function exportarBaja() {
		
				
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
		
		
		
			$table = $this->NominaModel->queryBajaUsuario($Usuarios);
		
		
			//	print_r($table);
			
			$accion="BAJA";
		
			$this->noi->export($table,$empresa,$accion);
		
				
		
			//$this->load->view("Reportes");
		
		}
		
		public function finiquito() {
			$dataHeader = array (
					"titulo" => "Finiquito"
			);
		
			$idCandidatoFDP = $this->input->get ( 'idBaja' );
		    $Datosusuarios = $this->NominaModel->Datosusuarios($idCandidatoFDP);
		    $Conceptos = $this->NominaModel->ConceptosFiniquito();
		
		
		
		
			$dataContent ["Datosusuarios"] = $Datosusuarios;
			$dataContent ["Conceptos"] = $Conceptos;
		
			// echo "<pre>";print_r($error_campos);
			//echo "<pre>";print_r($dataContent);
			//// echo "<pre>";print_r($resultado);
			// echo "<pre>";print_r($formArray);
		
			$this->load->view ( 'includes/header', $dataHeader );
			$this->load->view ( 'nomina/finiquito', $dataContent );
			$this->load->view ( 'includes/footer' );
		}
		
		function GuardaFiniquito() {
		
			
			$idusuario=$this->input->post('selecUsuario');
			
			$idBaja=$this->input->post('idBaja');
		
			$calificacion=$this->input->post('calificacion');
			$tema=$this->input->post('tema');
			$tipo=$this->input->post('tipo');
            $totalfiniquito=$this->input->post('total_finiquito');
		
			$resultado = array_merge($calificacion,$tema,$tipo);
		
		
			$sqlAlta = "update  SolBajasPersonal set finiquito=1,fechaFiniquito=now(),finiquitoTotal='$totalfiniquito' where idSolBajal=$idBaja" ;
		
		    $queryGrupo = $this->db->query($sqlAlta);
			
			$a=0;
		
			foreach( $calificacion as $key => $res ):
		
			$sqlInsertMetaDatos = 'INSERT INTO MetaDatosFiniquito ( prefijoMetaDatos , valorMetaDatos , idSolBajal , tipo ) VALUES( \''.$tema[$key].'\' , \''.$res.'\' , '.$idBaja.','.$tipo[$key].' );';
			$sqlInsert=$this->db->query( $sqlInsertMetaDatos );
		
			$a++;
		
			endforeach;
		
			if ($sqlInsert)
			{
				$resultado = array (
						"codigo" => 200,
						"exito" => true,
						"mensaje" => "Finiquito guardado correctamente."
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
		
		
		public function ImportDescuentos() {
			$dataHeader = array (
					"titulo" => "Descuentos"
			);
		
			
			
			$Descuentos = $this->NominaModel->SelDescuentos();
			$dataContent ["Descuentos"] = $Descuentos;
			// echo "<pre>";print_r($error_campos);
			//echo "<pre>";print_r($dataContent);
			//// echo "<pre>";print_r($resultado);
			//echo "<pre>";print_r($formArray);
		
		//	print_r($dataContent);
			
			$this->load->view ( 'includes/header', $dataHeader );
			$this->load->view ( 'nomina/historia_descuentos', $dataContent );
			$this->load->view ( 'includes/footer' );
		}
		
		
		function importcsv() {
			
			
			$dataHeader = array (
					"titulo" => "Importar Descuentos"
			);
		
		//	$this->load->library('upload');
		//	$this->load->library('csvimport');
		//	$this->load->library('csvreader');
			
		
			$this->load->library('session');
		
	
				$directorio="PerfilesDoc/upload";
				$file_path=  $_FILES["userfile"]["tmp_name"];
				$file_name=  $_FILES["userfile"]["name"];
		
				move_uploaded_file($file_path, $directorio."/".$file_name);
		
				$file_path=$directorio."/".$file_name;
		
	
				$datos["archivo"]=$file_path;
		
			

				$inputFileType = PHPExcel_IOFactory::identify($file_path);
				$objReader = PHPExcel_IOFactory::createReader($inputFileType);
				$objPHPExcel = $objReader->load($file_path);
				
				
				$sheet = $objPHPExcel->getSheet(0);
				$highestRow = $sheet->getHighestRow();
				$highestColumn = $sheet->getHighestColumn();
				
				//  Loop through each row of the worksheet in turn
				$armado="";
				
				for ($row = 1; $row <= $highestRow; $row++) {
					//  Read a row of data into an array
					$armado=$armado."<tr>";
					
					$rowData = $sheet->rangeToArray('A' . $row . ':' . $highestColumn . $row,
							NULL, TRUE, FALSE);
					foreach($rowData[0] as $k=>$v){
						
						
						if($k==5)
						{
							$v=date("Y-m-d", PHPExcel_Shared_Date::ExcelToPHP($v));
						
								
							
						}
						
						$armado=$armado."<td>".utf8_encode($v)."</td>";
					}
						$armado=$armado."</tr>";
						
				}
				
					
		
	$datos["Listar_campos"] = $armado;
	
	

	
	$this->load->view ( 'includes/header', $dataHeader );
    $this->load->view("nomina/importar_descuentos",$datos);
	$this->load->view ( 'includes/footer' );
					
		
		
		}
		
		
		
		function guardarexcel() {
				
				
			$dataHeader = array (
					"titulo" => "Importar Descuentos"
			);
		
		
		
			$file_path=$this->input->post('archivo');
		
			
			//$file_path='upload/pasodescuento.xlsx';
			
			$inputFileType = PHPExcel_IOFactory::identify($file_path);
			$objReader = PHPExcel_IOFactory::createReader($inputFileType);
			$objPHPExcel = $objReader->load($file_path);
		
		
			$sheet = $objPHPExcel->getSheet(0);
			$highestRow = $sheet->getHighestRow();
			$highestColumn = $sheet->getHighestColumn();
		
			//  Loop through each row of the worksheet in turn
			
		
			for ($row = 1; $row <= $highestRow; $row++) {
				//  Read a row of data into an array
				
				$sqlInsertMov = "INSERT INTO DescuentosAbono (numeroEmpleado,nombreEmpleado,concepto,Importe,movimiento,movimientoFecha) VALUES (";
						
				$rowData = $sheet->rangeToArray('A' . $row . ':' . $highestColumn . $row,
						NULL, TRUE, FALSE);
				foreach($rowData[0] as $k=>$v){
		
					
					if($k==0)
					{
		
					$sqlInsertMov=$sqlInsertMov.utf8_encode($v).",'";
					}
					else 
					{
						if($k==4)
						{
							$sqlInsertMov=$sqlInsertMov."1,'";
						}
						else
						{
							if($k==3)
							{
								$sqlInsertMov=$sqlInsertMov.$v."',";
							}
							else 
							{
								if($k==5)
								{
									$fecha=date("Y-m-d", PHPExcel_Shared_Date::ExcelToPHP($v));
										
									
									$sqlInsertMov=$sqlInsertMov.$fecha;
								}
								else 
								{
							$sqlInsertMov=$sqlInsertMov.$v."','";
								}
							}
						}
						
					}
					
					
				}
				
				$sqlInsertMov=$sqlInsertMov."')";
				
				
				$sqlInsert=$this->db->query( $sqlInsertMov );
		
			}
		
			
			if($sqlInsert)
			{
			
				redirect('Nomina/ImportDescuentos');
				
			}
			else {
				
				redirect('Nomina/ImportDescuentos');
				
			}
			
				
		
			
				
		
		
		}
		
		public function BuscarDescuento()
		{
		
		
			if($this->input->post('empresa')=='' && $this->input->post('fecha')=='')
		{
				
					        }
					        else {
					        	$id = $this->input->post('empresa');
					        	$fecha = $this->input->post('fecha');
					        	
					        	$Descuentos=$this->NominaModel->BuscarDescuentos($id,$fecha);
					        	?>
					        							
					        							
					        							 <tr>
					        	                <th>NUMERO DE EMPLEADO</th>
					        	                <th>NOMBRE DEL EMPLEADO</th>
					        	                <th>CONCEPTO</th>
					        	                <th>IMPORTE</th>
					        	                <th>TIPO DE MOVIMIENTO</th>
					        	                  <th>FECHA</th>
					        	              
					        	</tr>
					        			
					        			 <?php
					        						
					        								
					        			 if( !empty($Descuentos) ):
					        			 foreach($Descuentos as  $fila){
					        			 	?>
					        			 								  
					        			 					 <tr> 			  	           
					        			                 <td><?php echo $fila->numeroEmpleado; ?></td>
					        			                 <td><?php echo $fila->nombreEmpleado; ?></td>
					        			                 <td><?php echo $fila->concepto; ?></td>
					        			                 <td><?php echo $fila->Importe; ?></td>
					        			                 <td>Descuento</td>
					        			                 <td><?php echo $fila->movimientoFecha; ?></td>
					        			                  </tr>  
					        			                   <?php	  
					        			 								  }
					        			 									  endif;
					        						        	
					        						        	
					        						        	 
					        	
					        }
					        
					        
				
			}
	
			
			public function ImportAbonos() {
				$dataHeader = array (
						"titulo" => "Bonos"
				);
			
					
					
				$Abonos = $this->NominaModel->SelAbonos();
				$dataContent ["Abonos"] = $Abonos;
				// echo "<pre>";print_r($error_campos);
				//echo "<pre>";print_r($dataContent);
				//// echo "<pre>";print_r($resultado);
				//echo "<pre>";print_r($formArray);
			
				//	print_r($dataContent);
					
				$this->load->view ( 'includes/header', $dataHeader );
				$this->load->view ( 'nomina/historia_abonos', $dataContent );
				$this->load->view ( 'includes/footer' );
			}
			
			
			function importcsvAbonos() {
					
					
				$dataHeader = array (
						"titulo" => "Importar Bonos"
				);
			
			//	$this->load->library('upload');
			//	$this->load->library('csvimport');
			//	$this->load->library('csvreader');
					
			
				$this->load->library('session');
			
			
				$directorio="PerfilesDoc/upload";
				$file_path=  $_FILES["userfile"]["tmp_name"];
				$file_name=  $_FILES["userfile"]["name"];
			
				move_uploaded_file($file_path, $directorio."/".$file_name);
			
				$file_path=$directorio."/".$file_name;
			
			
				$datos["archivo"]=$file_path;
			
					
			
				$inputFileType = PHPExcel_IOFactory::identify($file_path);
				$objReader = PHPExcel_IOFactory::createReader($inputFileType);
				$objPHPExcel = $objReader->load($file_path);
			
			
				$sheet = $objPHPExcel->getSheet(0);
				$highestRow = $sheet->getHighestRow();
				$highestColumn = $sheet->getHighestColumn();
			
				//  Loop through each row of the worksheet in turn
				$armado="";
			
				for ($row = 1; $row <= $highestRow; $row++) {
					//  Read a row of data into an array
					$armado=$armado."<tr>";
						
					$rowData = $sheet->rangeToArray('A' . $row . ':' . $highestColumn . $row,
							NULL, TRUE, FALSE);
					foreach($rowData[0] as $k=>$v){
			
			
						if($k==5)
						{
							$v=date("Y-m-d", PHPExcel_Shared_Date::ExcelToPHP($v));
			
			
								
						}
			
						$armado=$armado."<td>".utf8_encode($v)."</td>";
					}
					$armado=$armado."</tr>";
			
				}
			
					
			
				$datos["Listar_campos"] = $armado;
			
			
			
			
				$this->load->view ( 'includes/header', $dataHeader );
				$this->load->view("nomina/importar_abonos",$datos);
				$this->load->view ( 'includes/footer' );
					
			
			
			}
			
			
			
			function guardarexcelAbonos() {
			
			
				$dataHeader = array (
						"titulo" => "Importar Bonos"
				);
			
			
			
			   $file_path=$this->input->post('archivo');
			
					
				
					
				$inputFileType = PHPExcel_IOFactory::identify($file_path);
				$objReader = PHPExcel_IOFactory::createReader($inputFileType);
				$objPHPExcel = $objReader->load($file_path);
			
			
				$sheet = $objPHPExcel->getSheet(0);
				$highestRow = $sheet->getHighestRow();
				$highestColumn = $sheet->getHighestColumn();
			
				//  Loop through each row of the worksheet in turn
					
			
				for ($row = 1; $row <= $highestRow; $row++) {
					//  Read a row of data into an array
			
					$sqlInsertMov = "INSERT INTO DescuentosAbono (numeroEmpleado,nombreEmpleado,concepto,Importe,movimiento,movimientoFecha) VALUES (";
			
					$rowData = $sheet->rangeToArray('A' . $row . ':' . $highestColumn . $row,
							NULL, TRUE, FALSE);
					foreach($rowData[0] as $k=>$v){
			
							
						if($k==0)
						{
			
							$sqlInsertMov=$sqlInsertMov.utf8_encode($v).",'";
						}
						else
						{
							if($k==4)
							{
								$sqlInsertMov=$sqlInsertMov."2,'";
							}
							else
							{
								if($k==3)
								{
									$sqlInsertMov=$sqlInsertMov.$v."',";
								}
								else
								{
									if($k==5)
									{
										$fecha=date("Y-m-d", PHPExcel_Shared_Date::ExcelToPHP($v));
			
											
										$sqlInsertMov=$sqlInsertMov.$fecha;
									}
									else
									{
										$sqlInsertMov=$sqlInsertMov.$v."','";
									}
								}
							}
			
						}
							
							
					}
			
					$sqlInsertMov=$sqlInsertMov."')";
			
			
					$sqlInsert=$this->db->query( $sqlInsertMov );
				
			
				}
			
					
				if($sqlInsert)
				{
						
					redirect('Nomina/ImportAbonos');
			
				}
				else {
			
					redirect('Nomina/ImportAbonos');
			
				}
					
			
			
					
			
			
			
			}
			
			public function BuscarAbono()
			{
			
			
				if($this->input->post('empresa')=='' && $this->input->post('fecha')=='')
				{
			
				}
				else {
					$id = $this->input->post('empresa');
					$fecha = $this->input->post('fecha');
			
					$Abonos=$this->NominaModel->BuscarAbonos($id,$fecha);
					?>
								        							
								        							
								        							 <tr>
								        	                <th>NUMERO DE EMPLEADO</th>
								        	                <th>NOMBRE DEL EMPLEADO</th>
								        	                <th>CONCEPTO</th>
								        	                <th>IMPORTE</th>
								        	                <th>TIPO DE MOVIMIENTO</th>
								        	                  <th>FECHA</th>
								        	              
								        	</tr>
								        			
								        			 <?php
								        						
								        								
								        			 if( !empty($Abonos) ):
								        			 foreach($Abonos as  $fila){
								        			 	?>
								        			 								  
								        			 					 <tr> 			  	           
								        			                 <td><?php echo $fila->numeroEmpleado; ?></td>
								        			                 <td><?php echo $fila->nombreEmpleado; ?></td>
								        			                 <td><?php echo $fila->concepto; ?></td>
								        			                 <td><?php echo $fila->Importe; ?></td>
								        			                 <td>Bono</td>
								        			                 <td><?php echo $fila->movimientoFecha; ?></td>
								        			                  </tr>  
								        			                   <?php	  
								        			 								  }
								        			 									  endif;
								        						        	
								        						        	
								        						        	 
								        	
								        }
			}  
}
