<?php
$query = $con->prepare("SELECT * FROM ip ORDER BY ip DESC");
         $query->execute();
         $get = $query->get_result();
         $total = $get->num_rows;
         if($total > 0){
            while($dados = $get->fetch_array()){

	$idPost = $dados['ip'];

	$query = $con->prepare("DELETE FROM ip WHERE ip = ?");
	$query->bind_param("s", $idPost);
	$query->execute();

	if($query->affected_rows > 0){
		redireciona('inicio', false, 0, false);
	}else{
		echo "<div class='alert alert-danger'>Erro ao limpar os ip´s.</div>";
	}
}
}
?>