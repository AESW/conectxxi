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
                                    <th>ID</th>
                                    <th>Catalogo</th>
                                      
                                       
                                        
                                        <th >Ver</th>
                                    </tr>
                                </thead>
                                <tbody>
                                
                                 <?php 
	                                                   
	                                                if( !empty($Catalogos) ):    
	                                                    foreach($Catalogos as  $v){ ?>
                                
                                    <tr class="odd gradeX">
                                        <td><?php echo $v->id?></td>
                                        <td><?php echo $v->catalogo?></td>
                                        
                                           
                                           <td class="center">
                                           <center>
                                           
                                   <div class="btn-group">
                                  
                                           
                                           
                                             <a href="<?php echo HOME_URL; ?>index.php/PlanMaestro/VerCatalogo/<?php echo $v->id?>" class="btn btn-success"><i class="glyphicon glyphicon-eye-open"></i></a>
                                          
                                           
                                           
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
