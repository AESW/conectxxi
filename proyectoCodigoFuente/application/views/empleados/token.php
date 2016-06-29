<script type="text/javascript">
    $(document).ready( function() {
	    $("#btnTokenFDP").click(function(){
	      
	      $("#form_fdp_conectxxi_token").submit();
      });
    });
</script>
<div class="content_generic">
	<div class="formulario_fdp">
		<div class='panel-container'>
			
			<?php
					if( isset( $_REQUEST["registro"] ) ):
			?>
						<div style="text-align: left;font-size: 11pt; color:#1391c4;padding: 5px;">
							Has concluido exitosamente el llenado de este formato, para continuar con el proceso, da click

aquí y conoce nuestro aviso de privacidad. Una vez que lo hayas leído, oprime alguno de los

botones, Acepto o No Acepto; te enviaremos un menaje a la dirección de correo que

proporcionaste, con una clave que cargarás en esta página para concluir el proceso.
						</div>
			<?php 
					endif;
			?>
			<form action="" method="post" name="form_fdp_conectxxi_token" class="form_fdp_conectxxi_token" id="form_fdp_conectxxi_token">
				<h2><label>Por favor ingresa el código para iniciar el llenado.</label></h2>
				<?php
					if( $isInValidTokenFDPPost == 1) :
				?>
					<p style="color:red;font-weight: bold;margin-bottom: 15px;">
						Código inválido. Por favor contacta a tu reclutador.
					</p>
				<?php	
					endif;
				?>
				<table cellpadding="0" cellspacing="0" width="100%">
				    <tr>
					    <td>Código FDP</td>
					    <td><input style="width: 320px;" type="text" name="codigo_fdp" class="codigo_fdp" id="codigo_fdp" placeholder="Ingresa el código FDP" autocomplete="off" required value="<?php echo (isset($formArray["codigo_fdp"]))?$formArray["codigo_fdp"]:""; ?>" <?php echo ( in_array ('codigo_fdp' , $error_campos) )?"style='border:2px solid red;'":""; ?>></td>
					    
				    </tr>
				    <tr>
					    <td colspan="2">
						    <a class="btnTokenFDP" id="btnTokenFDP">Continuar</a>
					    </td>
				    </tr>
				</table>    
			</form>	
		</div>	
	</div>
</div>	