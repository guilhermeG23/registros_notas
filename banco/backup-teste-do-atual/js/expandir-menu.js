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
