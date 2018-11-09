<?php
#incluindo o banco
include("../banco/banco.php");
#incluindo tratamento de entradas
include("../funcoes/tratamento.php");
#incluindo funcoes para cadastrar
include("../funcoes/funcoes-cadastros.php");

#Valores de auto_preencher tabela de produtos
$nota = $_POST["nota"];
$rd = $_POST["rd"];
$sd = $_POST["sd"];
$funcionario = $_POST["funcionario"];

#Valores do produto a ser inserido
$equipamento = limpar_entrada_numero($_POST["equipamento"]);
$descricao = tratamento_entrada_palavra($_POST["descricao"]);
$marca = limpar_entrada_numero($_POST["marca"]);	
$serial = tratamento_uppercase($_POST["serial"]);
$relacao = limpar_entrada_numero($_POST["relacao"]);
$setor = limpar_entrada_numero($_POST["setor"]);

#Usando funcao ja existente para resolver o problema de cadastro do produto
cadastrar_produto_nota($conexao_banco, $nota, $equipamento, $marca, $descricao, $serial, $rd, $sd, $relacao, $setor, $funcionario);

#redirecionar e matar a pagina
header("Location: index.php");
#mata a pagina
die();
