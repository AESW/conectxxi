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
	
	<div class="block_box_gen block_box_gen_rh">
		<h2>Primera entrevista</h2>
		<ul>
		<?php 
			if(!empty( $entrevistasRealizar ) ):
				foreach($entrevistasRealizar as $entrevistas):
		?>
					<li><a href="<?php echo HOME_URL; ?>/eaf/recursoshumanos/candidato/?idCandidatoFDP=<?php echo $entrevistas["idCandidatoFDP"]; ?>"><?php echo $entrevistas["nombre"]." ".$entrevistas["apellidoPaterno"]." ".$entrevistas["apellidoMaterno"]; ?> , <?php echo $entrevistas["nombrePuesto"] ?></a></li>
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
					<li><a href="<?php echo HOME_URL; ?>/eaf/recursoshumanos/candidato_rh/?idCandidatoFDP=<?php echo $entrevistas["idCandidatoFDP"]; ?>"><?php echo $entrevistas["nombre"]." ".$entrevistas["apellidoPaterno"]." ".$entrevistas["apellidoMaterno"]; ?> , <?php echo $entrevistas["nombrePuesto"] ?></a></li>
		<?php
				endforeach;
			endif;
		?>
		</ul>
	</div>
	
	<div class="block_box_gen block_box_gen_rh">
		<h2>Movimientos</h2>
		
	</div>
</div>