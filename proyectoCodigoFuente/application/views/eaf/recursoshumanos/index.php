<div class="content_generic">
	<div class="block_box_gen block_box_gen_rh">
		<h2>Avisos</h2>
		
		<ul>
			<li><a href="#">Aviso 1 , Fecha , Lugar</a></li>
			<li><a href="#">Aviso 2 , Fecha , Lugar</a></li>
			<li><a href="#">Aviso 3 , Fecha , Lugar</a></li>
			<li><a href="#">Aviso 4 , Fecha , Lugar</a></li>
		</ul>
	</div>
	
	
		<?php 
			if( !empty($entrevistasRealizar)):
				
			
				foreach( $entrevistasRealizar as $entrevistas):
					$porEntrevistar = $entrevistas["porEntrevistar"];
					
				endforeach;
				
				
			endif;
		?>
	
	<div class="block_box_gen block_box_gen_rh">
		<h2>Primera entrevista <?php echo $porEntrevistar; ?></h2>
		<ul>
		<?php 
			if(!empty( $entrevistasRealizar ) ):
				foreach($entrevistasRealizar as $entrevistas):
		?>
					<li><a href="<?php echo HOME_URL; ?>eaf/Reclutamiento/candidato/?idCandidatoFDP=<?php echo $entrevistas["idCandidatoFDP"]; ?>"><?php echo $entrevistas["apellidoPaterno"]." ".$entrevistas["apellidoMaterno"]." ".$entrevistas["nombre"]; ?> - <?php echo $entrevistas["puesto_solicitado"] ?></a></li>
		<?php
				endforeach;
			endif;
		?>
		</ul>
	</div>
	
	<div class="block_box_gen block_box_gen_rh">
		<h2>Segunda entrevista</h2>
		<ul>
		<?php 
			if(!empty( $entrevistasRealizarSegundaParte ) ):
				foreach($entrevistasRealizarSegundaParte as $entrevistas):
		?>
					<li><a href="<?php echo HOME_URL; ?>eaf/RecursosHumanos/candidato_rh/?idCandidatoFDP=<?php echo $entrevistas["idCandidatoFDP"]; ?>"><?php echo $entrevistas["apellidoPaterno"]." ".$entrevistas["apellidoMaterno"]." ".$entrevistas["nombre"]; ?> , <?php echo $entrevistas["nombrePuesto"] ?></a></li>
		<?php
				endforeach;
			endif;
		?>
		</ul>
	</div>
	
	<div class="block_box_gen block_box_gen_rh">
		<h2>Movimientos</h2>
		<ul>
		<?php 
			if( !empty($movimientos) ):
				
				
				foreach( $movimientos as $mo ):
				$accion = $mo["estatusCandidato"] ;
				if( $accion == "baja" ):
				?>
									
										<li><a href="<?php echo HOME_URL; ?>eaf/RecursosHumanos/bajausuario/?idBaja=<?php echo $mo["idSolBajal"];?>"><?php echo $mo["nombreCandidato"]." , ".$accion;?> </a></li>
								
								<?php 
									else:
									?>
											<!--<li><?php echo $mo["nombreCandidato"];?> ,<?php echo $accion;?></li>!-->
									
									<?php 
									endif;
								endforeach;
								
								foreach( $movimientos as $mo ):
								$accion = $mo["estatusCandidato"] ;
								if( $accion == "cheque" ):
								?>
																	
																		<li><a href="<?php echo HOME_URL; ?>eaf/RecursosHumanos/ChequeUsuario/?idBaja=<?php echo $mo["idSolBajal"];?>"><?php echo $mo["nombreCandidato"]." , ".$accion;?> </a></li>
																
																<?php 
																	else:
																	?>
																		<!--<li><?php echo $mo["nombreCandidato"];?> ,<?php echo $accion;?></li>!-->
																	
																	<?php 
																	endif;
																endforeach;
																
																foreach( $movimientos as $mo ):
																$accion = $mo["estatusCandidato"] ;
																if( $accion == "Incapacidad" ):
																?>
																																	
																																		<li><a href="<?php echo HOME_URL; ?>eaf/RecursosHumanos/Incapacidad/?idIncapacidad=<?php echo $mo["idIncapacidades"];?>"><?php echo $mo["nombreUsuario"]." , ".$accion;?> </a></li>
																																
																																<?php 
																																	else:
																																	?>
																																		<!--<li><?php echo $mo["nombreUsuario"];?> ,<?php echo $accion;?></li>!-->
																																	
																																	<?php 
																																	endif;
																																endforeach;
																																
																																
																																foreach( $movimientos as $mo ):
																																$accion = $mo["estatusCandidato"] ;
																																if( $accion == "Cambio Sueldo" ):
																																?>
																																																																	
																																																																		<li><a href="<?php echo HOME_URL; ?>eaf/RecursosHumanos/CambioSueldoDetalle/?idCambio=<?php echo $mo["idSolCambioSalario"];?>&User=<?php echo $mo["idUsuarios"];?>"><?php echo $mo["nombreUsuario"]." , ".$accion;?> </a></li>
																																																																
																																																																<?php 
																																																																	else:
																																																																	?>
																																																																		<!--<li><?php echo $mo["nombreUsuario"];?> ,<?php echo $accion;?></li>!-->
																																																																	
																																																																	<?php 
																																																																	endif;
																																																																endforeach;
																																
   foreach( $movimientos as $mo ):
    $accion = $mo["estatusCandidato"] ;
      if( $accion == "Vacaciones" ):
   ?>
																																																																																																																																	
		<li><a href="<?php echo HOME_URL; ?>eaf/RecursosHumanos/Vacaciones/?idVacaciones=<?php echo $mo["idSolVacaciones"];?>&User=<?php echo $mo["idUsuarios"];?>"><?php echo $mo["nombreUsuario"]." , ".$accion;?> </a></li>
																																																																																																																																
    <?php 
	  else:
	  ?>																																																																																																																																	
		<!--<li><?php echo $mo["nombreUsuario"];?> ,<?php echo $accion;?></li>!-->
	<?php 
	  endif;
   endforeach;																																																																																																																																
																																																																																																																																	
				
				
			endif;
		?>
		</ul>
	</div>
	
	
	<div class="block_box_gen block_box_gen_rh">
		<h2>Aprobados</h2>
		<ul>
		<?php 
			if( !empty($movimientos) ):
				foreach( $movimientos as $mo ):
					$accion = ( $mo["estatusCandidato"] == "aprobado" )?"Aprobado":"Rechazado";
					if( $accion == "Aprobado" ):
					?>
					
						<li><a href="<?php echo HOME_URL; ?>eaf/RecursosHumanos/altausuario/?idCandidatoFDP=<?php echo $mo["idCandidatoFDP"];?>"><?php echo $mo["nombreCandidato"]." , ".$accion;?> - <?php echo $mo["Puesto"];?></a></li>
				
				<?php 
					
					endif;
				endforeach;
				endif;
				?>
				
						</ul>
	</div>
	
	<div class="block_box_gen block_box_gen_rh">
		<h2>Rechazados</h2>
		<ul>
		<?php 
			if( !empty($movimientos) ):
				foreach( $movimientos as $mo ):
					$accion = ( $mo["estatusCandidato"] == "aprobado" )?"Aprobado":"Rechazado";
					if( $accion == "Rechazado" ):
					?>
					
						<li><a href="#"><?php echo $mo["nombreCandidato"]." , ".$accion;?> - <?php echo $mo["Puesto"];?></a></li>
				
				<?php 
					
					endif;
				endforeach;
				endif;
				?>
				
						</ul>
	</div>
	
	
	 <center>
	    <div style="padding-top: 61%; "  >
        
 <a  class="btnNextFDP" id="btnAclaracion" href="<?php echo HOME_URL."eaf/RecursosHumanos/BajaPersonal/";?>">Solicitud de baja de empleado</a>
	
            <a class="btnNextFDP" id="btnActualizDatos" href="<?php echo HOME_URL."Administrador/Catalogos"  ?> " >Administraci&oacute;n de Catalogos</a>
            </div>
         </center>
</div>