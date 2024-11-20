<?php

if(!isset($_SESSION)){
      session_start();
}

if (!isset($_SESSION['ClienteID']) || !is_numeric($_SESSION['ClienteID'])) {
  
}else{
  header('Location: principal.php');
}

?>

<html lang="pt-br">
  <head>
    <!-- Meta tags Obrigatórias -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css_boots/bootstrap.min.css">
    <link rel="stylesheet" href="css/personalizado.css">
    <link rel="stylesheet" type="text/css" href="//assets.locaweb.com.br/locastyle/3.10.1/stylesheets/locastyle.css">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">

    <!-- HTML5Shiv -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <![endif]-->

    <!-- Estilo customizado -->
    <link rel="stylesheet" type="text/css" href="css/estilo_ent.css">

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

        <section id="" class="d-flex"><!--home -->
              <div class="container align-self-center"><!--container -->
                <div class="row"><!--row -->
                  <div class="col-md-12 capa" style="margin-top: 125px">
                    
                          <h1 class="display-4 font-weight-bold">Compre no Homefrúti e desfrute</h1>
              
                  </div>
                </div><!--/row -->
              </div><!--/container -->
          </section><!--/home -->

    <form class="form-signin" method="POST" action="validarLogin.php">
      <h1 class="h3 mb-3 " style="color: #191919;">Entrar</h1>

      <input type="email" id="inputEmail" class="form-control" placeholder="E-mail" required autofocus name="email">
      
      <!--<input type="password" id="inputPassword" class="form-control" placeholder="Senha" required autofocus name="senha">-->
            <div class="ls-prefix-group">
              <input type="password" id="password_field" class="form-control" placeholder="Senha" required autofocus name="senha">
                <a class="ls-label-text-prefix ls-toggle-pass ls-ico-eye" data-toggle-class="ls-ico-eye, ls-ico-eye-blocked" data-target="#password_field" href="#">
                </a>
            </div>
        
      
      <div class="checkbox mb-3"></div>
      
      <button class="btn btn-lg btn-verde btn-block mb-2" type="submit">Entrar</button>
      <a href="" class="btn-block small font-weight-bold mb-3">Esqueceu sua senha?</a>

      <span>Não tem uma conta ainda? <strong><a href="cadastrarCliente.php">Cadastre-se</a></strong></span>
    </form>
        
      
</body>
    

    <!-- JavaScript (Opcional) -->
    <!-- jQuery primeiro, depois Popper.js, depois Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>

    <script src="//assets.locaweb.com.br/locastyle/3.10.1/javascripts/locastyle.js"></script>

  </body>
</html>