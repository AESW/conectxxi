<html>
<head>
	<?php 
		$tituloDocumento = ( isset( $titulo ) )?'Legalaxxi - '.$titulo:'Legalaxxi';
	?>
	<title><?php echo $tituloDocumento; ?></title>
	<meta charset="UTF-8">
	
	
	<link href='http://fonts.googleapis.com/css?family=Source+Sans+Pro|Open+Sans+Condensed:300|Raleway' rel='stylesheet' type='text/css'>
	<!--[if lt IE 9]>
	  <script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
	<![endif]-->
	<!-- Bootstrap styles -->
	<link rel="stylesheet" href="<?php echo HOME_URL; ?>assets/css/bootstrap-3.2.0/dist/css/bootstrap.min.css">
	<link href="<?php echo HOME_URL; ?>assets/style.css" rel="stylesheet">
	<link rel="stylesheet" href="<?php echo HOME_URL; ?>assets/jquery.fileupload.css">
    <script src="<?php echo HOME_URL; ?>assets/js/jquery-1.9.1.min.js"></script>
    <link rel="stylesheet" href="<?php echo HOME_URL; ?>assets/css/jquery-ui-themes-1.11.4/themes/smoothness/jquery-ui.css">
    <script src="<?php echo HOME_URL; ?>assets/js/jquery-ui.js"></script>
	<script src="<?php echo HOME_URL; ?>assets/js/jquery.easytabs.js" type="text/javascript"></script>
	<script src="<?php echo HOME_URL; ?>assets/js/jquery-scrollto.js"></script>
    <script src="<?php echo HOME_URL; ?>assets/js/general.js"></script>
    
  
 
	
    
</head>
<body>
	<!-- page -->
	<div class="page">
		<div class="header">
			<div class="banner_header" onclick="location.href='<?php echo HOME_URL; ?>'" style="cursor:pointer;">
				<h1>
					<?php 
					if( $titulo != "" ):
						echo $titulo;
					endif;
				?>
				
				</h1>
			</div>
			
			<div class="bar_center_header">
				<?php 
					if( $titulo != "" ):
						echo $titulo;
					endif;
				?>
				<?php 
					if (isset($this->session->userdata['logged_in'])):
				?>
					<a href="<?php echo HOME_URL."home/logout/";?>" style="float: right;font-size: 9pt; text-decoration: none;">Cerrar sesión</a>
					
				<?php 
					endif;
				?>	
			</div>
		</div>
		<!-- content -->
		<div class="content">
		