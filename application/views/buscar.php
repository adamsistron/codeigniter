<div class="clearfix">&nbsp;</div>
<div class="clearfix">&nbsp;</div>

<div class="container">
	<div class="col-md-8">
		<h2>Buscar</h2>
	</div>
</div>

<div id="container">	
	<div class="col-md-12">		

		<?=$this->load->view('headers/menu');?>

		<div class="clearfix">&nbsp;</div>

		<table class="table table-striped table-bordered">
				<thead>
					<tr>
						<form id="form" method="GET" action="<?=base_url()?>index.php/main/buscar">
							<input type="text" id="query" name="query" />
							<input type="submit" id="buscar" value="Buscar" />
						</form>
						<div class="clearfix">&nbsp;</div>
					</tr>
					<tr>
						<th>Título</th>
						<th>URL</th>
						<th>Acciones</th>
					</tr>	
				</thead>
				<tbody>
				<?php 
					if ($result != FALSE){
						foreach ($result->result() as $row){
							echo "<tr>";
								echo "<td>".$row->titulo."</td>";
								echo "<td>".$row->url."</td>";
								echo "<td>";
									echo "<a href='' class='label label-success'><span class='glyphicon glyphicon-pencil'></a></span>";
									echo "&nbsp;&nbsp;";
									echo "<a href='".base_url()."index.php/bookmarks/eliminar/".$row->id."' class='label label-danger'>";
										echo "<span class='glyphicon glyphicon-minus'></a></span>";
								echo "</tr>";
						}	
					}				
				?>
				</tbody>
			</table>	


		<p>Total de resultados: <b><?php echo $total; ?></b></p>

	</div>
