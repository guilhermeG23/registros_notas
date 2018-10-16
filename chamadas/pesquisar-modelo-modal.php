<div class="modal fade bd-example-modal-lg" id="pesquisar_por" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-lg" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">Pesquisar por modelo</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<form action="#" method="POST" enctype="multipart/form-data">
					<div class="form-group">
						<table class="table table-borderless tabela-registro">
							<tr>
								<td><label class="col-form-label">Modelo: </label></td>
								<td><select class="form-control" name="modelo" id="modelo"> 
									<option value="" select>...</option>
									<?php
									$query = "select * from vw_marca_arrumada";
									$resultado = mysqli_query($conexao_banco, $query);
									while($chamada=mysqli_fetch_array($resultado)) {
									?>
									<option value="<?=$chamada['ID_Marca'];?>"><?=$chamada['Marca'];?></option>
									<?php
									}
									?>
									<option value="100" >Windows</option>
									<option value="101" >Office</option>
								</select></td>
							</tr>					
						</table>	
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
						<button type="reset" class="btn btn-warning">Limpar</button>
						<button type="submit" class="btn btn-success">Registrar</button>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>