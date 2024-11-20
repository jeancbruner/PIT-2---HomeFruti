<?php

include("conexao.php");
include("protect.php");
protect();

$sql = "SELECT * FROM endereco WHERE cliente_idCliente ='".$_SESSION['ClienteID']."';";

		$query = mysqli_query($conexao, utf8_decode($sql));

		$resultado = mysqli_fetch_assoc($query);

		if ($resultado['endereco'] == "" || $resultado['bairro'] = "" || $resultado['numero'] = "") {
			
		} else {
			header('Location: principal.php');
		}


		
?>
<html lang="pt-br">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../../../favicon.ico">

    <title>Cadastrar Endereco</title>

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


    <div class="container" style="margin-top: 100px;">
        	<h4 class="mb-3">Cadastrar Endereço</h4>
                <hr class="mb-4">

                <form method="POST" action="cadastroEndereco.php">
                <div class="row">
                  <div class="col-md-10 mb-3">
                    <label for="endereco">Endereço</label>
                    <input type="text" class="form-control" required name="endereco" id="endereco" placeholder="" value="">
                  </div>
                  <div class="col-md-2 mb-3">
                    <label for="numero">Número</label>
                    <input type="number" class="form-control" required name="numero" id="numero" placeholder="" value="" onkeydown="javascript: return event.keyCode == 69 ? false : true">
                  </div>
                </div>

                <div class="mb-3">
                  <label for="bairro">Bairro</label>
                  <input type="text" class="form-control" required name="bairro" id="bairro" placeholder="" value = "">
                </div>

                <div class="mb-3">
                  <label for="complemento">Complemento <span class="text-muted">(Opcional)</span></label>
                  <input type="text" class="form-control" name="complemento" id="complemento" placeholder="" value = "">
                </div>

                <div class="mb-3">
                  <label for="referencia">Ponto de Referência <span class="text-muted">(Opcional)</span></label>
                  <input type="text" class="form-control" name="referencia" id="referencia" placeholder="" value = "">
                </div>

                <button class="btn btn-success btn-lg btn-block" type="submit">Salvar</button>

                </form>

    </div>

    <?php

    /*
    $sql3 = "SELECT * FROM endereco WHERE cliente_idCliente = '".$_SESSION['ClienteID']."';";
    $query3 = mysqli_query($conexao, utf8_decode($sql3));
    

    while($resultado3 = mysqli_fetch_assoc($query3)){
      echo '
                                           
        <div class="container" style="margin-top: 100px;">
        	<h4 class="mb-3">Cadastrar Endereço</h4>
                <hr class="mb-4">

                <form method="POST" action="cadastroEndereco.php">
                <div class="row">
                  <div class="col-md-10 mb-3">
                    <label for="endereco">Endereço</label>
                    <input type="text" class="form-control" required name="endereco" id="endereco" placeholder="" value="'.$resultado3['rua'].'">
                  </div>
                  <div class="col-md-2 mb-3">
                    <label for="numero">Número</label>
                    <input type="number" class="form-control" required name="numero" id="numero" placeholder="" value="'.$resultado3['numero'].'" onkeydown="javascript: return event.keyCode == 69 ? false : true">
                  </div>
                </div>

                <div class="mb-3">
                  <label for="bairro">Bairro</label>
                  <input type="text" class="form-control" required name="bairro" id="bairro" placeholder="" value = "'.$resultado3['bairro'].'">
                </div>

                <div class="mb-3">
                  <label for="complemento">Complemento <span class="text-muted">(Opcional)</span></label>
                  <input type="text" class="form-control" name="complemento" id="complemento" placeholder="" value = "'.$resultado3['complemento'].'">
                </div>

                <div class="mb-3">
                  <label for="referencia">Ponto de Referência <span class="text-muted">(Opcional)</span></label>
                  <input type="text" class="form-control" name="referencia" id="referencia" placeholder="" value = "'.$resultado3['referencia'].'">
                </div>

                <button class="btn btn-success btn-lg btn-block" type="submit">Salvar</button>

                </form>


              </form>
            
          
      ';
      
    }
    */
    ?>
    
    <footer style="margin-top: 150px;">
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
  </body>
</html>