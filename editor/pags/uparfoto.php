<form method="POST" enctype="multipart/form-data" id="form-publicar">
	<label>Nome da foto</label>
	<input type="text" name="titulo" class="form-control"><br>

	<label>Imagem</label>
	<input type="file" name="userfile" class="form-control"><br>

	<input type="submit" value="Enviar Publicação" class="btn btn-outline-primary btn-lg btn-block">
	<input type="hidden" name="env" value="post">

	<?php
	if(isset($_POST['env']) && $_POST['env'] == "post"){
		if($_POST['titulo']) {
					$idUser = $_SESSION['usuarioID'];
					$titulo = $_POST['titulo'];
		$uploaddir = '../images/uploads/';
			$uploaddirN = 'images/uploads/';
			$uploadfile = $uploaddir.basename($_FILES['userfile']['name']);
			$uploadfileN = $uploaddirN.basename($_FILES['userfile']['name']);


			$query = $con->prepare("INSERT INTO imag (id_postador, titulo, imagem) VALUES (?, ?, ?)");
			$query->bind_param("sss", $idUser, $titulo, $uploadfileN);
			$query->execute();
			
			$query = $con->prepare("SELECT * FROM imag ORDER BY imagem DESC");
			$query->execute();
			$get = $query->get_result();
			$total = $get->num_rows;
			if($total > 0){
				while($dados = $get->fetch_array()){
		
			if($query->affected_rows > 0 && move_uploaded_file($_FILES['userfile']['tmp_name'], $uploadfile)){
				echo "<div class='alert alert-success'>Foto enviada com sucesso!,Link abaixo </div>";
				echo $dados['imagem'];
			}}}else{
				echo "<div class='alert alert-danger'>Erro ao enviar a foto!</div>";
			}
		}
	}
	
		?>
		