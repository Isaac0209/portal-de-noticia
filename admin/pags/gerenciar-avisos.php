<div id="form-publicar">
	<table class="table">
		<tr>
			<th>Avisos</th>
			
		</tr>

		<?php
			$query = $con->prepare("SELECT * FROM aviso ORDER BY mensagem DESC");
			$query->execute();
			$get = $query->get_result();
			$total = $get->num_rows;
			if($total > 0){
				while($dados = $get->fetch_array()){
		?>
		<tr>
			
			<td><?php echo $dados['mensagem'];?></td>
			
			<td><button id="dropdownbtn" type="button" class="btn btn-primary btn-sm dropdown-toggle" data-toggle="dropdown" arial-expanded="false">Gerenciar</button>
			<div class="dropdown-menu" aria-labelledby="dropdownbtn">
				
				<a href="admin/editar-aviso/<?php echo $dados['mensagem'];?>" class="dropdown-item">Editar Aviso</a>
				<a href="admin/deletar-aviso/<?php echo $dados['mensagem'];?>" class="dropdown-item">Deletar Aviso</a>
			</div>

			</td>
		</tr>
	<?php }}?>

	</table>
</div>