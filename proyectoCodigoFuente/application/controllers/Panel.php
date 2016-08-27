<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require_once(APPPATH.'libraries/Sanitize.php');


class Panel extends CI_Controller {
	
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
        $this->SessionL->validarSesion();
        
      
    }
    
	public function index()
	{
		$dataHeader = array(
			"titulo" => "Panel de usuario"
		);
		
			
		$dataContent = array();
		$this->load->view('includes/header' , $dataHeader);
		$this->load->view('panel/panel' , $dataContent);
		$this->load->view('includes/footer');
		
	}
	
	
		public function Inicio()
	{
		$sessionUser = $this->session->userdata('logged_in');
		
		$isReclutamiento = 0;
		$accionesReclutamiento = array();
		if( isset( $sessionUser["puesto"]["permisos"] ) ):
			foreach( $sessionUser["puesto"]["permisos"] as $permisos ):
				
				
				if( $permisos["prefijoModulos"] == "reclutamiento"):
					
					redirect("eaf/Reclutamiento");
				endif;
				
				if( $permisos["prefijoModulos"] == "recursos_humanos"):
					
					redirect("eaf/RecursosHumanos/");
				endif;
				if( $permisos["prefijoModulos"] == "gerente"):
					
					redirect("Gerente/");
				endif;
				
				if( $permisos["prefijoModulos"] == "director"):
					
					redirect("Direccion/");
				endif;
				
				if( $permisos["prefijoModulos"] == "supervisor"):
					
				redirect("Supervisor/");
				endif;
				
				
				if( $permisos["prefijoModulos"] == "nomina"):
					
				redirect("Nomina/");
				endif;
				
				if( $permisos["prefijoModulos"] == "capacitacion"):
					
				redirect("Capacitacion/");
				endif;
				
				
			endforeach;
		else:
			redirect("panel");
		endif;
		 
		if( $isReclutamiento == 0 ):
			redirect("panel");
		endif;
		
	}
	
	
	public function Jerarquia()
	{
		$dataHeader = array(
				"titulo" => "Jerarquia de usuario"
		);
	
		$sessionUser = $this->session->userdata('logged_in');
		$idUsuario=$sessionUser["usuario"]["idUsuarios"];
			
		$sqlObtenerUsuarios = "SELECT TaxPuestoUsuario.idUsuarios,if(TaxPuestoUsuario.idUsuarios= $idUsuario ,0,TaxPuestoUsuario.idUsuariosPadre) as Id_arbol,Usuarios.nombreUsuario as name FROM TaxPuestoUsuario left outer join Usuarios on TaxPuestoUsuario.idUsuarios = Usuarios.idUsuarios " ;
			
		$resultObtenerUsuarios = array();
			
		$queryObtenerUsuarios = $this->db->query($sqlObtenerUsuarios);
			
		if( $queryObtenerUsuarios->num_rows() > 0 ):
		$resultObtenerUsuarios = $queryObtenerUsuarios->result();
		
		
		foreach( $resultObtenerUsuarios as $pet):
		
		$peticiones[$pet->idUsuarios] = array(
				"idUsuarios" => $pet->idUsuarios,
				"Id_arbol" => $pet->Id_arbol,
				"name" => $pet->name
			
				
		);
		endforeach;
		
		
		
		endif;
			
	
		
		$dataContent = array(
				
			
				"Usuarios" =>$peticiones
		);
		
	
		 	
    	$this->load->view('includes/header' , $dataHeader);
    	$this->load->view('jerarquia/Jerarquia',$dataContent );
    	$this->load->view('includes/footer');
	}
	
	
	public function BuscarJerarquia()
	{
	
	
		
		if($this->input->post('empresa'))
		{
			$id = $this->input->post('empresa');
			
		}
		else 
			
		{
			$id = "ERROR";
			
		}
		
		
		
		$sessionUser = $this->session->userdata('logged_in');
		$idUsuario=$sessionUser["usuario"]["idUsuarios"];
			
		$sqlObtenerUsuarios = "SELECT TaxPuestoUsuario.idUsuarios,if(TaxPuestoUsuario.idUsuarios= $idUsuario ,0,TaxPuestoUsuario.idUsuariosPadre) as Id_arbol,Usuarios.nombreUsuario as name FROM TaxPuestoUsuario left outer join Usuarios on TaxPuestoUsuario.idUsuarios = Usuarios.idUsuarios " ;
			
		$resultObtenerUsuarios = array();
			
		$queryObtenerUsuarios = $this->db->query($sqlObtenerUsuarios);
			
		if( $queryObtenerUsuarios->num_rows() > 0 ):
		$resultObtenerUsuarios = $queryObtenerUsuarios->result();
		
		
		foreach( $resultObtenerUsuarios as $pet):
		
		$peticiones[$pet->idUsuarios] = array(
				"idUsuarios" => $pet->idUsuarios,
				"Id_arbol" => $pet->Id_arbol,
				"name" => $pet->name
					
		
		);
		endforeach;
		
		
		
		endif;
		
	
	
		echo "<span  id='paso' style='color:red;margin-top:0px;'>Busqueda completada, las coincidencias encontradas se marcaran en rojo:</span>";
		
		
	
		
	$this->createTree($id,$peticiones, 0);
	
	
	
			}
		
		
	
			
			function createTree($id,$array, $currentParent, $currLevel = 0, $prevLevel = -1) {
			
				
				
				foreach ($array as $categoryId => $category) {
			
					if ($currentParent == $category['Id_arbol']) {
						/*echo "<li>
						 <label for='folder2'>Folder 2</label> <input type='checkbox' id='folder2' />
						 <ol>
							<li class='file'><a href=''>File 1</a></li>
							<li>
							<label for='subfolder2'>Subfolder 1</label> <input type='checkbox' id='subfolder2' />
							<ol>
							<li class='file'><a href=''>Subfile 1</a></li>
							<li class='file'><a href=''>Subfile 2</a></li>
							<li class='file'><a href=''>Subfile 3</a></li>
							<li class='file'><a href=''>Subfile 4</a></li>
							<li class='file'><a href=''>Subfile 5</a></li>
							<li class='file'><a href=''>Subfile 6</a></li>
							</ol>
							</li>
							</ol>
							</li>";*/
						if ($currLevel > $prevLevel) echo " <ol class='tree'  > ";
			
						if ($currLevel == $prevLevel) echo " </li> ";
			
						$ruta=HOME_URL;
			
						
						
						$cadena_de_texto = strtoupper($category['name']);
						$cadena_buscada   = strtoupper($id);
						$posicion_coincidencia = strpos($cadena_de_texto, $cadena_buscada);
						
						
						
						//se puede hacer la comparacion con 'false' o 'true' y los comparadores '===' o '!=='
						if ($posicion_coincidencia === false) {
							$input=$category['name'];
						
							
						} else {
							
							
							
							$input="<font color='red'>".$category['name']."</font>";
							
							
						}
						
						
						
						echo "<li> <label for='subfolder2'><a href='".$ruta."Panel/UsuarioInfo/".$category['idUsuarios']."' TARGET='_new' style='text-decoration:none;' >".$input."</a></label> <input type='checkbox' checked  id='subfolder2'/>";
			
						if ($currLevel > $prevLevel) { $prevLevel = $currLevel; }
			
						$currLevel++;
			
					$this->createTree ($id,$array, $categoryId, $currLevel, $prevLevel);
			
						$currLevel--;
					}
			
				}
			
				if ($currLevel == $prevLevel) echo " </li>  </ol> ";
			
				
				
			}
			
			public function UsuarioInfo($id){
			
			
			
				$this->load->library('Pdf');
				
				
				
				
			
				$idUsuario=$id;
					
				$sqlObtenerUsuarios = "SELECT nombreUsuario,
			    (SELECT valorMetaDatos FROM UsuariosMetaDatos WHERE idUsuarios = Usuarios.idUsuarios and prefijoMetaDatos='oficina') as oficina,
				(SELECT valorMetaDatos FROM UsuariosMetaDatos WHERE idUsuarios = Usuarios.idUsuarios and prefijoMetaDatos='plaza') as plaza,
				(SELECT valorMetaDatos FROM UsuariosMetaDatos WHERE idUsuarios = Usuarios.idUsuarios and prefijoMetaDatos='fechaIngreso') as fechaIngreso,
				(SELECT valorMetaDatos FROM UsuariosMetaDatos WHERE idUsuarios = Usuarios.idUsuarios and prefijoMetaDatos='puesto') as puesto,
				(SELECT valorMetaDatos FROM UsuariosMetaDatos WHERE idUsuarios = Usuarios.idUsuarios and prefijoMetaDatos='descripcionDepartamento') as descripcionDepartamento,
				(SELECT valorMetaDatos FROM UsuariosMetaDatos WHERE idUsuarios = Usuarios.idUsuarios and prefijoMetaDatos='sueldoNOI') as sueldoNOI,
				(SELECT valorMetaDatos FROM UsuariosMetaDatos WHERE idUsuarios = Usuarios.idUsuarios and prefijoMetaDatos='empresa_contrata') as empresa_contrata,
				(SELECT valorMetaDatos FROM UsuariosMetaDatos WHERE idUsuarios = Usuarios.idUsuarios and prefijoMetaDatos='pagoExterno') as pagoExterno,
				(SELECT valorMetaDatos FROM UsuariosMetaDatos WHERE idUsuarios = Usuarios.idUsuarios and prefijoMetaDatos='corporativo') as corporativo
				FROM Usuarios where idUsuarios = $idUsuario " ;
					
				$resultObtenerUsuarios = array();
					
				$queryObtenerUsuarios = $this->db->query($sqlObtenerUsuarios);
					
				if( $queryObtenerUsuarios->num_rows() > 0 ):
				$resultObtenerUsuarios = $queryObtenerUsuarios->result();
				
				
				foreach( $resultObtenerUsuarios as $pet):
				
				
						$oficina = $pet->oficina;
						$plaza = $pet->plaza;
						$fechaIngresa = $pet->fechaIngreso;
						$puesto = $pet->puesto;
						$descripcionDepartamento = $pet->descripcionDepartamento;
						$sueldoNOI = $pet->sueldoNOI;
						$empresa_contrata = $pet->empresa_contrata;
						$pagoExterno = $pet->pagoExterno;
						$corporativo = $pet->corporativo;
						$nombreUsuario = $pet->nombreUsuario;
				
				
				endforeach;
				
				
				
				endif;
				
				
				
				
				$sqlObtenerUsuarios = "	SELECT Usuarios.nombreUsuario,(Select nombreDocumento from DocumentosUsuarios where prefijoDocumento='fotoCandidato' and idUsuarios=$idUsuario) as foto FROM  Usuarios  where idUsuarios = $idUsuario" ;
					
				$resultObtenerUsuarios = array();
					
				$queryObtenerUsuarios = $this->db->query($sqlObtenerUsuarios);
					
				if( $queryObtenerUsuarios->num_rows() > 0 ):
				$resultObtenerUsuarios = $queryObtenerUsuarios->result();
				
				
				foreach( $resultObtenerUsuarios as $pet):
				
				
				
				$fotoUsuario = $pet->foto;
				
				
				endforeach;
				
				else:
				
				
				$fotoUsuario="";
				
				endif;
				
				
				
				$sqlObtenerUsuarios = "	SELECT Usuarios.nombreUsuario FROM TaxPuestoUsuario left outer join Usuarios on Usuarios.idUsuarios= TaxPuestoUsuario.idUsuariosPadre where TaxPuestoUsuario.idUsuarios = $idUsuario" ;
					
				$resultObtenerUsuarios = array();
					
				$queryObtenerUsuarios = $this->db->query($sqlObtenerUsuarios);
					
				if( $queryObtenerUsuarios->num_rows() > 0 ):
				$resultObtenerUsuarios = $queryObtenerUsuarios->result();
				
				
				foreach( $resultObtenerUsuarios as $pet):
				
				
				$reporta = $pet->nombreUsuario;
				
				
				
				endforeach;
				
				else:
				
				$reporta = "";
				
				
				endif;
				
				

				$sqlObtenerUsuarios = "SELECT Usuarios.nombreUsuario FROM TaxPuestoUsuario left outer join Usuarios on Usuarios.idUsuarios= TaxPuestoUsuario.idUsuarios where TaxPuestoUsuario.idUsuariosPadre = $idUsuario	" ;
					
				$resultObtenerUsuarios = array();
					
				$queryObtenerUsuarios = $this->db->query($sqlObtenerUsuarios);
					
				if( $queryObtenerUsuarios->num_rows() > 0 ):
				$resultObtenerUsuarios = $queryObtenerUsuarios->result();
				
				
				$Lereportan="";
				
				foreach( $resultObtenerUsuarios as $pet):
				
				
				$Lereportan = $Lereportan.'<tr><td align="center"></td><td align="center">'.$pet->nombreUsuario.'</td></tr>';
				
				
				endforeach;
				
				else:
				
				$Lereportan = "";
				
				endif;
			
				
				$img='<div> <img src="./assets/images/Logo_legaxxi.png" alt="LEGAXXI" height="110" width="110" align="middle"></div>';
				
				$foto='<div> <img src="./documentosUsuarios/'.$fotoUsuario.'" alt="FOTO" height="110" width="110" align="middle"></div>';
				
				
				
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
				$pdf->SetFont('helvetica', '', 9, '', true);
					
				// Add a page
				// This method has several options, check the source code documentation for more information.
				$pdf->AddPage();
					
				// set text shadow effect
				$pdf->setTextShadow(array('enabled'=>true, 'depth_w'=>0.2, 'depth_h'=>0.2, 'color'=>array(196,196,196), 'opacity'=>1, 'blend_mode'=>'Normal'));
					
				// Set some content to print
				$html = <<<EOD
			    	
				
				
<table border="1" cellspacing="0" cellpadding="0" >
<tbody>
<tr>
<td width="20%" rowspan="3"> $img</td>
<td width="60%" align="center" rowspan="3"><b><h3>CATÃ�LOGO INSTITUCIONAL DE PUESTOS</h3><br><p color="green">LEGAXXI</p><br><p color="green">FICHA DEL EMPLEADO</p></b></td>
<td width="20%" rowspan="3"> $foto</td>
</tr>

</tbody>
</table>
<p>
				
<table border="1" cellspacing="0" cellpadding="0" >
<tbody>
<tr bgcolor="#C0C0C0">
<td style="font-size:130%;"heigth="150px" colspan="4"><b>1)IDENTIFICACIÃ“N DEL PUESTO</b></td>
</tr>
<tr bgcolor="#C0C0C0">
<td align="center" colspan="4"><b>DATOS GENERALES</b></td>
</tr>
<tr>
<td><b> Nombre del empleado</b></td>
<td><b> $nombreUsuario</b></td>
<td><b> Empresa que contrata</b></td>
<td> $empresa_contrata</td>
</tr>
<tr>
<td><b> Nombre del puesto</b></td>
<td> $puesto</td>
<td><b> Ã�rea o departamento</b></td>
<td> $descripcionDepartamento</td>
</tr>
<tr>
<td><b> Plaza</b></td>
<td> $plaza</td>
<td><b> Oficina</b></td>
<td> $oficina</td>
</tr>
<tr>
<td><b> Corporativo</b></td>
<td> $corporativo</td>
<td><b> Fecha de Ingreso</b></td>
<td> $fechaIngresa</td>
</tr>
<tr>
<td><b> Sueldo Mensual</b></td>
<td> $sueldoNOI</td>
<td><b> Sueldo Sinergia</b></td>
<td> $pagoExterno</td>
</tr>
</tbody>
</table>
<p></p>
<table border="1" cellspacing="0" cellpadding="0" >
<tbody>
<tr bgcolor="#C0C0C0">
<td  align="center" colspan="2"><b>CADENA DE MANDO</b></td>
</tr>
<tr>
<td bgcolor="#C0C0C0" align="center"><b>A QUIEN LE REPORTA</b></td>
<td  bgcolor="#C0C0C0" align="center"><b>QUIEN LE REPORTA</b></td>
</tr>
<tr>
<td align="center">$reporta</td>
<td align="center"></td>		
</tr>
$Lereportan
</table>
<p></p>

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
			
}
