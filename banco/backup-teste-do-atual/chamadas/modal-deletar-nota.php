<div class="modal fade bd-example-modal-lg" id="modal<?=$chamada["Nota"];?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-lg" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">Deletar</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
			</div>
			<form action="deletar_nota.php" method="POST" enctype="multipart/form-data">
			<div class="modal-body">
				<div class="container regular-altura">
					<div class="form-group">
						<input type="hidden" value="<?=$chamada["Nota"];?>" name="deletar" id="deletar">
						<p>Tem certeza que quer deletar esta nota e todos os equipamentos registrados dela?</p>
						<p>Nota: <?=$chamada["Nota"];?></p>
					</div>
				</div>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-danger" data-dismiss="modal">Não</button>
				<button type="submit" class="btn btn-success">Sim</button>
			</div>
		</div>
		</form>	
	</div>
</div>
