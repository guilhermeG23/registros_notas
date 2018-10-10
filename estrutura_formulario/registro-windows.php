<tr>
	<td><label class="col-form-label">serial: </label></td>
	<td colspan="6"><input type="text" class="form-control" onkeyup="limitarinput(this, 30)" value="" id="serialW" name="serialW" maxlength="30" placeholder="xxxxx-xxxxx-xxxxx-xxxxx-xxxxx" autocomplete="off"></td>
</tr>
<tr>
	<td><label class="col-form-label">versao: </label></td>
	<td><select class="form-control" id="versaoW" name="versaoW">
		<option value="" select>...</option>
		<?php
		$query = 'select ID_Modelo, Versao from Software_Microsoft_Modelos where ID_Tipo_Ex = "1";';
		$setores = mysqli_query($conexao_banco, $query);
		while($chamada=mysqli_fetch_array($setores)) {
		?>
		<option value="<?=$chamada['ID_Modelo'];?>"><?=$chamada['Versao'];?></option>
		<?php
		}
		?>
	</select></td>
</tr>
