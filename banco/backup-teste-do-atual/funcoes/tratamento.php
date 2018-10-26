<?php

function limpar_entrada_numero($valor) {
	return preg_replace('/[^0-9]/', '', $valor);
}

function tratamento_uppercase($serial) {
	return strtoupper(preg_replace('/[^A-Za-z0-9]\s/', '', $serial));
}

function tratamento_entrada_data($data) {
	return substr($data,4,4) . "-" . substr($data,2,2) . "-" . substr($data,0,2); 
}

function tratamento_entrada_palavra($pesquisa) {
	return preg_replace('/[^A-Za-z0-9]\s/', '', $pesquisa);
}

function tratamento_nome($pesquisa) {
	return ucfirst(preg_replace('/[^A-Za-z]\s/', '', $pesquisa));
}

function tratamento_data($data) {
	return substr($data,8,2) . "/" . substr($data,5,2) . "/" .  substr($data,0,4);
}

function tratamento_nota($nota) {
	return substr($nota,0,3) . "." . substr($nota,3,3) . "." .  substr($nota,6,3);
}

function tratamento_min_chave($chave) {
	return substr($chave,28,4) . "." . substr($chave,32,4) . "." .  substr($chave,36,4) . "." .  substr($chave,40,4);
}

function tratamento_chave($chave) {
	$chave = substr($chave,0,4) . "." . substr($chave,4,4) . "." .  substr($chave,8,4) . "." .  substr($chave,12,4) . "." . substr($chave,16,4) . "." . substr($chave,20,4) . "." .  substr($chave,24,4) . "." . substr($chave,28,4) . "." . substr($chave,32,4) . "." .  substr($chave,36,4) . "." .  substr($chave,40,4);
	return $chave;
}

function tratamento_cnpj($cnpj) {
	return substr($cnpj,0,2) . "." . substr($cnpj,2,3) . "." . substr($cnpj,5,3) . "/" . substr($cnpj,8,4) . "-" . substr($cnpj,12,2);
}

function tratamento_caractere($entrada) {
	return preg_replace('/[\/.-]/', '', $entrada);
}


function modelo_img($modelo) {
	if($modelo == "Software") {
		$v = "<img class='min-imagem-menu-tabela' src='../imagens/software.png'>";
	} elseif($modelo == "Desktop") {
		$v = "<img class='min-imagem-menu-tabela' src='../imagens/computer.png'>";
	} elseif($modelo == "Perifericos") {
		$v = "<img class='min-imagem-menu-tabela' src='../imagens/teclado.png'>";
	} elseif($modelo == "Monitor") {
		$v = "<img class='min-imagem-menu-tabela' src='../imagens/monitor.png'>";
	} elseif($modelo == "Impressora") {
		$v = "<img class='min-imagem-menu-tabela' src='../imagens/impressora.png'>";
	} elseif($modelo == "Server") {
		$v = "<img class='min-imagem-menu-tabela' src='../imagens/server.png'>";
	} elseif($modelo == "Notebook") {
		$v = "<img class='min-imagem-menu-tabela' src='../imagens/note.png'>";
	} else {
		$v = "";
	}
	return $v;
}

function tratamento_chave_soft($chave) {
	if(strlen($chave) == 0) {
		$chave = "-";
	}
	return $chave;
}
