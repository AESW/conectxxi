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
                                    <th>Periodo</th>
                                        <th >Dias Solicitados</th>
                                        <th >Fecha Salida</th>
                                        <th >Fecha Regreso</th>
                                        <th >Fecha Autorización</th>
                                        <th >Autoriza</th>
                                        <th >Estatus</th>
							 </tr>
                                </thead>
                                <tbody>
                                
                                 <?php 
	                                                   
	                                                if( !empty($vacaciones) ):    
	                                                    foreach($vacaciones as  $v){ 
	                                                
	                                                   if($v['estatus']==0)
	                                                   {
	                                                   	
	                                                   	$estatus='Pendiente';
	                                                   }
	                                                   
	                                                   if($v['estatus']==1)
	                                                   {
	                                                   	 
	                                                   	$estatus='Autorizada';
	                                                   }
	                                                   
	                                                   if($v['estatus']==2)
	                                                   {
	                                                   
	                                                   	$estatus='Rechazada';
	                                                   }
	                                                    	?>
                                
                                    <tr class="odd gradeX">
                                        <td><?php echo $v['Periodo']?></td>
                                        <td><?php echo $v['dias']?></td>
                                          <td><?php echo $v['fechaSalida']?></td>
                                          <td><?php echo $v['fechaEntrada']?></td>
                                          <td><?php echo $v['fechaAutoriza']?></td>
                                          <td><?php echo $v['nombreUsuario']?></td>
                                          <td><?php echo $estatus?></td>
                                           
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
