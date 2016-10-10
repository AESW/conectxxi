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
                                   <th >Curso</th>
                                   <th >Grupo</th>
                                        <th >Fecha inicial</th>
                                        <th >Fecha final</th>
										  
										  
                                    </tr>
                                </thead>
                                <tbody>
                                
                                 <?php 
	                                                   
	                                                if( !empty($capacitacion) ):    
	                                                    foreach($capacitacion as  $v){ ?>
                                
                                    <tr class="odd gradeX">
                                        <td><?php echo $v['nombreUsuario']?></td>
                                        <td><?php echo $v['NombreDelCurso']?></td>
                                          <td><?php echo $v['NombreGrupo']?></td>
                                          <td><?php echo $v['fechaInicial']?></td>
                                          <td><?php echo $v['fechaFinal']?></td>
                                       
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
