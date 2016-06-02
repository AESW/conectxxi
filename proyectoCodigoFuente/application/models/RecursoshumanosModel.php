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
			
			$sqlUpdate = 'UPDATE RecursosHumanosFDP SET fechaEntrevista = \''.$arregloEvaluacion["fecha_entrevista_rh_fdp"].'\' ,  estatusRecursosHumanosFDP = \''.$estatus.'\' , fechaAprobacionRecursosHumanos = now() WHERE idCandidatoFDP = '.$idCandidatoFDP.' AND idReclutamientoFDP = '.$idReclutamientoFDP  ;
			
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
			
			$sqlInsert = 'INSERT INTO RecursosHumanosFDP ( idCandidatoFDP , idReclutamientoFDP , fechaEntrevista , idUsuariosAprobacionRecursosHumanos , fechaAprobacionRecursosHumanos , estatusRecursosHumanosFDP ) VALUES( '.$idCandidatoFDP.' , '.$idReclutamientoFDP.' , \''.$arregloEvaluacion["fecha_entrevista_rh_fdp"].'\' , '.$idUsuario.' , now() , \''.$estatus.'\' )';
			
			$queryInsert = $this->db->query($sqlInsert);
			$idRecursosHumanosFDP = $this->db->insert_id();
			
				if(!empty($arregloEvaluacion)):
				  	foreach( $arregloEvaluacion as $key => $fields):
				  		$sqlInsertMetas = 'INSERT INTO RecursosHumanosMetaDatosFDP ( prefijoMetaDatos , valorMetaDatos , idCandidatosFDP , idRecursosHumanosFDP ) VALUES( \''.$key.'\' , \''.$fields.'\' , '.$idCandidatoFDP.' , '.$idRecursosHumanosFDP.' ) ';
				  		
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
}