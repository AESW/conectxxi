<link rel='stylesheet' type='text/css' href='<?php echo HOME_URL; ?>assets/js/jqueryui.css' /> 
<link rel="stylesheet" type="text/css" href="<?php echo HOME_URL; ?>assets/css/plugins/jquery-alertify/alertify.core.css" />
<link rel="stylesheet" type="text/css" href="<?php echo HOME_URL; ?>assets/css/plugins/jquery-alertify/alertify.default.css" />


<script type='text/javascript' src='<?php echo HOME_URL; ?>assets/js/jquery.min.js'></script>
<script type='text/javascript' src='<?php echo HOME_URL; ?>assets/js/bootstrap.min.js'></script>
<script type='text/javascript' src='<?php echo HOME_URL; ?>assets/js/jquery-1.10.2.min.js'></script> 
<script type='text/javascript' src='<?php echo HOME_URL; ?>assets/js/jqueryui-1.10.3.min.js'></script> 
<script type='text/javascript' src='<?php echo HOME_URL; ?>assets/plugins/form-validation/jquery.validate.min.js'></script> 
<script type='text/javascript' src='<?php echo HOME_URL; ?>assets/plugins/jquery-alertify/jquery.alertify.min.js'></script>
<script type='text/javascript' src='<?php echo HOME_URL; ?>assets/plugins/jquery-blockUI/jquery.blockUI.js'></script>  

 <style type="text/css">
      input.form-control{
font-family: Arial; font-size: 9pt; background-color: #00FF00"
}  
        
    
		</style>
        
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
        
			
			    <h2><label>.</label></h2>
			    
			  
			      <form class="form-horizontal" id="generales" >
    
      <?php 
      
     
      
      
	                                                      
	                                                if( !empty($PlanMaestro) ):    
	                                                    foreach($PlanMaestro as  $t){ 

$portafolioA=$t->portdesc;

$id=$t->id;

?>
     <input type="hidden" class="form-control" id="id" name="id" value="<?php echo $id?>"/>
    <?php 
	                                                
	                                                   
	                                                if( !empty($DiasLaborales) ):    
	                                                    foreach($DiasLaborales as  $v){ 

$tdiaslab=$v->parametro;


?>
                           <input type="hidden" class="form-control" id="diaslab" name="diaslab" value="<?php echo $v->parametro?>"/>
                           
                             <?php 
	                                                   
	                                                    } 
	                                                    endif;
	                                                    
	                                                    if( !empty($Parametros) ):
	                                                    foreach($Parametros as  $v){ 
	                                                                               
	                                                                               
	                                                                               
	                                                                               if ($v->valor == "COSTO POR PERSONA") {
	                                                                               	?>
     <input type="hidden" class="form-control" id="costo_persona" name="costo_persona" value="<?php echo $v->parametro?>"/>
     <?php 
} elseif ($v->valor == "TELEFONIA") {
	?>
      <input type="hidden" class="form-control" id="telefonia" name="telefonia" value="<?php echo $v->parametro?>"/>
      <?php
} elseif ($v->valor == "BLASTER A FIJO") {
	?>
   <input type="hidden" class="form-control" id="blasterfijo" name="blasterfijo" value="<?php echo $v->parametro?>"/>
   <?php
}elseif ($v->valor == "BLASTER A MOVIL") {
	?>
    <input type="hidden" class="form-control" id="blastermovil" name="blastermovil" value="<?php echo $v->parametro?>"/>
    <?php
}elseif ($v->valor == "CARTEO") {
	?>
      <input type="hidden" class="form-control" id="carteo" name="carteo" value="<?php echo $v->parametro?>"/>
      <?php
}elseif ($v->valor == "VISITAS") {
	?>
     <input type="hidden" class="form-control" id="visitas" name="visitas" value="<?php echo $v->parametro?>"/>
     <?php
}elseif ($v->valor == "SMS") {
	?>
     <input type="hidden" class="form-control" id="sms" name="sms" value="<?php echo $v->parametro?>"/>
     <?php
}
                   
	                                                    	                                                    } 
	                                                    	                                                    endif;
	                                                    
	                                                    
	                                                    
	                                                ?>
          
        
              		   <table cellpadding="0" cellspacing="0" border="0"
												class="table   "   >
    
    <thead>
    
    
    	<tr>
														<th >Portafolio:</th>
														<th >Periodo:</th>
														<th >Responsable:</th>
														<th >Fecha:</th>
														
													
													
															
													</tr>
    
    	<tr>
														<th ><select class="form-control" id="portafolio" name="portafolio"> 
                                     <option value="<?php echo $t->portafolio?>" /><?php echo $t->portdesc?>                  
                            <?php 
	                                                    
	                                                   
	                                                if( !empty($Portafolio) ):    
	                                                    foreach($Portafolio as  $v){ ?>
                           
                            <option value="<?php echo $v->id?>" /><?php echo $v->valor?>
                             <?php 
	                                                 
	                                                    } 
	                                                    endif;
	                                                ?>                          
                            
              </select></th>
														<th > <select class="form-control" id="periodo" name="periodo"> 
                    <option value="<?php echo $t->periodo?>" /><?php echo $t->periodo?>                    
                           <?php 
	                                                  
	                                                   
	                                                if( !empty($Periodo) ):    
	                                                    foreach($Periodo as  $v){ ?>
                           
                            <option value="<?php echo $v->valor?>" /><?php echo $v->valor?>
                             <?php 
	                                                    
	                                                    } 
	                                                    endif;
	                                                ?>
                            
                          
                            
              </select></th>
														<th ><select class="form-control" id="responsable" name="responsable">
                     <option value="<?php echo $t->responsable?>" /><?php echo $t->responsable?>                    
                            <?php 
	                                                   
	                                                   
	                                                if( !empty($Responsable) ):    
	                                                    foreach($Responsable as  $v){ ?>
                           
                            <option value="<?php echo $v->valor?>" /><?php echo $v->valor?>
                             <?php 
	                                                    
	                                                    } 
	                                                    endif;
	                                                ?>	
                   
                            
                            
                          
                            
              </select></th>
												        <th style='width:16%;'>
                   <div class="input-group">
                        <input type="text" class="form-control" id="datepickerFecha"
															name="datepickerFecha" value="<?php echo $t->fecha?>"/>
                      <span class="input-group-addon" id="datepickerbtn2"><i class="glyphicon glyphicon-calendar"></i></span>
                    </div>
                    
               </th>
													
															
													</tr>
 </thead>
    </table>
						  
						     <?php 
	                                                   
	                                                    } 
	                                                    endif;
	                                                ?>    

    
    
      <div >	
			 
		   <div id='display_image'  style='float:left; display:block;width:15%;'> 
			 
			 <div class="form-group">	
    
    
      
            <div class="col-md-12">
           
            
        
             		   <table cellpadding="0" cellspacing="0" border="0"
												class="table table-striped table-bordered "   >
    
    <thead>
    
    
    	<tr>
														<th colspan="6">Resultados Históricos 12 meses</th>
														
													
													
															
													</tr>
    
    	<tr>
														<th colspan="2">Mejor Mes <a id="mejor" name="mejor" href="<?php echo HOME_URL; ?>index.php/PlanMaestro/consultaHistoria/<?php echo $portafolioA; ?>"  class="btn btn-success">Consultar</a></th>
														<th colspan="2">Promedio <a href="#" class="btn btn-success">Consultar</a></th>
														<th colspan="2">Peor Mes <a id="peor" name="peor" href="<?php echo HOME_URL; ?>index.php/PlanMaestro/HistoriaBaja/<?php echo $portafolioA; ?>"   class="btn btn-success">Consultar</a></th>
													
													
															
													</tr>
												</thead>
    <tbody>
                                 
  	                                     
  	                                       
  
    

    
    </tbody>
    </table>
         
    			 
						  
			
    
    </div>
    </div>
    </div>
    
   
     <div id='display_image'  style='margin-left:32%;float:left; display:block;width:25%;'> 
			 
			 <div class="form-group">	
    
    
      
            <div class="col-md-12">
            
            
        
             		   <table cellpadding="0" cellspacing="0" border="0"
												class="table"   >
    
    <thead>
    
    

												</thead>
    <tbody>
                                 
  	                                     
  	                                       
  	                                         <tr class="odd gradeX">
    
    
     <td ><a  data-toggle="modal" href="#ModalPuestoActual"  class="btn btn-success"> <i class="glyphicon glyphicon-plus"></i>
						        <span>Agregar Producto</span></a></td>
						        
						        
 
    <td><a  id="CalcularBtn" class="btn btn-success">Calcular</a></td>
        <td><a  id="ingresarBtn" class="btn btn-success">Guardar</a></td>
        
        
         <td ><a  data-toggle="modal" href="#ModalEliminaProducto"  class="btn btn-success"> <i class="glyphicon glyphicon-minus"></i>
						        <span>Eliminar Producto</span></a></td>
 
 
   
    
    </tr>
    
     <tr class="odd gradeX">
    
    
     <?php 
	                                                   
	                                                if( !empty($PlanMaestro) ):    
	                                                    foreach($PlanMaestro  as $t){ ?>
                        
                           <td >  <a  href="<?php echo HOME_URL; ?>index.php/PlanMaestro/Turno/<?php echo $t->id?>"  class="btn btn-success">Control por Turno</a></td>
                        
                       
                        
                       <td > <a  href="<?php echo HOME_URL; ?>index.php/PlanMaestro/Diario/<?php echo $t->id?>" class="btn btn-success">Diario</a></td>
                        
                    <td ><a  href="<?php echo HOME_URL; ?>index.php/PlanMaestro/Mensual/<?php echo $t->id?>"  class="btn btn-success">Mensual</a></td>
                        
                        
                         <?php 
	                                                    
	                                                    } 
	                                                    endif;
	                                                ?>
    
    
    </tr>
    

    
    </tbody>
    </table>
         
    			 
						  
			
    
    </div>
    </div>
    </div>
 
    
     
    
    		 
						  
	
        </div>  
    
    
    		 		 <div >		  
						     
        
             <div id='display_image'  style='float:left; display:block;'> 
			 
			 <div class="form-group">			  
						     
          
            <div class="col-md-12">
            <div class="alert alert-dismissable alert-info" style='height:5%' >
							ASIGNACION		
										
										
            
							
							</div>
          
        
           
            
         
    			 
						  
						   <table cellpadding="0" cellspacing="0" border="0"
												class="table table-striped table-bordered "   id="table_asignacion">
    
    <thead>
    
    	<tr><th >Producto</th>
											
														<th>Cuentas</th>
														<th>Saldo</th>
														<th>Facturación</th>
														<th>Costo Total</th>
														<th>Utilidad Bruta</th>
													
													
															
													</tr>
												</thead>
    <tbody>
                                 <?php 
  	                                         if( !empty($PlanDetalle) ):    

	                                                    
	                                                    foreach($PlanDetalle as  $t){ 
 $Addproducto = trim($t->producto);
 $frm = str_replace(" ", "", $Addproducto);



?>    
  	                                       
  	                                         <tr class="odd gradeX">
    
    
     <td id="<?php echo $frm?>"  width=170> <select class="productopersonal form-control" id="productopersonal" name="productopersonal">
                   <option value="<?php echo $t->producto?>" /><?php echo $t->producto?>                 
                           
              </select></td>
 
    <td> <input type="text" class="asigcuentas form-control"   name="asigcuentas[]" value="<?php echo $t->cuentas?>"/></td>
    <td> <input type="text" class="asigsaldo form-control"   name="asigsaldo[]" value="<?php echo $t->saldo?>"/></td>
    <td> <input type="text" class="asigfacturacion form-control"   name="asigfacturacion[]" value="<?php echo $t->facturacion?>"/></td>
    
    <td> <input type="text" class="asigcosto form-control" readonly  name="asigcosto" value="<?php echo $t->ctctotal?>"/></td>
    <td> <input type="text" class="asigutilidad form-control"  readonly name="asigutilidad" value="<?php echo $t->utilidad?>"/></td>
  
   
    
    </tr>
    
<?php 
	                                                    
	                                                    } 
	                                                    endif;
	                                                ?>
    
    </tbody>
    </table>
      </div>
    </div>
    </div>
    
    </div>
    
  
		
    
    
			 		 <div >		  
						     
        
             <div id='display_image'  style='float:left; display:block;'> 
			 
			 <div class="form-group">			  
						     
          
            <div class="col-md-12">
            <div class="alert alert-dismissable alert-info" style='height:5%'>
								COSTO DE PERSONAL									
            
										
										
            
							
							</div>
          
        
              <table cellpadding="0" cellspacing="0" width="100%"
												class="table  table-bordered " id="table_personalcosto">
    
    <thead>
													<tr>
														<th  width="15%" rowspan="2" >Producto</th>
													    <th rowspan="2">Acciones</th>
														<th rowspan="2">Cuentas</th>
														<th rowspan="2">Tiempo</th>
														<th rowspan="2">Pronostico</th>
														<th id="tiempo" colspan="2">TIEMPO REQUERIDO</th>
													<th rowspan="2">Personas, dias laborales:<?php echo $tdiaslab?></th>
													
													<th rowspan="2">Costo por persona</th>	
													<th rowspan="2">Costo Personal</th>
													
													</tr>
													
													<tr>
											
													<th headers="tiempo">Horas</th>
													<th headers="tiempo">Turnos</th>
													
													</tr>
												</thead>
    <tbody>
                                 
  	                                              <?php 
	                                                   
	                                                   
	                                                if( !empty($PlanDetalle) ):    
	                                                    foreach($PlanDetalle as  $t){
	                                                    
	                                                     $Addproducto = trim($t->producto);
 $frm = str_replace(" ", "", $Addproducto);
 ?>
	                                                             
                                    <tr class="odd gradeX">
    
                                    
   <td id="<?php echo $frm ?>" width=170><input type="text" class="productouno form-control" readonly  id="productouno" name="productouno" value="<?php echo $t->producto?>"/></td>
    <td> <input type="text" class="cpacciones form-control"  name="cpacciones[]" value="<?php echo $t->cpacciones?>"/></td>
    <td> <input type="text" class="cpcuentas form-control" readonly name="cpcuentas" value="<?php echo $t->cpcuentas?>"/></td>
    <td> <input type="text" class="cptiempo form-control"  name="cptiempo[]" value="<?php echo $t->cptiempo?>"/></td>
    <td> <input type="text" class="cppronostico form-control"  readonly  name="cppronostico" value="<?php echo $t->cppronostico?>"/></td>
    <td> <input type="text" class="cphoras form-control" readonly  name="cphoras" value="<?php echo $t->cphoras?>"/></td>
    <td> <input type="text" class="cpturnos form-control" id="cpturnos" name="cpturnos[]" value="<?php echo $t->cpturnos?>"/></td>
    <td> <input type="text" class="cppersonas form-control" readonly  name="cppersonas" value="<?php echo $t->cppersonas?>"/></td>
    <td> <input type="text" class="cpcosto form-control"  readonly name="cpcosto" value="<?php echo $t->cpcosto?>"/></td>
    <td> <input type="text" class="cptotal form-control" readonly  name="cptotal" value="<?php echo $t->cptotal?>"/></td>
    
      <td style="display:none;">  <input type="hidden" class="iddetalle form-control"  name="iddetalle[]" value="<?php echo $t->id?>"/></td>
    </tr>
    
        <?php 
	                                                    
	                                                    } 
	                                                    endif;
	                                                ?>
    </tbody>
    </table>
      </div>
    </div>
    </div>
    
    </div>
    
			 
			
    
    
      <div >	
			 
		   <div id='display_image'  style='float:left; display:block;width:58%;'> 
			 
			 <div class="form-group">	
    
    
      
            <div class="col-md-12">
            <div class="alert alert-dismissable alert-info" style='height:5%'>
								CARTEO		
            		
										
            
							
							</div>
            
        
             
         
    			 
						  
						   <table cellpadding="0" cellspacing="0" border="0"
												class="table table-striped table-bordered "  id="table_carteo">
    
    <thead>
													<tr>
													<th  >Producto</th>
												<th  >% Alcance</th>
													<th  >Intensidad</th>
														<th >Cartas</th>
														
														<th >Costo Unitario</th>
													<th >Costo</th>
															
													</tr>
												</thead>
    <tbody>
                                 <?php 
	                                                   
	                                                   
	                                                if( !empty($PlanDetalle) ):    
	                                                    foreach($PlanDetalle as  $t){ 

$Addproducto = trim($t->producto);
$frm = str_replace(" ", "", $Addproducto);

?>
  	                                                    
                                    <tr class="odd gradeX">
    
    <td id="<?php echo $frm ?>" width=170><input type="text" class="productodos form-control" readonly  id="productodos" name="productodos" value="<?php echo $t->producto?>"/></td>
     <td><input type="text" class="caralcance form-control"  name="caralcance[]" value="<?php echo $t->caralcance?>"/></td>  
    <td><input type="text" class="carintensidad form-control"  name="carintensidad[]" value="<?php echo $t->carintensidad?>"/></td>
    <td><input type="text" class="carcartas form-control" readonly name="carcartas" value="<?php echo $t->carcartas?>"/></td>
    <td><input type="text" class="carcostos form-control" readonly  name="carcostos" value="<?php echo $t->carcostos?>"/></td>
    <td><input type="text" class="cartotal form-control" readonly  name="cartotal" value="<?php echo $t->cartotal?>"/></td>
    </tr>
    
       <?php 
	                                                 
	                                                    } 
	                                                    endif;
	                                                ?>
    </tbody>
    </table>
    
    </div>
    </div>
    </div>
    
   
     <div id='display_image'  style='margin-left:1%;float:left; display:block;width:41%;'> 
			 
			 <div class="form-group">	
    
    
      
            <div class="col-md-12">
            <div class="alert alert-dismissable alert-info" style='height:5%'>
								VISITAS		
								
										
            
							
							</div>
            
        
             
         
    			 
						  
						   <table cellpadding="0" cellspacing="0" border="0"
												class="table table-striped table-bordered "  id="table_visitas">
    
    <thead>
													<tr>
												<th  >% Alcance</th>
													<th  >Intensidad</th>
														<th >Volumen</th>
														<th >Costo Unitario</th>
														<th >Costo Visita</th>
														
													
															
													</tr>
												</thead>
    <tbody>
                                 <?php 
	                                                   
	                                                   
	                                                if( !empty($PlanDetalle) ):    
	                                                    foreach($PlanDetalle as  $t){ 

$Addproducto = trim($t->producto);
$frm = str_replace(" ", "", $Addproducto);


?>
  	                                                    
                                    <tr class="odd gradeX">
    <td id="<?php echo $frm ?>" ><input type="text" class="visalcance form-control"  name="visalcance[]" value="<?php echo $t->visalcance?>"/></td>  
    <td><input type="text" class="visintensidad form-control"  name="visintensidad[]" value="<?php echo $t->visintensidad?>" /></td>
    <td><input type="text" class="visvolumen form-control" readonly name="visvolumen" value="<?php echo $t->visvolumen?>" /></td>
    <td><input type="text" class="viscosto form-control" readonly name="viscosto" value="<?php echo $t->viscosto?>" /></td>
    <td><input type="text" class="vistotal form-control" readonly  name="vistotal" value="<?php echo $t->vistotal?>" /></td>
   </tr>
   
     <?php 
	                                                 
	                                                    } 
	                                                    endif;
	                                                ?>
    </tbody>
    </table>
    
    </div>
    </div>
    </div>
 
    
     
    
    		 
						  
	
        </div>  
    
    
    
    
      
			  <div >	
			 
			  <div id='display_image'  style='float:left; display:block;width:49%;'> 
			 
			 <div class="form-group">			  
						     
          
            <div class="col-md-12">
            <div class="alert alert-dismissable alert-info" style='height:5%'>
								TELEFONIA		
										
            
							
							</div>
          
        
           
            
         
    			 
						  
						   <table cellpadding="0" cellspacing="0" border="0"
												class="table table-striped table-bordered "   id="table_telefonia">
    
    <thead>
													<tr>
													<th  >Producto</th>
														<th >Tiempo aire</th>
														<th >Costo Unitario</th>
														<th >Costo</th>
														
													
															
													</tr>
												</thead>
    <tbody>
                                 
  	                                          <?php 
	                                                   
	                                                   
	                                                if( !empty($PlanDetalle) ):    
	                                                    foreach($PlanDetalle as  $t){ 

$Addproducto = trim($t->producto);
$frm = str_replace(" ", "", $Addproducto);
?>           
                                    <tr class="odd gradeX">
                                    
                                     
                                    
                                   <td id="<?php echo $frm ?>" width=170><input type="text" class="productotres form-control" readonly  id="productotres" name="productotres" value="<?php echo $t->producto?>"/></td>
 
    <td> <input type="text" class="teltiempo form-control" readonly  name="teltiempo" value="<?php echo $t->teltiempo?>" /></td>
    <td> <input type="text" class="telcosto form-control" readonly name="telcosto" value="<?php echo $t->telcosto?>" /></td>
    <td> <input type="text" class="teltotal form-control" readonly  name="teltotal" value="<?php echo $t->teltotal?>" /></td>
   
    
    </tr>
    
       <?php 
	                                                 
	                                                    } 
	                                                    endif;
	                                                ?>
    </tbody>
    </table>
      </div>
    </div>
    </div>
    
   
  
 
    
           <div id='display_image'  style='margin-left:1%;float:left;display:block;width:50%;'> 
			 
					 <div class="form-group">	
    
    
      
            <div class="col-md-12">
            <div class="alert alert-dismissable alert-info" style='height:5%'>
								SMS		
										
										
            
							
							</div>
          
        
         
    			 
						  
						   <table cellpadding="0" cellspacing="0" border="0"
												class="table table-striped table-bordered "  id="table_sms">
    
    <thead>
													<tr>
													<th  >% Alcance</th>
													<th  >Intensidad</th>
														<th  >SMS</th>
														<th  >Costo Unitario</th>
														<th  >Costo total</th>
														
													
															
													</tr>
												</thead>
    <tbody>
                                 
  	                                     <?php 
	                                                   
	                                                   
	                                                if( !empty($PlanDetalle) ):    
	                                                    foreach($PlanDetalle as  $t){ 
$Addproducto = trim($t->producto);
$frm = str_replace(" ", "", $Addproducto);


?>                 
                                    <tr class="odd gradeX">
    <td id="<?php echo $frm ?>" ><input type="text" class="smsalcance form-control"  name="smsalcance[]" value="<?php echo $t->smsalcance?>"/></td>  
    <td><input type="text" class="smsintensidad form-control"  name="smsintensidad[]" value="<?php echo $t->smsintensidad?>"/></td>
    <td><input type="text" class="smsvolumen form-control" readonly name="smsvolumen" value="<?php echo $t->smsvolumen?>"/></td>
    <td><input type="text" class="smscosto form-control" readonly name="smscosto" value="<?php echo $t->smscosto?>"/></td>
    <td><input type="text" class="smstotal form-control" readonly  name="smstotal" value="<?php echo $t->smstotal?>"/></td>
   </tr>
   
          <?php 
	                                                 
	                                                    } 
	                                                    endif;
	                                                ?>
   
    </tbody>
    </table>
    
      </div>
    </div>
    </div>
    
    		 
						  
	
        </div>        
        
        
        
			 		 <div >		  
						     
        
             <div id='display_image'  style='float:left; display:block;'> 
			 
			 <div class="form-group">			  
						     
          
            <div class="col-md-12">
            <div class="alert alert-dismissable alert-info" style='height:5%'>
								BLASTER		
										
										
            
							
							</div>
          
        
           
            
         
    			 
						  
						   <table cellpadding="0" cellspacing="0" border="0"
												class="table table-striped table-bordered "   id="table_blaster">
    
    <thead>
    
    	<tr><th headers="tiempo" rowspan="2">Producto</th>
											
													<th headers="tiempo" colspan="2">A Fijo</th>
													<th headers="tiempo">
													
													
													<input type="text" class="porfijo form-control"   name="porfijo[]" value="<?php echo $t->porfijo?>"/>
													
													</th>
													<th headers="tiempo" colspan="2">A móvil</th>
													<th headers="tiempo"><input type="text" class="pormovil form-control"   name="pormovil[]" value="<?php echo $t->pormovil?>" /></th>
													
													</tr>
    
    
    
													<tr>
													
														<th>Tiempo requerido</th>
														<th>Costo por minuto</th>
														<th>Costo total</th>
														<th>Tiempo requerido</th>
														<th>Costo por minuto</th>
														<th>Costo total</th>
													
															
													</tr>
												</thead>
    <tbody>
                                 
  	                                       
  	                                          <?php 
	                                                   
	                                                   
	                                                if( !empty($PlanDetalle) ):    
	                                                    foreach($PlanDetalle as  $t){ 

$Addproducto = trim($t->producto);
$frm = str_replace(" ", "", $Addproducto);

?>    
  	                                         <tr class="odd gradeX">
    
    
     <td id="<?php echo $frm ?>" width=170><input type="text" class="productocuatro form-control" readonly  id="productocuatro" name="productocuatro" value="<?php echo $t->producto?>"/></td>
    <td> <input type="text" class="tottiempo form-control" readonly  name="tottiempo" value="<?php echo $t->tottiempo?>"/></td>
    <td> <input type="text" class="totcosto form-control" readonly  name="totcosto" value="<?php echo $t->totcosto?>"/></td>
    <td> <input type="text" class="tottotal form-control" readonly  name="tottotal" value="<?php echo $t->tottotal?>"/></td>
    <td> <input type="text" class="tottiempomovil form-control" readonly  name="tottiempomovil" value="<?php echo $t->tottiempomovil?>"/></td>
    <td> <input type="text" class="totcostomovil form-control" readonly  name="totcostomovil" value="<?php echo $t->totcostomovil?>"/></td>
    <td> <input type="text" class="tottotalmovil form-control" readonly  name="tottotalmovil" value="<?php echo $t->tottotalmovil?>"/></td>
   </tr>
    
 <?php 
	                                                 
	                                                    } 
	                                                    endif;
	                                                ?>
    
    </tbody>
    </table>
      </div>
    </div>
    </div>
    
    </div>
        
      		 <div >		  
						     
        
             <div id='display_image'  style='float:left; display:block;'> 
			 
			 <div class="form-group">			  
						     
          
            <div class="col-md-12">
            <div class="alert alert-dismissable alert-info" style='height:5%'>
							COSTO TOTAL			
										
										
            
							
							</div>
          
        
           			   <table cellpadding="0" cellspacing="0" border="0"
												class="table table-striped table-bordered "  id="table_costoTotal">
    
    <thead>
													<tr>
													
														<th >Producto</th>
														<th >Costo</th>
															
													</tr>
												</thead>
    <tbody>
                                 
  	                                         <?php 
	                                                   
	                                                   
	                                                if( !empty($PlanDetalle) ):    
	                                                    foreach($PlanDetalle as  $t){ 

$Addproducto = trim($t->producto);
$frm = str_replace(" ", "", $Addproducto);

?>                 
                                    <tr class="odd gradeX">
    
    
   
    <td id="<?php echo $frm ?>" > <input type="text" class="productocinco form-control"  readonly   id="productocinco" name="productocinco" value="<?php echo $t->producto?>"/></td>
    <td> <input type="text" class="totcostoFinal form-control" readonly name="totcostoFinal" value="<?php echo $t->ctctotal?>"/></td>
  
   
    
    </tr>
    
    <?php 
	                                                 
	                                                    } 
	                                                    endif;
	                                                ?>
    </tbody>
    </table>
            
         
    			  
						  
						   <table cellpadding="0" cellspacing="0" border="0"
												class="table table-striped table-bordered " id="table_total">
    
    <thead>
													
												<tr>
													    <th >Producto</th> 
														<th >Total Horas costo</th>
														<th >Personas requeridas</th>
														<th >Ausentismo</th>
														<th >Total Personas</th>
														<th >Total personal disponible</th>
														<th >Variación</th>
														
														
													
															
													</tr>	
													
												</thead>
    <tbody>
                                 
  	                                        <?php 
	                                                   
	                                                   
	                                                if( !empty($PlanDetalle) ):    
	                                                    foreach($PlanDetalle as  $t){
$Addproducto = trim($t->producto);
$frm = str_replace(" ", "", $Addproducto);


 ?>               
                                    <tr class="odd gradeX">
    
    
   
    
    <td id="<?php echo $frm ?>" width=170 ><input type="text" class="productoseis form-control" readonly   id="productoseis" name="productoseis" value="<?php echo $t->producto?>"/></td>
    <td ><input type="text" class="cthoras form-control" readonly  name="cthoras" value="<?php echo $t->cthoras?>" /> </td>
   <td><input type="text" class="ctpersonas form-control" readonly name="ctpersonas" value="<?php echo $t->ctpersonas?>" /></td>
    <td> <input type="text" class="ctausentismo form-control" readonly  name="ctausentismo" value="<?php echo $t->ctausentismo?>" /></td>
   <td> <input type="text" class="cttotal form-control" readonly  name="cttotal" value="<?php echo $t->cttotal?>" /></td>
   <td> <input type="text" class="ctplantilla form-control"   name="ctplantilla[]" value="<?php echo $t->ctplantilla?>" /></td>
   <td> <input type="text" class="ctvariacion form-control" readonly  name="ctvariacion" value="<?php echo $t->ctvariacion?>" /></td>
    
    
    
    </tr>
        <?php 
	                                                 
	                                                    } 
	                                                    endif;
	                                                ?>
     
        
    </tbody>
    </table>
            
         
    			 
						  
		
      </div>
    </div>
    </div>
    
    </div>
                     
               
                        <?php 
	                                                   
	                                                   
	                                                if( !empty($PlanMaestro) ):    
	                                                    foreach($PlanMaestro as  $t){ ?>
                     
                       <div class="form-group">
						    <label for="focusedinput" class="col-sm-3 control-label">ACCIONES POR REALIZAR</label>
						    <div class="col-sm-5">
						   
														
							<textarea cols="95" rows="5"  maxlength="250" id="AccionesRealizar" name="AccionesRealizar" class="vf_otf" ><?php echo $t->AccionesRealizar?></textarea>  
												
														
														
						    </div>
                          
                            </div>
                     
                     <hr>
                    
             
  	  <?php 
	                                                  
	                                                    } 
	                                                    endif;
	                                                ?>
					
                     
                    
                    
                    
