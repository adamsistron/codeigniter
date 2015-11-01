<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
  <div class="container">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="#">Codeigniter</a>      
    </div>
    <div id="navbar" class="collapse navbar-collapse">
    <?php $activa = $this->uri->segment(2); ?>
      <ul class="nav navbar-nav">        
        <li <?php if ($activa == ''){ echo "class='active'"; } ?>>
        	<a href="<?=base_url()?>">
        		<span class="glyphicon glyphicon-home"></span>&nbsp;
        		Inicio
        	</a>
        </li>
        <li <?php if ($activa == 'agregar'){ echo "class='active'"; } ?>>
        	<a href="<?=base_url()?>main/agregar">
        		<span class="glyphicon glyphicon-plus"></span>&nbsp;Agregar
        	</a>
        </li>          
				<li <?php if ($activa == 'ver'){ echo "class='active'"; } ?>>
					<a href="<?=base_url()?>main/ver">
						<span class="glyphicon glyphicon-th-large"></span>&nbsp;
						Ver todo
					</a>
				</li>
				<li <?php if ($activa == 'buscar'){ echo "class='active'"; } ?>>
					<a href="<?=base_url()?>main/buscar">
						<span class="glyphicon glyphicon-search"></span>&nbsp;
						Buscar
					</a>
				</li>
				<li>
					<a href="<?=base_url()?>auth/logout">
						<span class="glyphicon glyphicon-remove-sign"></span>&nbsp;
						Salir
					</a>
				</li>
      </ul>
    </div><!--/.nav-collapse -->
  </div>
</nav>
