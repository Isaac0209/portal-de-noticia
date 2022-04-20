<form method="POST" enctype="multipart/form-data" id="form-publicar">
	<label>Atualização</label>
	<textarea type="text" rows="10" name="titulo" class="form-control"></textarea><br>
<input type="submit" value="Criar att" class="btn btn-outline-primary btn-lg btn-block">
	<input type="hidden" name="env" value="post">
	
</form>
<?php

if(isset($_POST['env']) && $_POST['env'] == "post"){

$titulo = mysqli_real_escape_string($con, trim($_POST['titulo']));

$sql = $con->prepare("SELECT * FROM att ORDER BY mensagem DESC");
	$sql->execute();
	$get = $sql->get_result();
	$total = $get->num_rows;
		 



	

	if($total > 0){
		echo "<p class='alert alert-danger'>Já tem uma atualizacão criada,Exclua ele para criar outro!</p>";
		exit();
	}
if (!$con) {
      die("Conexão Falhou: " . mysqli_connect_error());
}
 
$sql = "INSERT INTO att (mensagem) VALUES ('$titulo')";
if (mysqli_query($con, $sql)) {
      echo "Aviso criado!";
     
} else {
      echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}
mysqli_close($con);
}
?>


