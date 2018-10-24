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
