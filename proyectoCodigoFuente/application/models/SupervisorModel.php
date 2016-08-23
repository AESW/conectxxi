<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class SupervisorModel extends CI_Model {
	
	
	
	
	public function MovimientosModel() {
        parent::__construct();
    }
		
    public function obtenerPersonal($id,$idUsuario){
    
    
    	$sqlObtenerPersonal = "SELECT TaxPuestoUsuario.*,Usuarios.nombreUsuario
    		FROM TaxPuestoUsuario left outer join Usuarios  on TaxPuestoUsuario.idUsuarios=Usuarios.idUsuarios where  idUsuariosPadre = $idUsuario and (SELECT valorMetaDatos FROM UsuariosMetaDatos WHERE UsuariosMetaDatos.idUsuarios = TaxPuestoUsuario.idUsuarios and prefijoMetaDatos='turno') = '$id'" ;
    		
    	$resultObtenerPersonal = array();
    		
    	$queryObtenerPersonal = $this->db->query($sqlObtenerPersonal);
    		
    	if( $queryObtenerPersonal->num_rows() > 0 ):
    	$resultObtenerPersonal = $queryObtenerPersonal->result();
    
    
    	endif;
    		
    
    	return $resultObtenerPersonal;
    
    
    }
}