<?php

if(!isset($_SESSION)){
      session_start();
}

if (!isset($_SESSION['ClienteID']) || !is_numeric($_SESSION['ClienteID'])) {
  
}else{
  header('Location: principal.php');
}

?>
<!DOCTYPE html>
<html lang="pt-br">
  <head>
    <!-- Meta tags Obrigatórias -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css_boots/bootstrap.min.css">
    <link rel="stylesheet" href="css/personalizado.css" >

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">

    <!-- HTML5Shiv -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <![endif]-->

    <!-- Estilo customizado -->
    <link rel="stylesheet" type="text/css" href="css/estilo.css">

    <title>HomeFrúti</title>
    <link rel="icon" href="imagens/icon.png">
  </head>
  <body>
    
    <header><!-- inicio Cabecalho -->
      <nav class="navbar navbar-expand-md navbar-light fixed-top navbar-transparente">
        <div class="container">
          
          <a href="index.php" class="navbar-brand">
            <img src="imagens/logo.png" width="100" class="ml-0">
          </a>

          <button class="navbar-toggler" data-toggle="collapse" data-target="#nav-principal">
            <i class="fas fa-bars text-white"></i>
          </button>

          <div class="collapse navbar-collapse" id="nav-principal">
            <ul class="navbar-nav ml-auto">
              
              <li class="nav-item">
                <a href="cadastrarCliente.php" class="nav-link">Cadastre-se</a>
              </li>

              <li class="nav-item divisor"></li>

             
              <li class="bootoon nav-item">
                <a href="entrar.php" class=" bootoon nav-link">Entrar</a>
              </li>

            </ul>
          </div>

        </div>
      </nav>
    </header><!--/fim Cabecalho -->

    <section id="home" class="d-flex"><!--home -->
      <div class="container align-self-center"><!--container -->
        <div class="row"><!--row -->
          <div class="col-md-12 capa">
            
            
                
                

                <div class="">
                  <h1>Compre no Homefrúti e desfrute</h1>
                  
                  <a href="cadastrarHortifruti.html" class="btn btn-lg btn-custom btn-verde">
                    Cadastre seu Hortifrúti
                  </a>
                </div>

              

          </div>
        </div><!--/row -->
      </div><!--/container -->
    </section><!--/home -->



    <section id="servicos" class="caixa">
      <div class="container">
        <div class="row">
          <div class="col-md-6">
            <div class="row albuns">
              <div class="col-md-6">
                <img src="imagens/delivery.png" style="width: 200px; height: 185px; margin-left: 30px; margin-top: 5px"class="img-fluid">
              </div>
              <div class="col-md-5">
                <img src="imagens/medal1.png" clas style="width: 200px; height: 200px; margin-bottom:10px; margin-right: 80px; margin-top: 0"class="img-fluid">
              </div>
            </div>
            <div class="row albuns">
              <div class="col-md-6">
                <img src="imagens/cestaimg4.png" style="width: 200px; height: 200px; margin-left: 18px" class="img-fluid">
              </div>
              <div class="col-md-6">
                <img src="" class="img-fluid">
              </div>
            </div>
          </div>
          <div class="col-md-6">
            
            <h2>O que o Homefrúti tem?</h2>

            <h3>Entregas</h3>
            <p>
              Comodidade como você nunca teve na hora de realizar suas compras. Compre, pague e aguarde que sua compra chegará com segurança.
            </p>

            <h3>Qualidade</h3>
            <p>Escolha os produtos que deseja e fique tranquilo. Nossos produtos são escolhidos dedo a dedo e prezamos sempre pela qualidade.</p>

            <h3>Cestas</h3>
            <p>Você não tem tempo para escolher? Relaxe. Temos cestas pré-montadas para que você consiga ter todos os dias em sua casa as frutas e hortaliças que deseja.</p>

          </div>
        </div>
      </div>
    </section>



    <section id="recursos" class="caixa">
      <div class="container">
        <div class="row">
          <div class="col-md-4">

            <h2>Lorem</h2>  
            <h3>Ipsum</h3>
            <p>Donec eleifend non quam sit amet bibendum.
            </p>

            <h3>Lorem Ipsum</h3>
            <p>Nunc rutrum hendrerit orci, ut cursus elit venenatis in. Suspendisse lacinia cursus sapien, a sollicitudin turpis sollicitudin eget.
            </p>

            <h3>Lorem Ipsum</h3>
            <p>Maecenas accumsan, purus tristique hendrerit fringilla, felis magna tincidunt justo, ut fringilla risus sem at tortor.
            </p>

          </div>
          <div class="col-md-8">
            <div class="row rotacionar">
              <div class="col-md-6">
                <img src="imagens/abacaxi3.png" width="1000px" class="img-fluid">
              </div>
              <div class="col-md-6">
                <img src="imagens/abacaxi3.png" width="1000px" class="img-fluid">
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>

    <footer>
      <div class="container">
        
        <div class="row">
              <div class="col-md-4  ">
                <h4>homefrúti</h4>
                <ul class="navbar-nav">
                  <li><a href="">Quem somos</a></li>
                  <li><a href="">Fale conosco</a></li>
                </ul>
              </div>

              <div class="col-md-4">
                <h4>descubra</h4>
                <ul class="navbar-nav">
                  <li><a href="">Como pedir</a></li>
                  <li><a href="">Cadastre seu Hortifrúti</a></li>
                  <li><a href="">Marcas</a></li>
                </ul>
              </div>
          
              <div class="col-md-4">
                <ul>
                  <li>
                    <a href=""><img src="imagens/facebook.png"></a>
                  </li>
                  <li>
                    <a href=""><img src="imagens/twitter.png"></a>
                  </li>
                  <li>
                    <a href=""><img src="imagens/instagram.png"></a>
                  </li>
                </ul>
              </div>
        </div>

              <hr>
              <div class="line"></div>
          
              <div style="display: inline;">
                <img src="imagens/logo.png" width="100" >
              </div>


              <div class="fundoFooter">
                <label>&copy; Copyright 2019 - homefruti - Todos<br> 
                                         os direitos reservados homefruti<br> 
                                         com Agência de Hortifrútis Online S.A.</label>
                <a href="">Privacidade</a>
                <a href="">Código de conduta</a>
                <a href="">Termos e condições de uso</a>
              </div>
          
      </div>

             
        
      
          
    </footer>

    <!-- JavaScript (Opcional) -->
    <!-- jQuery primeiro, depois Popper.js, depois Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
  </body>
</html>