<!--Modal para deletar um produto de uma nota-->
<div class="modal fade bd-example-modal-lg" id="modal<?=$chamada["ID"];?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-lg" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">Deletar</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
			</div>
			<form action="deletar_produto.php" method="POST">
			<div class="modal-body">
				<div class="container regular-altura">
					<div class="form-group">
						<input type="hidden" id="alterar" name="deletar_produto" value="<?=$chamada["ID"];?>" required>
						<input type="hidden" id="nota" name="nota" value="<?=$alterar;?>" required>
						<p>Tem certeza que quer deletar este  equipamento?</p>
						<p>Modelo: <?=$chamada["Modelo"];?></p>
						<p>Marca: <?=$chamada["Marca"];?></p>
						<p>Descricao: <?=$chamada["Descricao"];?></p>
					</div>
				</div>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-danger" data-dismiss="modal">Não</button>
				<button type="submit" class="btn btn-success">Sim</button>
			</div>
			</form>	
		</div>
	</div>
</div>
