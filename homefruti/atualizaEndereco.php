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

$sql4 = "UPDATE endereco
			SET endereco = '$endereco', bairro = '$bairro', numero = '$numero', complemento = '$complemento', referencia = '$referencia'
			WHERE endereco.cliente_idCliente = '".$_SESSION['ClienteID']."';";
$query4 = mysqli_query($conexao, utf8_decode($sql4));


?>

<script type="text/javascript"> 
alert('Endereço atualizado com sucesso');
history.back();
</script>