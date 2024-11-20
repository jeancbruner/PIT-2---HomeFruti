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
    <link rel="stylesheet" href="css/personalizado.css">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">

    <!-- HTML5Shiv -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <![endif]-->

    <!-- Estilo customizado -->
    <link rel="stylesheet" type="text/css" href="css/estilo_cad.css">

    <title>HomeFrúti</title>
    <link rel="icon" href="imagens/icon.png">
      <body class="text-center">

        <nav class="navbar navbar-expand-md navbar-light fixed-top navbar-transparente">
        <div class="container">
          
          <a href="index.php" class="navbar-brand">
            <img src="imagens/logo2.png" width="100">
          </a>   
       </div>

       </nav>
    <form class="form-signin" method="POST" action="cadastroCliente.php">
    <h1 class="h3 mb-3 ">Cadastrar</h1>

    <input type="text" id="inputNome" class="form-control" placeholder="Nome" required autofocus name="nome">

    <input type="text" id="inputCPF" class="form-control" placeholder="CPF" required autofocus name="cpf">

    <input type="text" id="inputTelefone" class="form-control" placeholder="(DDD) Telefone" required autofocus name="telefone">

    <input type="email" id="inputEmail" class="form-control" placeholder="E-mail" required autofocus name="email">

    <input type="password" id="inputSenha" class="form-control" placeholder="Senha" required autofocus name="senha">

    <div class="checkbox mb-3">
    </div>
    <a href="" class="btn-block small font-weight-bold">Concordo com os Termos de Uso e a Política de Privacidade</a>
    <button class="btn btn-lg btn-verde btn-block mb-4" type="submit" type="submit">Cadastrar</button>
    <span>Já tem uma conta? <strong><a href="entrar.php">Entrar</a></strong></span>
    <br>
    <p><strong><a href="">Esqueceu sua senha?</a></strong></p>
  </form>

</body>
    

    <!-- JavaScript (Opcional) -->
    <!-- jQuery primeiro, depois Popper.js, depois Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>

    <!-- Máscaras -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.11/jquery.mask.min.js"></script>
    <script type="text/javascript">
    $("#inputTelefone").mask("(00) 0 0000-0000");
    $("#inputCPF").mask("000.000.000-00");

    </script>
  </body>
</html>