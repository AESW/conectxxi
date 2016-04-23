<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Sepomex extends CI_Model {
    function __construct() {
		parent::__construct();  
    }

   
    public function sepomex($cp , $group = "")
    {
    
    $groupby = ($group != "")?" GROUP BY ".$group:"";
    
    $consulta = $this->db->query("select distinct d_mnpio,d_estado,d_asenta from cepomex where d_codigo='$cp'".$groupby);
 	if( $consulta->num_rows() > 0 ):
 		 $result = $consulta->result();
         return $result;
    else:
	
	endif;
   }

}		
?>