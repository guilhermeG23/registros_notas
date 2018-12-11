<?php
//Tratamento da pesquisa, limpar a entrada para fazer uma procura
$pesquisa = $_POST["pesquisar"];
$query = pesquisar($pesquisa);
