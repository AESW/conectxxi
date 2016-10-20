
<div class="content_generic">
    <div style="width: 100%" class="block_box_gen">
        <h2><label>Solicitud de cambio de salario</label></h2>
        
        	<div id="resultado" style="color:red;font-weight: bold;margin-bottom: 15px;"	></div>
       		 <p><span id="guarda" style="font-weight: bold; text-align: center;font-size: 13pt; color: #00db05"></span></p>
        
  <form id="formSueldo" name="formSueldo">       
            <table cellpadding="0" cellspacing="0"   style="margin: 0 auto;" >
            <tr >
                            <td>Nombre del Empleado .</td>
                            <td> <select  name="selecUsuario" class="selecUsuario" id="selecUsuario" style="width:100%;">
                                   

 <?php
                                    if(!empty( $CambioSueldoDetalle ) ):
                                    foreach($CambioSueldoDetalle as $fila)
                                    {
                                    ?>

                                    <option ><?php echo $fila["nombreUsuario"]; ?></option>  
                                    
                               </select></td>
                        </tr>
                          <tr style="height: 5px">
                             </tr>
                        <tr >
                            <td>Salario Actual: </td>
                            <td><select  name="salario_actual" class="salario_actual" id="salario_actual" style="width:100%;">
                                  
                                                                        <option value=""><?php echo $fila["SueldoActual"]; ?></option>
                                                                  </select></td>
                        </tr>
                          <tr style="height: 5px">
                             </tr>
                        <tr >
                            <td>Nuevo salarios:</td>
                            <td><select  name="salario_nuevo" class="salario_nuevo" id="salario_nuevo" style="width:100%;">
                                            <option value=""><?php echo $fila["sueldo"]; ?></option>
                                            
                                            
                                                                   </select></td>
                        </tr>
                          <tr style="height: 5px">
                             </tr>
                               <tr>
                <td>Fecha de aplicación:</td>
                <td><input type="text" onfocus="this.blur()" name="fecha_inicio" class="fecha_inicio" id="fecha_inicio" placeholder="dd/mm/YYYY" autocomplete="off" required value="<?php echo $fila["fechaAplicacion"]; ?>" ></td>
               
            </tr>
             <tr style="height: 5px">
                             </tr>
            <tr>
                <td><label>Observaciones Gerente</label></td>
            </tr>
            
        </table>  
        <center>
            <textarea style="width: 90%; height: 20%" name="observaciones" class="observaciones" id="observaciones" readonly ><?php echo $fila["observaciones"]; ?></textarea></td> 
        </center>
       
       
       <input type="hidden" name="idCambio" id="idCambio" value="<?php echo $fila["idSolCambioSalario"]; ?>">
       
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
     
        <a class="btnNextFDP" id="btnSolicitarCambio">Aprobar cambio</a>
        
          <a class="btnNextFDP" id="btnRechazar">Rechazar cambio</a>

        <br>
        <br>
        <br>
    </div>
    
    
      
  <script type="text/javascript">	               

	
	

           $('#btnSolicitarCambio').click(function(event) {

     $.ajax({
	                        url: '<?php echo HOME_URL; ?>Direccion/AprobarCambioSueldo',
	                        type: 'POST',
	                        dataType: 'json',
	                        data: $('#formSueldo').serialize(),
	                        cache: false,
	                        async: true,
	                        success: function(response) {
	                            if (response.codigo == 200) {
	                            	$("#guarda").html(response.mensaje);
	                             	$("#resultado").html("");
	                         
	                            } else {
	                            	$("#resultado").html("Favor de intentar nuevamente..");
	                                
	                            }
	                        },
	                        error: function(jqXHR, textStatus, errorThrown) {
	                         
	                        }
	                    }); 

     
        		
           });



           
        </script>	
        
        
          <script type="text/javascript">	               

	
	

           $('#btnRechazar').click(function(event) {

        	
     $.ajax({
	                        url: '<?php echo HOME_URL; ?>Direccion/RechazarCambioSueldo',
	                        type: 'POST',
	                        dataType: 'json',
	                        data: $('#formSueldo').serialize(),
	                        cache: false,
	                        async: true,
	                        success: function(response) {
	                            if (response.codigo == 200) {
	                            	$("#guarda").html(response.mensaje);
	                             	$("#resultado").html("");
	                         
	                            } else {

	                            	$("#resultado").html("Favor de intentar nuevamente..");
	                            }
	                        },
	                        error: function(jqXHR, textStatus, errorThrown) {
	                         
	                        }
	                    }); 

     
        		
           });



           
        </script>	
        
          