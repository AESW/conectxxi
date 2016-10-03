<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class CapacitacionModel extends CI_Model {
	
	
	
	
	public function CapacitacionModel() {
        parent::__construct();
    }
		
	public function obtenerUsuariosActivos(){
		
		{
			$peticiones = array();
		
			$sqlPeticiones = '
select Usuarios.nombreUsuario,Usuarios.idUsuarios,CursosUsuarios.Asignado from RecursosHumanosFDP left outer join Usuarios on RecursosHumanosFDP.idusuarios = Usuarios.idusuarios
					left outer join CursosUsuarios
					on RecursosHumanosFDP.idUsuarios = CursosUsuarios.idUsuarios
					where RecursosHumanosFDP.altaUsuario = 1 and RecursosHumanosFDP.altaUsuarioNOI = 1
					
					';//Agregar AND ReclutacionFDP aprobado, RecursosHumanosFDP aprobado
		
			$queryPeticiones = $this->db->query( $sqlPeticiones );
		
			if( $queryPeticiones->num_rows() > 0 ):
			$resultadoPeticiones = $queryPeticiones->result();
			$peticiones = array();
			foreach( $resultadoPeticiones as $pet):
		
			$peticiones[] = array(
							
					"nombreUsuario" => $pet->nombreUsuario,
					"idUsuarios" => $pet->idUsuarios,
					"Asignado" => $pet->Asignado
			);
			endforeach;
			return $peticiones;
			else:
			return array();
			endif;
		}
				
		
	}

	
	public function Cursos(){
	
		
			$peticiones = array();
	
			$sqlPeticiones = '
select CatalogoCursos.NombreDelCurso,CatalogoCursos.idCursos from  CatalogoCursos where estatus=1					
					';//Agregar AND ReclutacionFDP aprobado, RecursosHumanosFDP aprobado
	
			$queryPeticiones = $this->db->query( $sqlPeticiones );
	
			if( $queryPeticiones->num_rows() > 0 ):
			$resultadoPeticiones = $queryPeticiones->result();
			$peticiones = array();
			foreach( $resultadoPeticiones as $pet):
	
			$peticiones[] = array(
						
					"NombreDelCurso" => $pet->NombreDelCurso,
					"idCursos" => $pet->idCursos
			);
			endforeach;
			return $peticiones;
			else:
			return array();
			endif;
		
	
	
	}
	
	
	public function Curso($id){
	
		
			$peticiones = array();
	
			$sqlPeticiones = "
select idCursos,NombreDelCurso from CatalogoCursos where idCursos = $id
			
					";//Agregar AND ReclutacionFDP aprobado, RecursosHumanosFDP aprobado
	
			$queryPeticiones = $this->db->query( $sqlPeticiones );
	
			if( $queryPeticiones->num_rows() > 0 ):
			$resultadoPeticiones = $queryPeticiones->result();
			$peticiones = array();
			foreach( $resultadoPeticiones as $pet):
	
			$peticiones[] = array(
					"idCursos" => $pet->idCursos,
					"NombreDelCurso" => $pet->NombreDelCurso,
					
			);
			endforeach;
			return $peticiones;
			else:
			return array();
			endif;
		
	
	
	}
	
	
	public function FechaCurso($id){
	
		
			$peticiones = array();
	
			$sqlPeticiones = "
			select idFechas,FechaInicial,FechaFinal from CatalogoFechas where CatalogoDeCursos_idCursos	 = $id
				
			";//Agregar AND ReclutacionFDP aprobado, RecursosHumanosFDP aprobado
	
			$queryPeticiones = $this->db->query( $sqlPeticiones );
	
			if( $queryPeticiones->num_rows() > 0 ):
			$resultadoPeticiones = $queryPeticiones->result();
			$peticiones = array();
			foreach( $resultadoPeticiones as $pet):
	
			$peticiones[] = array(
					"idFechas" => $pet->idFechas,
					"FechaInicial" => $pet->FechaInicial,
	"FechaFinal" => $pet->FechaFinal,
						
			);
			endforeach;
			return $peticiones;
			else:
			return array();
			endif;
		
	
	
	}
	
	public function Lugar($id){
	
	
		$peticiones = array();
	
		$sqlPeticiones = "
		Select * from CatalogoUbicaciones  left outer join  CatalogoSalas 
on CatalogoUbicaciones.CatalogoDeSalas_idSalas = CatalogoSalas.idSalas
left outer join Oficinas on CatalogoSalas.Oficinas_idOficinas= Oficinas.idOficinas
	
		";//Agregar AND ReclutacionFDP aprobado, RecursosHumanosFDP aprobado
	
		$queryPeticiones = $this->db->query( $sqlPeticiones );
	
		if( $queryPeticiones->num_rows() > 0 ):
		$resultadoPeticiones = $queryPeticiones->result();
		$peticiones = array();
		foreach( $resultadoPeticiones as $pet):
	
		$peticiones[] = array(
	
				"idUbicacion" => $pet->idUbicacion,
				"nombreOficina" => $pet->nombreOficina,
				"Direccion" => $pet->Direccion,
				"Sala" => $pet->Sala
		);
		endforeach;
		return $peticiones;
		else:
		return array();
		endif;
	
	
	
	}
	
	public function Duracion($id){
	
	
		$peticiones = array();
	
		$sqlPeticiones = "
		select * from CatalogoDuracion where CatalogoDeCursos_idCursos	 = $id
	
		";//Agregar AND ReclutacionFDP aprobado, RecursosHumanosFDP aprobado
	
		$queryPeticiones = $this->db->query( $sqlPeticiones );
	
		if( $queryPeticiones->num_rows() > 0 ):
		$resultadoPeticiones = $queryPeticiones->result();
		$peticiones = array();
		foreach( $resultadoPeticiones as $pet):
	
		$peticiones[] = array(
	
				"idDuracion" => $pet->idDuracion,
				"Duracion" => $pet->Duracion,
				"Horario" => $pet->Horario,
	
		);
		endforeach;
		return $peticiones;
		else:
		return array();
		endif;
	
	
	
	}
	
	public function facilitador(){
	
	
		$peticiones = array();
	
		$sqlPeticiones = "
select Usuarios.nombreUsuario,Usuarios.idUsuarios from TaxPuestoUsuario left outer join Usuarios on TaxPuestoUsuario.idusuarios = Usuarios.idusuarios where TaxPuestoUsuario.idPuestos = 30
				
	
		";//Agregar AND ReclutacionFDP aprobado, RecursosHumanosFDP aprobado
	
		$queryPeticiones = $this->db->query( $sqlPeticiones );
	
		if( $queryPeticiones->num_rows() > 0 ):
		$resultadoPeticiones = $queryPeticiones->result();
		$peticiones = array();
		foreach( $resultadoPeticiones as $pet):
	
		$peticiones[] = array(
	
				"idUsuarios" => $pet->idUsuarios,
				"nombreUsuario" => $pet->nombreUsuario
				
	
		);
		endforeach;
		return $peticiones;
		else:
		return array();
		endif;
	
	
	
	}
	
	public function obtenerCursos(){
	
		{
			$peticiones = array();
	
			$sqlPeticiones = 'select * from CatalogoCursos where estatus=1';//Agregar AND ReclutacionFDP aprobado, RecursosHumanosFDP aprobado
	
			$queryPeticiones = $this->db->query( $sqlPeticiones );
	
			if( $queryPeticiones->num_rows() > 0 ):
			$resultadoPeticiones = $queryPeticiones->result();
			$peticiones = array();
			foreach( $resultadoPeticiones as $pet):
	
			$peticiones[] = array(
						
					"idCursos" => $pet->idCursos,
					"NombreDelCurso" => $pet->NombreDelCurso
			);
			endforeach;
			return $peticiones;
			else:
			return array();
			endif;
		}
	
	
	}
	
	public function obtenerGrupo($id){
	
	
		$sqlObtenerGrupo = "Select * from CatalogoGrupos 
Where CatalogoGrupos.CatalogoCursos_idCursos=$id " ;
	
		$resultObtenerGrupo = array();
	
		$queryObtenerGrupo = $this->db->query($sqlObtenerGrupo);
	
		if( $queryObtenerGrupo->num_rows() > 0 ):
		$resultObtenerGrupo = $queryObtenerGrupo->result();
	
	
		endif;
	
	
		return $resultObtenerGrupo;
	
	
	}
	public function obtenerGrupoDetalle($id){
	
	
		$sqlObtenerGrupo = "Select *, (select count(*) from CursosUsuarios where CatalogoGrupos_idGrupo=$id) as asignados from CatalogoGrupos 
		Left outer join CatalogoUbicaciones
		On CatalogoGrupos. CatalogoUbicaciones_idUbicacion = CatalogoUbicaciones. idUbicacion
		Left outer join Usuarios
		On CatalogoGrupos. Usuarios_idUsuarios = Usuarios.idUsuarios
		Left outer join CatalogoSalas
		On CatalogoUbicaciones. CatalogoDeSalas_idSalas = CatalogoSalas.idSalas
		Where CatalogoGrupos.idGrupo=$id " ;
	
		$resultObtenerGrupo = array();
	
		$queryObtenerGrupo = $this->db->query($sqlObtenerGrupo);
	
		if( $queryObtenerGrupo->num_rows() > 0 ):
		$resultObtenerGrupo = $queryObtenerGrupo->result();
	
	
		endif;
	
	
		return $resultObtenerGrupo;
	
	
	}
	
	public function verificarGrupo($idgrupo){
	
	
		$sqlObtenerGrupo = "Select * from CatalogoGrupos Where CatalogoGrupos.idGrupo=$idgrupo " ;
	
		$resultObtenerGrupo = array();
	
		$queryObtenerGrupo = $this->db->query($sqlObtenerGrupo);
	
		if( $queryObtenerGrupo->num_rows() > 0 ):
		$resultObtenerGrupo = $queryObtenerGrupo->result();
	
	
		endif;
	
	
		return $resultObtenerGrupo;
	
	
	}
	public function verificarCupo($idgrupo){
	
	
		$sqlObtenerGrupo = "Select * from CatalogoGrupos
		Left outer join CatalogoUbicaciones
		On CatalogoGrupos. CatalogoUbicaciones_idUbicacion = CatalogoUbicaciones. idUbicacion
		Left outer join Usuarios
		On CatalogoGrupos. Usuarios_idUsuarios = Usuarios.idUsuarios
		Left outer join CatalogoSalas
		On CatalogoUbicaciones. CatalogoDeSalas_idSalas = CatalogoSalas.idSalas
		Where CatalogoGrupos.idGrupo=$idgrupo " ;
	
		$resultObtenerGrupo = array();
	
		$queryObtenerGrupo = $this->db->query($sqlObtenerGrupo);
	
		if( $queryObtenerGrupo->num_rows() > 0 ):
		$resultObtenerGrupo = $queryObtenerGrupo->result();
	
	
		endif;
	
	
		return $resultObtenerGrupo;
	
	
	}
	
	
	
	
	
		public function obtenerUsuariosActivosGrupo($id){
		
			
				$peticiones = array();
		
				$sqlPeticiones = "
select Usuarios.nombreUsuario,Usuarios.idUsuarios,CursosUsuarios.Asignado from RecursosHumanosFDP left outer join Usuarios on RecursosHumanosFDP.idusuarios = Usuarios.idusuarios
					left outer join CursosUsuarios
					on RecursosHumanosFDP.idUsuarios = CursosUsuarios.idUsuarios and CursosUsuarios.CatalogoGrupos_idGrupo= $id	
					where RecursosHumanosFDP.altaUsuario = 1 and RecursosHumanosFDP.altaUsuarioNOI = 1 
			
					";//Agregar AND ReclutacionFDP aprobado, RecursosHumanosFDP aprobado
		
				$queryPeticiones = $this->db->query( $sqlPeticiones );
		
				if( $queryPeticiones->num_rows() > 0 ):
				$resultadoPeticiones = $queryPeticiones->result();
				$peticiones = array();
				foreach( $resultadoPeticiones as $pet):
		
				$peticiones[] = array(
							
						"nombreUsuario" => $pet->nombreUsuario,
						"idUsuarios" => $pet->idUsuarios,
						"Asignado" => $pet->Asignado
				);
				endforeach;
				return $peticiones;
				else:
				return array();
				endif;
			
		
		
		}
	
		
		public function obtenerUsuariosActivosGrupoAsistencia($id){
		
				
			$peticiones = array();
		
			$sqlPeticiones = "
			select Usuarios.nombreUsuario,Usuarios.idUsuarios,CursosUsuarios.Asignado from CursosUsuarios left outer join Usuarios 
			on CursosUsuarios.idUsuarios = Usuarios.idusuarios
			left outer join CatalogoGrupos
			on CursosUsuarios.CatalogoGrupos_idGrupo= $id 
			where  CatalogoGrupos.cerrado=1
				
			";//Agregar AND ReclutacionFDP aprobado, RecursosHumanosFDP aprobado
		
			$queryPeticiones = $this->db->query( $sqlPeticiones );
		
			if( $queryPeticiones->num_rows() > 0 ):
			$resultadoPeticiones = $queryPeticiones->result();
			$peticiones = array();
			foreach( $resultadoPeticiones as $pet):
		
			$peticiones[] = array(
						
					"nombreUsuario" => $pet->nombreUsuario,
					"idUsuarios" => $pet->idUsuarios,
					"Asignado" => $pet->Asignado
			);
			endforeach;
			return $peticiones;
			else:
			return array();
			endif;
				
		
		
		}
		
		public function Usuario($idUsuario){
		
		
			$peticiones = array();
		
			$sqlPeticiones = "
			select * from Usuarios where idUsuarios=$idUsuario
		
			";//Agregar AND ReclutacionFDP aprobado, RecursosHumanosFDP aprobado
		
			$queryPeticiones = $this->db->query( $sqlPeticiones );
		
			if( $queryPeticiones->num_rows() > 0 ):
			$resultadoPeticiones = $queryPeticiones->result();
			$peticiones = array();
			foreach( $resultadoPeticiones as $pet):
		
			$peticiones[] = array(
		
					"nombreUsuario" => $pet->nombreUsuario,
					"idUsuarios" => $pet->idUsuarios,
					
			);
			endforeach;
			return $peticiones;
			else:
			return array();
			endif;
		
		
		
		}
	
		public function temas($id){
		
		
			$peticiones = array();
		
			$sqlPeticiones = "
			select * from CatalogoTemas where CatalogoDeCursos_idCursos = $id and estatus=1
				
			";//Agregar AND ReclutacionFDP aprobado, RecursosHumanosFDP aprobado
		
			$queryPeticiones = $this->db->query( $sqlPeticiones );
		
			if( $queryPeticiones->num_rows() > 0 ):
			$resultadoPeticiones = $queryPeticiones->result();
			$peticiones = array();
			foreach( $resultadoPeticiones as $pet):
		
			$peticiones[] = array(
					"idTema" => $pet->idTema,
					"NombreDelTema" => $pet->NombreDelTema,
					"ValorMinimo" => $pet->ValorMinimo
						
			);
			endforeach;
			return $peticiones;
			else:
			return array();
			endif;
		
		
		
		}
		
}



