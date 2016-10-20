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
								(SELECT valorMetaDatos FROM UsuariosMetaDatos WHERE UsuariosMetaDatos.idUsuarios = RecursosHumanosFDP.idUsuarios and prefijoMetaDatos='horario') as horario,
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
				"oficina" => $entre->oficina,
				"horario" => $entre->horario
	
		);
		endforeach;
			
		return $altas;
		else:
		return array();
		endif;
	
	}
	
	public function obtenerAutorizacionesGerente($idUsuario){
		
		$sqlSolPermisos = "select SolPermisos.*,Usuarios.nombreUsuario from SolPermisos
left outer join Usuarios
on SolPermisos.idUsuarios=Usuarios.idUsuarios
left outer join TaxPuestoUsuario
on TaxPuestoUsuario.idUsuarios =  SolPermisos.idUsuarios where SolPermisos.aprobado=0 and TaxPuestoUsuario.idUsuariosPadre= $idUsuario";
	
		$querySolPermisos = $this->db->query( $sqlSolPermisos );
		$arraySolPermisos = array();
		if(  $querySolPermisos->num_rows() > 0 ):
		$resultadoSolPermisos = $querySolPermisos->result();
		foreach($resultadoSolPermisos as $aprobados):
		$arraySolPermisos[] = array(
				"idUsuarios" => $aprobados->idUsuarios,
				"IdPermiso" => $aprobados->IdPermiso,
				"nombreUsuario" => $aprobados->nombreUsuario,
				"autorizacion" => "permiso",
				
		);
		endforeach;
		endif;
	
	
		$sqlSolDescanso = "select SolDiaDescanso.*,Usuarios.nombreUsuario from SolDiaDescanso
left outer join Usuarios
on SolDiaDescanso.idUsuarios=Usuarios.idUsuarios
left outer join TaxPuestoUsuario
on TaxPuestoUsuario.idUsuarios =  SolDiaDescanso.idUsuarios where SolDiaDescanso.aprobado=0 and TaxPuestoUsuario.idUsuariosPadre= $idUsuario";
	
		$querySolDescanso = $this->db->query( $sqlSolDescanso );
		$arraySolDescanso = array();
		if(  $querySolDescanso->num_rows() > 0 ):
		$resultadoSolDescanso = $querySolDescanso->result();
		foreach($resultadoSolDescanso as $SolDescanso):
		$arraySolDescanso[] = array(
				"idSolDiaDescanso" => $SolDescanso->idSolDiaDescanso,
				"idUsuarios" => $SolDescanso->idUsuarios,
				"nombreUsuario" => $SolDescanso->nombreUsuario,
				"autorizacion" => "descanso"
		);
		endforeach;
		endif;
	
	
		$sqlSolTurno = "select SolCambioTurno.*,Usuarios.nombreUsuario from SolCambioTurno
left outer join Usuarios
on SolCambioTurno.idUsuarios=Usuarios.idUsuarios
left outer join TaxPuestoUsuario
on TaxPuestoUsuario.idUsuarios =  SolCambioTurno.idUsuarios where SolCambioTurno.aprobado=0 and TaxPuestoUsuario.idUsuariosPadre= $idUsuario";
	
		$querySolTurno = $this->db->query( $sqlSolTurno );
		$arraySolTurno = array();
		if(  $querySolTurno->num_rows() > 0 ):
		$resultadoSolTurno = $querySolTurno->result();
		foreach($resultadoSolTurno as $SolTurno):
		$arraySolTurno[] = array(
				"idSolCambioTurno" => $SolTurno->idSolCambioTurno,
				"idUsuarios" => $SolTurno->idUsuarios,
				"nombreUsuario" => $SolTurno->nombreUsuario,
				"autorizacion" => "turno"
		);
		endforeach;
		endif;
	
	
		$sqlSolVacaciones = "select SolVacaciones.*,Usuarios.nombreUsuario from SolVacaciones
		left outer join Usuarios
		on SolVacaciones.idUsuarios=Usuarios.idUsuarios
		left outer join TaxPuestoUsuario
		on TaxPuestoUsuario.idUsuarios =  SolVacaciones.idUsuarios where SolVacaciones.estatus=0 and TaxPuestoUsuario.idUsuariosPadre= $idUsuario";
		
		$querySolVacaciones = $this->db->query( $sqlSolVacaciones );
		$arraySolVacaciones = array();
		if(  $querySolVacaciones->num_rows() > 0 ):
		$resultadoSolVacaciones = $querySolVacaciones->result();
		foreach($resultadoSolVacaciones as $SolVacaciones):
		$arraySolVacaciones[] = array(
				"idSolVacaciones" => $SolVacaciones->idSolVacaciones,
				"idUsuarios" => $SolVacaciones->idUsuarios,
				"nombreUsuario" => $SolVacaciones->nombreUsuario,
				"autorizacion" => "vacaciones"
		);
		endforeach;
		endif;
	
	
		$resultadoMovimientos = array_merge($arraySolPermisos, $arraySolDescanso,$arraySolTurno,$arraySolVacaciones);
	
		return $resultadoMovimientos;
	}
	
	
	public function DatosusuariosPermiso($idPermiso){
	
	
		$peticiones = array();
	
		$sqlPeticiones = "
		SELECT SolPermisos.*, Usuarios.nombreUsuario	from SolPermisos
		left outer join Usuarios
		on Usuarios.idUsuarios=SolPermisos.idUsuarios where SolPermisos.IdPermiso= $idPermiso
	
		";//Agregar AND ReclutacionFDP aprobado, RecursosHumanosFDP aprobado
	
		$queryPeticiones = $this->db->query( $sqlPeticiones );
	
		if( $queryPeticiones->num_rows() > 0 ):
		$resultadoPeticiones = $queryPeticiones->result();
		$peticiones = array();
		foreach( $resultadoPeticiones as $pet):
	
		$peticiones[] = array(
				"IdPermiso" => $pet->IdPermiso,
				"idUsuarios" => $pet->idUsuarios,
				"nombreUsuario" => $pet->nombreUsuario,
				"observaciones" => $pet->observaciones,
				"fecha_inicio" => $pet->fecha_inicio,
				"fecha_fin" => $pet->fecha_fin
	
		);
		endforeach;
		return $peticiones;
		else:
		return array();
		endif;
	
	
	}
	
	public function DatosusuariosDescanso($idDescanso){
	
	
		$peticiones = array();
	
		$sqlPeticiones = "
		SELECT SolDiaDescanso.*, Usuarios.nombreUsuario	from SolDiaDescanso
		left outer join Usuarios
		on Usuarios.idUsuarios=SolDiaDescanso.idUsuarios where SolDiaDescanso.idSolDiaDescanso= $idDescanso
	
		";//Agregar AND ReclutacionFDP aprobado, RecursosHumanosFDP aprobado
	
		$queryPeticiones = $this->db->query( $sqlPeticiones );
	
		if( $queryPeticiones->num_rows() > 0 ):
		$resultadoPeticiones = $queryPeticiones->result();
		$peticiones = array();
		foreach( $resultadoPeticiones as $pet):
	
		$peticiones[] = array(
				"idSolDiaDescanso" => $pet->idSolDiaDescanso,
				"idUsuarios" => $pet->idUsuarios,
				"nombreUsuario" => $pet->nombreUsuario,
				"observaciones" => $pet->observaciones,
				"dia" => $pet->dia
	
		);
		endforeach;
		return $peticiones;
		else:
		return array();
		endif;
	
	
	}
	
	public function DatosusuariosCambioTurno($idTurno){
	
	
		$peticiones = array();
	
		$sqlPeticiones = "
		SELECT SolCambioTurno.*, Usuarios.nombreUsuario	from SolCambioTurno
		left outer join Usuarios
		on Usuarios.idUsuarios=SolCambioTurno.idUsuarios where SolCambioTurno.idSolCambioTurno= $idTurno
	
		";//Agregar AND ReclutacionFDP aprobado, RecursosHumanosFDP aprobado
	
		$queryPeticiones = $this->db->query( $sqlPeticiones );
	
		if( $queryPeticiones->num_rows() > 0 ):
		$resultadoPeticiones = $queryPeticiones->result();
		$peticiones = array();
		foreach( $resultadoPeticiones as $pet):
	
		$peticiones[] = array(
				"idSolCambioTurno" => $pet->idSolCambioTurno,
				"idUsuarios" => $pet->idUsuarios,
				"nombreUsuario" => $pet->nombreUsuario,
				"observaciones" => $pet->observaciones,
				"turno" => $pet->turno,
				"fechaAplicacion" => $pet->fechaAplicacion,
	
		);
		endforeach;
		return $peticiones;
		else:
		return array();
		endif;
	
	
	}
	
	public function obtenerMovimientosSueldo($idUsuario){
	
		$sqlSolMovimiento = "select valorMetaDatos as idSueldos,Sueldos.sueldo from UsuariosMetadatos left outer join Sueldos
		on UsuariosMetadatos.valorMetaDatos = Sueldos.idSueldos where idUsuarios=$idUsuario and prefijoMetaDatos='sueldoNOI'";
	
		$querySolMovimiento = $this->db->query( $sqlSolMovimiento );
		$arraySolMovimiento = array();
		if(  $querySolMovimiento->num_rows() > 0 ):
		$resultadoSolMovimiento = $querySolMovimiento->result();
		
		endif;
	
		return $resultadoSolMovimiento;
	
	}
	
	public function obtenerCatSueldo(){
	
	
		$peticiones = array();
	
		$sqlPeticiones = "
		SELECT * from Sueldos where estatus=1
	
		";//Agregar AND ReclutacionFDP aprobado, RecursosHumanosFDP aprobado
	
		$queryPeticiones = $this->db->query( $sqlPeticiones );
	
		if( $queryPeticiones->num_rows() > 0 ):
		$resultadoPeticiones = $queryPeticiones->result();
		$peticiones = array();
		foreach( $resultadoPeticiones as $pet):
	
		$peticiones[] = array(
				"idSueldos" => $pet->idSueldos,
				"sueldo" => $pet->sueldo,
			
		);
		endforeach;
		return $peticiones;
		else:
		return array();
		endif;
	
	
	}
	
	public function DatosusuariosVacaciones($idVacaciones){
	
	
		$peticiones = array();
	
		$sqlPeticiones = "
		SELECT SolVacaciones.*, Usuarios.nombreUsuario	from SolVacaciones
		left outer join Usuarios
		on Usuarios.idUsuarios=SolVacaciones.idUsuarios where SolVacaciones.idSolVacaciones= $idVacaciones
	
		";//Agregar AND ReclutacionFDP aprobado, RecursosHumanosFDP aprobado
	
		$queryPeticiones = $this->db->query( $sqlPeticiones );
	
		if( $queryPeticiones->num_rows() > 0 ):
		$resultadoPeticiones = $queryPeticiones->result();
		$peticiones = array();
		foreach( $resultadoPeticiones as $pet):
	
		$peticiones[] = array(
				"idSolVacaciones" => $pet->idSolVacaciones,
				"idUsuarios" => $pet->idUsuarios,
				"nombreUsuario" => $pet->nombreUsuario,
				"fechaSalida" => $pet->fechaSalida,
				"fechaEntrada" => $pet->fechaEntrada,
				"dias" => $pet->dias,
				"Periodo" => $pet->Periodo,
				
		);
		endforeach;
		return $peticiones;
		else:
		return array();
		endif;
	
	
	}
	
	
}