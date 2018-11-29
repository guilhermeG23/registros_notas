<div class="modal fade bd-example-modal-lg" id="pesquisar_geral" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-lg" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">Pesquisa geral</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<form action="index.php" method="POST" enctype="multipart/form-data">
					<div class="form-group">
						<table class="table table-borderless tabela-registro">
							<tr>
								<td><label class="col-form-label">Geral: </label></td>
								<td><input type="text" class="form-control" onkeyup="limitarInput(this,54)" value="" id="pesquisar" name="pesquisar" maxlength="54" placeholder="EX: CNPJ, nota, chave, Funcionario ..." autocomplete="off">		
							</tr>
							<tr>
								<td><label class="col-form-label">Empresas: </label></td>
								<td><select class="form-control" name="empresa_emite" id="empresa_emite"> 
									<option value="" select>...</option>
									<?php
									$query = "select * from Empresa_Nota order by Empresa asc;";
									$resultado = mysqli_query($conexao_banco, $query);
									while($chamada=mysqli_fetch_array($resultado)) {
									?>
									<option value="<?=$chamada['CNPJ'];?>"><?=$chamada['Empresa'];?></option>
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
