<div class="container abaixar-container">
	<?php
	//Comecando a printar se existir algum dado
	//Query do index para printar o valor
	$chamadas = mysqli_query($conexao_banco, $query);
	//Numero de resultados
	if(mysqli_num_rows($chamadas) > 0) {
		//Zerando o chamado de valores da tabela mysql
		mysqli_data_seek($chamadas, 0);
	?>
	<div class="card-deck">
	<?php
		//While para mostrar os cards e os modais
		while($chamada=mysqli_fetch_array($chamadas)) {
	?>
		<div class="card-funcionario">
			<div class="card-imagem">
				<img class="imagem-funcionario" src="<?=tratar_foto($chamada["foto"]);?>" alt="imagem não existe ou está fora do banco">	
			</div>
			<div class="botao-funcionario">
			<button type="button" class="botao-funcionario-btn" data-toggle="modal" data-target="#modal<?php echo $chamada["prontuario"];?>">
				<?=tratar_nome($chamada["nome"]);?>
				</button>
			</div>
		</div>
		<div class="modal fade" id="modal<?php echo $chamada["prontuario"];?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
			<div class="modal-dialog" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>
					<div class="modal-body">
					<?php
						//Tratando a entrada para melhor vizualizacao
		       				echo 
						"<img class='modal-foto' src='" . tratar_foto($chamada["foto"]) . "'>",
						"<p>Prontuário: " . prontuario($chamada["prontuario"]) . "</p>", 
						"<p>Nome: " . existe($chamada["nome"]) . "</p>", 
						"<p>Turma: " . turma($chamada["numero_turma"]) . "</p>", 
						"<p>Trabalho: " . existe($chamada["funcao"]) . "</p>", 
						"<p>Telefone residencial: " . tel($chamada["telefone_residencia"]) . "</p>",
						"<p>Celular: " . tel($chamada["celular"]) . "</p>", 
						"<p>Outro contato: " . tel($chamada["outro_contato"]) . "</p>",
						"<p>Cidade: " . existe($chamada["cidade"]) . "</p>",
						"<p>Bairro: " . existe($chamada["bairro"]) . "</p>",
						"<p>Rua: " . existe($chamada["rua"]) . " N°" . residencia_n($chamada["numero_identifica_residencia"]) . "</p>";
					?>
					</div>
				</div>
			</div>
		</div>
	<?php
		}
	?>
	</div>
	<?php
	//Caso tudo der errado ou nao achar nada
	} else {
	?>
	<!--Temporizador de retorno a pagina caso os valores nao sejam encontrados-->
	<script langauge="javascript">
	//Variavel de contagem
	var contador = 3;
	//Focar a repeticao do loop
	window.setInterval("refreshDiv()", 1000);
	//Funcao do contador
	function refreshDiv() {
		//Reescrever um html
		document.getElementById("contagem").innerHTML = "Retornando a pagina principal em " + contador + "...";
		//Contador
		contador = contador - 1;
		//descisao
		if(contador == 0) {
			location.href="index.php";
		}
	}
	</script>
	<!--Mensagem do contador de retorno-->
	<h1 class="mensagem-erro">Nenhum registro encontrado...</h2>
	<p class="mensagem-erro" id="contagem">Retornando a pagina principal em 3...</p>
	<?php
	}
	?>
</div>
