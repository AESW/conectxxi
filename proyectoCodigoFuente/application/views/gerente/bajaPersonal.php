  <div class="content_generic">
        <div style="width: 99%" class="block_box_gen">
            <h2>Solicitud de Baja de Personal</h2>
            <br>
  <form  name="form1" id="form1" method="POST" >
   <p><span id="resultado" style="color:red;font-weight: bold;margin-bottom: 15px;"></span></p>
        <p><span id="guarda" style="font-weight: bold; text-align: center;font-size: 13pt; color: #00db05"></span></p>
        <br>
            <table cellpadding="0" cellspacing="0" width="100%" style="margin-left:20px">

                <tr >
                    <td><label>Nombre del Empleado</label></td>
                    <td> <select  name="selecUsuario" class="selecUsuario" id="selecUsuario">
                <option value="">Seleccione Personal</option>  
               
                <?php
               if(!empty( $personal ) ):
               foreach($personal as $fila)
						{
							?>
					
				                 <option value="<?php echo $fila["idUsuarios"]; ?>"><?php echo $fila["nombreUsuario"]; ?></option>  
				            <?php
				            }
				            endif;
               ?>
								  
               
               
               
            </select></td>
                    <td></td>
                    <td></td>

                </tr>
                <tr >
                    <td><label>Empresa</label></td>
                    <td><select  name="selecEmp" class="selecEmp" id="selecEmp">
                <option value="">Seleccione Empresa</option>  
               
                <?php
               if(!empty( $empresas ) ):
               foreach($empresas as $fila)
						{
							?>
					
				                 <option value="<?php echo $fila["idEmpresas"]; ?>"><?php echo $fila["nombreEmpresas"]; ?></option>  
				            <?php
				            }
				            endif;
               ?>
								  
               
               
               
            </select></td>
                    <td></td>
                    <td></td>

                </tr>    
                <tr>
                    <td><label>Puesto</label></td>
                    <td><select  name="selecPuesto" class="selecPuesto" id="selecPuesto">
                <option value="">Seleccione Puesto</option>  
               
                <?php
               if(!empty( $puestos ) ):
               foreach($puestos as $fila)
						{
							?>
					
				                 <option value="<?php echo $fila["idPuestos"]; ?>"><?php echo $fila["nombrePuesto"]; ?></option>  
				            <?php
				            }
				            endif;
               ?>
								  
               
               
               
            </select></td>
                    <td><label>Fecha de Ingreso</label></td>
                    <td><input type="text" onfocus="this.blur()" name="fecha_ingreso" class="fecha_ingreso" id="fecha_ingreso" placeholder="dd/mm/YYYY" autocomplete="off" required ></td>

                </tr>  
                <tr>
                    <td><label>Ubicaci&oacute;n</label></td>
                    <td><select  name="selecOficina" class="selecOficina" id="selecOficina">
                <option value="">Seleccione Ubicaci&oacute;n</option>  
               
                <?php
               if(!empty( $oficina ) ):
               foreach($oficina as $fila)
						{
							?>
					
				                 <option value="<?php echo $fila["idOficinas"]; ?>"><?php echo $fila["nombreOficina"]; ?></option>  
				            <?php
				            }
				            endif;
               ?>
								  
               
               
               
            </select></td>
                    <td><label>D&iacute;a de descanso</label></td>
                    <td> <select name="descanso" class="descanso" id="descanso"   >
							      
							       <option value="">Selecciona Día de descanso</option>
								  <?php
									  $perfiles = $catalogos->rhDiaDescanso();
									  
									  foreach( $perfiles as $key => $per ):
								  ?>
								  		  <option value="<?php echo $per; ?>"><?php echo $per; ?></option>
							  
								  <?php	  
									  endforeach;
								  ?>
						      </select></td>

                </tr>
				
                <tr>
                    <td><label>Motivo de la baja</label></td>
                    <td><select  name="selecMotivo" class="selecMotivo" id="selecMotivo">
                               <option value="">Seleccione motivo de la baja</option>  
                                <option value="Abandono de trabajo">Abandono de trabajo</option>
                                 <option value="Disminución de Cartera">Disminución de Cartera</option>  
                                  <option value="Faltas">Faltas</option>    
				
            </select></td>
                    <td><label>Quien solicita</label></td>
                    <td><select  name="selecSolicita" class="selecSolicita" id="selecSolicita">
                <option value="">Seleccione quien solicita</option>  
               
                <?php
               if(!empty( $personal ) ):
               foreach($personal as $fila)
						{
							?>
					
				                 <option value="<?php echo $fila["idUsuarios"]; ?>"><?php echo $fila["nombreUsuario"]; ?></option>  
				            <?php
				            }
				            endif;
               ?>
								  
               
               
               
            </select></td>

                </tr>  
				
                <tr>
                    <td><label>Fecha Efectiva</label></td>
                    <td><input type="text" onfocus="this.blur()" name="fecha_efectiva" class="fecha_efectiva" id="fecha_efectiva" placeholder="dd/mm/YYYY" autocomplete="off" required ></td>
                    <td><label>Sueldo</label></td>
                    <td><select  name="selecSueldo" class="selecSueldo" id="selecSueldo">
                <option value="">Seleccione Sueldo</option>  
               
                <?php
               if(!empty( $sueldo ) ):
               foreach($sueldo as $fila)
						{
							?>
					
				                 <option value="<?php echo $fila["idSueldos"]; ?>"><?php echo $fila["sueldo"]; ?></option>  
				            <?php
				            }
				            endif;
               ?>
								  
               
               
               
            </select></td>

                </tr> 
                <tr>
                    <td><label>Horario</label></td>
                    <td><input type="text" name="horario" class="horario" id=horario></td>
                    <td><label>Fin de contrato</label></td>
                    <td><input type="text" onfocus="this.blur()" name="fecha_fin_Contrato" class="fecha_fin_Contrato" id="fecha_fin_Contrato" placeholder="dd/mm/YYYY" autocomplete="off" required ></td>

                </tr> 
            </table>
            <br>
            <br>
            <center>
            <label>Comentarios Gerente</label>
            <br>
            <textarea style="width:99%" rows="8" cols="50" name="comentGerente" class="comentGerente" id=comentGerente></textarea>
			<br>
            </center>
        </div>
        <a class="btnNextFDP" id="btnSolicitarBaja" href="#">Solicitar baja</a>
    
        <a class="btnNextFDP" id="btnMenu" href="">Men&uacute; principal</a>
  </form>
  
    </div>

    
   	<script type="text/javascript">
    $( "#fecha_ingreso" ).datepicker({
	        dateFormat: "yy-mm-dd",
	        yearRange: "-100:+0",
	        changeYear:true,
        });

    $( "#fecha_efectiva" ).datepicker({
        dateFormat: "yy-mm-dd",
        yearRange: "-100:+0",
        changeYear:true,
    });

    $( "#fecha_fin_Contrato" ).datepicker({
        dateFormat: "yy-mm-dd",
        yearRange: "-100:+0",
        changeYear:true,
    });
    
    </script>    
    
    
      <script type="text/javascript">
