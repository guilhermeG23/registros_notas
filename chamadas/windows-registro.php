<div class="modal fade bd-example-modal-lg" id="registrar_windows" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-lg" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">Registrar Windows</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<div class="form-group">
					<?php
						include("registro-tabela-office-window.php");
					?>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
					<button type="reset" class="btn btn-warning">Limpar</button>
					<button type="submit" class="btn btn-success">Registrar</button>
				</div>
				<script type="text/javascript" src="../js/alerta.js"></script>
			</div>
		</div>
	</div>
</div>
