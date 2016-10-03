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
$(".modal-body #Editcartera").val( parametro );
$(".modal-body #Bajacartera").val( parametro );


var direccion = $(this).data('direccion');
$(".modal-body #editDireccion").val( direccion );
$(".modal-body #BajaDireccion").val( direccion );

var capacidad = $(this).data('capacidad');
$(".modal-body #editCapacidad").val( capacidad );
$(".modal-body #BajaCapacidad").val( capacidad );

var oficina = $(this).data('oficina');
$(".modal-body #Editcartera").val( oficina );
$(".modal-body #Bajacartera").val( oficina );
 
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
						        <span>Nueva Sala</span></a>
						        
						        
            
         
			
			    <h2><label>.</label></h2>
			    
				   
				       <table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered datatables" id="example">
                                <thead>
                                    <tr>
                                    <th>ID</th>
                                    <th>SALA</th>
                                   
															 <th>DIRECCION</th>
															 <th>CAPACIDAD</th>
															 <th>OFICINA</th>
															  <th>ACTIVAR/DESACTIVAR</th>
															   <th>EDITAR</th>
															
                                    </tr>
                                </thead>
                                <tbody>
                                
                                 <?php 
	                                                   
	                                                if( !empty($Salas) ):    
	                                                    foreach($Salas as  $v){ ?>
                                
                                    <tr class="odd gradeX">
                                        <td><?php echo $v->idSalas?></td>
                                        <td><?php echo $v->Sala?></td>
                                         <td><?php echo $v->Direccion?></td>
   <td><?php echo $v->Capacidad?></td>
      <td><?php echo $v->nombreOficina?></td>                                            
                                         
                                               <td class="center">
                                           <center>
                                     
                                             <a data-toggle="modal" href="#ModalBaja" data-id="<?php echo $v->idSalas?>"  data-valor="<?php echo $v->Sala?>"  data-estatus="<?php echo $v->estatus?>" data-capacidad="<?php echo $v->Capacidad?>" data-oficina="<?php echo $v->idOficinas?>" data-direccion="<?php echo $v->Direccion?>" class="btn btn-success open-Modal"><i class="glyphicon glyphicon-floppy-remove"></i></a>
                                                
                                      </center>
                                           
                                           </td>
                                           
                                                <td class="center">
                                           <center>
                                   
                                             <a data-toggle="modal" href="#ModalEdita"   data-id="<?php echo $v->idSalas?>"  data-valor="<?php echo $v->Sala?>"  data-estatus="<?php echo $v->estatus?>" data-capacidad="<?php echo $v->Capacidad?>" data-oficina="<?php echo $v->idOficinas?>" data-direccion="<?php echo $v->Direccion?>" class="btn btn-success open-Modal"><i class="glyphicon glyphicon-pencil"></i></a>
                                                
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
															<h4 class="modal-title">AGREGAR SALA</h4>
														</div>
														<div class="modal-body">
 <form class="form-horizontal" id="formitem" action="<?php echo HOME_URL; ?>Administrador/Catalogos"  />
															
															<div class="form-group">
																<label class="col-sm-3 control-label">SALA:</label>
																<div class="col-sm-6">
																	
																	<input type="text" class=" form-control"  onkeyup="javascript:this.value=this.value.toUpperCase();" name="CatValor" id="CatValor"/>

																</div>
															</div>
															
															<div class="form-group">
																<label class="col-sm-3 control-label">DIRECCION:</label>
																<div class="col-sm-6">
																	
																	<input type="text" class=" form-control"  onkeyup="javascript:this.value=this.value.toUpperCase();" name="CatDireccion" id="CatDireccion"/>

																</div>
															</div>
															
															<div class="form-group">
																<label class="col-sm-3 control-label">CAPACIDAD:</label>
																<div class="col-sm-6">
																	
																	<input type="text" class="allownumericwithoutdecimal form-control"  onkeyup="javascript:this.value=this.value.toUpperCase();" name="CatCapacidad" id="CatCapacidad"/>

																</div>
															</div>
															
															<div class="form-group">
																<label class="col-sm-3 control-label">OFICINA:</label>
																<div class="col-sm-6">
																	<select id="cartera" name="cartera" >
																	<option value="" >Seleccione una Oficina</option>
																	 <?php 
	                                                   
	                                                if( !empty($Oficinas) ):    
	                                                    foreach($Oficinas as  $emp){ ?>
																	
																	<option value="<?php echo $emp->idOficinas?>" ><?php echo $emp->nombreOficina?></option>
																	
																		<?php 
																		}
																		endif;
																		?>
																		</select>					     
																</div>
															</div>
															
														
														
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
															<h4 class="modal-title">EDITAR SALA</h4>
														</div>
														<div class="modal-body">
 <form class="form-horizontal" id="formitemEditar" name="formitemEditar" action="<?php echo HOME_URL; ?>index.php/PlanMaestro/"  />
															
															<div class="form-group">
																<label class="col-sm-3 control-label">SALA:</label>
																<div class="col-sm-6">
																	
																	<input type="text"  class=" form-control"  onkeyup="javascript:this.value=this.value.toUpperCase();" name="editaValor" id="editaValor"/>
																							      <input type="hidden" name="editaDNI"  id="editaDNI"   />
																</div>
															</div>
															
														<div class="form-group">
																<label class="col-sm-3 control-label">DIRECCION:</label>
																<div class="col-sm-6">
																	
																	<input type="text" class=" form-control"  onkeyup="javascript:this.value=this.value.toUpperCase();" name="editDireccion" id="editDireccion"/>

																</div>
															</div>
															
															<div class="form-group">
																<label class="col-sm-3 control-label">CAPACIDAD:</label>
																<div class="col-sm-6">
																	
																	<input type="text" class=" form-control"  onkeyup="javascript:this.value=this.value.toUpperCase();" name="editCapacidad" id="editCapacidad"/>

																</div>
															</div>
															
															<div class="form-group">
																<label class="col-sm-3 control-label">OFICINA:</label>
																<div class="col-sm-6">
																	<select id="Editcartera" style="width:100%" name="Editcartera" >
																	
																	 <?php 
	                                                   
	                                                if( !empty($Oficinas) ):    
	                                                    foreach($Oficinas as  $emp){ ?>
																	
																	<option value="<?php echo $emp->idOficinas?>" ><?php echo $emp->nombreOficina?></option>
																	
																		<?php 
																		}
																		endif;
																		?>
																		</select>					     
																</div>
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
															<h4 class="modal-title">ACTIVAR/DESACTIVAR SALA</h4>
														</div>
														<div class="modal-body">
 <form class="form-horizontal" id="formitemElimina" action="<?php echo HOME_URL; ?>Administrador/Catalogos/"  />
															
															<div class="form-group">
																<label class="col-sm-3 control-label">SALA:</label>
																<div class="col-sm-6">
																	
																	<input type="text" class=" form-control"  readonly name="bajaValor" id="bajaValor"/>
																							      <input type="hidden" name="bajaDNI"  id="bajaDNI"  value="<?php echo $id ?>"  />
																</div>
															</div>
															
															<div class="form-group">
																<label class="col-sm-3 control-label">DIRECCION:</label>
																<div class="col-sm-6">
																	
																	<input type="text" class=" form-control"  readonly onkeyup="javascript:this.value=this.value.toUpperCase();" name="BajaDireccion" id="BajaDireccion"/>

																</div>
															</div>
															
															<div class="form-group">
																<label class="col-sm-3 control-label">CAPACIDAD:</label>
																<div class="col-sm-6">
																	
																	<input type="text" class=" form-control"  readonly onkeyup="javascript:this.value=this.value.toUpperCase();" name="BajaCapacidad" id="BajaCapacidad"/>

																</div>
															</div>
															
															<div class="form-group">
																<label class="col-sm-3 control-label">OFICINA:</label>
																<div class="col-sm-6">
																	<select id="Bajacartera" style="width:100%" name="Bajacartera" >
																	
																	 <?php 
	                                                   
	                                                if( !empty($Oficinas) ):    
	                                                    foreach($Oficinas as  $emp){ ?>
																	
																	<option value="<?php echo $emp->idOficinas?>" ><?php echo $emp->nombreOficina?></option>
																	
																		<?php 
																		}
																		endif;
																		?>
																		</select>					     
																</div>
															</div>
														
															
																<div class="form-group">
																<label class="col-sm-3 control-label">ESTATUS:</label>
																<div class="col-sm-6">
																<select id="Estatus"  name="Estatus"  style="width:100%" >
																	
																	<option value="0" >DESACTIVAR</option>
																	<option value="1" >ACTIVAR</option>
																	
																		</select>		
																				     
																</div>
																
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
											</div>
											<!-- /.modal -->
											
											
											 
											
											<!-- The jQuery UI widget factory, can be omitted if jQuery UI is already included -->
	<script src="<?php echo HOME_URL; ?>assets/js/vendor/jquery.ui.widget.js"></script>
	<!-- The Iframe Transport is required for browsers without support for XHR file uploads -->
	<script src="<?php echo HOME_URL; ?>assets/js/jquery.iframe-transport.js"></script>
	<!-- The basic File Upload plugin -->
	<script src="<?php echo HOME_URL; ?>assets/js/jquery.fileupload.js"></script>
											
											 <script type="text/javascript">

											 $(".allownumericwithoutdecimal").on("keypress keyup blur",function (event) {    
										           $(this).val($(this).val().replace(/[^\d].+/, ""));
										           console.log(event.which);
										            if ((event.which < 48 || event.which > 57)) {
											            if( event.which != 43 && event.which != 8 &&  event.which != 46){
												            event.preventDefault();
											            }
										                
										            }
										        });

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
                                            },cartera: {
                            		        	oneOptionSelected: true
                            		        },CatDireccion: {
                                                required: true
                                            },CatCapacidad: {
                                                required: true
                                            }
                                        },
                                        messages: {
                                            
                                        	CatValor: {
                                                required: "Valor requerido"
                                            },CatDireccion: {
                                                required: "Valor requerido"
                                            },CatCapacidad: {
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
                                                url: '<?php echo HOME_URL; ?>Administrador/AddSala',
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
                                                url: '<?php echo HOME_URL; ?>Administrador/EstatusCatalogoSalas',
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
                                            },editDireccion: {
                                                required: true
                                            },editCapacidad: {
                                                required: true
                                            }
                                        },
                                        messages: {
                                            
                                        	editaValor: {
                                                required: "Valor requerido"
                                            },editDireccion: {
                                                required: "Valor requerido"
                                            },editCapacidad: {
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
                                                url: '<?php echo HOME_URL; ?>Administrador/ActualizaCatalogoSalas',
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
