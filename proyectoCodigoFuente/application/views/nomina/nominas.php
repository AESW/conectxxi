
<div class="content_generic">
   
    <div class="block_box_gen" style="margin-left: 50px;width:430px">
        <h2>Avisos</h2>
        <ul>
        </ul>
    </div>
    <div class="block_box_gen" style="margin-left: 50px;width:430px; text-align: center">

        <h2> Movimientos de Empleados Altas, Bajas</h2>
        <ul>
        
        <?php 
			if(!empty( $Altas ) ):
				foreach($Altas as $count):
		?>
					<li><a href="<?php echo HOME_URL."Nomina/AltaUsuario"; ?>"> Altas de Usuarios: <?php echo $count["cuenta"];?></a></li>
		<?php
				endforeach;
			endif;
		?>
		
		 
        <?php 
			if(!empty( $Bajas ) ):
				foreach($Bajas as $count):
		?>
					<li><a href="<?php echo HOME_URL."Nomina/BajaUsuario"; ?>"> Bajas de Usuarios: <?php echo $count["cuenta"];?></a></li>
		<?php
				endforeach;
			endif;
		?>
		
		  <?php 
			if(!empty( $BajasDatos ) ):
				foreach($BajasDatos as $count):
		?>
					<li><a href="<?php echo HOME_URL."Nomina/finiquito/?idUsuario=$count->idUsuarios"; ?>"> Finiquito: <?php echo $count->nombreUsuario ?></a></li>
		<?php
				endforeach;
			endif;
		?>
        
        
        </ul>

    </div> 

    <a style="padding: 20px 40px; width:250px; height:60px;  margin-top: 30px; margin-right: 7%"class="btnNextFDP" id="btnExportarNom">Exportar n&oacute;mina</a>
    <a  style="padding: 20px 40px; width:250px; height:60px; margin-top: 30px; margin-right: 7%"class="btnNextFDP" id="btnMovNomin">Movimientos para la n&oacute;mina</a>
   
    <a style="padding: 20px 40px; width:250px; height:60px; margin-top: 30px; margin-right: 7%" class="btnNextFDP" id="btnReportes" href=>Reportes</a>
    
    <a style="padding: 20px 40px; width:250px; height:60px; margin-top: 30px; margin-right: 7%" class="btnNextFDP" id="btnAclaracion" href=>Aclaraci&oacute;n de movimientos</a>
</div>




