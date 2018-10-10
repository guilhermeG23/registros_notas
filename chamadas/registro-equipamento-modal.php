<div class="modal fade bd-example-modal-lg" id="registrar_computador" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-lg" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">Registrar Maquina</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<form action="cadastrar.php" method="POST" onSubmit="return alerta();" enctype="multipart/form-data">
					<div class="form-group">
						<table class="table table-borderless tabela-registro">
							<?php include('../estrutura_formulario/registro-nota.php');?>
							<?php include('../estrutura_formulario/registro-computador.php');?>
						</table>
					</div>
					<div class="form-group">
						<table class="table table-borderless tabela-registro">
							<tr>
								<td class="ajuste-padding-externo"><button type="button" class="btn btn-link btn-sem-padding" onclick="descer_menu('Windows');"><label id="texto-mostrar-mais-Windows">Windows</label></button></td>
								<td class="ajuste-padding-externo"><button type="button" class="btn btn-link btn-sem-padding" onclick="descer_menu('Office');"><label id="texto-mostrar-mais-Office">Office</label></button></td>
							</tr>	
						</table>
					</div>
					<div id="Windows" class="esconder">
						<div class="form-group">
							<hr>
							<table class="table table-borderless tabela-registro">
								<tr>
									<td><label class="col-form-label">Windows</label></td>
								</tr>
							</table>
							<hr>
							<table class="table table-borderless tabela-registro">
								<?php include('../estrutura_formulario/registro-windows.php');?>
							</table>	
						</div>
					</div>
					<div id="Office" class="esconder">
						<div class="form-group">
							<hr>
							<table class="table table-borderless tabela-registro">
								<tr>
									<td><label class="col-form-label">Office</label></td>
								</tr>
							</table>
							<hr>
							<table class="table table-borderless tabela-registro">
								<?php include('../estrutura_formulario/registro-office.php');?>
							</table>	
						</div>
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
