	<?=$this->load->view('headers/menu');?>

	<div class="clearfix">&nbsp;</div>
	<div class="clearfix">&nbsp;</div>

	<div class="container">
		<div class="col-md-8">
			<h2>Ver todos los enlaces</h2>
		</div>
	</div>

	<div class="container">
		<div class="col-md-12">
			<table class="table table-striped table-bordered">
				<thead>
					<tr>
						<th>Título</th>
						<th>URL</th>
						<th>Acciones</th>
					</tr>	
				</thead>
				<tbody>
				<?php 
					if ($enlaces != FALSE){
						foreach ($enlaces->result() as $row){
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
		</div>
	</div>	

</div>
