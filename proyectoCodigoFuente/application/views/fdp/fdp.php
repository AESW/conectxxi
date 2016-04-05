	<script type="text/javascript">
    $(document).ready( function() {
      $('#tab-container').easytabs();
      $(".btnNextFDP").click(function(){
	      $('.page').ScrollTo();
	      $(".step2").trigger("click");
	      
      });
    });
  </script>
	<div class="formulario_fdp">
		<div id="tab-container" class="tab-container">
		  	<ul class='etabs'>
			    <li class='tab'><a href="#tabs1-paso1" class="step1">Paso 1</a></li>
			    <li class='tab'><a href="#tabs1-paso2" class="step2">Paso 2</a></li>
			    <li class='tab'><a href="#tabs1-paso3" class="step3">Paso 3</a></li>
		  	</ul>
		  	<div class='panel-container'>
			  <form>
			  <!-- Paso 1 -->
			  <div id="tabs1-paso1">
			    <h2><label>Nombre</label></h2>
			    <table cellpadding="0" cellspacing="0" width="100%">
				    <tr>
					    <td>Nombre (s)</td>
					    <td><input type="text" name="nombre_candidato" class="nombre_candidato" id="nombre_candidato" placeholder="Nombre (s)" autocomplete="off" required></td>
					    <td>Apellido paterno</td>
					    <td><input type="text" name="apellido_paterno_candidato" class="apellido_paterno_candidato" id="apellido_paterno_candidato" placeholder="Apellido" autocomplete="off" required></td>
				    </tr>
				    <tr>
					    <td>Apellido materno</td>
					    <td><input type="text" name="apellido_materno_candidato" class="apellido_materno_candidato" id="apellido_materno_candidato" placeholder="Apellido" autocomplete="off" required></td>
					    <td>Nombre preferido</td>
					    <td><input type="text" name="nombre_preferido_candidato" class="nombre_preferido_candidato" id="nombre_preferido_candidato" placeholder="Nombre preferido" autocomplete="off" required></td>
				    </tr>
			    </table>
			    
			     <h2><label>Información biográfica</label></h2>
			     <table cellpadding="0" cellspacing="0" width="100%">
				     <tr>
					     <td>Fecha de nacimiento</td>
					     <td><input type="text" name="fecha_nacimiento_candidato" class="fecha_nacimiento_candidato" id="fecha_nacimiento_candidato" placeholder="dd/mm/YYYY" autocomplete="off" required></td>
					     <td>País de nacimiento</td>
					     <td>
						     <select name="pais_nacimiento_candidato" class="pais_nacimiento_candidato" id="pais_nacimiento_candidato">
							     <option value="">Seleccionar país</option>
							     <option value="USA">Estados Unidos de América</option>
							     <option value="Mexico">México</option>
							     <option value="Otro">Otro</option>
						     </select>
					     </td>
				     </tr>
				     <tr>
					     <td>Estado de nacimiento</td>
					     <td>
						     <select name="estado_nacimiento_candidato" class="estado_nacimiento_candidato" id="estado_nacimiento_candidato">
							    <option value="">Seleccionar estado</option>
							    <option value="Aguascalientes">Aguascalientes</option>
								<option value="Baja California">Baja California</option>
								<option value="Baja California Sur">Baja California Sur</option>
								<option value="Campeche">Campeche</option>
								<option value="Chiapas">Chiapas</option>
								<option value="Chihuahua">Chihuahua</option>
								<option value="Coahuila">Coahuila</option>
								<option value="Colima">Colima</option>
								<option value="Distrito Federal">Distrito Federal</option>
								<option value="Durango">Durango</option>
								<option value="Estado de México">Estado de México</option>
								<option value="Guanajuato">Guanajuato</option>
								<option value="Guerrero">Guerrero</option>
								<option value="Hidalgo">Hidalgo</option>
								<option value="Jalisco">Jalisco</option>
								<option value="Michoacán">Michoacán</option>
								<option value="Morelos">Morelos</option>
								<option value="Nayarit">Nayarit</option>
								<option value="Nuevo León">Nuevo León</option>
								<option value="Oaxaca">Oaxaca</option>
								<option value="Puebla">Puebla</option>
								<option value="Querétaro">Querétaro</option>
								<option value="Quintana Roo">Quintana Roo</option>
								<option value="San Luis Potosí">San Luis Potosí</option>
								<option value="Sinaloa">Sinaloa</option>
								<option value="Sonora">Sonora</option>
								<option value="Tabasco">Tabasco</option>
								<option value="Tamaulipas">Tamaulipas</option>
								<option value="Tlaxcala">Tlaxcala</option>
								<option value="Veracruz">Veracruz</option>
								<option value="Yucatán">Yucatán</option>
								<option value="Zacatecas">Zacatecas</option>
						     </select>
					     </td>
					      <td>Género</td>
					      <td>
						      <select name="genero_candidato" class="genero_candidato" id="genero_candidato">
							      <option value="">Seleccionar género</option>
							      <option value="Mujer">Mujer</option>
							      <option value="Hombre">Hombre</option>
						      </select>
					      </td>
				     </tr>
				     
				     <tr>
					     <td>Nivel educativo</td>
					     <td>
						      <select name="nivel_educativo_candidato" class="nivel_educativo_candidato" id="nivel_educativo_candidato">
							      <option value="">Seleccionar nivel educativo</option>
							      <option value="Licenciatura">Licenciatura</option>
							      <option value="Bachillerato">Bachillerato</option>
							      <option value="Tecnico">Técnico</option>
							      <option value="Secundaria">Secundaria</option>
							      <option value="Primaria">Primaria</option>
						      </select>
					      </td>
					      <td>Estado civil</td>
					     <td>
						      <select name="estado_civil_candidato" class="estado_civil_candidato" id="estado_civil_candidato">
							      <option value="">Seleccionar estado civil</option>
							      <option value="Soltero">Soltero</option>
							      <option value="Casado">Casado</option>
						      </select>
					      </td>
				     </tr>
			     </table>    
			     
			     <h2><label>Números de identificación y seguro social</label></h2>
			     <table cellpadding="0" cellspacing="0" width="100%">
				     <tr>
					    <td>R.F.C.</td>
					    <td><input type="text" name="rfc_candidato" class="rfc_candidato" id="rfc_candidato" placeholder="R.F.C." autocomplete="off" required></td>
					    <td>CURP</td>
					    <td><input type="text" name="curp_candidato" class="curp_candidato" id="curp_candidato" placeholder="C.U.R.P." autocomplete="off" required></td>
				    </tr>
				    <tr>
					    <td>Número de seguro social</td>
					    <td><input type="text" name="numero_segurosocial_candidato" class="numero_segurosocial_candidato" id="numero_segurosocial_candidato" placeholder="NSS" autocomplete="off" required></td>
					    
				    </tr>
			     </table>    
			     
			     <h2><label>Domicilio</label></h2>
			     <table cellpadding="0" cellspacing="0" width="100%">
				     <tr>
					     <td colspan="4" style="text-align: center;padding: 5px;color:#666;font-size: 10pt;">Ingresa el Código postal para seleccionar delegación o municipio</td>
				     </tr>
				     <tr>
					    <td>Calle y número</td>
					    <td><input type="text" name="calle_no_candidato" class="calle_no_candidato" id="calle_no_candidato" placeholder="Calle y número" autocomplete="off" required></td>
					    <td>Código Postal</td>
					    <td><input type="text" name="cp_candidato" class="cp_candidato" id="cp_candidato" placeholder="C.P." autocomplete="off" required></td>
				    </tr>
				    <tr>
					    <td>Estado</td>
					    <td>
						    <select name="estado_domicilio_candidato" class="estado_domicilio_candidato" id="estado_domicilio_candidato">
							    <option value="">Seleccionar estado</option>
							    <option value="Aguascalientes">Aguascalientes</option>
								<option value="Baja California">Baja California</option>
								<option value="Baja California Sur">Baja California Sur</option>
								<option value="Campeche">Campeche</option>
								<option value="Chiapas">Chiapas</option>
								<option value="Chihuahua">Chihuahua</option>
								<option value="Coahuila">Coahuila</option>
								<option value="Colima">Colima</option>
								<option value="Distrito Federal">Distrito Federal</option>
								<option value="Durango">Durango</option>
								<option value="Estado de México">Estado de México</option>
								<option value="Guanajuato">Guanajuato</option>
								<option value="Guerrero">Guerrero</option>
								<option value="Hidalgo">Hidalgo</option>
								<option value="Jalisco">Jalisco</option>
								<option value="Michoacán">Michoacán</option>
								<option value="Morelos">Morelos</option>
								<option value="Nayarit">Nayarit</option>
								<option value="Nuevo León">Nuevo León</option>
								<option value="Oaxaca">Oaxaca</option>
								<option value="Puebla">Puebla</option>
								<option value="Querétaro">Querétaro</option>
								<option value="Quintana Roo">Quintana Roo</option>
								<option value="San Luis Potosí">San Luis Potosí</option>
								<option value="Sinaloa">Sinaloa</option>
								<option value="Sonora">Sonora</option>
								<option value="Tabasco">Tabasco</option>
								<option value="Tamaulipas">Tamaulipas</option>
								<option value="Tlaxcala">Tlaxcala</option>
								<option value="Veracruz">Veracruz</option>
								<option value="Yucatán">Yucatán</option>
								<option value="Zacatecas">Zacatecas</option>
						     </select>
					    </td>
					    <td>Ciudad</td>
					    <td><input type="text" name="ciudad_domicilio_candidato" class="ciudad_domicilio_candidato" id="ciudad_domicilio_candidato" placeholder="Ciudad" autocomplete="off" required></td>
				    </tr>
				    <tr>
					    <td>Municipio o delegación</td>
					    <td>
						   <select name="delegacion_domicilio_candidato" class="delegacion_domicilio_candidato" id="delegacion_domicilio_candidato">
							   <option value="">Seleccionar delegación o municipio</option> 
						   </select>
					    </td>
					    <td>Colonia</td>
					    <td><input type="text" name="colonia_domicilio_candidato" class="colonia_domicilio_candidato" id="colonia_domicilio_candidato" placeholder="Colonia" autocomplete="off" required></td>
				    </tr>
			     </table>
			     
			     <a class="btnNextFDP">Continuar</a>
			    <!-- content -->
			  </div>
			  <!-- End Paso 1 -->
			  
			  <!-- Paso 2 -->
			  <div id="tabs1-paso2">
			    <h2><label>Datos de la vivienda</label></h2>
			    <table cellpadding="0" cellspacing="0" width="100%">
				    <tr>
					    <td>No. de baños</td>
					    <td>
						    <select name="no_banios_candidato" class="no_banios_candidato" id="no_banios_candidato">
							   <option value="">Seleccionar no. de baños</option> 
							   <option value="0">No tiene</option>
							   <option value="1">1</option>
							   <option value="2">2</option>
							   <option value="3">3</option>
							   <option value="4">4+</option>
						   </select>
					    </td>
					    
					    <td>Escolaridad jefe de familia</td>
					    <td>
						    <select name="escolaridad_jefefamilia_candidato" class="escolaridad_jefefamilia_candidato" id="escolaridad_jefefamilia_candidato">
							   <option value="">Seleccionar escolaridad</option> 
							   <option value="SinInstruccion">Sin instrucción</option>
							   <option value="primaria_secundaria">Primaria o secundaria, completa o incompleta</option>
							   <option value="tecnico_preparatoria">Carrera técnica, preparatoria completa o incompleta</option>
							   <option value="licenciatura">Licenciatura completa o incompleta</option>
							   <option value="posgrado">Posgrado</option>
						   </select>
					    </td>
				    </tr>  
				    
				    <tr>
					    <td>Automóvil</td>
					    <td>
						    <select name="automovil_candidato" class="automovil_candidato" id="automovil_candidato">
							   <option value="">Seleccionar no. de autos</option> 
							   <option value="0">No tiene</option>
							   <option value="1">1</option>
							   <option value="2">2</option>
							   <option value="3">3</option>
							   <option value="4">4+</option>
						   </select>
					    </td>
					    
					    <td>Focos</td>
					    <td>
						    <select name="focos_vivienda_candidato" class="focos_vivienda_candidato" id="focos_vivienda_candidato">
							   <option value="">Seleccionar no. de focos</option> 
							   <option value="5menos">5 o menos</option>
							   <option value="6-10">6-10</option>
							   <option value="11-15">11-15</option>
							   <option value="16-20">16-20</option>
							   <option value="21+">21 o más</option>
						   </select>
					    </td>
				    </tr>   
				    
				    <tr>
					    <td>TV Color</td>
					    <td>
						    <select name="automovil_candidato" class="automovil_candidato" id="automovil_candidato">
							   <option value="">Seleccionar no. de TV's</option> 
							   <option value="0">No tiene</option>
							   <option value="1">1</option>
							   <option value="2">2</option>
							   <option value="3">3</option>
							   <option value="4">4+</option>
						   </select>
					    </td>
					    
					    <td>Piso distinto a tierra o cemento</td>
					    <td>
						    <select name="piso_vivienda_candidato" class="piso_vivienda_candidato" id="piso_vivienda_candidato">
							   <option value="">Seleccionar opción</option> 
							   <option value="setiene">Se tiene</option>
							   <option value="nosetiene">No se tiene</option>
						   </select>
					    </td>
				    </tr>
				    
				    <tr>
					    <td>Computadora</td>
					    <td>
						    <select name="computadora_candidato" class="computadora_candidato" id="computadora_candidato">
							   <option value="">Seleccionar no. de computadoras</option> 
							   <option value="0">No tiene</option>
							   <option value="1">1</option>
							   <option value="2">2</option>
							   <option value="3">3</option>
							   <option value="4">4+</option>
						   </select>
					    </td>
					    
					    <td>Regadera</td>
					    <td>
						    <select name="regadera_vivienda_candidato" class="regadera_vivienda_candidato" id="regadera_vivienda_candidato">
							   <option value="">Seleccionar opción</option> 
							   <option value="setiene">Se tiene</option>
							   <option value="nosetiene">No se tiene</option>
						   </select>
					    </td>
				    </tr>
				    
				    <tr>
					    <td>Cuartos</td>
					    <td>
						    <select name="cuartos_vivienda_candidato" class="cuartos_vivienda_candidato" id="cuartos_vivienda_candidato">
							   <option value="">Seleccionar no. de cuartos</option> 
							   <option value="0">No tiene</option>
							   <option value="1">1</option>
							   <option value="2">2</option>
							   <option value="3">3</option>
							   <option value="4">4+</option>
						   </select>
					    </td>
					    
					    <td>Estufa</td>
					    <td>
						    <select name="estufa_vivienda_candidato" class="estufa_vivienda_candidato" id="estufa_vivienda_candidato">
							   <option value="">Seleccionar opción</option> 
							   <option value="setiene">Se tiene</option>
							   <option value="nosetiene">No se tiene</option>
						   </select>
					    </td>
				    </tr>
			    </table>
			    
			    <h2><label>Experiencia Laboral</label></h2>
			    <table cellpadding="0" cellspacing="0" width="100%">
				    <tr>
					    <td>Empleo anterior</td>
					    <td><input type="text" name="empleo_anterior1_candidato" class="empleo_anterior1_candidato" id="empleo_anterior1_candidato" placeholder="Empleo anterior" autocomplete="off" required></td>
					    <td colspan="2">
						    Descripción de Actividades
						    <br/>
						    <textarea name="descripcion_empleo1_candidato" class="descripcion_empleo1_candidato" id="descripcion_empleo1_candidato" placeholder="Ingresa tus actividades aquí" required></textarea>
					    </td>
					    
				    </tr>
				    <tr>
					    <td>Teléfono</td>
					    <td><input type="text" name="telefono_empleo1_candidato" class="empleo_anterior1_candidato" id="empleo_anterior1_candidato" placeholder="Teléfono empleo anterior" autocomplete="off" required></td>
				    </tr>
				    <tr>
					    <td>Contacto</td>
					    <td><input type="text" name="contacto_empleo1_candidato" class="contacto_empleo1_candidato" id="contacto_empleo1_candidato" placeholder="Contacto empleo anterior" autocomplete="off" required></td>
				    </tr>
				    <tr>
					    <td colspan="4">
						    <hr>
					    </td>
				    </tr>
				    <tr>
					    <td>Empleo anterior</td>
					    <td><input type="text" name="empleo_anterior2_candidato" class="empleo_anterior2_candidato" id="empleo_anterior2_candidato" placeholder="Empleo anterior" autocomplete="off" required></td>
					    <td colspan="2">
						    Descripción de Actividades
						    <br/>
						    <textarea name="descripcion_empleo2_candidato" class="descripcion_empleo2_candidato" id="descripcion_empleo2_candidato" placeholder="Ingresa tus actividades aquí" required></textarea>
					    </td>
					    
				    </tr>
				    <tr>
					    <td>Teléfono</td>
					    <td><input type="text" name="telefono_empleo2_candidato" class="empleo_anterior2_candidato" id="empleo_anterior2_candidato" placeholder="Teléfono empleo anterior" autocomplete="off" required></td>
				    </tr>
				    <tr>
					    <td>Contacto</td>
					    <td><input type="text" name="contacto_empleo2_candidato" class="contacto_empleo2_candidato" id="contacto_empleo2_candidato" placeholder="Contacto empleo anterior" autocomplete="off" required></td>
				    </tr>
				    <tr>
					    <td colspan="4">
						    <hr>
					    </td>
				    </tr>
				     <tr>
					    <td>Empleo anterior</td>
					    <td><input type="text" name="empleo_anterior3_candidato" class="empleo_anterior3_candidato" id="empleo_anterior3_candidato" placeholder="Empleo anterior" autocomplete="off" required></td>
					    <td colspan="2">
						    Descripción de Actividades
						    <br/>
						    <textarea name="descripcion_empleo3_candidato" class="descripcion_empleo3_candidato" id="descripcion_empleo3_candidato" placeholder="Ingresa tus actividades aquí" required></textarea>
					    </td>
					    
				    </tr>
				    <tr>
					    <td>Teléfono</td>
					    <td><input type="text" name="telefono_empleo3_candidato" class="empleo_anterior3_candidato" id="empleo_anterior3_candidato" placeholder="Teléfono empleo anterior" autocomplete="off" required></td>
				    </tr>
				    <tr>
					    <td>Contacto</td>
					    <td><input type="text" name="contacto_empleo3_candidato" class="contacto_empleo3_candidato" id="contacto_empleo3_candidato" placeholder="Contacto empleo anterior" autocomplete="off" required></td>
				    </tr>
			    </table>
			    
			    <h2><label>Datos de contacto del candidato</label></h2>
			    <!-- content -->
			  </div>
			  <!-- End Paso 2 -->
			  
			  <div id="tabs1-paso3">
			    <h2>CSS Styles for these tabs</h2>
			    <!-- content -->
			  </div>
			  
			  </form>
		  </div>
		</div>
	</div>