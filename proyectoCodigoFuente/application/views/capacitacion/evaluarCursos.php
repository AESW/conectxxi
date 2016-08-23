
<div class="content_generic">
   
    <div style="width: 99%" class="block_box_gen">
        <h2>Evaluaci&oacute;n de cursos</h2>
        <br>
          <form  name="form1" id="form1" >
   <p><span id="resultado" style="color:red;font-weight: bold;margin-bottom: 15px;"></span></p>
        <p><span id="guarda" style="font-weight: bold; text-align: center;font-size: 13pt; color: #00db05"></span></p>
        <br>
          <input style="margin-left: 5.5%"type="hidden" name="idcurso" id="idcurso" class="idcurso" value="<?php echo $idCurso; ?>">
            <input style="margin-left: 5.5%"type="hidden" name="idusuario" id="idusuario" class="idusuario" value="<?php echo $idUsuario; ?>">
        <label style="margin-left: 5px">Curso:</label>
             <?php 
                    foreach($Curso as $fila)
							{
								?>
								
		              <input style="margin-left: 5.5%"type="text" name="nombreCurso" id="nombreCurso" class="nombreCurso" value="<?php echo $fila['NombreDelCurso']; ?>">
		             
					            <?php
					            }
					        	 
					        
                  ?>
        
      
        <br>
        <br>
        <label style="margin-left: 5px"> Nombre del empleado:</label>
         <?php 
                    foreach($usuarios as $fila)
							{
								?>
								
		             <input style="margin-left: 1%" type="text" name="nomEmp" id="nomEmp" class="nomEmp" value="<?php echo $fila['nombreUsuario']; ?>">
					            <?php
					            }
					        	 
					        
                  ?>
          <a class="btnNextFDP" id="btnMenu">Men&uacute; principal</a>
        <a class="btnNextFDP" id="btnEvaluar" href="#">Evaluar</a>
        <br>
        <br>
        <h2>Captura de resultados</h2>
        <br>
        <table cellpadding="0" cellspacing="0" width="80%">
           <?php 
                    foreach($temas as $fila)
							{
								?>
          
          
            <tr>
                <td style="text-align:right;"> <label style="margin-left: -200px;  width:60%;height:23px;" > <?php echo $fila['NombreDelTema']; ?></label></td>
                <td  style="text-align:center;"><input type="text" name="calificacion[]" class="codEti" value="<?php echo $fila['ValorMinimo']; ?>" id="calificacion" style=" width:40px;height:23px;">
                <input type="hidden" name="tema[]" class="codEti" value="<?php echo $fila['NombreDelTema']; ?>" id="tema" style=" width:40px;height:23px;"></td>
                
            </tr>
            
             <?php
					            }
					        	 
					        
                  ?>
           
        </table>

        <br>
        <h2>Evaluaci&oacute;n</h2>                  
        <br>
         <textarea style="text-align:center; float: right; margin-right: 60px" name="observaciones" id="observaciones" rows="9" cols="40" placeholder="Observaciones" ></textarea>	
              <br>
        <p style="margin-left: 20px">&iquest;Curso aprobado?</p>
         <br>
       
        <input type="radio" name="cursoAprob" id="cursoAprob" value="1" style="margin-left: 60px" checked >Aprobado 
        <br>
        <input type="radio" name="cursoAprob" id="cursoAprob" value="2" style="margin-left: 60px">Reprogramar
        
        <br>
        <input type="radio" name="cursoAprob" id="cursoAprob" value="3" style="margin-left: 60px">No Aprobado
       
      
        </form>
       
        </div>	
   
       
</div>


  
      <script type="text/javascript">
$("#btnEvaluar").click(function(){

    	
    				 
    		    $.ajax({
                    url: '<?= base_url(); ?>Capacitacion/GuardaEvaluacionCurso',
                    type: 'POST',
                    dataType: 'json',
                    data: $('#form1').serialize(),
                    cache: false,
                    async: false,
                    success: function(response) {
                        if (response.codigo==200) {
                        	$("#guarda").html("Evaluación guardada correctamente");
                           
                        } else {
                        	$("#resultado").html("Favor de intentar nuevamente..");
                            
                        }
                    },
                    error: function(jqXHR, textStatus, errorThrown) {
                    //	$("#resultado").html("Favor de intentar nuevamente..");
                       alert(jqXHR.responseText);
                    }
                });
    			
    		


    		
	  });


</script>