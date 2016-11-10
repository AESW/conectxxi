<div class="content_generic"  >



		

    <div style="width:48%; " class="block_box_gen">
        <h2><label>Avisos</label></h2>
        <u></u>
    </div>
    <div   style="width:48%; " class="block_box_gen">
        <h2><label>Movimientos</label></h2>
        <ul>
        <?php 
			if(!empty( $movimientos ) ):
		      foreach($movimientos	 as $datos):
		      $id = $datos["idUsuarios"] ;
		      $accion = $datos["autorizacion"] ;
			  if( $accion == "permiso" ):
		?>
						<li><a href="<?php echo HOME_URL; ?>Gerente/Permiso/?idPermiso=<?php echo $datos["IdPermiso"];?>"><?php echo $datos["nombreUsuario"]." , Autorización de ".$accion; echo ($datos["aprobado"]==1)?" - Autorizado":" - Pendiente"; ?> </a></li>
					
					<?php 
					endif;
					
					if( $accion == "descanso" ):
					?>
						<li><a href="<?php echo HOME_URL; ?>Gerente/Descanso/?idUsuario=<?php echo $datos["idUsuarios"];?>"><?php echo $datos["nombreUsuario"]." , Autorización de ".$accion; echo ($datos["aprobado"]==1)?" - Autorizado":" - Pendiente"; ?> </a></li>
								
							<?php 
							endif;
										
						if( $accion == "turno" ):
										?>
						<li><a href="<?php echo HOME_URL; ?>Gerente/Turno/?idUsuario=<?php echo $datos["idUsuarios"];?>"><?php echo $datos["nombreUsuario"]." , Autorización de ".$accion; echo ($datos["aprobado"]==1)?" - Autorizado":" - Pendiente"; ?></a></li>
															
															<?php 
															endif;
															
				endforeach;
			endif;
		?>
        
        
 
        
        </ul>

    </div>
    
   
   <center>
 
   <div style="padding-top: 35%; "  >
  
           <!--  <a  class="btnNextFDP" id="btnCaja de ahorro">Caja de ahorro</a></td> -->
            <a   class="btnNextFDP" id="btnActualizDatos" href="<?php echo HOME_URL."MovEmpleados/informacion_biografica/?idUsuario=".$idUsuario;?> " >Actualizaci&oacute;n de datos</a>
       
            <a  class="btnNextFDP" id="btnSolicPermiso" href="<?php echo HOME_URL."MovEmpleados/SolPermiso"; ?>" >Solicitud de permiso</a>
            <a  class="btnNextFDP" id="btnCambioDescanso" href="<?php echo HOME_URL."MovEmpleados/solicitud_cambio_descanso"; ?> " >Cambio de d&iacute;a de descanso</a>
            <a  class="btnNextFDP" id="btnCambioTurno" href="<?php echo HOME_URL."MovEmpleados/solicitud_cambio_turno"; ?> ">Cambio de Turno</a>
        
            <a  class="btnNextFDP" id="btnVacaciones" href="<?php echo HOME_URL."MovEmpleados/solicitud_vacaciones/?idUsuario=". $idUsuario;  ?> " >Vacaciones</a>
      </div>
</center>

</div>