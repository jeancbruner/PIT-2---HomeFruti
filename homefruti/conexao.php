<?php

$servername = "localhost";
$usuario = "root";
$senha = "";
$banco = "homefruti";

$conexao = mysqli_connect($servername,$usuario,$senha,$banco);



if(mysqli_connect_error()):
	echo "Erro na conexão: ".mysqli_connect_error();
endif;

?>
