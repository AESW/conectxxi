<script type="text/javascript">
    $(document).ready( function() {
      $('#tab-container').easytabs();
      $("#btnNextFDP1").click(function(){
	      $('.page').ScrollTo();
	      $(".step2").trigger("click");
	      
      });
      $("#btnNextFDP2").click(function(){
	      $('.page').ScrollTo();
	      $(".step3").trigger("click");
	      
      });
    });
  </script>
  
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

  
  <div id="tab-container" class="tab-container">
		 <div class='panel-container'>
		 
		 <a href="javascript:history.back()"> Regresar</a>
		<br>
		<br>
  
<a  id="CalcularBtn" class="btn btn-success">Calcular</a>
<a  id="ingresarBtn" class="btn btn-success">Guardar</a>
  
  
	<div class="formulario_fdp">
		<div id="tab-container" class="tab-container">
		  	<ul class='etabs'>
			    <li class='tab'><a href="#tabs1-paso1" class="step1">Operaciones</a></li>
			    <li class='tab'><a href="#tabs1-paso2" class="step2">Procesos Clave</a></li>
			    <li class='tab'><a href="#tabs1-paso3" class="step3">Nómina + Recursos Humanos</a></li>
		  	</ul>
		  	<div class='panel-container'>
			  <form  id="generales" >
			  
			  
			  
			  
			  
			  
			  
			       <?php 
			     foreach($DiarioOperaciones as  $t){ ?>
			     
			     
			                      <input type="hidden" class="form-control" id="id" name="id" value="<?php echo $t->id_plan?>"/>           
          
        
    <div class="form-group">
						    
			
                
                
                 <label class="col-sm-1 control-label">FECHA:</label>
                <div class="col-sm-3">
                    <div class="input-group">
                      <input type="text" class="form-control" id="datepickerFecha"
															name="datepickerFecha" value="<?php echo $t->fecha?>"/>
                      <span class="input-group-addon" id="datepickerbtn2"><i class="glyphicon glyphicon-calendar"></i></span>
                    </div>
                    
                </div>
						     
						     
						     
						  </div>
						  <br>
						  <br>
						  <br>
			  
			  <!-- Paso 1 -->
			  <div id="tabs1-paso1">
	
			   <table cellpadding="0" cellspacing="0" border="0"
												class="table table-striped table-bordered " id="table_emplext">
    
    <thead>
													<tr>
														<th   >INDICADOR</th>
													   <th ></th>
													<th >VIE</th>
													<th >SAB</th>
													<th >DOM</th>
													<th >LUN</th>
													<th >MAR</th>
													<th >MIE</th>
													<th >JUE</th>
													<th >TOTAL SEMANAL</th>
													<th >PROM DIA</th>
														
													
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
        <td> <input type="text" class="form-control"  id="gestiones_p5" name="gestiones_p5" value="<?php echo $t->gestiones_p5?>"/></td>
        <td> <input type="text" class="form-control"  id="gestiones_p6" name="gestiones_p6" value="<?php echo $t->gestiones_p6?>"/></td>
         <td> <input type="text" class="form-control"  id="gestiones_p7" name="gestiones_p7" value="<?php echo $t->gestiones_p7?>"/></td>
    <td > <input type="text" class="form-control"readonly id="gestiones_ptot" name="gestiones_ptot" value="<?php echo $t->gestiones_ptot?>" /></td>
      <td > <input type="text" class="form-control"readonly id="gestiones_pprom" name="gestiones_pprom" value="<?php echo $t->gestiones_pprom?>" /></td>
   
    </tr>
    
    
      <tr class="odd gradeX">
    
    
    <td >R</td>
    <td> <input type="text" class="form-control" id="gestiones_r1" name="gestiones_r1" value="<?php echo $t->gestiones_r1?>"/></td>
    <td> <input type="text" class="form-control" id="gestiones_r2" name="gestiones_r2" value="<?php echo $t->gestiones_r2?>"/></td>
    <td> <input type="text" class="form-control"   id="gestiones_r3" name="gestiones_r3" value="<?php echo $t->gestiones_r3?>"/></td>
    <td> <input type="text" class="form-control"  id="gestiones_r4" name="gestiones_r4" value="<?php echo $t->gestiones_r4?>"/></td>
      <td> <input type="text" class="form-control"  id="gestiones_r5" name="gestiones_r5" value="<?php echo $t->gestiones_r5?>"/></td>
         <td> <input type="text" class="form-control"  id="gestiones_r6" name="gestiones_r6" value="<?php echo $t->gestiones_r6?>"/></td>
                  <td> <input type="text" class="form-control"  id="gestiones_r7" name="gestiones_r7" value="<?php echo $t->gestiones_r7?>"/></td>
    <td > <input type="text" class="form-control"readonly id="gestiones_rtot" name="gestiones_rtot" value="<?php echo $t->gestiones_rtot?>" /></td>
        <td > <input type="text" class="form-control"readonly id="gestiones_rprom" name="gestiones_rprom" value="<?php echo $t->gestiones_rprom?>" /></td>
   
    </tr>
    
    <tr class="odd gradeX">
    
    
    <td >%</td>
    <td > <input type="text" class="form-control" readonly id="gest_cum1" name="gest_cum1" value="<?php echo $t->gest_cum1?>" /></td>
    <td> <input type="text" class="form-control" readonly id="gest_cum2" name="gest_cum2" value="<?php echo $t->gest_cum2?>"/></td>
    <td> <input type="text" class="form-control"  readonly id="gest_cum3" name="gest_cum3" value="<?php echo $t->gest_cum3?>"/></td>
    <td> <input type="text" class="form-control"   readonly id="gest_cum4" name="gest_cum4" value="<?php echo $t->gest_cum4?>"/></td>
        <td> <input type="text" class="form-control"   readonly id="gest_cum5" name="gest_cum5" value="<?php echo $t->gest_cum5?>"/></td>
        <td> <input type="text" class="form-control"   readonly id="gest_cum6" name="gest_cum6" value="<?php echo $t->gest_cum6?>"/></td>
         <td> <input type="text" class="form-control"   readonly id="gest_cum7" name="gest_cum7" value="<?php echo $t->gest_cum7?>"/></td>
    <td> <input type="text" class="form-control" readonly id="gest_tot" name="gest_tot" value="<?php echo $t->gest_tot?>"/></td>
     <td> <input type="text" class="form-control" readonly id="gest_prom" name="gest_prom" value="<?php echo $t->gest_prom?>"/></td>
 
   
    </tr>
    
     <tr class="odd gradeX">
    
    
    <td rowspan="3" width="12%">GESTIONES POR HORA </td>
    <td >P</td>
    <td> <input type="text" class="form-control" id="gestionesHora_p1" name="gestionesHora_p1" value="<?php echo $t->gestionesHora_p1?>"/></td>
    <td> <input type="text" class="form-control" id="gestionesHora_p2" name="gestionesHora_p2" value="<?php echo $t->gestionesHora_p2?>"/></td>
    <td> <input type="text" class="form-control"   id="gestionesHora_p3" name="gestionesHora_p3" value="<?php echo $t->gestionesHora_p3?>"/></td>
    <td> <input type="text" class="form-control"  id="gestionesHora_p4" name="gestionesHora_p4" value="<?php echo $t->gestionesHora_p4?>"/></td>
        <td> <input type="text" class="form-control"  id="gestionesHora_p5" name="gestionesHora_p5" value="<?php echo $t->gestionesHora_p5?>"/></td>
        <td> <input type="text" class="form-control"  id="gestionesHora_p6" name="gestionesHora_p6" value="<?php echo $t->gestionesHora_p6?>"/></td>
         <td> <input type="text" class="form-control"  id="gestionesHora_p7" name="gestionesHora_p7" value="<?php echo $t->gestionesHora_p7?>"/></td>
    <td > <input type="text" class="form-control"readonly id="gestionesHora_ptot" name="gestionesHora_ptot" value="<?php echo $t->gestionesHora_ptot?>" /></td>
      <td > <input type="text" class="form-control"readonly id="gestionesHora_pprom" name="gestionesHora_pprom" value="<?php echo $t->gestionesHora_pprom?>" /></td>
   
    </tr>
    
    
      <tr class="odd gradeX">
    
    
    <td >R</td>
    <td> <input type="text" class="form-control" id="gestionesHora_r1" name="gestionesHora_r1" value="<?php echo $t->gestionesHora_r1?>"/></td>
    <td> <input type="text" class="form-control" id="gestionesHora_r2" name="gestionesHora_r2" value="<?php echo $t->gestionesHora_r2?>"/></td>
    <td> <input type="text" class="form-control"   id="gestionesHora_r3" name="gestionesHora_r3" value="<?php echo $t->gestionesHora_r3?>"/></td>
    <td> <input type="text" class="form-control"  id="gestionesHora_r4" name="gestionesHora_r4" value="<?php echo $t->gestionesHora_r4?>"/></td>
      <td> <input type="text" class="form-control"  id="gestionesHora_r5" name="gestionesHora_r5" value="<?php echo $t->gestionesHora_r5?>"/></td>
         <td> <input type="text" class="form-control"  id="gestionesHora_r6" name="gestionesHora_r6" value="<?php echo $t->gestionesHora_r6?>"/></td>
                  <td> <input type="text" class="form-control"  id="gestionesHora_r7" name="gestionesHora_r7" value="<?php echo $t->gestionesHora_r7?>"/></td>
    <td > <input type="text" class="form-control"readonly id="gestionesHora_rtot" name="gestionesHora_rtot" value="<?php echo $t->gestionesHora_rtot?>" /></td>
        <td > <input type="text" class="form-control"readonly id="gestionesHora_rprom" name="gestionesHora_rprom" value="<?php echo $t->gestionesHora_rprom?>" /></td>
   
    </tr>
    
    <tr class="odd gradeX">
    
    
    <td >%</td>
    <td > <input type="text" class="form-control" readonly id="gestionesHora_cum1" name="gestionesHora_cum1" value="<?php echo $t->gestionesHora_cum1?>" /></td>
    <td> <input type="text" class="form-control" readonly id="gestionesHora_cum2" name="gestionesHora_cum2" value="<?php echo $t->gestionesHora_cum2?>"/></td>
    <td> <input type="text" class="form-control"  readonly id="gestionesHora_cum3" name="gestionesHora_cum3" value="<?php echo $t->gestionesHora_cum3?>"/></td>
    <td> <input type="text" class="form-control"   readonly id="gestionesHora_cum4" name="gestionesHora_cum4" value="<?php echo $t->gestionesHora_cum4?>"/></td>
        <td> <input type="text" class="form-control"   readonly id="gestionesHora_cum5" name="gestionesHora_cum5" value="<?php echo $t->gestionesHora_cum5?>"/></td>
        <td> <input type="text" class="form-control"   readonly id="gestionesHora_cum6" name="gestionesHora_cum6" value="<?php echo $t->gestionesHora_cum6?>"/></td>
         <td> <input type="text" class="form-control"   readonly id="gestionesHora_cum7" name="gestionesHora_cum7" value="<?php echo $t->gestionesHora_cum7?>"/></td>
    <td> <input type="text" class="form-control" readonly id="gestionesHora_tot" name="gestionesHora_tot" value="<?php echo $t->gestionesHora_tot?>"/></td>
     <td> <input type="text" class="form-control" readonly id="gestionesHora_prom" name="gestionesHora_prom" value="<?php echo $t->gestionesHora_prom?>"/></td>
 
   
    </tr>
    
     <tr class="odd gradeX">
    
    
    <td rowspan="3" width="12%">GPHG </td>
    <td >P</td>
    <td> <input type="text" class="form-control" id="gphg_p1" name="gphg_p1" value="<?php echo $t->gphg_p1?>"/></td>
    <td> <input type="text" class="form-control" id="gphg_p2" name="gphg_p2" value="<?php echo $t->gphg_p2?>"/></td>
    <td> <input type="text" class="form-control"   id="gphg_p3" name="gphg_p3" value="<?php echo $t->gphg_p3?>"/></td>
    <td> <input type="text" class="form-control"  id="gphg_p4" name="gphg_p4" value="<?php echo $t->gphg_p4?>"/></td>
        <td> <input type="text" class="form-control"  id="gphg_p5" name="gphg_p5" value="<?php echo $t->gphg_p5?>"/></td>
        <td> <input type="text" class="form-control"  id="gphg_p6" name="gphg_p6" value="<?php echo $t->gphg_p6?>"/></td>
         <td> <input type="text" class="form-control"  id="gphg_p7" name="gphg_p7" value="<?php echo $t->gphg_p7?>"/></td>
    <td > <input type="text" class="form-control"readonly id="gphg_ptot" name="gphg_ptot" value="<?php echo $t->gphg_ptot?>" /></td>
      <td > <input type="text" class="form-control"readonly id="gphg_pprom" name="gphg_pprom" value="<?php echo $t->gphg_pprom?>" /></td>
   
    </tr>
    
    
      <tr class="odd gradeX">
    
    
    <td >R</td>
    <td> <input type="text" class="form-control" id="gphg_r1" name="gphg_r1" value="<?php echo $t->gphg_r1?>"/></td>
    <td> <input type="text" class="form-control" id="gphg_r2" name="gphg_r2" value="<?php echo $t->gphg_r2?>"/></td>
    <td> <input type="text" class="form-control"   id="gphg_r3" name="gphg_r3" value="<?php echo $t->gphg_r3?>"/></td>
    <td> <input type="text" class="form-control"  id="gphg_r4" name="gphg_r4" value="<?php echo $t->gphg_r4?>"/></td>
      <td> <input type="text" class="form-control"  id="gphg_r5" name="gphg_r5" value="<?php echo $t->gphg_r5?>"/></td>
         <td> <input type="text" class="form-control"  id="gphg_r6" name="gphg_r6" value="<?php echo $t->gphg_r6?>"/></td>
                  <td> <input type="text" class="form-control"  id="gphg_r7" name="gphg_r7" value="<?php echo $t->gphg_r7?>"/></td>
    <td > <input type="text" class="form-control"readonly id="gphg_rtot" name="gphg_rtot" value="<?php echo $t->gphg_rtot?>" /></td>
        <td > <input type="text" class="form-control"readonly id="gphg_rprom" name="gphg_rprom" value="<?php echo $t->gphg_rprom?>" /></td>
   
    </tr>
    
    <tr class="odd gradeX">
    
    
    <td >%</td>
    <td > <input type="text" class="form-control" readonly id="gphg_cum1" name="gphg_cum1" value="<?php echo $t->gphg_cum1?>" /></td>
    <td> <input type="text" class="form-control" readonly id="gphg_cum2" name="gphg_cum2" value="<?php echo $t->gphg_cum2?>"/></td>
    <td> <input type="text" class="form-control"  readonly id="gphg_cum3" name="gphg_cum3" value="<?php echo $t->gphg_cum3?>"/></td>
    <td> <input type="text" class="form-control"   readonly id="gphg_cum4" name="gphg_cum4" value="<?php echo $t->gphg_cum4?>"/></td>
        <td> <input type="text" class="form-control"   readonly id="gphg_cum5" name="gphg_cum5" value="<?php echo $t->gphg_cum5?>"/></td>
        <td> <input type="text" class="form-control"   readonly id="gphg_cum6" name="gphg_cum6" value="<?php echo $t->gphg_cum6?>"/></td>
         <td> <input type="text" class="form-control"   readonly id="gphg_cum7" name="gphg_cum7" value="<?php echo $t->gphg_cum7?>"/></td>
    <td> <input type="text" class="form-control" readonly id="gphg_tot" name="gphg_tot" value="<?php echo $t->gphg_tot?>"/></td>
     <td> <input type="text" class="form-control" readonly id="gphg_prom" name="gphg_prom" value="<?php echo $t->gphg_prom?>"/></td>
 
   
    </tr>
    
     <tr class="odd gradeX">
    
    
    <td rowspan="3" width="12%">IMPORTE PROMESA PAGO REALIZADAS</td>
    <td >P</td>
    <td> <input type="text" class="form-control" id="promeReali_p1" name="promeReali_p1" value="<?php echo $t->promeReali_p1?>"/></td>
    <td> <input type="text" class="form-control" id="promeReali_p2" name="promeReali_p2" value="<?php echo $t->promeReali_p2?>"/></td>
    <td> <input type="text" class="form-control"   id="promeReali_p3" name="promeReali_p3" value="<?php echo $t->promeReali_p3?>"/></td>
    <td> <input type="text" class="form-control"  id="promeReali_p4" name="promeReali_p4" value="<?php echo $t->promeReali_p4?>"/></td>
        <td> <input type="text" class="form-control"  id="promeReali_p5" name="promeReali_p5" value="<?php echo $t->promeReali_p5?>"/></td>
        <td> <input type="text" class="form-control"  id="promeReali_p6" name="promeReali_p6" value="<?php echo $t->promeReali_p6?>"/></td>
         <td> <input type="text" class="form-control"  id="promeReali_p7" name="promeReali_p7" value="<?php echo $t->promeReali_p7?>"/></td>
    <td > <input type="text" class="form-control"readonly id="promeReali_ptot" name="promeReali_ptot" value="<?php echo $t->promeReali_ptot?>" /></td>
      <td > <input type="text" class="form-control"readonly id="promeReali_pprom" name="promeReali_pprom" value="<?php echo $t->promeReali_pprom?>" /></td>
   
    </tr>
    
    
      <tr class="odd gradeX">
    
    
    <td >R</td>
    <td> <input type="text" class="form-control" id="promeReali_r1" name="promeReali_r1" value="<?php echo $t->promeReali_r1?>"/></td>
    <td> <input type="text" class="form-control" id="promeReali_r2" name="promeReali_r2" value="<?php echo $t->promeReali_r2?>"/></td>
    <td> <input type="text" class="form-control"   id="promeReali_r3" name="promeReali_r3" value="<?php echo $t->promeReali_r3?>"/></td>
    <td> <input type="text" class="form-control"  id="promeReali_r4" name="promeReali_r4" value="<?php echo $t->promeReali_r4?>"/></td>
      <td> <input type="text" class="form-control"  id="promeReali_r5" name="promeReali_r5" value="<?php echo $t->promeReali_r5?>"/></td>
         <td> <input type="text" class="form-control"  id="promeReali_r6" name="promeReali_r6" value="<?php echo $t->promeReali_r6?>"/></td>
                  <td> <input type="text" class="form-control"  id="promeReali_r7" name="promeReali_r7" value="<?php echo $t->promeReali_r7?>"/></td>
    <td > <input type="text" class="form-control"readonly id="promeReali_rtot" name="promeReali_rtot" value="<?php echo $t->promeReali_rtot?>" /></td>
        <td > <input type="text" class="form-control"readonly id="promeReali_rprom" name="promeReali_rprom" value="<?php echo $t->promeReali_rprom?>" /></td>
   
    </tr>
    
    <tr class="odd gradeX">
    
    
    <td >%</td>
    <td > <input type="text" class="form-control" readonly id="promeReali_cum1" name="promeReali_cum1" value="<?php echo $t->promeReali_cum1?>" /></td>
    <td> <input type="text" class="form-control" readonly id="promeReali_cum2" name="promeReali_cum2" value="<?php echo $t->promeReali_cum2?>"/></td>
    <td> <input type="text" class="form-control"  readonly id="promeReali_cum3" name="promeReali_cum3" value="<?php echo $t->promeReali_cum3?>"/></td>
    <td> <input type="text" class="form-control"   readonly id="promeReali_cum4" name="promeReali_cum4" value="<?php echo $t->promeReali_cum4?>"/></td>
        <td> <input type="text" class="form-control"   readonly id="promeReali_cum5" name="promeReali_cum5" value="<?php echo $t->promeReali_cum5?>"/></td>
        <td> <input type="text" class="form-control"   readonly id="promeReali_cum6" name="promeReali_cum6" value="<?php echo $t->promeReali_cum6?>"/></td>
         <td> <input type="text" class="form-control"   readonly id="promeReali_cum7" name="promeReali_cum7" value="<?php echo $t->promeReali_cum7?>"/></td>
    <td> <input type="text" class="form-control" readonly id="promeReali_tot" name="promeReali_tot" value="<?php echo $t->promeReali_tot?>"/></td>
     <td> <input type="text" class="form-control" readonly id="promeReali_prom" name="promeReali_prom" value="<?php echo $t->promeReali_prom?>"/></td>
 
   
    </tr>
    
     <tr class="odd gradeX">
    
    
    <td rowspan="3" width="12%">PROMESAS DE PAGO CUMPLIDAS POR DIA ($)</td>
    <td >P</td>
    <td> <input type="text" class="form-control" id="promeCum_p1" name="promeCum_p1" value="<?php echo $t->promeCum_p1?>"/></td>
    <td> <input type="text" class="form-control" id="promeCum_p2" name="promeCum_p2" value="<?php echo $t->promeCum_p2?>"/></td>
    <td> <input type="text" class="form-control"   id="promeCum_p3" name="promeCum_p3" value="<?php echo $t->promeCum_p3?>"/></td>
    <td> <input type="text" class="form-control"  id="promeCum_p4" name="promeCum_p4" value="<?php echo $t->promeCum_p4?>"/></td>
        <td> <input type="text" class="form-control"  id="promeCum_p5" name="promeCum_p5" value="<?php echo $t->promeCum_p5?>"/></td>
        <td> <input type="text" class="form-control"  id="promeCum_p6" name="promeCum_p6" value="<?php echo $t->promeCum_p6?>"/></td>
         <td> <input type="text" class="form-control"  id="promeCum_p7" name="promeCum_p7" value="<?php echo $t->promeCum_p7?>"/></td>
    <td > <input type="text" class="form-control"readonly id="promeCum_ptot" name="promeCum_ptot" value="<?php echo $t->promeCum_ptot?>" /></td>
      <td > <input type="text" class="form-control"readonly id="promeCum_pprom" name="promeCum_pprom" value="<?php echo $t->promeCum_pprom?>" /></td>
   
    </tr>
    
    
      <tr class="odd gradeX">
    
    
    <td >R</td>
    <td> <input type="text" class="form-control" id="promeCum_r1" name="promeCum_r1" value="<?php echo $t->promeCum_r1?>"/></td>
    <td> <input type="text" class="form-control" id="promeCum_r2" name="promeCum_r2" value="<?php echo $t->promeCum_r2?>"/></td>
    <td> <input type="text" class="form-control"   id="promeCum_r3" name="promeCum_r3" value="<?php echo $t->promeCum_r3?>"/></td>
    <td> <input type="text" class="form-control"  id="promeCum_r4" name="promeCum_r4" value="<?php echo $t->promeCum_r4?>"/></td>
      <td> <input type="text" class="form-control"  id="promeCum_r5" name="promeCum_r5" value="<?php echo $t->promeCum_r5?>"/></td>
         <td> <input type="text" class="form-control"  id="promeCum_r6" name="promeCum_r6" value="<?php echo $t->promeCum_r6?>"/></td>
                  <td> <input type="text" class="form-control"  id="promeCum_r7" name="promeCum_r7" value="<?php echo $t->promeCum_r7?>"/></td>
    <td > <input type="text" class="form-control"readonly id="promeCum_rtot" name="promeCum_rtot" value="<?php echo $t->promeCum_rtot?>" /></td>
        <td > <input type="text" class="form-control"readonly id="promeCum_rprom" name="promeCum_rprom" value="<?php echo $t->promeCum_rprom?>" /></td>
   
    </tr>
    
    <tr class="odd gradeX">
    
    
    <td >%</td>
   <td> <input type='text' class='form-control' id='promeCum_cum1' name='promeCum_cum1' value='<?php echo $t->promeCum_cum1?>'/></td>
<td> <input type='text' class='form-control' id='promeCum_cum2' name='promeCum_cum2' value='<?php echo $t->promeCum_cum2?>'/></td>
<td> <input type='text' class='form-control' id='promeCum_cum3' name='promeCum_cum3' value='<?php echo $t->promeCum_cum3?>'/></td>
<td> <input type='text' class='form-control' id='promeCum_cum4' name='promeCum_cum4' value='<?php echo $t->promeCum_cum4?>'/></td>
<td> <input type='text' class='form-control' id='promeCum_cum5' name='promeCum_cum5' value='<?php echo $t->promeCum_cum5?>'/></td>
<td> <input type='text' class='form-control' id='promeCum_cum6' name='promeCum_cum6' value='<?php echo $t->promeCum_cum6?>'/></td>
<td> <input type='text' class='form-control' id='promeCum_cum7' name='promeCum_cum7' value='<?php echo $t->promeCum_cum7?>'/></td>
<td> <input type='text' class='form-control' id='promeCum_tot' name='promeCum_tot' value='<?php echo $t->promeCum_tot?>'/></td>
<td> <input type='text' class='form-control' id='promeCum_prom' name='promeCum_prom' value='<?php echo $t->promeCum_prom?>'/></td>
   
 
   
    </tr>
    
    
     <tr class="odd gradeX">
    
    
    <td rowspan="3" width="12%">RECUPERACION</td>
    <td >P</td>
   <td> <input type='text' class='form-control' id='recuperacion_p1' name='recuperacion_p1' value='<?php echo $t->recuperacion_p1?>'/></td>
<td> <input type='text' class='form-control' id='recuperacion_p2' name='recuperacion_p2' value='<?php echo $t->recuperacion_p2?>'/></td>
<td> <input type='text' class='form-control' id='recuperacion_p3' name='recuperacion_p3' value='<?php echo $t->recuperacion_p3?>'/></td>
<td> <input type='text' class='form-control' id='recuperacion_p4' name='recuperacion_p4' value='<?php echo $t->recuperacion_p4?>'/></td>
<td> <input type='text' class='form-control' id='recuperacion_p5' name='recuperacion_p5' value='<?php echo $t->recuperacion_p5?>'/></td>
<td> <input type='text' class='form-control' id='recuperacion_p6' name='recuperacion_p6' value='<?php echo $t->recuperacion_p6?>'/></td>
<td> <input type='text' class='form-control' id='recuperacion_p7' name='recuperacion_p7' value='<?php echo $t->recuperacion_p7?>'/></td>
<td> <input type='text' class='form-control' id='recuperacion_ptot' name='recuperacion_ptot' value='<?php echo $t->recuperacion_ptot?>'/></td>
<td> <input type='text' class='form-control' id='recuperacion_pprom' name='recuperacion_pprom' value='<?php echo $t->recuperacion_pprom?>'/></td>
   
   
    </tr>
    
    
      <tr class="odd gradeX">
    
    
    <td >R</td>
    <td> <input type='text' class='form-control' id='recuperacion_r1' name='recuperacion_r1' value='<?php echo $t->recuperacion_r1?>'/></td>
<td> <input type='text' class='form-control' id='recuperacion_r2' name='recuperacion_r2' value='<?php echo $t->recuperacion_r2?>'/></td>
<td> <input type='text' class='form-control' id='recuperacion_r3' name='recuperacion_r3' value='<?php echo $t->recuperacion_r3?>'/></td>
<td> <input type='text' class='form-control' id='recuperacion_r4' name='recuperacion_r4' value='<?php echo $t->recuperacion_r4?>'/></td>
<td> <input type='text' class='form-control' id='recuperacion_r5' name='recuperacion_r5' value='<?php echo $t->recuperacion_r5?>'/></td>
<td> <input type='text' class='form-control' id='recuperacion_r6' name='recuperacion_r6' value='<?php echo $t->recuperacion_r6?>'/></td>
<td> <input type='text' class='form-control' id='recuperacion_r7' name='recuperacion_r7' value='<?php echo $t->recuperacion_r7?>'/></td>
<td> <input type='text' class='form-control' id='recuperacion_rtot' name='recuperacion_rtot' value='<?php echo $t->recuperacion_rtot?>'/></td>
<td> <input type='text' class='form-control' id='recuperacion_rprom' name='recuperacion_rprom' value='<?php echo $t->recuperacion_rprom?>'/></td>
    
   
    </tr>
    
    <tr class="odd gradeX">
    
    
    <td >%</td>
<td> <input type='text' class='form-control' id='recuperacion_cum1' name='recuperacion_cum1' value='<?php echo $t->recuperacion_cum1?>'/></td>
<td> <input type='text' class='form-control' id='recuperacion_cum2' name='recuperacion_cum2' value='<?php echo $t->recuperacion_cum2?>'/></td>
<td> <input type='text' class='form-control' id='recuperacion_cum3' name='recuperacion_cum3' value='<?php echo $t->recuperacion_cum3?>'/></td>
<td> <input type='text' class='form-control' id='recuperacion_cum4' name='recuperacion_cum4' value='<?php echo $t->recuperacion_cum4?>'/></td>
<td> <input type='text' class='form-control' id='recuperacion_cum5' name='recuperacion_cum5' value='<?php echo $t->recuperacion_cum5?>'/></td>
<td> <input type='text' class='form-control' id='recuperacion_cum6' name='recuperacion_cum6' value='<?php echo $t->recuperacion_cum6?>'/></td>
<td> <input type='text' class='form-control' id='recuperacion_cum7' name='recuperacion_cum7' value='<?php echo $t->recuperacion_cum7?>'/></td>
<td> <input type='text' class='form-control' id='recuperacion_tot'  name='recuperacion_tot'  value='<?php echo $t->recuperacion_tot?>'/></td>
<td> <input type='text' class='form-control' id='recuperacion_prom' name='recuperacion_prom' value='<?php echo $t->recuperacion_prom?>'/></td>
   
 
   
    </tr>
    
    </tbody>
    </table>
    
    			  

    <?php 
	                                                    
	                                                    } 
	                                                 
	                                                ?>
       
     
	
	
	
	
			  </div>
			  <!-- End Paso 1 -->
			  
			  <!-- Paso 2 -->
			  <div id="tabs1-paso2">
	
	     <?php 
	                                                  
	                                                   
	                                               
	                                                
	                                                    foreach($DiarioProcesos as  $t){ ?>
    
    
			 
				 <div class="form-group">
    			  
						  
						   <table cellpadding="0" cellspacing="0" border="0"
												class="table table-striped table-bordered " id="table_emplext">
    
    <thead>
											<tr>
														<th   >INDICADOR</th>
													   <th ></th>
													<th >VIE</th>
													<th >SAB</th>
													<th >DOM</th>
													<th >LUN</th>
													<th >MAR</th>
													<th >MIE</th>
													<th >JUE</th>
													<th >TOTAL SEMANAL</th>
													<th >PROM DIA</th>
														
													
													</tr>
													
												</thead>
    <tbody>
                                 
  <tr class="odd gradeX">
    
    
    <td rowspan="3" width="12%">MINUTOS TIEMPO AIRE</td>
    <td >P</td>
<td> <input type='text' class='form-control' id='minutos_p1' name='minutos_p1' value='<?php echo $t->minutos_p1?>'/></td>
<td> <input type='text' class='form-control' id='minutos_p2' name='minutos_p2' value='<?php echo $t->minutos_p2?>'/></td>
<td> <input type='text' class='form-control' id='minutos_p3' name='minutos_p3' value='<?php echo $t->minutos_p3?>'/></td>
<td> <input type='text' class='form-control' id='minutos_p4' name='minutos_p4' value='<?php echo $t->minutos_p4?>'/></td>
<td> <input type='text' class='form-control' id='minutos_p5' name='minutos_p5' value='<?php echo $t->minutos_p5?>'/></td>
<td> <input type='text' class='form-control' id='minutos_p6' name='minutos_p6' value='<?php echo $t->minutos_p6?>'/></td>
<td> <input type='text' class='form-control' id='minutos_p7' name='minutos_p7' value='<?php echo $t->minutos_p7?>'/></td>
<td> <input type='text' class='form-control' id='minutos_ptot' name='minutos_ptot' value='<?php echo $t->minutos_ptot?>'/></td>
<td> <input type='text' class='form-control' id='minutos_pprom' name='minutos_pprom' value='<?php echo $t->minutos_pprom?>'/></td>
      
    </tr>
    
    
      <tr class="odd gradeX">
    
    
    <td >R</td>
<td> <input type='text' class='form-control' id='minutos_r1' name='minutos_r1' value='<?php echo $t->minutos_r1?>'/></td>
<td> <input type='text' class='form-control' id='minutos_r2' name='minutos_r2' value='<?php echo $t->minutos_r2?>'/></td>
<td> <input type='text' class='form-control' id='minutos_r3' name='minutos_r3' value='<?php echo $t->minutos_r3?>'/></td>
<td> <input type='text' class='form-control' id='minutos_r4' name='minutos_r4' value='<?php echo $t->minutos_r4?>'/></td>
<td> <input type='text' class='form-control' id='minutos_r5' name='minutos_r5' value='<?php echo $t->minutos_r5?>'/></td>
<td> <input type='text' class='form-control' id='minutos_r6' name='minutos_r6' value='<?php echo $t->minutos_r6?>'/></td>
<td> <input type='text' class='form-control' id='minutos_r7' name='minutos_r7' value='<?php echo $t->minutos_r7?>'/></td>
<td> <input type='text' class='form-control' id='minutos_rtot' name='minutos_rtot' value='<?php echo $t->minutos_rtot?>'/></td>
<td> <input type='text' class='form-control' id='minutos_rprom' name='minutos_rprom' value='<?php echo $t->minutos_rprom?>'/></td>
       
    </tr>
    
    <tr class="odd gradeX">
    
    
    <td >%</td>
<td> <input type='text' class='form-control' id='minutos_cum1' name='minutos_cum1' value='<?php echo $t->minutos_cum1?>'/></td>
<td> <input type='text' class='form-control' id='minutos_cum2' name='minutos_cum2' value='<?php echo $t->minutos_cum2?>'/></td>
<td> <input type='text' class='form-control' id='minutos_cum3' name='minutos_cum3' value='<?php echo $t->minutos_cum3?>'/></td>
<td> <input type='text' class='form-control' id='minutos_cum4' name='minutos_cum4' value='<?php echo $t->minutos_cum4?>'/></td>
<td> <input type='text' class='form-control' id='minutos_cum5' name='minutos_cum5' value='<?php echo $t->minutos_cum5?>'/></td>
<td> <input type='text' class='form-control' id='minutos_cum6' name='minutos_cum6' value='<?php echo $t->minutos_cum6?>'/></td>
<td> <input type='text' class='form-control' id='minutos_cum7' name='minutos_cum7' value='<?php echo $t->minutos_cum7?>'/></td>
<td> <input type='text' class='form-control' id='minutos_tot' name='minutos_tot' value='<?php echo $t->minutos_tot?>'/></td>
<td> <input type='text' class='form-control' id='minutos_prom' name='minutos_prom' value='<?php echo $t->minutos_prom?>'/></td>
    
 
   
    </tr>
    
     <tr class="odd gradeX">
    
    
    <td rowspan="3" width="12%">TIEMPO AIRE POR HORA</td>
    <td >P</td>
<td> <input type='text' class='form-control' id='tAire_p1' name='tAire_p1' value='<?php echo $t->tAire_p1?>'/></td>
<td> <input type='text' class='form-control' id='tAire_p2' name='tAire_p2' value='<?php echo $t->tAire_p2?>'/></td>
<td> <input type='text' class='form-control' id='tAire_p3' name='tAire_p3' value='<?php echo $t->tAire_p3?>'/></td>
<td> <input type='text' class='form-control' id='tAire_p4' name='tAire_p4' value='<?php echo $t->tAire_p4?>'/></td>
<td> <input type='text' class='form-control' id='tAire_p5' name='tAire_p5' value='<?php echo $t->tAire_p5?>'/></td>
<td> <input type='text' class='form-control' id='tAire_p6' name='tAire_p6' value='<?php echo $t->tAire_p6?>'/></td>
<td> <input type='text' class='form-control' id='tAire_p7' name='tAire_p7' value='<?php echo $t->tAire_p7?>'/></td>
<td> <input type='text' class='form-control' id='tAire_ptot' name='tAire_ptot' value='<?php echo $t->tAire_ptot?>'/></td>
<td> <input type='text' class='form-control' id='tAire_pprom' name='tAire_pprom' value='<?php echo $t->tAire_pprom?>'/></td>
       
    </tr>
    
    
      <tr class="odd gradeX">
    
    
    <td >R</td>
    <td> <input type='text' class='form-control' id='tAire_r1' name='tAire_r1' value='<?php echo $t->tAire_r1?>'/></td>
<td> <input type='text' class='form-control' id='tAire_r2' name='tAire_r2' value='<?php echo $t->tAire_r2?>'/></td>
<td> <input type='text' class='form-control' id='tAire_r3' name='tAire_r3' value='<?php echo $t->tAire_r3?>'/></td>
<td> <input type='text' class='form-control' id='tAire_r4' name='tAire_r4' value='<?php echo $t->tAire_r4?>'/></td>
<td> <input type='text' class='form-control' id='tAire_r5' name='tAire_r5' value='<?php echo $t->tAire_r5?>'/></td>
<td> <input type='text' class='form-control' id='tAire_r6' name='tAire_r6' value='<?php echo $t->tAire_r6?>'/></td>
<td> <input type='text' class='form-control' id='tAire_r7' name='tAire_r7' value='<?php echo $t->tAire_r7?>'/></td>
<td> <input type='text' class='form-control' id='tAire_rtot' name='tAire_rtot' value='<?php echo $t->tAire_rtot?>'/></td>
<td> <input type='text' class='form-control' id='tAire_rprom' name='tAire_rprom' value='<?php echo $t->tAire_rprom?>'/></td>
    
    </tr>
    
    <tr class="odd gradeX">
    
    
    <td >%</td>
<td> <input type='text' class='form-control' id='tAire_cum1' name='tAire_cum1' value='<?php echo $t->tAire_cum1?>'/></td>
<td> <input type='text' class='form-control' id='tAire_cum2' name='tAire_cum2' value='<?php echo $t->tAire_cum2?>'/></td>
<td> <input type='text' class='form-control' id='tAire_cum3' name='tAire_cum3' value='<?php echo $t->tAire_cum3?>'/></td>
<td> <input type='text' class='form-control' id='tAire_cum4' name='tAire_cum4' value='<?php echo $t->tAire_cum4?>'/></td>
<td> <input type='text' class='form-control' id='tAire_cum5' name='tAire_cum5' value='<?php echo $t->tAire_cum5?>'/></td>
<td> <input type='text' class='form-control' id='tAire_cum6' name='tAire_cum6' value='<?php echo $t->tAire_cum6?>'/></td>
<td> <input type='text' class='form-control' id='tAire_cum7' name='tAire_cum7' value='<?php echo $t->tAire_cum7?>'/></td>
<td> <input type='text' class='form-control' id='tAire_tot' name='tAire_tot' value='<?php echo $t->tAire_tot?>'/></td>
<td> <input type='text' class='form-control' id='tAire_prom' name='tAire_prom' value='<?php echo $t->tAire_prom?>'/></td>
     
   
    </tr>
    
     <tr class="odd gradeX">
    
    
    <td rowspan="3" width="12%">COSTO TELEFONIA</td>
    <td >P</td>
<td> <input type='text' class='form-control' id='costoTel_p1' name='costoTel_p1' value='<?php echo $t->costoTel_p1?>'/></td>
<td> <input type='text' class='form-control' id='costoTel_p2' name='costoTel_p2' value='<?php echo $t->costoTel_p2?>'/></td>
<td> <input type='text' class='form-control' id='costoTel_p3' name='costoTel_p3' value='<?php echo $t->costoTel_p3?>'/></td>
<td> <input type='text' class='form-control' id='costoTel_p4' name='costoTel_p4' value='<?php echo $t->costoTel_p4?>'/></td>
<td> <input type='text' class='form-control' id='costoTel_p5' name='costoTel_p5' value='<?php echo $t->costoTel_p5?>'/></td>
<td> <input type='text' class='form-control' id='costoTel_p6' name='costoTel_p6' value='<?php echo $t->costoTel_p6?>'/></td>
<td> <input type='text' class='form-control' id='costoTel_p7' name='costoTel_p7' value='<?php echo $t->costoTel_p7?>'/></td>
<td> <input type='text' class='form-control' id='costoTel_ptot' name='costoTel_ptot' value='<?php echo $t->costoTel_ptot?>'/></td>
<td> <input type='text' class='form-control' id='costoTel_pprom' name='costoTel_pprom' value='<?php echo $t->costoTel_pprom?>'/></td>
      
    </tr>
    
    
      <tr class="odd gradeX">
    
    
    <td >R</td>
<td> <input type='text' class='form-control' id='costoTel_r1' name='costoTel_r1' value='<?php echo $t->costoTel_r1?>'/></td>
<td> <input type='text' class='form-control' id='costoTel_r2' name='costoTel_r2' value='<?php echo $t->costoTel_r2?>'/></td>
<td> <input type='text' class='form-control' id='costoTel_r3' name='costoTel_r3' value='<?php echo $t->costoTel_r3?>'/></td>
<td> <input type='text' class='form-control' id='costoTel_r4' name='costoTel_r4' value='<?php echo $t->costoTel_r4?>'/></td>
<td> <input type='text' class='form-control' id='costoTel_r5' name='costoTel_r5' value='<?php echo $t->costoTel_r5?>'/></td>
<td> <input type='text' class='form-control' id='costoTel_r6' name='costoTel_r6' value='<?php echo $t->costoTel_r6?>'/></td>
<td> <input type='text' class='form-control' id='costoTel_r7' name='costoTel_r7' value='<?php echo $t->costoTel_r7?>'/></td>
<td> <input type='text' class='form-control' id='costoTel_rtot' name='costoTel_rtot' value='<?php echo $t->costoTel_rtot?>'/></td>
<td> <input type='text' class='form-control' id='costoTel_rprom' name='costoTel_rprom' value='<?php echo $t->costoTel_rprom?>'/></td>
      
    </tr>
    
    <tr class="odd gradeX">
    
    
    <td >%</td>
<td> <input type='text' class='form-control' id='costoTel_cum1' name='costoTel_cum1' value='<?php echo $t->costoTel_cum1?>'/></td>
<td> <input type='text' class='form-control' id='costoTel_cum2' name='costoTel_cum2' value='<?php echo $t->costoTel_cum2?>'/></td>
<td> <input type='text' class='form-control' id='costoTel_cum3' name='costoTel_cum3' value='<?php echo $t->costoTel_cum3?>'/></td>
<td> <input type='text' class='form-control' id='costoTel_cum4' name='costoTel_cum4' value='<?php echo $t->costoTel_cum4?>'/></td>
<td> <input type='text' class='form-control' id='costoTel_cum5' name='costoTel_cum5' value='<?php echo $t->costoTel_cum5?>'/></td>
<td> <input type='text' class='form-control' id='costoTel_cum6' name='costoTel_cum6' value='<?php echo $t->costoTel_cum6?>'/></td>
<td> <input type='text' class='form-control' id='costoTel_cum7' name='costoTel_cum7' value='<?php echo $t->costoTel_cum7?>'/></td>
<td> <input type='text' class='form-control' id='costoTel_tot' name='costoTel_tot' value='<?php echo $t->costoTel_tot?>'/></td>
<td> <input type='text' class='form-control' id='costoTel_prom' name='costoTel_prom' value='<?php echo $t->costoTel_prom?>'/></td>
    
 
   
    </tr>
    
    
      <tr class="odd gradeX">
    
    
    <td rowspan="1" width="12%">% CONTACTABILIDAD</td>
    <td > </td>
    <td> <input type='text' class='form-control' id='contactabili_p1' name='contactabili_p1' value='<?php echo $t->contactabili_p1?>'/></td>
<td> <input type='text' class='form-control' id='contactabili_p2' name='contactabili_p2' value='<?php echo $t->contactabili_p2?>'/></td>
<td> <input type='text' class='form-control' id='contactabili_p3' name='contactabili_p3' value='<?php echo $t->contactabili_p3?>'/></td>
<td> <input type='text' class='form-control' id='contactabili_p4' name='contactabili_p4' value='<?php echo $t->contactabili_p4?>'/></td>
<td> <input type='text' class='form-control' id='contactabili_p5' name='contactabili_p5' value='<?php echo $t->contactabili_p5?>'/></td>
<td> <input type='text' class='form-control' id='contactabili_p6' name='contactabili_p6' value='<?php echo $t->contactabili_p6?>'/></td>
<td> <input type='text' class='form-control' id='contactabili_p7' name='contactabili_p7' value='<?php echo $t->contactabili_p7?>'/></td>
<td> <input type='text' class='form-control' id='contactabili_ptot' name='contactabili_ptot' value='<?php echo $t->contactabili_ptot?>'/></td>
<td> <input type='text' class='form-control' id='contactabili_pprom' name='contactabili_pprom' value='<?php echo $t->contactabili_pprom?>'/></td>
    
    </tr>
    
    
    
    
     <tr class="odd gradeX">
    
    
    <td rowspan="3" width="12%">CARTEO POR DIA</td>
    <td >P</td>
<td> <input type='text' class='form-control' id='carteo_p1' name='carteo_p1' value='<?php echo $t->carteo_p1?>'/></td>
<td> <input type='text' class='form-control' id='carteo_p2' name='carteo_p2' value='<?php echo $t->carteo_p2?>'/></td>
<td> <input type='text' class='form-control' id='carteo_p3' name='carteo_p3' value='<?php echo $t->carteo_p3?>'/></td>
<td> <input type='text' class='form-control' id='carteo_p4' name='carteo_p4' value='<?php echo $t->carteo_p4?>'/></td>
<td> <input type='text' class='form-control' id='carteo_p5' name='carteo_p5' value='<?php echo $t->carteo_p5?>'/></td>
<td> <input type='text' class='form-control' id='carteo_p6' name='carteo_p6' value='<?php echo $t->carteo_p6?>'/></td>
<td> <input type='text' class='form-control' id='carteo_p7' name='carteo_p7' value='<?php echo $t->carteo_p7?>'/></td>
<td> <input type='text' class='form-control' id='carteo_ptot' name='carteo_ptot' value='<?php echo $t->carteo_ptot?>'/></td>
<td> <input type='text' class='form-control' id='carteo_pprom' name='carteo_pprom' value='<?php echo $t->carteo_pprom?>'/></td>
       
    </tr>
    
    
      <tr class="odd gradeX">
    
    
    <td >R</td>
<td> <input type='text' class='form-control' id='carteo_r1' name='carteo_r1' value='<?php echo $t->carteo_r1?>'/></td>
<td> <input type='text' class='form-control' id='carteo_r2' name='carteo_r2' value='<?php echo $t->carteo_r2?>'/></td>
<td> <input type='text' class='form-control' id='carteo_r3' name='carteo_r3' value='<?php echo $t->carteo_r3?>'/></td>
<td> <input type='text' class='form-control' id='carteo_r4' name='carteo_r4' value='<?php echo $t->carteo_r4?>'/></td>
<td> <input type='text' class='form-control' id='carteo_r5' name='carteo_r5' value='<?php echo $t->carteo_r5?>'/></td>
<td> <input type='text' class='form-control' id='carteo_r6' name='carteo_r6' value='<?php echo $t->carteo_r6?>'/></td>
<td> <input type='text' class='form-control' id='carteo_r7' name='carteo_r7' value='<?php echo $t->carteo_r7?>'/></td>
<td> <input type='text' class='form-control' id='carteo_rtot' name='carteo_rtot' value='<?php echo $t->carteo_rtot?>'/></td>
<td> <input type='text' class='form-control' id='carteo_rprom' name='carteo_rprom' value='<?php echo $t->carteo_rprom?>'/></td>
   
   
    </tr>
    
    <tr class="odd gradeX">
    
    
    <td >%</td>
<td> <input type='text' class='form-control' id='carteo_cum1' name='carteo_cum1' value='<?php echo $t->carteo_cum1?>'/></td>
<td> <input type='text' class='form-control' id='carteo_cum2' name='carteo_cum2' value='<?php echo $t->carteo_cum2?>'/></td>
<td> <input type='text' class='form-control' id='carteo_cum3' name='carteo_cum3' value='<?php echo $t->carteo_cum3?>'/></td>
<td> <input type='text' class='form-control' id='carteo_cum4' name='carteo_cum4' value='<?php echo $t->carteo_cum4?>'/></td>
<td> <input type='text' class='form-control' id='carteo_cum5' name='carteo_cum5' value='<?php echo $t->carteo_cum5?>'/></td>
<td> <input type='text' class='form-control' id='carteo_cum6' name='carteo_cum6' value='<?php echo $t->carteo_cum6?>'/></td>
<td> <input type='text' class='form-control' id='carteo_cum7' name='carteo_cum7' value='<?php echo $t->carteo_cum7?>'/></td>
<td> <input type='text' class='form-control' id='carteo_tot' name='carteo_tot' value='<?php echo $t->carteo_tot?>'/></td>
<td> <input type='text' class='form-control' id='carteo_prom' name='carteo_prom' value='<?php echo $t->carteo_prom?>'/></td>
    

 
   
    </tr>
    
     <tr class="odd gradeX">
    
    
    <td rowspan="3" width="12%">COSTO DE CARTEO POR DIA</td>
    <td >P</td>
<td> <input type='text' class='form-control' id='carteoCos_p1' name='carteoCos_p1' value='<?php echo $t->carteoCos_p1?>'/></td>
<td> <input type='text' class='form-control' id='carteoCos_p2' name='carteoCos_p2' value='<?php echo $t->carteoCos_p2?>'/></td>
<td> <input type='text' class='form-control' id='carteoCos_p3' name='carteoCos_p3' value='<?php echo $t->carteoCos_p3?>'/></td>
<td> <input type='text' class='form-control' id='carteoCos_p4' name='carteoCos_p4' value='<?php echo $t->carteoCos_p4?>'/></td>
<td> <input type='text' class='form-control' id='carteoCos_p5' name='carteoCos_p5' value='<?php echo $t->carteoCos_p5?>'/></td>
<td> <input type='text' class='form-control' id='carteoCos_p6' name='carteoCos_p6' value='<?php echo $t->carteoCos_p6?>'/></td>
<td> <input type='text' class='form-control' id='carteoCos_p7' name='carteoCos_p7' value='<?php echo $t->carteoCos_p7?>'/></td>
<td> <input type='text' class='form-control' id='carteoCos_ptot' name='carteoCos_ptot' value='<?php echo $t->carteoCos_ptot?>'/></td>
<td> <input type='text' class='form-control' id='carteoCos_pprom' name='carteoCos_pprom' value='<?php echo $t->carteoCos_pprom?>'/></td>
       
    </tr>
    
    
      <tr class="odd gradeX">
    
    
    <td >R</td>
<td> <input type='text' class='form-control' id='carteoCos_r1' name='carteoCos_r1' value='<?php echo $t->carteoCos_r1?>'/></td>
<td> <input type='text' class='form-control' id='carteoCos_r2' name='carteoCos_r2' value='<?php echo $t->carteoCos_r2?>'/></td>
<td> <input type='text' class='form-control' id='carteoCos_r3' name='carteoCos_r3' value='<?php echo $t->carteoCos_r3?>'/></td>
<td> <input type='text' class='form-control' id='carteoCos_r4' name='carteoCos_r4' value='<?php echo $t->carteoCos_r4?>'/></td>
<td> <input type='text' class='form-control' id='carteoCos_r5' name='carteoCos_r5' value='<?php echo $t->carteoCos_r5?>'/></td>
<td> <input type='text' class='form-control' id='carteoCos_r6' name='carteoCos_r6' value='<?php echo $t->carteoCos_r6?>'/></td>
<td> <input type='text' class='form-control' id='carteoCos_r7' name='carteoCos_r7' value='<?php echo $t->carteoCos_r7?>'/></td>
<td> <input type='text' class='form-control' id='carteoCos_rtot' name='carteoCos_rtot' value='<?php echo $t->carteoCos_rtot?>'/></td>
<td> <input type='text' class='form-control' id='carteoCos_rprom' name='carteoCos_rprom' value='<?php echo $t->carteoCos_rprom?>'/></td>
       
    </tr>
    
    <tr class="odd gradeX">
    
    
    <td >%</td>
    <td> <input type='text' class='form-control' id='carteoCos_cum1' name='carteoCos_cum1' value='<?php echo $t->carteoCos_cum1?>'/></td>
<td> <input type='text' class='form-control' id='carteoCos_cum2' name='carteoCos_cum2' value='<?php echo $t->carteoCos_cum2?>'/></td>
<td> <input type='text' class='form-control' id='carteoCos_cum3' name='carteoCos_cum3' value='<?php echo $t->carteoCos_cum3?>'/></td>
<td> <input type='text' class='form-control' id='carteoCos_cum4' name='carteoCos_cum4' value='<?php echo $t->carteoCos_cum4?>'/></td>
<td> <input type='text' class='form-control' id='carteoCos_cum5' name='carteoCos_cum5' value='<?php echo $t->carteoCos_cum5?>'/></td>
<td> <input type='text' class='form-control' id='carteoCos_cum6' name='carteoCos_cum6' value='<?php echo $t->carteoCos_cum6?>'/></td>
<td> <input type='text' class='form-control' id='carteoCos_cum7' name='carteoCos_cum7' value='<?php echo $t->carteoCos_cum7?>'/></td>
<td> <input type='text' class='form-control' id='carteoCos_tot' name='carteoCos_tot' value='<?php echo $t->carteoCos_tot?>'/></td>
<td> <input type='text' class='form-control' id='carteoCos_prom' name='carteoCos_prom' value='<?php echo $t->carteoCos_prom?>'/></td>
   
 
   
    </tr>
    
     <tr class="odd gradeX">
    
    
    <td rowspan="3" width="12%">VISITAS POR DIA</td>
    <td >P</td>
<td> <input type='text' class='form-control' id='visitas_p1' name='visitas_p1' value='<?php echo $t->visitas_p1?>'/></td>
<td> <input type='text' class='form-control' id='visitas_p2' name='visitas_p2' value='<?php echo $t->visitas_p2?>'/></td>
<td> <input type='text' class='form-control' id='visitas_p3' name='visitas_p3' value='<?php echo $t->visitas_p3?>'/></td>
<td> <input type='text' class='form-control' id='visitas_p4' name='visitas_p4' value='<?php echo $t->visitas_p4?>'/></td>
<td> <input type='text' class='form-control' id='visitas_p5' name='visitas_p5' value='<?php echo $t->visitas_p5?>'/></td>
<td> <input type='text' class='form-control' id='visitas_p6' name='visitas_p6' value='<?php echo $t->visitas_p6?>'/></td>
<td> <input type='text' class='form-control' id='visitas_p7' name='visitas_p7' value='<?php echo $t->visitas_p7?>'/></td>
<td> <input type='text' class='form-control' id='visitas_ptot' name='visitas_ptot' value='<?php echo $t->visitas_ptot?>'/></td>
<td> <input type='text' class='form-control' id='visitas_pprom' name='visitas_pprom' value='<?php echo $t->visitas_pprom?>'/></td>
      
    </tr>
    
    
      <tr class="odd gradeX">
    
    
    <td >R</td>
<td> <input type='text' class='form-control' id='visitas_r1' name='visitas_r1' value='<?php echo $t->visitas_r1?>'/></td>
<td> <input type='text' class='form-control' id='visitas_r2' name='visitas_r2' value='<?php echo $t->visitas_r2?>'/></td>
<td> <input type='text' class='form-control' id='visitas_r3' name='visitas_r3' value='<?php echo $t->visitas_r3?>'/></td>
<td> <input type='text' class='form-control' id='visitas_r4' name='visitas_r4' value='<?php echo $t->visitas_r4?>'/></td>
<td> <input type='text' class='form-control' id='visitas_r5' name='visitas_r5' value='<?php echo $t->visitas_r5?>'/></td>
<td> <input type='text' class='form-control' id='visitas_r6' name='visitas_r6' value='<?php echo $t->visitas_r6?>'/></td>
<td> <input type='text' class='form-control' id='visitas_r7' name='visitas_r7' value='<?php echo $t->visitas_r7?>'/></td>
<td> <input type='text' class='form-control' id='visitas_rtot' name='visitas_rtot' value='<?php echo $t->visitas_rtot?>'/></td>
<td> <input type='text' class='form-control' id='visitas_rprom' name='visitas_rprom' value='<?php echo $t->visitas_rprom?>'/></td>
       
    </tr>
    
    <tr class="odd gradeX">
    
    
    <td >%</td>
<td> <input type='text' class='form-control' id='visitas_cum1' name='visitas_cum1' value='<?php echo $t->visitas_cum1?>'/></td>
<td> <input type='text' class='form-control' id='visitas_cum2' name='visitas_cum2' value='<?php echo $t->visitas_cum2?>'/></td>
<td> <input type='text' class='form-control' id='visitas_cum3' name='visitas_cum3' value='<?php echo $t->visitas_cum3?>'/></td>
<td> <input type='text' class='form-control' id='visitas_cum4' name='visitas_cum4' value='<?php echo $t->visitas_cum4?>'/></td>
<td> <input type='text' class='form-control' id='visitas_cum5' name='visitas_cum5' value='<?php echo $t->visitas_cum5?>'/></td>
<td> <input type='text' class='form-control' id='visitas_cum6' name='visitas_cum6' value='<?php echo $t->visitas_cum6?>'/></td>
<td> <input type='text' class='form-control' id='visitas_cum7' name='visitas_cum7' value='<?php echo $t->visitas_cum7?>'/></td>
<td> <input type='text' class='form-control' id='visitas_tot' name='visitas_tot' value='<?php echo $t->visitas_tot?>'/></td>
<td> <input type='text' class='form-control' id='visitas_prom' name='visitas_prom' value='<?php echo $t->visitas_prom?>'/></td>
   
 
   
    </tr>
    
     <tr class="odd gradeX">
    
    
    <td rowspan="3" width="12%">COSTO DE VISITAS POR DIA</td>
    <td >P</td>
<td> <input type='text' class='form-control' id='visitasCos_p1' name='visitasCos_p1' value='<?php echo $t->visitasCos_p1?>'/></td>
<td> <input type='text' class='form-control' id='visitasCos_p2' name='visitasCos_p2' value='<?php echo $t->visitasCos_p2?>'/></td>
<td> <input type='text' class='form-control' id='visitasCos_p3' name='visitasCos_p3' value='<?php echo $t->visitasCos_p3?>'/></td>
<td> <input type='text' class='form-control' id='visitasCos_p4' name='visitasCos_p4' value='<?php echo $t->visitasCos_p4?>'/></td>
<td> <input type='text' class='form-control' id='visitasCos_p5' name='visitasCos_p5' value='<?php echo $t->visitasCos_p5?>'/></td>
<td> <input type='text' class='form-control' id='visitasCos_p6' name='visitasCos_p6' value='<?php echo $t->visitasCos_p6?>'/></td>
<td> <input type='text' class='form-control' id='visitasCos_p7' name='visitasCos_p7' value='<?php echo $t->visitasCos_p7?>'/></td>
<td> <input type='text' class='form-control' id='visitasCos_ptot' name='visitasCos_ptot' value='<?php echo $t->visitasCos_ptot?>'/></td>
<td> <input type='text' class='form-control' id='visitasCos_pprom' name='visitasCos_pprom' value='<?php echo $t->visitasCos_pprom?>'/></td>
      
    </tr>
    
    
      <tr class="odd gradeX">
    
    
    <td >R</td>
<td> <input type='text' class='form-control' id='visitasCos_r1' name='visitasCos_r1' value='<?php echo $t->visitasCos_r1?>'/></td>
<td> <input type='text' class='form-control' id='visitasCos_r2' name='visitasCos_r2' value='<?php echo $t->visitasCos_r2?>'/></td>
<td> <input type='text' class='form-control' id='visitasCos_r3' name='visitasCos_r3' value='<?php echo $t->visitasCos_r3?>'/></td>
<td> <input type='text' class='form-control' id='visitasCos_r4' name='visitasCos_r4' value='<?php echo $t->visitasCos_r4?>'/></td>
<td> <input type='text' class='form-control' id='visitasCos_r5' name='visitasCos_r5' value='<?php echo $t->visitasCos_r5?>'/></td>
<td> <input type='text' class='form-control' id='visitasCos_r6' name='visitasCos_r6' value='<?php echo $t->visitasCos_r6?>'/></td>
<td> <input type='text' class='form-control' id='visitasCos_r7' name='visitasCos_r7' value='<?php echo $t->visitasCos_r7?>'/></td>
<td> <input type='text' class='form-control' id='visitasCos_rtot' name='visitasCos_rtot' value='<?php echo $t->visitasCos_rtot?>'/></td>
<td> <input type='text' class='form-control' id='visitasCos_rprom' name='visitasCos_rprom' value='<?php echo $t->visitasCos_rprom?>'/></td>
       
    </tr>
    
    <tr class="odd gradeX">
    
    
    <td >%</td>
    <td> <input type='text' class='form-control' id='visitasCos_cum1' name='visitasCos_cum1' value='<?php echo $t->visitasCos_cum1?>'/></td>
<td> <input type='text' class='form-control' id='visitasCos_cum2' name='visitasCos_cum2' value='<?php echo $t->visitasCos_cum2?>'/></td>
<td> <input type='text' class='form-control' id='visitasCos_cum3' name='visitasCos_cum3' value='<?php echo $t->visitasCos_cum3?>'/></td>
<td> <input type='text' class='form-control' id='visitasCos_cum4' name='visitasCos_cum4' value='<?php echo $t->visitasCos_cum4?>'/></td>
<td> <input type='text' class='form-control' id='visitasCos_cum5' name='visitasCos_cum5' value='<?php echo $t->visitasCos_cum5?>'/></td>
<td> <input type='text' class='form-control' id='visitasCos_cum6' name='visitasCos_cum6' value='<?php echo $t->visitasCos_cum6?>'/></td>
<td> <input type='text' class='form-control' id='visitasCos_cum7' name='visitasCos_cum7' value='<?php echo $t->visitasCos_cum7?>'/></td>
<td> <input type='text' class='form-control' id='visitasCos_tot' name='visitasCos_tot' value='<?php echo $t->visitasCos_tot?>'/></td>
<td> <input type='text' class='form-control' id='visitasCos_prom' name='visitasCos_prom' value='<?php echo $t->visitasCos_prom?>'/></td>
    
   
    </tr>
    
     <tr class="odd gradeX">
    
    
    <td rowspan="3" width="12%">CONTACTO POSITIVO</td>
    <td >P</td>
<td> <input type='text' class='form-control' id='conPositivo_p1' name='conPositivo_p1' value='<?php echo $t->conPositivo_p1?>'/></td>
<td> <input type='text' class='form-control' id='conPositivo_p2' name='conPositivo_p2' value='<?php echo $t->conPositivo_p2?>'/></td>
<td> <input type='text' class='form-control' id='conPositivo_p3' name='conPositivo_p3' value='<?php echo $t->conPositivo_p3?>'/></td>
<td> <input type='text' class='form-control' id='conPositivo_p4' name='conPositivo_p4' value='<?php echo $t->conPositivo_p4?>'/></td>
<td> <input type='text' class='form-control' id='conPositivo_p5' name='conPositivo_p5' value='<?php echo $t->conPositivo_p5?>'/></td>
<td> <input type='text' class='form-control' id='conPositivo_p6' name='conPositivo_p6' value='<?php echo $t->conPositivo_p6?>'/></td>
<td> <input type='text' class='form-control' id='conPositivo_p7' name='conPositivo_p7' value='<?php echo $t->conPositivo_p7?>'/></td>
<td> <input type='text' class='form-control' id='conPositivo_ptot' name='conPositivo_ptot' value='<?php echo $t->conPositivo_ptot?>'/></td>
<td> <input type='text' class='form-control' id='conPositivo_pprom' name='conPositivo_pprom' value='<?php echo $t->conPositivo_pprom?>'/></td>
      
    </tr>
    
    
      <tr class="odd gradeX">
    
    
    <td >R</td>
<td> <input type='text' class='form-control' id='conPositivo_r1' name='conPositivo_r1' value='<?php echo $t->conPositivo_r1?>'/></td>
<td> <input type='text' class='form-control' id='conPositivo_r2' name='conPositivo_r2' value='<?php echo $t->conPositivo_r2?>'/></td>
<td> <input type='text' class='form-control' id='conPositivo_r3' name='conPositivo_r3' value='<?php echo $t->conPositivo_r3?>'/></td>
<td> <input type='text' class='form-control' id='conPositivo_r4' name='conPositivo_r4' value='<?php echo $t->conPositivo_r4?>'/></td>
<td> <input type='text' class='form-control' id='conPositivo_r5' name='conPositivo_r5' value='<?php echo $t->conPositivo_r5?>'/></td>
<td> <input type='text' class='form-control' id='conPositivo_r6' name='conPositivo_r6' value='<?php echo $t->conPositivo_r6?>'/></td>
<td> <input type='text' class='form-control' id='conPositivo_r7' name='conPositivo_r7' value='<?php echo $t->conPositivo_r7?>'/></td>
<td> <input type='text' class='form-control' id='conPositivo_rtot' name='conPositivo_rtot' value='<?php echo $t->conPositivo_rtot?>'/></td>
<td> <input type='text' class='form-control' id='conPositivo_rprom' name='conPositivo_rprom' value='<?php echo $t->conPositivo_rprom?>'/></td>
       
    </tr>
    
    <tr class="odd gradeX">
    
    
    <td >%</td>
<td> <input type='text' class='form-control' id='conPositivo_cum1' name='conPositivo_cum1' value='<?php echo $t->conPositivo_cum1?>'/></td>
<td> <input type='text' class='form-control' id='conPositivo_cum2' name='conPositivo_cum2' value='<?php echo $t->conPositivo_cum2?>'/></td>
<td> <input type='text' class='form-control' id='conPositivo_cum3' name='conPositivo_cum3' value='<?php echo $t->conPositivo_cum3?>'/></td>
<td> <input type='text' class='form-control' id='conPositivo_cum4' name='conPositivo_cum4' value='<?php echo $t->conPositivo_cum4?>'/></td>
<td> <input type='text' class='form-control' id='conPositivo_cum5' name='conPositivo_cum5' value='<?php echo $t->conPositivo_cum5?>'/></td>
<td> <input type='text' class='form-control' id='conPositivo_cum6' name='conPositivo_cum6' value='<?php echo $t->conPositivo_cum6?>'/></td>
<td> <input type='text' class='form-control' id='conPositivo_cum7' name='conPositivo_cum7' value='<?php echo $t->conPositivo_cum7?>'/></td>
<td> <input type='text' class='form-control' id='conPositivo_tot' name='conPositivo_tot' value='<?php echo $t->conPositivo_tot?>'/></td>
<td> <input type='text' class='form-control' id='conPositivo_prom' name='conPositivo_prom' value='<?php echo $t->conPositivo_prom?>'/></td>
    
 
   
    </tr>
    
     <tr class="odd gradeX">
    
    
    <td rowspan="3" width="12%">CONTACTO NEGATIVO</td>
    <td >P</td>
<td> <input type='text' class='form-control' id='conNegativo_p1' name='conNegativo_p1' value='<?php echo $t->conNegativo_p1?>'/></td>
<td> <input type='text' class='form-control' id='conNegativo_p2' name='conNegativo_p2' value='<?php echo $t->conNegativo_p2?>'/></td>
<td> <input type='text' class='form-control' id='conNegativo_p3' name='conNegativo_p3' value='<?php echo $t->conNegativo_p3?>'/></td>
<td> <input type='text' class='form-control' id='conNegativo_p4' name='conNegativo_p4' value='<?php echo $t->conNegativo_p4?>'/></td>
<td> <input type='text' class='form-control' id='conNegativo_p5' name='conNegativo_p5' value='<?php echo $t->conNegativo_p5?>'/></td>
<td> <input type='text' class='form-control' id='conNegativo_p6' name='conNegativo_p6' value='<?php echo $t->conNegativo_p6?>'/></td>
<td> <input type='text' class='form-control' id='conNegativo_p7' name='conNegativo_p7' value='<?php echo $t->conNegativo_p7?>'/></td>
<td> <input type='text' class='form-control' id='conNegativo_ptot' name='conNegativo_ptot' value='<?php echo $t->conNegativo_ptot?>'/></td>
<td> <input type='text' class='form-control' id='conNegativo_pprom' name='conNegativo_pprom' value='<?php echo $t->conNegativo_pprom?>'/></td>
       
    </tr>
    
    
      <tr class="odd gradeX">
    
    
    <td >R</td>
<td> <input type='text' class='form-control' id='conNegativo_r1' name='conNegativo_r1' value='<?php echo $t->conNegativo_r1?>'/></td>
<td> <input type='text' class='form-control' id='conNegativo_r2' name='conNegativo_r2' value='<?php echo $t->conNegativo_r2?>'/></td>
<td> <input type='text' class='form-control' id='conNegativo_r3' name='conNegativo_r3' value='<?php echo $t->conNegativo_r3?>'/></td>
<td> <input type='text' class='form-control' id='conNegativo_r4' name='conNegativo_r4' value='<?php echo $t->conNegativo_r4?>'/></td>
<td> <input type='text' class='form-control' id='conNegativo_r5' name='conNegativo_r5' value='<?php echo $t->conNegativo_r5?>'/></td>
<td> <input type='text' class='form-control' id='conNegativo_r6' name='conNegativo_r6' value='<?php echo $t->conNegativo_r6?>'/></td>
<td> <input type='text' class='form-control' id='conNegativo_r7' name='conNegativo_r7' value='<?php echo $t->conNegativo_r7?>'/></td>
<td> <input type='text' class='form-control' id='conNegativo_rtot' name='conNegativo_rtot' value='<?php echo $t->conNegativo_rtot?>'/></td>
<td> <input type='text' class='form-control' id='conNegativo_rprom' name='conNegativo_rprom' value='<?php echo $t->conNegativo_rprom?>'/></td>
       
    </tr>
    
    <tr class="odd gradeX">
    
    
    <td >%</td>
<td> <input type='text' class='form-control' id='conNegativo_cum1' name='conNegativo_cum1' value='<?php echo $t->conNegativo_cum1?>'/></td>
<td> <input type='text' class='form-control' id='conNegativo_cum2' name='conNegativo_cum2' value='<?php echo $t->conNegativo_cum2?>'/></td>
<td> <input type='text' class='form-control' id='conNegativo_cum3' name='conNegativo_cum3' value='<?php echo $t->conNegativo_cum3?>'/></td>
<td> <input type='text' class='form-control' id='conNegativo_cum4' name='conNegativo_cum4' value='<?php echo $t->conNegativo_cum4?>'/></td>
<td> <input type='text' class='form-control' id='conNegativo_cum5' name='conNegativo_cum5' value='<?php echo $t->conNegativo_cum5?>'/></td>
<td> <input type='text' class='form-control' id='conNegativo_cum6' name='conNegativo_cum6' value='<?php echo $t->conNegativo_cum6?>'/></td>
<td> <input type='text' class='form-control' id='conNegativo_cum7' name='conNegativo_cum7' value='<?php echo $t->conNegativo_cum7?>'/></td>
<td> <input type='text' class='form-control' id='conNegativo_tot' name='conNegativo_tot' value='<?php echo $t->conNegativo_tot?>'/></td>
<td> <input type='text' class='form-control' id='conNegativo_prom' name='conNegativo_prom' value='<?php echo $t->conNegativo_prom?>'/></td>
   
 
   
    </tr>
    
     <tr class="odd gradeX">
    
    
    <td rowspan="3" width="12%">NUEVOS DATOS</td>
    <td >P</td>
<td> <input type='text' class='form-control' id='datos_p1' name='datos_p1' value='<?php echo $t->datos_p1?>'/></td>
<td> <input type='text' class='form-control' id='datos_p2' name='datos_p2' value='<?php echo $t->datos_p2?>'/></td>
<td> <input type='text' class='form-control' id='datos_p3' name='datos_p3' value='<?php echo $t->datos_p3?>'/></td>
<td> <input type='text' class='form-control' id='datos_p4' name='datos_p4' value='<?php echo $t->datos_p4?>'/></td>
<td> <input type='text' class='form-control' id='datos_p5' name='datos_p5' value='<?php echo $t->datos_p5?>'/></td>
<td> <input type='text' class='form-control' id='datos_p6' name='datos_p6' value='<?php echo $t->datos_p6?>'/></td>
<td> <input type='text' class='form-control' id='datos_p7' name='datos_p7' value='<?php echo $t->datos_p7?>'/></td>
<td> <input type='text' class='form-control' id='datos_ptot' name='datos_ptot' value='<?php echo $t->datos_ptot?>'/></td>
<td> <input type='text' class='form-control' id='datos_pprom' name='datos_pprom' value='<?php echo $t->datos_pprom?>'/></td>
      
    </tr>
    
    
      <tr class="odd gradeX">
    
    
    <td >R</td>
<td> <input type='text' class='form-control' id='datos_r1' name='datos_r1' value='<?php echo $t->datos_r1?>'/></td>
<td> <input type='text' class='form-control' id='datos_r2' name='datos_r2' value='<?php echo $t->datos_r2?>'/></td>
<td> <input type='text' class='form-control' id='datos_r3' name='datos_r3' value='<?php echo $t->datos_r3?>'/></td>
<td> <input type='text' class='form-control' id='datos_r4' name='datos_r4' value='<?php echo $t->datos_r4?>'/></td>
<td> <input type='text' class='form-control' id='datos_r5' name='datos_r5' value='<?php echo $t->datos_r5?>'/></td>
<td> <input type='text' class='form-control' id='datos_r6' name='datos_r6' value='<?php echo $t->datos_r6?>'/></td>
<td> <input type='text' class='form-control' id='datos_r7' name='datos_r7' value='<?php echo $t->datos_r7?>'/></td>
<td> <input type='text' class='form-control' id='datos_rtot' name='datos_rtot' value='<?php echo $t->datos_rtot?>'/></td>
<td> <input type='text' class='form-control' id='datos_rprom' name='datos_rprom' value='<?php echo $t->datos_rprom?>'/></td>
     
    </tr>
    
    <tr class="odd gradeX">
    
    
    <td >%</td>
<td> <input type='text' class='form-control' id='datos_cum1' name='datos_cum1' value='<?php echo $t->datos_cum1?>'/></td>
<td> <input type='text' class='form-control' id='datos_cum2' name='datos_cum2' value='<?php echo $t->datos_cum2?>'/></td>
<td> <input type='text' class='form-control' id='datos_cum3' name='datos_cum3' value='<?php echo $t->datos_cum3?>'/></td>
<td> <input type='text' class='form-control' id='datos_cum4' name='datos_cum4' value='<?php echo $t->datos_cum4?>'/></td>
<td> <input type='text' class='form-control' id='datos_cum5' name='datos_cum5' value='<?php echo $t->datos_cum5?>'/></td>
<td> <input type='text' class='form-control' id='datos_cum6' name='datos_cum6' value='<?php echo $t->datos_cum6?>'/></td>
<td> <input type='text' class='form-control' id='datos_cum7' name='datos_cum7' value='<?php echo $t->datos_cum7?>'/></td>
<td> <input type='text' class='form-control' id='datos_tot' name='datos_tot' value='<?php echo $t->datos_tot?>'/></td>
<td> <input type='text' class='form-control' id='datos_prom' name='datos_prom' value='<?php echo $t->datos_prom?>'/></td>
   
 
   
    </tr>
    
   
    
    </tbody>
    </table>
    
    			  
						  
						  
    
    
                     
                    
                    

    <?php 
	                                                   
	                                                    } 
	                                                 
	                                                ?>
       
       
       </div>     
	
	
			    <!-- content -->
			  </div>
			  <!-- End Paso 2 -->
			  
			  <!-- Paso 3 -->
			  <div id="tabs1-paso3">
			    
			    	   <?php 
	                                                  
	                                                   
	                                               
	                                                
	                                                    foreach($DiarioNomina as  $t){ ?>
    
    
          
        
    
						  

			 
				 <div class="form-group">
    			  
						  
						   <table cellpadding="0" cellspacing="0" border="0"
												class="table table-striped table-bordered " id="table_emplext">
    
    <thead>
														<tr>
														<th   >INDICADOR</th>
													   <th ></th>
													<th >VIE</th>
													<th >SAB</th>
													<th >DOM</th>
													<th >LUN</th>
													<th >MAR</th>
													<th >MIE</th>
													<th >JUE</th>
													<th >TOTAL SEMANAL</th>
													<th >PROM DIA</th>
														
													
													</tr>
													
												</thead>
    <tbody>
                                 
  	 <tr class="odd gradeX">
    
    
    <td rowspan="3" width="12%">PERSONAS GESTORES</td>
    <td >P</td>
<td> <input type='text' class='form-control' id='perGestores_p1' name='perGestores_p1' value='<?php echo $t->perGestores_p1?>'/></td>
<td> <input type='text' class='form-control' id='perGestores_p2' name='perGestores_p2' value='<?php echo $t->perGestores_p2?>'/></td>
<td> <input type='text' class='form-control' id='perGestores_p3' name='perGestores_p3' value='<?php echo $t->perGestores_p3?>'/></td>
<td> <input type='text' class='form-control' id='perGestores_p4' name='perGestores_p4' value='<?php echo $t->perGestores_p4?>'/></td>
<td> <input type='text' class='form-control' id='perGestores_p5' name='perGestores_p5' value='<?php echo $t->perGestores_p5?>'/></td>
<td> <input type='text' class='form-control' id='perGestores_p6' name='perGestores_p6' value='<?php echo $t->perGestores_p6?>'/></td>
<td> <input type='text' class='form-control' id='perGestores_p7' name='perGestores_p7' value='<?php echo $t->perGestores_p7?>'/></td>
<td> <input type='text' class='form-control' id='perGestores_ptot' name='perGestores_ptot' value='<?php echo $t->perGestores_ptot?>'/></td>
<td> <input type='text' class='form-control' id='perGestores_pprom' name='perGestores_pprom' value='<?php echo $t->perGestores_pprom?>'/></td>
       
    </tr>
    
    
      <tr class="odd gradeX">
    
    
    <td >R</td>
<td> <input type='text' class='form-control' id='perGestores_r1' name='perGestores_r1' value='<?php echo $t->perGestores_r1?>'/></td>
<td> <input type='text' class='form-control' id='perGestores_r2' name='perGestores_r2' value='<?php echo $t->perGestores_r2?>'/></td>
<td> <input type='text' class='form-control' id='perGestores_r3' name='perGestores_r3' value='<?php echo $t->perGestores_r3?>'/></td>
<td> <input type='text' class='form-control' id='perGestores_r4' name='perGestores_r4' value='<?php echo $t->perGestores_r4?>'/></td>
<td> <input type='text' class='form-control' id='perGestores_r5' name='perGestores_r5' value='<?php echo $t->perGestores_r5?>'/></td>
<td> <input type='text' class='form-control' id='perGestores_r6' name='perGestores_r6' value='<?php echo $t->perGestores_r6?>'/></td>
<td> <input type='text' class='form-control' id='perGestores_r7' name='perGestores_r7' value='<?php echo $t->perGestores_r7?>'/></td>
<td> <input type='text' class='form-control' id='perGestores_rtot' name='perGestores_rtot' value='<?php echo $t->perGestores_rtot?>'/></td>
<td> <input type='text' class='form-control' id='perGestores_rprom' name='perGestores_rprom' value='<?php echo $t->perGestores_rprom?>'/></td>
      
    </tr>
    
    <tr class="odd gradeX">
    
    
    <td >%</td>
<td> <input type='text' class='form-control' id='perGestores_cum1' name='perGestores_cum1' value='<?php echo $t->perGestores_cum1?>'/></td>
<td> <input type='text' class='form-control' id='perGestores_cum2' name='perGestores_cum2' value='<?php echo $t->perGestores_cum2?>'/></td>
<td> <input type='text' class='form-control' id='perGestores_cum3' name='perGestores_cum3' value='<?php echo $t->perGestores_cum3?>'/></td>
<td> <input type='text' class='form-control' id='perGestores_cum4' name='perGestores_cum4' value='<?php echo $t->perGestores_cum4?>'/></td>
<td> <input type='text' class='form-control' id='perGestores_cum5' name='perGestores_cum5' value='<?php echo $t->perGestores_cum5?>'/></td>
<td> <input type='text' class='form-control' id='perGestores_cum6' name='perGestores_cum6' value='<?php echo $t->perGestores_cum6?>'/></td>
<td> <input type='text' class='form-control' id='perGestores_cum7' name='perGestores_cum7' value='<?php echo $t->perGestores_cum7?>'/></td>
<td> <input type='text' class='form-control' id='perGestores_tot' name='perGestores_tot' value='<?php echo $t->perGestores_tot?>'/></td>
<td> <input type='text' class='form-control' id='perGestores_prom' name='perGestores_prom' value='<?php echo $t->perGestores_prom?>'/></td>
   
 
   
    </tr>
    
    
     <tr class="odd gradeX">
    
    
    <td rowspan="3" width="12%">HORAS GESTORES POR DIA</td>
    <td >P</td>
<td> <input type='text' class='form-control' id='horasGest_p1' name='horasGest_p1' value='<?php echo $t->horasGest_p1?>'/></td>
<td> <input type='text' class='form-control' id='horasGest_p2' name='horasGest_p2' value='<?php echo $t->horasGest_p2?>'/></td>
<td> <input type='text' class='form-control' id='horasGest_p3' name='horasGest_p3' value='<?php echo $t->horasGest_p3?>'/></td>
<td> <input type='text' class='form-control' id='horasGest_p4' name='horasGest_p4' value='<?php echo $t->horasGest_p4?>'/></td>
<td> <input type='text' class='form-control' id='horasGest_p5' name='horasGest_p5' value='<?php echo $t->horasGest_p5?>'/></td>
<td> <input type='text' class='form-control' id='horasGest_p6' name='horasGest_p6' value='<?php echo $t->horasGest_p6?>'/></td>
<td> <input type='text' class='form-control' id='horasGest_p7' name='horasGest_p7' value='<?php echo $t->horasGest_p7?>'/></td>
<td> <input type='text' class='form-control' id='horasGest_ptot' name='horasGest_ptot' value='<?php echo $t->horasGest_ptot?>'/></td>
<td> <input type='text' class='form-control' id='horasGest_pprom' name='horasGest_pprom' value='<?php echo $t->horasGest_pprom?>'/></td>
      
    </tr>
    
    
      <tr class="odd gradeX">
    
    
    <td >R</td>
    <td> <input type='text' class='form-control' id='horasGest_r1' name='horasGest_r1' value='<?php echo $t->horasGest_r1?>'/></td>
<td> <input type='text' class='form-control' id='horasGest_r2' name='horasGest_r2' value='<?php echo $t->horasGest_r2?>'/></td>
<td> <input type='text' class='form-control' id='horasGest_r3' name='horasGest_r3' value='<?php echo $t->horasGest_r3?>'/></td>
<td> <input type='text' class='form-control' id='horasGest_r4' name='horasGest_r4' value='<?php echo $t->horasGest_r4?>'/></td>
<td> <input type='text' class='form-control' id='horasGest_r5' name='horasGest_r5' value='<?php echo $t->horasGest_r5?>'/></td>
<td> <input type='text' class='form-control' id='horasGest_r6' name='horasGest_r6' value='<?php echo $t->horasGest_r6?>'/></td>
<td> <input type='text' class='form-control' id='horasGest_r7' name='horasGest_r7' value='<?php echo $t->horasGest_r7?>'/></td>
<td> <input type='text' class='form-control' id='horasGest_rtot' name='horasGest_rtot' value='<?php echo $t->horasGest_rtot?>'/></td>
<td> <input type='text' class='form-control' id='horasGest_rprom' name='horasGest_rprom' value='<?php echo $t->horasGest_rprom?>'/></td>
    
    </tr>
    
    <tr class="odd gradeX">
    
    
    <td >%</td>
<td> <input type='text' class='form-control' id='horasGest_cum1' name='horasGest_cum1' value='<?php echo $t->horasGest_cum1?>'/></td>
<td> <input type='text' class='form-control' id='horasGest_cum2' name='horasGest_cum2' value='<?php echo $t->horasGest_cum2?>'/></td>
<td> <input type='text' class='form-control' id='horasGest_cum3' name='horasGest_cum3' value='<?php echo $t->horasGest_cum3?>'/></td>
<td> <input type='text' class='form-control' id='horasGest_cum4' name='horasGest_cum4' value='<?php echo $t->horasGest_cum4?>'/></td>
<td> <input type='text' class='form-control' id='horasGest_cum5' name='horasGest_cum5' value='<?php echo $t->horasGest_cum5?>'/></td>
<td> <input type='text' class='form-control' id='horasGest_cum6' name='horasGest_cum6' value='<?php echo $t->horasGest_cum6?>'/></td>
<td> <input type='text' class='form-control' id='horasGest_cum7' name='horasGest_cum7' value='<?php echo $t->horasGest_cum7?>'/></td>
<td> <input type='text' class='form-control' id='horasGest_tot' name='horasGest_tot' value='<?php echo $t->horasGest_tot?>'/></td>
<td> <input type='text' class='form-control' id='horasGest_prom' name='horasGest_prom' value='<?php echo $t->horasGest_prom?>'/></td>
   
 
   
    </tr>
    
     <tr class="odd gradeX">
    
    
    <td rowspan="3" width="12%">PAGO NOMINA</td>
    <td >P</td>
<td> <input type='text' class='form-control' id='pagoNom_p1' name='pagoNom_p1' value='<?php echo $t->pagoNom_p1?>'/></td>
<td> <input type='text' class='form-control' id='pagoNom_p2' name='pagoNom_p2' value='<?php echo $t->pagoNom_p2?>'/></td>
<td> <input type='text' class='form-control' id='pagoNom_p3' name='pagoNom_p3' value='<?php echo $t->pagoNom_p3?>'/></td>
<td> <input type='text' class='form-control' id='pagoNom_p4' name='pagoNom_p4' value='<?php echo $t->pagoNom_p4?>'/></td>
<td> <input type='text' class='form-control' id='pagoNom_p5' name='pagoNom_p5' value='<?php echo $t->pagoNom_p5?>'/></td>
<td> <input type='text' class='form-control' id='pagoNom_p6' name='pagoNom_p6' value='<?php echo $t->pagoNom_p6?>'/></td>
<td> <input type='text' class='form-control' id='pagoNom_p7' name='pagoNom_p7' value='<?php echo $t->pagoNom_p7?>'/></td>
<td> <input type='text' class='form-control' id='pagoNom_ptot' name='pagoNom_ptot' value='<?php echo $t->pagoNom_ptot?>'/></td>
<td> <input type='text' class='form-control' id='pagoNom_pprom' name='pagoNom_pprom' value='<?php echo $t->pagoNom_pprom?>'/></td>
      
    </tr>
    
    
      <tr class="odd gradeX">
    
    
    <td >R</td>
<td> <input type='text' class='form-control' id='pagoNom_r1' name='pagoNom_r1' value='<?php echo $t->pagoNom_r1?>'/></td>
<td> <input type='text' class='form-control' id='pagoNom_r2' name='pagoNom_r2' value='<?php echo $t->pagoNom_r2?>'/></td>
<td> <input type='text' class='form-control' id='pagoNom_r3' name='pagoNom_r3' value='<?php echo $t->pagoNom_r3?>'/></td>
<td> <input type='text' class='form-control' id='pagoNom_r4' name='pagoNom_r4' value='<?php echo $t->pagoNom_r4?>'/></td>
<td> <input type='text' class='form-control' id='pagoNom_r5' name='pagoNom_r5' value='<?php echo $t->pagoNom_r5?>'/></td>
<td> <input type='text' class='form-control' id='pagoNom_r6' name='pagoNom_r6' value='<?php echo $t->pagoNom_r6?>'/></td>
<td> <input type='text' class='form-control' id='pagoNom_r7' name='pagoNom_r7' value='<?php echo $t->pagoNom_r7?>'/></td>
<td> <input type='text' class='form-control' id='pagoNom_rtot' name='pagoNom_rtot' value='<?php echo $t->pagoNom_rtot?>'/></td>
<td> <input type='text' class='form-control' id='pagoNom_rprom' name='pagoNom_rprom' value='<?php echo $t->pagoNom_rprom?>'/></td>
       
    </tr>
    
    <tr class="odd gradeX">
    
    
    <td >%</td>
<td> <input type='text' class='form-control' id='pagoNom_cum1' name='pagoNom_cum1' value='<?php echo $t->pagoNom_cum1?>'/></td>
<td> <input type='text' class='form-control' id='pagoNom_cum2' name='pagoNom_cum2' value='<?php echo $t->pagoNom_cum2?>'/></td>
<td> <input type='text' class='form-control' id='pagoNom_cum3' name='pagoNom_cum3' value='<?php echo $t->pagoNom_cum3?>'/></td>
<td> <input type='text' class='form-control' id='pagoNom_cum4' name='pagoNom_cum4' value='<?php echo $t->pagoNom_cum4?>'/></td>
<td> <input type='text' class='form-control' id='pagoNom_cum5' name='pagoNom_cum5' value='<?php echo $t->pagoNom_cum5?>'/></td>
<td> <input type='text' class='form-control' id='pagoNom_cum6' name='pagoNom_cum6' value='<?php echo $t->pagoNom_cum6?>'/></td>
<td> <input type='text' class='form-control' id='pagoNom_cum7' name='pagoNom_cum7' value='<?php echo $t->pagoNom_cum7?>'/></td>
<td> <input type='text' class='form-control' id='pagoNom_tot' name='pagoNom_tot' value='<?php echo $t->pagoNom_tot?>'/></td>
<td> <input type='text' class='form-control' id='pagoNom_prom' name='pagoNom_prom' value='<?php echo $t->pagoNom_prom?>'/></td>
    
 
   </tr>
   
     <tr class="odd gradeX">
    
    
    <td rowspan="1" width="12%">AUSENT.PERSONAL</td>
    <td >%</td>
<td> <input type='text' class='form-control' id='ausent_p1' name='ausent_p1' value='<?php echo $t->ausent_p1?>'/></td>
<td> <input type='text' class='form-control' id='ausent_p2' name='ausent_p2' value='<?php echo $t->ausent_p2?>'/></td>
<td> <input type='text' class='form-control' id='ausent_p3' name='ausent_p3' value='<?php echo $t->ausent_p3?>'/></td>
<td> <input type='text' class='form-control' id='ausent_p4' name='ausent_p4' value='<?php echo $t->ausent_p4?>'/></td>
<td> <input type='text' class='form-control' id='ausent_p5' name='ausent_p5' value='<?php echo $t->ausent_p5?>'/></td>
<td> <input type='text' class='form-control' id='ausent_p6' name='ausent_p6' value='<?php echo $t->ausent_p6?>'/></td>
<td> <input type='text' class='form-control' id='ausent_p7' name='ausent_p7' value='<?php echo $t->ausent_p7?>'/></td>
<td> <input type='text' class='form-control' id='ausent_ptot' name='ausent_ptot' value='<?php echo $t->ausent_ptot?>'/></td>
<td> <input type='text' class='form-control' id='ausent_pprom' name='ausent_pprom' value='<?php echo $t->ausent_pprom?>'/></td>
      
    </tr>
   
    
        <tr class="odd gradeX">
    
    
    <td rowspan="1" width="12%">DISPONIBILIDAD DE EQUIPOS</td>
    <td >%</td>
<td> <input type='text' class='form-control' id='equipos_p1' name='equipos_p1' value='<?php echo $t->equipos_p1?>'/></td>
<td> <input type='text' class='form-control' id='equipos_p2' name='equipos_p2' value='<?php echo $t->equipos_p2?>'/></td>
<td> <input type='text' class='form-control' id='equipos_p3' name='equipos_p3' value='<?php echo $t->equipos_p3?>'/></td>
<td> <input type='text' class='form-control' id='equipos_p4' name='equipos_p4' value='<?php echo $t->equipos_p4?>'/></td>
<td> <input type='text' class='form-control' id='equipos_p5' name='equipos_p5' value='<?php echo $t->equipos_p5?>'/></td>
<td> <input type='text' class='form-control' id='equipos_p6' name='equipos_p6' value='<?php echo $t->equipos_p6?>'/></td>
<td> <input type='text' class='form-control' id='equipos_p7' name='equipos_p7' value='<?php echo $t->equipos_p7?>'/></td>
<td> <input type='text' class='form-control' id='equipos_ptot' name='equipos_ptot' value='<?php echo $t->equipos_ptot?>'/></td>
<td> <input type='text' class='form-control' id='equipos_pprom' name='equipos_pprom' value='<?php echo $t->equipos_pprom?>'/></td>
      
    </tr>
    
   
    
    </tbody>
    </table>
    
    	        

    <?php 
	                                                  
	                                                    } 
	                                                 
	                                                ?>
       
       
       </div>
			    
			  </div>
			  <!-- End Paso 3 -->
			  
			    <a href="#" class="scrollup">Scroll</a>
			  </form>
		  </div>
		</div>
	</div>
	
	</div>
	</div>
	
	
	<link rel='stylesheet' type='text/css' href="<?php echo HOME_URL; ?>assets/js/jqueryui.css" /> 
