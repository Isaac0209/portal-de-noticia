
<?php
	$idUser = $_SESSION['usuarioID'];
	$query = $con->prepare("SELECT * FROM usuarios WHERE id = ?");
	$query->bind_param("s", $idUser);
	$query->execute();
	$dados = $query->get_result()->fetch_assoc();

?>

<h1>Informações sobre meu email</h1>


<p>Email:<?php echo $dados['email'];?></p>
<p>Senha:<?php echo $dados['senhadoemail'];?></p>

<div class="alert alert-danger">Para evitar problemas! Não altere nenhuma informações do seu email!</div>
<details>
	<summary>Como acessar meu email?(Windows)</summary>
	<P>Para acessar seu email basta seguir os passos abaixo!</p>

	<p>1 - Baixe ou acesse o aplicativo de email do windows</p>
	<p>2 - Clique em "Adicionar Conta"</p>
	<p>3 - Depois Clique em "Configuração avançada"</p>
	<img src="images/1.jpg">
	<p>4 - Preencha as informações fornecida aqui</p>
	<p>Porta de entrada:993<br>Porta de saida:465</p>
	<img src="images/3.jpg">
	<img src="images/4.jpg">

</details>
<details>
	<summary>Como acessar meu email?(Celular)</summary>
	<p>Para acessar seu email no celular basta seguir os passos abaixo!</p>
	<p>1 - Acesse o aplicativo do gmail</p>
</details>