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
