	<script type="text/javascript">
    $(document).ready( function() {
      $('#tab-container').easytabs();
      $('#tab-container').bind('easytabs:before', function(evt, tab, panel, data) {
	      $(".step_current").val( $(tab).attr("href").replace("#", ""));
	      
		  return true;
	  });
	 
      if( $("#registro").val() == "1" ) {
    	  $(".step3").trigger("click");
  		}

	  $("#btnNextFDP1").click(function(){
	      $('.page').ScrollTo();
	      $(".step2").trigger("click");
	      //$(".step_current").val('tabs1-paso2');
	      //$(".btn_fire").val("continuar");
	      //$("#form_fdp_conectxxi").submit();
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
			  
			   
		  	</ul>
		  	<div class='panel-container'>
		  	
		   <form  name="form1" id="form1" method="POST" > 
			  <!-- Paso 1 -->
			  <div id="tabs1-paso1">
				
			    <h2><label>Solicitud de Baja de Personal</label></h2>
			    
                      <div style="text-align:center;">
                        <table cellpadding="0" cellspacing="0"   style="margin: 0 auto;" >
                                          <tr >
                            <td>Nombre del Empleado .</td>
                            <td> <select  name="selecUsuario" class="selecUsuario" id="selecUsuario" style="width:100%;">
                                   

 <?php
                                    if(!empty( $Datosusuarios ) ):
                                    foreach($Datosusuarios as $fila)
                                    {
                                    	
                                    	$finiquitoTotal=$fila->finiquitoTotal;
                                    	
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
<input type="text" onfocus="this.blur()" name="fecha_ingreso" class="fecha_ingreso" id="fecha_ingreso" placeholder="dd/mm/YYYY" autocomplete="off" required value="<?php echo $fila->fechaIngreso; ?>" >
                                  
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
                            <td><select  name="selecEmp" class="selecEmp" id="selecEmp" style="width:100%;">
                                    

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
                            <td> <select name="descanso" class="descanso" id="descanso"  style="width:100%;" >

                                   
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
                            <td><select  name="selecPuesto" class="selecPuesto" id="selecPuesto" style="width:100%;">
                                   

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
                            <td><select  name="selecOficina" class="selecOficina" id="selecOficina" style="width:100%;">
                                     

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
                            <td><select  name="selecMotivo" class="selecMotivo" id="selecMotivo" style="width:100%;">
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
                            <td><select  name="selecSolicita" class="selecSolicita" id="selecSolicita" style="width:100%;">
                                  

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

 <input type="text" onfocus="this.blur()" name="fecha_efectiva" class="fecha_efectiva" id="fecha_efectiva" placeholder="dd/mm/YYYY" autocomplete="off" required value="<?php echo $fila->fechaEfectiva; ?>" >                                  
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
                            <td><select  name="selecSueldo" class="selecSueldo" id="selecSueldo" style="width:100%;">
                                  

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

                                  <input type="text" name="horario" class="horario" id="horario" value="<?php echo $fila->horario; ?>">
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

 <input type="text" onfocus="this.blur()" name="fecha_fin_contrato" class="fecha_fin_contrato" id="fecha_fin_contrato" placeholder="dd/mm/YYYY" autocomplete="off" required value="<?php echo $fila->finContrato; ?>" >                                  
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
                        <textarea style="width:99%" rows="8" cols="50" name="comentGerente" class="comentGerente" id=comentGerente><?php echo $fila->comentarios; ?></textarea>
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
			    
			    
			       <a class="btnNextFDP" id="btnNextFDP1">Continuar</a>
			     <div style="clear: both;"></div>
			    <!-- content -->
			  </div>
			  <!-- End Paso 1 -->
			  
			  <!-- Paso 2 -->
			  <div id="tabs1-paso2">	
			    <h2><label>Finiquito</label></h2>
			   
			    <p><span id="resultado" style="color:red;font-weight: bold;margin-bottom: 15px;"></span></p>
                    <p><span id="guarda" style="font-weight: bold; text-align: center;font-size: 13pt; color: #00db05"></span></p>
                    <br>
                      <div style="text-align:center;">
                        <table cellpadding="0" cellspacing="0"   style="margin: 0 auto;" >
                  
                    
           <?php 
                    foreach($DatosFiniquito as $fila)
							{
								
						if ($fila['tipo']==1)
						{
								?>
          
          
            <tr>
                <td >  <?php echo $fila['prefijoMetaDatos']; ?> :</td>
                <td ><input type="text" name="calificacion[]" class="codEti" value="<?php echo $fila['valorMetaDatos']; ?>" id="calificacion" style=" width:100px;height:23px;">
               </td>
                
            </tr>
            
             <?php
						}
						
					            }
					        
                  ?>
                  
                  <tr>
                <td > <label  > MENOS :</label></td>
                <td ></td>
          </tr>
                  
                   <?php 
                    foreach($DatosFiniquito as $fila)
							{
								
						if ($fila['tipo']==2)
						{
								?>
          
          
            <tr>
                <td >  <?php echo $fila['prefijoMetaDatos']; ?> :</td>
                <td ><input type="text" name="calificacion[]" class="codEti" value="<?php echo $fila['valorMetaDatos']; ?>" id="calificacion" style=" width:100px;height:23px;">
               </td>
                
            </tr>
            
             <?php
						}
						
					            }
					        
                  ?>
                  
                    <tr>
                <td > <label  > TOTAL :</label></td>
                <td ><input type="text" name="total_finiquito" class="codEti" value="<?php echo $finiquitoTotal ;?>" id="total_finiquito" style=" width:100px;height:23px;">
               
            </tr>
            
            
               <tr>
                <td > <label  > CHEQUE :</label></td>
                <td ><input type="text" name="cheque" class="cheque" value="" id="cheque" style=" width:100px;height:23px;">
               
            </tr>
        
            
        
                    </table>
                    </div>
			  
			
			      <a class="btnNextFDP" id="btnimprimir">Imprimir Carta Finiquito</a>
				   <a class="btnNextFDP" id="btnfiniquito">Guardar Cheque</a>
				
			    <div style="clear: both;"></div>
			  </div>	 	   
			  <!-- End Paso 2 -->
			  
			 
			  
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
	
	
	
	<script type="text/javascript">

	$("#btnfiniquito").click(function(){

	error_campos = [];
	if( $("#cheque").val() == "" ) {
		error_campos.push(  "cheque");
		 $("#cheque").css("border", "2px solid red");
	}

	if( error_campos.length  == 0 )
	{

	    $.ajax({
                    url: '<?php echo HOME_URL; ?>eaf/RecursosHumanos/GuardaCheque',
                    type: 'POST',
                    dataType: 'json',
                    data: $('#form1').serialize(),
                    cache: false,
                    async: false,
                    success: function(response) {
                        if (response.codigo==200) {
                        	$("#guarda").html("Cheque guardado correctamente, ya puede imprimir la carta finiquito");
                        	$("#resultado").html(" ");
                        	 $('.page').ScrollTo();
                           
                        } else {
                        	$("#resultado").html("Favor de intentar nuevamente..");
                        	 $('.page').ScrollTo();
                            
                        }
                    },
                    error: function(jqXHR, textStatus, errorThrown) {
                    	$("#resultado").html("Favor de intentar nuevamente..");
                    	 $('.page').ScrollTo();
                    //   alert(jqXHR.responseText);
                    }
                });
    			
    		
    			
}
else
{	
	
	$("#resultado").html("Favor de revisar campos obligatorios marcados con rojo..");

	 $('.page').ScrollTo();
	
}

    		
	  });


</script>
	