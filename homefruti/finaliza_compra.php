<?php
include_once("conexao.php");
include("protect.php");

protect();

$pagamento = $_POST['pagamento'];

$nomeCartao = $_POST['nomeCartao'];
$numeroCartao = $_POST['numeroCartao'];
$dataCartao = $_POST['dataCartao'];
$cvv = $_POST['cvv'];

$enderecoEntrega = $_POST['endereco'];
$numeroEntrega = $_POST['numero'];
$bairroEntrega = $_POST['bairro'];
$complementoEntrega = $_POST['complemento'];
$referenciaEntrega = $_POST['referencia'];

$cliente = getUserDataFromDB($conexao);
$endereco = getUserEnderecoFromDB($conexao);

$idCompra = $_GET['idCompra'];


//Consulta se existe alguma compra em aberto 
$sql = 'SELECT * FROM compra where cliente_idCliente = '. $cliente->idCliente . ' AND status = "COMPRA_ABERTO"' ;

$query = mysqli_query($conexao, utf8_decode($sql));
$compra = mysqli_fetch_object($query);

//INSERINDO ENDERECO ENTREGA

$sql = "UPDATE compra SET enderecoEntrega = '".$enderecoEntrega."', numeroEntrega = '".$numeroEntrega."', bairroEntrega = '".$bairroEntrega."', complementoEntrega = '".$complementoEntrega."', referenciaEntrega = '".$referenciaEntrega."' WHERE idCompra = ".$compra->idCompra.";";

$query = mysqli_query($conexao, utf8_decode($sql));



//INSERINDO METODO DE PAGAMENTO

$sql = "UPDATE compra SET tipoPagamento = '".$pagamento."' WHERE idCompra = ".$compra->idCompra.";";
$query = mysqli_query($conexao, utf8_decode($sql));

date_default_timezone_set('America/Sao_Paulo');

$data = date('Y-m-d H:i:s');

$sql = "UPDATE compra SET data = '".$data."' WHERE idCompra = '".$idCompra."'";

$query = mysqli_query($conexao, utf8_decode($sql));
//INSERINDO DADOS CARTÃO

if($pagamento == "Cartao de Credito"){

//echo '<script> alert("'.$pagamento.','.$nomeCartao.','.$dataCartao.','.$numeroCartao.','.$cvv.'") </script>';

$sql = "UPDATE compra SET nomeCartao = '".$nomeCartao."', numeroCartao = '".$numeroCartao."', dataCartao = '".$dataCartao."', cvv = '".$cvv."' WHERE idCompra = ".$compra->idCompra.";";
$query = mysqli_query($conexao, utf8_decode($sql));

}

//ATUALIZA STATUS DA COMPRA
$sql = "UPDATE compra SET status = 'FINALIZADA' WHERE idCompra = ". $compra->idCompra;
$query = mysqli_query($conexao, utf8_decode($sql)) or die('FALHA AO ATUALIZAR TABELA COMPRA');




/*
$sql = "SELECT * FROM produto_has_compra WHERE compra_idCompra = ".$idCompra."";
$query = mysqli_query($conexao, utf8_decode($sql));
$resultado = mysqli_fetch_assoc($query);

$sql = "UPDATE produto SET quantidade = (quantidade - ".$resultado['quantidade'].") WHERE";
*/

?>

<script>
alert('COMPRA FINALIZADA COM SUCESSO!');
window.location.href='./perfil.php' 

</script>