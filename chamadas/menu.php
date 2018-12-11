<!--Navbar de menu nas paginas-->
<nav class="navbar navbar-expand-lg navbar-dark bg-dark justify-content-between">
	<a class="navbar-brand" href="index.php">Funcionários</a>
	<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
		<span class="navbar-toggler-icon"></span>
	</button>
	<div class="collapse navbar-collapse" id="navbarSupportedContent">
		<form class="form-inline my-2 my-lg-0" action="index.php" method="POST">
			<input class="form-control mr-sm-2 ajuste-tamanho-pesquisa" type="text" placeholder="Pesquisar" aria-label="Search" value="" name="pesquisar" maxlenght="60" required>
			<button class="btn btn-success ajuste-botao-pesquisa" type="submit">Pesquisar</button>
		</form>
	</div>
</nav>