<link rel="stylesheet" type="text/css" href="<?php echo HOME_URL; ?>assets/css/plugins/jquery-alertify/alertify.core.css" />
<link rel="stylesheet" type="text/css" href="<?php echo HOME_URL; ?>assets/css/plugins/jquery-alertify/alertify.default.css" />



<script type='text/javascript' src="<?php echo HOME_URL; ?>assets/js/jqueryui-1.10.3.min.js"></script> 
<script type='text/javascript' src="<?php echo HOME_URL; ?>assets/plugins/form-validation/jquery.validate.min.js"></script> 
<script type='text/javascript' src="<?php echo HOME_URL; ?>assets/plugins/jquery-alertify/jquery.alertify.min.js"></script>
<script type='text/javascript' src="<?php echo HOME_URL; ?>assets/plugins/jquery-blockUI/jquery.blockUI.js"></script> 
	
	
	
	
	<style>
            label.error { font-size: 11px; color: red}
            input.error, textarea.error { border: 1px solid red }
        </style>
        
        
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
 
 
 //
  var lgestiones_p6 = $('#gestiones_p6').val();
         	 var lgestiones_r6 = $('#gestiones_r6').val();

                var lgest_cum6=lgestiones_r6/lgestiones_p6;
         	  
         	  $("#gest_cum6").val(number_format(lgest_cum6, 2));    

         	  //
         	  
         	  //
  var lgestiones_p7 = $('#gestiones_p7').val();
         	 var lgestiones_r7 = $('#gestiones_r7').val();

                var lgest_cum7=lgestiones_r7/lgestiones_p7;
         	  
         	  $("#gest_cum7").val(number_format(lgest_cum7, 2));    

         	  //
 var  lgestiones_ptot=parseInt(lgestiones_p1)+parseInt(lgestiones_p2)+parseInt(lgestiones_p3)+parseInt(lgestiones_p4)+parseInt(lgestiones_p5)+parseInt(lgestiones_p6)+parseInt(lgestiones_p7);

 $("#gestiones_ptot").val(lgestiones_ptot); 


 var  lgestiones_rtot=parseInt(lgestiones_r1)+parseInt(lgestiones_r2)+parseInt(lgestiones_r3)+parseInt(lgestiones_r4)+parseInt(lgestiones_r5)+parseInt(lgestiones_r6)+parseInt(lgestiones_r7);

 $("#gestiones_rtot").val(lgestiones_rtot); 


 var lgest_tot=lgestiones_rtot/lgestiones_ptot;


  $("#gest_tot").val(lgest_tot);


  var lgestiones_pprom=lgestiones_ptot/7;


  $("#gestiones_pprom").val(lgestiones_pprom);


  var lgestiones_rprom=lgestiones_rtot/7;


  $("#gestiones_rprom").val(lgestiones_rprom);


  var lgest_prom=lgestiones_rprom/lgestiones_pprom;


  $("#gest_prom").val(lgest_prom);      



  ///gestores horas

	  var lgestionesHora_p1 = $('#gestionesHora_p1').val();
	  var lgestionesHora_r1 = $('#gestionesHora_r1').val();

      var lgestionesHora_cum1=lgestionesHora_r1/lgestionesHora_p1;
	  
	  $("#gestionesHora_cum1").val(number_format(lgestionesHora_cum1, 2));

