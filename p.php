
<div id="fb-root"></div>
<link rel="stylesheet" type="text/css" href="css/post.css">
<script async defer crossorigin="anonymous" src="https://connect.facebook.net/pt_BR/sdk.js#xfbml=1&version=v12.0" nonce="maO5UrBC"></script>
<section class="anuncio1">
	<div class="anunciodiv">
	<a target="_blank" href="https://scriptsamp.forumeiros.com"><img src="https://i.servimg.com/u/f19/19/06/24/56/mu-78010.png"></a>
</div>

</section>
<?php
session_start();
	$idPost = addslashes($explode['1']);
	$sql = $con->prepare("SELECT * FROM posts WHERE id = ?");
	$sql->bind_param("s", $idPost);
	$sql->execute();
	$get = $sql->get_result();
	$total = $get->num_rows;

	if($total <= 0){
		echo "<div class='alert alert-danger'>Nenhuma publicação encontrada!</div>";
	}else{
		while($dados = $get->fetch_array()){
		$idPostador = $dados['id_postador'];
		$query = $con->prepare("SELECT * FROM usuarios WHERE id = ?");
		
		$query->bind_param("s", $idPostador);
		$query->execute();
		$dadosU = $query->get_result()->fetch_assoc();
		atualizaVisitas($con, $dados['id'], $dados['visitas']);
		if($dados['imagem'] == 'images/uploads/') {
			
		
		}else{
			 $_SESSION['imagem'] = true;
		}
?>
<script src="js/compartilhe.js"></script>
<div class="redes">
	<p>Compartilhe</p>
	 <a href="https://www.facebook.com/sharer/sharer.php?u=https://curiosidadesuniversais.tk/p/<?php $dados['id'];?>" target="_blank" alt="Share on Facebook"><img src="images/rede-sociais/facebook.png"></a>
	<a href="" id="twitter-share-btt" rel="nofollow" target="_blank" class="twitter-share-button"><img src="images/rede-sociais/twitter.png"></a>

<?php 

$atualizada = $dados["atualizada"];

if($atualizada == '') {
	
}else {
	 $_SESSION['atualizada'] = true;


}

?>
</div>
	<div class="categoria">
		<p class="categoriap"><?php echo $dados['categoria'];?></p>

	</div>
	<h1 class="titulo"><?php echo $dados['titulo'];?></h1>
	<h3 class="resumo"><?php echo $dados['resumo']; ?></h3>

	<div class="boneco">

	<span class="text-muted small"> Por <a href="perfil/<?php echo $dados['id_postador'];?>"><?php echo $dadosU['nome'];?></a> | <i class="far fa-clock"></i> <?php echo $dados['data'];?> 

<?php
                    if(isset($_SESSION['atualizada'])):
                    ?>

| Atualizado as <?php echo $dados['atualizada'];?>



                    <?php
                    endif;
                    unset($_SESSION['atualizada']);
                    ?>





</div>
</span>
	
		<div id="fullpost-content" class="fullpost-content">
			
	<div class="redes1">
	<p>Compartilhe</p>
<a href="https://www.facebook.com/sharer/sharer.php?u=https://curiosidadesuniversais.tk/p/<?php $dados['id'];?>" target="_blank" alt="Share on Facebook"><img style="margin-right: 15px" src="images/rede-sociais/facebook.png"></a>
	<a href="" id="twitter-share-btt" rel="nofollow" target="_blank" class="twitter-share-button"><img src="images/rede-sociais/twitter.png"></a>

</div>

	<div class="imagem">
	<?php
                    if(isset($_SESSION['imagem'])):
                    ?>
	<img class="imagem-home" src="<?php echo $dados['imagem'];?>" class>
	<?php
                    endif;
                    unset($_SESSION['imagem']);
                    ?>
                    </div>
                    <div class="anuncio">
                    <h4>Anuncios</h4>
                    <script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client=ca-pub-2331557792355902"
     crossorigin="anonymous"></script>
<!-- index -->
<ins class="adsbygoogle"
     style="display:block"
     data-ad-client="ca-pub-2331557792355902"
     data-ad-slot="2433433558"
     data-ad-format="auto"
     data-full-width-responsive="true"></ins>
<script>
     (adsbygoogle = window.adsbygoogle || []).push({});
</script>
                </div>
		<p><?php echo $dados['postagem'];?></p>
		
	
</div>
<div class="leia"><h3>Ultimas noticías:</h3>
<?php
	$sql = $con->prepare("SELECT * FROM posts WHERE visitas LIMIT 4");
	$sql->execute();
	$get = $sql->get_result();
	$total = $get->num_rows;

	if($total <= 0){
		
	}else{
		while($dados2 = $get->fetch_array()){
		$idPostador = $dados2['id_postador'];
		$query = $con->prepare("SELECT * FROM usuarios WHERE id = ? ");
		$query->bind_param("s", $idPostador);
		$query->execute();
		$dadosU = $query->get_result()->fetch_assoc();

		?>

	
		<a href="p/<?php echo $dados2['id'];?>"><li><?php echo $dados2['titulo'];?></li></a>
		

	
<?php }}?>
</div>

<?php }}?>
<?php

	$idPost = addslashes($explode['1']);
	$sql = $con->prepare("SELECT * FROM posts WHERE id = ?");
	$sql->bind_param("s", $idPost);
	$sql->execute();
	$get = $sql->get_result();
	$total = $get->num_rows;

	if($total <= 0){
		echo "<div class='alert alert-danger'>Nenhuma publicação encontrada!</div>";
	}else{
		while($dados = $get->fetch_array()){
		$idPostador = $dados['id_postador'];
		$query = $con->prepare("SELECT * FROM usuarios WHERE id = ?");
		
		$query->bind_param("s", $idPostador);
		$query->execute();
		$dadosU = $query->get_result()->fetch_assoc();
		atualizaVisitas($con, $dados['id'], $dados['visitas']);
		if($dados['imagem'] == 'images/uploads/') {
			
		
		}else{
			 $_SESSION['imagem'] = true;
		}
?>
<section class="comentarios">
	<div class="fb-comments" data-colorscheme="dark" data-href="https://curiosidadesuniversais.tk/p/<?php echo $dados['id']; ?>" data-width="" data-numposts="5"></div>



</section>
</section>
<?php }} ?>
<script type="text/javascript">
	

	//Constrói a URL depois que o DOM estiver pronto        
document.addEventListener("DOMContentLoaded", function() {
    var url = encodeURIComponent(window.location.href);
    var titulo = encodeURIComponent(document.title);
    //var via = encodeURIComponent("usuario-twitter"); //nome de usuário do twitter do seu site
    //altera a URL do botão
    document.getElementById("twitter-share-btt").href = "https://twitter.com/intent/tweet?url="+url+"&text="+titulo;
     
    //se for usar o atributo via, utilize a seguinte url
    //document.getElementById("twitter-share-btt").href = "https://twitter.com/intent/tweet?url="+url+"&text="+titulo+"&via="+via;
}, false);

</script>

<script src="js/barradeprogresso.js"></script>