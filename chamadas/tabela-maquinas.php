<?php
#Iniciando a sessao para poder destruir qualquer session que esteja memoria, isso facilita a movimentacao entre as notas
session_start();
session_destroy();
#Executando a query pos tratamento de entrada
$existe = mysqli_query($conexao_banco, $query);
#Contador
$quatidade = mysqli_num_Rows($existe);
#Decisao de pesquisa
if($quatidade > 0) {

	if($titulo_pesquisa) {
?>
	<h1 class="display-4 titulo-h1">Resultados da pesquisa...</h1>
<?php
	}
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
		#Zerando a query
		mysqli_data_seek($query, 0);
		#Executando novamente a query
		$registros = mysqli_query($conexao_banco, $query);
		#Executando o while para os registros
		while($chamada=mysqli_fetch_array($registros)) {
?>
		<tr>
			<th><?=tratamento_nota($chamada["Nota"]);?></th>
			<th name="sumir-campo-tabela"><?=tratamento_min_chave($chamada["Chave"]);?></th>
			<th class="tabela-visita-coluna" name="key"><?=tratamento_chave($chamada["Chave"]);?></th>
			<th class="tabela-visita-coluna" name="cnpj_empresa"><?=tratamento_cnpj($chamada["CNPJ"]);?></th>
			<th><?=$chamada["Empresa"];?></th>
			<th><?=tratamento_data($chamada["Data"]);?></th>
			<th class="tabela-visita-coluna" name="relacao"><?=$chamada["Relacao"];?></th>
			<th><?=$chamada["Setor"];?></th>
			<th class="tabela-visita-coluna" name="funcionario"><?=$chamada["Funcionario"];?></th>
			<th>
			<?php
				//<a class="btn btn-primary btn-tabela-dng" href="data:application/pdf;base64,<?=base64_encode($chamada["PDF"]);?/>" target="_blank">Nota</a>
				#Select para carregar as imagens do modelos
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
				<form action="view_pdf.php" method="POST" target="_blank">
					<input type="hidden" value="<?=$chamada["Nota"];?>" name="view" id="view">
					<button type="submit" class="btn btn-primary btn-tabela-dng">Nota</button>
				</form>
			</th>
			<th class="tabela-visita-coluna" name="altN">
				<form action="alterar.php" method="POST">
					<input type="hidden" value="<?=$chamada["Nota"];?>" name="alterar" id="alterar">
					<button type="submit" class="btn btn-warning btn-tabela-dng">Nota</button>
				</form>
			</th>
			<th class="tabela-visita-coluna" name="altP">
				<form action="alterar_produtos.php" method="POST">
					<input type="hidden" value="<?=$chamada["Nota"];?>" name="alterar" id="alterar">
					<button type="submit" class="btn btn-warning btn-tabela-dng">Item</button>
				</form>
			</th>
			<th class="tabela-visita-coluna" name="del">
				<button type="button" class="btn btn-danger btn-tabela-dng" data-toggle="modal" data-target="#modal<?=$chamada["Nota"];?>">Deletar</button>
			</th>
		</tr>
<?php
		#Incluir modal para deletar a nota
		include('modal-deletar-nota.php');
		}
?>
		</tbody>
	</table>
<?php
} else {
	#Incluir temporizador para caso a pagina nao tenha nenhum resultado
	include('temporizador_retorno.html');
}
?>
