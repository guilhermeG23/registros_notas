<?php

include('../banco/banco.php');

function retorna_nota($conexao_banco, $serial) {
	
	$sql = "select Nome_Visitante, Empresa from visitas where RG_CPF = '{$rg}' order by ID desc limit 1;";
	$query = mysqli_query($conexao_banco, $sql);
	//Array
	$arr = array();
	//Decisao
	if(mysqli_num_rows($query)) {
	//Se existe, pegue esses valores de campo
		while($dados=mysqli_fetch_array($query)) {
			$arr['visitante'] = $dados['Nome_Visitante'];
			$arr['empresa'] = $dados['Empresa'];
		}
	} else {
		//Caso nao tenha valor, retorne nada ao value do campo
		$arr['visitante'] = '';
		$arr['empresa'] = '';
	}
	//Return de valor
	return json_encode( $arr );
}

if(isset($_GET['rg'])) {
	echo retorna($_GET['rg'], $conexao_banco);
}
