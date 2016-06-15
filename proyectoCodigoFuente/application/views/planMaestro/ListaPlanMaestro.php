<link rel='stylesheet' type='text/css' href='<?php echo base_url(); ?>assets/plugins/datatables/dataTables.css' />


<script type='text/javascript' src='<?php echo HOME_URL; ?>assets/js/jquery-1.10.2.min.js'></script> 
<script type='text/javascript' src='<?php echo HOME_URL; ?>assets/plugins/datatables/jquery.dataTables.js'></script> 
<script type='text/javascript' src='<?php echo HOME_URL; ?>assets/plugins/datatables/dataTables.bootstrap.js'></script> 
<script type='text/javascript' src='<?php echo HOME_URL; ?>assets/plugins/datatables/demo-datatables.js'></script> 




<div id="tab-container" class="tab-container">
		 <div class='panel-container'>
			
		
                        
                    
<a  href="<?php echo HOME_URL; ?>index.php/PlanMaestro/newPlan" class="btn btn-success fileinput-button"> <i class="glyphicon glyphicon-plus"></i>
						        <span>Nuevo Plan</span></a>
						        
						        <a   href="<?php echo HOME_URL; ?>index.php/PlanMaestro/Catalogos" class="btn btn-success fileinput-button"> <i class="glyphicon glyphicon-plus"></i>
						        <span>Catalogos</span></a>
                    
              
			
			    <h2><label>.</label></h2>
			    
				   
				       <table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered datatables" id="example">
                                <thead>
                                    <tr>
                                    <th>No. Folio</th>
                                    <th>Portafolio</th>
                                      
                                        <th>Periodo</th>
                                        <th>Responsable</th>
                                        <th>Fecha</th>
                                        
                                        <th >Ver</th>
                                    </tr>
                                </thead>
                                <tbody>
                                
                                 <?php 
	                                                   
	                                                if( !empty($Planes) ):    
	                                                    foreach($Planes as  $v){ ?>
                                
                                    <tr class="odd gradeX">
                                        <td><?php echo $v->id?></td>
                                        <td><?php echo $v->portafolio?></td>
                                        
                                           <td class="center"><?php echo $v->periodo?></td>
                                           <td class="center"><?php echo $v->responsable?></td>
                                           <td class="center"><?php echo $v->Fecha?></td>
                                           <td class="center">
                                           <center>
                                           
                                   <div class="btn-group">
                                  
                                           
                                           
                                             <a href="<?php echo HOME_URL; ?>index.php/PlanMaestro/consultaMaestro/<?php echo $v->id?>" class="btn btn-success"><i class="glyphicon glyphicon-eye-open"></i></a>
                                          
                                           
                                           
                                        </div>
                                           
                                          
                                     
                                            
                                      </center>
                                           
                                           </td>
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
