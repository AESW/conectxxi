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
                                    <th>Folio Incapacidad</th>
                                    <th>Fecha inicial</th>
                                      <th>Fecha final</th>
                                        <th >estatus</th>
										  <th >Fecha de aprobación</th>
										  <th >Observaciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                
                                 <?php 
	                                                   
	                                                if( !empty($incapacidades) ):    
	                                                    foreach($incapacidades as  $v){ 
                                
                                $est=$v['aprobada'];
                                
                                if($est==0)
                                {
                                	
                                	$estatusFinal='Pendiente';
                                	
                                }
                                
                                if($est==1)
                                {
                                	 
                                	$estatusFinal='Autorizada';
                                	 
                                }
                                
                                if($est==2)
                                {
                                	 
                                	$estatusFinal='Rechazada';
                                	 
                                }
                                
                                ?>
                                
                                    <tr class="odd gradeX">
                                        <td><?php echo $v['incapacidad']?></td>
                                        <td><?php echo $v['inicio']?></td>
                                          <td><?php echo $v['fin']?></td>
                                          <td><?php echo $estatusFinal?></td>
                                          <td><?php echo $v['fecha_Aprobacion']?></td>
                                          <td><?php echo $v['observaciones']?></td>
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
