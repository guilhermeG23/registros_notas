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
