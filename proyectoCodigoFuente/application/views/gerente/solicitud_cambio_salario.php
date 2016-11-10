
<div class="content_generic">
    <div style="width: 100%" class="block_box_gen">
        <h2><label>Solicitud de cambio de salario</label></h2>
        
        	<div id="resultado" style="color:red;font-weight: bold;margin-bottom: 15px;"	></div>
       		 <p><span id="guarda" style="font-weight: bold; text-align: center;font-size: 13pt; color: #00db05"></span></p>
        
  <form id="formdescanso" name="formdescanso">       
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
                        <tr >
                            <td>Salario Actual: </td>
                            <td><select  name="salario_actual" class="salario_actual" id="salario_actual" style="width:100%;">
                                  
                                                                        <option value="">Seleccione Salario</option>
                                                                  </select></td>
                        </tr>
                          <tr style="height: 5px">
                             </tr>
                        <tr >
                            <td>Nuevo salarios:</td>
                            <td><select  name="salario_nuevo" class="salario_nuevo" id="salario_nuevo" style="width:100%;">
                                            <option value="">Seleccione Salario</option>
                                            
                                             <?php
                                            
                                              if(!empty( $salario ) ):
                                    foreach($salario as $fila)
                                    {
                                    	?>
                                    
                                                                        <option value="<?php echo $fila["idSueldos"]; ?>"><?php echo $fila["sueldo"]; ?></option>  
                                                                        <?php
                                                                        }
                                                                        endif;
                                            
                                            ?>
                                                                   </select></td>
                        </tr>
                          <tr style="height: 5px">
                             </tr>
                              <tr>
                <td>Fecha de aplicación:</td>
                <td><input type="text" onfocus="this.blur()" name="fecha_inicio" class="fecha_inicio" id="fecha_inicio" placeholder="dd/mm/YYYY" autocomplete="off" required ></td>
               
            </tr>
             <tr style="height: 5px">
                             </tr>
            <tr>
                <td><label>Observaciones</label></td>
            </tr>
        </table>  
        <center>
            <textarea style="width: 90%; height: 20%" name="observaciones" class="observaciones" id="observaciones"></textarea></td> 
        </center>
</form>
        <br>
        <br>
        <br>
        <br>
        <br>
     
     <center>
        <a class="btnNextFDP" id="btnSolicitarCambio">Solicitar cambio</a>
           <a class="btnNextFDP" id="btnMenu" href="<?php echo HOME_URL; ?>" >Men&uacute; principal</a>
</center>
        
        <br>
    </div>
    
    
      
<script type="text/javascript">
$("#btnSolicitarCambio").click(function(){

    		error_campos = [];
    		if( $("#selecUsuario").val() == "" ) {
        		error_campos.push(  "selecUsuario");
        		 $("#selecUsuario").css("border", "2px solid red");
    		}

    		if( $("#salario_actual").val() == "" ) {
        		error_campos.push(  "salario_actual");
        		 $("#salario_actual").css("border", "2px solid red");
    		}

    		if( $("#salario_nuevo").val() == "" ) {
        		error_campos.push(  "salario_nuevo");
        		 $("#salario_nuevo").css("border", "2px solid red");
    		}

    		if( $("#fecha_inicio").val() == "" ) {
        		error_campos.push(  "fecha_inicio");
        		 $("#fecha_inicio").css("border", "2px solid red");
    		}

    		
    		
    		if( error_campos.length  == 0 )
    		{


    			var nuevo_salario=$("#salario_actual").val();
    			var salario_actual=$("#salario_nuevo").val();


    			if(parseInt(nuevo_salario)!=parseInt(salario_actual))
    			
    			{


    				
    				 
    		    $.ajax({
                    url: '<?php echo HOME_URL; ?>Gerente/GuardaSueldo',
                    type: 'POST',
                    dataType: 'json',
                    data: $('#formdescanso').serialize(),
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
                       
                    }
                });

    			}
    			else
    			{

    				$("#resultado").html("Seleccione otro Sueldo..");
    			}
    			
    			
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

                	
                    $.post("<?php echo HOME_URL; ?>Gerente/SalarioActual", {
                    	usuario : usuario
                    }, function(data) {
                        $("#salario_actual").html(data);
                   });

                 				
                   
                });
            })
        });
    </script>
    
    	<script type="text/javascript">
    $( "#fecha_inicio" ).datepicker({
	        dateFormat: "yy-mm-dd",
	        yearRange: "-100:+0",
	        changeYear:true,
        });

    

    
    </script> 
        
          