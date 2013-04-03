		<?=$this->load->view('headers/menu');?><br /><br />
		
		<p><b>Agregar enlaces</b></p>



		<form id="form" name="form" action="<?=base_url()?>main/guardar" method="POST">
				<label for="titulo">Titulo</label>
				<input type="text" size="20" name="titulo" id="titulo" />
				<br />
				<label for="titulo">URL</label>
				<input type="text" size="30" name="url" id="url" />
				<p><input type="submit" name="guardar" id="guardar" value="Guardar enlace" /></p>
		</form>

	</div>
