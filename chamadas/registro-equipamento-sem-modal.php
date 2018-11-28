<?php
#Retorno por session
$alterar = $_POST['alterar'];
$query_nota = "select * from vw_preencher_tabela where Nota = '{$alterar}' group by Nota;";
$pesquisar = mysqli_query($conexao_banco, $query_nota);
while($preencher=mysqli_fetch_array($pesquisar)) {
?>
<form action="cadastrar_alteracao.php" method="POST" enctype="multipart/form-data" onSubmit="return alerta();">
	<div class="modal-dialog modal-lg" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">Alterar nota: <?=tratamento_nota($preencher["Nota"]);?></h5>
			</div>
			<div class="modal-body">
				<div class="container regular-altura">
					<div class="form-group">
						<input type="hidden" class="form-control" value="" id="contador" name="contador" maxlength="100" placeholder="" autocomplete="off"></td>
						<table class="table">			
							<tr>
								<td><label class="col-form-label">N.Nota: </label></td>
								<td colspan="6"><input type="text" class="form-control" onkeyup="limitarInput(this,11)"  value="<?=tratamento_nota($preencher['Nota']);?>" id="nota" name="nota" maxlength="11" placeholder="EX: N Nota" autocomplete="off" required readonly></td>
							</tr>
							<tr>
								<td><label class="col-form-label">Chave: </label></td>
								<td colspan="6"><input type="text" class="form-control" onkeyup="limitarInput(this,54)"  value="<?=tratamento_chave($preencher['Chave']);?>" id="chave" name="chave" maxlength="54" placeholder="EX: Chave" autocomplete="off" required></td>
							</tr>
							<tr>
								<td><label class="col-form-label">Emissao: </label></td>
								<td colspan="6"><input type="text" class="form-control data" onkeyup="limitarInput(this,10)" value="<?=tratamento_data($preencher['Data']);?>" id="data_entrada" name="data_entrada" maxlength="10" placeholder="EX: dd/mm/yyyy" autocomplete="off" required></td>
							</tr>
							<tr>
								<td><label class="col-form-label">CNPJ: </label></td>
								<td colspan="2"><input type="text" class="form-control" onkeyup="limitarInput(this,18)" value="<?=tratamento_cnpj($preencher['CNPJ']);?>" id="cnpj" name="cnpj" maxlength="18" placeholder="EX: Empresa da nota" autocomplete="off" required>		
							</tr>
							<tr>
								<td><label class="col-form-label">Empresa: </label></td>
								<td colspan="2"><input type="text" class="form-control" onkeyup="limitarInput(this,100)" value="<?=$preencher['Empresa'];?>" id="empresa" name="empresa" maxlength="100" placeholder="EX: Empresa da nota" autocomplete="off" required readonly>		
							</tr>
							<tr>
								<td><label class="col-form-label">Relacao: </label></td>
								<td colspan="6"><select class="form-control" id="relacao" name="relacao" required>
								<option value="<?=$preencher['RD'];?>"><?=$preencher['RelacaoD'];?></option>
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
								<option value="<?=$preencher["Centro_de_Custo"];?>"><?=$preencher["Setor"];?></option>
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
