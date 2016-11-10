
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
   
    
    <center>
    <div style="padding-top: 35%; "  >
         <a  class="btnNextFDP" id="btnAsignarCurso" href="<?php echo HOME_URL; ?>Capacitacion/AsignarCurso">Asignar Curso</a>
      <!--   <a  class="btnNextFDP" id="btnReportes">Reportes</a>  -->
        <a  class="btnNextFDP" id="btnProgramarCurso" href="<?php echo HOME_URL; ?>Capacitacion/programarCurso">Programar curso de capacitaci&oacute;n</a>
         <a  class="btnNextFDP" id="btnProgramarCurso" href="<?php echo HOME_URL; ?>Capacitacion/asistenciaCurso">Control de Asistencia</a>
       </div>
       </center>
</div>