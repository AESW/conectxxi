<div class="content_generic">

    <div style="width: 99%" class="block_box_gen">


        <h2><label>Cambios de salario - NOI</label></h2>
        <br>
        <form  name="form1" method="POST" action="exportar">
        
        
        
        <table id="Usuarios" name="Usuarios" style="border-collapse:collapse;margin-left:1%" cellpadding="0" cellspacing="0" width="100%" >
            <tr>
                <th>PATERNO</th>
                <th>MATERNO</th>
                <th>NOMBRE</th>
                <th>SDI</th>
                <th>PUESTO</th>
                <th>FECHA NACIMIENTO</th>
                <th>REG. PATRONAL</th>
                <th>OFICINA</th>
                <th>SELECCIONAR</th>      
</tr>
             
            
            	<?php 
								
								  if( !empty($DatosUsuario) ):
								  foreach($DatosUsuario as  $t){
								  	?>
								  
					 <tr> 			  	           
                <td><?php echo $t->apeliidoPaterno; ?></td>
                <td><?php echo $t->apellidoMaterno; ?></td>
                <td><?php echo $t->nombre; ?></td>
                <td><?php echo $t->sdi; ?></td>
                <td><?php echo $t->puesto; ?></td>
                <td><?php echo $t->fechaNacimiento; ?></td>
                <td><?php echo $t->patronal; ?></td>
                <td><?php echo $t->oficina; ?></td>
                <td><center> <input type="checkbox" name="asistencia" value="1" checked></center></td>
                  </tr>  
                  <?php	  
								  }
									  endif;
								  ?> 
                
                
                

  
        </table>
        <br>
        <br>
        
        
       
        <center>

       <input class="btnNextFDP" type="submit" value="Exportar">
          <a class="btnNextFDP" href="<?php echo HOME_URL; ?>" id="btnMenu">Men&uacute; principal</a>
       </center>
       </form>
       
        
    </div>
    
    <script type="text/javascript">
    
        $(document).ready(function() {
            
            $("#empresa_contrata").change(function() {
                $("#empresa_contrata option:selected").each(function() {
                    empresa = $('#empresa_contrata').val();
                    $.post("<?php echo HOME_URL; ?>Nomina/UsuariosEmpresa", {
                    	empresa : empresa
                    }, function(data) {
                        $("#Usuarios").html(data);
                   });

                 				
                   
                });
            })
        });
    </script>