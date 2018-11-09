<?php
$adicionar = $_POST['adicionar'];
$query_nota = "select * from Produto where ID_Nota = '{$adicionar}' limit 1;";
$pesquisar = mysqli_query($conexao_banco, $query_nota);
while($preencher=mysqli_fetch_array($pesquisar)) {
?>
<form action="cadastrar_novo_produto.php" method="POST" enctype="multipart/form-data" onSubmit="return alerta();">
	<div class="modal-dialog modal-lg" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">Alterar nota: <?=tratamento_nota($adicionar);?></h5>
			</div>
			<div class="modal-body">
				<div class="container regular-altura">
					<div class="form-group">
	
						<!--Entrada hiddens-->
						<input type="hidden" id="nota" name="nota" value="<?=$preencher['ID_Nota'];?>">	
						<input type="hidden" id="rd" name="rd" value="<?=$preencher['Relacao_Destino'];?>">	
						<input type="hidden" id="sd" name="sd" value="<?=$preencher['Setor_Destino'];?>">	
						<input type="hidden" id="funcionario" name="funcionario" value="<?=$preencher['Funcionario'];?>">	
	
						<table class="table">			
							<tr>
								<td><label class="col-form-label">Equipamento: </label></td>
								<td colspan="6"><select class="form-control" id="equipamento" name="equipamento" autocomplete="off" required>
									<option value="" selected="seleted">...</option>
									<?php
									$query = "select * from Modelos";
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
									<option value="" selected="seleted">...</option>
									<?php
									$query = "select * from Marcas";
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
								<td colspan="6"><input type="text" class="form-control" onkeyup="limitarInput(this,100)" value="" id="descricao" name="descricao" maxlength="100" placeholder="EX: Descricao" autocomplete="off" required>		
							</tr>
							<tr>
								<td><label class="col-form-label">Serial: </label></td>
								<td colspan="6"><input type="text" class="form-control" onkeyup="limitarInput(this, 54)" value="" id="serial" name="serial" maxlength="54" placeholder="Ex: Serial" autocomplete="off"></td>
							</tr>
							<tr>
								<td><label class="col-form-label">Relacao: </label></td>
								<td colspan="6"><select class="form-control" id="relacao" name="relacao" required>
										<option value="" selected="seleted">...</option>
										<?php
										$query = "select * from Relacao_Setor";
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
										<option value="" selected="seleted">...</option>
										<?php
										$query = "select * from Setor";
										$setores = mysqli_query($conexao_banco, $query);
										while($chamada = mysqli_fetch_array($setores)) {
										?>
										<option value="<?=$chamada['Centro_custo']?>"><?=$chamada['Setor'];?></option>
										<?php
										}
										?>
								</select></td>
							</tr>
						</table>
					</div>
				</div>
				<div class="modal-footer">
					<a href="javascript:history.back(1)" class="btn btn-danger">Cancelar</a>
					<button type="submit" class="btn btn-success">Registrar</button>
				</div>
			</div>
		</div>
	</div>
</form>
<?php
}
?>
