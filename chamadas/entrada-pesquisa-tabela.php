<?php
#Fazer a decisao de qual pesquisa deve ser feita para dar entrada na tabela
#Tratamento com views e a forma de deixar a entrada de dados mais rapido na tabela
$variavel_query = "select ID_Produto, Nota, Data, Chave, CNPJ, Empresa, Setor, vw_tabela_produtos.Modelo, vw_tabela_produtos.Marca, Relacao, RD, SD, Funcionario from vw_tabela_produtos";
if (isset($_POST['pesquisar']) && strlen($_POST['pesquisar']) > 0) {
	$variavel = tratamento_entrada_palavra(tratamento_caractere($_POST['pesquisar']));
	$query = $variavel_query . " where Nota like '%{$variavel}%' or CNPJ like '%{$variavel}%' or Chave like '%{$variavel}%' or Empresa like '%{$variavel}%' or Funcionario like '%{$variavel}%' order by ID_Produto desc;";
	$titulo_pesquisa = true;
} elseif (isset($_POST['empresa_emite']) && strlen($_POST['empresa_emite']) > 0) {
	$variavel = limpar_entrada_numero(tratamento_caractere($_POST['empresa_emite']));
       	$query = $variavel_query . " where CNPJ = '{$variavel}' order by ID_Produto desc;";
	$titulo_pesquisa = true;
} elseif (isset($_POST['modelo']) && strlen($_POST['modelo']) > 0 && isset($_POST['marca']) && strlen($_POST['marca']) > 0) {
	$variavel1 = limpar_entrada_numero($_POST['marca']);
	$variavel2 = limpar_entrada_numero($_POST['modelo']);
	$query = $variavel_query . " inner join Marcas on vw_tabela_produtos.Marca = Marcas.Marca inner join Modelos on vw_tabela_produtos.Modelo = Modelos.Modelo where Marcas.ID_Marca = '{$variavel1}' and  Modelos.ID_Modelo = '{$variavel2}' order by ID_Produto desc;";
	$titulo_pesquisa = true;
} elseif (isset($_POST['modelo']) && strlen($_POST['modelo']) > 0) {
	$variavel = limpar_entrada_numero($_POST['modelo']);
	$query = $variavel_query . " inner join Modelos on vw_tabela_produtos.Modelo = Modelos.Modelo where Modelos.ID_Modelo = '{$variavel}' order by ID_Produto desc;";
	$titulo_pesquisa = true;
} elseif (isset($_POST['marca']) && strlen($_POST['marca']) > 0) {
	$variavel = limpar_entrada_numero($_POST['marca']);
	$query = $variavel_query . " inner join Marcas on vw_tabela_produtos.Marca = Marcas.Marca where Marcas.ID_Marca = '{$variavel}' order by ID_Produto desc;";
	$titulo_pesquisa = true;
} elseif (isset($_POST['descricao']) && strlen($_POST['descricao']) > 0) {
	$variavel = $_POST['descricao'];
	$query = $variavel_query . " where Descricao like '%{$variavel}%' order by ID_Produto desc;";
	$titulo_pesquisa = true;
} elseif (isset($_POST['setor_destino']) || isset($_POST['setor_atual']) || isset($_POST['relacao_destino']) || isset($_POST['setor_destino'])) {
	if (isset($_POST['setor_destino']) && strlen($_POST['setor_destino']) > 0 && isset($_POST['relacao_destino']) && strlen($_POST['relacao_destino']) > 0) {
		$variavel1 = limpar_entrada_numero($_POST['setor_destino']);
		$variavel2 = limpar_entrada_numero($_POST['relacao_destino']);
		$query = $variavel_query . " where RD = '{$variavel1}' and SD = '{$variavel2}' order by ID_Produto desc;";
	} elseif (isset($_POST['setor_atual']) && strlen($_POST['setor_atual']) > 0 && isset($_POST['relacao_atual']) && strlen($_POST['relacao_atual']) > 0) {
		$variavel1 = limpar_entrada_numero($_POST['setor_atual']);
		$variavel2 = limpar_entrada_numero($_POST['relacao_atual']);
	        $query = $variavel_query . " where RA = '{$variavel1}' and SA = '{$variavel2}' order by ID_Produto desc;";
	} elseif (isset($_POST['setor_destino']) && strlen($_POST['setor_destino']) > 0 && isset($_POST['relacao_destino']) && strlen($_POST['relacao_destino']) > 0 && isset($_POST['setor_atual']) && strlen($_POST['setor_atual']) > 0 && isset($_POST['relacao_atual']) && strlen($_POST['relacao_atual']) > 0) {	
		$variavel1 = limpar_entrada_numero($_POST['setor_destino']);
		$variavel2 = limpar_entrada_numero($_POST['relacao_destino']);
		$variavel3 = limpar_entrada_numero($_POST['setor_atual']);
		$variavel4 = limpar_entrada_numero($_POST['relacao_atual']);
		$query = $variavel_query . " where RD = '{$variavel1}' and SD = '{$variavel2}' and RA = '{$variavel3}' and SA = '{$variavel4}' order by ID_Produto desc;";
	} elseif (isset($_POST['setor_atual']) && strlen($_POST['setor_atual']) > 0) {
		$variavel = limpar_entrada_numero($_POST['setor_atual']);
		$query = $variavel_query . " where SA = '{$variavel}' order by ID_Produto desc;";
	} elseif (isset($_POST['relacao_atual']) && strlen($_POST['relacao_atual']) > 0) {
		$variavel = limpar_entrada_numero($_POST['relacao_atual']);
		$query = $variavel_query . " where RA = '{$variavel}' order by ID_Produto desc;";
	} elseif (isset($_POST['setor_destino']) && strlen($_POST['setor_destino']) > 0) {
		$variavel = limpar_entrada_numero($_POST['setor_destino']);
		$query = $variavel_query . " where SD = '{$variavel}' order by ID_Produto desc;";
	} elseif (isset($_POST['relacao_destino']) && strlen($_POST['relacao_destino']) > 0) {
		$variavel = limpar_entrada_numero($_POST['relacao_destino']);
		$query = $variavel_query . " where RD = '{$variavel}' order by ID_Produto desc;";
	} else {
		$query = $variavel_query . " order by ID_Produto desc;";	
	} 
	$titulo_pesquisa = true;
} else {
	$titulo_pesquisa = false;
	$query = $variavel_query . " order by ID_Produto desc;";
}
