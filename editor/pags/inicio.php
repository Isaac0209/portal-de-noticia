<div class="inicio">

<?php
$hr = date(" H ");
if($hr >= 12 && $hr<18) {
$resp = "Boa tarde";}
else if ($hr >= 4 && $hr <12 ){
$resp = "Bom dia";}
else if ($hr >= 0 && $hr <4) {
$resp = "Boa madrugada";}
else {
  $resp = "Boa noite";}

?>
<?php 
  if (!isset($_SESSION)) session_start();
  
   include_once("ip.php");
  ?>

    <?php

 

  $idUser = $_SESSION['usuarioID'];
  $query = $con->prepare("SELECT * FROM usuarios WHERE id = ?");
  $query->bind_param("s", $idUser);
  $query->execute();
  $dados = $query->get_result()->fetch_assoc();

if($idUser == $dados['id'] && $dados['twitter'] == null)
{
 $_SESSION['pendencias'] = true;
}


?>

<?php
                    if(isset($_SESSION['pendencias'])):
                    ?>
                    <a href="editor/perfil">
<div class="aviso">
<div class="alert alert-warning">
<p>Olá, você tem pendencias na sua conta para resolver! Clique AQUI para resolver</p>
</div>
</div>
</a>
<?php
                    endif;
                    unset($_SESSION['pendencias']);
                    ?>
                   <h1 class="nome"><?php echo $resp;?> <?php echo $_SESSION['usuarioNome'];?></h1>
<div class="aviso">
<div class="alert alert-danger">

	<?php
	$sql = $con->prepare("SELECT * FROM aviso ORDER BY mensagem DESC");
	$sql->execute();
	$get = $sql->get_result();
	$total = $get->num_rows;
		 



	

	if($total <= 0){
		echo "<div class='alert alert-danger'>Nenhum Aviso!</div>";
	}else {
		$query = $con->prepare("SELECT * FROM aviso ORDER BY mensagem DESC");
			$query->execute();
			$get = $query->get_result();
			$total = $get->num_rows;
			$dados = $get->fetch_array();
			echo $dados['mensagem'];
	}

?>
</div>
<?php
$query = $con->prepare("SELECT * FROM att ORDER BY mensagem DESC");
         $query->execute();
         $get = $query->get_result();
         $total = $get->num_rows;
         if($total > 0){
            while($dados = $get->fetch_array()){
     
?>

<?php
                    if(isset($_SESSION['atualizacao'])):
                    ?>

        <div class="modal">
        	<div onclick="fechar()" class="fechar">X</div>
        	
        	<h1>Atualização</h1>
        	<p><?php echo $dados['mensagem'];?></p>
        
    </div>
<script src="admin/script.js"></script>
 <?php
                    endif;
                    unset($_SESSION['atualizacao']);
                    ?>
  <?php }}?>




  </div>
  


<div class="ultimasposts">
  
<h1>Ultimas Postagens</h1>
<hr>

<?php
      $query = $con->prepare("SELECT * FROM posts ORDER BY id DESC LIMIT 3");
      $query->execute();
      $get = $query->get_result();
      $total = $get->num_rows;
      if($total > 0){
        while($dados = $get->fetch_array()){
    ?>
    <tr>
     
      <a href="p/<?php echo $dados['id'];?>"><p><?php echo $dados['titulo'];?></p></a>
      
      </td>
    </tr>
  <?php }}?>
</div>    	

 </div>