<?php 

  session_start();
  include_once("lib/includes.php");
 
?>



<!doctype html>

  <head>

   <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.2.0/css/all.css">
  <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300&display=swap" rel="stylesheet">
      <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400&display=swap" rel="stylesheet">

    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500&display=swap" rel="stylesheet">

    <link href="https://fonts.googleapis.com/css?family=Source+Serif+Pro:400,600&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="fonts/icomoon/style.css">

    <link rel="stylesheet" href="css/owl.carousel.min.css">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <base href="<?php echo $url;?>">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.2.0/css/all.css">
     <link rel="stylesheet" href="css/icons.css">
        <link rel="stylesheet" href="css/editor1.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.2.0/css/all.css">
    <link rel="stylesheet" href="css/style.css"> 
    <link rel="stylesheet" href="css/styleadmin.css">
    <link rel="stylesheet" type="text/css" href="css/stylemob.css">

    <title><?php echo gera_titulo("Painel de Jornalista", true, $con);?></title>
  </head>
  <body>
   

  <div class="content">

    <div class="row">
      <?php if(isset($_SESSION['usuarioID'])){?>
       
  </div>
 
    <script src="admin/menu.js"></script>
    <aside class="sidebar">
      <div class="toggle">
        <a href="#" class="burger js-menu-toggle" data-toggle="collapse" data-target="#main-navbar">
              <span></span>
            </a>
      </div>
      <div class="side-inner">

        <div class="profile">
      <?php
  $idUser = $_SESSION['usuarioID'];
  $query = $con->prepare("SELECT * FROM usuarios WHERE id = ?");
  $query->bind_param("s", $idUser);
  $query->execute();
  $dados = $query->get_result()->fetch_assoc();

?>

          <img src="<?php echo $dados['foto']; ?>" alt="Image" class="img-fluid">
          
          <h3 class="name"><?php echo $_SESSION['usuarioNome'];?></h3>
          <span class="country"><?php echo $_SESSION['usuarioNivel'];?></span>
        </div>

        
        <div class="nav-menu">
          <ul>
            <li class="accordion">
              <a href="#" data-toggle="collapse" data-target="#collapseOne" aria-expanded="false" aria-controls="collapseOne" class="collapsible">
                <span class="icon-home mr-3"></span>Geral
              </a>
              <div id="collapseOne" class="collapse" aria-labelledby="headingOne">
                <div>
                  <ul>
                    <li><a href="editor/inicio">Inicio</a></li>
                   
                      <li><a href="editor/informacoes">Informações do email</a></li>
                   
                  </ul>
                </div>
              </div>
            </li>
            <li class="accordion">
              <a href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo" class="collapsible">
                <span class="icon-search2 mr-3"></span>Publicações
              </a>

              <div id="collapseTwo" class="collapse" aria-labelledby="headingOne">
                <div>
                  <ul>
                    <li><a href="editor/publicar">Publicar</a></li>
                    <li><a href="editor/gerenciar-posts">Gerenciar Publicação</a></li>
                   
                  </ul>
                </div>
              </div>

            </li>
             
             <li class="accordion">
              <a href="#" data-toggle="collapse" data-target="#collapse4" aria-expanded="false" aria-controls="collapse4" class="collapsible">
                <span class="icon-search2 mr-3"></span>Galeria
              </a>

              <div id="collapse4" class="collapse" aria-labelledby="headingOne">
                <div>
                  <ul>
                    <li><a href="editor/uparfoto">Upar Foto</a></li>
                    <li><a href="editor/gerenciar-foto">Gerenciar Foto</a></li>
                   
                  </ul>
                </div>
              </div>

            </li>
            
             <li><a href="editor/perfil"><span class="icon-sign-out mr-3"></span>Editar perfil</a></li>
            <li><a href="editor/sair"><span class="icon-sign-out mr-3"></span>Sair</a></li>
          </ul>
        </div>
      </div>
      
    </aside>
    <div class="relogio"><?php echo $data; ?></div>

    <?php }?>

      <div class="<?php if(!isset($_SESSION['usuarioID'])){?>col-sm-5 offset-md-4<?php }else{?>col-sm-9<?php }?>">
        <?php echo carrega_pagina($con, $data, true);?>
      </div>
    </div>
  </div>
    

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="js/jquery-3.3.1.min.js"></script>
    
    <script src="js/main.js"></script>
      <script src="js/owl.carousel.min.js"></script>
       <script src="js/menu.js"></script>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
  </body>
</html>
