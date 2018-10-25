<div class="jumbotron text-esquerda">
<?php
$nota = $_POST["visualizar"];
$query = "select Nota, Chave, Data, CNPJ, Empresa, Setor, Relacao_Setor.Relacao as 'RD_Nome' from vw_tabela_produtos inner join Relacao_Setor on vw_tabela_produtos.RD = Relacao_Setor.ID_Relacao where Nota = '{$nota}';";
$registros = mysqli_query($conexao_banco, $query);
while($chamada=mysqli_fetch_array($registros)) {
	$pdf = "select Nota_PDF from Nota_Fiscal where Nota_Fiscal = '{$nota}';";
	$pdf = mysqli_query($conexao_banco, $pdf);
	while($pdf_resultado=mysqli_fetch_array($pdf)) {
		$nota_pdf = $pdf_resultado["Nota_PDF"];
	}
?>
	<p>Nota fiscal: <?=$chamada["Nota"];?></p>	
	<p>Chave: <?=$chamada["Chave"];?></p>	
	<p>Emissao: <?=tratamento_data($chamada["Data"]);?></p>	
	<p>CNPJ: <?=$chamada["CNPJ"];?></p>	
	<p>Empresa: <?=$chamada["Empresa"];?></p>	
	<p>Relacao destino: <?=$chamada["RD_Nome"];?></p>
	<p>Setor destino: <?=$chamada["Setor"];?></p>

	<div class="left-div">	
		<a class="btn btn-primary btn-margin-bottom" href="data:application/pdf;base64,<?php echo base64_encode($nota_pdf);?>" download>Download da Nota</a>
		<button type="button" class="btn btn-danger btn-margin-bottom" data-toggle="modal" data-target="#modal<?=$chamada["Nota"];?>">Deletar a Nota</button>
	</div>
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
			<th><?php
				$key = $chamada["Key"];
				if(strlen($key) > 0) {
					echo $key;
				} else {
					echo "X";
				}
			?></th>
		</tr>
<?php
}
?>
</tbody>
</table>
</div>
