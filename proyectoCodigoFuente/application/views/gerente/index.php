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
						<li><a href="<?php echo HOME_URL; ?>eaf/RecursosHumanos/altausuario/?idCandidatoFDP=<?php echo $datos["idUsuarios"];?>"><?php echo $datos["nombreUsuario"]." , Autorización de ".$accion;?> </a></li>
					
					<?php 
					endif;
					
					if( $accion == "descanso" ):
					?>
						<li><a href="<?php echo HOME_URL; ?>eaf/RecursosHumanos/altausuario/?idCandidatoFDP=<?php echo $datos["idUsuarios"];?>"><?php echo $datos["nombreUsuario"]." , Autorización de ".$accion;?> </a></li>
								
							<?php 
							endif;
										
						if( $accion == "turno" ):
										?>
						<li><a href="<?php echo HOME_URL; ?>eaf/RecursosHumanos/altausuario/?idCandidatoFDP=<?php echo $datos["idUsuarios"];?>"><?php echo $datos["nombreUsuario"]." , Autorización de ".$accion;?></a></li>
															
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
	
	
    <a style="padding: 20px 40px; width:250px; height:60px; margin-top: 30px; margin-right: 7%" class="btnNextFDP" id="btnAclaracion" href="<?php echo HOME_URL."Movimientos/NuevoPersonal/";?>">Solicitud de nuevo empleado</a>
	
	  <a style="padding: 20px 40px; width:250px; height:60px; margin-top: 30px; margin-right: 7%" class="btnNextFDP" id="btnAclaracion" href="<?php echo HOME_URL."Gerente/incapacidad/";?>">Alta de incapacidades</a>
	
	
	  <a style="padding: 20px 40px; width:250px; height:60px; margin-top: 30px; margin-right: 7%" class="btnNextFDP" id="btnAclaracion" href="<?php echo HOME_URL."Gerente/BajaPersonal/";?>">Solicitud de baja de empleado</a>
	
	
	
</div>