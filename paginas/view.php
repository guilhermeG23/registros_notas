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
$nota = $_POST["visualizar"];

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
			<th>Descricao</th>
		</tr>
	</thead>
<tbody>
<?php
		mysqli_data_seek($query, 0);
		$query = "select * from vw_maquina where Nota = '{$nota}';";
		$registros = mysqli_query($conexao_banco, $query);
		while($chamada=mysqli_fetch_array($registros)) {
?>
	<tr>
		<th><?=$chamada["Setor"];?></th>
		<th><?=$chamada["Modelo"];?></th>
		<th><?=$chamada["Descricao"];?></th>
	</tr>
<?php
}
		$query = "select * from vw_software where Nota = '{$nota}';";
		$registros = mysqli_query($conexao_banco, $query);
		while($chamada=mysqli_fetch_array($registros)) {
?>
	<tr>
		<th><?=$chamada["Setor"];?></th>
		<th><?=$chamada["Modelo"];?></th>
		<th><?=$chamada["Descricao"];?></th>
	</tr>
<?php
}
?>

</tbody>
</table>
<?php
$query = "select Nota_PDF from Nota_Fiscal where Nota_Fiscal = '{$nota}';";
$valor = mysqli_query($conexao_banco, $query);
while($chamada=mysqli_fetch_array($valor)) {
	header("Content-type: pdf");
?>
<a href="data:application/pdf;base64,<?php echo base64_encode($chamada["Nota_PDF"]);?>" download>Download</a>
<?php
	}
?>
</div>

<?php
include ('../chamadas/pagina-fim-corpo.php');
