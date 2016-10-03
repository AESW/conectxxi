
<div class="content_generic">
    <div style="width: 100%" class="block_box_gen">
     <h2><label>Información de vacaciones del empleado</label></h2>
     
           	<div id="resultado" style="color:red;font-weight: bold;margin-bottom: 15px;"	></div>
       		 <p><span id="guarda" style="font-weight: bold; text-align: center;font-size: 13pt; color: #00db05"></span></p>
        <table cellpadding="0" cellspacing="0" width="80%">
           
            <tr>
                <td>Fecha de ingreso</td>
                <td><input type="text"name="fechIngreso" class="fechIngreso" id="fechIngreso"></td>
            </tr>
            <tr>
                <td>Días totales disponibles</td>
                <td><input style="margin-top: 15px; margin-bottom: 15px"type="text" name="diasTot" class="diasTot" id="diasTot"></td>
            </tr>
             
        </table>
        <h2><label>Información del Periodo</label></h2>
        <table cellpadding="0" cellspacing="0" width="80%">
          
            <tr>
                <td>Días pedidos</td>
                <td><input style="margin-left:14%" type="text" name="diasPed" class="diasPed" id="diasPed"></td>
            </tr>
            <tr>
                <td>Días disponibles</td>
                <td><input style="margin-top: 15px; margin-bottom: 15px; margin-left: 14%" type="text" name="diasDisp" class="diasDisp" id="diasDisp"></label></td>
            </tr>
            <br>   
        </table>
        <br>
          <h2><label>Solicitud de vacaciones</label></h2>
        <table cellpadding="0" cellspacing="0" width="80%">
            <br>
            <tr>
                <td>Introducir fecha de inicio de vacaciones</td>
                <td><input type="text" onfocus="this.blur()" name="fecha_inicio" class="fecha_inicio" id="fecha_inicio" placeholder="dd/mm/YYYY" autocomplete="off" required ></td>
               
            </tr>
            <tr  >
            <td > .</td>
            </tr>
            <tr>
                <td>Reanudación de labores</td>
                <td><input type="text" onfocus="this.blur()" name="fecha_fin" class="fecha_fin" id="fecha_fin" placeholder="dd/mm/YYYY" autocomplete="off" required ></td>   
            </tr>
        </table>
        <br>
        <a class="btnNextFDP" id="btnMenu">Men&uacute; principal</a>
        <a class="btnNextFDP" id="btnSolicitar">Solicitar</a>
        <br>
        <br>
        <br>
    </div>
    
    
         
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
    
    
         
<script type="text/javascript">
$("#btnSolicitar").click(function(){

    		error_campos = [];
    		if( $("#fecha_fin").val() == "" ) {
        		error_campos.push(  "fecha_fin");
        		 $("#fecha_fin").css("border", "2px solid red");
    		}

    		if( $("#fecha_inicio").val() == "" ) {
        		error_campos.push(  "fecha_inicio");
        		 $("#fecha_inicio").css("border", "2px solid red");
    		}

    		if( $("#diasPed").val() == "" ) {
        		error_campos.push(  "diasPed");
        		 $("#diasPed").css("border", "2px solid red");
    		}

    		if( $("#diasDisp").val() == "" ) {
        		error_campos.push(  "diasDisp");
        		 $("#diasDisp").css("border", "2px solid red");
    		}

    		
    		
    		if( error_campos.length  == 0 )
    		{


    			


    				 
    		    $.ajax({
                    url: '<?php echo HOME_URL; ?>MovEmpleados/GuardaVacaciones',
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
        		
    			$("#resultado").html("Favor de revisar campos obligatorios marcados con rojo..");


    			
    		}


    		
	  });


</script>
        
          
    
    