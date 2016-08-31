 <div class="content_generic">
            <div style="width: 99% " class="block_box_gen">
 
        <h2><label>Solicitud de Permiso</label></h2>
        
       		<div id="resultado" style="font-weight: bold; text-align: center;font-size: 13pt; color: #00db05"></div>
		

<form id="formGerente" name="formGerente"> 
<br>
        <table cellpadding="0" cellspacing="0" width="100%" style="border-collapse: separate; border-spacing: 10px 5px;">
            <tr>
                <td>Gerente</td>
                <td>
           		<input type="text" onfocus="this.blur()" name="fecha_inicio" class="fecha_inicio" id="fecha_inicio" placeholder="dd/mm/YYYY" autocomplete="off" required >

              </td>
              
            </tr>                        

            <tr>
                <td>Cartera</td>
            <td>
            		<input type="text" onfocus="this.blur()" name="fecha_fin" class="fecha_fin" id="fecha_fin" placeholder="dd/mm/YYYY" autocomplete="off" required >
            
                </td>
             
            </tr>
            
            <tr>
                <td colspan="3"> <label style="margin-left:45%; margin-top: 30px">Observaciones</label></td>
            </tr>

            <tr>
                <td colspan="3"> <textarea style="width: 100%" name="comentarios"  rows="10" cols="40"></textarea></td>
            </tr>
</table>
   
   

    
        <a class="btnNextFDP" id="btnSolicitar">Solicitar Permiso</a>
        
        <br>
        <br>
        <br>
        </form>
        
      </div>
    </div> 
 
     
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
    $( "#fecha_inicio" ).datepicker({
	        dateFormat: "yy-mm-dd",
	        yearRange: "-100:+0",
	        changeYear:true,
        });

    $( "#fecha_fin" ).datepicker({
        dateFormat: "yy-mm-dd",
        yearRange: "-100:+0",
        changeYear:true,
    });

    
    </script>    