<?php

include_once("conexao.php");

$nome = $_POST['nome'];
$cpf = $_POST['cpf'];
$telefone = $_POST['telefone'];
$email = $_POST['email'];
$senha = $_POST['senha'];

	$sql = "SELECT * FROM cliente;";
	


	$query = mysqli_query($conexao, utf8_decode($sql));
	$resultado = mysqli_fetch_assoc($query);

	if ($resultado['cpf'] == $cpf) {
	
		echo "<script>alert('CPF já cadastrado'); history.back();</script>";

	} else if ($resultado['email'] == $email){

		echo "<script>alert('Email já cadastrado'); history.back();</script>";

	}else {

	$sql2 = "INSERT INTO cliente (nome, cpf, telefone, email, senha) VALUES ('$nome', '$cpf', '$telefone', '$email', '$senha');";
	
    echo "<script>alert('CPF já cadastrado'); history.back();</script>";
	

	mysqli_query($conexao,utf8_decode($sql2)) or die ("Erro ao Cadastrar Cliente". $Erro);

	if(!$sql) {

	}else{
		header("Location: entrar.php");
	}
		mysqli_close($conexao); //fecha a conexao
	
	}


?>
