<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class ReclutamientoModel extends CI_Model {
	
	var $idCandidadtoFDP;
	var $perfilCandidato;
	var $evaluacionRazonamiento;
	var $puntajeEvaluacionRazonamiento;
	var $escalaValoresEvaluacionRazonamiento;
	var $comentariosReclutador;
	var $idUsuarioCrea;
	var $estatusReclutamientoFDP;
	var $fechaEntrevista;
	var $idVacantesPeticiones;
	
	
	public function ReclutamientoModel() {
        parent::__construct();
    }
	
	public function setIdCandidatoFDP($idCandidadtoFDP){
		$this->idCandidatoFDP = $idCandidadtoFDP;
		return $this;
	}
	
	public function setPerfilCandidato( $perfilCandidato ){
		$this->perfilCandidato = $perfilCandidato;
		return $this;
	}
	
	public function setEvaluacionRazonamiento( $evaluacionRazonamiento ){
		$this->evaluacionRazonamiento = $evaluacionRazonamiento;
		return $this;
	}
	
	public function setPuntajeEvaluacionRazonamiento( $puntajeEvaluacionRazonamiento ){
		$this->puntajeEvaluacionRazonamiento = $puntajeEvaluacionRazonamiento;
		return $this;
	}
	
	public function setEscalaValoresEvaluacionRazonamiento( $escalaValoresEvaluacionRazonamiento ){
		$this->escalaValoresEvaluacionRazonamiento = $escalaValoresEvaluacionRazonamiento;
		return $this;
	}
	
	public function setComentariosReclutador( $comentariosReclutador ){
		$this->comentariosReclutador = $comentariosReclutador;
		return $this;
	}
	
	public function setIdUsuarioCrea( $idUsuarioCrea ){
		$this->idUsuarioCrea = $idUsuarioCrea;
		return $this;
	}
	
	public function setEstatusReclutamientoFDP( $estatusReclutamientoFDP ){
		$this->estatusReclutamientoFDP = $estatusReclutamientoFDP;
		return $this;
	}
	
	public function setFechaEntrevista( $fechaEntrevista ){
		$this->fechaEntrevista = $fechaEntrevista;
		return $this;
	}
	
	public function setIdVacantesPeticiones( $idVacantesPeticiones ){
		$this->idVacantesPeticiones = $idVacantesPeticiones;
		return $this;
	}
	
	public function obtenerPeticionesVacantes(){
		$peticiones = array();
		
		$sqlPeticionesVacantes = '
			SELECT 
			* ,
			(SELECT nombrePuesto FROM Puestos WHERE idPuestos = VacantesPeticiones.idPuesto ) as nombrePuesto,
			(SELECT count(idCandidatoFDP) FROM CandidatoFDP WHERE tokenFDPVacantesPendientes = VacantesPeticiones.tokenFDPVacantesPendientes ) as totalToken
			
			FROM VacantesPeticiones WHERE VacantesPeticiones.estatusAprobacion = \'aprobado\' 
				 AND (SELECT count(idCandidatoFDP) FROM CandidatoFDP WHERE tokenFDPVacantesPendientes = VacantesPeticiones.tokenFDPVacantesPendientes ) <= 0
		';
		
		$queryPeticionesVacantes = $this->db->query( $sqlPeticionesVacantes );
		
		if( $queryPeticionesVacantes->num_rows() > 0 ):
			$resultadoPeticiones = $queryPeticionesVacantes->result();
			$peticiones = array();
			foreach( $resultadoPeticiones as $pet):
				
				$peticiones[] = array(
					"idVacantesPeticiones" => $pet->idVacantesPeticiones,
					"idPuesto" => $pet->idPuesto,
					"idUsuariosPeticion" => $pet->idUsuariosPeticion,
					"fechaPeticion" => $pet->fechaPeticion,
					"fechaAprobacion" =>  $pet->fechaAprobacion, 
					"estatusAprobacion" => $pet->estatusAprobacion,
					"tokenFDPVacantesPendientes" => $pet->tokenFDPVacantesPendientes,
					"nombrePuesto" => $pet->nombrePuesto,
					"totalToken" => $pet->totalToken
				);	
			endforeach;
			return $peticiones;
		else:
			return array();
		endif;
	}	
	
	public function obtenerEntrevistasRealizarPrimeraParte(){
		$sqlEntrevistasPrimeraParte = 'SELECT *,
										(SELECT idPuesto FROM VacantesPeticiones WHERE tokenFDPVacantesPendientes = CandidatoFDP.tokenFDPVacantesPendientes) as idPuesto,
										( SELECT nombrePuesto FROM Puestos WHERE idPuestos = (SELECT idPuesto FROM VacantesPeticiones WHERE tokenFDPVacantesPendientes = CandidatoFDP.tokenFDPVacantesPendientes) ) as nombrePuesto
										 FROM CandidatoFDP WHERE
										( SELECT count( idReclutamientoFDP ) FROM ReclutamientoFDP WHERE idCandidatoFDP = CandidatoFDP.idCandidatoFDP ) <= 0
										
		';
		
		$queryEntrevistasPrimeraParte = $this->db->query($sqlEntrevistasPrimeraParte);
		
		if( $queryEntrevistasPrimeraParte->num_rows() > 0 ):
			$resultadoEntrevista = $queryEntrevistasPrimeraParte->result();
			$entrevistas = array();
			
			foreach( $resultadoEntrevista as $entre):
				$entrevistas[] = array(
					"idCandidatoFDP" => $entre->idCandidatoFDP,
					"nombre" => $entre->nombre,
					"apellidoPaterno" => $entre->apeliidoPaterno,
					"apellidoMaterno" => $entre->apellidoMaterno,
					"nombrePuesto" => $entre->nombrePuesto,
					"idPuesto" => $entre->idPuesto
				);
			endforeach;
			
			return $entrevistas;
		else:
			return array();
		endif;
	}
	
	
	public function obtenerEntrevistasRealizarSegundaParte(){
		$sqlEntrevistasPrimeraParte = 'SELECT *,
										(SELECT idPuesto FROM VacantesPeticiones WHERE tokenFDPVacantesPendientes = CandidatoFDP.tokenFDPVacantesPendientes) as idPuesto,
										( SELECT nombrePuesto FROM Puestos WHERE idPuestos = (SELECT idPuesto FROM VacantesPeticiones WHERE tokenFDPVacantesPendientes = CandidatoFDP.tokenFDPVacantesPendientes) ) as nombrePuesto
										 FROM CandidatoFDP WHERE
										( SELECT count( idReclutamientoFDP ) FROM ReclutamientoFDP WHERE idCandidatoFDP = CandidatoFDP.idCandidatoFDP ) >= 0
										
										AND (  ( SELECT idUsuariosAprobacionRecursosHumanos FROM RecursosHumanosFDP WHERE idCandidatoFDP = CandidatoFDP.idCandidatoFDP LIMIT 1) IS NULL 
										       OR 
										       ( SELECT idUsuariosAprobacionGerente FROM RecursosHumanosFDP WHERE idCandidatoFDP = CandidatoFDP.idCandidatoFDP LIMIT 1) IS NULL 	
										     	  
										    )   
										
		';
		
		$queryEntrevistasPrimeraParte = $this->db->query($sqlEntrevistasPrimeraParte);
		
		if( $queryEntrevistasPrimeraParte->num_rows() > 0 ):
			$resultadoEntrevista = $queryEntrevistasPrimeraParte->result();
			$entrevistas = array();
			
			foreach( $resultadoEntrevista as $entre):
				$entrevistas[] = array(
					"idCandidatoFDP" => $entre->idCandidatoFDP,
					"nombre" => $entre->nombre,
					"apellidoPaterno" => $entre->apeliidoPaterno,
					"apellidoMaterno" => $entre->apellidoMaterno,
					"nombrePuesto" => $entre->nombrePuesto,
					"idPuesto" => $entre->idPuesto
				);
			endforeach;
			
			return $entrevistas;
		else:
			return array();
		endif;
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
			
			
			$sqlVacantesPeticiones = 'SELECT * FROM VacantesPeticiones WHERE tokenFDPVacantesPendientes = \''.$arrayCandidato["tokenFDPVacantesPendientes"].'\' LIMIT 1';
			$queryVacantesPeticiones = $this->db->query( $sqlVacantesPeticiones );
			
			if( $queryVacantesPeticiones->num_rows() > 0 ):
				$resultadoVacantesPeticiones = $queryVacantesPeticiones->result();
				$arrayCandidato["idVacantesPeticiones"] = $resultadoVacantesPeticiones[0]->idVacantesPeticiones;
				$arrayCandidato["idUsuariosPeticion"] = $resultadoVacantesPeticiones[0]->idUsuariosPeticion;
			else:
				$arrayCandidato["idVacantesPeticiones"] = 0;	
			endif;
			
			
			$sqlReclutamientoFDP = 'SELECT * FROM ReclutamientoFDP WHERE idCandidatoFDP = '.$idCandidadtoFDP.' LIMIT 1';
			$queryReclutamientoFDP = $this->db->query( $sqlReclutamientoFDP );
			
			if( $queryReclutamientoFDP->num_rows() > 0 ):
				$resultadoReclutamientoFDP = $queryReclutamientoFDP->result();
				$arrayCandidato["idReclutamientoFDP"] = $resultadoReclutamientoFDP[0]->idReclutamientoFDP;
			else:
				$arrayCandidato["idReclutamientoFDP"] = 0;
			endif;
			
			return $arrayCandidato;
		else:
			return array();
		endif;
		
	}
	
	public function guardarPrimerEntrevistaCandidatoFDP(){
		
		
		if( $this->idCandidatoFDP == 0 || 
			$this->idCandidatoFDP == "" ||
			$this->perfilCandidato == "" ||
			$this->evaluacionRazonamiento == "" ||
			$this->puntajeEvaluacionRazonamiento == "" ||
			$this->escalaValoresEvaluacionRazonamiento == "" ||
			$this->comentariosReclutador == "" ||
			$this->idUsuarioCrea == "" ||
			$this->idUsuarioCrea == 0 ||
			$this->estatusReclutamientoFDP == "" ||
			$this->fechaEntrevista == "" ||
			$this->idVacantesPeticiones == 0 ||
			$this->idVacantesPeticiones == ""
		):
			return "camposVacios";
		endif;
		
		$sqlExistePrimerEntrevista = 'SELECT * FROM ReclutamientoFDP WHERE idCandidatoFDP = '.$this->idCandidatoFDP." LIMIT 1";
		$querySqlExistePrimerEntrevista = $this->db->query( $sqlExistePrimerEntrevista );
		
		if( $querySqlExistePrimerEntrevista->num_rows() > 0 ):
			$resultadoExistePrimerEntrevista = $querySqlExistePrimerEntrevista->result();
			
			$sqlActualizaPrimerEntrevista = 'UPDATE ReclutamientoFDP SET perfilCandidato = \''.$this->perfilCandidato.'\' , evaluacionRazonamiento = \''.$this->evaluacionRazonamiento.'\' , puntajeEvaluacionRazonamiento = \''.$this->puntajeEvaluacionRazonamiento.'\' , escalaValoresEvaluacionRazonamiento = \''.$this->escalaValoresEvaluacionRazonamiento.'\', comentariosReclutador = \''.$this->comentariosReclutador.'\', estatusReclutamientoFDP = \''.$this->estatusReclutamientoFDP.'\' , fechaEntrevista = \''.$this->fechaEntrevista.'\' WHERE idCandidatoFDP = '.$this->idCandidatoFDP;
		
			$queryActualizaPrimeraEntrevista = $this->db->query( $sqlActualizaPrimerEntrevista );
			
			
		else:
			$sqlInsertaPrimerEntrevista = 'INSERT INTO ReclutamientoFDP ( idCandidatoFDP , perfilCandidato , evaluacionRazonamiento , puntajeEvaluacionRazonamiento , escalaValoresEvaluacionRazonamiento , comentariosReclutador , idUsuarioCrea , estatusReclutamientoFDP , fechaEntrevista , fechaAprobacion , idVacantesPeticiones ) VALUES('.$this->idCandidatoFDP.' , \''.$this->perfilCandidato.'\' , \''.$this->evaluacionRazonamiento.'\' , \''.$this->puntajeEvaluacionRazonamiento.'\' , \''.$this->escalaValoresEvaluacionRazonamiento.'\' , \''.$this->comentariosReclutador.'\' , '.$this->idUsuarioCrea.' , \''.$this->estatusReclutamientoFDP.'\' , \''.$this->fechaEntrevista.'\' , now() , '.$this->idVacantesPeticiones.')';
		
			$queryInsertaPrimeraEntrevista = $this->db->query( $sqlInsertaPrimerEntrevista );
		endif;
		
		
		
		return "insertado";
		
	}
	
	
	public function obtenerPrimerEntrevista( $idCandidadtoFDP ){
		$arrayPrimerEntrevista = array();
		
		$sqlPrimerEntrevista = 'SELECT * FROM ReclutamientoFDP WHERE idCandidatoFDP = '.$idCandidadtoFDP." LIMIT 1";
		
		$queryPrimerEntrevista = $this->db->query( $sqlPrimerEntrevista );
		
		if( $queryPrimerEntrevista->num_rows() > 0 ):
			$resultadoPrimeraEntrevista = $queryPrimerEntrevista->result();
			foreach( $resultadoPrimeraEntrevista as $primer ):
				$arrayPrimerEntrevista = array(
					"idCandidatoFDP" => $primer->idCandidatoFDP,
					"perfilCandidato" => $primer->perfilCandidato,
					"evaluacionRazonamiento" => $primer->evaluacionRazonamiento,
					"puntajeEvaluacionRazonamiento" => $primer->puntajeEvaluacionRazonamiento,
					"escalaValoresEvaluacionRazonamiento" => $primer->escalaValoresEvaluacionRazonamiento,
					"comentariosReclutador" => $primer->comentariosReclutador, 
					"idUsuarioCrea" => $primer->idUsuarioCrea,
					"estatusReclutamientoFDP" => $primer->estatusReclutamientoFDP,
					"fechaEntrevista" => $primer->fechaEntrevista,
					"fechaAprobacion" => $primer->fechaAprobacion,
					"idVacantesPeticiones" => $primer->idVacantesPeticiones
				);
			endforeach;
		endif;
		
		return $arrayPrimerEntrevista;
	}
	
	
	public function obtenerNombrePorIdUsuarios($idUsuarios){
		if( $idUsuarios == 0 || $idUsuarios == "" ):
			return false;
		endif;
		
		$sqlNombreUsuario = 'SELECT * FROM Usuarios WHERE idUsuarios = '.$idUsuarios." LIMIT 1";
		$queryNombreUsuario = $this->db->query( $sqlNombreUsuario );
		
		if( $queryNombreUsuario->num_rows() > 0 ):
			$resultadoNombreUsuario = $queryNombreUsuario->result();
			
			return $resultadoNombreUsuario[0]->nombreUsuario;
		else:
			return "Desconocido";
		endif;
	}
	
	public function obtenerAprobacionRH( $idCandidadtoFDP , $idReclutamientoFDP){
		
		if( $idReclutamientoFDP == 0 ):
			return array();
		endif;
		
		
		$sqlAprobacionRH = 'SELECT *,
		  						   ( SELECT nombreUsuario FROM Usuarios WHERE idUsuarios = RecursosHumanosFDP.idUsuariosAprobacionRecursosHumanos ) as nombreUsuario
						    FROM RecursosHumanosFDP WHERE idCandidatoFDP = '.$idCandidadtoFDP.' AND idReclutamientoFDP = '.$idReclutamientoFDP.' AND idUsuariosAprobacionRecursosHumanos IS NOT NULL LIMIT 1';
		
		$queryAprobacionRH = $this->db->query( $sqlAprobacionRH );
		
		if( $queryAprobacionRH->num_rows() > 0 ):
			$resultadoAprobacionRecursosHumanos = $queryAprobacionRH->result();
			return array(
					"idUsuariosAprobacionRecursosHumanos" => $resultadoAprobacionRecursosHumanos[0]->idUsuariosAprobacionRecursosHumanos,
					"fechaAprobacionRecursosHumanos" => $resultadoAprobacionRecursosHumanos[0]->fechaAprobacionRecursosHumanos,
					"estatusRecursosHumanosFDP" => $resultadoAprobacionRecursosHumanos[0]->estatusRecursosHumanosFDP,
					"nombreRecursosHumanosFDP" => $resultadoAprobacionRecursosHumanos[0]->nombreUsuario
			);
		else:	
			return array();
		endif;
	}
	
	public function obtenerAprobacionDirector( $idCandidadtoFDP , $idReclutamientoFDP ){
		if( $idReclutamientoFDP == 0 ):
			return array();
		endif;
		
		$sqlAprobacionRH = 'SELECT *,
							( SELECT nombreUsuario FROM Usuarios WHERE idUsuarios = RecursosHumanosFDP.idUsuariosAprobacionGerente ) as nombreUsuario
						    FROM RecursosHumanosFDP WHERE idCandidatoFDP = '.$idCandidadtoFDP.' AND idReclutamientoFDP = '.$idReclutamientoFDP.'  AND idUsuariosAprobacionGerente IS NOT NULL LIMIT 1';
		$queryAprobacionRH = $this->db->query( $sqlAprobacionRH );
		
		if( $queryAprobacionRH->num_rows() > 0 ):
			$resultadoAprobacionRecursosHumanos = $queryAprobacionRH->result();
			return array(
					"idUsuariosAprobacionGerente" => $resultadoAprobacionRecursosHumanos[0]->idUsuariosAprobacionGerente,
					"fechaAprobacionGerente" => $resultadoAprobacionRecursosHumanos[0]->fechaAprobacionGerente,
					"estatusGerenteFDP" => $resultadoAprobacionRecursosHumanos[0]->estatusGerenteFDP,
					"nombreRecursosHumanosFDP" => $resultadoAprobacionRecursosHumanos[0]->nombreUsuario
			);
		else:	
			return array();
		endif;
	}
	
}