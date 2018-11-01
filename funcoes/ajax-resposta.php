<?php
include("../banco/banco.php");
include("tratamento.php");

function retorna_cnpj($cnpj, $conexao_banco) {
	$cnpj = limpar_entrada_numero($cnpj);
	$sql = "select Empresa from Empresa_Nota where CNPJ = '{$cnpj}';";
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
	    echo retorna_cnpj($_GET['cnpj'], $conexao_banco);
}


function retorna_relacao($cnpj, $conexao_banco) {
	$cnpj = limpar_entrada_numero($cnpj);
	$sql = "select * from Setor where ID_Relacao = '{$cnpj}';";
	$completar_ajax = mysqli_query($conexao_banco, $sql);
	$arr = array();
	if(mysqli_num_rows($completar_ajax)) {
		while($dados=mysqli_fetch_array($completar_ajax)) {
			$arr['Relacao'] = $dados['ID_Relacao'];
			$arr['Setor'] = $dados['Setor'];
		}
	} else {	
		$arr['Relacao'] = $dados['ID_Relacao'];
		$arr['Setor'] = $dados['Setor'];
	}
	return json_encode( $arr );
}

if(isset($_GET['relacao'])) {
	    echo retorna_relacao($_GET['relacao'], $conexao_banco);
}