//

     var lgestionesHora_p2 = $('#gestionesHora_p2').val();
 	 var lgestionesHora_r2 = $('#gestionesHora_r2').val();

     var lgestionesHora_cum2=lgestionesHora_r2/lgestionesHora_p2;
 	  
 	 $("#gestionesHora_cum2").val(number_format(lgestionesHora_cum2, 2));
	  
//

     var lgestionesHora_p3 = $('#gestionesHora_p3').val();
	 var lgestionesHora_r3 = $('#gestionesHora_r3').val();

       var lgestionesHora_cum3=lgestionesHora_r3/lgestionesHora_p3;
	  
	  $("#gestionesHora_cum3").val(number_format(lgestionesHora_cum3, 2));

	  //

      var lgestionesHora_p4 = $('#gestionesHora_p4').val();
 	 var lgestionesHora_r4 = $('#gestionesHora_r4').val();

        var lgestionesHora_cum4=lgestionesHora_r4/lgestionesHora_p4;
 	  
 	  $("#gestionesHora_cum4").val(number_format(lgestionesHora_cum4, 2));       	 

//
var lgestionesHora_p5 = $('#gestionesHora_p5').val();
 	 var lgestionesHora_r5 = $('#gestionesHora_r5').val();

        var lgestionesHora_cum5=lgestionesHora_r5/lgestionesHora_p5;
 	  
 	  $("#gestionesHora_cum5").val(number_format(lgestionesHora_cum5, 2));    

 	  //


