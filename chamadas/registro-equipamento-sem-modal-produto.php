<?php
#Entrada do valor
$alterar = $_POST['alterar'];
#Query para pesquisa
$query_nota = "select * from vw_preencher_produto where ID = '{$alterar}';";
#Executando a query
$pesquisar = mysqli_query($conexao_banco, $query_nota);
#While para preencher os campos
while($preencher=mysqli_fetch_array($pesquisar)) {
?>
<form action="cadastrar_alteracao_produto.php" method="POST" enctype="multipart/form-data" onSubmit="return alerta();">
	<div class="modal-dialog modal-lg" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">Alterar nota: <?=tratamento_nota($preencher["Nota"]);?></h5>
				<input type="hidden" class="form-control" onkeyup="limitarInput(this,100)" value="<?=$preencher["Nota"];?>" id="Nota" name="Nota" maxlength="100" autocomplete="off" required>
			</div>
			<div class="modal-body">
				<div class="container regular-altura">
					<div class="form-group">
						<table class="table">			
							<tr>
								<td><label class="col-form-label">Id Produto: </label></td>
								<td colspan="6"><input type="text" class="form-control" onkeyup="limitarInput(this,11)"  value="<?=$preencher['ID'];?>" id="ID" name="ID" maxlength="11" placeholder="EX: N ID" autocomplete="off" required readonly></td>
							</tr>
							<tr>
								<td><label class="col-form-label">Equipamento: </label></td>
								<td colspan="6"><select class="form-control" id="equipamento" name="equipamento" autocomplete="off" required>
									<option value="<?=$preencher["ID_Modelo"];?>" selected="seleted"><?=$preencher["Modelo"]?></option>
									<?php
									#Carregando o select de modelos
									$query = "select * from Modelos order by ID_Modelo asc;";
									$setores = mysqli_query($conexao_banco, $query);
									while($chamada = mysqli_fetch_array($setores)) {
									?>
									<option value="<?=$chamada['ID_Modelo']?>"><?=$chamada['Modelo'];?></option>
									<?php
									}
									?>
								</select></td>	
							</tr>
							<tr>
								<td><label class="col-form-label">Marca: </label></td>
								<td colspan="6"><select class="form-control" id="marca" name="marca" autocomplete="off" required>
								<option value="<?=$preencher["ID_Marca"]?>" selected="selected"><?=$preencher["Marca"];?></option>
									<?php
									#Carregando o select de marcas
									$query = "select * from Marcas order by Marca asc;";
									$setores = mysqli_query($conexao_banco, $query);
									while($chamada = mysqli_fetch_array($setores)) {
									?>
									<option value="<?=$chamada['ID_Marca']?>"><?=$chamada['Marca'];?></option>
									<?php
									}
									?>
								</select></td>
							</tr>
							<tr>
								<td><label class="col-form-label">Descricao: </label></td>
								<td colspan="6"><input type="text" class="form-control" onkeyup="limitarInput(this,100)" value="<?=$preencher['Descricao'];?>" id="descricao" name="descricao" maxlength="100" placeholder="EX: Empresa da nota" autocomplete="off" required>		
							</tr>
							<tr>
								<td><label class="col-form-label">Serial: </label></td>
								<td colspan="6"><input type="text" class="form-control" onkeyup="limitarInput(this, 54)" value="<?=$preencher['Chave']?>" id="serial" name="serial" maxlength="54" placeholder="Ex: Serial" autocomplete="off"></td>
							</tr>
							<tr>
								<td><label class="col-form-label">Relacao: </label></td>
								<td colspan="6"><select class="form-control" id="relacao" name="relacao" required>
								<option value="<?=$preencher['RA'];?>"><?=$preencher['RelacaoAtual'];?></option>
										<?php
										#Carregando o select de relacao de setores
										$query = "select * from Relacao_Setor order by ID_Relacao asc;";
										$setores = mysqli_query($conexao_banco, $query);
										while($chamada = mysqli_fetch_array($setores)) {
										?>
										<option value="<?=$chamada['ID_Relacao']?>"><?=$chamada['Relacao'];?></option>
										<?php
										}
										?>
								</select></td>
							</tr>
							<tr>
								<td><label class="col-form-label">Setor: </label></td>
								<td colspan="6"><select class="form-control" id="setor" name="setor" required>
								<option value="<?=$preencher["SA"];?>"><?=$preencher["Setor"];?></option>
										<?php
										#Carregando o select de setores
										$query = "select * from Setor order by ID_Relacao asc;";
										$setores = mysqli_query($conexao_banco, $query);
										while($chamada = mysqli_fetch_array($setores)) {
										?>
										<option value="<?=$chamada['Centro_custo']?>"><?=$chamada['Setor'];?></option>
										<?php
										}
										?>
								</select></td>
							</tr>
							<tr>
								<td><label class="col-form-label">Funcionario: </label></td>
								<td colspan="6"><input type="text" class="form-control" onkeyup="limitarInput(this, 100)" maxlength="100" value="<?=$preencher["Funcionario"];?>" id="funcionario" name="funcionario" placeholder="Ex: Nome" autocomplete="off" required></td>
							</tr>
						</table>
					</div>
				</div>
				<div class="modal-footer">
					<a href="javascript:history.back(1)" class="btn btn-danger">Cancelar</a>
					<button type="submit" class="btn btn-success">Alterar</button>
				</div>
			</div>
		</div>
	</div>
</form>
<?php
}
?>
