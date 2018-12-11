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

	#Funcao para alterar o pdf da nota quando precisar e opcional esta funcao
	if(isset($_FILES["arq"]["size"]) && $_FILES["arq"]["size"] > 0 && isset($_FILES["arq"]["tmp_name"]) && isset($_FILES["arq"]["name"])) {
		$arquivo = registro_pdf($_FILES["arq"]["size"], $_FILES["arq"]["tmp_name"]);
		$nome = registro_pdf($_FILES["arq"]["name"]);
		alterar_pdf_nota($conexao_banco, $nota, $nome, $arquivo);
	}

	#Funcoes de tratamento
	#Cadastrando alteracoes
	alterar_nota($conexao_banco, $nota, $chave, $data, $valor_cnpj);
	alterar_funcionario_produto($conexao_banco, $nota, $relacao, $setor, $funcionario);
}

#Session
session_start();
$_SESSION["nota_atual"] = $nota;

#redirecionar e matar a pagina
header("Location: view.php");
die();
