<?php include_once("lib/includes.php");


?>
<!doctype html>

  <head>
    
    <!-- Required meta tags -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300&display=swap" rel="stylesheet">
    <script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client=ca-pub-2331557792355902"
     crossorigin="anonymous"></script>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <base href="<?php echo $url;?>">
    <link rel = "shortcut icon" type = "imagem/x-icon" href = "images/index/IMG_20211009_135606.png"/>
    <script type="text/javascript" src="//code.jquery.com/jquery-1.11.0.min.js"></script>
    <script type="text/javascript" src="//code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
    <script type="text/javascript" src="slick/slick.min.js"></script>
    <script type="text/javascript" src="js/slider.js"></script>
                <!-- Bootstrap CSS -->
    <link rel="stylesheet" type="text/css" media="(max-width: 900px)" href="css/stylemob.css">

    <link rel="stylesheet" type="text/css" href="slick/slick.css"/>
    <link rel="stylesheet" type="text/css" href="slick/slick-theme.css"/>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.2.0/css/all.css">
    <link rel="stylesheet" href="css/style.css">

    <title><?php echo gera_titulo("Curiosidades Universais", false, $con);?></title>
  </head>
  <body>
    <header id="header">
    <img id="logo" href="index.php" src="images/index/foto.png"></img>
    <nav class="nav" id="nav">
      <button aria-label="Abrir Menu" id="btn-mobile" aria-haspopup="true" aria-controls="menu" aria-expanded="false">
        <span id="hamburger"></span>
      </button>
      <ul id="menu" role="menu" class="menu">
        <li><a href="index.php">Inicio</a></li>
        <li><a href="noticias">Todas as notícias</a></li>
        <li><a>Notícias</a>
                <ul>
                    <li><a href="teoria">Teoria</a></li>
                    <li><a href="curiosidade">Curiosidade</a></li>
                    <li><a href="tecnologia">Tecnologia</a></li>
                    <li><a href="espaco">Espaço</a></li>
                    <li><a href="militar">Militar</a></li>
                    <li><a href="cinema">Cinema</a></li>
                    <li><a href="jogos">Jogos</a></li>
                    <li><a href="internet">Internet</a></li>
                    <li><a href="saúde">Saúde</a></li>
                    <li><a href="ciências">Ciências</a></li>
                    <li><a href="tragédia">Tragédia</a></li>



                </ul>



        </li>
            
       
        <li><a href="">Apoia-se[EM BREVE]</a></li>
        <li><a class="feed" onclick="openModal('dv-modal')">Feedback</a></li>
      </ul>
    </nav>
  </header>
  <script src="js/menu-mobile.js"></script>

<br>

 
    <div class="row">
      <div class="col-sm-6 offset-md-3">




        <?php echo carrega_pagina($con, $data, false);?>

      </div>
    </div>
       <script src="js/modal.js"></script>
   <!-- modal feedback !-->
    <div class="content">

       
<div class="texto">
        <h1>Feedback</h1>
            </div>
    </div>

    <div id="dv-modal" class="modal">
        <div class="modal-content">
            <div class="modal-header">
                <h1>Feedback</h1>
            </div>
<form method="POST" enctype="multipart/form-data" id="form-publicar">
            <div class="modal-body">
              <label>Nome:</label>
                <input class="feedbackinput" type="text" name="nome">
             
             <label>Email:</label>
                <input class="feedbackinput" type="text" name="email">
             
             <label>Sua Opinião:</label>
                <textarea class="feedbackinput" type="text" name="opiniao" rows="5"></textarea>
             
             <input type="submit" value="Enviar Feedback" class="btn btn-outline-primary btn-lg btn-block">
  <input type="hidden" name="env" value="post">
            </div>
          </form>
            <div class="modal-footer">
                <button id="fechar2" class="btn" onclick="closeModal('dv-modal')">Fechar</button>
            </div>
        </div>
    </div>
<!-- MODAL DE ANUNCIOS !-->


<div id="modal-promocao" class="modal-container">
    <div class="modal2">
      
      <h3 class="subtitulo">Limpando o cache, Aguarde!</h3>
      
        
    </div>
  </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
    <?php
  if(isset($_POST['env']) && $_POST['env'] == "post"){
    if($_POST['nome'] && $_POST['email'] && $_POST['opiniao']){
    
      $nome = $_POST['nome'];
      
      $email = $_POST['email'];
      $opiniao = $_POST['opiniao'];
    


      $query = $con->prepare("INSERT INTO feed (nome, email, opiniao) VALUES (?, ?, ?)");
      $query->bind_param("sss", $nome, $email, $opiniao);
      $query->execute();

      if($query->affected_rows > 0){
         echo "<script>alert('Feedback Enviado!');</script>";

      }else{
       echo "<script>alert('Erro!,tente novamente!');</script>";
      }


    }else{
     echo "<script>alert('Preencha corretamente!');</script>";
    }
  }
?>
<script type="text/javascript">
  


        function iniciaModal(modalID) {
            if(localStorage.fechaModal2 !== modalID) {
                const modal = document.getElementById(modalID);
                 window.location.reload(true);
                 localStorage.fechaModal2 = modalID;
                if(modal) {
                    modal.classList.add('mostrar');
                    modal.addEventListener('click', (e) => {
                        if(e.target.id == modalID || e.target.className == 'fechar') {
                            modal.classList.remove('mostrar');
                            
                               

                            ;
                        }
                    });
                }
            }
        }

       
        document.addEventListener('scroll', () => {
            if(window.pageYOffset > 0) {
                iniciaModal('modal-promocao')
            }
        })
</script>


<script src="https://cdn.onesignal.com/sdks/OneSignalSDK.js" async=""></script>
<script>
  window.OneSignal = window.OneSignal || [];
  OneSignal.push(function() {
    OneSignal.init({
      appId: "a1d05560-6368-4ccf-a715-1df9c87c6955",
    });
  });


</script>
<div class="rodape">

<img class="rodapeimg" src="images/index/menu.png">
<div class="redes3">
    <img src="images/rede-sociais/facebook1.png">
    <img src="images/rede-sociais/twitter1.png">
    <a target="_blank" href="https://www.instagram.com/curi.osidadesuniverso/"><img src="images/rede-sociais/instagram1.png"></a>


</div>
<p>©Copyright 2021-2021 - Curiosidades Universais</p>



</div>

  </body>

</html>