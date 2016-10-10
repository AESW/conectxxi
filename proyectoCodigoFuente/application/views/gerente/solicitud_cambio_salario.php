
<div class="content_generic">
    <div style="width: 100%" class="block_box_gen">
        <h2><label>Solicitud de cambio de salario</label></h2>
        
        	<div id="resultado" style="color:red;font-weight: bold;margin-bottom: 15px;"	></div>
       		 <p><span id="guarda" style="font-weight: bold; text-align: center;font-size: 13pt; color: #00db05"></span></p>
        
  <form id="formdescanso" name="formdescanso">       
        <table style=" border-collapse: separate; border-spacing:  10px" cellpadding="0" cellspacing="0" width="80%">
            <br>
          
            <tr>
            <td><label>Salario actual:</label></td>
              <?php 
                 if( !empty($descanso) ):    
	                                                    foreach($descanso as  $v){ ?>
                
                <td><input type="text" name="actual" id="actual" readonly value="<?php echo $v["valorMetaDatos"]; ?>">
                </td> 
                 <?php 
	                                                   
	                                                    } 
	                                                    endif;
	                                                ?>
                <td><label>Seleccione el nuevo salario:</label></td>
                <td><select style="width: 175px"name="dia" class="dia" id="dia">
                        <option value="">Seleccione día</option>
                        <option value="lunes">lunes</option>
                          <option value="Martes">Martes</option>
                            <option value="Miércoles">Miércoles</option>
                              <option value="Jueves">Jueves</option>
                                <option value="Viernes">Viernes</option>
                                  <option value="Sábado">Sábado</option>
                                    <option value="Domingo">Domingo</option></select>
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
    		if( $("#dia").val() == "" ) {
        		error_campos.push(  "dia");
        		 $("#dia").css("border", "2px solid red");
    		}

    		
    		
    		if( error_campos.length  == 0 )
    		{


    			var nuevo_dia=$("#dia").val();
    			var dia_actual=$("#actual").val();


    			if(nuevo_dia!=dia_actual)
    			
    			{


    				 
    		    $.ajax({
                    url: '<?php echo HOME_URL; ?>MovEmpleados/GuardaDescanso',
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

    				$("#resultado").html("Seleccione otro dia de descanso..");
    			}
    			
    			
    		}
    		else
    		{	
        		
    			$("#resultado").html("Favor de revisar campos obligatorios marcados con rojo..");


    			
    		}


    		
	  });


</script>
        
          