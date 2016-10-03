
<div class="content_generic">
  
    <div id="tab-container" class="tab-container">
        <div class='panel-container'>

            <h2>Informaci&oacute;n Biogr&aacute;fica</h2>
            
              <div id="resultados" style="color:red;font-weight: bold;margin-bottom: 15px;"	></div>
       		 <p><span id="guarda" style="font-weight: bold; text-align: center;font-size: 13pt; color: #00db05"></span></p>
            
            <form id="biografia" name="biografia"> 
            
            
            
            <table style=" border-collapse: separate; border-spacing:  5px" cellpadding="0" cellspacing="0" width="90%">
            
             <?php
									  foreach( $formArray as  $datos ):
								  
									?>
								  
								     <input type="hidden" name="idCandidato"  style=' width:95%;' onkeyup="javascript:this.value=this.value.toUpperCase();" class="calle_no_candidato" id="idCandidato"  autocomplete="off" required value="<?php echo (isset($datos->idCandidatoFDP))?$datos->idCandidatoFDP:""; ?>" >
         
								  
								  		
                <tr>
                    <td>Grado de Estudios</td>
                    <td>
                    <select name="nivel_educativo_candidato" style=' width:95%;' class="nivel_educativo_candidato" id="nivel_educativo_candidato" >
							      <option value="">Seleccionar nivel educativo</option>
							     <?php
									  foreach( $Catalogos as  $per ):
								  
									  if($per->ObjetosNombre=='nivel_educativo_candidato')
									  {
									  $valor= $per->valor;
									  
									  ?>
								  
								  
								  
								  		  <option value="<?php echo $valor; ?>" <?php if( isset($datos->nivel_educativo_candidato) && $datos->nivel_educativo_candidato == $valor ): echo "selected='selected'"; endif;?>><?php echo $valor; ?></option>
								  <?php
									  }
									 
									  endforeach;
								  ?>
						      </select>
                    
                    </td>
                    <td>Estado Civil</td>
                    <td>
                     <select name="estado_civil_candidato" style=' width:95%;' class="estado_civil_candidato" id="estado_civil_candidato" >
							     <option value="">Seleccionar estado civil</option> 
							    <?php
									  foreach( $Catalogos as  $per ):
								  
									  if($per->ObjetosNombre=='estado_civil_candidato')
									  {
									  $valor= $per->valor;
									  
									  ?>
								  
								  
								  
								  		  <option value="<?php echo $valor; ?>" <?php if( isset($datos->estado_civil_candidato) && $datos->estado_civil_candidato == $valor ): echo "selected='selected'"; endif;?>><?php echo $valor; ?></option>
								  <?php
									  }
									 
									  endforeach;
								  ?>
						      </select>
                    
                    </td>
                </tr>
            </table>

            <h2>Domicilio, Se deber&aacute; ingresar un nuevo comprobante de domicilio</h2>
              <span id="resultado" style="color:red"></span>
              
              
              
              
            <table style=" border-collapse: separate; border-spacing:  5px" cellpadding="0" cellspacing="0" width="90%">
                 <tr>
					     <td colspan="4" style="text-align: center;padding: 5px;color:#666;font-size: 10pt;">Ingresa el Código postal para seleccionar delegación o municipio</td>
				     </tr>
				     <tr>
					    <td>Calle y número</td>
					    <td><input type="text" name="calle_no_candidato"  style=' width:95%;' onkeyup="javascript:this.value=this.value.toUpperCase();" class="calle_no_candidato" id="calle_no_candidato" placeholder="Calle y número" autocomplete="off" required value="<?php echo (isset($datos->calle_no_candidato))?$datos->calle_no_candidato:""; ?>" ></td>
					    <td>Código Postal</td>
					    <td><input type="text" maxlength="5" name="cp_candidato" class="cp_candidato" id="cp_candidato" placeholder="C.P." autocomplete="off" required value="<?php echo (isset($datos->cp_candidato))?$datos->cp_candidato:""; ?>" ></td>
				    </tr>
				    <tr>
					    <td>Estado</td>
					    <td>
						    <select name="estado_domicilio_candidato"  style=' width:95%;' class="estado_domicilio_candidato" id="estado_domicilio_candidato" >
							    <option value="">Seleccionar estado</option>
							    
						     </select>
					    </td>
					    <td>Ciudad</td>
					    <td><input type="text" name="ciudad_domicilio_candidato"  readonly style=' width:95%;' class="ciudad_domicilio_candidato" id="ciudad_domicilio_candidato" placeholder="Ciudad" autocomplete="off" required value="<?php echo (isset($datos->ciudad_domicilio_candidato))?$datos->ciudad_domicilio_candidato:""; ?>" ></td>
				    </tr>
				    <tr>
					    <td>Municipio o delegación</td>
					    <td>
						   <select name="delegacion_domicilio_candidato"  style=' width:95%;' class="delegacion_domicilio_candidato" id="delegacion_domicilio_candidato" >
							   <option value="">Seleccionar delegación o municipio</option> 
						   </select>
					    </td>
					    <td>Colonia</td>
					    <td>
						    <select name="colonia_domicilio_candidato" style=' width:95%;' onkeyup="javascript:this.value=this.value.toUpperCase();"  class="colonia_domicilio_candidato" id="colonia_domicilio_candidato" required >
				              <option value="">Seleccionar colonia</option> 
				            </select>
						</td>
				    </tr>
            </table>   

            <h2>Datos de Contacto del Candidato</h2>
            <table style=" border-collapse: separate; border-spacing:  5px" cellpadding="0" cellspacing="0" width="90%">
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
					    <td><input maxlength="10"  type="text" name="telefono_casa_candidato" class="telefono_casa_candidato allownumericwithoutdecimal" id="telefono_casa_candidato" placeholder="Tel. casa" autocomplete="off" required value="<?php echo (isset($datos->telefono_casa_candidato))?$datos->telefono_casa_candidato:""; ?>" > <p style="color:#aba5a5;font-size: 10pt;">10 dígitos. Ejemplo: 55xxxxxxx</p></td>
					    <td>Número de teléfono móvil</td>
					    <td><input type="text" maxlength="10" name="telefono_movil_candidato" class="telefono_movil_candidato allownumericwithoutdecimal" id="telefono_movil_candidato" placeholder="Tel. móvil" autocomplete="off" required value="<?php echo (isset($datos->telefono_movil_candidato))?$datos->telefono_movil_candidato:""; ?>" ><p style="color:#aba5a5;font-size: 10pt;">10 dígitos. Ejemplo: 55xxxxxxxx</p></td>
				    </tr>
				    <tr>
					    <td>Otro número de teléfono</td>
					    <td><input type="text" maxlength="10" name="telefono_otro_candidato" class="telefono_otro_candidato allownumericwithoutdecimal" id="telefono_otro_candidato" placeholder="Otro teléfono" autocomplete="off" value="<?php echo (isset($datos->telefono_otro_candidato))?$datos->telefono_otro_candidato:""; ?>"></td>
					    <td>Correo electrónico personal</td>
					    <td><input type="text" name="correo_electronico_candidato"  style=' width:95%;' class="correo_electronico_candidato" id="correo_electronico_candidato" placeholder="Correo electrónico" autocomplete="off" required value="<?php echo (isset($datos->correo_electronico_candidato))?$datos->correo_electronico_candidato:""; ?>" >
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

