//Criando as mascarras a partir do jquerk mask, modelos para os campos inputs
$(document).ready(function () { 
	var $documento = $("#rg"); //Arrumar a entrada maxima de caracteres por documento
	var $placa = $("#placa_auto"); //Placa do carro se entrar
//	var $cartao = $("#cartao"); //Cartao de visita N
	var $entradaD = $("#entradaD"); //Entrada Dia
	var $entradaH = $("#entradaH"); //Entrada Hora
	$documento.mask('000000000000'); //Documento
	$placa.mask('AAA-9999'); //Placa do caro
//	$cartao.mask('00'); //Cartao de visita N
	$entradaD.mask('00/00/0000'); //Entrada Dia
	$entradaH.mask('00:00'); //Entrada Hora
});
