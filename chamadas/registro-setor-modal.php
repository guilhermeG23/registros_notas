<div class="modal fade bd-example-modal-lg" id="registrar_setor" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-lg" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">Registrar Setor</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<form action="cadastrar.php" method="POST" enctype="multipart/form-data">
					<div class="form-group">
						<table class="table table-borderless tabela-registro">
							<tr>
								<td><label class="col-form-label">Centro de custo do Setor: </label></td>
								<td><input type="text" class="form-control" id="custo_setor" name="custo_setor" maxlength="6" placeholder="EX: centro de custo do Setor"></td>
							</tr>
							<tr>
								<td><label class="col-form-label">Setor atual: </label></td>
								<td><input type="text" class="form-control" id="nome_setor" name="nome_setor" maxlength="40" placeholder="EX: Setor"></td>
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
