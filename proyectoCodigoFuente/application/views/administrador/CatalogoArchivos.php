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
						        <span>Nuevo <?php echo $catalogo; ?></span></a>
						        
						        
            
         
			
			    <h2><label>.</label></h2>
			    
				   
				       <table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered datatables" id="example">
                                <thead>
                                    <tr>
                                    <th>ID</th>
                                    <th><?php echo $catalogo; ?></th>
                                   
															 <th>PARAMETRO</th>
															 <th>ARCHIVO</th>
															  <th>ACTIVAR/DESACTIVAR</th>
															   <th>EDITAR</th>
															
                                    </tr>
                                </thead>
                                <tbody>
                                
                                 <?php 
	                                                   
	                                                if( !empty($Catalogos) ):    
	                                                    foreach($Catalogos as  $v){ ?>
                                
                                    <tr class="odd gradeX">
                                        <td><?php echo $v->id?></td>
                                        <td><?php echo $v->valor?></td>
                                         <td><?php echo $v->parametro?></td>
                                               <td class="center">
                                           <center>
                                     
                                     <?php 
                                     
                                     $resultado = str_replace(" ", "", $v->valor);
                                     
                                     ?>
                                     
                                             <a target="_blank" href="<?php echo HOME_URL;?>PerfilesDoc/EvaluacionesDoc/<?php echo $resultado?>.pdf"  class="btn btn-success "><i class="glyphicon glyphicon-file"></i></a>
                                                
                                      </center>
                                           
                                           </td>
                                         
                                               <td class="center">
                                           <center>
                                     
                                             <a data-toggle="modal" href="#ModalBaja" data-id="<?php echo $v->id?>"  data-valor="<?php echo $v->valor?>" data-parametro="<?php echo $v->parametro?>" data-estatus="<?php echo $v->estatus?>" class="btn btn-success open-Modal"><i class="glyphicon glyphicon-floppy-remove"></i></a>
                                                
                                      </center>
                                           
                                           </td>
                                           
                                                <td class="center">
                                           <center>
                                   
                                             <a data-toggle="modal" href="#ModalEdita"   data-id="<?php echo $v->id?>" data-valor="<?php echo $v->valor?>" data-parametro="<?php echo $v->parametro?>" class="btn btn-success open-Modal"><i class="glyphicon glyphicon-pencil"></i></a>
                                                
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
															<h4 class="modal-title">AGREGAR <?php echo $catalogo; ?></h4>
														</div>
														<div class="modal-body">
 <form class="form-horizontal" id="formitem" action="<?php echo HOME_URL; ?>Administrador/Catalogos"  />
															
															<div class="form-group">
																<label class="col-sm-3 control-label"><?php echo $catalogo; ?>:</label>
																<div class="col-sm-6">
																	
																	<input type="text" class=" form-control"  name="CatValor" id="CatValor"/>
																							      <input type="hidden" name="clabe"  id="clabe"  value="<?php echo $id ?>"  />
																</div>
															</div>
															
														<input type="hidden" name="comprobanteEstudios" class="comprobanteEstudios" id="comprobanteEstudios" />
															
															<div class="form-group">
																<label class="col-sm-3 control-label">PARAMETRO:</label>
																<div class="col-sm-6">
																	
																	<input type="text" class=" form-control"  name="CatAgrupa" id="CatAgrupa" value=""/>
																							     
																</div>
															</div>
															
															<div class="form-group">
																<label class="col-sm-3 control-label">ARCHIVO:</label>
																<div class="col-sm-6">
																	
																	 <span class="btn btn-success fileinput-button">
						        <i class="glyphicon glyphicon-plus"></i>
						        <span>Cargar...</span>
						        <!-- The file input field used as target for the file upload widget -->
						        <input id="comprobanteEstudios_upload" type="file" name="files[]" multiple>
						    </span>
						    <!-- The global progress bar -->
						    <div id="comprobanteEstudios_progress" class="progress">
						        <div class="progress-bar progress-bar-success"></div>
						    </div>
						    <!-- The container for the uploaded files -->
						    <div id="files_comprobanteEstudios" class="files">
						      <?php 
								    if( isset($formArray["comprobanteEstudios"]) && $formArray["comprobanteEstudios"] != ""):
								    	echo '<a href="'.HOME_URL."tempFDP/files/".$formArray["comprobanteEstudios"].'" target="_blank">'.$formArray["comprobanteEstudios"].'</a>';
								    	
								    endif;
							    ?>
							   
						    </div>
																						     
																</div>
															</div>
														
															
															

<br>
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
																<label class="col-sm-3 control-label"><?php echo $catalogo; ?>:</label>
																<div class="col-sm-6">
																	
																	<input type="text"  class=" form-control"  name="editaValor" id="editaValor"/>
																							      <input type="hidden" name="editaDNI"  id="editaDNI"   />
																</div>
															</div>
															
														
															
															<div class="form-group">
																<label class="col-sm-3 control-label">PARAMETRO:</label>
																<div class="col-sm-6">
																	
																	<input type="text"  class=" form-control"  name="editaParametro" id="editaParametro" />
																							     
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
															<h4 class="modal-title">ACTIVAR/DESACTIVAR <?php echo $catalogo; ?></h4>
														</div>
														<div class="modal-body">
 <form class="form-horizontal" id="formitemElimina" action="<?php echo HOME_URL; ?>Administrador/Catalogos/"  />
															
															<div class="form-group">
																<label class="col-sm-3 control-label"><?php echo $catalogo; ?>:</label>
																<div class="col-sm-6">
																	
																	<input type="text" class=" form-control"  readonly name="bajaValor" id="bajaValor"/>
																							      <input type="hidden" name="bajaDNI"  id="bajaDNI"  value="<?php echo $id ?>"  />
																</div>
															</div>
															
														
															
															<div class="form-group">
																<label class="col-sm-3 control-label">PARAMETRO:</label>
																<div class="col-sm-6">
																	
																	<input type="text" class=" form-control"  readonly name="bajaParametro" id="bajaParametro" />
																							     
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
															
															

<br>
<br>
															
														
															

															
														</div>
														<div class="modal-footer">
															<button type="button" class="btn btn-default"
																data-dismiss="modal">Cerrar</button>
															<a href="#" id="eliminarProducto" class="btn btn-inverse">GUARDAR</a>
														</div>
														
														  </form>
													</div>
												</div>
											</div>
											<!-- /.modal -->
											
											
											 </div>
											
											<!-- The jQuery UI widget factory, can be omitted if jQuery UI is already included -->
	<script src="<?php echo HOME_URL; ?>assets/js/vendor/jquery.ui.widget.js"></script>
	<!-- The Iframe Transport is required for browsers without support for XHR file uploads -->
	<script src="<?php echo HOME_URL; ?>assets/js/jquery.iframe-transport.js"></script>
	<!-- The basic File Upload plugin -->
	<script src="<?php echo HOME_URL; ?>assets/js/jquery.fileupload.js"></script>
											
											 <script type="text/javascript">

                                    

                                    $('#formitem').validate({
                                        debug: true,
                                        //onfocusout: true,
                                        //onsubmit : true,
                                        onkeyup: false,
                                        //submitHandler: ajaxSubmit
                                        rules: {
                                        	CatValor: {
                                                required: true
                                            },CatAgrupa: {
                                                required: true
                                            }
                                        },
                                        messages: {
                                            
                                        	CatValor: {
                                                required: "Valor requerido"
                                            },CatAgrupa: {
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
                                                url: '<?php echo HOME_URL; ?>Administrador/AddCatalogo',
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
                                                url: '<?php echo HOME_URL; ?>Administrador/EliminaCatalogoItem',
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

        											 $(function () {
        			                                	    'use strict';

        			                                	    var url = window.location.hostname === 'blueimp.github.io' ?
        			                                                '//jquery-file-upload.appspot.com/' : '<?php echo HOME_URL; ?>eaf/RecursosHumanos/server/';
        			                                	     
        			                                	
        			                                        $( "#fechaIngreso" ).datepicker({
        			                                	        dateFormat: "yy-mm-dd",
        			                                	        yearRange: "-100:+0",
        			                                	        changeYear:true,
        			                                        });

                                    $('#formitemEditar').validate({
                                        debug: true,
                                        //onfocusout: true,
                                        //onsubmit : true,
                                        onkeyup: false,
                                        //submitHandler: ajaxSubmit
                                        rules: {
                                        	editaValor: {
                                                required: true
                                            },editaParametro: {
                                                required: true
                                            }
                                        },
                                        messages: {
                                            
                                        	editaValor: {
                                                required: "Valor requerido"
                                            },editaParametro: {
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
                                                url: '<?php echo HOME_URL; ?>Administrador/ActualizaCatalogoItem',
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

                                    $('#comprobanteEstudios_upload').fileupload({
                            	        url: url,
                            	        dataType: 'json',
                            	        change : function (e, data) {
                            		        if(data.files.length>=4){
                            		            alert("1 archivo permitido por selección")
                            		            return false;
                            		        }
                            		        
                            		    },
                            	        done: function (e, data) {
                            	            $.each(data.result.files, function (index, file) {
                            		            $(".comprobanteEstudios").val(file.name);
                            		            
                            	                $('<p/>').html('<a target="_blank" href="'+'<?php echo HOME_URL; ?>tempFDP/files/'+file.name+'">'+ file.name + "</a>").appendTo('#files_comprobanteEstudios');
                            	            });
                            	        },
                            	        progressall: function (e, data) {
                            	            var progress = parseInt(data.loaded / data.total * 100, 10);
                            	            $('#comprobanteEstudios_progress .progress-bar').css(
                            	                'width',
                            	                progress + '%'
                            	            );
                            	            setInterval(function(){ 
                            		            $('#comprobanteEstudios_progress .progress-bar').css(
                            		                'width',
                            		                0 + '%'
                            		            );
                            	            }, 2000);
                            	        }
                            	    }).prop('disabled', !$.support.fileInput)
                            	        .parent().addClass($.support.fileInput ? undefined : 'disabled');


        											 });
        </script>
