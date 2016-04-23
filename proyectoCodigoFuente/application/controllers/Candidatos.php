<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require_once(APPPATH.'libraries/Sanitize.php');
require(APPPATH.'libraries/UploadHandler.php');

class Candidatos extends CI_Controller {
	
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
        $this->load->model('Sepomex' , 'sepomex');
    }
    
	public function index()
	{
		
		$this->SessionL->validarSesionHome();
		
		$error_campos = array();
		if( isset($_POST["nombre_candidato"]) ):
			
			
			$arrayFormPart1 = array(
				"step_current" => $this->Sanitize->clean_string($_POST["step_current"]),
				"btn_fire" => $this->Sanitize->clean_string($_POST["btn_fire"]),
				"file_1" => ($_POST["file_1"]),
				"file_2" => ($_POST["file_2"]),
				"file_3" => ($_POST["file_3"]),
				"file_4" => ($_POST["file_4"]),
				"file_5" => ($_POST["file_5"]),
				"file_6" => ( isset( $_POST["file_6"] ) )?$_POST["file_6"]:array(),
				"nombre_candidato" => $this->Sanitize->clean_string($_POST["nombre_candidato"]),
				"apellido_paterno_candidato" => $this->Sanitize->clean_string($_POST["apellido_paterno_candidato"]),
				"apellido_materno_candidato" => $this->Sanitize->clean_string($_POST["apellido_materno_candidato"]),
				"nombre_preferido_candidato" => $this->Sanitize->clean_string($_POST["nombre_preferido_candidato"]),
				"fecha_nacimiento_candidato" => $this->Sanitize->clean_string($_POST["fecha_nacimiento_candidato"]),
				"pais_nacimiento_candidato" => $this->Sanitize->clean_string($_POST["pais_nacimiento_candidato"]),
				"estado_nacimiento_candidato" => $this->Sanitize->clean_string($_POST["estado_nacimiento_candidato"]),	
			);
			
			$arrayFormPart2 = array(
				"genero_candidato" => $this->Sanitize->clean_string($_POST["genero_candidato"]),
				"nivel_educativo_candidato" => $this->Sanitize->clean_string($_POST["nivel_educativo_candidato"]),
				"estado_civil_candidato" => $this->Sanitize->clean_string($_POST["estado_civil_candidato"]),
				"rfc_candidato" => $this->Sanitize->clean_string($_POST["rfc_candidato"]),
				"curp_candidato" => $this->Sanitize->clean_string($_POST["curp_candidato"]),
				"numero_segurosocial_candidato" => $this->Sanitize->clean_string($_POST["numero_segurosocial_candidato"]),
				"calle_no_candidato" => $this->Sanitize->clean_string($_POST["calle_no_candidato"]),
				"cp_candidato" => $this->Sanitize->clean_string($_POST["cp_candidato"]),
				"estado_domicilio_candidato" => $this->Sanitize->clean_string($_POST["estado_domicilio_candidato"]),
				"ciudad_domicilio_candidato" => $this->Sanitize->clean_string($_POST["ciudad_domicilio_candidato"]),
				"delegacion_domicilio_candidato" => $this->Sanitize->clean_string($_POST["delegacion_domicilio_candidato"]),
				"colonia_domicilio_candidato" => $this->Sanitize->clean_string($_POST["colonia_domicilio_candidato"]),
				"no_banios_candidato" => $this->Sanitize->clean_string($_POST["no_banios_candidato"]),
				"escolaridad_jefefamilia_candidato" => $this->Sanitize->clean_string($_POST["escolaridad_jefefamilia_candidato"]),
				"automovil_candidato" => $this->Sanitize->clean_string($_POST["automovil_candidato"]),
			);
			
			$arrayFormPart3 = array(
				"focos_vivienda_candidato" => $this->Sanitize->clean_string($_POST["focos_vivienda_candidato"]),
				"tv_color_candidato" => $this->Sanitize->clean_string($_POST["tv_color_candidato"]),
				"piso_vivienda_candidato" => $this->Sanitize->clean_string($_POST["piso_vivienda_candidato"]),
				"computadora_candidato" => $this->Sanitize->clean_string($_POST["computadora_candidato"]),
				"regadera_vivienda_candidato" => $this->Sanitize->clean_string($_POST["regadera_vivienda_candidato"]),
				"cuartos_vivienda_candidato" => $this->Sanitize->clean_string($_POST["cuartos_vivienda_candidato"]),
				"estufa_vivienda_candidato" => $this->Sanitize->clean_string($_POST["estufa_vivienda_candidato"]),
				"empleo_anterior1_candidato" => $this->Sanitize->clean_string($_POST["empleo_anterior1_candidato"]),
				"descripcion_empleo1_candidato" => $this->Sanitize->clean_string($_POST["descripcion_empleo1_candidato"]),
				"telefono_empleo1_candidato" => $this->Sanitize->clean_string($_POST["telefono_empleo1_candidato"]),
				"contacto_empleo1_candidato" => $this->Sanitize->clean_string($_POST["contacto_empleo1_candidato"]),
				"empleo_anterior2_candidato" => $this->Sanitize->clean_string($_POST["empleo_anterior2_candidato"]),
				"descripcion_empleo2_candidato" => $this->Sanitize->clean_string($_POST["descripcion_empleo2_candidato"]),
				"telefono_empleo2_candidato" => $this->Sanitize->clean_string($_POST["telefono_empleo2_candidato"]),
				"contacto_empleo2_candidato" => $this->Sanitize->clean_string($_POST["contacto_empleo2_candidato"]),
				"cuenta_con_cuenta_bancaria" => $this->Sanitize->clean_string($_POST["cuenta_con_cuenta_bancaria"])
			);
			
			$arrayFormPart4 = array(
				"empleo_anterior3_candidato" => $this->Sanitize->clean_string($_POST["empleo_anterior3_candidato"]),
				"descripcion_empleo3_candidato" => $this->Sanitize->clean_string($_POST["descripcion_empleo3_candidato"]),
				"telefono_empleo3_candidato" => $this->Sanitize->clean_string($_POST["telefono_empleo3_candidato"]),
				"contacto_empleo3_candidato" => $this->Sanitize->clean_string($_POST["contacto_empleo3_candidato"]),
				"telefono_casa_candidato" => $this->Sanitize->clean_string($_POST["telefono_casa_candidato"]),
				"telefono_movil_candidato" => $this->Sanitize->clean_string($_POST["telefono_movil_candidato"]),
				"telefono_otro_candidato" => $this->Sanitize->clean_string($_POST["telefono_otro_candidato"]),
				"correo_electronico_candidato" => $this->Sanitize->clean_email($_POST["correo_electronico_candidato"]),
				"nombre_completo_familiar_candidato" => $this->Sanitize->clean_string($_POST["nombre_completo_familiar_candidato"]),
				"parentesco_familiar_candidato" => $this->Sanitize->clean_string($_POST["parentesco_familiar_candidato"]),
				"nombre_dependiente_economico_candidato" => $_POST["nombre_dependiente_economico_candidato"],
				"genero_dependiente_economico_candidato" => $_POST["genero_dependiente_economico_candidato"],
				"fecha_nacimiento_dependiente_economico_candidato" => $_POST["fecha_nacimiento_dependiente_economico_candidato"],
				"parentesco_dependiente_economico_candidato" => $_POST["parentesco_dependiente_economico_candidato"],
				"nombre_contacto_emergencia_candidato" => $this->Sanitize->clean_string($_POST["nombre_contacto_emergencia_candidato"]),
				"parentesco_contacto_emergencia_candidato" => $this->Sanitize->clean_string($_POST["parentesco_contacto_emergencia_candidato"]),
				"telefono_casa_emergencia_candidato" => $this->Sanitize->clean_string($_POST["telefono_casa_emergencia_candidato"]),
				"telefono_movil_emergencia_candidato" => $this->Sanitize->clean_string($_POST["telefono_movil_emergencia_candidato"]),
				"numero_cuenta_candidato" => $this->Sanitize->clean_string($_POST["numero_cuenta_candidato"]),
				"clabe_interbancaria_candidato" => $this->Sanitize->clean_string($_POST["clabe_interbancaria_candidato"]),
				"banco_candidato" => $this->Sanitize->clean_string($_POST["banco_candidato"]),
			);
			
			
			
			
			//$this->input->set_cookie("formArray" , serialize($_POST) ,  3600);
			
			setcookie("formArray1", serialize($arrayFormPart1) , time() + (86400 * 30), "/");
			setcookie("formArray2", serialize($arrayFormPart2) , time() + (86400 * 30), "/");
			setcookie("formArray3", serialize($arrayFormPart3) , time() + (86400 * 30), "/");
			setcookie("formArray4", serialize($arrayFormPart4) , time() + (86400 * 30), "/");
			
			if( $_POST["btn_fire"] == "registrar"):
				//validar que no falten campos
				//guardar en la base de datos
				//enviar correo
				//registrar en la base
				//eliminar cookie
				//mensaje de enviado
				$resultado = array_merge( unserialize( $_COOKIE["formArray1"] ) , unserialize( $_COOKIE["formArray2"] ) , unserialize( $_COOKIE["formArray3"] ) , unserialize( $_COOKIE["formArray4"] ));
				
				$numeroDependientes = count( $resultado["nombre_dependiente_economico_candidato"] );
				
				$camposVacios = array();
				
				for( $x = 0; $x < $numeroDependientes; $x++):
					$items = array();
					if($resultado["nombre_dependiente_economico_candidato"][$x] == ""):
						$items[] = "nombre_dependiente_economico_candidato";
					endif;
					
					if($resultado["genero_dependiente_economico_candidato"][$x] == ""):
						$items[] = "genero_dependiente_economico_candidato";
					endif;
					
					if($resultado["fecha_nacimiento_dependiente_economico_candidato"][$x] == ""):
						$items[] = "fecha_nacimiento_dependiente_economico_candidato";
					endif;
					
					if($resultado["parentesco_dependiente_economico_candidato"][$x] == ""):
						$items[] = "parentesco_dependiente_economico_candidato";
					endif;
					if( count($items) > 0 ):
						$camposVacios[] = $items;
					endif;	
				endfor;
				
				if( $resultado["nombre_candidato"] == "" ):
					$error_campos[] = "nombre_candidato";
				endif;
				if( $resultado["apellido_paterno_candidato"] == "" ):
					$error_campos[] = "apellido_paterno_candidato";
				endif;
				if( $resultado["apellido_materno_candidato"] == "" ):
					$error_campos[] = "apellido_materno_candidato";	
				elseif( $resultado["nombre_preferido_candidato"] == "" ):
					$error_campos[] = "nombre_preferido_candidato";
				endif;
				if( $resultado["fecha_nacimiento_candidato"] == "" ):
					$error_campos[] = "fecha_nacimiento_candidato";
				endif;
				if( $resultado["pais_nacimiento_candidato"] == "" ):
					$error_campos[] = "pais_nacimiento_candidato";
				endif;
				if( $resultado["estado_nacimiento_candidato"] == "" ):
					$error_campos[] = "estado_nacimiento_candidato";
				endif;
				if( $resultado["genero_candidato"] == "" ):
					$error_campos[] = "genero_candidato";
				endif;
				if( $resultado["nivel_educativo_candidato"] == "" ):
					$error_campos[] = "nivel_educativo_candidato";
				endif;
				if( $resultado["estado_civil_candidato"] == "" ):
					$error_campos[] = "estado_civil_candidato";
				endif;
				if( $resultado["rfc_candidato"] == "" ):
					$error_campos[] = "rfc_candidato";
				endif;
				if( $resultado["curp_candidato"] == "" ):
					$error_campos[] = "curp_candidato";
				endif;
				if( $resultado["numero_segurosocial_candidato"] == "" ):
					$error_campos[] = "numero_segurosocial_candidato";
				endif;
				if( $resultado["calle_no_candidato"] == "" ):
					$error_campos[] = "calle_no_candidato";
				endif;
				if( $resultado["cp_candidato"] == "" ):
					$error_campos[] = "cp_candidato";
				endif;
				if( $resultado["estado_domicilio_candidato"] == "" ):
					$error_campos[] = "estado_domicilio_candidato";
				endif;
				if( $resultado["ciudad_domicilio_candidato"] == "" ):
					$error_campos[] = "ciudad_domicilio_candidato";
				endif;
				if( $resultado["delegacion_domicilio_candidato"] == "" ):
					$error_campos[] = "delegacion_domicilio_candidato";
				endif;
				if( $resultado["colonia_domicilio_candidato"] == "" ):
					$error_campos[] = "colonia_domicilio_candidato";
				endif;
				if( $resultado["no_banios_candidato"] == "" ):
					$error_campos[] = "no_banios_candidato";
				endif;
				if( $resultado["escolaridad_jefefamilia_candidato"] == "" ):
					$error_campos[] = "escolaridad_jefefamilia_candidato";
				endif;
				if( $resultado["automovil_candidato"] == "" ):
					$error_campos[] = "automovil_candidato";
				endif;
				if( $resultado["focos_vivienda_candidato"] == "" ):
					$error_campos[] = "focos_vivienda_candidato";
				endif;
				if( $resultado["tv_color_candidato"] == "" ):
					$error_campos[] = "tv_color_candidato";
				endif;
				if( $resultado["piso_vivienda_candidato"] == "" ):
					$error_campos[] = "piso_vivienda_candidato";
				endif;
				if( $resultado["computadora_candidato"] == "" ):
					$error_campos[] = "computadora_candidato";
				endif;
				if( $resultado["regadera_vivienda_candidato"] == "" ):
					$error_campos[] = "regadera_vivienda_candidato";
				endif;
				if( $resultado["cuartos_vivienda_candidato"] == "" ):
					$error_campos[] = "cuartos_vivienda_candidato";
				endif;
				if( $resultado["estufa_vivienda_candidato"] == "" ):
					$error_campos[] = "estufa_vivienda_candidato";
				endif;
				if( $resultado["empleo_anterior1_candidato"] == "" ):
					$error_campos[] = "empleo_anterior1_candidato";
				endif;
				if( $resultado["descripcion_empleo1_candidato"] == "" ):
					$error_campos[] = "descripcion_empleo1_candidato";
				endif;
				if( $resultado["telefono_empleo1_candidato"] == "" ):
					$error_campos[] = "telefono_empleo1_candidato";
				endif;
				if( $resultado["contacto_empleo1_candidato"] == "" ):
					$error_campos[] = "contacto_empleo1_candidato";
				endif;
				if( $resultado["empleo_anterior2_candidato"] == "" ):
					$error_campos[] = "empleo_anterior2_candidato";
				endif;
				if( $resultado["descripcion_empleo2_candidato"] == "" ):
					$error_campos[] = "descripcion_empleo2_candidato";
				endif;
				if( $resultado["telefono_empleo2_candidato"] == "" ):
					$error_campos[] = "telefono_empleo2_candidato";
				endif;
				if( $resultado["contacto_empleo2_candidato"] == "" ):
					$error_campos[] = "contacto_empleo2_candidato";
				endif;
				if( $resultado["cuenta_con_cuenta_bancaria"] == "" ):
					$error_campos[] = "cuenta_con_cuenta_bancaria";
				endif;
				if( $resultado["empleo_anterior3_candidato"] == "" ):
					$error_campos[] = "empleo_anterior3_candidato";
				endif;
				if( $resultado["descripcion_empleo3_candidato"] == "" ):
					$error_campos[] = "descripcion_empleo3_candidato";
				endif;
				if( $resultado["telefono_empleo3_candidato"] == "" ):
					$error_campos[] = "telefono_empleo3_candidato";
				endif;
				if( $resultado["contacto_empleo3_candidato"] == "" ):
					$error_campos[] = "contacto_empleo3_candidato";
				endif;
				if( $resultado["telefono_casa_candidato"] == "" ):
					$error_campos[] = "telefono_casa_candidato";
				endif;
				if( $resultado["telefono_movil_candidato"] == "" ):
					$error_campos[] = "telefono_movil_candidato";
				endif;
				if( $resultado["telefono_otro_candidato"] == "" ):
					$error_campos[] = "telefono_otro_candidato";
				endif;
				if( $resultado["correo_electronico_candidato"] == "" ):
					$error_campos[] = "correo_electronico_candidato";
				endif;
				if( $resultado["nombre_completo_familiar_candidato"] == "" ):
					$error_campos[] = "nombre_completo_familiar_candidato";
				endif;
				if( $resultado["parentesco_familiar_candidato"] == "" ):
					$error_campos[] = "parentesco_familiar_candidato";
				endif;
				if( $resultado["nombre_contacto_emergencia_candidato"] == "" ):
					$error_campos[] = "nombre_contacto_emergencia_candidato";
				endif;
				if( $resultado["parentesco_contacto_emergencia_candidato"] == "" ):
					$error_campos[] = "parentesco_contacto_emergencia_candidato";
				endif;
				if( $resultado["telefono_casa_emergencia_candidato"] == "" ):
					$error_campos[] = "telefono_casa_emergencia_candidato";
				endif;
				if( $resultado["telefono_movil_emergencia_candidato"] == "" ):
					$error_campos[] = "telefono_movil_emergencia_candidato";
				endif;
				if( $resultado["numero_cuenta_candidato"] == "" ):
					$error_campos[] = "numero_cuenta_candidato";
				endif;
				if( $resultado["clabe_interbancaria_candidato"] == "" ):
					$error_campos[] = "clabe_interbancaria_candidato";
				endif;
				if( $resultado["banco_candidato"] == "" ):
					$error_campos[] = "banco_candidato";
				endif;
				if( $resultado["file_1"] == "" ):
					$error_campos[] = "file_1";
				endif;
				if( $resultado["file_2"] == "" ):
					$error_campos[] = "file_2";	
				elseif( $resultado["file_3"] == "" ):
					$error_campos[] = "file_3";
				endif;
				if( $resultado["file_4"] == "" ):
					$error_campos[] = "file_4";
				endif;
				if( $resultado["file_5"] == "" ):
					$error_campos[] = "file_5";
				endif;
				if( count( $resultado["file_6"] ) < 3 ):
					$error_campos[] = "file_6";
				endif;
				
				if( !empty($camposVacios) ):
					$error_campos[] = "dependientes_economicos";
					$error_campos["campos_vacios"] = $camposVacios; 
				else:
					
					//guardar
					
					
				endif;
				
			else:
				redirect('/candidatos');	
			endif;
			
			
		endif;
		
		
		$dataHeader = array(
			"titulo" => "Formato de datos personales"
		);
		
		$dataContent = array();
		
		$resultado = array_merge( unserialize( $_COOKIE["formArray1"] ) , unserialize( $_COOKIE["formArray2"] ) , unserialize( $_COOKIE["formArray3"] ) , unserialize( $_COOKIE["formArray4"] ));
		
		$dataContent["formArray"] = (!empty($resultado))?($resultado):"";
		$dataContent["error_campos"] = $error_campos;
		
		
		$this->load->view('includes/header' , $dataHeader);
		$this->load->view('fdp/fdp' , $dataContent);
		$this->load->view('includes/footer');
		
		
	}
	
	
	
	public function server(){
		error_reporting(E_ALL | E_STRICT);
		
		$upload_handler = new UploadHandler(array(
													'accept_file_types' => '/\.(gif|jpe?g|png|pdf|doc|docx)$/i'
												 )
										    );
	}
	
	
	
	/*
		Obtener estados, municipios por código postal
	*/
	
	
	public function colonia(){
		
		$cp = $this->input->post('cp');		
		$data = $this->sepomex->sepomex($cp , '');
		   	       
		if( count($data) > 1 ):
	    ?>
		 <option >Seleccione una Colonia...</option>
		<?php
		else:
		 
		endif;
		
		foreach($data as $fila){
	    ?>
	     	<option><?php echo $fila->d_asenta; ?></option>
	    <?php
		}
		
	}


			    	        	    	        
	public function estado(){

		$cp = $this->input->post('cp');
	
		$estado = $this->sepomex->sepomex($cp , 'd_estado');
	
		foreach($estado as $fila){
?>
		     <option><?php echo $fila->d_estado;?></option>
<?php
		}
	}		    	        	    	   

	public function municipio(){

		$cp = $this->input->post('cp');
	
		$municipio = $this->sepomex->sepomex($cp , 'd_mnpio');
	
		if( count($municipio) > 0 ):
			foreach($municipio as $fila){
?>
			     <option><?php echo $fila->d_mnpio; ?></option>
<?php
			}
		else:
			echo "error";
		endif;
	}
	
}
