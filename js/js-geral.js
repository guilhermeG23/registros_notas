//JS geral

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

//Funcao principal de expandir
function mostrar_coluna(alterar_menu, nome, altera) {
	//variaveis
	var display = document.getElementById(nome).style.display;
	var contador = document.getElementsByName(altera);
	
	var i = 0;

	//Confirma se ta visivel
	if(display == "table-cell") {
		document.getElementById(alterar_menu).innerHTML = '<img class="min-imagem-menu" src="../imagens/alterar.png"> ' + alterar_menu;
		//Sumir
		document.getElementById(nome).style.display = 'none';
		//laco 
		for(i; i < contador.length; i++) {
			contador[i].style.display = 'none';
		}
	} else {
		document.getElementById(alterar_menu).innerHTML = '<img class="min-imagem-menu" src="../imagens/alterar.png">Ocultar ' + alterar_menu;
		//aparecer
		document.getElementById(nome).style.display = 'table-cell';
		//laco
		for(i; i < contador.length; i++) {
			contador[i].style.display = 'table-cell';
		}
	}
}

//Funcao customizada para mostrar a chave
function mostrar_coluna_chave(nome, altera) {
	//variaveis
	var display = document.getElementById(nome).style.display;
	var contador = document.getElementsByName(altera);
	
	var i = 0;

	//Sumindo campo chave reversa com chave completa
	//chave completa some com essa coluna
	if(altera == 'key') {
		var display_coluna = document.getElementById('sumir-campo-cabecalho').style.display;
		if(display_coluna == "none") {
			document.getElementById('chave_alterar_js').innerHTML = '<img class="min-imagem-menu" src="../imagens/alterar.png">Chave Completa';
			document.getElementById('sumir-campo-cabecalho').style.display = 'table-cell';
			var cont = document.getElementsByName('sumir-campo-tabela');
			i = 0;
			for(i; i < cont.length; i++) {
				cont[i].style.display = 'table-cell';
			}
		} else {
			document.getElementById('chave_alterar_js').innerHTML = '<img class="min-imagem-menu" src="../imagens/alterar.png">Chave Resumida';
			document.getElementById('sumir-campo-cabecalho').style.display = 'none';
			var cont = document.getElementsByName('sumir-campo-tabela');
			i = 0;
			for(i; i < cont.length; i++) {
				cont[i].style.display = 'none';
			}
		}
	}

	i = 0;	
	
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

//Criando as mascarras a partir do jquerk mask, modelos para os campos inputs
$(document).ready(function () { 
	var $nota = $("#nota");
	var $chave = $("#chave");
	var $emissao = $("#data_entrada");
	var $cnpj = $("#cnpj");
	$nota.mask('000.000.000');
	$chave.mask('0000 0000 0000 0000 0000 0000 0000 0000 0000 0000 0000');
	$emissao.mask('00/00/0000');
	$cnpj.mask('00.000.000/0000-00');
});

//Funcao limitar o tamanho dos inputs
function limitarInput(obj, quanto) {
	obj.value = obj.value.substring(0,quanto);
	return obj;
}
