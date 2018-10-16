<tr>
	<td><label class="col-form-label">Setor: </label></td>
	<td><select class="form-control" id="setor" name="setor">
		<option value="" select>...</option>
		<?php
		$query = "select * from Setor";
		$setores = mysqli_query($conexao_banco, $query);
		while($chamada = mysqli_fetch_array($setores)) {
		?>
		<option value="<?=$chamada['Setor_ID']?>"><?=$chamada['Setor'];?></option>
		<?php
		}
		?>
	</select></td>
</tr>
<tr>
	<td><label class="col-form-label">Chapa: </label></td>
	<td colspan="6"><input type="text" class="form-control" onkeyup="limitarInput(this, 10)" maxlength="10" value="" id="chapa" name="chapa" placeholder="xxxxxxxxx" autocomplete="off"></td>
</tr>
<tr>
	<td><label class="col-form-label">Funcionario: </label></td>
	<td colspan="6"><input type="text" class="form-control" onkeyup="limitarInput(this, 100)" maxlength="100" value="" id="funcionario" name="funcionario" placeholder="Ex: Nome" autocomplete="off"></td>
</tr>
