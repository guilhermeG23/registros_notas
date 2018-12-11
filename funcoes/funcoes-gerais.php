<?php

#Tratamentos gerais

//Tratamento do setor da pessoa
function dicionario_setor($buscar) {
	//Depende a palavra ele abre um setor, ajustar isso que ficou muito bizarro
	if ($buscar == "manutencao" || $buscar == "manu" || $buscar == "MANUTENCAO" || $buscar == "MANU") { 
		$buscar = 7;
	} elseif ($buscar == "exped" || $buscar == "EXPED" || $buscar == "expedicao" || $buscar == "EXPEDICAO") { 
		$buscar = 8;
	} elseif ($buscar == "aparas" || $buscar == "apa" || $buscar == "APARAS" || $buscar == "APA") { 
		$buscar = 9;
	} elseif ($buscar == "producao" || $buscar == "PRODUCAO" || $buscar == "prod" || $buscar == "PROD") { 
		$buscar = 12; 
	} elseif ($buscar == "TURMA1"  || $buscar == "turma1" || $buscar == "TURMA 1"  || $buscar == "turma 1" || $buscar == "T1" || $buscar == "t1" ) { 
		$buscar = 1;
	} elseif ($buscar == "TURMA2"  || $buscar == "turma2" || $buscar == "TURMA 2"  || $buscar == "turma 2" || $buscar == "T2" || $buscar == "t2" ) { 
		$buscar = 2;
	} elseif ($buscar == "TURMA3"  || $buscar == "turma3" || $buscar == "TURMA 3"  || $buscar == "turma 3" || $buscar == "T3" || $buscar == "t3" ) { 
		$buscar = 3;
	} elseif ($buscar == "TURMA4"  || $buscar == "turma4" || $buscar == "TURMA 4"  || $buscar == "turma 4" || $buscar == "T4" || $buscar == "t4" ) { 
		$buscar = 4;
	} elseif ($buscar == "escritorio" || $buscar == "ESCRITORIO" || $buscar == "ESCRI" || $buscar == "escri") { 
		$buscar = 0;
	} else {
		//Caso nao bata com as palavras eele volta a pesquisa ao normal
		$buscar = $buscar;
	}
	//Retorno do valor
	return $buscar;
}

//Tratamento da foto, o arquivo fica numa pasta entao tem que confirma se existe antes de printar na tela
function tratar_foto($foto) {
	//Verifica o tramanho do nome do arquivo
	if(strlen($foto) > 0) {
		//CHamando a foto
		$foto = '../fotos/' . $foto;
		//Se der errado
		if(!file_exists($foto)) {
			$foto = '../fotos/teste.png';
		}
	//Se der errado
	} else {
		$foto = '../fotos/teste.png';
	}
	//Retorno do valor
	return $foto;
}

//Filtro do modal
//Ajuste de prontuario
function prontuario($pront) {
	if(!is_numeric($pront)) {
		$pront = "Não informado";
	} else {
		$pront = substr($pront,4,5);
	}
	//Retorno do resultado
	return $pront;
}

//Telefone entre outros recursos que podem nao estar disponivel ao modal
function existe($existe) {
	if(strlen($existe) == 0) {
		$existe = "Não informado";
	}
	//Retorno do resultado
	return $existe;
}

//Filtro da turma
function turma($turma) {
	//Depende se existe o valor e seu numero
	if(!is_numeric($turma)) {
		$turma = "Não informado";
	} else {
		//Setores | turma
		if($turma=='0'){
    			$turma="Escritório";
		} elseif($turma=='1'){
   			$turma="1";
		} elseif($turma=='2'){
   			$turma="2";
		} elseif($turma=='3'){
   			$turma="3";
		} elseif($turma=='4'){
			$turma="4";
		} elseif($turma=='7'){
			$turma="Manutenção";
		} elseif($turma=='8'){
			$turma="Expedição";
		} elseif($turma=='9'){
			$turma="Aparas";
		} elseif($turma=='12'){
			$turma="Produção";
		}
	}
	//Retorno do resultado
	return $turma;
}

//Ajuste de telefone
function tel($t) {
	if(!is_numeric($t)) {
		$t = "Não informado";
	} else {
		$zero = substr($t,2,1);
		if($zero == 0) {
			$t = "(" . substr($t,0,2) . ") " . substr($t,3,4) . "-" . substr($t,7,4);
		} else {
			$t = "(" . substr($t,0,2) . ") " . substr($t,2,5) . "-" . substr($t,7,4);
		}	
	}
	//Retornando o telefone que a pessao usa
	return $t;	
}

//Verificao numero da casa da pessoa
function residencia_n($num) {
	if(!is_numeric($num)) {
		$num = "Não informado";
	}
	//Retorna o valor
	return $num;
}

//Tratamento de nomes longos
function tratar_nome($nome) {
	//Contagem e decisao
	$decidir = strlen($nome);
	//Decisao
	if($decidir >= 17) {
		//Result
		$nome_atual = substr($nome,0,16) . "...";
	} else {
		//Result
		$nome_atual = $nome;
	}
	//Retornar valor
	return $nome_atual;
}

//Filtro de mysql inject extremamente basico, quando puder, melhorar ele 
function tratamento_entrada($pesquisa) {
	$pesquisa = mysqli_real_escape_string($conexao_banco, $pesquisa);
	$pesquisa = preg_replace('/[^A-Za-z0-9]\s/', '', $pesquisa);
	return $pesquisa;
}

//Tratamento da pesquisa
function pesquisar($pesquisa) {
	//Se o campo pesquisa nao possuir nada, ele carrega o index normal
	if(strlen($pesquisa) == 0) {
		//Carregando valor padrao
		$query = "select * from funcionarios inner join fotos_funcionarios on funcionarios.prontuario = fotos_funcionarios.id order by funcionarios.nome asc;";
	} else {
		//Tramento na variavel pesquisa
		$pesquisa = dicionario_setor($pesquisa);
		//Query de resultado
		$query = "select * from funcionarios inner join fotos_funcionarios on funcionarios.prontuario = fotos_funcionarios.id where nome like '%{$pesquisa}%' or numero_turma = '{$pesquisa}' or funcao like '%{$pesquisa}%' or cidade like '%{$pesquisa}%' or bairro like '%{$pesquisa}%' or rua like '%{$pesquisa}%' order by nome asc;";
	}
	//Retone query
	return $query;
}
