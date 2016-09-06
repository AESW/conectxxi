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
	
	public function obtenerAutorizacionesGerente($idUsuario){
		
		$sqlSolPermisos = 'select SolPermisos.*,Usuarios.nombreUsuario from SolPermisos
left outer join Usuarios
on SolPermisos.idUsuarios=Usuarios.idUsuarios
left outer join TaxPuestoUsuario
on TaxPuestoUsuario.idUsuarios =  SolPermisos.idUsuarios ';
	
		$querySolPermisos = $this->db->query( $sqlSolPermisos );
		$arraySolPermisos = array();
		if(  $querySolPermisos->num_rows() > 0 ):
		$resultadoSolPermisos = $querySolPermisos->result();
		foreach($resultadoSolPermisos as $aprobados):
		$arraySolPermisos[] = array(
				"idUsuarios" => $aprobados->idUsuarios,
				"nombreUsuario" => $aprobados->nombreUsuario,
				"autorizacion" => "permiso",
				
		);
		endforeach;
		endif;
	
	
		$sqlSolDescanso = 'select SolDiaDescanso.*,Usuarios.nombreUsuario from SolDiaDescanso
left outer join Usuarios
on SolDiaDescanso.idUsuarios=Usuarios.idUsuarios
left outer join TaxPuestoUsuario
on TaxPuestoUsuario.idUsuarios =  SolDiaDescanso.idUsuarios';
	
		$querySolDescanso = $this->db->query( $sqlSolDescanso );
		$arraySolDescanso = array();
		if(  $querySolDescanso->num_rows() > 0 ):
		$resultadoSolDescanso = $querySolDescanso->result();
		foreach($resultadoSolDescanso as $SolDescanso):
		$arraySolDescanso[] = array(
				"idUsuarios" => $SolDescanso->idUsuarios,
				"nombreUsuario" => $SolDescanso->nombreUsuario,
				"autorizacion" => "descanso"
		);
		endforeach;
		endif;
	
	
		$sqlSolTurno = 'select SolCambioTurno.*,Usuarios.nombreUsuario from SolCambioTurno
left outer join Usuarios
on SolCambioTurno.idUsuarios=Usuarios.idUsuarios
left outer join TaxPuestoUsuario
on TaxPuestoUsuario.idUsuarios =  SolCambioTurno.idUsuarios';
	
		$querySolTurno = $this->db->query( $sqlSolTurno );
		$arraySolTurno = array();
		if(  $querySolTurno->num_rows() > 0 ):
		$resultadoSolTurno = $querySolTurno->result();
		foreach($resultadoSolTurno as $SolTurno):
		$arraySolTurno[] = array(
				"idUsuarios" => $SolTurno->idUsuarios,
				"nombreUsuario" => $SolTurno->nombreUsuario,
				"autorizacion" => "turno"
		);
		endforeach;
		endif;
	
	
		
	
	
		$resultadoMovimientos = array_merge($arraySolPermisos, $arraySolDescanso,$arraySolTurno);
	
		return $resultadoMovimientos;
	}
	
}