


<h3 class="public2">Militar:</h3>
<div class="publicac">
	

<?php
		
			$query = $con->prepare("SELECT * FROM posts ORDER BY id DESC");
			$query->execute();
			$get = $query->get_result();
			$total = $get->num_rows;
			
			
				while($dados = $get->fetch_array()){

					$categoria = $dados['categoria'];
if($categoria == 'Militar') {
	

				
			
			
			
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


<?php }} ?>
</div>