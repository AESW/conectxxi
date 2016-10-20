<div class="content_generic">
	<div class="block_box_gen block_box_gen_ger">
		<h2>Avisos</h2>
		
		<ul>
			<li><a href="#">Aviso 1 , Fecha , Lugar</a></li>
			<li><a href="#">Aviso 2 , Fecha , Lugar</a></li>
			<li><a href="#">Aviso 3 , Fecha , Lugar</a></li>
			<li><a href="#">Aviso 4 , Fecha , Lugar</a></li>
		</ul>
	</div>
	
	<div class="block_box_gen block_box_gen_ger">
		<h2>Solicitud de Autorizaciones</h2>
		<ul>
		<?php 
			if(!empty( $SolicitudPersonal ) ):
				foreach($SolicitudPersonal as $vacante):
		?>
					<li><a href="<?php echo HOME_URL; ?>Direccion/VacanteDetalle/?idVacante=<?php echo $vacante["idVacantesPeticiones"];?>"><?php echo $vacante["nombrePuesto"]; ?> - Sol. nuevo empleado - <?php echo $vacante["nombreUsuario"]; ?></a></li>
		<?php
				endforeach;
			endif;
		?>
		
		<?php 
			if(!empty( $cambiosSueldo ) ):
				foreach($cambiosSueldo as $valorSueldo):
		?>
					<li><a href="<?php echo HOME_URL; ?>Direccion/CambioSuledoDetalle/?idCambio=<?php echo $valorSueldo["idSolCambioSalario"];?>&User=<?php echo $valorSueldo["idUsuarios"];?>">Sol. Cambio de sueldo - <?php echo $valorSueldo["nombreUsuario"]; ?></a></li>
		<?php
				endforeach;
			endif;
		?>
		
		
		</ul>
	</div>
	

	
	<div class="block_box_gen block_box_gen_ger">
		<h2>Cotrol de Asistencia</h2>
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
						<li>'.$mo["nombreCandidato"]." , ".$accion.'</li>';
					
					<?php 
					endif;
				endforeach;
			endif;
		?>
		</ul>
	</div>
</div>