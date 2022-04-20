<?php
	$idPost = addslashes($explode['1']);
	$query = $con->prepare("SELECT * FROM usuarios WHERE id = ?");
	$query->bind_param("s", $idPost);
	$query->execute();
	$get = $query->get_result();
	$dados = $get->fetch_assoc();
?>
<form method="POST" enctype="multipart/form-data" id="form-publicar">
	<label>Nome</label>
	<input type="text" name="titulo" class="form-control" value="<?php echo $dados['nome'];?>"><br>
<label>Usuário</label>
	<input type="text" name="post" class="form-control" value="<?php echo $dados['usuario'];?>"><br>
	

	<label>Senha</label>
	<input type="password" name="senha" class="form-control" value="<?php echo $dados['senha'];?>"><br>
	
	<input type="submit" value="Alterar Dados" class="btn btn-outline-primary btn-lg btn-block">
	<input type="hidden" name="env" value="post">
</form>

<?php
	if(isset($_POST['env']) && $_POST['env'] == "post"){
		if($_POST['titulo'] && $_POST['post'] && $_POST['senha']){
			$titulo = $_POST['titulo'];
			$post = $_POST['post'];
			$senha =$_POST['senha'];

			$sql = $con->prepare("UPDATE editor SET nome = ?, usuario = ?, senha = ? WHERE id = ?");
			$sql->bind_param("ssss", $titulo, $post, $senha, $idPost);
			$sql->execute();

			if($sql->affected_rows > 0){
				echo "<div class='alert alert-success'>Perfil alterada com sucesso!</div>";
			}else{
				echo "<div class='alert alert-danger'>Erro ao alterar o Perfil!</div>";
			}


		}else{
			echo "<div class='alert alert-danger'>Preencha todos os campos</div>";
		}
	}
?>