//
var lgestionesHora_p6 = $('#gestionesHora_p6').val();
 	 var lgestionesHora_r6 = $('#gestionesHora_r6').val();

        var lgestionesHora_cum6=lgestionesHora_r6/lgestionesHora_p6;
 	  
 	  $("#gestionesHora_cum6").val(number_format(lgestionesHora_cum6, 2));    

 	  //
 	  
 	  //
var lgestionesHora_p7 = $('#gestionesHora_p7').val();
 	 var lgestionesHora_r7 = $('#gestionesHora_r7').val();

        var lgestionesHora_cum7=lgestionesHora_r7/lgestionesHora_p7;
 	  
 	  $("#gestionesHora_cum7").val(number_format(lgestionesHora_cum7, 2));    

 	  //
var  lgestionesHora_ptot=parseInt(lgestionesHora_p1)+parseInt(lgestionesHora_p2)+parseInt(lgestionesHora_p3)+parseInt(lgestionesHora_p4)+parseInt(lgestionesHora_p5)+parseInt(lgestionesHora_p6)+parseInt(lgestionesHora_p7);

$("#gestionesHora_ptot").val(lgestionesHora_ptot); 


var  lgestionesHora_rtot=parseInt(lgestionesHora_r1)+parseInt(lgestionesHora_r2)+parseInt(lgestionesHora_r3)+parseInt(lgestionesHora_r4)+parseInt(lgestionesHora_r5)+parseInt(lgestionesHora_r6)+parseInt(lgestionesHora_r7);

