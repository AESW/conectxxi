<div class="content_generic">

    <div style="width: 99%" class="block_box_asistencia">


        <h2><label>Asistencia Curso</label></h2>
<ul>
        <br>
        
         
        
        <form  name="form1" method="POST" action="RegistroAsistenciaCurso">
      <p><span id="resultado" style="color:red;font-weight: bold;margin-bottom: 15px;"></span></p>
        <p><span id="guarda" style="font-weight: bold; text-align: center;font-size: 13pt; color: #00db05"></span></p>
      <?php
      if(isset($mensaje))
      {
      	
      	if(  $mensaje==0  ):
      	?>
      					<div id="paso" style="font-weight: bold; text-align: center;font-size: 13pt; color: red">Seleccine Curso y Grupo.</div>
      	        
      	        <?php 
      	      
      	      
      	        endif;
      	
					if(  $mensaje==1  ):
				?>
				<div id="paso" style="font-weight: bold; text-align: center;font-size: 13pt; color: #00db05">Asistencia registrada correctamente.</div>
        
        <?php 
      
      
        endif;
     
        
      }
      
       ?>
       <br>
        
            <table cellpadding="0" cellspacing="0" width="100%">
				   
				    <tr>
				     <td style="width:170px;  text-align:center" >Curso</td>
					      <td>
						      <select name="curso" class="curso" id="curso"  >
							      <option value="">Selecciona Curso</option>
								 
								   <?php
               if(!empty( $obtenerCursos ) ):
               foreach($obtenerCursos as $fila)
						{
							?>
							  <option value="<?php echo $fila["idCursos"]; ?>" ><?php echo $fila["NombreDelCurso"]; ?></option>
				                 
				            <?php
				            }
				            endif;
               ?>
								  
								  
					</td>		  
							  
								  
						      </select>
					
					    <td style="width:170px;  text-align:center" >Grupo</td>
					      <td>
						      <select name="grupo" class="grupo" id="grupo"  >
							      <option value="">Selecciona Grupo</option>
								 
								  		
						      </select>
					      </td>
				    </tr>
				    </table>
				    <br>
				  
           <center><span id="resultado"></span></center> 
           
        <table id="Usuarios" name="Usuarios" class="table" style="margin-left:1%;width:98%" cellpadding="0" cellspacing="0"  >
            <tr>
             
               <th style="text-align:right;width	:5px" >CONTROL</th>  
                <th style="text-align:left;">NOMBRE</th>
               
               <?php
               if(!empty( $usuariosActivos ) ):
               foreach($usuariosActivos as $fila)
						{
							?>
							
				                 <tr> 			  	           
	              
	              <td style="text-align:right;"> <input style="margin-right:10px;" type="checkbox" name="AsignadoUsuario[]" value="<?php echo $fila["idUsuarios"]; ?>" checked></td>
	             
	                  <td style="text-align:left;"><?php echo $fila["nombreUsuario"]; ?></td>
	                  </tr>  
				            <?php
				            }
				            endif;
               ?>
                  
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
    </div>
    <script type="text/javascript">
    
        $(document).ready(function() {


            
            $("#curso").change(function() {
                $("#curso option:selected").each(function() {
                    curso = $('#curso').val();
                    $.post("<?php echo HOME_URL; ?>Capacitacion/Grupo", {
                    	curso : curso
                    }, function(data) {
                        $("#grupo").html(data);
                   });

                 				
                   
                });
            })
        });
    </script>
    
     <script type="text/javascript">
    
        $(document).ready(function() {


            
            $("#grupo").change(function() {
                $("#grupo option:selected").each(function() {
                	grupo = $('#grupo').val();
                    $.post("<?php echo HOME_URL; ?>Capacitacion/DetalleGrupoAsistencia", {
                    	grupo : grupo
                    }, function(data) {
                        $("#Usuarios").html(data);
                   });

                 				
                   
                });
            })
        });
    </script>