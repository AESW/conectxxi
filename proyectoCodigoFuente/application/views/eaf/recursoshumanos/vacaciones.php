
<div class="content_generic">
    <div style="width: 100%" class="block_box_gen">
        <h2><label>Solicitud Vacaciones</label></h2>
        
        <div id="resultado" style="color:red;font-weight: bold;margin-bottom: 15px;"	></div>
       		 <p><span id="guarda" style="font-weight: bold; text-align: center;font-size: 13pt; color: #00db05"></span></p>
		

<form id="formVacaciones" name="formVacaciones"> 
        
        <table style=" border-collapse: separate; border-spacing:  10px" cellpadding="0" cellspacing="0" width="80%">
            <br>
            
               <?php
                                        if(!empty( $Datosusuarios ) ):
                                        foreach($Datosusuarios as $fila)
                                        {
                                        ?>
          
           <tr>
                <td>Solicita: </td>
                <td>
           		<input type="text"  style="width: 80%" name="usuario" class="usuario" id="usuario" value="<?php echo $fila["nombreUsuario"]; ?>" required readonly>
	<input type="hidden"  style="width: 50%" name="idVacaciones" class="idVacaciones" id="idVacaciones" value="<?php echo $fila["idSolVacaciones"]; ?>" required readonly >
               <input type="hidden"  style="width: 50%" name="idUsuario" class="idUsuario" id="idUsuario" value="<?php echo $fila["idUsuarios"]; ?>" required readonly >
              </td>
              
            </tr>
            
            <tr>
                <td>Dias solicitados: </td>
                <td>
           		<input type="text"  style="width: 80%" name="DiasSol" class="DiasSol" id="DiasSol" value="<?php echo $fila["dias"]; ?>" required readonly>
	          </td>
              
            </tr>
             <tr>
                <td>Periodo: </td>
                <td>
           		<input type="text"  style="width: 80%" name="Periodo" class="Periodo" id="Periodo" value="<?php echo $fila["Periodo"]; ?>" required readonly>
	          </td>
              
            </tr>
            
            <tr>
                <td>Fecha de inicio de vacaciones</td>
                <td>	<input type="text" onfocus="this.blur()" name="fecha_inicio" class="fecha_inicio" id="fecha_inicio" value="<?php echo $fila["fechaSalida"]; ?>" placeholder="dd/mm/YYYY" autocomplete="off" required readonly >
</td>
            </tr>
            <tr>
                 <td>Reanudaci&oacute;n de labores</td>
                <td>	<input type="text" onfocus="this.blur()" name="fecha_inicio" class="fecha_inicio" id="fecha_inicio" value="<?php echo $fila["fechaEntrada"]; ?>" placeholder="dd/mm/YYYY" autocomplete="off" required readonly >
</td>
            </tr>
            <tr>
                <td>Observaciones Gerente</td>
            </tr>
        </table>  
        <center>
            <textarea style="width: 90%; height: 20%" name="observaciones" class="observaciones" id="observaciones" readonly ><?php echo $fila["observaGerente"]; ?></textarea></td> 
        </center>

    <?php
                                        }
                                        endif;
                                        ?>  
</form>
        <br>
        <br>
        <br>
        <br>
        <br>
        <a class="btnNextFDP" id="btnMenu">Men&uacute; principal</a>
    
        <a class="btnNextFDP" id="btnSolicitarCambio">Autorizar</a>

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


    			


    				 
    		    $.ajax({
                    url: '<?php echo HOME_URL; ?>eaf/RecursosHumanos/AutorizaVacaciones',
                    type: 'POST',
                    dataType: 'json',
                    data: $('#formVacaciones').serialize(),
                    cache: false,
                    async: false,
                    success: function(response) {
                        if (response.codigo==200) {
                        	$("#guarda").html("Solicitud autorizada correctamente..");
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
        		
    			$("#resultado").html("Favor de revisar campos obligatorios marcados con rojo..");


    			
    		}


    		
	  });


</script>
        
          