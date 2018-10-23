<?php
if (isset($_POST['pesquisar']) && strlen($_POST['pesquisar']) > 0) {
	$variavel = $_POST['pesquisar'];
	$query = "select * from vw_tabela_produtos where nota like '%{$variavel}%' or Empresa like '%{$variavel}%' or Chave like '%{$variavel}%' order by ID_Produto desc;";
}
/*elseif (isset($_POST['data']) && strlen($_POST['data']) > 0) {
	$variavel = $_POST['data'];
} */
elseif (isset($_POST['modelo']) && strlen($_POST['modelo']) > 0) {
	$variavel = $_POST['modelo'];
	$query = "select * from vw_tabela_produtos inner join Modelos on vw_tabela_produtos.Modelo = Modelos.Modelo where Modelos.ID_Modelo = '{$variavel}' order by ID_Produto desc;";
} elseif (isset($_POST['marca']) && strlen($_POST['marca']) > 0) {
	$variavel = $_POST['marca'];
	$query = "select * from vw_tabela_produtos inner join Marcas on vw_tabela_produtos.Marca = Marcas.Marca where Marcas.ID_Marca = '{$variavel}' order by ID_Produto desc;";
} elseif (isset($_POST['setor_destino']) and strlen($_POST['setor_destino']) > 0) {
	$variavel = $_POST['setor_destino'];
	$query = "select * from vw_tabela_produtos where SD = '{$variavel}' order by ID_Produto desc;";
} elseif (isset($_POST['setor_atual']) and strlen($_POST['setor_atual']) > 0) {
	$variavel = $_POST['setor_atual'];
	$query = "select * from vw_tabela_produtos where SA = '{$variavel}' order by ID_Produto desc;";
} else {
	$query = 'select * from vw_tabela_produtos order by ID_Produto desc;';
}
