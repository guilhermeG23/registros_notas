<!--Menu da pagina-->					
<nav class="navbar navbar-expand-lg navbar-light bg-light justify-content-between nav-arrumando-index-sobrepoe arrumando-border">
	<a class="navbar-brand" href="index.php"><img class="min-imagem-menu" src="../imagens/ico.ico"></a>
	<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
		<span class="navbar-toggler-icon"></span>
	</button>
	<div class="collapse navbar-collapse" id="navbarSupportedContent">
		<ul class="navbar-nav mr-auto">
			<?php
			#Caso query nao exista carrege uma query padrao
			if(!isset($query)) {
				$query = "select Nota_Fiscal from Nota_Fiscal limit 1;";
			}
			#Contador para aparecer o menu
			$contador = mysqli_query($conexao_banco, $query);
			$contador = mysqli_num_rows($contador);
			if($contador > 0) {
			?>
				<li class="nav-item active">
					<div class="dropdown">
						<button class="btn btn-background-arrumar dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><img class="min-imagem-menu" src="../imagens/alterar.png"></button>
						<div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
							<button type="button" id="Deletar" class="dropdown-item" onclick="mostrar_coluna('Deletar', 'sumir_del', 'del');"><img class="min-imagem-menu" src="../imagens/alterar.png">Deletar</button>
						</div>
					</div>
				</li>
				<li class="nav-item active">
					<div class="dropdown">
						<button class="btn btn-background-arrumar dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><img class="min-imagem-menu" src="../imagens/lupa.png"></button>
						<div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
							<button type="button" class="dropdown-item" data-toggle="modal" data-target="#pesquisar_geral"><img class="min-imagem-menu" src="../imagens/lupa.png">Pesquisa</button>
							<button type="button" class="dropdown-item" data-toggle="modal" data-target="#pesquisar_por"><img class="min-imagem-menu" src="../imagens/lupa.png">Modelo</button>
							<button type="button" class="dropdown-item" data-toggle="modal" data-target="#pesquisar_por_descricao"><img class="min-imagem-menu" src="../imagens/lupa.png">Descricao</button>
							<button type="button" class="dropdown-item" data-toggle="modal" data-target="#pesquisar_setor"><img class="min-imagem-menu" src="../imagens/lupa.png">Setor</button>
						</div>
					</div>
				</li>
			<?php
			#Fim do conador
			}
			?>
			<li class="nav-item active">
				<button type="button" class="btn btn-background-arrumar" data-toggle="modal" data-target="#ajuda"><img class="min-imagem-menu" src="../imagens/ajuda.png"></button>
			</li>
		</ul>
	</div>
</nav>
