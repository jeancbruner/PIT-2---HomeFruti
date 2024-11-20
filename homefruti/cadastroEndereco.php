<?php

include_once("conexao.php");

$endereco = $_POST['endereco'];
$numero = $_POST['numero'];
$bairro = $_POST['bairro'];
$complemento = $_POST['complemento'];
$referencia = $_POST['referencia'];
	
	
	if(!isset($_SESSION)){
			session_start();
	}

	$sql = "SELECT * FROM endereco;";
    $query = mysqli_query($conexao, utf8_decode($sql));
	$resultado = mysqli_fetch_assoc($query);

	$sql2 = "INSERT INTO endereco
			 (endereco, bairro, numero, complemento, referencia, cliente_idCliente) VALUES ('$endereco','$bairro','$numero','$complemento','$referencia', '".$_SESSION['ClienteID']."');";
    $query2 = mysqli_query($conexao, utf8_decode($sql2));

    echo "<script>alert('Endereço Atualizado');</script>";

    header('Location: principal.php');

?>