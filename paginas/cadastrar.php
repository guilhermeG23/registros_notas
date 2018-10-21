<?php

include("../banco/banco.php");
include("../funcoes/tratamento-cadastro.php");
include("../funcoes/funcoes-cadastros.php");

$nota = limpar_entrada_numero($_POST["nota"]);
$chave = limpar_entrada_numero($_POST["chave"]);
$contador = limpar_entrada_numero($_POST["contador"]);
$funcionario = $_POST['funcionario'];
$setor = $_POST['setor'];

if(confirma_nota($nota) && confirma_nota_chave($chave)) {

	$data = tratamento_entrada_data(limpar_entrada_numero($_POST["data_entrada"]));
	$empresa = tratamento_entrada_palavra($_POST["empresa"]);

	if(confirma_existe_nota($conexao_banco, $nota)) {
		if($_FILES["arq"]["size"] > 0) {
			$fp = fopen($_FILES["arq"]["tmp_name"], "rb");
			$arquivo = fread($fp, $_FILES["arq"]["size"]);
			$arquivo = addslashes($arquivo);
			fclose($fp);
		
			if(!get_magic_quotes_gpc()) {
				$nome = addslashes($_FILES["arq"]["name"]);
				$nome = $nota . ".pdf";
			}
		}
		cadastrar_nota($conexao_banco, $nota, $chave, $data, $empresa, $nome, $arquivo);
	}

	$equipamento = array();
	$marca = array();
	$descricao = array();
	$serial = array();
	$localatual = array();

	$crescer = 0;

	while($crescer < $contador) {
		
		$v1 = "Equipamento" . $crescer;
		$v2 = "Marca" . $crescer; 
		$v3 = "Descricao" . $crescer; 
		$v4 = "Serial" . $crescer; 
		$v5 = "Localatual" . $crescer; 

		$equipamento[$crescer] = $_POST[$v1]; 
		$marca[$crescer] = $_POST[$v2]; 
		$descricao[$crescer] = $_POST[$v3]; 
		$serial[$crescer] = $_POST[$v4]; 
		$localatual[$crescer] = $_POST[$v5]; 
		
		$crescer++;
	}

	$crescer = 0;

	while($crescer < $contador) {
		$query = "insert into Produto values (default, '{$nota}', '{$equipamento[$crescer]}', '{$marca[$crescer]}', '{$descricao[$crescer]}', '{$serial[$crescer]}', '{$setor}', '{$localatual[$crescer]}', '$funcionario');";
		mysqli_query($conexao_banco, $query);
		$crescer++;
	}
}

header("Location: index.php");
die();
