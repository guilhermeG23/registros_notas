//Iniciando o contador
var incrementador = 1;

//CArregando o primeiro incremento no input invisivel
mandarcontador();

//Funcao para clonar os campos em display: none
function duplicarCampos(){

	//Clonaodo os campos
	var clone = document.getElementById('clonar').cloneNode(true);
	var destino = document.getElementById('destino');
	destino.appendChild(clone);
	clone.id = 'clonar[' + incrementador + ']';
	
	//Criando os ids para os campos clonados
	document.getElementById('Equipamento').id = "Equipamento" + incrementador + "";
	document.getElementById('Marca').id = "Marca" + incrementador + "";
	document.getElementById('Descricao').id = "Descricao" + incrementador + "";
	document.getElementById('Serial').id = "Serial" + incrementador + "";
	document.getElementById('relacaoAtual').id = "relacaoAtual" + incrementador + "";
	document.getElementById('Localatual').id = "Localatual" + incrementador + "";
	
	//Alterando os nomes dos campos
	document.getElementById("Equipamento" + incrementador + "").name = "Equipamento" + incrementador + "";
	document.getElementById("Marca" + incrementador + "").name = "Marca" + incrementador + "";
	document.getElementById("Descricao" + incrementador + "").name = "Descricao" + incrementador + "";
	document.getElementById("Serial" + incrementador + "").name = "Serial" + incrementador + "";
	document.getElementById("relacaoAtual" + incrementador + "").name = "relacaoAtual" + incrementador + "";
	document.getElementById("Localatual" + incrementador + "").name = "Localatual" + incrementador + "";

	//Fazendo ficar required com js
	document.getElementById("Equipamento" + incrementador + "").setAttribute('required', 'yes');
	document.getElementById("Marca" + incrementador + "").setAttribute('required', 'yes');
	document.getElementById("Descricao" + incrementador + "").setAttribute('required', 'yes');
	document.getElementById("relacaoAtual" + incrementador + "").setAttribute('required', 'yes');
	document.getElementById("Localatual" + incrementador + "").setAttribute('required', 'yes');
	
	//Incrementar
	incrementador++;

	//Ativar funcao
	mandarcontador();
}

//Atribuir valor ao contador hidden do registro de equipamento
function mandarcontador() {
	document.getElementById('contador').value = incrementador;
}

//Remover campos -1
function removerCampos(){
	if(incrementador > 1) {
		var node = document.getElementById('destino');
		node.removeChild(node.childNodes[incrementador]);
		incrementador--;
		mandarcontador();
	}
}

//apagar todos os campos criado exceto o default
//Mesma coisa do que ta acima, mas com um for para 
function allremoverCampos(){
	for(var t = 1; t < incrementador; incrementador--) {
		var node = document.getElementById('destino');
		node.removeChild(node.childNodes[incrementador]);
		mandarcontador();
	}
}