$("#gestionesHora_rtot").val(lgestionesHora_rtot); 


var lgestionesHora_tot=lgestionesHora_rtot/lgestionesHora_ptot;


$("#gestionesHora_tot").val(lgestionesHora_tot);


var lgestionesHora_pprom=lgestionesHora_ptot/7;


$("#gestionesHora_pprom").val(lgestionesHora_pprom);


var lgestionesHora_rprom=lgestionesHora_rtot/7;


$("#gestionesHora_rprom").val(lgestionesHora_rprom);


var lgestionesHora_prom=lgestionesHora_rprom/lgestionesHora_pprom;


$("#gestionesHora_prom").val(lgestionesHora_prom);   


//gphg


 var lgphg_p1 = $('#gphg_p1').val();
 var lgphg_r1 = $('#gphg_r1').val();

 var lgphg_cum1=lgphg_r1/lgphg_p1;
 
 $("#gphg_cum1").val(number_format(lgphg_cum1, 2));

//

var lgphg_p2 = $('#gphg_p2').val();
 var lgphg_r2 = $('#gphg_r2').val();

var lgphg_cum2=lgphg_r2/lgphg_p2;
  
 $("#gphg_cum2").val(number_format(lgphg_cum2, 2));
 
//

var lgphg_p3 = $('#gphg_p3').val();
var lgphg_r3 = $('#gphg_r3').val();

  var lgphg_cum3=lgphg_r3/lgphg_p3;
 
 $("#gphg_cum3").val(number_format(lgphg_cum3, 2));

 //

 var lgphg_p4 = $('#gphg_p4').val();
 var lgphg_r4 = $('#gphg_r4').val();

   var lgphg_cum4=lgphg_r4/lgphg_p4;
  
  $("#gphg_cum4").val(number_format(lgphg_cum4, 2));       	 

