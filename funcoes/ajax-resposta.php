<?php
#Incluindo o banco e os tratamentos para funcionar o ajax
include("../banco/banco.php");
include("tratamento.php");

#Funcao de pesquisa de CNPJ
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

#Entrada e retorna da funcao dfe busca por ajax
if(isset($_GET['cnpj'])) {
	    echo retorna_cnpj($_GET['cnpj'], $conexao_banco);
}

#Funcao de busca por relacao de setores
function retorna_relacao($relacao, $conexao_banco) {
	$cnpj = limpar_entrada_numero($cnpj);
	$sql = "select * from Setor where ID_Relacao = '{$relacao}';";
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

#Entrada e retorna da funcao dfe busca por ajax
if(isset($_GET['relacao'])) {
	    echo retorna_relacao($_GET['relacao'], $conexao_banco);
}