<!-- 
            <h2>Dependientes Econ&oacute;micos</h2>
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
            
            
              <?php
									  
									 
									  endforeach;
								  ?>
 !-->
            <h2>Contacto de Emergencia</h2>
            <table style=" border-collapse: separate; border-spacing:  5px" cellpadding="0" cellspacing="0" width="90%">
                <tr>
					   <td>Nombre de contacto</td>
					   <td><input type="text" name="nombre_contacto_emergencia_candidato" style=' width:95%;' class="nombre_contacto_emergencia_candidato" id="nombre_contacto_emergencia_candidato" placeholder="Nombre" autocomplete="off" onkeyup="javascript:this.value=this.value.toUpperCase();" required value="<?php echo (isset($datos->nombre_contacto_emergencia_candidato))?$datos->nombre_contacto_emergencia_candidato:""; ?>" ></td>
					   <td>Parentesco</td>
					   <td>
						   <select name="parentesco_contacto_emergencia_candidato" style=' width:95%;' class="parentesco_contacto_emergencia_candidato" id="parentesco_contacto_emergencia_candidato" >
							   <option value="">Seleccionar opción</option> 
							    <?php
									  foreach( $Catalogos as  $per ):
								  
									  if($per->ObjetosNombre=='parentesco_contacto_emergencia_candidato')
									  {
									  $valor= $per->valor;
									  
									  ?>
								  
								  
								  
								  		  <option value="<?php echo $valor; ?>" <?php if( isset($datos->parentesco_contacto_emergencia_candidato) && $datos->parentesco_contacto_emergencia_candidato == $valor ): echo "selected='selected'"; endif;?>><?php echo $valor; ?></option>
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
					   <td><input type="text" maxlength="10" name="telefono_casa_emergencia_candidato" style=' width:95%;' class="telefono_casa_emergencia_candidato allownumericwithoutdecimal" id="telefono_casa_emergencia_candidato" placeholder="Teléfono casa" autocomplete="off" required value="<?php echo (isset($datos->telefono_casa_emergencia_candidato))?$datos->telefono_casa_emergencia_candidato:""; ?>" <?php echo ( in_array('telefono_casa_emergencia_candidato' , $error_campos) )?"style='border:2px solid red;'":""; ?>></td>
					   <td>Número teléfono móvil</td>
					   <td>
						   <input type="text" maxlength="10" name="telefono_movil_emergencia_candidato"  style=' width:95%;' class="telefono_movil_emergencia_candidato allownumericwithoutdecimal" id="telefono_movil_emergencia_candidato" placeholder="Teléfono móvil" autocomplete="off" required value="<?php echo (isset($datos->telefono_movil_emergencia_candidato))?$datos->telefono_movil_emergencia_candidato:""; ?>" <?php echo ( in_array('telefono_casa_emergencia_candidato' , $error_campos) )?"style='border:2px solid red;'":""; ?>>
					   </td>
				   </tr>
            </table>  

            <h2>Actualizaci&oacute;n de documentaci&oacute;n</h2>
            <table style=" border-collapse: separate; border-spacing:  5px" cellpadding="0" cellspacing="0" width="90%">
                <tr>
                     <td>Comprobante de domicilio</td>
					    <td>
						    <span class="btn btn-success fileinput-button">
						        <i class="glyphicon glyphicon-plus"></i>
						        <span>Cargar...</span>
						        <!-- The file input field used as target for the file upload widget -->
						        <input id="carta_recomendacion_empleo1_candidato_upload" type="file" name="files[]" multiple>
						    </span>
						    <!-- The global progress bar -->
						    <div id="carta_recomendacion_empleo1_candidato_progress" class="progress">
						        <div class="progress-bar progress-bar-success"></div>
						    </div>
						    <!-- The container for the uploaded files -->
						    <div id="files_carta_1" class="files">
							    <?php 
								    if( isset($datos->carta_recomendacion_empleo1_candidato) && $datos->carta_recomendacion_empleo1_candidato != ""):
								    	echo '<a href="'.HOME_URL."tempFDP/files/".$datos->carta_recomendacion_empleo1_candidato.'" target="_blank">'.$datos->carta_recomendacion_empleo1_candidato.'</a>';
								    	
								    endif;
							    ?>
						    </div>
					    </td>
					    
                    <tr>
					    <td>Comprobante de estudios</td>
					    <td>
						    <span class="btn btn-success fileinput-button">
						        <i class="glyphicon glyphicon-plus"></i>
						        <span>Cargar...</span>
						        <!-- The file input field used as target for the file upload widget -->
						        <input id="carta_recomendacion_empleo3_candidato_upload" type="file" name="files[]" multiple>
						    </span>
						    <!-- The global progress bar -->
						    <div id="carta_recomendacion_empleo3_candidato_progress" class="progress">
						        <div class="progress-bar progress-bar-success"></div>
						    </div>
						    <!-- The container for the uploaded files -->
						    <div id="files_carta_3" class="files">
							    <?php 
								    if( isset($datos->carta_recomendacion_empleo3_candidato) && $datos->carta_recomendacion_empleo3_candidato != ""):
								    	echo '<a href="'.HOME_URL."tempFDP/files/".$datos->carta_recomendacion_empleo3_candidato.'" target="_blank">'.$datos->carta_recomendacion_empleo3_candidato.'</a>';
								    	
								    endif;
							    ?>
						    </div>
					    </td>
				    </tr>
                </tr>
                <tr>
					    <td>Identificaci&oacute;n oficial</td>
					    <td>
						    <span class="btn btn-success fileinput-button">
						        <i class="glyphicon glyphicon-plus"></i>
						        <span>Cargar...</span>
						        <!-- The file input field used as target for the file upload widget -->
						        <input id="carta_recomendacion_empleo2_candidato_upload" type="file" name="files[]" multiple>
						    </span>
						    <!-- The global progress bar -->
						    <div id="carta_recomendacion_empleo2_candidato_progress" class="progress">
						        <div class="progress-bar progress-bar-success"></div>
						    </div>
						    <!-- The container for the uploaded files -->
						    <div id="files_carta_2" class="files">
							    <?php 
								    if( isset($datos->carta_recomendacion_empleo2_candidato) && $datos->carta_recomendacion_empleo2_candidato != ""):
								    	echo '<a href="'.HOME_URL."tempFDP/files/".$datos->carta_recomendacion_empleo2_candidato.'" target="_blank">'.$datos->carta_recomendacion_empleo2_candidato.'</a>';
								    	
								    endif;
							    ?>
						    </div>
					    </td>
				    </tr>
                    <td colspan="2"><a class="btnNextFDP" id="btnMenu">Men&uacute; principal</a>
                        <a class="btnNextFDP" id="btnGuardar">Guardar</a></td>
            </table> 
            
            </form>
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
					
					$("#ciudad_domicilio_candidato").val($("#delegacion_domicilio_candidato").val());
					
					var mensaje = municipio;
					if ($.trim(mensaje) == 'error') {
						$("#resultado").html("Código Postal no encontrado...");
						$("#cp_candidato").val("");
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
						if( $(this).val() == "<?php echo (isset($datos->colonia_domicilio_candidato) && $datos->colonia_domicilio_candidato != "")?$datos->colonia_domicilio_candidato:""; ?>" ){
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
					$("#ciudad_domicilio_candidato").val($("#delegacion_domicilio_candidato").val());
					var mensaje = municipio;
					if ($.trim(mensaje) == 'error') {
						$("#resultado").html("Código Postal no encontrado...");
						$("#cp_candidato").val("");
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
        
        $('#carta_recomendacion_empleo1_candidato_upload').fileupload({
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
		            $(".carta_recomendacion_empleo1_candidato").val(file.name);
		            
	                $('<p/>').html('<a target="_blank" href="'+'<?php echo HOME_URL; ?>tempFDP/files/'+file.name+'">'+ file.name + "</a>").appendTo('#files_carta_1');
	            });
	        },
	        progressall: function (e, data) {
	            var progress = parseInt(data.loaded / data.total * 100, 10);
	            $('#carta_recomendacion_empleo1_candidato_progress .progress-bar').css(
	                'width',
	                progress + '%'
	            );
	            setInterval(function(){ 
		            $('#carta_recomendacion_empleo1_candidato_progress .progress-bar').css(
		                'width',
		                0 + '%'
		            );
	            }, 2000);
	        }
	    }).prop('disabled', !$.support.fileInput)
	        .parent().addClass($.support.fileInput ? undefined : 'disabled');
	        
	    $('#carta_recomendacion_empleo2_candidato_upload').fileupload({
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
		            $(".carta_recomendacion_empleo2_candidato").val(file.name);
		            
	                $('<p/>').html('<a target="_blank" href="'+'<?php echo HOME_URL; ?>tempFDP/files/'+file.name+'">'+ file.name + "</a>").appendTo('#files_carta_2');
	            });
	        },
	        progressall: function (e, data) {
	            var progress = parseInt(data.loaded / data.total * 100, 10);
	            $('#carta_recomendacion_empleo2_candidato_progress .progress-bar').css(
	                'width',
	                progress + '%'
	            );
	            setInterval(function(){ 
		            $('#carta_recomendacion_empleo2_candidato_progress .progress-bar').css(
		                'width',
		                0 + '%'
		            );
	            }, 2000);
	        }
	    }).prop('disabled', !$.support.fileInput)
	        .parent().addClass($.support.fileInput ? undefined : 'disabled');
	        
		$('#carta_recomendacion_empleo3_candidato_upload').fileupload({
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
		            $(".carta_recomendacion_empleo3_candidato").val(file.name);
		            
	                $('<p/>').html('<a target="_blank" href="'+'<?php echo HOME_URL; ?>tempFDP/files/'+file.name+'">'+ file.name + "</a>").appendTo('#files_carta_3');
	            });
	        },
	        progressall: function (e, data) {
	            var progress = parseInt(data.loaded / data.total * 100, 10);
	            $('#carta_recomendacion_empleo3_candidato_progress .progress-bar').css(
	                'width',
	                progress + '%'
	            );
	            setInterval(function(){ 
		            $('#carta_recomendacion_empleo3_candidato_progress .progress-bar').css(
		                'width',
		                0 + '%'
		            );
	            }, 2000);
	        }
	    }).prop('disabled', !$.support.fileInput)
	        .parent().addClass($.support.fileInput ? undefined : 'disabled');
	});
	</script>
	
	
	<script type="text/javascript">
