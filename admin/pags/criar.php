<form method="post" id="form-publicar">
	<h4 align="center">Cadastrar Perfil</h4>
	<hr>
	<label>Nome</label>
	<input type="text" name="nome" class="form-control"><br>

	<label>Usuário</label>
	<input type="text" name="usuario" class="form-control"><br>

	<label>Sobre Mim</label>
	<input type="text" name="sobre" class="form-control"><br>

	<label>Senha</label>
	<input type="password" name="senha" class="form-control"><br>
	<label>Nivel de acesso</label>
	<input type="text" name="nivel" class="form-control">
	<input type="submit" value="Cadastrar Dados" class="btn btn-outline-primary btn-lg btn-block">
	<input type="hidden" name="alt" value="cad">
</form>
<?php
	if(isset($_POST['alt']) && $_POST['alt'] == "cad"){
			if($_POST['nome'] && $_POST['usuario'] && $_POST['senha'] && $_POST['sobre'] && $_POST['nivel']){
				$nome = addslashes($_POST['nome']);
			$usuario = addslashes($_POST['usuario']);
			$senha = addslashes($_POST['senha']);
			$sobre = addslashes($_POST['sobre']);
			$nivel = addslashes($_POST['nivel']);
			$foto = "images/perfil/perfil.png";
		$sql = $con->prepare("INSERT INTO usuarios (nome, usuario, senha, sobre, foto, nivel) VALUES (?, ?, ?, ?, ?, ?)");
			$sql->bind_param("ssssss", $nome, $usuario, $senha, $sobre, $foto, $nivel);
			$sql->execute();

			if($sql->affected_rows > 0){
				redireciona('inicio', 'success', 2, 'Conta Cadastrada!');
		
			}else if($sql->affected_rows < 0){
				echo "<div class='alert alert-danger'>Erro ao cadastrar os dados!</div>";
			}


		}else{
			echo "<div class='alert alert-danger'>Preencha todos os campos!</div>";
		}
	}
?>