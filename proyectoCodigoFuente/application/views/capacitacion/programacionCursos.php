
<div class="content_generic">
 
    <div style="width: 99%;" class="block_box_gen_capacitacion">
        <h2>Programaci&oacute;n de cursos</h2>
        <br>
        <ul>
        <p><span id="resultado" style="color:red;font-weight: bold;margin-bottom: 15px;"></span></p>
        <br>
            <label style="margin-left: 5px">Nombre de curso:</label>
            
            <?php 
			if(!empty( $Curso ) ):
				foreach($Curso as $valor):
		?>
		  <input style="margin-left: 6%;width:30%"type="text" name="nombreCurso" id="nombreCurso" class="nombreCurso" readonly value="<?php echo $valor["NombreDelCurso"];?>">
				
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
             <select id="Curso" name="Curso" class="sel_curso" style="margin-left: 9.5%;width:30%">
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
        </ul>
    </div>
    <p>
        <a class="btnNextFDP" id="btnReportes">Men&uacute; principal</a>
        <a class="btnNextFDP" id="btnProgramarCurso" href="programarCurso">Programar</a>
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


    			


    				 
       	    	  $.post("<?php echo HOME_URL; ?>eaf/RecursosHumanos/ValidarCuentaBancaria",{
       	         	 id:id
       	          },function(data) {


       	        	  var mensaje=data;
       	              
                         
                         if ($.trim(mensaje)=='error')
                         {
                             
                      	   $("#resultado").html("El Usuario no tiene ninguna cuenta bancaria capturada, capture la cuenta o realice una solicitud de cuenta");
                      	  
                         }
                         else
                         {
                       	  $("#form_fdp_conectxxi").submit();
                         }

       	      });
    			
    			
    		}
    		else
    		{	
        		
    			$("#resultado").html("Favor de revisar campos obligatorios marcados con rojo..");

alert("fer");
    			
    		}


    		
	  });


</script>