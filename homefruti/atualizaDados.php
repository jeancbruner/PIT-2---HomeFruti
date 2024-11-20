<?php

include_once("conexao.php");

$nome = $_POST['nome'];
$cpf = $_POST['cpf'];
$telefone = $_POST['telefone'];
$email = $_POST['email'];
$senha = $_POST['senha'];

$endereco = $_POST['endereco'];
$numero = $_POST['numero'];
$bairro = $_POST['bairro'];
$complemento = $_POST['complemento'];
$referencia = $_POST['referencia'];



	
	if(!isset($_SESSION)){
		session_start();
	}

	/*
	$sql = "SELECT * FROM cliente;";
    $query = mysqli_query($conexao, utf8_decode($sql));
	$resultado = mysqli_fetch_assoc($query);

	$sql2 = "SELECT * FROM endereco;";
    $query2 = mysqli_query($conexao, utf8_decode($sql2));
	$resultado2 = mysqli_fetch_assoc($query2);
	*/

	$sql3 = "UPDATE cliente
			SET nome = '$nome', cpf = '$cpf', email = '$email', telefone = '$telefone', senha = '$senha'
			WHERE cliente.idCliente = '".$_SESSION['ClienteID']."';";
    $query3 = mysqli_query($conexao, utf8_decode($sql3));

    $sql4 = "UPDATE endereco
			SET endereco = '$endereco', bairro = '$bairro', numero = '$numero', complemento = '$complemento', referencia = '$referencia'
			WHERE endereco.cliente_idCliente = '".$_SESSION['ClienteID']."';";
    $query4 = mysqli_query($conexao, utf8_decode($sql4));
	

?>

<script type="text/javascript"> 
alert('Dados atualizados com sucesso');
history.back();
</script>