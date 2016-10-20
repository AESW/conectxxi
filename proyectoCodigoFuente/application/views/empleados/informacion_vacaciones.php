
<div class="content_generic">
    <div style="width: 100%" class="block_box_gen">
     <h2><label>Información del empleado</label></h2>
     
           	<div id="resultado" style="color:red;font-weight: bold;margin-bottom: 15px;"	></div>
       		 <p><span id="guarda" style="font-weight: bold; text-align: center;font-size: 13pt; color: #00db05"></span></p>
        <form id="formVacaciones" name="formVacaciones"> 
       <center>
        <table cellpadding="0" cellspacing="0" width="70%">
           <?php 
	                                                   
	                                                if( !empty($DatosEmpleados) ):    
	                                                    foreach($DatosEmpleados as  $v){ ?>
            <tr>
                <td>Fecha de ingreso</td>
                <td><input type="text"name="fechIngreso" style="width:100% " class="fechIngreso" id="fechIngreso" value="<?php echo $v['fechaIngreso']?>" readonly ></td>
            </tr>
            <tr>
                <td>Empleado</td>
                <td><input style="margin-top: 15px; margin-bottom: 15px;width:100% " type="text" name="diasTot" class="diasTot" id="diasTot" value="<?php echo $v['nombreUsuario']?>" readonly ></td>
            </tr>
              <?php 
	                                                   
	                                                    } 
	                                                    endif;
	                                                ?>
        </table>
        </center>
        <h2><label>Resumen de periodos vigentes</label></h2>
        <br>
        <center>
        <table cellpadding="0" cellspacing="0" width="80%">
           <thead>
                                    <tr>
                                    <th>Periodo</th>
                                   <th >Dias otorgados</th>
                                         <th >Dias restantes</th>
                                         <th >Prescriben</th>
                                         <th >Fecha Otorgación</th>
										  
                                    </tr>
                                </thead>
                                 <?php 
	                                                   
	                                                if( !empty($arrayVacaciones) ):    
	                                                    foreach($arrayVacaciones as  $v){ ?>
	                                                 
                                   <tr class="odd gradeX">
                                        <td><?php echo $v['Periodo']?></td>
                                        <td><?php echo $v['DiasOtorgados']?></td>
                                          <td><?php echo $v['DiasRestantes']?></td>
                                           <td><?php echo $v['Prescriben']?></td>
                                        <td><?php echo $v['FechaOtorgacion']?></td>
                                    </tr>
             <?php 
	                                                   
	                                                    } 
	                                                    endif;
	                                                ?>
              
        </table>
        </center>
        <br>
          <h2><label>Solicitud de vacaciones</label></h2>
          <input  type="hidden" name="diasDisp" class="diasDisp allownumericwithoutdecimal" id="diasDisp" maxlength="5" value="<?php echo $v['DiasDisponibles']?>" >
       <center>
        <table cellpadding="0" cellspacing="0" width="50%">
             <br>
             <tr>
                <td>Días pedidos</td>
                <td><input  type="text" name="diasPed" class="diasPed allownumericwithoutdecimal" id="diasPed" maxlength="5" ></td>
            </tr>
           <td > .</td>
            <tr>
                <td>Fecha de inicio de vacaciones</td>
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
        </center>
        
        </form>
        <br>
        <a class="btnNextFDP" id="btnMenu">Men&uacute; principal</a>
        <a class="btnNextFDP" id="btnSolicitar">Solicitar</a>
        <br>
        <br>
        <br>
    </div>
    
    
         
          	<script type="text/javascript">
    $( "#fecha_inicio" ).datepicker({
	        dateFormat: "dd-mm-yy",
	        yearRange: "-100:+0",
	        changeYear:true,
        });

    $( "#fecha_fin" ).datepicker({
        dateFormat: "dd-mm-yy",
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

    		
    		
    		if( error_campos.length  == 0 )
    		{
    			

    			 $diasSolicitados=$("#diasPed").val();
    			 $diasDisponibles=$("#diasDisp").val();

                 $fecInicio=$("#fecha_inicio").val();
                 $fecFin=$("#fecha_fin").val();


                 var f1 = $fecInicio;
                 var f2= $fecFin;
                 $fechascalendario=(restaFechas(f1,f2))+1;

                 if($fechascalendario==$diasSolicitados)
                 {
    			 
    			 if( Number($diasSolicitados)<=Number($diasDisponibles))
    			 {
    				 
    		    $.ajax({
                    url: '<?php echo HOME_URL; ?>MovEmpleados/GuardaVacaciones',
                    type: 'POST',
                    dataType: 'json',
                    data: $('#formVacaciones').serialize(),
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
    				 $("#resultado").html("Dias insuficientes..");
    			 }
                 }
    			 else
    			 {
    				 $("#resultado").html("El numero de dias solicitados no coincide con las fechas del calendario..");
    			 }
                 
    		}
    		else
    		{	
        		
    			$("#resultado").html("Favor de revisar campos obligatorios marcados con rojo..");


    			
    		}


    		
	  });




$(".allownumericwithoutdecimal").on("keypress keyup blur",function (event) {    
    $(this).val($(this).val().replace(/[^\d].+/, ""));
    console.log(event.which);
     if ((event.which < 48 || event.which > 57)) {
         if( event.which != 43 && event.which != 8 &&  event.which != 46){
	            event.preventDefault();
         }
         
     }
 });

</script>
        
        
        <script type="text/javascript">
        restaFechas = function(f1,f2)
 {
 var aFecha1 = f1.split('-'); 
 var aFecha2 = f2.split('-'); 
 var fFecha1 = Date.UTC(aFecha1[2],aFecha1[1]-1,aFecha1[0]); 
 var fFecha2 = Date.UTC(aFecha2[2],aFecha2[1]-1,aFecha2[0]); 
 var dif = fFecha2 - fFecha1;
 var dias = Math.floor(dif / (1000 * 60 * 60 * 24)); 
 return dias;
 }
 </script>         
    
    