//
var lgphg_p5 = $('#gphg_p5').val();
 var lgphg_r5 = $('#gphg_r5').val();

   var lgphg_cum5=lgphg_r5/lgphg_p5;
  
  $("#gphg_cum5").val(number_format(lgphg_cum5, 2));    

  //


//
var lgphg_p6 = $('#gphg_p6').val();
 var lgphg_r6 = $('#gphg_r6').val();

   var lgphg_cum6=lgphg_r6/lgphg_p6;
  
  $("#gphg_cum6").val(number_format(lgphg_cum6, 2));    

  //
  
  //
var lgphg_p7 = $('#gphg_p7').val();
 var lgphg_r7 = $('#gphg_r7').val();

   var lgphg_cum7=lgphg_r7/lgphg_p7;
  
  $("#gphg_cum7").val(number_format(lgphg_cum7, 2));    

  //
var  lgphg_ptot=parseInt(lgphg_p1)+parseInt(lgphg_p2)+parseInt(lgphg_p3)+parseInt(lgphg_p4)+parseInt(lgphg_p5)+parseInt(lgphg_p6)+parseInt(lgphg_p7);

$("#gphg_ptot").val(lgphg_ptot); 


var  lgphg_rtot=parseInt(lgphg_r1)+parseInt(lgphg_r2)+parseInt(lgphg_r3)+parseInt(lgphg_r4)+parseInt(lgphg_r5)+parseInt(lgphg_r6)+parseInt(lgphg_r7);

$("#gphg_rtot").val(lgphg_rtot); 


var lgphg_tot=lgphg_rtot/lgphg_ptot;


$("#gphg_tot").val(lgphg_tot);


var lgphg_pprom=lgphg_ptot/7;


$("#gphg_pprom").val(lgphg_pprom);


var lgphg_rprom=lgphg_rtot/7;


$("#gphg_rprom").val(lgphg_rprom);


var lgphg_prom=lgphg_rprom/lgphg_pprom;


$("#gphg_prom").val(lgphg_prom);   


//promesa pago realizada

 var lpromeReali_p1 = $('#promeReali_p1').val();
 var lpromeReali_r1 = $('#promeReali_r1').val();

 var lpromeReali_cum1=lpromeReali_r1/lpromeReali_p1;
 
 $("#promeReali_cum1").val(number_format(lpromeReali_cum1, 2));

//

var lpromeReali_p2 = $('#promeReali_p2').val();
 var lpromeReali_r2 = $('#promeReali_r2').val();

var lpromeReali_cum2=lpromeReali_r2/lpromeReali_p2;
  
 $("#promeReali_cum2").val(number_format(lpromeReali_cum2, 2));
 
//

var lpromeReali_p3 = $('#promeReali_p3').val();
var lpromeReali_r3 = $('#promeReali_r3').val();

  var lpromeReali_cum3=lpromeReali_r3/lpromeReali_p3;
 
 $("#promeReali_cum3").val(number_format(lpromeReali_cum3, 2));

 //

 var lpromeReali_p4 = $('#promeReali_p4').val();
 var lpromeReali_r4 = $('#promeReali_r4').val();

   var lpromeReali_cum4=lpromeReali_r4/lpromeReali_p4;
  
  $("#promeReali_cum4").val(number_format(lpromeReali_cum4, 2));       	 

//
var lpromeReali_p5 = $('#promeReali_p5').val();
 var lpromeReali_r5 = $('#promeReali_r5').val();

   var lpromeReali_cum5=lpromeReali_r5/lpromeReali_p5;
  
  $("#promeReali_cum5").val(number_format(lpromeReali_cum5, 2));    

  //


//
var lpromeReali_p6 = $('#promeReali_p6').val();
 var lpromeReali_r6 = $('#promeReali_r6').val();

   var lpromeReali_cum6=lpromeReali_r6/lpromeReali_p6;
  
  $("#promeReali_cum6").val(number_format(lpromeReali_cum6, 2));    

  //
  
  //
var lpromeReali_p7 = $('#promeReali_p7').val();
 var lpromeReali_r7 = $('#promeReali_r7').val();

   var lpromeReali_cum7=lpromeReali_r7/lpromeReali_p7;
  
  $("#promeReali_cum7").val(number_format(lpromeReali_cum7, 2));    

  //
var  lpromeReali_ptot=parseInt(lpromeReali_p1)+parseInt(lpromeReali_p2)+parseInt(lpromeReali_p3)+parseInt(lpromeReali_p4)+parseInt(lpromeReali_p5)+parseInt(lpromeReali_p6)+parseInt(lpromeReali_p7);

$("#promeReali_ptot").val(lpromeReali_ptot); 


var  lpromeReali_rtot=parseInt(lpromeReali_r1)+parseInt(lpromeReali_r2)+parseInt(lpromeReali_r3)+parseInt(lpromeReali_r4)+parseInt(lpromeReali_r5)+parseInt(lpromeReali_r6)+parseInt(lpromeReali_r7);

$("#promeReali_rtot").val(lpromeReali_rtot); 


var lpromeReali_tot=lpromeReali_rtot/lpromeReali_ptot;


$("#promeReali_tot").val(lpromeReali_tot);


var lpromeReali_pprom=lpromeReali_ptot/7;


$("#promeReali_pprom").val(lpromeReali_pprom);


var lpromeReali_rprom=lpromeReali_rtot/7;


$("#promeReali_rprom").val(lpromeReali_rprom);


var lpromeReali_prom=lpromeReali_rprom/lpromeReali_pprom;


$("#promeReali_prom").val(lpromeReali_prom);   



//promesa cumplida


 var lpromeCum_p1 = $('#promeCum_p1').val();
 var lpromeCum_r1 = $('#promeCum_r1').val();

 var lpromeCum_cum1=lpromeCum_r1/lpromeCum_p1;
 
 $("#promeCum_cum1").val(number_format(lpromeCum_cum1, 2));

//

var lpromeCum_p2 = $('#promeCum_p2').val();
 var lpromeCum_r2 = $('#promeCum_r2').val();

var lpromeCum_cum2=lpromeCum_r2/lpromeCum_p2;
  
 $("#promeCum_cum2").val(number_format(lpromeCum_cum2, 2));
 
//

var lpromeCum_p3 = $('#promeCum_p3').val();
var lpromeCum_r3 = $('#promeCum_r3').val();

  var lpromeCum_cum3=lpromeCum_r3/lpromeCum_p3;
 
 $("#promeCum_cum3").val(number_format(lpromeCum_cum3, 2));

 //

 var lpromeCum_p4 = $('#promeCum_p4').val();
 var lpromeCum_r4 = $('#promeCum_r4').val();

   var lpromeCum_cum4=lpromeCum_r4/lpromeCum_p4;
  
  $("#promeCum_cum4").val(number_format(lpromeCum_cum4, 2));       	 

//
var lpromeCum_p5 = $('#promeCum_p5').val();
 var lpromeCum_r5 = $('#promeCum_r5').val();

   var lpromeCum_cum5=lpromeCum_r5/lpromeCum_p5;
  
  $("#promeCum_cum5").val(number_format(lpromeCum_cum5, 2));    

  //


//
var lpromeCum_p6 = $('#promeCum_p6').val();
 var lpromeCum_r6 = $('#promeCum_r6').val();

   var lpromeCum_cum6=lpromeCum_r6/lpromeCum_p6;
  
  $("#promeCum_cum6").val(number_format(lpromeCum_cum6, 2));    

  //
  
  //
var lpromeCum_p7 = $('#promeCum_p7').val();
 var lpromeCum_r7 = $('#promeCum_r7').val();

   var lpromeCum_cum7=lpromeCum_r7/lpromeCum_p7;
  
  $("#promeCum_cum7").val(number_format(lpromeCum_cum7, 2));    

  //
var  lpromeCum_ptot=parseInt(lpromeCum_p1)+parseInt(lpromeCum_p2)+parseInt(lpromeCum_p3)+parseInt(lpromeCum_p4)+parseInt(lpromeCum_p5)+parseInt(lpromeCum_p6)+parseInt(lpromeCum_p7);

$("#promeCum_ptot").val(lpromeCum_ptot); 


var  lpromeCum_rtot=parseInt(lpromeCum_r1)+parseInt(lpromeCum_r2)+parseInt(lpromeCum_r3)+parseInt(lpromeCum_r4)+parseInt(lpromeCum_r5)+parseInt(lpromeCum_r6)+parseInt(lpromeCum_r7);

$("#promeCum_rtot").val(lpromeCum_rtot); 


var lpromeCum_tot=lpromeCum_rtot/lpromeCum_ptot;


$("#promeCum_tot").val(lpromeCum_tot);


var lpromeCum_pprom=lpromeCum_ptot/7;


$("#promeCum_pprom").val(lpromeCum_pprom);


var lpromeCum_rprom=lpromeCum_rtot/7;


$("#promeCum_rprom").val(lpromeCum_rprom);


var lpromeCum_prom=lpromeCum_rprom/lpromeCum_pprom;


$("#promeCum_prom").val(lpromeCum_prom);   



///recuperacion



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


//
var lrecuperacion_p6 = $('#recuperacion_p6').val();
 var lrecuperacion_r6 = $('#recuperacion_r6').val();

   var lrecuperacion_cum6=lrecuperacion_r6/lrecuperacion_p6;
  
  $("#recuperacion_cum6").val(number_format(lrecuperacion_cum6, 2));    

  //
  
  //
var lrecuperacion_p7 = $('#recuperacion_p7').val();
 var lrecuperacion_r7 = $('#recuperacion_r7').val();

   var lrecuperacion_cum7=lrecuperacion_r7/lrecuperacion_p7;
  
  $("#recuperacion_cum7").val(number_format(lrecuperacion_cum7, 2));    

  //
var  lrecuperacion_ptot=parseInt(lrecuperacion_p1)+parseInt(lrecuperacion_p2)+parseInt(lrecuperacion_p3)+parseInt(lrecuperacion_p4)+parseInt(lrecuperacion_p5)+parseInt(lrecuperacion_p6)+parseInt(lrecuperacion_p7);

$("#recuperacion_ptot").val(lrecuperacion_ptot); 


var  lrecuperacion_rtot=parseInt(lrecuperacion_r1)+parseInt(lrecuperacion_r2)+parseInt(lrecuperacion_r3)+parseInt(lrecuperacion_r4)+parseInt(lrecuperacion_r5)+parseInt(lrecuperacion_r6)+parseInt(lrecuperacion_r7);

$("#recuperacion_rtot").val(lrecuperacion_rtot); 


var lrecuperacion_tot=lrecuperacion_rtot/lrecuperacion_ptot;


$("#recuperacion_tot").val(lrecuperacion_tot);


var lrecuperacion_pprom=lrecuperacion_ptot/7;


$("#recuperacion_pprom").val(lrecuperacion_pprom);


var lrecuperacion_rprom=lrecuperacion_rtot/7;


$("#recuperacion_rprom").val(lrecuperacion_rprom);


var lrecuperacion_prom=lrecuperacion_rprom/lrecuperacion_pprom;


$("#recuperacion_prom").val(lrecuperacion_prom);   



//////////nomina



 var lperGestores_p1 = $('#perGestores_p1').val();
 var lperGestores_r1 = $('#perGestores_r1').val();

 var lperGestores_cum1=lperGestores_r1/lperGestores_p1;
 
 $("#perGestores_cum1").val(number_format(lperGestores_cum1, 2));

//

var lperGestores_p2 = $('#perGestores_p2').val();
 var lperGestores_r2 = $('#perGestores_r2').val();

var lperGestores_cum2=lperGestores_r2/lperGestores_p2;
  
 $("#perGestores_cum2").val(number_format(lperGestores_cum2, 2));
 
//

var lperGestores_p3 = $('#perGestores_p3').val();
var lperGestores_r3 = $('#perGestores_r3').val();

  var lperGestores_cum3=lperGestores_r3/lperGestores_p3;
 
 $("#perGestores_cum3").val(number_format(lperGestores_cum3, 2));

 //

 var lperGestores_p4 = $('#perGestores_p4').val();
 var lperGestores_r4 = $('#perGestores_r4').val();

   var lperGestores_cum4=lperGestores_r4/lperGestores_p4;
  
  $("#perGestores_cum4").val(number_format(lperGestores_cum4, 2));       	 

//
var lperGestores_p5 = $('#perGestores_p5').val();
 var lperGestores_r5 = $('#perGestores_r5').val();

   var lperGestores_cum5=lperGestores_r5/lperGestores_p5;
  
  $("#perGestores_cum5").val(number_format(lperGestores_cum5, 2));    

  //


//
var lperGestores_p6 = $('#perGestores_p6').val();
 var lperGestores_r6 = $('#perGestores_r6').val();

   var lperGestores_cum6=lperGestores_r6/lperGestores_p6;
  
  $("#perGestores_cum6").val(number_format(lperGestores_cum6, 2));    

  //
  
  //
var lperGestores_p7 = $('#perGestores_p7').val();
 var lperGestores_r7 = $('#perGestores_r7').val();

   var lperGestores_cum7=lperGestores_r7/lperGestores_p7;
  
  $("#perGestores_cum7").val(number_format(lperGestores_cum7, 2));    

  //
var  lperGestores_ptot=parseInt(lperGestores_p1)+parseInt(lperGestores_p2)+parseInt(lperGestores_p3)+parseInt(lperGestores_p4)+parseInt(lperGestores_p5)+parseInt(lperGestores_p6)+parseInt(lperGestores_p7);

$("#perGestores_ptot").val(lperGestores_ptot); 


var  lperGestores_rtot=parseInt(lperGestores_r1)+parseInt(lperGestores_r2)+parseInt(lperGestores_r3)+parseInt(lperGestores_r4)+parseInt(lperGestores_r5)+parseInt(lperGestores_r6)+parseInt(lperGestores_r7);

$("#perGestores_rtot").val(lperGestores_rtot); 


var lperGestores_tot=lperGestores_rtot/lperGestores_ptot;


$("#perGestores_tot").val(lperGestores_tot);


var lperGestores_pprom=lperGestores_ptot/7;


$("#perGestores_pprom").val(lperGestores_pprom);


var lperGestores_rprom=lperGestores_rtot/7;


$("#perGestores_rprom").val(lperGestores_rprom);


var lperGestores_prom=lperGestores_rprom/lperGestores_pprom;


$("#perGestores_prom").val(lperGestores_prom);   


///horas gestores



 var lhorasGest_p1 = $('#horasGest_p1').val();
 var lhorasGest_r1 = $('#horasGest_r1').val();

 var lhorasGest_cum1=lhorasGest_r1/lhorasGest_p1;
 
 $("#horasGest_cum1").val(number_format(lhorasGest_cum1, 2));

//

var lhorasGest_p2 = $('#horasGest_p2').val();
 var lhorasGest_r2 = $('#horasGest_r2').val();

