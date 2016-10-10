
<div class="content_generic">
    <div style="width: 100%" class="block_box_gen">
        <h2><label>Solicitud de cambio de turno</label></h2>
        
        <div id="resultados" style="color:red;font-weight: bold;margin-bottom: 15px;"	></div>
       		 <p><span id="guarda" style="font-weight: bold; text-align: center;font-size: 13pt; color: #00db05"></span></p>
		

<form id="formturno" name="formturno"> 
        
        <table style=" border-collapse: separate; border-spacing:  10px" cellpadding="0" cellspacing="0" width="80%">
            <br>
            <tr>
                <td><label>Turno actual</label></td>
                <td>	<select style="width: 175px"name="turno_actual" class="turno_actual" id="turno_actual" readonly >
                       
                       
                         <?php
                         
                         
                         foreach( $turno as  $per ):
                         
                       $turno=$per->valorMetaDatos;
                         									 
                         									  endforeach;
                         
									  foreach( $Catalogos as  $per ):
								  
									  if($per->ObjetosNombre=='turno')
									  {
									  $valor= $per->id;
									  $turnoTexto= $per->valor;
									 
									  
									  ?>
								  
								   <option value="<?php echo $turnoTexto; ?>" <?php if( $turno == $valor ): echo "selected='selected'"; endif;?>><?php echo $turnoTexto; ?></option>
								  
								  
								  		 
								  <?php
									  }
									 
									  endforeach;
								  ?>
								  
</td>
            </tr>
            <tr>
                <td><label>Fecha de aplicaci&oacute;n</label></td>
                <td>	<input type="text" onfocus="this.blur()" name="fecha_inicio" class="fecha_inicio" id="fecha_inicio" placeholder="dd/mm/YYYY" autocomplete="off" required >
</td>
            </tr>
            <tr>
                <td><label>Turno</label></td>
                <td><select style="width: 175px"name="turno" class="turno" id="turno">
                        <option value="">Seleccione turno</option>
                        <?php
									  foreach( $Catalogos as  $per ):
								  
									  if($per->ObjetosNombre=='turno')
									  {
									  $valor= $per->valor;
									  
									  ?>
								  
								  
								  
								  		  <option value="<?php echo $valor; ?>" ><?php echo $valor; ?></option>
								  <?php
									  }
									 
									  endforeach;
								  ?>
                </td> 
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
        <a class="btnNextFDP" id="btnMenu">Men&uacute; principal</a>
    
        <a class="btnNextFDP" id="btnSolicitarCambio">Solicitar cambio</a>

        <br>
        <br>
        <br>
    </div>
    
    
     
<script type="text/javascript">
$("#btnSolicitarCambio").click(function(){

    		error_campos = [];
    		if( $("#fecha_inicio").val() == "" ) {
        		error_campos.push(  "fecha_inicio");
        		 $("#fecha_inicio").css("border", "2px solid red");
    		}

    		if( $("#turno").val() == "" ) {
        		error_campos.push(  "turno");
        		 $("#turno").css("border", "2px solid red");
    		}
        
    		
    		
    		
    		if( error_campos.length  == 0 )
    		{


    			var nuevo_turno=$("#turno").val();
    			var turno_actual=$("#turno_actual").val();


    			if(nuevo_turno!=turno_actual)
    			
    			{

    				 
    		    $.ajax({
                    url: '<?php echo HOME_URL; ?>MovEmpleados/GuardaTurno',
                    type: 'POST',
                    dataType: 'json',
                    data: $('#formturno').serialize(),
                    cache: false,
                    async: false,
                    success: function(response) {
                        if (response.codigo==200) {
                        	$("#guarda").html("Solicitud guardada correctamente..");
                        	$("#resultados").html("");
                           
                        } else {
                        	$("#resultados").html("Favor de intentar nuevamente..");
                            
                        }
                    },
                    error: function(jqXHR, textStatus, errorThrown) {
                    	$("#resultados").html("Favor de intentar nuevamente..");
                       
                    }
                });
    			}
    			else
    			{

    				$("#resultados").html("Seleccione otro turno..");
    			}
    			
    		}
    		else
    		{	
        		
    			$("#resultados").html("Favor de revisar campos obligatorios marcados con rojo..");


    			
    		}


    		
	  });


</script>
        
          	<script type="text/javascript">
    $( "#fecha_inicio" ).datepicker({
	        dateFormat: "yy-mm-dd",
	        yearRange: "-100:+0",
	        changeYear:true,
        });

   

    
    </script>  