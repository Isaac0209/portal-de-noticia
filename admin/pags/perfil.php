
<?php
	$idUser = $_SESSION['usuarioID'];
	$query = $con->prepare("SELECT * FROM usuarios WHERE id = ?");
	$query->bind_param("s", $idUser);
	$query->execute();
	$dados = $query->get_result()->fetch_assoc();

?>
<form method="POST" enctype="multipart/form-data" id="form-publicar">
	<h4 align="center">Editar Perfil</h4>
	<div class="alert alert-warning">Sempre que atualizar seu perfil, envie a foto novamente!</div>

	<p class="mudarfoto1"><img class="mudarfoto" src="<?php echo $dados['foto']; ?>"><br><img id="mudarfoto22" class="mudarfoto2" src="images/perfil/camera.png"></p>
<input type="file" name="userfile" id="mudarfotoinput2" value="<?php echo $dados['foto']; ?>" class="mudarfotoinput">
	

	<label>Nome</label>
	<input type="text" name="nome" class="form-control" value="<?php echo $dados['nome'];?>"><br>

	<label>Usuário</label>
	<input type="text" name="usuario" class="form-control" value="<?php echo $dados['usuario'];?>"><br>

	<label>Sobre Mim</label>
	<input type="text" name="sobre" class="form-control" value="<?php echo $dados['sobre'];?>"><br>

	<label>Twitter</label>
	<input type="text" name="twitter" class="form-control" value="<?php echo $dados['twitter'];?>"><br>

	<label>Instagram</label>
	<input type="text" name="instagram" class="form-control" value="<?php echo $dados['instagram'];?>"><br>

	<label>Senha</label>
	<input type="password" name="senha" class="form-control" value="<?php echo $dados['senha'];?>"><br>
	
	<input type="submit" value="Enviar Publicação" class="btn btn-outline-primary btn-lg btn-block">
	<input type="hidden" name="env" value="post">

<script src="perfil.js"></script>

<?php 
if(isset($_POST['env']) && $_POST['env'] == "post"){
		if($_POST['nome'] && $_POST['usuario'] && $_POST['senha'] && $_POST['sobre']){
			$nome = addslashes($_POST['nome']);
			$usuario = addslashes($_POST['usuario']);
			
			$senha = addslashes($_POST['senha']);
			$sobre = addslashes($_POST['sobre']);
			$twitter = addslashes($_POST['twitter']);
			$instagram = addslashes($_POST['instagram']);

		$uploaddir = '../images/perfil/';
			$uploaddirN = 'images/perfil/';
			$uploadfile = $uploaddir.basename($_FILES['userfile']['name']);
			$uploadfileN = $uploaddirN.basename($_FILES['userfile']['name']);


			$query = $con->prepare("UPDATE usuarios SET nome = ?, usuario = ?, senha = ?, sobre = ?, twitter = ?, instagram = ?, foto = ? WHERE id = ?");
			$query->bind_param("ssssssss", $nome, $usuario, $senha, $sobre, $twitter, $instagram, $uploadfileN, $idUser);
			$query->execute();
			
			$query = $con->prepare("SELECT * FROM usuarios ORDER BY foto DESC");
			$query->execute();
			$get = $query->get_result();
			$total = $get->num_rows;
			if($total > 0){
				while($dados = $get->fetch_array()){
		
			if($query->affected_rows > 0 && move_uploaded_file($_FILES['userfile']['tmp_name'], $uploadfile)){
				echo "<div class='alert alert-success'>Foto enviada com sucesso!,Link abaixo </div>";
			}}}else{
				echo "<div class='alert alert-danger'>Erro ao enviar a foto!</div>";
			}
		}
	}
	

?>
