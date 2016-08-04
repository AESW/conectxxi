<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class DireccionModel extends CI_Model {
	
	
	
	
	public function DireccionModel() {
        parent::__construct();
    }
		
    
    
    public function obtenerSolciitudesPersonal(){
    
    
    	$sqlVAcantes = "SELECT idVacantesPeticiones, VacantesPeticiones.idPuesto, Puestos.nombrePuesto,Usuarios.nombreUsuario
FROM VacantesPeticiones
LEFT OUTER JOIN Puestos ON VacantesPeticiones.idPuesto = Puestos.idPuestos
left outer join Usuarios on VacantesPeticiones.idUsuariosPeticion=Usuarios.idUsuarios
WHERE VacantesPeticiones.estatusAprobacion =  'pendiente' ";
    	$queryVacantes = $this->db->query( $sqlVAcantes );
    
    	if( $queryVacantes->num_rows() > 0 ):
    	$resultadoVacantes = $queryVacantes->result();
    	$peticiones = array();
    	foreach( $resultadoVacantes as $pet):
    	
    	$Vacantes[] = array(
    			"nombrePuesto" => $pet->nombrePuesto,
    			"idPuesto" => $pet->idPuesto,
    			"idVacantesPeticiones" => $pet->idVacantesPeticiones,
    			"nombreUsuario" => $pet->nombreUsuario,
    			
    	);
    	endforeach;
    	return $Vacantes;
    	else:
    	return array();
    	endif;
    
    }
    
	public function CatPuestos(){
		
		
		$sqlCatPuestos = "SELECT idPuestos,nombrePuesto FROM Puestos order by nombrePuesto asc ";
		$queryCatPuestos = $this->db->query( $sqlCatPuestos );
		
	return $queryCatPuestos->result();
		
		
	}
	
	public function CatCartera(){
	
	
		$sqlCatPuestos = "SELECT Cartera FROM Cartera order by Cartera asc ";
		$queryCatPuestos = $this->db->query( $sqlCatPuestos );
	
		return $queryCatPuestos->result();
	
	
	}
	
	public function CatProductos(){
	
	
		$sqlCatPuestos = "SELECT distinct nombreProducto FROM productos order by nombreProducto asc ";
		$queryCatPuestos = $this->db->query( $sqlCatPuestos );
	
		return $queryCatPuestos->result();
	
	
	}
	
	public function GuardaVacante($Cartera,$nomGerente,$Producto,$NumVacantes,$puestoSolicitado,$comentarios,$Motivo,$IdUsuario,$token){
	
	
		$sqlInsert = "INSERT INTO VacantesPeticiones ( idPuesto, idUsuariosPeticion, fechaPeticion,tokenFDPVacantesPendientes ) VALUES( $puestoSolicitado, $IdUsuario ,now(),'$token')";
	
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
	
	public function VacanteDetalle($idVacante){
	
	
		$sqlVAcantes = "SELECT VacantesPeticiones.*,Usuarios.nombreUsuario,Puestos.nombrePuesto,Cartera.Cartera,productos.nombreProducto
FROM VacantesPeticiones
left outer join Usuarios on VacantesPeticiones.idUsuariosPeticion=Usuarios.idUsuarios
left outer join Cartera on VacantesPeticiones.idCartera=Cartera.IdCartera
left outer join productos on VacantesPeticiones.idProducto=productos.idProductos
left outer join Puestos on VacantesPeticiones.idPuesto=Puestos.idPuestos
WHERE idVacantesPeticiones = $idVacante  ";
		$queryVacantes = $this->db->query( $sqlVAcantes );
	
		if( $queryVacantes->num_rows() > 0 ):
		$resultadoVacantes = $queryVacantes->result();
		$peticiones = array();
		foreach( $resultadoVacantes as $pet):
		 
		$Vacantes[] = array(
				"idVacantesPeticiones" => $pet->idVacantesPeticiones,
				"idPuesto" => $pet->idPuesto,
				"idUsuariosPeticion" => $pet->idUsuariosPeticion,
				"idUsuariosAprobacion" => $pet->idUsuariosAprobacion,
				"fechaPeticion" => $pet->fechaPeticion,
				"fechaAprobacion" => $pet->fechaAprobacion,
				"fechaAprobacion" => $pet->fechaAprobacion,
				"motivo" => $pet->motivo,
				"comentarios" => $pet->comentarios,
				"numeroVacantes" => $pet->numeroVacantes,
				"tokenFDPVacantesPendientes" => $pet->tokenFDPVacantesPendientes,
				"idCartera" => $pet->idCartera,
				"idProducto" => $pet->idProducto,
				"nombreUsuario" => $pet->nombreUsuario,
				"nombrePuesto" => $pet->nombrePuesto,
				"Cartera" => $pet->Cartera,
				"nombreProducto" => $pet->nombreProducto,
				 
		);
		endforeach;
		return $Vacantes;
		else:
		return array();
		endif;
	
	}
	
	public function AprobarVacante($Comentarios,$Id,$IdUsuario){
	
	
		$sqlInsert = "update VacantesPeticiones set idUsuariosAprobacion=$IdUsuario ,fechaAprobacion=now(),estatusAprobacion='aprobado',comenDireccion='$Comentarios' where idVacantesPeticiones=$Id ";
	
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
	
	
	
	public function RechazarVacante($Comentarios,$Id,$IdUsuario){
	
	
		$sqlInsert = "update VacantesPeticiones set idUsuariosAprobacion=$IdUsuario ,fechaAprobacion=now(),estatusAprobacion='rechazado',comenDireccion='$Comentarios' where idVacantesPeticiones=$Id ";
	
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
	
}