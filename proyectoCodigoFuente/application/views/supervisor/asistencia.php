<div class="content_generic">

    <br>
    <div style="width: 99%" class="block_box_asistencia">


        <h2><label>Control de Personal</label></h2>
<ul>
        <br>
        <form  name="form1" method="POST" action="AltaAsistencia">
      
      <?php
      if(isset($mensaje))
      {
					if(  $mensaje  ):
				?>
				<div style="font-weight: bold; text-align: center;font-size: 13pt; color: #00db05">Registro completado correctamente.</div>
        
        <?php 
      
      
        endif;
      }?>
        
            <table cellpadding="0" cellspacing="0" width="100%">
				   
				    <tr>
				     <td style="width:170px;  text-align:center" >Turno</td>
					      <td>
						      <select name="turno" class="turno" id="turno"  >
							      <option value="">Selecciona Turno</option>
								 
								  		  <option value="MATUTINO" >MATUTINO</option>
							    <option value="VESPERTINO" >VESPERTINO</option>
							    <option value="MIXTO" >MIXTO</option>
							  
								  
						      </select>
					      </td>
				    </tr>
				    </table>
				    <br>
				    <br>
        
        <table id="Usuarios" name="Usuarios" class="table" style="margin-left:1%;width:98%" cellpadding="0" cellspacing="0"  >
            <tr>
               <th style="text-align:right;" >CONTROL</th>  
                <th>NOMBRE</th>
               
                  
</tr>
             
            
            
                
                

  
        </table>
        <br>
        <br>
        
        
       
        

        <a class="btnNextFDP" id="btnMenu">Men&uacute; principal</a>
       
       <input class="btnNextFDP" type="submit" value="Guardar">
       </form>
        <br>
        <br>
        <br>
        </ul>
    </div>
    
    <script type="text/javascript">
    
        $(document).ready(function() {


            
            $("#turno").change(function() {
                $("#turno option:selected").each(function() {
                    empresa = $('#turno').val();
                    $.post("<?php echo HOME_URL; ?>Supervisor/Personal", {
                    	empresa : empresa
                    }, function(data) {
                        $("#Usuarios").html(data);
                   });

                 				
                   
                });
            })
        });
    </script>