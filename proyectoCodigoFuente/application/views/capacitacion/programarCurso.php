  
<div class="content_generic">
    <form id="formCapacitacion">
    <div style="width: 99%" class="block_box_gen">
        <h2>Programaci&oacute;n de cursos</h2>
        <br>
        <center>
            <label style="margin-left: 5px">Seleccione el curso de inducci&oacute;n que realizar&aacute;</label>
            <ul>
                <select id="Curso" name="Curso" class="sel_curso">
                    <option value="">Seleccione Curso</option>
                    
                    <?php 
			if(!empty( $Cursos ) ):
				foreach($Cursos as $entrevistas):
		?>
					
					 <option value="<?php echo $entrevistas["idCursos"];?>"><?php echo $entrevistas["NombreDelCurso"];?></option>
					
		<?php
				endforeach;
			endif;
		?>
                    
                    
                                    </select>
            </ul>
        </center>
    </div>   
    <a class="btnNextFDP" id="btnMenu" href="<?php echo HOME_URL; ?>capacitacion">Men&uacute; principal</a>
    <a class="btnNextFDP" id="btnProgramar">Programar curso</a>
    
    </form>
    
</div>


 <script type="text/javascript">	               

	
	

           $('#btnProgramar').click(function(event) {

        	//   if ($('#formGerente').valid()) {


        		//   event.preventDefault();

        var valor = $("#Curso option:selected").val();

        

        if (valor!="")
            
        {


        	 url = "<?php echo HOME_URL; ?>Capacitacion/programacionCursos/"+valor;
           
        	 window.location.href = url;

        	   } else {
        	         alert("Favor de seleccionar un Curso");
        	     }   
        		
           });



           
        </script>	