var lhorasGest_cum2=lhorasGest_r2/lhorasGest_p2;
  
 $("#horasGest_cum2").val(number_format(lhorasGest_cum2, 2));
 
//

var lhorasGest_p3 = $('#horasGest_p3').val();
var lhorasGest_r3 = $('#horasGest_r3').val();

  var lhorasGest_cum3=lhorasGest_r3/lhorasGest_p3;
 
 $("#horasGest_cum3").val(number_format(lhorasGest_cum3, 2));

 //

 var lhorasGest_p4 = $('#horasGest_p4').val();
 var lhorasGest_r4 = $('#horasGest_r4').val();

   var lhorasGest_cum4=lhorasGest_r4/lhorasGest_p4;
  
  $("#horasGest_cum4").val(number_format(lhorasGest_cum4, 2));       	 

//
var lhorasGest_p5 = $('#horasGest_p5').val();
 var lhorasGest_r5 = $('#horasGest_r5').val();

   var lhorasGest_cum5=lhorasGest_r5/lhorasGest_p5;
  
  $("#horasGest_cum5").val(number_format(lhorasGest_cum5, 2));    

  //


//
var lhorasGest_p6 = $('#horasGest_p6').val();
 var lhorasGest_r6 = $('#horasGest_r6').val();

   var lhorasGest_cum6=lhorasGest_r6/lhorasGest_p6;
  
  $("#horasGest_cum6").val(number_format(lhorasGest_cum6, 2));    

  //
  
  //
var lhorasGest_p7 = $('#horasGest_p7').val();
 var lhorasGest_r7 = $('#horasGest_r7').val();

   var lhorasGest_cum7=lhorasGest_r7/lhorasGest_p7;
  
  $("#horasGest_cum7").val(number_format(lhorasGest_cum7, 2));    

  //
var  lhorasGest_ptot=parseInt(lhorasGest_p1)+parseInt(lhorasGest_p2)+parseInt(lhorasGest_p3)+parseInt(lhorasGest_p4)+parseInt(lhorasGest_p5)+parseInt(lhorasGest_p6)+parseInt(lhorasGest_p7);

$("#horasGest_ptot").val(lhorasGest_ptot); 


var  lhorasGest_rtot=parseInt(lhorasGest_r1)+parseInt(lhorasGest_r2)+parseInt(lhorasGest_r3)+parseInt(lhorasGest_r4)+parseInt(lhorasGest_r5)+parseInt(lhorasGest_r6)+parseInt(lhorasGest_r7);

$("#horasGest_rtot").val(lhorasGest_rtot); 


var lhorasGest_tot=lhorasGest_rtot/lhorasGest_ptot;


$("#horasGest_tot").val(lhorasGest_tot);


var lhorasGest_pprom=lhorasGest_ptot/7;


$("#horasGest_pprom").val(lhorasGest_pprom);


var lhorasGest_rprom=lhorasGest_rtot/7;


$("#horasGest_rprom").val(lhorasGest_rprom);


var lhorasGest_prom=lhorasGest_rprom/lhorasGest_pprom;


$("#horasGest_prom").val(lhorasGest_prom);   



        	

///pago nomina


 	  var lpagoNom_p1 = $('#pagoNom_p1').val();
        	  var lpagoNom_r1 = $('#pagoNom_r1').val();

              var lpagoNom_cum1=lpagoNom_r1/lpagoNom_p1;
        	  
        	  $("#pagoNom_cum1").val(number_format(lpagoNom_cum1, 2));

//

             var lpagoNom_p2 = $('#pagoNom_p2').val();
         	 var lpagoNom_r2 = $('#pagoNom_r2').val();

             var lpagoNom_cum2=lpagoNom_r2/lpagoNom_p2;
         	  
         	 $("#pagoNom_cum2").val(number_format(lpagoNom_cum2, 2));
        	  
    //

             var lpagoNom_p3 = $('#pagoNom_p3').val();
        	 var lpagoNom_r3 = $('#pagoNom_r3').val();

               var lpagoNom_cum3=lpagoNom_r3/lpagoNom_p3;
        	  
        	  $("#pagoNom_cum3").val(number_format(lpagoNom_cum3, 2));

        	  //

              var lpagoNom_p4 = $('#pagoNom_p4').val();
         	 var lpagoNom_r4 = $('#pagoNom_r4').val();

                var lpagoNom_cum4=lpagoNom_r4/lpagoNom_p4;
         	  
         	  $("#pagoNom_cum4").val(number_format(lpagoNom_cum4, 2));       	 

//
  var lpagoNom_p5 = $('#pagoNom_p5').val();
         	 var lpagoNom_r5 = $('#pagoNom_r5').val();

                var lpagoNom_cum5=lpagoNom_r5/lpagoNom_p5;
         	  
         	  $("#pagoNom_cum5").val(number_format(lpagoNom_cum5, 2));    

         	  //
 
 
 //
  var lpagoNom_p6 = $('#pagoNom_p6').val();
         	 var lpagoNom_r6 = $('#pagoNom_r6').val();

                var lpagoNom_cum6=lpagoNom_r6/lpagoNom_p6;
         	  
         	  $("#pagoNom_cum6").val(number_format(lpagoNom_cum6, 2));    

         	  //
         	  
         	  //
  var lpagoNom_p7 = $('#pagoNom_p7').val();
         	 var lpagoNom_r7 = $('#pagoNom_r7').val();

                var lpagoNom_cum7=lpagoNom_r7/lpagoNom_p7;
         	  
         	  $("#pagoNom_cum7").val(number_format(lpagoNom_cum7, 2));    

         	  //
 var  lpagoNom_ptot=parseInt(lpagoNom_p1)+parseInt(lpagoNom_p2)+parseInt(lpagoNom_p3)+parseInt(lpagoNom_p4)+parseInt(lpagoNom_p5)+parseInt(lpagoNom_p6)+parseInt(lpagoNom_p7);

 $("#pagoNom_ptot").val(lpagoNom_ptot); 


 var  lpagoNom_rtot=parseInt(lpagoNom_r1)+parseInt(lpagoNom_r2)+parseInt(lpagoNom_r3)+parseInt(lpagoNom_r4)+parseInt(lpagoNom_r5)+parseInt(lpagoNom_r6)+parseInt(lpagoNom_r7);

 $("#pagoNom_rtot").val(lpagoNom_rtot); 


 var lpagoNom_tot=lpagoNom_rtot/lpagoNom_ptot;


  $("#pagoNom_tot").val(lpagoNom_tot);


  var lpagoNom_pprom=lpagoNom_ptot/7;


  $("#pagoNom_pprom").val(lpagoNom_pprom);


  var lpagoNom_rprom=lpagoNom_rtot/7;


  $("#pagoNom_rprom").val(lpagoNom_rprom);


  var lpagoNom_prom=lpagoNom_rprom/lpagoNom_pprom;


  $("#pagoNom_prom").val(lpagoNom_prom);   


///////////////Procesos
////minutos


	  var lminutos_p1 = $('#minutos_p1').val();
	  var lminutos_r1 = $('#minutos_r1').val();

      var lminutos_cum1=lminutos_r1/lminutos_p1;
	  
	  $("#minutos_cum1").val(number_format(lminutos_cum1, 2));

//

     var lminutos_p2 = $('#minutos_p2').val();
 	 var lminutos_r2 = $('#minutos_r2').val();

     var lminutos_cum2=lminutos_r2/lminutos_p2;
 	  
 	 $("#minutos_cum2").val(number_format(lminutos_cum2, 2));
	  
//

     var lminutos_p3 = $('#minutos_p3').val();
	 var lminutos_r3 = $('#minutos_r3').val();

       var lminutos_cum3=lminutos_r3/lminutos_p3;
	  
	  $("#minutos_cum3").val(number_format(lminutos_cum3, 2));

	  //

      var lminutos_p4 = $('#minutos_p4').val();
 	 var lminutos_r4 = $('#minutos_r4').val();

        var lminutos_cum4=lminutos_r4/lminutos_p4;
 	  
 	  $("#minutos_cum4").val(number_format(lminutos_cum4, 2));       	 

//
var lminutos_p5 = $('#minutos_p5').val();
 	 var lminutos_r5 = $('#minutos_r5').val();

        var lminutos_cum5=lminutos_r5/lminutos_p5;
 	  
 	  $("#minutos_cum5").val(number_format(lminutos_cum5, 2));    

 	  //


//
var lminutos_p6 = $('#minutos_p6').val();
 	 var lminutos_r6 = $('#minutos_r6').val();

        var lminutos_cum6=lminutos_r6/lminutos_p6;
 	  
 	  $("#minutos_cum6").val(number_format(lminutos_cum6, 2));    

 	  //
 	  
 	  //
var lminutos_p7 = $('#minutos_p7').val();
 	 var lminutos_r7 = $('#minutos_r7').val();

        var lminutos_cum7=lminutos_r7/lminutos_p7;
 	  
 	  $("#minutos_cum7").val(number_format(lminutos_cum7, 2));    

 	  //
var  lminutos_ptot=parseInt(lminutos_p1)+parseInt(lminutos_p2)+parseInt(lminutos_p3)+parseInt(lminutos_p4)+parseInt(lminutos_p5)+parseInt(lminutos_p6)+parseInt(lminutos_p7);

$("#minutos_ptot").val(lminutos_ptot); 


var  lminutos_rtot=parseInt(lminutos_r1)+parseInt(lminutos_r2)+parseInt(lminutos_r3)+parseInt(lminutos_r4)+parseInt(lminutos_r5)+parseInt(lminutos_r6)+parseInt(lminutos_r7);

$("#minutos_rtot").val(lminutos_rtot); 


var lminutos_tot=lminutos_rtot/lminutos_ptot;


$("#minutos_tot").val(lminutos_tot);


var lminutos_pprom=lminutos_ptot/7;


$("#minutos_pprom").val(lminutos_pprom);


var lminutos_rprom=lminutos_rtot/7;


$("#minutos_rprom").val(lminutos_rprom);


var lminutos_prom=lminutos_rprom/lminutos_pprom;


$("#minutos_prom").val(lminutos_prom);   


////tiempo aire por hora


var ltAire_p1 = $('#tAire_p1').val();
var ltAire_r1 = $('#tAire_r1').val();

var ltAire_cum1=ltAire_r1/ltAire_p1;

$("#tAire_cum1").val(number_format(ltAire_cum1, 2));

//

var ltAire_p2 = $('#tAire_p2').val();
var ltAire_r2 = $('#tAire_r2').val();

var ltAire_cum2=ltAire_r2/ltAire_p2;
 
$("#tAire_cum2").val(number_format(ltAire_cum2, 2));

//

var ltAire_p3 = $('#tAire_p3').val();
var ltAire_r3 = $('#tAire_r3').val();

 var ltAire_cum3=ltAire_r3/ltAire_p3;

$("#tAire_cum3").val(number_format(ltAire_cum3, 2));

//

var ltAire_p4 = $('#tAire_p4').val();
var ltAire_r4 = $('#tAire_r4').val();

  var ltAire_cum4=ltAire_r4/ltAire_p4;
 
 $("#tAire_cum4").val(number_format(ltAire_cum4, 2));       	 

//
var ltAire_p5 = $('#tAire_p5').val();
var ltAire_r5 = $('#tAire_r5').val();

  var ltAire_cum5=ltAire_r5/ltAire_p5;
 
 $("#tAire_cum5").val(number_format(ltAire_cum5, 2));    

 //


//
var ltAire_p6 = $('#tAire_p6').val();
var ltAire_r6 = $('#tAire_r6').val();

  var ltAire_cum6=ltAire_r6/ltAire_p6;
 
 $("#tAire_cum6").val(number_format(ltAire_cum6, 2));    

 //
 
 //
var ltAire_p7 = $('#tAire_p7').val();
var ltAire_r7 = $('#tAire_r7').val();

  var ltAire_cum7=ltAire_r7/ltAire_p7;
 
 $("#tAire_cum7").val(number_format(ltAire_cum7, 2));    

 //
var  ltAire_ptot=parseInt(ltAire_p1)+parseInt(ltAire_p2)+parseInt(ltAire_p3)+parseInt(ltAire_p4)+parseInt(ltAire_p5)+parseInt(ltAire_p6)+parseInt(ltAire_p7);

$("#tAire_ptot").val(ltAire_ptot); 


var  ltAire_rtot=parseInt(ltAire_r1)+parseInt(ltAire_r2)+parseInt(ltAire_r3)+parseInt(ltAire_r4)+parseInt(ltAire_r5)+parseInt(ltAire_r6)+parseInt(ltAire_r7);

$("#tAire_rtot").val(ltAire_rtot); 


var ltAire_tot=ltAire_rtot/ltAire_ptot;


$("#tAire_tot").val(ltAire_tot);


var ltAire_pprom=ltAire_ptot/7;


$("#tAire_pprom").val(ltAire_pprom);


var ltAire_rprom=ltAire_rtot/7;


$("#tAire_rprom").val(ltAire_rprom);


var ltAire_prom=ltAire_rprom/ltAire_pprom;


$("#tAire_prom").val(ltAire_prom);   






//costo telefonia


var lcostoTel_p1 = $('#costoTel_p1').val();
var lcostoTel_r1 = $('#costoTel_r1').val();

var lcostoTel_cum1=lcostoTel_r1/lcostoTel_p1;

$("#costoTel_cum1").val(number_format(lcostoTel_cum1, 2));

//

var lcostoTel_p2 = $('#costoTel_p2').val();
var lcostoTel_r2 = $('#costoTel_r2').val();

var lcostoTel_cum2=lcostoTel_r2/lcostoTel_p2;

$("#costoTel_cum2").val(number_format(lcostoTel_cum2, 2));

//

var lcostoTel_p3 = $('#costoTel_p3').val();
var lcostoTel_r3 = $('#costoTel_r3').val();

var lcostoTel_cum3=lcostoTel_r3/lcostoTel_p3;

$("#costoTel_cum3").val(number_format(lcostoTel_cum3, 2));

//

var lcostoTel_p4 = $('#costoTel_p4').val();
var lcostoTel_r4 = $('#costoTel_r4').val();

 var lcostoTel_cum4=lcostoTel_r4/lcostoTel_p4;

$("#costoTel_cum4").val(number_format(lcostoTel_cum4, 2));       	 

//
var lcostoTel_p5 = $('#costoTel_p5').val();
var lcostoTel_r5 = $('#costoTel_r5').val();

 var lcostoTel_cum5=lcostoTel_r5/lcostoTel_p5;

$("#costoTel_cum5").val(number_format(lcostoTel_cum5, 2));    

//


//
var lcostoTel_p6 = $('#costoTel_p6').val();
var lcostoTel_r6 = $('#costoTel_r6').val();

 var lcostoTel_cum6=lcostoTel_r6/lcostoTel_p6;

$("#costoTel_cum6").val(number_format(lcostoTel_cum6, 2));    

//

//
var lcostoTel_p7 = $('#costoTel_p7').val();
var lcostoTel_r7 = $('#costoTel_r7').val();

 var lcostoTel_cum7=lcostoTel_r7/lcostoTel_p7;

$("#costoTel_cum7").val(number_format(lcostoTel_cum7, 2));    

//
var  lcostoTel_ptot=parseInt(lcostoTel_p1)+parseInt(lcostoTel_p2)+parseInt(lcostoTel_p3)+parseInt(lcostoTel_p4)+parseInt(lcostoTel_p5)+parseInt(lcostoTel_p6)+parseInt(lcostoTel_p7);

$("#costoTel_ptot").val(lcostoTel_ptot); 


var  lcostoTel_rtot=parseInt(lcostoTel_r1)+parseInt(lcostoTel_r2)+parseInt(lcostoTel_r3)+parseInt(lcostoTel_r4)+parseInt(lcostoTel_r5)+parseInt(lcostoTel_r6)+parseInt(lcostoTel_r7);

$("#costoTel_rtot").val(lcostoTel_rtot); 


var lcostoTel_tot=lcostoTel_rtot/lcostoTel_ptot;


$("#costoTel_tot").val(lcostoTel_tot);


var lcostoTel_pprom=lcostoTel_ptot/7;


$("#costoTel_pprom").val(lcostoTel_pprom);


var lcostoTel_rprom=lcostoTel_rtot/7;


$("#costoTel_rprom").val(lcostoTel_rprom);


var lcostoTel_prom=lcostoTel_rprom/lcostoTel_pprom;


$("#costoTel_prom").val(lcostoTel_prom);   




//carteo por dia


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


//
var lcarteo_p6 = $('#carteo_p6').val();
var lcarteo_r6 = $('#carteo_r6').val();

 var lcarteo_cum6=lcarteo_r6/lcarteo_p6;

$("#carteo_cum6").val(number_format(lcarteo_cum6, 2));    

//

//
var lcarteo_p7 = $('#carteo_p7').val();
var lcarteo_r7 = $('#carteo_r7').val();

 var lcarteo_cum7=lcarteo_r7/lcarteo_p7;

$("#carteo_cum7").val(number_format(lcarteo_cum7, 2));    

//
var  lcarteo_ptot=parseInt(lcarteo_p1)+parseInt(lcarteo_p2)+parseInt(lcarteo_p3)+parseInt(lcarteo_p4)+parseInt(lcarteo_p5)+parseInt(lcarteo_p6)+parseInt(lcarteo_p7);

$("#carteo_ptot").val(lcarteo_ptot); 


var  lcarteo_rtot=parseInt(lcarteo_r1)+parseInt(lcarteo_r2)+parseInt(lcarteo_r3)+parseInt(lcarteo_r4)+parseInt(lcarteo_r5)+parseInt(lcarteo_r6)+parseInt(lcarteo_r7);

$("#carteo_rtot").val(lcarteo_rtot); 


var lcarteo_tot=lcarteo_rtot/lcarteo_ptot;


$("#carteo_tot").val(lcarteo_tot);


var lcarteo_pprom=lcarteo_ptot/7;


$("#carteo_pprom").val(lcarteo_pprom);


var lcarteo_rprom=lcarteo_rtot/7;


$("#carteo_rprom").val(lcarteo_rprom);


var lcarteo_prom=lcarteo_rprom/lcarteo_pprom;


$("#carteo_prom").val(lcarteo_prom);  




//costo de carteo


var lcarteoCos_p1 = $('#carteoCos_p1').val();
var lcarteoCos_r1 = $('#carteoCos_r1').val();

var lcarteoCos_cum1=lcarteoCos_r1/lcarteoCos_p1;

$("#carteoCos_cum1").val(number_format(lcarteoCos_cum1, 2));

//

var lcarteoCos_p2 = $('#carteoCos_p2').val();
var lcarteoCos_r2 = $('#carteoCos_r2').val();

var lcarteoCos_cum2=lcarteoCos_r2/lcarteoCos_p2;

$("#carteoCos_cum2").val(number_format(lcarteoCos_cum2, 2));

//

var lcarteoCos_p3 = $('#carteoCos_p3').val();
var lcarteoCos_r3 = $('#carteoCos_r3').val();

var lcarteoCos_cum3=lcarteoCos_r3/lcarteoCos_p3;

$("#carteoCos_cum3").val(number_format(lcarteoCos_cum3, 2));

//

var lcarteoCos_p4 = $('#carteoCos_p4').val();
var lcarteoCos_r4 = $('#carteoCos_r4').val();

 var lcarteoCos_cum4=lcarteoCos_r4/lcarteoCos_p4;

