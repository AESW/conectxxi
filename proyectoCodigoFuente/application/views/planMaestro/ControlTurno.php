<link rel='stylesheet' type='text/css' href='<?php echo HOME_URL; ?>assets/js/jqueryui.css' /> 
<link rel="stylesheet" type="text/css" href="<?php echo HOME_URL; ?>assets/css/plugins/jquery-alertify/alertify.core.css" />
<link rel="stylesheet" type="text/css" href="<?php echo HOME_URL; ?>assets/css/plugins/jquery-alertify/alertify.default.css" />



<script type='text/javascript' src='<?php echo HOME_URL; ?>assets/js/jquery-1.10.2.min.js'></script> 
<script type='text/javascript' src='<?php echo HOME_URL; ?>assets/js/jqueryui-1.10.3.min.js'></script> 
<script type='text/javascript' src='<?php echo HOME_URL; ?>assets/plugins/form-validation/jquery.validate.min.js'></script> 
<script type='text/javascript' src='<?php echo HOME_URL; ?>assets/plugins/jquery-alertify/jquery.alertify.min.js'></script>
<script type='text/javascript' src='<?php echo HOME_URL; ?>assets/plugins/jquery-blockUI/jquery.blockUI.js'></script>  
        
        
<style type="text/css">
		
		
		.scrollup{
			width:40px;
			height:40px;			
			text-indent:-9999px;
			opacity:0.3;
			position:fixed;
			bottom:50px;
			right:100px;
			display:none;			
			background: url('<?php echo HOME_URL; ?>assets/images/icon_top.png') no-repeat;
		}
	
		

		</style>
        
        <script type="text/javascript">
			$(document).ready(function(){ 
			
			$(window).scroll(function(){
				if ($(this).scrollTop() > 100) {
					$('.scrollup').fadeIn();
				} else {
					$('.scrollup').fadeOut();
				}
			}); 
			
			$('.scrollup').click(function(){
				$("html, body").animate({ scrollTop: 0 }, 600);
				return false;
			});
 
		});
		</script>


<style>
            label.error { font-size: 11px; color: red}
            input.error, textarea.error { border: 1px solid red }
        </style>

 

<div id="tab-container" class="tab-container">


		 <div class='panel-container'>
			
		<a href="javascript:history.back()"> Regresar</a>
		<br>
		<br>

		                     <a  id="CalcularBtn" class="btn btn-success">Calcular</a>
