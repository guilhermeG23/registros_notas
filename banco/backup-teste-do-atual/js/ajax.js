//Input com ajax no formulario
$(document).ready(function(){
//Recebe o value do input id rg
$("input[name='nota']").blur(function(){
	//Variaveis input
	var $visitante = $("input[name='visitante']");
	var $empresa = $("input[name='empresa']");

	//Capturando os valores
	var visitante_valor = document.getElementById('visitante').value;
	var empresa_valor = document.getElementById('empresa').value;

	//Mensagem temporaria caso demore a procura
	$visitante.val('Carregando...');
	$empresa.val('Carregando...');
	//Json de resposta
	//Usa uma funcao para pesquisar
	//Procura pelo campo rg
	$.getJSON( '../funcoes/ajax-resposta.php', { rg: $( this ).val() },
		//Funcao de retorno de valor procurando pelo arquivo json
		function( json ) {
			if(json.visitante.lenght != 0) {
				$visitante.val(json.visitante);
			} else {
				$visitante.val(visitante_valor);
			}
			if(json.empresa.lenght != 0) {
				$empresa.val(json.empresa);
			} else {
				$empresa.val(empresa_valor);
			}
		}
	);
	});
});