$("#btnGuardar").click(function(){

    		error_campos = [];
    		if( $("#nivel_educativo_candidato").val() == "" ) {
        		error_campos.push(  "nivel_educativo_candidato");
        		 $("#nivel_educativo_candidato").css("border", "2px solid red");
    		}


    		
    		if( $("#estado_civil_candidato").val() == "" ) {
        		error_campos.push(  "estado_civil_candidato");
        		 $("#estado_civil_candidato").css("border", "2px solid red");
    		}

    		
    		if( $("#calle_no_candidato").val() == "" ) {
        		error_campos.push(  "calle_no_candidato");
        		 $("#calle_no_candidato").css("border", "2px solid red");
    		}

    	
    		if( $("#colonia_domicilio_candidato").val() == "" ) {
        		error_campos.push(  "colonia_domicilio_candidato");
        		 $("#colonia_domicilio_candidato").css("border", "2px solid red");
    		}

    		
    		if( $("#cp_candidato").val() == "" ) {
        		error_campos.push(  "cp_candidato");
        		 $("#cp_candidato").css("border", "2px solid red");
    		}

    	
    		if( $("#nombre_contacto_emergencia_candidato").val() == "" ) {
        		error_campos.push(  "nombre_contacto_emergencia_candidato");
        		 $("#nombre_contacto_emergencia_candidato").css("border", "2px solid red");
    		}

    	
    		if( $("#parentesco_contacto_emergencia_candidato").val() == "" ) {
        		error_campos.push(  "parentesco_contacto_emergencia_candidato");
        		 $("#parentesco_contacto_emergencia_candidato").css("border", "2px solid red");
    		}

    	
    		if( $("#telefono_movil_emergencia_candidato").val() == "" ) {
        		error_campos.push(  "telefono_movil_emergencia_candidato");
        		 $("#telefono_movil_emergencia_candidato").css("border", "2px solid red");
    		}

    	
    		if( $("#telefono_casa_emergencia_candidato").val() == "" ) {
        		error_campos.push(  "telefono_casa_emergencia_candidato");
        		 $("#telefono_casa_emergencia_candidato").css("border", "2px solid red");
    		}

    		if( $("#correo_electronico_candidato").val() == "" ) {
        		error_campos.push(  "correo_electronico_candidato");
        		 $("#correo_electronico_candidato").css("border", "2px solid red");
    		}


    		if( $("#telefono_movil_candidato").val() == "" ) {
        		error_campos.push(  "telefono_movil_candidato");
        		 $("#telefono_movil_candidato").css("border", "2px solid red");
    		}


    		if( $("#telefono_casa_candidato").val() == "" ) {
        		error_campos.push(  "telefono_casa_candidato");
        		 $("#telefono_casa_candidato").css("border", "2px solid red");
    		}
    		
    		
    		if( error_campos.length  == 0 )
    		{


    			


    				 
    		    $.ajax({
                    url: '<?php echo HOME_URL; ?>MovEmpleados/GuardaBiografia',
                    type: 'POST',
                    dataType: 'json',
                    data: $('#biografia').serialize(),
                    cache: false,
                    async: false,
                    success: function(response) {
                        if (response.codigo==200) {
                        	$("#guarda").html("Informacion guardada correctamente..");
                        	$("#resultado").html("");
                        	 $('.page').ScrollTo();
                           
                        } else {
                        	$("#resultado").html("Favor de intentar nuevamente..");
                            
                        }
                    },
                    error: function(jqXHR, textStatus, errorThrown) {
                    	$("#resultado").html("Favor de intentar nuevamente..");
                       
                    }
                });
    			
    			
    		}
    		else
    		{	
        		
    			$("#resultado").html("Favor de revisar campos obligatorios marcados con rojo..");


    			
    		}


    		
	  });


