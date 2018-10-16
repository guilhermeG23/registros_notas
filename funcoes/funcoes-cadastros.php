<?php

function cadastrar_nota($conexao_banco, $nota, $chave, $data, $empresa, $nome, $arquivo) {
	$query = "insert into Nota_Fiscal values('{$nota}', '{$chave}','{$data}', '{$empresa}', '{$nome}', '{$arquivo}');";
	mysqli_query($conexao_banco, $query);
}

function cadastrar_maquina($conexao_banco, $serial, $marca, $modelo, $nota, $setor, $funcionario) {
	$query = "insert into Maquina values('{$serial}', '{$marca}', '{$modelo}', '{$nota}', $setor, $funcionario);";
	mysqli_query($conexao_banco, $query);
}

function cadastrar_software_microsoft($conexao_banco, $serial, $versao, $chave, $setor, $funcionario) {
	if(strlen($serial) == 0) {
		$serial = "";
	}
	$query = "insert into Software_Microsoft values(default, '{$serial}', '{$versao}', '{$chave}','{$setor}', '{$funcionario}');";
	mysqli_query($conexao_banco, $query);
}

function cadastrar_funcionario($conexao_banco, $chapa, $nome, $setor) {
	$query = "insert into Funcionario values ('{$chapa}', '{$nome}', '{$setor}')";
	mysqli_query($conexao_banco, $query);
}

function cadastrar_setor($conexao_banco, $setor) {
	$query = "insert into Setor values (default, '{$setor}')";
	mysqli_query($conexao_banco, $query);
}

function confirma_existe_valor($modelo) {
	if(strlen($modelo) > 0) {
		return true;
	} else {
		return false;
	}
}

function confirma_nota_chave($nota) {
	if(isset($nota) && strlen($nota) > 8 && strlen($nota) < 16) {
		return true;
	} else {
		return false;
	}
}

function confirma_nota($nota) {
	if(isset($nota) && strlen($nota) == 44) {
		return true;
	} else {
		return false;
	}
}

function entrada_chapa($chapa) {
	if(isset($chapa) && strlen($chapa) == 9) {
		return true;
	} else {
		return false;
	}
}

function confirma_existe_nota($conexao_banco, $nota) {
	if(confirma_nota($nota)) {
		$query = "select Nota_Fiscal from Nota_Fiscal where Nota_Fiscal = '{$nota}';";
		$procura = mysqli_query($conexao_banco, $query);
		$valores = mysqli_num_rows($procura);
		if($valores == 0) {
			return true;
		} else {
			return false;
		}	
	}else {
		return false;
	}
}

function confirma_serial_microsoft($conexao_banco, $serial) {
	if(isset($serial) && strlen($serial) == 25) {
		$query = "select Serial_S from Software_Microsoft where Serial_S = '{$serial}';";
		$procura = mysqli_query($conexao_banco, $query);
		$valores = mysqli_num_rows($procura);
		if($valores == 0) {
			return true;
		} else {
			return false;
		}	
	} else if(strlen($serial) == 0) {
		return true;
	}else {
		return false;
	}
}

function confirma_serial_maquina($conexao_banco, $serial) {
	if(isset($serial) && strlen($serial) > 0) {
		$query = "select Maquina_Serial from Maquina where Maquina_Serial = '{$serial}';";
		$procura = mysqli_query($conexao_banco, $query);
		$valores = mysqli_num_rows($procura);
		if($valores == 0) {
			return true;
		} else {
			return false;
		}
	} else {
		return false;
	}
}

function confirma_setor_existe($conexao_banco, $setor) {
	$query = "select Setor from Setor where Setor = '{$setor}';";
	$procura = mysqli_query($conexao_banco, $query);
	$valor = mysqli_num_rows($procura);
	if($valor == 0) {
		return true;
	} else {
		return false;
	}
}

function confirma_usuario_existe($conexao_banco, $setor, $chapa) {
	$query = "select Chapa from Funcionario where Chapa = '{$chapa}' and Setor_ID_Externo = '{$setor}';";
	$procura = mysqli_query($conexao_banco, $query);
	$valor = mysqli_num_rows($procura);
	if($valor == 0) {
		return true;
	} else {
		return false;
	}
}
