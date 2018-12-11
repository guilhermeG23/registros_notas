<?php
//Conexao com o banco
$conexao_banco = mysqli_connect('eowyn', 'funcionario', 'rr', 'funcionarios');
//Ajustando o alfabeto de saida
mysqli_set_charset($conexao_banco, 'utf8');
?>
