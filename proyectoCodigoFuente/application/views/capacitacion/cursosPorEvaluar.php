

<div class="content_generic">

    <div style="width: 99%" class="block_box_gen">
        <h2>Evaluaci&oacute;n de cursos</h2>
        <br>
        
     
         <ul>
           <form  name="form1" id="form1" method="POST" >
         <p><span id="resultado" style="color:red;font-weight: bold;margin-bottom: 15px;"></span></p>
        <center>
            <label style="margin-left: 5px">Curso:</label>
            <?php 
			if(!empty( $Curso ) ):
				foreach($Curso as $valor):
		?>
		  <input style="margin-left: 6%;width:30%"type="text" name="nombreCurso" id="nombreCurso" class="nombreCurso" readonly value="<?php echo $valor["NombreDelCurso"];?>">
			   <input style="margin-left: 6%;width:30%"type="hidden" name="idCurso" id="idCurso" class="nombreCurso" readonly value="<?php echo $valor["idCursos"];?>">	
		<?php
				endforeach;
			endif;
		?>
            <br>
            <br>
            <label style="margin-left: 5px">Grupo:</label>
           
                <select id="grupo" name="grupo" class="grupo">
                    <option value="">Seleccione Grupo</option>
                    
                    <?php 
                    foreach($obtenerGrupo as $fila)
							{
								?>
								
					               <option value="<?php echo $fila->idGrupo; ?>"><?php echo $fila->NombreGrupo; ?></option>
		            
					            <?php
					            }
					        	 
					        
                  ?>
                </select>
                <br>
                <br>
                 <label style="margin-left: 5px">Personal que tomo el curso:</label>
                <select id="Personal" name="Personal" class="sel_personal">
                    <option value="">Seleccione Personal</option>
                    
                   
                </select>
                
                </form>
            </ul>
        </center>
    </div>
    
    
    <a href="#" class="btnNextFDP" id="btnEvaluar" href="<?php echo HOME_URL; ?>Capacitacion">Evaluar</a>
    
    <a class="btnNextFDP" id="btnMenu" href="<?php echo HOME_URL; ?>Capacitacion">Men&uacute; principal</a>
</div>


<script type="text/javascript">
    
        $(document).ready(function() {


            
            $("#grupo").change(function() {
                $("#grupo option:selected").each(function() {
                	grupo = $('#grupo').val();
                    $.post("<?php echo HOME_URL; ?>Capacitacion/PersonalGrupo", {
                    	grupo : grupo
                    }, function(data) {
                        $("#Personal").html(data);
                   });

                 				
                   
                });
            })
        });
    </script>
    
    
    
     <script type="text/javascript">
$("#btnEvaluar").click(function(){

    		error_campos = [];
    		if( $("#grupo").val() == "" ) {
        		error_campos.push(  "grupo");
        		 $("#grupo").css("border", "2px solid red");
    		}
        		 
    		if( $("#Personal").val() == "" ) {
        		error_campos.push( "Personal");
        		$("#Personal").css("border", "2px solid red");
        		}
    	
    		
    		
    		if( error_campos.length  == 0 )
    		{


    			Personal = $('#Personal').val();
    			Curso = $('#idCurso').val();
    			
    			location.href="<?php echo HOME_URL; ?>Capacitacion/evaluarCursos/?Personal="+Personal+"&Curso="+Curso;
    		   
    			
    			
    		}
    		else
    		{	
        		
    			$("#resultado").html("Favor de revisar campos obligatorios marcados con rojo..");


    			
    		}


    		
	  });


</script>
