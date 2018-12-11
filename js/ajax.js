//Input com ajax no formulario
$(document).ready(function(){
//Deixando por padrao sumido
//Recebe o value do input id cnpj
$("input[name='cnpj']").blur(function(){
	//inputs que receberam o valor do ajax
	var $empresa = $("input[name='empresa']");

	//Capturando os valores atuais do input em questao
	var empresa_valor = document.getElementById('empresa').value;

	//Funcao ajax, manda como um get para o php abaixo fazer a pesquisa e retornar a resposta
	$.getJSON( '../funcoes/ajax-resposta.php', { cnpj: $( this ).val() },
		//Funcao de retorno de valor procurando pelo arquivo json
		function( json ) {
			$empresa.val(json.empresa);
			if(document.getElementById('empresa').value.length > 0) {
				document.getElementById("empresa").setAttribute('readonly', 'yes');
				document.getElementById('check_sumir').style.display = "table-row";
			} else {
				document.getElementById("empresa").removeAttribute('readonly');
				document.getElementById('check_sumir').style.display = "none";
				$empresa.val(empresa_valor);
			}
		}
		);
	});
});
