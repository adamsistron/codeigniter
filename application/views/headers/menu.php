<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
  <div class="container">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="#">Codeigniter - Adam</a>      
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
				<li <?php if ($activa == 'validaciones'){ echo "class='active'"; } ?>>
					<a href="<?=base_url()?>main/validaciones">
						<span class="glyphicon glyphicon-ok"></span>&nbsp;
						Validaciones
					</a>
				</li>
                                <li class="<?php if ($activa == 'stock'){ echo "active"; } ?> dropdown">
                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                                        Stock <span class="caret"></span>
                                    </a>
                                        <ul class="dropdown-menu">
                                            <li>
                                                <a href="<?=base_url()?>main/stock/basic-line">Basic-Line
                                                    <span class="glyphicon glyphicon-resize-horizontal"></span>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="<?=base_url()?>main/stock/compare">Compare
                                                    <span class="glyphicon glyphicon-random"></span>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="<?=base_url()?>main/stock/compare_despachos">Compare Despachos
                                                    <span class="glyphicon glyphicon-random"></span>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="<?=base_url()?>main/stock/compare_volumen">Compare Volumen
                                                    <span class="glyphicon glyphicon-random"></span>
                                                </a>
                                            </li>
                                            <li role="separator" class="divider"></li>
                                            <li><a href="#">Separated link</a></li>
                                        </ul>
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
