<?php
$descricao = $_POST['descricao'];

$query = "select * from vw_tabela_view inner join Relacao_Setor on vw_tabela_view.RA = Relacao_Setor.ID_Relacao where Descricao like '%{$descricao}%';";

$valor = mysqli_num_rows(mysqli_query($conexao_banco, $query));
if($valor > 0) {
?>
<h1 class="display-4 titulo-h1">Resultados da pesquisa...</h1>
<div class="" role="document">
	<div class="modal-content">
		<div class="form-group" style="margin-bottom: 0px;">
			<table class="table tabela-visita table-bordered" style="margin-bottom: 0px;">
				<thead class="thead-light tabela-visita-head">
					<tr>
						<th>Nota Fiscal</th>
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
				$registros = mysqli_query($conexao_banco, $query);
				while($chamada=mysqli_fetch_array($registros)) {
?>
					<tr>
						<th><?=$chamada["NV"];?></th>
						<th><?=$chamada["Relacao"];?></th>
						<th><?=$chamada["Setor"];?></th>
						<th><?=modelo_img($chamada["Modelo"]);?><?=$chamada["Modelo"];?></th>
						<th><?=$chamada["Marca"];?></th>
						<th><?=$chamada["Descricao"];?></th>
						<th class="upper_tabela"><?=tratamento_chave_soft($chamada["Chave"]);?></th>
					</tr>
				<?php
			}
?>
</tbody>	
</table>	
<?php
} else {
	include('temporizador_retorno.html');
}
?>
			</div>
		</div>
	</div>
</div>

