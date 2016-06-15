<link rel='stylesheet' type='text/css' href='<?php echo HOME_URL; ?>assets/plugins/datatables/dataTables.css' />


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
						        <span>Nuevo <?php echo $catalogo; ?></span></a>
						        
						        
            
         
			
			    <h2><label>.</label></h2>
			    
				   
				       <table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered datatables" id="example">
                                <thead>
                                    <tr>
                                    <th>ID</th>
                                    <th>CLIENTE</th>
                                    <th>PRODUCTO</th>
                                   
                                   
                                       <?php if($id==2) 
															{?>
															
															
															  <th>AGR_PRODUCTO</th>
															<?php }?>
                                        
                                   
                                      
                                       <?php if($id==10) 
															{?>
															
															
															 <th>FECHA</th>
															 <th>IMPORTE</th>
															<?php }?>
                                        
                                    </tr>
                                </thead>
                                <tbody>
                                
                                
                                  <?php 
                                  if($id==2)
                                 {
	                                                if( !empty($Productos) ):    
	                                                    foreach($Productos as  $v){ ?>
                                
                                    <tr class="odd gradeX">
                                        <td><?php echo $v->id?></td>
                                        <td><?php echo $v->cliente?></td>
                                        <td><?php echo $v->producto?></td>
                                          <td><?php echo $v->agrupacion?></td>
                                         
															
															
                                      
                                       </tr>
                                
                                  <?php 
	                                                
	                                                    } 
	                                                    endif;
                                   }  
	                                                ?>
                                
                                
                                
                                 <?php 
                                  if($id==10)
                                 {
	                                                if( !empty($Facturacion) ):    
	                                                    foreach($Facturacion as  $v){ ?>
                                
                                    <tr class="odd gradeX">
                                        <td><?php echo $v->id?></td>
                                        <td><?php echo $v->cliente?></td>
                                        <td><?php echo $v->producto?></td>
                                         
															
															
															  <td><?php echo $v->fecha?></td>
															   <td><?php echo number_format($v->importe,2)?></td>
															
                                           
                                      
                                       </tr>
                                
                                  <?php 
	                                                
	                                                    } 
	                                                    endif;
                                   }  
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
															<h4 class="modal-title">AGREGAR <?php echo $catalogo; ?></h4>
														</div>
														<div class="modal-body">
 <form class="form-horizontal" id="formitem" action="<?php echo HOME_URL; ?>index.php/PlanMaestro/"  />
 

															<div class="form-group">
																<label class="col-sm-3 control-label">CLIENTE:</label>
																<div class="col-sm-6">
																	
																	    <select class="form-control" id="cliente" name="cliente">
                    <option value="" />Seleccione...                    
                            
                              <?php 
	                                                   
	                                                if( !empty($Clientes) ):    
	                                                    foreach($Clientes as  $v){ 
?>                              
                                       <option value="<?php echo $v->id?>" /><?php echo $v->valor?>          
  <?php                                     
	                                                    } 
	                                                    endif;
	                                                ?>
                            
              </select>
																							     
																							     
																							      <input type="hidden" name="clabe"  id="clabe"  value="<?php echo $id ?>"  />
																</div>
															</div>
															
															
															
															
																
															<?php if($id==2) 
															{?>
															
																<div class="form-group">
																<label class="col-sm-3 control-label">PRODUCTO:</label>
																<div class="col-sm-6">
																
																
																	<input type="text" class=" form-control"  name="CatValor" id="CatValor"/>
																
																	
																</div>
																</div>	   
																
																<div class="form-group">
																<label class="col-sm-3 control-label">AGRUPACION PRODUCTO:</label>
																<div class="col-sm-6">
																
																
																	<input type="text" class=" form-control"  name="CatAgrupa" id="CatAgrupa"/>
																
																	
																</div>
																</div>	
                            
                              <?php 
															}
															?>
															
															
															
															
															<?php if($id==10) 
															{?>
															
																<div class="form-group">
																<label class="col-sm-3 control-label">PRODUCTO:</label>
																<div class="col-sm-6">
																	
																	    <select class="form-control" id="Addproducto" name="Addproducto">
                    <option value="" />Seleccione...                    
                            
                              <?php 
	                                                   
	                                                if( !empty($Clientes) ):    
	                                                    foreach($Clientes as  $v){ 
?>                              
                                       <option value="<?php echo $v->valor?>" /><?php echo $v->valor?>          
  <?php                                     
	                                                    } 
	                                                    endif;
	                                                ?>
                            
              </select>
																							     
																							     
																							      <input type="hidden" name="clabe"  id="clabe"  value="<?php echo $id ?>"  />
																</div>
															</div>
															
																
															
															<div class="form-group">
																<label class="col-sm-3 control-label">FECHA:</label>
																<div class="col-sm-6">
															 
                      <input type="text" class="form-control" id="datepickerFecha"
															name="datepickerFecha" />
                   
                   
							</div>								
									</div>						
															<div class="form-group">
																<label class="col-sm-3 control-label">IMPORTE:</label>
																<div class="col-sm-6">
																	
																	<input type="text" class=" form-control"  name="CatParametro" id="CatParametro" value=""/>
																							     
																</div>
															</div>
															<?php }?>