$("#btnSolicitarBaja").click(function(){

    		error_campos = [];

    		if( $("#selecUsuario").val() == "" ) {
        		error_campos.push(  "selecUsuario");
        		 $("#selecUsuario").css("border", "2px solid red");
    		}
        		 
    		if( $("#selecEmp").val() == "" ) {
        		error_campos.push( "selecEmp");
        		$("#selecEmp").css("border", "2px solid red");
        		}

    		if( $("#selecPuesto").val() == "" ) {
        		error_campos.push( "selecPuesto");
        		$("#selecPuesto").css("border", "2px solid red");
        		}

    		if( $("#fecha_ingreso").val() == "" ) {
        		error_campos.push( "fecha_ingreso");
        		$("#fecha_ingreso").css("border", "2px solid red");
        		}

    		if( $("#selecOficina").val() == "" ) {
        		error_campos.push( "selecOficina");
        		$("#selecOficina").css("border", "2px solid red");
        		}


    		if( $("#descanso").val() == "" ) {
        		error_campos.push( "descanso");
        		$("#descanso").css("border", "2px solid red");
        		}


    		if( $("#selecMotivo").val() == "" ) {
        		error_campos.push( "selecMotivo");
        		$("#selecMotivo").css("border", "2px solid red");
        		}


    		if( $("#selecSolicita").val() == "" ) {
        		error_campos.push( "selecSolicita");
        		$("#selecSolicita").css("border", "2px solid red");
        		}


    		if( $("#fecha_efectiva").val() == "" ) {
        		error_campos.push( "fecha_efectiva");
        		$("#fecha_efectiva").css("border", "2px solid red");
        		}


    		if( $("#selecSueldo").val() == "" ) {
        		error_campos.push( "selecSueldo");
        		$("#selecSueldo").css("border", "2px solid red");
        		}


    		if( $("#horario").val() == "" ) {
        		error_campos.push( "horario");
        		$("#horario").css("border", "2px solid red");
        		}


    		if( $("#fecha_fin_Contrato").val() == "" ) {
        		error_campos.push( "fecha_fin_Contrato");
        		$("#fecha_fin_Contrato").css("border", "2px solid red");
        		}

    		
    		
    		
    		if( error_campos.length  == 0 )
    		{


    			


    				 
    		    $.ajax({
                    url: '<?= base_url(); ?>Gerente/SolicitudBajaPersonal',
                    type: 'POST',
                    dataType: 'json',
                    data: $('#form1').serialize(),
                    cache: false,
                    async: false,
                    success: function(response) {
                        if (response.codigo==200) {
                        	$("#guarda").html("Solicitud guardada correctamente..");
                           
                        } else {
                        	$("#resultado").html("Favor de intentar nuevamente..");
                            
                        }
                    },
                    error: function(jqXHR, textStatus, errorThrown) {
                    //	$("#resultado").html("Favor de intentar nuevamente..");
                       alert(jqXHR.responseText);
                    }
                });
    			
    			
    		}
    		else
    		{	
        		
    			$("#resultado").html("Favor de revisar campos obligatorios marcados con rojo..");


    			
    		}


    		
	  });


</script>