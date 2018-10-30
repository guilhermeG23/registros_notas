<form action="cadastrar.php" method="POST" enctype="multipart/form-data" onSubmit="return alerta();">
<div class="modal fade bd-example-modal-lg" id="registrar_computador" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-lg" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">Registrar</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
			</div>
			<div class="modal-body">
				<div class="container regular-altura">
					<div class="form-group">
						<input type="hidden" class="form-control" value="" id="contador" name="contador" maxlength="100" placeholder="" autocomplete="off"></td>
						<table class="table">			
							<tr>
								<td><label class="col-form-label">N.Nota: </label></td>
								<td colspan="6"><input type="text" class="form-control" onkeyup="limitarInput(this,11)"  value="" id="nota" name="nota" maxlength="44" placeholder="EX: N Nota" autocomplete="off" required></td>
							</tr>
							<tr>
								<td><label class="col-form-label">Chave: </label></td>
								<td colspan="6"><input type="text" class="form-control" onkeyup="limitarInput(this,54)"  value="" id="chave" name="chave" maxlength="54" placeholder="EX: Chave" autocomplete="off" required></td>
							</tr>
							<tr>
								<td><label class="col-form-label">Emissao: </label></td>
								<td colspan="6"><input type="text" class="form-control data" onkeyup="limitarInput(this,10)" value="" id="data_entrada" name="data_entrada" maxlength="10" placeholder="EX: dd/mm/yyyy" autocomplete="off" required></td>
							</tr>
							<tr>
								<td><label class="col-form-label">CNPJ: </label></td>
								<td colspan="2"><input type="text" class="form-control" onkeyup="limitarInput(this,18)" value="" id="cnpj" name="cnpj" maxlength="18" placeholder="EX: Empresa da nota" autocomplete="off" required>		
							</tr>
							<tr>
								<td><label class="col-form-label">Empresa: </label></td>
								<td colspan="2"><input type="text" class="form-control" onkeyup="limitarInput(this,100)" value="" id="empresa" name="empresa" maxlength="100" placeholder="EX: Empresa da nota" autocomplete="off" required>		
							</tr>
							<tr>
								<td><label class="col-form-label">Arquivo: </label></td>
								<td colspan="6"><input type="file" accept="application/pdf" class="btn" id="arq" name="arq" required></td>
							</tr>
							<tr>
								<td><label class="col-form-label">Relacao: </label></td>
								<td colspan="6"><select class="form-control" id="relacao" name="relacao" required>
										<option value="">...</option>
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
										<option value="">...</option>
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
								<td colspan="6"><input type="text" class="form-control" onkeyup="limitarInput(this, 100)" maxlength="100" value="" id="funcionario" name="funcionario" placeholder="Ex: Nome" autocomplete="off" required></td>
							</tr>
							<tr>
								<td><label class="col-form-label">Campos para registro: </label></td>
								<td colspan="5" class="alinhar-direita">
									<button type="button" class="btn" style="cursor: pointer;" onclick="duplicarCampos();">Add</button>
									<button type="button" class="btn" style="cursor: pointer;" onclick="removerCampos();">Remove</button>
									<button type="button" class="btn" style="cursor: pointer;" onclick="allremoverCampos();">Remove all clone</button>
								</td>
							</tr>
						</table>
						<table id="destino" class="table table-borderless">
							<tr>
								<td><label class="col-form-label">Equipamento: </label></td>
								<td><label class="col-form-label">Marca: </label></td>
								<td><label class="col-form-label">Descricao: </label></td>
								<td><label class="col-form-label">Serial: </label></td>
								<td><label class="col-form-label">Relacao: </label></td>
								<td><label class="col-form-label">Atual: </label></td>
							</tr>
							<tr>
								<td colspan="1"><select class="form-control" id="Equipamento0" name="Equipamento0" required>
									<option value="" selected>...</option>
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
								<td colspan="1"><select class="form-control" id="Marca0" name="Marca0" autocomplete="off" required>
									<option value="" selected>...</option>
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
								<td colspan="1"><input type="text" class="form-control" onkeyup="limitarInput(this, 100)" value="" id="Descricao0" name="Descricao0" maxlength="100" placeholder="Ex: descricao" autocomplete="off" required></td>
								<td colspan="1"><input type="text" class="form-control" onkeyup="limitarInput(this, 54)" value="" id="Serial0" name="Serial0" maxlength="54" placeholder="Ex: Serial" autocomplete="off"></td>
								<td colspan="1"><select class="form-control" id="relacaoAtual0" name="relacaoAtual0" required>
										<option value="">...</option>
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
								<td colspan="1"><select class="form-control" id="Localatual0" name="Localatual0" autocomplete="off" required>
									<option value="" selected>...</option>
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
						<table style="display: none;">
							<tr id="clonar">
								<td colspan="1"><select class="form-control" id="Equipamento" name="Equipamento">
									<option value="" selected>...</option>
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
								<td colspan="1"><select class="form-control" id="Marca" name="Marca" autocomplete="off">
									<option value="" selected>...</option>
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
								<td colspan="1"><input type="text" class="form-control" onkeyup="limitarInput(this, 100)" value="" id="Descricao" name="Descricao" maxlength="100" placeholder="Ex: descricao" autocomplete="off"></td>
								<td colspan="1"><input type="text" class="form-control" onkeyup="limitarInput(this, 54)" value="" id="Serial" name="Serial" maxlength="54" placeholder="Ex: Serial" autocomplete="off"></td>
								<td colspan="1"><select class="form-control" id="relacaoAtual" name="relacaoAtual">
										<option value="">...</option>
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
								<td colspan="1"><select class="form-control" id="Localatual" name="Localatual" autocomplete="off">
									<option value="" selected>...</option>
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
					<button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
					<button type="reset" class="btn btn-warning">Limpar</button>
					<button type="submit" class="btn btn-success">Registrar</button>
				</div>
			</div>
		</div>
	</div>
</div>
</form>	
