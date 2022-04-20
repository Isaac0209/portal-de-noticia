<?php
$query = $con->prepare("SELECT * FROM att ORDER BY mensagem DESC");
         $query->execute();
         $get = $query->get_result();
         $total = $get->num_rows;
         if($total > 0){
            while($dados = $get->fetch_array()){

	$idPost = $dados['mensagem'];

	$query = $con->prepare("DELETE FROM att WHERE mensagem = ?");
	$query->bind_param("s", $idPost);
	$query->execute();

	if($query->affected_rows > 0){
		redireciona('inicio', false, 0, false);
	}else{
		echo "<div class='alert alert-danger'>Erro ao limpar os Att.</div>";
	}
}
}
?>