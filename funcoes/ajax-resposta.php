<?php
include("../banco/banco.php");
include("tratamento.php");
function retorna($cnpj, $conexao_banco) {
	$cnpj = limpar_entrada_numero($cnpj);
	$sql = "select * from Empresa_Nota where CNPJ = '{$cnpj}';";
	$completar_ajax = mysqli_query($conexao_banco, $sql);
	$arr = array();
	if(mysqli_num_rows($completar_ajax)) {
		while($dados=mysqli_fetch_array($completar_ajax)) {
			$arr['empresa'] = $dados['Empresa'];
		}
	} else {	
		$arr['empresa'] = '';
	}
	return json_encode( $arr );
}
if(isset($_GET['cnpj'])) {
	    echo retorna($_GET['cnpj'], $conexao_banco);
}
