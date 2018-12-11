<?php
#incluindo o banco
include("../banco/banco.php");
#incluindo tratamento de entradas
include("../funcoes/tratamento.php");
#incluindo funcoes para cadastrar
include("../funcoes/funcoes-cadastros.php");

#tratamento para a decisao
$ID = limpar_entrada_numero($_POST["ID"]);
$Nota = limpar_entrada_numero($_POST["Nota"]);
$equipamento = limpar_entrada_numero($_POST["equipamento"]);
$descricao = tratamento_entrada_palavra($_POST["descricao"]);
$marca = limpar_entrada_numero($_POST["marca"]);	
$serial = tratamento_uppercase($_POST["serial"]);
$relacao = limpar_entrada_numero($_POST["relacao"]);
$setor = limpar_entrada_numero($_POST["setor"]);
$funcionario = tratamento_entrada_palavra(tratamento_caractere($_POST["funcionario"]));
alterar_produto($conexao_banco, $ID, $equipamento, $marca, $descricao, $serial, $relacao, $setor, $funcionario);

#Session
session_start();
$_SESSION["nota_atual"] = $Nota;

#redirecionar e matar a pagina
header("Location: alterar_produtos.php");
die();