<a  id="ingresarBtn" class="btn btn-success">Guardar</a>
		
			
			    <h2><label>.</label></h2>
			    
				   
				      
			      
    <form class="form-horizontal" id="generales" >
    
     <?php 
	                                                  
	                                                   
	                                               
	                                                
	                                                    foreach($ControlTurno as  $t){ ?>
       <input type="hidden" class="form-control" id="id" name="id" value="<?php echo $t->id_plan?>"/>
     <?php 
	                                                    
	                                                   
	                                                if( !empty($DiasLaborales) ):    
	                                                    foreach($DiasLaborales as  $v){ ?>
                           <input type="hidden" class="form-control" id="diaslab" name="diaslab" value="<?php echo $v->parametro?>"/>
                          
                           
                             <?php 
	                                                    
	                                                    } 
	                                                    endif;
	                                                ?>
          
        
    <div class="form-group">
						    <label for="focusedinput" class="col-sm-1 control-label" >GERENCIA:</label>
						        <div class="col-sm-2">
                    <select class="form-control" id="gerencia" name="gerencia"> 
                    <option value="<?php echo $t->gerencia?>" /><?php echo $t->gerencia?>                  
                            <?php 
	                                                    
	                                                   
	                                                if( !empty($Gerencia) ):    
	                                                    foreach($Gerencia as $v){ ?>
                           
                            <option value="<?php echo $v->valor?>" /><?php echo $v->valor?>
                             <?php 
	                                                    
	                                                    } 
	                                                    endif;
	                                                ?>
                          
                            
              </select>
                </div>
						      <label for="focusedinput" class="col-sm-1 control-label" >SUPERVISOR:</label>
						        <div class="col-sm-1">
                    <select class="form-control" id="supervisor" name="supervisor"> 
                    <option value="<?php echo $t->supervisor?>" /><?php echo $t->supervisor?>                  
                           <?php 
	                                              
	                                                   
	                                                if( !empty($Supervisor) ):    
	                                                    foreach($Supervisor as $v){ ?>
                           
                            <option value="<?php echo $v->valor?>" /><?php echo $v->valor?>
                             <?php 
	                                                    
	                                                    } 
	                                                    endif;
	                                                ?>
                            
                          
                            
              </select>
                </div>
                
                 <label for="focusedinput" class="col-sm-2 control-label" >TURNO:</label>
						        <div class="col-sm-2">
                    <select class="form-control" id="turno" name="turno">> 
                    <option value="<?php echo $t->turno?>" /><?php echo $t->turno?>                
                            <?php 
	                                                    
	                                                   
	                                                if( !empty($Turno) ):    
	                                                    foreach($Turno as $i => $v){ ?>
                           
                            <option value="<?php echo $v->valor?>" /><?php echo $v->valor?>
                             <?php 
	                                                    
	                                                    } 
	                                                    endif;
	                                                ?>	
                            
                            
                          
                            
              </select>
                </div>
                
                
                 <label class="col-sm-1 control-label">FECHA:</label>
                <div class="col-sm-2">
                    <div class="input-group">
                      <input type="text" class="form-control" id="datepickerFecha"
															name="datepickerFecha" value="<?php echo $t->fecha?>"/>
                      <span class="input-group-addon" id="datepickerbtn2"><i class="glyphicon glyphicon-calendar"></i></span>
                    </div>
                    
                </div>
						     
						     
						     
						  </div>
		
    			  
						  
						   <table cellpadding="0" cellspacing="0" border="0"
												class="table table-striped table-bordered " id="table_emplext">
    
    <thead>
													<tr>
														<th   rowspan="2" colspan="2">INDICADOR</th>
													   
														<th id="tiempo" colspan="4">SEGUIMIENTO CADA 2 Ó 3 HORAS</th>
														
														<th   rowspan="2" >TOTAL DEL TURNO</th>
													
													</tr>
													
													<tr>
											
													<th headers="tiempo">2 HRS</th>
													<th headers="tiempo">2 HRS</th>
													<th headers="tiempo">2 HRS</th>
													<th headers="tiempo">2 / 3 HRS</th>
													
													</tr>
												</thead>
    <tbody>
                                 
  	                              
    <tr class="odd gradeX">
    
    
    <td rowspan="3" width="12%">GESTIONES </td>
    <td >P</td>
    <td> <input type="text" class="form-control" id="gestiones_p1" name="gestiones_p1" value="<?php echo $t->gestiones_p1?>"/></td>
    <td> <input type="text" class="form-control" id="gestiones_p2" name="gestiones_p2" value="<?php echo $t->gestiones_p2?>"/></td>
    <td> <input type="text" class="form-control"   id="gestiones_p3" name="gestiones_p3" value="<?php echo $t->gestiones_p3?>"/></td>
    <td> <input type="text" class="form-control"  id="gestiones_p4" name="gestiones_p4" value="<?php echo $t->gestiones_p4?>"/></td>
    <td > <input type="text" class="form-control"readonly id="gestiones_ptot" name="gestiones_ptot" value="<?php echo $t->gestiones_ptot?>" /></td>
   
    </tr>
    
    
      <tr class="odd gradeX">
    
    
    <td >R</td>
    <td> <input type="text" class="form-control" id="gestiones_r1" name="gestiones_r1" value="<?php echo $t->gestiones_r1?>"/></td>
    <td> <input type="text" class="form-control" id="gestiones_r2" name="gestiones_r2" value="<?php echo $t->gestiones_r2?>"/></td>
    <td> <input type="text" class="form-control"   id="gestiones_r3" name="gestiones_r3" value="<?php echo $t->gestiones_r3?>"/></td>
    <td> <input type="text" class="form-control"  id="gestiones_r4" name="gestiones_r4" value="<?php echo $t->gestiones_r4?>"/></td>
    <td > <input type="text" class="form-control"readonly id="gestiones_rtot" name="gestiones_rtot" value="<?php echo $t->gestiones_rtot?>" /></td>
   
    </tr>
    
    <tr class="odd gradeX">
    
    
    <td >%</td>
    <td > <input type="text" class="form-control" readonly id="gest_cum1" name="gest_cum1" value="<?php echo $t->gest_cum1?>" /></td>
    <td> <input type="text" class="form-control" readonly id="gest_cum2" name="gest_cum2" value="<?php echo $t->gest_cum2?>"/></td>
    <td> <input type="text" class="form-control"  readonly id="gest_cum3" name="gest_cum3" value="<?php echo $t->gest_cum3?>"/></td>
    <td> <input type="text" class="form-control"   readonly id="gest_cum4" name="gest_cum4" value="<?php echo $t->gest_cum4?>"/></td>
    <td> <input type="text" class="form-control" readonly id="gest_tot" name="gest_tot" value="<?php echo $t->gest_tot?>"/></td>
 
   
    </tr>
    
    <tr class="odd gradeX">
    
    
    <td rowspan="3">MINUTOS TIEMPO AIRE</td>
    <td >P</td>
<td> <input type='text' class='form-control' id='minutos_p1' name='minutos_p1' value='<?php echo $t->minutos_p1?>'/></td>
<td> <input type='text' class='form-control' id='minutos_p2' name='minutos_p2' value='<?php echo $t->minutos_p2?>'/></td>
<td> <input type='text' class='form-control' id='minutos_p3' name='minutos_p3' value='<?php echo $t->minutos_p3?>'/></td>
<td> <input type='text' class='form-control' id='minutos_p4' name='minutos_p4' value='<?php echo $t->minutos_p4?>'/></td>
<td> <input type='text' class='form-control' id='minutos_ptot' name='minutos_ptot' value='<?php echo $t->minutos_ptot?>'/></td>
   
   
    </tr>
    
    
      <tr class="odd gradeX">
    
    
    <td >R</td>
<td> <input type='text' class='form-control' id='minutos_r1' name='minutos_r1' value='<?php echo $t->minutos_r1?>'/></td>
<td> <input type='text' class='form-control' id='minutos_r2' name='minutos_r2' value='<?php echo $t->minutos_r2?>'/></td>
<td> <input type='text' class='form-control' id='minutos_r3' name='minutos_r3' value='<?php echo $t->minutos_r3?>'/></td>
<td> <input type='text' class='form-control' id='minutos_r4' name='minutos_r4' value='<?php echo $t->minutos_r4?>'/></td>
<td> <input type='text' class='form-control' id='minutos_rtot' name='minutos_rtot' value='<?php echo $t->minutos_rtot?>'/></td>
   
   
    </tr>
    
    <tr class="odd gradeX">
    
    
    <td >%</td>
<td> <input type='text' class='form-control' id='min_cum1' name='min_cum1' value='<?php echo $t->min_cum1?>'/></td>
<td> <input type='text' class='form-control' id='min_cum2' name='min_cum2' value='<?php echo $t->min_cum2?>'/></td>
<td> <input type='text' class='form-control' id='min_cum3' name='min_cum3' value='<?php echo $t->min_cum3?>'/></td>
<td> <input type='text' class='form-control' id='min_cum4' name='min_cum4' value='<?php echo $t->min_cum4?>'/></td>
<td> <input type='text' class='form-control' id='min_tot' name='min_tot' value='<?php echo $t->min_tot?>'/></td>
    
   
    </tr>
    
    <tr class="odd gradeX">
    
    
    <td rowspan="3">IMPORTE PROMESA PAGO REALIZADAS($)</td>
    <td >P</td>
<td> <input type='text' class='form-control' id='promesa_p1' name='promesa_p1' value='<?php echo $t->promesa_p1?>'/></td>
<td> <input type='text' class='form-control' id='promesa_p2' name='promesa_p2' value='<?php echo $t->promesa_p2?>'/></td>
<td> <input type='text' class='form-control' id='promesa_p3' name='promesa_p3' value='<?php echo $t->promesa_p3?>'/></td>
<td> <input type='text' class='form-control' id='promesa_p4' name='promesa_p4' value='<?php echo $t->promesa_p4?>'/></td>
<td> <input type='text' class='form-control' id='promesa_ptot' name='promesa_ptot' value='<?php echo $t->promesa_ptot?>'/></td>
    
   
    </tr>
    
    
      <tr class="odd gradeX">
    
    
    <td >R</td>
<td> <input type='text' class='form-control' id='promesa_r1' name='promesa_r1' value='<?php echo $t->promesa_r1?>'/></td>
<td> <input type='text' class='form-control' id='promesa_r2' name='promesa_r2' value='<?php echo $t->promesa_r2?>'/></td>
<td> <input type='text' class='form-control' id='promesa_r3' name='promesa_r3' value='<?php echo $t->promesa_r3?>'/></td>
<td> <input type='text' class='form-control' id='promesa_r4' name='promesa_r4' value='<?php echo $t->promesa_r4?>'/></td>
<td> <input type='text' class='form-control' id='promesa_rtot' name='promesa_rtot' value='<?php echo $t->promesa_rtot?>'/></td>
    
   
   
    </tr>
    
    <tr class="odd gradeX">
    
    
    <td >%</td>
<td> <input type='text' class='form-control' id='promesa_cum1' name='promesa_cum1' value='<?php echo $t->promesa_cum1?>'/></td>
<td> <input type='text' class='form-control' id='promesa_cum2' name='promesa_cum2' value='<?php echo $t->promesa_cum2?>'/></td>
<td> <input type='text' class='form-control' id='promesa_cum3' name='promesa_cum3' value='<?php echo $t->promesa_cum3?>'/></td>
<td> <input type='text' class='form-control' id='promesa_cum4' name='promesa_cum4' value='<?php echo $t->promesa_cum4?>'/></td>
<td> <input type='text' class='form-control' id='promesa_tot' name='promesa_tot' value='<?php echo $t->promesa_tot?>'/></td>
    
 
    </tr>
    
    <tr class="odd gradeX">
    
    
    <td rowspan="3">GESTORES </td>
    <td >P</td>
<td> <input type='text' class='form-control' id='gestores_p1' name='gestores_p1' value='<?php echo $t->gestores_p1?>'/></td>
<td> <input type='text' class='form-control' id='gestores_p2' name='gestores_p2' value='<?php echo $t->gestores_p2?>'/></td>
<td> <input type='text' class='form-control' id='gestores_p3' name='gestores_p3' value='<?php echo $t->gestores_p3?>'/></td>
<td> <input type='text' class='form-control' id='gestores_p4' name='gestores_p4' value='<?php echo $t->gestores_p4?>'/></td>
<td> <input type='text' class='form-control' id='gestores_ptot' name='gestores_ptot' value='<?php echo $t->gestores_ptot?>'/></td>
    
   
    </tr>
    
    
      <tr class="odd gradeX">
    
    
    <td >R</td>
<td> <input type='text' class='form-control' id='gestores_r1' name='gestores_r1' value='<?php echo $t->gestores_r1?>'/></td>
<td> <input type='text' class='form-control' id='gestores_r2' name='gestores_r2' value='<?php echo $t->gestores_r2?>'/></td>
<td> <input type='text' class='form-control' id='gestores_r3' name='gestores_r3' value='<?php echo $t->gestores_r3?>'/></td>
<td> <input type='text' class='form-control' id='gestores_r4' name='gestores_r4' value='<?php echo $t->gestores_r4?>'/></td>
<td> <input type='text' class='form-control' id='gestores_rtot' name='gestores_rtot' value='<?php echo $t->gestores_rtot?>'/></td>
    
   
   
    </tr>
    
    <tr class="odd gradeX">
    
    
    <td >%</td>
<td> <input type='text' class='form-control' id='gestores_cum1' name='gestores_cum1' value='<?php echo $t->gestores_cum1?>'/></td>
<td> <input type='text' class='form-control' id='gestores_cum2' name='gestores_cum2' value='<?php echo $t->gestores_cum2?>'/></td>
<td> <input type='text' class='form-control' id='gestores_cum3' name='gestores_cum3' value='<?php echo $t->gestores_cum3?>'/></td>
<td> <input type='text' class='form-control' id='gestores_cum4' name='gestores_cum4' value='<?php echo $t->gestores_cum4?>'/></td>
<td> <input type='text' class='form-control' id='gestores_tot' name='gestores_tot' value='<?php echo $t->gestores_tot?>'/></td>
    
 
   
    </tr>
    
    <tr class="odd gradeX">
    
    
    <td rowspan="3">HORAS GESTORES </td>
    <td >P</td>
<td> <input type='text' class='form-control' id='horas_p1' name='horas_p1' value='<?php echo $t->horas_p1?>'/></td>
<td> <input type='text' class='form-control' id='horas_p2' name='horas_p2' value='<?php echo $t->horas_p2?>'/></td>
<td> <input type='text' class='form-control' id='horas_p3' name='horas_p3' value='<?php echo $t->horas_p3?>'/></td>
<td> <input type='text' class='form-control' id='horas_p4' name='horas_p4' value='<?php echo $t->horas_p4?>'/></td>
<td> <input type='text' class='form-control' id='horas_ptot' name='horas_ptot' value='<?php echo $t->horas_ptot?>'/></td>
    
   
    </tr>
    
    
      <tr class="odd gradeX">
    
    
    <td >R</td>
<td> <input type='text' class='form-control' id='horas_r1' name='horas_r1' value='<?php echo $t->horas_r1?>'/></td>
<td> <input type='text' class='form-control' id='horas_r2' name='horas_r2' value='<?php echo $t->horas_r2?>'/></td>
<td> <input type='text' class='form-control' id='horas_r3' name='horas_r3' value='<?php echo $t->horas_r3?>'/></td>
<td> <input type='text' class='form-control' id='horas_r4' name='horas_r4' value='<?php echo $t->horas_r4?>'/></td>
<td> <input type='text' class='form-control' id='horas_rtot' name='horas_rtot' value='<?php echo $t->horas_rtot?>'/></td>
    
     
    </tr>
    
    <tr class="odd gradeX">
    
    
    <td >%</td>
   
<td> <input type='text' class='form-control' id='horas_cum1' name='horas_cum1' value='<?php echo $t->horas_cum1?>'/></td>
<td> <input type='text' class='form-control' id='horas_cum2' name='horas_cum2' value='<?php echo $t->horas_cum2?>'/></td>
<td> <input type='text' class='form-control' id='horas_cum3' name='horas_cum3' value='<?php echo $t->horas_cum3?>'/></td>
<td> <input type='text' class='form-control' id='horas_cum4' name='horas_cum4' value='<?php echo $t->horas_cum4?>'/></td>
<td> <input type='text' class='form-control' id='horas_tot' name='horas_tot' value='<?php echo $t->horas_tot?>'/></td>
    
 
   
    </tr>
    
    
    
   
    
    </tbody>
    </table>
    
    			
						  
						   <table cellpadding="0" cellspacing="0" border="0"
												class="table table-striped table-bordered " id="table_emplext">
    
    <thead>
													
													<tr>
											
													<th >PROBLEMA</th>
													<th >C</th>
													<th colspan="5">ESCRIBIR CÓDIGO DE PROBLEMA, TIEMPO DE PROBLEMA, DESCRIPCIÓN PROBLEMA Y ACCIÓN TOMADA</th>
													
													
													</tr>
													
												</thead>
    <tbody>
                                 
  	                                                    
                                    <tr class="odd gradeX">
    
    
   
    
    <td >PUNTUALIDAD</td>
     <td >1</td>
    <td rowspan="9">	<textarea cols="15" rows="30"  maxlength="250" id="Problema1" name="Problema1" class="vf_otf" ><?php echo $t->Problema1?></textarea>  </td>
       <td rowspan="9"><textarea cols="15" rows="30"  maxlength="250" id="Problema2" name="Problema2" class="vf_otf" ><?php echo $t->Problema2?></textarea> </td>
          <td rowspan="9"><textarea cols="15" rows="30"  maxlength="250" id="Problema3" name="Problema3" class="vf_otf" ><?php echo $t->Problema3?></textarea> </td>
             <td rowspan="9"><textarea cols="15" rows="30"  maxlength="250" id="Problema4" name="Problema4" class="vf_otf" ><?php echo $t->Problema4?></textarea></td>
                <td rowspan="9"><textarea cols="15" rows="30"  maxlength="250" id="Problema5" name="Problema5" class="vf_otf" ><?php echo $t->Problema5?></textarea></td>
   
    
    </tr>
    
                                     <tr class="odd gradeX">
    
    
   
    
    <td>EQUIPO DESCOMPUESTO</td>
     <td >2</td>
 
    
    </tr>
    
                                     <tr class="odd gradeX">
    
    
   
    
    <td>DATOS DEUDOR INCORRECTOS</td>
     <td >3</td>
   
    
    </tr>
    
                                     <tr class="odd gradeX">
    
    
   
    
    <td>FALTA POSICIONES</td>
     <td >4</td>
   
    </tr>
    
                                     <tr class="odd gradeX">
    
    
   
    
    <td>MANTTO. COMPUTADORA</td>
     <td >5</td>
   
    </tr>
    
                                     <tr class="odd gradeX">
    
    
   
    
    <td>LINEA TEL NO FUNCIONA</td>
     <td >6</td>
    
    </tr>
    
                                     <tr class="odd gradeX">
    
    
   
    
    <td>SISTEMA LENTO</td>
     <td >7</td>
           
    </tr>
    
     </tr>
    
                                     <tr class="odd gradeX">
    
    
   
    
    <td>NO CUMPLIMIENTO DE SCRIPT</td>
     <td >8</td>
           
    </tr>
    
     </tr>
    
                                     <tr class="odd gradeX">
    
    
   
    
    <td>OTRO (ESPECIFIQUE)</td>
     <td >9</td>
  
                 
    </tr>
    </tbody>
    </table>
                
                    

    <?php 
	                                                  
	                                                    } 
	                                                 
	                                                ?>
       
     <a href="#" class="scrollup">Scroll</a>  
          
 </form>
	   
		  <input id="btnsavefront" type="submit"  style="display:none" class="btn btn-inverse" value="Guardar" />
			  
		 	   
			   
			  </div>
			  <!-- End Paso 3 -->
			  
			
		  </div>




