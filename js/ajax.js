//Input com ajax no formulario
$(document).ready(function(){
//Recebe o value do input id rg
$("input[name='cnpj']").blur(function(){
	//Variaveis input
	var $empresa = $("input[name='empresa']");

	//Capturando os valores
	var empresa_valor = document.getElementById('empresa').value;

	$.getJSON( '../funcoes/ajax-resposta.php', { cnpj: $( this ).val() },
		//Funcao de retorno de valor procurando pelo arquivo json
		function( json ) {
			if(json.empresa.lenght != 0) {
				$empresa.val(json.empresa);
			} else {
				$empresa.val(empresa_valor);
			}
		}
	);
	});
});
