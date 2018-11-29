<div class="modal fade bd-example-modal-lg" id="pesquisar_por" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-lg" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">Pesquisar equipamento</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<form action="index.php" method="POST" enctype="multipart/form-data">
					<div class="form-group">
						<table class="table table-borderless tabela-registro">
							<tr>
								<td><label class="col-form-label">Equipamento: </label></td>
								<td><select class="form-control" name="modelo" id="modelo"> 
									<option value="" select>...</option>
									<?php
									$query = "select * from Modelos order by ID_Modelo asc;";
									$resultado = mysqli_query($conexao_banco, $query);
									while($chamada=mysqli_fetch_array($resultado)) {
									?>
									<option value="<?=$chamada['ID_Modelo'];?>"><?=$chamada['Modelo'];?></option>
									<?php
									}
									?>
								</select></td>
							</tr>	
							<tr>
								<td><label class="col-form-label">Marca: </label></td>
								<td><select class="form-control" name="marca" id="marca"> 
									<option value="" select>...</option>
									<?php
									$query = "select * from Marcas order by Marca asc;";
									$resultado = mysqli_query($conexao_banco, $query);
									while($chamada=mysqli_fetch_array($resultado)) {
									?>
									<option value="<?=$chamada['ID_Marca'];?>"><?=$chamada['Marca'];?></option>
									<?php
									}
									?>
								</select></td>
							</tr>
							<tr>
								<td colspan="6"><hr></td>
							</tr>	
							<tr>
								<td><label class="col-form-label">Produtos descritos na nota: </label></td>
								<td><input type="text" class="form-control" onkeyup="limitarInput(this,100)" value="" id="descricao" name="descricao" maxlength="100" placeholder="Procura pela descricao dos produtos da nota..." autocomplete="off">		
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
