<div class="galeriadiv">
<h2>Galeria</h2>
<?php
			$query = $con->prepare("SELECT * FROM imag ORDER BY imagem DESC");
			$query->execute();
			$get = $query->get_result();
			$total = $get->num_rows;
			if($total > 0){
				while($dados = $get->fetch_array()){
		?>
<head>
	<link rel="stylesheet" href="css/styleadmin.css">	
</head>

<div class="galeria">
	


<div class="foto">
	<img class="foto1" src="<?php echo $dados['imagem'];?>">
	<p><?php echo $dados['titulo'];?></p>
	<p>Link:</p>
	<p class="linksss"><?php echo $dados['imagem']; ?></p>	
	<a href="admin/deletar-foto/<?php echo $dados['titulo'];?>">Deletar foto</a>

</div>


</div>

  

<script src="admin/script.js" defer></script>

<?php }}?>
  </div>