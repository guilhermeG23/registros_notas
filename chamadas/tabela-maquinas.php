<?php

include('../funcoes/tratamento-tabela.php');

$query = 'select Nota_Fiscal from Nota_Fiscal limit 1;';

$existe = mysqli_query($conexao_banco, $query);
$quatidade = mysqli_num_Rows($existe);
if($quatidade > 0) {
?>
	<table class="table tabela-visita table-bordered">
		<thead class="thead-light tabela-visita-head">
			<tr>
				<th>Nota</th>
				<th>Chave</th>
				<th>Data</th>
				<th>Setor</th>
				<th>Modelo</th>
				<th>Descricao</th>
				<th>View</th>
				<th class="tabela-visita-coluna" id="sumir_alt">Alterar</th>
				<th class="tabela-visita-coluna" id="sumir_del">Deletar</th>
			</tr>
		</thead>
		<tbody>
<?php
		mysqli_data_seek($query, 0);
		$query = "select * from vw_maquina;";
		$registros = mysqli_query($conexao_banco, $query);
		while($chamada=mysqli_fetch_array($registros)) {
?>
		<tr>
			<th><?=tratamento_nota($chamada["Nota"]);?></th>
			<th><?=$chamada["Chave"];?></th>
			<th><?=tratamento_data($chamada["Data"]);?></th>
			<th><?=$chamada["Setor"];?></th>
			<th><?=$chamada["Modelo"];?></th>
			<th><?=$chamada["Descricao"];?></th>
			<th>
				<form action="view.php" method="POST">
					<input type="hidden" value="<?=$chamada["Nota"];?>" name="visualizar" id="visualizar">
					<button type="submit" class="btn btn-info btn-tabela-dng">View</button>
				</form>
			</th>
			<th class="tabela-visita-coluna" name="alt">
				<form action="alterar.php" method="POST">
					<input type="hidden" value="<?=$chamada["Nota"];?>" name="alterar" id="alterar">
					<button type="submit" class="btn btn-warning btn-tabela-dng">Alterar</button>
				</form>
			</th>
			<th class="tabela-visita-coluna" name="del">
				<form action="deletar.php" method="POST">
					<input type="hidden" value="<?=$chamada["Nota"];?>" name="deletar" id="deletar">
					<button type="submit" class="btn btn-danger btn-tabela-dng">Deletar</button>
				</form>
			</th>
		</tr>
<?php
		}
		
		mysqli_data_seek($query, 0);
		$query = 'select * from vw_software;';
		$registros = mysqli_query($conexao_banco, $query);
		while($chamada=mysqli_fetch_array($registros)) {
?>
		<tr>
			<th><?=tratamento_nota($chamada["Nota"]);?></th>
			<th><?=$chamada["Chave"];?></th>
			<th><?=tratamento_data($chamada["Data"]);?></th>
			<th><?=$chamada["Setor"];?></th>
			<th><?=$chamada["Modelo"];?></th>
			<th><?=$chamada["Descricao"];?></th>
			<th>
				<form action="view.php" method="POST">
					<input type="hidden" value="<?=$chamada["Nota"];?>" name="visualizar" id="visualizar">
					<button type="submit" class="btn btn-info btn-tabela-dng">View</button>
				</form>
			</th>
			<th class="tabela-visita-coluna" name="alt">
				<form action="alterar.php" method="POST">
					<input type="hidden" value="<?=$chamada["Nota"];?>" name="alterar" id="alterar">
					<button type="submit" class="btn btn-warning btn-tabela-dng">Alterar</button>
				</form>
			</th>
			<th class="tabela-visita-coluna" name="del">
				<form action="deletar.php" method="POST">
					<input type="hidden" value="<?=$chamada["Nota"];?>" name="deletar" id="deletar">
					<button type="submit" class="btn btn-danger btn-tabela-dng">Deletar</button>
				</form>
			</th>
		</tr>
<?php
		}
?>
		</tbody>
	</table>
<?php
} else {
?>
	<h1>Nada Registrodo</h1>
<?php
}
?>