<script type="text/javascript">


$('#generales').validate({
    debug: true,
    //onfocusout: true,
    //onsubmit : true,
    onkeyup: false,
    //submitHandler: ajaxSubmit
    rules: {
    	gerencia: {
            required: true
        },
        supervisor: {
            required: true
        },
        turno: {
            required: true
        },
      
        datepickerFecha: {
            required: true
        }
    },
    messages: {
        
    	gerencia: {
            required: "Portafolio requerido"
        },
        supervisor: {
            required: "Periodo requerido"
        },
        turno: {
            required: "Responsable requerido"
        },

        datepickerFecha: {
            required: "Fecha requerida"
        }
    }

});




$('form#generales').submit(function(event) {
    event.preventDefault();

    if ($('#generales').valid()) {

        //ajaxSubmit();
        $.blockUI({message: "Por favor espere...", css: {border: 'none', padding: '15px', backgroundColor: '#000',
                '-webkit-border-radius': '10px', '-moz-border-radius': '10px', opacity: .5, color: '#fff'}});


        var formData = new FormData($("form#generales")[0]);

       
        

        
        $.ajax({
            url: '<?php echo HOME_URL; ?>PlanMaestro/EditTurno',
            type: 'POST',
            dataType: 'json',
            data: formData,
            cache: false,
            async: false,
            contentType: false,
            processData: false,
            success: function(response) {
                if (response.codigo != 200) {
                    alertify.error(response.mensaje,1500);
                    setTimeout(function() {
                    	
                        $.unblockUI();
                    }, 2000);
                } else {
                    alertify.log(response.mensaje, "success", 1500);
                    setTimeout(function() {
                    	 location.reload();
                        $.unblockUI();
                    }, 1500);
                }
            },
            error: function(jqXHR, textStatus, errorThrown) {
                alertify.error("Error, intentelo nuevamente");
                setTimeout($.unblockUI, 2000);
            }
        });
    } else {
        alertify.error("Favor de completar los datos requeridos",2000);
        
    }
});



