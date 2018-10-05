<?php

function cadastrar_nota($nota, $data, $empresa, $nome, $arquivo) {
	if (confirma_nota($nota)) {
		$query = "insert into Nota_Fiscal values('{$nota}', '{$data}', '{$empresa}', '{$nome}', '{$arquivo}');";
		mysqli_query($conexao_banco, $query);
	}
}

function cadastrar_maquina() {
	if (confirma_nota($nota)) {
		$query = "insert into Maquina values('{$serial}', '{$nota}', '{$marca}', '{$modelo}', 1, 1111111111);";
		mysqli_query($conexao_banco, $query);
	}
}

function cadastrar_windows($nota, $serialW, $versaoW, $setor, $usuario) {
	if (confirma_nota($nota)) {
		$serialW = confirma_serial_windows_office($serialW);
		$query = "insert into Windows values('{$nota}', '{$serialW}', '{$versaoW}', {$setor}, '{$usuario}');";
		mysqli_query($conexao_banco, $query);
	}
}

function cadastrar_office($nota, $serialO, $versaoO, $ano, $setor, $usuario) {
	if(confirma_nota($nota)) {
		serial_windows_office($serial);
		$serialO = confirma_serial_windows_office($serialO);
		$query = "insert into Office values('{$nota}', '{$serialO}', '{$versaoO}', '{$ano}', '{$setor}', '{$usuario}');";
		mysqli_query($conexao_banco, $query);
	}
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
		$serial = '0000000000000000000000000';
		return $serial;
	}
}

function confirma_nota($nota) {
	if(isset($nota) && strlen($nota) == 44) {
		return true;
	} else {
		return false;
	}
	return false;
}
