<?php
include("../banco/banco.php");
include("../funcoes/tratamento-cadastro.php");
include("../funcoes/funcoes-cadastros.php");

$chapa = limpar_entrada_numero($_POST['chapa']);

if(entrada_chapa($chapa)) {

	$nome = tratamento_nome($_POST["funcionario"]);
	$setor = limpar_entrada_numero($_POST["setor"]);
	
	if(confirma_usuario_existe($conexao_banco, $setor, $chapa)) {
		cadastrar_funcionario($conexao_banco, $chapa, $nome, $setor);	
	}
}
header("Location: index.php");
die();
