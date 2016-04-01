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
	
	
	
}