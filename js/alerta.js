//Fazendo alerts para o caso de nao haver um numero determinado de caracteres depois do required
function alerta() {
	//Captura o valor dos inputs
	var p1 = document.getElementById("nota").value;
	var p2 = document.getElementById("chave").value;
	var p3 = document.getElementById("data_entrada").value;
	var p4 = document.getElementById("empresa").value;
	var p5 = document.getElementById("setor").value;
	var p6 = document.getElementById("funcionario").value;
	var p7 = document.getElementById("arq").value;
	var p8 = document.getElementById("serialW").value;
	var p9 = document.getElementById("versaoW").value;
	var p10 = document.getElementById("serialO").value;
	var p11 = document.getElementById("versaoO").value;
	var p12 = document.getElementById("serial_comum").value;
	var p13 = document.getElementById("tipo").value;
	var p14 = document.getElementById("versao").value;
	//Alerta a partir da quantidade de caracteres de cada input
	//Nome tem que ter no minimo 5 caracteres
	if(p1.length <= 43 and isNumber(p1)) {
		alert("Preencha corretamente, caracteres insuficientes!");
		return false;
	}
}
