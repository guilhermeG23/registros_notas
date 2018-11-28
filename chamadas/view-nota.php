<div class="jumbotron bg-white text-esquerda borda-jumbo">
<?php
#carregar session
session_start();
if(isset($_SESSION["nota_atual"])) {
	$nota = $_SESSION["nota_atual"];
} else {
	$nota = $_POST["visualizar"];
}	
$_SESSION["nota_atual"] = $nota;

#Comecar a carregar a pagina
$query = "select Nota, Chave, Data, CNPJ, Empresa, Setor, Relacao_Setor.Relacao as 'RD_Nome', Funcionario from vw_tabela_produtos inner join Relacao_Setor on vw_tabela_produtos.RD = Relacao_Setor.ID_Relacao where Nota = '{$nota}';";
$registros = mysqli_query($conexao_banco, $query);
while($chamada=mysqli_fetch_array($registros)) {
	$pdf = "select Nota_PDF from Nota_Fiscal where Nota_Fiscal = '{$nota}';";
	$pdf = mysqli_query($conexao_banco, $pdf);
	while($pdf_resultado=mysqli_fetch_array($pdf)) {
		$nota_pdf = $pdf_resultado["Nota_PDF"];
	}
?>
	<table>
		<tr><th><p>Nota fiscal: <?=tratamento_nota($chamada["Nota"]);?></p></th></tr>
		<tr><th><p>Chave: <?=tratamento_chave($chamada["Chave"]);?></p></th></tr>
		<tr><th><p>Emissao: <?=tratamento_data($chamada["Data"]);?></p></th></tr>
		<tr><th><p>CNPJ: <?=tratamento_cnpj($chamada["CNPJ"]);?></p></th></tr>
		<tr><th><p>Empresa: <?=$chamada["Empresa"];?></p></th></tr>
		<tr><th><p>Relacao destino: <?=$chamada["RD_Nome"];?></p></th></tr>
		<tr><th><p>Setor destino: <?=$chamada["Setor"];?></p></th></tr>
		<tr><th><p>Funcionario destino: <?=$chamada["Funcionario"];?></p></th></tr>
		<tr><th><div class="left-div">
			<form action="alterar.php" method="POST" style="margin-right: 5px;">
				<input type="hidden" id="alterar" name="alterar" value="<?=$chamada["Nota"];?>" required>
				<button type="submit" class="btn btn-warning btn-margin-bottom btn-alterar-nota">Alterar Nota</button>
			</form>	
			<form action="alterar_produtos.php" method="POST" style="margin-right: 5px;">
				<input type="hidden" id="alterar" name="alterar" value="<?=$chamada["Nota"];?>" required>
				<button type="submit" class="btn btn-warning btn-margin-bottom btn-alterar-nota">Alterar Produtos</button>
			</form>
			<form action="view_pdf.php" method="POST" target="_blank" style="margin-right: 5px;">
				<input type="hidden" name="view" id="view" value="<?=$chamada["Nota"];?>" required>
				<button type="submit" class="btn btn-primary btn-margin-bottom btn-alterar-nota">Visualizar Nota</button>
			</form>
			<a class="btn btn-primary btn-margin-bottom" href="data:application/pdf;base64,<?=base64_encode($nota_pdf);?>" download>Download da Nota</a>
			<button type="button" class="btn btn-danger btn-margin-bottom" data-toggle="modal" data-target="#modal<?=$chamada["Nota"];?>">Deletar a Nota</button>
			</div>
		</th></tr>
	</table>
<?php
	include('modal-deletar-nota.php');
}
?>
<table class="table tabela-visita table-bordered">
	<thead class="thead-light tabela-visita-head">
		<tr>
			<th>Relacao Atual</th>
			<th>Setor Atual</th>
			<th>Modelo</th>
			<th>Marca</th>
			<th>Descricao</th>
			<th>Serial \ Key</th>
		</tr>
	</thead>
	<tbody>
<?php
	mysqli_data_seek($query, 0);
	$query = "select Relacao, Setor, Modelo, Marca, Descricao, vw_tabela_view.Key from vw_tabela_view inner join Relacao_Setor on vw_tabela_view.RA = Relacao_Setor.ID_Relacao where NV = '{$nota}';";
	$registros = mysqli_query($conexao_banco, $query);
	while($chamada=mysqli_fetch_array($registros)) {
?>
		<tr>
			<th><?=$chamada["Relacao"];?></th>
			<th><?=$chamada["Setor"];?></th>
			<th>
				<?=modelo_img($chamada["Modelo"]);?>
				<?=$chamada["Modelo"];?>
			</th>
			<th><?=$chamada["Marca"];?></th>
			<th><?=$chamada["Descricao"];?></th>
			<th><?=tratamento_chave_soft($chamada["Key"]);?></th>
		</tr>
<?php
	}
?>
	</tbody>
</table>
<form action="index.php" method="POST" style="text-align: right;">
	<button type="submit" class="btn btn-danger btn-alterar-nota">Retornar a tabela principal</button>
</form>	
</div>
