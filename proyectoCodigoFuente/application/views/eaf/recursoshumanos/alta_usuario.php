	<script type="text/javascript">
    $(document).ready( function() {
      $('#tab-container').easytabs();
      $('#tab-container').bind('easytabs:before', function(evt, tab, panel, data) {
	      $(".step_current").val( $(tab).attr("href").replace("#", ""));
	      
		  return true;
	  });
	 


	  $("#btnNextFDP1").click(function(){
	      $('.page').ScrollTo();
	      $(".step2").trigger("click");
	      //$(".step_current").val('tabs1-paso2');
	      //$(".btn_fire").val("continuar");
	      //$("#form_fdp_conectxxi").submit();
      });
      $("#btnNextFDP2").click(function(){
	      $('.page').ScrollTo();
	      $(".step3").trigger("click");
	      //$(".step_current").val('tabs1-paso3');
	      //$(".btn_fire").val("continuar");
		//  $("#form_fdp_conectxxi").submit();
      });
      
     
      $("#btnNextFDP5").click(function(){

    		error_campos = [];
    		if( $("#nombre_candidato").val() == "" ) {
        		error_campos.push(  "nombre_candidato");
    		}
        		 
    		if( $("#apellido_paterno_candidato").val() == "" ) {
        		error_campos.push( "apellido_paterno_candidato");
        		}


    		if( $("#apellido_materno_candidato").val() == "" ) {
    		error_campos.push(  "apellido_materno_candidato");
    		}
    		if( $("#gerente_autoriza").val() == "" ) {
    		error_campos.push(  "gerente_autoriza");
    		}
    		if( $("#empresa_contrata").val() == "" ) {
    		error_campos.push( "empresa_contrata");
    		}
    		if( $("#corporativo").val() == "" ) {
    		error_campos.push(  "corporativo");
    		}

    		if( $("#oficina").val() == "" ) {
    		error_campos.push(  "oficina");
    		}
    		if( $("#plaza").val() == "" ) {
    		error_campos.push( "plaza");
    		}
    		if( $("#fechaIngreso").val() == "" ) {
    		error_campos.push(  "fechaIngreso");
    		}


    		if( $("#sueldoNOI").val() == "" ) {
    		error_campos.push(  "sueldoNOI");
    		}
    		if( $("#puesto").val() == "" ) {
    		error_campos.push(  "puesto");
    		}

    		if( $("#descripcionDepartamento").val() == "" ) {
    		error_campos.push(  "descripcionDepartamento");
    		} 

    		if( $("#turno").val() == "" ) {
    		error_campos.push( "turno");
    		}

    		if( $("#descanso").val() == "" ) {
    		error_campos.push(  "descanso");
    		}

    		
    		if( error_campos.length  == 0 )
    		{


    			if( $("#cuentaNomina").val() == ""  && $("#clabeInterbancaria").val() == "") {
    			
    				 var id =  $('#idCandidato').val();


    				 
       	    	  $.post("<?php echo HOME_URL; ?>eaf/RecursosHumanos/ValidarCuentaBancaria",{
       	         	 id:id
       	          },function(data) {


       	        	  var mensaje=data;
       	              
                         
                         if ($.trim(mensaje)=='error')
                         {
                             
                      	   $("#resultado").html("El Usuario no tiene ninguna cuenta bancaria capturada, capture la cuenta o realice una solicitud de cuenta");
                      	  
                         }
                         else
                         {
                       	  $("#form_fdp_conectxxi").submit();
                         }

       	      });
    			
    			}
    	    	  else
    	    	  {
    	    		  $("#form_fdp_conectxxi").submit();
    	    	  }
    		}
    		else
    		{	
    			$(".step1").trigger("click");
    		}


    		
	  });

  
      
     



      $("#btnSolicitudCuenta").click(function(){

    	  var id =  $('#idCandidato').val();
    	  $.post("<?php echo HOME_URL; ?>eaf/RecursosHumanos/SolicitarCuentaBancaria",{
         	 id:id
          },function(data) {
     			 $('#resultado').html(data);
      });
      });
     
      
      	
    });
        
  </script>
  <?php
	/*echo "<pre>";
	      	print_r($error_campos);
	echo "</pre>";  
	
	echo count($error_campos);*/
  ?>
 
  <div class="formulario_fdp">
		<div id="tab-container" class="tab-container">
		  	<ul class='etabs'>
			    <li class='tab'><a href="#tabs1-paso1" class="step1">Paso 1</a></li>
			    <li class='tab'><a href="#tabs1-paso2" class="step2">Paso 2</a></li>
			    <li class='tab'><a href="#tabs1-paso3" class="step3">Paso 3</a></li>
			   
		  	</ul>
		  	<div class='panel-container'>
		  	
		  	 <form action="<?php echo HOME_URL; ?>eaf/RecursosHumanos/GuardarUsuario" method="post" name="form_fdp_conectxxi" class="form_fdp_conectxxi" id="form_fdp_conectxxi">
		  	 <input type="hidden" name="step_current" class="step_current" id="step_current" value="<?php echo (isset($formArray["step_current"]))?$formArray["step_current"]:""; ?>" />
		  	 <input type="hidden" name="btn_fire" class="btn_fire" id="btn_fire" value="<?php echo (isset($formArray["btn_fire"]))?$formArray["btn_fire"]:""; ?>"/>
		  	 <input type="hidden" name="email" class="email" id="email" value="<?php echo (isset($formArrayCandidato["correo_electronico_candidato"]))?$formArrayCandidato["correo_electronico_candidato"]:""; ?>"/>
			 <input type="hidden" name="rfc" class="rfc" id="rfc" value="<?php echo (isset($formArrayCandidato["rfc_candidato"]))?$formArrayCandidato["rfc_candidato"]:""; ?>"/>
			  <input type="hidden" name="curp" class="curp" id="curp" value="<?php echo (isset($formArrayCandidato["curp_candidato"]))?$formArrayCandidato["curp_candidato"]:""; ?>"/>  
			  <input type="hidden" name="token" class="token" id="token" value="<?php echo (isset($formArrayCandidato["tokenFDPVacantesPendientes"]))?$formArrayCandidato["tokenFDPVacantesPendientes"]:""; ?>"/>  
		  	   <input type="hidden" name="id" class="id" id="id" value="<?php echo (isset($formArrayCandidato["idVacantesPeticiones"]))?$formArrayCandidato["idVacantesPeticiones"]:""; ?>"/>  
		  	 	<input type="hidden" name="idPadre" class="idPadre" id="idPadre" value="<?php echo (isset($formArrayCandidato["idUsuariosPeticion"]))?$formArrayCandidato["idUsuariosPeticion"]:""; ?>"/>  
		  		<input type="hidden" name="idCandidato" class="idCandidato" id="idCandidato" value="<?php echo (isset($idCandidatoFDP["idCandidatoFDP"]))?$idCandidatoFDP["idCandidatoFDP"]:""; ?>"/>  
		  			
		  		
		  		<input type="hidden" name="carta_curp" class="carta_curp" id="carta_curp" value="<?php echo (isset($formArray["carta_curp"]))?$formArray["carta_curp"]:""; ?>"/>
		  		<input type="hidden" name="actanacimiento" class="actanacimiento" id="actanacimiento" value="<?php echo (isset($formArray["actanacimiento"]))?$formArray["actanacimiento"]:""; ?>"/>
		  		<input type="hidden" name="comprobantedomicilio" class="comprobantedomicilio" id="comprobantedomicilio" value="<?php echo (isset($formArray["comprobantedomicilio"]))?$formArray["comprobantedomicilio"]:""; ?>"/>
		  		<input type="hidden" name="carta_rfc" class="carta_rfc" id="carta_rfc" value="<?php echo (isset($formArray["carta_rfc"]))?$formArray["carta_rfc"]:""; ?>"/>
		  		<input type="hidden" name="imss" class="imss" id="imss" value="<?php echo (isset($formArray["imss"]))?$formArray["imss"]:""; ?>"/>
		  		<input type="hidden" name="antecedentespenales" class="antecedentespenales" id="antecedentespenales" value="<?php echo (isset($formArray["antecedentespenales"]))?$formArray["antecedentespenales"]:""; ?>"/>
		  		<input type="hidden" name="burocredito" class="burocredito" id="burocredito" value="<?php echo (isset($formArray["burocredito"]))?$formArray["burocredito"]:""; ?>"/>
		  		<input type="hidden" name="identificacionoficial" class="identificacionoficial" id="identificacionoficial" value="<?php echo (isset($formArray["identificacionoficial"]))?$formArray["identificacionoficial"]:""; ?>"/>
		  		<input type="hidden" name="comprobanteEstudios" class="comprobanteEstudios" id="comprobanteEstudios" value="<?php echo (isset($formArray["comprobanteEstudios"]))?$formArray["comprobanteEstudios"]:""; ?>"/>
		  		
			 
			  <?php
				  if( !empty($formArray["file_6"]) ):
				  	foreach( $formArray["file_6"] as $file ):
				  		echo '<input type="hidden" name="file_6[]" class="file_6" value="'.$file.'"/>';
				  	endforeach;
				  endif;
			  ?>
			  
			  <!-- Paso 1 -->
			  <div id="tabs1-paso1">
				<?php
					if(  $registro =="registro"  ):
				?>
				<div style="font-weight: bold; text-align: center;font-size: 13pt; color: #00db05">Registro completado correctamente.</div>
				<?php 
				else:
				if(  $registro =="yaregistrado"  ):
				?>
								<div style="font-weight: bold; text-align: center;font-size: 13pt; color: red">La Vacante ya fue cubierta, favor de verificarlo.</div>
								<?php 
				
				endif;
					endif;
				?>
			    <h2><label>Alta de personal</label></h2>
			     <p style="color:red;font-weight: bold;margin-bottom: 15px;"><?php echo ( count($error_campos) > 0 )?"Favor de revisar campos obligatorios marcados con rojo":""; ?></p>
			    <div id="paso1"></div>
			    <table cellpadding="0" cellspacing="0" width="100%">
				    <tr>
					    <td>Nombre (s)</td>
					    <td><input type="text" name="nombre_candidato" class="nombre_candidato" id="nombre_candidato" placeholder="Nombre (s)" autocomplete="off" required value="<?php echo (isset($formArrayCandidato["nombre_candidato"]))?$formArrayCandidato["nombre_candidato"]:""; ?>"<?php echo ( in_array ('nombre_candidato' , $error_campos) )?"style='border:2px solid red;'":""; ?> ></td>
					    <td>Apellido paterno</td>
					    <td><input type="text" name="apellido_paterno_candidato" class="apellido_paterno_candidato" id="apellido_paterno_candidato" placeholder="Apellido" autocomplete="off" required value="<?php echo (isset($formArrayCandidato["apellido_paterno_candidato"]))?$formArrayCandidato["apellido_paterno_candidato"]:""; ?>"<?php echo ( in_array ('apellido_paterno_candidato' , $error_campos) )?"style='border:2px solid red;'":""; ?> ></td>
				    </tr>
				    <tr>
					    <td>Apellido materno</td>
					    <td><input type="text" name="apellido_materno_candidato" class="apellido_materno_candidato" id="apellido_materno_candidato" placeholder="Apellido" autocomplete="off" required value="<?php echo (isset($formArrayCandidato["apellido_materno_candidato"]))?$formArrayCandidato["apellido_materno_candidato"]:""; ?>"<?php echo ( in_array ('apellido_materno_candidato' , $error_campos) )?"style='border:2px solid red;'":""; ?> ></td>
					    <td>&nbsp;</td>
					    <td>&nbsp;</td>
				    </tr>
				      <tr>
					    <td>Gerente que Autoriza</td>
					    <td><input type="text" name="gerente_autoriza" class="gerente_autoriza" id="gerente_autoriza" placeholder="Gerente" autocomplete="off" required value="<?php echo (isset($formArrayCandidato["idNombreAprobacionGerente"]))?$formArrayCandidato["idNombreAprobacionGerente"]:""; ?>"<?php echo ( in_array ('gerente_autoriza' , $error_campos) )?"style='border:2px solid red;'":""; ?> ></td>
					    <td>&nbsp;</td>
					    <td>&nbsp;</td>
				    </tr>
				    <tr>
				     <td>Empresa que contrata</td>
					      <td>
						      <select name="empresa_contrata" class="empresa_contrata" id="empresa_contrata" <?php echo ( in_array('empresa_contrata' , $error_campos) )?"style='border:2px solid red;'":""; ?>>
							   
							   <option value="">Selecciona Empresa</option>
								  <?php
									
									  
								  if( !empty($Empresas) ):
								  foreach($Empresas as  $t){
								  ?>
								  		
								  		
								  		 <option value="<?php echo $t->nombreEmpresas; ?>" <?php if( isset($formArray["empresa_contrata"]) && $formArray["empresa_contrata"] ==  $t->nombreEmpresas ): echo "selected='selected'"; endif;?>><?php echo $t->nombreEmpresas; ?></option>
								  		
								  <?php	  
									  }
									  endif;
								  ?>
							   
						      </select>
					      </td>
				    </tr>
				        <tr>
				     <td>Corporativo</td>
					      <td>
						   <select name="corporativo" class="corporativo" id="corporativo" <?php echo ( in_array('corporativo' , $error_campos) )?"style='border:2px solid red;'":""; ?>>
							   <option value="">Seleccione Corporativo</option> 
							   <option value="Si" <?php if( isset($formArray["corporativo"]) && $formArray["corporativo"] == "Si" ): echo "selected='selected'"; endif;?>>Si</option>
							   <option value="No" <?php if( isset($formArray["corporativo"]) && $formArray["corporativo"] == "No" ): echo "selected='selected'"; endif;?>>No</option>
						   </select>
					      </td>
				    </tr>
				    
				       <tr>
				     <td>Pago Externo</td>
					      <td>
						     <input type="text" name="pagoExterno" class="pagoExterno allownumericwithdecimal" id="pagoExterno" placeholder="Pago externo" autocomplete="off" required value="<?php echo (isset($formArray["pagoExterno"]))?$formArray["pagoExterno"]:""; ?>">
					      </td>
					       <td>&nbsp;</td>
					    <td>&nbsp;</td>
				    </tr>
				    
				    <tr>
				     <td>Oficina</td>
					      <td>
						         <select name="oficina" class="oficina" id="oficina" <?php echo ( in_array('oficina' , $error_campos) )?"style='border:2px solid red;'":""; ?> >
							     
							     <option value="">Selecciona Oficina</option>
								  <?php
									  $perfiles = $catalogos->fdpOficina();
									  
									  foreach( $perfiles as $key => $per ):
								  ?>
								  		
								  		
								  		
								  		  <option value="<?php echo $per; ?>" <?php if( isset($formArray["oficina"]) && $formArray["oficina"] == $per ): echo "selected='selected'"; endif;?>><?php echo $per; ?></option>
							  
								  			
								  			
								  		
								  <?php	  
									  endforeach;
								  ?>
							     
							     
						      </select>
					      </td>
				    </tr>
				    
				    <tr>
					    <td>Plaza</td>
					    <td> 
						   
						   
						    <select name="plaza" class="plaza" id="plaza" <?php echo ( in_array('plaza' , $error_campos) )?"style='border:2px solid red;'":""; ?> >
							     
							     <option value="">Selecciona Plaza</option>
								  <?php
									  $perfiles = $catalogos->fdpPlaza();
									  
									  foreach( $perfiles as $key => $per ):
								  ?>
								  		
								  		
								  		
								  		  <option value="<?php echo $per; ?>" <?php if( isset($formArray["plaza"]) && $formArray["plaza"] == $per ): echo "selected='selected'"; endif;?>><?php echo $per; ?></option>
							  
								  			
								  			
								  		
								  <?php	  
									  endforeach;
								  ?>
							     
							     
						      </select>
						   
						   
						   
						   
						   
						   </td>
				    </tr>
				    
				    
				     <tr>
					     <td>Fecha de Ingreso</td>
					    
					    <td><input type="text" onfocus="this.blur();" name="fechaIngreso" class="fechaIngreso" id="fechaIngreso" placeholder="Fecha de ingreso" required value="<?php echo (isset($formArray["fechaIngreso"]))?$formArray["fechaIngreso"]:""; ?>"<?php echo ( in_array ('fechaIngreso' , $error_campos) )?"style='border:2px solid red;'":""; ?>/></td> 
				     </tr>
				     <tr>
					    <td>Sueldo</td>
					    <td><input type="text" name="sueldoNOI" class="sueldoNOI allownumericwithdecimal" id="sueldoNOI" placeholder="Sueldo" autocomplete="off" required value="<?php echo (isset($formArray["sueldoNOI"]))?$formArray["sueldoNOI"]:""; ?>"<?php echo ( in_array ('sueldoNOI' , $error_campos) )?"style='border:2px solid red;'":""; ?> ></td>
					    <td>&nbsp;</td>
					    <td>&nbsp;</td>
				    </tr>
				    <tr>
				     <td>Puesto</td>
					      <td><input type="text" name="puesto" class="puesto" id="puesto" placeholder="puesto" autocomplete="off" required value="<?php echo (isset($formArrayCandidato["Puesto"]))?$formArrayCandidato["Puesto"]:""; ?>" <?php echo ( in_array ('puesto' , $error_campos) )?"style='border:2px solid red;'":""; ?>></td>
					    <td>&nbsp;</td>
					    <td>&nbsp;</td>
				    </tr>
				      <tr>
				     <td>Departamento</td>
					      <td>
						         <select name="descripcionDepartamento" class="descripcionDepartamento" id="descripcionDepartamento" <?php echo ( in_array('descripcionDepartamento' , $error_campos) )?"style='border:2px solid red;'":""; ?> >
							   
							   <option value="">Seleccione Departamento</option>
								  <?php
									
									  
								  if( !empty($Departamentos) ):
								  foreach($Departamentos as  $t){
								  ?>
								  		
								  		
								  		 <option value="<?php echo $t->nombreDepartamento; ?>" <?php if( isset($formArray["descripcionDepartamento"]) && $formArray["descripcionDepartamento"] ==  $t->nombreDepartamento ): echo "selected='selected'"; endif;?>><?php echo $t->nombreDepartamento; ?></option>
								  		
								  <?php	  
									  }
									  endif;
								  ?>
							   
						      </select>
					      </td>
				    </tr>
				    
				    <tr>
				     <td>Turno</td>
					      <td>
						      <select name="turno" class="turno" id="turno"  <?php echo ( in_array('turno' , $error_campos) )?"style='border:2px solid red;'":""; ?> >
							      <option value="">Selecciona Turno</option>
								  <?php
									  $perfiles = $catalogos->rhHorario();
									  
									  foreach( $perfiles as $key => $per ):
								  ?>
								  		  <option value="<?php echo $per; ?>" <?php if( isset($formArray["turno"]) && $formArray["turno"] == $per ): echo "selected='selected'"; endif;?>><?php echo $per; ?></option>
							  
								  <?php	  
									  endforeach;
								  ?>
							     
						      </select>
					      </td>
				    </tr>
				    <tr>
				     <td>Día de descanso</td>
					      <td>
						      <select name="descanso" class="descanso" id="descanso"  <?php echo ( in_array('descanso' , $error_campos) )?"style='border:2px solid red;'":""; ?> >
							      
							       <option value="">Selecciona Día de descanso</option>
								  <?php
									  $perfiles = $catalogos->rhDiaDescanso();
									  
									  foreach( $perfiles as $key => $per ):
								  ?>
								  		  <option value="<?php echo $per; ?>" <?php if( isset($formArray["descanso"]) && $formArray["descanso"] == $per ): echo "selected='selected'"; endif;?>><?php echo $per; ?></option>
							  
								  <?php	  
									  endforeach;
								  ?>
						      </select>
					      </td>
				    </tr>
			
			    </table>
			    
			       <a class="btnNextFDP" id="btnNextFDP1">Continuar</a>
			     <div style="clear: both;"></div>
			    <!-- content -->
			  </div>
			  <!-- End Paso 1 -->
			  
			  <!-- Paso 2 -->
			  <div id="tabs1-paso2">	
			    <h2><label>Carga de Documentación</label></h2>
			     <div id="paso2"></div>
			    
			    <table cellpadding="0" cellspacing="0" width="100%">
				
				    <tr>
					    <td>CURP</td>
				
					      <td >
						    <span class="btn btn-success fileinput-button">
						        <i class="glyphicon glyphicon-plus"></i>
						        <span>Cargar...</span>
						        <!-- The file input field used as target for the file upload widget -->
						        <input id="carta_curp_upload" type="file" name="files[]" multiple>
						    </span>
						    <!-- The global progress bar -->
						    <div id="carta_curp_progress" class="progress">
						        <div class="progress-bar progress-bar-success"></div>
						    </div>
						    <!-- The container for the uploaded files -->
						    <div id="files_curp" class="files">
							   <?php 
								    if( isset($formArray["carta_curp"]) && $formArray["carta_curp"] != ""):
								    	echo '<a href="'.HOME_URL."tempFDP/files/".$formArray["carta_curp"].'" target="_blank">'.$formArray["carta_curp"].'</a>';
								    	
								    endif;
							    ?>
						    </div>
					    </td>
				    </tr>
				        <tr>
					    <td>Acta de nacimiento</td>
					       <td >
						    <span class="btn btn-success fileinput-button">
						        <i class="glyphicon glyphicon-plus"></i>
						        <span>Cargar...</span>
						        <!-- The file input field used as target for the file upload widget -->
						        <input id="actanacimiento_upload" type="file" name="files[]" multiple>
						    </span>
						    <!-- The global progress bar -->
						    <div id="actanacimiento_progress" class="progress">
						        <div class="progress-bar progress-bar-success"></div>
						    </div>
						    <!-- The container for the uploaded files -->
						    <div id="files_actanacimiento" class="files">
						     <?php 
								    if( isset($formArray["actanacimiento"]) && $formArray["actanacimiento"] != ""):
								    	echo '<a href="'.HOME_URL."tempFDP/files/".$formArray["actanacimiento"].'" target="_blank">'.$formArray["actanacimiento"].'</a>';
								    	
								    endif;
							    ?>
							   
						    </div>
					    </td>
					
				    </tr>
				        <tr>
					    <td>Comprobante de domicilio</td>
					     <td >
						    <span class="btn btn-success fileinput-button">
						        <i class="glyphicon glyphicon-plus"></i>
						        <span>Cargar...</span>
						        <!-- The file input field used as target for the file upload widget -->
						        <input id="comprobantedomicilio_upload" type="file" name="files[]" multiple>
						    </span>
						    <!-- The global progress bar -->
						    <div id="comprobantedomicilio_progress" class="progress">
						        <div class="progress-bar progress-bar-success"></div>
						    </div>
						    <!-- The container for the uploaded files -->
						    <div id="files_comprobantedomicilio" class="files">
						     <?php 
								    if( isset($formArray["comprobantedomicilio"]) && $formArray["comprobantedomicilio"] != ""):
								    	echo '<a href="'.HOME_URL."tempFDP/files/".$formArray["comprobantedomicilio"].'" target="_blank">'.$formArray["comprobantedomicilio"].'</a>';
								    	
								    endif;
							    ?>
							   
						    </div>
					    </td>
					
				    </tr>
				        <tr>
					    <td>RFC</td>
					    <td >
						    <span class="btn btn-success fileinput-button">
						        <i class="glyphicon glyphicon-plus"></i>
						        <span>Cargar...</span>
						        <!-- The file input field used as target for the file upload widget -->
						        <input id="carta_rfc_upload" type="file" name="files[]" multiple>
						    </span>
						    <!-- The global progress bar -->
						    <div id="carta_rfc_progress" class="progress">
						        <div class="progress-bar progress-bar-success"></div>
						    </div>
						    <!-- The container for the uploaded files -->
						    <div id="files_rfc" class="files">
						     <?php 
								    if( isset($formArray["carta_rfc"]) && $formArray["carta_rfc"] != ""):
								    	echo '<a href="'.HOME_URL."tempFDP/files/".$formArray["carta_rfc"].'" target="_blank">'.$formArray["carta_rfc"].'</a>';
								    	
								    endif;
							    ?>
							   
						    </div>
					    </td>
				    </tr>
				        <tr>
					    <td>IMSS</td>
					        <td >
						    <span class="btn btn-success fileinput-button">
						        <i class="glyphicon glyphicon-plus"></i>
						        <span>Cargar...</span>
						        <!-- The file input field used as target for the file upload widget -->
						        <input id="imss_upload" type="file" name="files[]" multiple>
						    </span>
						    <!-- The global progress bar -->
						    <div id="imss_progress" class="progress">
						        <div class="progress-bar progress-bar-success"></div>
						    </div>
						    <!-- The container for the uploaded files -->
						    <div id="files_imss" class="files">
						     <?php 
								    if( isset($formArray["imss"]) && $formArray["imss"] != ""):
								    	echo '<a href="'.HOME_URL."tempFDP/files/".$formArray["imss"].'" target="_blank">'.$formArray["imss"].'</a>';
								    	
								    endif;
							    ?>
							   
						    </div>
					    </td>
					 
				    </tr>
				        <tr>
					    <td>Antecedentes No Penales</td>
					          <td >
						    <span class="btn btn-success fileinput-button">
						        <i class="glyphicon glyphicon-plus"></i>
						        <span>Cargar...</span>
						        <!-- The file input field used as target for the file upload widget -->
						        <input id="antecedentespenales_upload" type="file" name="files[]" multiple>
						    </span>
						    <!-- The global progress bar -->
						    <div id="antecedentespenales_progress" class="progress">
						        <div class="progress-bar progress-bar-success"></div>
						    </div>
						    <!-- The container for the uploaded files -->
						    <div id="files_antecedentespenales" class="files">
							    <?php 
								    if( isset($formArray["antecedentespenales"]) && $formArray["antecedentespenales"] != ""):
								    	echo '<a href="'.HOME_URL."tempFDP/files/".$formArray["antecedentespenales"].'" target="_blank">'.$formArray["antecedentespenales"].'</a>';
								    	
								    endif;
							    ?>
						    </div>
					    </td>
				
				    </tr>
				        <tr>
					    <td>Buró de Crédito</td>
					          <td >
						    <span class="btn btn-success fileinput-button">
						        <i class="glyphicon glyphicon-plus"></i>
						        <span>Cargar...</span>
						        <!-- The file input field used as target for the file upload widget -->
						        <input id="burocredito_upload" type="file" name="files[]" multiple>
						    </span>
						    <!-- The global progress bar -->
						    <div id="burocredito_progress" class="progress">
						        <div class="progress-bar progress-bar-success"></div>
						    </div>
						    <!-- The container for the uploaded files -->
						    <div id="files_burocredito" class="files">
						    <?php 
								    if( isset($formArray["burocredito"]) && $formArray["burocredito"] != ""):
								    	echo '<a href="'.HOME_URL."tempFDP/files/".$formArray["burocredito"].'" target="_blank">'.$formArray["burocredito"].'</a>';
								    	
								    endif;
							    ?>
							   
						    </div>
					    </td>
					  
				    </tr>
				        <tr>
					    <td>Identificación Oficial</td>
					         <td >
						    <span class="btn btn-success fileinput-button">
						        <i class="glyphicon glyphicon-plus"></i>
						        <span>Cargar...</span>
						        <!-- The file input field used as target for the file upload widget -->
						        <input id="identificacionoficial_upload" type="file" name="files[]" multiple>
						    </span>
						    <!-- The global progress bar -->
						    <div id="identificacionoficial_progress" class="progress">
						        <div class="progress-bar progress-bar-success"></div>
						    </div>
						    <!-- The container for the uploaded files -->
						    <div id="files_identificacionoficial" class="files">
						     <?php 
								    if( isset($formArray["identificacionoficial"]) && $formArray["identificacionoficial"] != ""):
								    	echo '<a href="'.HOME_URL."tempFDP/files/".$formArray["identificacionoficial"].'" target="_blank">'.$formArray["identificacionoficial"].'</a>';
								    	
								    endif;
							    ?>
							   
						    </div>
					    </td>
			
				    </tr>
				        <tr>
					    <td>Comprobante de Estudios</td>
					    
					      <td >
						    <span class="btn btn-success fileinput-button">
						        <i class="glyphicon glyphicon-plus"></i>
						        <span>Cargar...</span>
						        <!-- The file input field used as target for the file upload widget -->
						        <input id="comprobanteEstudios_upload" type="file" name="files[]" multiple>
						    </span>
						    <!-- The global progress bar -->
						    <div id="comprobanteEstudios_progress" class="progress">
						        <div class="progress-bar progress-bar-success"></div>
						    </div>
						    <!-- The container for the uploaded files -->
						    <div id="files_comprobanteEstudios" class="files">
						      <?php 
								    if( isset($formArray["comprobanteEstudios"]) && $formArray["comprobanteEstudios"] != ""):
								    	echo '<a href="'.HOME_URL."tempFDP/files/".$formArray["comprobanteEstudios"].'" target="_blank">'.$formArray["comprobanteEstudios"].'</a>';
								    	
								    endif;
							    ?>
							   
						    </div>
					    </td>
					
				    </tr>
				    
				
				
			    </table>
			  
			   <a class="btnNextFDP" id="btnNextFDP2">Continuar</a>
				
				
			    <div style="clear: both;"></div>
			  </div>	 	   
			  <!-- End Paso 2 -->
			  
			  <!-- Paso 3 -->
			  <div id="tabs1-paso3">
			    <h2><label>Alta de cuenta bancaria</label></h2>
			       <span id="resultado" style="color:red"></span>
			     <div id="paso3"></div>
			    
			    <table cellpadding="0" cellspacing="0" width="100%">
				    <tr>
					    <td>Número de cuenta</td>
					    <td><input type="text" name="cuentaNomina" class="cuentaNomina allownumericwithoutdecimal" id="cuentaNomina" placeholder="Número de cuenta" autocomplete="off" required value="<?php echo (isset($formArray["cuentaNomina"]))?$formArray["cuentaNomina"]:""; ?>" ></td>
					   <td>Cuenta Clabe</td>
					    <td><input type="text" name="clabeInterbancaria" class="clabeInterbancaria allownumericwithoutdecimal" id="clabeInterbancaria" placeholder="Cuenta Clabe" autocomplete="off" required value="<?php echo (isset($formArray["clabeInterbancaria"]))?$formArray["clabeInterbancaria"]:""; ?>"  ></td>
					    </td>
					    
				    </tr>
				    
				
			    </table>
				<br>
				<br>
					 
				  <a class="btnNextFDP" id="btnNextFDP5">Guardar</a>
				   <a class="btnNextFDP" id="btnSolicitudCuenta">Solicitar Cuenta</a>
			   
			    <div style="clear: both;"></div>
			    <!-- content -->
			  </div>
			  <!-- End Paso 3 -->
			  
			  </form>
		  
			 
			 
			
		  </div>
		</div>
	</div>
	<!-- The jQuery UI widget factory, can be omitted if jQuery UI is already included -->
	<script src="<?php echo HOME_URL; ?>assets/js/vendor/jquery.ui.widget.js"></script>
	<!-- The Iframe Transport is required for browsers without support for XHR file uploads -->
	<script src="<?php echo HOME_URL; ?>assets/js/jquery.iframe-transport.js"></script>
	<!-- The basic File Upload plugin -->
	<script src="<?php echo HOME_URL; ?>assets/js/jquery.fileupload.js"></script>
	<script>
	/*jslint unparam: true */
	/*global window, $ */
	$(function () {
	    'use strict';

	    var url = window.location.hostname === 'blueimp.github.io' ?
                '//jquery-file-upload.appspot.com/' : '<?php echo HOME_URL; ?>eaf/RecursosHumanos/server/';
	     
	
        $( "#fechaIngreso" ).datepicker({
	        dateFormat: "yy-mm-dd",
	        yearRange: "-100:+0",
	        changeYear:true,
        });



        $('#carta_curp_upload').fileupload({
	        url: url,
	        dataType: 'json',
	        change : function (e, data) {
		        if(data.files.length>=4){
		            alert("1 archivo permitido por selección")
		            return false;
		        }
		        
		    },
	        done: function (e, data) {
	            $.each(data.result.files, function (index, file) {
		            $(".carta_curp").val("ferdsfs");
		            $('<p/>').html('<a target="_blank" href="'+'<?php echo HOME_URL; ?>tempFDP/files/'+file.name+'">'+ file.name + "</a>").appendTo('#files_curp');
	            });
	        },
	        progressall: function (e, data) {
	            var progress = parseInt(data.loaded / data.total * 100, 10);
	            $('#carta_curp_progress .progress-bar').css(
	                'width',
	                progress + '%'
	            );
	            setInterval(function(){ 
		            $('#carta_curp_progress .progress-bar').css(
		                'width',
		                0 + '%'
		            );
	            }, 2000);
	        }
	    }).prop('disabled', !$.support.fileInput)
	        .parent().addClass($.support.fileInput ? undefined : 'disabled');


        $('#actanacimiento_upload').fileupload({
	        url: url,
	        dataType: 'json',
	        change : function (e, data) {
		        if(data.files.length>=4){
		            alert("1 archivo permitido por selección")
		            return false;
		        }
		        
		    },
	        done: function (e, data) {
	            $.each(data.result.files, function (index, file) {
		            $(".actanacimiento").val(file.name);
		            
	                $('<p/>').html('<a target="_blank" href="'+'<?php echo HOME_URL; ?>tempFDP/files/'+file.name+'">'+ file.name + "</a>").appendTo('#files_actanacimiento');
	            });
	        },
	        progressall: function (e, data) {
	            var progress = parseInt(data.loaded / data.total * 100, 10);
	            $('#actanacimiento_progress .progress-bar').css(
	                'width',
	                progress + '%'
	            );
	            setInterval(function(){ 
		            $('#actanacimiento_progress .progress-bar').css(
		                'width',
		                0 + '%'
		            );
	            }, 2000);
	        }
	    }).prop('disabled', !$.support.fileInput)
	        .parent().addClass($.support.fileInput ? undefined : 'disabled');

        $('#comprobantedomicilio_upload').fileupload({
	        url: url,
	        dataType: 'json',
	        change : function (e, data) {
		        if(data.files.length>=4){
		            alert("1 archivo permitido por selección")
		            return false;
		        }
		        
		    },
	        done: function (e, data) {
	            $.each(data.result.files, function (index, file) {
		            $(".comprobantedomicilio").val(file.name);
		            
	                $('<p/>').html('<a target="_blank" href="'+'<?php echo HOME_URL; ?>tempFDP/files/'+file.name+'">'+ file.name + "</a>").appendTo('#files_comprobantedomicilio');
	            });
	        },
	        progressall: function (e, data) {
	            var progress = parseInt(data.loaded / data.total * 100, 10);
	            $('#comprobantedomicilio_progress .progress-bar').css(
	                'width',
	                progress + '%'
	            );
	            setInterval(function(){ 
		            $('#comprobantedomicilio_progress .progress-bar').css(
		                'width',
		                0 + '%'
		            );
	            }, 2000);
	        }
	    }).prop('disabled', !$.support.fileInput)
	        .parent().addClass($.support.fileInput ? undefined : 'disabled');


        $('#carta_rfc_upload').fileupload({
	        url: url,
	        dataType: 'json',
	        change : function (e, data) {
		        if(data.files.length>=4){
		            alert("1 archivo permitido por selección")
		            return false;
		        }
		        
		    },
	        done: function (e, data) {
	            $.each(data.result.files, function (index, file) {
		            $(".carta_rfc").val(file.name);
		            
	                $('<p/>').html('<a target="_blank" href="'+'<?php echo HOME_URL; ?>tempFDP/files/'+file.name+'">'+ file.name + "</a>").appendTo('#files_rfc');
	            });
	        },
	        progressall: function (e, data) {
	            var progress = parseInt(data.loaded / data.total * 100, 10);
	            $('#carta_rfc_progress .progress-bar').css(
	                'width',
	                progress + '%'
	            );
	            setInterval(function(){ 
		            $('#carta_rfc_progress .progress-bar').css(
		                'width',
		                0 + '%'
		            );
	            }, 2000);
	        }
	    }).prop('disabled', !$.support.fileInput)
	        .parent().addClass($.support.fileInput ? undefined : 'disabled');


        $('#imss_upload').fileupload({
	        url: url,
	        dataType: 'json',
	        change : function (e, data) {
		        if(data.files.length>=4){
		            alert("1 archivo permitido por selección")
		            return false;
		        }
		        
		    },
	        done: function (e, data) {
	            $.each(data.result.files, function (index, file) {
		            $(".imss").val(file.name);
		            
	                $('<p/>').html('<a target="_blank" href="'+'<?php echo HOME_URL; ?>tempFDP/files/'+file.name+'">'+ file.name + "</a>").appendTo('#files_imss');
	            });
	        },
	        progressall: function (e, data) {
	            var progress = parseInt(data.loaded / data.total * 100, 10);
	            $('#imss_progress .progress-bar').css(
	                'width',
	                progress + '%'
	            );
	            setInterval(function(){ 
		            $('#imss_progress .progress-bar').css(
		                'width',
		                0 + '%'
		            );
	            }, 2000);
	        }
	    }).prop('disabled', !$.support.fileInput)
	        .parent().addClass($.support.fileInput ? undefined : 'disabled');

        $('#antecedentespenales_upload').fileupload({
	        url: url,
	        dataType: 'json',
	        change : function (e, data) {
		        if(data.files.length>=4){
		            alert("1 archivo permitido por selección")
		            return false;
		        }
		        
		    },
	        done: function (e, data) {
	            $.each(data.result.files, function (index, file) {
		            $(".antecedentespenales").val(file.name);
		            
	                $('<p/>').html('<a target="_blank" href="'+'<?php echo HOME_URL; ?>tempFDP/files/'+file.name+'">'+ file.name + "</a>").appendTo('#files_antecedentespenales');
	            });
	        },
	        progressall: function (e, data) {
	            var progress = parseInt(data.loaded / data.total * 100, 10);
	            $('#antecedentespenales_progress .progress-bar').css(
	                'width',
	                progress + '%'
	            );
	            setInterval(function(){ 
		            $('#antecedentespenales_progress .progress-bar').css(
		                'width',
		                0 + '%'
		            );
	            }, 2000);
	        }
	    }).prop('disabled', !$.support.fileInput)
	        .parent().addClass($.support.fileInput ? undefined : 'disabled');


        $('#burocredito_upload').fileupload({
	        url: url,
	        dataType: 'json',
	        change : function (e, data) {
		        if(data.files.length>=4){
		            alert("1 archivo permitido por selección")
		            return false;
		        }
		        
		    },
	        done: function (e, data) {
	            $.each(data.result.files, function (index, file) {
		            $(".burocredito").val(file.name);
		            
	                $('<p/>').html('<a target="_blank" href="'+'<?php echo HOME_URL; ?>tempFDP/files/'+file.name+'">'+ file.name + "</a>").appendTo('#files_burocredito');
	            });
	        },
	        progressall: function (e, data) {
	            var progress = parseInt(data.loaded / data.total * 100, 10);
	            $('#burocredito_progress .progress-bar').css(
	                'width',
	                progress + '%'
	            );
	            setInterval(function(){ 
		            $('#burocredito_progress .progress-bar').css(
		                'width',
		                0 + '%'
		            );
	            }, 2000);
	        }
	    }).prop('disabled', !$.support.fileInput)
	        .parent().addClass($.support.fileInput ? undefined : 'disabled');


        $('#identificacionoficial_upload').fileupload({
	        url: url,
	        dataType: 'json',
	        change : function (e, data) {
		        if(data.files.length>=4){
		            alert("1 archivo permitido por selección")
		            return false;
		        }
		        
		    },
	        done: function (e, data) {
	            $.each(data.result.files, function (index, file) {
		            $(".identificacionoficial").val(file.name);
		            
	                $('<p/>').html('<a target="_blank" href="'+'<?php echo HOME_URL; ?>tempFDP/files/'+file.name+'">'+ file.name + "</a>").appendTo('#files_identificacionoficial');
	            });
	        },
	        progressall: function (e, data) {
	            var progress = parseInt(data.loaded / data.total * 100, 10);
	            $('#identificacionoficial_progress .progress-bar').css(
	                'width',
	                progress + '%'
	            );
	            setInterval(function(){ 
		            $('#identificacionoficial_progress .progress-bar').css(
		                'width',
		                0 + '%'
		            );
	            }, 2000);
	        }
	    }).prop('disabled', !$.support.fileInput)
	        .parent().addClass($.support.fileInput ? undefined : 'disabled');


        $('#comprobanteEstudios_upload').fileupload({
	        url: url,
	        dataType: 'json',
	        change : function (e, data) {
		        if(data.files.length>=4){
		            alert("1 archivo permitido por selección")
		            return false;
		        }
		        
		    },
	        done: function (e, data) {
	            $.each(data.result.files, function (index, file) {
		            $(".comprobanteEstudios").val(file.name);
		            
	                $('<p/>').html('<a target="_blank" href="'+'<?php echo HOME_URL; ?>tempFDP/files/'+file.name+'">'+ file.name + "</a>").appendTo('#files_comprobanteEstudios');
	            });
	        },
	        progressall: function (e, data) {
	            var progress = parseInt(data.loaded / data.total * 100, 10);
	            $('#comprobanteEstudios_progress .progress-bar').css(
	                'width',
	                progress + '%'
	            );
	            setInterval(function(){ 
		            $('#comprobanteEstudios_progress .progress-bar').css(
		                'width',
		                0 + '%'
		            );
	            }, 2000);
	        }
	    }).prop('disabled', !$.support.fileInput)
	        .parent().addClass($.support.fileInput ? undefined : 'disabled');
        
        
        $(".allownumericwithdecimal").on("keypress keyup blur",function (event) {
            //this.value = this.value.replace(/[^0-9\.]/g,'');
			$(this).val($(this).val().replace(/[^0-9\.]/g,''));
            if ((event.which != 46 || $(this).val().indexOf('.') != -1) && (event.which < 48 || event.which > 57)) {
                if( event.which != 43 && event.which != 8 &&  event.which != 46){
		            event.preventDefault();
	            }
            }
        });
        
        $(".allownumericwithoutdecimal").on("keypress keyup blur",function (event) {    
           $(this).val($(this).val().replace(/[^\d].+/, ""));
           console.log(event.which);
            if ((event.which < 48 || event.which > 57)) {
	            if( event.which != 43 && event.which != 8 &&  event.which != 46){
		            event.preventDefault();
	            }
                
            }
        });
        
        
	});

	
	</script>
	