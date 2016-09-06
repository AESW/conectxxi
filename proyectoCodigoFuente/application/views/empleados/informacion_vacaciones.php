
<div class="content_generic">
    <div style="width: 100%" class="block_box_gen">
     <h2><label>Información de vacaciones del empleado</label></h2>
        <table cellpadding="0" cellspacing="0" width="80%">
            <br>
            <tr>
                <td>Fecha de ingreso</td>
                <td><input type="text"name="fechIngreso" class="fechIngreso" id="fechIngreso"></td>
            </tr>
            <tr>
                <td>Días totales disponibles</td>
                <td><input style="margin-top: 15px; margin-bottom: 15px"type="text" name="diasTot" class="diasTot" id="diasTot"></td>
            </tr>
            <br>   
        </table>
        <h2><label>Información del Periodo</label></h2>
        <table cellpadding="0" cellspacing="0" width="80%">
            <br>
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