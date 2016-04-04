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
		$condition = "RFC =" . "'" . $data['username'] . "' AND " . "contraseniaUsuario =" . "'" . md5( $data['password'] ) . "'";
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
	
		$condition = "RFC =" . "'" . $RFC . "'";
		$this->db->select('*');
		$this->db->from('Usuarios');
		$this->db->where($condition);
		$this->db->limit(1);
		$query = $this->db->get();
		
		if ($query->num_rows() == 1) {
			return $query->result();
		} else {
			return false;
		}
	}
	
	
}