<?php 
include("protect.php");
include_once("conexao.php");
protect();

?>
<html lang="pt-br">
  <head>
    <!-- Meta tags Obrigatórias -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css_boots/bootstrap.min.css" >
    <link rel="stylesheet" href="css/personalizado.css" >

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">

    <!-- HTML5Shiv -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <![endif]-->

    <!-- Estilo customizado -->
    <link rel="stylesheet" type="text/css" href="css/estilo_principal.css">

    <title>HomeFrúti</title>
    <link rel="icon" href="imagens/icon.png">
    </head>
    <body>
      <header><!-- inicio Cabecalho -->
      <nav class="navbar navbar-expand-md navbar-light fixed-top navbar-transparente shadow-sm p-3 mb-5  rounded">
        <div class="container">

          <a href="principal.php" class="navbar-brand">
            <img src="imagens/logo2.png" width="100" class="ml-0 mr-5">
          </a>

          <button class="navbar-toggler" data-toggle="collapse" data-target="#nav-principal">
            <i class="fas fa-bars text-white"></i>
          </button>

          <div class="collapse navbar-collapse" id="nav-principal">
            <ul class="navbar-nav ml-auto">

              <li class="nav-item divisor" ></li>

              <li class="nav-item">
                <a href="perfil.php" class="nav-link"><img src="imagens/perfil.png" width="25" class="mb-2 mr-1">Perfil</a>
              </li>
              <!--
              <li class="nav-item divisor"></li>

              
              <li class="nav-item">
                <a href="" class="nav-link"><img src="imagens/cesta.png" width="25" class="mb-2 mr-1">Cesta</a>
              </li>
              -->

              <li class="nav-item divisor"></li>

              <li class="nav-item">
                  <a href="logout.php" class="nav-link" method = "POST" action = "logout.php">Sair<img src="imagens/logout.png" width="25" class="mb-2 ml-1"></a>
              </li>

            </ul>
          </div>

        </div>
      </nav>
    </header><!--/fim Cabecalho -->
    <section id="home" class="d-flex"><!--home -->
      <div class="container" style="margin-top: 100px;"><!--container -->
      <div class="row"><!--row -->

                 <div><label style="margin:0px 0px 10px 35px; font-size: 35px">Hortifrútis</label></div> 

                 <div>
                       <?php

                        $sql = "SELECT * FROM estabelecimento;";
                        $query = mysqli_query($conexao, utf8_decode($sql));

                        while($resultado = mysqli_fetch_assoc($query)){
                          //echo 'id: '.$resultado['idEstabelecimento'].'<br>';
                          //echo 'cnpj: '.$resultado['cnpj'].'<br>';
                          //echo 'nome: '.$resultado['nome'].'<br>';
                          //echo 'endereço: '.$resultado['endereco'].'<br>';
                          //echo 'telefone: '.$resultado['telefone'].'<br>';
                          echo '
                                  <input type="hidden" name="id" value="'.$resultado['idEstabelecimento'].'">

                                  <div class="item">
                                    <a href="produtos.php?id='.$resultado['idEstabelecimento'].'&nome='.$resultado['nome'].'&telefone='.$resultado['telefone'].'">
                                      <img src="imagens/store.png" width= "80" height = "80" class="rounded-circle" style="float: left">
                                    
                                    <div class="conteudo">
                                        <p class="info1"><b>'.$resultado['nome'].'</b></p>
                                        <p class="info1">Telefone: '.$resultado['telefone'].'</p>
                                    </div>
                                    </a>
                                  </div>
                                ';
                        }

                       ?>
                 </div>

        </div><!--/row -->
      </div><!--/container -->
    </section><!--/home -->


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