	<script type="text/javascript">
    $(document).ready( function() {
      $('#tab-container').easytabs();
      $('#tab-container').bind('easytabs:before', function(evt, tab, panel, data) {
	      $(".step_current").val( $(tab).attr("href").replace("#", ""));
	      
		  return true;
	  });
	  $("#btnMenuPrincipal").click(function(){
	      location.href="<?php echo HOME_URL; ?>/eaf/RecursosHumanos/";
      });
      
      $("#btnAprobarCandidatoRH").click(function(){
	      $(".aprobar_rechazar_rh").val( "aprobar" );
	      if( $(".imagen_fisica_rh_candidato").val() == ""){
		      alert("Favor de seleccionar imagen física");
		      $(".imagen_fisica_rh_candidato").css({ "border" : "2px solid red"  });
	      }else if( $(".cuidado_personal_rh_candidato").val() == "" ){
		      alert("Favor de seleccionar cuidado personal");
		      $(".cuidado_personal_rh_candidato").css({ "border" : "2px solid red"  });
		      
	      }else if( $(".forma_entrar_sentarse_rh_candidato").val() == "" ){
		      alert("Favor de seleccionar la forma de entrar y sentarse");
		      $(".forma_entrar_sentarse_rh_candidato").css({ "border" : "2px solid red"  });
		      
	      }else if( $(".contacto_visual_rh_candidato").val() == "" ){
		      alert("Favor de seleccionar el contacto visual");
		      $(".contacto_visual_rh_candidato").css({ "border" : "2px solid red"  });
		      
	      }else if( $(".tono_volumen_rh_candidato").val() == "" ){
		      alert("Favor de seleccionar el tono, volumen y timbre de voz");
		      $(".tono_volumen_rh_candidato").css({ "border" : "2px solid red"  });
		      
	      }else if( $(".forma_moverse_rh_candidato").val() == "" ){
		      alert("Favor de seleccionar la forma de moverse");
		      $(".forma_moverse_rh_candidato").css({ "border" : "2px solid red"  });
		      
	      }else if( $(".movimientos_brazos_rh_candidato").val() == "" ){
		      alert("Favor de seleccionar movimiento de manos y brazos");
		      $(".movimientos_brazos_rh_candidato").css({ "border" : "2px solid red"  });
		      
	      }else if( $(".forma_saludar_rh_candidato").val() == "" ){
		      alert("Favor de seleccionar la forma de saludar");
		      $(".forma_saludar_rh_candidato").css({ "border" : "2px solid red"  });
		      
	      }else if( $(".forma_sentarse_rh_candidato").val() == "" ){
		      alert("Favor de seleccionar la forma de sentarse");
		      $(".forma_sentarse_rh_candidato").css({ "border" : "2px solid red"  });
		      
	      }else if( $(".gesticulacion_rh_candidato").val() == "" ){
		      alert("Favor de seleccionar la gesticulación");
		      $(".gesticulacion_rh_candidato").css({ "border" : "2px solid red"  });
		      
	      }else if( $(".fluidez_verbal_rh_candidato").val() == "" ){
		      alert("Favor de seleccionar la fluidéz verbal");
		      $(".fluidez_verbal_rh_candidato").css({ "border" : "2px solid red"  });
		      
	      }else if( $(".precision_comunicacion_rh_candidato").val() == "" ){
		      alert("Favor de seleccionar la presición de comunicación");
		      $(".precision_comunicacion_rh_candidato").css({ "border" : "2px solid red"  });
		      
	      }else if( $(".riqueza_vocabulario_rh_candidato").val() == "" ){
		      alert("Favor de seleccionar la riqueza de vocabulario");
		      $(".riqueza_vocabulario_rh_candidato").css({ "border" : "2px solid red"  });
		      
	      }else if( $(".capacidad_sentimientos_rh_candidato").val() == "" ){
		      alert("Favor de seleccionar la capacidad de expresar sentimientos");
		      $(".capacidad_sentimientos_rh_candidato").css({ "border" : "2px solid red"  });
		      
	      }else if( $(".atencion_cliente_rh_candidato").val() == "" ){
		      alert("Favor de seleccionar la atención al cliente");
		      $(".atencion_cliente_rh_candidato").css({ "border" : "2px solid red"  });
		      
	      }else if( $(".persuasivo_rh_candidato").val() == "" ){
		      alert("Favor de seleccionar la persuasividad");
		      $(".persuasivo_rh_candidato").css({ "border" : "2px solid red"  });
		      
	      }else if( $(".trabajo_equipo_rh_candidato").val() == "" ){
		      alert("Favor de seleccionar trabajo en equipo");
		      $(".trabajo_equipo_rh_candidato").css({ "border" : "2px solid red"  });
		      
	      }else if( $(".influencia_negociacion_rh_candidato").val() == "" ){
		      alert("Favor de seleccionar la influencia y negociación");
		      $(".influencia_negociacion_rh_candidato").css({ "border" : "2px solid red"  });
		      
	      }else if( $(".comunicacion_eficaz_rh_candidato").val() == "" ){
		      alert("Favor de seleccionar comunicación eficaz");
		      $(".comunicacion_eficaz_rh_candidato").css({ "border" : "2px solid red"  });
		      
	      }else if( $(".cierre_acuerdos_rh_candidato").val() == "" ){
		      alert("Favor de seleccionar cierre de acuerdos");
		      $(".cierre_acuerdos_rh_candidato").css({ "border" : "2px solid red"  });
		      
	      }else if( $(".fecha_entrevista_rh_fdp").val() == ""){
		      alert("Favor de seleccionar la fecha de entrevista");
			  $(".fecha_entrevista_rh_fdp").css({ "border" : "2px solid red"  });
		  }else{
		      $("#form_recursos_humanos_fdp").submit();
	      }
	      
      });
      
      $("#btnRechazarCandidatoRH").click(function(){
	      $(".aprobar_rechazar_rh").val( "rechazar" );
	      if( $(".imagen_fisica_rh_candidato").val() == ""){
		      alert("Favor de seleccionar imagen física");
		      $(".imagen_fisica_rh_candidato").css({ "border" : "2px solid red"  });
	      }else if( $(".cuidado_personal_rh_candidato").val() == "" ){
		      alert("Favor de seleccionar cuidado personal");
		      $(".cuidado_personal_rh_candidato").css({ "border" : "2px solid red"  });
		      
	      }else if( $(".forma_entrar_sentarse_rh_candidato").val() == "" ){
		      alert("Favor de seleccionar la forma de entrar y sentarse");
		      $(".forma_entrar_sentarse_rh_candidato").css({ "border" : "2px solid red"  });
		      
	      }else if( $(".contacto_visual_rh_candidato").val() == "" ){
		      alert("Favor de seleccionar el contacto visual");
		      $(".contacto_visual_rh_candidato").css({ "border" : "2px solid red"  });
		      
	      }else if( $(".tono_volumen_rh_candidato").val() == "" ){
		      alert("Favor de seleccionar el tono, volumen y timbre de voz");
		      $(".tono_volumen_rh_candidato").css({ "border" : "2px solid red"  });
		      
	      }else if( $(".forma_moverse_rh_candidato").val() == "" ){
		      alert("Favor de seleccionar la forma de moverse");
		      $(".forma_moverse_rh_candidato").css({ "border" : "2px solid red"  });
		      
	      }else if( $(".movimientos_brazos_rh_candidato").val() == "" ){
		      alert("Favor de seleccionar movimiento de manos y brazos");
		      $(".movimientos_brazos_rh_candidato").css({ "border" : "2px solid red"  });
		      
	      }else if( $(".forma_saludar_rh_candidato").val() == "" ){
		      alert("Favor de seleccionar la forma de saludar");
		      $(".forma_saludar_rh_candidato").css({ "border" : "2px solid red"  });
		      
	      }else if( $(".forma_sentarse_rh_candidato").val() == "" ){
		      alert("Favor de seleccionar la forma de sentarse");
		      $(".forma_sentarse_rh_candidato").css({ "border" : "2px solid red"  });
		      
	      }else if( $(".gesticulacion_rh_candidato").val() == "" ){
		      alert("Favor de seleccionar la gesticulación");
		      $(".gesticulacion_rh_candidato").css({ "border" : "2px solid red"  });
		      
	      }else if( $(".fluidez_verbal_rh_candidato").val() == "" ){
		      alert("Favor de seleccionar la fluidéz verbal");
		      $(".fluidez_verbal_rh_candidato").css({ "border" : "2px solid red"  });
		      
	      }else if( $(".precision_comunicacion_rh_candidato").val() == "" ){
		      alert("Favor de seleccionar la presición de comunicación");
		      $(".precision_comunicacion_rh_candidato").css({ "border" : "2px solid red"  });
		      
	      }else if( $(".riqueza_vocabulario_rh_candidato").val() == "" ){
		      alert("Favor de seleccionar la riqueza de vocabulario");
		      $(".riqueza_vocabulario_rh_candidato").css({ "border" : "2px solid red"  });
		      
	      }else if( $(".capacidad_sentimientos_rh_candidato").val() == "" ){
		      alert("Favor de seleccionar la capacidad de expresar sentimientos");
		      $(".capacidad_sentimientos_rh_candidato").css({ "border" : "2px solid red"  });
		      
	      }else if( $(".atencion_cliente_rh_candidato").val() == "" ){
		      alert("Favor de seleccionar la atención al cliente");
		      $(".atencion_cliente_rh_candidato").css({ "border" : "2px solid red"  });
		      
	      }else if( $(".persuasivo_rh_candidato").val() == "" ){
		      alert("Favor de seleccionar la persuasividad");
		      $(".persuasivo_rh_candidato").css({ "border" : "2px solid red"  });
		      
	      }else if( $(".trabajo_equipo_rh_candidato").val() == "" ){
		      alert("Favor de seleccionar trabajo en equipo");
		      $(".trabajo_equipo_rh_candidato").css({ "border" : "2px solid red"  });
		      
	      }else if( $(".influencia_negociacion_rh_candidato").val() == "" ){
		      alert("Favor de seleccionar la influencia y negociación");
		      $(".influencia_negociacion_rh_candidato").css({ "border" : "2px solid red"  });
		      
	      }else if( $(".comunicacion_eficaz_rh_candidato").val() == "" ){
		      alert("Favor de seleccionar comunicación eficaz");
		      $(".comunicacion_eficaz_rh_candidato").css({ "border" : "2px solid red"  });
		      
	      }else if( $(".cierre_acuerdos_rh_candidato").val() == "" ){
		      alert("Favor de seleccionar cierre de acuerdos");
		      $(".cierre_acuerdos_rh_candidato").css({ "border" : "2px solid red"  });
		      
	      }else if( $(".fecha_entrevista_rh_fdp").val() == ""){
		      alert("Favor de seleccionar la fecha de entrevista");
			  $(".fecha_entrevista_rh_fdp").css({ "border" : "2px solid red"  });
		  }else{
		      $("#form_recursos_humanos_fdp").submit();
	      }
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
			    <li class='tab'><a href="#tabs1-paso4" class="step4">Paso 4</a></li>
			    <li class='tab'><a href="#tabs1-paso5" class="step5">Paso 5</a></li>
			    <li class='tab'><a href="#tabs1-paso6" class="step6">Paso 6</a></li>
		  	</ul>
		  	<div class='panel-container'>
		  		
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
			    <p style="color:red;font-weight: bold;margin-bottom: 15px;"><?php echo ( count($error_campos) > 0 )?"Favor de revisar campos obligatorios marcados con rojo":""; ?></p>
			    <table cellpadding="0" cellspacing="0" width="100%">
				    <tr>
					    <td>Nombre (s)</td>
					    <td><input type="text" name="nombre_candidato" style='width:95%;' class="nombre_candidato" id="nombre_candidato" placeholder="Nombre (s)" autocomplete="off" required value="<?php echo (isset($formArray["nombre_candidato"]))?$formArray["nombre_candidato"]:""; ?>" <?php echo ( in_array ('nombre_candidato' , $error_campos) )?"style='border:2px solid red;'":""; ?>></td>
					    <td>Apellido paterno</td>
					    <td><input type="text" name="apellido_paterno_candidato" style='width:95%;' class="apellido_paterno_candidato" id="apellido_paterno_candidato" placeholder="Apellido" autocomplete="off" required value="<?php echo (isset($formArray["apellido_paterno_candidato"]))?$formArray["apellido_paterno_candidato"]:""; ?>" <?php echo ( in_array('apellido_paterno_candidato' , $error_campos) )?"style='border:2px solid red;'":""; ?>></td>
				    </tr>
				    <tr>
					    <td>Apellido materno</td>
					    <td><input type="text" name="apellido_materno_candidato" style='width:95%;' class="apellido_materno_candidato" id="apellido_materno_candidato" placeholder="Apellido" autocomplete="off" required value="<?php echo (isset($formArray["apellido_materno_candidato"]))?$formArray["apellido_materno_candidato"]:""; ?>" <?php echo ( in_array('apellido_materno_candidato' , $error_campos) )?"style='border:2px solid red;'":""; ?>></td>
					    <td>&nbsp;</td>
					    <td>&nbsp;</td>
				    </tr>
			    </table>
			    
			     <h2><label>Información biográfica</label></h2>
			     <table cellpadding="0" cellspacing="0" width="100%">
				     <tr>
					     <td>Fecha de nacimiento</td>
					     <td><input type="text" onfocus="this.blur()" name="fecha_nacimiento_candidato" class="fecha_nacimiento_candidato" id="fecha_nacimiento_candidato" placeholder="dd/mm/YYYY" autocomplete="off" required value="<?php echo (isset($formArray["fecha_nacimiento_candidato"]))?$formArray["fecha_nacimiento_candidato"]:""; ?>" <?php echo ( in_array('fecha_nacimiento_candidato' , $error_campos) )?"style='border:2px solid red;'":""; ?>></td>
					     <td>Nacionalidad</td>
					     <td>
						     <select name="pais_nacimiento_candidato" class="pais_nacimiento_candidato" id="pais_nacimiento_candidato" <?php echo ( in_array('pais_nacimiento_candidato' , $error_campos) )?"style='border:2px solid red;width:60%;'":"style='width:60%;'"; ?>>
							     <option value="">Seleccionar país</option>
							     <option <?php if( isset($formArray["pais_nacimiento_candidato"]) && $formArray["pais_nacimiento_candidato"] == "Mexicana" ): echo "selected='selected'";endif; ?>value="Mexicana">Mexicana</option>
							     <option <?php if( isset($formArray["pais_nacimiento_candidato"]) && $formArray["pais_nacimiento_candidato"] == "Otro" ): echo "selected='selected'";endif; ?> value="Otro">Otro</option>
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
						      <select name="nivel_educativo_candidato" class="nivel_educativo_candidato" id="nivel_educativo_candidato" <?php echo ( in_array('nivel_educativo_candidato' , $error_campos) )?"style='border:2px solid red;'":""; ?>>
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
						   <input type="text" name="profesion" class="profesion" id="profesion" placeholder="Profesión" autocomplete="off" required value="<?php echo (isset($formArray["profesion"]))?$formArray["profesion"]:""; ?>" <?php echo ( in_array('profesion' , $error_campos) )?"style='border:2px solid red;'":""; ?>>  
						   
					      </td>
					  
				     </tr>
			     </table>    
			     
			     <h2><label>Números de identificación y seguro social</label></h2>
			     <table cellpadding="0" cellspacing="0" width="100%">
				     <tr>
					    <td>R.F.C.</td>
					    <td><input type="text" name="rfc_candidato" class="rfc_candidato" id="rfc_candidato" placeholder="R.F.C." autocomplete="off" required value="<?php echo (isset($formArray["rfc_candidato"]))?$formArray["rfc_candidato"]:""; ?>" <?php echo ( in_array('rfc_candidato' , $error_campos) )?"style='border:2px solid red;'":""; ?>>
					    <?php 
						if( in_array('rfc_candidato' , $error_campos) ):
						?>
					    	<p style="color: red;font-weight: bold;margin-top: 5px;margin-bottom: 5px;">Favor de ingresar el R.F.C. válido.</p>
					    <?php 
					    endif;
					    ?>	
					    </td>
					    <td>CURP</td>
					    <td><input type="text" name="curp_candidato" style='width:51%;' class="curp_candidato" id="curp_candidato" placeholder="C.U.R.P." autocomplete="off" required value="<?php echo (isset($formArray["curp_candidato"]))?$formArray["curp_candidato"]:""; ?>" <?php echo ( in_array('curp_candidato' , $error_campos) )?"style='border:2px solid red;'":""; ?>>
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
					    <td><input type="text" name="numero_segurosocial_candidato" class="numero_segurosocial_candidato" id="numero_segurosocial_candidato" placeholder="NSS" autocomplete="off" required value="<?php echo (isset($formArray["numero_segurosocial_candidato"]))?$formArray["numero_segurosocial_candidato"]:""; ?>" <?php echo ( in_array('numero_segurosocial_candidato' , $error_campos) )?"style='border:2px solid red;'":""; ?>>
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
					    <td><input type="text" name="calle_no_candidato" style='width:95%;' class="calle_no_candidato" id="calle_no_candidato" placeholder="Calle y número" autocomplete="off" required value="<?php echo (isset($formArray["calle_no_candidato"]))?$formArray["calle_no_candidato"]:""; ?>" <?php echo ( in_array('calle_no_candidato' , $error_campos) )?"style='border:2px solid red;'":""; ?>></td>
					    <td>Código Postal</td>
					    <td><input type="text" name="cp_candidato" class="cp_candidato" id="cp_candidato" placeholder="C.P." autocomplete="off" required value="<?php echo (isset($formArray["cp_candidato"]))?$formArray["cp_candidato"]:""; ?>" <?php echo ( in_array('cp_candidato' , $error_campos) )?"style='border:2px solid red;'":""; ?>></td>
				    </tr>
				    <tr>
					     <td>Estado</td>
					      <td><input type="text" name="estado_domicilio_candidato" style='width:95%;' class="estado_domicilio_candidato" id="estado_domicilio_candidato" placeholder="Estado" autocomplete="off" required value="<?php echo (isset($formArray["estado_domicilio_candidato"]))?$formArray["estado_domicilio_candidato"]:""; ?>" <?php echo ( in_array('estado_domicilio_candidato' , $error_campos) )?"style='border:2px solid red;'":""; ?>></td>
					    <td>Ciudad</td>
					    <td><input type="text" name="ciudad_domicilio_candidato" style='width:95%;' class="ciudad_domicilio_candidato" id="ciudad_domicilio_candidato" placeholder="Ciudad" autocomplete="off" required value="<?php echo (isset($formArray["ciudad_domicilio_candidato"]))?$formArray["ciudad_domicilio_candidato"]:""; ?>" <?php echo ( in_array('ciudad_domicilio_candidato' , $error_campos) )?"style='border:2px solid red;'":""; ?>></td>
				    </tr>
				    <tr>
					    <td>Municipio o delegación</td>
					  
					     <td><input type="text" name="delegacion_domicilio_candidato" style='width:95%;' class="delegacion_domicilio_candidato" id="delegacion_domicilio_candidato" placeholder="Deleg. o Municipio" autocomplete="off" required value="<?php echo (isset($formArray["delegacion_domicilio_candidato"]))?$formArray["delegacion_domicilio_candidato"]:""; ?>" <?php echo ( in_array('delegacion_domicilio_candidato' , $error_campos) )?"style='border:2px solid red;'":""; ?>></td>
					    
					    <td>Colonia</td>
					   
						
						 <td><input type="text" name="colonia_domicilio_candidato" style='width:95%;' class="colonia_domicilio_candidato" id="colonia_domicilio_candidato" placeholder="Colonia" autocomplete="off" required value="<?php echo (isset($formArray["colonia_domicilio_candidato"]))?$formArray["colonia_domicilio_candidato"]:""; ?>" <?php echo ( in_array('colonia_domicilio_candidato' , $error_campos) )?"style='border:2px solid red;'":""; ?>></td>
					    
				    </tr>
			     </table>
			     
			     <h2><label>Datos de contacto del candidato</label></h2>
			    <table cellpadding="0" cellspacing="0" width="100%">
				    <tr>
					    <td>Número de teléfono de casa</td>
					    <td><input maxlength="12" type="text" name="telefono_casa_candidato" class="telefono_casa_candidato allownumericwithoutdecimal" id="telefono_casa_candidato" placeholder="Tel. casa" autocomplete="off" required value="<?php echo (isset($formArray["telefono_casa_candidato"]))?$formArray["telefono_casa_candidato"]:""; ?>" <?php echo ( in_array('telefono_casa_candidato' , $error_campos) )?"style='border:2px solid red;'":""; ?>> <p style="color:#aba5a5;font-size: 10pt;">10 dígitos. Ejemplo: 55xxxxxxx</p></td>
					    <td>Número de teléfono móvil</td>
					    <td><input type="text" maxlength="10" name="telefono_movil_candidato" class="telefono_movil_candidato allownumericwithoutdecimal" id="telefono_movil_candidato" placeholder="Tel. móvil" autocomplete="off" required value="<?php echo (isset($formArray["telefono_movil_candidato"]))?$formArray["telefono_movil_candidato"]:""; ?>" <?php echo ( in_array('telefono_movil_candidato' , $error_campos) )?"style='border:2px solid red;'":""; ?>><p style="color:#aba5a5;font-size: 10pt;">8 dígitos. Ejemplo: 55xxxxxxxx</p></td>
				    </tr>
				    <tr>
					    <td>Otro número de teléfono</td>
					    <td><input type="text" maxlength="12" name="telefono_otro_candidato" class="telefono_otro_candidato allownumericwithoutdecimal" id="telefono_otro_candidato" placeholder="Otro teléfono" autocomplete="off" required value="<?php echo (isset($formArray["telefono_otro_candidato"]))?$formArray["telefono_otro_candidato"]:""; ?>" <?php echo ( in_array('telefono_otro_candidato' , $error_campos) )?"style='border:2px solid red;'":""; ?>></td>
					    <td>Correo electrónico personal</td>
					    <td><input type="text" name="correo_electronico_candidato" style='width:95%;' class="correo_electronico_candidato" id="correo_electronico_candidato" placeholder="Correo electrónico" autocomplete="off" required value="<?php echo (isset($formArray["correo_electronico_candidato"]))?$formArray["correo_electronico_candidato"]:""; ?>" <?php echo ( in_array('correo_electronico_candidato' , $error_campos) )?"style='border:2px solid red;'":""; ?>>
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
			     
			    
			     <div style="clear: both;"></div>
			    <!-- content -->
			  </div>
			  <!-- End Paso 1 -->
			  
			  <!-- Paso 2 -->
			  <div id="tabs1-paso2">	
  <h2><label>Datos de la vivienda</label> <p align=right >Resultado:<?php echo (isset($formArray["total_amai"]))?$formArray["total_amai"]  :""; ?>    .</p></h2>
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
					<tr>
					
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
					    </td>
					    <td><input type="text" name="egresos_vivienda_candidato" class="egresos_vivienda_candidato allownumericwithdecimal" id="egresos_vivienda_candidato" placeholder="Egresos vivienda" autocomplete="off" required value="<?php echo (isset($formArray["egresos_vivienda_candidato"]))?$formArray["egresos_vivienda_candidato"]:""; ?>" <?php echo ( in_array('egresos_vivienda_candidato' , $error_campos) )?"style='border:2px solid red;'":""; ?>></td>
					</tr>
					
					<tr>
					    <td>
						    Educación
					    </td>
					    <td><input type="text" name="egresos_educacion_candidato" class="egresos_educacion_candidato allownumericwithdecimal" id="egresos_educacion_candidato" placeholder="Egresos educación" autocomplete="off" required value="<?php echo (isset($formArray["egresos_educacion_candidato"]))?$formArray["egresos_educacion_candidato"]:""; ?>" <?php echo ( in_array('egresos_educacion_candidato' , $error_campos) )?"style='border:2px solid red;'":""; ?>></td>
					</tr>
					
					<tr>
					    <td>
						    Alimentación
					    </td>
					    <td><input type="text" name="egresos_alimentacion_candidato" class="egresos_alimentacion_candidato allownumericwithdecimal" id="egresos_alimentacion_candidato" placeholder="Egresos alimentación" autocomplete="off" required value="<?php echo (isset($formArray["egresos_alimentacion_candidato"]))?$formArray["egresos_alimentacion_candidato"]:""; ?>" <?php echo ( in_array('egresos_alimentacion_candidato' , $error_campos) )?"style='border:2px solid red;'":""; ?>></td>
					</tr>
					
					<tr>
					    <td>
						    Recreación
					    </td>
					    <td><input type="text" name="egresos_recreacion_candidato" class="egresos_recreacion_candidato allownumericwithdecimal" id="egresos_recreacion_candidato" placeholder="Egresos recreación" autocomplete="off" required value="<?php echo (isset($formArray["egresos_recreacion_candidato"]))?$formArray["egresos_recreacion_candidato"]:""; ?>" <?php echo ( in_array('egresos_recreacion_candidato' , $error_campos) )?"style='border:2px solid red;'":""; ?>></td>
					</tr>
					
					<tr>
					    <td>
						    Servicios
					    </td>
					    <td><input type="text" name="egresos_servicios_candidato" class="egresos_servicios_candidato allownumericwithdecimal" id="egresos_servicios_candidato" placeholder="Egresos recreación" autocomplete="off" required value="<?php echo (isset($formArray["egresos_servicios_candidato"]))?$formArray["egresos_servicios_candidato"]:""; ?>" <?php echo ( in_array('egresos_servicios_candidato' , $error_campos) )?"style='border:2px solid red;'":""; ?>></td>
					</tr>
					
					<tr>
					    <td>
						    Préstamos o adeudos
					    </td>
					    <td><input type="text" name="egresos_adeudos_candidato" class="egresos_adeudos_candidato allownumericwithdecimal" id="egresos_adeudos_candidato" placeholder="Egresos adeudos" autocomplete="off" required value="<?php echo (isset($formArray["egresos_adeudos_candidato"]))?$formArray["egresos_adeudos_candidato"]:""; ?>" <?php echo ( in_array('egresos_adeudos_candidato' , $error_campos) )?"style='border:2px solid red;'":""; ?>></td>
					</tr>
					
					<tr>
					    <td>
						    Otros
					    </td>
					    <td><input type="text" name="egresos_otros_candidato" class="egresos_otros_candidato allownumericwithdecimal" id="egresos_otros_candidato" placeholder="Egresos otros" autocomplete="off" required value="<?php echo (isset($formArray["egresos_otros_candidato"]))?$formArray["egresos_otros_candidato"]:""; ?>" <?php echo ( in_array('egresos_otros_candidato' , $error_campos) )?"style='border:2px solid red;'":""; ?>></td>
					</tr>
				</table>
				
				
			    <div style="clear: both;"></div>
			  </div>	 	   
			  <!-- End Paso 2 -->
			  
			  <!-- Paso 3 -->
			  <div id="tabs1-paso3">
			    <h2><label>Experiencia Laboral</label></h2>
			    <p style="color:red;font-weight: bold;margin-bottom: 15px;"><?php echo (count($error_campos) > 0)?"Favor de revisar campos obligatorios marcados con rojo":""; ?></p>
			    <table cellpadding="0" cellspacing="0" width="100%">
				    <tr>
					    <td>Puesto Solicitado</td>
					    <td >
					    <select name="puesto_solicitado" class="puesto_solicitado" id="puesto_solicitado" <?php echo ( in_array('puesto_solicitado' , $error_campos) )?"style='border:2px solid red;'":""; ?>>
							   <option value="">Seleccione un puesto</option> 
							   <?php
									  foreach( $CatPuestos as  $per ):
								  
									  $puesto= $per->nombrePuesto;
									  
									  ?>
								  
								  
								  
								  		  <option value="<?php echo $puesto; ?>" <?php if( isset($formArray["puesto_solicitado"]) && $formArray["puesto_solicitado"] == $puesto ): echo "selected='selected'"; endif;?>><?php echo $puesto; ?></option>
								  <?php	  
									  endforeach;
								  ?>
							</select>
							
							  <a  target="_blank" class="btnNextFDP" id="btnPerfil"><i class="glyphicon glyphicon-search"></i> Ver Perfil del Puesto</a>
							
					    </td>
					 
					    
				    </tr>
				    
				      <tr>
					    <td colspan="4">
						    <hr>
					    </td>
				    </tr>
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
					    <td>Inicio de relación laboral</td>
					    <td><input type="text" name="inicio_relacion_empleo1_candidato" onfocus="this.blur()" class="inicio_relacion_empleo1_candidato" id="inicio_relacion_empleo1_candidato" placeholder="Inicio de relación laboral" autocomplete="off" required value="<?php echo (isset($formArray["inicio_relacion_empleo1_candidato"]))?$formArray["inicio_relacion_empleo1_candidato"]:""; ?>" <?php echo ( in_array('inicio_relacion_empleo1_candidato' , $error_campos) )?"style='border:2px solid red;'":""; ?>></td>
				    </tr>
				    <tr>
					    <td>Fin de relación laboral</td>
					    <td><input type="text" name="fin_relacion_empleo1_candidato" onfocus="this.blur()" class="fin_relacion_empleo1_candidato" id="fin_relacion_empleo1_candidato" placeholder="Fin de relación laboral" autocomplete="off" required value="<?php echo (isset($formArray["fin_relacion_empleo1_candidato"]))?$formArray["fin_relacion_empleo1_candidato"]:""; ?>" <?php echo ( in_array('fin_relacion_empleo1_candidato' , $error_campos) )?"style='border:2px solid red;'":""; ?>></td>
				    </tr>
				    <tr>
					    <td>Carta de recomendación</td>
					    <td <?php echo ( in_array('carta_recomendacion_empleo1_candidato' , $error_campos) )?"style='border:2px solid red;'":""; ?>>
						   
						    <!-- The container for the uploaded files -->
						    <div id="files_carta_1" class="files">
							    <?php 
								    if( isset($formArray["carta_recomendacion_empleo1_candidato"]) && $formArray["carta_recomendacion_empleo1_candidato"] != ""):
								    	echo '<a href="'.HOME_URL."candidatosFDP/".$formArray["carta_recomendacion_empleo1_candidato"].'" target="_blank">'.$formArray["carta_recomendacion_empleo1_candidato"].'</a>';
								    	
								    endif;
							    ?>
						    </div>
					    </td>
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
					    <td>Inicio de relación laboral</td>
					    <td><input type="text" name="inicio_relacion_empleo2_candidato" onfocus="this.blur()" class="inicio_relacion_empleo2_candidato" id="inicio_relacion_empleo2_candidato" placeholder="Inicio de relación laboral" autocomplete="off" required value="<?php echo (isset($formArray["inicio_relacion_empleo2_candidato"]))?$formArray["inicio_relacion_empleo2_candidato"]:""; ?>" <?php echo ( in_array('inicio_relacion_empleo2_candidato' , $error_campos) )?"style='border:2px solid red;'":""; ?>></td>
				    </tr>
				    <tr>
					    <td>Fin de relación laboral</td>
					    <td><input type="text" name="fin_relacion_empleo2_candidato" onfocus="this.blur()" class="fin_relacion_empleo2_candidato" id="fin_relacion_empleo2_candidato" placeholder="Fin de relación laboral" autocomplete="off" required value="<?php echo (isset($formArray["fin_relacion_empleo2_candidato"]))?$formArray["fin_relacion_empleo2_candidato"]:""; ?>" <?php echo ( in_array('fin_relacion_empleo2_candidato' , $error_campos) )?"style='border:2px solid red;'":""; ?>></td>
				    </tr>
				    <tr>
					    <td>Carta de recomendación</td>
					    <td <?php echo ( in_array('carta_recomendacion_empleo2_candidato' , $error_campos) )?"style='border:2px solid red;'":""; ?>>
						    
						    <!-- The container for the uploaded files -->
						    <div id="files_carta_2" class="files">
							    <?php 
								    if( isset($formArray["carta_recomendacion_empleo2_candidato"]) && $formArray["carta_recomendacion_empleo2_candidato"] != ""):
								    	echo '<a href="'.HOME_URL."candidatosFDP/".$formArray["carta_recomendacion_empleo2_candidato"].'" target="_blank">'.$formArray["carta_recomendacion_empleo2_candidato"].'</a>';
								    	
								    endif;
							    ?>
						    </div>
					    </td>
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
				    <tr>
					    <td>Inicio de relación laboral</td>
					    <td><input type="text" name="inicio_relacion_empleo3_candidato" onfocus="this.blur()" class="inicio_relacion_empleo3_candidato" id="inicio_relacion_empleo3_candidato" placeholder="Inicio de relación laboral" autocomplete="off" required value="<?php echo (isset($formArray["inicio_relacion_empleo3_candidato"]))?$formArray["inicio_relacion_empleo3_candidato"]:""; ?>" <?php echo ( in_array('inicio_relacion_empleo3_candidato' , $error_campos) )?"style='border:2px solid red;'":""; ?>></td>
				    </tr>
				    <tr>
					    <td>Fin de relación laboral</td>
					    <td><input type="text" name="fin_relacion_empleo3_candidato" onfocus="this.blur()" class="fin_relacion_empleo3_candidato" id="fin_relacion_empleo3_candidato" placeholder="Fin de relación laboral" autocomplete="off" required value="<?php echo (isset($formArray["fin_relacion_empleo3_candidato"]))?$formArray["fin_relacion_empleo3_candidato"]:""; ?>" <?php echo ( in_array('fin_relacion_empleo3_candidato' , $error_campos) )?"style='border:2px solid red;'":""; ?>></td>
				    </tr>
				    <tr>
					    <td>Carta de recomendación</td>
					    <td <?php echo ( in_array('carta_recomendacion_empleo3_candidato' , $error_campos) )?"style='border:2px solid red;'":""; ?>>
						    
						    <!-- The container for the uploaded files -->
						    <div id="files_carta_3" class="files">
							    <?php 
								    if( isset($formArray["carta_recomendacion_empleo3_candidato"]) && $formArray["carta_recomendacion_empleo3_candidato"] != ""):
								    	echo '<a href="'.HOME_URL."candidatosFDP/".$formArray["carta_recomendacion_empleo3_candidato"].'" target="_blank">'.$formArray["carta_recomendacion_empleo3_candidato"].'</a>';
								    	
								    endif;
							    ?>
						    </div>
					    </td>
				    </tr>
			    </table>
				
			   
			    <div style="clear: both;"></div>
			    <!-- content -->
			  </div>
			  <!-- End Paso 3 -->
			  
			  <!-- Paso 4 -->
			  <div id="tabs1-paso4">
			    <h2><label>Familiares y/ conocidos en la empresa</label></h2>
			    <p style="color:red;font-weight: bold;margin-bottom: 15px;"><?php echo (count($error_campos) > 0)?"Favor de revisar campos obligatorios marcados con rojo":""; ?></p>
			    <table cellpadding="0" cellspacing="0" width="100%">
				    <tr>
					    <td>Nombre completo</td>
					    <td><input type="text" name="nombre_completo_familiar_candidato" style='width:95%;' class="nombre_completo_familiar_candidato" id="nombre_completo_familiar_candidato" placeholder="Nombre completo de familiar" autocomplete="off" required value="<?php echo (isset($formArray["nombre_completo_familiar_candidato"]))?$formArray["nombre_completo_familiar_candidato"]:""; ?>" <?php echo ( in_array('nombre_completo_familiar_candidato' , $error_campos) )?"style='border:2px solid red;'":""; ?>></td>
					    
					   <td>Relación con el empleado</td>
					   <td>
						    <select name="parentesco_familiar_candidato" class="parentesco_familiar_candidato" id="parentesco_familiar_candidato" <?php echo ( in_array('parentesco_familiar_candidato' , $error_campos) )?"style='border:2px solid red;'":""; ?>>
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
					   <td><input type="text" name="nombre_contacto_emergencia_candidato" style='width:95%;' class="nombre_contacto_emergencia_candidato" id="nombre_contacto_emergencia_candidato" placeholder="Nombre" autocomplete="off" required value="<?php echo (isset($formArray["nombre_contacto_emergencia_candidato"]))?$formArray["nombre_contacto_emergencia_candidato"]:""; ?>" <?php echo ( in_array('nombre_contacto_emergencia_candidato' , $error_campos) )?"style='border:2px solid red;'":""; ?>></td>
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
					   <td>Número teléfono de casa</td>
					   <td><input type="text" name="telefono_casa_emergencia_candidato" class="telefono_casa_emergencia_candidato" id="telefono_casa_emergencia_candidato" placeholder="Teléfono casa" autocomplete="off" required value="<?php echo (isset($formArray["telefono_casa_emergencia_candidato"]))?$formArray["telefono_casa_emergencia_candidato"]:""; ?>" <?php echo ( in_array('telefono_casa_emergencia_candidato' , $error_campos) )?"style='border:2px solid red;'":""; ?>></td>
					   <td>Número teléfono móvil</td>
					   <td>
						   <input type="text" name="telefono_movil_emergencia_candidato" class="telefono_movil_emergencia_candidato" id="telefono_movil_emergencia_candidato" placeholder="Teléfono móvil" autocomplete="off" required value="<?php echo (isset($formArray["telefono_movil_emergencia_candidato"]))?$formArray["telefono_movil_emergencia_candidato"]:""; ?>" <?php echo ( in_array('telefono_movil_emergencia_candidato' , $error_campos) )?"style='border:2px solid red;'":""; ?>>
					   </td>
				   </tr>
			    </table>  
			    
			    
			    
			    <div style="clear: both;"></div>
			  </div>
			  <!-- End Paso 4 -->
			  
			  
			  <!-- Paso 5 -->
			  <div id="tabs1-paso5">
				  <?php if($_REQUEST["reclutamiento"]): ?>
				  	<p style="font-weight: bold; text-align: center;font-size: 13pt; color: #00db05">Datos guardados del Candidato.</p>
				  <?php endif; ?>
				  
				  <?php if(isset( $error_reclutamiento )): ?>
				  	<p style="font-weight: bold; text-align: center;font-size: 13pt; color: #ff0000;"><?php echo $error_reclutamiento; ?></p>
				  <?php endif; ?>
				  
				  <?php 
					  if( isset($reclutamientoFDP["estatusReclutamientoFDP"]) ):
				  ?>
				  	<h2><label>Estatus de candidato</label></h2>
				  	<table cellpadding="0" cellspacing="0" width="100%">
					  <tr>
						  <td>Estatus:</td>
						  <td><strong>
							  <?php 
								  if( $reclutamientoFDP["estatusReclutamientoFDP"] == "aprobado" ):
								  	echo "Aprobado";
								  else:
								  	echo "Rechazado";
								  endif;
							  ?></strong>
							   
						  </td>
					  </tr>
					  <tr>
						  <td>Aprobado por :</td>
						  <td><strong>
							  <?php 
								  echo $nombreUsuarioAprueba;
							  ?></strong>
							   
						  </td>
					  </tr>
					  <tr>
						  <td>Fecha de aprobación :</td>
						  <td><strong>
							  <?php 
								  echo $reclutamientoFDP["fechaAprobacion"];
							  ?></strong>
							   
						  </td>
					  </tr>
				  	</table>
				  <?php endif; ?>
				  
				  <h2><label>Perfil del candidato</label></h2>  
				  
				  <table cellpadding="0" cellspacing="0" width="100%">
					  <tr>
						  <td>Vacante a participar</td>
						  <td>
							  <select name="vacante_participar" class="vacante_participar" id="vacante_participar">
								  <option value="">Seleccionar vacante</option>
								  <?php 
									  if( !empty($peticionesVacantes) ):
									  	
									  	foreach( $peticionesVacantes as $vacante ):
									  		$selectVacante = ( isset($reclutamientoFDP["idVacantesPeticiones"]) && $reclutamientoFDP["idVacantesPeticiones"] == $vacante["idVacantesPeticiones"] )?" selected ":"";
									  		echo "<option ".$selectVacante." value='".$vacante["idVacantesPeticiones"]."'>".$vacante["nombrePuesto"]." - ".$vacante["nombreUsuario"]."</option>";
									  	endforeach;
									  endif;
								  ?>
							  </select>
						  </td>
					  </tr>
					  <tr>
						  <td>Perfil</td>
						  <td>
							  <select name="perfil_candidato_reclutamiento" id="perfil_candidato_reclutamiento" class="perfil_candidato_reclutamiento">
								  <option value="">Selecciona perfil</option>
								  <?php
									  foreach( $Catalogos as  $per ):
								  
									  if($per->ObjetosNombre=='perfil_candidato_reclutamiento')
									  {
									  $valor= $per->valor;
									  $parametro =$per->parametro;
									  
									  ?>
								  
								    <option value="<?php echo $parametro; ?>" <?php if( isset($reclutamientoFDP["perfilCandidato"]) && $reclutamientoFDP["perfilCandidato"] == $parametro ): echo "selected='selected'"; endif;?>><?php echo $valor; ?></option>
								  
								  		 
								  <?php
									  }
									 
									  endforeach;
								  ?>
							  </select>
							  
						  </td>
						  
					  </tr>
				  </table>
				  
				  <h2><label>Resultados de examenes</label></h2>
				  <table cellpadding="0" cellspacing="0" width="100%">
					  <tr>
						  <td>
							  Evaluación
						  </td>
						  <td>
							  <select name="evaluacion_candidato_reclutamiento" id="evaluacion_candidato_reclutamiento" style="width: 36%;" class="evaluacion_candidato_reclutamiento">
								  <option value="">Selecciona evaluación</option>
								  
								   <?php
									  foreach( $Catalogos as  $per ):
								  
									  if($per->ObjetosNombre=='evaluacion_candidato_reclutamiento')
									  {
									  $valor= $per->valor;
									  $parametro =$per->parametro;
									  
									  ?>
								  
								    <option value="<?php echo $parametro; ?>" <?php if( isset($reclutamientoFDP["evaluacionRazonamiento"]) && $reclutamientoFDP["evaluacionRazonamiento"] == $parametro ): echo "selected='selected'"; endif;?>><?php echo $valor; ?></option>
								  
								  		 
								  <?php
									  }
									 
									  endforeach;
								  ?>
								  
								  
								  
							  </select>
						  </td>
					  </tr>
					  
					  <tr>
						  <td>
							  Valores evaluación
						  </td>
						  <td>
							  <select name="valores_evaluacion_candidato_reclutamiento" id="valores_evaluacion_candidato_reclutamiento" style="width: 36%;" class="valores_evaluacion_candidato_reclutamiento">
								  <option value="">Selecciona valor</option>
								  
								  
								  <?php
									  foreach( $Catalogos as  $per ):
								  
									  if($per->ObjetosNombre=='valores_evaluacion_candidato_reclutamiento')
									  {
									  $valor= $per->valor;
									  $parametro =$per->parametro;
									  
									  ?>
								  
								    <option value="<?php echo $parametro; ?>" <?php if( isset($reclutamientoFDP["puntajeEvaluacionRazonamiento"]) && $reclutamientoFDP["puntajeEvaluacionRazonamiento"] == $parametro ): echo "selected='selected'"; endif;?>><?php echo $valor; ?></option>
								  
								  		 
								  <?php
									  }
									 
									  endforeach;
								  ?>
								  
								  
								
							  </select>
						  </td>
					  </tr>
					  
					  <tr>
						  <td>
							  Escala de evaluación
						  </td>
						  <td>
							  <select name="escala_evaluacion_candidato_reclutamiento" id="escala_evaluacion_candidato_reclutamiento" style="width: 36%;" class="escala_evaluacion_candidato_reclutamiento">
								  <option value="">Selecciona escala</option>
								  
								   <?php
									  foreach( $Catalogos as  $per ):
								  
									  if($per->ObjetosNombre=='escala_evaluacion_candidato_reclutamiento')
									  {
									  $valor= $per->valor;
									  $parametro =$per->parametro;
									  
									  ?>
								  
								    <option value="<?php echo $parametro; ?>" <?php if( isset($reclutamientoFDP["escalaValoresEvaluacionRazonamiento"]) && $reclutamientoFDP["escalaValoresEvaluacionRazonamiento"] == $parametro ): echo "selected='selected'"; endif;?>><?php echo $valor; ?></option>
								  
								  		 
								  <?php
									  }
									 
									  endforeach;
								  ?>
								  
								
							  </select>
						  </td>
					  </tr>
					  
					  <tr>
						  <td>Fecha de entrevista</td>
						  <td>
							  <input type="text" name="fecha_entrevista_candidato_reclutamiento" id="fecha_entrevista_candidato_reclutamiento" class="fecha_entrevista_candidato_reclutamiento" onfocus="this.blur()" value="<?php if( isset( $reclutamientoFDP["fechaEntrevista"] )): echo $reclutamientoFDP["fechaEntrevista"]; endif;?>"/>  
						  </td>
					  </tr>
				  </table>
				  <h2>Comentarios reclutador</h2>
				  <table cellpadding="0" cellspacing="0" width="100%">
					  <tr>
						  <td style="text-align: center;">
							  <textarea placeholder="Comentarios de reclutador" class="comentarios_candidato_reclutamiento" id="comentarios_candidato_reclutamiento" name="comentarios_candidato_reclutamiento"><?php if( isset( $reclutamientoFDP["comentariosReclutador"] )): echo $reclutamientoFDP["comentariosReclutador"]; endif;?></textarea>
						  </td>
					  </tr>
				  </table>
				  	
				  
				  <div style="clear:both"></div>
			  </div>	  
			 
			 
			 <!-- Paso 6 -->
			  <div id="tabs1-paso6">
				  <form class="form_recursos_humanos_fdp" name="form_recursos_humanos_fdp" id="form_recursos_humanos_fdp" method="post">
				  <h2><label>Estatus de aprobación</label></h2>
				  <p style="color:red;font-weight: bold;margin-bottom: 15px;">
					  <?php
						if( !empty($errorMensajes) ):
							foreach($errorMensajes as $err):
								echo $err."<br/>";
							endforeach;
						endif;  
					  ?>
				  </p>
				  
				  <p style="color:#03a647;font-weight: bold;margin-bottom: 15px;">
					  <?php
						  if( isset($_GET["registroRH"]) ):
						  
						  	echo "Datos guardados con éxito";
						  endif;
					  ?>
				  </p>
				  <table cellpadding="0" cellspacing="0" width="50%">
					<tr>
						<td>Fecha de entrevista</td>
						<td><input type="text" onfocus="this.blur();" name="fecha_entrevista_rh_fdp" class="fecha_entrevista_rh_fdp" id="fecha_entrevista_rh_fdp" value="<?php if( isset( $arrayFields["fecha_entrevista_rh_fdp"] ) ): echo $arrayFields["fecha_entrevista_rh_fdp"]; endif; ?>" <?php if( in_array("fecha_entrevista_rh_fdp", $$arrayErrorFields) ): echo 'style="border:2px solid red;"'; endif; ?>/></td>
					</tr>
				  	<tr>
					  	<td>Aprobación Recursos Humanos:</td>
					  	<td>
						  	
						  	<strong>
						  		<?php 
						  			if( isset($aprobacionRH["nombreRecursosHumanosFDP"]) ): 
						  				
						  				echo $aprobacionRH["nombreRecursosHumanosFDP"]." - ";
						  				echo ( $aprobacionRH["estatusRecursosHumanosFDP"] == "aprobado" )?"Aprobado - ":"Rechazado - ";
						  				echo "<br/>".$aprobacionRH["fechaAprobacionRecursosHumanos"];
						  			endif; ?>
						  	</strong>
						</td>
					  	
				  	</tr>
				  	<tr>
					  	<td>Aprobación Gerente:</td>
					  	<td>
						  	<select name="aprobacion_gerente_rh_fdp">
							  	<option value="">Seleccionar gerente</option>
							  	<?php 
								  	if( isset( $gerentesSegundaEntrevista ) ):
								  		if( !empty($gerentesSegundaEntrevista) ):
								  			foreach($gerentesSegundaEntrevista as $gerente):
								  				$selected = ( $aprobacionDirector["idUsuariosAprobacionGerente"] == $gerente["idUsuarios"])?" selected ":"";
								  				echo '<option value="'.$gerente["idUsuarios"].'"'.$selected.'>'.$gerente["nombreGerente"].'</option>';
								  			endforeach;
								  		endif;
								  	endif;
							  	?>
						  	</select>
						  	<br/>
						  	<strong>
						  		<?php 
						  			if( isset($aprobacionDirector["nombreRecursosHumanosFDP"]) ): 
						  				
						  				
						  				echo ( $aprobacionDirector["estatusGerenteFDP"] == "aprobado" )?"Aprobado - ":"Rechazado - ";
						  				echo "<br/>".$aprobacionDirector["fechaAprobacionGerente"];
						  			endif; ?>
						  	</strong>
					  	</td>
					  	
				  	</tr>
				  </table>
			<!-- 	  
				  <h2><label>Gerente</label></h2>
				  <table cellpadding="0" cellspacing="0" width="100%">
				  	<tr>
					  	<td>Gerente:</td>
					  	<td><strong><?php echo $nombreGerente; ?></strong></td>
				  	</tr>
				  </table>
				  -->
				  <h2><label>Elementos de presentación y aspecto físico</label></h2>
				  <table cellpadding="0" cellspacing="0" width="100%">
					  <tr>
						  <td>Imagen física</td>
						  <td>
							  <select name="imagen_fisica_rh_candidato" class="imagen_fisica_rh_candidato" id="imagen_fisica_rh_candidato" <?php if( in_array("imagen_fisica_rh_candidato", $$arrayErrorFields) ): echo 'style="border:2px solid red;"'; endif; ?>>
								  <option value="">Selecciona calificación</option>
								  <?php 
									  $calificaciones = $LibCat->rhValoresEntrevista();
									  foreach( $calificaciones as $key => $cal ):
								  ?>
								  		<option <?php if( isset( $arrayFields["imagen_fisica_rh_candidato"] ) && $arrayFields["imagen_fisica_rh_candidato"] == $key ): echo "selected "; endif; ?> value="<?php echo $key; ?>"><?php echo $cal; ?></option>
								  <?php
									  endforeach;
								  ?>
							  </select>	  
						  </td>
						  <td>Forma de entrar y de sentarse</td>
						  <td>
							  <select name="forma_entrar_sentarse_rh_candidato" class="forma_entrar_sentarse_rh_candidato" id="forma_entrar_sentarse_rh_candidato" <?php if( in_array("forma_entrar_sentarse_rh_candidato", $$arrayErrorFields) ): echo 'style="border:2px solid red;"'; endif; ?>>
								  <option value="">Selecciona calificación</option>
								  <?php 
									  $calificaciones = $LibCat->rhValoresEntrevista();
									  foreach( $calificaciones as $key => $cal ):
								  ?>
								  		<option  <?php if( isset( $arrayFields["forma_entrar_sentarse_rh_candidato"] ) && $arrayFields["forma_entrar_sentarse_rh_candidato"] == $key ): echo "selected "; endif; ?>  value="<?php echo $key; ?>"><?php echo $cal; ?></option>
								  <?php
									  endforeach;
								  ?>
							  </select>	  
						  </td>
					  </tr>
					  
					  <tr>
						  <td>Cuidado personal</td>
						  <td>
							  <select name="cuidado_personal_rh_candidato" class="cuidado_personal_rh_candidato" id="cuidado_personal_rh_candidato" <?php if( in_array("cuidado_personal_rh_candidato", $$arrayErrorFields) ): echo 'style="border:2px solid red;"'; endif; ?>>
								  <option value="">Selecciona calificación</option>
								  <?php 
									  $calificaciones = $LibCat->rhValoresEntrevista();
									  foreach( $calificaciones as $key => $cal ):
								  ?>
								  		<option <?php if( isset( $arrayFields["cuidado_personal_rh_candidato"] ) && $arrayFields["cuidado_personal_rh_candidato"] == $key ): echo "selected "; endif; ?> value="<?php echo $key; ?>"><?php echo $cal; ?></option>
								  <?php
									  endforeach;
								  ?>
							  </select>
						  </td>
					  </tr>
				  </table>
				  
				  <h2><label>Comunicación no verbal a lo largo de la entrevista</label></h2>
				  <table cellpadding="0" cellspacing="0" width="100%">
					  <tr>
						  <td>Contacto visual</td>
						  <td>
							  <select name="contacto_visual_rh_candidato" class="contacto_visual_rh_candidato" id="contacto_visual_rh_candidato" <?php if( in_array("contacto_visual_rh_candidato", $$arrayErrorFields) ): echo 'style="border:2px solid red;"'; endif; ?>>
								  <option value="">Selecciona calificación</option>
								  <?php 
									  $calificaciones = $LibCat->rhValoresEntrevista();
									  foreach( $calificaciones as $key => $cal ):
								  ?>
								  		<option <?php if( isset( $arrayFields["contacto_visual_rh_candidato"] ) && $arrayFields["contacto_visual_rh_candidato"] == $key ): echo "selected "; endif; ?> value="<?php echo $key; ?>"><?php echo $cal; ?></option>
								  <?php
									  endforeach;
								  ?>
							  </select>
						  </td>
						  <td>Forma de saludar</td>
						  <td>
							  <select name="forma_saludar_rh_candidato" class="forma_saludar_rh_candidato" id="forma_saludar_rh_candidato" <?php if( in_array("forma_saludar_rh_candidato", $$arrayErrorFields) ): echo 'style="border:2px solid red;"'; endif; ?>>
								  <option value="">Selecciona calificación</option>
								  <?php 
									  $calificaciones = $LibCat->rhValoresEntrevista();
									  foreach( $calificaciones as $key => $cal ):
								  ?>
								  		<option <?php if( isset( $arrayFields["forma_saludar_rh_candidato"] ) && $arrayFields["forma_saludar_rh_candidato"] == $key ): echo "selected "; endif; ?> value="<?php echo $key; ?>"><?php echo $cal; ?></option>
								  <?php
									  endforeach;
								  ?>
							  </select>
						  </td>
					  </tr>
					  
					  <tr>
						  <td>Tono, volumen y timbre de voz</td>
						  <td>
							 <select name="tono_volumen_rh_candidato" class="tono_volumen_rh_candidato" id="tono_volumen_rh_candidato" <?php if( in_array("tono_volumen_rh_candidato", $$arrayErrorFields) ): echo 'style="border:2px solid red;"'; endif; ?>>
								  <option value="">Selecciona calificación</option>
								  <?php 
									  $calificaciones = $LibCat->rhValoresEntrevista();
									  foreach( $calificaciones as $key => $cal ):
								  ?>
								  		<option <?php if( isset( $arrayFields["tono_volumen_rh_candidato"] ) && $arrayFields["tono_volumen_rh_candidato"] == $key ): echo "selected "; endif; ?>  value="<?php echo $key; ?>"><?php echo $cal; ?></option>
								  <?php
									  endforeach;
								  ?>
							  </select> 
						  </td>
						  <td>Forma de sentarse</td>
						  <td>
							  <select name="forma_sentarse_rh_candidato" class="forma_sentarse_rh_candidato" id="forma_sentarse_rh_candidato" <?php if( in_array("forma_sentarse_rh_candidato", $$arrayErrorFields) ): echo 'style="border:2px solid red;"'; endif; ?>>
								  <option value="">Selecciona calificación</option>
								  <?php 
									  $calificaciones = $LibCat->rhValoresEntrevista();
									  foreach( $calificaciones as $key => $cal ):
								  ?>
								  		<option <?php if( isset( $arrayFields["forma_sentarse_rh_candidato"] ) && $arrayFields["forma_sentarse_rh_candidato"] == $key ): echo "selected "; endif; ?> value="<?php echo $key; ?>"><?php echo $cal; ?></option>
								  <?php
									  endforeach;
								  ?>
							  </select> 
						  </td>
					  </tr>
					  <tr>
						  <td>Forma de moverse</td>
						  <td>
							  <select name="forma_moverse_rh_candidato" class="forma_moverse_rh_candidato" id="forma_moverse_rh_candidato" <?php if( in_array("forma_moverse_rh_candidato", $$arrayErrorFields) ): echo 'style="border:2px solid red;"'; endif; ?>>
								  <option value="">Selecciona calificación</option>
								  <?php 
									  $calificaciones = $LibCat->rhValoresEntrevista();
									  foreach( $calificaciones as $key => $cal ):
								  ?>
								  		<option <?php if( isset( $arrayFields["forma_moverse_rh_candidato"] ) && $arrayFields["forma_moverse_rh_candidato"] == $key ): echo "selected "; endif; ?> value="<?php echo $key; ?>"><?php echo $cal; ?></option>
								  <?php
									  endforeach;
								  ?>
							  </select>
						  </td>
						  <td>Gesticulacioón</td>
						  <td>
							  <select name="gesticulacion_rh_candidato" class="gesticulacion_rh_candidato" id="gesticulacion_rh_candidato" <?php if( in_array("gesticulacion_rh_candidato", $$arrayErrorFields) ): echo 'style="border:2px solid red;"'; endif; ?>>
								  <option value="">Selecciona calificación</option>
								  <?php 
									  $calificaciones = $LibCat->rhValoresEntrevista();
									  foreach( $calificaciones as $key => $cal ):
								  ?>
								  		<option <?php if( isset( $arrayFields["gesticulacion_rh_candidato"] ) && $arrayFields["gesticulacion_rh_candidato"] == $key ): echo "selected "; endif; ?> value="<?php echo $key; ?>"><?php echo $cal; ?></option>
								  <?php
									  endforeach;
								  ?>
							  </select>
						  </td>
					  </tr>
					  <tr>
						  <td>Movimiento manos y brazos</td>
						  <td>
							  <select name="movimientos_brazos_rh_candidato" class="movimientos_brazos_rh_candidato" id="movimientos_brazos_rh_candidato" <?php if( in_array("movimientos_brazos_rh_candidato", $$arrayErrorFields) ): echo 'style="border:2px solid red;"'; endif; ?>>
								  <option value="">Selecciona calificación</option>
								  <?php 
									  $calificaciones = $LibCat->rhValoresEntrevista();
									  foreach( $calificaciones as $key => $cal ):
								  ?>
								  		<option <?php if( isset( $arrayFields["movimientos_brazos_rh_candidato"] ) && $arrayFields["movimientos_brazos_rh_candidato"] == $key ): echo "selected "; endif; ?>  value="<?php echo $key; ?>"><?php echo $cal; ?></option>
								  <?php
									  endforeach;
								  ?>
							  </select>
						  </td>
					  </tr>
				  </table>	
				  
				  <h2><label>Comunicación verbal a lo largo de la entrevista</label></h2>
				  <table cellpadding="0" cellspacing="0" width="100%">
					  <tr>
						  <td>Fluidéz verbal</td>
						  <td>
							  <select name="fluidez_verbal_rh_candidato" class="fluidez_verbal_rh_candidato" id="fluidez_verbal_rh_candidato" <?php if( in_array("fluidez_verbal_rh_candidato", $$arrayErrorFields) ): echo 'style="border:2px solid red;"'; endif; ?>>
								  <option value="">Selecciona calificación</option>
								  <?php 
									  $calificaciones = $LibCat->rhValoresEntrevista();
									  foreach( $calificaciones as $key => $cal ):
								  ?>
								  		<option <?php if( isset( $arrayFields["fluidez_verbal_rh_candidato"] ) && $arrayFields["fluidez_verbal_rh_candidato"] == $key ): echo "selected "; endif; ?> value="<?php echo $key; ?>"><?php echo $cal; ?></option>
								  <?php
									  endforeach;
								  ?>
							  </select>
						  </td>
						  <td>Riqueza de vocabulario</td>
						  <td>
							  <select name="riqueza_vocabulario_rh_candidato" class="riqueza_vocabulario_rh_candidato" id="riqueza_vocabulario_rh_candidato" <?php if( in_array("riqueza_vocabulario_rh_candidato", $$arrayErrorFields) ): echo 'style="border:2px solid red;"'; endif; ?>>
								  <option value="">Selecciona calificación</option>
								  <?php 
									  $calificaciones = $LibCat->rhValoresEntrevista();
									  foreach( $calificaciones as $key => $cal ):
								  ?>
								  		<option <?php if( isset( $arrayFields["riqueza_vocabulario_rh_candidato"] ) && $arrayFields["riqueza_vocabulario_rh_candidato"] == $key ): echo "selected "; endif; ?> value="<?php echo $key; ?>"><?php echo $cal; ?></option>
								  <?php
									  endforeach;
								  ?>
							  </select>
						  </td>
					  </tr>
					  <tr>
						  <td>Precisioón de la comunicacioón</td>
						  <td>
							  <select name="precision_comunicacion_rh_candidato" class="precision_comunicacion_rh_candidato" id="precision_comunicacion_rh_candidato" <?php if( in_array("precision_comunicacion_rh_candidato", $$arrayErrorFields) ): echo 'style="border:2px solid red;"'; endif; ?>>
								  <option value="">Selecciona calificación</option>
								  <?php 
									  $calificaciones = $LibCat->rhValoresEntrevista();
									  foreach( $calificaciones as $key => $cal ):
								  ?>
								  		<option <?php if( isset( $arrayFields["precision_comunicacion_rh_candidato"] ) && $arrayFields["precision_comunicacion_rh_candidato"] == $key ): echo "selected "; endif; ?> value="<?php echo $key; ?>"><?php echo $cal; ?></option>
								  <?php
									  endforeach;
								  ?>
							  </select>
						  </td>
						  <td>Capacidad para expresar sentimientos</td>
						  <td>
							  <select name="capacidad_sentimientos_rh_candidato" class="capacidad_sentimientos_rh_candidato" id="capacidad_sentimientos_rh_candidato" <?php if( in_array("capacidad_sentimientos_rh_candidato", $$arrayErrorFields) ): echo 'style="border:2px solid red;"'; endif; ?>>
								  <option value="">Selecciona calificación</option>
								  <?php 
									  $calificaciones = $LibCat->rhValoresEntrevista();
									  foreach( $calificaciones as $key => $cal ):
								  ?>
								  		<option <?php if( isset( $arrayFields["capacidad_sentimientos_rh_candidato"] ) && $arrayFields["capacidad_sentimientos_rh_candidato"] == $key ): echo "selected "; endif; ?> value="<?php echo $key; ?>"><?php echo $cal; ?></option>
								  <?php
									  endforeach;
								  ?>
							  </select>
						  </td>
					  </tr>
				  </table>  
				  
				  <h2><label>Competencias generales del perfil del asesor telefónico</label></h2>
				  <table cellpadding="0" cellspacing="0" width="100%">
					  <tr>
						  <td>Atencioón al cliente</td>
						  <td>
							  <select name="atencion_cliente_rh_candidato" class="atencion_cliente_rh_candidato" id="atencion_cliente_rh_candidato" <?php if( in_array("atencion_cliente_rh_candidato", $$arrayErrorFields) ): echo 'style="border:2px solid red;"'; endif; ?>>
								  <option value="">Selecciona calificación</option>
								  <?php 
									  $calificaciones = $LibCat->rhValoresEntrevista();
									  foreach( $calificaciones as $key => $cal ):
								  ?>
								  		<option <?php if( isset( $arrayFields["atencion_cliente_rh_candidato"] ) && $arrayFields["atencion_cliente_rh_candidato"] == $key ): echo "selected "; endif; ?> value="<?php echo $key; ?>"><?php echo $cal; ?></option>
								  <?php
									  endforeach;
								  ?>
							  </select>
						  </td>
						  <td>Influencia y negociacioón</td>
						  <td>
							  <select name="influencia_negociacion_rh_candidato" class="influencia_negociacion_rh_candidato" id="influencia_negociacion_rh_candidato" <?php if( in_array("influencia_negociacion_rh_candidato", $$arrayErrorFields) ): echo 'style="border:2px solid red;"'; endif; ?>>
								  <option value="">Selecciona calificación</option>
								  <?php 
									  $calificaciones = $LibCat->rhValoresEntrevista();
									  foreach( $calificaciones as $key => $cal ):
								  ?>
								  		<option <?php if( isset( $arrayFields["influencia_negociacion_rh_candidato"] ) && $arrayFields["influencia_negociacion_rh_candidato"] == $key ): echo "selected "; endif; ?> value="<?php echo $key; ?>"><?php echo $cal; ?></option>
								  <?php
									  endforeach;
								  ?>
							  </select>
						  </td>
					  </tr>
					  <tr>
						  <td>Persuasivo</td>
						  <td>
							  <select name="persuasivo_rh_candidato" class="persuasivo_rh_candidato" id="persuasivo_rh_candidato" <?php if( in_array("persuasivo_rh_candidato", $$arrayErrorFields) ): echo 'style="border:2px solid red;"'; endif; ?>>
								  <option value="">Selecciona calificación</option>
								  <?php 
									  $calificaciones = $LibCat->rhValoresEntrevista();
									  foreach( $calificaciones as $key => $cal ):
								  ?>
								  		<option <?php if( isset( $arrayFields["persuasivo_rh_candidato"] ) && $arrayFields["persuasivo_rh_candidato"] == $key ): echo "selected "; endif; ?> value="<?php echo $key; ?>"><?php echo $cal; ?></option>
								  <?php
									  endforeach;
								  ?>
							  </select>
						  </td>
						  <td>Comunicacioón eficaz</td>
						  <td>
							  <select name="comunicacion_eficaz_rh_candidato" class="comunicacion_eficaz_rh_candidato" id="comunicacion_eficaz_rh_candidato" <?php if( in_array("comunicacion_eficaz_rh_candidato", $$arrayErrorFields) ): echo 'style="border:2px solid red;"'; endif; ?>>
								  <option value="">Selecciona calificación</option>
								  <?php 
									  $calificaciones = $LibCat->rhValoresEntrevista();
									  foreach( $calificaciones as $key => $cal ):
								  ?>
								  		<option <?php if( isset( $arrayFields["comunicacion_eficaz_rh_candidato"] ) && $arrayFields["comunicacion_eficaz_rh_candidato"] == $key ): echo "selected "; endif; ?> value="<?php echo $key; ?>"><?php echo $cal; ?></option>
								  <?php
									  endforeach;
								  ?>
							  </select>
						  </td>
					  </tr>
					  <tr>
						  <td>Trabajo en equipo</td>
						  <td>
							 <select name="trabajo_equipo_rh_candidato" class="trabajo_equipo_rh_candidato" id="trabajo_equipo_rh_candidato" <?php if( in_array("trabajo_equipo_rh_candidato", $$arrayErrorFields) ): echo 'style="border:2px solid red;"'; endif; ?>>
								  <option value="">Selecciona calificación</option>
								  <?php 
									  $calificaciones = $LibCat->rhValoresEntrevista();
									  foreach( $calificaciones as $key => $cal ):
								  ?>
								  		<option <?php if( isset( $arrayFields["trabajo_equipo_rh_candidato"] ) && $arrayFields["trabajo_equipo_rh_candidato"] == $key ): echo "selected "; endif; ?> value="<?php echo $key; ?>"><?php echo $cal; ?></option>
								  <?php
									  endforeach;
								  ?>
							  </select> 
						  </td>
						  <td>Cierre de acuerdos</td>
						  <td>
							 <select name="cierre_acuerdos_rh_candidato" class="cierre_acuerdos_rh_candidato" id="cierre_acuerdos_rh_candidato" <?php if( in_array("cierre_acuerdos_rh_candidato", $$arrayErrorFields) ): echo 'style="border:2px solid red;"'; endif; ?>>
								  <option value="">Selecciona calificación</option>
								  <?php 
									  $calificaciones = $LibCat->rhValoresEntrevista();
									  foreach( $calificaciones as $key => $cal ):
								  ?>
								  		<option <?php if( isset( $arrayFields["cierre_acuerdos_rh_candidato"] ) && $arrayFields["cierre_acuerdos_rh_candidato"] == $key ): echo "selected "; endif; ?> value="<?php echo $key; ?>"><?php echo $cal; ?></option>
								  <?php
									  endforeach;
								  ?>
							  </select> 
						  </td>
					  </tr>
				  </table> 
				  
				  <input type="hidden" name="aprobar_rechazar_rh" id="aprobar_rechazar_rh" class="aprobar_rechazar_rh" />
				  <a class="btnNextFDP" id="btnMenuPrincipal">Menú principal</a>
				  
				  <?php 
					  if( $accionRol == "gerente" || $accionRol == "recursos_humanos"):
				  ?>
				  <a class="btnNextFDP" id="btnAprobarCandidatoRH">Aprobar candidato</a>
				  <a class="btnNextFDP" id="btnRechazarCandidatoRH">Rechazar</a>
				  
				  <?php 
					  endif;
				  ?>
				  
				  <div style="clear: both;"></div>
				  </form>
			  </div>	  
			 <!-- Paso 6 -->
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
	     
	
        $( "#fecha_entrevista_rh_fdp" ).datepicker({
	        dateFormat: "yy-mm-dd",
	        yearRange: "-100:+0",
	        changeYear:true,
        });
		
        
        
	});
	</script>
	
	<script type="text/javascript">
var nextinput = 0;
        $(document).ready(function() {
            $("#perfil_candidato_reclutamiento").change(function() {
            	 $("#perfil_candidato_reclutamiento option:selected").each(function() {
                     puesto = $('#perfil_candidato_reclutamiento option:selected').text();


if (puesto=='Seleccionar Perfil')
{

	document.getElementById('btnPerfil').href = "<?php echo site_url()?>PerfilesDoc/TELEFONIA.pdf";
}
else
{
    document.getElementById('btnPerfil').href = "<?php echo site_url()?>PerfilesDoc/"+puesto+".pdf";
}     
                 });
            })
        });
    </script> 
	