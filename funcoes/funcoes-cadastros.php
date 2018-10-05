<?php

function cadastrar_nota($conexao_banco, $nota, $chave, $data, $empresa, $nome, $arquivo) {
	$query = "insert into Nota_Fiscal values('{$nota}', '{$chave}','{$data}', '{$empresa}', '{$nome}', '{$arquivo}');";
	mysqli_query($conexao_banco, $query);
}

function cadastrar_maquina($conexao_banco, $serial, $marca, $modelo, $chave, $setor, $usuario) {
	$query = "insert into Maquina values('{$serial}', '{$marca}', '{$modelo}', '{$chave}', '{$setor}', '{$usuario}');";
	mysqli_query($conexao_banco, $query);
}

function cadastrar_software_microsoft($conexao_banco, $serial, $versao, $chave, $setor, $usuario) {
	$serial = confirma_serial_windows_office($serial);
	$query = "insert into Software_Microsoft values('{$serial}', '{$versao}', '{$chave}','{$setor}', '{$usuario}');";
	mysqli_query($conexao_banco, $query);
}

function serial_windows_office($serial) {
	if (isset($serial) && strlen($serial) >= 1 && strlen($serial) < 25) {
		$_SESSION["erro_serial"] = true;
		header("Location: index.php");
		die();
	} 
}

function confirma_serial_windows_office($serial) {
	if(isset($serial) && strlen($serial) == 25) {
		return $serial;
	} else {
		return '0000000000000000000000000';
	}
}

function confirma_existe_valor($modelo) {
	if(strlen($modelo) > 0) {
		return true;
	} else {
		return false;
	}
}

function confirma_serial_microsoft($serial) {
	if(isset($serial) && strlen($serial) == 25) {
		return true;
	} else {
		return false;
	}
}

function confirma_nota($nota) {
	if(isset($nota) && strlen($nota) > 8 && strlen($nota) <= 15) {
		return true;
	} else {
		return false;
	}
}

function confirma_nota_chave($nota) {
	if(isset($nota) && strlen($nota) == 44) {
		return true;
	} else {
		return false;
	}
}

function confirma_serial_maquina($serial) {
	if(isset($serial) && strlen($serial) > 0) {
		return true;
	} else {
		return false;
	}
}
