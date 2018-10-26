<?php
#incluindo o banco
include("../banco/banco.php");
#incluindo funcoes
include("../funcoes/funcoes-cadastros.php");
#deletar uma nota
deletar_nota($_POST["deletar"]);
#redirecionar
header("Location: index.php");
#matar pagina
die();
