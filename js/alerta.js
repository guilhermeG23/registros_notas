//E um numero a entrada
function isNumber(n) {
	    return !isNaN(parseFloat(n)) && isFinite(n);
}
//Fazendo alerts para o caso de nao haver um numero determinado de caracteres depois do required
function alerta() {
	//Captura o valor dos inputs
	var p1 = document.getElementById("visitante").value;
	var p2 = document.getElementById("empresa").value;
	var p3 = document.getElementById("receber_visita").value;
	var p4 = document.getElementById("placa_auto").value;
	var p5 = document.getElementById("entradaD").value;
	var p6 = document.getElementById("entradaH").value;
	//Alerta a partir da quantidade de caracteres de cada input
	//Nome tem que ter no minimo 5 caracteres
	if(p1.length != 0 && p1.length <= 2) {
		alert("Preencha corretamente o nome do visitante, caracteres insuficientes, mínimo de 3 caracteres por nome!");
		return false;
	}
	//Valor numerico
	if(isNumber(p1)) {
		alert("A entrada nao pode ser um valor numerico!");	
		return false;
	}
	//Empresa tem que ter no minino 5 caracteres
	if(p2.length != 0 && p2.length <= 2) {
		alert("Preencha corretamente o nome da empresa, caracteres insuficientes, mínimo de 3 caracteres!");
		return false;
	}
	//Valor numerico
	if(isNumber(p2)) {
		alert("A entrada nao pode ser um valor numerico!");	
		return false;
	}
	//Visita tem que ter no minino 5 caracteres
	if(p3.length != 0 && p3.length <= 2) {
		alert("Preencha corretamente o nome da pessoa a receber a visita, caracteres insuficientes, mínimo de 3 caracteres!");
		return false;
	}
	//Valor numerico
	if(isNumber(p3)) {
		alert("A entrada nao pode ser um valor numerico!");	
		return false;
	}
	//Placa
	if(p4.length != 0 && p4.length != 8) {
		alert("Preencha corretamente a placa do automóvel!");
		return false;
	}
	//Data
	if(p5.length != 0 && p5.length != 10) {
		alert("Data preenchida incorretamente!");
		return false;
	}
	//Horario
	if(p6.length != 0 && p6.length != 5) {
		alert("horário preenchido incorretamente!");
		return false;
	}
}
