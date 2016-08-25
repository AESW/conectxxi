<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class GerenteModel extends CI_Model {
	
	
	
	
	public function MovimientosModel() {
        parent::__construct();
    }
		
	
	
	
	public function personalIncapacidad($idUsuario){
	
	
		$sqlAltaUsuarios = "SELECT Usuarios.nombreUsuario,Usuarios.idUsuarios
    		FROM TaxPuestoUsuario left outer join Usuarios  on TaxPuestoUsuario.idUsuarios=Usuarios.idUsuarios where  idUsuariosPadre = $idUsuario ";
		
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
	
	public function personalBaja($id){
	
	
		$sqlAltaUsuarios = "SELECT RecursosHumanosFDP.*,Usuarios.nombreUsuario,
				 (SELECT valorMetaDatos FROM UsuariosMetaDatos WHERE UsuariosMetaDatos.idUsuarios = RecursosHumanosFDP.idUsuarios and prefijoMetaDatos='Sdi') as sdi,
				(SELECT valorMetaDatos FROM UsuariosMetaDatos WHERE UsuariosMetaDatos.idUsuarios = RecursosHumanosFDP.idUsuarios and prefijoMetaDatos='puesto') as puesto,
				(SELECT valorMetaDatos FROM UsuariosMetaDatos WHERE UsuariosMetaDatos.idUsuarios = RecursosHumanosFDP.idUsuarios and prefijoMetaDatos='fechaAlta') as fechaAlta,
                                (SELECT valorMetaDatos FROM UsuariosMetaDatos WHERE UsuariosMetaDatos.idUsuarios = RecursosHumanosFDP.idUsuarios and prefijoMetaDatos='descanso') as descanso,
                               (SELECT Empresas.nombreEmpresas FROM Empresas WHERE Empresas.idEmpresas=(SELECT valorMetaDatos FROM UsuariosMetaDatos WHERE UsuariosMetaDatos.idUsuarios = RecursosHumanosFDP.idUsuarios and prefijoMetaDatos='empresa_contrata')) as empresa,
(SELECT Oficinas.nombreOficina FROM Oficinas_has_Empresas
left outer join Oficinas on Oficinas.idOficinas = Oficinas_has_Empresas.Oficinas_idOficinas
where  Oficinas_idOficinas = (SELECT valorMetaDatos FROM UsuariosMetaDatos WHERE UsuariosMetaDatos.idUsuarios = RecursosHumanosFDP.idUsuarios and prefijoMetaDatos='oficina')) as oficina
				FROM RecursosHumanosFDP
				left outer join CandidatoFDP on CandidatoFDP.idCandidatoFDP= RecursosHumanosFDP.idCandidatoFDP
				left outer join Usuarios on Usuarios.idUsuarios = RecursosHumanosFDP.idUsuarios
				where RecursosHumanosFDP.idUsuarios  = $id ";
	
		$queryAltaUsuarios = $this->db->query( $sqlAltaUsuarios );
		if( $queryAltaUsuarios->num_rows() > 0 ):
		$resultadoAltaUsuarios = $queryAltaUsuarios->result();
		$altas = array();
			
		foreach( $resultadoAltaUsuarios as $entre):
		$altas[] = array(
				"nombreUsuario" => $entre->nombreUsuario,
				"idUsuarios" => $entre->idUsuarios,
				"sdi" => $entre->sdi,
				"puesto" => $entre->puesto,
				"fechaAlta" => $entre->fechaAlta,
				"descanso" => $entre->descanso,
				"empresa" => $entre->empresa,
				"oficina" => $entre->oficina
	
		);
		endforeach;
			
		return $altas;
		else:
		return array();
		endif;
	
	}
	
}