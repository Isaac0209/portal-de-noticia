<?php
	$idPost = addslashes($explode['1']);
	$query = $con->prepare("SELECT * FROM aviso WHERE mensagem = ?");
	$query->bind_param("s", $idPost);
	$query->execute();
	$get = $query->get_result();
	$dados = $get->fetch_assoc();
?>
<form method="POST" enctype="multipart/form-data" id="form-publicar">
	<label>Aviso</label>
	<input type="text" name="mensagem" class="form-control" value="<?php echo $dados['mensagem'];?>"><br>

	
	<input type="submit" value="Alterar aviso" class="btn btn-outline-primary btn-lg btn-block">
	<input type="hidden" name="env" value="post">
</form>

<?php
	if(isset($_POST['env']) && $_POST['env'] == "post"){
		if($_POST['mensagem']){
			$titulo = $_POST['mensagem'];
			

			$sql = $con->prepare("UPDATE aviso SET mensagem = ?");
			$sql->bind_param("s", $titulo);
			$sql->execute();

			if($sql->affected_rows > 0){
				echo "<div class='alert alert-success'>Aviso alterada com sucesso!</div>";
			}else{
				echo "<div class='alert alert-danger'>Erro ao alterar a aviso!</div>";
			}


		}else{
			echo "<div class='alert alert-danger'>Preencha todos os campos</div>";
		}
	}
	
?>