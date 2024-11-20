<?php 
include_once("conexao.php");
include("protect.php");

protect();


$cliente = getUserDataFromDB($conexao);





/*Procura no banco se existe alguma compra iniciada pelo usuário no hortifruti selecionado*/

$idEstabelecimento = $_GET['idEstabelecimento'];
$idProduto = $_GET['idProduto'];



//Consulta se existe alguma compra em aberto 
$sql = 'SELECT * FROM compra where cliente_idCliente = '. $cliente->idCliente . ' AND  estabelecimento_idEstabelecimento ='. $idEstabelecimento. ' AND status = "COMPRA_ABERTO"' ;


$query = mysqli_query($conexao, utf8_decode($sql));
$compra = mysqli_fetch_object($query);


if(!is_object($compra) ){
    /** SE O CLIENTE NÃO TIVER UMA COMPRA EM ABERTO CRIA UMA UMA NOVA */
    $sql = "INSERT INTO homefruti.compra 
               ( valor, cliente_idCliente, estabelecimento_idEstabelecimento, status)
            VALUES( 0,". $cliente->idCliente.",".$idEstabelecimento.", 'COMPRA_ABERTO' );";

    //echo $sql;
    $query = mysqli_query($conexao, utf8_decode($sql))  or die ("Erro ao Cadastrar COMPRA". $Erro);
    
    //Consulta dados da ultima compra inserida
    $sql = 'SELECT * FROM compra where cliente_idCliente = '. $cliente->idCliente . ' AND  estabelecimento_idEstabelecimento ='. $idEstabelecimento. ' AND status = "COMPRA_ABERTO"' ;
    $query = mysqli_query($conexao, utf8_decode($sql));
    $compra = mysqli_fetch_object($query);

    
}

/* ECHOS PARA TESTES
echo'<script>alert('.$compra->idCompra.') </script>';
echo'<script>alert('.$idProduto.') </script>';


$sql = "SELECT * FROM produto_has_compra WHERE compra_idCompra = ".$compra->idCompra."";
$query = mysqli_query($conexao, utf8_decode($sql));
$resultado = mysqli_fetch_array($query);

if($idProduto == $resultado['produto_idProduto']){

    //+1 QUANTIDADE PRODUTO CASO JÁ ESTEJA ADICIONADO AO CARRINHO
    $sql2 = "UPDATE produto_has_compra SET quantidade = (quantidade + 1) WHERE produto_idProduto = ".$idProduto."";
    $query2 = mysqli_query($conexao, utf8_decode($sql2));
} else {


//ADICIONA O PRODUTO NO CARRINHO 
$sql = "INSERT INTO homefruti.produto_has_compra (compra_idCompra, produto_idProduto, quantidade) 
        VALUES(".$compra->idCompra.",". $idProduto. ", 1);"; //ADICIONANDO UM PRODUTO POR VEZ (DA PRA EDITAR)

$query = mysqli_query($conexao, utf8_decode($sql))  or die ("Erro ao Cadastrar PRODUTO". $Erro);

}
*/

$sql = "SELECT * FROM produto_has_compra WHERE compra_idCompra = ".$compra->idCompra."";
$query = mysqli_query($conexao, utf8_decode($sql));

$has_produto = false; //variavel controlar se o produto ja existe na compra

//Aqui array vai percorrer por todos os produtos que estão no carrinho(da forma que estava ficava so no primeiro resultado)
while($row = mysqli_fetch_array($query)) { 
   if($idProduto == $row['produto_idProduto']){
      //+1 QUANTIDADE PRODUTO CASO JÁ ESTEJA ADICIONADO AO CARRINHO
      $sql2 = "UPDATE produto_has_compra SET quantidade = (quantidade + 1) WHERE produto_idProduto = ".$idProduto."";
      $query2 = mysqli_query($conexao, utf8_decode($sql2));
      
      $has_produto = true; //Se o produto existir a variavel recebe true;
      break;//Para o loop para evitar processamento desnecessário
      
   }
} 


if( !$has_produto) { //Cadastra o produto se ele não existir no carrinho
    /*ADICIONA O PRODUTO NO CARRINHO */
    $sql = "INSERT INTO homefruti.produto_has_compra (compra_idCompra, produto_idProduto, quantidade)
        VALUES(".$compra->idCompra.",". $idProduto. ", 1);"; //ADICIONANDO UM PRODUTO POR VEZ (DA PRA EDITAR)
    
    $query = mysqli_query($conexao, utf8_decode($sql))  or die ("Erro ao Cadastrar PRODUTO". $Erro);
}

//ATUALIZA A TABELA COMPRA COM O VALOR DO PRODUTO

//BUSCA INFORMAÇÕES REFERENTES AO PRODUTO
$sql = "select * from produto where idProduto = " .$idProduto;
$query = mysqli_query($conexao, utf8_decode($sql));
$produto = mysqli_fetch_object($query);
//print_r($produto);

//ATUALIZA O CAMPO VALOR NA TABELA COMPRA
$sql = "SELECT * FROM produto_has_compra WHERE compra_idCompra = ".$compra->idCompra." AND produto_idProduto = ".$idProduto."";
$query = mysqli_query($conexao, utf8_decode($sql));
$resultado = mysqli_fetch_assoc($query);


$sql = "UPDATE compra SET valor = ".($compra->valor + $produto->preco) ." WHERE idCompra = ". $compra->idCompra;
$query = mysqli_query($conexao, utf8_decode($sql)) or die('FALHA AO ATUALIZAR TABELA COMPRA');


//RETORNA PARA PAGINA ANTERIOR
?>
<script>
alert('Produto adicionado ao carrinho com sucesso!');
window.history.back()

</script>





