<?php

	include_once("conexao.php");

	$email = $_POST['email'];
	$senha = $_POST['senha'];


		$sql = "SELECT idCliente, nome, email, senha FROM cliente WHERE (email = '$email') AND (senha = '$senha');";
		$query = mysqli_query($conexao, utf8_decode($sql));

		if(mysqli_num_rows($query) !=1){
		//Mensagem de erro quando os dados são inválidos e/ou o cliente nao foi encontrado
		//echo "Email e/ou senha incorretos!";
		//echo "<br> <a href=entrar.php> Voltar <a>";
    echo "<script>alert('Email e/ou Senha Inválidos'); history.back();</script>";
    



		}else{
		//Salva os dados encontrados na variável $resultado

		$resultado = mysqli_fetch_assoc($query);



		//Se a sessão não existir, inicia uma
		if(!isset($_SESSION)){
			session_start();
			//Salva os dados encontrados na sessão
			$_SESSION['ClienteID'] = $resultado['idCliente'];
		}
		
		//Redireciona o visitante
		header("Location: cadastrarEndereco.php");
}


?>

<!--







/*
$sql = 'SELECT * FROM produto_has_compra where idCompra = '.$compra->idCompra. '' ;
$query = mysqli_query($conexao, utf8_decode($sql));
$resultado = mysqli_fetch_assoc($query);

if ($resultado['produto_idProduto'] == $idProduto) {
    
    $sql = "UPDATE produto_has_compra SET quantidade += 1 WHERE produto_idProduto = ".$resultado['produto_idProduto']."";
    $query = mysqli_query($conexao, utf8_decode($sql));
}
*/









<?php

include("conexao.php");

if(isset($_POST['email'])){

  if(!isset($_SESSION))
    session_start();

  $_SESSION['email'] = $conexao -> escape_string ($_POST['email']);
  $_SESSION['senha'] = md5(md5($_POST['senha']));

  $sql_code = "SELECT idCliente, email, senha FROM cliente WHERE email = '$_SESSION[email]'";
  $sql_query = $conexao -> query($sql_code) or die ($conexao -> error);
  $dado = $sql_query -> fetch_assoc();
  $total = $sql_query -> num_rows;

  if($total == 0){
    $erro[] = "Este email não pertence a nenhum usuário.";
  } else {
  	
    if($dado['senha'] == $_SESSION['senha']){
      $_SESSION['cliente'] = $dado['idCliente'];

    }else{

      $erro[] = "Senha incorreta.";

    }
  }

  if(count($erro) == 0 || !isset($erro)){
    echo "Login Efetuado com Sucesso";
    header("Location: principal.php");
}
}

?>
-->
