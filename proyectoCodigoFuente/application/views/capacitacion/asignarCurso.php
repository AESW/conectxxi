<div class="content_generic">

    <div style="width: 99%" class="block_box_asistencia">


        <h2><label>Asignar Curso</label></h2>
<ul>
        <br>
        <form  name="form1" id="form1" method="POST" action="AsignarGrupo">
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
				<div id="paso" style="font-weight: bold; text-align: center;font-size: 13pt; color: red">El grupo ya fue cerrado, seleccione otro Grupo.</div>
        
        <?php 
      
      
        endif;
     
      
      if(  $mensaje==2  ):
				?>
				<div id="paso" style="font-weight: bold; text-align: center;font-size: 13pt; color: red">Excede la capacidad de la sala.</div>
        
        <?php 
      
      
        endif;
        
        if(  $mensaje==3  ):
        ?>
        				<div id="paso" style="font-weight: bold; text-align: center;font-size: 13pt; color: #00db05">Grupo asignado correctamente.</div>
                
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
			
        <table id="Usuarios" name="Usuarios" class="table" style="margin-left:1%;width:98%" cellpadding="0" cellspacing="0"  >
         
           
            <tr>
               <th style="text-align:right;" >ASIGNADO</th> 
               <th style="text-align:left;width	:5px" >ASIGNAR</th>  
                <th style="text-align:left;">NOMBRE</th>
         
                  
</tr>
             
            
            
                
                

  
        </table>
        <br>
        <br>
        
        <center>
       
            <a id="cerrarGrupo" class="btnNextFDP" id="btnMenu" herf="#">Cerrar grupo</a>

    
       
       <input class="btnNextFDP" type="submit" value="Asignar">
           <a class="btnNextFDP" id="btnMenu" href="<?php echo HOME_URL; ?>" >Men&uacute; principal</a>
           </center>
       </form>
       
      
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
                    $.post("<?php echo HOME_URL; ?>Capacitacion/DetalleGrupo", {
                    	grupo : grupo
                    }, function(data) {
                        $("#Usuarios").html(data);
                   });

                 				
                   
                });
            })
        });
    </script>
    
    
    
    <script type="text/javascript">
$("#cerrarGrupo").click(function(){

    		error_campos = [];
    		if( $("#grupo").val() == "" ) {
        		error_campos.push(  "grupo");
        		 $("#grupo").css("border", "2px solid red");
    		}
        		 
    		if( $("#curso").val() == "" ) {
        		error_campos.push( "curso");
        		$("#curso").css("border", "2px solid red");
        		}
    	
    		
    		
    		if( error_campos.length  == 0 )
    		{


    			


    				 
    		    $.ajax({
                    url: '<?php echo HOME_URL; ?>Capacitacion/CerrarGrupo',
                    type: 'POST',
                    dataType: 'json',
                    data: $('#form1').serialize(),
                    cache: false,
                    async: false,
                    success: function(response) {
                        if (response.codigo==200) {
                        	$("#guarda").html("Grupo cerrado correctamente..");
                        	$("#paso").remove();
                           
                        } else {
                        	$("#resultado").html("Favor de intentar nuevamente..");
                            
                        }
                    },
                    error: function(jqXHR, textStatus, errorThrown) {
                    	$("#resultado").html("Favor de intentar nuevamente..");
                     //  alert(jqXHR.responseText);
                    }
                });
    			
    			
    		}
    		else
    		{	
        		
    			$("#resultado").html("Favor de revisar campos obligatorios marcados con rojo..");


    			
    		}


    		
	  });


</script>