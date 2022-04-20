<?php
session_start();
	$idPost = addslashes($explode['1']);
	$sql = $con->prepare("SELECT * FROM usuarios WHERE id = ?");
	$sql->bind_param("s", $idPost);
	$sql->execute();
	$get = $sql->get_result();
	$total = $get->num_rows;

	if($total <= 0){
		echo "<div class='alert alert-danger'>Nenhuma jornalista encontrada!</div>";
	}else{
		while($dados = $get->fetch_array()){
		$idPostador = $dados['id'];
		$query = $con->prepare("SELECT * FROM usuarios WHERE id = ?");
		
		$query->bind_param("s", $idPostador);
		$query->execute();
		$dadosU = $query->get_result()->fetch_assoc();
		?>
<?php 
$nivel = $dados["nivel"];



?>
<section class="secaojornalista">
<div class="div22">
<img class="fotojornalista" src="<?php echo $dados['foto']; ?>">
<h3 class="nomejornalista"><?php echo $dados['nome'];?></h3>
<span class="jornalistaspan"><?php echo $nivel;?></span>
<div class="imgsw">
<a target="_blank" href="<?php echo $dados['twitter']; ?>"><img style="width: 30px;" src="images/rede-sociais/twitter.png"></a>
<a target="_blank" href="<?php echo $dados['instagram']; ?>"><img style="width: 30px;" src="images/rede-sociais/instagram.png"></a>
</div>
</div>

<div class="sobremim">
	<h3>Sobre mim:</h3>
	<p><?php echo $dados['sobre'];?></p>
</div>
</section>
<h3 class="public2">Publicações:</h3>
<div class="publicac">
	

<?php
		
			$query = $con->prepare("SELECT * FROM posts ORDER BY id DESC");
			$query->execute();
			$get = $query->get_result();
			$total = $get->num_rows;
			
			
				while($dados = $get->fetch_array()){

					$id = $dados['id_postador'];
if($id == $idPost) {
	

				
			
			
			
		?>



		<div class="post-content2">
	
	
	<div class="media2">

	  <img class="mr-3 img-fluid" src="<?php echo $dados['imagem'];?>">

	  <div class="media-body2">
	    <a class="link" href="p/<?php echo $dados['id'];?>"><h4><?php echo ($dados['titulo']); ?></h4></a>
	   <hr class="linhadoequador">
	    <p class="resumo2"> <?php echo substr_replace($dados['resumo'], (strlen($dados['resumo']) > 100 ? '...' : ''), 100);?></p>

	  </div>
	</div>

	</div>


<?php }}}} ?>
</div>