function mostrar_coluna(nome, altera) {
	//variaveis
	var display = document.getElementById(nome).style.display;
	var contador = document.getElementsByName(altera);
	
	var i = 0;

	//Sumindo campo chave reversa com chave completa
	//chave completa some com essa coluna
	if(altera == 'key') {
		var display_coluna = document.getElementById('sumir-campo-cabecalho').style.display;
		if(display_coluna == "none") {
			document.getElementById('sumir-campo-cabecalho').style.display = 'table-cell';
			var cont = document.getElementsByName('sumir-campo-tabela');
			i = 0;
			for(i; i < cont.length; i++) {
				cont[i].style.display = 'table-cell';
			}
		} else {
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