<br>
<br>
															
														
															

															
														</div>
														<div class="modal-footer">
															<button type="button" class="btn btn-default"
																data-dismiss="modal">Cerrar</button>
																
																<?php if($id==2) 
															{?>
																
																
															<a href="#" id="agregarProducto" class="btn btn-inverse">Agregar</a>
															
															<?php 
															}
elseif($id==10)
{
	?>
	<a href="#" id="agregarFactura" class="btn btn-inverse">Agregar</a>
	
	<?php 
}


															
															
															?>
															
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
                                            CatParametro: {
                                                required: true
                                            },
                                            cliente:{
                                                oneOptionSelected: true
                                            },
                                            CatAgrupa: {
                                                required: true
                                            },
                                            Addproducto:{
                                                oneOptionSelected: true
                                            },
                                            datepickerFecha: {
                                                required: true
                                            }
                                        },
                                        messages: {
                                            
                                        	CatValor: {
                                                required: "Valor requerido"
                                            },
                                            CatAgrupa: {
                                                required: "Valor requerido"
                                            },
                                            CatParametro: {
                                                required: "Valor requerido"
                                            },
                                            datepickerFecha: {
                                                required: "Fecha requerida"
                                            }
                                            
                                        }

                                    });

                                    $('#agregarFactura').click(function(event) {
                                        event.preventDefault();

                                        if ($('#formitem').valid()) {


                                        	porhtml = $( "#cliente option:selected" ).text(),
                                        	
                                            //ajaxSubmit();
                                            $.blockUI({message: "Por favor espere...", css: {border: 'none', padding: '15px', backgroundColor: '#000',
                                                    '-webkit-border-radius': '10px', '-moz-border-radius': '10px', opacity: .5, color: '#fff'}});

                                            $.ajax({
                                                url: '<?php echo HOME_URL; ?>index.php/PlanMaestro/AddFActura',
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
                                                    alertify.error(jqXHR.responseText);
                                                    setTimeout($.unblockUI, 2000);
                                                }
                                            });
                                        } else {
                                            alertify.error("Favor de completar los datos requeridos",2000);
                                            
                                        }
                                    });


                                   
        </script>
						
						
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
                                            CatParametro: {
                                                required: true
                                            },
                                            cliente:{
                                                oneOptionSelected: true
                                            },
                                            CatAgrupa: {
                                                required: true
                                            },
                                            Addproducto:{
                                                oneOptionSelected: true
                                            },
                                            datepickerFecha: {
                                                required: true
                                            }
                                        },
                                        messages: {
                                            
                                        	CatValor: {
                                                required: "Valor requerido"
                                            },
                                            CatAgrupa: {
                                                required: "Valor requerido"
                                            },
                                            CatParametro: {
                                                required: "Valor requerido"
                                            },
                                            datepickerFecha: {
                                                required: "Fecha requerida"
                                            }
                                            
                                        }

                                    });

                                    $('#agregarProducto').click(function(event) {
                                        event.preventDefault();

                                        if ($('#formitem').valid()) {


                                        	porhtml = $( "#cliente option:selected" ).text(),
                                        	
                                            //ajaxSubmit();
                                            $.blockUI({message: "Por favor espere...", css: {border: 'none', padding: '15px', backgroundColor: '#000',
                                                    '-webkit-border-radius': '10px', '-moz-border-radius': '10px', opacity: .5, color: '#fff'}});

                                            $.ajax({
                                                url: '<?php echo HOME_URL; ?>index.php/PlanMaestro/AddProducto',
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
                                                    alertify.error(jqXHR.responseText);
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
  
    <script type="text/javascript">
        $(document).ready(function() {
            $("#cliente").change(function() {
                $("#cliente option:selected").each(function() {
                    cliente = $('#cliente').val();
                    porhtml = $( "#cliente option:selected" ).text();
  
                    $.post('<?php echo HOME_URL; ?>index.php/PlanMaestro/l_producto', {
                        cliente : cliente
                    }, function(data) {
                       
                        $("#Addproducto").html(data);
                        




                        
                    });

                    
                    
                });
            })
        });
    </script> 
  
  			