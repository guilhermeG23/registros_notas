<?php
$query = 'select * from Maquina inner join Nota_Fiscal on Maquina.Nota_Fiscal_Ex = Nota_Fiscal.Nota_Fiscal;';
$valor = mysqli_query($conexao_banco, $query);
?>
<h1 class="titulo-tabela">Tabela Maquinas</h1>
<table class="table tabela-visita table-bordered">
	<thead class="thead-light tabela-visita-head">
		<tr>
			<th>Maquina_Serial</th>
			<th>Nota_Fiscal_Ex</th>
			<th>Download</th>
		</tr>
	</thead>
	<tbody>
<?php
	$valor = mysqli_query($conexao_banco, $query);
	while($chamada=mysqli_fetch_array($valor)) {
		header("Content-type: pdf");
?>
	<tr>
		<th><?=$chamada["Maquina_Serial"];?></th>
		<th><?=$chamada["Nota_Fiscal_Ex"];?></th>
		<th><a href="data:application/pdf;base64,<?php echo base64_encode($chamada["Nota_PDF"]);?>" download><?=$chamada["Nota_Nome"];?></a></th>
	</tr>
<?php
	}
?>
	</tbody>
</table>

<?php
$query = 'select * from vw_software';
$valor = mysqli_query($conexao_banco, $query);
?>
<h1 class="titulo-tabela">Tabela Windows / Office</h1>
<table class="table tabela-visita table-bordered">
	<thead class="thead-light tabela-visita-head">
		<tr>
			<th>Nota</th>
			<th>Versao</th>
			<th>Setor</th>
		</tr>
	</thead>
	<tbody>
<?php
	$valor = mysqli_query($conexao_banco, $query);
	while($chamada=mysqli_fetch_array($valor)) {
?>
	<tr>
		<th><?=$chamada["Nota"];?></th>
		<th><?=$chamada["Versao"];?></th>
		<th><?=$chamada["Tipo"];?></th>
	</tr>
<?php
	}
?>
	</tbody>
</table>

<?php
