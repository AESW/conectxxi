  <div class="content_generic">
        <div style="width: 99%" class="block_box_gen">
            <h2>Alta de incapacidades empleados</h2>
            <br>
            <form  name="form1" id="form1" method="POST" >
            <p><span id="resultado" style="color:red;font-weight: bold;margin-bottom: 15px;"></span></p>
        <p><span id="guarda" style="font-weight: bold; text-align: center;font-size: 13pt; color: #00db05"></span></p>
        <br>
            <label>Seleccionar Empleado</label>
            <select  name="selecEmp" class="selecEmp" id="selecEmp">
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
								  
               
               
               
            </select>
            <br>
            <br>
           
            <table cellpadding="0" cellspacing="0" width="100%">
                <tr>
                    <td><label>N&uacute;mero de incapacidad</label></td>
                    <td><input style="width: 80px" type="text" name="incap" class="incap" id=incap></td>
                </tr>  
                <tr>
                    <td><label>Inicio</label></td>
                    <td><label>Fin</label></td>
                </tr>
                <tr>
                
				
                    <td><input type="text" onfocus="this.blur()" name="fecha_inicio_incapacidad" class="fecha_inicio_incapacidad" id="fecha_inicio_incapacidad" placeholder="dd/mm/YYYY" autocomplete="off" required ></td>
             
                    <td><input type="text" onfocus="this.blur()" name="fecha_fin_incapacidad" class="fecha_fin_incapacidad" id="fecha_fin_incapacidad" placeholder="dd/mm/YYYY" autocomplete="off" required ></td>
             
                </tr>                        
            </table>
            <br>
            <br>

        </div>
        <a class="btnNextFDP" id="btnMenu" href="">Men&uacute; principal</a>
        <a class="btnNextFDP" id="btnGuardar" href="#">Guardar</a>
</form>
    </div>
    
   	<script type="text/javascript">
    $( "#fecha_fin_incapacidad" ).datepicker({
	        dateFormat: "yy-mm-dd",
	        yearRange: "-100:+0",
	        changeYear:true,
        });

    $( "#fecha_inicio_incapacidad" ).datepicker({
        dateFormat: "yy-mm-dd",
        yearRange: "-100:+0",
        changeYear:true,
    });

    
    </script> 
    
      <script type="text/javascript">
$("#btnGuardar").click(function(){

    		error_campos = [];
    		if( $("#selecEmp").val() == "" ) {
        		error_campos.push(  "selecEmp");
        		 $("#selecEmp").css("border", "2px solid red");
    		}
        		 
    		if( $("#incap").val() == "" ) {
        		error_campos.push( "incap");
        		$("#incap").css("border", "2px solid red");
        		}

    		if( $("#fecha_fin_incapacidad").val() == "" ) {
        		error_campos.push( "fecha_fin_incapacidad");
        		$("#fecha_fin_incapacidad").css("border", "2px solid red");
        		}

    		if( $("#fecha_inicio_incapacidad").val() == "" ) {
        		error_campos.push( "fecha_inicio_incapacidad");
        		$("#fecha_inicio_incapacidad").css("border", "2px solid red");
        		}
    	
    		
    		
    		if( error_campos.length  == 0 )
    		{


    			


    				 
    		    $.ajax({
                    url: '<?= base_url(); ?>Gerente/AltaIncapacidad',
                    type: 'POST',
                    dataType: 'json',
                    data: $('#form1').serialize(),
                    cache: false,
                    async: false,
                    success: function(response) {
                        if (response.codigo==200) {
                        	$("#guarda").html("Incapacidad guardada correctamente..");
                           
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