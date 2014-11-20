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
      <ul class="nav navbar-nav">
        <li class="active">
        	<a href="<?=base_url()?>">
        		<span class="glyphicon glyphicon-home"></span>&nbsp;
        		Inicio
        	</a>
        </li>
        <li>
        	<a href="<?=base_url()?>index.php/main/agregar">
        		<span class="glyphicon glyphicon-plus"></span>&nbsp;Agregar
        	</a>
        </li>          
        <li>
          <a href="<?=base_url()?>index.php/main/editar">
          	<span class="glyphicon glyphicon-pencil"></span>&nbsp;
          	Editar
          </a>
        </li>
        <li>
					<a href="<?=base_url()?>index.php/main/eliminar">
						<span class="glyphicon glyphicon-minus"></span>&nbsp;
						Eliminar
					</a>
				</li>
				<li>
					<a href="<?=base_url()?>index.php/main/ver">
						<span class="glyphicon glyphicon-th-large"></span>&nbsp;
						Ver todo
					</a>
				</li>
				<li>
					<a href="<?=base_url()?>index.php/main/buscar">
						<span class="glyphicon glyphicon-search"></span>&nbsp;
						Buscar
					</a>
				</li>
				<li>
					<a href="<?=base_url()?>index.php/auth/logout">
						<span class="glyphicon glyphicon-remove-sign"></span>&nbsp;
						Salir
					</a>
				</li>
      </ul>
    </div><!--/.nav-collapse -->
  </div>
</nav>
