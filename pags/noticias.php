<h1 class="titulao">Todas As Notícias</h1>
<section class="secaonoticia">

<?php

	$sql = $con->prepare("SELECT * FROM posts ORDER BY id DESC");
	$sql->execute();
	$get = $sql->get_result();
	$total = $get->num_rows;

	if($total <= 0){
		
	}else{
		while($dados = $get->fetch_array()){
		$idPostador = $dados['id_postador'];
		$query = $con->prepare("SELECT * FROM usuarios WHERE id = ? ");
		$query->bind_param("s", $idPostador);
		$query->execute();
		$dadosU = $query->get_result()->fetch_assoc();
		if($dados['imagem'] == 'images/uploads/') {
			
		
		}else{
			 $_SESSION['imagem'] = true;
		}
?>

	
		<div class="post-content2">
	
	
	<div class="media2">
<?php
                    if(isset($_SESSION['imagem'])):
                    ?>
	  <img class="mr-3 img-fluid" src="<?php echo $dados['imagem'];?>">
<?php
                    endif;
                    unset($_SESSION['imagem']);
                    ?>
	  <div class="media-body2">
	    <a class="link" href="p/<?php echo $dados['id'];?>"><h4><?php echo ($dados['titulo']); ?></h4></a>
	   <hr class="linhadoequador">
	    <p class="resumo2"> <?php echo substr_replace($dados['resumo'], (strlen($dados['resumo']) > 100 ? '...' : ''), 100);?></p>

	  </div>
	</div>

	</div>

<?php }} ?>
</section>