$( "#ingresarBtn" ).click(function() {
	  $( "form#generales" ).submit();
	});



</script>

<script type="text/javascript">

function number_format(number, decimals, dec_point, thousands_sep) {
	 

	  number = (number + '')
	    .replace(/[^0-9+\-Ee.]/g, '');
	  var n = !isFinite(+number) ? 0 : +number,
	    prec = !isFinite(+decimals) ? 0 : Math.abs(decimals),
	    sep = (typeof thousands_sep === 'undefined') ? ',' : thousands_sep,
	    dec = (typeof dec_point === 'undefined') ? '.' : dec_point,
	    s = '',
	    toFixedFix = function(n, prec) {
	      var k = Math.pow(10, prec);
	      return '' + (Math.round(n * k) / k)
	        .toFixed(prec);
	    };
	  // Fix for IE parseFloat(0.55).toFixed(0) = 0;
	  s = (prec ? toFixedFix(n, prec) : '' + Math.round(n))
	    .split('.');
	  if (s[0].length > 3) {
	    s[0] = s[0].replace(/\B(?=(?:\d{3})+(?!\d))/g, sep);
	  }
	  if ((s[1] || '')
	    .length < prec) {
	    s[1] = s[1] || '';
	    s[1] += new Array(prec - s[1].length + 1)
	      .join('0');
	  }
	  return s.join(dec);
	}

