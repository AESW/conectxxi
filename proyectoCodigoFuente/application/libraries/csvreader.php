<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class CSVReader {

    var $fields;            /** columns names retrieved after parsing */ 
    var $separator = ';';    /** separator used to explode each line */
    var $enclosure = '"';    /** enclosure used to decorate each field */

    var $max_row_size = 4096;    /** maximum row size to be used for decoding */

    
    
 function parse_file($p_Filepath) {

      	   $file = fopen($p_Filepath, 'r');
 	   $this->fields = fgetcsv($file, $this->max_row_size, $this->separator, $this->enclosure);
        $keys_values = explode(',',$this->fields[0]);

        $content    =   array();
        $keys   =   $this->escape_string($keys_values);

    if(( $gestor  =  fopen($p_Filepath,"r")) ==!FALSE ) {
	(( $datos  =  fgetcsv ( $gestor ,  1000 ,  "," ) ) ==!FALSE) ;

	$datos['columnas'] = count($datos);
	

	
	
		return $datos;
		
		
	
	
	fclose ( $gestor );
}
}

    function escape_string($data){
    	$result =   array();
    	foreach($data as $row){
    		$result[]   =   str_replace('"', '',$row);
    	}
    	return $result;
    }

    
    
    
 
    
}
?> 