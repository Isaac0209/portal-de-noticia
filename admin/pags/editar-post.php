<?php
	$idPost = addslashes($explode['1']);
	$query = $con->prepare("SELECT * FROM posts WHERE id = ?");
	$query->bind_param("s", $idPost);
	$query->execute();
	$get = $query->get_result();
	$dados = $get->fetch_assoc();
?>
<form method="POST" enctype="multipart/form-data" id="form-publicar">
	<label>Titulo</label>
	<input type="text" name="titulo" class="form-control" value="<?php echo $dados['titulo'];?>"><br>
	<label>Categoria</label><br>
	<select name="categoria" class="form-control">
				<option value="<?php echo $dados['categoria'];?>"><?php echo $dados['categoria']; ?></option>
           <option value="Teoria">Teoria</option>
          <option value="Curiosidade">Curiosidade</option>
          <option value="Tecnologia">Tecnologia</option>
          <option value="Espaço">Espaço</option>
          <option value="Militar">Militar</option>
          <option value="Cinema">Cinema</option>
          <option value="Jogos">Jogos</option>
          <option value="Internet">Internet</option>
          <option value="Saúde">Saúde</option>
          <option value="Ciências">Ciências</option>
           <option value="Tragédia">Tragédia</option>

       </select><br>
        <label>Status</label><br>
	<select name="status" class="form-control">
		<option value="publicado">Publicavel</option>
		<option value="privado">Privado</option>

	</select><br>
	<label>Resumo</label>
	<input type="text" name="resumo" class="form-control" value="<?php echo $dados['resumo'];?>"><br>
	<label>Publicação</label>
<html>
	
	<body>
	  
    <div id="padrao">
        
        <div id="navbar">
            <ul id="ul1">
                <li class="icon-bold lizinho" onclick="bold(1)" title="Negrito"></li>|
                <li class="icon-italic lizinho" onclick="bold(2)" title="Itálico"></li>|
                <li class="icon-underline lizinho" onclick="bold(3)" title="Underline"></li>|
                <li class="icon-strike lizinho" onclick="bold(7)" title="Strike"></li>|
                <li class="icon-indent lizinho" onclick="bold(4)" title="Titulo" style="font-weight: bold; font-size: 12pt; font-style: italic;">T</li>|
                <li class="icon-text lizinho" onclick="bold(9)" title="Parágrafo" style="font-weight: bold; font-size:12pt; font-style: italic;">P</li>|
               <li class="icon-text lizinho" onclick="bold(11)" title="Marcação" style="font-weight: bold; font-size:12pt;">M</li>|
               <li class="icon-text lizinho" onclick="bold(12)" title="Blockquote" style="font-weight: bold; font-size:12pt;">BL</li>|
               <li class="icon-text lizinho" onclick="bold(13)" title="Img" style="font-weight: bold; font-size:12pt;">IMG</li>|
                <li class="lizinho" style="list-style: none; font-weight: bold; font-size:12pt; font-style: italic;" onclick="bold(8)" title="Lista de coisas">Li</li>|
                <li class="icon-link lizinho" onclick="bold(6)" title="Link"></li>|
                <li class="lizinho" onclick="bold(10)" title="quebra linha" style="list-style: none; font-weight: bold; font-size:12pt; font-style: italic;">Qb. LINHA</li>|

                <li class="lizinho" onclick="volta()" title="Corrige erro" style="font-weight: bold; font-size: 12pt; font-style: italic;">C</li>|
                
                <label class="lizinho" for="check" title="Configurações">Config</label><input id="check" class="check" type="checkbox">
                <div id="mostraDiv">
                    <span id="spanX" onclick="retira()">X</span>
                    <label>Tamanho:</label><input type="number" value="14" class="input1 valores">
                    
                    <label>Fonte:</label> <select id="Select" class="input1 valores">
                        <option value="">Selecione</option>
                        <option value="Arial, Helvetica, sans-serif">Arial</option>
                        <option value="Verdana">Verdana</option>
                        <option value="fantasy">Fantasy</option>
                        <option value="cursive">Cursive</option>
                        <option value="Georgia">Georgia</option>
                        
                    </select>
                    <label>Cor:</label><input class="input1 valores inputCor" id="cor" type="color"><br>
                    <input type="button" value="Aplicar" class="input1" onclick="aplicar()">
                    
                </div>
            </ul>
        <textarea name="post" id="texto"><?php echo $dados['postagem'];?></textarea>
    </div>
    
       <div id="div1">
        <small style="color: black; font-style: italic;"></small>
       </div>
    </div>
    
    
        <script src="js/jscolor.min.js"></script>
		<script src="js/editor.js"></script>
	</body>
</html>
	<input type="submit" value="Alterar Publicação" class="btn btn-outline-primary btn-lg btn-block">
	<input type="hidden" name="env" value="post">
</form>

<?php
	if(isset($_POST['env']) && $_POST['env'] == "post"){
		if($_POST['titulo'] && $_POST['post'] && $_POST['resumo']){
			$titulo = $_POST['titulo'];
			$cat = $_POST['categoria'];
			$status = $_POST['status'];

			$resumo = $_POST['resumo'];
			$post = $_POST['post'];

			$sql = $con->prepare("UPDATE posts SET titulo = ?, categoria = ?, status = ?, postagem = ?, resumo = ?, atualizada = ? WHERE id = ?");
			$sql->bind_param("sssssss", $titulo, $cat, $status, $post, $resumo, $data, $idPost);
			$sql->execute();

			if($sql->affected_rows > 0){
				echo "<div class='alert alert-success'>Publicação alterada com sucesso!</div>";
			}else{
				echo "<div class='alert alert-danger'>Erro ao alterar a publicação!</div>";
			}


		}else{
			echo "<div class='alert alert-danger'>Preencha todos os campos</div>";
		}
	}
?>