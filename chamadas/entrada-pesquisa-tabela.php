<?php
#Fazer a decisa de qual pesquisa deve ser feita para dar entrada na tabela
if (isset($_POST['pesquisar']) && strlen($_POST['pesquisar']) > 0) {
	$variavel = limpar_entrada_numero(tratamento_caractere($_POST['pesquisar']));
	$titulo_pesquisa = true;
	$query = "select * from vw_tabela_produtos where Nota like '%{$variavel}%' or CNPJ like '%{$variavel}%' or Chave like '%{$variavel}%' or Funcionario like '%{$variavel}%' order by ID_Produto desc;";
} elseif (isset($_POST['empresa_emite']) && strlen($_POST['empresa_emite']) > 0) {
	$variavel = limpar_entrada_numero(tratamento_caractere($_POST['empresa_emite']));
	$titulo_pesquisa = true;
	$query = "select * from vw_tabela_produtos where CNPJ = '{$variavel}' order by ID_Produto desc;";
} elseif (isset($_POST['modelo']) && strlen($_POST['modelo']) > 0 && isset($_POST['marca']) && strlen($_POST['marca']) > 0) {
	$variavel1 = limpar_entrada_numero($_POST['marca']);
	$variavel2 = limpar_entrada_numero($_POST['modelo']);
	$titulo_pesquisa = true;
	$query = "select * from vw_tabela_produtos inner join Marcas on vw_tabela_produtos.Marca = Marcas.Marca inner join Modelos on vw_tabela_produtos.Modelo = Modelos.Modelo where Marcas.ID_Marca = '{$variavel1}' and  Modelos.ID_Modelo = '{$variavel2}' order by ID_Produto desc;";
} elseif (isset($_POST['modelo']) && strlen($_POST['modelo']) > 0) {
	$variavel = limpar_entrada_numero($_POST['modelo']);
	$titulo_pesquisa = true;
	$query = "select * from vw_tabela_produtos inner join Modelos on vw_tabela_produtos.Modelo = Modelos.Modelo where Modelos.ID_Modelo = '{$variavel}' order by ID_Produto desc;";
} elseif (isset($_POST['marca']) && strlen($_POST['marca']) > 0) {
	$variavel = limpar_entrada_numero($_POST['marca']);
	$titulo_pesquisa = true;
	$query = "select * from vw_tabela_produtos inner join Marcas on vw_tabela_produtos.Marca = Marcas.Marca where Marcas.ID_Marca = '{$variavel}' order by ID_Produto desc;";
} elseif (isset($_POST['descricao']) && strlen($_POST['descricao']) > 0) {
	$variavel = $_POST['descricao'];
	$titulo_pesquisa = true;
	$query = "select * from vw_tabela_produtos where Descricao like '%{$variavel}%' order by ID_Produto desc;";
} elseif (isset($_POST['setor_destino']) || isset($_POST['setor_atual']) || isset($_POST['relacao_destino']) || isset($_POST['setor_destino'])) {
	if (isset($_POST['setor_destino']) && strlen($_POST['setor_destino']) > 0 && isset($_POST['relacao_destino']) && strlen($_POST['relacao_destino']) > 0) {
		$variavel1 = limpar_entrada_numero($_POST['setor_destino']);
		$variavel2 = limpar_entrada_numero($_POST['relacao_destino']);
		$titulo_pesquisa = true;
		$query = "select * from vw_tabela_produtos where RD = '{$variavel1}' and SD = '{$variavel2}' order by ID_Produto desc;";
	} elseif (isset($_POST['setor_atual']) && strlen($_POST['setor_atual']) > 0 && isset($_POST['relacao_atual']) && strlen($_POST['relacao_atual']) > 0) {
		$variavel1 = limpar_entrada_numero($_POST['setor_atual']);
		$variavel2 = limpar_entrada_numero($_POST['relacao_atual']);
		$titulo_pesquisa = true;
		$query = "select * from vw_tabela_produtos where RA = '{$variavel1}' and SA = '{$variavel2}' order by ID_Produto desc;";
	} elseif (isset($_POST['setor_destino']) && strlen($_POST['setor_destino']) > 0 && isset($_POST['relacao_destino']) && strlen($_POST['relacao_destino']) > 0 && isset($_POST['setor_atual']) && strlen($_POST['setor_atual']) > 0 && isset($_POST['relacao_atual']) && strlen($_POST['relacao_atual']) > 0) {	
		$variavel1 = limpar_entrada_numero($_POST['setor_destino']);
		$variavel2 = limpar_entrada_numero($_POST['relacao_destino']);
		$variavel3 = limpar_entrada_numero($_POST['setor_atual']);
		$variavel4 = limpar_entrada_numero($_POST['relacao_atual']);
		$titulo_pesquisa = true;
		$query = "select * from vw_tabela_produtos where RD = '{$variavel1}' and SD = '{$variavel2}' and RA = '{$variavel3}' and SA = '{$variavel4}' order by ID_Produto desc;";
	} elseif (isset($_POST['setor_atual']) && strlen($_POST['setor_atual']) > 0) {
		$variavel = limpar_entrada_numero($_POST['setor_atual']);
		$titulo_pesquisa = true;
		$query = "select * from vw_tabela_produtos where SA = '{$variavel}' order by ID_Produto desc;";
	} elseif (isset($_POST['relacao_atual']) && strlen($_POST['relacao_atual']) > 0) {
		$variavel = limpar_entrada_numero($_POST['relacao_atual']);
		$titulo_pesquisa = true;
		$query = "select * from vw_tabela_produtos where RA = '{$variavel}' order by ID_Produto desc;";
	} elseif (isset($_POST['setor_destino']) && strlen($_POST['setor_destino']) > 0) {
		$variavel = limpar_entrada_numero($_POST['setor_destino']);
		$titulo_pesquisa = true;
		$query = "select * from vw_tabela_produtos where SD = '{$variavel}' order by ID_Produto desc;";
	} elseif (isset($_POST['relacao_destino']) && strlen($_POST['relacao_destino']) > 0) {
		$variavel = limpar_entrada_numero($_POST['relacao_destino']);
		$titulo_pesquisa = true;
		$query = "select * from vw_tabela_produtos where RD = '{$variavel}' order by ID_Produto desc;";
	} else {
		$titulo_pesquisa = true;
		$query = 'select * from vw_tabela_produtos order by ID_Produto desc;';
	} 
} else {
	$titulo_pesquisa = false;
	$query = 'select * from vw_tabela_produtos order by ID_Produto desc;';
}


