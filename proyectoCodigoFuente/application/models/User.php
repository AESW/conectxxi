<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class User extends CI_Model {
	
	
	var $variables;
	
	
	public function User() {
        parent::__construct();
    }
	
	function metodoSet( $variables ){
	    $this->variables = $variables;
	    return $this;
    }
    
    function consultasSQLSELECT (){
	    /*Ejemplo select con limpieza de variables
		    
		    Este ejemplo tomarlo para inserts, updates, y deletes.
		    Si se tienen dudas de como usar el objeto DB, ver la documentación de codeigniter.
		    https://ellislab.com/codeIgniter/user-guide/database/queries.html
	    */
	    $select = "SELECT * FROM usuarios WHERE variables = '".$this->db->escape_str($this->variables)."'";
	    
	    	
		$selectSQL = $this->db->query( $select );
		
	    if( $selectSQL ):
	    	$result = $selectSQL->result();//Obtener registro de la consulta
	    	
	    	return $result;
	    else:
	    	return false;
	    endif;	
    }
	
	
	public function login($data) {
		$condition = "RFC =" . "'" . $data['username'] . "' AND " . "contraseniaUsuario =" . "'" . md5( $data['password'] ) . "' AND estatusUsuario='activo'";
		$this->db->select('*');
		$this->db->from('Usuarios');
		$this->db->where($condition);
		$this->db->limit(1);
		$query = $this->db->get();
		
		if ($query->num_rows() == 1) {
			return true;
		} else {
			return false;
		}
	}
	
	// Read data from database to show data in admin page
	public function read_user_information($RFC) {
		if( $RFC == "" ):
			return false;
		endif;
		
		$sqlUserInformation = "SELECT idUsuarios,nombreUsuario,correoUsuario,estatusUsuario,fechaRegistro,RFC FROM Usuarios WHERE RFC = '".$RFC."' limit 1";
		$queryUserInformation = $this->db->query($sqlUserInformation);
		
		$arrayInformation = array();
		
		if ($queryUserInformation->num_rows() == 1):
			$userInformation = $queryUserInformation->result();
			
			if( isset( $userInformation[0]->RFC ) ):
				$arrayInformation["usuario"] = array(
					"idUsuarios" => $userInformation[0]->idUsuarios,
					"nombreUsuario" => $userInformation[0]->nombreUsuario,
					"correoUsuario" => $userInformation[0]->correoUsuario,
					"estatusUsuario" => $userInformation[0]->estatusUsuario,
					"fechaRegistro" => $userInformation[0]->fechaRegistro,
					"RFC" => $userInformation[0]->RFC
				);
				
				$sqlPuesto = 'SELECT 
									TaxPuestoUsuario.idPuestos,
									(SELECT nombrePuesto FROM Puestos WHERE idPuestos = TaxPuestoUsuario.idPuestos) as nombrePuesto,
									TaxPuestoUsuario.idRoles,
									( SELECT nombreRol FROM Roles WHERE idRoles = TaxPuestoUsuario.idRoles) as nombreRol,
									( SELECT accionRol FROM Roles WHERE idRoles = TaxPuestoUsuario.idRoles) as accionRol
							  FROM TaxPuestoUsuario
							 	
							  WHERE
							  		TaxPuestoUsuario.idUsuarios = '.$arrayInformation["usuario"]["idUsuarios"].'
							  	    
							  
							  ';
				
				$querySqlPuesto = $this->db->query($sqlPuesto);
				
				if( $querySqlPuesto->num_rows() > 0 ):
					$Puestos = $querySqlPuesto->result();
					
					$sqlModulos = '	SELECT 
										TaxRolesModulosPermisos.idPermisos,
										( SELECT nombreModulos FROM Modulos  WHERE idModulos = TaxRolesModulosPermisos.idModulos) as nombreModulos,
										( SELECT prefijoModulos FROM Modulos  WHERE idModulos = TaxRolesModulosPermisos.idModulos) as prefijoModulos,
										TaxRolesModulosPermisos.idModulos,
										( SELECT nombrePermisos FROM Permisos WHERE idPermisos = TaxRolesModulosPermisos.idPermisos ) as nombrePermisos,
										( SELECT accionPermisos FROM Permisos WHERE idPermisos = TaxRolesModulosPermisos.idPermisos ) as accionPermisos
									FROM TaxRolesModulosPermisos
									WHERE TaxRolesModulosPermisos.idRoles = '.$Puestos[0]->idRoles.'
								  ';
					$querySqlModulos = $this->db->query($sqlModulos);		
					if( $querySqlModulos->num_rows() > 0 ):
						$modulos = $querySqlModulos->result();
						$modulosArray = array();
						foreach($modulos as $mo):
							$modulosArray[] = array(
								"idPermisos" => $mo->idPermisos,
								"idModulos" => $mo->idModulos,
								"nombrePermisos" => $mo->nombrePermisos,
								"accionPermisos" => $mo->accionPermisos,
								"nombreModulos" => $mo->nombreModulos ,
								"prefijoModulos" => $mo->prefijoModulos
							);
						endforeach;
					else:
						$modulosArray = array();
					endif;	  
					
					$arrayInformation["puesto"] = array(
						"idPuestos" => $Puestos[0]->idPuestos,
						"nombrePuesto" => $Puestos[0]->nombrePuesto,
						"idRoles" => $Puestos[0]->idRoles,
						"nombreRol" => $Puestos[0]->nombreRol,
						"accionRol" => $Puestos[0]->accionRol,
						"permisos" => $modulosArray
					);
					
					
				else:
					$arrayInformation["puesto"] = array();
				endif;
				
				
				return $arrayInformation;
			else:
				return false;
			endif;
		else:
			return false;
		endif;
		
	}
	
	
}