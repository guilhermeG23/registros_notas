<?php
#incluindo o banco
include("../banco/banco.php");
#incluindo tratamento de entradas
include("../funcoes/tratamento.php");
#incluindo funcoes para cadastrar
include("../funcoes/funcoes-cadastros.php");

#tratamento para a decisao
$nota = limpar_entrada_numero($_POST["nota"]);
$chave = limpar_entrada_numero($_POST["chave"]);

#decisao
if(confirma_nota($nota) && confirma_nota_chave($chave)) {

	#Valores padroes de entrada ou alteracao da nota
	include("../chamadas/valores-nota.php");	

	#Cadastrar nota caso ela nao exista
	if(confirma_existe_nota($conexao_banco, $nota)) {
		$arquivo = registro_pdf($_FILES["arq"]["size"], $_FILES["arq"]["tmp_name"]);
		$nome = registro_pdf($_FILES["arq"]["name"]);
		cadastrar_nota($conexao_banco, $nota, $chave, $data, $valor_cnpj, $nome, $arquivo);
	} else {
		#caso exista manda para o index e mata a operacao
		header("Location: index.php");
		die();
	}
	
	#variavel padrao para usar nos contadores
	$crescer = 0;

	#cadastrar produtos da nota
	while($crescer < $contador) {
		#cadastrar produtos
		cadastrar_produto_nota($conexao_banco, $nota, $_POST["Equipamento" . $crescer], $_POST["Marca" . $crescer], $_POST["Descricao" . $crescer], tratamento_uppercase($_POST["Serial" . $crescer]), $relacao, $setor, $_POST["relacaoAtual" . $crescer], $_POST["Localatual" . $crescer], $funcionario);
		#Crescer contador
		$crescer++;
	}
}

#redirecionar e matar a pagina
header("Location: index.php");
die();
