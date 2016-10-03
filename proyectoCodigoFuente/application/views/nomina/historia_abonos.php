<div class="content_generic">

    <div style="width: 99%" class="block_box_descuentos">


        <h2><label>Bonos</label></h2>
           <div id="resultados" style="color:red;font-weight: bold;margin-bottom: 15px;"	></div>
       		 <p><span id="guarda" style="font-weight: bold; text-align: center;font-size: 13pt; color: #00db05"></span></p>
        
 <ul>
        <br>
       	<form   id="basicwizard" name="form1" class="form-horizontal" method="POST" action="<?php echo HOME_URL; ?>Nomina/importcsvAbonos" enctype="multipart/form-data" >
        
        <input type="hidden" name="leer" class="form-control" id="leer"  />
					
						  			  	
                               	
					<input type="hidden" name="archivo" class="form-control" id="archivo"  />
        
           <div class="form-group">
                <label class="col-sm-3 control-label">Importar archivo (XLS,XLSX):</label>
                <div class="col-sm-9">
                    <div class="fileinput fileinput-new" data-provides="fileinput"><input type="hidden" value="" name="...">
                        <span class="btn btn-default btn-file">
                          
                           <input type="file" name="userfile" id= "userfile"  accept=".xls,.xlsx">
                          
                           
                        </span>
                        <span class="fileinput-filename"></span>
                       
                    </div>
                </div>
            </div>
         
         
         	 <table cellpadding="0" cellspacing="0" border="0"
												class="table   "   >
    
    <thead>
    
    
    	<tr>
														<th >Nombre del Empleado:</th>
														<th >Fecha:</th>
														
													
													
															
													</tr>
													<tr>
													<th ><input type="text" name="nombre" class="form-control" id="nombre"  /></th>
						
													<th style='width:16%;' >  <div class="input-group">
                      <input type="text" class="form-control" id="datepickerFecha"
															name="datepickerFecha" />
                      <span class="input-group-addon" id="datepickerbtn2"><i class="glyphicon glyphicon-calendar"></i></span>
                    </div></th>
                    <th>   <a class="btnNextFDP" id="btnBuscar">Buscar</a></th>
													
													</tr>
													</thead>
													</table>
        
        <table id="Usuarios" name="Usuarios" style="border-collapse:collapse;margin-left:1%" cellpadding="0" cellspacing="0" width="100%" >
            <tr>
                <th>NUMERO DE EMPLEADO</th>
                <th>NOMBRE DEL EMPLEADO</th>
                <th>CONCEPTO</th>
                <th>IMPORTE</th>
                <th>TIPO DE MOVIMIENTO</th>
                  <th>FECHA</th>
              
</tr>
             
          
            	<?php 
								
								  if( !empty($Abonos) ):
								  foreach($Abonos as  $t){
								  	
								  	if($t["movimiento"]==2)
								  	{
								  		$mov="Bono";
								  	}
								  	
								  	?>
								  
					 <tr> 			  	           
                <td><?php echo $t["numeroEmpleado"]; ?></td>
                <td><?php echo $t["nombreEmpleado"]; ?></td>
                <td><?php echo $t["concepto"]; ?></td>
                <td><?php echo $t["Importe"]; ?></td>
                <td><?php echo $mov ?></td>
                <td><?php echo $t["movimientoFecha"]; ?></td>
                 </tr>  
                  <?php	  
								  }
									  endif;
								  ?> 
                
                

  
        </table>
        <br>
        <br>
        
        
      
        


        <a class="btnNextFDP" id="btnMenu">Men&uacute; principal</a>


       
       </form>
        <br>
        <br>
        <br>
         </ul>
    </div>
    
  
    
       <script type="text/javascript">
            $(document).ready(function(){
                $('#userfile').change( function (){
                	archivo = $('#userfile').val();
var valor="1";
                	document.form1.leer.value=valor;

                	
                	 
                	document.forms["basicwizard"].submit();

                	
                                  
                
            });
            
              
            
        });

            </script>
            
                <script>
  $(function() {
    $( "#datepickerFecha" ).datepicker({ dateFormat: 'yy/mm/dd' });
  });
  </script>
  
  
  
  <script type="text/javascript">
$("#btnBuscar").click(function(){

    		
    		if( $("#datepickerFecha").val() == "" && $("#nombre").val() == "") {
        		
    			$("#resultados").html("Favor de capturar en criterio de búsqueda..");
    	                  
    		}
    		else
    		{	
    			var empresa = $('#nombre').val();
    			var fecha = $('#datepickerFecha').val();

    			$.post("<?php echo HOME_URL; ?>Nomina/BuscarAbono", {
                	  empresa : empresa, fecha : fecha
                  }, function(data) {
                      $("#Usuarios").html(data);
                 });
		
    	    			
    		}


    		
	  });


</script>