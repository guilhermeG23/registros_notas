<div class="modal fade bd-example-modal-lg" id="registrar_computador" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<form action="cadastrar.php" method="POST" enctype="multipart/form-data">
		<div class="modal-dialog modal-lg" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalLabel">Registrar</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				</div>
				<div class="modal-body">
					<div class="container regular-altura">
						<?php include('../chamadas/registrar.php');?>
					</div>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
					<button type="reset" class="btn btn-warning">Limpar</button>
					<button type="submit" class="btn btn-success">Registrar</button>
				</div>
			</div>
		</div>
	</form>	
</div>
