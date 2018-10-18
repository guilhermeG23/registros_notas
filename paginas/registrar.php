<script>

var incrementador = 0;

function duplicarCampos(){
	var clone = document.getElementById('clonar').cloneNode(true);
	var destino = document.getElementById('destino');
	destino.appendChild(clone);
	clone.id = 'clone[' + incrementador + ']';
	document.getElementById('Equipamento').id = 'Equipamento[' + incrementador + ']';
	document.getElementById('Marca').id = 'Marca[' + incrementador + ']';
	document.getElementById('Descricao').id = 'Descricao[' + incrementador + ']';
	document.getElementById('Serial').id = 'Serial[' + incrementador + ']';
	document.getElementById('Localdestinado').id = 'Localdestinado[' + incrementador + ']';
	document.getElementById('Localatual').id = 'Localatual[' + incrementador + ']';
	incrementador++;
}

function removerCampos(){
	if(incrementador > 0) {
		var node = document.getElementById('destino');
		node.removeChild(node.childNodes[incrementador]);
		incrementador--;
	}
}

</script>

<?php
include('../banco/banco.php');
?>

<form action="cadastrar.php" method="post" enctype="multipart/form-data">
	<div class="form-group">
		<table>			
			<tr>
				<td><label class="col-form-label">N Nota</label></td>
				<td><input type="number" class="form-control" onkeyup="limitarInput(this,11)"  value="" id="nota" name="nota" maxlength="44" placeholder="EX: N Nota" autocomplete="off" required></td>
			</tr>
			<tr>
				<td><label class="col-form-label">Chave</label></td>
				<td><input type="number" class="form-control" onkeyup="limitarInput(this,15)"  value="" id="chave" name="chave" maxlength="15" placeholder="EX: Chave" autocomplete="off" required></td>
			</tr>
			<tr>
				<td><label class="col-form-label">Emissao: </label></td>
				<td><input type="text" class="form-control data" onkeyup="limitarInput(this,10)" value="" id="data_entrada" name="data_entrada" maxlength="10" placeholder="EX: dd/mm/yyyy" autocomplete="off" required></td>
			</tr>
			<tr>
				<td><label class="col-form-label">Empresa: </label></td>
				<td><input type="text" class="form-control" onkeyup="limitarInput(this,100)" value="" id="empresa" name="empresa" maxlength="100" placeholder="EX: Empresa da nota" autocomplete="off" required>		
			</tr>
			<tr>
			<td colspan="4">
				<div class="custom-file">
					<input type="file" accept="application/pdf" class="form-control-file custom-file-input" id="arq" name="arq" required>
					<label class="custom-file-label" for="inputGroupFile01" id="name-pdf-nota">Entre com a nota fiscal...</label>
				</div>
			</td>
			<tr>
				<td><label class="col-form-label">Setor: </label></td>
				<td><select class="form-control" id="setor" name="setor">
					<option value="" select>...</option>
					<?php
					$query = "select * from Setor";
					$setores = mysqli_query($conexao_banco, $query);
					while($chamada = mysqli_fetch_array($setores)) {
					?>
					<option value="<?=$chamada['Centro_Custo']?>"><?=$chamada['Setor'];?></option>
					<?php
					}
					?>
				</select></td>
			</tr>
			<tr>
				<td><label class="col-form-label">Funcionario: </label></td>
				<td colspan="6"><input type="text" class="form-control" onkeyup="limitarInput(this, 100)" maxlength="100" value="" id="funcionario" name="funcionario" placeholder="Ex: Nome" autocomplete="off"></td>
			</tr>
			<tr>
				<td>
					<img  src="#" style="cursor: pointer;" onclick="duplicarCampos();">
					<img  src="#" style="cursor: pointer;" onclick="removerCampos();">
				</td>
			</tr>
			<tr>
				<td><label class="col-form-label">Equipamento: </label></td>
				<td><label class="col-form-label">Marca: </label></td>
				<td><label class="col-form-label">Descricao: </label></td>
				<td><label class="col-form-label">Serial: </label></td>
				<td><label class="col-form-label">Destino: </label></td>
				<td><label class="col-form-label">Atual: </label></td>
			</tr>
			<tr>
				<td><input type="text" class="form-control" value="" id="Equipamento[1]" name="Equipamento" maxlength="100" placeholder="" autocomplete="off" required></td>
				<td><input type="text" class="form-control" value="" id="Marca[1]" name="Marca" maxlength="100" placeholder="" autocomplete="off" required></td>
				<td><input type="text" class="form-control" value="" id="Descricao[1]" name="Descricao" maxlength="100" placeholder="" autocomplete="off" required></td>
				<td><input type="text" class="form-control" value="" id="Serial[1]" name="Serial" maxlength="100" placeholder="" autocomplete="off"></td>
				<td><input type="text" class="form-control" value="" id="Localdestinado[1]" name="Destinado" maxlength="100" placeholder="" autocomplete="off" required></td>
				<td><input type="text" class="form-control" value="" id="Localatual[1]" name="Atual" maxlength="100" placeholder="" autocomplete="off" required></td>
			</tr>
			<table id="destino">
			</table>
			<table style="display: none;">
				<tr id="clonar">
					<td><input type="text" class="form-control" value="" id="Equipamento" name="Equipamento" maxlength="100" placeholder="" autocomplete="off"></td>
					<td><input type="text" class="form-control" value="" id="Marca" name="Marca" maxlength="100" placeholder="" autocomplete="off"></td>
					<td><input type="text" class="form-control" value="" id="Descricao" name="Descricao" maxlength="100" placeholder="" autocomplete="off"></td>
					<td><input type="text" class="form-control" value="" id="Serial" name="Serial" maxlength="100" placeholder="" autocomplete="off"></td>
					<td><input type="text" class="form-control" value="" id="Localdestinado" name="Destinado" maxlength="100" placeholder="" autocomplete="off"></td>
					<td><input type="text" class="form-control" value="" id="Localatual" name="Atual" maxlength="100" placeholder="" autocomplete="off"></td>
				</tr>
			</table>
		</table>
	</div>
</form>
