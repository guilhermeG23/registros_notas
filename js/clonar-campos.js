var incrementador = 0;

function duplicarCampos(){
	var clone = document.getElementById('clonar').cloneNode(true);
	var destino = document.getElementById('destino');
	destino.appendChild(clone);
	clone.id = 'clonar[' + incrementador + ']';
	document.getElementById('Equipamento').id = "Equipamento" + incrementador + "";
	document.getElementById('Marca').id = "Marca" + incrementador + "";
	document.getElementById('Descricao').id = "Descricao" + incrementador + "";
	document.getElementById('Serial').id = "Serial" + incrementador + "";
	document.getElementById('Localatual').id = "Localatual" + incrementador + "";
	document.getElementById("Equipamento" + incrementador + "").name = "Equipamento" + incrementador + "";
	document.getElementById("Marca" + incrementador + "").name = "Marca" + incrementador + "";
	document.getElementById("Descricao" + incrementador + "").name = "Descricao" + incrementador + "";
	document.getElementById("Serial" + incrementador + "").name = "Serial" + incrementador + "";
	document.getElementById("Localatual" + incrementador + "").name = "Localatual" + incrementador + "";
	incrementador++;
	mandarcontador();
}

function mandarcontador() {
	document.getElementById('contador').value = incrementador;
}

function removerCampos(){
	if(incrementador > 0) {
		var node = document.getElementById('destino');
		node.removeChild(node.childNodes[incrementador + 1]);
		incrementador--;
		mandarcontador();
	}
}