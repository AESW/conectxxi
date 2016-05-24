<?php 
	require_once(dirname(__FILE__) . '/Classes/PHPExcel.php');
	
	function array_unique_multidimensional($input)
	{
	    $serialized = array_map('serialize', $input);
	    $unique = array_unique($serialized);
	    return array_intersect_key($input, $unique);
	}
	
	$array_empresas = array();
	$array_meta_empresas = array();
	$array_puestos = array();
	$array_usuarios = array();
	$array_meta_usuarios = array();
	
	$objReader = new PHPExcel_Reader_Excel2007();
	$objReader->setReadDataOnly(true);
	
	/*------------------empresas--------------------*/
	
	$objPHPExcel = $objReader->load( dirname(__FILE__) . '/Empresas.xlsx' );
	$rowIterator = $objPHPExcel->getActiveSheet()->getRowIterator();
	
	$x = 0;
	foreach($rowIterator as $row){
	    $cellIterator = $row->getCellIterator();
	    $cellIterator->setIterateOnlyExistingCells(false); // Loop all cells, even if it is not set
	    
	    if(1 == $row->getRowIndex ()) continue;//skip first row
	    $rowIndex = $x;
	    $array_empresas[$rowIndex] = array('idEmpresa'=>'', 'nombreEmpresa'=>'');
	    
	    
	    foreach ($cellIterator as $cell) {
	        if('A' == $cell->getColumn()){
	            $array_empresas[$rowIndex]["idEmpresa"] = $cell->getCalculatedValue();
	        } else if('B' == $cell->getColumn()){
	            $array_empresas[$rowIndex]["nombreEmpresa"] = $cell->getCalculatedValue();
	        }
	    }
	    $x++;
	}
	
	/*-------------------empresas-------------------*/
	
	
	/*------------------meta datos empresas--------------------*/
	
	$objPHPExcel = $objReader->load( dirname(__FILE__) . '/EmpresasMetaDatos.xlsx' );
	$rowIterator = $objPHPExcel->getActiveSheet()->getRowIterator();
	
	$x = 0;
	foreach($rowIterator as $row){
	    $cellIterator = $row->getCellIterator();
	    $cellIterator->setIterateOnlyExistingCells(false); // Loop all cells, even if it is not set
	    
	    if(1 == $row->getRowIndex ()) continue;//skip first row
	    $rowIndex = $x;
	    $array_meta_empresas[$rowIndex] = array('idEmpresa'=>'', 'rfcEmpresa'=>'' , 'calleEmpresa' => '' , 'coloniaEmpresa' => '' , 'delegacionEmpresa' => '' , 'ciudadEmpresa' => '' , 'estadoEmpresa' => '' , 'cpEmpresa' => '' , 'telefonoEmpresa' => '' , 'registroPatronalEmpresa' => '' , 'claveEmpresa' => '' , 'cuentaChequesEmpresa' => '') ;
	    
	    
	    foreach ($cellIterator as $cell) {
	        if('A' == $cell->getColumn()){
	            $array_meta_empresas[$rowIndex]["idEmpresa"] = $cell->getCalculatedValue();
	        } else if('B' == $cell->getColumn()){
	            $array_meta_empresas[$rowIndex]["rfcEmpresa"] = $cell->getCalculatedValue();
	        } else if('C' == $cell->getColumn()){
	            $array_meta_empresas[$rowIndex]["calleEmpresa"] = $cell->getCalculatedValue();
	        } else if('D' == $cell->getColumn()){
	            $array_meta_empresas[$rowIndex]["coloniaEmpresa"] = $cell->getCalculatedValue();
	        } else if('E' == $cell->getColumn()){
	            $array_meta_empresas[$rowIndex]["delegacionEmpresa"] = $cell->getCalculatedValue();
	        } else if('F' == $cell->getColumn()){
	            $array_meta_empresas[$rowIndex]["ciudadEmpresa"] = $cell->getCalculatedValue();
	        } else if('G' == $cell->getColumn()){
	            $array_meta_empresas[$rowIndex]["estadoEmpresa"] = $cell->getCalculatedValue();
	        } else if('H' == $cell->getColumn()){
	            $array_meta_empresas[$rowIndex]["cpEmpresa"] = $cell->getCalculatedValue();
	        } else if('I' == $cell->getColumn()){
	            $array_meta_empresas[$rowIndex]["telefonoEmpresa"] = $cell->getCalculatedValue();
	        } else if('J' == $cell->getColumn()){
	            $array_meta_empresas[$rowIndex]["registroPatronalEmpresa"] = $cell->getCalculatedValue();
	        } else if('K' == $cell->getColumn()){
	            $array_meta_empresas[$rowIndex]["claveEmpresa"] = $cell->getCalculatedValue();
	        } else if('L' == $cell->getColumn()){
	            $array_meta_empresas[$rowIndex]["cuentaChequesEmpresa"] = $cell->getCalculatedValue();
	        }

	        

	    }
	    $x++;
	}
	
	/*-------------------meta datos empresas-------------------*/
	
	
	/*------------------Puestos--------------------*/
	
	$objPHPExcel = $objReader->load( dirname(__FILE__) . '/Puestos.xlsx' );
	$rowIterator = $objPHPExcel->getActiveSheet()->getRowIterator();
	
	$x = 0;
	foreach($rowIterator as $row){
	    $cellIterator = $row->getCellIterator();
	    $cellIterator->setIterateOnlyExistingCells(false); // Loop all cells, even if it is not set
	    
	    if(1 == $row->getRowIndex ()) continue;//skip first row
	    $rowIndex = $x;
	    $array_puestos[$rowIndex] = array('idPuesto'=>'', 'nombrePuesto'=>'' ) ;
	    
	    
	    foreach ($cellIterator as $cell) {
	        if('A' == $cell->getColumn()){
	            $array_puestos[$rowIndex]["idPuesto"] = $cell->getCalculatedValue();
	        } else if('B' == $cell->getColumn()){
	            $array_puestos[$rowIndex]["nombrePuesto"] = $cell->getCalculatedValue();
	        }
	        

	    }
	    $x++;
	}
	
	/*-------------------Puestos-------------------*/
	
	
	/*------------------Usuarios--------------------*/
	
	$objPHPExcel = $objReader->load( dirname(__FILE__) . '/Usuarios.xlsx' );
	$rowIterator = $objPHPExcel->getActiveSheet()->getRowIterator();
	
	$x = 0;
	foreach($rowIterator as $row){
	    $cellIterator = $row->getCellIterator();
	    $cellIterator->setIterateOnlyExistingCells(false); // Loop all cells, even if it is not set
	    
	    if(1 == $row->getRowIndex ()) continue;//skip first row
	    $rowIndex = $x;
	    $array_usuarios[$rowIndex] = array('idEmpleado'=>'', 'numeroEmpleado'=>'' , 'rfcEmpleado' => '' , 'nombreEmpleado' => '' , 'emailEmpleado' => '' , 'idReportaA' => '' , 'reportaA' => '' ,  'idEmpresa' => '' ,  'empresaNombre' => '' , 'idPuesto' => '') ;
	    
	    
	    foreach ($cellIterator as $cell) {
	        if('A' == $cell->getColumn()){
	            $array_usuarios[$rowIndex]["idEmpleado"] = $cell->getCalculatedValue();
	        } else if('B' == $cell->getColumn()){
	            $array_usuarios[$rowIndex]["numeroEmpleado"] = $cell->getCalculatedValue();
	        } else if('C' == $cell->getColumn()){
	            $array_usuarios[$rowIndex]["rfcEmpleado"] = $cell->getCalculatedValue();
	        } else if('D' == $cell->getColumn()){
	            $array_usuarios[$rowIndex]["nombreEmpleado"] = $cell->getCalculatedValue();
	        } else if('E' == $cell->getColumn()){
	            $array_usuarios[$rowIndex]["emailEmpleado"] = $cell->getCalculatedValue();
	        } else if('F' == $cell->getColumn()){
		        $array_usuarios[$rowIndex]["idReportaA"] = $cell->getCalculatedValue();
	            
	        } else if('G' == $cell->getColumn()){
		        $array_usuarios[$rowIndex]["reportaA"] = $cell->getCalculatedValue();
	            
	        } else if('H' == $cell->getColumn()){
	            $array_usuarios[$rowIndex]["idEmpresa"] = $cell->getCalculatedValue();
	        } else if('I' == $cell->getColumn()){
	            $array_usuarios[$rowIndex]["empresaNombre"] = $cell->getCalculatedValue();
	        } else if('J' == $cell->getColumn()){
	            $array_usuarios[$rowIndex]["idPuesto"] = $cell->getCalculatedValue();
	        }

	    }
	    $x++;
	}
	
	/*-------------------Usuarios-------------------*/
	
	/*------------------Usuarios Metas--------------------*/
	
	$objPHPExcel = $objReader->load( dirname(__FILE__) . '/UsuariosMetadaDatos.xlsx' );
	$rowIterator = $objPHPExcel->getActiveSheet()->getRowIterator();
	
	$x = 0;
	foreach($rowIterator as $row){
	    $cellIterator = $row->getCellIterator();
	    $cellIterator->setIterateOnlyExistingCells(false); // Loop all cells, even if it is not set
	    
	    if(1 == $row->getRowIndex ()) continue;//skip first row
	    $rowIndex = $x;
	    $array_meta_usuarios[$rowIndex] = array('idEmpleado'=>'', 'noEmpleado' => '' ,'corporativo'=>'' , 'pagoExterno' => '' , 'estatus' => '' , 'oficina' => '' , 'plaza' => '' , 'fechaIngreso' => '' ,  'fechaAlta' => '' ,  'mesIngreso' => '' , 'curp' => '' , 'cuentaNomina' => '' , 'clabeInterbancaria' => '' , 'puesto' => '', 'idPuesto' => '' , 'descripcionDepartamento' => '' , 'idDepartamento' => '' , 'turno' => '' , 'horaEntrada' => '', 'HoraSalida' => '', 'descanso' => '', 'sueldoNOI' => '') ;
	    
	    
	    foreach ($cellIterator as $cell) {
	        if('A' == $cell->getColumn()){
	            $array_meta_usuarios[$rowIndex]["idEmpleado"] = $cell->getCalculatedValue();
	        }else if('B' == $cell->getColumn()){
	            $array_meta_usuarios[$rowIndex]["noEmpleado"] = $cell->getCalculatedValue();
	        } else if('C' == $cell->getColumn()){
	            $array_meta_usuarios[$rowIndex]["corporativo"] = $cell->getCalculatedValue();
	        } else if('D' == $cell->getColumn()){
	            $array_meta_usuarios[$rowIndex]["pagoExterno"] = $cell->getCalculatedValue();
	        } else if('E' == $cell->getColumn()){
	            $array_meta_usuarios[$rowIndex]["estatus"] = $cell->getCalculatedValue();
	        } else if('F' == $cell->getColumn()){
	            $array_meta_usuarios[$rowIndex]["oficina"] = $cell->getCalculatedValue();
	        } else if('G' == $cell->getColumn()){
	            $array_meta_usuarios[$rowIndex]["plaza"] = $cell->getCalculatedValue();
	        } else if('H' == $cell->getColumn()){
	            $array_meta_usuarios[$rowIndex]["fechaIngreso"] = date($format = "Y-m-d", PHPExcel_Shared_Date::ExcelToPHP($cell->getValue()));
	        } else if('I' == $cell->getColumn()){
	            $array_meta_usuarios[$rowIndex]["fechaAlta"] = date($format = "Y-m-d", PHPExcel_Shared_Date::ExcelToPHP($cell->getValue())); 
	        } else if('J' == $cell->getColumn()){
	            $array_meta_usuarios[$rowIndex]["mesIngreso"] = date($format = "Y-m-d", PHPExcel_Shared_Date::ExcelToPHP($cell->getValue())); 
	        } else if('K' == $cell->getColumn()){
	            $array_meta_usuarios[$rowIndex]["curp"] = $cell->getCalculatedValue();
	        } else if('L' == $cell->getColumn()){
	            $array_meta_usuarios[$rowIndex]["cuentaNomina"] = $cell->getCalculatedValue();
	        } else if('M' == $cell->getColumn()){
	            $array_meta_usuarios[$rowIndex]["clabeInterbancaria"] = $cell->getCalculatedValue();
	        } else if('N' == $cell->getColumn()){
	            $array_meta_usuarios[$rowIndex]["puesto"] = $cell->getCalculatedValue();
	        } else if('O' == $cell->getColumn()){
	            $array_meta_usuarios[$rowIndex]["idPuesto"] = $cell->getCalculatedValue();
	        } else if('P' == $cell->getColumn()){
	            $array_meta_usuarios[$rowIndex]["descripcionDepartamento"] = $cell->getCalculatedValue();
	        } else if('Q' == $cell->getColumn()){
	            $array_meta_usuarios[$rowIndex]["idDepartamento"] = $cell->getCalculatedValue();
	        } else if('R' == $cell->getColumn()){
	            $array_meta_usuarios[$rowIndex]["turno"] = $cell->getCalculatedValue();
	        } else if('S' == $cell->getColumn()){
	            $array_meta_usuarios[$rowIndex]["horaEntrada"] = $cell->getCalculatedValue();
	        } else if('T' == $cell->getColumn()){
	            $array_meta_usuarios[$rowIndex]["horaSalida"] = $cell->getCalculatedValue();
	        } else if('U' == $cell->getColumn()){
	            $array_meta_usuarios[$rowIndex]["descanso"] = $cell->getCalculatedValue();
	        } else if('V' == $cell->getColumn()){
	            $array_meta_usuarios[$rowIndex]["sueldoNOI"] = $cell->getCalculatedValue();
	        }

	    }
	    $x++;
	}
	
	/*-------------------Usuarios Metas-------------------*/
	
	echo "SET FOREIGN_KEY_CHECKS=0;<br/>";
	echo 'truncate Empresas;<br/>';
	echo 'truncate EmpresasMetaDatos;<br/>';
	echo 'truncate Usuarios;<br/>';
	echo 'truncate Puestos;<br/>';
	echo 'truncate UsuariosMetaDatos;<br/>';
	echo "truncate TaxPuestoUsuario;<br/>";
	
	foreach( $array_empresas as $empresas ):
		echo "INSERT INTO Empresas ( idEmpresas , nombreEmpresas , direccionEmpresas , telefonoEmpresas) VALUES( ".$empresas["idEmpresa"]." , '".$empresas["nombreEmpresa"]."' , '' , '' ); <br/>";
		
	endforeach;
	
	
	foreach($array_meta_empresas as $meta_empresa):
		$idEmpresa = $meta_empresa["idEmpresa"];
		foreach($meta_empresa as $key => $value):
			echo "INSERT INTO EmpresasMetaDatos (prefijoMetaDatos , valorMetaDatos , idEmpresas) VALUES( '".$key."' , '".$value."' , ".$idEmpresa.");<br/> ";
		endforeach;
	endforeach;
	
	
	
	foreach($array_usuarios as $usuarios):
		echo "INSERT INTO Usuarios ( idUsuarios , nombreUsuario , correoUsuario , contraseniaUsuario , estatusUsuario , fechaRegistro , RFC ) VALUES( ".$usuarios["idEmpleado"]." , '".$usuarios["nombreEmpleado"]."' , '".$usuarios["emailEmpleado"]."' , '".md5("2016")."' , 'activo' , now() , '".$usuarios["rfcEmpleado"]."' );<br/>";
	endforeach;
	
	
	
	
	foreach($array_puestos as $puestos):
		echo "INSERT INTO Puestos (idPuestos , nombrePuesto , numeroPuestosHijos , estatusPuesto , idEmpresas, idRoles , empleadoGenerico) VALUES(".$puestos["idPuesto"]." , '".$puestos["nombrePuesto"]."' , 0 , 'activo' , 1 , 9 , 'false');<br/>";
	endforeach;
	
	
	
	
	foreach($array_meta_usuarios as $metas_usuarios):
		foreach($metas_usuarios as $key => $metas):
			
				echo "INSERT INTO UsuariosMetaDatos (prefijoMetaDatos , valorMetaDatos , idUsuarios) VALUES( '".$key."' , '".$metas."' , ".$metas_usuarios["idEmpleado"]." );<br/>";
			
			
		endforeach;
	endforeach;
	
	
	
	
	
	$array_puestos_usuarios = array();
	
	foreach($array_usuarios as $usuarios):
		$clave = '';
		$clave2 = '';
		
		$clave = array_search( $usuarios["idPuesto"] , array_column($array_puestos, 'idPuesto'));
		
		//echo $usuarios["idEmpleado"]." - ".$usuarios["nombreEmpleado"]." - ".$usuarios["idPuesto"]." - ".$clave." - ".$array_puestos[$clave]["nombrePuesto"]."--<br/>";
		
		if( $clave >= 0):
			
			//echo '-------------------------------------------------------------'.$usuarios["idEmpleado"].'<br/>[Nombre]: '.$usuarios["nombreEmpleado"].' [PuestoID]: '.$usuarios["idPuesto"].' [nombrePuesto]: '.$array_puestos[$clave]["nombrePuesto"]." - ";
			
			
			if( $usuarios["reportaA"] == "" && $usuarios["idPuesto"] == 1):
				echo "INSERT INTO TaxPuestoUsuario( idPuestos , fechaMovimiento , idUsuarios , idUsuariosAdministra ,  profundidad ) VALUES(1 , now() , ".$usuarios["idEmpleado"]." , 1 , 1);<br/>";
				
			elseif($usuarios["reportaA"] == "" && $usuarios["idPuesto"] != 1):	
				echo "INSERT INTO TaxPuestoUsuario( idPuestos , fechaMovimiento , idUsuarios , idUsuariosAdministra ,  profundidad ) VALUES(".$usuarios["idPuesto"]." , now() , ".$usuarios["idEmpleado"]." , 1 , 0);<br/>";
			else:
				$usuarioReportaA = array_search( $usuarios["reportaA"] , array_column($array_usuarios, 'nombreEmpleado'));
				
				$clave2 = array_search( $array_usuarios[$usuarioReportaA]["idPuesto"] , array_column($array_puestos, 'idPuesto'));
				
				//echo '<br/>[Nombre]'.$array_usuarios[$usuarioReportaA]["nombreEmpleado"]." [PuestoID]: ".$array_usuarios[$usuarioReportaA]["idPuesto"]." [nombrePuesto]: ".$array_puestos[$clave2]["nombrePuesto"]."<br/><br/>";
				
				//echo $usuarios["idPuesto"] . " - " . $array_usuarios[$usuarioReportaA]["idPuesto"]."--".$array_usuarios[$usuarioReportaA]["idReportaA"]."<br/>";
				
				$depth = $array_puestos[$clave2]["idPuesto"] + 1;
				echo "INSERT INTO TaxPuestoUsuario( idPuestos , fechaMovimiento , idUsuarios , idUsuariosAdministra , idUsuariosPadre , profundidad ) VALUES(".$usuarios["idPuesto"]." , now() , ".$usuarios["idEmpleado"]." , 1 , ".$array_usuarios[$usuarioReportaA]["idEmpleado"]." , ".$depth.");";
			endif;	
		endif;
		
	endforeach;

	echo "SET FOREIGN_KEY_CHECKS=1;<br/>";
	
?>