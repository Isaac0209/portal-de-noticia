<!-- teste !-->

<script src="admin/script.js" defer></script>
<form method="POST" enctype="multipart/form-data" id="form-publicar">
	<label>Titulo</label>
	<input type="text" name="titulo" class="form-control"><br>
	<label>Categoria</label><br>
	<select name="categoria" class="form-control">
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
	<div class="alert alert-warning">Envie uma foto com largura acima de 1000PX!</div><br>

	<label>Imagem</label>
	<input type="file" name="userfile" class="form-control"><br>
	<label>Resumo</label>
	<input type="text" name="resumo" class="form-control"><br>
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
                <li class="icon-indent lizinho" onclick="bold(4)" title="Titulo" style="font-weight: bold; font-size: 12pt;">T</li>|

                <li class="icon-text lizinho" onclick="bold(9)" title="Parágrafo" style="font-weight: bold; font-size:12pt;">P</li>|

              	<li class="icon-text lizinho" onclick="bold(11)" title="Marcação" style="font-weight: bold; font-size:12pt;">M</li>|

              	<li class="icon-text lizinho" onclick="bold(12)" title="Blockquote" style="font-weight: bold; font-size:12pt;">BL</li>|

              	<li class="icon-text lizinho" onclick="bold(13)" title="Img" style="font-weight: bold; font-size:12pt;">IMG</li>|

                <li class="lizinho" style="list-style: none; font-weight: bold; font-size:12pt; font-style: italic;" onclick="bold(8)" title="Marcação">Li</li>|

                <li class="icon-link lizinho" onclick="bold(6)" title="Link"></li>|
                <li class="lizinho" onclick="bold(10)" title="quebra linha" style="list-style: none; font-weight: bold; font-size:12pt;">Qb. LINHA</li>|
                <li class="lizinho" onclick="volta()" title="Corrige erro" style="font-weight: bold; font-size: 12pt;">C</li>|
                
                <label class="lizinho" for="check" title="Configurações" style="font-weight: bold; font-size: 12pt;">Config</label><input id="check" class="check" type="checkbox">
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
        <textarea name="post" id="texto"></textarea>
    </div>
    
       <div id="div1">
        <small style="color: black; font-style: italic;"></small>
       </div>
    </div>
    
    
        <script src="js/jscolor.min.js"></script>
		<script src="js/editor.js"></script>
	</body>
</html>

	
	
	<div class="alert alert-warning">Por favor,Envie uma imagem No formulario IMAGEM</div>
	<input type="submit" value="Enviar Publicação" class="btn btn-outline-primary btn-lg btn-block">
	<input type="hidden" name="env" value="post">
</form>
<?php
	if(isset($_POST['env']) && $_POST['env'] == "post"){
		if($_POST['titulo'] && $_POST['post'] && $_POST['resumo']){
			$idUser = $_SESSION['usuarioID'];
			$titulo = $_POST['titulo'];
			$cat = $_POST['categoria'];
			$status = $_POST['status'];
			$resumo = $_POST['resumo'];
			$post = $_POST['post'];
			
			$uploaddir = '../images/uploads/';
			$uploaddirN = 'images/uploads/';
			$uploadfile = $uploaddir.basename($_FILES['userfile']['name']);
			$uploadfileN = $uploaddirN.basename($_FILES['userfile']['name']);


			$query = $con->prepare("INSERT INTO posts (id_postador, titulo, data, postagem, resumo, categoria, status, imagem) VALUES (?, ?, ?, ?, ?, ?, ?, ?)");
			$query->bind_param("ssssssss", $idUser, $titulo, $data, $post, $resumo, $cat, $status, $uploadfileN);
			$query->execute();

			if($query->affected_rows > 0 && move_uploaded_file($_FILES['userfile']['tmp_name'], $uploadfile)){
				echo "<div class='alert alert-success'>Publicação enviada com sucesso!</div>";
			}else{
				echo "<div class='alert alert-danger'>Erro ao enviar a publicação!</div>";
			}


		}else{
			echo "<div class='alert alert-danger'>Preencha todos os campos</div>";
		}
	}
?>