<?php
$existe = mysqli_query($conexao_banco, $query);
$quatidade = mysqli_num_Rows($existe);
if($quatidade > 0) {
?>
	<table class="table tabela-visita table-bordered">
		<thead class="thead-light tabela-visita-head">
			<tr>
				<th>Nota</th>
				<th id="sumir-campo-cabecalho">Chave (28-44)</th>
				<th class="tabela-visita-coluna" id="sumir_chave">Chave completa</th>
				<th class="tabela-visita-coluna" id="sumir_cnpj">CNPJ</th>
				<th>Empresa</th>
				<th>Data</th>
				<th class="tabela-visita-coluna" id="sumir_relacao">Relacao Destino</th>
				<th>Setor Destino</th>
				<th class="tabela-visita-coluna" id="sumir_funcionario">Funcionario Destino</th>
				<th>Registrados</th>
				<th>View</th>
				<th class="tabela-visita-coluna" id="sumir_down">Nota PDF</th>
				<th class="tabela-visita-coluna" id="sumir_altN">Alterar Notas</th>
				<th class="tabela-visita-coluna" id="sumir_altP">Alterar Itens</th>
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
			<th><?=tratamento_nota($chamada["Nota"]);?></th>
			<th name="sumir-campo-tabela"><?=tratamento_min_chave($chamada["Chave"]);?></th>
			<th class="tabela-visita-coluna" name="key"><?=tratamento_chave($chamada["Chave"]);?></th>
			<th class="tabela-visita-coluna" name="cnpj"><?=tratamento_cnpj($chamada["CNPJ"]);?></th>
			<th><?=$chamada["Empresa"];?></th>
			<th><?=tratamento_data($chamada["Data"]);?></th>
			<th class="tabela-visita-coluna" name="relacao"><?=$chamada["Relacao"];?></th>
			<th><?=$chamada["Setor"];?></th>
			<th class="tabela-visita-coluna" name="funcionario"><?=$chamada["Funcionario"];?></th>
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
				<a class="btn btn-primary btn-tabela-dng" href="data:application/pdf;base64,<?=base64_encode($chamada["PDF"]);?>" target="_blank">Nota</a>
			</th>
			<th class="tabela-visita-coluna" name="altN">
				<form action="alterar.php" method="POST">
					<input type="hidden" value="<?=$chamada["Nota"];?>" name="alterar" id="alterar">
					<button type="submit" class="btn btn-warning btn-tabela-dng">Alterar</button>
				</form>
			</th>
			<th class="tabela-visita-coluna" name="altP">
				<form action="alterar_produtos.php" method="POST">
					<input type="hidden" value="<?=$chamada["Nota"];?>" name="alterar" id="alterar">
					<button type="submit" class="btn btn-warning btn-tabela-dng">Alterar</button>
				</form>
			</th>
			<th class="tabela-visita-coluna" name="del">
				<button type="button" class="btn btn-danger btn-tabela-dng" data-toggle="modal" data-target="#modal<?=$chamada["Nota"];?>">Deletar</button>
			</th>
		</tr>
<?php
		include('modal-deletar-nota.php');
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
