<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class CapacitacionModel extends CI_Model {
	
	
	
	
	public function CapacitacionModel() {
        parent::__construct();
    }
		
	public function obtenerUsuariosActivos(){
		
		{
			$peticiones = array();
		
			$sqlPeticiones = '
select Usuarios.nombreUsuario from RecursosHumanosFDP left outer join Usuarios on RecursosHumanosFDP.idusuarios = Usuarios.idusuarios where RecursosHumanosFDP.altaUsuario = 1 and RecursosHumanosFDP.altaUsuarioNOI = 1
					
					';//Agregar AND ReclutacionFDP aprobado, RecursosHumanosFDP aprobado
		
			$queryPeticiones = $this->db->query( $sqlPeticiones );
		
			if( $queryPeticiones->num_rows() > 0 ):
			$resultadoPeticiones = $queryPeticiones->result();
			$peticiones = array();
			foreach( $resultadoPeticiones as $pet):
		
			$peticiones[] = array(
							
					"nombreUsuario" => $pet->nombreUsuario
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
select CatalogoCursos.NombreDelCurso,CatalogoCursos.idCursos from Empresas_has_CatalogoDeCursos left outer join CatalogoCursos on Empresas_has_CatalogoDeCursos.CatalogoDeCursos_idCursos=CatalogoCursos.idCursos
					
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
select NombreDelCurso from CatalogoCursos where idCursos = $id
			
					";//Agregar AND ReclutacionFDP aprobado, RecursosHumanosFDP aprobado
	
			$queryPeticiones = $this->db->query( $sqlPeticiones );
	
			if( $queryPeticiones->num_rows() > 0 ):
			$resultadoPeticiones = $queryPeticiones->result();
			$peticiones = array();
			foreach( $resultadoPeticiones as $pet):
	
			$peticiones[] = array(
	
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

}