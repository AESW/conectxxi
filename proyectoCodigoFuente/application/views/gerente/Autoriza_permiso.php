 <div class="content_generic">
            <div style="width: 99% " class="block_box_gen">
 
        <h2><label>Solicitud de Permiso</label></h2>
        
       		<div id="resultado" style="color:red;font-weight: bold;margin-bottom: 15px;"	></div>
       		 <p><span id="guarda" style="font-weight: bold; text-align: center;font-size: 13pt; color: #00db05"></span></p>
		

<form id="formGerente" name="formGerente"> 
<br>
        <table cellpadding="0" cellspacing="0" width="100%" style="border-collapse: separate; border-spacing: 10px 5px;">
         
          <?php
                                        if(!empty( $Datosusuarios ) ):
                                        foreach($Datosusuarios as $fila)
                                        {
                                        ?>
         
           <tr>
                <td>Solicita: </td>
                <td>
           		<input type="text"  style="width: 50%" name="usuario" class="usuario" id="usuario" value="<?php echo $fila["nombreUsuario"]; ?>" required readonly >
	<input type="hidden"  style="width: 50%" name="idPermiso" class="idPermiso" id="idPermiso" value="<?php echo $fila["IdPermiso"]; ?>" required >
              </td>
              
            </tr>   
           
            <tr>
                <td>Fecha de inicio: </td>
                <td>
           		<input type="text" onfocus="this.blur()" name="fecha_inicio" class="fecha_inicio" id="fecha_inicio" placeholder="dd/mm/YYYY" value="<?php echo $fila["fecha_inicio"]; ?>" autocomplete="off" required readonly >

              </td>
              
            </tr>                        

            <tr>
                <td>Fecha de fin: </td>
            <td>
            		<input type="text" onfocus="this.blur()" name="fecha_fin" class="fecha_fin" id="fecha_fin" placeholder="dd/mm/YYYY" value="<?php echo $fila["fecha_fin"]; ?>" autocomplete="off" required readonly >
            
                </td>
             
            </tr>
            
            <tr>
                <td colspan="3"> <label style="margin-left:45%; margin-top: 30px">Observaciones</label></td>
            </tr>

            <tr>
                <td colspan="3"> <textarea style="width: 100%" name="comentarios" readonly rows="10" cols="40"><?php echo $fila["observaciones"]; ?></textarea></td>
            </tr>
            
              <?php
                                        }
                                        endif;
                                        ?>     
</table>
   
   

    
        <a class="btnNextFDP" id="btnSolicitar">Autorizar Permiso</a>
        
        <br>
        <br>
        <br>
        </form>
        
      </div>
    </div> 
 
     
  
<script type="text/javascript">
$("#btnSolicitar").click(function(){

    		error_campos = [];
    		if( $("#fecha_inicio").val() == "" ) {
        		error_campos.push(  "fecha_inicio");
        		 $("#fecha_inicio").css("border", "2px solid red");
    		}

    		if( $("#fecha_fin").val() == "" ) {
        		error_campos.push(  "fecha_fin");
        		 $("#fecha_fin").css("border", "2px solid red");
    		}
        
    		
    		
    		
    		if( error_campos.length  == 0 )
    		{


    			


    				 
    		    $.ajax({
                    url: '<?php echo HOME_URL; ?>Gerente/AutorizaPermiso',
                    type: 'POST',
                    dataType: 'json',
                    data: $('#formGerente').serialize(),
                    cache: false,
                    async: false,
                    success: function(response) {
                        if (response.codigo==200) {
                        	$("#guarda").html("Permiso autorizado correctamente..");
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
        
          	<script type="text/javascript">
    $( "#fecha_inicio" ).datepicker({
	        dateFormat: "yy-mm-dd",
	        yearRange: "-100:+0",
	        changeYear:true,
        });

    $( "#fecha_fin" ).datepicker({
        dateFormat: "yy-mm-dd",
        yearRange: "-100:+0",
        changeYear:true,
    });

    
    </script>    