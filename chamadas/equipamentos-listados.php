<?php
#session
#Confirma se tem um session para carregar a pagina
session_start();
if(isset($_SESSION["nota_atual"])) {
	$alterar = $_SESSION["nota_atual"];
} else {
	$alterar = $_POST["alterar"];
}	
#Atribuir valor a um session
$_SESSION["nota_atual"] = $alterar;

#Pesquisar
$query_nota = "select * from vw_preencher_tabela where Nota = '{$alterar}' group by Nota limit 1;";
$query = "select * from vw_preencher_produto where Nota = '{$alterar}';";

#Executando as pesquisar e atribuindo a uma variavel
$pesquisar = mysqli_query($conexao_banco, $query_nota);
$pode_deletar = mysqli_query($conexao_banco, $query);

#Contador
$contador_delete = mysqli_num_rows($pode_deletar);

#While para preencher os dados
while($preencher=mysqli_fetch_array($pesquisar)) {
?>
<div class="" role="document">
	<div class="modal-content">
		<div class="modal-header">
			<h5 class="modal-title" id="exampleModalLabel">Alterar produtos da nota: <?=tratamento_nota($alterar);?></h5>
		</div>
			<div class="form-group" style="margin-bottom: 0px;">
				<table class="table tabela-visita table-bordered" style="margin-bottom: 0px;">
					<thead class="thead-light tabela-visita-head">
						<tr>
							<th>Relacao Atual</th>
							<th>Setor Atual</th>
							<th>Modelo</th>
							<th>Marca</th>
							<th>Descricao</th>
							<th>Serial \ Key</th>
							<th>Alterar</th>
<?php
							#Decisao se pode ou nao deletar o conteudo de uma nota
							if($contador_delete > 1) {
?>	
							<th class="tabela-visita-coluna" id="sumir_del">Deletar</th>
<?php
							}
?>
						</tr>
					</thead>
					<tbody>
<?php
					#Preencher a tabela com os conteudos da nota
					$registros = mysqli_query($conexao_banco, $query);
					while($chamada=mysqli_fetch_array($registros)) {
?>
						<tr>
							<th><?=$chamada["RelacaoAtual"];?></th>
							<th><?=$chamada["Setor"];?></th>
							<th><?=modelo_img($chamada["Modelo"]);?><?=$chamada["Modelo"];?></th>
							<th><?=$chamada["Marca"];?></th>
							<th><?=$chamada["Descricao"];?></th>
							<th class="upper_tabela"><?=tratamento_chave_soft($chamada["Chave"]);?></th>
							<th><form action="alterar_lista_produtos.php" method="POST">
								<input type="hidden" id="alterar" name="alterar" value="<?=$chamada["ID"];?>" required>
								<button type="submit" class="btn btn-warning btn-margin-bottom btn-alterar-nota btn-tabela-dng">Alterar</button>
							</form></th>
<?php
							#Decisao para carregar o delete do equipamento
							if($contador_delete > 1) {
?>
								<th class="tabela-visita-coluna" name="del"><button type="button" class="btn btn-danger btn-tabela-dng" data-toggle="modal" data-target="#modal<?=$chamada["ID"];?>">Deletar</button></th>
<?php						
							}						
?>
						</tr>
<?php	
						#incluir delete do equipamento
						include('modal-deletar-produto.php');
					}
?>
					</tbody>	
				</table>	
			</div>
		<div class="modal-footer">
			<a href="view.php" class="btn btn-danger">Retornar ao view</a>
			<form action="adicionar_lista_produtos.php" method="POST" style="margin-right: 5px;">
				<input type="hidden" id="adicionar" name="adicionar" value="<?=$alterar;?>" required>
				<button type="submit" class="btn btn-warning">Adicionar Produtos</button>
			</form>	
		</div>
	</div>
</div>
<?php
}
?>
