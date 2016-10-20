<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class MovimientosModel extends CI_Model {
	
	
	
	
	public function MovimientosModel() {
        parent::__construct();
    }
		
	public function CatPuestos(){
		
		
		$sqlCatPuestos = "SELECT idPuestos,nombrePuesto FROM Puestos where estatusPuesto= 1 order by nombrePuesto asc ";
		$queryCatPuestos = $this->db->query( $sqlCatPuestos );
		
	return $queryCatPuestos->result();
		
		
	}
	
	public function CatCartera(){
	
	
		$sqlCatPuestos = "SELECT IdCartera,Cartera FROM Cartera where estatus=1 order by Cartera asc ";
		$queryCatPuestos = $this->db->query( $sqlCatPuestos );
	
		return $queryCatPuestos->result();
	
	
	}
	
	public function CatProductos(){
	
	
		$sqlCatPuestos = "SELECT distinct idProductos,nombreProducto FROM productos where estatus=1 order by nombreProducto asc ";
		$queryCatPuestos = $this->db->query( $sqlCatPuestos );
	
		return $queryCatPuestos->result();
	
	
	}
	
	public function GuardaVacante($Cartera,$nomGerente,$Producto,$NumVacantes,$puestoSolicitado,$comentarios,$Motivo,$IdUsuario,$token){
	
	
		$sqlInsert = "INSERT INTO VacantesPeticiones ( idPuesto, idUsuariosPeticion, fechaPeticion,tokenFDPVacantesPendientes,motivo,comentarios,idCartera,idProducto,numerovacantes,vacantesContratados ) VALUES( $puestoSolicitado, $IdUsuario ,now(),'$token','$Motivo','$comentarios',$Cartera,$Producto,$NumVacantes,0)";
	
		$queryInsert = $this->db->query($sqlInsert);
	//	$idAltaUsuario = $this->db->insert_id();
	
		if ($queryInsert)
		{
	
	
	
			return true;
		}
		else{
			return false;
		}
	
	
	}
	
	function Productos($id)
	{
		$consulta = $this->db->query("SELECT idProductos,nombreProducto FROM productos where Cartera_IdCartera = $id order by nombreProducto asc");
		
		$arrayProductos = array();
		if(  $consulta->num_rows() > 0 ):
		
		
		$arrayProductos = $consulta->result();
		
		
		endif;
			
		
		return $arrayProductos;
			
	
	}
	
	public function obtenerMovimientosEmpleados($idUsuario){
	
		$sqlSolPermisos = "select SolPermisos.*,Usuarios.nombreUsuario from SolPermisos
left outer join Usuarios
on SolPermisos.idUsuarios=Usuarios.idUsuarios
left outer join TaxPuestoUsuario
on TaxPuestoUsuario.idUsuarios =  SolPermisos.idUsuarios where SolPermisos.idUsuarios=$idUsuario";
	
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
				"aprobado" => $aprobados->aprobado
	
		);
		endforeach;
		endif;
	
	
		$sqlSolDescanso = "select SolDiaDescanso.*,Usuarios.nombreUsuario from SolDiaDescanso
left outer join Usuarios
on SolDiaDescanso.idUsuarios=Usuarios.idUsuarios
left outer join TaxPuestoUsuario
on TaxPuestoUsuario.idUsuarios =  SolDiaDescanso.idUsuarios where SolDiaDescanso.idUsuarios=$idUsuario";
	
		$querySolDescanso = $this->db->query( $sqlSolDescanso );
		$arraySolDescanso = array();
		if(  $querySolDescanso->num_rows() > 0 ):
		$resultadoSolDescanso = $querySolDescanso->result();
		foreach($resultadoSolDescanso as $SolDescanso):
		$arraySolDescanso[] = array(
				"idUsuarios" => $SolDescanso->idUsuarios,
				"nombreUsuario" => $SolDescanso->nombreUsuario,
				"autorizacion" => "descanso",
				"aprobado" => $SolDescanso->aprobado
		);
		endforeach;
		endif;
	
	
		$sqlSolTurno = "select SolCambioTurno.*,Usuarios.nombreUsuario from SolCambioTurno
left outer join Usuarios
on SolCambioTurno.idUsuarios=Usuarios.idUsuarios
left outer join TaxPuestoUsuario
on TaxPuestoUsuario.idUsuarios =  SolCambioTurno.idUsuarios where SolCambioTurno.idUsuarios=$idUsuario";
	
		$querySolTurno = $this->db->query( $sqlSolTurno );
		$arraySolTurno = array();
		if(  $querySolTurno->num_rows() > 0 ):
		$resultadoSolTurno = $querySolTurno->result();
		foreach($resultadoSolTurno as $SolTurno):
		$arraySolTurno[] = array(
				"idUsuarios" => $SolTurno->idUsuarios,
				"nombreUsuario" => $SolTurno->nombreUsuario,
				"autorizacion" => "turno",
				"aprobado" => $SolTurno->aprobado
		);
		endforeach;
		endif;
	
	
	
	
	
		$resultadoMovimientos = array_merge($arraySolPermisos, $arraySolDescanso,$arraySolTurno);
	
		return $resultadoMovimientos;
	}
	
	public function DatosEmpleados($idUsuario){
	
	
		$sqlDatos = "Select nombreUsuario,
				(Select valorMetaDatos from UsuariosMetaDatos where prefijoMetaDatos='fechaIngreso' and idUsuarios= $idUsuario) as fechaIngreso
		        from Usuarios where idUsuarios=$idUsuario";
		$queryDatos = $this->db->query( $sqlDatos );
		
		$arrayDatos = array();
		if(  $queryDatos->num_rows() > 0 ):
		$resultadoDatos = $queryDatos->result();
		foreach($resultadoDatos as $aprobados):
		$arrayDatos[] = array(
				"nombreUsuario" => $aprobados->nombreUsuario,
				"fechaIngreso" => $aprobados->fechaIngreso,
			
		);
		endforeach;
		endif;
		
		return $arrayDatos;
	
	}
	
	
	public function obtenerDatosBiografia($id){
	
	
		
		
		$sqlDatos = "Select RecursosHumanosFDP.idUsuarios,CandidatoFDP.idCandidatoFDP,CandidatoFDP.estadoCivil as estado_civil_candidato,CandidatoFDP.nivelEducativo as nivel_educativo_candidato,
				(select valorMetaDatos from MetaDatosCandidatoFDP where idCandidatoFDP=RecursosHumanosFDP.idCandidatoFDP and prefijoMetaDatos='calle_no_candidato') as calle_no_candidato,
				(select valorMetaDatos from MetaDatosCandidatoFDP where idCandidatoFDP=RecursosHumanosFDP.idCandidatoFDP and prefijoMetaDatos='cp_candidato') as cp_candidato,
				(select valorMetaDatos from MetaDatosCandidatoFDP where idCandidatoFDP=RecursosHumanosFDP.idCandidatoFDP and prefijoMetaDatos='telefono_casa_candidato') as telefono_casa_candidato,
				(select valorMetaDatos from MetaDatosCandidatoFDP where idCandidatoFDP=RecursosHumanosFDP.idCandidatoFDP and prefijoMetaDatos='telefono_movil_candidato') as telefono_movil_candidato,
				(select valorMetaDatos from MetaDatosCandidatoFDP where idCandidatoFDP=RecursosHumanosFDP.idCandidatoFDP and prefijoMetaDatos='telefono_otro_candidato') as telefono_otro_candidato,
				(select valorMetaDatos from MetaDatosCandidatoFDP where idCandidatoFDP=RecursosHumanosFDP.idCandidatoFDP and prefijoMetaDatos='correo_electronico_candidato') as correo_electronico_candidato,
				(select valorMetaDatos from MetaDatosCandidatoFDP where idCandidatoFDP=RecursosHumanosFDP.idCandidatoFDP and prefijoMetaDatos='nombre_contacto_emergencia_candidato') as nombre_contacto_emergencia_candidato,
				(select valorMetaDatos from MetaDatosCandidatoFDP where idCandidatoFDP=RecursosHumanosFDP.idCandidatoFDP and prefijoMetaDatos='parentesco_contacto_emergencia_candidato') as parentesco_contacto_emergencia_candidato,
				(select valorMetaDatos from MetaDatosCandidatoFDP where idCandidatoFDP=RecursosHumanosFDP.idCandidatoFDP and prefijoMetaDatos='telefono_casa_emergencia_candidato') as telefono_casa_emergencia_candidato,
				(select valorMetaDatos from MetaDatosCandidatoFDP where idCandidatoFDP=RecursosHumanosFDP.idCandidatoFDP and prefijoMetaDatos='telefono_movil_emergencia_candidato') as telefono_movil_emergencia_candidato,
		        (select valorMetaDatos from MetaDatosCandidatoFDP where idCandidatoFDP=RecursosHumanosFDP.idCandidatoFDP and prefijoMetaDatos='estado_domicilio_candidato') as estado_domicilio_candidato,
		(select valorMetaDatos from MetaDatosCandidatoFDP where idCandidatoFDP=RecursosHumanosFDP.idCandidatoFDP and prefijoMetaDatos='ciudad_domicilio_candidato') as ciudad_domicilio_candidato,
		(select valorMetaDatos from MetaDatosCandidatoFDP where idCandidatoFDP=RecursosHumanosFDP.idCandidatoFDP and prefijoMetaDatos='delegacion_domicilio_candidato') as delegacion_domicilio_candidato,
		(select valorMetaDatos from MetaDatosCandidatoFDP where idCandidatoFDP=RecursosHumanosFDP.idCandidatoFDP and prefijoMetaDatos='colonia_domicilio_candidato') as colonia_domicilio_candidato
		from RecursosHumanosFDP left outer join CandidatoFDP
		on RecursosHumanosFDP.idCandidatoFDP=CandidatoFDP.idCandidatoFDP
		where RecursosHumanosFDP.idUsuarios=$id ";
			
		$queryDatos = $this->db->query( $sqlDatos );
	
	
		$arrayContratoUsuarios = array();
		if(  $queryDatos->num_rows() > 0 ):
	
	
		$arrayDatos = $queryDatos->result();
	
	
		endif;
			
	
		return $arrayDatos;
	}
	
	
	public function obtenerIncapacidadesEmpleados($idUsuario){
	
		$sqlSolMovimiento = "select * from Incapacidades where idUsuarios=$idUsuario";
	
		$querySolMovimiento = $this->db->query( $sqlSolMovimiento );
		$arraySolMovimiento = array();
		if(  $querySolMovimiento->num_rows() > 0 ):
		$resultadoSolMovimiento = $querySolMovimiento->result();
		foreach($resultadoSolMovimiento as $aprobados):
		$arraySolMovimiento[] = array(
				"incapacidad" => $aprobados->incapacidad,
				"inicio" => $aprobados->inicio,
				"fin" => $aprobados->fin,
				"aprobada" => $aprobados->aprobada,
				"fecha_Aprobacion" => $aprobados->fecha_Aprobacion,
				"observaciones" => $aprobados->observaciones,
	
		);
		endforeach;
		endif;
		
		return $arraySolMovimiento;
	}
	
	public function obtenerMovimientosDescanso($idUsuario){
	
		$sqlSolMovimiento = "select * from UsuariosMetaDatos where idUsuarios=$idUsuario and prefijoMetaDatos='descanso'";
	
		$querySolMovimiento = $this->db->query( $sqlSolMovimiento );
		$arraySolMovimiento = array();
		if(  $querySolMovimiento->num_rows() > 0 ):
		$resultadoSolMovimiento = $querySolMovimiento->result();
		foreach($resultadoSolMovimiento as $aprobados):
		$arraySolMovimiento[] = array(
				"valorMetaDatos" => $aprobados->valorMetaDatos,
				
		);
		endforeach;
		endif;
		
		return $arraySolMovimiento;
		
	}
	
	
	public function obtenerBonosEmpleados($idUsuario){
	
		$sqlSolMovimiento = "select DescuentosAbono.*,Usuarios.nombreUsuario from DescuentosAbono
		left outer join Usuarios
		on Usuarios.idUsuarios=$idUsuario
		where movimiento=2 and numeroEmpleado=(select valorMetaDatos from UsuariosMetaDatos where prefijoMetaDatos='noEmpleado' and idUsuarios= $idUsuario) ";
	
		$querySolMovimiento = $this->db->query( $sqlSolMovimiento );
		$arraySolMovimiento = array();
		if(  $querySolMovimiento->num_rows() > 0 ):
		$resultadoSolMovimiento = $querySolMovimiento->result();
		foreach($resultadoSolMovimiento as $aprobados):
		$arraySolMovimiento[] = array(
				"nombreUsuario" => $aprobados->nombreUsuario,
				"concepto" => $aprobados->concepto,
				"Importe" => $aprobados->Importe,
				"movimiento" => $aprobados->movimiento,
				"movimientoFecha" => $aprobados->movimientoFecha
	
		);
		endforeach;
		endif;
	
		return $arraySolMovimiento;
	
	}
	
	public function obtenerDescuentosEmpleados($idUsuario){
	
		$sqlSolMovimiento = "select DescuentosAbono.*,Usuarios.nombreUsuario from DescuentosAbono
		left outer join Usuarios
		on Usuarios.idUsuarios=$idUsuario
		where movimiento=1 and numeroEmpleado=(select valorMetaDatos from UsuariosMetaDatos where prefijoMetaDatos='noEmpleado' and idUsuarios= $idUsuario)";
	
		$querySolMovimiento = $this->db->query( $sqlSolMovimiento );
		$arraySolMovimiento = array();
		if(  $querySolMovimiento->num_rows() > 0 ):
		$resultadoSolMovimiento = $querySolMovimiento->result();
		foreach($resultadoSolMovimiento as $aprobados):
		$arraySolMovimiento[] = array(
				"nombreUsuario" => $aprobados->nombreUsuario,
				"concepto" => $aprobados->concepto,
				"Importe" => $aprobados->Importe,
				"movimiento" => $aprobados->movimiento,
				"movimientoFecha" => $aprobados->movimientoFecha
	
		);
		endforeach;
		endif;
	
		return $arraySolMovimiento;
	
	}
	
	

	public function obtenerAsistenciaEmpleados($idUsuario){
	
		$sqlSolMovimiento = "select Asistencia.*,Usuarios.nombreUsuario from Asistencia left outer join Usuarios on 
Asistencia.Usuarios_idUsuarios = Usuarios.idUsuarios
where Usuarios_idUsuarios= $idUsuario";
	
		$querySolMovimiento = $this->db->query( $sqlSolMovimiento );
		$arraySolMovimiento = array();
		if(  $querySolMovimiento->num_rows() > 0 ):
		$resultadoSolMovimiento = $querySolMovimiento->result();
		foreach($resultadoSolMovimiento as $aprobados):
		$arraySolMovimiento[] = array(
				"turno" => $aprobados->turno,
				"fechaAsistencia" => $aprobados->fechaAsistencia,
				"nombreUsuario" => $aprobados->nombreUsuario
	
		);
		endforeach;
		endif;
	
		return $arraySolMovimiento;
	
	}
	
	
	public function obtenerCapacitacionEmpleados($idUsuario){
	
		$sqlSolMovimiento = "SELECT CursosUsuarios.*,Usuarios.nombreUsuario,CatalogoGrupos.*,CatalogoCursos.NombreDelCurso FROM CursosUsuarios
left outer join Usuarios
on Usuarios.idUsuarios=CursosUsuarios.idUsuarios
left outer join CatalogoGrupos
on CatalogoGrupos.idGrupo=CursosUsuarios.CatalogoGrupos_idGrupo
left outer join CatalogoCursos
on CatalogoGrupos.CatalogoCursos_idCursos=CatalogoCursos.idCursos
WHERE CursosUsuarios.idUsuarios= $idUsuario";
	
		$querySolMovimiento = $this->db->query( $sqlSolMovimiento );
		$arraySolMovimiento = array();
		if(  $querySolMovimiento->num_rows() > 0 ):
		$resultadoSolMovimiento = $querySolMovimiento->result();
		foreach($resultadoSolMovimiento as $aprobados):
		$arraySolMovimiento[] = array(
				"nombreUsuario" => $aprobados->nombreUsuario,
				"NombreDelCurso" => $aprobados->NombreDelCurso,
				"NombreGrupo" => $aprobados->NombreGrupo,
				"fechaInicial" => $aprobados->fechaInicial,
				"fechaFinal" => $aprobados->fechaFinal,
				
	
		);
		endforeach;
		endif;
	
		return $arraySolMovimiento;
	
	}
	
	public function obtenerVacacionesEmpleados($idUsuario){
	
		$sqlSolMovimiento = "select SolVacaciones.*,Usuarios.nombreUsuario from SolVacaciones
		left outer join Usuarios
		on SolVacaciones.idAutoriza=Usuarios.idUsuarios where SolVacaciones.idUsuarios=$idUsuario";
	
		$querySolMovimiento = $this->db->query( $sqlSolMovimiento );
		$arraySolMovimiento = array();
		if(  $querySolMovimiento->num_rows() > 0 ):
		$resultadoSolMovimiento = $querySolMovimiento->result();
		foreach($resultadoSolMovimiento as $aprobados):
		$arraySolMovimiento[] = array(
				"Periodo" => $aprobados->Periodo,
				"dias" => $aprobados->dias,
				"fechaSalida" => $aprobados->fechaSalida,
				"fechaEntrada" => $aprobados->fechaEntrada,
				"fechaAutoriza" => $aprobados->fechaAutoriza,
				"estatus" => $aprobados->estatus,
				"nombreUsuario" => $aprobados->nombreUsuario,
			
				
	
		);
		endforeach;
		endif;
	
		return $arraySolMovimiento;
	}
	
}