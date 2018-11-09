<div class="modal fade bd-example-modal-lg" id="pesquisar_setor" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-lg" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">Pesquisar por Setor / Relacao</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<form action="index.php" method="POST" enctype="multipart/form-data">
					<div class="form-group">
						<table class="table table-borderless tabela-registro">
							<tr>
								<td><label class="col-form-label">Relacao destino: </label></td>
								<td><select class="form-control" name="relacao_destino" id="relacao_destino"> 
									<option value="" select>...</option>
									<?php
									$query = "select * from Relacao_Setor";
									$resultado = mysqli_query($conexao_banco, $query);
									while($chamada=mysqli_fetch_array($resultado)) {
									?>
									<option value="<?=$chamada['ID_Relacao'];?>"><?=$chamada['Relacao'];?></option>
									<?php
									}
									?>
								</select></td>
							</tr>
							<tr>
								<td><label class="col-form-label">Setor destino: </label></td>
								<td><select class="form-control" name="setor_destino" id="setor_destino"> 
									<option value="" select>...</option>
									<?php
									$query = "select * from Setor";
									$resultado = mysqli_query($conexao_banco, $query);
									while($chamada=mysqli_fetch_array($resultado)) {
									?>
									<option value="<?=$chamada['Centro_custo'];?>"><?=$chamada['Setor'];?></option>
									<?php
									}
									?>
								</select></td>
							</tr>
							<tr>
								<td colspan="6"><hr></td>
							</tr>
							<tr>
								<td><label class="col-form-label">Relacao atual: </label></td>
								<td><select class="form-control" name="relacao_atual" id="relacao_atual"> 
									<option value="" select>...</option>
									<?php
									$query = "select * from Relacao_Setor";
									$resultado = mysqli_query($conexao_banco, $query);
									while($chamada=mysqli_fetch_array($resultado)) {
									?>
									<option value="<?=$chamada['ID_Relacao'];?>"><?=$chamada['Relacao'];?></option>
									<?php
									}
									?>
								</select></td>
							</tr>
							<tr>
								<td><label class="col-form-label">Setor atual: </label></td>
								<td><select class="form-control" name="setor_atual" id="setor_atual"> 
									<option value="" select>...</option>
									<?php
									$query = "select * from Setor";
									$resultado = mysqli_query($conexao_banco, $query);
									while($chamada=mysqli_fetch_array($resultado)) {
									?>
									<option value="<?=$chamada['Centro_custo'];?>"><?=$chamada['Setor'];?></option>
									<?php
									}
									?>
								</select></td>
							</tr>		
						</table>	
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
						<button type="reset" class="btn btn-warning">Limpar</button>
						<button type="submit" class="btn btn-success">Pesquisar</button>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>
