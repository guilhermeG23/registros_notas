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
