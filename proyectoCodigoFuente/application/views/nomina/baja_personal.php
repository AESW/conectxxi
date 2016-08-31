<div class="content_generic">

    <br>
    <div style="width: 99%" class="block_box_gen">


        <h2><label>Baja de Usuario - NOI</label></h2>

        <br>
        <form  name="form1" method="POST" action="exportarBaja">
        
            <table cellpadding="0" cellspacing="0" width="100%">
				   
				    <tr>
				     <td style="width:170px;  text-align:center" >Empresa que contrata</td>
					      <td>
						      <select name="empresa_contrata" class="empresa_contrata" id="empresa_contrata" <?php echo ( in_array('empresa_contrata' , $error_campos) )?"style='border:2px solid red;'":""; ?>>
							   
							   <option value="">Selecciona Empresa</option>
								  <?php
									
									  
								  if( !empty($Empresas) ):
								  foreach($Empresas as  $t){
								  ?>
								  		
								  		
								  		 <option value="<?php echo $t->idEmpresas; ?>" <?php if( isset($formArray["empresa_contrata"]) && $formArray["empresa_contrata"] ==  $t->nombreEmpresas ): echo "selected='selected'"; endif;?>><?php echo $t->nombreEmpresas; ?></option>
								  		
								  <?php	  
									  }
									  endif;
								  ?>
							   
						      </select>
					      </td>
				    </tr>
				    </table>
				    <br>
				    <br>
        
        <table id="Usuarios" name="Usuarios" style="border-collapse:collapse;margin-left:1%" cellpadding="0" cellspacing="0" width="100%" >
            <tr>
             
                <th>NOMBRE</th>
               
                <th>PUESTO</th>
               
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
        
        
       
        

        <a class="btnNextFDP" id="btnMenu">Men&uacute; principal</a>
       
       <input class="btnNextFDP" type="submit" value="Exportar">
       </form>
        <br>
        <br>
        <br>
        
    </div>
    
    <script type="text/javascript">
    
        $(document).ready(function() {
            
            $("#empresa_contrata").change(function() {
                $("#empresa_contrata option:selected").each(function() {
                    empresa = $('#empresa_contrata').val();
                   
                    $.post("<?php echo HOME_URL; ?>Nomina/UsuariosEmpresaBaja", {
                    	empresa : empresa
                    }, function(data) {
                        $("#Usuarios").html(data);
                   });

                 				
                   
                });
            })
        });
    </script>