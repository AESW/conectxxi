	<script type="text/javascript">
    $(document).ready( function() {
      $('#tab-container').easytabs();
      $('#tab-container').bind('easytabs:before', function(evt, tab, panel, data) {
	      $(".step_current").val( $(tab).attr("href").replace("#", ""));
	      
		  return true;
	  });
      $("#btnNextFDP1").click(function(){
	      //$('.page').ScrollTo();
	      //$(".step2").trigger("click");
	      $(".step_current").val('tabs1-paso2');
	      $(".btn_fire").val("continuar");
	      $("#form_fdp_conectxxi").submit();
      });
      $("#btnNextFDP2").click(function(){
	      //$('.page').ScrollTo();
	      //$(".step3").trigger("click");
	      $(".step_current").val('tabs1-paso3');
	      $(".btn_fire").val("continuar");
		  $("#form_fdp_conectxxi").submit();
      });
      
      $("#btnNextFDP3").click(function(){
	      $(".step_current").val('tabs1-paso4');	
	      $(".btn_fire").val("continuar");
	      $("#form_fdp_conectxxi").submit();
	  }); 
	  
	  $("#btnNextFDP4").click(function(){
	      $(".btn_fire").val("registrar");
	      $("#form_fdp_conectxxi").submit();
	  });
	  
	  $("#btnNextFDP5").click(function(){
	      $(".btn_fire").val("continuar");
	      $("#form_fdp_conectxxi").submit();
	  });

	  $("#btnNextFDP12").click(function(){

		  var idRFC =  $('#rfc_candidato').val();

		  

		  $.post("<?php echo HOME_URL; ?>Empleados/ValidarRFC/",{
			  idRFC:idRFC
	          },function(data) {


	        	  var mensaje=data;
	              
            
            if ($.trim(mensaje)=='-error')
            {
                
         	   $("#resultadoRFC").html("Capture un RFC valido");
         	   $(".step1").trigger("click");
         	  $(".rfc_candidato").val("");

             	  
            }
            else
            {

              
          	  window.open('<?php echo HOME_URL; ?>Empleados/Aviso/'+idRFC,'_blank');  // changed here (cambiado aqu�)
            }

	      });
	
		    
	  });
	  
      
      <?php 
	      if( isset($formArray["step_current"]) && !isset( $_REQUEST["registro"] )):
	      	if( $formArray["step_current"] != "" ):
	      		echo "$('.page').ScrollTo();";
	      		if( $formArray["step_current"] == "tabs1-paso1" ):
	      			echo '$(".step1").trigger("click");';
	      		elseif($formArray["step_current"] == "tabs1-paso2"):
	      			echo '$(".step2").trigger("click");';
	      		elseif($formArray["step_current"] == "tabs1-paso3"):
	      			echo '$(".step3").trigger("click");';
	      		elseif($formArray["step_current"] == "tabs1-paso4"):
	      			echo '$(".step4").trigger("click");';
	      		endif;
	      	endif;
	      endif;
	      
	      
      ?>
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
			    <li class='tab'><a href="#tabs1-paso4" class="step4">Paso 4</a></li>
		  	</ul>
		  	<div class='panel-container'>
			  <form action="" method="post" name="form_fdp_conectxxi" class="form_fdp_conectxxi" id="form_fdp_conectxxi">
			  <input type="hidden" name="step_current" class="step_current" id="step_current" value="<?php echo (isset($formArray["step_current"]))?$formArray["step_current"]:""; ?>" />
			  <input type="hidden" name="btn_fire" class="btn_fire" id="btn_fire" value="<?php echo (isset($formArray["btn_fire"]))?$formArray["btn_fire"]:""; ?>"/>
			  
			  <input type="hidden" name="carta_recomendacion_empleo1_candidato" class="carta_recomendacion_empleo1_candidato" id="carta_recomendacion_empleo1_candidato" value="<?php echo (isset($formArray["carta_recomendacion_empleo1_candidato"]))?$formArray["carta_recomendacion_empleo1_candidato"]:""; ?>"/>
			  <input type="hidden" name="carta_recomendacion_empleo2_candidato" class="carta_recomendacion_empleo2_candidato" id="carta_recomendacion_empleo2_candidato" value="<?php echo (isset($formArray["carta_recomendacion_empleo2_candidato"]))?$formArray["carta_recomendacion_empleo2_candidato"]:""; ?>"/>
			  <input type="hidden" name="carta_recomendacion_empleo3_candidato" class="carta_recomendacion_empleo3_candidato" id="carta_recomendacion_empleo3_candidato" value="<?php echo (isset($formArray["carta_recomendacion_empleo3_candidato"]))?$formArray["carta_recomendacion_empleo3_candidato"]:""; ?>"/>
			  
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
					if( isset( $_REQUEST["registro"] ) ):
				?>
				<div style="font-weight: bold; text-align: center;font-size: 13pt; color: #00db05">Registro completado, por favor revisa tu correo electrónico para validar la cuenta de correo.</div>
				<?php 
				
					endif;
				?>
				
				
				
			    <h2><label>Nombre</label></h2>
			      <span id="resultadoRFC" style="color:red"></span>
			    <p style="color:red;font-weight: bold;margin-bottom: 15px;"><?php echo ( count($error_campos) > 0 )?"Favor de revisar campos obligatorios marcados con rojo":""; ?></p>
			    <table cellpadding="0" cellspacing="0" width="100%">
				    <tr>
					    <td>Nombre (s)</td>
					    <td><input type="text" name="nombre_candidato"  onkeyup="javascript:this.value=this.value.toUpperCase();" class="nombre_candidato" id="nombre_candidato" placeholder="Nombre (s)" autocomplete="off" required value="<?php echo (isset($formArray["nombre_candidato"]))?$formArray["nombre_candidato"]:""; ?>" <?php echo ( in_array ('nombre_candidato' , $error_campos) )?"style='width:95%;border:2px solid red;'":"style='width:95%;'"; ?>></td>
					    <td>Apellido paterno</td>
					    <td><input type="text" name="apellido_paterno_candidato" onkeyup="javascript:this.value=this.value.toUpperCase();" class="apellido_paterno_candidato" id="apellido_paterno_candidato" placeholder="Apellido" autocomplete="off" required value="<?php echo (isset($formArray["apellido_paterno_candidato"]))?$formArray["apellido_paterno_candidato"]:""; ?>" <?php echo ( in_array('apellido_paterno_candidato' , $error_campos) )?"style='width:95%;border:2px solid red;'":"style='width:95%;'"; ?>></td>
				    </tr>
				    <tr>
					    <td>Apellido materno</td>
					    <td><input type="text" name="apellido_materno_candidato"  onkeyup="javascript:this.value=this.value.toUpperCase();" class="apellido_materno_candidato" id="apellido_materno_candidato" placeholder="Apellido" autocomplete="off" required value="<?php echo (isset($formArray["apellido_materno_candidato"]))?$formArray["apellido_materno_candidato"]:""; ?>" <?php echo ( in_array('apellido_materno_candidato' , $error_campos) )?"style='width:95%;border:2px solid red;'":"style='width:95%;'"; ?>></td>
					    <td>&nbsp;</td>
					    <td>&nbsp;</td>
				    </tr>
			    </table>
			    
			     <h2><label>Información biográfica</label></h2>
			     <table cellpadding="0" cellspacing="0" width="100%">
				     <tr>
					     <td>Fecha de nacimiento</td>
					     <td><input type="text" onfocus="this.blur()" name="fecha_nacimiento_candidato" class="fecha_nacimiento_candidato" id="fecha_nacimiento_candidato" placeholder="dd/mm/YYYY" autocomplete="off" required value="<?php echo (isset($formArray["fecha_nacimiento_candidato"]))?$formArray["fecha_nacimiento_candidato"]:""; ?>" <?php echo ( in_array('fecha_nacimiento_candidato' , $error_campos) )?"style='border:2px solid red;'":""; ?>>
					      <?php 
						if( in_array('fecha_nacimiento_candidato' , $error_campos) ):
						?>
					    	<p style="color: red;font-weight: bold;margin-top: 5px;margin-bottom: 5px;">La fecha debe coincidir con el RFC.</p>
					    <?php 
					    endif;
					    ?>	
					     </td>
					     <td>Nacionalidad</td>
					     <td>
						     <select name="pais_nacimiento_candidato" class="pais_nacimiento_candidato" id="pais_nacimiento_candidato" <?php echo ( in_array('pais_nacimiento_candidato' , $error_campos) )?"style='border:2px solid red;width:60%;'":"style='width:60%;'"; ?>>
							     <option value="">Seleccionar país</option>
							     <?php
									  foreach( $Catalogos as  $per ):
								  
									  if($per->ObjetosNombre=='pais_nacimiento_candidato')
									  {
									  $valor= $per->valor;
									  
									  ?>
								  
								  
								  
								  		  <option value="<?php echo $valor; ?>" <?php if( isset($formArray["pais_nacimiento_candidato"]) && $formArray["pais_nacimiento_candidato"] == $valor ): echo "selected='selected'"; endif;?>><?php echo $valor; ?></option>
								  <?php
									  }
									 
									  endforeach;
								  ?>
						     </select>
					     </td>
				     </tr>
				     <tr>
					     <td>Estado de nacimiento</td>
					     <td>
						     <select name="estado_nacimiento_candidato" class="estado_nacimiento_candidato" id="estado_nacimiento_candidato" <?php echo ( in_array('estado_nacimiento_candidato' , $error_campos) )?"style='border:2px solid red;width:55%;'":"style='width:55%;'"; ?>>
							    <option value="">Seleccionar estado</option>
							    <option value="Aguascalientes" <?php if( isset($formArray["estado_nacimiento_candidato"]) && $formArray["estado_nacimiento_candidato"] == "Aguascalientes" ): echo "selected='selected'"; endif;?>>Aguascalientes</option>
								<option value="Baja California" <?php if( isset($formArray["estado_nacimiento_candidato"]) && $formArray["estado_nacimiento_candidato"] == "Baja California" ): echo "selected='selected'"; endif;?>>Baja California</option>
								<option value="Baja California Sur" <?php if( isset($formArray["estado_nacimiento_candidato"]) && $formArray["estado_nacimiento_candidato"] == "Baja California Sur" ): echo "selected='selected'"; endif;?>>Baja California Sur</option>
								<option value="Campeche" <?php if( isset($formArray["estado_nacimiento_candidato"]) && $formArray["estado_nacimiento_candidato"] == "Campeche" ): echo "selected='selected'"; endif;?>>Campeche</option>
								<option value="Chiapas" <?php if( isset($formArray["estado_nacimiento_candidato"]) && $formArray["estado_nacimiento_candidato"] == "Chiapas" ): echo "selected='selected'"; endif;?>>Chiapas</option>
								<option value="Chihuahua" <?php if( isset($formArray["estado_nacimiento_candidato"]) && $formArray["estado_nacimiento_candidato"] == "Chihuahua" ): echo "selected='selected'"; endif;?>>Chihuahua</option>
								<option value="Coahuila" <?php if( isset($formArray["estado_nacimiento_candidato"]) && $formArray["estado_nacimiento_candidato"] == "Coahuila" ): echo "selected='selected'"; endif;?>>Coahuila</option>
								<option value="Colima" <?php if( isset($formArray["estado_nacimiento_candidato"]) && $formArray["estado_nacimiento_candidato"] == "Colima" ): echo "selected='selected'"; endif;?>>Colima</option>
								<option value="Distrito Federal" <?php if( isset($formArray["estado_nacimiento_candidato"]) && $formArray["estado_nacimiento_candidato"] == "Distrito Federal" ): echo "selected='selected'"; endif;?>>Distrito Federal</option>
								<option value="Durango" <?php if( isset($formArray["estado_nacimiento_candidato"]) && $formArray["estado_nacimiento_candidato"] == "Durango" ): echo "selected='selected'"; endif;?>>Durango</option>
								<option value="Estado de México" <?php if( isset($formArray["estado_nacimiento_candidato"]) && $formArray["estado_nacimiento_candidato"] == "Estado de México" ): echo "selected='selected'"; endif;?>>Estado de México</option>
								<option value="Guanajuato" <?php if( isset($formArray["estado_nacimiento_candidato"]) && $formArray["estado_nacimiento_candidato"] == "Guanajuato" ): echo "selected='selected'"; endif;?>>Guanajuato</option>
								<option value="Guerrero" <?php if( isset($formArray["estado_nacimiento_candidato"]) && $formArray["estado_nacimiento_candidato"] == "Guerrero" ): echo "selected='selected'"; endif;?>>Guerrero</option>
								<option value="Hidalgo" <?php if( isset($formArray["estado_nacimiento_candidato"]) && $formArray["estado_nacimiento_candidato"] == "Hidalgo" ): echo "selected='selected'"; endif;?>>Hidalgo</option>
								<option value="Jalisco" <?php if( isset($formArray["estado_nacimiento_candidato"]) && $formArray["estado_nacimiento_candidato"] == "Jalisco" ): echo "selected='selected'"; endif;?>>Jalisco</option>
								<option value="Michoacán" <?php if( isset($formArray["estado_nacimiento_candidato"]) && $formArray["estado_nacimiento_candidato"] == "Michoacán" ): echo "selected='selected'"; endif;?>>Michoacán</option>
								<option value="Morelos" <?php if( isset($formArray["estado_nacimiento_candidato"]) && $formArray["estado_nacimiento_candidato"] == "Morelos" ): echo "selected='selected'"; endif;?>>Morelos</option>
								<option value="Nayarit" <?php if( isset($formArray["estado_nacimiento_candidato"]) && $formArray["estado_nacimiento_candidato"] == "Nayarit" ): echo "selected='selected'"; endif;?>>Nayarit</option>
								<option value="Nuevo León" <?php if( isset($formArray["estado_nacimiento_candidato"]) && $formArray["estado_nacimiento_candidato"] == "Nuevo León" ): echo "selected='selected'"; endif;?>>Nuevo León</option>
								<option value="Oaxaca" <?php if( isset($formArray["estado_nacimiento_candidato"]) && $formArray["estado_nacimiento_candidato"] == "Oaxaca" ): echo "selected='selected'"; endif;?>>Oaxaca</option>
								<option value="Puebla" <?php if( isset($formArray["estado_nacimiento_candidato"]) && $formArray["estado_nacimiento_candidato"] == "Puebla" ): echo "selected='selected'"; endif;?>>Puebla</option>
								<option value="Querétaro" <?php if( isset($formArray["estado_nacimiento_candidato"]) && $formArray["estado_nacimiento_candidato"] == "Querétaro" ): echo "selected='selected'"; endif;?>>Querétaro</option>
								<option value="Quintana Roo" <?php if( isset($formArray["estado_nacimiento_candidato"]) && $formArray["estado_nacimiento_candidato"] == "Quintana Roo" ): echo "selected='selected'"; endif;?>>Quintana Roo</option>
								<option value="San Luis Potosí" <?php if( isset($formArray["estado_nacimiento_candidato"]) && $formArray["estado_nacimiento_candidato"] == "San Luis Potosí" ): echo "selected='selected'"; endif;?>>San Luis Potosí</option>
								<option value="Sinaloa" <?php if( isset($formArray["estado_nacimiento_candidato"]) && $formArray["estado_nacimiento_candidato"] == "Sinaloa" ): echo "selected='selected'"; endif;?>>Sinaloa</option>
								<option value="Sonora" <?php if( isset($formArray["estado_nacimiento_candidato"]) && $formArray["estado_nacimiento_candidato"] == "Sonora" ): echo "selected='selected'"; endif;?>>Sonora</option>
								<option value="Tabasco" <?php if( isset($formArray["estado_nacimiento_candidato"]) && $formArray["estado_nacimiento_candidato"] == "Tabasco" ): echo "selected='selected'"; endif;?>>Tabasco</option>
								<option value="Tamaulipas" <?php if( isset($formArray["estado_nacimiento_candidato"]) && $formArray["estado_nacimiento_candidato"] == "Tamaulipas" ): echo "selected='selected'"; endif;?>>Tamaulipas</option>
								<option value="Tlaxcala" <?php if( isset($formArray["estado_nacimiento_candidato"]) && $formArray["estado_nacimiento_candidato"] == "Tlaxcala" ): echo "selected='selected'"; endif;?>>Tlaxcala</option>
								<option value="Veracruz" <?php if( isset($formArray["estado_nacimiento_candidato"]) && $formArray["estado_nacimiento_candidato"] == "Veracruz" ): echo "selected='selected'"; endif;?>>Veracruz</option>
								<option value="Yucatán" <?php if( isset($formArray["estado_nacimiento_candidato"]) && $formArray["estado_nacimiento_candidato"] == "Yucatán" ): echo "selected='selected'"; endif;?>>Yucatán</option>
								<option value="Zacatecas" <?php if( isset($formArray["estado_nacimiento_candidato"]) && $formArray["estado_nacimiento_candidato"] == "Zacatecas" ): echo "selected='selected'"; endif;?>>Zacatecas</option>
						     </select>
					     </td>
					      <td>Género</td>
					      <td>
						      <select name="genero_candidato" class="genero_candidato" id="genero_candidato" <?php echo ( in_array('genero_candidato' , $error_campos) )?"style='border:2px solid red;width:60%;'":"style='width:60%;'"; ?>>
							      <option value="">Seleccionar género</option>
							        <?php
									  foreach( $Catalogos as  $per ):
								  
									  if($per->ObjetosNombre=='genero_candidato')
									  {
									  $valor= $per->valor;
									  
									  ?>
								  
								  
								  
								  		  <option value="<?php echo $valor; ?>" <?php if( isset($formArray["genero_candidato"]) && $formArray["genero_candidato"] == $valor ): echo "selected='selected'"; endif;?>><?php echo $valor; ?></option>
								  <?php
									  }
									 
									  endforeach;
								  ?>
						      </select>
					      </td>
				     </tr>
				     
				     <tr>
					     <td>Nivel educativo</td>
					     <td>
						      <select name="nivel_educativo_candidato" class="nivel_educativo_candidato" id="nivel_educativo_candidato" <?php echo ( in_array('nivel_educativo_candidato' , $error_campos) )?"style='border:2px solid red;width:55%;'":""; ?>>
							      <option value="">Seleccionar nivel educativo</option>
							     <?php
									  foreach( $Catalogos as  $per ):
								  
									  if($per->ObjetosNombre=='nivel_educativo_candidato')
									  {
									  $valor= $per->valor;
									  
									  ?>
								  
								  
								  
								  		  <option value="<?php echo $valor; ?>" <?php if( isset($formArray["nivel_educativo_candidato"]) && $formArray["nivel_educativo_candidato"] == $valor ): echo "selected='selected'"; endif;?>><?php echo $valor; ?></option>
								  <?php
									  }
									 
									  endforeach;
								  ?>
						      </select>
					      </td>
					      <td>Estado civil</td>
					     <td>
						      <select name="estado_civil_candidato" class="estado_civil_candidato" id="estado_civil_candidato" <?php echo ( in_array('estado_civil_candidato' , $error_campos) )?"style='border:2px solid red;width:60%;'":"style='width:60%;'"; ?>>
							      <option value="">Seleccionar estado civil</option>
							      <?php
									  foreach( $Catalogos as  $per ):
								  
									  if($per->ObjetosNombre=='estado_civil_candidato')
									  {
									  $valor= $per->valor;
									  
									  ?>
								  
								  
								  
								  		  <option value="<?php echo $valor; ?>" <?php if( isset($formArray["estado_civil_candidato"]) && $formArray["estado_civil_candidato"] == $valor ): echo "selected='selected'"; endif;?>><?php echo $valor; ?></option>
								  <?php
									  }
									 
									  endforeach;
								  ?>
						      </select>
					      </td>
				     </tr>
					  <tr>
					     <td>Profesión u Oficio</td>
					     <td>
						   <input type="text" name="profesion" onkeyup="javascript:this.value=this.value.toUpperCase();" class="profesion" id="profesion" placeholder="Profesión" autocomplete="off" required value="<?php echo (isset($formArray["profesion"]))?$formArray["profesion"]:""; ?>" <?php echo ( in_array('profesion' , $error_campos) )?"style='border:2px solid red;'":""; ?>>  
						   
					      </td>
					  
				     </tr>
			     </table>    
			     
			     <h2><label>Números de identificación y seguro social</label></h2>
			     <table cellpadding="0" cellspacing="0" width="100%">
				     <tr>
					    <td>R.F.C.</td>
					    <td><input type="text" maxlength="13" name="rfc_candidato" onkeyup="javascript:this.value=this.value.toUpperCase();" class="rfc_candidato" id="rfc_candidato" placeholder="R.F.C." autocomplete="off" required value="<?php echo (isset($formArray["rfc_candidato"]))?$formArray["rfc_candidato"]:""; ?>" <?php echo ( in_array('rfc_candidato' , $error_campos) )?"style='border:2px solid red;'":""; ?>>
					    <?php 
						if( in_array('rfc_candidato' , $error_campos) ):
						?>
					    	<p style="color: red;font-weight: bold;margin-top: 5px;margin-bottom: 5px;">Favor de ingresar el R.F.C. válido.</p>
					    <?php 
					    endif;
					    ?>	
					    </td>
					    <td>CURP</td>
					    <td><input type="text" maxlength="18" name="curp_candidato"  onkeyup="javascript:this.value=this.value.toUpperCase();" class="curp_candidato" id="curp_candidato" placeholder="C.U.R.P." autocomplete="off" required value="<?php echo (isset($formArray["curp_candidato"]))?$formArray["curp_candidato"]:""; ?>" <?php echo ( in_array('curp_candidato' , $error_campos) )?"style='width:60%;border:2px solid red;'":"style='width:60%;'"; ?>>
					    <?php 
						if( in_array('curp_candidato' , $error_campos) ):
						?>
					    	<p style="color: red;font-weight: bold;margin-top: 5px;margin-bottom: 5px;">Favor de ingresar el CURP válido.</p>
					    <?php 
						endif;   
					    ?>	
					    </td>
				    </tr>
				    <tr>
					    <td>Número de seguro social</td>
					    <td><input type="text" maxlength="11" name="numero_segurosocial_candidato" class="numero_segurosocial_candidato allownumericwithoutdecimal" id="numero_segurosocial_candidato" placeholder="NSS" autocomplete="off" required value="<?php echo (isset($formArray["numero_segurosocial_candidato"]))?$formArray["numero_segurosocial_candidato"]:""; ?>" <?php echo ( in_array('numero_segurosocial_candidato' , $error_campos) )?"style='border:2px solid red;'":""; ?>>
					    <?php 
						if( in_array('numero_segurosocial_candidato' , $error_campos) ):
						?>
					    	<p style="color: red;font-weight: bold;margin-top: 5px;margin-bottom: 5px;">Favor de ingresar el NSS válido.</p>
					    <?php 
						endif;    
					    ?>
					    </td>
					    
				    </tr>
			     </table>    
			     
			     <h2><label>Domicilio</label></h2>
			     <span id="resultado" style="color:red"></span>
			     <table cellpadding="0" cellspacing="0" width="100%">
				     <tr>
					     <td colspan="4" style="text-align: center;padding: 5px;color:#666;font-size: 10pt;">Ingresa el Código postal para seleccionar delegación o municipio</td>
				     </tr>
				     <tr>
					    <td>Calle y número</td>
					    <td><input type="text" name="calle_no_candidato"  onkeyup="javascript:this.value=this.value.toUpperCase();" class="calle_no_candidato" id="calle_no_candidato" placeholder="Calle y número" autocomplete="off" required value="<?php echo (isset($formArray["calle_no_candidato"]))?$formArray["calle_no_candidato"]:""; ?>" <?php echo ( in_array('calle_no_candidato' , $error_campos) )?"style='width:95%;border:2px solid red;'":"style='width:95%;'"; ?>></td>
					    <td>Código Postal</td>
					    <td><input type="text" name="cp_candidato" maxlength="5" class="cp_candidato " id="cp_candidato" placeholder="C.P." autocomplete="off" required value="<?php echo (isset($formArray["cp_candidato"]))?$formArray["cp_candidato"]:""; ?>" <?php echo ( in_array('cp_candidato' , $error_campos) )?"style='border:2px solid red;'":""; ?>></td>
				    </tr>
				    <tr>
					    <td>Estado</td>
					    <td>
						    <select name="estado_domicilio_candidato"  class="estado_domicilio_candidato" id="estado_domicilio_candidato" <?php echo ( in_array('estado_domicilio_candidato' , $error_campos) )?"style='width:95%;border:2px solid red;'":"style='width:95%;'"; ?>>
							    <option value="">Seleccionar estado</option>
							    
						     </select>
					    </td>
					    <td>Ciudad</td>
					    <td><input type="text" name="ciudad_domicilio_candidato"  class="ciudad_domicilio_candidato" id="ciudad_domicilio_candidato" placeholder="Ciudad" autocomplete="off" required value="<?php echo (isset($formArray["ciudad_domicilio_candidato"]))?$formArray["ciudad_domicilio_candidato"]:""; ?>" <?php echo ( in_array('ciudad_domicilio_candidato' , $error_campos) )?"style='width:95%;border:2px solid red;'":"style='width:95%;'"; ?>></td>
				    </tr>
				    <tr>
					    <td>Municipio o delegación</td>
					    <td>
						   <select name="delegacion_domicilio_candidato"  class="delegacion_domicilio_candidato" id="delegacion_domicilio_candidato" <?php echo ( in_array('delegacion_domicilio_candidato' , $error_campos) )?"style='width:95%;border:2px solid red;'":"style='width:95%;'"; ?>>
							   <option value="">Seleccionar delegación o municipio</option> 
						   </select>
					    </td>
					    <td>Colonia</td>
					    <td>
						    <select name="colonia_domicilio_candidato"  onkeyup="javascript:this.value=this.value.toUpperCase();" class="colonia_domicilio_candidato" id="colonia_domicilio_candidato" required <?php echo ( in_array('colonia_domicilio_candidato' , $error_campos) )?"style='width:95%;border:2px solid red;'":"style='width:95%;'"; ?>>
				              <option value="">Seleccionar colonia</option> 
				            </select>
						</td>
				    </tr>
			     </table>
			     
			     <h2><label>Datos de contacto del candidato</label></h2>
			    <table cellpadding="0" cellspacing="0" width="100%">
				    <tr>
					    <td colspan="4" style="text-align: center;">
						    <?php 
							    if( in_array('telefono_casa_candidato' , $error_campos) ):
							    	echo "<p style='font-weight:bold; color: red;'>Favor de seleccionar al menos Teléfono de casa o Teléfono móvil</p>";
							    endif;	
						    ?>
					    </td>
				    </tr>
				    <tr>
					    <td>Número de teléfono de casa</td>
					    <td><input maxlength="10" type="text" name="telefono_casa_candidato" class="telefono_casa_candidato allownumericwithoutdecimal" id="telefono_casa_candidato" placeholder="Tel. casa" autocomplete="off" required value="<?php echo (isset($formArray["telefono_casa_candidato"]))?$formArray["telefono_casa_candidato"]:""; ?>" <?php echo ( in_array('telefono_casa_candidato' , $error_campos) )?"style='border:2px solid red;'":""; ?>> <p style="color:#aba5a5;font-size: 10pt;">10 dígitos. Ejemplo: 55xxxxxxx</p></td>
					    <td>Número de teléfono móvil</td>
					    <td><input type="text" maxlength="10" name="telefono_movil_candidato" class="telefono_movil_candidato allownumericwithoutdecimal" id="telefono_movil_candidato" placeholder="Tel. móvil" autocomplete="off" required value="<?php echo (isset($formArray["telefono_movil_candidato"]))?$formArray["telefono_movil_candidato"]:""; ?>" <?php echo ( in_array('telefono_casa_candidato' , $error_campos) )?"style='border:2px solid red;'":""; ?>><p style="color:#aba5a5;font-size: 10pt;">10 dígitos. Ejemplo: 55xxxxxxxx</p></td>
				    </tr>
				    <tr>
					    <td>Otro número de teléfono</td>
					    <td><input type="text" maxlength="10" name="telefono_otro_candidato" class="telefono_otro_candidato allownumericwithoutdecimal" id="telefono_otro_candidato" placeholder="Otro teléfono" autocomplete="off" value="<?php echo (isset($formArray["telefono_otro_candidato"]))?$formArray["telefono_otro_candidato"]:""; ?>"></td>
					    <td>Correo electrónico personal</td>
					    <td><input type="text" name="correo_electronico_candidato"  class="correo_electronico_candidato" id="correo_electronico_candidato" placeholder="Correo electrónico" autocomplete="off" required value="<?php echo (isset($formArray["correo_electronico_candidato"]))?$formArray["correo_electronico_candidato"]:""; ?>" <?php echo ( in_array('correo_electronico_candidato' , $error_campos) )?"style='width:95%;border:2px solid red;'":"style='width:95%;'"; ?>>
					    <?php 
						if( in_array('correo_electronico_candidato' , $error_campos) ):
						?>
					    	<p style="color: red;font-weight: bold;margin-top: 5px;margin-bottom: 5px;">Favor de ingresar un correo electrónico.</p>
					    <?php 
						endif;    
					    ?>
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
			    <h2><label>Datos de la vivienda</label></h2>
			    <p style="color:red;font-weight: bold;margin-bottom: 15px;"><?php echo (count($error_campos) > 0)?"Favor de revisar campos obligatorios marcados con rojo":""; ?></p>
			    <table cellpadding="0" cellspacing="0" width="100%">
				    <tr>
					    <td>No. de baños</td>
					    <td>
						    <select name="no_banios_candidato" class="no_banios_candidato" id="no_banios_candidato" <?php echo ( in_array('no_banios_candidato' , $error_campos) )?"style='border:2px solid red;'":""; ?>>
							   <option value="">Seleccionar no. de baños</option> 
							   <option value="0" <?php if( isset($formArray["no_banios_candidato"]) && $formArray["no_banios_candidato"] == "0" ): echo "selected='selected'"; endif;?>>No tiene</option>
							   <option value="1" <?php if( isset($formArray["no_banios_candidato"]) && $formArray["no_banios_candidato"] == "1" ): echo "selected='selected'"; endif;?>>1</option>
							   <option value="2" <?php if( isset($formArray["no_banios_candidato"]) && $formArray["no_banios_candidato"] == "2" ): echo "selected='selected'"; endif;?>>2</option>
							   <option value="3" <?php if( isset($formArray["no_banios_candidato"]) && $formArray["no_banios_candidato"] == "3" ): echo "selected='selected'"; endif;?>>3</option>
							   <option value="4" <?php if( isset($formArray["no_banios_candidato"]) && $formArray["no_banios_candidato"] == "4" ): echo "selected='selected'"; endif;?>>4+</option>
						   </select>
					    </td>
					    
					    <td>Escolaridad jefe de familia</td>
					    <td>
						    <select name="escolaridad_jefefamilia_candidato" class="escolaridad_jefefamilia_candidato" id="escolaridad_jefefamilia_candidato" <?php echo ( in_array('escolaridad_jefefamilia_candidato' , $error_campos) )?"style='border:2px solid red;'":""; ?>>
							   <option value="">Seleccionar escolaridad</option> 
							    <?php
									  foreach( $Catalogos as  $per ):
								  
									  if($per->ObjetosNombre=='escolaridad_jefefamilia_candidato')
									  {
									  $valor= $per->valor;
									  
									  ?>
								  
								  
								  
								  		  <option value="<?php echo $valor; ?>" <?php if( isset($formArray["escolaridad_jefefamilia_candidato"]) && $formArray["escolaridad_jefefamilia_candidato"] == $valor ): echo "selected='selected'"; endif;?>><?php echo $valor; ?></option>
								  <?php
									  }
									 
									  endforeach;
								  ?>
						   </select>
					    </td>
				    </tr>  
				    
				    <tr>
					    <td>Automóvil</td>
					    <td>
						    <select name="automovil_candidato" class="automovil_candidato" id="automovil_candidato" <?php echo ( in_array('automovil_candidato' , $error_campos) )?"style='border:2px solid red;'":""; ?>>
							   <option value="">Seleccionar no. de autos</option> 
							   <option value="0" <?php if( isset($formArray["automovil_candidato"]) && $formArray["automovil_candidato"] == "0" ): echo "selected='selected'"; endif;?>>No tiene</option>
							   <option value="1" <?php if( isset($formArray["automovil_candidato"]) && $formArray["automovil_candidato"] == "1" ): echo "selected='selected'"; endif;?>>1</option>
							   <option value="2"  <?php if( isset($formArray["automovil_candidato"]) && $formArray["automovil_candidato"] == "2" ): echo "selected='selected'"; endif;?>>2</option>
							   <option value="3" <?php if( isset($formArray["automovil_candidato"]) && $formArray["automovil_candidato"] == "3" ): echo "selected='selected'"; endif;?>>3</option>
							   <option value="4" <?php if( isset($formArray["automovil_candidato"]) && $formArray["automovil_candidato"] == "4" ): echo "selected='selected'"; endif;?>>4+</option>
						   </select>
					    </td>
					    
					    <td>Focos</td>
					    <td>
						    <select name="focos_vivienda_candidato" class="focos_vivienda_candidato" id="focos_vivienda_candidato" <?php echo ( in_array('focos_vivienda_candidato' , $error_campos) )?"style='border:2px solid red;'":""; ?>>
							   <option value="">Seleccionar no. de focos</option> 
							   <option value="5menos" <?php if( isset($formArray["focos_vivienda_candidato"]) && $formArray["focos_vivienda_candidato"] == "5menos" ): echo "selected='selected'"; endif;?>>5 o menos</option>
							   <option value="6-10" <?php if( isset($formArray["focos_vivienda_candidato"]) && $formArray["focos_vivienda_candidato"] == "6-10" ): echo "selected='selected'"; endif;?>>6-10</option>
							   <option value="11-15" <?php if( isset($formArray["focos_vivienda_candidato"]) && $formArray["focos_vivienda_candidato"] == "11-15" ): echo "selected='selected'"; endif;?>>11-15</option>
							   <option value="16-20" <?php if( isset($formArray["focos_vivienda_candidato"]) && $formArray["focos_vivienda_candidato"] == "16-20" ): echo "selected='selected'"; endif;?>>16-20</option>
							   <option value="21mas" <?php if( isset($formArray["focos_vivienda_candidato"]) && $formArray["focos_vivienda_candidato"] == "21mas" ): echo "selected='selected'"; endif;?>>21 o más</option>
						   </select>
					    </td>
				    </tr>   
				    
				    <tr>
					    <td>TV Color</td>
					    <td>
						    <select name="tv_color_candidato" class="tv_color_candidato" id="tv_color_candidato" <?php echo ( in_array('tv_color_candidato' , $error_campos) )?"style='border:2px solid red;'":""; ?>>
							   <option value="">Seleccionar no. de TV's</option> 
							   <option value="0" <?php if( isset($formArray["tv_color_candidato"]) && $formArray["tv_color_candidato"] == "0" ): echo "selected='selected'"; endif;?>>No tiene</option>
							   <option value="1" <?php if( isset($formArray["tv_color_candidato"]) && $formArray["tv_color_candidato"] == "1" ): echo "selected='selected'"; endif;?>>1</option>
							   <option value="2" <?php if( isset($formArray["tv_color_candidato"]) && $formArray["tv_color_candidato"] == "2" ): echo "selected='selected'"; endif;?>>2</option>
							   <option value="3" <?php if( isset($formArray["tv_color_candidato"]) && $formArray["tv_color_candidato"] == "3" ): echo "selected='selected'"; endif;?>>3</option>
							   <option value="4" <?php if( isset($formArray["tv_color_candidato"]) && $formArray["tv_color_candidato"] == "4" ): echo "selected='selected'"; endif;?>>4+</option>
						   </select>
					    </td>
					    
					    <td>Piso distinto a tierra o cemento</td>
					    <td>
						    <select name="piso_vivienda_candidato" class="piso_vivienda_candidato" id="piso_vivienda_candidato" <?php echo ( in_array('piso_vivienda_candidato' , $error_campos) )?"style='border:2px solid red;'":""; ?>>
							   <option value="">Seleccionar opción</option> 
							   <option value="setiene" <?php if( isset($formArray["piso_vivienda_candidato"]) && $formArray["piso_vivienda_candidato"] == "setiene" ): echo "selected='selected'"; endif;?>>Se tiene</option>
							   <option value="nosetiene" <?php if( isset($formArray["piso_vivienda_candidato"]) && $formArray["piso_vivienda_candidato"] == "nosetiene" ): echo "selected='selected'"; endif;?>>No se tiene</option>
						   </select>
					    </td>
				    </tr>
				    
				    <tr>
					    <td>Computadora</td>
					    <td>
						    <select name="computadora_candidato" class="computadora_candidato" id="computadora_candidato" <?php echo ( in_array('computadora_candidato' , $error_campos) )?"style='border:2px solid red;'":""; ?>>
							   <option value="">Seleccionar no. de computadoras</option> 
							   <option value="0" <?php if( isset($formArray["computadora_candidato"]) && $formArray["computadora_candidato"] == "0" ): echo "selected='selected'"; endif;?>>No tiene</option>
							   <option value="1" <?php if( isset($formArray["computadora_candidato"]) && $formArray["computadora_candidato"] == "1" ): echo "selected='selected'"; endif;?>>1</option>
							   <option value="2" <?php if( isset($formArray["computadora_candidato"]) && $formArray["computadora_candidato"] == "2" ): echo "selected='selected'"; endif;?>>2</option>
							   <option value="3" <?php if( isset($formArray["computadora_candidato"]) && $formArray["computadora_candidato"] == "3" ): echo "selected='selected'"; endif;?>>3</option>
							   <option value="4" <?php if( isset($formArray["computadora_candidato"]) && $formArray["computadora_candidato"] == "4" ): echo "selected='selected'"; endif;?>>4+</option>
						   </select>
					    </td>
					    
					    <td>Regadera</td>
					    <td>
						    <select name="regadera_vivienda_candidato" class="regadera_vivienda_candidato" id="regadera_vivienda_candidato" <?php echo ( in_array('regadera_vivienda_candidato' , $error_campos) )?"style='border:2px solid red;'":""; ?>>
							   <option value="">Seleccionar opción</option> 
							   <option value="setiene" <?php if( isset($formArray["regadera_vivienda_candidato"]) && $formArray["regadera_vivienda_candidato"] == "setiene" ): echo "selected='selected'"; endif;?>>Se tiene</option>
							   <option value="nosetiene" <?php if( isset($formArray["regadera_vivienda_candidato"]) && $formArray["regadera_vivienda_candidato"] == "nosetiene" ): echo "selected='selected'"; endif;?>>No se tiene</option>
						   </select>
					    </td>
				    </tr>
				    
				    <tr>
					    <td>Cuartos</td>
					    <td>
						    <select name="cuartos_vivienda_candidato" class="cuartos_vivienda_candidato" id="cuartos_vivienda_candidato" <?php echo ( in_array('cuartos_vivienda_candidato' , $error_campos) )?"style='border:2px solid red;'":""; ?>>
							   <option value="">Seleccionar no. de cuartos</option> 
							   <option value="0" <?php if( isset($formArray["cuartos_vivienda_candidato"]) && $formArray["cuartos_vivienda_candidato"] == "0" ): echo "selected='selected'"; endif;?>>No tiene</option>
							   <option value="1" <?php if( isset($formArray["cuartos_vivienda_candidato"]) && $formArray["cuartos_vivienda_candidato"] == "1" ): echo "selected='selected'"; endif;?>>1</option>
							   <option value="2" <?php if( isset($formArray["cuartos_vivienda_candidato"]) && $formArray["cuartos_vivienda_candidato"] == "2" ): echo "selected='selected'"; endif;?>>2</option>
							   <option value="3" <?php if( isset($formArray["cuartos_vivienda_candidato"]) && $formArray["cuartos_vivienda_candidato"] == "3" ): echo "selected='selected'"; endif;?>>3</option>
							   <option value="4" <?php if( isset($formArray["cuartos_vivienda_candidato"]) && $formArray["cuartos_vivienda_candidato"] == "4" ): echo "selected='selected'"; endif;?>>4</option>
							   <option value="5" <?php if( isset($formArray["cuartos_vivienda_candidato"]) && $formArray["cuartos_vivienda_candidato"] == "5" ): echo "selected='selected'"; endif;?>>5</option>
							   <option value="6" <?php if( isset($formArray["cuartos_vivienda_candidato"]) && $formArray["cuartos_vivienda_candidato"] == "6" ): echo "selected='selected'"; endif;?>>6</option>
							    <option value="7" <?php if( isset($formArray["cuartos_vivienda_candidato"]) && $formArray["cuartos_vivienda_candidato"] == "7" ): echo "selected='selected'"; endif;?>>7 o más</option>
						   </select>
					    </td>
					    
					    <td>Estufa</td>
					    <td>
						    <select name="estufa_vivienda_candidato" class="estufa_vivienda_candidato" id="estufa_vivienda_candidato" <?php echo ( in_array('estufa_vivienda_candidato' , $error_campos) )?"style='border:2px solid red;'":""; ?>>
							   <option value="">Seleccionar opción</option> 
							   <option value="setiene" <?php if( isset($formArray["estufa_vivienda_candidato"]) && $formArray["estufa_vivienda_candidato"] == "setiene" ): echo "selected='selected'"; endif;?>>Se tiene</option>
							   <option value="nosetiene" <?php if( isset($formArray["estufa_vivienda_candidato"]) && $formArray["estufa_vivienda_candidato"] == "nosetiene" ): echo "selected='selected'"; endif;?>>No se tiene</option>
						   </select>
					    </td>
				    </tr>
			    </table>
			    
			    <h2><label>Ingresos de la familia</label></h2>
			    <table cellpadding="0" cellspacing="0" width="100%">
				    <tr>
					    <td>
						    Ingresos de la familia
					    </td>
					    <td><input type="text" name="ingresos_familia_candidato" class="ingresos_familia_candidato allownumericwithdecimal" id="ingresos_familia_candidato" placeholder="Ingresos familia" autocomplete="off" required value="<?php echo (isset($formArray["ingresos_familia_candidato"]))?$formArray["ingresos_familia_candidato"]:""; ?>" <?php echo ( in_array('ingresos_familia_candidato' , $error_campos) )?"style='border:2px solid red;'":""; ?>></td>
					</tr>
					
					<td>Cuenta con crédito infonavit</td>
					    <td>
						    <select name="credito_infonavit" class="credito_infonavit" id="credito_infonavit" <?php echo ( in_array('credito_infonavit' , $error_campos) )?"style='border:2px solid red;'":""; ?>>
							   <option value="">Seleccionar opción</option> 
							   <?php
									  foreach( $Catalogos as  $per ):
								  
									  if($per->ObjetosNombre=='credito_infonavit')
									  {
									  $valor= $per->valor;
									  
									  ?>
								  
								  
								  
								  		  <option value="<?php echo $valor; ?>" <?php if( isset($formArray["credito_infonavit"]) && $formArray["credito_infonavit"] == $valor ): echo "selected='selected'"; endif;?>><?php echo $valor; ?></option>
								  <?php
									  }
									 
									  endforeach;
								  ?>
						   </select>
					    </td>
					    </tr>
					    
					    <tr>
					    <td>Cuenta con crédito Fonacot</td>
					    <td>
						    <select name="credito_fonacot" class="credito_fonacot" id="credito_fonacot" <?php echo ( in_array('credito_fonacot' , $error_campos) )?"style='border:2px solid red;'":""; ?>>
							   <option value="">Seleccionar opción</option> 
							    <?php
									  foreach( $Catalogos as  $per ):
								  
									  if($per->ObjetosNombre=='credito_fonacot')
									  {
									  $valor= $per->valor;
									  
									  ?>
								  
								  
								  
								  		  <option value="<?php echo $valor; ?>" <?php if( isset($formArray["credito_fonacot"]) && $formArray["credito_fonacot"] == $valor ): echo "selected='selected'"; endif;?>><?php echo $valor; ?></option>
								  <?php
									  }
									 
									  endforeach;
								  ?>
						   </select>
					    </td>
					    </tr>
					    <tr>
					    
					    <td>Tiene impuesta alguna pensión alimenticia</td>
					    <td>
						    <select name="pension_alimenticia" class="pension_alimenticia" id="pension_alimenticia" <?php echo ( in_array('pension_alimenticia' , $error_campos) )?"style='border:2px solid red;'":""; ?>>
							   <option value="">Seleccionar opción</option> 
							   <?php
									  foreach( $Catalogos as  $per ):
								  
									  if($per->ObjetosNombre=='pension_alimenticia')
									  {
									  $valor= $per->valor;
									  
									  ?>
								  
								  
								  
								  		  <option value="<?php echo $valor; ?>" <?php if( isset($formArray["pension_alimenticia"]) && $formArray["pension_alimenticia"] == $valor ): echo "selected='selected'"; endif;?>><?php echo $valor; ?></option>
								  <?php
									  }
									 
									  endforeach;
								  ?>
						   </select>
					    </td>
					    </tr>
					
				</table>
				
				<h2><label>Egresos de la familia</label></h2>
			    <table cellpadding="0" cellspacing="0" width="100%">
				    <tr>
					    <td>
						    Vivienda
						    <?php 
							    $formArray["egresos_vivienda_candidato"] = ($formArray["egresos_vivienda_candidato"] == "")?0:$formArray["egresos_vivienda_candidato"];
						    ?>
					    </td>
					    <td><input type="text" name="egresos_vivienda_candidato" class="egresos_vivienda_candidato allownumericwithdecimal" id="egresos_vivienda_candidato" placeholder="Egresos vivienda" autocomplete="off" required value="<?php echo (isset($formArray["egresos_vivienda_candidato"]))?$formArray["egresos_vivienda_candidato"]:"0"; ?>" <?php echo ( in_array('egresos_vivienda_candidato' , $error_campos) )?"style='border:2px solid red;'":""; ?>></td>
					</tr>
					
					<tr>
					    <td>
						    Educación
						    <?php 
							    $formArray["egresos_educacion_candidato"] = ($formArray["egresos_educacion_candidato"] == "")?0:$formArray["egresos_educacion_candidato"];
						    ?>
					    </td>
					    <td><input type="text" name="egresos_educacion_candidato" class="egresos_educacion_candidato allownumericwithdecimal" id="egresos_educacion_candidato" placeholder="Egresos educación" autocomplete="off" required value="<?php echo (isset($formArray["egresos_educacion_candidato"]))?$formArray["egresos_educacion_candidato"]:"0"; ?>" <?php echo ( in_array('egresos_educacion_candidato' , $error_campos) )?"style='border:2px solid red;'":""; ?>></td>
					</tr>
					
					<tr>
					    <td>
						    Alimentación
						    <?php 
							    $formArray["egresos_alimentacion_candidato"] = ($formArray["egresos_alimentacion_candidato"] == "")?0:$formArray["egresos_alimentacion_candidato"];
						    ?>
					    </td>
					    <td><input type="text" name="egresos_alimentacion_candidato" class="egresos_alimentacion_candidato allownumericwithdecimal" id="egresos_alimentacion_candidato" placeholder="Egresos alimentación" autocomplete="off" required value="<?php echo (isset($formArray["egresos_alimentacion_candidato"]))?$formArray["egresos_alimentacion_candidato"]:"0"; ?>" <?php echo ( in_array('egresos_alimentacion_candidato' , $error_campos) )?"style='border:2px solid red;'":""; ?>></td>
					</tr>
					
					<tr>
					    <td>
						    Recreación
						    <?php 
							    $formArray["egresos_recreacion_candidato"] = ($formArray["egresos_recreacion_candidato"] == "")?0:$formArray["egresos_recreacion_candidato"];
						    ?>
					    </td>
					    <td><input type="text" name="egresos_recreacion_candidato" class="egresos_recreacion_candidato allownumericwithdecimal" id="egresos_recreacion_candidato" placeholder="Egresos recreación" autocomplete="off" required value="<?php echo (isset($formArray["egresos_recreacion_candidato"]))?$formArray["egresos_recreacion_candidato"]:"0"; ?>" <?php echo ( in_array('egresos_recreacion_candidato' , $error_campos) )?"style='border:2px solid red;'":""; ?>></td>
					</tr>
					
					<tr>
					    <td>
						    Servicios
						    <?php 
							    $formArray["egresos_servicios_candidato"] = ($formArray["egresos_servicios_candidato"] == "")?0:$formArray["egresos_servicios_candidato"];
						    ?>
					    </td>
					    <td><input type="text" name="egresos_servicios_candidato" class="egresos_servicios_candidato allownumericwithdecimal" id="egresos_servicios_candidato" placeholder="Egresos recreación" autocomplete="off" required value="<?php echo (isset($formArray["egresos_servicios_candidato"]))?$formArray["egresos_servicios_candidato"]:"0"; ?>" <?php echo ( in_array('egresos_servicios_candidato' , $error_campos) )?"style='border:2px solid red;'":""; ?>></td>
					</tr>
					
					<tr>
					    <td>
						    Préstamos o adeudos
						    <?php 
							    $formArray["egresos_adeudos_candidato"] = ($formArray["egresos_adeudos_candidato"] == "")?0:$formArray["egresos_adeudos_candidato"];
						    ?>
					    </td>
					    <td><input type="text" name="egresos_adeudos_candidato" class="egresos_adeudos_candidato allownumericwithdecimal" id="egresos_adeudos_candidato" placeholder="Egresos adeudos" autocomplete="off" required value="<?php echo (isset($formArray["egresos_adeudos_candidato"]))?$formArray["egresos_adeudos_candidato"]:"0"; ?>" <?php echo ( in_array('egresos_adeudos_candidato' , $error_campos) )?"style='border:2px solid red;'":""; ?>></td>
					</tr>
					
					<tr>
					    <td>
						    Otros
						    <?php 
							    $formArray["egresos_otros_candidato"] = ($formArray["egresos_otros_candidato"] == "")?0:$formArray["egresos_otros_candidato"];
								
						    ?>
					    </td>
					    <td><input type="text" name="egresos_otros_candidato" class="egresos_otros_candidato allownumericwithdecimal" id="egresos_otros_candidato" placeholder="Egresos otros" autocomplete="off" required value="<?php echo (isset($formArray["egresos_otros_candidato"]))?$formArray["egresos_otros_candidato"]:"0"; ?>" <?php echo ( in_array('egresos_otros_candidato' , $error_campos) )?"style='border:2px solid red;'":""; ?>></td>
					</tr>
				</table>
				
				<a class="btnNextFDP" id="btnNextFDP2">Continuar</a>
			    <div style="clear: both;"></div>
			  </div>	 	   
			  <!-- End Paso 2 -->
			  
			  <!-- Paso 3 -->
			  <div id="tabs1-paso3">
			    <h2><label>Ubicación</label></h2>
			    <p style="color:red;font-weight: bold;margin-bottom: 15px;"><?php echo (count($error_campos) > 0)?"Favor de revisar campos obligatorios marcados con rojo":""; ?></p>
			    <table cellpadding="0" cellspacing="0" width="100%">
				    <tr>
					    <td>Oficina</td>
					    <td>
					    
					    
							  
							   
						   
						     <select name="oficina_candidato" class="oficina_candidato" id="oficina_candidato" <?php echo ( in_array('oficina_candidato' , $error_campos) )?"style='border:2px solid red;width:50%;'":"style='width:50%;'"; ?> >
							     
							     <option value="">Selecciona Ubicación</option>
								 <?php
									  foreach( $CatOficinas as  $per ):
								  
									  $puesto= $per->nombreOficina;
									  
									  ?>
								  
								  
								  
								  		  <option value="<?php echo $puesto; ?>" <?php if( isset($formArray["oficina_candidato"]) && $formArray["oficina_candidato"] == $puesto ): echo "selected='selected'"; endif;?>><?php echo $puesto; ?></option>
								  <?php	  
									  endforeach;
								  ?>
							     
						      </select>
						   
						   
						   
						   
					    
					    </td>
					 
					    
				    </tr>
				    <tr>
					    <td>Plaza</td>
					    <td> 
						   
						   
						    <select name="plaza_candidato" class="plaza_candidato" id="plaza_candidato" <?php echo ( in_array('plaza_candidato' , $error_campos) )?"style='border:2px solid red;width:50%;'":"style='width:50%;'"; ?> >
							     
							     <option value="">Selecciona Ubicación</option>
								    <?php
									  foreach( $CatPlazas as  $per ):
								  
									  $puesto= $per->nombrePlaza;
									  
									  ?>
								  
								  
								  
								  		  <option value="<?php echo $puesto; ?>" <?php if( isset($formArray["plaza_candidato"]) && $formArray["plaza_candidato"] == $puesto ): echo "selected='selected'"; endif;?>><?php echo $puesto; ?></option>
								  <?php	  
									  endforeach;
								  ?>
							     
							     
						      </select>
						   
						   
						   
						   
						   
						   </td>
				    </tr>
				    <tr>
					    <td>Jefe Inmediato</td>
					    <td> 
						   
						    <select name="jefe_candidato" class="jefe_candidato" id="jefe_candidato" <?php echo ( in_array('jefe_candidato' , $error_campos) )?"style='border:2px solid red;width:50%;'":"style='width:50%;'"; ?> >
							     
							     <option value="">Selecciona Jefe Inmediato</option>
								  <?php
									  foreach( $CatUsuarios as  $per ):
								  
									  $puesto= $per->nombreUsuario;
									  
									  ?>
								  
								  
								  
								  		  <option value="<?php echo $puesto; ?>" <?php if( isset($formArray["jefe_candidato"]) && $formArray["jefe_candidato"] == $puesto ): echo "selected='selected'"; endif;?>><?php echo $puesto; ?></option>
								  <?php	  
									  endforeach;
								  ?>
							     
							     
						      </select>
						   
						   
						   
						   
						   </td>
				    </tr>
				    <tr>
					    <td>Turno</td>
					    <td> <select name="turno_candidato" class="turno" id="turno_candidato" <?php echo ( in_array('turno_candidato' , $error_campos) )?"style='border:2px solid red;width:50%;'":"style='width:50%;'"; ?>>
							   <option value="">Seleccione un Turno</option>
							    <?php
									  foreach( $Catalogos as  $per ):
								  
									  if($per->ObjetosNombre=='turno_candidato')
									  {
									  $valor= $per->valor;
									  
									  ?>
								  
								  
								  
								  		  <option value="<?php echo $valor; ?>" <?php if( isset($formArray["turno_candidato"]) && $formArray["turno_candidato"] == $valor ): echo "selected='selected'"; endif;?>><?php echo $valor; ?></option>
								  <?php
									  }
									 
									  endforeach;
								  ?>
							   
						   </select></td>
				    </tr>
				  
				   
			    </table>
				
			    <a class="btnNextFDP" id="btnNextFDP3">Continuar</a>
			    <div style="clear: both;"></div>
			    <!-- content -->
			  </div>
			  <!-- End Paso 3 -->
			  
			  <!-- Paso 4 -->
			  <div id="tabs1-paso4">
			    <h2><label>Familiares y/o conocidos en la empresa</label></h2>
			    
			    <?php if (count($error_campos) > 0):
			    ?>
			    <p style="color:red;font-weight: bold;margin-bottom: 15px;">Favor de revisar campos obligatorios marcados con rojo.</p>
			    	<?php 
			    	
			  else:
			  ?>
			  			    
			  <p style="font-weight: bold; text-align: center;font-size: 13pt; color: #00db05"> Información guardada correctamente, de click en registrar para finalizar.</p>
			    
			    <?php 
			    endif;
			    
			    ?>
			   
			    <table cellpadding="0" cellspacing="0" width="100%">
				    <tr>
					    <td>Nombre completo</td>
					    <td><input type="text" name="nombre_completo_familiar_candidato" onkeyup="javascript:this.value=this.value.toUpperCase();" style='width:95%;' class="nombre_completo_familiar_candidato" id="nombre_completo_familiar_candidato" placeholder="Nombre completo de familiar" autocomplete="off" required value="<?php echo (isset($formArray["nombre_completo_familiar_candidato"]))?$formArray["nombre_completo_familiar_candidato"]:""; ?>"></td>
					    
					   <td>Relación con el empleado</td>
					   <td>
						    <select name="parentesco_familiar_candidato" class="parentesco_familiar_candidato" id="parentesco_familiar_candidato" >
							   <option value="">Seleccionar opción</option> 
							    <?php
									  foreach( $Catalogos as  $per ):
								  
									  if($per->ObjetosNombre=='parentesco_familiar_candidato')
									  {
									  $valor= $per->valor;
									  
									  ?>
								  
								  
								  
								  		  <option value="<?php echo $valor; ?>" <?php if( isset($formArray["parentesco_familiar_candidato"]) && $formArray["parentesco_familiar_candidato"] == $valor ): echo "selected='selected'"; endif;?>><?php echo $valor; ?></option>
								  <?php
									  }
									 
									  endforeach;
								  ?>
						   </select>
					    </td>
				    </tr>
					
			    </table>   
			    
			    <h2><label>Dependientes económicos</label></h2>
			    <div class="dependientes_economicos_button">
				    <input type="button" value="Agregar dependiente" class="agregar_dependiente" id="agregar_dependiente"/>
				    
			    </div>
			    
			    <div class="dependientes_economicos_block" <?php echo ( in_array('dependientes_economicos' , $error_campos) )?"style='border:2px solid red;'":""; ?>>
				    <?php 
					    $nombre_dependiente_economico_candidato = $formArray["parentesco_dependiente_economico_candidato"];
					    $numDependientes = count($nombre_dependiente_economico_candidato);
						
					    if($numDependientes >= 1 ):
					    
					    	for( $x = 0; $x < $numDependientes; $x++ ):
						?>
							<table cellpadding="0" cellspacing="0" width="100%" class="dep_table" dependiente="1">
							    
							    <tr>
								    <td>Nombre:</td>
								    <td><input type="text" style='width:90%;' name="nombre_parentesco[]" class="nombre_parentesco" id="nombre_parentesco" placeholder="Nombre" autocomplete="off" required value="<?php echo (isset($formArray["nombre_parentesco"][$x]))?$formArray["nombre_parentesco"][$x]:""; ?>">
								    </td>
								    <td>Parentesco:</td>
								    <td>
									   <select name="parentesco_dependiente_economico_candidato[]" class="parentesco_dependiente_economico_candidato" id="parentesco_dependiente_economico_candidato">
										   <option value="">Seleccionar opción</option> 
										   
										   <option value="esposo" <?php if( isset($formArray["parentesco_dependiente_economico_candidato"][$x]) && $formArray["parentesco_dependiente_economico_candidato"][$x] == "esposo"): echo "selected"; endif; ?>>Esposo</option>
										   <option value="esposa" <?php if( isset($formArray["parentesco_dependiente_economico_candidato"][$x]) && $formArray["parentesco_dependiente_economico_candidato"][$x] == "esposa"): echo "selected"; endif; ?>>Esposa</option>
										   <option value="hija" <?php if( isset($formArray["parentesco_dependiente_economico_candidato"][$x]) && $formArray["parentesco_dependiente_economico_candidato"][$x] == "hija"): echo "selected"; endif; ?>>Hija</option>
										   <option value="hijo" <?php if( isset($formArray["parentesco_dependiente_economico_candidato"][$x]) && $formArray["parentesco_dependiente_economico_candidato"][$x] == "hijo"): echo "selected"; endif; ?>>Hijo</option>
										   <option value="madre" <?php if( isset($formArray["parentesco_dependiente_economico_candidato"][$x]) && $formArray["parentesco_dependiente_economico_candidato"][$x] == "madre"): echo "selected"; endif; ?>>Madre</option>
										   <option value="padre" <?php if( isset($formArray["parentesco_dependiente_economico_candidato"][$x]) && $formArray["parentesco_dependiente_economico_candidato"][$x] == "padre"): echo "selected"; endif; ?>>Padre</option>
										   <option value="hermano" <?php if( isset($formArray["parentesco_dependiente_economico_candidato"][$x]) && $formArray["parentesco_dependiente_economico_candidato"][$x] == "hermano"): echo "selected"; endif; ?>>Hermano</option>
										   <option value="hermana" <?php if( isset($formArray["parentesco_dependiente_economico_candidato"][$x]) && $formArray["parentesco_dependiente_economico_candidato"][$x] == "hermana"): echo "selected"; endif; ?>>Hermana</option>
										   
									   </select>
								    </td>
							    </tr>    
						    </table>
						    <hr/>
						<?php
					    	endfor;
					    		
					    endif;	
				    ?>
			    </div>    
			    
			    <h2><label>Contacto de emergencia</label></h2>
			    <table cellpadding="0" cellspacing="0" width="100%">
				   <tr>
					   <td>Nombre de contacto</td>
					   <td><input type="text" name="nombre_contacto_emergencia_candidato"  onkeyup="javascript:this.value=this.value.toUpperCase();" class="nombre_contacto_emergencia_candidato" id="nombre_contacto_emergencia_candidato" placeholder="Nombre" autocomplete="off" required value="<?php echo (isset($formArray["nombre_contacto_emergencia_candidato"]))?$formArray["nombre_contacto_emergencia_candidato"]:""; ?>" <?php echo ( in_array('nombre_contacto_emergencia_candidato' , $error_campos) )?"style='width:95%;border:2px solid red;'":"style='width:95%;'"; ?>></td>
					   <td>Parentesco</td>
					   <td>
						   <select name="parentesco_contacto_emergencia_candidato" class="parentesco_contacto_emergencia_candidato" id="parentesco_contacto_emergencia_candidato" <?php echo ( in_array('parentesco_contacto_emergencia_candidato' , $error_campos) )?"style='border:2px solid red;'":""; ?>>
							   <option value="">Seleccionar opción</option> 
							   <?php
									  foreach( $Catalogos as  $per ):
								  
									  if($per->ObjetosNombre=='parentesco_contacto_emergencia_candidato')
									  {
									  $valor= $per->valor;
									  
									  ?>
								  
								  
								  
								  		  <option value="<?php echo $valor; ?>" <?php if( isset($formArray["parentesco_contacto_emergencia_candidato"]) && $formArray["parentesco_contacto_emergencia_candidato"] == $valor ): echo "selected='selected'"; endif;?>><?php echo $valor; ?></option>
								  <?php
									  }
									 
									  endforeach;
								  ?>
						   </select>
					   </td>
				   </tr>
				   <tr>
					   <td colspan="4" style="text-align: center;">
						   <?php 
							   if( in_array('telefono_casa_emergencia_candidato' , $error_campos) ):
						  			echo '<p style="font-weight:bold; color:red;">Debes seleccionar al menos teléfono de casa o teléfono móvil</p>';	   	
							   endif;
						   ?>
					   </td>
				   </tr> 
				   <tr>
					   <td>Número teléfono de casa</td>
					   <td><input type="text" maxlength="10" name="telefono_casa_emergencia_candidato" class="telefono_casa_emergencia_candidato allownumericwithoutdecimal" id="telefono_casa_emergencia_candidato" placeholder="Teléfono casa" autocomplete="off" required value="<?php echo (isset($formArray["telefono_casa_emergencia_candidato"]))?$formArray["telefono_casa_emergencia_candidato"]:""; ?>" <?php echo ( in_array('telefono_casa_emergencia_candidato' , $error_campos) )?"style='border:2px solid red;'":""; ?>></td>
					   <td>Número teléfono móvil</td>
					   <td>
						   <input type="text" maxlength="10" name="telefono_movil_emergencia_candidato" class="telefono_movil_emergencia_candidato allownumericwithoutdecimal" id="telefono_movil_emergencia_candidato" placeholder="Teléfono móvil" autocomplete="off" required value="<?php echo (isset($formArray["telefono_movil_emergencia_candidato"]))?$formArray["telefono_movil_emergencia_candidato"]:""; ?>" <?php echo ( in_array('telefono_casa_emergencia_candidato' , $error_campos) )?"style='border:2px solid red;'":""; ?>>
					   </td>
				   </tr>
				   
				   <tr>
					   <td colspan="4" style="text-align: center;">
						   <?php 
							   if( $formArray["aviso_privacidad_fdp"] == 0 ):
							   	echo "<p style='color: red; font-weight: bold;'>Para registrar necesitas aceptar Aviso de privacidad</p>";
							   endif;
						   ?>
						    <a href="#"  id="btnNextFDP12">Leer Aviso Privacidad</a> <br/>
						   <input type="checkbox" name="aviso_privacidad_fdp" class="aviso_privacidad_fdp" id="aviso_privacidad_fdp" /> Acepto Aviso de Privacidad</td>
				   </tr>
			    </table>  
			    
			    
			    
			    <a class="btnNextFDP" id="btnNextFDP4">Registrar</a>
			    <a class="btnNextFDP" id="btnNextFDP5">Guardar</a>
			    <div style="clear: both;"></div>
			  </div>
			  <!-- End Paso 4 -->
			  
			  
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

	$(document).ready(function(){
		$("input[name=telefono_otro_candidato]").change(function(){
		var	valor= $('input[name=telefono_otro_candidato]').val();

			var n = valor.length;

if (n>0 && n!=10)
{	
			alert("Capture el número telefónico a 10 digitos ");
			$('input[name=telefono_otro_candidato]').val("");
}
			
		});
	
	})


	</script>
	
	
	<script>

	$(document).ready(function(){
		$("input[name=correo_electronico_candidato]").change(function(){
		var	valor= $('input[name=correo_electronico_candidato]').val();


		
		$.post("<?php echo HOME_URL; ?>/Empleados/ValidaEmail", {
			cp: valor
		}, function(municipio) {
			

			var str = municipio;
			var res = str.replace("-", "");

			
			if (res=="registrado") {

                $("#correo_electronico_candidato").val("");


                alert("El correo electrónico ya esta regitrado");
             
                
			} else {
				
			}
		});
		
			
		});
	
	})


	</script>
	
	<script>

	$(document).ready(function(){
		$("input[name=rfc_candidato]").change(function(){
		var	valor= $('input[name=rfc_candidato]').val();


		
		$.post("<?php echo HOME_URL; ?>/Empleados/ValidaRFCBase", {
			cp: valor
		}, function(municipio) {
			

			var str = municipio;
			var res = str.replace("-", "");

			
			if (res=="registrado") {

                $("#rfc_candidato").val("");


                alert("El RFC ya esta regitrado");

                
			} else {
				
			}
		});
		
			
		});
	
	})


	</script>
	
	<script>
	/*jslint unparam: true */
	/*global window, $ */
	$(function () {
	    'use strict';
	    // Change this to the location of your server-side upload handler:
	    var url = window.location.hostname === 'blueimp.github.io' ?
	                '//jquery-file-upload.appspot.com/' : '<?php echo HOME_URL; ?>/empleados/server/';
	    	        
	        
	    $("#cp_candidato").keyup(function() {
			var valor = $('#cp_candidato').val();
			
			if ((valor).length == 5) {
				$("#resultado").html("Procesando, espere por favor...");
				$.post("<?php echo HOME_URL; ?>/empleados/colonia", {
					cp: valor
				}, function(data) {
					$("#colonia_domicilio_candidato").html(data)
				});
				$.post("<?php echo HOME_URL; ?>/empleados/estado", {
					cp: valor
				}, function(estado) {
					$('#estado_domicilio_candidato').html(estado);
				});
				$.post("<?php echo HOME_URL; ?>/empleados/municipio", {
					cp: valor
				}, function(municipio) {
					
					$('#delegacion_domicilio_candidato').html(municipio);
					
					$("#ciudad_domicilio_candidato").val($("#delegacion_domicilio_candidato").val());
					
					var mensaje = municipio;
					if ($.trim(mensaje) == 'error') {
						$("#resultado").html("Código Postal no encontrado...");
					} else {
						$("#resultado").html("");
					}
				});
			}else {
				
			}
		});    
		
		var valorCPCandidato = $("#cp_candidato").val();
		if ((valorCPCandidato).length == 5) {
			$("#resultado").html("Procesando, espere por favor...");
				$.post("<?php echo HOME_URL; ?>/empleados/colonia", {
					cp: valorCPCandidato
				}, function(data) {
					$("#colonia_domicilio_candidato").html(data);
					
					$("#colonia_domicilio_candidato option").each(function(){
						if( $(this).val() == "<?php echo (isset($formArray["colonia_domicilio_candidato"]) && $formArray["colonia_domicilio_candidato"] != "")?$formArray["colonia_domicilio_candidato"]:""; ?>" ){
							$(this).attr('selected', true);
						}
					    //$(this).attr('selected', true);
					});
					
				});
				
				$.post("<?php echo HOME_URL; ?>/empleados/estado", {
					cp: valorCPCandidato
				}, function(estado) {
					$('#estado_domicilio_candidato').html(estado);
				});
				$.post("<?php echo HOME_URL; ?>/empleados/municipio", {
					cp: valorCPCandidato
				}, function(municipio) {
					
					$('#delegacion_domicilio_candidato').html(municipio);
					$("#ciudad_domicilio_candidato").val($("#delegacion_domicilio_candidato").val());
					var mensaje = municipio;
					if ($.trim(mensaje) == 'error') {
						$("#resultado").html("Código Postal no encontrado...");
					} else {
						$("#resultado").html("");
					}
			});
			
		}
		
		$(".agregar_dependiente").click(function(){
			//dependientes_economicos_block
			//dep_table
			var tablas = $(".dep_table");
			var numeroTablas = tablas.length;

var html ='<tr><td>Nombre:</td>'+
    '<td><input type="text" name="nombre_parentesco[]" style="width:95%;" class="nombre_parentesco" id="nombre_parentesco" placeholder="Nombre" autocomplete="off" required value="<?php echo (isset($formArray["nombre_parentesco"][$x]))?$formArray["nombre_parentesco"][$x]:""; ?>">'+
    '</td>'+
'<td>Parentesco:</td><td>'+
	   '<select name="parentesco_dependiente_economico_candidato[]" class="parentesco_dependiente_economico_candidato" id="parentesco_dependiente_economico_candidato">'+
		   '<option value="">Seleccionar opción</option>'+ 
		   '<option value="esposo" <?php if( isset($formArray["parentesco_dependiente_economico_candidato"][$x]) && $formArray["parentesco_dependiente_economico_candidato"][$x] == "esposo"): echo "selected"; endif; ?>>Esposo</option>'+
		   '<option value="esposa" <?php if( isset($formArray["parentesco_dependiente_economico_candidato"][$x]) && $formArray["parentesco_dependiente_economico_candidato"][$x] == "esposa"): echo "selected"; endif; ?>>Esposa</option>'+
		   '<option value="hija" <?php if( isset($formArray["parentesco_dependiente_economico_candidato"][$x]) && $formArray["parentesco_dependiente_economico_candidato"][$x] == "hija"): echo "selected"; endif; ?>>Hija</option>'+
		   '<option value="hijo" <?php if( isset($formArray["parentesco_dependiente_economico_candidato"][$x]) && $formArray["parentesco_dependiente_economico_candidato"][$x] == "hijo"): echo "selected"; endif; ?>>Hijo</option>'+
		   '<option value="madre" <?php if( isset($formArray["parentesco_dependiente_economico_candidato"][$x]) && $formArray["parentesco_dependiente_economico_candidato"][$x] == "madre"): echo "selected"; endif; ?>>Madre</option>'+
		   '<option value="padre" <?php if( isset($formArray["parentesco_dependiente_economico_candidato"][$x]) && $formArray["parentesco_dependiente_economico_candidato"][$x] == "padre"): echo "selected"; endif; ?>>Padre</option>'+
		   '</select></td>'+
'</tr>'


			
			
			$(".dependientes_economicos_block").append( '<hr><table class="dep_table" width="100%" cellspacing="0" cellpadding="0" dependiente="'+(numeroTablas + 1 )+'">'+html+"</table>" );
			
			//console.log( tablas.length );
		});
		
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
        
        $( "#fecha_nacimiento_candidato" ).datepicker({
	        dateFormat: "yy-mm-dd",
	        yearRange: "-100:+0",
	        changeYear:true,
        });
        
        $( "#inicio_relacion_empleo1_candidato , #fin_relacion_empleo1_candidato , #inicio_relacion_empleo2_candidato , #fin_relacion_empleo2_candidato , #inicio_relacion_empleo3_candidato , #fin_relacion_empleo3_candidato" ).datepicker({
	        dateFormat: "yy-mm-dd",
	        yearRange: "-100:+0",
	        changeYear:true,
        });
        
       
	});
	</script>