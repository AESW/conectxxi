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
	      $(".aprobar_rechazar_rh").val( "aprobar" );
	      if( $(".nombre_candidato").val() == ""){
	    	  $('<p/>').html('<p style="color:red;font-weight: bold;margin-bottom: 15px;">Favor de revisar campos obligatorios marcados con rojo</p>').appendTo('#paso1');
	    	  //$('<p/>').html('<p style="color:red;font-weight: bold;margin-bottom: 15px;">Favor de revisar campos obligatorios marcados con rojo</p>').appendTo('#paso2');
	    	  //$('<p/>').html('<p style="color:red;font-weight: bold;margin-bottom: 15px;">Favor de revisar campos obligatorios marcados con rojo</p>').appendTo('#paso3');
	    	   $('.page').ScrollTo();
	 	      $(".step1").trigger("click");
	    	  $(".nombre_candidato").css({ "border" : "2px solid red"  });
	      }else if( $(".apellido_paterno_candidato").val() == "" ){
	    	  $('<p/>').html('<p style="color:red;font-weight: bold;margin-bottom: 15px;">Favor de revisar campos obligatorios marcados con rojo</p>').appendTo('#paso1');
	    	//$('<p/>').html('<p style="color:red;font-weight: bold;margin-bottom: 15px;">Favor de revisar campos obligatorios marcados con rojo</p>').appendTo('#paso2');
	    	  //$('<p/>').html('<p style="color:red;font-weight: bold;margin-bottom: 15px;">Favor de revisar campos obligatorios marcados con rojo</p>').appendTo('#paso3');
	    	   $('.page').ScrollTo();
	 	      $(".step1").trigger("click");
		      $(".apellido_paterno_candidato").css({ "border" : "2px solid red"  });
		      
	      }else if( $(".apellido_materno_candidato").val() == "" ){
	    	  $('<p/>').html('<p style="color:red;font-weight: bold;margin-bottom: 15px;">Favor de revisar campos obligatorios marcados con rojo</p>').appendTo('#paso1');
	    	//$('<p/>').html('<p style="color:red;font-weight: bold;margin-bottom: 15px;">Favor de revisar campos obligatorios marcados con rojo</p>').appendTo('#paso2');
	    	  //$('<p/>').html('<p style="color:red;font-weight: bold;margin-bottom: 15px;">Favor de revisar campos obligatorios marcados con rojo</p>').appendTo('#paso3');
	    	   $('.page').ScrollTo();
	 	      $(".step1").trigger("click");
		      $(".apellido_materno_candidato").css({ "border" : "2px solid red"  });
		      
	      }else if( $(".gerente_autoriza").val() == "" ){
	    	  $('<p/>').html('<p style="color:red;font-weight: bold;margin-bottom: 15px;">Favor de revisar campos obligatorios marcados con rojo</p>').appendTo('#paso1');
	    	//$('<p/>').html('<p style="color:red;font-weight: bold;margin-bottom: 15px;">Favor de revisar campos obligatorios marcados con rojo</p>').appendTo('#paso2');
	    	  //$('<p/>').html('<p style="color:red;font-weight: bold;margin-bottom: 15px;">Favor de revisar campos obligatorios marcados con rojo</p>').appendTo('#paso3');
	    	   $('.page').ScrollTo();
	 	      $(".step1").trigger("click");
		      $(".gerente_autoriza").css({ "border" : "2px solid red"  });
		      
	      }else if( $(".empresa_contrata").val() == "" ){
	    	  $('<p/>').html('<p style="color:red;font-weight: bold;margin-bottom: 15px;">Favor de revisar campos obligatorios marcados con rojo</p>').appendTo('#paso1');
	    	//$('<p/>').html('<p style="color:red;font-weight: bold;margin-bottom: 15px;">Favor de revisar campos obligatorios marcados con rojo</p>').appendTo('#paso2');
	    	  //$('<p/>').html('<p style="color:red;font-weight: bold;margin-bottom: 15px;">Favor de revisar campos obligatorios marcados con rojo</p>').appendTo('#paso3');
	    	   $('.page').ScrollTo();
	 	      $(".step1").trigger("click");
		      $(".empresa_contrata").css({ "border" : "2px solid red"  });
		      
	      }else if( $(".ubicacion").val() == "" ){
	    	  $('<p/>').html('<p style="color:red;font-weight: bold;margin-bottom: 15px;">Favor de revisar campos obligatorios marcados con rojo</p>').appendTo('#paso1');
	    	//$('<p/>').html('<p style="color:red;font-weight: bold;margin-bottom: 15px;">Favor de revisar campos obligatorios marcados con rojo</p>').appendTo('#paso2');
	    	  //$('<p/>').html('<p style="color:red;font-weight: bold;margin-bottom: 15px;">Favor de revisar campos obligatorios marcados con rojo</p>').appendTo('#paso3');
	    	   $('.page').ScrollTo();
	 	      $(".step1").trigger("click");
		      $(".ubicacion").css({ "border" : "2px solid red"  });
		      
	      }else if( $(".sueldo").val() == "" ){
	    	  $('<p/>').html('<p style="color:red;font-weight: bold;margin-bottom: 15px;">Favor de revisar campos obligatorios marcados con rojo</p>').appendTo('#paso1');
	    	//$('<p/>').html('<p style="color:red;font-weight: bold;margin-bottom: 15px;">Favor de revisar campos obligatorios marcados con rojo</p>').appendTo('#paso2');
	    	  //$('<p/>').html('<p style="color:red;font-weight: bold;margin-bottom: 15px;">Favor de revisar campos obligatorios marcados con rojo</p>').appendTo('#paso3');
	    	   $('.page').ScrollTo();
	 	      $(".step1").trigger("click");
		      $(".sueldo").css({ "border" : "2px solid red"  });
		      
	      }else if( $(".puesto").val() == "" ){
	    	  $('<p/>').html('<p style="color:red;font-weight: bold;margin-bottom: 15px;">Favor de revisar campos obligatorios marcados con rojo</p>').appendTo('#paso1');
	    	//$('<p/>').html('<p style="color:red;font-weight: bold;margin-bottom: 15px;">Favor de revisar campos obligatorios marcados con rojo</p>').appendTo('#paso2');
	    	  //$('<p/>').html('<p style="color:red;font-weight: bold;margin-bottom: 15px;">Favor de revisar campos obligatorios marcados con rojo</p>').appendTo('#paso3');
	    	   $('.page').ScrollTo();
	 	      $(".step1").trigger("click");
		      $(".puesto").css({ "border" : "2px solid red"  });
		      
	      }else if( $(".diadescanso").val() == "" ){
	    	  $('<p/>').html('<p style="color:red;font-weight: bold;margin-bottom: 15px;">Favor de revisar campos obligatorios marcados con rojo</p>').appendTo('#paso1');
	    	//$('<p/>').html('<p style="color:red;font-weight: bold;margin-bottom: 15px;">Favor de revisar campos obligatorios marcados con rojo</p>').appendTo('#paso2');
	    	  //$('<p/>').html('<p style="color:red;font-weight: bold;margin-bottom: 15px;">Favor de revisar campos obligatorios marcados con rojo</p>').appendTo('#paso3');
	    	   $('.page').ScrollTo();
	 	      $(".step1").trigger("click");
		      $(".diadescanso").css({ "border" : "2px solid red"  });
		      
	      }else if( $(".horario").val() == "" ){
	    	  $('<p/>').html('<p style="color:red;font-weight: bold;margin-bottom: 15px;">Favor de revisar campos obligatorios marcados con rojo</p>').appendTo('#paso1');
	    	//$('<p/>').html('<p style="color:red;font-weight: bold;margin-bottom: 15px;">Favor de revisar campos obligatorios marcados con rojo</p>').appendTo('#paso2');
	    	  //$('<p/>').html('<p style="color:red;font-weight: bold;margin-bottom: 15px;">Favor de revisar campos obligatorios marcados con rojo</p>').appendTo('#paso3');
	    	   $('.page').ScrollTo();
	 	      $(".step1").trigger("click");
		      $(".horario").css({ "border" : "2px solid red"  });
		      
	      }else if( $(".duracionContrato").val() == "" ){
	    	  $('<p/>').html('<p style="color:red;font-weight: bold;margin-bottom: 15px;">Favor de revisar campos obligatorios marcados con rojo</p>').appendTo('#paso1');
	    	//$('<p/>').html('<p style="color:red;font-weight: bold;margin-bottom: 15px;">Favor de revisar campos obligatorios marcados con rojo</p>').appendTo('#paso2');
	    	  //$('<p/>').html('<p style="color:red;font-weight: bold;margin-bottom: 15px;">Favor de revisar campos obligatorios marcados con rojo</p>').appendTo('#paso3');
	    	   $('.page').ScrollTo();
	 	      $(".step1").trigger("click");
		      $(".duracionContrato").css({ "border" : "2px solid red"  });
		      
	      
		  }else{

			  $.ajax({
                  url: '<?php echo HOME_URL; ?>eaf/recursoshumanos/GuardaAltaUsuario',
                  type: 'POST',
                  dataType: 'json',
                  data: $('#form_fdp_conectxxi').serialize(),
                  cache: false,
                  async: true,
                  success: function(data) {
                	  if (data.codigo != 200) {
                         alert("paso");
                      } else {
                          alert("error");
                          
                      }
                  },
                  error: function(jqXHR, textStatus, errorThrown) {
                      alert(jqXHR.responseText);
                     
                  }
              }); 


			     
	      }
	      
      });



      $("#btnSolicitudCuenta").click(function(){


			  $.ajax({
                  url: '<?php echo HOME_URL; ?>eaf/recursoshumanos/SolicitarCuentaBancaria',
                  type: 'POST',
                  dataType: 'json',
                  data: $('#form_fdp_conectxxi').serialize(),
                  cache: false,
                  async: true,
                  success: function(data) {
                	  if (data.codigo != 200) {
                         alert("paso");
                      } else {
                          alert("error");
                          
                      }
                  },
                  error: function(jqXHR, textStatus, errorThrown) {
                      alert(jqXHR.responseText);
                     
                  }
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
		  	
		  	 <form action="" method="post" name="form_fdp_conectxxi" class="form_fdp_conectxxi" id="form_fdp_conectxxi">
		  	 <input type="hidden" name="step_current" class="step_current" id="step_current" value="<?php echo (isset($formArray["step_current"]))?$formArray["step_current"]:""; ?>" />
		  	 <input type="hidden" name="btn_fire" class="btn_fire" id="btn_fire" value="<?php echo (isset($formArray["btn_fire"]))?$formArray["btn_fire"]:""; ?>"/>
		  	 <input type="hidden" name="email" class="email" id="email" value="<?php echo (isset($formArray["correo_electronico_candidato"]))?$formArray["correo_electronico_candidato"]:""; ?>"/>
			 <input type="hidden" name="rfc" class="rfc" id="rfc" value="<?php echo (isset($formArray["rfc_candidato"]))?$formArray["rfc_candidato"]:""; ?>"/> 
		  		
			 
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
			    <h2><label>Alta de personal</label></h2>
			    <div id="paso1"></div>
			    <table cellpadding="0" cellspacing="0" width="100%">
				    <tr>
					    <td>Nombre (s)</td>
					    <td><input type="text" name="nombre_candidato" class="nombre_candidato" id="nombre_candidato" placeholder="Nombre (s)" autocomplete="off" required value="<?php echo (isset($formArray["nombre_candidato"]))?$formArray["nombre_candidato"]:""; ?>" ></td>
					    <td>Apellido paterno</td>
					    <td><input type="text" name="apellido_paterno_candidato" class="apellido_paterno_candidato" id="apellido_paterno_candidato" placeholder="Apellido" autocomplete="off" required value="<?php echo (isset($formArray["apellido_paterno_candidato"]))?$formArray["apellido_paterno_candidato"]:""; ?>" ></td>
				    </tr>
				    <tr>
					    <td>Apellido materno</td>
					    <td><input type="text" name="apellido_materno_candidato" class="apellido_materno_candidato" id="apellido_materno_candidato" placeholder="Apellido" autocomplete="off" required value="<?php echo (isset($formArray["apellido_materno_candidato"]))?$formArray["apellido_materno_candidato"]:""; ?>" ></td>
					    <td>&nbsp;</td>
					    <td>&nbsp;</td>
				    </tr>
				      <tr>
					    <td>Gerente que Autoriza</td>
					    <td><input type="text" name="gerente_autoriza" class="gerente_autoriza" id="gerente_autoriza" placeholder="Gerente" autocomplete="off" required value="<?php echo (isset($formArray["idNombreAprobacionGerente"]))?$formArray["idNombreAprobacionGerente"]:""; ?>" ></td>
					    <td>&nbsp;</td>
					    <td>&nbsp;</td>
				    </tr>
				    <tr>
				     <td>Empresa que contrata</td>
					      <td>
						      <select name="empresa_contrata" class="empresa_contrata" id="empresa_contrata" >
							   
							   <option value="">Selecciona Empresa</option>
								  <?php
									
									  
								  if( !empty($Empresas) ):
								  foreach($Empresas as  $t){
								  ?>
								  		<option value="<?php echo $t->nombreEmpresas?>">
								  			
								  			<?php echo $t->nombreEmpresas; ?>
								  		</option>
								  <?php	  
									  }
									  endif;
								  ?>
							   
						      </select>
					      </td>
				    </tr>
				    <tr>
				     <td>Ubicación</td>
					      <td>
						      <select name="ubicacion" class="ubicacion" id="genero_candidato" >
							     
							     <option value="">Selecciona Ubicación</option>
								  <?php
									  $perfiles = $catalogos->rhUbicacion();
									  
									  foreach( $perfiles as $key => $per ):
								  ?>
								  		<option >
								  			
								  			<?php echo $per; ?>
								  		</option>
								  <?php	  
									  endforeach;
								  ?>
							     
							     
						      </select>
					      </td>
				    </tr>
				     <tr>
					     <td>Fecha de Ingreso</td>
					    
					    <td><input type="text" onfocus="this.blur();" name="fecha_entrevista_rh_fdp" class="fecha_entrevista_rh_fdp" id="fecha_entrevista_rh_fdp" placeholder="Fecha de ingreso" /></td> 
				     </tr>
				     <tr>
					    <td>Sueldo</td>
					    <td><input type="text" name="sueldo" class="sueldo allownumericwithdecimal" id="sueldo" placeholder="Sueldo" autocomplete="off" required ></td>
					    <td>&nbsp;</td>
					    <td>&nbsp;</td>
				    </tr>
				    <tr>
				     <td>Puesto</td>
					      <td><input type="text" name="puesto" class="puesto" id="puesto" placeholder="Sueldo" autocomplete="off" required value="<?php echo (isset($formArray["Puesto"]))?$formArray["Puesto"]:""; ?>" ></td>
					    <td>&nbsp;</td>
					    <td>&nbsp;</td>
				    </tr>
				    <tr>
				     <td>Horario</td>
					      <td>
						      <select name="horario" class="horario" id="horario" >
							      <option value="">Selecciona Horario</option>
								  <?php
									  $perfiles = $catalogos->rhHorario();
									  
									  foreach( $perfiles as $key => $per ):
								  ?>
								  		<option >
								  			
								  			<?php echo $per; ?>
								  		</option>
								  <?php	  
									  endforeach;
								  ?>
							     
						      </select>
					      </td>
				    </tr>
				    <tr>
				     <td>Día de descanso</td>
					      <td>
						      <select name="diadescanso" class="diadescanso" id="diadescanso" >
							      
							       <option value="">Selecciona Día de descanso</option>
								  <?php
									  $perfiles = $catalogos->rhDiaDescanso();
									  
									  foreach( $perfiles as $key => $per ):
								  ?>
								  		<option >
								  			
								  			<?php echo $per; ?>
								  		</option>
								  <?php	  
									  endforeach;
								  ?>
						      </select>
					      </td>
				    </tr>
				    <tr>
				     <td>Duración de contrato</td>
					      <td>
						      <select name="duracionContrato" class="duracionContrato" id="duracionContrato" >
							      <option value="">Selecciona Duración de contrato</option>
								  <?php
									  $perfiles = $catalogos->rhDuracionContrato();
									  
									  foreach( $perfiles as $key => $per ):
								  ?>
								  		<option >
								  			
								  			<?php echo $per; ?>
								  		</option>
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
						        <input id="curp_upload" type="file" name="files[]" multiple>
						    </span>
						    <!-- The global progress bar -->
						    <div id="curp_progress" class="progress">
						        <div class="progress-bar progress-bar-success"></div>
						    </div>
						    <!-- The container for the uploaded files -->
						    <div id="files_curp" class="files">
							   
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
						        <input id="rfc_upload" type="file" name="files[]" multiple>
						    </span>
						    <!-- The global progress bar -->
						    <div id="rfc_progress" class="progress">
						        <div class="progress-bar progress-bar-success"></div>
						    </div>
						    <!-- The container for the uploaded files -->
						    <div id="files_rfc" class="files">
							   
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
			     <div id="paso3"></div>
			    
			    <table cellpadding="0" cellspacing="0" width="100%">
				    <tr>
					    <td>Número de cuenta</td>
					    <td><input type="text" name="numerocuenta" class="numerocuenta allownumericwithoutdecimal" id="numerocuenta" placeholder="Número de cuenta" autocomplete="off" required ></td>
					   <td>Cuenta Clabe</td>
					    <td><input type="text" name="cuentaclabe" class="cuentaclabe allownumericwithoutdecimal" id="cuentaclabe" placeholder="Cuenta Clabe" autocomplete="off" required ></td>
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
	     
	
        $( "#fecha_entrevista_rh_fdp" ).datepicker({
	        dateFormat: "yy-mm-dd",
	        yearRange: "-100:+0",
	        changeYear:true,
        });



        $('#curp_upload').fileupload({
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
		           // $(".carta_recomendacion_empleo1_candidato").val(file.name);
		            
	                $('<p/>').html('<a target="_blank" href="'+'<?php echo HOME_URL; ?>documentosUsuarios/files/'+file.name+'">'+ file.name + "</a>").appendTo('#files_curp');
	            });
	        },
	        progressall: function (e, data) {
	            var progress = parseInt(data.loaded / data.total * 100, 10);
	            $('#curp_progress .progress-bar').css(
	                'width',
	                progress + '%'
	            );
	            setInterval(function(){ 
		            $('#curp_progress .progress-bar').css(
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
		           // $(".carta_recomendacion_empleo1_candidato").val(file.name);
		            
	                $('<p/>').html('<a target="_blank" href="'+'<?php echo HOME_URL; ?>documentosUsuarios/files/'+file.name+'">'+ file.name + "</a>").appendTo('#files_actanacimiento');
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
		           // $(".carta_recomendacion_empleo1_candidato").val(file.name);
		            
	                $('<p/>').html('<a target="_blank" href="'+'<?php echo HOME_URL; ?>documentosUsuarios/files/'+file.name+'">'+ file.name + "</a>").appendTo('#files_comprobantedomicilio');
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


        $('#rfc_upload').fileupload({
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
		           // $(".carta_recomendacion_empleo1_candidato").val(file.name);
		            
	                $('<p/>').html('<a target="_blank" href="'+'<?php echo HOME_URL; ?>tempFDP/files/'+file.name+'">'+ file.name + "</a>").appendTo('#files_rfc');
	            });
	        },
	        progressall: function (e, data) {
	            var progress = parseInt(data.loaded / data.total * 100, 10);
	            $('#rfc_progress .progress-bar').css(
	                'width',
	                progress + '%'
	            );
	            setInterval(function(){ 
		            $('#rfc_progress .progress-bar').css(
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
		           // $(".carta_recomendacion_empleo1_candidato").val(file.name);
		            
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
		           // $(".carta_recomendacion_empleo1_candidato").val(file.name);
		            
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
		           // $(".carta_recomendacion_empleo1_candidato").val(file.name);
		            
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
		           // $(".carta_recomendacion_empleo1_candidato").val(file.name);
		            
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
		           // $(".carta_recomendacion_empleo1_candidato").val(file.name);
		            
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
	