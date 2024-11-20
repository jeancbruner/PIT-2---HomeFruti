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

    <title>Pagamento</title>
    <link rel="icon" href="imagens/icon.png">

    <!-- Principal CSS do Bootstrap -->
    <link href="css_boots/bootstrap.min.css" rel="stylesheet">

    <!-- Estilos customizados para esse template -->
    <link href="css/form-validation.css" rel="stylesheet">

    <link href="css/pagamento.css" rel="stylesheet">

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
                <a href="perfil.php" class="nav-link"><img src="imagens/perfil.png" width="25" class="mb-2 mr-1">Conta</a>
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

    <div class="container" style="margin-top: 100px;">
      <div class="py-5 text-center">
        <h2>Finalizar Compra</h2>
        
      </div>

      <div class="row">
            <div class="col-md-4 order-md-2 mb-4">
              <h4 class="d-flex justify-content-between align-items-center mb-3">
                <span class="text-muted">Sua Cesta</span> 

                <!-- <span class="badge badge-secondary badge-pill">3</span> QUANTIDADE DE PRODUTOS NA COMPRA (NÃO FEITO AINDA) -->

              </h4>

      <?php

        $idCompra = $_GET['id'];

        $sql = "SELECT * FROM produto_has_compra
        INNER JOIN produto on idProduto = produto_has_compra.produto_idProduto
        WHERE produto_has_compra.compra_idCompra = ".$idCompra."";

        $query = mysqli_query($conexao, utf8_decode($sql));
        /*
        $sql = "SELECT * FROM produto_has_compra WHERE compra_idCompra = ". $idCompra. ";";
        $query = mysqli_query($conexao, utf8_decode($sql));
        $resultado = mysqli_fetch_assoc($query);

        $sql2 = 'SELECT * FROM produto where idProduto = '. $resultado['produto_idProduto'] . '';
        $query2 = mysqli_query($conexao, utf8_decode($sql2));
        */

        


        while($row = mysqli_fetch_array($query)){

        echo '
          
              <ul class="list-group mb-3">
                <li class="list-group-item d-flex justify-content-between lh-condensed">
                  <div>
                    <h6 class="my-0">'.$row['quantidade'].'x '.$row['nome'].'</h6>
                    <small class="text-muted">'.$row['descricao'].'</small>
                  </div>
                  <span class="text-muted">R$'.$row['preco'].'</span>
                </li>
                
                
            ';
          }
          ?>

          <?php
            $sql = "SELECT * FROM compra WHERE idCompra = ".$idCompra."";
            $query = mysqli_query($conexao, utf8_decode($sql));
            $resultado = mysqli_fetch_assoc($query);

            echo '
                  <li class="list-group-item d-flex justify-content-between">
                    <span>Total (BRL)</span>
                    <strong>R$'.$resultado['valor'].'</strong>
                  </li>
                </ul>
             ';
          ?>

          

        </div>
        <div class="col-md-8 order-md-1">
          <h4 class="mb-3">Endereço de Entrega</h4>

          <hr class="mb-4">
          <form method="POST" action="finaliza_compra.php?idCompra=<?php echo $idCompra ?>"  >
          <?php

            $sql = "SELECT * FROM endereco WHERE cliente_idCliente = '".$_SESSION['ClienteID']."';";
            $query = mysqli_query($conexao, utf8_decode($sql));

            while($resultado = mysqli_fetch_assoc($query)){
              echo '
                <div class="row">
                      <div class="col-md-10 mb-3">
                        <label for="endereco">Endereço</label>
                        <input type="text" class="form-control" name ="endereco" id="endereco" placeholder="" value="'.$resultado['endereco'].'" required>
                      </div>
                      <div class="col-md-2 mb-3">
                        <label for="numero">Número</label>
                        <input type="number" class="form-control" name = "numero" id="numero" placeholder="" value="'.$resultado['numero'].'" required>
                      </div>
                    </div>

                    <div class="mb-3">
                      <label for="bairro">Bairro</label>
                      <input type="text" class="form-control" name = "bairro" id="bairro" placeholder="" value = "'.$resultado['bairro'].'" required>
                    </div>

                    <div class="mb-3">
                      <label for="complemento">Complemento <span class="text-muted">(Opcional)</span></label>
                      <input type="text" class="form-control" name = "complemento" id="complemento" placeholder="" value = "'.$resultado['complemento'].'">
                    </div>

                    <div class="mb-3">
                      <label for="referencia">Ponto de Referência <span class="text-muted">(Opcional)</span></label>
                      <input type="text" class="form-control" name = "referencia" id="referencia" placeholder="" value = "'.$resultado['referencia'].'">
                    </div>
                    <!--<button class="btn btn-success btn-lg btn-block" type="submit">Salvar</button>-->
                <hr class="mb-4">


                
                ';
              }
            ?>

           
            
            <?php

            echo'
              <h4 class="mb-3">Forma de Pagamento</h4>

              <div class="d-block my-3">

                <h6>Pagamento na Entrega</h6>
                <div class="custom-control custom-radio">
                  <input id="debito" name="pagamento" type="radio" class="custom-control-input" required checked value="Cartao de Debito">
                  <label class="custom-control-label" for="debito">Cartão de débito</label>
                </div>

                <div class="custom-control custom-radio">
                  <input id="dinheiro" name="pagamento" type="radio" class="custom-control-input" required value="Dinheiro">
                  <label class="custom-control-label" for="dinheiro">Dinheiro</label>
                </div>

                <br>

                <h6>Pagamento Online</h6>
                <div class="custom-control custom-radio">
                  <input id="credito" name="pagamento" type="radio" class="custom-control-input" required value="Cartao de Credito">
                  <label class="custom-control-label" for="credito">Cartão de crédito</label>
                </div>

              </div>

              <div class="row">
                <div class="col-md-6 mb-3">
                  <label for="cc-nome">Nome no cartão</label>
                  <input type="text" class="form-control" id="cc-nome" placeholder="" name="nomeCartao">
                  <small class="text-muted">Nome completo, como mostrado no cartão.</small>
                </div>
                <div class="col-md-6 mb-3">
                  <label for="cc-numero">Número do cartão de crédito</label>
                  <input type="text" class="form-control" id="numeroCartao" placeholder="" name="numeroCartao">
                </div>
              </div>
              <div class="row">
                <div class="col-md-3 mb-3">
                  <label for="cc-expiracao">Data de expiração</label>
                  <input type="text" class="form-control" id="dataCartao" placeholder="" name="dataCartao">
                </div>
                <div class="col-md-3 mb-3">
                  <label for="cc-cvv">CVV</label>
                  <input type="text" class="form-control" id="cvv" placeholder="" name="cvv">
                  
                </div>
              </div>
              <hr class="mb-4">
              <!--<a class="btn btn-primary btn-lg btn-block" href="./finaliza_compra.php?idCompra=<?php echo $idCompra ?>">Finalizar pedido</a>-->

              <button class="btn btn-primary btn-lg btn-block" type="submit">FINALIZAR</button>

          </div>
        </div>

        ';
      ?>
       </form>


      <footer class="my-5 pt-5 text-muted text-center text-small">
        <p class="mb-1">&copy; 2019 Homefrúti</p>
        <ul class="list-inline">
          <li class="list-inline-item"><a href="#">Privacidade</a></li>
          <li class="list-inline-item"><a href="#">Termos</a></li>
          <li class="list-inline-item"><a href="#">Suporte</a></li>
        </ul>
      </footer>
    </div>

    <!-- Principal JavaScript do Bootstrap
    ================================================== -->
    <!-- Foi colocado no final para a página carregar mais rápido -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script>window.jQuery || document.write('<script src="../../assets/js/vendor/jquery-slim.min.js"><\/script>')</script>
    <script src="../../assets/js/vendor/popper.min.js"></script>
    <script src="../../dist/js/bootstrap.min.js"></script>
    <script src="../../assets/js/vendor/holder.min.js"></script>
    <!--
    <script>
      // Exemplo de JavaScript para desativar o envio do formulário, se tiver algum campo inválido.
      (function() {
        'use strict';

        window.addEventListener('load', function() {
          // Selecione todos os campos que nós queremos aplicar estilos Bootstrap de validação customizados.
          var forms = document.getElementsByClassName('needs-validation');

          // Faz um loop neles e previne envio
          var validation = Array.prototype.filter.call(forms, function(form) {
            form.addEventListener('submit', function(event) {
              if (form.checkValidity() === false) {
                event.preventDefault();
                event.stopPropagation();
              }
              form.classList.add('was-validated');
            }, false);
          });
        }, false);
      })();
    </script>
    -->

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.11/jquery.mask.min.js"></script>
    <script type="text/javascript">

    $("#numeroCartao").mask("0000 0000 0000 0000");
    $("#dataCartao").mask("00/00");
    $("#cvv").mask("000");

    </script>
  </body>
</html>