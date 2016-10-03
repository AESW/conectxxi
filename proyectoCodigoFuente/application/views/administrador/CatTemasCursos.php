<link rel='stylesheet' type='text/css' href='<?php echo base_url(); ?>assets/plugins/datatables/dataTables.css' />


<script type='text/javascript' src='<?php echo HOME_URL; ?>assets/js/jquery-1.10.2.min.js'></script> 
<script type='text/javascript' src='<?php echo HOME_URL; ?>assets/plugins/datatables/jquery.dataTables.js'></script> 
<script type='text/javascript' src='<?php echo HOME_URL; ?>assets/plugins/datatables/dataTables.bootstrap.js'></script> 
<script type='text/javascript' src='<?php echo HOME_URL; ?>assets/plugins/datatables/demo-datatables.js'></script> 

<link rel='stylesheet' type='text/css' href='<?php echo HOME_URL; ?>assets/js/jqueryui.css' /> 
<link rel="stylesheet" type="text/css" href="<?php echo HOME_URL; ?>assets/css/plugins/jquery-alertify/alertify.core.css" />
<link rel="stylesheet" type="text/css" href="<?php echo HOME_URL; ?>assets/css/plugins/jquery-alertify/alertify.default.css" />


<script type='text/javascript' src='<?php echo HOME_URL; ?>assets/js/jquery.min.js'></script>

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
	    	
	<script type="text/javascript">    	
	    	$(document).on("click", ".open-Modal", function () {
var myDNI = $(this).data('id');
$(".modal-body #bajaDNI").val( myDNI );
$(".modal-body #editaDNI").val( myDNI );

var valor = $(this).data('valor');
$(".modal-body #editaValor").val( valor );
$(".modal-body #bajaValor").val( valor );

var parametro = $(this).data('parametro');
$(".modal-body #editaParametro").val( parametro );
$(".modal-body #bajaParametro").val( parametro );

var estatus = $(this).data('estatus');

if(estatus==0)
{
	$(".modal-body #Estatus").val( 1 );
}
else
{

	$(".modal-body #Estatus").val( 0 );
}



});
	    	</script>

<div id="tab-container" class="tab-container">
		 <div class='panel-container'>
			
			
			     <a href="javascript:history.back()"> Regresar</a>
			     <br>
			     <br>      
			     
			        <?php 
	                                                   
	                                                if( !empty($Catalogos) ):    
	                                                    foreach($Catalogos as  $v){ 
                                
                               
                                        $catalogo= $v->catalogo;
                                        $id= $v->id_catalogo;
                                      
	                                                    } 
	                                                    endif;
	                                                ?>
			     
			                      
                    
