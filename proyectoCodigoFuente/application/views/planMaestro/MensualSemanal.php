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
	                                                    
	                                                   
	                                               
	                                                
	                                                    foreach($ControlMensual as  $t){ ?>
    <input type="hidden" class="form-control" id="id" name="id" value="<?php echo $t->id_plan?>"/>
   
          
        
    <div class="form-group">
						    
			
                
                
                 <label class="col-sm-1 control-label">FECHA:</label>
                <div class="col-sm-2">
                    <div class="input-group">
                      <input type="text" class="form-control" id="datepickerFecha"
															name="datepickerFecha" value="<?php echo $t->fecha?>"/>
                      <span class="input-group-addon" id="datepickerbtn2"><i class="glyphicon glyphicon-calendar"></i></span>
                    </div>
                    
                </div>
						     
						     
						     
						  </div>
						  

			 
				 <div >
    			  
						  
						   <table cellpadding="0" cellspacing="0" border="0"
												class="table  table-bordered " id="table_emplext">
    
    <thead>
													<tr>
														<th   >INDICADOR CLAVE DESEMPEÑO (ICD,s)</th>
													   <th ></th>
													<th >SEMANA 1</th>
													<th >SEMANA 2</th>
													<th >SEMANA 3</th>
													<th >SEMANA 4</th>
													<th >SEMANA 5</th>
													<th >TOTAL MENSUAL</th>
														
													
													</tr>
													
												</thead>
    <tbody>
                                 
  	                              
    <tr class="odd gradeX">
    
    
    <td rowspan="3" width="12%">GESTIONES </td>
    <td >P</td>
   <td> <input type='text' class='form-control' id='gestiones_p1' name='gestiones_p1' value='<?php echo $t->gestiones_p1?>'/></td>
<td> <input type='text' class='form-control' id='gestiones_p2' name='gestiones_p2' value='<?php echo $t->gestiones_p2?>'/></td>
<td> <input type='text' class='form-control' id='gestiones_p3' name='gestiones_p3' value='<?php echo $t->gestiones_p3?>'/></td>
<td> <input type='text' class='form-control' id='gestiones_p4' name='gestiones_p4' value='<?php echo $t->gestiones_p4?>'/></td>
<td> <input type='text' class='form-control' id='gestiones_p5' name='gestiones_p5' value='<?php echo $t->gestiones_p5?>'/></td>
<td> <input type='text' class='form-control' id='gestiones_ptot' name='gestiones_ptot' value='<?php echo $t->gestiones_ptot?>'/></td>
   
    </tr>
    
    
      <tr class="odd gradeX">
    
    
    <td >R</td>
<td> <input type='text' class='form-control' id='gestiones_r1' name='gestiones_r1' value='<?php echo $t->gestiones_r1?>'/></td>
<td> <input type='text' class='form-control' id='gestiones_r2' name='gestiones_r2' value='<?php echo $t->gestiones_r2?>'/></td>
<td> <input type='text' class='form-control' id='gestiones_r3' name='gestiones_r3' value='<?php echo $t->gestiones_r3?>'/></td>
<td> <input type='text' class='form-control' id='gestiones_r4' name='gestiones_r4' value='<?php echo $t->gestiones_r4?>'/></td>
<td> <input type='text' class='form-control' id='gestiones_r5' name='gestiones_r5' value='<?php echo $t->gestiones_r5?>'/></td>
<td> <input type='text' class='form-control' id='gestiones_rtot' name='gestiones_rtot' value='<?php echo $t->gestiones_rtot?>'/></td>
     
    </tr>
    
    <tr class="odd gradeX">
    
    
    <td >%</td>
<td> <input type='text' class='form-control' id='gest_cum1' name='gest_cum1' value='<?php echo $t->gest_cum1?>'/></td>
<td> <input type='text' class='form-control' id='gest_cum2' name='gest_cum2' value='<?php echo $t->gest_cum2?>'/></td>
<td> <input type='text' class='form-control' id='gest_cum3' name='gest_cum3' value='<?php echo $t->gest_cum3?>'/></td>
<td> <input type='text' class='form-control' id='gest_cum4' name='gest_cum4' value='<?php echo $t->gest_cum4?>'/></td>
<td> <input type='text' class='form-control' id='gest_cum5' name='gest_cum5' value='<?php echo $t->gest_cum5?>'/></td>
<td> <input type='text' class='form-control' id='gest_tot' name='gest_tot' value='<?php echo $t->gest_tot?>'/></td>
    
 
   
    </tr>
    
    <tr class="odd gradeX">
    
    
    <td rowspan="3">RECUPERACIÓN </td>
    <td >P</td>
<td> <input type='text' class='form-control' id='recuperacion_p1' name='recuperacion_p1' value='<?php echo $t->recuperacion_p1?>'/></td>
<td> <input type='text' class='form-control' id='recuperacion_p2' name='recuperacion_p2' value='<?php echo $t->recuperacion_p2?>'/></td>
<td> <input type='text' class='form-control' id='recuperacion_p3' name='recuperacion_p3' value='<?php echo $t->recuperacion_p3?>'/></td>
<td> <input type='text' class='form-control' id='recuperacion_p4' name='recuperacion_p4' value='<?php echo $t->recuperacion_p4?>'/></td>
<td> <input type='text' class='form-control' id='recuperacion_p5' name='recuperacion_p5' value='<?php echo $t->recuperacion_p5?>'/></td>
<td> <input type='text' class='form-control' id='recuperacion_ptot' name='recuperacion_ptot' value='<?php echo $t->recuperacion_ptot?>'/></td>
    
    </tr>
    
    
      <tr class="odd gradeX">
    
    
    <td >R</td>
<td> <input type='text' class='form-control' id='recuperacion_r1' name='recuperacion_r1' value='<?php echo $t->recuperacion_r1?>'/></td>
<td> <input type='text' class='form-control' id='recuperacion_r2' name='recuperacion_r2' value='<?php echo $t->recuperacion_r2?>'/></td>
<td> <input type='text' class='form-control' id='recuperacion_r3' name='recuperacion_r3' value='<?php echo $t->recuperacion_r3?>'/></td>
<td> <input type='text' class='form-control' id='recuperacion_r4' name='recuperacion_r4' value='<?php echo $t->recuperacion_r4?>'/></td>
<td> <input type='text' class='form-control' id='recuperacion_r5' name='recuperacion_r5' value='<?php echo $t->recuperacion_r5?>'/></td>
<td> <input type='text' class='form-control' id='recuperacion_rtot' name='recuperacion_rtot' value='<?php echo $t->recuperacion_rtot?>'/></td>
       
    </tr>
    
    <tr class="odd gradeX">
    
    
    <td >%</td>
   
    <td> <input type='text' class='form-control' id='recuperacion_cum1' name='recuperacion_cum1' value='<?php echo $t->recuperacion_cum1?>'/></td>
<td> <input type='text' class='form-control' id='recuperacion_cum2' name='recuperacion_cum2' value='<?php echo $t->recuperacion_cum2?>'/></td>
<td> <input type='text' class='form-control' id='recuperacion_cum3' name='recuperacion_cum3' value='<?php echo $t->recuperacion_cum3?>'/></td>
<td> <input type='text' class='form-control' id='recuperacion_cum4' name='recuperacion_cum4' value='<?php echo $t->recuperacion_cum4?>'/></td>
<td> <input type='text' class='form-control' id='recuperacion_cum5' name='recuperacion_cum5' value='<?php echo $t->recuperacion_cum5?>'/></td>
<td> <input type='text' class='form-control' id='recuperacion_tot' name='recuperacion_tot' value='<?php echo $t->recuperacion_tot?>'/></td>
    
   
    </tr>
    
    <tr class="odd gradeX">
    
    
    <td rowspan="3">TIEMPO AIRE MINUTOS</td>
    <td >P</td>
<td> <input type='text' class='form-control' id='minutos_p1' name='minutos_p1' value='<?php echo $t->minutos_p1?>'/></td>
<td> <input type='text' class='form-control' id='minutos_p2' name='minutos_p2' value='<?php echo $t->minutos_p2?>'/></td>
<td> <input type='text' class='form-control' id='minutos_p3' name='minutos_p3' value='<?php echo $t->minutos_p3?>'/></td>
<td> <input type='text' class='form-control' id='minutos_p4' name='minutos_p4' value='<?php echo $t->minutos_p4?>'/></td>
<td> <input type='text' class='form-control' id='minutos_p5' name='minutos_p5' value='<?php echo $t->minutos_p5?>'/></td>
<td> <input type='text' class='form-control' id='minutos_ptot' name='minutos_ptot' value='<?php echo $t->minutos_ptot?>'/></td>
       
    </tr>
    
    
      <tr class="odd gradeX">
    
    
    <td >R</td>
<td> <input type='text' class='form-control' id='minutos_r1' name='minutos_r1' value='<?php echo $t->minutos_r1?>'/></td>
<td> <input type='text' class='form-control' id='minutos_r2' name='minutos_r2' value='<?php echo $t->minutos_r2?>'/></td>
<td> <input type='text' class='form-control' id='minutos_r3' name='minutos_r3' value='<?php echo $t->minutos_r3?>'/></td>
<td> <input type='text' class='form-control' id='minutos_r4' name='minutos_r4' value='<?php echo $t->minutos_r4?>'/></td>
<td> <input type='text' class='form-control' id='minutos_r5' name='minutos_r5' value='<?php echo $t->minutos_r5?>'/></td>
<td> <input type='text' class='form-control' id='minutos_rtot' name='minutos_rtot' value='<?php echo $t->minutos_rtot?>'/></td>
     
    </tr>
    
    <tr class="odd gradeX">
    
    
    <td >%</td>
<td> <input type='text' class='form-control' id='min_cum1' name='min_cum1' value='<?php echo $t->min_cum1?>'/></td>
<td> <input type='text' class='form-control' id='min_cum2' name='min_cum2' value='<?php echo $t->min_cum2?>'/></td>
<td> <input type='text' class='form-control' id='min_cum3' name='min_cum3' value='<?php echo $t->min_cum3?>'/></td>
<td> <input type='text' class='form-control' id='min_cum4' name='min_cum4' value='<?php echo $t->min_cum4?>'/></td>
<td> <input type='text' class='form-control' id='min_cum5' name='min_cum5' value='<?php echo $t->min_cum5?>'/></td>
<td> <input type='text' class='form-control' id='min_tot' name='min_tot' value='<?php echo $t->min_tot?>'/></td>
    
 
   
    </tr>
    
    <tr class="odd gradeX">
    
    
    <td rowspan="3">COSTO TIEMPO AIRE($)</td>
    <td >P</td>
<td> <input type='text' class='form-control' id='costoaire_p1' name='costoaire_p1' value='<?php echo $t->costoaire_p1?>'/></td>
<td> <input type='text' class='form-control' id='costoaire_p2' name='costoaire_p2' value='<?php echo $t->costoaire_p2?>'/></td>
<td> <input type='text' class='form-control' id='costoaire_p3' name='costoaire_p3' value='<?php echo $t->costoaire_p3?>'/></td>
<td> <input type='text' class='form-control' id='costoaire_p4' name='costoaire_p4' value='<?php echo $t->costoaire_p4?>'/></td>
<td> <input type='text' class='form-control' id='costoaire_p5' name='costoaire_p5' value='<?php echo $t->costoaire_p5?>'/></td>
<td> <input type='text' class='form-control' id='costoaire_ptot' name='costoaire_ptot' value='<?php echo $t->costoaire_ptot?>'/></td>
       
    </tr>
    
    
      <tr class="odd gradeX">
    
    
    <td >R</td>
<td> <input type='text' class='form-control' id='costoaire_r1' name='costoaire_r1' value='<?php echo $t->costoaire_r1?>'/></td>
<td> <input type='text' class='form-control' id='costoaire_r2' name='costoaire_r2' value='<?php echo $t->costoaire_r2?>'/></td>
<td> <input type='text' class='form-control' id='costoaire_r3' name='costoaire_r3' value='<?php echo $t->costoaire_r3?>'/></td>
<td> <input type='text' class='form-control' id='costoaire_r4' name='costoaire_r4' value='<?php echo $t->costoaire_r4?>'/></td>
<td> <input type='text' class='form-control' id='costoaire_r5' name='costoaire_r5' value='<?php echo $t->costoaire_r5?>'/></td>
<td> <input type='text' class='form-control' id='costoaire_rtot' name='costoaire_rtot' value='<?php echo $t->costoaire_rtot?>'/></td>
      
   
    </tr>
    
    <tr class="odd gradeX">
    
    
    <td >%</td>
<td> <input type='text' class='form-control' id='costoaire_cum1' name='costoaire_cum1' value='<?php echo $t->costoaire_cum1?>'/></td>
<td> <input type='text' class='form-control' id='costoaire_cum2' name='costoaire_cum2' value='<?php echo $t->costoaire_cum2?>'/></td>
<td> <input type='text' class='form-control' id='costoaire_cum3' name='costoaire_cum3' value='<?php echo $t->costoaire_cum3?>'/></td>
<td> <input type='text' class='form-control' id='costoaire_cum4' name='costoaire_cum4' value='<?php echo $t->costoaire_cum4?>'/></td>
<td> <input type='text' class='form-control' id='costoaire_cum5' name='costoaire_cum5' value='<?php echo $t->costoaire_cum5?>'/></td>
<td> <input type='text' class='form-control' id='costoaire_tot' name='costoaire_tot' value='<?php echo $t->costoaire_tot?>'/></td>
    
 
    </tr>
    
     <tr class="odd gradeX">
    
    
    <td rowspan="3">CARTEO (No. DE CARTAS) </td>
    <td >P</td>
<td> <input type='text' class='form-control' id='carteo_p1' name='carteo_p1' value='<?php echo $t->carteo_p1?>'/></td>
<td> <input type='text' class='form-control' id='carteo_p2' name='carteo_p2' value='<?php echo $t->carteo_p2?>'/></td>
<td> <input type='text' class='form-control' id='carteo_p3' name='carteo_p3' value='<?php echo $t->carteo_p3?>'/></td>
<td> <input type='text' class='form-control' id='carteo_p4' name='carteo_p4' value='<?php echo $t->carteo_p4?>'/></td>
<td> <input type='text' class='form-control' id='carteo_p5' name='carteo_p5' value='<?php echo $t->carteo_p5?>'/></td>
<td> <input type='text' class='form-control' id='carteo_ptot' name='carteo_ptot' value='<?php echo $t->carteo_ptot?>'/></td>
       
    </tr>
    
    
      <tr class="odd gradeX">
    
    
    <td >R</td>
<td> <input type='text' class='form-control' id='carteo_r1' name='carteo_r1' value='<?php echo $t->carteo_r1?>'/></td>
<td> <input type='text' class='form-control' id='carteo_r2' name='carteo_r2' value='<?php echo $t->carteo_r2?>'/></td>
<td> <input type='text' class='form-control' id='carteo_r3' name='carteo_r3' value='<?php echo $t->carteo_r3?>'/></td>
<td> <input type='text' class='form-control' id='carteo_r4' name='carteo_r4' value='<?php echo $t->carteo_r4?>'/></td>
<td> <input type='text' class='form-control' id='carteo_r5' name='carteo_r5' value='<?php echo $t->carteo_r5?>'/></td>
<td> <input type='text' class='form-control' id='carteo_rtot' name='carteo_rtot' value='<?php echo $t->carteo_rtot?>'/></td>
      
    </tr>
    
    <tr class="odd gradeX">
    
    
    <td >%</td>
   
<td> <input type='text' class='form-control' id='carteo_cum1' name='carteo_cum1' value='<?php echo $t->carteo_cum1?>'/></td>
<td> <input type='text' class='form-control' id='carteo_cum2' name='carteo_cum2' value='<?php echo $t->carteo_cum2?>'/></td>
<td> <input type='text' class='form-control' id='carteo_cum3' name='carteo_cum3' value='<?php echo $t->carteo_cum3?>'/></td>
<td> <input type='text' class='form-control' id='carteo_cum4' name='carteo_cum4' value='<?php echo $t->carteo_cum4?>'/></td>
<td> <input type='text' class='form-control' id='carteo_cum5' name='carteo_cum5' value='<?php echo $t->carteo_cum5?>'/></td>
<td> <input type='text' class='form-control' id='carteo_tot' name='carteo_tot' value='<?php echo $t->carteo_tot?>'/></td>
    
 
   
    </tr>
    
    
    
   
    
    <tr class="odd gradeX">
    
    
    <td rowspan="3">COSTO CARTEO ($) </td>
    <td >P</td>
<td> <input type='text' class='form-control' id='costocarteo_p1' name='costocarteo_p1' value='<?php echo $t->costocarteo_p1?>'/></td>
<td> <input type='text' class='form-control' id='costocarteo_p2' name='costocarteo_p2' value='<?php echo $t->costocarteo_p2?>'/></td>
<td> <input type='text' class='form-control' id='costocarteo_p3' name='costocarteo_p3' value='<?php echo $t->costocarteo_p3?>'/></td>
<td> <input type='text' class='form-control' id='costocarteo_p4' name='costocarteo_p4' value='<?php echo $t->costocarteo_p4?>'/></td>
<td> <input type='text' class='form-control' id='costocarteo_p5' name='costocarteo_p5' value='<?php echo $t->costocarteo_p5?>'/></td>
<td> <input type='text' class='form-control' id='costocarteo_ptot' name='costocarteo_ptot' value='<?php echo $t->costocarteo_ptot?>'/></td>
       
    </tr>
    
    
      <tr class="odd gradeX">
    
    
    <td >R</td>
<td> <input type='text' class='form-control' id='costocarteo_r1' name='costocarteo_r1' value='<?php echo $t->costocarteo_r1?>'/></td>
<td> <input type='text' class='form-control' id='costocarteo_r2' name='costocarteo_r2' value='<?php echo $t->costocarteo_r2?>'/></td>
<td> <input type='text' class='form-control' id='costocarteo_r3' name='costocarteo_r3' value='<?php echo $t->costocarteo_r3?>'/></td>
<td> <input type='text' class='form-control' id='costocarteo_r4' name='costocarteo_r4' value='<?php echo $t->costocarteo_r4?>'/></td>
<td> <input type='text' class='form-control' id='costocarteo_r5' name='costocarteo_r5' value='<?php echo $t->costocarteo_r5?>'/></td>
<td> <input type='text' class='form-control' id='costocarteo_rtot' name='costocarteo_rtot' value='<?php echo $t->costocarteo_rtot?>'/></td>
       
    </tr>
    
    <tr class="odd gradeX">
    
    
    <td >%</td>
   
<td> <input type='text' class='form-control' id='costocarteo_cum1' name='costocarteo_cum1' value='<?php echo $t->costocarteo_cum1?>'/></td>
<td> <input type='text' class='form-control' id='costocarteo_cum2' name='costocarteo_cum2' value='<?php echo $t->costocarteo_cum2?>'/></td>
<td> <input type='text' class='form-control' id='costocarteo_cum3' name='costocarteo_cum3' value='<?php echo $t->costocarteo_cum3?>'/></td>
<td> <input type='text' class='form-control' id='costocarteo_cum4' name='costocarteo_cum4' value='<?php echo $t->costocarteo_cum4?>'/></td>
<td> <input type='text' class='form-control' id='costocarteo_cum5' name='costocarteo_cum5' value='<?php echo $t->costocarteo_cum5?>'/></td>
<td> <input type='text' class='form-control' id='costocarteo_tot' name='costocarteo_tot' value='<?php echo $t->costocarteo_tot?>'/></td>
    
 
   
    </tr>
    
    <tr class="odd gradeX">
    
    
    <td rowspan="3">COBRANZA FISICA (COFI) </td>
    <td >P</td>
<td> <input type='text' class='form-control' id='cobranza_p1' name='cobranza_p1' value='<?php echo $t->cobranza_p1?>'/></td>
<td> <input type='text' class='form-control' id='cobranza_p2' name='cobranza_p2' value='<?php echo $t->cobranza_p2?>'/></td>
<td> <input type='text' class='form-control' id='cobranza_p3' name='cobranza_p3' value='<?php echo $t->cobranza_p3?>'/></td>
<td> <input type='text' class='form-control' id='cobranza_p4' name='cobranza_p4' value='<?php echo $t->cobranza_p4?>'/></td>
<td> <input type='text' class='form-control' id='cobranza_p5' name='cobranza_p5' value='<?php echo $t->cobranza_p5?>'/></td>
<td> <input type='text' class='form-control' id='cobranza_ptot' name='cobranza_ptot' value='<?php echo $t->cobranza_ptot?>'/></td>
      
    </tr>
    
    
      <tr class="odd gradeX">
    
    
    <td >R</td>
<td> <input type='text' class='form-control' id='cobranza_r1' name='cobranza_r1' value='<?php echo $t->cobranza_r1?>'/></td>
<td> <input type='text' class='form-control' id='cobranza_r2' name='cobranza_r2' value='<?php echo $t->cobranza_r2?>'/></td>
<td> <input type='text' class='form-control' id='cobranza_r3' name='cobranza_r3' value='<?php echo $t->cobranza_r3?>'/></td>
<td> <input type='text' class='form-control' id='cobranza_r4' name='cobranza_r4' value='<?php echo $t->cobranza_r4?>'/></td>
<td> <input type='text' class='form-control' id='cobranza_r5' name='cobranza_r5' value='<?php echo $t->cobranza_r5?>'/></td>
<td> <input type='text' class='form-control' id='cobranza_rtot' name='cobranza_rtot' value='<?php echo $t->cobranza_rtot?>'/></td>
       
    </tr>
    
    <tr class="odd gradeX">
    
    
    <td >%</td>
   
<td> <input type='text' class='form-control' id='cobranza_cum1' name='cobranza_cum1' value='<?php echo $t->cobranza_cum1?>'/></td>
<td> <input type='text' class='form-control' id='cobranza_cum2' name='cobranza_cum2' value='<?php echo $t->cobranza_cum2?>'/></td>
<td> <input type='text' class='form-control' id='cobranza_cum3' name='cobranza_cum3' value='<?php echo $t->cobranza_cum3?>'/></td>
<td> <input type='text' class='form-control' id='cobranza_cum4' name='cobranza_cum4' value='<?php echo $t->cobranza_cum4?>'/></td>
<td> <input type='text' class='form-control' id='cobranza_cum5' name='cobranza_cum5' value='<?php echo $t->cobranza_cum5?>'/></td>
<td> <input type='text' class='form-control' id='cobranza_tot' name='cobranza_tot' value='<?php echo $t->cobranza_tot?>'/></td>
    
 
   
    </tr>
    
    <tr class="odd gradeX">
    
    
    <td rowspan="3">COSTO COFI ($) </td>
    <td >P</td>
<td> <input type='text' class='form-control' id='costocofi_p1' name='costocofi_p1' value='<?php echo $t->costocofi_p1?>'/></td>
<td> <input type='text' class='form-control' id='costocofi_p2' name='costocofi_p2' value='<?php echo $t->costocofi_p2?>'/></td>
<td> <input type='text' class='form-control' id='costocofi_p3' name='costocofi_p3' value='<?php echo $t->costocofi_p3?>'/></td>
<td> <input type='text' class='form-control' id='costocofi_p4' name='costocofi_p4' value='<?php echo $t->costocofi_p4?>'/></td>
<td> <input type='text' class='form-control' id='costocofi_p5' name='costocofi_p5' value='<?php echo $t->costocofi_p5?>'/></td>
<td> <input type='text' class='form-control' id='costocofi_ptot' name='costocofi_ptot' value='<?php echo $t->costocofi_ptot?>'/></td>
       
    </tr>
    
    
      <tr class="odd gradeX">
    
    
    <td >R</td>
<td> <input type='text' class='form-control' id='costocofi_r1' name='costocofi_r1' value='<?php echo $t->costocofi_r1?>'/></td>
<td> <input type='text' class='form-control' id='costocofi_r2' name='costocofi_r2' value='<?php echo $t->costocofi_r2?>'/></td>
<td> <input type='text' class='form-control' id='costocofi_r3' name='costocofi_r3' value='<?php echo $t->costocofi_r3?>'/></td>
<td> <input type='text' class='form-control' id='costocofi_r4' name='costocofi_r4' value='<?php echo $t->costocofi_r4?>'/></td>
<td> <input type='text' class='form-control' id='costocofi_r5' name='costocofi_r5' value='<?php echo $t->costocofi_r5?>'/></td>
<td> <input type='text' class='form-control' id='costocofi_rtot' name='costocofi_rtot' value='<?php echo $t->costocofi_rtot?>'/></td>
       
    </tr>
    
    <tr class="odd gradeX">
    
    
    <td >%</td>
   
<td> <input type='text' class='form-control' id='costocofi_cum1' name='costocofi_cum1' value='<?php echo $t->costocofi_cum1?>'/></td>
<td> <input type='text' class='form-control' id='costocofi_cum2' name='costocofi_cum2' value='<?php echo $t->costocofi_cum2?>'/></td>
<td> <input type='text' class='form-control' id='costocofi_cum3' name='costocofi_cum3' value='<?php echo $t->costocofi_cum3?>'/></td>
<td> <input type='text' class='form-control' id='costocofi_cum4' name='costocofi_cum4' value='<?php echo $t->costocofi_cum4?>'/></td>
<td> <input type='text' class='form-control' id='costocofi_cum5' name='costocofi_cum5' value='<?php echo $t->costocofi_cum5?>'/></td>
<td> <input type='text' class='form-control' id='costocofi_tot' name='costocofi_tot' value='<?php echo $t->costocofi_tot?>'/></td>
    
 
   
    </tr>
    
    <tr class="odd gradeX">
    
    
    <td rowspan="3">GESTORES </td>
    <td >P</td>
<td> <input type='text' class='form-control' id='gestores_p1' name='gestores_p1' value='<?php echo $t->gestores_p1?>'/></td>
<td> <input type='text' class='form-control' id='gestores_p2' name='gestores_p2' value='<?php echo $t->gestores_p2?>'/></td>
<td> <input type='text' class='form-control' id='gestores_p3' name='gestores_p3' value='<?php echo $t->gestores_p3?>'/></td>
<td> <input type='text' class='form-control' id='gestores_p4' name='gestores_p4' value='<?php echo $t->gestores_p4?>'/></td>
<td> <input type='text' class='form-control' id='gestores_p5' name='gestores_p5' value='<?php echo $t->gestores_p5?>'/></td>
<td> <input type='text' class='form-control' id='gestores_ptot' name='gestores_ptot' value='<?php echo $t->gestores_ptot?>'/></td>
       
    </tr>
    
    
      <tr class="odd gradeX">
    
    
    <td >R</td>
<td> <input type='text' class='form-control' id='gestores_r1' name='gestores_r1' value='<?php echo $t->gestores_r1?>'/></td>
<td> <input type='text' class='form-control' id='gestores_r2' name='gestores_r2' value='<?php echo $t->gestores_r2?>'/></td>
<td> <input type='text' class='form-control' id='gestores_r3' name='gestores_r3' value='<?php echo $t->gestores_r3?>'/></td>
<td> <input type='text' class='form-control' id='gestores_r4' name='gestores_r4' value='<?php echo $t->gestores_r4?>'/></td>
<td> <input type='text' class='form-control' id='gestores_r5' name='gestores_r5' value='<?php echo $t->gestores_r5?>'/></td>
<td> <input type='text' class='form-control' id='gestores_rtot' name='gestores_rtot' value='<?php echo $t->gestores_rtot?>'/></td>
      
   
    </tr>
    
    <tr class="odd gradeX">
    
    
    <td >%</td>
<td> <input type='text' class='form-control' id='gestores_cum1' name='gestores_cum1' value='<?php echo $t->gestores_cum1?>'/></td>
<td> <input type='text' class='form-control' id='gestores_cum2' name='gestores_cum2' value='<?php echo $t->gestores_cum2?>'/></td>
<td> <input type='text' class='form-control' id='gestores_cum3' name='gestores_cum3' value='<?php echo $t->gestores_cum3?>'/></td>
<td> <input type='text' class='form-control' id='gestores_cum4' name='gestores_cum4' value='<?php echo $t->gestores_cum4?>'/></td>
<td> <input type='text' class='form-control' id='gestores_cum5' name='gestores_cum5' value='<?php echo $t->gestores_cum5?>'/></td>
<td> <input type='text' class='form-control' id='gestores_tot' name='gestores_tot' value='<?php echo $t->gestores_tot?>'/></td>
    
 
   
    </tr>
    
    <tr class="odd gradeX">
    
    
    <td rowspan="3">COSTO GESTORES ($)</td>
    <td >P</td>
<td> <input type='text' class='form-control' id='costogestores_p1' name='costogestores_p1' value='<?php echo $t->costogestores_p1?>'/></td>
<td> <input type='text' class='form-control' id='costogestores_p2' name='costogestores_p2' value='<?php echo $t->costogestores_p2?>'/></td>
<td> <input type='text' class='form-control' id='costogestores_p3' name='costogestores_p3' value='<?php echo $t->costogestores_p3?>'/></td>
<td> <input type='text' class='form-control' id='costogestores_p4' name='costogestores_p4' value='<?php echo $t->costogestores_p4?>'/></td>
<td> <input type='text' class='form-control' id='costogestores_p5' name='costogestores_p5' value='<?php echo $t->costogestores_p5?>'/></td>
<td> <input type='text' class='form-control' id='costogestores_ptot' name='costogestores_ptot' value='<?php echo $t->costogestores_ptot?>'/></td>
       
    </tr>
    
    
      <tr class="odd gradeX">
    
    
    <td >R</td>
<td> <input type='text' class='form-control' id='costogestores_r1' name='costogestores_r1' value='<?php echo $t->costogestores_r1?>'/></td>
<td> <input type='text' class='form-control' id='costogestores_r2' name='costogestores_r2' value='<?php echo $t->costogestores_r2?>'/></td>
<td> <input type='text' class='form-control' id='costogestores_r3' name='costogestores_r3' value='<?php echo $t->costogestores_r3?>'/></td>
<td> <input type='text' class='form-control' id='costogestores_r4' name='costogestores_r4' value='<?php echo $t->costogestores_r4?>'/></td>
<td> <input type='text' class='form-control' id='costogestores_r5' name='costogestores_r5' value='<?php echo $t->costogestores_r5?>'/></td>
<td> <input type='text' class='form-control' id='costogestores_rtot' name='costogestores_rtot' value='<?php echo $t->costogestores_rtot?>'/></td>
      
    </tr>
    
    <tr class="odd gradeX">
    
    
    <td >%</td>
   
<td> <input type='text' class='form-control' id='costogestores_cum1' name='costogestores_cum1' value='<?php echo $t->costogestores_cum1?>'/></td>
<td> <input type='text' class='form-control' id='costogestores_cum2' name='costogestores_cum2' value='<?php echo $t->costogestores_cum2?>'/></td>
<td> <input type='text' class='form-control' id='costogestores_cum3' name='costogestores_cum3' value='<?php echo $t->costogestores_cum3?>'/></td>
<td> <input type='text' class='form-control' id='costogestores_cum4' name='costogestores_cum4' value='<?php echo $t->costogestores_cum4?>'/></td>
<td> <input type='text' class='form-control' id='costogestores_cum5' name='costogestores_cum5' value='<?php echo $t->costogestores_cum5?>'/></td>
<td> <input type='text' class='form-control' id='costogestores_tot' name='costogestores_tot' value='<?php echo $t->costogestores_tot?>'/></td>
    
 
   
    </tr>
    
    <tr class="odd gradeX">
    
    
    <td rowspan="3">TOTAL COSTO ($) </td>
    <td >P</td>
<td> <input type='text' class='form-control' id='totalcosto_p1' name='totalcosto_p1' value='<?php echo $t->totalcosto_p1?>'/></td>
<td> <input type='text' class='form-control' id='totalcosto_p2' name='totalcosto_p2' value='<?php echo $t->totalcosto_p2?>'/></td>
<td> <input type='text' class='form-control' id='totalcosto_p3' name='totalcosto_p3' value='<?php echo $t->totalcosto_p3?>'/></td>
<td> <input type='text' class='form-control' id='totalcosto_p4' name='totalcosto_p4' value='<?php echo $t->totalcosto_p4?>'/></td>
<td> <input type='text' class='form-control' id='totalcosto_p5' name='totalcosto_p5' value='<?php echo $t->totalcosto_p5?>'/></td>
<td> <input type='text' class='form-control' id='totalcosto_ptot' name='totalcosto_ptot' value='<?php echo $t->totalcosto_ptot?>'/></td>
       
    </tr>
    
    
      <tr class="odd gradeX">
    
    
    <td >R</td>
<td> <input type='text' class='form-control' id='totalcosto_r1' name='totalcosto_r1' value='<?php echo $t->totalcosto_r1?>'/></td>
<td> <input type='text' class='form-control' id='totalcosto_r2' name='totalcosto_r2' value='<?php echo $t->totalcosto_r2?>'/></td>
<td> <input type='text' class='form-control' id='totalcosto_r3' name='totalcosto_r3' value='<?php echo $t->totalcosto_r3?>'/></td>
<td> <input type='text' class='form-control' id='totalcosto_r4' name='totalcosto_r4' value='<?php echo $t->totalcosto_r4?>'/></td>
<td> <input type='text' class='form-control' id='totalcosto_r5' name='totalcosto_r5' value='<?php echo $t->totalcosto_r5?>'/></td>
<td> <input type='text' class='form-control' id='totalcosto_rtot' name='totalcosto_rtot' value='<?php echo $t->totalcosto_rtot?>'/></td>
      
    </tr>
    
    <tr class="odd gradeX">
    
    
    <td >%</td>
   
<td> <input type='text' class='form-control' id='totalcosto_cum1' name='totalcosto_cum1' value='<?php echo $t->totalcosto_cum1?>'/></td>
<td> <input type='text' class='form-control' id='totalcosto_cum2' name='totalcosto_cum2' value='<?php echo $t->totalcosto_cum2?>'/></td>
<td> <input type='text' class='form-control' id='totalcosto_cum3' name='totalcosto_cum3' value='<?php echo $t->totalcosto_cum3?>'/></td>
<td> <input type='text' class='form-control' id='totalcosto_cum4' name='totalcosto_cum4' value='<?php echo $t->totalcosto_cum4?>'/></td>
<td> <input type='text' class='form-control' id='totalcosto_cum5' name='totalcosto_cum5' value='<?php echo $t->totalcosto_cum5?>'/></td>
<td> <input type='text' class='form-control' id='totalcosto_tot' name='totalcosto_tot' value='<?php echo $t->totalcosto_tot?>'/></td>
    
 
   
    </tr>
    
    
    
   
    
    </tbody>
    </table>
    
    			  
						  
						  
    
    
                     
                    
                    

    <?php 
	                                                    
	                                                    } 
	                                                 
	                                                ?>
       
       
       </div>   
       
       
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
    
      
        datepickerFecha: {
            required: true
        }
    },
    messages: {
        
    

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
            url: '<?= base_url() ?>PlanMaestro/EditSemanal',
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
  var lgestiones_p5 = $('#gestiones_p5').val();
         	 var lgestiones_r5 = $('#gestiones_r5').val();

                var lgest_cum5=lgestiones_r5/lgestiones_p5;
         	  
         	  $("#gest_cum5").val(number_format(lgest_cum5, 2));    

         	  //
 
 var  lgestiones_ptot=parseInt(lgestiones_p1)+parseInt(lgestiones_p2)+parseInt(lgestiones_p3)+parseInt(lgestiones_p4)+parseInt(lgestiones_p5);

 $("#gestiones_ptot").val(lgestiones_ptot); 


 var  lgestiones_rtot=parseInt(lgestiones_r1)+parseInt(lgestiones_r2)+parseInt(lgestiones_r3)+parseInt(lgestiones_r4)+parseInt(lgestiones_r5);

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

 var lminutos_p5 = $('#minutos_p5').val();
 var lminutos_r5 = $('#minutos_r5').val();

   var lmin_cum5=lminutos_r5/lminutos_p5;
  
  $("#min_cum5").val(number_format(lmin_cum5, 2));       	 

//


var  lminutos_ptot=parseInt(lminutos_p1)+parseInt(lminutos_p2)+parseInt(lminutos_p3)+parseInt(lminutos_p4)+parseInt(lminutos_p5);

$("#minutos_ptot").val(lminutos_ptot); 


var  lminutos_rtot=parseInt(lminutos_r1)+parseInt(lminutos_r2)+parseInt(lminutos_r3)+parseInt(lminutos_r4)+parseInt(lminutos_r5);

$("#minutos_rtot").val(lminutos_rtot); 


var lmin_tot=lminutos_rtot/lminutos_ptot;


 $("#min_tot").val(lmin_tot);  





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


var lgestores_p5 = $('#gestores_p5').val();
var lgestores_r5 = $('#gestores_r5').val();

  var lgestores_cum5=lgestores_r5/lgestores_p5;

 
 
 $("#gestores_cum5").val(number_format(lgestores_cum5, 2));       	 

//


var  lgestores_ptot=parseInt(lgestores_p1)+parseInt(lgestores_p2)+parseInt(lgestores_p3)+parseInt(lgestores_p4)+parseInt(lgestores_p5);

$("#gestores_ptot").val(lgestores_ptot); 


var  lgestores_rtot=parseInt(lgestores_r1)+parseInt(lgestores_r2)+parseInt(lgestores_r3)+parseInt(lgestores_r4)+parseInt(lgestores_r5);

$("#gestores_rtot").val(lgestores_rtot); 


var lgestores_tot=lgestores_rtot/lgestores_ptot;


 $("#gestores_tot").val(lgestores_tot);  

//recuperacion


 var lrecuperacion_p1 = $('#recuperacion_p1').val();
 var lrecuperacion_r1 = $('#recuperacion_r1').val();

 var lrecuperacion_cum1=lrecuperacion_r1/lrecuperacion_p1;

 $("#recuperacion_cum1").val(number_format(lrecuperacion_cum1, 2));

 //

 var lrecuperacion_p2 = $('#recuperacion_p2').val();
 var lrecuperacion_r2 = $('#recuperacion_r2').val();

 var lrecuperacion_cum2=lrecuperacion_r2/lrecuperacion_p2;
  
 $("#recuperacion_cum2").val(number_format(lrecuperacion_cum2, 2));

 //

 var lrecuperacion_p3 = $('#recuperacion_p3').val();
 var lrecuperacion_r3 = $('#recuperacion_r3').val();

  var lrecuperacion_cum3=lrecuperacion_r3/lrecuperacion_p3;

 $("#recuperacion_cum3").val(number_format(lrecuperacion_cum3, 2));

 //

 var lrecuperacion_p4 = $('#recuperacion_p4').val();
 var lrecuperacion_r4 = $('#recuperacion_r4').val();

   var lrecuperacion_cum4=lrecuperacion_r4/lrecuperacion_p4;

  
  
  $("#recuperacion_cum4").val(number_format(lrecuperacion_cum4, 2));       	 

 //


 var lrecuperacion_p5 = $('#recuperacion_p5').val();
 var lrecuperacion_r5 = $('#recuperacion_r5').val();

   var lrecuperacion_cum5=lrecuperacion_r5/lrecuperacion_p5;

  
  
  $("#recuperacion_cum5").val(number_format(lrecuperacion_cum5, 2));       	 

 //


 var  lrecuperacion_ptot=parseInt(lrecuperacion_p1)+parseInt(lrecuperacion_p2)+parseInt(lrecuperacion_p3)+parseInt(lrecuperacion_p4)+parseInt(lrecuperacion_p5);

 $("#recuperacion_ptot").val(lrecuperacion_ptot); 


 var  lrecuperacion_rtot=parseInt(lrecuperacion_r1)+parseInt(lrecuperacion_r2)+parseInt(lrecuperacion_r3)+parseInt(lrecuperacion_r4)+parseInt(lrecuperacion_r5);

 $("#recuperacion_rtot").val(lrecuperacion_rtot); 


 var lrecuperacion_tot=lrecuperacion_rtot/lrecuperacion_ptot;


  $("#recuperacion_tot").val(lrecuperacion_tot); 



//costoaire


  var lcostoaire_p1 = $('#costoaire_p1').val();
  var lcostoaire_r1 = $('#costoaire_r1').val();

  
  
  var lcostoaire_cum1=lcostoaire_r1/lcostoaire_p1;

  $("#costoaire_cum1").val(number_format(lcostoaire_cum1, 2));

  //

  var lcostoaire_p2 = $('#costoaire_p2').val();
  var lcostoaire_r2 = $('#costoaire_r2').val();

  var lcostoaire_cum2=lcostoaire_r2/lcostoaire_p2;
   
  $("#costoaire_cum2").val(number_format(lcostoaire_cum2, 2));

  //

  var lcostoaire_p3 = $('#costoaire_p3').val();
  var lcostoaire_r3 = $('#costoaire_r3').val();

   var lcostoaire_cum3=lcostoaire_r3/lcostoaire_p3;

  $("#costoaire_cum3").val(number_format(lcostoaire_cum3, 2));

  //

  var lcostoaire_p4 = $('#costoaire_p4').val();
  var lcostoaire_r4 = $('#costoaire_r4').val();

    var lcostoaire_cum4=lcostoaire_r4/lcostoaire_p4;

   
   
   $("#costoaire_cum4").val(number_format(lcostoaire_cum4, 2));       	 

  //


  var lcostoaire_p5 = $('#costoaire_p5').val();
  var lcostoaire_r5 = $('#costoaire_r5').val();

    var lcostoaire_cum5=lcostoaire_r5/lcostoaire_p5;

   
   
   $("#costoaire_cum5").val(number_format(lcostoaire_cum5, 2));       	 

  //


  var  lcostoaire_ptot=parseInt(lcostoaire_p1)+parseInt(lcostoaire_p2)+parseInt(lcostoaire_p3)+parseInt(lcostoaire_p4)+parseInt(lcostoaire_p5);

  $("#costoaire_ptot").val(lcostoaire_ptot); 


  var  lcostoaire_rtot=parseInt(lcostoaire_r1)+parseInt(lcostoaire_r2)+parseInt(lcostoaire_r3)+parseInt(lcostoaire_r4)+parseInt(lcostoaire_r5);

  $("#costoaire_rtot").val(lcostoaire_rtot); 


  var lcostoaire_tot=lcostoaire_rtot/lcostoaire_ptot;


   $("#costoaire_tot").val(lcostoaire_tot);  


                          
        	


        //carteo


          var lcarteo_p1 = $('#carteo_p1').val();
          var lcarteo_r1 = $('#carteo_r1').val();


         
          
          var lcarteo_cum1=lcarteo_r1/lcarteo_p1;

          $("#carteo_cum1").val(number_format(lcarteo_cum1, 2));

          //

          var lcarteo_p2 = $('#carteo_p2').val();
          var lcarteo_r2 = $('#carteo_r2').val();

          var lcarteo_cum2=lcarteo_r2/lcarteo_p2;
           
          $("#carteo_cum2").val(number_format(lcarteo_cum2, 2));

          //

          var lcarteo_p3 = $('#carteo_p3').val();
          var lcarteo_r3 = $('#carteo_r3').val();

           var lcarteo_cum3=lcarteo_r3/lcarteo_p3;

          $("#carteo_cum3").val(number_format(lcarteo_cum3, 2));

          //

          var lcarteo_p4 = $('#carteo_p4').val();
          var lcarteo_r4 = $('#carteo_r4').val();

            var lcarteo_cum4=lcarteo_r4/lcarteo_p4;

           
           
           $("#carteo_cum4").val(number_format(lcarteo_cum4, 2));       	 

          //


          var lcarteo_p5 = $('#carteo_p5').val();
          var lcarteo_r5 = $('#carteo_r5').val();

            var lcarteo_cum5=lcarteo_r5/lcarteo_p5;

           
           
           $("#carteo_cum5").val(number_format(lcarteo_cum5, 2));       	 

          //


          var  lcarteo_ptot=parseInt(lcarteo_p1)+parseInt(lcarteo_p2)+parseInt(lcarteo_p3)+parseInt(lcarteo_p4)+parseInt(lcarteo_p5);



          
          $("#carteo_ptot").val(lcarteo_ptot); 


          var  lcarteo_rtot=parseInt(lcarteo_r1)+parseInt(lcarteo_r2)+parseInt(lcarteo_r3)+parseInt(lcarteo_r4)+parseInt(lcarteo_r5);

          $("#carteo_rtot").val(lcarteo_rtot); 


          var lcarteo_tot=lcarteo_rtot/lcarteo_ptot;


           $("#carteo_tot").val(lcarteo_tot); 


         //costocarteo


           var lcostocarteo_p1 = $('#costocarteo_p1').val();
           var lcostocarteo_r1 = $('#costocarteo_r1').val();

           var lcostocarteo_cum1=lcostocarteo_r1/lcostocarteo_p1;

           $("#costocarteo_cum1").val(number_format(lcostocarteo_cum1, 2));

           //

           var lcostocarteo_p2 = $('#costocarteo_p2').val();
           var lcostocarteo_r2 = $('#costocarteo_r2').val();

           var lcostocarteo_cum2=lcostocarteo_r2/lcostocarteo_p2;
            
           $("#costocarteo_cum2").val(number_format(lcostocarteo_cum2, 2));

           //

           var lcostocarteo_p3 = $('#costocarteo_p3').val();
           var lcostocarteo_r3 = $('#costocarteo_r3').val();

            var lcostocarteo_cum3=lcostocarteo_r3/lcostocarteo_p3;

           $("#costocarteo_cum3").val(number_format(lcostocarteo_cum3, 2));

           //

           var lcostocarteo_p4 = $('#costocarteo_p4').val();
           var lcostocarteo_r4 = $('#costocarteo_r4').val();

             var lcostocarteo_cum4=lcostocarteo_r4/lcostocarteo_p4;

            
            
            $("#costocarteo_cum4").val(number_format(lcostocarteo_cum4, 2));       	 

           //


           var lcostocarteo_p5 = $('#costocarteo_p5').val();
           var lcostocarteo_r5 = $('#costocarteo_r5').val();

             var lcostocarteo_cum5=lcostocarteo_r5/lcostocarteo_p5;

            
            
            $("#costocarteo_cum5").val(number_format(lcostocarteo_cum5, 2));       	 

           //


           var  lcostocarteo_ptot=parseInt(lcostocarteo_p1)+parseInt(lcostocarteo_p2)+parseInt(lcostocarteo_p3)+parseInt(lcostocarteo_p4)+parseInt(lcostocarteo_p5);

           $("#costocarteo_ptot").val(lcostocarteo_ptot); 


           var  lcostocarteo_rtot=parseInt(lcostocarteo_r1)+parseInt(lcostocarteo_r2)+parseInt(lcostocarteo_r3)+parseInt(lcostocarteo_r4)+parseInt(lcostocarteo_r5);

           $("#costocarteo_rtot").val(lcostocarteo_rtot); 


           var lcostocarteo_tot=lcostocarteo_rtot/lcostocarteo_ptot;


            $("#costocarteo_tot").val(lcostocarteo_tot); 


          //cobranza


            var lcobranza_p1 = $('#cobranza_p1').val();
            var lcobranza_r1 = $('#cobranza_r1').val();

            var lcobranza_cum1=lcobranza_r1/lcobranza_p1;

            $("#cobranza_cum1").val(number_format(lcobranza_cum1, 2));

            //

            var lcobranza_p2 = $('#cobranza_p2').val();
            var lcobranza_r2 = $('#cobranza_r2').val();

            var lcobranza_cum2=lcobranza_r2/lcobranza_p2;
             
            $("#cobranza_cum2").val(number_format(lcobranza_cum2, 2));

            //

            var lcobranza_p3 = $('#cobranza_p3').val();
            var lcobranza_r3 = $('#cobranza_r3').val();

             var lcobranza_cum3=lcobranza_r3/lcobranza_p3;

            $("#cobranza_cum3").val(number_format(lcobranza_cum3, 2));

            //

            var lcobranza_p4 = $('#cobranza_p4').val();
            var lcobranza_r4 = $('#cobranza_r4').val();

              var lcobranza_cum4=lcobranza_r4/lcobranza_p4;

             
             
             $("#cobranza_cum4").val(number_format(lcobranza_cum4, 2));       	 

            //


            var lcobranza_p5 = $('#cobranza_p5').val();
            var lcobranza_r5 = $('#cobranza_r5').val();

              var lcobranza_cum5=lcobranza_r5/lcobranza_p5;

             
             
             $("#cobranza_cum5").val(number_format(lcobranza_cum5, 2));       	 

            //


            var  lcobranza_ptot=parseInt(lcobranza_p1)+parseInt(lcobranza_p2)+parseInt(lcobranza_p3)+parseInt(lcobranza_p4)+parseInt(lcobranza_p5);

            $("#cobranza_ptot").val(lcobranza_ptot); 


            var  lcobranza_rtot=parseInt(lcobranza_r1)+parseInt(lcobranza_r2)+parseInt(lcobranza_r3)+parseInt(lcobranza_r4)+parseInt(lcobranza_r5);

            $("#cobranza_rtot").val(lcobranza_rtot); 


            var lcobranza_tot=lcobranza_rtot/lcobranza_ptot;


             $("#cobranza_tot").val(lcobranza_tot);    

           //costocofi


             var lcostocofi_p1 = $('#costocofi_p1').val();
             var lcostocofi_r1 = $('#costocofi_r1').val();

             var lcostocofi_cum1=lcostocofi_r1/lcostocofi_p1;

             $("#costocofi_cum1").val(number_format(lcostocofi_cum1, 2));

             //

             var lcostocofi_p2 = $('#costocofi_p2').val();
             var lcostocofi_r2 = $('#costocofi_r2').val();

             var lcostocofi_cum2=lcostocofi_r2/lcostocofi_p2;
              
             $("#costocofi_cum2").val(number_format(lcostocofi_cum2, 2));

             //

             var lcostocofi_p3 = $('#costocofi_p3').val();
             var lcostocofi_r3 = $('#costocofi_r3').val();

              var lcostocofi_cum3=lcostocofi_r3/lcostocofi_p3;

             $("#costocofi_cum3").val(number_format(lcostocofi_cum3, 2));

             //

             var lcostocofi_p4 = $('#costocofi_p4').val();
             var lcostocofi_r4 = $('#costocofi_r4').val();

               var lcostocofi_cum4=lcostocofi_r4/lcostocofi_p4;

              
              
              $("#costocofi_cum4").val(number_format(lcostocofi_cum4, 2));       	 

             //


             var lcostocofi_p5 = $('#costocofi_p5').val();
             var lcostocofi_r5 = $('#costocofi_r5').val();

               var lcostocofi_cum5=lcostocofi_r5/lcostocofi_p5;

              
              
              $("#costocofi_cum5").val(number_format(lcostocofi_cum5, 2));       	 

             //


             var  lcostocofi_ptot=parseInt(lcostocofi_p1)+parseInt(lcostocofi_p2)+parseInt(lcostocofi_p3)+parseInt(lcostocofi_p4)+parseInt(lcostocofi_p5);

             $("#costocofi_ptot").val(lcostocofi_ptot); 


             var  lcostocofi_rtot=parseInt(lcostocofi_r1)+parseInt(lcostocofi_r2)+parseInt(lcostocofi_r3)+parseInt(lcostocofi_r4)+parseInt(lcostocofi_r5);

             $("#costocofi_rtot").val(lcostocofi_rtot); 


             var lcostocofi_tot=lcostocofi_rtot/lcostocofi_ptot;


              $("#costocofi_tot").val(lcostocofi_tot); 

            //costogestores


              var lcostogestores_p1 = $('#costogestores_p1').val();
              var lcostogestores_r1 = $('#costogestores_r1').val();

              var lcostogestores_cum1=lcostogestores_r1/lcostogestores_p1;

              $("#costogestores_cum1").val(number_format(lcostogestores_cum1, 2));

              //

              var lcostogestores_p2 = $('#costogestores_p2').val();
              var lcostogestores_r2 = $('#costogestores_r2').val();

              var lcostogestores_cum2=lcostogestores_r2/lcostogestores_p2;
               
              $("#costogestores_cum2").val(number_format(lcostogestores_cum2, 2));

              //

              var lcostogestores_p3 = $('#costogestores_p3').val();
              var lcostogestores_r3 = $('#costogestores_r3').val();

               var lcostogestores_cum3=lcostogestores_r3/lcostogestores_p3;

              $("#costogestores_cum3").val(number_format(lcostogestores_cum3, 2));

              //

              var lcostogestores_p4 = $('#costogestores_p4').val();
              var lcostogestores_r4 = $('#costogestores_r4').val();

                var lcostogestores_cum4=lcostogestores_r4/lcostogestores_p4;

               
               
               $("#costogestores_cum4").val(number_format(lcostogestores_cum4, 2));       	 

              //


              var lcostogestores_p5 = $('#costogestores_p5').val();
              var lcostogestores_r5 = $('#costogestores_r5').val();

                var lcostogestores_cum5=lcostogestores_r5/lcostogestores_p5;

               
               
               $("#costogestores_cum5").val(number_format(lcostogestores_cum5, 2));       	 

              //


              var  lcostogestores_ptot=parseInt(lcostogestores_p1)+parseInt(lcostogestores_p2)+parseInt(lcostogestores_p3)+parseInt(lcostogestores_p4)+parseInt(lcostogestores_p5);

              $("#costogestores_ptot").val(lcostogestores_ptot); 


              var  lcostogestores_rtot=parseInt(lcostogestores_r1)+parseInt(lcostogestores_r2)+parseInt(lcostogestores_r3)+parseInt(lcostogestores_r4)+parseInt(lcostogestores_r5);

              $("#costogestores_rtot").val(lcostogestores_rtot); 


              var lcostogestores_tot=lcostogestores_rtot/lcostogestores_ptot;


               $("#costogestores_tot").val(lcostogestores_tot);  


             //totalcosto


               var ltotalcosto_p1 = $('#totalcosto_p1').val();
               var ltotalcosto_r1 = $('#totalcosto_r1').val();

               var ltotalcosto_cum1=ltotalcosto_r1/ltotalcosto_p1;

               $("#totalcosto_cum1").val(number_format(ltotalcosto_cum1, 2));

               //

               var ltotalcosto_p2 = $('#totalcosto_p2').val();
               var ltotalcosto_r2 = $('#totalcosto_r2').val();

               var ltotalcosto_cum2=ltotalcosto_r2/ltotalcosto_p2;
                
               $("#totalcosto_cum2").val(number_format(ltotalcosto_cum2, 2));

               //

               var ltotalcosto_p3 = $('#totalcosto_p3').val();
               var ltotalcosto_r3 = $('#totalcosto_r3').val();

                var ltotalcosto_cum3=ltotalcosto_r3/ltotalcosto_p3;

               $("#totalcosto_cum3").val(number_format(ltotalcosto_cum3, 2));

               //

               var ltotalcosto_p4 = $('#totalcosto_p4').val();
               var ltotalcosto_r4 = $('#totalcosto_r4').val();

                 var ltotalcosto_cum4=ltotalcosto_r4/ltotalcosto_p4;

                
                
                $("#totalcosto_cum4").val(number_format(ltotalcosto_cum4, 2));       	 

               //


               var ltotalcosto_p5 = $('#totalcosto_p5').val();
               var ltotalcosto_r5 = $('#totalcosto_r5').val();

                 var ltotalcosto_cum5=ltotalcosto_r5/ltotalcosto_p5;

                
                
                $("#totalcosto_cum5").val(number_format(ltotalcosto_cum5, 2));       	 

               //


               var  ltotalcosto_ptot=parseInt(ltotalcosto_p1)+parseInt(ltotalcosto_p2)+parseInt(ltotalcosto_p3)+parseInt(ltotalcosto_p4)+parseInt(ltotalcosto_p5);

               $("#totalcosto_ptot").val(ltotalcosto_ptot); 


               var  ltotalcosto_rtot=parseInt(ltotalcosto_r1)+parseInt(ltotalcosto_r2)+parseInt(ltotalcosto_r3)+parseInt(ltotalcosto_r4)+parseInt(ltotalcosto_r5);

               $("#totalcosto_rtot").val(ltotalcosto_rtot); 


               var ltotalcosto_tot=ltotalcosto_rtot/ltotalcosto_ptot;


                $("#totalcosto_tot").val(ltotalcosto_tot);   


          });

          
    </script>
    
    
    <script>
  $(function() {
    $( "#datepickerFecha" ).datepicker({ dateFormat: 'yy/mm/dd' });
  });
  </script>


</body>
</html>
