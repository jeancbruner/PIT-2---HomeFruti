<?php
include("protect.php");
include_once("conexao.php");
protect();


?>

<html lang="pt-br">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../../../favicon.ico">

    <title>Perfil</title>
    <link rel="icon" href="imagens/icon.png">

    <!-- Principal CSS do Bootstrap -->
    <link href="css_boots/bootstrap.min.css" rel="stylesheet">

    <!-- Estilos customizados para esse template -->
    <link href="css/form-validation.css" rel="stylesheet">

    <link href="css/perfil.css" rel="stylesheet">

    <style type="text/css">
      
      input[type=number]::-webkit-inner-spin-button { 
      -webkit-appearance: none;
    
      }
      input[type=number] { 
      -moz-appearance: textfield;
      appearance: textfield;
      }

    </style>

  </head>

  <body class="bg-light">

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
                <a href="" class="nav-link"><img src="imagens/perfil.png" width="25" class="mb-2 mr-1">Perfil</a>
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

    <?php

    $sql = "SELECT * FROM cliente WHERE idCliente ='".$_SESSION['ClienteID']."';";
    $query = mysqli_query($conexao, utf8_decode($sql));

    while($resultado = mysqli_fetch_assoc($query)){
      echo '
                                           
        <div class="container" style="margin-top: 100px;">

          <div class="row">
            <div class="col order-md-1">
              <h4 class="mb-3">Informações Pessoais</h4>
            <hr class="mb-4">
              <form method="POST" action="atualizaDados.php">
                  <div class="mb-3">
                    <label for="nome">Nome</label>
                    <input type="text" class="form-control" name = "nome" id="nome" placeholder="" value="'.$resultado['nome'].'">
                  </div>

                <div class="mb-3">
                  <label for="cpf">CPF</label>
                  <input type="text" class="form-control" name = "cpf" id="cpf" placeholder="" value = "'.$resultado['cpf'].'">
                </div>

                <div class="mb-3">
                  <label for="telefone">Telefone</label>
                  <input type="text" class="form-control" name = "telefone" id="telefone" placeholder="" value = "'.$resultado['telefone'].'">
                </div>

                <div class="mb-3">
                  <label for="email">Email</label>
                  <input type="email" class="form-control" name = "email" id="email" placeholder="" value = "'.$resultado['email'].'">
                </div>

                <div class="mb-3">
                <label for="senha">Senha</label>
                  <input type="password" class="form-control" name = "senha" id="senha" placeholder="" value = "'.$resultado['senha'].'">
                </div>
      ';
    }
    ?>

    <?php

      $sql2 = "SELECT * FROM endereco WHERE cliente_idCliente = '".$_SESSION['ClienteID']."';";
      $query2 = mysqli_query($conexao, utf8_decode($sql2));

      while($resultado2 = mysqli_fetch_assoc($query2)){
        echo '      
                
                <hr class="mb-4">
                <h4 class="mb-3">Endereço de Entrega</h4>
                <hr class="mb-4">

                <div class="row">
                  <div class="col-md-10 mb-3">
                    <label for="endereco">Endereço</label>
                    <input type="text" class="form-control" name ="endereco" id="endereco" placeholder="" value="'.$resultado2['endereco'].'">
                  </div>
                  <div class="col-md-2 mb-3">
                    <label for="numero">Número</label>
                    <input type="number" class="form-control" name = "numero" id="numero" placeholder="" value="'.$resultado2['numero'].'">
                  </div>
                </div>

                <div class="mb-3">
                  <label for="bairro">Bairro</label>
                  <input type="text" class="form-control" name = "bairro" id="bairro" placeholder="" value = "'.$resultado2['bairro'].'">
                </div>

                <div class="mb-3">
                  <label for="complemento">Complemento <span class="text-muted">(Opcional)</span></label>
                  <input type="text" class="form-control" name = "complemento" id="complemento" placeholder="" value = "'.$resultado2['complemento'].'">
                </div>

                <div class="mb-3">
                  <label for="referencia">Ponto de Referência <span class="text-muted">(Opcional)</span></label>
                  <input type="text" class="form-control" name = "referencia" id="referencia" placeholder="" value = "'.$resultado2['referencia'].'">
                </div>

                <button class="btn btn-success btn-lg btn-block" type="submit">Salvar</button>
                ';
                  }
              ?>

              </form>
                    <hr class="mb-4">
                      <h4 class="mb-3">Histórico de Compras</h4>

                        <table class="table table-hover">
                          <thead>
                            <tr>
                              <th scope="col">#</th>
                              <th scope="col" style = "text-align: left;">Data</th>
                              <th scope="col"> Tipo de Pagamento </th>
                              <th scope="col">Estabelecimento</th>
                              <th scope="col" style = "text-align: right;">Valor</th>
                            </tr>
                          </thead>
                          <tbody>
          <?php

            

            $sql = "SELECT * FROM compra WHERE cliente_idCliente = '".$_SESSION['ClienteID']."' AND status = 'FINALIZADA' ";
            $query = mysqli_query($conexao, utf8_decode($sql));

            while($resultado = mysqli_fetch_assoc($query)){

              $sql2 = "SELECT * FROM estabelecimento WHERE idEstabelecimento = '".$resultado['estabelecimento_idEstabelecimento']."' ";
              $query2 = mysqli_query($conexao, utf8_decode($sql2));
              $resultado2 = mysqli_fetch_assoc($query2);

                    echo '

                            <tr onclick = "minhaFuncao();">
                              <th scope="row">'.$resultado['idCompra'].'</th>
                              <td style = "text-align: left;">'.$resultado['data'].'</td>
                              <td>'.$resultado['tipoPagamento'].'</td>
                              <td>'.$resultado2['nome'].'</td>
                              <td style = "text-align: right;">R$ '.$resultado['valor'].'</td>
                            </tr>
                          
              ';
            }
            ?>
            </tbody>
                        </table>
                  </div>
                </div>
              </div>

    

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

    <!-- Principal JavaScript do Bootstrap
    ================================================== -->
    <!-- Foi colocado no final para a página carregar mais rápido -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script>window.jQuery || document.write('<script src="../../assets/js/vendor/jquery-slim.min.js"><\/script>')</script>
    <script src="../../assets/js/vendor/popper.min.js"></script>
    <script src="../../dist/js/bootstrap.min.js"></script>
    <script src="../../assets/js/vendor/holder.min.js"></script>

    <!-- Máscaras -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.11/jquery.mask.min.js"></script>
    <script type="text/javascript">
    $("#telefone, #celular").mask("(00) 0 0000-0000");
    $("#cpf").mask("000.000.000-00");

    </script>


    <!-- Tabela 

    <script language='javascript' type='text/javascript'>
       function minhaFuncao()
       {
            window.location.href='principal.php';
       }
    </script>
    -->
    
  </body>
</html>