<div class="content_generic">
	<div class="block_box_gen block_box_gen_ger">
		<h2>Avisos</h2>
		
		<ul>
			<li><a href="#">Aviso 1 , Fecha , Lugar</a></li>
			
		</ul>
	</div>
	
	<div class="block_box_gen block_box_gen_ger">
		<h2>Solicitud de Autorizaciones</h2>
		<ul>
		<?php 
			if(!empty( $autorizaciones ) ):
		      foreach($autorizaciones as $datos):
		      $accion = $datos["autorizacion"] ;
			  if( $accion == "permiso" ):
		?>
						<li><a href="<?php echo HOME_URL; ?>Gerente/Permiso/?idPermiso=<?php echo $datos["IdPermiso"];?>"><?php echo $datos["nombreUsuario"]." , Autorización de ".$accion; ?> </a></li>
					
					<?php 
					endif;
					
					if( $accion == "descanso" ):
					?>
						<li><a href="<?php echo HOME_URL; ?>Gerente/Descanso/?idDescanso=<?php echo $datos["idSolDiaDescanso"];?>"><?php echo $datos["nombreUsuario"]." , Autorización de ".$accion;?> </a></li>
								
							<?php 
							endif;
										
						if( $accion == "turno" ):
										?>
						<li><a href="<?php echo HOME_URL; ?>Gerente/Turno/?idTurno=<?php echo $datos["idSolCambioTurno"];?>"><?php echo $datos["nombreUsuario"]." , Autorización de ".$accion;?></a></li>
															
															<?php 
															endif;
															
		                if( $accion == "vacaciones" ):
															?>
					    <li><a href="<?php echo HOME_URL; ?>Gerente/Vacaciones/?idVacaciones=<?php echo $datos["idSolVacaciones"];?>"><?php echo $datos["nombreUsuario"]." , Autorización de ".$accion;?></a></li>
																														
																														<?php 
																														endif;
					
		
				endforeach;
			endif;
		?>
		</ul>
	</div>
	

	
	<div class="block_box_gen block_box_gen_ger">
		<h2>Control de Asistencia</h2>
		<ul>
		<?php 
			if( !empty($movimientos) ):
				foreach( $movimientos as $mo ):
					$accion = ( $mo["estatusCandidato"] == "aprobado" )?"Aprobado":"Rechazado";
					if( $accion == "Aprobado" ):
					?>
					
						<li><a href="<?php echo HOME_URL; ?>eaf/RecursosHumanos/altausuario/?idCandidatoFDP=<?php echo $mo["idCandidatoFDP"];?>"><?php echo $mo["nombreCandidato"]." , ".$accion;?></a></li>
				
				<?php 
					else:
					?>
						
					
					<?php 
					endif;
				endforeach;
			endif;
		?>
		</ul>
	</div>
	<center>
	<div style="padding-top: 35%; ">
	
    <a  class="btnNextFDP" id="btnAclaracion" href="<?php echo HOME_URL."Movimientos/NuevoPersonal/";?>">Solicitud de nuevo empleado</a>
	
	  <a  class="btnNextFDP" id="btnAclaracion" href="<?php echo HOME_URL."Gerente/incapacidad/";?>">Alta de incapacidades</a>
	
	
	  <a  class="btnNextFDP" id="btnAclaracion" href="<?php echo HOME_URL."Gerente/BajaPersonal/";?>">Solicitud de baja de empleado</a>
	  
	    <a  class="btnNextFDP" id="btnAclaracion" href="<?php echo HOME_URL."Gerente/CambioSalario/";?>">Solicitud de cambio de salario</a>
	
	</div>
	</center>
</div>