  <div class="formulario_NEmpleado">
<div id="tab-container" class="tab-container">
  	<div class='panel-container'>




        <h2><label>Solicitud de Nuevo Personal</label></h2>
        
       		<div id="resultado" style="font-weight: bold; text-align: center;font-size: 13pt; color: #00db05"></div>
		
       
      

<form id="formDireccion" name="formDireccion"> 

        <table cellpadding="0" cellspacing="0" width="100%" style="border-collapse: separate; border-spacing: 10px 5px;">
            
            <?php 
            
            foreach ($VacanteDetalle as $per):
            
            ?>
             <input type="hidden" name="id"  class="id" id="id" readonly value="<?php echo $per['idVacantesPeticiones']; ?>" >
									 
            <tr>
                <td>Gerente</td>
                <td>
           				
									  <input type="text" name="nomGerente"  class="nomGerente" id="nomGerente" readonly value="<?php echo $per['nombreUsuario']; ?>" >
									  	
								
              
              </td>
              
            </tr>                        

            <tr>
                <td>Cartera</td>
                <td> 
								  
								  
								  	  <input type="text" name="Cartera"  class="Cartera" id="Cartera" readonly value="<?php echo $per['Cartera']; ?>" >
								
								  		
								</td>
             
            </tr>

            <tr>
                <td>Producto</td>
                <td> 		     
								    <input type="text" name="Producto"  class="Producto" id="Producto" readonly value="<?php echo $per['nombreProducto']; ?>" >
								  
								  		
								</td>
              
            </tr>

            <tr>
                <td>No. de Vacantes</td>
                <td><input type="text" maxlength="6" name="NumVacantes" class="NumVacantes" id="NumVacantes" readonly value="<?php echo $per['numeroVacantes']; ?>"></td>
              
            </tr>

            <tr>
                <td>Motivo</td>
                <td> 
								  		
								  <input type="text" name="Motivo"  class="Motivo" id="Motivo" readonly value="<?php echo $per['motivo']; ?>" >
								  
								</td>
             
            </tr>

            <tr>
                <td>Puesto Solicitado</td>
                <td>
								  
								   <input type="text" name="Puesto"  class="Puesto" id="Puesto" readonly value="<?php echo $per['nombrePuesto']; ?>" >
								 
								  		  
								  </td>
               
            </tr>

      


            <tr>
                <td colspan="3"> <label style="margin-left:45%; margin-top: 30px">Comentarios Gerente</label></td>
            </tr>

            <tr>
                <td colspan="3"> <textarea style="width: 100%" name="comentarios"  rows="6" cols="25" readonly ><?php echo $per['comentarios']; ?></textarea></td>
            </tr>
            
            
            
            <tr>
                <td colspan="3"> <label style="margin-left:45%; margin-top: 30px">Comentarios Dirección</label></td>
            </tr>

            <tr>
                <td colspan="3"> <textarea style="width: 100%" name="comentariosDireccion"  rows="6" cols="25"></textarea></td>
            </tr>
<?php 
endforeach;
?>

        </table>
        <br>

    <center>
        <a class="btnNextFDP" id="btnAprobar">Aprobar</a>
          <a class="btnNextFDP" id="btnRechazar">Rechazar</a>
           <a class="btnNextFDP" href="<?php echo HOME_URL; ?>" id="btnMenu">Men&uacute; principal</a>
        </center>
        <br>
      
        </form>
      </div>
    </div> 
    </div>
    
      <script src="<?php echo base_url(); ?>assets/js/bootstrap.min.js" type="text/javascript"></script>  
       <script src="<?php echo base_url(); ?>assets/js/jquery.min.js"></script>
    <script type="text/javascript">	               

	
	

           $('#btnAprobar').click(function(event) {

        	//   if ($('#formGerente').valid()) {


        		//   event.preventDefault();

     


     
     
     $.ajax({
	                        url: '<?php echo HOME_URL; ?>Direccion/AprobarVacante',
	                        type: 'POST',
	                        dataType: 'json',
	                        data: $('#formDireccion').serialize(),
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

	
	

           $('#btnRechazar').click(function(event) {

        	//   if ($('#formGerente').valid()) {


        		//   event.preventDefault();

     


     
     
     $.ajax({
	                        url: '<?php echo HOME_URL; ?>Direccion/RechazarVacante',
	                        type: 'POST',
	                        dataType: 'json',
	                        data: $('#formDireccion').serialize(),
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
