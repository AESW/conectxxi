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
	
	<div class="block_box_gen">
		<h2>Entrevistas por realizar</h2>
		<ul>
		<?php 
			if(!empty( $entrevistasRealizar ) ):
				foreach($entrevistasRealizar as $entrevistas):
		?>
					<li><a href="<?php echo HOME_URL; ?>/eaf/reclutamiento/candidato/?idCandidatoFDP=<?php echo $entrevistas["idCandidatoFDP"]; ?>"><?php echo $entrevistas["nombre"]." ".$entrevistas["apellidoPaterno"]." ".$entrevistas["apellidoMaterno"]; ?> , <?php echo $entrevistas["nombrePuesto"] ?></a></li>
		<?php
				endforeach;
			endif;
		?>
		</ul>
	</div>
	
	<div class="block_box_gen">
		<h2>Vacantes que cubrir</h2>
		<ul>
		<?php 
			if( !empty($peticionesVacantes)):
				
				//$$valoresUnicosPorPuesto = array();
				
				foreach( $peticionesVacantes as $peticiones):
					//$valoresUnicosPorPuesto[] = $peticiones["nombrePuesto"];
		?>
					<li><?php echo $peticiones["nombrePuesto"]." - Código FDP: <strong style='font-style:italic;'>".$peticiones["tokenFDPVacantesPendientes"]."</strong>"; ?></li>
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
</div>