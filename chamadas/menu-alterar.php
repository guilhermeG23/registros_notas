<!--Menu da pagina-->					
<nav class="navbar navbar-expand-lg navbar-light bg-light justify-content-between nav-arrumando-index-sobrepoe arrumando-border">
	<a class="navbar-brand" href="index.php"><img class="min-imagem-menu" src="../imagens/ico.ico"></a>
	<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
		<span class="navbar-toggler-icon"></span>
	</button>
	<div class="collapse navbar-collapse" id="navbarSupportedContent">
		<ul class="navbar-nav mr-auto">
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
