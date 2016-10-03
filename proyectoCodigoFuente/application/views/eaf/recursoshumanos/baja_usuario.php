 <div class="content_generic">
            <div style="width: 99% " class="block_box_bajaUsuario">
                <h2>Solicitud de Baja de Personal</h2>
               <ul>
                <form  name="form1" id="form1" method="POST" >
                    <p><span id="resultado" style="color:red;font-weight: bold;margin-bottom: 15px;"></span></p>
                    <p><span id="guarda" style="font-weight: bold; text-align: center;font-size: 13pt; color: #00db05"></span></p>
                    <br>
                      <div style="text-align:center;">
                        <table cellpadding="0" cellspacing="0"   style="margin: 0 auto;" >
                                          <tr >
                            <td>Nombre del Empleado .</td>
                            <td> <select  name="selecUsuario" class="selecUsuario" id="selecUsuario" style="width:100%;" readonly >
                                   

 <?php
                                    if(!empty( $Datosusuarios ) ):
                                    foreach($Datosusuarios as $fila)
                                    {
                                    ?>

                                    <option value="<?php echo $fila->idUsuarios; ?>"><?php echo $fila->nombreUsuario; ?></option>  
                                    <?php
                                    }
                                    
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
                                    if(!empty( $Datosusuarios ) ):
                                   
                                    foreach($Datosusuarios as $fila)
                                    {
                                    ?>
<input type="text" onfocus="this.blur()" name="fecha_ingreso" class="fecha_ingreso" readonly id="fecha_ingreso" placeholder="dd/mm/YYYY" autocomplete="off" required value="<?php echo $fila->fechaIngreso; ?>" >
                                  
                                    <?php
                                    }
                                   
                                    endif;
                                    ?>
                            
                            </td>
                        </tr>
                         <tr style="height: 5px">
                             </tr>
                        <tr >
                            <td>Empresa</td>
                            <td><select  name="selecEmp" class="selecEmp" id="selecEmp" readonly style="width:100%;">
                                    

                                    <?php
                                    if(!empty( $Datosusuarios ) ):
                                   
                                    foreach($Datosusuarios as $fila)
                                    {
                                    ?>

                                    <option value="<?php echo $fila->Empresa; ?>"><?php echo $fila->Empresa; ?></option>  
                                   <?php
                                    }                            endif;
                                    ?>

                                </select></td>
                        </tr>
                         <tr style="height: 5px">
                             </tr>
                        <tr>
                            <td>D&iacute;a de descanso</td>
                            <td> <select name="descanso" class="descanso" id="descanso"  readonly style="width:100%;" >

                                   
                                    <?php
                                    if(!empty( $Datosusuarios ) ):
                                   
                                    foreach($Datosusuarios as $fila)
                                    {
                                    ?>
                                    <option value="<?php echo $fila->diaDescanso; ?>"><?php echo $fila->diaDescanso; ?></option>

                                    <?php	
                                    }
                                    endif;
                                    ?>
                                </select></td>
                        </tr>
                         <tr style="height: 5px">
                             </tr>
                        <tr>
                            <td>Puesto</td>
                            <td><select  name="selecPuesto" class="selecPuesto" id="selecPuesto" readonly style="width:100%;">
                                   

                                    <?php
                                    if(!empty(  $Datosusuarios ) ):
                                     
                                    foreach( $Datosusuarios as $fila)
                                    {
                                    ?>

                                    <option value="<?php echo $fila->Puesto; ?>"><?php echo $fila->Puesto; ?></option>  
                                    <?php
                                    }
                                  
                                    endif;
                                    ?>

                                </select></td>
                        </tr> 
                         <tr style="height: 5px">
                             </tr> 
                        <tr>
                            <td>Ubicaci&oacute;n</td>
                            <td><select  name="selecOficina" class="selecOficina" id="selecOficina" readonly style="width:100%;">
                                     

                                    <?php
                                    if(!empty( $Datosusuarios ) ):
                                   
                                    foreach($Datosusuarios as $fila)
                                    {
                                    ?>

                                    <option value="<?php echo $fila->Oficina; ?>"><?php echo $fila->Oficina; ?></option>  
                                    <?php
                                    }
                                                                     endif;
                                    ?>

                                </select></td>
                        </tr>
                         <tr style="height: 5px">
                             <tr>                 
                        <tr>
                            <td>Motivo de la baja</td>
                            <td><select  name="selecMotivo" class="selecMotivo" id="selecMotivo" readonly style="width:100%;">
                                         <?php
                                    if(!empty( $Datosusuarios ) ):
                                    foreach($Datosusuarios as $fila)
                                    {
                                    ?>

                                    <option value="<?php echo $fila->motivoBaja; ?>"><?php echo $fila->motivoBaja; ?></option>  
                                    <?php
                                    }
                                    endif;
                                    ?>
                                      

                                </select></td>
                        </tr>
                         <tr style="height: 5px">
                             </tr>
                        <tr>
                            <td>Quien solicita</td>
                            <td><select  name="selecSolicita" class="selecSolicita" id="selecSolicita" readonly style="width:100%;">
                                  

                                    <?php
                                    if(!empty( $Datosusuarios ) ):
                                    foreach($Datosusuarios as $fila)
                                    {
                                    ?>

                                    <option value="<?php echo $fila->solicita; ?>"><?php echo $fila->solicita; ?></option>  
                                    <?php
                                    }
                                    endif;
                                    ?>


                                </select></td>
                        </tr>  
 <tr style="height: 5px">
                             </tr>
                        <tr>
                            <td>Fecha Efectiva</td>
                            <td>
                            
                                <?php
                                    if(!empty( $Datosusuarios ) ):
                                   
                                    foreach($Datosusuarios as $fila)
                                    {
                                    ?>

 <input type="text" onfocus="this.blur()" name="fecha_efectiva" class="fecha_efectiva" id="fecha_efectiva" readonly placeholder="dd/mm/YYYY" autocomplete="off" required value="<?php echo $fila->fechaEfectiva; ?>" >                                  
                                    <?php
                                    }
                                   
                                    endif;
                                    ?>
                            
                           </td>
                        </tr>
                         <tr style="height: 5px">
                             </tr>
                        <tr>
                            <td>Sueldo</td>
                            <td><select  name="selecSueldo" class="selecSueldo" id="selecSueldo" readonly style="width:100%;">
                                  

                                    <?php
                                    if(!empty( $Datosusuarios ) ):
                                    
                                    foreach($Datosusuarios as $fila)
                                    {
                                    ?>

                                    <option value="<?php echo $fila->sdi; ?>"><?php echo $fila->sdi; ?></option>  
                                    <?php
                                    }
                                   
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
                                    if(!empty( $Datosusuarios ) ):
                                   
                                    foreach($Datosusuarios as $fila)
                                    {
                                    ?>

                                  <input type="text" name="horario" class="horario" id="horario" readonly value="<?php echo $fila->horario; ?>">
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
                            <td>
                              <?php
                                    if(!empty( $Datosusuarios ) ):
                                   
                                    foreach($Datosusuarios as $fila)
                                    {
                                    ?>

 <input type="text" onfocus="this.blur()" name="fecha_fin_contrato" class="fecha_fin_contrato" readonly id="fecha_fin_contrato" placeholder="dd/mm/YYYY" autocomplete="off" required value="<?php echo $fila->finContrato; ?>" >                                  
                                    <?php
                                    }
                                   
                                    endif;
                                    ?>
                            </td>
                       </tr> 
                       
                       <!-- 
                         <tr style="height: 5px">
                             </tr>
                        <tr>
                            <td>Importe de Finiquito</td>
                            <td>
                           
                                  <input type="text" name="finiquito" class="finiquito" id="finiquito" >
                                   
                           </td>
                        </tr>
                          <tr style="height: 5px">
                             </tr>
                        <tr>
                            <td>No. de Cheque</td>
                            <td>
                           

                                  <input type="text" name="cheque" class="cheque" id="cheque" >
                                   
                           </td>
                        </tr>
                         -->
                    </table>
                    </div>
                    <br>
               
                    <center>
                        Comentarios Gerente
                        <br>
                         <?php
                                    if(!empty( $Datosusuarios ) ):
                                   
                                    foreach($Datosusuarios as $fila)
                                    {
                                    ?>
                        <textarea style="width:99%" rows="8" cols="50" name="comentGerente" readonly class="comentGerente" id=comentGerente><?php echo $fila->comentarios; ?></textarea>
                        <?php
                                    }
                                   
                                    endif;
                                    ?>
                        <br>
                    </center>
                    <br>
                     <center>
                       Observaciones
                        <br>
                       
                        <textarea style="width:99%" rows="8" cols="50" name="observaciones" class="observaciones" id=observaciones></textarea>
                       
                        <br>
                    </center>
            </div>
            <a class="btnNextFDP" id="btnSolicitarBaja" href="#">Aprobar baja</a>

            <a class="btnNextFDP" id="btnMenu" href="">Men&uacute; principal</a>
        </form>
</ul>
    </div>
    
  
    
      <script type="text/javascript">
$("#btnSolicitarBaja").click(function(){

    	//	error_campos = [];

    	//	if( $("#finiquito").val() == "" ) {
        	//	error_campos.push(  "finiquito");
        	//	 $("#finiquito").css("border", "2px solid red");
   // 		}
        		 
  //  		if( $("#cheque").val() == "" ) {
    //    		error_campos.push( "cheque");
     //   		$("#cheque").css("border", "2px solid red");
      //  		}

    		

    		
    		
    		
    //		if( error_campos.length  == 0 )
    //		{


    			


    				 
    		    $.ajax({
                    url: '<?php  echo HOME_URL; ?>eaf/RecursosHumanos/AprobarBajaPersonal',
                    type: 'POST',
                    dataType: 'json',
                    data: $('#form1').serialize(),
                    cache: false,
                    async: false,
                    success: function(response) {
                        if (response.codigo==200) {
                        	$("#guarda").html("Solicitud guardada correctamente..");
                        	$("#resultado").html("");
                        	$('.page').ScrollTo()
                           
                        } else {
                        	$("#resultado").html("Favor de intentar nuevamente..");
                            
                        }
                    },
                    error: function(jqXHR, textStatus, errorThrown) {
                    	$("#resultado").html("Favor de intentar nuevamente..");
                      // alert(jqXHR.responseText);
                    }
                });
    			
    			
    		    //	}
    		    //		else
    //		{	
        		
    	//		$("#resultado").html("Favor de revisar campos obligatorios marcados con rojo..");


    			
    	//	}


    		
	  });


</script>

