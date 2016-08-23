
<div class="content_generic">
   
    <div class="block_box_gen">
        <h2>Avisos</h2>
        <ul>
        </ul>
    </div>
    <div class="block_box_gen">
        <h2>Personal de nuevo ingreso</h2>
        <ul>
        <?php 
			if(!empty( $usuariosActivos ) ):
				foreach($usuariosActivos as $entrevistas):
		?>
					<li><?php echo $entrevistas["nombreUsuario"];?></li>
		<?php
				endforeach;
			endif;
		?>
        
        </ul>
    </div>
    <div class="block_box_gen">
        <h2>Cursos por Evaluar</h2>
        <ul>
            <?php 
			if(!empty( $obtenerCursos ) ):
				foreach($obtenerCursos as $valor):
		?>
					<li><a href="<?php echo HOME_URL; ?>Capacitacion/cursosPorEvaluar/<?php echo $valor["idCursos"]; ?>"><?php echo $valor["NombreDelCurso"];?></a></li>
		<?php
				endforeach;
			endif;
		?>		
        </ul>
    </div>
    <br>
    
   
         <a style="padding: 20px 40px; width:250px; height:60px; margin-top: 30px; margin-right: 7%" class="btnNextFDP" id="btnAsignarCurso" href="<?php echo HOME_URL; ?>Capacitacion/AsignarCurso">Asignar Curso</a>
        <a style="padding: 20px 40px; width:250px; height:60px; margin-top: 30px; margin-right: 7%" class="btnNextFDP" id="btnReportes">Reportes</a>
        <a style="padding: 20px 40px; width:250px; height:60px; margin-top: 30px; margin-right: 7%" class="btnNextFDP" id="btnProgramarCurso" href="<?php echo HOME_URL; ?>Capacitacion/programarCurso">Programar curso de capacitaci&oacute;n</a>
         <a style="padding: 20px 40px; width:250px; height:60px; margin-top: 30px; margin-right: 7%" class="btnNextFDP" id="btnProgramarCurso" href="<?php echo HOME_URL; ?>Capacitacion/asistenciaCurso">Control de Asistencia</a>
       
</div>