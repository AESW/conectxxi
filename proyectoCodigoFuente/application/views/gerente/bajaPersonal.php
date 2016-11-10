 <div class="content_generic">
            <div style="width: 99%" class="block_box_gen">
                <h2>Solicitud de Baja de Personal</h2>
               
                <form  name="form1" id="form1" method="POST" >
                    <p><span id="resultado" style="color:red;font-weight: bold;margin-bottom: 15px;"></span></p>
                    <p><span id="guarda" style="font-weight: bold; text-align: center;font-size: 13pt; color: #00db05"></span></p>
                    <br>
                      <div style="text-align:center;">
                        <table cellpadding="0" cellspacing="0"   style="margin: 0 auto;" >
                                          <tr >
                            <td>Nombre del Empleado .</td>
                            <td> <select  name="selecUsuario" class="selecUsuario" id="selecUsuario" style="width:100%;">
                                   

 <?php
                                    if(!empty( $datos ) ):
                                    foreach($datos as $fila)
                                    {
                                    ?>

                                    <option value="<?php echo $fila["idUsuarios"]; ?>"><?php echo $fila["nombreUsuario"]; ?></option>  
                                    <?php
                                    }
                                    
                                    
                                    if(!empty( $personal ) ):
                                    foreach($personal as $fila)
                                    {
                                    	?>
                                    
                                                                        <option value="<?php echo $fila["idUsuarios"]; ?>"><?php echo $fila["nombreUsuario"]; ?></option>  
                                                                        <?php
                                                                        }
                                                                        endif;
                                    
                                    else:
                                    ?>
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
                                                                       
                                    
                                    endif;
                                    ?>


                                   

                               </select></td>
                        </tr>
                         <tr style="height: 5px">
                             </tr>
                           
                        <tr>
                            <td>Fecha de Ingreso</td>
                            <td>
                            
                            <?php
                                    if(!empty( $datos ) ):
                                   
                                    foreach($datos as $fila)
                                    {
                                    ?>
<input type="text" onfocus="this.blur()" name="fecha_ingreso" class="fecha_ingreso" id="fecha_ingreso" placeholder="dd/mm/YYYY" autocomplete="off" required value="<?php echo $fila["fechaAlta"]; ?>" >
                                  
                                    <?php
                                    }
                                    else:
                                    ?>
                                                                       <input type="text" onfocus="this.blur()" name="fecha_ingreso" class="fecha_ingreso" id="fecha_ingreso" placeholder="dd/mm/YYYY" autocomplete="off" required >
                                                                        <?php 
                                    endif;
                                    ?>
                            
                            </td>
                        </tr>
                         <tr style="height: 5px">
                             </tr>
                        <tr >
                            <td>Empresa</td>
                            <td><select  name="selecEmp" class="selecEmp" id="selecEmp" style="width:100%;">
                                    

                                    <?php
                                    if(!empty( $datos ) ):
                                   
                                    foreach($datos as $fila)
                                    {
                                    ?>

                                    <option value="<?php echo $fila["empresa"]; ?>"><?php echo $fila["empresa"]; ?></option>  
                                    <?php
                                    }
                                    else:
                                    ?>
                                                                        <option value="">Seleccione Empresa</option>
                                                                        <?php 
                                    endif;
                                    ?>

                                </select></td>
                        </tr>
                         <tr style="height: 5px">
                             </tr>
                        <tr>
                            <td>D&iacute;a de descanso</td>
                            <td> <select name="descanso" class="descanso" id="descanso"  style="width:100%;" >

                                   
                                    <?php
                                    if(!empty( $datos ) ):
                                   
                                    foreach($datos as $fila)
                                    {
                                    ?>
                                    <option value="<?php echo $fila["descanso"]; ?>"><?php echo $fila["descanso"]; ?></option>

                                    <?php	
                                    }
                                    else:
                                    ?>
                                                                                                          <option value="">Selecciona Día de descanso</option>
                                                                                                            <?php 
                                    endif;
                                    ?>
                                </select></td>
                        </tr>
                         <tr style="height: 5px">
                             </tr>
                        <tr>
                            <td>Puesto</td>
                            <td><select  name="selecPuesto" class="selecPuesto" id="selecPuesto" style="width:100%;">
                                   

                                    <?php
                                    if(!empty(  $datos ) ):
                                     
                                    foreach( $datos as $fila)
                                    {
                                    ?>

                                    <option value="<?php echo $fila["puesto"]; ?>"><?php echo $fila["puesto"]; ?></option>  
                                    <?php
                                    }
                                    else:
                                    ?>
                                                                         <option value="">Seleccione Puesto</option>  
                                                                        <?php
                                    endif;
                                    ?>

                                </select></td>
                        </tr> 
                         <tr style="height: 5px">
                             </tr> 
                        <tr>
                            <td>Ubicaci&oacute;n</td>
                            <td><select  name="selecOficina" class="selecOficina" id="selecOficina" style="width:100%;">
                                     

                                    <?php
                                    if(!empty( $datos ) ):
                                   
                                    foreach($datos as $fila)
                                    {
                                    ?>

                                    <option value="<?php echo $fila["oficina"]; ?>"><?php echo $fila["oficina"]; ?></option>  
                                    <?php
                                    }
                                    else:
                                    ?>
                                                                         <option value="">Seleccione Ubicaci&oacute;n</option>
                                                                        <?php 
                                    endif;
                                    ?>

                                </select></td>
                        </tr>
                         <tr style="height: 5px">
                             <tr>                 
                        <tr>
                            <td>Motivo de la baja</td>
                            <td><select  name="selecMotivo" class="selecMotivo" id="selecMotivo" style="width:100%;">
                                    <option value="">Seleccione motivo de la baja</option>  
                                    <?php
									  foreach( $Catalogos as  $per ):
								  
									  if($per->catalogo=='MOTIVO BAJA PERSONAL')
									  {
									  $valor= $per->valor;
									  
									  ?>
								  
								  
								  
								  		  <option value="<?php echo $valor; ?>" ><?php echo $valor; ?></option>
								  <?php
									  }
									 
									  endforeach;
								  ?>    

                                </select></td>
                        </tr>
                         <tr style="height: 5px">
                             </tr>
                             
                             <!-- 
                        <tr>
                            <td>Quien solicita</td>
                            <td><select  name="selecSolicita" class="selecSolicita" id="selecSolicita" style="width:100%;">
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
                       
 <tr style="height: 5px">
                             </tr>
                               -->
                        <tr>
                            <td>Fecha Efectiva</td>
                            <td><input type="text" onfocus="this.blur()" name="fecha_efectiva" class="fecha_efectiva" id="fecha_efectiva" placeholder="dd/mm/YYYY" autocomplete="off" required ></td>
                        </tr>
                         <tr style="height: 5px">
                             </tr>
                        <tr>
                            <td>Sueldo</td>
                            <td><select  name="selecSueldo" class="selecSueldo" id="selecSueldo" style="width:100%;">
                                  

                                    <?php
                                    if(!empty( $datos ) ):
                                    
                                    foreach($datos as $fila)
                                    {
                                    ?>

                                    <option value="<?php echo $fila["sdi"]; ?>"><?php echo $fila["sdi"]; ?></option>  
                                    <?php
                                    }
                                    else:
                                    ?>
                                                                          <option value="">Seleccione Sueldo</option>  
                                                                          <?php 
                                    endif;
                                    ?>
                               </select></td>
                       </tr> 
                        <tr style="height: 5px">
                             </tr>
                        <tr>
                            <td>Horario</td>
                            <td>
                             <?php
                                    if(!empty( $datos ) ):
                                    
                                    foreach($datos as $fila)
                                    {
                                    ?>

                                    <input type="text" name="horario" readonly class="horario" id=horario value="<?php echo $fila["horario"]; ?>">
                                    <?php
                                    }
                                   
                                    endif;
                                    ?>
                            
                            </td>
                        </tr>
                         <tr style="height: 5px">
                             <tr>
                        <tr>
                            <td>Fin de contrato</td>
                            <td><input type="text" onfocus="this.blur()" name="fecha_fin_Contrato" class="fecha_fin_Contrato" id="fecha_fin_Contrato" placeholder="dd/mm/YYYY" autocomplete="off" required ></td>
                       </tr> 
                    </table>
                    </div>
                    <br>
               
                    <center>
                        Comentarios Gerente
                        <br>
                        <textarea style="width:99%" rows="8" cols="50" name="comentGerente" class="comentGerente" id=comentGerente></textarea>
                        <br>
                    </center>
            </div>
            <center>
            <div style="padding-top: 51%; "  >
            <a class="btnNextFDP" id="btnSolicitarBaja" href="#">Solicitar baja</a>

            <a class="btnNextFDP" id="btnMenu" href="<?php echo HOME_URL; ?>">Men&uacute; principal</a>
            </div>
            </center>
            
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
                    url: '<?php  echo HOME_URL; ?>Gerente/SolicitudBajaPersonal',
                    type: 'POST',
                    dataType: 'json',
                    data: $('#form1').serialize(),
                    cache: false,
                    async: false,
                    success: function(response) {
                        if (response.codigo==200) {
                        	$("#guarda").html("Solicitud guardada correctamente..");
                        	$("#resultado").html("");
                           
                        } else {
                        	$("#resultado").html("Favor de intentar nuevamente..");
                            
                        }
                    },
                    error: function(jqXHR, textStatus, errorThrown) {
                    	$("#resultado").html("Favor de intentar nuevamente..");
                      // alert(jqXHR.responseText);
                    }
                });
    			
    			
    		}
    		else
    		{	
        		
    			$("#resultado").html("Favor de revisar campos obligatorios marcados con rojo..");


    			
    		}


    		
	  });


</script>

 <script type="text/javascript">
    
        $(document).ready(function() {


            
            $("#selecUsuario").change(function() {
                $("#selecUsuario option:selected").each(function() {
                	usuario = $('#selecUsuario').val();


                	 url = "<?php echo HOME_URL; ?>Gerente/BajaPersonal/"+usuario;
                     
                	 window.location.href = url;
                            
                 				
                   
                });
            })
        });
    </script>