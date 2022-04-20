<div id="form-publicar">
	<table class="table">
		<tr>
			<th>Id</th>
			<th>Nome</th>
			<th>Usuario</th>
			<th>Ultimo acesso</th>
			<th>Nivel de acesso</th>
			<th>Gerenciar</th>
		</tr>

		<?php
			$query = $con->prepare("SELECT * FROM usuarios ORDER BY id DESC");
			$query->execute();
			$get = $query->get_result();
			$total = $get->num_rows;
			if($total > 0){
				while($dados = $get->fetch_array()){
		?>
		<tr>
			<td><?php echo $dados['id'];?></td>
			<td><?php echo $dados['nome'];?></td>
			<td><?php echo $dados['usuario'];?></td>
			<td><?php echo $dados['ultimo'];?></td>
			<td><?php echo $dados['nivel'];?></td>
			
			
			<td><button id="dropdownbtn" type="button" class="btn btn-primary btn-sm dropdown-toggle" data-toggle="dropdown" arial-expanded="false">Gerenciar</button>
			<div class="dropdown-menu" aria-labelledby="dropdownbtn">
				
				<a href="admin/editar-perfil/<?php echo $dados['id'];?>" class="dropdown-item">Editar Perfil</a>
				<a href="admin/deletar-perfil/<?php echo $dados['id'];?>" class="dropdown-item">Deletar Perfil</a>
			</div>

			</td>
		</tr>
	<?php }}?>

	</table>
</div>