<a href="#" class="scrollup">Scroll</a>
  
            
 </form>
			  
			    <input id="btnsavefront" type="submit"  style="display:none" class="btn btn-inverse" value="Guardar" />  
			   
			   
			  </div>
			 
		  </div>
   
    
 <!-- Modal -->
											<div class="modal fade" id="ModalEliminaProducto" tabindex="-1"
												role="dialog" aria-labelledby="ModalPuestoActualLabel"
												aria-hidden="true">
												<div class="modal-dialog">
													<div class="modal-content">
														<div class="modal-header">
															<button type="button" class="close" data-dismiss="modal"
																aria-hidden="true">&times;</button>
															<h4 class="modal-title">Eliminar Producto</h4>
														</div>
														<div class="modal-body">

															
															<div class="form-group">
																<label class="col-sm-3 control-label">Producto:</label>
																<div class="col-sm-6">
																	 <select class="form-control" id="Eliminaproducto" name="Eliminaproducto">
                    <option value="" />Seleccione...  
                    
                       <?php 
  	                                         if( !empty($PlanDetalle) ):    
	                                                    foreach($PlanDetalle as  $t){ ?>    
                    
                      <option value="<?php echo $t->producto?>" /><?php echo $t->producto?> 
                      
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
															<a href="#" id="deleteProducto" class="btn btn-inverse">Eliminar</a>
														</div>
													</div>
												</div>
											</div>
											<!-- /.modal -->
        
  


 <!-- Modal -->
											<div class="modal fade" id="ModalPuestoActual" tabindex="-1"
												role="dialog" aria-labelledby="ModalPuestoActualLabel"
												aria-hidden="true">
												<div class="modal-dialog">
													<div class="modal-content">
														<div class="modal-header">
															<button type="button" class="close" data-dismiss="modal"
																aria-hidden="true">&times;</button>
															<h4 class="modal-title">Agregar Producto</h4>
														</div>
														<div class="modal-body">

															
															<div class="form-group">
																<label class="col-sm-3 control-label">Producto:</label>
																<div class="col-sm-6">
																	 <select class="form-control" id="Addproducto" name="Addproducto">
                    <option value="" />Seleccione...                    
                            
                            
              </select>
																</div>
															</div>


															
														
															

															
														</div>
														<div class="modal-footer">
															<button type="button" class="btn btn-default"
																data-dismiss="modal">Cerrar</button>
															<a href="#" id="agregarProducto" class="btn btn-inverse">Agregar</a>
														</div>
													</div>
												</div>
											</div>
											<!-- /.modal -->


<script type="text/javascript">


$('#generales').validate({
    debug: true,
    //onfocusout: true,
    //onsubmit : true,
    onkeyup: false,
    //submitHandler: ajaxSubmit
    rules: {
    	portafolio: {
            required: true
        },
        periodo: {
            required: true
        },
        responsable: {
            required: true
        },
        producto: {
            required: true
        },
        datepickerFecha: {
            required: true
        }
    },
    messages: {
        
    	portafolio: {
            required: "Portafolio requerido"
        },
        periodo: {
            required: "Periodo requerido"
        },
        responsable: {
            required: "Responsable requerido"
        },
        producto: {
            required: "Producto requerido"
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



/////////////////////////////////////////////////////
   		 var DATACARTEO=[];
       	
         var TABLA 	= $("#table_carteo tbody > tr");

         TABLA.each(function() {
    			
        	 caralcance = $(this).find(".caralcance").val(),
        	 carintensidad = $(this).find(".carintensidad").val(),
        	 carcartas = $(this).find(".carcartas").val(),
        	 carcostos = $(this).find(".carcostos").val(),
        	 cartotal = $(this).find(".cartotal").val(),
    	
    			
    			 

    			 item={};

                 item["caralcance"]=caralcance;
        	     item["carintensidad"]=carintensidad; 		
    			 item["carcartas"]=carcartas;
    			 item["carcostos"]=carcostos;
    			 item["cartotal"]=cartotal;
    		
    			 
    			 DATACARTEO.push(item);
    			});
    		

    			aInfo 	= JSON.stringify(DATACARTEO);

    			formData.append('id_carteo', aInfo);


/////////////////////////////////////////////////////
    	   		 var DATASMS=[];
    	       	
    	         var TABLA 	= $("#table_sms tbody > tr");

    	         TABLA.each(function() {
    	    			
    	        	 smsalcance = $(this).find(".smsalcance").val(),
    	        	 smsintensidad = $(this).find(".smsintensidad").val(),
    	        	 smsvolumen = $(this).find(".smsvolumen").val(),
    	        	 smscosto = $(this).find(".smscosto").val(),
    	        	 smstotal = $(this).find(".smstotal").val(),
    	    	
    	    			
    	    			 

    	    			 item={};

    	                 item["smsalcance"]=smsalcance;
            	         item["smsintensidad"]=smsintensidad; 		            		
    	    			 item["smsvolumen"]=smsvolumen;
    	    			 item["smscosto"]=smscosto;
    	    			 item["smstotal"]=smstotal;
    	    		
    	    			 
    	    			 DATASMS.push(item);
    	    			});
    	    		

    	    			aInfo 	= JSON.stringify(DATASMS);

    	    			formData.append('id_sms', aInfo);



/////////////////////////////////////////////////////
    	    	   		 var DATAVISITAS=[];
    	    	       	
    	    	         var TABLA 	= $("#table_visitas tbody > tr");

    	    	         TABLA.each(function() {
    	    	    			
    	    	        	 visalcance = $(this).find(".visalcance").val(),
    	    	        	 visintensidad = $(this).find(".visintensidad").val(),
    	    	        	 visvolumen = $(this).find(".visvolumen").val(),
    	    	        	 viscosto = $(this).find(".viscosto").val(),
    	    	        	 vistotal = $(this).find(".vistotal").val(),
    	    	    	
    	    	    			
    	    	    			 

    	    	    			 item={};

    	    	        	 item["visalcance"]=visalcance;
                	         item["visintensidad"]=visintensidad; 		        		
    	    	    			 item["visvolumen"]=visvolumen;
    	    	    			 item["viscosto"]=viscosto;
    	    	    			 item["vistotal"]=vistotal;
    	    	    		
    	    	    			 
    	    	    			 DATAVISITAS.push(item);
    	    	    			});
    	    	    		

    	    	    			aInfo 	= JSON.stringify(DATAVISITAS);

    	    	    			formData.append('id_visitas', aInfo);


/////////////////////////////////////////////////////
    	    	    	   		 var DATATELEFONIA=[];
    	    	    	       	
    	    	    	         var TABLA 	= $("#table_telefonia tbody > tr");

    	    	    	         TABLA.each(function() {
    	    	    	    			

    	    	    	        	
    	    	    	        	 teltiempo = $(this).find(".teltiempo").val(),
    	    	    	        	 telcosto = $(this).find(".telcosto").val(),
    	    	    	        	 teltotal = $(this).find(".teltotal").val(),
    	    	    	    			
    	    	    	    			 

    	    	    	    			 item={};

    	    	    	    			                 		
    	    	    	    		
    	    	    	    			 item["teltiempo"]=teltiempo;
    	    	    	    			 item["telcosto"]=telcosto;
    	    	    	    			 item["teltotal"]=teltotal;
    	    	    	    	    		
    	    	    	    			 
    	    	    	    			 DATATELEFONIA.push(item);
    	    	    	    			});
    	    	    	    		

    	    	    	    			aInfo 	= JSON.stringify(DATATELEFONIA);

    	    	    	    			formData.append('id_telefonia', aInfo);


/////////////////////////////////////////////////////
    	    	    	    	   		 var DATABLASTER=[];
    	    	    	    	       	
    	    	    	    	         var TABLA 	= $("#table_blaster tbody > tr");

    	    	    	    	         TABLA.each(function() {
    	    	    	    	    			

    	    	    	    	        	
    	    	    	    	        	 tottiempo = $(this).find(".tottiempo").val(),
    	    	    	    	        	 totcosto = $(this).find(".totcosto").val(),
    	    	    	    	        	 tottotal = $(this).find(".tottotal").val(),
    	    	    	    	        	 tottiempomovil = $(this).find(".tottiempomovil").val(),
    	    	    	    	        	 totcostomovil = $(this).find(".totcostomovil").val(),
    	    	    	    	        	 tottotalmovil = $(this).find(".tottotalmovil").val(),
    	    	    	    	        	
    	    	    	    	    			
    	    	    	    	    			 

    	    	    	    	    			 item={};

    	    	    	    	    			                 		
    	    	    	    	    			
    	    	    	    	    			 item["tottiempo"]=tottiempo;
    	    	    	    	    			 item["totcosto"]=totcosto;
    	    	    	    	    			 item["tottotal"]=tottotal;
    	    	    	    	    			 item["tottiempomovil"]=tottiempomovil;
    	    	    	    	    			 item["totcostomovil"]=totcostomovil;
    	    	    	    	    			 item["tottotalmovil"]=tottotalmovil;
    	    	    	    	    			


    	    	    	    	    			 
    	    	    	    	    			 DATABLASTER.push(item);
    	    	    	    	    			});
    	    	    	    	    		

    	    	    	    	    			aInfo 	= JSON.stringify(DATABLASTER);


    	    	    	    	    			formData.append('id_blaster', aInfo);   



/////////////////////////////////////////////////////
    	    	    	    	    	   		 var DATAPERSONAL=[];
    	    	    	    	    	       	
    	    	    	    	    	         var TABLA 	= $("#table_personalcosto tbody > tr");

    	    	    	    	    	         TABLA.each(function() {
    	    	    	    	    	    			

    	    	    	    	    	        	
    	    	    	    	    	        	 cpacciones = $(this).find(".cpacciones").val(),
    	    	    	    	    	        	 cpcuentas = $(this).find(".cpcuentas").val(),
    	    	    	    	    	        	 cptiempo = $(this).find(".cptiempo").val(),
    	    	    	    	    	        	 cppronostico = $(this).find(".cppronostico").val(),
    	    	    	    	    	        	 cphoras = $(this).find(".cphoras").val(),
    	    	    	    	    	        	 cpturnos = $(this).find(".cpturnos").val(),
    	    	    	    	    	        	 cppersonas = $(this).find(".cppersonas").val(),
    	    	    	    	    	        	 cpcosto = $(this).find(".cpcosto").val(),
    	    	    	    	    	        	 cptotal = $(this).find(".cptotal").val(),
    	    	    	    	    	        	 iddetalle = $(this).find(".iddetalle").val(),


  	    	    	    	    	    		
    	    	    	    	    	    			 

    	    	    	    	    	    			 item={};

    	    	    	    	    	    			                 		
    	    	    	    	    	    			
    	    	    	    	    	    			 item["cpacciones"]=cpacciones;
    	    	    	    	    	    			 item["cpcuentas"]=cpcuentas;
    	    	    	    	    	    			 item["cptiempo"]=cptiempo;
    	    	    	    	    	    			 item["cppronostico"]=cppronostico;
    	    	    	    	    	    			 item["cphoras"]=cphoras;
    	    	    	    	    	    			 item["cpturnos"]=cpturnos;
    	    	    	    	    	    			 item["cppersonas"]=cppersonas;
    	    	    	    	    	    			 item["cpcosto"]=cpcosto;
    	    	    	    	    	    			 item["cptotal"]=cptotal;
    	    	    	    	    	    			 item["iddetalle"]=iddetalle;
    	    	    	    	    	    	    		
    	    	    	    	    	    		
    	    	    	    	    	    			 
    	    	    	    	    	    			 DATAPERSONAL.push(item);
    	    	    	    	    	    			});
    	    	    	    	    	    		

    	    	    	    	    	    			aInfo 	= JSON.stringify(DATAPERSONAL);

    	    	    	    	    	    			formData.append('id_personal', aInfo);

    /////////////////////////////////////////////////////
    	    	    	    	    	    	   		 var DATACOSTO=[];
    	    	    	    	    	    	       	
    	    	    	    	    	    	         var TABLA 	= $("#table_costoTotal tbody > tr");

    	    	    	    	    	    	         TABLA.each(function() {
    	    	    	    	    	    	    			

    	    	    	    	    	    	        
    	    	    	    	    	    	        	 totcostoFinal = $(this).find(".totcostoFinal").val(),
    	    	    	    	    	    	        	
    	    	    	    	    	    	    			 

    	    	    	    	    	    	    			 item={};

    	    	    	    	    	    	    			                 		
    	    	    	    	    	    	    		
    	    	    	    	    	    	    			 item["totcostoFinal"]=totcostoFinal;
    	    	    	    	    	    	    			
    	    	    	    	    	    	    		
    	    	    	    	    	    	    			 
    	    	    	    	    	    	    			 DATACOSTO.push(item);
    	    	    	    	    	    	    			});
    	    	    	    	    	    	    		

    	    	    	    	    	    	    			aInfo 	= JSON.stringify(DATACOSTO);

    	    	    	    	    	    	    			formData.append('id_costo', aInfo);   



    	    	    	    	    	    	    			
    	    	    	    	    	    	    			 /////////////////////////////////////////////////////
    	    	    	    	    	    	    			 
    	    	    	    	    	    	    			  var DATATOTAL=[];
    	    	    	    	    	    	    	       	
    	    	    	    	    	    	    	         var TABLA 	= $("#table_total tbody > tr");

    	    	    	    	    	    	    	         TABLA.each(function() {


    	    	    	    	    	    	    	        	 cthoras = $(this).find(".cthoras").val(),	    	    	    	    	    	        	
      	    	    	    	    	    	    	        	 ctpersonas = $(this).find(".ctpersonas").val(),
    	    	    	    	    	    	    	        	 ctausentismo = $(this).find(".ctausentismo").val(),
    	    	    	    	    	    	    	        	 cttotal = $(this).find(".cttotal").val(),
    	    	    	    	    	    	    	        	 ctplantilla = $(this).find(".ctplantilla").val(),
    	    	    	    	    	    	    	        	 ctvariacion = $(this).find(".ctvariacion").val(),
    	    	    	    	    	    	    	        	
    	    	    	    	    	    	    	    		 item={};


   	    	    	    	    	    	    			    
   	    	    	    	    	    	    			       		
    	    	    	    	    	    	    	    			
    	    	    	    	    	    	    	    			 item["cthoras"]=cthoras;
    	    	    	    	    	    	    	    			 item["ctpersonas"]=ctpersonas;
    	    	    	    	    	    	    	    			 item["ctausentismo"]=ctausentismo;
    	    	    	    	    	    	    	    			 item["cttotal"]=cttotal;
    	    	    	    	    	    	    	    			 item["ctplantilla"]=ctplantilla;
    	    	    	    	    	    	    	    			 item["ctvariacion"]=ctvariacion;
    	    	    	    	    	    	    	    			
    	    	    	    	    	    	    	    		
    	    	    	    	    	    	    	    			 
    	    	    	    	    	    	    	    			 DATATOTAL.push(item);
    	    	    	    	    	    	    	    			});
    	    	    	    	    	    	    	    		

    	    	    	    	    	    	    	    			aInfo 	= JSON.stringify(DATATOTAL);

    	    	    	    	    	    	    	    			formData.append('id_total', aInfo);   

    	    	    	    	    	    			    	    	    	    	    			
    	    	    			
    	    	    /////////////////////////////////////////////////////
    	    	    	    	    	    	    	    	  		 var DATAASIGNACION=[];
    	    	    	    	    	    	    	    	      	
    	    	    	    	    	    	    	    	        var TABLA 	= $("#table_asignacion tbody > tr");

    	    	    	    	    	    	    	    	        TABLA.each(function() {
    	    	    	    	    	    	    	    	   			
    	    	    	    	    	    	    	    	        	productopersonal = $(this).find(".productopersonal").val(),
    	    	    	    	    	    	    	    	        	asigcuentas = $(this).find(".asigcuentas").val(),
    	    	    	    	    	    	    	    	        	asigsaldo = $(this).find(".asigsaldo").val(),
    	    	    	    	    	    	    	    	        	asigfacturacion = $(this).find(".asigfacturacion").val(),
    	    	    	    	    	    	    	    	        	asigutilidad = $(this).find(".asigutilidad").val(),
    	    	    	    	    	    	    	    	   	
    	    	    	    	    	    	    	    	   			
    	    	    	    	    	    	    	    	   			 

    	    	    	    	    	    	    	    	   			 item={};

    	    	    	    	    	    	    	    	        	 item["productopersonal"]=productopersonal;    		
    	    	    	    	    	    	    	    	   			 item["asigcuentas"]=asigcuentas;
    	    	    	    	    	    	    	    	   			 item["asigsaldo"]=asigsaldo;
    	    	    	    	    	    	    	    	   			 item["asigfacturacion"]=asigfacturacion;
    	    	    	    	    	    	    	    	   			 item["asigutilidad"]=asigutilidad;
    	    	    	    	    	    	    	    	   		
    	    	    	    	    	    	    	    	   			 
    	    	    	    	    	    	    	    	   			DATAASIGNACION.push(item);
    	    	    	    	    	    	    	    	   			});
    	    	    	    	    	    	    	    	   		

    	    	    	    	    	    	    	    	   			aInfo 	= JSON.stringify(DATAASIGNACION);

    	    	    	    	    	    	    	    	   			formData.append('id_asignacion', aInfo); 


    	    	    	    	    	    	    	    	   			///////////////////////////////////////////////
    	    	    	    	    	    	    	    	   			 var DATABLASTERPOR=[];
    	    	    	    	       	
    	    	    	    	         var TABLA 	= $("#table_blaster thead > tr");

    	    	    	    	         TABLA.each(function() {
    	    	    	    	    			

    	    	    	    	        	
    	    	    	    	        	
    	    	    	    	        	 porfijo = $(this).find(".porfijo").val(),
    	    	    	    	        	 pormovil = $(this).find(".pormovil").val(),
    	    	    	    	    			
    	    	    	    	    			 

    	    	    	    	    			 item={};

    	    	    	    	    			                 		
    	    	    	    	    			
    	    	    	    	    			
    	    	    	    	    			 item["porfijo"]=porfijo;
    	    	    	    	    			 item["pormovil"]=pormovil;


    	    	    	    	    			 
    	    	    	    	    			 DATABLASTERPOR.push(item);
    	    	    	    	    			});
    	    	    	    	    		

    	    	    	    	    			aInfo 	= JSON.stringify(DATABLASTERPOR);


    	    	    	    	    			formData.append('id_blaster_por', aInfo);   


    	    	    	    	    	    	    	    	   				 
    	    	    	    	    	    	    	   		
   			
        

        
        $.ajax({
            url: '<?php echo HOME_URL; ?>index.php/PlanMaestro/EditPlan',
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
                alertify.error(jqXHR.responseText);
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



        	  //cosoto personal y telefonia
        	   var facturacion = document.getElementsByName('asigfacturacion[]');
              
        	  var asigcuentas = document.getElementsByName('asigcuentas[]');
        	  var valorcpacciones = document.getElementsByName('cpacciones[]');
        	  var valorcptiempo = document.getElementsByName('cptiempo[]');
        	  var valorcpcosto = $('#costo_persona').val();

        	
        	   var valortelcosto = $('#telefonia').val();

        	  var valorcaralcance = document.getElementsByName('caralcance[]');
              var valorcarintensidad = document.getElementsByName('carintensidad[]');
              var valorcarcosto = $('#carteo').val();

          	  var valorvisalcance = document.getElementsByName('visalcance[]');
              var valorvisintensidad = document.getElementsByName('visintensidad[]');
              var valorviscosto = $('#visitas').val();

              var valorsmsalcance = document.getElementsByName('smsalcance[]');
              var valorsmsintensidad= document.getElementsByName('smsintensidad[]');
              var valorsmscosto = $('#sms').val();

              var valorporfijo= document.getElementsByName('porfijo[]');
              var valorpormovil= document.getElementsByName('pormovil[]');
              var valorblasterfijocosto = $('#blasterfijo').val();
              var valorblastermovilcosto = $('#blastermovil').val();

              var valoctplantilla = document.getElementsByName('ctplantilla[]');
        	 
              var ldiaslab = $('#diaslab').val();


            
          	
              for (var i = 0; i <10; i++) {

            	  


                  var cuentas=asigcuentas[i];
                  var acciones=valorcpacciones[i];
                  var tiempo=valorcptiempo[i];
                  var costo=valorcpcosto;
                  var ltelcosto=valortelcosto;
                  var lcaralcance=valorcaralcance[i];
                  var lcarintensidad=valorcarintensidad[i];
                  var lvisalcance=valorvisalcance[i];
                  var lvisintensidad=valorvisintensidad[i];
                  var lsmsalcance=valorsmsalcance[i];
                  var lsmsintensidad=valorsmsintensidad[i];
                  var lporfijo=valorporfijo[0];
                  var lpormovil=valorpormovil[0];
                  var lfacturacion=facturacion[i];
                  var lctplantilla = valoctplantilla[i];

                  
                  var lpronostico=cuentas.value.replace(",","")*acciones.value.replace(",","");
                  var lhoras=(tiempo.value.replace(",","")*lpronostico)/60;
                  var lpersonas=lhoras/(ldiaslab*7);
                  
                  var ltotal=lpersonas*costo.replace(",","");

                  
                  var lteltiempo=(tiempo.value.replace(",","")*lpronostico);

                  var lteltotal= lteltiempo*ltelcosto.replace(",","");
                 
                 var lcartasvolumen=(lcaralcance.value.replace(",","")*lcarintensidad.value.replace(",","")*cuentas.value.replace(",",""))/100;
                  var lcartotal=lcartasvolumen*valorcarcosto;

                  var lvisitasvolumen=(lvisalcance.value.replace(",","")*lvisintensidad.value.replace(",","")*cuentas.value.replace(",",""))/100;
                  var lvistotal=lvisitasvolumen*valorviscosto;

                  var lsmsvolumen=(lsmsalcance.value.replace(",","")*lsmsintensidad.value.replace(",","")*cuentas.value.replace(",",""))/100;
                  var lsmstotal=lsmsvolumen*valorsmscosto;

                  var lfijoaire=(lteltiempo*lporfijo.value.replace(",",""))/100;

                  var lmovilaire=(lteltiempo*lpormovil.value.replace(",",""))/100;
                  var lfijototal=lfijoaire*valorblasterfijocosto;
                  var lmoviltotal=lmovilaire*valorblastermovilcosto;

                   var lctctotal=ltotal+lteltotal+lcartotal+lsmstotal+lvistotal+lmoviltotal+lfijototal;
                  
                  var lfactot=(1-(lctctotal/lfacturacion.value.replace(",","")))*100; 


                  

////////////////


 document.getElementsByName("cpcuentas")[i].value = number_format(cuentas.value);
                  document.getElementsByName("cppronostico")[i].value = number_format(lpronostico, 2);
                  document.getElementsByName("cphoras")[i].value = number_format(lhoras, 2);
                  document.getElementsByName("cpcosto")[i].value = number_format(costo, 2);
                  document.getElementsByName("cppersonas")[i].value = number_format(lpersonas, 2);
                  
                  
                  document.getElementsByName("cptotal")[i].value = number_format(ltotal, 2);

                  document.getElementsByName("teltiempo")[i].value = number_format(lteltiempo, 2);

                  document.getElementsByName("teltotal")[i].value = number_format(lteltotal, 2);
                  document.getElementsByName("telcosto")[i].value = number_format(valortelcosto, 2);

                  document.getElementsByName("carcartas")[i].value = number_format(lcartasvolumen, 2);
                  document.getElementsByName("carcostos")[i].value = number_format(valorcarcosto, 2);
                  document.getElementsByName("cartotal")[i].value = number_format(lcartotal, 2);

                  document.getElementsByName("visvolumen")[i].value = number_format(lvisitasvolumen, 2);
                  document.getElementsByName("viscosto")[i].value = number_format(valorviscosto, 2);
                  document.getElementsByName("vistotal")[i].value = number_format(lvistotal, 2);

                  document.getElementsByName("smsvolumen")[i].value = number_format(lsmsvolumen, 2);
                  document.getElementsByName("smscosto")[i].value = number_format(valorsmscosto, 2);
                  document.getElementsByName("smstotal")[i].value = number_format(lsmstotal, 2);

                  
                  document.getElementsByName("tottiempo")[i].value = number_format(lfijoaire, 2);
                  document.getElementsByName("tottiempomovil")[i].value = number_format(lmovilaire, 2);
                  document.getElementsByName("totcosto")[i].value = number_format(valorblasterfijocosto, 2);
                  document.getElementsByName("totcostomovil")[i].value = number_format(valorblastermovilcosto, 2);
                  document.getElementsByName("tottotal")[i].value = number_format(lfijototal, 2);
                  document.getElementsByName("tottotalmovil")[i].value = number_format(lmoviltotal, 2);


                  document.getElementsByName("totcostoFinal")[i].value = number_format(lctctotal, 2);

                  document.getElementsByName("asigcosto")[i].value = number_format(lctctotal, 2);
                  document.getElementsByName("asigutilidad")[i].value = number_format(lfactot, 2);

                  document.getElementsByName("cthoras")[i].value = number_format(lhoras, 2);
                  document.getElementsByName("ctpersonas")[i].value = number_format(lpersonas, 2);

                  var lctausentismo=lpersonas*.1;
                  
                  document.getElementsByName("ctausentismo")[i].value = number_format(lctausentismo, 2);

                  var lcttotal=lctausentismo+lpersonas;

                  document.getElementsByName("cttotal")[i].value = number_format(lcttotal, 2);



                  var lctvariacion=lcttotal-lctplantilla.value;

                 

                  document.getElementsByName("ctvariacion")[i].value = number_format(lctvariacion, 2);
                  
               
             
   			
              } 
                


                          
        	});


          
    </script>
    
    
    <script>
  $(function() {
    $( "#datepickerFecha" ).datepicker({ dateFormat: 'yy/mm/dd' });
  });
  </script>
  
  
    <script>
  $(function() {
    $( "#datepickerFecha" ).datepicker({ dateFormat: 'yy/mm/dd' });
  });
  </script>
  
  
  <script type="text/javascript">

 $('#agregarProducto').click(function(event) {
    event.preventDefault();


    var Addproducto =$("#Addproducto option:selected").html();

    var frm = Addproducto.replace(" ", "");



    campoAsignacion="<tr class='odd gradeX'><td id='"+frm+"' width=170><input type='text' class='productopersonal form-control' readonly  name='productopersonal'  value='"+Addproducto+"' /></td><td> <input type='text' class='asigcuentas form-control'   name='asigcuentas[]'/></td><td> <input type='text' class='asigsaldo form-control'   name='asigsaldo[]'/></td><td> <input type='text' class='asigfacturacion form-control'   name='asigfacturacion[]'/></td><td> <input type='text' class='asigcosto form-control' readonly  name='asigcosto'/></td><td> <input type='text' class='asigutilidad form-control'  readonly name='asigutilidad'/></td></tr>";
    campoPersonal="<tr class='odd gradeX'><td id='"+frm+"' width=170><input type='text' class='productouno form-control' readonly  name='productouno'  value='"+Addproducto+"' /></td><td> <input type='text' class='cpacciones form-control'  name='cpacciones[]'/></td><td> <input type='text' class='cpcuentas form-control' readonly name='cpcuentas'/></td><td> <input type='text' class='cptiempo form-control'  name='cptiempo[]'/></td><td> <input type='text' class='cppronostico form-control'  readonly  name='cppronostico'/></td><td> <input type='text' class='cphoras form-control' readonly  name='cphoras'/></td><td> <input type='text' class='cpturnos form-control' id='cpturnos' name='cpturnos[]'/></td><td> <input type='text' class='cppersonas form-control' readonly  name='cppersonas'/></td><td> <input type='text' class='cpcosto form-control'  readonly name='cpcosto'/></td><td> <input type='text' class='cptotal form-control' readonly  name='cptotal'/></td></tr>";
    campoTelefonia="<tr class='odd gradeX'><td id='"+frm+"' width=170><input type='text' class='form-control' readonly   name='productotelefonia' value='"+Addproducto+"' /></td><td> <input type='text' class='teltiempo form-control' readonly  name='teltiempo'/></td><td> <input type='text' class='telcosto form-control' readonly name='telcosto'/></td><td> <input type='text' class='teltotal form-control' readonly  name='teltotal'/></td></tr>";
    	campoCarteo="<tr class='odd gradeX'><td id='"+frm+"' width=170><input type='text' class='productodos form-control' readonly   name='productodos' value='"+Addproducto+"'/></td><td><input type='text' class='caralcance form-control'  name='caralcance[]'/></td>  <td><input type='text' class='carintensidad form-control'  name='carintensidad[]'/></td><td><input type='text' class='carcartas form-control' readonly name='carcartas'/></td><td><input type='text' class='carcostos form-control' readonly  name='carcostos'/></td><td><input type='text' class='cartotal form-control' readonly  name='cartotal'/></td></tr>";
    		campoSms="<tr class='odd gradeX'><td id='"+frm+"'><input type='text' class='smsalcance form-control'  name='smsalcance[]'/></td>  <td><input type='text' class='smsintensidad form-control'  name='smsintensidad[]'/></td><td><input type='text' class='smsvolumen form-control' readonly name='smsvolumen'/></td><td><input type='text' class='smscosto form-control' readonly name='smscosto'/></td><td><input type='text' class='smstotal form-control' readonly  name='smstotal'/></td></tr>";
    		campoBlaster="<tr class='odd gradeX'><td id='"+frm+"' width=170><input type='text' class='pruductocuatro form-control' readonly  name='pruductocuatro' value='"+Addproducto+"' /></td><td> <input type='text' class='tottiempo form-control' readonly  name='tottiempo'/></td><td> <input type='text' class='totcosto form-control' readonly  name='totcosto'/></td><td> <input type='text' class='tottotal form-control' readonly  name='tottotal'/></td><td> <input type='text' class='tottiempomovil form-control' readonly  name='tottiempomovil'/></td><td> <input type='text' class='totcostomovil form-control' readonly  name='totcostomovil'/></td><td> <input type='text' class='tottotalmovil form-control' readonly  name='tottotalmovil'/></td></tr>";
    				campoVisitas="<tr class='odd gradeX'><td id='"+frm+"' ><input type='text' class='visalcance form-control'  name='visalcance[]'/></td><td><input type='text' class='visintensidad form-control'  name='visintensidad[]'/></td><td><input type='text' class='visvolumen form-control' readonly name='visvolumen' /></td><td><input type='text' class='viscosto form-control' readonly name='viscosto' /></td><td><input type='text' class='vistotal form-control' readonly  name='vistotal' /></td></tr>";
    				campoTotCostos="<tr class='odd gradeX'><td id='"+frm+"' ><input type='text' class='form-control'  readonly    name='productoTotal' value='"+Addproducto+"'/></td><td><input type='text' class='totcostoFinal form-control' readonly name='totcostoFinal'/></td></tr>";
    				campoTotal="<tr class='odd gradeX'><td id='"+frm+"' width=170><input type='text' class='productocinco form-control' readonly   name='productocinco' value='"+Addproducto+"'/></td><td ><input type='text' class='cthoras form-control' readonly  name='cthoras'/> </td><td><input type='text' class='ctpersonas form-control' readonly name='ctpersonas'/></td><td><input type='text' class='ctausentismo form-control' readonly  name='ctausentismo'/></td><td><input type='text' class='cttotal form-control' readonly  name='cttotal'/></td><td><input type='text' class='ctplantilla form-control'   name='ctplantilla[]'/></td><td><input type='text' class='ctvariacion form-control' readonly  name='ctvariacion'/></td></tr>";

    $("#table_asignacion").append(campoAsignacion);			    				
	$("#table_personalcosto").append(campoPersonal);
	$("#table_telefonia").append(campoTelefonia);
	$("#table_carteo").append(campoCarteo);
	$("#table_sms").append(campoSms);
	$("#table_blaster").append(campoBlaster);
	$("#table_visitas").append(campoVisitas);
	$("#table_costoTotal").append(campoTotCostos);
	$("#table_total").append(campoTotal);




    
});

 </script>

  
    <script type="text/javascript">
        $(document).ready(function() {
            $("#portafolio").change(function() {
                $("#portafolio option:selected").each(function() {
                    cliente = $('#portafolio').val();
                    porhtml = $( "#portafolio option:selected" ).text();
                    $.post('<?php echo HOME_URL; ?>index.php/PlanMaestro/l_producto', {
                        cliente : cliente
                    }, function(data) {
                        $("#productopersonal").html(data);
                        $("#Addproducto").html(data);
                        $("#Eliminaproducto").html(data);

                        
                        $("#mejor").attr("href", "<?php echo HOME_URL; ?>index.php/PlanMaestro/consultaHistoria/"+porhtml);
                        $("#peor").attr("href", "<?php echo HOME_URL; ?>index.php/PlanMaestro/HistoriaBaja/"+porhtml);
                    });

                    
                    
                });
            })
        });
    </script> 
    
    
        <script type="text/javascript">
        $(document).ready(function() {
            $("#productopersonal").change(function() {
                $("#productopersonal option:selected").each(function() {
                    cliente = $('#productopersonal').val();
                   
                   $("#productouno").val(cliente);
                   $("#productodos").val(cliente);
                   $("#productotres").val(cliente);
                   $("#productocuatro").val(cliente);
                   $("#productocinco").val(cliente);
                   $("#productoseis").val(cliente);
                   
                });
            })
        });
    </script> 
    
    
      <script type="text/javascript">

 $('#deleteProducto').click(function(event) {
    event.preventDefault();


    var producto =$("#Eliminaproducto option:selected").html();

    var frm = producto.replace(" ", "");

  

    for (i = 0; i < 9; i++) { 
    	eval("$('#"+frm.trim()+"').parent().remove()");



    }
	 
     
  
    
});

 </script>
    
 