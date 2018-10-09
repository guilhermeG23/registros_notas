<?php

include("../banco/banco.php");
include("../funcoes/tratamento-cadastro.php");
include("../funcoes/funcoes-cadastros.php");

$nota = limpar_entrada_numero($_POST['nota']);
$chave = limpar_entrada_numero($_POST['chave']);

if(confirma_nota($nota) && confirma_nota_chave($chave)) {

	if($_FILES['arq']['size'] > 0) {
		$fp = fopen($_FILES['arq']['tmp_name'], 'rb');
		$arquivo = fread($fp, $_FILES['arq']['size']);
		$arquivo = addslashes($arquivo);
		fclose($fp);
	
		if(!get_magic_quotes_gpc()) {
			$nome = addslashes($_FILES['arq']['name']);
			$nome = $nota . '.pdf';
		}

		$data = tratamento_entrada_data(limpar_entrada_numero($_POST['data_entrada']));
		$empresa = tratamento_entrada_palavra($_POST['empresa']);
		
		$setor = limpar_entrada_numero($_POST['setor']);
		$funcionario = limpar_entrada_numero($_POST['funcionario']);
		
	/*	
		$serial = limpar_entrada_numero($_POST['sn']);
		$marca = tratamento_entrada_palavra($_POST['marca']);
		$modelo = tratamento_entrada_palavra($_POST['modelo']);

		$serialW = limpar_entrada_numero()
		$modeloW
		$serialO
		$modeloO
	 */
		cadastrar_nota($conexao_banco, $nota, $chave, $data, $empresa, $nome, $arquivo);
	/*	
		if(confirma_serial_maquina($serial)) {
			cadastrar_maquina($conexao_banco, $serial, $marca, $modelo, $chave, $setor, 1111111111);
		}
		if(confirma_serial_microsoft($serialW) || confirma_existe_valor($versaoW)) {
			cadastrar_software_microsoft($conexao_banco, $serialW, $versaoW, $chave, $setor, 1111111111);
		}
		if(confirma_serial_microsoft($serialO) || confirma_existe_valor($versaoO)) {
			cadastrar_software_microsoft($conexao_banco, $serialO, $versaoO, $chave, $setor, 1111111111);
		}	
	*/
	}
}

header("Location: index.php");
die();
