
<div class="content_generic">
    <div style="width: 48%; margin-left: 10px" class="block_box_gen">
        <h2><label>Avisos</label></h2>
        <u></u>
    </div>
    <div style="width: 48%"  class="block_box_gen">
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
    <table style=" border-collapse: separate; border-spacing:  10px" cellpadding="0" cellspacing="0" width="97%">
        <br>
        <tr>
        <!--     <td> <a style="padding: 20px 40px; width:250px; height:60px;  margin-top: 30px; margin-right: 7%"class="btnNextFDP" id="btnCapacitaciones">Capacitaciones</a></td>
            <td>  <a  style="padding: 20px 40px; width:250px; height:60px; margin-top: 30px; margin-right: 7%"class="btnNextFDP" id="btnCaja de ahorro">Caja de ahorro</a></td> -->
            <td><a style="padding: 20px 40px; width:250px; height:60px; margin-top: 30px; margin-right: 7%"class="btnNextFDP" id="btnActualizDatos" href="<?php echo HOME_URL."MovEmpleados/informacion_biografica/?idUsuario=".$idUsuario;?> " >Actualizaci&oacute;n de datos</a></td>
        </tr>
        <tr>
            <td><a style="padding: 20px 40px; width:250px; height:60px; margin-top: 30px; margin-right: 7%" class="btnNextFDP" id="btnSolicPermiso" href="<?php echo HOME_URL."MovEmpleados/SolPermiso"; ?>" >Solicitud de permiso</a></td>
            <td><a style="padding: 20px 40px; width:250px; height:60px; margin-top: 30px; margin-right: 7%" class="btnNextFDP" id="btnCambioDescanso" href="<?php echo HOME_URL."MovEmpleados/solicitud_cambio_descanso"; ?> " >Cambio de d&iacute;a de descanso</a></td>
            <td><a style="padding: 20px 40px; width:250px; height:60px; margin-top: 30px; margin-right: 7%" class="btnNextFDP" id="btnCambioTurno" href="<?php echo HOME_URL."MovEmpleados/solicitud_cambio_turno"; ?> ">Cambio de Turno</a></td>
        </tr>
        <tr>
            <td></td>
            <td><a style="padding: 20px 40px; width:250px; height:60px; margin-top: 30px; margin-right: 7%" class="btnNextFDP" id="btnVacaciones" href="<?php echo HOME_URL."MovEmpleados/solicitud_vacaciones/?idUsuario=". $idUsuario;  ?> " >Vacaciones</a></td>
        </tr>
    </table> 
    <br>


</div>