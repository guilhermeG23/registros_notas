<?php
include("../banco/banco.php");
include("../funcoes/tratamento-cadastro.php");
include("../funcoes/funcoes-cadastros.php");

$setor = tratamento_entrada_palavra($_POST["setor"]);

if(confirma_setor_existe($conexao_banco, $setor)) {
	cadastrar_setor($conexao_banco, $setor);	
} else {
	$SESSION["Error-setor"] = $setor;
}

header("Location: index.php");
die();
