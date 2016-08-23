
<div class="content_generic">
 
    <div style="width: 99%;" class="block_box_gen_capacitacion">
        <h2>Programaci&oacute;n de cursos</h2>
        <br>
        <ul>
        <p><span id="resultado" style="color:red;font-weight: bold;margin-bottom: 15px;"></span></p>
        <p><span id="guarda" style="font-weight: bold; text-align: center;font-size: 13pt; color: #00db05"></span></p>
        <br>
        
        <form id="capacitacion" name="capacitacion">
            <label style="margin-left: 5px">Nombre de curso:</label>
            
            
           
            
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
            <label style="margin-left: 5px"> Fecha del Curso:</label>
           <select id="FechaCurso" name="FechaCurso" class="sel_curso" style="margin-left: 6.8%;width:30%">
                    <option value="">Seleccione fecha inicial</option>
                    
                    <?php 
			if(!empty( $FechaCurso ) ):
				foreach($FechaCurso as $valor):
		?>
					
					 <option value="<?php echo $valor["idFechas"];?>"><?php echo $valor["FechaInicial"];?> - <?php echo $valor["FechaFinal"];?></option>
					
		<?php
				endforeach;
			endif;
		?>
                    
                    
                                    </select>
            <br>
            <br>
            <label style="margin-left: 5px">Capacitador:</label>
             <select id="Capacitador" name="Capacitador" class="sel_curso" style="margin-left: 9.5%;width:30%">
                    <option value="">Seleccione un capacitador</option>
                    
                    <?php 
			if(!empty( $facilitador ) ):
				foreach($facilitador as $valor):
		?>
					
					 <option value="<?php echo $valor["idUsuarios"];?>"><?php echo $valor["nombreUsuario"];?></option>
					
		<?php
				endforeach;
			endif;
		?>
                    
                    
                                    </select>
            <br>
            <br>
            <label style="margin-left: 5px">Lugar:</label>
            <select id="Lugar" name="Lugar" class="sel_curso" style="margin-left: 13.5%;width:30%">
                    <option value="">Seleccione Lugar...</option>
                    
                    <?php 
			if(!empty( $Lugar ) ):
				foreach($Lugar as $valor):
		?>
					
					 <option value="<?php echo $valor["idUbicacion"];?>"><?php echo $valor["nombreOficina"];?> - <?php echo $valor["Direccion"];?> - <?php echo $valor["Sala"];?>  </option>
					
		<?php
				endforeach;
			endif;
		?>
                    
                    
                                    </select>
            <br>
            <br>
            <label style="margin-left: 5px">Duraci&oacute;n:</label>
            <select id="Duracion" name="Duracion" class="sel_curso" style="margin-left: 11.5%;width:30%">
                    <option value="">Seleccione Duración...</option>
                    
                    <?php 
			if(!empty( $Duracion ) ):
				foreach($Duracion as $valor):
		?>
					
					 <option value="<?php echo $valor["idDuracion"];?>"><?php echo $valor["Duracion"];?> - <?php echo $valor["Horario"];?></option>
					
		<?php
				endforeach;
			endif;
		?>
                    
                    
                                    </select>
                                    <br>
                                    <br>
                                     <label style="margin-left: 5px">Nombre del Grupo:</label>
            
           
		  <input style="margin-left: 5.5%;width:30%"type="text" name="nombreGrupo" id="nombreGrupo" class="nombreGrupo" placeholder="Nombre del Grupo" value="">
				
				
				
				
	       
            </form>
            <br>
        <br>
        <br>
        </ul>
        <div>
     <a class="btnNextFDP" id="btnReportes">Men&uacute; principal</a>
        <a class="btnNextFDP" id="btnProgramarCurso" href="#">Programar</a>
</div>
      <br>
      <br>
      <br>  
    </div>
   
 

   
</div>


<script type="text/javascript">
$("#btnProgramarCurso").click(function(){

    		error_campos = [];
    		if( $("#FechaCurso").val() == "" ) {
        		error_campos.push(  "FechaCurso");
        		 $("#FechaCurso").css("border", "2px solid red");
    		}
        		 
    		if( $("#Curso").val() == "" ) {
        		error_campos.push( "Curso");
        		$("#Curso").css("border", "2px solid red");
        		}
    		if( $("#Capacitador").val() == "" ) {
        		error_campos.push( "Curso");
        		$("#Capacitador").css("border", "2px solid red");
        		}

    		if( $("#Lugar").val() == "" ) {
    		error_campos.push(  "Lugar");
    		$("#Lugar").css("border", "2px solid red");
    		}
    		if( $("#Duracion").val() == "" ) {
    		error_campos.push(  "Duracion");
    		$("#Duracion").css("border", "2px solid red");
    		}
    		if( $("#nombreGrupo").val() == "" ) {
    		error_campos.push( "nombreGrupo");
    		$("#nombreGrupo").css("border", "2px solid red");
    		}
    		
    		
    		if( error_campos.length  == 0 )
    		{


    			


    				 
    		    $.ajax({
                    url: '<?= base_url(); ?>Capacitacion/GuardaGrupo/<?php echo $valor["idCursos"];?>',
                    type: 'POST',
                    dataType: 'json',
                    data: $('#capacitacion').serialize(),
                    cache: false,
                    async: false,
                    success: function(response) {
                        if (response.codigo==200) {
                        	$("#guarda").html("Grupo guardado correctamente..");
                           
                        } else {
                        	$("#resultado").html("Favor de intentar nuevamente..");
                            
                        }
                    },
                    error: function(jqXHR, textStatus, errorThrown) {
                    	$("#resultado").html("Favor de intentar nuevamente..");
                       
                    }
                });
    			
    			
    		}
    		else
    		{	
        		
    			$("#resultado").html("Favor de revisar campos obligatorios marcados con rojo..");


    			
    		}


    		
	  });


</script>