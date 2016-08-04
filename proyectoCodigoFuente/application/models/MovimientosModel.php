<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class MovimientosModel extends CI_Model {
	
	
	
	
	public function MovimientosModel() {
        parent::__construct();
    }
		
	public function CatPuestos(){
		
		
		$sqlCatPuestos = "SELECT idPuestos,nombrePuesto FROM Puestos order by nombrePuesto asc ";
		$queryCatPuestos = $this->db->query( $sqlCatPuestos );
		
	return $queryCatPuestos->result();
		
		
	}
	
	public function CatCartera(){
	
	
		$sqlCatPuestos = "SELECT IdCartera,Cartera FROM Cartera order by Cartera asc ";
		$queryCatPuestos = $this->db->query( $sqlCatPuestos );
	
		return $queryCatPuestos->result();
	
	
	}
	
	public function CatProductos(){
	
	
		$sqlCatPuestos = "SELECT distinct idProductos,nombreProducto FROM productos order by nombreProducto asc ";
		$queryCatPuestos = $this->db->query( $sqlCatPuestos );
	
		return $queryCatPuestos->result();
	
	
	}
	
	public function GuardaVacante($Cartera,$nomGerente,$Producto,$NumVacantes,$puestoSolicitado,$comentarios,$Motivo,$IdUsuario,$token){
	
	
		$sqlInsert = "INSERT INTO VacantesPeticiones ( idPuesto, idUsuariosPeticion, fechaPeticion,tokenFDPVacantesPendientes,motivo,comentarios,idCartera,idProducto,numerovacantes ) VALUES( $puestoSolicitado, $IdUsuario ,now(),'$token','$Motivo','$comentarios',$Cartera,$Producto,$NumVacantes)";
	
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