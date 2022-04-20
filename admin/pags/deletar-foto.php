<?php
	$idPost = addslashes($explode['1']);

	$query = $con->prepare("DELETE FROM imag WHERE titulo = ?");
	$query->bind_param("s", $idPost);
	$query->execute();

	if($query->affected_rows > 0){
		redireciona('gerenciar-foto', false, 0, false);
	}else{
		echo "<div class='alert alert-danger'>Erro ao deletar a foto.</div>";
	}
?>