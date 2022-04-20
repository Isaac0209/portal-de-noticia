<div id="form-publicar">
	<table class="table">
		<tr>
			<th>Nome</th>
			<th>Email</th>
			<th>Opinião</th>
			
		</tr>

		<?php
			$query = $con->prepare("SELECT * FROM feed ORDER BY nome DESC");
			$query->execute();
			$get = $query->get_result();
			$total = $get->num_rows;
			if($total > 0){
				while($dados = $get->fetch_array()){
		?>
		<tr>
			<td><?php echo $dados['nome'];?></td>
			<td><?php echo $dados['email'];?></td>
			<td><?php echo $dados['opiniao'];?></td>
			
			<td><button id="dropdownbtn" type="button" class="btn btn-primary btn-sm dropdown-toggle" data-toggle="dropdown" arial-expanded="false">Gerenciar</button>
			<div class="dropdown-menu" aria-labelledby="dropdownbtn">
				
				<a href="admin/deletar-post/<?php echo $dados['id'];?>" class="dropdown-item">Deletar feedback</a>
			</div>

			</td>
		</tr>
	<?php }}?>

	</table>
</div>