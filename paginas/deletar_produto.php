<?php
#incluindo o banco
include("../banco/banco.php");
#incluindo funcoes
include("../funcoes/funcoes-cadastros.php");
#deletar uma nota
deletar_produto($conexao_banco, $_POST["deletar_produto"]);
#redirecionar
header("Location: index.php");
#matar pagina
die();
