<?php
#incluindo o banco
include("../banco/banco.php");
#Tratamentos
include("../funcoes/tratamento.php");
#incluindo funcoes
include("../funcoes/funcoes-cadastros.php");
#deletar uma nota
deletar_nota($conexao_banco, limpar_entrada_numero($_POST["deletar"]));
#redirecionar
header("Location: index.php");
#matar pagina
die();
