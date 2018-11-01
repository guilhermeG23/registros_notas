<!--Menu da pagina-->					
<nav class="navbar navbar-expand-lg navbar-light bg-light justify-content-between nav-arrumando-index-sobrepoe arrumando-border">
	<a class="navbar-brand" href="index.php"><img class="min-imagem-menu" src="../imagens/ico.ico"></a>
	<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
		<span class="navbar-toggler-icon"></span>
	</button>
	<div class="collapse navbar-collapse" id="navbarSupportedContent">
		<ul class="navbar-nav mr-auto">
			<li class="nav-item active">
				<div class="dropdown">
					<button class="btn btn-background-arrumar dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><img class="min-imagem-menu" src="../imagens/registro.png"></button>
						<div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
						<button type="button" class="dropdown-item" data-toggle="modal" data-target="#registrar_computador"><img class="min-imagem-menu" src="../imagens/registro.png">Nota</button>
					</div>
				</div>
			</li>
			<?php
			if(!isset($query)) {
				$query = "select Nota_Fiscal from Nota_Fiscal;";
			}
			$contador = mysqli_query($conexao_banco, $query);
			$contador = mysqli_num_rows($contador);
			if($contador > 0) {
			?>
			<li class="nav-item active">
				<div class="dropdown">
					<button class="btn btn-background-arrumar dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><img class="min-imagem-menu" src="../imagens/alterar.png"></button>
					<div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
						<button type="button" id="chave_alterar_js" class="dropdown-item" onclick="mostrar_coluna_chave('sumir_chave', 'key');"><img class="min-imagem-menu" src="../imagens/alterar.png">Chave Completa</button>
						<button type="button" id="CNPJ" class="dropdown-item" onclick="mostrar_coluna('CNPJ', 'sumir_cnpj', 'cnpj');"><img class="min-imagem-menu" src="../imagens/alterar.png">CNPJ</button>
						<button type="button" id="Alterar" class="dropdown-item" onclick="mostrar_coluna('Alterar', 'sumir_alt', 'alt');"><img class="min-imagem-menu" src="../imagens/alterar.png">Alterar</button>
						<button type="button" id="Relacao" class="dropdown-item" onclick="mostrar_coluna('Relacao', 'sumir_relacao', 'relacao');"><img class="min-imagem-menu" src="../imagens/alterar.png">Relacao</button>
						<button type="button" id="Funcionario" class="dropdown-item" onclick="mostrar_coluna('Funcionario', 'sumir_funcionario', 'funcionario');"><img class="min-imagem-menu" src="../imagens/alterar.png">Funcionario</button>
						<button type="button" id="Download" class="dropdown-item" onclick="mostrar_coluna('Download', 'sumir_down', 'down');"><img class="min-imagem-menu" src="../imagens/alterar.png">Download</button>
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
						<button type="button" class="dropdown-item" data-toggle="modal" data-target="#pesquisar_setor"><img class="min-imagem-menu" src="../imagens/setor.png">Setor</button>
					</div>
				</div>
			</li>
			<?php
			}
			?>
			<li class="nav-item active">
				<button type="button" class="btn btn-background-arrumar" data-toggle="modal" data-target="#ajuda"><img class="min-imagem-menu" src="../imagens/ajuda.png"></button>
			</li>
		</ul>
	</div>
</nav>
