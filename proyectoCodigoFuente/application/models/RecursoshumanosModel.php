<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class RecursoshumanosModel extends CI_Model {
	
	
	
	
	public function RecursoshumanosModel() {
        parent::__construct();
    }
		
	public function insertarEvaluacionRecursosHumanosFDP( $arregloEvaluacion , $idUsuario , $idCandidatoFDP , $idReclutamientoFDP){
		if( empty($arregloEvaluacion) || 
			$idUsuario == "" ||
			$idUsuario == 0 ||
			$idCandidatoFDP == "" ||
			$idCandidatoFDP == 0 ||
			$idReclutamientoFDP == "" ||
			$idReclutamientoFDP == 0 ):
			return false;
		endif;
		$estatus = ( $arregloEvaluacion["aprobar_rechazar_rh"] == "aprobar" )?"aprobado":"rechazado";
		
		$sqlAprobacionRH = "SELECT * FROM RecursosHumanosFDP WHERE idCandidatoFDP = ".$idCandidatoFDP." AND idReclutamientoFDP = ".$idReclutamientoFDP." AND idUsuariosAprobacionRecursosHumanos IS NOT NULL LIMIT 1";
		$queryAprobacionRH = $this->db->query( $sqlAprobacionRH );
		
		if( $queryAprobacionRH->num_rows() > 0 ):
			//update
			
			$resultadoAprobacionRH = $queryAprobacionRH->result();
			

			$sqlUpdate = 'UPDATE RecursosHumanosFDP SET fechaEntrevista = \''.$arregloEvaluacion["fecha_entrevista_rh_fdp"].'\' ,  estatusRecursosHumanosFDP = \''.$estatus.'\' , fechaAprobacionRecursosHumanos = now() , estatusGerenteFDP = \''.$estatus.'\' , idUsuariosAprobacionGerente = '.$arregloEvaluacion["aprobacion_gerente_rh_fdp"].' , fechaAprobacionGerente = now() WHERE idCandidatoFDP = '.$idCandidatoFDP.' AND idReclutamientoFDP = '.$idReclutamientoFDP  ;
			
			$queryUpdate = $this->db->query( $sqlUpdate );
			
			
			$sqlDeleteMetaRH = 'DELETE FROM RecursosHumanosMetaDatosFDP WHERE idCandidatosFDP = '.$idCandidatoFDP.' AND idRecursosHumanosFDP = '.$resultadoAprobacionRH[0]->idRecursosHumanosFDP;
			
			
			$this->db->query($sqlDeleteMetaRH);
			
			if(!empty($arregloEvaluacion)):
			foreach( $arregloEvaluacion as $key => $fields):
			
			$sqlInsertMetas = 'INSERT INTO RecursosHumanosMetaDatosFDP ( prefijoMetaDatos , valorMetaDatos , idCandidatosFDP , idRecursosHumanosFDP ) VALUES( \''.$key.'\' , \''.$fields.'\' , '.$idCandidatoFDP.' , '.$resultadoAprobacionRH[0]->idRecursosHumanosFDP.' ) ';
			
			$this->db->query($sqlInsertMetas);
			endforeach;
			endif;
			
			return true;
			
			else:
			//insert
			
			$sqlInsert = 'INSERT INTO RecursosHumanosFDP ( idCandidatoFDP , idReclutamientoFDP , fechaEntrevista , idUsuariosAprobacionRecursosHumanos , fechaAprobacionRecursosHumanos , estatusRecursosHumanosFDP , estatusGerenteFDP , idUsuariosAprobacionGerente , fechaAprobacionGerente ) VALUES( '.$idCandidatoFDP.' , '.$idReclutamientoFDP.' , \''.$arregloEvaluacion["fecha_entrevista_rh_fdp"].'\' , '.$idUsuario.' , now() , \''.$estatus.'\' , \''.$estatus.'\' , '.$arregloEvaluacion["aprobacion_gerente_rh_fdp"].' , now())';
			
		$queryInsert = $this->db->query($sqlInsert);
		$idRecursosHumanosFDP = $this->db->insert_id();
			
		if(!empty($arregloEvaluacion)):
			foreach( $arregloEvaluacion as $key => $fields):
				$sqlInsertMetas = 'INSERT INTO RecursosHumanosMetaDatosFDP ( prefijoMetaDatos , valorMetaDatos , idCandidatosFDP , idRecursosHumanosFDP  ) VALUES( \''.$key.'\' , \''.$fields.'\' , '.$idCandidatoFDP.' , '.$idRecursosHumanosFDP.' ) ';
			
			$this->db->query($sqlInsertMetas);
			endforeach;
			endif;
			
			
			return true;
			
		endif;
		
		
	}
	
	
	
	public function insertarEvaluacionGerenteFDP( $arregloEvaluacion , $idUsuario , $idCandidatoFDP , $idReclutamientoFDP){
		if( empty($arregloEvaluacion) || 
			$idUsuario == "" ||
			$idUsuario == 0 ||
			$idCandidatoFDP == "" ||
			$idCandidatoFDP == 0 ||
			$idReclutamientoFDP == "" ||
			$idReclutamientoFDP == 0 ):
			return false;
		endif;
		$estatus = ( $arregloEvaluacion["aprobar_rechazar_rh"] == "aprobar" )?"aprobado":"rechazado";
		$sqlUpdate = 'UPDATE RecursosHumanosFDP SET estatusGerenteFDP = \''.$estatus.'\' , fechaAprobacionGerente = now() ,  idUsuariosAprobacionGerente = '.$idUsuario.' WHERE idCandidatoFDP = '.$idCandidatoFDP.' AND idReclutamientoFDP = '.$idReclutamientoFDP  ;
			
			
			$queryUpdate = $this->db->query( $sqlUpdate );

		return true;
	}
	
	public function obtenerMetaRH( $idCandidatoFDP , $idReclutamientoFDP ){
		if( $idCandidatoFDP == "" ||
			$idCandidatoFDP == 0 ||
			$idReclutamientoFDP == "" ||
			$idReclutamientoFDP == 0 ):
			return false;
		endif;
	
		$sqlObtenerRH = 'SELECT * FROM RecursosHumanosFDP WHERE idCandidatoFDP = '.$idCandidatoFDP.' AND idReclutamientoFDP = '.$idReclutamientoFDP;
		$queryObtenerRH = $this->db->query( $sqlObtenerRH );
		
		$arrayFields = array();
		
		if( $queryObtenerRH->num_rows() > 0 ):
			$resultObtenerRH = $queryObtenerRH->result();
			
			$sqlObtenerMetaRH = 'SELECT * FROM RecursosHumanosMetaDatosFDP WHERE idCandidatosFDP = '.$idCandidatoFDP.' AND idRecursosHumanosFDP = '.$resultObtenerRH[0]->idRecursosHumanosFDP;
			
			
			
			$queryObtenerMetaRH = $this->db->query($sqlObtenerMetaRH);
			
			if( $queryObtenerMetaRH->num_rows() > 0 ):
			$resultObtenerMetaRH = $queryObtenerMetaRH->result();
			
			foreach( $resultObtenerMetaRH as $meta ):
			$arrayFields[$meta->prefijoMetaDatos] = $meta->valorMetaDatos;
			endforeach;
			endif;
			
			
		endif;
			
		return $arrayFields;
	}
	
	public function obtenerMovimientosCandidatos(){
		$sqlCandidatosAprobados = 'SELECT *,
										 ( SELECT CONCAT( nombre , " " , apeliidoPaterno , " " , apellidoMaterno ) FROM CandidatoFDP WHERE idCandidatoFDP = RecursosHumanosFDP.idCandidatoFDP ) as nombreCandidato
										 FROM
										 RecursosHumanosFDP WHERE estatusRecursosHumanosFDP = \'aprobado\'';
	
		$queryCandidatosAprobados = $this->db->query( $sqlCandidatosAprobados );
		$arrayAprobados = array();
		if(  $queryCandidatosAprobados->num_rows() > 0 ):
		$resultadoCandidatosAprobados = $queryCandidatosAprobados->result();
		foreach($resultadoCandidatosAprobados as $aprobados):
		$arrayAprobados[] = array(
				"idCandidatoFDP" => $aprobados->idCandidatoFDP,
				"nombreCandidato" => $aprobados->nombreCandidato,
				"estatusCandidato" => "aprobado"
		);
		endforeach;
		endif;
	
	
		$sqlCandidatosRechazados = 'SELECT *,
										 ( SELECT CONCAT( nombre , " " , apeliidoPaterno , " " , apellidoMaterno ) FROM CandidatoFDP WHERE idCandidatoFDP = RecursosHumanosFDP.idCandidatoFDP ) as nombreCandidato
										 FROM
										 RecursosHumanosFDP WHERE estatusRecursosHumanosFDP = \'rechazado\'';
	
		$queryCandidatosRechazados = $this->db->query( $sqlCandidatosRechazados );
		$arrayRechazados = array();
		if(  $queryCandidatosRechazados->num_rows() > 0 ):
		$resultadoCandidatosRechazados = $queryCandidatosRechazados->result();
		foreach($resultadoCandidatosRechazados as $rechazados):
		$arrayRechazados[] = array(
				"idCandidatoFDP" => $rechazados->idCandidatoFDP,
				"nombreCandidato" => $rechazados->nombreCandidato,
				"estatusCandidato" => "rechazado"
		);
		endforeach;
		endif;
	
		$resultadoMovimientos = array_merge($arrayAprobados, $arrayRechazados);
	
		return $resultadoMovimientos;
	}
	
	public function obtenerCandidatoFDP( $idCandidadtoFDP = 0 ){
	
		if( !is_numeric( $idCandidadtoFDP ) || $idCandidadtoFDP == 0 ):
		return 22;
		endif;
	
		$sqlCandidatoFDP = 'SELECT * FROM CandidatoFDP WHERE idCandidatoFDP = '.$idCandidadtoFDP." LIMIT 1";
	
		$queryCandidatoFDP = $this->db->query( $sqlCandidatoFDP );
	
		if( $queryCandidatoFDP->num_rows() > 0 ):
		$resultadoCandidatoFDP = $queryCandidatoFDP->result();
		$arrayCandidato = array();
		foreach($resultadoCandidatoFDP as $campos):
		$arrayCandidato["nombre_candidato"] = $campos->nombre;
		$arrayCandidato["apellido_paterno_candidato"] = $campos->apeliidoPaterno;
		$arrayCandidato["apellido_materno_candidato"] = $campos->apellidoMaterno;
		$arrayCandidato["fecha_nacimiento_candidato"] = $campos->fechaNacimiento;
		$arrayCandidato["pais_nacimiento_candidato"] = $campos->paisNacimiento;
		$arrayCandidato["estado_nacimiento_candidato"] = $campos->estadoNacimiento;
		$arrayCandidato["genero_candidato"] = $campos->genero;
		$arrayCandidato["nivel_educativo_candidato"] = $campos->nivelEducativo;
		$arrayCandidato["estado_civil_candidato"] = $campos->estadoCivil;
		$arrayCandidato["rfc_candidato"] = $campos->rfcCandidato;
		$arrayCandidato["curp_candidato"] = $campos->curpCandidato;
		$arrayCandidato["numero_segurosocial_candidato"] = $campos->numeroSeguroSocial;
		$arrayCandidato["correo_electronico_candidato"] = $campos->correoElectronico;
		$arrayCandidato["tokenFDPVacantesPendientes"] = $campos->tokenFDPVacantesPendientes;
	
	
		endforeach;
			
			
		$sqlMetaDatosCandidatoFDP = 'SELECT * FROM MetaDatosCandidatoFDP WHERE idCandidatoFDP = '.$idCandidadtoFDP;
			
		$queryMetaDatosCandidatoFDP = $this->db->query( $sqlMetaDatosCandidatoFDP );
			
		if( $queryMetaDatosCandidatoFDP->num_rows() > 0 ):
		$resultadoMetaDatosCandidatoFDP = $queryMetaDatosCandidatoFDP->result();
	
		foreach( $resultadoMetaDatosCandidatoFDP as $meta ):
		$arrayCandidato[$meta->prefijoMetaDatos] = $meta->valorMetaDatos;
		endforeach;
	
		endif;
			
			
		$sqlArchivosCandidatoFDP = 'SELECT * FROM ArchivosFDP WHERE idCandidatoFDP = '.$idCandidadtoFDP;
		$queryArchivosCandidatoFDP = $this->db->query($sqlArchivosCandidatoFDP);
			
		if( $queryArchivosCandidatoFDP->num_rows() > 0 ):
		$resultadoArchivosCandidatoFDP = $queryArchivosCandidatoFDP->result();
	
		foreach( $resultadoArchivosCandidatoFDP as $archivos ):
		$arrayCandidato[$archivos->prefijoArchivo] = $archivos->nombreArchivo;
		endforeach;
	
		endif;
			
		$sqlDependientesCandidatoFDP = 'SELECT * FROM DependientesEconomicos WHERE idCandidatoFDP = '.$idCandidadtoFDP;
		$queryDependientesCandidatoFDP = $this->db->query( $sqlDependientesCandidatoFDP );
		$itemsDependientes = array();
		if( $queryDependientesCandidatoFDP->num_rows() > 0 ):
		$resultadoDependientesCandidatoFDP = $queryDependientesCandidatoFDP->result();
	
		foreach( $resultadoDependientesCandidatoFDP as $dependientes ):
		$itemsDependientes[] = $dependientes->parentesco;
		endforeach;
		endif;
			
		$arrayCandidato["parentesco_dependiente_economico_candidato"] = $itemsDependientes;
			
			
		
			
			
		$sqlReclutamientoFDP = "SELECT * FROM ReclutamientoFDP WHERE idCandidatoFDP = ".$idCandidadtoFDP."  and estatusReclutamientoFDP ='aprobado' LIMIT 1";
		$queryReclutamientoFDP = $this->db->query( $sqlReclutamientoFDP );
			
		if( $queryReclutamientoFDP->num_rows() > 0 ):
		$resultadoReclutamientoFDP = $queryReclutamientoFDP->result();
		
		$arrayCandidato["idReclutamientoFDP"] = $resultadoReclutamientoFDP[0]->idReclutamientoFDP;
		$sqlVacantesPeticiones = 'SELECT *, (SELECT nombrePuesto FROM Puestos WHERE idPuestos = VacantesPeticiones.idPuesto ) as nombrePuesto FROM VacantesPeticiones WHERE idVacantesPeticiones = \''.$resultadoReclutamientoFDP[0]->idVacantesPeticiones.'\' LIMIT 1';
			
		$queryVacantesPeticiones = $this->db->query( $sqlVacantesPeticiones );
		
		if( $queryVacantesPeticiones->num_rows() > 0 ):
		
		$resultadoVacantesPeticiones = $queryVacantesPeticiones->result();
		$arrayCandidato["idVacantesPeticiones"] = $resultadoVacantesPeticiones[0]->idVacantesPeticiones;
		$arrayCandidato["idUsuariosPeticion"] = $resultadoVacantesPeticiones[0]->idUsuariosPeticion;
		$arrayCandidato["Puesto"] = $resultadoVacantesPeticiones[0]->nombrePuesto;
		$arrayCandidato["tokenFDPVacantesPendientes"] = $resultadoVacantesPeticiones[0]->tokenFDPVacantesPendientes;
		else:
		$arrayCandidato["idVacantesPeticiones"] = 0;
		endif;
		
		////////RecursosHumanosFDP
		
		$sqlRecursosHumanosFDP = "SELECT (select nombreUsuario from Usuarios where idUsuarios=RecursosHumanosFDP.idUsuariosAprobacionGerente) as nombreGerente ,RecursosHumanosFDP.* FROM RecursosHumanosFDP WHERE idCandidatoFDP = ".$idCandidadtoFDP."  and estatusRecursosHumanosFDP is not null and estatusGerenteFDP ='aprobado'  LIMIT 1";
		$queryRecursosHumanosFDP = $this->db->query( $sqlRecursosHumanosFDP );
		
		if( $queryRecursosHumanosFDP->num_rows() > 0 ):
		
		$resultadoRecursosHumanosFDP = $queryRecursosHumanosFDP->result();
		$arrayCandidato["idUsuariosAprobacionGerente"] = $resultadoRecursosHumanosFDP[0]->idUsuariosAprobacionGerente;
		$arrayCandidato["idNombreAprobacionGerente"] = $resultadoRecursosHumanosFDP[0]->nombreGerente;
		
		
		
		else:
		
		$arrayCandidato["idRecursosHumanosFDP"] = 0;
		endif;
		
		
		/////////////////////
		
		
		else:
		$arrayCandidato["idReclutamientoFDP"] = 0;
		endif;
			
		return $arrayCandidato;
		else:
		return array();
		endif;
	
	}
	
	public function obtenerEmpresas(){
		
		
		$sqlObtenerEmpresas = 'SELECT * FROM Empresas' ;
			
		$resultObtenerEmpresas = array();
			
		$queryObtenerEmpresas = $this->db->query($sqlObtenerEmpresas);
			
		if( $queryObtenerEmpresas->num_rows() > 0 ):
		$resultObtenerEmpresas = $queryObtenerEmpresas->result();
		
		
		endif;
			
		
		return $resultObtenerEmpresas;
		
	
	}
	
	

	public function insertarUsuario($nombre_candidato,$apellido_paterno_candidato,$apellido_materno_candidato,$email,$rfc){
	
	
			$sqlInsert = "INSERT INTO usuarios ( nombreUsuario, correoUsuario, contraseniaUsuario, estatusUsuario,fechaRegistro, RFC ) VALUES( concat('$apellido_paterno_candidato','$apellido_materno_candidato','$nombre_candidato'),'$email',md5('2016'),'activo',now(),'$rfc')";
		
	$queryInsert = $this->db->query($sqlInsert);
	$idAltaUsuario = $this->db->insert_id();
	
	if ($queryInsert)
	{
	
		
		
		return true;
	}
	else{
		return false;
	}
	
	
	}
	
	public function obtenerDepartamentos(){
	
	
		$sqlObtenerDepartamentos = 'SELECT * FROM departamentos' ;
			
		$resultObtenerDepartamentos = array();
			
		$queryObtenerDepartamentos = $this->db->query($sqlObtenerDepartamentos);
			
		if( $queryObtenerDepartamentos->num_rows() > 0 ):
		$resultObtenerDepartamentos = $queryObtenerDepartamentos->result();
	
	
		endif;
			
	
		return $resultObtenerDepartamentos;
	
	
	}
	
	public function solicitarCuenta($id){
	
	
		$sqlInsert = "INSERT INTO SolicitudesCuentasNominaBancomer ( idUsuariosRecursosHumanos,idCandidatoFDP,fechaSolicitud ) VALUES(1,$id,now())";
	
		$queryInsert = $this->db->query($sqlInsert);
		
	
		if ($queryInsert)
		{
			return true;
		}
		else{
			return false;
		}
	
	}
	
	
	public function validarCuenta($id){
	
	
		$sqlObtenerValidar = "SELECT * FROM SolicitudesCuentasNominaBancomer where idCandidatoFDP = $id" ;
			
		$resultObtenerValidar = array();
			
		$queryObtenerValidar = $this->db->query($sqlObtenerValidar);
			
		if( $queryObtenerValidar->num_rows() > 0 ):
		
		return true;
		else:
		
		return false;
	
		endif;
			
	
		
	
	
	}
	
	
	public function ValidarToken($token){
	
	
		$sqlObtenerValidar = "SELECT valorMetaDatos FROM UsuariosMetaDatos WHERE prefijoMetaDatos = 'tokenVacante' and valorMetaDatos = '$token'" ;
			
		$resultObtenerValidar = array();
			
		$queryObtenerValidar = $this->db->query($sqlObtenerValidar);
			
		if( $queryObtenerValidar->num_rows() > 0 ):
	
		return true;
		else:
	
		return false;
	
		endif;
			
	
	
	
	
	}
	
	
}