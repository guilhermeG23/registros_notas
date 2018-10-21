<?php
include ('../banco/banco.php');
include ('../chamadas/cabecalho.php');
include ('../chamadas/java-script-ex.php');
include ('../chamadas/menu.php');
include ('../chamadas/registro-equipamento-modal.php');
include ('../chamadas/registro-funcionario-modal.php');
include ('../chamadas/registro-setor-modal.php');
include ('../chamadas/pesquisar-geral-modal.php');
include ('../chamadas/pesquisar-setor-modal.php');
include ('../chamadas/pesquisar-modelo-modal.php');
include ('../chamadas/ajuda.php');
include ('../chamadas/barra-pesquisa.php');
include ('../chamadas/pagina-corpo.php');
?>
<div class="jumbotron" style="text-align: left;">
<?php
$nota = $_POST["alterar"];
$query = "select * from Nota_Fiscal where Nota_Fiscal = '{$nota}';";
$registros = mysqli_query($conexao_banco, $query);
while($chamada=mysqli_fetch_array($registros)) {
?>
	<p>Nota fiscal: <?=$chamada["Nota_Fiscal"];?></p>	
	<p>Chave: <?=$chamada["Chave_Acesso"];?></p>	
	<p>Emissao: <?=$chamada["Emissao"];?></p>	
	<p>Empresa: <?=$chamada["Empresa"];?></p>	

<?php
}
?>
<table class="table tabela-visita table-bordered">
	<thead class="thead-light tabela-visita-head">
		<tr>
			<th>Setor</th>
			<th>Modelo</th>
			<th>Marca</th>
			<th>Descricao</th>
			<th>Apagar produto</th>
		</tr>
	</thead>
	<tbody>
<?php
		$query = "select * from vw_tabela_produtos where Nota = '{$nota}';";
		$registros = mysqli_query($conexao_banco, $query);
		while($chamada=mysqli_fetch_array($registros)) {
?>
	<tr>
		<th><?=$chamada["Setor"];?></th>
		<th><?=$chamada["Modelo"];?></th>
		<th><?=$chamada["Marca"];?></th>
		<th><?=$chamada["Descricao"];?></th>
		<th>
			<button type="button" class="btn btn-danger btn-tabela-dng" data-toggle="modal" data-target="#modal<?=$chamada["ID_Produto"];?>">Deletar</button>
		</th>
	</tr>
<?php
}
?>
</tbody>
</table>
<?php
	mysqli_data_seek($query, 0);
	$query = "select * from vw_tabela_produtos where Nota = '{$nota}';";
	$registros = mysqli_query($conexao_banco, $query);
	while($chamada=mysqli_fetch_array($registros)) {
?>
		<div class="modal fade bd-example-modal-lg" id="modal<?=$chamada["ID_Produto"];?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
		<div class="modal-dialog modal-lg" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalLabel">Deletar</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				</div>
				<form action="deletar_produto.php" method="POST" enctype="multipart/form-data">
				<div class="modal-body">
					<div class="container regular-altura">
						<div class="form-group">
							<input type="hidden" value="<?=$chamada["ID_Produto"];?>" name="deletar" id="deletar">
							<p>Tem certeza que quer deletar esta nota e todos os equipamentos registrados dela?</p>
							<p>Descrição: <?=$chamada["Descricao"];?></p>
						</div>
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-danger" data-dismiss="modal">Não</button>
						<button type="submit" class="btn btn-success">Sim</button>
					</div>
				</div>
				</form>	
			</div>
		</div>
		</div>
<?php	
}
$query = "select Nota_PDF from Nota_Fiscal where Nota_Fiscal = '{$nota}';";
$valor = mysqli_query($conexao_banco, $query);
while($chamada=mysqli_fetch_array($valor)) {
?>
<a class="btn btn-primary" href="data:application/pdf;base64,<?php echo base64_encode($chamada["Nota_PDF"]);?>" download>Download</a>
<?php
	}
?>
</div>
</div>

<?php
include ('../chamadas/pagina-fim-corpo.php');
