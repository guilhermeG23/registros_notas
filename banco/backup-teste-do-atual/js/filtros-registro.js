//Criando as mascarras a partir do jquerk mask, modelos para os campos inputs
$(document).ready(function () { 
	var $nota = $("#nota"); 
	var $chave = $("#chave");
	var $emissao = $("#data_entrada");
	var $cnpj = $("#cnpj");
	$nota.mask('000.000.000');
	$chave.mask('0000.0000.0000.0000.0000.0000.0000.0000.0000.0000.0000');
	$emissao.mask('00/00/0000');
	$cnpj.mask('00.000.000/0000-00');
});