</SCRIPT>


   <script type="text/javascript">


          $( "#CalcularBtn" ).click(function() {


//declara variables


        	  

        	  //Gestiones
        	  
        	  var lgestiones_p1 = $('#gestiones_p1').val();
        	  var lgestiones_r1 = $('#gestiones_r1').val();

              var lgest_cum1=lgestiones_r1/lgestiones_p1;
        	  
        	  $("#gest_cum1").val(number_format(lgest_cum1, 2));

//

             var lgestiones_p2 = $('#gestiones_p2').val();
         	 var lgestiones_r2 = $('#gestiones_r2').val();

             var lgest_cum2=lgestiones_r2/lgestiones_p2;
         	  
         	 $("#gest_cum2").val(number_format(lgest_cum2, 2));
        	  
    //

             var lgestiones_p3 = $('#gestiones_p3').val();
        	 var lgestiones_r3 = $('#gestiones_r3').val();

               var lgest_cum3=lgestiones_r3/lgestiones_p3;
        	  
        	  $("#gest_cum3").val(number_format(lgest_cum3, 2));

        	  //

              var lgestiones_p4 = $('#gestiones_p4').val();
         	 var lgestiones_r4 = $('#gestiones_r4').val();

                var lgest_cum4=lgestiones_r4/lgestiones_p4;
         	  
         	  $("#gest_cum4").val(number_format(lgest_cum4, 2));       	 

//
 
 
 var  lgestiones_ptot=parseInt(lgestiones_p1)+parseInt(lgestiones_p2)+parseInt(lgestiones_p3)+parseInt(lgestiones_p4);

 $("#gestiones_ptot").val(lgestiones_ptot); 


 var  lgestiones_rtot=parseInt(lgestiones_r1)+parseInt(lgestiones_r2)+parseInt(lgestiones_r3)+parseInt(lgestiones_r4);

 $("#gestiones_rtot").val(lgestiones_rtot); 


 var lgest_tot=lgestiones_rtot/lgestiones_ptot;


  $("#gest_tot").val(lgest_tot);           

 //Minutos
 
 var lminutos_p1 = $('#minutos_p1').val();
 var lminutos_r1 = $('#minutos_r1').val();

 var lmin_cum1=lminutos_r1/lminutos_p1;
 
 $("#min_cum1").val(number_format(lmin_cum1, 2));

//

var lminutos_p2 = $('#minutos_p2').val();
 var lminutos_r2 = $('#minutos_r2').val();

var lmin_cum2=lminutos_r2/lminutos_p2;
  
 $("#min_cum2").val(number_format(lmin_cum2, 2));
 
//

var lminutos_p3 = $('#minutos_p3').val();
var lminutos_r3 = $('#minutos_r3').val();

  var lmin_cum3=lminutos_r3/lminutos_p3;
 
 $("#min_cum3").val(number_format(lmin_cum3, 2));

 //

 var lminutos_p4 = $('#minutos_p4').val();
 var lminutos_r4 = $('#minutos_r4').val();

   var lmin_cum4=lminutos_r4/lminutos_p4;
  
  $("#min_cum4").val(number_format(lmin_cum4, 2));       	 

//


var  lminutos_ptot=parseInt(lminutos_p1)+parseInt(lminutos_p2)+parseInt(lminutos_p3)+parseInt(lminutos_p4);

$("#minutos_ptot").val(lminutos_ptot); 


var  lminutos_rtot=parseInt(lminutos_r1)+parseInt(lminutos_r2)+parseInt(lminutos_r3)+parseInt(lminutos_r4);

$("#minutos_rtot").val(lminutos_rtot); 


var lmin_tot=lminutos_rtot/lminutos_ptot;


 $("#min_tot").val(lmin_tot);  


//promesas

var lpromesa_p1 = $('#promesa_p1').val();
var lpromesa_r1 = $('#promesa_r1').val();

var lpromesa_cum1=lpromesa_r1/lpromesa_p1;

$("#promesa_cum1").val(number_format(lpromesa_cum1, 2));

//

var lpromesa_p2 = $('#promesa_p2').val();
var lpromesa_r2 = $('#promesa_r2').val();

var lpromesa_cum2=lpromesa_r2/lpromesa_p2;
 
$("#promesa_cum2").val(number_format(lpromesa_cum2, 2));

//

var lpromesa_p3 = $('#promesa_p3').val();
var lpromesa_r3 = $('#promesa_r3').val();

 var lpromesa_cum3=lpromesa_r3/lpromesa_p3;

$("#promesa_cum3").val(number_format(lpromesa_cum3, 2));

//

var lpromesa_p4 = $('#promesa_p4').val();
var lpromesa_r4 = $('#promesa_r4').val();

  var lpromesa_cum4=lpromesa_r4/lpromesa_p4;
 
 $("#promesa_cum4").val(number_format(lpromesa_cum4, 2));       	 

//


var  lpromesa_ptot=parseInt(lpromesa_p1)+parseInt(lpromesa_p2)+parseInt(lpromesa_p3)+parseInt(lpromesa_p4);

$("#promesa_ptot").val(lpromesa_ptot); 


var  lpromesa_rtot=parseInt(lpromesa_r1)+parseInt(lpromesa_r2)+parseInt(lpromesa_r3)+parseInt(lpromesa_r4);

$("#promesa_rtot").val(lpromesa_rtot); 


var lpromesa_tot=lpromesa_rtot/lpromesa_ptot;


 $("#promesa_tot").val(lpromesa_tot);  


//gestores


var lgestores_p1 = $('#gestores_p1').val();
var lgestores_r1 = $('#gestores_r1').val();

var lgestores_cum1=lgestores_r1/lgestores_p1;

$("#gestores_cum1").val(number_format(lgestores_cum1, 2));

//

var lgestores_p2 = $('#gestores_p2').val();
var lgestores_r2 = $('#gestores_r2').val();

var lgestores_cum2=lgestores_r2/lgestores_p2;
 
$("#gestores_cum2").val(number_format(lgestores_cum2, 2));

//

var lgestores_p3 = $('#gestores_p3').val();
var lgestores_r3 = $('#gestores_r3').val();

 var lgestores_cum3=lgestores_r3/lgestores_p3;

$("#gestores_cum3").val(number_format(lgestores_cum3, 2));

//

var lgestores_p4 = $('#gestores_p4').val();
var lgestores_r4 = $('#gestores_r4').val();

  var lgestores_cum4=lgestores_r4/lgestores_p4;

 
 
 $("#gestores_cum4").val(number_format(lgestores_cum4, 2));       	 

//


var  lgestores_ptot=parseInt(lgestores_p1)+parseInt(lgestores_p2)+parseInt(lgestores_p3)+parseInt(lgestores_p4);

$("#gestores_ptot").val(lgestores_ptot); 


var  lgestores_rtot=parseInt(lgestores_r1)+parseInt(lgestores_r2)+parseInt(lgestores_r3)+parseInt(lgestores_r4);

$("#gestores_rtot").val(lgestores_rtot); 


var lgestores_tot=lgestores_rtot/lgestores_ptot;


 $("#gestores_tot").val(lgestores_tot);  


//HORAS

var lhoras_p1 = $('#horas_p1').val();
var lhoras_r1 = $('#horas_r1').val();

var lhoras_cum1=lhoras_r1/lhoras_p1;

$("#horas_cum1").val(number_format(lhoras_cum1, 2));

//

var lhoras_p2 = $('#horas_p2').val();
var lhoras_r2 = $('#horas_r2').val();

var lhoras_cum2=lhoras_r2/lhoras_p2;
 
$("#horas_cum2").val(number_format(lhoras_cum2, 2));

//

var lhoras_p3 = $('#horas_p3').val();
var lhoras_r3 = $('#horas_r3').val();

 var lhoras_cum3=lhoras_r3/lhoras_p3;

$("#horas_cum3").val(number_format(lhoras_cum3, 2));

//

var lhoras_p4 = $('#horas_p4').val();
var lhoras_r4 = $('#horas_r4').val();

  var lhoras_cum4=lhoras_r4/lhoras_p4;
 
 $("#horas_cum4").val(number_format(lhoras_cum4, 2));       	 

//


var  lhoras_ptot=parseInt(lhoras_p1)+parseInt(lhoras_p2)+parseInt(lhoras_p3)+parseInt(lhoras_p4);

$("#horas_ptot").val(lhoras_ptot); 

var  lhoras_rtot=parseInt(lhoras_r1)+parseInt(lhoras_r2)+parseInt(lhoras_r3)+parseInt(lhoras_r4);

$("#horas_rtot").val(lhoras_rtot); 


var lhoras_tot=lhoras_rtot/lhoras_ptot;


 $("#horas_tot").val(lhoras_tot);  

                          
        	});


          
    </script>
    
    
    <script>
  $(function() {
    $( "#datepickerFecha" ).datepicker({ dateFormat: 'yy/mm/dd' });
  });
  </script>


