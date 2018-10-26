//Confirmar se um numero
function isNumber(n) {
	    return !isNaN(parseFloat(n)) && isFinite(n);
}

//Funcao de alerta sobre o preenchimento dos campos
function alerta() {
	
	var p1 = document.getElementById("nota").value;
	var p2 = document.getElementById("chave").value;
	var p3 = document.getElementById("data_entrada").value;
	var p4 = document.getElementById("cnpj").value;
	
	if(p1.length != 11) {
		alert("Preencha corretamente o numero da nota!");
		return false;
	}

	if(p2.length != 54) {
		alert("Preencha corretamente o numero da chave da nota!");
		return false;
	}
	
	if(p3.length != 10) {
		alert("Preencha corretamente a data de emissao!");
		return false;
	}

	if(p4.length != 18) {
		alert("Preencha corretamente o cnpj da empresa que emitiu a nota!");
		return false;
	}
}