</script>

<script>

	$(document).ready(function(){
		$("input[name=telefono_movil_emergencia_candidato]").change(function(){
		var	valor= $('input[name=telefono_movil_emergencia_candidato]').val();

			var n = valor.length;

if (n>0 && n!=10)
{	
			alert("Capture el número telefónico a 10 digitos ");
			$('input[name=telefono_movil_emergencia_candidato]').val("");
}
			
		});
	
	})


	</script>
	
	<script>

	$(document).ready(function(){
		$("input[name=telefono_casa_emergencia_candidato]").change(function(){
		var	valor= $('input[name=telefono_casa_emergencia_candidato]').val();

			var n = valor.length;

if (n>0 && n!=10)
{	
			alert("Capture el número telefónico a 10 digitos ");
			$('input[name=telefono_casa_emergencia_candidato]').val("");
}
			
		});
	
	})


	</script>
	
	<script>

	$(document).ready(function(){
		$("input[name=telefono_movil_candidato]").change(function(){
		var	valor= $('input[name=telefono_movil_candidato]').val();

			var n = valor.length;

if (n>0 && n!=10)
{	
			alert("Capture el número telefónico a 10 digitos ");
			$('input[name=telefono_movil_candidato]').val("");
}
			
		});
	
	})


	</script>
	
	
		<script>

	$(document).ready(function(){
		$("input[name=telefono_casa_candidato]").change(function(){
		var	valor= $('input[name=telefono_casa_candidato]').val();

			var n = valor.length;

if (n>0 && n!=10)
{	
			alert("Capture el número telefónico a 10 digitos ");
			$('input[name=telefono_casa_candidato]').val("");
}
			
		});
	
	})


	</script>
	
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


		
		$.post("<?php echo HOME_URL; ?>/Candidatos/ValidaEmail", {
			cp: valor
		}, function(municipio) {
			

			var str = municipio;
			var res = str.replace("-", "");

			
			if (res=="registrado") {

                $("#correo_electronico_candidato").val("");


                alert("El correo electrónico ya esta regitrado");
                $("#correo_electronico_candidato").val("");
                
			} else {
				
			}
		});
		
			
		});
	
	})


	</script>
        
	
        