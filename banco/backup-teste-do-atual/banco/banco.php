<?php
//COnexao banco de teste
$conexao_banco = mysqli_connect("localhost", "maquinas", "rr", "Maquinas_Ramenzoni");
//Setando caracter no banco de dados
mysqli_set_charset($conexao_banco, 'utf8');