$("#carteoCos_cum4").val(number_format(lcarteoCos_cum4, 2));       	 

//
var lcarteoCos_p5 = $('#carteoCos_p5').val();
var lcarteoCos_r5 = $('#carteoCos_r5').val();

 var lcarteoCos_cum5=lcarteoCos_r5/lcarteoCos_p5;

$("#carteoCos_cum5").val(number_format(lcarteoCos_cum5, 2));    

//


//
var lcarteoCos_p6 = $('#carteoCos_p6').val();
var lcarteoCos_r6 = $('#carteoCos_r6').val();

 var lcarteoCos_cum6=lcarteoCos_r6/lcarteoCos_p6;

$("#carteoCos_cum6").val(number_format(lcarteoCos_cum6, 2));    

//

//
var lcarteoCos_p7 = $('#carteoCos_p7').val();
var lcarteoCos_r7 = $('#carteoCos_r7').val();

 var lcarteoCos_cum7=lcarteoCos_r7/lcarteoCos_p7;

$("#carteoCos_cum7").val(number_format(lcarteoCos_cum7, 2));    

//
var  lcarteoCos_ptot=parseInt(lcarteoCos_p1)+parseInt(lcarteoCos_p2)+parseInt(lcarteoCos_p3)+parseInt(lcarteoCos_p4)+parseInt(lcarteoCos_p5)+parseInt(lcarteoCos_p6)+parseInt(lcarteoCos_p7);

$("#carteoCos_ptot").val(lcarteoCos_ptot); 


var  lcarteoCos_rtot=parseInt(lcarteoCos_r1)+parseInt(lcarteoCos_r2)+parseInt(lcarteoCos_r3)+parseInt(lcarteoCos_r4)+parseInt(lcarteoCos_r5)+parseInt(lcarteoCos_r6)+parseInt(lcarteoCos_r7);

$("#carteoCos_rtot").val(lcarteoCos_rtot); 


var lcarteoCos_tot=lcarteoCos_rtot/lcarteoCos_ptot;


$("#carteoCos_tot").val(lcarteoCos_tot);


var lcarteoCos_pprom=lcarteoCos_ptot/7;


$("#carteoCos_pprom").val(lcarteoCos_pprom);


var lcarteoCos_rprom=lcarteoCos_rtot/7;


$("#carteoCos_rprom").val(lcarteoCos_rprom);


var lcarteoCos_prom=lcarteoCos_rprom/lcarteoCos_pprom;


$("#carteoCos_prom").val(lcarteoCos_prom);   



/////visitas



var lvisitas_p1 = $('#visitas_p1').val();
var lvisitas_r1 = $('#visitas_r1').val();

var lvisitas_cum1=lvisitas_r1/lvisitas_p1;

$("#visitas_cum1").val(number_format(lvisitas_cum1, 2));

//

var lvisitas_p2 = $('#visitas_p2').val();
var lvisitas_r2 = $('#visitas_r2').val();

var lvisitas_cum2=lvisitas_r2/lvisitas_p2;

$("#visitas_cum2").val(number_format(lvisitas_cum2, 2));

//

var lvisitas_p3 = $('#visitas_p3').val();
var lvisitas_r3 = $('#visitas_r3').val();

var lvisitas_cum3=lvisitas_r3/lvisitas_p3;

$("#visitas_cum3").val(number_format(lvisitas_cum3, 2));

//

var lvisitas_p4 = $('#visitas_p4').val();
var lvisitas_r4 = $('#visitas_r4').val();

var lvisitas_cum4=lvisitas_r4/lvisitas_p4;

$("#visitas_cum4").val(number_format(lvisitas_cum4, 2));       	 

//
var lvisitas_p5 = $('#visitas_p5').val();
var lvisitas_r5 = $('#visitas_r5').val();

var lvisitas_cum5=lvisitas_r5/lvisitas_p5;

$("#visitas_cum5").val(number_format(lvisitas_cum5, 2));    

//


//
var lvisitas_p6 = $('#visitas_p6').val();
var lvisitas_r6 = $('#visitas_r6').val();

var lvisitas_cum6=lvisitas_r6/lvisitas_p6;

$("#visitas_cum6").val(number_format(lvisitas_cum6, 2));    

//

//
var lvisitas_p7 = $('#visitas_p7').val();
var lvisitas_r7 = $('#visitas_r7').val();

var lvisitas_cum7=lvisitas_r7/lvisitas_p7;

$("#visitas_cum7").val(number_format(lvisitas_cum7, 2));    

//
var  lvisitas_ptot=parseInt(lvisitas_p1)+parseInt(lvisitas_p2)+parseInt(lvisitas_p3)+parseInt(lvisitas_p4)+parseInt(lvisitas_p5)+parseInt(lvisitas_p6)+parseInt(lvisitas_p7);

$("#visitas_ptot").val(lvisitas_ptot); 


var  lvisitas_rtot=parseInt(lvisitas_r1)+parseInt(lvisitas_r2)+parseInt(lvisitas_r3)+parseInt(lvisitas_r4)+parseInt(lvisitas_r5)+parseInt(lvisitas_r6)+parseInt(lvisitas_r7);

$("#visitas_rtot").val(lvisitas_rtot); 


var lvisitas_tot=lvisitas_rtot/lvisitas_ptot;


$("#visitas_tot").val(lvisitas_tot);


var lvisitas_pprom=lvisitas_ptot/7;


$("#visitas_pprom").val(lvisitas_pprom);


var lvisitas_rprom=lvisitas_rtot/7;


$("#visitas_rprom").val(lvisitas_rprom);


var lvisitas_prom=lvisitas_rprom/lvisitas_pprom;


$("#visitas_prom").val(lvisitas_prom); 




//costo de visitas



var lvisitasCos_p1 = $('#visitasCos_p1').val();
var lvisitasCos_r1 = $('#visitasCos_r1').val();

var lvisitasCos_cum1=lvisitasCos_r1/lvisitasCos_p1;

$("#visitasCos_cum1").val(number_format(lvisitasCos_cum1, 2));

//

var lvisitasCos_p2 = $('#visitasCos_p2').val();
var lvisitasCos_r2 = $('#visitasCos_r2').val();

var lvisitasCos_cum2=lvisitasCos_r2/lvisitasCos_p2;

$("#visitasCos_cum2").val(number_format(lvisitasCos_cum2, 2));

//

var lvisitasCos_p3 = $('#visitasCos_p3').val();
var lvisitasCos_r3 = $('#visitasCos_r3').val();

var lvisitasCos_cum3=lvisitasCos_r3/lvisitasCos_p3;

$("#visitasCos_cum3").val(number_format(lvisitasCos_cum3, 2));

//

var lvisitasCos_p4 = $('#visitasCos_p4').val();
var lvisitasCos_r4 = $('#visitasCos_r4').val();

 var lvisitasCos_cum4=lvisitasCos_r4/lvisitasCos_p4;

$("#visitasCos_cum4").val(number_format(lvisitasCos_cum4, 2));       	 

//
var lvisitasCos_p5 = $('#visitasCos_p5').val();
var lvisitasCos_r5 = $('#visitasCos_r5').val();

 var lvisitasCos_cum5=lvisitasCos_r5/lvisitasCos_p5;

$("#visitasCos_cum5").val(number_format(lvisitasCos_cum5, 2));    

//


//
var lvisitasCos_p6 = $('#visitasCos_p6').val();
var lvisitasCos_r6 = $('#visitasCos_r6').val();

 var lvisitasCos_cum6=lvisitasCos_r6/lvisitasCos_p6;

$("#visitasCos_cum6").val(number_format(lvisitasCos_cum6, 2));    

//

//
var lvisitasCos_p7 = $('#visitasCos_p7').val();
var lvisitasCos_r7 = $('#visitasCos_r7').val();

 var lvisitasCos_cum7=lvisitasCos_r7/lvisitasCos_p7;

$("#visitasCos_cum7").val(number_format(lvisitasCos_cum7, 2));    

//
var  lvisitasCos_ptot=parseInt(lvisitasCos_p1)+parseInt(lvisitasCos_p2)+parseInt(lvisitasCos_p3)+parseInt(lvisitasCos_p4)+parseInt(lvisitasCos_p5)+parseInt(lvisitasCos_p6)+parseInt(lvisitasCos_p7);

$("#visitasCos_ptot").val(lvisitasCos_ptot); 


var  lvisitasCos_rtot=parseInt(lvisitasCos_r1)+parseInt(lvisitasCos_r2)+parseInt(lvisitasCos_r3)+parseInt(lvisitasCos_r4)+parseInt(lvisitasCos_r5)+parseInt(lvisitasCos_r6)+parseInt(lvisitasCos_r7);

$("#visitasCos_rtot").val(lvisitasCos_rtot); 


var lvisitasCos_tot=lvisitasCos_rtot/lvisitasCos_ptot;


$("#visitasCos_tot").val(lvisitasCos_tot);


var lvisitasCos_pprom=lvisitasCos_ptot/7;


$("#visitasCos_pprom").val(lvisitasCos_pprom);


var lvisitasCos_rprom=lvisitasCos_rtot/7;


$("#visitasCos_rprom").val(lvisitasCos_rprom);


var lvisitasCos_prom=lvisitasCos_rprom/lvisitasCos_pprom;


$("#visitasCos_prom").val(lvisitasCos_prom);  



///contacto positivo


var lconPositivo_p1 = $('#conPositivo_p1').val();
var lconPositivo_r1 = $('#conPositivo_r1').val();

var lconPositivo_cum1=lconPositivo_r1/lconPositivo_p1;

$("#conPositivo_cum1").val(number_format(lconPositivo_cum1, 2));

//

var lconPositivo_p2 = $('#conPositivo_p2').val();
var lconPositivo_r2 = $('#conPositivo_r2').val();

var lconPositivo_cum2=lconPositivo_r2/lconPositivo_p2;
 
$("#conPositivo_cum2").val(number_format(lconPositivo_cum2, 2));

//

var lconPositivo_p3 = $('#conPositivo_p3').val();
var lconPositivo_r3 = $('#conPositivo_r3').val();

 var lconPositivo_cum3=lconPositivo_r3/lconPositivo_p3;

$("#conPositivo_cum3").val(number_format(lconPositivo_cum3, 2));

//

var lconPositivo_p4 = $('#conPositivo_p4').val();
var lconPositivo_r4 = $('#conPositivo_r4').val();

  var lconPositivo_cum4=lconPositivo_r4/lconPositivo_p4;
 
 $("#conPositivo_cum4").val(number_format(lconPositivo_cum4, 2));       	 

//
var lconPositivo_p5 = $('#conPositivo_p5').val();
var lconPositivo_r5 = $('#conPositivo_r5').val();

  var lconPositivo_cum5=lconPositivo_r5/lconPositivo_p5;
 
 $("#conPositivo_cum5").val(number_format(lconPositivo_cum5, 2));    

 //


//
var lconPositivo_p6 = $('#conPositivo_p6').val();
var lconPositivo_r6 = $('#conPositivo_r6').val();

  var lconPositivo_cum6=lconPositivo_r6/lconPositivo_p6;
 
 $("#conPositivo_cum6").val(number_format(lconPositivo_cum6, 2));    

 //
 
 //
var lconPositivo_p7 = $('#conPositivo_p7').val();
var lconPositivo_r7 = $('#conPositivo_r7').val();

  var lconPositivo_cum7=lconPositivo_r7/lconPositivo_p7;
 
 $("#conPositivo_cum7").val(number_format(lconPositivo_cum7, 2));    

 //
var  lconPositivo_ptot=parseInt(lconPositivo_p1)+parseInt(lconPositivo_p2)+parseInt(lconPositivo_p3)+parseInt(lconPositivo_p4)+parseInt(lconPositivo_p5)+parseInt(lconPositivo_p6)+parseInt(lconPositivo_p7);

$("#conPositivo_ptot").val(lconPositivo_ptot); 


var  lconPositivo_rtot=parseInt(lconPositivo_r1)+parseInt(lconPositivo_r2)+parseInt(lconPositivo_r3)+parseInt(lconPositivo_r4)+parseInt(lconPositivo_r5)+parseInt(lconPositivo_r6)+parseInt(lconPositivo_r7);

$("#conPositivo_rtot").val(lconPositivo_rtot); 


var lconPositivo_tot=lconPositivo_rtot/lconPositivo_ptot;


$("#conPositivo_tot").val(lconPositivo_tot);


var lconPositivo_pprom=lconPositivo_ptot/7;


$("#conPositivo_pprom").val(lconPositivo_pprom);


var lconPositivo_rprom=lconPositivo_rtot/7;


$("#conPositivo_rprom").val(lconPositivo_rprom);


var lconPositivo_prom=lconPositivo_rprom/lconPositivo_pprom;


$("#conPositivo_prom").val(lconPositivo_prom);  


/////contacto negativo



var lconNegativo_p1 = $('#conNegativo_p1').val();
var lconNegativo_r1 = $('#conNegativo_r1').val();

var lconNegativo_cum1=lconNegativo_r1/lconNegativo_p1;

$("#conNegativo_cum1").val(number_format(lconNegativo_cum1, 2));

//

var lconNegativo_p2 = $('#conNegativo_p2').val();
var lconNegativo_r2 = $('#conNegativo_r2').val();

var lconNegativo_cum2=lconNegativo_r2/lconNegativo_p2;
 
$("#conNegativo_cum2").val(number_format(lconNegativo_cum2, 2));

//

var lconNegativo_p3 = $('#conNegativo_p3').val();
var lconNegativo_r3 = $('#conNegativo_r3').val();

 var lconNegativo_cum3=lconNegativo_r3/lconNegativo_p3;

$("#conNegativo_cum3").val(number_format(lconNegativo_cum3, 2));

//

var lconNegativo_p4 = $('#conNegativo_p4').val();
var lconNegativo_r4 = $('#conNegativo_r4').val();

  var lconNegativo_cum4=lconNegativo_r4/lconNegativo_p4;
 
 $("#conNegativo_cum4").val(number_format(lconNegativo_cum4, 2));       	 

//
var lconNegativo_p5 = $('#conNegativo_p5').val();
var lconNegativo_r5 = $('#conNegativo_r5').val();

  var lconNegativo_cum5=lconNegativo_r5/lconNegativo_p5;
 
 $("#conNegativo_cum5").val(number_format(lconNegativo_cum5, 2));    

 //


//
var lconNegativo_p6 = $('#conNegativo_p6').val();
var lconNegativo_r6 = $('#conNegativo_r6').val();

  var lconNegativo_cum6=lconNegativo_r6/lconNegativo_p6;
 
 $("#conNegativo_cum6").val(number_format(lconNegativo_cum6, 2));    

 //
 
 //
var lconNegativo_p7 = $('#conNegativo_p7').val();
var lconNegativo_r7 = $('#conNegativo_r7').val();

  var lconNegativo_cum7=lconNegativo_r7/lconNegativo_p7;
 
 $("#conNegativo_cum7").val(number_format(lconNegativo_cum7, 2));    

 //
var  lconNegativo_ptot=parseInt(lconNegativo_p1)+parseInt(lconNegativo_p2)+parseInt(lconNegativo_p3)+parseInt(lconNegativo_p4)+parseInt(lconNegativo_p5)+parseInt(lconNegativo_p6)+parseInt(lconNegativo_p7);

$("#conNegativo_ptot").val(lconNegativo_ptot); 


var  lconNegativo_rtot=parseInt(lconNegativo_r1)+parseInt(lconNegativo_r2)+parseInt(lconNegativo_r3)+parseInt(lconNegativo_r4)+parseInt(lconNegativo_r5)+parseInt(lconNegativo_r6)+parseInt(lconNegativo_r7);

$("#conNegativo_rtot").val(lconNegativo_rtot); 


var lconNegativo_tot=lconNegativo_rtot/lconNegativo_ptot;


$("#conNegativo_tot").val(lconNegativo_tot);


var lconNegativo_pprom=lconNegativo_ptot/7;


$("#conNegativo_pprom").val(lconNegativo_pprom);


var lconNegativo_rprom=lconNegativo_rtot/7;


$("#conNegativo_rprom").val(lconNegativo_rprom);


var lconNegativo_prom=lconNegativo_rprom/lconNegativo_pprom;


$("#conNegativo_prom").val(lconNegativo_prom);   


//////datos


var ldatos_p1 = $('#datos_p1').val();
var ldatos_r1 = $('#datos_r1').val();

var ldatos_cum1=ldatos_r1/ldatos_p1;

$("#datos_cum1").val(number_format(ldatos_cum1, 2));

//

var ldatos_p2 = $('#datos_p2').val();
var ldatos_r2 = $('#datos_r2').val();

var ldatos_cum2=ldatos_r2/ldatos_p2;
 
$("#datos_cum2").val(number_format(ldatos_cum2, 2));

//

var ldatos_p3 = $('#datos_p3').val();
var ldatos_r3 = $('#datos_r3').val();

 var ldatos_cum3=ldatos_r3/ldatos_p3;

$("#datos_cum3").val(number_format(ldatos_cum3, 2));

//

var ldatos_p4 = $('#datos_p4').val();
var ldatos_r4 = $('#datos_r4').val();

  var ldatos_cum4=ldatos_r4/ldatos_p4;
 
 $("#datos_cum4").val(number_format(ldatos_cum4, 2));       	 

//
var ldatos_p5 = $('#datos_p5').val();
var ldatos_r5 = $('#datos_r5').val();

  var ldatos_cum5=ldatos_r5/ldatos_p5;
 
 $("#datos_cum5").val(number_format(ldatos_cum5, 2));    

 //


//
var ldatos_p6 = $('#datos_p6').val();
var ldatos_r6 = $('#datos_r6').val();

  var ldatos_cum6=ldatos_r6/ldatos_p6;
 
 $("#datos_cum6").val(number_format(ldatos_cum6, 2));    

 //
 
 //
var ldatos_p7 = $('#datos_p7').val();
var ldatos_r7 = $('#datos_r7').val();

  var ldatos_cum7=ldatos_r7/ldatos_p7;
 
 $("#datos_cum7").val(number_format(ldatos_cum7, 2));    

 //
var  ldatos_ptot=parseInt(ldatos_p1)+parseInt(ldatos_p2)+parseInt(ldatos_p3)+parseInt(ldatos_p4)+parseInt(ldatos_p5)+parseInt(ldatos_p6)+parseInt(ldatos_p7);

$("#datos_ptot").val(ldatos_ptot); 


var  ldatos_rtot=parseInt(ldatos_r1)+parseInt(ldatos_r2)+parseInt(ldatos_r3)+parseInt(ldatos_r4)+parseInt(ldatos_r5)+parseInt(ldatos_r6)+parseInt(ldatos_r7);

$("#datos_rtot").val(ldatos_rtot); 


var ldatos_tot=ldatos_rtot/ldatos_ptot;


$("#datos_tot").val(ldatos_tot);


var ldatos_pprom=ldatos_ptot/7;


$("#datos_pprom").val(ldatos_pprom);


var ldatos_rprom=ldatos_rtot/7;


$("#datos_rprom").val(ldatos_rprom);


var ldatos_prom=ldatos_rprom/ldatos_pprom;


$("#datos_prom").val(ldatos_prom);  


          });
          
    </script>
        
 

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
            url: '<?= base_url() ?>planMaestro/EditDiario',
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
	
	
	
	 <script>
  $(function() {
    $( "#datepickerFecha" ).datepicker({ dateFormat: 'yy/mm/dd' });
  });
  </script>
	