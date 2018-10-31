<?php

#Ja ta bem explicativo pelos nomes
#Esta pagina sao a funcoes para confirma e cadastrar alguma nota ou conteudo dela

#Cadastra nota
function cadastrar_nota($conexao_banco, $nota, $chave, $data, $empresa, $nome, $arquivo) {
	$query = "insert into Nota_Fiscal values('{$nota}', '{$chave}','{$data}', '{$empresa}', '{$nome}', '{$arquivo}');";
	mysqli_query($conexao_banco, $query);
}

#cadastra o produto da nota
function cadastrar_produto_nota($conexao_banco, $nota, $equipamento, $marca, $descricao, $serial, $relacao, $setorD, $relacaoatual, $setorA, $funcionario) {
	$query = "insert into Produto values (default, '{$nota}', '{$equipamento}', '{$marca}', '{$descricao}', '{$serial}', '{$relacao}', '{$setorD}', '{$relacaoatual}', '{$setorA}', '{$funcionario}');";
	mysqli_query($conexao_banco, $query);
}

#cadastra cnpj
function cadastrar_cnpj($conexao_banco, $cnpj, $empresa) {
	$query = "insert into Empresa_Nota values ('{$cnpj}', '{$empresa}');";
	mysqli_query($conexao_banco, $query);
}


//alterar a nota fiscal
function alterar_nota($conexao_banco, $nota, $chave, $data, $valor_cnpj) {
	$query = "update Nota_Fiscal set Chave_Acesso = '{$chave}', Emissao = '{$data}', CNPJ_Empresa = '{$valor_cnpj}' where Nota_Fiscal = '{$nota}';";
	mysqli_query($conexao_banco, $query);
}

//Alterar produto do funcionario
function alterar_funcionario_produto($conexao_banco, $nota, $relacao, $setor, $funcionario) {
	$query = "update Produto set Relacao_Destino = '{$relacao}', Setor_Destino = '{$setor}', Funcionario = '{$funcionario}' where ID_Nota = '{$nota}';";
	mysqli_query($conexao_banco, $query);
}

#deleta nota
function deletar_nota($deletar) {
	if(isset($deletar)) {
		$query = "delete from Produto where ID_Nota = '{$deletar}';";
		mysqli_query($conexao_banco, $query);
		$query = "delete from Nota_Fiscal where Nota_Fiscal = '{$deletar}';";
		mysqli_query($conexao_banco, $query);
	}
}

#confirma cnpj
function confirma_cnpj($conexao_banco, $cnpj) {
	if(strlen($cnpj) == 14) {
		$query = "select CNPJ from Empresa_Nota where CNPJ = '{$cnpj}';";
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

#registra o pdf
function registro_pdf($size, $temp) {
	if($_FILES["arq"]["size"] > 0) {
		$fp = fopen($_FILES["arq"]["tmp_name"], "rb");
		$arquivo = fread($fp, $_FILES["arq"]["size"]);
		$arquivo = addslashes($arquivo);
		fclose($fp);
		return $arquivo;
	}
}

#altera o nome do pdf
function registro_nome_pdf ($pdf_nome) {
	if(!get_magic_quotes_gpc()) {
		$nome = addslashes($pdf_nome);
		$nome = $nota . ".pdf";
		return $nome;
	}
}

#confirma a chave da nota
function confirma_nota_chave($nota) {
	if(isset($nota) && strlen($nota) == 44) {
		return true;
	} else {
		return false;
	}
}

#confirma a nota
function confirma_nota($nota) {
	if(isset($nota) && strlen($nota) >= 1 && strlen($nota) <= 9) {
		return true;
	} else {
		return false;
	}
}

#confirma se a nota ja existe pelo numero dela
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
