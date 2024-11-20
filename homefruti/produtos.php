<?php 
include("protect.php");
include_once("conexao.php");
protect();
$valor_total = 00.00;

?>

<!DOCTYPE html>
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
    <link rel="stylesheet" type="text/css" href="css/estilo_produtos.css">

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

    
    <div id="container" class="geral"><!-- Inicio Conteudo -->
      
      <div class="clear" id="produtos">           <!--INICIO PRODUTOS Feito--> 
          <div class="banner">
          </div>

          <?php 

          $idEstabelecimento = $_GET['id'];
          $nome = $_GET['nome'];
          $telefone = $_GET['telefone'];
          define('categoria_idCategoria', 'categoria_idCategoria');

          echo '<p class="ml-2" style="font-size: 50px">'.$nome.'</p>
                <p class="ml-2" style="font-size: 22px"><b >Telefone: <label id = "telefone">'.$telefone.' </label></b></p>

                <hr style="border: 1px solid black">';

              $sql = "SELECT * FROM produto WHERE estabelecimento_idEstabelecimento = ".$idEstabelecimento." AND ".categoria_idCategoria." = '1';";
              $query1 = mysqli_query($conexao, utf8_decode($sql));

              echo '<div class="clear" >
                      <p class="ml-2 mt-5" style="font-size: 35px">Cestas</p> <!--CESTAS-->';

              while($resultado = mysqli_fetch_assoc($query1)){
                echo '
                      <div class="item" >
                        <a href="./add_produto_carrinho.php?idEstabelecimento='.$idEstabelecimento .'&idProduto='.$resultado['idProduto'].'">
                          <img src="imagens/cestaimg.png" class="figura" width= "40%" height = "150">
                          <div class="conteudo">
                            <b><p class="info1">'.$resultado['nome'].'</p></b>
                            <p style="margin-top: 10px;"></p>
                            <p class="info3"><b>Descrição: </b>'.$resultado['descricao'].'</p>
                            <p class="price text-green mt-5">R$ '.$resultado['preco'].'</p>
                          </div>
                        </a>
                      </div>
                      ';
              }

              echo '</div>';

              $sql = "SELECT * FROM produto WHERE estabelecimento_idEstabelecimento = ".$idEstabelecimento." AND ".categoria_idCategoria." = '2';";
              $query2 = mysqli_query($conexao, utf8_decode($sql));

              echo '<div class="clear" >
                      <p class="m-2  mt-5" style="font-size: 35px">Frutas</p> <!--FRUTAS-->';

              while($resultado = mysqli_fetch_assoc($query2)){
                echo '
                      <div class="item">
                       <a href="./add_produto_carrinho.php?idEstabelecimento='.$idEstabelecimento .'&idProduto='.$resultado['idProduto'].'">
                          <img src="imagens/frutasimg.png" class="figura" width= "40%" height = "150">
                          <div class="conteudo">
                            <b><p class="info1">'.$resultado['nome'].'</p></b>
                            <p style="margin-top: 10px;"></p>
                            <p class="info3"><b>Descrição: </b>'.$resultado['descricao'].'</p>
                            <p class="price text-green mt-5">R$ '.$resultado['preco'].'</p>
                          </div>
                        </a>
                      </div>
                      ';
              }

              echo '</div>';

              $sql = "SELECT * FROM produto WHERE estabelecimento_idEstabelecimento = ".$idEstabelecimento." AND ".categoria_idCategoria." = '3';";
              $query3 = mysqli_query($conexao, utf8_decode($sql));

              echo '<div class="clear" >
                      <p class="ml-2 mt-5" style="font-size: 35px">Verduras</p><!--VERDURAS-->';

              while($resultado = mysqli_fetch_assoc($query3)){
                echo '
                      <div class="item">
                       <a href="./add_produto_carrinho.php?idEstabelecimento='.$idEstabelecimento .'&idProduto='.$resultado['idProduto'].'">
                          <img src="imagens/vegetalimg.png" class="figura" width= "40%" height = "150">
                          <div class="conteudo">
                            <b><p class="info1">'.$resultado['nome'].'</p></b>
                            <p style="margin-top: 10px;"></p>
                            <p class="info3"><b>Descrição: </b>'.$resultado['descricao'].'</p>
                            <p class="price text-green mt-5">R$ '.$resultado['preco'].'</p>
                          </div>
                        </a>
                      </div>
                      ';
              }

              echo '</div>';

              $sql = "SELECT * FROM produto WHERE estabelecimento_idEstabelecimento = ".$idEstabelecimento." AND ".categoria_idCategoria." = '4';";
              $query4 = mysqli_query($conexao, utf8_decode($sql));

              echo '<div class="clear" >
                      <p class="ml-2 mt-5" style="font-size: 35px">Legumes</p><!--LEGUMES-->';

              while($resultado = mysqli_fetch_assoc($query4)){
                echo '
                      <div class="item">
                      <a href="./add_produto_carrinho.php?idEstabelecimento='.$idEstabelecimento .'&idProduto='.$resultado['idProduto'].'">
                          <img src="imagens/vegetalimg.png" class="figura" width= "40%" height = "150">
                          <div class="conteudo">
                            <b><p class="info1">'.$resultado['nome'].'</p></b>
                            <p style="margin-top: 10px;"></p>
                            <p class="info3"><b>Descrição: </b>'.$resultado['descricao'].'</p>
                            <p class="price text-green mt-5">R$ '.$resultado['preco'].'</p>
                          </div>
                        </a>
                      </div>
                      ';
              }

              echo '</div>';

              $sql = "SELECT * FROM produto WHERE estabelecimento_idEstabelecimento = ".$idEstabelecimento." AND ".categoria_idCategoria." = '5';";
              $query5 = mysqli_query($conexao, utf8_decode($sql));

              echo '<div class="clear" >
                      <p class="ml-2 mt-5" style="font-size: 35px">Outros</p><!--OUTROS-->';

              while($resultado = mysqli_fetch_assoc($query5)){
                echo '
                      <div class="item">
                       <a href="./add_produto_carrinho.php?idEstabelecimento='.$idEstabelecimento .'&idProduto='.$resultado['idProduto'].'">
                          
                          <div class="conteudo">
                            <b><p class="info1">'.$resultado['nome'].'</p></b>
                            <p style="margin-top: 10px;"></p>
                            <p class="info3"><b>Descrição: </b>'.$resultado['descricao'].'</p>
                            <p class="price text-green mt-5">R$ '.$resultado['preco'].'</p>
                          </div>
                        </a>
                      </div>
                      ';
              }

              echo '</div>';


            ?>

      </div>

      <!--FIM PRODUTOS-->
      
      <div id="cesta" class="sticky-top shadow-sm  rounded">        <!--INICIO CESTA-->
            <p class=" mb-0 mt-5 cinza">Seu pedido em</p>

            <?php
            $nome = $_GET['nome'];

            echo '
            <label class=" mb-0" style="font-size: 31px">'.$nome.'</label>
            ';
            ?>
            
            <hr>


            <?php
               $sql6 = "select * from compra
               INNER JOIN produto_has_compra ON compra.idCompra = produto_has_compra.compra_idCompra
               INNER JOIN produto ON produto_has_compra.produto_idProduto = produto.idProduto
               where compra.cliente_idCliente = ". $_SESSION['ClienteID']." AND compra.estabelecimento_idEstabelecimento = ".$idEstabelecimento.
               " AND compra.status = 'COMPRA_ABERTO'";
               
               //echo $sql;

               $query6 = mysqli_query($conexao, utf8_decode($sql6));
           

               while($resultado = mysqli_fetch_assoc($query6)){
                echo '<div class="mb-2"><span class="resul"> <label><b> '.$resultado['quantidade'].'x  </b></label> '.$resultado['nome'].'</span> <span style="float: right;">R$ '.$resultado['preco'].'</span></div>';                     
                echo '<div><span class="resul1 cursor text-green font-weight-bold"></span><span style="float: right;"> <a class="font-weight-bold cinza cursor"  href="./del_produto_carrinho.php?idProdutoCompra='.$resultado['idProdutoCompra'].'&idProduto='.$resultado['idProduto'].'">Remover</a></span></div>
                <hr>

                ';
                $valor_total = $resultado['valor'];

              }

            ?>
            
            <!--
            <div class="mb-2"><span class="resul">1x pré-montada 2</span> <span>R$00,00</span></div>
            <div><span class="resul1 cursor text-green font-weight-bold">Editar</span><span class="font-weight-bold cinza cursor">Remover</span></div>
            //-->
        
            <div class="mb-2 font-weight-bold"><span class="resul4">Total</span> <span style="float: right">R$ <?php echo $valor_total ?></span></div>
            
            <?php

              $sql = "SELECT * FROM compra WHERE cliente_idCliente = '".$_SESSION['ClienteID']."' AND estabelecimento_idEstabelecimento = ".$idEstabelecimento." AND status = 'COMPRA_ABERTO';";
              $query = mysqli_query($conexao, utf8_decode($sql));

              while($resultado = mysqli_fetch_assoc($query)){
                echo '
                <a class="btn btn-lg btn-verde btn-block mgb" href="pagamento.php?id='.$resultado['idCompra'].'"> <input type="hidden" name="id" value="'.$resultado['idCompra'].'">Escolher forma de pagamento</a>

                <!--<a class="btn btn-lg btn-verde btn-block mgb" href="./finaliza_compra.php?idEstabelecimento=<?php echo $idEstabelecimento ?>">Finalizar pedido</a> -->
                ';
              }
              
            ?>



      </div>                  <!--FIM CESTA-->


    </div><!-- / Fim Conteudo -->

    

    <!--
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
    -->
    <!-- JavaScript (Opcional) -->
    <!-- jQuery primeiro, depois Popper.js, depois Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.11/jquery.mask.min.js"></script>
    <script type="text/javascript">
    $("#telefone").mask("0000-0000");
    $("#cpf").mask("000.000.000-00");

    </script>
  </body>
</html>