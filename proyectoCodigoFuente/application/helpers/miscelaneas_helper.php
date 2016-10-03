<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

if(!function_exists('validarRFC'))
{
	function validarRFC($valor){
       $valor = str_replace("-", "", $valor); 
       $cuartoValor = substr($valor, 3, 1);
       //RFC sin homoclave
       if(strlen($valor)==10){
           $letras = substr($valor, 0, 4); 
           $numeros = substr($valor, 4, 6);
           if (ctype_alpha($letras) && ctype_digit($numeros)) { 
               return true;
           }
           return false;            
       }
       // Sólo la homoclave
       else if (strlen($valor) == 3) {
           $homoclave = $valor;
           if(ctype_alnum($homoclave)){
               return true;
           }
           return false;
       }
       //RFC Persona Moral.
       else if (ctype_digit($cuartoValor) && strlen($valor) == 12) { 
           $letras = substr($valor, 0, 3); 
           $numeros = substr($valor, 3, 6); 
           $homoclave = substr($valor, 9, 3); 
           if (ctype_alpha($letras) && ctype_digit($numeros) && ctype_alnum($homoclave)) { 
               return true; 
           } 
           return false;
       //RFC Persona Física. 
       } else if (ctype_alpha($cuartoValor) && strlen($valor) == 13) { 
           $letras = substr($valor, 0, 4); 
           $numeros = substr($valor, 4, 6);
           $homoclave = substr($valor, 10, 3); 
           if (ctype_alpha($letras) && ctype_digit($numeros) && ctype_alnum($homoclave)) { 
               return true; 
           }
           return false; 
       }else { 
           return false; 
       }  
	}//fin validaRFC
}

if(!function_exists('validarCURP'))
{
	function validarCURP($valor, $input, $args)
	{
		if(strlen($valor)==18){
			$letras     = substr($valor, 0, 4);
			$numeros    = substr($valor, 4, 6);
			$sexo       = substr($valor, 10, 1);
			$mxState    = substr($valor, 11, 2);
			$letras2    = substr($valor, 13, 3);
			$homoclave  = substr($valor, 16, 2);
	
			if(ctype_alpha($letras) && ctype_alpha($letras2) && ctype_digit($numeros) && ctype_digit($homoclave) && is_mx_state($mxState) && is_sexo_curp($sexo)){
				return true;
			}
			return false;
		}else{
			return false;
		}
	}
}
if(!function_exists('validarNSS'))
{
	function validarNSS($nss)
		{
			if( ctype_digit($nss) && strlen($nss) == 11):
				return true;
			else:
				return false;
			endif;
		}
}		

if(!function_exists('is_mx_state'))
{
	function is_mx_state($state){
	    
	    $mxStates = array(
	        
	        'AS','BS','CL','CS','DF','GT',
	        
	        'HG','MC','MS','NL','PL','QR',
	        
	        'SL','TC','TL','YN','NE','BC',
	        
	        'CC','CM','CH','DG','GR','JC',
	        
	        'MN','NT','OC','QT','SP','SR',
	        
	        'TS','VZ','ZS'
	    
	    );
	    
	    if(in_array(strtoupper($state),$mxStates)){
	        
	        return true;
	    
	    }
	    
	    return false;
	
	}
}

if(!function_exists('is_sexo_curp'))
{
	function is_sexo_curp($sexo){
	    
	    $sexoCurp = array('H','M');
	    
	    if(in_array(strtoupper($sexo),$sexoCurp)){
	        
	       return true;
	    
	    }
	    
	    return false;
	
	}	
}	

if(!function_exists('repeatedElements'))
{
	function repeatedElements($array, $returnWithNonRepeatedItems = false)
	{
		$repeated = array();
	
		foreach( (array)$array as $value )
		{
			$inArray = false;
	
			foreach( $repeated as $i => $rItem )
			{
				if( $rItem['value'] === $value )
				{
					$inArray = true;
					++$repeated[$i]['count'];
				}
			}
	
			if( false === $inArray )
			{
				$i = count($repeated);
				$repeated[$i] = array();
				$repeated[$i]['value'] = $value;
				$repeated[$i]['count'] = 1;
			}
		}
	
		if( ! $returnWithNonRepeatedItems )
		{
			foreach( $repeated as $i => $rItem )
			{
				if($rItem['count'] === 1)
				{
					unset($repeated[$i]);
				}
			}
		}
	
		sort($repeated);
	
		return $repeated;
	}
	
	if(!function_exists('validarTelefono'))
{
	function validarTelefono($telefono)
		{
			if( ctype_digit($telefono) && strlen($telefono) == 10):
				return true;
			else:
				return false;
			endif;
		}
}

	if(!function_exists('validarFechaNacimiento'))
{
	function validarFechaNacimiento($fecha,$rfc)
		{
			
		$fechaRFC=substr($rfc, 4, 2);
		
		$fechaA=substr($fecha, 2, 2);
		
			
			if( $fechaRFC == $fechaA):
				return true;
			else:
				return false;
			endif;
		}
}
}	
?>