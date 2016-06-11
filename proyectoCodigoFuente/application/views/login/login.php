	<div class="login_page">
		<a href="" title="EAF" class="eaf_option"></a>
		<a href="<?php echo HOME_URL."planMaestro/"; ?>" title="FPM" class="fpm_option"></a>
		<a href="<?php echo HOME_URL."candidatos/"; ?>" title="FDP" class="fdp_option"></a>
	</div>
	
	<div id="login">
			<?php
			if (isset($logout_message)) {
				echo "<div class='message'>";
				echo $logout_message;
				echo "</div>";
			}
			?>
			<?php
			if (isset($message_display)) {
				echo "<div class='message'>";
				echo $message_display;
				echo "</div>";
			}
			?>
			<?php echo form_open('home/login'); ?>
			<?php
			echo "<div class='error_msg'>";
				if (isset($error_message)) {
					echo $error_message;
				}
			echo validation_errors();
			echo "</div>";
			?>
			<div class="row_usuario">
				<div class="label_usuario">
					Usuario
				</div>
				<div class="input_usuario">
					<input type="text" name="username" id="name" placeholder="username" id="username"/>
				</div>
				<div style="clear:both;"></div>
			</div>	
			
			<div class="row_usuario">
				<div class="label_usuario">
					Password
				</div>
				<div class="input_usuario">
					<input type="password" name="password" id="password" placeholder="**********" id="password"/>
				</div>
				
				<div style="clear:both;"></div>
			</div>	
			
			<input type="submit" value="Login " name="submit" id="loginBtn"/>
			
			<div style="clear:both;"></div>
			<?php echo form_close(); ?>
	</div>
	<div style="clear:both;"></div>