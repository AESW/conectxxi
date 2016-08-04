  <div class="formulario_NEmpleado">
<div id="tab-container" class="tab-container">
  	<div class='panel-container'>




        <h2><label>Solicitud de Nuevo Personal</label></h2>
        
       		<div id="resultado" style="font-weight: bold; text-align: center;font-size: 13pt; color: #00db05"></div>
		
           <p style="color:red;font-weight: bold;margin-bottom: 15px;">Favor de revisar campos obligatorios marcados con rojo</p>
      

<form id="formGerente" name="formGerente"> 

        <table cellpadding="0" cellspacing="0" width="100%" style="border-collapse: separate; border-spacing: 10px 5px;">
            <tr>
                <td>Gerente</td>
                <td>
           				
									  <input type="text" name="nomGerente"  class="nomGerente" id="nomGerente" readonly value="<?php echo $DatosUsuario; ?>" >
									  	
								
              
              </td>
              
            </tr>                        

            <tr>
                <td>Cartera</td>
                <td> <select name="Cartera" class="Cartera" id="Cartera" style='border:2px solid red;'">
							     <option value="">Seleccionar Cartera</option>
							     <?php
									  foreach( $CatCartera as  $per ):
								  
									  $cartera= $per->Cartera;
									  $IdCartera= $per->IdCartera;
									  ?>
								  
								  
								  
								  		  <option value="<?php echo $IdCartera; ?>" <?php if( isset($formArray["puesto_solicitado"]) && $formArray["puesto_solicitado"] == $cartera ): echo "selected='selected'"; endif;?>><?php echo $cartera; ?></option>
								  <?php	  
									  endforeach;
								  ?>
						     </select></td>
             
            </tr>

            <tr>
                <td>Producto</td>
                <td> <select name="Producto" class="Producto" id="Producto" style='border:2px solid red;'" >
							     <option value="">Seleccionar Producto</option>
							     <?php
									  foreach( $CatProductos as  $per ):
								  
									  $productos= $per->nombreProducto;
									  $Idproducto= $per->idProductos;
									  ?>
								  
								  
								  
								  		  <option value="<?php echo $Idproducto; ?>" <?php if( isset($formArray["puesto_solicitado"]) && $formArray["puesto_solicitado"] == $productos ): echo "selected='selected'"; endif;?>><?php echo $productos; ?></option>
								  <?php	  
									  endforeach;
								  ?>
						     </select></td>
              
            </tr>

            <tr>
                <td>No. de Vacantes</td>
                <td><input type="text" maxlength="6" name="NumVacantes" class="NumVacantes" id="NumVacantes" placeholder="No. de Vacantes" autocomplete="off" required value="<?php echo (isset($formArray["apellido_materno_candidato"]))?$formArray["apellido_materno_candidato"]:""; ?>" style='border:2px solid red;'"></td>
              
            </tr>

            <tr>
                <td>Motivo</td>
                <td> <select name="Motivo" class="Motivo" id="Motivo" style='border:2px solid red;'">
							     <option value="">Seleccionar Motivo</option>
							    
							    <?php
									  $Motivo = $catalogos->NuevoPersonalMotivo();
									  
									  foreach( $Motivo as $key => $per ):
								  ?>
								  		
								  		
								  		
								  		  <option value="<?php echo $per; ?>" <?php if( isset($formArray["oficina_candidato"]) && $formArray["oficina_candidato"] == $per ): echo "selected='selected'"; endif;?>><?php echo $per; ?></option>
							  
								  			
								  			
								  		
								  <?php	  
									  endforeach;
								  ?>
						     </select></td>
             
            </tr>

            <tr>
                <td>Puesto Solicitado</td>
                <td> <select name="puestoSolicitado" class="puestoSolicitado" id="puestoSolicitado" style='border:2px solid red;'">
							     <option value="">Seleccionar Puesto</option>
							    <?php
									  foreach( $CatPuestos as  $per ):
								  
									  $puesto= $per->nombrePuesto;
									  $Idpuesto= $per->idPuestos;
									  
									  ?>
								  
								  
								  
								  		  <option value="<?php echo $Idpuesto; ?>" <?php if( isset($formArray["puesto_solicitado"]) && $formArray["puesto_solicitado"] == $puesto ): echo "selected='selected'"; endif;?>><?php echo $puesto; ?></option>
								  <?php	  
									  endforeach;
								  ?>
						     </select></td>
						    
            </tr>
<tr>
<td></td>
 <td >
						       <a   target="_blank" class="btnPerfil" id="btnPerfil"><i class="glyphicon glyphicon-search"></i> Ver Perfil del Puesto Solicitado</a>
               </td>

</tr>
      


            <tr>
                <td colspan="3"> <label style="margin-left:45%; margin-top: 30px">Comentarios</label></td>
            </tr>

            <tr>
                <td colspan="3"> <textarea style="width: 100%" name="comentarios"  rows="10" cols="40"></textarea></td>
            </tr>


        </table>

    
        <a class="btnNextFDP" id="btnSolicitar">Solicitar Empleado</a>
        
        <br>
        <br>
        <br>
        </form>
      </div>
    </div> 
    </div>
    
      <script src="<?php echo base_url(); ?>assets/js/bootstrap.min.js" type="text/javascript"></script>  
       <script src="<?php echo base_url(); ?>assets/js/jquery.min.js"></script>
    <script type="text/javascript">	               

	
	

           $('#btnSolicitar').click(function(event) {

        	//   if ($('#formGerente').valid()) {


        		//   event.preventDefault();

        
               
        	      $.ajax({
        		                        url: '<?php echo HOME_URL; ?>Movimientos/GuardaVacante',
        		                        type: 'POST',
        		                        dataType: 'json',
        		                        data: $('#formGerente').serialize(),
        		                        cache: false,
        		                        async: true,
        		                        success: function(response) {
        		                            if (response.codigo != 200) {
        		                            	 $("#resultado").html(response.mensaje);
        		                         
        		                            } else {

        		                                
        		                            }
        		                        },
        		                        error: function(jqXHR, textStatus, errorThrown) {
        		                          
        		                        }
        		                    });      

        //	   } else {
        	//          alertify.error("Favor de completar los datos requeridos");
        	  //    }   
        		
           });



           
        </script>	
        
        
        	<script type="text/javascript">
var nextinput = 0;
        $(document).ready(function() {
            $("#puestoSolicitado").change(function() {
            	 $("#puestoSolicitado option:selected").each(function() {
                     puesto = $('#puestoSolicitado option:selected').text();


if (puesto=='Seleccionar Puesto')
{

	document.getElementById('btnPerfil').href = "<?php echo site_url()?>PerfilesDoc/TELEFONIA.pdf";
}
else
{
    document.getElementById('btnPerfil').href = "<?php echo site_url()?>PerfilesDoc/"+puesto+".pdf";
}     
                 });
            })
        });
    </script> 