<a data-toggle="modal" href="#ModalPuestoActual"   class="btn btn-success"> <i class="glyphicon glyphicon-plus"></i>
						        <span>Nuevo Tema</span></a>
						        
						        
            
         
			
			    <h2><label>.</label></h2>
			    
				   
				       <table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered datatables" id="example">
                                <thead>
                                    <tr>
                                    <th>ID</th>
                                    <th>TEMA</th>
                                   
															 <th>CALIFICACION MINIMA</th>
															 <th>CURSO</th>
															 <th>EMPRESA</th>
															  <th>ACTIVAR/DESACTIVAR</th>
															   <th>EDITAR</th>
															
                                    </tr>
                                </thead>
                                <tbody>
                                
                                 <?php 
	                                                   
	                                                if( !empty($Temas) ):    
	                                                    foreach($Temas as  $v){ ?>
                                
                                    <tr class="odd gradeX">
                                        <td><?php echo $v->idTema?></td>
                                        <td><?php echo $v->NombreDelTema?></td>
                                          <td><?php echo $v->ValorMinimo?></td>
                                             <td><?php echo $v->NombreDelCurso?></td>
                                                <td><?php echo $v->nombreEmpresas?></td>
                                               <td class="center">
                                           <center>
                                     
                                             <a data-toggle="modal" href="#ModalBaja" data-id="<?php echo $v->idTema?>"  data-valor="<?php echo $v->NombreDelTema?>" data-parametro="<?php echo $v->ValorMinimo?>" data-estatus="<?php echo $v->estatus?>" data-curso="<?php echo $v->NombreDelCurso?>" data-empresa="<?php echo $v->nombreEmpresas?>" class="btn btn-success open-Modal"><i class="glyphicon glyphicon-floppy-remove"></i></a>
                                                
                                      </center>
                                           
                                           </td>
                                           
                                                <td class="center">
                                           <center>
                                   
                                             <a data-toggle="modal" href="#ModalEdita"   data-id="<?php echo $v->idTema?>"  data-valor="<?php echo $v->NombreDelTema?>" data-parametro="<?php echo $v->ValorMinimo?>" data-estatus="<?php echo $v->estatus?>" data-curso="<?php echo $v->NombreDelCurso?>" data-empresa="<?php echo $v->nombreEmpresas?>" class="btn btn-success open-Modal"><i class="glyphicon glyphicon-pencil"></i></a>
                                                
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
			  
			
		 
		  
		   <!-- Modal 1-->
											<div class="modal fade" id="ModalPuestoActual" tabindex="-1"
												role="dialog" aria-labelledby="ModalPuestoActualLabel"
												aria-hidden="true">
												<div class="modal-dialog">
													<div class="modal-content">
														<div class="modal-header">
															<button type="button" class="close" data-dismiss="modal"
																aria-hidden="true">&times;</button>
															<h4 class="modal-title">AGREGAR TEMA</h4>
														</div>
														<div class="modal-body">
 <form class="form-horizontal" id="formitem" action="<?php echo HOME_URL; ?>Administrador/Catalogos"  />
															
															<div class="form-group">
																<label class="col-sm-3 control-label">TEMA:</label>
																<div class="col-sm-6">
																	
																	<input type="text" class=" form-control"  name="CatValor" id="CatValor"/>
																							      <input type="hidden" name="clabe"  id="clabe"  value="<?php echo $id ?>"  />
																</div>
															</div>
															
														
															
															<div class="form-group">
																<label class="col-sm-3 control-label">PARAMETRO:</label>
																<div class="col-sm-6">
																	
																	
																	<select id="CatAgrupa" style="width:100%" name="CatAgrupa">
																	<option value="" >Seleccione un parametro</option>
																	<option value="1" >1</option>
																	<option value="2" >2</option>
																	</select>
																	
																							     
																</div>
															</div>
														
<br>
															
														</div>
														<div class="modal-footer">
															<button type="button" class="btn btn-default"
																data-dismiss="modal">Cerrar</button>
															<a href="#" id="agregarProducto" class="btn btn-inverse">Agregar</a>
														</div>
														
														  </form>
													</div>
												</div>
											</div>
											<!-- /.modal -->
											
											   <!-- Modal 2-->
											<div class="modal fade" id="ModalEdita" tabindex="-1"
												role="dialog" aria-labelledby="ModalPuestoActualLabel"
												aria-hidden="true">
												<div class="modal-dialog">
													<div class="modal-content">
														<div class="modal-header">
															<button type="button" class="close" data-dismiss="modal"
																aria-hidden="true">&times;</button>
															<h4 class="modal-title">EDITAR <?php echo $catalogo; ?></h4>
														</div>
														<div class="modal-body">
 <form class="form-horizontal" id="formitemEditar" action="<?php echo HOME_URL; ?>index.php/PlanMaestro/"  />
															
															<div class="form-group">
																<label class="col-sm-3 control-label">CONCEPTO:</label>
																<div class="col-sm-6">
																	
																	<input type="text"  class=" form-control"  name="editaValor" id="editaValor"/>
																							      <input type="hidden" name="editaDNI"  id="editaDNI"   />
																</div>
															</div>
															
														
														<div class="form-group">
																<label class="col-sm-3 control-label">CALIFICACION MINIMA:</label>
																<div class="col-sm-6">
																
																<input type="text"  class=" form-control"  name="editaParametro" id="editaParametro"/>
																		
																				     
																</div>
														</div>
														
														<div class="form-group">
																<label class="col-sm-3 control-label">EMPRESA:</label>
																<div class="col-sm-6">
																<select id="Editempresa" name="Editempresa" >
																	
																	 <?php 
	                                                   
	                                                if( !empty($Empresas) ):    
	                                                    foreach($Empresas as  $emp){ ?>
																	
																	
																	
																	<option value="<?php echo $emp->idEmpresas?>" ><?php echo $emp->nombreEmpresas?></option>
																	
																	
																		<?php 
																		}
																		endif;
																		?>
																		</select>		
																				     
																</div>
																
														</div>
<br>
<br>
															
														
															

															
														</div>
														<div class="modal-footer">
															<button type="button" class="btn btn-default"
																data-dismiss="modal">Cerrar</button>
															<a href="#" id="editarProducto" class="btn btn-inverse">Guardar</a>
														</div>
														
														  </form>
													</div>
												</div>
											</div>
											</div>
											<!-- /.modal -->
											
											
											   <!-- Modal 3-->
											<div class="modal fade" id="ModalBaja" tabindex="-1"
												role="dialog" aria-labelledby="ModalPuestoActualLabel"
												aria-hidden="true">
												<div class="modal-dialog">
													<div class="modal-content">
														<div class="modal-header">
															<button type="button" class="close" data-dismiss="modal"
																aria-hidden="true">&times;</button>
															<h4 class="modal-title">ACTIVAR/DESACTIVAR CONCEPTO</h4>
														</div>
														<div class="modal-body">
 <form class="form-horizontal" id="formitemElimina" action="<?php echo HOME_URL; ?>Administrador/Catalogos/"  />
															
															<div class="form-group">
																<label class="col-sm-3 control-label">CONCEPTO:</label>
																<div class="col-sm-6">
																	
																	<input type="text" class=" form-control"  readonly name="bajaValor" id="bajaValor"/>
																							      <input type="hidden" name="bajaDNI"  id="bajaDNI"  value="<?php echo $id ?>"  />
																</div>
															</div>
															
														
															
															<div class="form-group">
																<label class="col-sm-3 control-label">PARAMETRO:</label>
																<div class="col-sm-6">
																	
																	<input type="text" class=" form-control"   readonly name="bajaParametro" id="bajaParametro" />
																							     
																</div>
															</div>
														
														<div class="form-group">
																<label class="col-sm-3 control-label">ESTATUS:</label>
																<div class="col-sm-6">
																<select id="Estatus"  style="width:100%"  name="Estatus"  >
																	
																	<option value="0" >DESACTIVAR</option>
																	<option value="1" >ACTIVAR</option>
																	
																		</select>		
																				     
																</div>
																
														</div>
															
															

<br>
<br>
															
														
															

															
														</div>
														<div class="modal-footer">
															<button type="button" class="btn btn-default"
																data-dismiss="modal">Cerrar</button>
															<a href="#" id="eliminarProducto" class="btn btn-inverse">Guardar</a>
														</div>
														
														  </form>
													</div>
												</div>
											</div>
											<!-- /.modal -->
											
											
											
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
                                            } ,CatAgrupa: {
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
                                                url: '<?php echo HOME_URL; ?>Administrador/AddCatConceptos',
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
                                                        	window.location = "<?php echo HOME_URL; ?>Administrador/VerCatalogo/<?php echo $idCatalogo; ?>"; 
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
											
					 <script type="text/javascript">

                                    

                    
                                    $('#eliminarProducto').click(function(event) {
                                        event.preventDefault();

                                       
                                            //ajaxSubmit();
                                            $.blockUI({message: "Por favor espere...", css: {border: 'none', padding: '15px', backgroundColor: '#000',
                                                    '-webkit-border-radius': '10px', '-moz-border-radius': '10px', opacity: .5, color: '#fff'}});

                                            $.ajax({
                                                url: '<?php echo HOME_URL; ?>Administrador/EstatusCatalogoConceptos',
                                                type: 'POST',
                                                dataType: 'json',
                                                data: $('#formitemElimina').serialize(),
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
                                                        	window.location = "<?php echo HOME_URL; ?>Administrador/VerCatalogo/<?php echo $idCatalogo; ?>";
                                                        }, 1500);
                                                    }
                                                },
                                                error: function(jqXHR, textStatus, errorThrown) {
                                                    alertify.error("Por el momento no se puede acceder al sistema");
                                                    setTimeout($.unblockUI, 2000);
                                                }
                                            });
                                      
                                    });
        </script>
        
        											 <script type="text/javascript">

                                    

                                    $('#formitemEditar').validate({
                                        debug: true,
                                        //onfocusout: true,
                                        //onsubmit : true,
                                        onkeyup: false,
                                        //submitHandler: ajaxSubmit
                                        rules: {
                                        	editaValor: {
                                                required: true
                                            }
                                        },
                                        messages: {
                                            
                                        	editaValor: {
                                                required: "Valor requerido"
                                            }
                                        }

                                    });

                                    $('#editarProducto').click(function(event) {
                                        event.preventDefault();

                                        if ($('#formitemEditar').valid()) {

                                            //ajaxSubmit();
                                            $.blockUI({message: "Por favor espere...", css: {border: 'none', padding: '15px', backgroundColor: '#000',
                                                    '-webkit-border-radius': '10px', '-moz-border-radius': '10px', opacity: .5, color: '#fff'}});

                                            $.ajax({
                                                url: '<?php echo HOME_URL; ?>Administrador/ActualizaCatalogoConceptos',
                                                type: 'POST',
                                                dataType: 'json',
                                                data: $('#formitemEditar').serialize(),
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
                                                        	window.location = "<?php echo HOME_URL; ?>Administrador/VerCatalogo/<?php echo $idCatalogo; ?>"; 
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
