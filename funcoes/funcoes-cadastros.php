<?php

function cadastrar_nota($conexao_banco, $nota, $chave, $data, $empresa, $nome, $arquivo) {
	$query = "insert into Nota_Fiscal values('{$nota}', '{$chave}','{$data}', '{$empresa}', '{$nome}', '{$arquivo}');";
	mysqli_query($conexao_banco, $query);
}

function cadastrar_produto_nota($conexao_banco, $nota, $equipamento, $marca, $descricao, $serial, $setorD, $setorA, $funcionario) {
	$query = "insert into Produto values (default, '{$nota}', '{$equipamento}', '{$marca}', '{$descricao}', '{$serial}', '{$setorD}', '{$setorA}', '{$funcionario}');";
	mysqli_query($conexao_banco, $query);
}

function registro_pdf($size, $temp) {
	if($_FILES["arq"]["size"] > 0) {
		$fp = fopen($_FILES["arq"]["tmp_name"], "rb");
		$arquivo = fread($fp, $_FILES["arq"]["size"]);
		$arquivo = addslashes($arquivo);
		fclose($fp);
		return $arquivo;
	}
}

function registro_nome_pdf ($pdf_nome) {
	if(!get_magic_quotes_gpc()) {
		$nome = addslashes($pdf_nome);
		$nome = $nota . ".pdf";
		return $nome;
	}
}

function confirma_nota_chave($nota) {
	if(isset($nota) && strlen($nota) == 44) {
		return true;
	} else {
		return false;
	}
}

function confirma_nota($nota) {
	if(isset($nota) && strlen($nota) >= 3 && strlen($nota) <= 9) {
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

//Cadastrar setor
/*
if(isset($_POST['custo_setor']) && isset($_POST['nome_setor'])) {
	$centro_custo = tratamento_uppercase($_POST['custo_setor']);
	$nome_setor = tratamento_entrada_palavra($_POST['nome_setor']);
	if(strlen($centro_custo) > 0 && strlen($nome_setor)) {
		$query = "select Centro_custo from Setor where Centro_custo = '{$centro_custo}';";
		$confirmar = mysqli_query($conexao_banco, $query);
		$confirma = mysqli_num_rows($confirmar);
		if($confirma == 0) {
			$query = "insert into Setor values ('{$centro_custo}', '{$nome_setor}');";
			mysqli_query($conexao_banco, $query);
		}	
	}
	header('Location: index.php');
	die();
}
 */
