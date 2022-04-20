<?php

	$sql = $con->prepare("SELECT * FROM posts ORDER BY id DESC LIMIT 1 ");
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


<section class="index-inicial">
	<a href="p/<?php echo $dados["id"]; ?>">
		<div class="destaque-1">
			<p class="categoria21"><?php echo $dados["categoria"]; ?></p>

			<img src="<?php echo $dados["imagem"]; ?>">

			<h4 class="titulo21"><?php echo $dados["titulo"]; ?></h4>
		</div>
	</a>
		<?php }} ?>
		<div class="destaque-grupo">
			<?php

	$sql = $con->prepare("SELECT * FROM posts ORDER BY id DESC LIMIT 1 OFFSET 1 ");
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
<a href="p/<?php echo $dados["id"]; ?>">
		<div class="destaque-2">
			<p class="categoria22"><?php echo $dados["categoria"]; ?></p>
			<img src="<?php echo $dados["imagem"]; ?>">
			<h4 class="titulo22"><?php echo $dados["titulo"]; ?></h4>
		</div>
	</a>
	<?php }}?>
		<?php

	$sql = $con->prepare("SELECT * FROM posts ORDER BY id DESC LIMIT 1 OFFSET 2 ");
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
<a href="p/<?php echo $dados["id"]; ?>">
		<div class="destaque-3">
			<p class="categoria23"><?php echo $dados["categoria"]; ?></p>
			<img src="<?php echo $dados["imagem"]; ?>">
			<h4 class="titulo23"><?php echo $dados["titulo"]; ?></h4>

		</div>
</a>
<?php }} ?>
	</div>


</section>

<!-- ultimas notícias -->
<div class="categoria3">
		<p>Últimas notícias</p>

	</div><!-- Lado direito !-->
<div class="ladodireito2">
<h1>Manchete</h1>
<hr class="hr2">
<div class="grupo2">
<img src="images/uploads/buraco-negro-supermassivo-interna-2-1000x450.jpg">
<p>teste</p>
</div>
</div>
<!-- Lado esquerdo !-->
<div class="ladoesquerdo2">
	
<?php

	$sql = $con->prepare("SELECT * FROM posts ORDER BY id DESC LIMIT 5 OFFSET 3");
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

	
		<div class="post-content">
	
	
	<div class="media">
<?php
                    if(isset($_SESSION['imagem'])):
                    ?>
	  <img class="mr-3 img-fluid" src="<?php echo $dados['imagem'];?>">
<?php
                    endif;
                    unset($_SESSION['imagem']);
                    ?>
	  <div class="media-body">
	    <a class="link" href="p/<?php echo $dados['id'];?>"><h4><?php echo ($dados['titulo']); ?></h4></a>
	   
	    <p class="resumo1"> <?php echo substr_replace($dados['resumo'], (strlen($dados['resumo']) > 100 ? '...' : ''), 100);?></p>

	  </div>
	</div>

	</div>




<?php }}?>


<!-- mais lidas !-->
	<div class="categoria2">
		<p>Mais lidas</p>

	</div><!-- Lado direito !-->
<div class="ladodireito">
<?php

	$sql = $con->prepare("SELECT * FROM posts ORDER BY visitas DESC LIMIT 5 OFFSET 5");
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

	
		<div class="post-content">
	
	
	<div class="media">
<?php
                    if(isset($_SESSION['imagem'])):
                    ?>
	  <img class="mr-3 img-fluid" src="<?php echo $dados['imagem'];?>">
<?php
                    endif;
                    unset($_SESSION['imagem']);
                    ?>
	  <div class="media-body">
	    <a class="link" href="p/<?php echo $dados['id'];?>"><h4><?php echo ($dados['titulo']); ?></h4></a>
	   
	    <p class="resumo1"> <?php echo substr_replace($dados['resumo'], (strlen($dados['resumo']) > 100 ? '...' : ''), 100);?></p>

	  </div>
	</div>

	</div>

 	<!--<hr class="hr"> !-->
		

	
<?php }}?>

</div>
<!-- Lado esquerdo !-->
<div class="ladoesquerdo">
	
<?php

	$sql = $con->prepare("SELECT * FROM posts ORDER BY visitas DESC LIMIT 5 OFFSET 0");
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

	
		<div class="post-content">
	
	
	<div class="media">
<?php
                    if(isset($_SESSION['imagem'])):
                    ?>
	  <img class="mr-3 img-fluid" src="<?php echo $dados['imagem'];?>">
<?php
                    endif;
                    unset($_SESSION['imagem']);
                    ?>
	  <div class="media-body">
	    <a class="link" href="p/<?php echo $dados['id'];?>"><h4><?php echo ($dados['titulo']); ?></h4></a>
	   
	    <p class="resumo1"> <?php echo substr_replace($dados['resumo'], (strlen($dados['resumo']) > 100 ? '...' : ''), 100);?></p>

	  </div>
	</div>

	</div>




<?php }}?>
<a href="noticias" class="botaocelular">Ver todas as notícias</a>
<div class="botaopca">
<a href="noticias" class="botaopc">Ver todas as notícias</a>
</div>
</div>
</div>