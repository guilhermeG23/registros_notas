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
				<form action="cadastrar.php" method="POST" id="formulario">
					<div class="form-group">
						<table class="table table-borderless tabela-registro">
							<tr>
								<td><label class="col-form-label">Serial Number:</label></td>
								<td colspan="3"><input type="text" class="form-control" value="" id="sn" name="sn" maxlength="44" placeholder="EX: 000000000" autocomplete="off" required></td>
							</tr>
							<tr>
								<td><label class="col-form-label">N Nota</label></td>
								<td><input type="text" class="form-control" onkeyup="limitarInput(this,15)"  value="" id="nota" name="nota" maxlength="" placeholder="EX: N Nota" autocomplete="off" required></td>
								<td><label class="col-form-label">Data de Emissao: </label></td>
								<td><input type="text" class="form-control data" value="" id="data_entrada" name="data_entrada" maxlength="10" placeholder="EX: dd/mm/yyyy" autocomplete="off"></td>
							</tr>
							<tr>
								<td><label class="col-form-label">Modelo: </label></td>
								<td><input type="text" class="form-control" value="" id="modelo" name="modelo" maxlength="100" placeholder="EX: Modelo" autocomplete="off" required></td>
								<td><label class="col-form-label">Marca: </label></td>
								<td><input type="text" class="form-control" value="" id="marca" name="marca" maxlength="100" placeholder="EX: Marca" autocomplete="off" required>		
							</tr>
							<tr>
								<td><label class="col-form-label">Setor: </label></td>
								<td><input type="text" class="form-control" value="" id="setor" name="setor" maxlength="44" placeholder="EX: 000000000" autocomplete="off" required></td>
								<td><label class="col-form-label">Usuario: </label></td>
								<td><input type="text" class="form-control" value="" id="usuario" name="usuario" maxlength="44" placeholder="EX: 000000000" autocomplete="off" required></td>
							
							</tr>
<?php
/*

							<tr>
								<td colspan="4">
									<div class="custom-file">
										<input type="file" class="custom-file-input" id="inputGroupFile01">
										<label class="custom-file-label" for="inputGroupFile01" id="name-pdf-nota">Entre com a nota fiscal...</label>
									</div>
								</td>
							</tr>
 */
?>
						</table>
					</div>
<?php
/*
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
								<tr>
									<td><label class="col-form-label">Serial: </label></td>
									<td colspan="6"><input type="text" class="form-control" value="" id="" name="" maxlength="10" placeholder="XXXXX-XXXXX-XXXXX-XXXXX-XXXXX" autocomplete="off"></td>
								</tr>
								<tr>
									<td><label class="col-form-label">Modelo: </label></td>
									<td><input type="text" class="form-control" value="" id="" name="" maxlength="10" placeholder="EX: dd/mm/yyyy" autocomplete="off"></td>
									<td><label class="col-form-label">Versao: </label></td>
									<td><input type="text" class="form-control" value="" id="" name="" maxlength="10" placeholder="EX: dd/mm/yyyy" autocomplete="off"></td>
									<td><label class="col-form-label">Bit: </label></td>
									<td><select class="form-control" name="tipo-bit" id="tipo-bit">
										<option value="32">32</option>
										<option value="64">64</option>
									</select></td>	
								</tr>
							</table>	
						</div>
					</div>
					<div id="Office" class="esconder">
						<div class="form-group">
							<hr>
							<table class="table table-borderless tabela-registro">
								<tr>
									<td><label class="col-form-label">Windows</label></td>
								</tr>
							</table>
							<hr>
							<table class="table table-borderless tabela-registro">
								<tr>
									<td><label class="col-form-label">Serial: </label></td>
									<td colspan="6"><input type="text" class="form-control data" value="" id="entradaD" name="entradaD" maxlength="10" placeholder="EX: dd/mm/yyyy" autocomplete="off"></td>
								</tr>
								<tr>
									<td><label class="col-form-label">Modelo: </label></td>
									<td><input type="text" class="form-control data" value="" id="entradaD" name="entradaD" maxlength="10" placeholder="EX: dd/mm/yyyy" autocomplete="off"></td>
									<td><label class="col-form-label">Versao: </label></td>
									<td><input type="text" class="form-control data" value="" id="entradaD" name="entradaD" maxlength="10" placeholder="EX: dd/mm/yyyy" autocomplete="off"></td>
									<td><label class="col-form-label">Bit: </label></td>
									<td><input type="text" class="form-control data" value="" id="entradaD" name="entradaD" maxlength="10" placeholder="EX: dd/mm/yyyy" autocomplete="off"></td>
	
								</tr>							
							</table>	
						</div>
						</div>
					*/
?>
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
