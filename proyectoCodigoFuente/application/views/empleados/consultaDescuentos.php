<link rel='stylesheet' type='text/css' href='<?php echo HOME_URL; ?>assets/plugins/datatables/dataTables.css' />


<script type='text/javascript' src='<?php echo HOME_URL; ?>assets/js/jquery-1.10.2.min.js'></script> 
<script type='text/javascript' src='<?php echo HOME_URL; ?>assets/plugins/datatables/jquery.dataTables.js'></script> 
<script type='text/javascript' src='<?php echo HOME_URL; ?>assets/plugins/datatables/dataTables.bootstrap.js'></script> 
<script type='text/javascript' src='<?php echo HOME_URL; ?>assets/plugins/datatables/demo-datatables.js'></script> 




<div id="tab-container" class="tab-container">
		 <div class='panel-container'>
			
            
                 <a href="javascript:history.back()"> Regresar</a>
			 
			
			    <h2><label>.</label></h2>
			    
				   
				       <table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered datatables" id="example">
                                <thead>
                                    <tr>
                                    <th>Empleado</th>
                                    <th>Concepto</th>
                                      <th>Importe</th>
                                        <th >Movimiento</th>
										  <th >Fecha</th>
										  
                                    </tr>
                                </thead>
                                <tbody>
                                
                                 <?php 
	                                                   
	                                                if( !empty($descuentos) ):    
	                                                    foreach($descuentos as  $v){ 
	                                                
	                                                   $mov=$v['movimiento'];
	                                                   
	                                                   
	                                                   if($mov==1)
	                                                   {
	                                                   	
	                                                   	$movFinal='Descuento';
	                                                   	
	                                                   }
	                                                   
	                                                   if($mov==2)
	                                                   {
	                                                   	 
	                                                   	$movFinal='Abono';
	                                                   	 
	                                                   }
	                                                    	
	                                                    	
	                                                    	?>
                                
                                    <tr class="odd gradeX">
                                        <td><?php echo $v['nombreUsuario']?></td>
                                        <td><?php echo $v['concepto']?></td>
                                          <td><?php echo $v['Importe']?></td>
                                          <td><?php echo $movFinal?></td>
                                          <td><?php echo $v['movimientoFecha']?></td>
                                       
                                    </tr>
                                       
                                       
                                       
                                        
                                           
                                      
                                      
                                
                                  <?php 
	                                                   
	                                                    } 
	                                                    endif;
	                                                ?>
                                  
                                
                                </tbody>
                            
				   
				   
				   
				   
				  
			    </table>
			    
	   
		
			  
			   
			   
			  </div>
			  <!-- End Paso 3 -->
			  
			
		  </div>
