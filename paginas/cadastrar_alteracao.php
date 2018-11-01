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
	
	#Seguranca javascript caso nao rodar
	$contador = limpar_entrada_numero($_POST["contador"]);
	
	#tratamento para atribuir valores as variaveis
	$data = tratamento_entrada_data(limpar_entrada_numero($_POST["data_entrada"]));
	$funcionario = tratamento_entrada_palavra($_POST["funcionario"]);
	$relacao = limpar_entrada_numero($_POST["relacao"]);
	$valor_cnpj = limpar_entrada_numero($_POST["cnpj"]);
	$empresa = tratamento_entrada_palavra($_POST["empresa"]);
	$setor = tratamento_uppercase($_POST["setor"]);

	#cadastrar empresa caso ela nao exista
	if(confirma_cnpj($conexao_banco, $valor_cnpj)) {
		cadastrar_cnpj($conexao_banco, $valor_cnpj, $empresa);
	}

	alterar_nota($conexao_banco, $nota, $chave, $data, $valor_cnpj);
	alterar_funcionario_produto($conexao_banco, $nota, $relacao, $setor, $funcionario);
}

#redirecionar e matar a pagina
header("Location: index.php");
die();
