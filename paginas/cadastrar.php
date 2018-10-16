<?php

include("../banco/banco.php");
include("../funcoes/tratamento-cadastro.php");
include("../funcoes/funcoes-cadastros.php");

$setor = tratamento_entrada_palavra($_POST["setor"]);

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

	$serial = limpar_entrada_numero($_POST["sn"]);
	$marca = tratamento_entrada_palavra($_POST["marca"]);
	$modelo = tratamento_entrada_palavra($_POST["modelo"]);

	if(confirma_serial_maquina($conexao_banco, $serial)) {
		cadastrar_maquina($conexao_banco, $serial, $marca, $modelo, $nota, $setor, $funcionario);
	}

	if(isset($_POST["serialW"])) {	
		$serialW = tratamento_entrada_palavra($_POST["serialW"]);
	} else {
		$serialW = "";
	}
			
	if(isset($_POST["versaoW"])) {
		$versaoW = limpar_entrada_numero($_POST["versaoW"]); 

		if(confirma_serial_microsoft($conexao_banco, $serialW)) {
			if(confirma_existe_valor($versaoW)) {
				cadastrar_software_microsoft($conexao_banco, $serialW, $versaoW, $nota, $setor, $funcionario);
			}
		}
	}

	if(isset($_POST["serialO"])) {
		$serialO = tratamento_entrada_palavra($_POST["serialO"]);
	} else {
		$serialO = "";
	}

	if(isset($_POST["versaoO"])) {
		$versaoO = limpar_entrada_numero($_POST["versaoO"]);

		if(confirma_serial_microsoft($conexao_banco, $serialO)) {
			if(confirma_existe_valor($versaoO)) {
				cadastrar_software_microsoft($conexao_banco, $serialO, $versaoO, $nota, $setor, $funcionario);
			}
		}
	}

}

header("Location: index.php");
die();
