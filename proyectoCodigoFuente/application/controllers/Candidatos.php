<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require_once(APPPATH.'libraries/Sanitize.php');
require(APPPATH.'libraries/UploadHandler.php');
require_once(APPPATH.'libraries/class.phpmailer.php');

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
				"fecha_nacimiento_candidato" => $_POST["fecha_nacimiento_candidato"],
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
					$hashValidacion = md5( uniqid(microtime()));
					$fechaRegistro = date('Y-m-d H:i:s');
					//insertar candidato primero
					$sqlInsertCandidato = 'INSERT INTO CandidatoFDP (
												nombre, 
												apeliidoPaterno, 
												apellidoMaterno, 
												fechaNacimiento, 
												paisNacimiento, 
												estadoNacimiento, 
												genero, 
												nivelEducativo, 
												estadoCivil, 
												rfcCandidato, 
												curpCandidato, 
												numeroSeguroSocial,
												fechaRegistro,
												hashValidacion,
												estaValidado,
												correoElectronico
											) VALUES ( 
												\''.$resultado["nombre_candidato"].'\',
												\''.$resultado["apellido_paterno_candidato"].'\',
												\''.$resultado["apellido_materno_candidato"].'\',
												\''.$resultado["fecha_nacimiento_candidato"].'\',
												\''.$resultado["pais_nacimiento_candidato"].'\',
												\''.$resultado["estado_nacimiento_candidato"].'\',
												\''.$resultado["genero_candidato"].'\',
												\''.$resultado["nivel_educativo_candidato"].'\',
												\''.$resultado["estado_civil_candidato"].'\',
												\''.$resultado["rfc_candidato"].'\',
												\''.$resultado["curp_candidato"].'\',
												\''.$resultado["numero_segurosocial_candidato"].'\',
												\''.$fechaRegistro.'\',
												\''.$hashValidacion.'\',
												0,
												\''.$resultado["correo_electronico_candidato"].'\'
											);';
					$insertCandidao = $this->db->query($sqlInsertCandidato);
					$candidatoInsertID = $this->db->insert_id();
					
					
					
					if( file_exists(FCPATH.'tempFDP/files/'.$resultado["file_1"]) ):
						if( rename( FCPATH.'tempFDP/files/'.$resultado["file_1"] , FCPATH.'candidatosFDP/'.$resultado["file_1"])):
							$sqlInsertArchivo = 'INSERT INTO ArchivosFDP (idCandidatoFDP , nombreArchivo , prefijoArchivo) VALUES( '.$candidatoInsertID.' , \''.$resultado["file_1"].'\' , \'file_1\');';
							$this->db->query( $sqlInsertArchivo );
							unlink( FCPATH.'tempFDP/files/'.$resultado["file_1"] );
							unlink( FCPATH.'tempFDP/files/thumbnail/'.$resultado["file_1"] );
						endif;
					endif;
					
					if( file_exists(FCPATH.'tempFDP/files/'.$resultado["file_2"]) ):
						if( rename( FCPATH.'tempFDP/files/'.$resultado["file_2"] , FCPATH.'candidatosFDP/'.$resultado["file_2"])):
							$sqlInsertArchivo = 'INSERT INTO ArchivosFDP (idCandidatoFDP , nombreArchivo , prefijoArchivo) VALUES( '.$candidatoInsertID.' , \''.$resultado["file_2"].'\' , \'file_2\');';
							$this->db->query( $sqlInsertArchivo );
							unlink( FCPATH.'tempFDP/files/'.$resultado["file_2"] );
							unlink( FCPATH.'tempFDP/files/thumbnail/'.$resultado["file_2"] );
						endif;
					endif;
					
					if( file_exists(FCPATH.'tempFDP/files/'.$resultado["file_3"]) ):
						if( rename( FCPATH.'tempFDP/files/'.$resultado["file_3"] , FCPATH.'candidatosFDP/'.$resultado["file_3"])):
							$sqlInsertArchivo = 'INSERT INTO ArchivosFDP (idCandidatoFDP , nombreArchivo , prefijoArchivo) VALUES( '.$candidatoInsertID.' , \''.$resultado["file_3"].'\' , \'file_3\');';
							$this->db->query( $sqlInsertArchivo );
							unlink( FCPATH.'tempFDP/files/'.$resultado["file_3"] );
							unlink( FCPATH.'tempFDP/files/thumbnail/'.$resultado["file_3"] );
						endif;
					endif;
					
					if( file_exists(FCPATH.'tempFDP/files/'.$resultado["file_4"]) ):
						if( rename( FCPATH.'tempFDP/files/'.$resultado["file_4"] , FCPATH.'candidatosFDP/'.$resultado["file_4"])):
							$sqlInsertArchivo = 'INSERT INTO ArchivosFDP (idCandidatoFDP , nombreArchivo , prefijoArchivo) VALUES( '.$candidatoInsertID.' , \''.$resultado["file_4"].'\' , \'file_4\');';
							$this->db->query( $sqlInsertArchivo );
							unlink( FCPATH.'tempFDP/files/'.$resultado["file_4"] );
							unlink( FCPATH.'tempFDP/files/thumbnail/'.$resultado["file_4"] );
						endif;
					endif;
					
					if( file_exists(FCPATH.'tempFDP/files/'.$resultado["file_5"]) ):
						if( rename( FCPATH.'tempFDP/files/'.$resultado["file_5"] , FCPATH.'candidatosFDP/'.$resultado["file_5"])):
							$sqlInsertArchivo = 'INSERT INTO ArchivosFDP (idCandidatoFDP , nombreArchivo , prefijoArchivo) VALUES( '.$candidatoInsertID.' , \''.$resultado["file_5"].'\' , \'file_5\');';
							$this->db->query( $sqlInsertArchivo );
							unlink( FCPATH.'tempFDP/files/'.$resultado["file_5"] );
							unlink( FCPATH.'tempFDP/files/thumbnail/'.$resultado["file_5"] );
						endif;
					endif;
						
					
					
					
					
					
					if( !empty( $resultado["file_6"] ) ):
						foreach($resultado["file_6"] as $file6):
							if( $file6 != "" ):
								if( file_exists(FCPATH.'tempFDP/files/'.$file6) ):
									if( rename( FCPATH.'tempFDP/files/'.$file6 , FCPATH.'candidatosFDP/'.$file6)):
										
										$sqlInsertArchivo = 'INSERT INTO ArchivosFDP (idCandidatoFDP , nombreArchivo , prefijoArchivo) VALUES( '.$candidatoInsertID.' , \''.$file6.'\' , \'file_6\');';
										$this->db->query( $sqlInsertArchivo );
										unlink( FCPATH.'tempFDP/files/'.$file6 );
										unlink( FCPATH.'tempFDP/files/thumbnail/'.$file6 );
									endif;		
								endif;			
							endif;
						endforeach;
					endif;
					
					$insertArchivos = $this->db->query( $sqlInsertArchivo );
					
					
					$metasCandidato = $resultado;
					unset( $metasCandidato["nombre_candidato"] );
					unset( $metasCandidato["apellido_paterno_candidato"] );
					unset( $metasCandidato["apellido_materno_candidato"] );
					unset( $metasCandidato["fecha_nacimiento_candidato"] );
					unset( $metasCandidato["pais_nacimiento_candidato"] );
					unset( $metasCandidato["estado_nacimiento_candidato"] );
					unset( $metasCandidato["genero_candidato"] );
					unset( $metasCandidato["nivel_educativo_candidato"] );
					unset( $metasCandidato["estado_civil_candidato"] );
					unset( $metasCandidato["rfc_candidato"] );
					unset( $metasCandidato["curp_candidato"] );
					unset( $metasCandidato["numero_segurosocial_candidato"] );
					unset( $metasCandidato["file_1"] );
					unset( $metasCandidato["file_2"] );
					unset( $metasCandidato["file_3"] );
					unset( $metasCandidato["file_4"] );
					unset( $metasCandidato["file_5"] );
					unset( $metasCandidato["file_6"] );
					unset( $metasCandidato["step_current"] );
					unset( $metasCandidato["btn_fire"] );
					unset( $metasCandidato["nombre_dependiente_economico_candidato"] );
					unset( $metasCandidato["genero_dependiente_economico_candidato"] );
					unset( $metasCandidato["fecha_nacimiento_dependiente_economico_candidato"] );
					unset( $metasCandidato["parentesco_dependiente_economico_candidato"] );
					unset( $metasCandidato["correo_electronico_candidato"] );
					
					/*AMAI*/
					$NoBanos = $resultado["no_banios_candidato"];
					$dataScoring = array();
					if( $NoBanos == 0 ):
						$dataScoring["amai_banos"] = array("scoring" => 0 , "respuesta" => "No tener" );	
					elseif( $NoBanos == 1 ):
						$dataScoring["amai_banos"] = array("scoring" => 13 , "respuesta" => "1" );
					elseif ( $NoBanos == 2 ):
						$dataScoring["amai_banos"] = array("scoring" => 13 , "respuesta" => "2" );
					elseif ( $NoBanos == 3 ):
						$dataScoring["amai_banos"] = array("scoring" => 31 , "respuesta" => "3" );
					elseif ( $NoBanos == 4 ):
						$dataScoring["amai_banos"] = array("scoring" => 48 , "respuesta" => "4" );
					endif;
					
					$NoAutomoviles = $resultado["automovil_candidato"];
					if( $NoAutomoviles == 0 ):
						$dataScoring["amai_automoviles"] = array("scoring" => 0 , "respuesta" => "No tener" );	
					elseif( $NoAutomoviles == 1 ):
						$dataScoring["amai_automoviles"] = array("scoring" => 22 , "respuesta" => "1" );
					elseif ( $NoAutomoviles == 2 ):
						$dataScoring["amai_automoviles"] = array("scoring" => 41 , "respuesta" => "2" );
					elseif ( $NoAutomoviles == 3 ):
						$dataScoring["amai_automoviles"] = array("scoring" => 58 , "respuesta" => "3" );
					elseif ( $NoAutomoviles == 4 ):
						$dataScoring["amai_automoviles"] = array("scoring" => 58 , "respuesta" => "4" );
					endif;
					
					$TvColor = $resultado["tv_color_candidato"];
					if( $TvColor == 0 ):
						$dataScoring["amai_tv_color"] = array("scoring" => 0 , "respuesta" => "No tener" );	
					elseif( $TvColor == 1 ):
						$dataScoring["amai_tv_color"] = array("scoring" => 26 , "respuesta" => "1" );
					elseif ( $TvColor == 2 ):
						$dataScoring["amai_tv_color"] = array("scoring" => 44 , "respuesta" => "2" );
					elseif ( $TvColor == 3 ):
						$dataScoring["amai_tv_color"] = array("scoring" => 58 , "respuesta" => "3" );
					elseif ( $TvColor == 4 ):
						$dataScoring["amai_tv_color"] = array("scoring" => 58 , "respuesta" => "4" );
					endif;
					
					$Computadoras = $resultado["computadora_candidato"];
					if( $Computadoras == 0 ):
						$dataScoring["amai_computadoras"] = array("scoring" => 0 , "respuesta" => "No tener" );	
					elseif( $Computadoras == 1 ):
						$dataScoring["amai_computadoras"] = array("scoring" => 17 , "respuesta" => "1" );
					elseif ( $Computadoras == 2 ):
						$dataScoring["amai_computadoras"] = array("scoring" => 29 , "respuesta" => "2" );
					elseif ( $Computadoras == 3 ):
						$dataScoring["amai_computadoras"] = array("scoring" => 29 , "respuesta" => "3" );
					elseif ( $Computadoras == 4 ):
						$dataScoring["amai_computadoras"] = array("scoring" => 29 , "respuesta" => "4" );
					endif;
					
					$Cuartos = $resultado["cuartos_vivienda_candidato"];
					if( $Cuartos == 0 ):
						$dataScoring["amai_cuartos"] = array("scoring" => 0 , "respuesta" => "No tener" );	
					elseif( $Cuartos == 1 ):
						$dataScoring["amai_cuartos"] = array("scoring" => 0 , "respuesta" => "1" );
					elseif ( $Cuartos == 2 ):
						$dataScoring["amai_cuartos"] = array("scoring" => 0 , "respuesta" => "2" );
					elseif ( $Cuartos == 3 ):
						$dataScoring["amai_cuartos"] = array("scoring" => 0 , "respuesta" => "3" );
					elseif ( $Cuartos == 4 ):
						$dataScoring["amai_cuartos"] = array("scoring" => 0 , "respuesta" => "4" );
				    elseif ( $Cuartos == 5 ):
						$dataScoring["amai_cuartos"] = array("scoring" => 8 , "respuesta" => "5" );
					elseif ( $Cuartos == 6 ):
						$dataScoring["amai_cuartos"] = array("scoring" => 8 , "respuesta" => "6" );
					elseif ( $Cuartos == 7 ):
						$dataScoring["amai_cuartos"] = array("scoring" => 14 , "respuesta" => "7" );	
						
					endif;
					
					$EscolaridadJefeFamilia = $resultado["escolaridad_jefefamilia_candidato"];
					$dataScoring["amai_escolaridad_jefe_familia"] = 0;
					if( $EscolaridadJefeFamilia == "SinInstruccion" ||  $EscolaridadJefeFamilia == ""):
						$dataScoring["amai_escolaridad_jefe_familia"] = array("scoring" => 0 , "respuesta" => "Sin instrucción" );	
					elseif( $EscolaridadJefeFamilia == "primaria_secundaria" ):
						$dataScoring["amai_escolaridad_jefe_familia"] = array("scoring" => 22 , "respuesta" => "1" );
					elseif ( $EscolaridadJefeFamilia == "tecnico_preparatoria" ):
						$dataScoring["amai_escolaridad_jefe_familia"] = array("scoring" => 38 , "respuesta" => "2" );
					elseif ( $EscolaridadJefeFamilia == "licenciatura" ):
						$dataScoring["amai_escolaridad_jefe_familia"] = array("scoring" => 52 , "respuesta" => "3" );
					elseif ( $EscolaridadJefeFamilia == "posgrado" ):
						$dataScoring["amai_escolaridad_jefe_familia"] = array("scoring" => 72 , "respuesta" => "4" );
					endif;
					
					$Focos = $resutlado["focos_vivienda_candidato"];
					
					if( $Focos == "5menos" ):
						$dataScoring["amai_no_focos"] = array("scoring" => 0 , "respuesta" => "Sin instrucción" );	
					elseif( $Focos == "6-10" ):
						$dataScoring["amai_no_focos"] = array("scoring" => 15 , "respuesta" => "1" );
					elseif ( $Focos == "11-15" ):
						$dataScoring["amai_no_focos"] = array("scoring" => 27 , "respuesta" => "2" );
					elseif ( $Focos == "16-20" ):
						$dataScoring["amai_no_focos"] = array("scoring" => 32 , "respuesta" => "3" );
					elseif ( $Focos == "21+"):
						$dataScoring["amai_no_focos"] = array("scoring" => 46 , "respuesta" => $Focos );
					endif;
					
					$Piso = $resultado["piso_vivienda_candidato"];
					if( $Piso == "setiene" ):
						$dataScoring["amai_piso_distinto_tierra_cemento"] = array("scoring" => 11 , "respuesta" => "Tener" );	
					elseif( $Piso == "nosetiene" ):
						$dataScoring["amai_piso_distinto_tierra_cemento"] = array("scoring" => 0 , "respuesta" => "No tener" );
					
					endif;
					
					$Regadera = $resultado["regadera_vivienda_candidato"];
					if( $Regadera == "setiene" ):
						$dataScoring["amai_regadera"] = array("scoring" => 10 , "respuesta" => "Tener" );	
					elseif( $Regadera == "nosetiene" ):
						$dataScoring["amai_regadera"] = array("scoring" => 0 , "respuesta" => "No tener" );
					
					endif;
					
					$Estufa = $resultado["estufa_vivienda_candidato"];
					if( $Estufa == "setiene" ):
						$dataScoring["amai_estufa"] = array("scoring" => 20 , "respuesta" => "Tener" );	
					elseif( $Estufa == "nosetiene" ):
						$dataScoring["amai_estufa"] = array("scoring" => 0 , "respuesta" => "No tener" );
					
					endif;
					
					
					foreach( $metasCandidato as $key => $res ):
						
						$sqlInsertMetaDatos = 'INSERT INTO MetaDatosCandidatoFDP ( prefijoMetaDatos , valorMetaDatos , idCandidatoFDP ) VALUES( \''.$key.'\' , \''.$res.'\' , '.$candidatoInsertID.' );';
						$this->db->query( $sqlInsertMetaDatos );
						
					endforeach;
					
					$totalAmai = 0;
					if( !empty( $dataScoring ) ):
					
						foreach( $dataScoring as $keys => $score ):
							$totalAmai = $totalAmai + $score["scoring"];
							$sqlInsertMetaDatos = 'INSERT INTO MetaDatosCandidatoFDP ( prefijoMetaDatos , valorMetaDatos , idCandidatoFDP ) VALUES( \''.$keys.'\' , \''.$score["scoring"].'\' , '.$candidatoInsertID.' );';
						$this->db->query( $sqlInsertMetaDatos );
						endforeach;
					endif;
					
					$sqlInsertMetaDatos = 'INSERT INTO MetaDatosCandidatoFDP ( prefijoMetaDatos , valorMetaDatos , idCandidatoFDP ) VALUES( \'total_amai\' , \''.$totalAmai.'\' , '.$candidatoInsertID.' );';
						$this->db->query( $sqlInsertMetaDatos );
					
					
				endif;
				
				$mail             = new PHPMailer();
				//$mail->IsSMTP(); // telling the class to use SMTP
				$mail->Host       = "localhost"; // SMTP server
				//$mail->SMTPDebug  = 1;                     // enables SMTP debug information (for testing)
				$mail->CharSet = 'UTF-8';                                          // 1 = errors and messages
				                                           // 2 = messages only
				                                           
				//Envío por SMTP
				//$mail->AddBCC('rogelio.monte');
				
						 
				$mail->AddReplyTo( SENDER_EMAIL_REPLY_TO ,SENDER_NAME_REPLY_TO );
						 
				
				$mail->SetFrom( SENDER_EMAIL , SENDER_NAME);
						 
				$mail->Subject    = 'Confirmación de datos personales para candidatos.' ;
				
				//$mail->AltBody    = "Para ver este mensaje, necesitas un cliente de correo compatible con HTML."; // optional, comment out and test
				
				$messageHTML = '<p>Hola '.$resultado["nombre_candidato"].' '.$resultado["apellido_paterno_candidato"].' '.$resultado["apellido_materno_candidato"].'<br/>Para finalizar el proceso de registro como candidato confirma tu cuenta <a href="'.HOME_URL.'/candidatos/verificar/?token='.$hashValidacion.'" target="_blank">aquí</a><br/><br/>Atte. Staff ConectXXI</p>';		
				 
				$mail->MsgHTML($messageHTML);
						 
				$to   = trim( $resultado["correo_electronico_candidato"] );
				$address = $to ;
				$mail->AddAddress($address);
				$mail->Send();
				
				unset($_COOKIE['formArray1']);
				setcookie('formArray1', '', time() - 3600, '/');
				
				unset($_COOKIE['formArray2']);
				setcookie('formArray2', '', time() - 3600, '/');
				
				unset($_COOKIE['formArray3']);
				setcookie('formArray3', '', time() - 3600, '/');
				
				redirect('/candidatos/?registro=completo');
				
				
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
