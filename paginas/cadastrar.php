<?php

include("../banco/banco.php");
include("../funcoes/tratamento-cadastro.php");
include("../funcoes/funcoes-cadastros.php");

$setor = tratamento_entrada_palavra($_POST["setor"]);
$contador = limpar_entrada_numero($_POST["contador"]);

if(confirma_setor_existe($conexao_banco, $setor)) {
	cadastrar_setor($conexao_banco, $setor);	
} 

if(isset($_POST["chapa"])) {
	
	$chapa = limpar_entrada_numero($_POST["chapa"]);

	if(isset($chapa) && is_numeric($chapa)) {
	
		if(entrada_chapa($chapa)) {

			$nome = tratamento_nome($_POST["funcionario"]);
			$setor = limpar_entrada_numero($_POST["setor"]);
			
			if(confirma_usuario_existe($conexao_banco, $setor, $chapa)) {
				cadastrar_funcionario($conexao_banco, $chapa, $nome, $setor);	
			}
		}
	}
}

$nota = limpar_entrada_numero($_POST["nota"]);
$chave = limpar_entrada_numero($_POST["chave"]);

if(confirma_nota($nota) && confirma_nota_chave($chave)) {

	$data = tratamento_entrada_data(limpar_entrada_numero($_POST["data_entrada"]));
	$empresa = tratamento_entrada_palavra($_POST["empresa"]);
	$setor = limpar_entrada_numero($_POST["setor"]);
	$funcionario = limpar_entrada_numero($_POST["funcionario"]);

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


	if($contador > 0) {
	
		$equipamento = array();
		$marca = array();
		$descricao = array();
		$serial = array();
		$localatual = array();	
	
		$suporte = $contador;
		$crescer = 0;

		while($contador != -1) {
			$x = $contador;
			$equipamento = limpar_entrada_numero($_POST["Equipamento[" + $x + "]"]);
			$marca = limpar_entrada_numero($_POST["Marca[" + $x + "]"]);
			$descricao = limpar_entrada_numero($_POST["Descricao[" + $x + "]"]);
			$serial = limpar_entrada_numero($_POST["Serial[" + $x + "]"]);
			$localatual = limpar_entrada_numero($_POST["Localatual[" + $x + "]"]);	
			$contador--;
		}

	}
}

header("Location: index.php");
die();
