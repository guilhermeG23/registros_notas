<?php
include("../banco/banco.php");
include("../funcoes/tratamento_cadastrar.php");
include("../funcoes/cadastrar-computador.php");

$serial = limpar_entrada_numero($_POST['sn']);
$nota = limpar_entrada_numero($_POST['nota']);
$data = tratamento_entrada_data(limpar_entrada_numero($_POST['data_entrada']));
$empresa = tratamento_entrada_palavra($_POST['empresa']);
$setor = tratamento_entrada_palavra($_POST['setor']);
$usuario = tratamento_entrada_palavra($_POST['usuario']);
$serialW = tratamento_serial($_POST['serialW']);
$versaoW = tratamento_entrada_palavra($_POST['versaoW']);

if($_FILES['arq']['size'] > 0) {
	$fp = fopen($_FILES['arq']['tmp_name'], 'rb');
	$arquivo = fread($fp, $_FILES['arq']['size']);
	$arquivo = addslashes($arquivo);
	fclose($fp);

	if(!get_magic_quotes_gpc()) {
		$nome = addslashes($_FILES['arq']['name']);
		$nome = $serial . '.pdf';
	}

	cadastrar_nota($nota, $data, $empresa, $nome, $arquivo);
	cadastrar_windows($nota, $serialW, $versaoW, $setor, 1111111111);
	
	header("Location: index.php");
	die();
} else {
	echo "deu erro";
}
