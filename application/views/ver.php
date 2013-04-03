		<?=$this->load->view('headers/menu');?><br /><br />
		
		<p><b>Ver todos los enlaces</b></p>

		<table align="center">
			<tr>
				<td align="center"><h4>Título</h4></td>
				<td align="center"><h4>URL</h4></td>				
			</tr>
			<?php 
				if ($enlaces != FALSE){
					foreach ($enlaces->result() as $row){
						echo "<tr>";
							echo "<td>".$row->titulo."</td>";
							echo "<td>".$row->url."</td>";
						echo "</tr>";
					}	
				}else{
					echo "No hay enlaces";
				}				
			?>			
		</table>

	</div>
