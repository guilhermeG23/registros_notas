<tr>
	<td><label class="col-form-label">N Nota</label></td>
	<td><input type="number" class="form-control" onkeyup="limitarInput(this,44)"  value="" id="nota" name="nota" maxlength="44" placeholder="EX: N Nota" autocomplete="off" required></td>
</tr>
<tr>
	<td><label class="col-form-label">Emissao: </label></td>
	<td><input type="text" class="form-control data" onkeyup="limitarInput(this,10)" value="" id="data_entrada" name="data_entrada" maxlength="10" placeholder="EX: dd/mm/yyyy" autocomplete="off"></td>
</tr>
<tr>
	<td><label class="col-form-label">Empresa: </label></td>
	<td><input type="text" class="form-control" onkeyup="limitarInput(this,100)" value="" id="empresa" name="empresa" maxlength="100" placeholder="EX: Empresa da nota" autocomplete="off" required>		
</tr>
<tr>
	<td><label class="col-form-label">Setor: </label></td>
	<td><select class="form-control" name="setor" id="setor">
		<option value="" select>...</option>
	<?php
	$query = "select * from Setor";
	$setores = mysqli_query($conexao_banco, $query);
	while($chamada=mysqli_fetch_array($setores)) {
	?>
		<option value="<?=$chamada['Setor_ID'];?>"><?=$chamada['Setor'];?></option>
	<?php
	}
	?>
	</select></td>
</tr>
<tr>	
	<td><label class="col-form-label">Usuario: </label></td>
	<td><input type="text" class="form-control" value="" id="usuario" name="usuario" maxlength="44" placeholder="EX: 000000000" autocomplete="off" required></td>
</tr>
<tr>
	<td colspan="4">
		<div class="custom-file">
			<input type="file" accept="application/pdf" class="form-control-file custom-file-input" id="arq" name="arq">
			<label class="custom-file-label" for="inputGroupFile01" id="name-pdf-nota">Entre com a nota fiscal...</label>
		</div>
	</td>
</tr>
