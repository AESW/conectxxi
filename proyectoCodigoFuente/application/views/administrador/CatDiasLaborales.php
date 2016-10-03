<link rel='stylesheet' type='text/css' href='<?php echo base_url(); ?>assets/plugins/datatables/dataTables.css' />


<script type='text/javascript' src='<?php echo HOME_URL; ?>assets/js/jquery-1.10.2.min.js'></script> 
<script type='text/javascript' src='<?php echo HOME_URL; ?>assets/plugins/datatables/jquery.dataTables.js'></script> 
<script type='text/javascript' src='<?php echo HOME_URL; ?>assets/plugins/datatables/dataTables.bootstrap.js'></script> 
<script type='text/javascript' src='<?php echo HOME_URL; ?>assets/plugins/datatables/demo-datatables.js'></script> 

<link rel='stylesheet' type='text/css' href='<?php echo HOME_URL; ?>assets/js/jqueryui.css' /> 
<link rel="stylesheet" type="text/css" href="<?php echo HOME_URL; ?>assets/css/plugins/jquery-alertify/alertify.core.css" />
<link rel="stylesheet" type="text/css" href="<?php echo HOME_URL; ?>assets/css/plugins/jquery-alertify/alertify.default.css" />



<script type='text/javascript' src='<?php echo HOME_URL; ?>assets/js/bootstrap.min.js'></script>

<script type='text/javascript' src='<?php echo HOME_URL; ?>assets/js/jqueryui-1.10.3.min.js'></script> 
<script type='text/javascript' src='<?php echo HOME_URL; ?>assets/plugins/form-validation/jquery.validate.min.js'></script> 
<script type='text/javascript' src='<?php echo HOME_URL; ?>assets/plugins/jquery-alertify/jquery.alertify.min.js'></script>
<script type='text/javascript' src='<?php echo HOME_URL; ?>assets/plugins/jquery-blockUI/jquery.blockUI.js'></script>  

<style>
            label.error { font-size: 11px; color: red }
            input.error, textarea.error { border: 1px solid red }
        </style>
	<style>
	    	</style>
	    

<div id="tab-container" class="tab-container">
		 <div class='panel-container'>
			
			
			     <a href="javascript:history.back()"> Regresar</a>
			     <br>
			     <br>      
			     
			        <?php 
	                                                   
	                                                if( !empty($CatFac) ):    
	                                                    foreach($CatFac as  $v){ 
                                
                               
                                        $catalogo= $v->catalogo;
                                        $id= $v->id;
                                      
	                                                    } 
	                                                    endif;
	                                                ?>
			     
			                      
                    
<a data-toggle="modal" href="#ModalPuestoActual"   class="btn btn-success"> <i class="glyphicon glyphicon-plus"></i>
						        <span>Editar Dias Laborales</span></a>
						        
						        
            
         
			
			    <h2><label>.</label></h2>
			    
				   
				       <table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered datatables" id="example">
                                <thead>
                                    <tr>
                                    <th>ID</th>
                                    <th>MES <?php echo date ("Y"); ?>  </th>
                                    <th>DIAS LABORALES</th>
                                   
                                      
                                    
                                    </tr>
                                </thead>
                                <tbody>
                                
                                
                                  <?php 
                                
	                                                if( !empty($Catalogos) ):    
	                                                    foreach($Catalogos as  $v){ 
$mes="";
$i= trim($v->valor);



if($i=="01")
{
	$mes="ENERO";
}
elseif ($i=="02")
{
	$mes="FEBRERO";
}
elseif ($i=="03")
{
	$mes="MARZO";
}
elseif ($i=="04")
{
	$mes="ABRIL";
}
elseif ($i=="05")
{
	$mes="MAYO";
}
elseif ($i=="06")
{
	$mes="JUNIO";
}
elseif ($i=="07")
{
	$mes="JULIO";
}
elseif ($i=="08")
{
	$mes="AGOSTO";
}
elseif ($i=="09")
{
	$mes="SEPTIEMBRE";
}
elseif ($i=="10")
{
	$mes="OCTUBRE";
}
elseif ($i=="11")
{
	$mes="NOVIEMBRE";
}
elseif ($i=="12")
{
	$mes="DICIEMBRE";
}


?>

                                
                                
                                
                                    <tr class="odd gradeX">
                                        <td><?php echo $v->id?></td>
                                        <td><?php echo $mes?></td>
                                        <td><?php echo $v->parametro?></td>
                                      
                                         
															
															
                                      
                                       </tr>
                                
                                  <?php 
	                                                
	                                                    } 
	                                                    endif;
                                   
	                                                ?>
                                
                                
                                
                             
                                  
                                
                                </tbody>
                            
				   
				   
				   
				   
				  
			    </table>
			    
	   
		
			  
			   
			   
			  </div>
			  <!-- End Paso 3 -->
			  
			
		 
		  
		   <!-- Modal -->
											<div class="modal fade" id="ModalPuestoActual" tabindex="-1"
												role="dialog" aria-labelledby="ModalPuestoActualLabel"
												aria-hidden="true">
												<div class="modal-dialog">
													<div class="modal-content">
														<div class="modal-header">
															<button type="button" class="close" data-dismiss="modal"
																aria-hidden="true">&times;</button>
															<h4 class="modal-title">EDITAR DIAS LABORALES <?php echo date ("Y"); ?></h4>
														</div>
														<div class="modal-body">
 <form class="form-horizontal" id="formitem" action="<?php echo HOME_URL; ?>index.php/PlanMaestro/"  />
															
															<div class="form-group">
																<label class="col-sm-3 control-label">MES:</label>
																<div class="col-sm-6">
																	
																	    <select class="form-control" id="mes" name="mes">
                    <option value="" />Seleccione...                    
                            
                              
                                       <option value="01" />ENERO
                                       <option value="02" />FEBRERO
                                       <option value="03" />MARZO
                                       <option value="04" />ABRIL
                                       <option value="05" />MAYO
                                       <option value="06" />JUNIO
                                       <option value="07" />JULIO
                                       <option value="08" />AGOSTO
                                       <option value="09" />SEPTIEMBRE
                                       <option value="10" />OCTUBRE
                                       <option value="11" />NOVIEMBRE
                                       <option value="12" />DICIEMBRE         
 
                            
              </select>
																							     
																							     
																							    
																</div>
															</div>
															
															
																<div class="form-group">
																<label class="col-sm-3 control-label">DIAS LABORALES:</label>
																<div class="col-sm-6">
																
																
																	<input type="text" class=" form-control"  name="CatValor" id="CatValor"/>
																
																	
																</div>
																</div>	   
                       
															
															
															
												

