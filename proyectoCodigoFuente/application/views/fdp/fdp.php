	<script type="text/javascript">
    $(document).ready( function() {
      $('#tab-container').easytabs();
    });
  </script>
	<div class="formulario_fdp">
		<div id="tab-container" class="tab-container">
		  	<ul class='etabs'>
			    <li class='tab'><a href="#tabs1-paso1">Paso 1</a></li>
			    <li class='tab'><a href="#tabs1-paso2">Paso 2</a></li>
			    <li class='tab'><a href="#tabs1-paso3">Paso 3</a></li>
		  	</ul>
		  	<div class='panel-container'>
			  <form>
			  <div id="tabs1-paso1">
			    <h2><label>Nombre</label></h2>
			    <table cellpadding="0" cellspacing="0" width="100%">
				    <tr>
					    <td>Nombre (s)</td>
					    <td><input type="text" class="nombre_candidato" id="nombre_candidato" placeholder="Nombre (s)" autocomplete="off" required></td>
					    <td>Apellido paterno</td>
					    <td><input type="text" class="apellido_paterno_candidato" id="apellido_paterno_candidato" placeholder="Apellido" autocomplete="off" required></td>
				    </tr>
				    <tr>
					    <td>Apellido materno</td>
					    <td><input type="text" class="apellido_materno_candidato" id="apellido_materno_candidato" placeholder="Apellido" autocomplete="off" required></td>
					    <td>Nombre preferido</td>
					    <td><input type="text" class="nombre_preferido_candidato" id="nombre_preferido_candidato" placeholder="Nombre preferido" autocomplete="off" required></td>
				    </tr>
			    </table>
			    
			     <h2><label>Información biográfica</label></h2>
			     <table cellpadding="0" cellspacing="0" width="100%">
				     <tr>
					     <td>Fecha de nacimiento</td>
				     </tr>
			     </table>    
			     
			     
			    <!-- content -->
			  </div>
			  <div id="tabs1-paso2">
			    <h2>JS for these tabs</h2>
			    <!-- content -->
			  </div>
			  <div id="tabs1-paso3">
			    <h2>CSS Styles for these tabs</h2>
			    <!-- content -->
			  </div>
			  
			  </form>
		  </div>
		</div>
	</div>