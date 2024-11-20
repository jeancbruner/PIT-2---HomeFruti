<?php 
include_once("conexao.php");
include("protect.php");

protect();


$cliente = getUserDataFromDB($conexao);



    
    //BUSCA INFORMAÇÕES DA TABELA (produto_has_compra)
    $sql = "select * from produto_has_compra where idProdutoCompra = ".$_GET['idProdutoCompra'] ;
    $query = mysqli_query($conexao, utf8_decode($sql));
    $produto_has_compra = mysqli_fetch_object($query);
    
    //BUSCA INFORMAÇÔES DA COMPRA ATIVA


    //BUSCA INFORMAÇÔES DO PRODUTO DELETADO
    $sql = "select * from compra where idCompra = " .$produto_has_compra->compra_idCompra;
    $query = mysqli_query($conexao, utf8_decode($sql));
    $compra = mysqli_fetch_object($query);


    //BUSCA INFORMAÇÔES DO PRODUTO DELETADO
    $sql = "select * from produto where idProduto = " .$produto_has_compra->produto_idProduto;
    $query = mysqli_query($conexao, utf8_decode($sql));
    $produto = mysqli_fetch_object($query);
    
    /** DELETA O PRODUTO DO CARRINHO */
    /**PODE SER NESCESSARIO FAZER VERIFICAÇÕES DE SEGURANÇA (NÂO ESTA IMPLEMENTADO) */
    $sql = "delete from produto_has_compra where idProdutoCompra = ".$_GET['idProdutoCompra'];
    $query = mysqli_query($conexao, utf8_decode($sql))  or die ("Erro ao DELETAR PRODUTO". $Erro); 

    //ATUALIZA O CAMPO VALOR NA TABELA COMPRA
    $idProduto = $_GET['idProduto'];

    /* ECHOS PARA TESTES
    echo'<script>alert('.$idProduto.') </script>';
    echo'<script>alert('.$compra->idCompra.') </script>';
    echo'<script>alert('.$produto_has_compra->quantidade.') </script>';
    echo'<script>alert('.($produto_has_compra->quantidade * $produto->preco).') </script>';
    */

    $sql = "UPDATE compra SET valor = ".($compra->valor - ($produto->preco * $produto_has_compra->quantidade))." WHERE idCompra = ". $produto_has_compra->compra_idCompra;
    $query = mysqli_query($conexao, utf8_decode($sql)) or die('FALHA AO ATUALIZAR TABELA COMPRA');   




?>
<script>
alert('Produto removido do carrinho com sucesso!');
window.history.back()

</script>





