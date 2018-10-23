<?php
$existe = mysqli_query($conexao_banco, $query);
$quatidade = mysqli_num_Rows($existe);
if($quatidade > 0) {
?>
	<table class="table tabela-visita table-bordered">
		<thead class="thead-light tabela-visita-head">
			<tr>
				<th>Nota</th>
				<th id="sumir-campo-cabecalho">Chave</th>
				<th class="tabela-visita-coluna" id="sumir_chave">Chave</th>
				<th>Empresa</th>
				<th>Data</th>
				<th>Setor destino</th>
				<th>Registrados</th>
				<th>View</th>
				<th class="tabela-visita-coluna" id="sumir_down">Download Nota</th>
				<th class="tabela-visita-coluna" id="sumir_alt">Alterar</th>
				<th class="tabela-visita-coluna" id="sumir_del">Deletar</th>
			</tr>
		</thead>
		<tbody>
<?php
		mysqli_data_seek($query, 0);
		$registros = mysqli_query($conexao_banco, $query);
		while($chamada=mysqli_fetch_array($registros)) {
?>
		<tr>
			<th><?=$chamada["Nota"];?></th>
			<th name="sumir-campo-tabela"><?=substr($chamada["Chave"], 28, 16);?></th>
			<th class="tabela-visita-coluna" name="key">
				<?=$chamada["Chave"];?>
			</th>
			<th><?=$chamada["Empresa"];?></th>
			<th><?=tratamento_data($chamada["Data"]);?></th>
			<th><?=$chamada["Setor"];?></th>
			<th>
			<?php
				$produtos = "select Modelos.Modelo as 'Modelo' from Produto inner join Modelos on Produto.ID_Ex_Modelo = Modelos.ID_Modelo where Produto.ID_Nota = '{$chamada["Nota"]}';";
				$produtos = mysqli_query($conexao_banco, $produtos);
				while($produto=mysqli_fetch_array($produtos)) {
					echo modelo_img($produto["Modelo"]);
				}
			?>
			</th>
			<th>
				<form action="view.php" method="POST">
					<input type="hidden" value="<?=$chamada["Nota"];?>" name="visualizar" id="visualizar">
					<button type="submit" class="btn btn-info btn-tabela-dng">View</button>
				</form>
			</th>
			<th class="tabela-visita-coluna" name="down">
				<a class="btn btn-primary btn-tabela-dng" href="data:application/pdf;base64,<?php echo base64_encode($chamada["PDF"]);?>" download>Download</a>
			</th>
			<th class="tabela-visita-coluna" name="alt">
				<form action="alterar.php" method="POST">
					<input type="hidden" value="<?=$chamada["Nota"];?>" name="alterar" id="alterar">
					<button type="submit" class="btn btn-warning btn-tabela-dng">Alterar</button>
				</form>
			</th>
			<th class="tabela-visita-coluna" name="del">
				<button type="button" class="btn btn-danger btn-tabela-dng" data-toggle="modal" data-target="#modal<?=$chamada["Nota"];?>">Deletar</button>
			</th>
		</tr>

		<div class="modal fade bd-example-modal-lg" id="modal<?=$chamada["Nota"];?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
		<div class="modal-dialog modal-lg" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalLabel">Deletar</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				</div>
				<form action="deletar_nota.php" method="POST" enctype="multipart/form-data">
				<div class="modal-body">
					<div class="container regular-altura">
						<div class="form-group">
							<input type="hidden" value="<?=$chamada["Nota"];?>" name="deletar" id="deletar">
							<p>Tem certeza que quer deletar esta nota e todos os equipamentos registrados dela?</p>
							<p>Nota: <?=$chamada["Nota"];?></p>
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
?>
		</tbody>
	</table>
<?php
} else {
?>
	<h1>Nada Registrado</h1>
<?php
}
?>
