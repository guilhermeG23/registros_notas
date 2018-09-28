//Menu do registro de visitas
function descer_menu(aparecer) {
	//Pega o valor se ele ta visivel ou nao
	var display = document.getElementById(aparecer).style.display;
	//Decisao, inverte o display e troca o texto
	if(display == "block") {
		document.getElementById("texto-mostrar-mais-" + aparecer).innerHTML = aparecer;
		document.getElementById(aparecer).style.display = 'none';
	} else {
		document.getElementById("texto-mostrar-mais-" + aparecer).innerHTML = "Ocultar registro do " + aparecer;
		document.getElementById(aparecer).style.display = 'block';
	}
}
//Mostrar os botoes dos meses e anos
function descer_botoes(botoes) {
	//Pega o valor se eles tam ou nao visiveis
	var display = document.getElementById(botoes).style.display;
	//Alterando o css delesi
	//Pega o valor da classe deles
	var esconder_menu = document.getElementsByClassName('esconder');
	//For que garante que tudo mundo fique em none no display
	for(var i = 0; i < esconder_menu.length; i++) {
		esconder_menu[i].style.display = 'none';
	}
	//Decisao para confirma qual display que ela vai usar
	if(display == "inline-block") {
		document.getElementById(botoes).style.display = 'none';
	} else {
		document.getElementById(botoes).style.display = 'inline-block';
	}
}
//Abrir opcoes de alteracoes de registros
function mostrar_coluna(nome, altera) {
	//variaveis
	var display = document.getElementById(nome).style.display;
	var contador = document.getElementsByName(altera);
	var i = 0;
	//Confirma se ta visivel
	if(display == "table-cell") {
		//Sumir
		document.getElementById(nome).style.display = 'none';	
		//laco 
		for(i; i < contador.length; i++) {
			contador[i].style.display = 'none';
		}
	} else {
		//aparecer
		document.getElementById(nome).style.display = 'table-cell';	
		//laco
		for(i; i < contador.length; i++) {
			contador[i].style.display = 'table-cell';
		}
	}
}
