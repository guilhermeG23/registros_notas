<?php

include("../banco/banco.php");
include("../funcoes/tratamento.php");
include("../funcoes/funcoes-cadastros.php");

$nota = limpar_entrada_numero($_POST["nota"]);
$chave = limpar_entrada_numero($_POST["chave"]);

if(confirma_nota($nota) && confirma_nota_chave($chave)) {

	$contador = limpar_entrada_numero($_POST["contador"]);
	$data = tratamento_entrada_data(limpar_entrada_numero($_POST["data_entrada"]));
	$empresa = tratamento_entrada_palavra($_POST["empresa"]);
	$funcionario = tratamento_entrada_palavra($_POST['funcionario']);
	$relacao = $_POST['relacao'];
	$setor = tratamento_uppercase($_POST['setor']);

	if(confirma_existe_nota($conexao_banco, $nota)) {
		$arquivo = registro_pdf($_FILES["arq"]["size"], $_FILES["arq"]["tmp_name"]);
		$nome = registro_pdf($_FILES["arq"]["name"]);
		cadastrar_nota($conexao_banco, $nota, $chave, $data, $empresa, $nome, $arquivo);
	} else {
		header("Location: index.php");
		die();
	}

	$equipamento = $marca = $descricao = $serial = $localatual = $relacaoAtual = array();

	$crescer = 0;

	while($crescer < $contador) {
		
		$equipamento[$crescer] = $_POST["Equipamento" . $crescer]; 
		$marca[$crescer] = $_POST["Marca" . $crescer]; 
		$descricao[$crescer] = $_POST["Descricao" . $crescer]; 
		$serial[$crescer] = $_POST["Serial" . $crescer]; 
		$relacaoAtual[$crescer] = $_POST["relacaoAtual" . $crescer]; 
		$localatual[$crescer] = $_POST["Localatual" . $crescer]; 

		$crescer++;
	}
	
	$crescer = 0;

	while($crescer < $contador) {
		cadastrar_produto_nota($conexao_banco, $nota, $equipamento[$crescer], $marca[$crescer], $descricao[$crescer], $serial[$crescer], $relacao, $setor, $relacaoAtual[$crescer], $localatual[$crescer], $funcionario);
		$crescer++;
	}

}

header("Location: index.php");
die();
