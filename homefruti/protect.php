<?php 

if(!function_exists("protect")){
	function protect(){
/*
		//Se a sessão não existir, inicia uma
	    if(!isset($_SESSION["ClienteID"])){
	      header("Location: index.php");
	    } else {
	      header("Location: principal.php");
	    } 
*/

		if(!isset($_SESSION)){
			session_start();
		}

		if(!isset($_SESSION['ClienteID']) || !is_numeric($_SESSION['ClienteID'])){
			header("Location: entrar.php");
		}

	}
}

//Função para recuperar dados do usuário(OBJETO)
function getUserDataFromDB($conexao){	
	$sql = "SELECT * FROM cliente WHERE idCliente = ".$_SESSION['ClienteID'];
	$query = mysqli_query($conexao, utf8_decode($sql));

    return mysqli_fetch_object($query);
}


//Função para recuperar endereço(OBJETO)
function getUserEnderecoFromDB($conexao){	
	$sql = "SELECT * FROM endereco WHERE cliente_idCliente = ".$_SESSION['ClienteID'];
	$query = mysqli_query($conexao, utf8_decode($sql));

    return mysqli_fetch_object($query);
}



?>