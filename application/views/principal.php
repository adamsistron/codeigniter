<div id="container">
	<h1>Bienvenido <?php echo $username; ?></h1>	

	<div id="body">		
		<p><b>P&aacute;gina principal</b></p>

		<?=$this->load->view('headers/menu');?>

	</div>

	<div id="exit">
		<?php echo anchor('/auth/logout/', 'Logout'); ?>
	</div>