<br>
<br>
															
														
															

															
														</div>
														<div class="modal-footer">
															<button type="button" class="btn btn-default"
																data-dismiss="modal">Cerrar</button>
															<a href="#" id="agregarProducto" class="btn btn-inverse">Guardar</a>
														</div>
														
														  </form>
													</div>
												</div>
											</div>
											<!-- /.modal -->
											
											 </div>
											
											 <script type="text/javascript">

											 $.validator.addMethod('oneOptionSelected', function(value) {
								                 return (value==-1||value=="")?(false):(true);
								             }, 'Favor de seleccionar una opción');

                                    $('#formitem').validate({
                                        debug: true,
                                        //onfocusout: true,
                                        //onsubmit : true,
                                        onkeyup: false,
                                        //submitHandler: ajaxSubmit
                                        rules: {
                                        	CatValor: {
                                                required: true
                                            },
                                            mes:{
                                                oneOptionSelected: true
                                            }
                                        },
                                        messages: {
                                            
                                        	CatValor: {
                                                required: "Valor requerido"
                                            }
                                            
                                        }

                                    });

                                    $('#agregarProducto').click(function(event) {
                                        event.preventDefault();

                                        if ($('#formitem').valid()) {

                                            //ajaxSubmit();
                                            $.blockUI({message: "Por favor espere...", css: {border: 'none', padding: '15px', backgroundColor: '#000',
                                                    '-webkit-border-radius': '10px', '-moz-border-radius': '10px', opacity: .5, color: '#fff'}});

                                            $.ajax({
                                                url: '<?php echo HOME_URL; ?>index.php/PlanMaestro/AddDias',
                                                type: 'POST',
                                                dataType: 'json',
                                                data: $('#formitem').serialize(),
                                                cache: false,
                                                async: false,
                                                success: function(response) {
                                                    if (response.codigo != 200) {
                                                        alertify.error(response.mensaje,1500);
                                                        setTimeout(function() {
                                                            $.unblockUI();
                                                        }, 2000);
                                                    } else {
                                                        alertify.log(response.mensaje, "success", 1500);
                                                        setTimeout(function() {
                                                            $().redirect($("#formitem").attr("action"), {
                                                            	
                                                            	
                                                            });
                                                            $.unblockUI();
                                                        }, 1500);
                                                    }
                                                },
                                                error: function(jqXHR, textStatus, errorThrown) {
                                                    alertify.error("Por el momento no se puede acceder al sistema");
                                                    setTimeout($.unblockUI, 2000);
                                                }
                                            });
                                        } else {
                                            alertify.error("Favor de completar los datos requeridos",2000);
                                            
                                        }
                                    });


                                   
        </script>
											
		 <script>
  $(function() {
    $( "#datepickerFecha" ).datepicker({ dateFormat: 'yy/mm/dd' });
  });
  </script>
  
  			