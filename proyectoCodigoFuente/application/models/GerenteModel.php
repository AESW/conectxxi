<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class GerenteModel extends CI_Model {
	
	
	
	
	public function MovimientosModel() {
        parent::__construct();
    }
		
	
	
	
	public function personalIncapacidad(){
	
	
		$sqlAltaUsuarios = "SELECT idUsuarios,nombreUsuario FROM Usuarios";
		
		$queryAltaUsuarios = $this->db->query( $sqlAltaUsuarios );
		if( $queryAltaUsuarios->num_rows() > 0 ):
		$resultadoAltaUsuarios = $queryAltaUsuarios->result();
		$altas = array();
			
		foreach( $resultadoAltaUsuarios as $entre):
		$altas[] = array(
				"nombreUsuario" => $entre->nombreUsuario,
				"idUsuarios" => $entre->idUsuarios
				
		);
		endforeach;
			
		return $altas;
		else:
		return array();
		endif;
	
	}
	
	public function empresas(){
	
	
		$sqlAltaUsuarios = "SELECT idEmpresas,nombreEmpresas FROM Empresas";
	
		$queryAltaUsuarios = $this->db->query( $sqlAltaUsuarios );
		if( $queryAltaUsuarios->num_rows() > 0 ):
		$resultadoAltaUsuarios = $queryAltaUsuarios->result();
		$altas = array();
			
		foreach( $resultadoAltaUsuarios as $entre):
		$altas[] = array(
				"nombreEmpresas" => $entre->nombreEmpresas,
				"idEmpresas" => $entre->idEmpresas
	
		);
		endforeach;
			
		return $altas;
		else:
		return array();
		endif;
	
	}
	
	public function puestos(){
	
	
		$sqlAltaUsuarios = "SELECT idPuestos,nombrePuesto FROM Puestos";
	
		$queryAltaUsuarios = $this->db->query( $sqlAltaUsuarios );
		if( $queryAltaUsuarios->num_rows() > 0 ):
		$resultadoAltaUsuarios = $queryAltaUsuarios->result();
		$altas = array();
			
		foreach( $resultadoAltaUsuarios as $entre):
		$altas[] = array(
				"nombrePuesto" => $entre->nombrePuesto,
				"idPuestos" => $entre->idPuestos
	
		);
		endforeach;
			
		return $altas;
		else:
		return array();
		endif;
	
	}
	
	public function sueldo(){
	
	
		$sqlAltaUsuarios = "SELECT idSueldos,sueldo FROM Sueldos where sdi!=''";
	
		$queryAltaUsuarios = $this->db->query( $sqlAltaUsuarios );
		if( $queryAltaUsuarios->num_rows() > 0 ):
		$resultadoAltaUsuarios = $queryAltaUsuarios->result();
		$altas = array();
			
		foreach( $resultadoAltaUsuarios as $entre):
		$altas[] = array(
				"sueldo" => $entre->sueldo,
				"idSueldos" => $entre->idSueldos
	
		);
		endforeach;
			
		return $altas;
		else:
		return array();
		endif;
	
	}
	
	public function oficina(){
	
	
		$sqlAltaUsuarios = "SELECT idOficinas,nombreOficina FROM Oficinas";
	
		$queryAltaUsuarios = $this->db->query( $sqlAltaUsuarios );
		if( $queryAltaUsuarios->num_rows() > 0 ):
		$resultadoAltaUsuarios = $queryAltaUsuarios->result();
		$altas = array();
			
		foreach( $resultadoAltaUsuarios as $entre):
		$altas[] = array(
				"nombreOficina" => $entre->nombreOficina,
				"idOficinas" => $entre->idOficinas
	
		);
		endforeach;
			
		return $altas;
		else:
		return array();
		endif;
	
	}
}