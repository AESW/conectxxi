<div class="content_generic">

    <div style="width: 99%" class="block_box_descuentos">


        <h2><label>Importar Descuentos</label></h2>
<ul>
        <br>
       	<form   id="basicwizard" name="form1" class="form-horizontal" method="POST" action="<?php echo HOME_URL; ?>Nomina/guardarexcel" enctype="multipart/form-data" >
        
        <input type="hidden" name="leer" class="form-control" id="leer"  />
					
						  			  	
                               	
					<input type="hidden" name="archivo" class="form-control" id="archivo" value="<?php 	echo $archivo; ?>" />
        
      
         
        
        <table id="Usuarios" name="Usuarios" style="border-collapse:collapse;margin-left:1%" cellpadding="0" cellspacing="0" width="100%" >
            <tr>
                <th>NUMERO DE EMPLEADO</th>
                <th>NOMBRE DEL EMPLEADO</th>
                <th>CONCEPTO</th>
                <th>IMPORTE</th>
                <th>TIPO DE MOVIMIENTO</th>
                <th>FECHA</th>
              
</tr>
             
            
            	<?php 
								
								  if( !empty($Listar_campos) ):
								 
								  
								  	echo $Listar_campos;
								 
									  endif;
								  ?> 
                
                
                

  
        </table>
        <br>
        <br>
        
        
      
        


     <center>

<input type="submit"  class="btnNextFDP" value="Importar Ahora"  onclick="javascript:document.form1.submit();document.getElementById('bloquea').style.display='block';"/>
          <a class="btnNextFDP" href="<?php echo HOME_URL; ?>" id="btnMenu">Men&uacute; principal</a>
       </center>
       </form>
       <br>
       
        </ul>
    </div>
    
   
    
       <script type="text/javascript">
            $(document).ready(function(){
                $('#userfile').change( function (){
                	archivo = $('#userfile').val();
var valor="1";
                	document.form1.leer.value=valor;

                	
                	 
                	document.forms["basicwizard"].submit();

                	
                                  
                
            });
            
              
            
        });

            </script>