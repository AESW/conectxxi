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
	     	
	      $(".btn_fire").val("registrar");
	      $("#form_fdp_conectxxi").submit();
	  }); 
	  
	  $("#btnNextFDP4").click(function(){
	      $(".btn_fire").val("continuar");
	      $("#form_fdp_conectxxi").submit();
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
		  	</ul>
		  	<div class='panel-container'>
			  <form action="" method="post" name="form_fdp_conectxxi" class="form_fdp_conectxxi" id="form_fdp_conectxxi">
			  <input type="hidden" name="step_current" class="step_current" id="step_current" value="<?php echo (isset($formArray["step_current"]))?$formArray["step_current"]:""; ?>" />
			  <input type="hidden" name="btn_fire" class="btn_fire" id="btn_fire" value="<?php echo (isset($formArray["btn_fire"]))?$formArray["btn_fire"]:""; ?>"/>
			  
			  <input type="hidden" name="file_1" class="file_1" id="file_1" value="<?php echo (isset($formArray["file_1"]))?$formArray["file_1"]:""; ?>"/>
			  <input type="hidden" name="file_2" class="file_2" id="file_2" value="<?php echo (isset($formArray["file_2"]))?$formArray["file_2"]:""; ?>"/>
			  <input type="hidden" name="file_3" class="file_3" id="file_3" value="<?php echo (isset($formArray["file_3"]))?$formArray["file_3"]:""; ?>"/>
			  <input type="hidden" name="file_4" class="file_4" id="file_4" value="<?php echo (isset($formArray["file_4"]))?$formArray["file_4"]:""; ?>"/>
			  <input type="hidden" name="file_5" class="file_5" id="file_5" value="<?php echo (isset($formArray["file_5"]))?$formArray["file_5"]:""; ?>"/>
			  
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
			    <p style="color:red;font-weight: bold;margin-bottom: 15px;"><?php echo ( count($error_campos) > 0 )?"Favor de revisar campos obligatorios marcados con rojo":""; ?></p>
			    <table cellpadding="0" cellspacing="0" width="100%">
				    <tr>
					    <td>Nombre (s)</td>
					    <td><input type="text" name="nombre_candidato" class="nombre_candidato" id="nombre_candidato" placeholder="Nombre (s)" autocomplete="off" required value="<?php echo (isset($formArray["nombre_candidato"]))?$formArray["nombre_candidato"]:""; ?>" <?php echo ( in_array ('nombre_candidato' , $error_campos) )?"style='border:2px solid red;'":""; ?>></td>
					    <td>Apellido paterno</td>
					    <td><input type="text" name="apellido_paterno_candidato" class="apellido_paterno_candidato" id="apellido_paterno_candidato" placeholder="Apellido" autocomplete="off" required value="<?php echo (isset($formArray["apellido_paterno_candidato"]))?$formArray["apellido_paterno_candidato"]:""; ?>" <?php echo ( in_array('apellido_paterno_candidato' , $error_campos) )?"style='border:2px solid red;'":""; ?>></td>
				    </tr>
				    <tr>
					    <td>Apellido materno</td>
					    <td><input type="text" name="apellido_materno_candidato" class="apellido_materno_candidato" id="apellido_materno_candidato" placeholder="Apellido" autocomplete="off" required value="<?php echo (isset($formArray["apellido_materno_candidato"]))?$formArray["apellido_materno_candidato"]:""; ?>" <?php echo ( in_array('apellido_materno_candidato' , $error_campos) )?"style='border:2px solid red;'":""; ?>></td>
					    <td>Nombre preferido</td>
					    <td><input type="text" name="nombre_preferido_candidato" class="nombre_preferido_candidato" id="nombre_preferido_candidato" placeholder="Nombre preferido" autocomplete="off" required value="<?php echo (isset($formArray["nombre_preferido_candidato"]))?$formArray["nombre_preferido_candidato"]:""; ?>" <?php echo ( in_array('nombre_preferido_candidato' , $error_campos) )?"style='border:2px solid red;'":""; ?>></td>
				    </tr>
			    </table>
			    
			     <h2><label>Información biográfica</label></h2>
			     <table cellpadding="0" cellspacing="0" width="100%">
				     <tr>
					     <td>Fecha de nacimiento</td>
					     <td><input type="text" name="fecha_nacimiento_candidato" class="fecha_nacimiento_candidato" id="fecha_nacimiento_candidato" placeholder="dd/mm/YYYY" autocomplete="off" required value="<?php echo (isset($formArray["fecha_nacimiento_candidato"]))?$formArray["fecha_nacimiento_candidato"]:""; ?>" <?php echo ( in_array('fecha_nacimiento_candidato' , $error_campos) )?"style='border:2px solid red;'":""; ?>></td>
					     <td>País de nacimiento</td>
					     <td>
						     <select name="pais_nacimiento_candidato" class="pais_nacimiento_candidato" id="pais_nacimiento_candidato" <?php echo ( in_array('pais_nacimiento_candidato' , $error_campos) )?"style='border:2px solid red;'":""; ?>>
							     <option value="">Seleccionar país</option>
							     <option value="USA" <?php if( isset($formArray["pais_nacimiento_candidato"]) && $formArray["pais_nacimiento_candidato"] == "USA" ): echo "selected='selected'"; endif;?>>Estados Unidos de América</option>
							     <option <?php if( isset($formArray["pais_nacimiento_candidato"]) && $formArray["pais_nacimiento_candidato"] == "Mexico" ): echo "selected='selected'";endif; ?>value="Mexico">México</option>
							     <option <?php if( isset($formArray["pais_nacimiento_candidato"]) && $formArray["pais_nacimiento_candidato"] == "Otro" ): echo "selected='selected'";endif; ?> value="Otro">Otro</option>
						     </select>
					     </td>
				     </tr>
				     <tr>
					     <td>Estado de nacimiento</td>
					     <td>
						     <select name="estado_nacimiento_candidato" class="estado_nacimiento_candidato" id="estado_nacimiento_candidato" <?php echo ( in_array('estado_nacimiento_candidato' , $error_campos) )?"style='border:2px solid red;'":""; ?>>
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
						      <select name="genero_candidato" class="genero_candidato" id="genero_candidato" <?php echo ( in_array('genero_candidato' , $error_campos) )?"style='border:2px solid red;'":""; ?>>
							      <option value="">Seleccionar género</option>
							      <option value="Mujer" <?php if( isset($formArray["genero_candidato"]) && $formArray["genero_candidato"] == "Mujer" ): echo "selected='selected'"; endif;?>>Mujer</option>
							      <option value="Hombre" <?php if( isset($formArray["genero_candidato"]) && $formArray["genero_candidato"] == "Hombre" ): echo "selected='selected'"; endif;?>>Hombre</option>
						      </select>
					      </td>
				     </tr>
				     
				     <tr>
					     <td>Nivel educativo</td>
					     <td>
						      <select name="nivel_educativo_candidato" class="nivel_educativo_candidato" id="nivel_educativo_candidato" <?php echo ( in_array('nivel_educativo_candidato' , $error_campos) )?"style='border:2px solid red;'":""; ?>>
							      <option value="">Seleccionar nivel educativo</option>
							      <option value="Licenciatura" <?php if( isset($formArray["nivel_educativo_candidato"]) && $formArray["nivel_educativo_candidato"] == "Licenciatura" ): echo "selected='selected'"; endif;?>>Licenciatura</option>
							      <option value="Bachillerato" <?php if( isset($formArray["nivel_educativo_candidato"]) && $formArray["nivel_educativo_candidato"] == "Bachillerato" ): echo "selected='selected'"; endif;?>>Bachillerato</option>
							      <option value="Tecnico" <?php if( isset($formArray["nivel_educativo_candidato"]) && $formArray["nivel_educativo_candidato"] == "Técnico" ): echo "selected='selected'"; endif;?>>Técnico</option>
							      <option value="Secundaria" <?php if( isset($formArray["nivel_educativo_candidato"]) && $formArray["nivel_educativo_candidato"] == "Secundaria" ): echo "selected='selected'"; endif;?>>Secundaria</option>
							      <option value="Primaria" <?php if( isset($formArray["nivel_educativo_candidato"]) && $formArray["nivel_educativo_candidato"] == "Primaria" ): echo "selected='selected'"; endif;?>>Primaria</option>
						      </select>
					      </td>
					      <td>Estado civil</td>
					     <td>
						      <select name="estado_civil_candidato" class="estado_civil_candidato" id="estado_civil_candidato" <?php echo ( in_array('estado_civil_candidato' , $error_campos) )?"style='border:2px solid red;'":""; ?>>
							      <option value="">Seleccionar estado civil</option>
							      <option value="Soltero"  <?php if( isset($formArray["estado_civil_candidato"]) && $formArray["estado_civil_candidato"] == "Soltero" ): echo "selected='selected'"; endif;?>>Soltero</option>
							      <option value="Casado"  <?php if( isset($formArray["estado_civil_candidato"]) && $formArray["estado_civil_candidato"] == "Casado" ): echo "selected='selected'"; endif;?>>Casado</option>
						      </select>
					      </td>
				     </tr>
			     </table>    
			     
			     <h2><label>Números de identificación y seguro social</label></h2>
			     <table cellpadding="0" cellspacing="0" width="100%">
				     <tr>
					    <td>R.F.C.</td>
					    <td><input type="text" name="rfc_candidato" class="rfc_candidato" id="rfc_candidato" placeholder="R.F.C." autocomplete="off" required value="<?php echo (isset($formArray["rfc_candidato"]))?$formArray["rfc_candidato"]:""; ?>" <?php echo ( in_array('rfc_candidato' , $error_campos) )?"style='border:2px solid red;'":""; ?>></td>
					    <td>CURP</td>
					    <td><input type="text" name="curp_candidato" class="curp_candidato" id="curp_candidato" placeholder="C.U.R.P." autocomplete="off" required value="<?php echo (isset($formArray["curp_candidato"]))?$formArray["curp_candidato"]:""; ?>" <?php echo ( in_array('curp_candidato' , $error_campos) )?"style='border:2px solid red;'":""; ?>></td>
				    </tr>
				    <tr>
					    <td>Número de seguro social</td>
					    <td><input type="text" name="numero_segurosocial_candidato" class="numero_segurosocial_candidato" id="numero_segurosocial_candidato" placeholder="NSS" autocomplete="off" required value="<?php echo (isset($formArray["numero_segurosocial_candidato"]))?$formArray["numero_segurosocial_candidato"]:""; ?>" <?php echo ( in_array('numero_segurosocial_candidato' , $error_campos) )?"style='border:2px solid red;'":""; ?>></td>
					    
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
					    <td><input type="text" name="calle_no_candidato" class="calle_no_candidato" id="calle_no_candidato" placeholder="Calle y número" autocomplete="off" required value="<?php echo (isset($formArray["calle_no_candidato"]))?$formArray["calle_no_candidato"]:""; ?>" <?php echo ( in_array('calle_no_candidato' , $error_campos) )?"style='border:2px solid red;'":""; ?>></td>
					    <td>Código Postal</td>
					    <td><input type="text" name="cp_candidato" class="cp_candidato" id="cp_candidato" placeholder="C.P." autocomplete="off" required value="<?php echo (isset($formArray["cp_candidato"]))?$formArray["cp_candidato"]:""; ?>" <?php echo ( in_array('cp_candidato' , $error_campos) )?"style='border:2px solid red;'":""; ?>></td>
				    </tr>
				    <tr>
					    <td>Estado</td>
					    <td>
						    <select name="estado_domicilio_candidato" class="estado_domicilio_candidato" id="estado_domicilio_candidato" <?php echo ( in_array('estado_domicilio_candidato' , $error_campos) )?"style='border:2px solid red;'":""; ?>>
							    <option value="">Seleccionar estado</option>
							    
						     </select>
					    </td>
					    <td>Ciudad</td>
					    <td><input type="text" name="ciudad_domicilio_candidato" class="ciudad_domicilio_candidato" id="ciudad_domicilio_candidato" placeholder="Ciudad" autocomplete="off" required value="<?php echo (isset($formArray["ciudad_domicilio_candidato"]))?$formArray["ciudad_domicilio_candidato"]:""; ?>" <?php echo ( in_array('ciudad_domicilio_candidato' , $error_campos) )?"style='border:2px solid red;'":""; ?>></td>
				    </tr>
				    <tr>
					    <td>Municipio o delegación</td>
					    <td>
						   <select name="delegacion_domicilio_candidato" class="delegacion_domicilio_candidato" id="delegacion_domicilio_candidato" <?php echo ( in_array('delegacion_domicilio_candidato' , $error_campos) )?"style='border:2px solid red;'":""; ?>>
							   <option value="">Seleccionar delegación o municipio</option> 
						   </select>
					    </td>
					    <td>Colonia</td>
					    <td>
						    <select name="colonia_domicilio_candidato" class="colonia_domicilio_candidato" id="colonia_domicilio_candidato" required <?php echo ( in_array('colonia_domicilio_candidato' , $error_campos) )?"style='border:2px solid red;'":""; ?>>
				              <option value="">Seleccionar colonia</option> 
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
							   <option value="SinInstruccion" <?php if( isset($formArray["escolaridad_jefefamilia_candidato"]) && $formArray["escolaridad_jefefamilia_candidato"] == "SinInstruccion" ): echo "selected='selected'"; endif;?>>Sin instrucción</option>
							   <option value="primaria_secundaria" <?php if( isset($formArray["escolaridad_jefefamilia_candidato"]) && $formArray["escolaridad_jefefamilia_candidato"] == "primaria_secundaria" ): echo "selected='selected'"; endif;?>>Primaria o secundaria, completa o incompleta</option>
							   <option value="tecnico_preparatoria" <?php if( isset($formArray["escolaridad_jefefamilia_candidato"]) && $formArray["escolaridad_jefefamilia_candidato"] == "tecnico_preparatoria" ): echo "selected='selected'"; endif;?>>Carrera técnica, preparatoria completa o incompleta</option>
							   <option value="licenciatura" <?php if( isset($formArray["escolaridad_jefefamilia_candidato"]) && $formArray["escolaridad_jefefamilia_candidato"] == "licenciatura" ): echo "selected='selected'"; endif;?>>Licenciatura completa o incompleta</option>
							   <option value="posgrado" <?php if( isset($formArray["escolaridad_jefefamilia_candidato"]) && $formArray["escolaridad_jefefamilia_candidato"] == "posgrado" ): echo "selected='selected'"; endif;?>>Posgrado</option>
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
							   <option value="21+" <?php if( isset($formArray["focos_vivienda_candidato"]) && $formArray["focos_vivienda_candidato"] == "21+" ): echo "selected='selected'"; endif;?>>21 o más</option>
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
			    
			    <h2><label>Experiencia Laboral</label></h2>
			    <table cellpadding="0" cellspacing="0" width="100%">
				    <tr>
					    <td>Empleo anterior</td>
					    <td><input type="text" name="empleo_anterior1_candidato" class="empleo_anterior1_candidato" id="empleo_anterior1_candidato" placeholder="Empleo anterior" autocomplete="off" required value="<?php echo (isset($formArray["empleo_anterior1_candidato"]))?$formArray["empleo_anterior1_candidato"]:""; ?>" <?php echo ( in_array('empleo_anterior1_candidato' , $error_campos) )?"style='border:2px solid red;'":""; ?>></td>
					    <td colspan="2">
						    Descripción de Actividades
						    <br/>
						    <textarea name="descripcion_empleo1_candidato" class="descripcion_empleo1_candidato" id="descripcion_empleo1_candidato" placeholder="Ingresa tus actividades aquí" required <?php echo ( in_array('descripcion_empleo1_candidato' , $error_campos) )?"style='border:2px solid red;'":""; ?>><?php echo (isset($formArray["descripcion_empleo1_candidato"]))?$formArray["descripcion_empleo1_candidato"]:""; ?></textarea>
					    </td>
					    
				    </tr>
				    <tr>
					    <td>Teléfono</td>
					    <td><input type="text" name="telefono_empleo1_candidato" class="empleo_anterior1_candidato" id="empleo_anterior1_candidato" placeholder="Teléfono empleo anterior" autocomplete="off" required value="<?php echo (isset($formArray["telefono_empleo1_candidato"]))?$formArray["telefono_empleo1_candidato"]:""; ?>" <?php echo ( in_array('telefono_empleo1_candidato' , $error_campos) )?"style='border:2px solid red;'":""; ?>></td>
				    </tr>
				    <tr>
					    <td>Contacto</td>
					    <td><input type="text" name="contacto_empleo1_candidato" class="contacto_empleo1_candidato" id="contacto_empleo1_candidato" placeholder="Contacto empleo anterior" autocomplete="off" required value="<?php echo (isset($formArray["contacto_empleo1_candidato"]))?$formArray["contacto_empleo1_candidato"]:""; ?>" <?php echo ( in_array('contacto_empleo1_candidato' , $error_campos) )?"style='border:2px solid red;'":""; ?>></td>
				    </tr>
				    <tr>
					    <td colspan="4">
						    <hr>
					    </td>
				    </tr>
				    <tr>
					    <td>Empleo anterior</td>
					    <td><input type="text" name="empleo_anterior2_candidato" class="empleo_anterior2_candidato" id="empleo_anterior2_candidato" placeholder="Empleo anterior" autocomplete="off" required value="<?php echo (isset($formArray["empleo_anterior2_candidato"]))?$formArray["empleo_anterior2_candidato"]:""; ?>" <?php echo ( in_array('empleo_anterior2_candidato' , $error_campos) )?"style='border:2px solid red;'":""; ?>></td>
					    <td colspan="2">
						    Descripción de Actividades
						    <br/>
						    <textarea name="descripcion_empleo2_candidato" class="descripcion_empleo2_candidato" id="descripcion_empleo2_candidato" placeholder="Ingresa tus actividades aquí" required <?php echo ( in_array('descripcion_empleo2_candidato' , $error_campos) )?"style='border:2px solid red;'":""; ?>><?php echo (isset($formArray["descripcion_empleo2_candidato"]))?$formArray["descripcion_empleo2_candidato"]:""; ?></textarea>
					    </td>
					    
				    </tr>
				    <tr>
					    <td>Teléfono</td>
					    <td><input type="text" name="telefono_empleo2_candidato" class="empleo_anterior2_candidato" id="empleo_anterior2_candidato" placeholder="Teléfono empleo anterior" autocomplete="off" required value="<?php echo (isset($formArray["telefono_empleo2_candidato"]))?$formArray["telefono_empleo2_candidato"]:""; ?>" <?php echo ( in_array('telefono_empleo2_candidato' , $error_campos) )?"style='border:2px solid red;'":""; ?>></td>
				    </tr>
				    <tr>
					    <td>Contacto</td>
					    <td><input type="text" name="contacto_empleo2_candidato" class="contacto_empleo2_candidato" id="contacto_empleo2_candidato" placeholder="Contacto empleo anterior" autocomplete="off" required value="<?php echo (isset($formArray["contacto_empleo2_candidato"]))?$formArray["contacto_empleo2_candidato"]:""; ?>" <?php echo ( in_array('contacto_empleo2_candidato' , $error_campos) )?"style='border:2px solid red;'":""; ?>></td>
				    </tr>
				    <tr>
					    <td colspan="4">
						    <hr>
					    </td>
				    </tr>
				     <tr>
					    <td>Empleo anterior</td>
					    <td><input type="text" name="empleo_anterior3_candidato" class="empleo_anterior3_candidato" id="empleo_anterior3_candidato" placeholder="Empleo anterior" autocomplete="off" required value="<?php echo (isset($formArray["empleo_anterior3_candidato"]))?$formArray["empleo_anterior3_candidato"]:""; ?>" <?php echo ( in_array('empleo_anterior3_candidato' , $error_campos) )?"style='border:2px solid red;'":""; ?>></td>
					    <td colspan="2">
						    Descripción de Actividades
						    <br/>
						    <textarea name="descripcion_empleo3_candidato" class="descripcion_empleo3_candidato" id="descripcion_empleo3_candidato" placeholder="Ingresa tus actividades aquí" required <?php echo ( in_array('descripcion_empleo3_candidato' , $error_campos) )?"style='border:2px solid red;'":""; ?>><?php echo (isset($formArray["descripcion_empleo3_candidato"]))?$formArray["descripcion_empleo3_candidato"]:""; ?></textarea>
					    </td>
					    
				    </tr>
				    <tr>
					    <td>Teléfono</td>
					    <td><input type="text" name="telefono_empleo3_candidato" class="empleo_anterior3_candidato" id="empleo_anterior3_candidato" placeholder="Teléfono empleo anterior" autocomplete="off" required value="<?php echo (isset($formArray["telefono_empleo3_candidato"]))?$formArray["telefono_empleo3_candidato"]:""; ?>" <?php echo ( in_array('telefono_empleo3_candidato' , $error_campos) )?"style='border:2px solid red;'":""; ?>></td>
				    </tr>
				    <tr>
					    <td>Contacto</td>
					    <td><input type="text" name="contacto_empleo3_candidato" class="contacto_empleo3_candidato" id="contacto_empleo3_candidato" placeholder="Contacto empleo anterior" autocomplete="off" required value="<?php echo (isset($formArray["contacto_empleo3_candidato"]))?$formArray["contacto_empleo3_candidato"]:""; ?>" <?php echo ( in_array('contacto_empleo3_candidato' , $error_campos) )?"style='border:2px solid red;'":""; ?>></td>
				    </tr>
			    </table>
			    
			    <h2><label>Datos de contacto del candidato</label></h2>
			    <table cellpadding="0" cellspacing="0" width="100%">
				    <tr>
					    <td>Número de teléfono de casa</td>
					    <td><input type="text" name="telefono_casa_candidato" class="telefono_casa_candidato" id="telefono_casa_candidato" placeholder="Tel. casa" autocomplete="off" required value="<?php echo (isset($formArray["telefono_casa_candidato"]))?$formArray["telefono_casa_candidato"]:""; ?>" <?php echo ( in_array('telefono_casa_candidato' , $error_campos) )?"style='border:2px solid red;'":""; ?>></td>
					    <td>Número de teléfono móvil</td>
					    <td><input type="text" name="telefono_movil_candidato" class="telefono_movil_candidato" id="telefono_movil_candidato" placeholder="Tel. móvil" autocomplete="off" required value="<?php echo (isset($formArray["telefono_movil_candidato"]))?$formArray["telefono_movil_candidato"]:""; ?>" <?php echo ( in_array('telefono_movil_candidato' , $error_campos) )?"style='border:2px solid red;'":""; ?>></td>
				    </tr>
				    <tr>
					    <td>Otro número de teléfono</td>
					    <td><input type="text" name="telefono_otro_candidato" class="telefono_otro_candidato" id="telefono_otro_candidato" placeholder="Otro teléfono" autocomplete="off" required value="<?php echo (isset($formArray["telefono_otro_candidato"]))?$formArray["telefono_otro_candidato"]:""; ?>" <?php echo ( in_array('telefono_otro_candidato' , $error_campos) )?"style='border:2px solid red;'":""; ?>></td>
					    <td>Correo electrónico personal</td>
					    <td><input type="text" name="correo_electronico_candidato" class="correo_electronico_candidato" id="correo_electronico_candidato" placeholder="Correo electrónico" autocomplete="off" required value="<?php echo (isset($formArray["correo_electronico_candidato"]))?$formArray["correo_electronico_candidato"]:""; ?>" <?php echo ( in_array('correo_electronico_candidato' , $error_campos) )?"style='border:2px solid red;'":""; ?>></td>
				    </tr>
			    </table>
			    
			    <a class="btnNextFDP" id="btnNextFDP2">Continuar</a>
			    <div style="clear: both;"></div>
			    <!-- content -->
			  </div>
			  <!-- End Paso 2 -->
			  
			  <!-- Paso 3 -->
			  <div id="tabs1-paso3">
			    <h2><label>Familiares y/ conocidos en la empresa</label></h2>
			    <p style="color:red;font-weight: bold;margin-bottom: 15px;"><?php echo (count($error_campos) > 0)?"Favor de revisar campos obligatorios marcados con rojo":""; ?></p>
			    <table cellpadding="0" cellspacing="0" width="100%">
				    <tr>
					    <td>Nombre completo</td>
					    <td><input type="text" name="nombre_completo_familiar_candidato" class="nombre_completo_familiar_candidato" id="nombre_completo_familiar_candidato" placeholder="Nombre completo de familiar" autocomplete="off" required value="<?php echo (isset($formArray["nombre_completo_familiar_candidato"]))?$formArray["nombre_completo_familiar_candidato"]:""; ?>" <?php echo ( in_array('nombre_completo_familiar_candidato' , $error_campos) )?"style='border:2px solid red;'":""; ?>></td>
					    
					   <td>Parentesco</td>
					   <td>
						    <select name="parentesco_familiar_candidato" class="parentesco_familiar_candidato" id="parentesco_familiar_candidato" <?php echo ( in_array('parentesco_familiar_candidato' , $error_campos) )?"style='border:2px solid red;'":""; ?>>
							   <option value="">Seleccionar opción</option> 
							   <option value="amigo" <?php if( isset($formArray["parentesco_familiar_candidato"]) && $formArray["parentesco_familiar_candidato"] == "amigo" ): echo "selected='selected'"; endif;?>>Amigo</option>
							   <option value="conocido" <?php if( isset($formArray["parentesco_familiar_candidato"]) && $formArray["parentesco_familiar_candidato"] == "conocido" ): echo "selected='selected'"; endif;?>>Conocido</option>
							   <option value="esposo" <?php if( isset($formArray["parentesco_familiar_candidato"]) && $formArray["parentesco_familiar_candidato"] == "esposo" ): echo "selected='selected'"; endif;?>>Esposo</option>
							   <option value="esposa" <?php if( isset($formArray["parentesco_familiar_candidato"]) && $formArray["parentesco_familiar_candidato"] == "esposa" ): echo "selected='selected'"; endif;?>>Esposa</option>
							   <option value="hija" <?php if( isset($formArray["parentesco_familiar_candidato"]) && $formArray["parentesco_familiar_candidato"] == "hija" ): echo "selected='selected'"; endif;?>>Hija</option>
							   <option value="hijo" <?php if( isset($formArray["parentesco_familiar_candidato"]) && $formArray["parentesco_familiar_candidato"] == "hijo" ): echo "selected='selected'"; endif;?>>Hijo</option>
							   <option value="madre" <?php if( isset($formArray["parentesco_familiar_candidato"]) && $formArray["parentesco_familiar_candidato"] == "madre" ): echo "selected='selected'"; endif;?>>Madre</option>
							   <option value="padre" <?php if( isset($formArray["parentesco_familiar_candidato"]) && $formArray["parentesco_familiar_candidato"] == "padre" ): echo "selected='selected'"; endif;?>>Padre</option>
							   <option value="novio" <?php if( isset($formArray["parentesco_familiar_candidato"]) && $formArray["parentesco_familiar_candidato"] == "novio" ): echo "selected='selected'"; endif;?>>Novio</option>
							   <option value="novia" <?php if( isset($formArray["parentesco_familiar_candidato"]) && $formArray["parentesco_familiar_candidato"] == "novia" ): echo "selected='selected'"; endif;?>>Novia</option>
						   </select>
					    </td>
				    </tr>
					
			    </table>   
			    
			    <h2><label>Documentación requerida</label></h2> 
			    <table cellpadding="0" cellspacing="0" width="100%">
				    <tr>
					    <td>Currículo Vitae</td>
					    <td <?php echo ( in_array('file_1' , $error_campos) )?"style='border:2px solid red;'":""; ?>>
						    <span class="btn btn-success fileinput-button">
						        <i class="glyphicon glyphicon-plus"></i>
						        <span>Cargar...</span>
						        <!-- The file input field used as target for the file upload widget -->
						        <input id="fileupload1" type="file" name="files[]" multiple>
						    </span>
						    <!-- The global progress bar -->
						    <div id="progress1" class="progress">
						        <div class="progress-bar progress-bar-success"></div>
						    </div>
						    <!-- The container for the uploaded files -->
						    <div id="files1" class="files">
							    <?php 
								    if( isset($formArray["file_1"]) && $formArray["file_1"] != ""):
								    	echo '<a href="'.HOME_URL."tempFDP/files/".$formArray["file_1"].'" target="_blank">'.$formArray["file_1"].'</a>';
								    	
								    endif;
							    ?>
						    </div>
					    </td>
					    
					    <td>Identificación oficial</td>
					    <td <?php echo ( in_array('file_2' , $error_campos) )?"style='border:2px solid red;'":""; ?>>
						    <span class="btn btn-success fileinput-button">
						        <i class="glyphicon glyphicon-plus"></i>
						        <span>Cargar...</span>
						        <!-- The file input field used as target for the file upload widget -->
						        <input id="fileupload2" type="file" name="files[]" multiple>
						    </span>
						    <!-- The global progress bar -->
						    <div id="progress2" class="progress">
						        <div class="progress-bar progress-bar-success"></div>
						    </div>
						    <!-- The container for the uploaded files -->
						    <div id="files2" class="files">
							    <?php 
								    if( isset($formArray["file_2"]) && $formArray["file_2"] != ""):
								    	echo '<a href="'.HOME_URL."tempFDP/files/".$formArray["file_2"].'" target="_blank">'.$formArray["file_2"].'</a>';
								    	
								    endif;
							    ?>
						    </div>
					    </td>
				    </tr>
				    
				    <tr>
					    <td>Comprobante de domicilio</td>
					    <td <?php echo ( in_array('file_3' , $error_campos) )?"style='border:2px solid red;'":""; ?>>
						    <span class="btn btn-success fileinput-button">
						        <i class="glyphicon glyphicon-plus"></i>
						        <span>Cargar...</span>
						        <!-- The file input field used as target for the file upload widget -->
						        <input id="fileupload3" type="file" name="files[]" multiple>
						    </span>
						    <!-- The global progress bar -->
						    <div id="progress3" class="progress">
						        <div class="progress-bar progress-bar-success"></div>
						    </div>
						    <!-- The container for the uploaded files -->
						    <div id="files3" class="files">
							    <?php 
								    if( isset($formArray["file_3"]) && $formArray["file_3"] != ""):
								    	echo '<a href="'.HOME_URL."tempFDP/files/".$formArray["file_3"].'" target="_blank">'.$formArray["file_3"].'</a>';
								    	
								    endif;
							    ?>
						    </div>
					    </td>
					    
					    <td>Acta de nacimiento</td>
					    <td <?php echo ( in_array('file_4' , $error_campos) )?"style='border:2px solid red;'":""; ?>>
						    <span class="btn btn-success fileinput-button">
						        <i class="glyphicon glyphicon-plus"></i>
						        <span>Cargar...</span>
						        <!-- The file input field used as target for the file upload widget -->
						        <input id="fileupload4" type="file" name="files[]" multiple>
						    </span>
						    <!-- The global progress bar -->
						    <div id="progress4" class="progress">
						        <div class="progress-bar progress-bar-success"></div>
						    </div>
						    <!-- The container for the uploaded files -->
						    <div id="files4" class="files">
							    <?php 
								    if( isset($formArray["file_4"]) && $formArray["file_4"] != ""):
								    	echo '<a href="'.HOME_URL."tempFDP/files/".$formArray["file_4"].'" target="_blank">'.$formArray["file_4"].'</a>';
								    	
								    endif;
							    ?>
						    </div>
					    </td>
				    </tr>
				    
				    <tr>
					    <td>Comprobante de estudios</td>
					    <td <?php echo ( in_array('file_5' , $error_campos) )?"style='border:2px solid red;'":""; ?>>
						    <span class="btn btn-success fileinput-button">
						        <i class="glyphicon glyphicon-plus"></i>
						        <span>Cargar...</span>
						        <!-- The file input field used as target for the file upload widget -->
						        <input id="fileupload5" type="file" name="files[]" multiple>
						    </span>
						    <!-- The global progress bar -->
						    <div id="progress5" class="progress">
						        <div class="progress-bar progress-bar-success"></div>
						    </div>
						    <!-- The container for the uploaded files -->
						    <div id="files5" class="files">
							    <?php 
								    if( isset($formArray["file_5"]) && $formArray["file_5"] != ""):
								    	echo '<a href="'.HOME_URL."tempFDP/files/".$formArray["file_5"].'" target="_blank">'.$formArray["file_5"].'</a>';
								    	
								    endif;
							    ?>
						    </div>
					    </td>
					    
					    <td>3 cartas de recomendación laborales y/o personales</td>
					    <td <?php echo ( in_array('file_6' , $error_campos) )?"style='border:2px solid red;'":""; ?>>
						    <span class="btn btn-success fileinput-button">
						        <i class="glyphicon glyphicon-plus"></i>
						        <span>Cargar...</span>
						        <!-- The file input field used as target for the file upload widget -->
						        <input id="fileupload6" type="file" name="files[]" multiple>
						    </span>
						    <!-- The global progress bar -->
						    <div id="progress6" class="progress">
						        <div class="progress-bar progress-bar-success"></div>
						    </div>
						    <!-- The container for the uploaded files -->
						    <div id="files6" class="files">
							    <?php 
								    if( isset($formArray["file_6"]) && !empty( $formArray["file_5"] )):
								    	foreach($formArray["file_6"] as $file):
								    		echo '<p><a href="'.HOME_URL."tempFDP/files/".$file.'" target="_blank">'.$file.'</a></p>';
								    	endforeach;
								    endif;
							    ?>
						    </div>
					    </td>
				    </tr>
			    </table>
			    
			    <h2><label>Dependientes económicos</label></h2>
			    <div class="dependientes_economicos_button">
				    <input type="button" value="Agregar dependiente" class="agregar_dependiente" id="agregar_dependiente"/>
				    
			    </div>
			    
			    <div class="dependientes_economicos_block" <?php echo ( in_array('dependientes_economicos' , $error_campos) )?"style='border:2px solid red;'":""; ?>>
				    <?php 
					    $nombre_dependiente_economico_candidato = $formArray["nombre_dependiente_economico_candidato"];
					    $numDependientes = count($nombre_dependiente_economico_candidato);
						
					    if($numDependientes >= 1 ):
					    
					    	for( $x = 0; $x < $numDependientes; $x++ ):
						?>
							<table cellpadding="0" cellspacing="0" width="100%" class="dep_table" dependiente="1">
							    <tr>
								    <td>Nombre del dependiente económico</td>
								    <td><input type="text" name="nombre_dependiente_economico_candidato[]" class="nombre_dependiente_economico_candidato" id="nombre_dependiente_economico_candidato1" placeholder="Nombre" autocomplete="off" required value="<?php echo (isset( $formArray["nombre_dependiente_economico_candidato"][$x] ))?$formArray["nombre_dependiente_economico_candidato"][$x]:""; ?>"></td>
								    <td>Género</td>
								    <td>
									    <select name="genero_dependiente_economico_candidato[]" class="genero_dependiente_economico_candidato" id="genero_dependiente_economico_candidato">
										      <option value="">Seleccionar género</option>
										      <option value="Mujer" <?php if( isset($formArray["genero_dependiente_economico_candidato"][$x]) && $formArray["genero_dependiente_economico_candidato"][$x] == "Mujer"): echo "selected"; endif; ?>>Mujer</option>
										      <option value="Hombre" <?php if( isset($formArray["genero_dependiente_economico_candidato"][$x]) && $formArray["genero_dependiente_economico_candidato"][$x] == "Hombre"): echo "selected"; endif; ?>>Hombre</option>
									    </select>
								    </td>
							    </tr>
							    <tr>
								    <td>Fecha de nacimiento</td>
								    <td><input type="text" name="fecha_nacimiento_dependiente_economico_candidato[]" class="fecha_nacimiento_dependiente_economico_candidato" id="fecha_nacimiento_dependiente_economico_candidato" placeholder="dd/mm/YYYY" autocomplete="off" required value="<?php echo (isset( $formArray["fecha_nacimiento_dependiente_economico_candidato"][$x] ))?$formArray["fecha_nacimiento_dependiente_economico_candidato"][$x]:""; ?>"></td>
								    <td>Parentesco</td>
								    <td>
									   <select name="parentesco_dependiente_economico_candidato[]" class="parentesco_dependiente_economico_candidato" id="parentesco_dependiente_economico_candidato">
										   <option value="">Seleccionar opción</option> 
										   <option value="amigo" <?php if( isset($formArray["parentesco_dependiente_economico_candidato"][$x]) && $formArray["parentesco_dependiente_economico_candidato"][$x] == "amigo"): echo "selected"; endif; ?>>Amigo</option>
										   <option value="conocido" <?php if( isset($formArray["parentesco_dependiente_economico_candidato"][$x]) && $formArray["parentesco_dependiente_economico_candidato"][$x] == "conocido"): echo "selected"; endif; ?>>Conocido</option>
										   <option value="esposo" <?php if( isset($formArray["parentesco_dependiente_economico_candidato"][$x]) && $formArray["parentesco_dependiente_economico_candidato"][$x] == "esposo"): echo "selected"; endif; ?>>Esposo</option>
										   <option value="esposa" <?php if( isset($formArray["parentesco_dependiente_economico_candidato"][$x]) && $formArray["parentesco_dependiente_economico_candidato"][$x] == "esposa"): echo "selected"; endif; ?>>Esposa</option>
										   <option value="hija" <?php if( isset($formArray["parentesco_dependiente_economico_candidato"][$x]) && $formArray["parentesco_dependiente_economico_candidato"][$x] == "hija"): echo "selected"; endif; ?>>Hija</option>
										   <option value="hijo" <?php if( isset($formArray["parentesco_dependiente_economico_candidato"][$x]) && $formArray["parentesco_dependiente_economico_candidato"][$x] == "hijo"): echo "selected"; endif; ?>>Hijo</option>
										   <option value="madre" <?php if( isset($formArray["parentesco_dependiente_economico_candidato"][$x]) && $formArray["parentesco_dependiente_economico_candidato"][$x] == "madre"): echo "selected"; endif; ?>>Madre</option>
										   <option value="padre" <?php if( isset($formArray["parentesco_dependiente_economico_candidato"][$x]) && $formArray["parentesco_dependiente_economico_candidato"][$x] == "padre"): echo "selected"; endif; ?>>Padre</option>
										   <option value="novio" <?php if( isset($formArray["parentesco_dependiente_economico_candidato"][$x]) && $formArray["parentesco_dependiente_economico_candidato"][$x] == "novio"): echo "selected"; endif; ?>>Novio</option>
										   <option value="novia" <?php if( isset($formArray["parentesco_dependiente_economico_candidato"][$x]) && $formArray["parentesco_dependiente_economico_candidato"][$x] == "novia"): echo "selected"; endif; ?>>Novia</option>
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
					   <td><input type="text" name="nombre_contacto_emergencia_candidato" class="nombre_contacto_emergencia_candidato" id="nombre_contacto_emergencia_candidato" placeholder="Nombre" autocomplete="off" required value="<?php echo (isset($formArray["nombre_contacto_emergencia_candidato"]))?$formArray["nombre_contacto_emergencia_candidato"]:""; ?>" <?php echo ( in_array('nombre_contacto_emergencia_candidato' , $error_campos) )?"style='border:2px solid red;'":""; ?>></td>
					   <td>Parentesco</td>
					   <td>
						   <select name="parentesco_contacto_emergencia_candidato" class="parentesco_contacto_emergencia_candidato" id="parentesco_contacto_emergencia_candidato" <?php echo ( in_array('parentesco_contacto_emergencia_candidato' , $error_campos) )?"style='border:2px solid red;'":""; ?>>
							   <option value="">Seleccionar opción</option> 
							   <option value="amigo" <?php if( isset($formArray["parentesco_contacto_emergencia_candidato"]) && $formArray["parentesco_contacto_emergencia_candidato"] == "amigo" ): echo "selected='selected'"; endif;?>>Amigo</option>
							   <option value="conocido" <?php if( isset($formArray["parentesco_contacto_emergencia_candidato"]) && $formArray["parentesco_contacto_emergencia_candidato"] == "conocido" ): echo "selected='selected'"; endif;?>>Conocido</option>
							   <option value="esposo" <?php if( isset($formArray["parentesco_contacto_emergencia_candidato"]) && $formArray["parentesco_contacto_emergencia_candidato"] == "esposo" ): echo "selected='selected'"; endif;?>>Esposo</option>
							   <option value="esposa" <?php if( isset($formArray["parentesco_contacto_emergencia_candidato"]) && $formArray["parentesco_contacto_emergencia_candidato"] == "esposa" ): echo "selected='selected'"; endif;?>>Esposa</option>
							   <option value="hija" <?php if( isset($formArray["parentesco_contacto_emergencia_candidato"]) && $formArray["parentesco_contacto_emergencia_candidato"] == "hija" ): echo "selected='selected'"; endif;?>>Hija</option>
							   <option value="hijo" <?php if( isset($formArray["parentesco_contacto_emergencia_candidato"]) && $formArray["parentesco_contacto_emergencia_candidato"] == "hijo" ): echo "selected='selected'"; endif;?>>Hijo</option>
							   <option value="madre" <?php if( isset($formArray["parentesco_contacto_emergencia_candidato"]) && $formArray["parentesco_contacto_emergencia_candidato"] == "madre" ): echo "selected='selected'"; endif;?>>Madre</option>
							   <option value="padre" <?php if( isset($formArray["parentesco_contacto_emergencia_candidato"]) && $formArray["parentesco_contacto_emergencia_candidato"] == "padre" ): echo "selected='selected'"; endif;?>>Padre</option>
							   <option value="novio" <?php if( isset($formArray["parentesco_contacto_emergencia_candidato"]) && $formArray["parentesco_contacto_emergencia_candidato"] == "novio" ): echo "selected='selected'"; endif;?>>Novio</option>
							   <option value="novia" <?php if( isset($formArray["parentesco_contacto_emergencia_candidato"]) && $formArray["parentesco_contacto_emergencia_candidato"] == "novia" ): echo "selected='selected'"; endif;?>>Novia</option>
						   </select>
					   </td>
				   </tr> 
				   <tr>
					   <td>Número teléfono de casa</td>
					   <td><input type="text" name="telefono_casa_emergencia_candidato" class="telefono_casa_emergencia_candidato" id="telefono_casa_emergencia_candidato" placeholder="Teléfono casa" autocomplete="off" required value="<?php echo (isset($formArray["telefono_casa_emergencia_candidato"]))?$formArray["telefono_casa_emergencia_candidato"]:""; ?>" <?php echo ( in_array('telefono_casa_emergencia_candidato' , $error_campos) )?"style='border:2px solid red;'":""; ?>></td>
					   <td>Número teléfono móvil</td>
					   <td>
						   <input type="text" name="telefono_movil_emergencia_candidato" class="telefono_movil_emergencia_candidato" id="telefono_movil_emergencia_candidato" placeholder="Teléfono móvil" autocomplete="off" required value="<?php echo (isset($formArray["telefono_movil_emergencia_candidato"]))?$formArray["telefono_movil_emergencia_candidato"]:""; ?>" <?php echo ( in_array('telefono_movil_emergencia_candidato' , $error_campos) )?"style='border:2px solid red;'":""; ?>>
					   </td>
				   </tr>
			    </table>  
			    
			    <h2><label>Cuenta bancaria</label></h2>  
			    <!-- content -->
			    <table cellpadding="0" cellspacing="0" width="100%">
				    <tr>
					    <td <?php echo ( in_array('cuenta_con_cuenta_bancaria' , $error_campos) )?"style='border:2px solid red;'":""; ?>>¿Cuenta con cuenta bancaria? <?php echo $formArray["cuenta_con_cuenta_bancaria"]; ?>
						    <br/><input type="radio" name="cuenta_con_cuenta_bancaria" class="cuenta_con_cuenta_bancaria" value="si" <?php if( isset($formArray["cuenta_con_cuenta_bancaria"]) && $formArray["cuenta_con_cuenta_bancaria"] == "si" ): echo "checked"; endif; ?> />Si <br/>
						    	<input type="radio" name="cuenta_con_cuenta_bancaria" class="cuenta_con_cuenta_bancaria" value="no" <?php if( isset($formArray["cuenta_con_cuenta_bancaria"]) && $formArray["cuenta_con_cuenta_bancaria"] == "no" ): echo "checked"; endif; ?>/>No
					    </td>
				    </tr>
				    <tr>
					    <td>Número de cuenta</td>
					    <td>
						    <input type="text" name="numero_cuenta_candidato" class="numero_cuenta_candidato" id="numero_cuenta_candidato" placeholder="No. de cuenta" autocomplete="off" required value="<?php echo (isset($formArray["numero_cuenta_candidato"]))?$formArray["numero_cuenta_candidato"]:""; ?>" <?php echo ( in_array('numero_cuenta_candidato' , $error_campos) )?"style='border:2px solid red;'":""; ?>>
					    </td>
					    <td>CLABE Interbancaria</td>
					    <td>
						    <input type="text" name="clabe_interbancaria_candidato" class="clabe_interbancaria_candidato" id="clabe_interbancaria_candidato" placeholder="CLABE Interbancaria" autocomplete="off" required value="<?php echo (isset($formArray["clabe_interbancaria_candidato"]))?$formArray["clabe_interbancaria_candidato"]:""; ?>" <?php echo ( in_array('clabe_interbancaria_candidato' , $error_campos) )?"style='border:2px solid red;'":""; ?>>
					    </td>
				    </tr>
				    <tr>
					    <td>Banco</td>
					    <td><input type="text" name="banco_candidato" class="banco_candidato" id="banco_candidato" placeholder="Nombre del banco" autocomplete="off" required value="<?php echo (isset($formArray["banco_candidato"]))?$formArray["banco_candidato"]:""; ?>" <?php echo ( in_array('banco_candidato' , $error_campos) )?"style='border:2px solid red;'":""; ?>></td>
				    </tr>
			    </table>
			    
			    <a class="btnNextFDP" id="btnNextFDP3">Registrar</a>
			    <a class="btnNextFDP" id="btnNextFDP4">Guardar</a>
			    <div style="clear: both;"></div>
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
	    // Change this to the location of your server-side upload handler:
	    var url = window.location.hostname === 'blueimp.github.io' ?
	                '//jquery-file-upload.appspot.com/' : '<?php echo HOME_URL; ?>/candidatos/server/';
	    
	    $('#fileupload1').fileupload({
	        url: url,
	        dataType: 'json',
	        change : function (e, data) {
		        if(data.files.length>=2){
		            alert("1 archivo permitido por selección")
		            return false;
		        }
		    },
	        done: function (e, data) {
	            $.each(data.result.files, function (index, file) {
		            $(".file_1").val(file.name);
	                $('#files1').html( '<a target="_blank" href="'+'<?php echo HOME_URL; ?>tempFDP/files/'+file.name+'">'+ file.name + "</a>");
	            });
	             
	        },
	        progressall: function (e, data) {
	            var progress = parseInt(data.loaded / data.total * 100, 10);
	            $('#progress1 .progress-bar').css(
	                'width',
	                progress + '%'
	            );
	            setInterval(function(){ 
		            $('#progress1 .progress-bar').css(
		                'width',
		                0 + '%'
		            );
	            }, 2000);
	        }
	    }).prop('disabled', !$.support.fileInput)
	        .parent().addClass($.support.fileInput ? undefined : 'disabled');
	        
	    $('#fileupload2').fileupload({
	        url: url,
	        dataType: 'json',
	        change : function (e, data) {
		        if(data.files.length>=2){
		            alert("1 archivo permitido por selección")
		            return false;
		        }
		    },
	        done: function (e, data) {
	            $.each(data.result.files, function (index, file) {
		            $(".file_2").val(file.name);
	                $('#files2').html( '<a target="_blank" href="'+'<?php echo HOME_URL; ?>tempFDP/files/'+file.name+'">'+ file.name + "</a>");
	            });
	        },
	        progressall: function (e, data) {
	            var progress = parseInt(data.loaded / data.total * 100, 10);
	            $('#progress2 .progress-bar').css(
	                'width',
	                progress + '%'
	            );
	            setInterval(function(){ 
		            $('#progress2 .progress-bar').css(
		                'width',
		                0 + '%'
		            );
	            }, 2000);
	        }
	    }).prop('disabled', !$.support.fileInput)
	        .parent().addClass($.support.fileInput ? undefined : 'disabled');
	        
	    $('#fileupload3').fileupload({
	        url: url,
	        dataType: 'json',
	        change : function (e, data) {
		        if(data.files.length>=2){
		            alert("1 archivo permitido por selección")
		            return false;
		        }
		    },
	        done: function (e, data) {
	            $.each(data.result.files, function (index, file) {
		            $(".file_3").val(file.name);
	                $('#files3').html( '<a target="_blank" href="'+'<?php echo HOME_URL; ?>tempFDP/files/'+file.name+'">'+ file.name + "</a>");
	            });
	        },
	        progressall: function (e, data) {
	            var progress = parseInt(data.loaded / data.total * 100, 10);
	            $('#progress3 .progress-bar').css(
	                'width',
	                progress + '%'
	            );
	            setInterval(function(){ 
		            $('#progress3 .progress-bar').css(
		                'width',
		                0 + '%'
		            );
	            }, 2000);
	        }
	    }).prop('disabled', !$.support.fileInput)
	        .parent().addClass($.support.fileInput ? undefined : 'disabled');
	        
	        
	    $('#fileupload4').fileupload({
	        url: url,
	        dataType: 'json',
	        change : function (e, data) {
		        if(data.files.length>=2){
		            alert("1 archivo permitido por selección")
		            return false;
		        }
		    },
	        done: function (e, data) {
	            $.each(data.result.files, function (index, file) {
		            $(".file_4").val(file.name);
	                $('#files4').html( '<a target="_blank" href="'+'<?php echo HOME_URL; ?>tempFDP/files/'+file.name+'">'+ file.name + "</a>");
	            });
	        },
	        progressall: function (e, data) {
	            var progress = parseInt(data.loaded / data.total * 100, 10);
	            $('#progress4 .progress-bar').css(
	                'width',
	                progress + '%'
	            );
	            setInterval(function(){ 
		            $('#progress4 .progress-bar').css(
		                'width',
		                0 + '%'
		            );
	            }, 2000);
	        }
	    }).prop('disabled', !$.support.fileInput)
	        .parent().addClass($.support.fileInput ? undefined : 'disabled');    
	    
	    $('#fileupload5').fileupload({
	        url: url,
	        dataType: 'json',
	        change : function (e, data) {
		        if(data.files.length>=2){
		            alert("1 archivo permitido por selección")
		            return false;
		        }
		    },
	        done: function (e, data) {
	            $.each(data.result.files, function (index, file) {
		            $(".file_5").val(file.name);
	                $('#files5').html( '<a target="_blank" href="'+'<?php echo HOME_URL; ?>tempFDP/files/'+file.name+'">'+ file.name + "</a>");
	            });
	        },
	        progressall: function (e, data) {
	            var progress = parseInt(data.loaded / data.total * 100, 10);
	            $('#progress5 .progress-bar').css(
	                'width',
	                progress + '%'
	            );
	            setInterval(function(){ 
		            $('#progress5 .progress-bar').css(
		                'width',
		                0 + '%'
		            );
	            }, 2000);
	        }
	    }).prop('disabled', !$.support.fileInput)
	        .parent().addClass($.support.fileInput ? undefined : 'disabled'); 
	        
	    $('#fileupload6').fileupload({
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
		            $(".form_fdp_conectxxi").append('<input type="hidden" name="file_6[]" class="file_6" value="'+file.name+'"/>');
	                $('<p/>').html('<a target="_blank" href="'+'<?php echo HOME_URL; ?>tempFDP/files/'+file.name+'">'+ file.name + "</a>").appendTo('#files6');
	            });
	        },
	        progressall: function (e, data) {
	            var progress = parseInt(data.loaded / data.total * 100, 10);
	            $('#progress6 .progress-bar').css(
	                'width',
	                progress + '%'
	            );
	            setInterval(function(){ 
		            $('#progress6 .progress-bar').css(
		                'width',
		                0 + '%'
		            );
	            }, 2000);
	        }
	    }).prop('disabled', !$.support.fileInput)
	        .parent().addClass($.support.fileInput ? undefined : 'disabled'); 
	        
	        
	    $("#cp_candidato").keyup(function() {
			var valor = $('#cp_candidato').val();
			
			if ((valor).length == 5) {
				$("#resultado").html("Procesando, espere por favor...");
				$.post("<?php echo site_url()?>/candidatos/colonia", {
					cp: valor
				}, function(data) {
					$("#colonia_domicilio_candidato").html(data)
				});
				$.post("<?php echo site_url()?>/candidatos/estado", {
					cp: valor
				}, function(estado) {
					$('#estado_domicilio_candidato').html(estado);
				});
				$.post("<?php echo site_url()?>/candidatos/municipio", {
					cp: valor
				}, function(municipio) {
					$('#delegacion_domicilio_candidato').html(municipio);
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
				$.post("<?php echo site_url()?>/candidatos/colonia", {
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
				$.post("<?php echo site_url()?>/candidatos/estado", {
					cp: valorCPCandidato
				}, function(estado) {
					$('#estado_domicilio_candidato').html(estado);
				});
				$.post("<?php echo site_url()?>/candidatos/municipio", {
					cp: valorCPCandidato
				}, function(municipio) {
					$('#delegacion_domicilio_candidato').html(municipio);
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
			
			$(".dependientes_economicos_block").append( '<hr><table class="dep_table" width="100%" cellspacing="0" cellpadding="0" dependiente="'+(numeroTablas + 1 )+'">'+$(".dep_table").html()+"</table>" );
			
			//console.log( tablas.length );
		});
	});
	</script>