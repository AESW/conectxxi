<?php
	//print_r($accionesReclutamiento);	
?>
<div class="content_generic">
	<div class="block_box_gen">
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
	
	
	<div class="block_box_gen">
		<h2>Entrevistas por realizar: <?php echo $porEntrevistar; ?></h2>
		<ul>
		<?php 
			if(!empty( $entrevistasRealizar ) ):
				foreach($entrevistasRealizar as $entrevistas):
		?>
					<li><a href="<?php echo HOME_URL; ?>eaf/reclutamiento/candidato/?idCandidatoFDP=<?php echo $entrevistas["idCandidatoFDP"]; ?>"><?php echo $entrevistas["apellidoPaterno"]." ".$entrevistas["apellidoMaterno"]." ".$entrevistas["nombre"]; ?> , <?php echo $entrevistas["nombrePuesto"] ?> - <?php echo $entrevistas["puesto_solicitado"] ?></a></li>
		<?php
				endforeach;
			endif;
		?>
		</ul>
	</div>
	
	
	
	<?php 
			if( !empty($peticionesVacantes)):
				
			
				foreach( $peticionesVacantes as $peticiones):
					$porCubrir = $peticiones["porCubrir"];
					
				endforeach;
				
				
			endif;
		?>
	
	
	
	<div class="block_box_gen">
		<h2>Vacantes que cubrir: <?php echo $porCubrir; ?> </h2>
		<ul>
		<?php 
			if( !empty($peticionesVacantes)):
				
				//$$valoresUnicosPorPuesto = array();
				
				foreach( $peticionesVacantes as $peticiones):
					//$valoresUnicosPorPuesto[] = $peticiones["nombrePuesto"];
		?>
					<li><?php echo $peticiones["nombrePuesto"]; ?> - <?php echo $peticiones["nombreUsuario"]; ?> - No.de vacantes: <?php echo $peticiones["numeroVacantes"]-$peticiones["vacantesContratados"]; ?></li>
		<?php			
				endforeach;
				
				//$contadorPuestos = repeatedElements($valoresUnicosPorPuesto);
				
				foreach($contadorPuestos as $contador):
					/*<li><a><?php echo "( ". $contador["count"]." ) para ".$contador["value"]; ?></a></li>*/
				endforeach;
				
				
				
			endif;
		?>
		</ul>
	</div>
	
	<div class="block_box_gen">
		<h2>Candidatos rechazados (Reclutador)</h2>
		
		<ul>
		<?php 
			if( !empty($candidatosRechazadosReclutador)):
				foreach( $candidatosRechazadosReclutador as $candidato):
					
		?>
					<li><a href="<?php echo HOME_URL; ?>/eaf/reclutamiento/candidato/?idCandidatoFDP=<?php echo $candidato["idCandidatoFDP"]; ?>"><?php echo $candidato["apellidoPaterno"]." ".$candidato["apellidoMaterno"]." ".$candidato["nombre"]; ?></a></li>
		<?php			
				endforeach;
			endif;
		?>
		</ul>
	</div>	
	
	<div class="block_box_gen">
		<h2>Candidatos aprobados (Reclutador)</h2>
		
		<ul>
		<?php 
			if( !empty($candidatosAceptadosReclutador)):
				foreach( $candidatosAceptadosReclutador as $candidato):
					
		?>
					<li><a href="<?php echo HOME_URL; ?>/eaf/reclutamiento/candidato/?idCandidatoFDP=<?php echo $candidato["idCandidatoFDP"]; ?>"><?php echo $candidato["apellidoPaterno"]." ".$candidato["apellidoMaterno"]." ".$candidato["nombre"]; ?></a></li>
		<?php			
				endforeach;
			endif;
		?>
		</ul>
	</div>
</div>