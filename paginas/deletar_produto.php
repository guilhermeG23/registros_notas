<?php
#incluindo o banco
include("../banco/banco.php");
#tratamento
include("../funcoes/tratamento.php");
#incluindo funcoes
include("../funcoes/funcoes-cadastros.php");
#deletar uma nota
deletar_produto($conexao_banco, limpar_entrada_numero($_POST["deletar_produto"]));
#SESSION
session_start();
$_SESSION["nota_atual"] = $_POST["nota"];
#redirecionar
header("Location: alterar_produtos.php");
#matar pagina
die();
